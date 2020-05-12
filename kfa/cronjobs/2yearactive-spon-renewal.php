<?
	include( "config.php" );
	include("common.php");
	$title = "2 Year Memberships that will Expire";
	$days = 730;
	//$days = $_REQUEST['days'];
	$otherdays = 730 - $days;
	$user = $_REQUEST['user'];

?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./style.css" title="mainstyles2">
 		<TITLE><?php echo $title; ?></TITLE>
	</head>
	<body>
<table cellspacing="10" cellpadding="10" border="0">
<tr><td>
<center><b>List of 2 Year Memberships Membership</b></center>
</td></tr>
<tr><td>

	<table>
	<tr><td width="150"><b>Name</b></td><td width="150"><b>Username</b></td><td width="300"><b>Email Addres</b></td><td width="150"><b>Days to Expire</b></td><td width="100"><b>Approval Date</b></td></tr>

<?php
	
	$total = 0;
	$expired = 0;


	$sql = "select * from sponsor2year";
	$result = mysql_query( $sql ) or die( "Error querying course list: " . mysql_error() . " Query: $sql " );
	
	while( $row = mysql_fetch_array( $result ) )
		{

				// If the person's update date is more than 365 days - we want to see their name.
				$date = $row['appdate'];
				$signupdate = $row['date'];
				$status = $row['status'];
				if ($date == '0000-00-00'){
				}else { 
				list($syear, $smonth, $sday) = split('[-]', $signupdate);
				list($year, $month, $day) = split('[-]', $date);
				//echo "Month: $month; Day: $day; Year: $year<br />\n";
	
				//find interval of time that has passed.
				$time_passedsignup = intval((time()- mktime(0,0,0,$smonth,$sday,$syear))/86400);
				$time_passed = intval((time()- mktime(0,0,0,$month,$day,$year))/86400);
				//echo "signup time passed ";
				//echo $time_passedsignup;
				
				$left = 730 - $time_passed;
				//echo "Days that have passed: ".$time_passed."<br>";
				$name = $row['name'];
				$username = $row['username'];
				$email = $row['email'];
				$myemail = $email;	
				$appdate = $row['appdate'];
				$id = $row['id'];
				$numleft = $left;
				if ($left <= 0) $left = 'expired';

					echo "<tr><td>".$name."</td>";
					echo "<td>".$username."</td>";
					echo "<td>".$email."</td>";
					echo "<td>".$left."</td>";
					echo "<td>".$appdate."</td>";
					echo "</tr>";
				
				if (($time_passed > $days) && ($status == 'activepaid')) {
				

/*	$name = $row['name'];
	$username = $row['username'];
	$email = $row['email'];
	$appdate = $row['appdate'];
	$id = $row['id'];

					echo "<tr><td>".$name."</td>";
					echo "<td>".$username."</td>";
					echo "<td>".$email."</td>";
					echo "<td>".$left."</td>";
					echo "<td>".$appdate."</td>";
					echo "</tr>";
					*/
					$expired++;
					
	$email = strtoupper($email); 
	$email = strip_tags($email); 
	$email = trim ($email); 
	$sql5 = "select * from IP_USERS where upper(LOGIN)='$email'";
	$result5 = mysql_query( $sql5 ) or die( mysql_error() );
	$row5 = mysql_fetch_array( $result5 );
	$user_oid = $row5['USER_OID'];	
	
	if (($user_oid == '') || ($user_oid == '0')) {
		$username1 = $username;
		$sql3 = "select * from IP_USERS where DISPLAY_NAME='$username1'";
		//echo $sql2;		
		$result3 = mysql_query( $sql3 ) or die( mysql_error() );
		if( mysql_num_rows( $result3 ) > 1 ) die ("Query unexpectedly returned more than one result: " . $sql3 );
		$row3 = mysql_fetch_array( $result3 );
		$user_oid = $row3['USER_OID'];	
	}
	if (($user_oid == '') || ($user_oid == '0')) {
	$user_oid = 1;
	}	
	if ($user_oid != 1) {

	//De-Activate the family membership
	$sql9 = "delete from IP_GROUP_USERS 
			WHERE GROUP_OID = '6030090224'
			AND USER_OID = '$user_oid' LIMIT 1";

	mysql_query( $sql9 ) or die( "Error creating family group membership: " . mysql_error() . " Query: $sql9 " );

//Delete title from the account
//$sql10 = "update IP_PROFILES set USER_TITLE='' where USER_OID ='$user_oid'";
	//mysql_query( $sql10 ) or die( "Error updating IP_PROFILES: " . mysql_error() . " Query: $sql10 " );

	//Update sponsor2year to make members status as formerpaid	
		$sql11 = "update sponsor2year set 
		status = 'formerpaid'
		WHERE id='$id'";
	mysql_query( $sql11 ) or die( "Error creating new employee application: " . mysql_error() . " Query: $sql11 " );	
	
	//Send out email notifying user that the membership has expired.
	$salesemail = "lmitchell@kidswithfoodallergies.org";
			$salesemail2 = "Mcroft@kidswithfoodallergies.org";
	
			$salesemail4 = "info@kidswithfoodallergies.org";

			$salesname = "Lynda Mitchell";
			$salesname2= "Melanie Croft";
	

			$salesname4= "Melanie Croft";

			$fromname = "Kids with Food Allergies";
	$fd = popen("/usr/sbin/sendmail -t","w");
	fputs($fd, "To: $email\n");
	fputs($fd, "From: $fromname <$salesemail>\n");
	fputs($fd, "Subject: Your KFA Family Membership has Expired\n\n");
	fputs($fd, "Dear $username,\n\n");
	fputs($fd, "It is time to renew your Family Membership for Kids With Food Allergies! Your membership has ended. We trust you have found the Family Membership helpful to you and your family, and we encourage you to renew your Family Membership with us so you can continue to have full access to our growing recipe collection and educational resources, and interact on our private Family Member support forums.\n");
	fputs($fd, "Membership is still only $25 a year, a small fee that provides day-to-day access to our awesome recipe collection, premium resources and more. To renew your Family Membership you can go to https://www.kidswithfoodallergies.org/membership_purchase.html \n");

	fputs($fd, "Renew or apply for a sponsored Family Membership by going to http://www.kidswithfoodallergies.org/sponsormem.html if you are unable to afford the cost of a Family Membership.\n\n");

	fputs($fd, "If you have any questions or problems renewing, please just write to us at http://www.kidswithfoodallergies.org/email.php?to=webmaster.\n\n");
	fputs($fd, "If you would like to renew by postal mail, you can send your check to:\n\n");
	fputs($fd, "Kids With Food Allergies\n");
	fputs($fd, "73 Old Dublin Pike, Ste. 10, #163\n");
	fputs($fd, "Doylestown, PA 18901\n\n");
	fputs($fd, "If you have signed up for our biweekly newsletter, you will still continue to receive your issues.\n\n");
	fputs($fd, "Thanks for being a member of the Kids With Food Allergies online community.\n\n");
	fputs($fd, "Kind regards, \n\n");
	fputs($fd, "Melanie Croft, \nForum Coordinator\nKids With Food Allergies, Inc.\nA World of Support\nhttp://kidswithfoodallergies.org\nMcroft@kidswithfoodallergies.org\n\n");
	fputs($fd, "P.S. If you have already renewed, thank you! Just disregard this message.\n");

	pclose($fd);
	
	}
	
	}}
	$salesemail = "Mcroft@kidswithfoodallergies.org";
	//We need to check and see if they are 1 week out from the time they signed up
	//echo $time_passedsignup;
	if ($time_passedsignup == 7) {
	
	$weekmessage = "Dear ";
	$weekmessage .= $username;
	$weekmessage .= ",\n";
	$weekmessage .= "I hope you are finding your KFA Family Membership helpful!\n\n";
	$weekmessage .= "Have you checked out our newly expanded KFA Resource Center where you can browse topics such as diagnosis and testing, emotional and social issues, or navigating holidays? http://www.kidswithfoodallergies.org/resourcesnew.php\n\n";
	$weekmessage .= "Have you tried logging in to our terrific Support Forums so you can connect with other parents to share information, ask your questions, or to connect with other parents online? http://community.kidswithfoodallergies.org\n\n";
	$weekmessage .= "Have you taken advantage of our awesome Safe Eats Recipe collection with more than 1,000 recipes you can search by allergen(s) you need to avoid to come up with ideas for dinner tonight? http://kidswithfoodallergies.org/recipes/introduction.php\n\n";
	$weekmessage .= "If you need help with finding what you are looking for or if you need help logging in to access our support forum, recipe database or resources, we invite you to contact us at info@kidswithfoodallergies.org.\n\n";
	$weekmessage .= "We are so glad you've joined our thriving community! And most importantly - We really hope being part of our community helps make managing food allergies easier and helps you keep your child happy, healthy and safe!\n\n";
	$weekmessage .= "Warm regards,\n\nMelanie Croft\n KFA Membership Coordinator\n\n";
	$weekmessage .= "KFA is a non-profit 501(c)(3) organization. Please consider donating to Kids With Food Allergies and earn a  star! Follow this link for more information -- Donate to KFA!  https://www.kidswithfoodallergies.org/donate.html ";

	//# Send email 
$mailheaders = "From: $salesemail\r\n";
$mailheaders .="X-Mailer: PHP Mail generated by:Kidswithfoodallergies.org\r\n";
$subject = "Are You Finding What You Need at KFA?";
mail($myemail, $subject, $weekmessage, $mailheaders);

	//Insert actions table with this 
	$thisdate = date("Y-m-d");
	$sql2 = "insert into membership_acct set 
		memid =	'".$id."',
		mytable =	'sponsor2year',
		date =	'".$thisdate."',
		action ='Sent out Message to FM 1 Week Later'";
	mysql_query( $sql2 ) or die( "Error creating new 1 week message action: " . mysql_error() . " Query: $sql2 " );	

	}


	//Send out email if there is only a month left before their membership expires
	if ($left == '30') {

	$weekmessage = "Dear ";
	$weekmessage .= $username;
	$weekmessage .= ",\n\n";
	$weekmessage .= "It is time to renew your Family Membership for Kids With Food Allergies! We trust you have found the Family Membership helpful to you and your family, and we encourage you to renew your Family Membership with us so you can continue to have full access to our growing recipe collection and educational resources, and interact on our private Family Member support forums.\n\n";
	$weekmessage .= "Membership is still only $25 a year or 2 years for $40, and provides day-to-day access to our awesome recipe collection, premium resources, and more. To renew your Family Membership you can go to https://www.kidswithfoodallergies.org/membership_purchase.html\n\n";
	$weekmessage .= "If your circumstances have changed and you are unable to afford the cost of renewal, we will be happy to provide a sponsored Family Membership for you. You will need to request a sponsored Family Membership by going to http://www.kidswithfoodallergies.org/sponsormem.html  \n\n";
	$weekmessage .= "If we do not hear from you, your Family Membership will expire automatically at the conclusion of  subscription period. \n\n";
	$weekmessage .= "Please let me know if you have any questions about your Family Membership!\n\n";
	$weekmessage .= "Warm regards,\n\nMelanie Croft\n KFA Membership Coordinator\n\n";
	$weekmessage .= "P.S. If you have already renewed, thank you! Just disregard this message. \n\n";
	$weekmessage .= "KFA is a non-profit 501(c)(3) organization. Please consider donating to Kids With Food Allergies and earn a star! Follow this link for more information -- Donate to KFA! https://www.kidswithfoodallergies.org/donate.html";
 

	//# Send email 
$mailheaders = "From: $salesemail\r\n";
$mailheaders .="X-Mailer: PHP Mail generated by:Kidswithfoodallergies.org\r\n";
$subject = "Your KFA Family Membership Expires in 30 days";
mail($myemail, $subject, $weekmessage, $mailheaders);

	//Update actions table with this 
	$thisdate = date("Y-m-d");
	$sql2 = "insert into membership_acct set 
		memid =	'".$id."',
		mytable =	'sponsor2year',
		date =	'".$thisdate."',
		action=	'Sent out Message 30 days to FM Expiration'";
	mysql_query( $sql2 ) or die( "Error creating new employee application: " . mysql_error() . " Query: $sql2 " );	

}
//Send out an email if they have only a week before their membership expires
if ($left == '7') {

	$weekmessage = "Dear ";
	$weekmessage .= $username;
	$weekmessage .= ",\n\n";
	$weekmessage .= "Your Family Membership will expire soon! It is time to renew your Family Membership for Kids With Food Allergies. We trust you have found the Family Membership helpful to you and your family, and we encourage you to renew your Family Membership with us so you can continue to have full access to our growing recipe collection and educational resources, and interact on our private Family Member support forums.\n\n";
	$weekmessage .= "Membership is still only $25 a year, and provides ay-to-day access to our awesome recipe collection, premium resources, and more.\n\n";
	$weekmessage .= "To renew your Family Membership you can go to https://www.kidswithfoodallergies.org/membership_purchase.html\n\n";
	$weekmessage .= "If your circumstances have changed and you are unable to afford the cost of renewal, we will be happy to provide a sponsored Family Membership for you. You will need to request a sponsored Family Membership.\n\n";
	$weekmessage .= "If we do not hear from you, your Family Membership will expire automatically at the conclusion of your subscription period.\n\n";
	$weekmessage .= "Please let me know if you have any questions about your Family Membership!\n\n";
	$weekmessage .= "Warm regards,\n\n Melanie Croft\n KFA Membership Coordinator\n\n";
	$weekmessage .= "P.S. If you’ve already renewed, thank you! Just disregard this message.\n\n";
	$weekmessage .= "KFA is a non-profit 501(c)(3) organization. Please consider donating to Kids With Food Allergies and earn a star! Follow this link for more information -- Donate to KFA!  https://www.kidswithfoodallergies.org/donate.html";


	//# Send email 
$mailheaders = "From: $salesemail\r\n";
$mailheaders .="X-Mailer: PHP Mail generated by:Kidswithfoodallergies.org\r\n";
$subject = "Your KFA Family Membership Expires in 1 Week";
mail($myemail, $subject, $weekmessage, $mailheaders);

	//Update actions table with this 
	$thisdate = date("Y-m-d");
	$sql2 = "insert into membership_acct set 
		memid =	'".$id."',
		mytable =	'sponsor2year',
		date =	'".$thisdate."',
		action=	'Sent out Message 7 days to FM Expiration'";
	mysql_query( $sql2 ) or die( "Error creating new employee application: " . mysql_error() . " Query: $sql2 " );	
}	

if ($numleft == '-30') {
// Send out an email if they have not signed up a month after their stuff expires

	$weekmessage = "Dear ";
	$weekmessage .= $username;
	$weekmessage .= ",\n\n";
	$weekmessage .= "Your Family Membership has expired and we miss you being a part of our wonderful community! Since we have not heard from you, your Family Membership expired automatically at the conclusion of your subscription period.\n\n";
	$weekmessage .= "I encourage you to renew your Family Membership with us so you can continue to have full access to our growing recipe collection and educational resources, and interact on our private Family Member support forums.\n\n";
	$weekmessage .= "Membership is still only $25 a year or 2 years for $40, and provides ay-to-day access to our awesome recipe collection, premium resources,  and more.\n\n";
	$weekmessage .= "To renew your Family Membership you can go to https://www.kidswithfoodallergies.org/membership_purchase.html\n\n";
	$weekmessage .= "If your circumstances have changed and you are unable to afford the cost of renewal, we will be happy to provide a sponsored Family Membership for you. You will need to request a sponsored Family Membership.\n\n";
	$weekmessage .= "Please let me know if you have any questions about your Family Membership!\n\n";
	$weekmessage .= "Warm regards,\n\n Melanie Croft\n KFA Membership Coordinator\n\n";
	$weekmessage .= "P.S. If you have already renewed, thank you! Just disregard this message.\n\n";
	$weekmessage .= "KFA is a non-profit 501(c)(3) organization. Please consider donating to Kids With Food Allergies and earn a star! Follow this link for more information -- Donate to KFA!  https://www.kidswithfoodallergies.org/donate.html";

		//# Send email 
$mailheaders = "From: $salesemail\r\n";
$mailheaders .="X-Mailer: PHP Mail generated by:Kidswithfoodallergies.org\r\n";
$subject = "Your KFA Family Membership Has Expired";
mail($myemail, $subject, $weekmessage, $mailheaders);

	//Update actions table with this 
	$thisdate = date("Y-m-d");
	$sql2 = "insert into membership_acct set 
		memid =	'".$id."',
		mytable =	'sponsor2year',
		date =	'".$thisdate."',
		action=	'Sent out Message FM Expirated 30 days ago'";
	mysql_query( $sql2 ) or die( "Error creating new employee application: " . mysql_error() . " Query: $sql2 " );	

}
			
		$name = '';
		$username = '';
		$email = '';
		$appdate = '';
		$time_passed = '';
		$myemail = '';
		$total++;		
			} 

	echo "</table>";


	echo "<br><br>";
	if (($expired < 1)) echo "There are no 'Active' 2 Year Paid Memberships that have expired<br><br>";

	//echo "Total number of Active 2 Year Memberships: ".$total."<br>";
	//echo "Total number of expired 2 Year Paid Memberships: ".$expired."<br>";
//test admin send me an email
/*
	$fp = popen("/usr/sbin/sendmail -t","w");
	fputs($fp, "To: heather@allergicchild.com\n");
	fputs($fp, "From: the server <test@email.com>\n");
	fputs($fp, "Subject: 2 Year Membership De-Activated\n\n");
	fputs($fp, "test, has had their Family Membership De-Activated.\n\n");
	fputs($fp, "E-mail Address: test\n");
	fputs($fp, "Username: test\n");
	fputs($fp, "Thanks Again,\n\n");

	fputs($fp, "me\nComunity Manager\nheather@allergicchild.com\nwww.kidswithfoodallergies.org\n");
	pclose($fp);
	*/

?>
</td></tr></table>
<?php
	include("htmlfooter.php");

?>
