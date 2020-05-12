<?php
	include( "config.php" );
	include("common.php");
	$title = "1 Year Memberships that will Expire";
	$days = 365;
	//$days = $_REQUEST['days'];
	$otherdays = 365 - $days;
	$user = $_REQUEST['user'];
	$email = 'heather@allergicchild.com';
				$username = 'habbott';	
	$email = strtoupper($email); 
	$email = strip_tags($email); 
	$email = trim ($email); 
	$myemail = $email;

	$renewmessage = true;
	$strMessageBody2 = "<html>
				    <body style='font-family:Verdana;font-size:12px;line-height:1.5em;'>
					<img src='http://www.kidswithfoodallergies.org/images/emailLogo.png' width='150' height='143' alt='kidswithfoodallergies.org' align='left' style='margin:10px;'/>
					<br /><br />Subscription: Confirmed<br>";
if ($renewmessage) {
					
  $strMessageBody2 .="We are thrilled you have renewed your Family Membership with Kids With Food Allergies Foundation!   "
					."We look forward to continuing to work together to manage your child's food allergies.<br><br>";
} else {
  $strMessageBody2 .="Thank you for choosing to become a Family Member of Kids With Food Allergies Foundation!   "
  				    ."We look forward to helping you manage your child's food allergies.<br><br>"
					."Your membership will be upgraded in our system within the next 24 hours.  If you need access "
					."immediately, please do not hesitate to contact us at the email address below.  We will be sure "
					."you are able to get to the information you need. <br><br>";

}
$strMessageBody2 .="We hope you have been able to make full use of your Family Membership benefits including:"
					."<ul><li>Exclusive online resources including sample 504 plans and food allergens in vaccines!<br>&nbsp;</li>"
					."<li>Access to the complete collection of more than 1,200 awesome Safe Eats Recipes!</li></ul>"
					."Your Family Membership also includes a Welcome Kit mailed to your home with educational materials, "
					."coupons and free samples.   Your kit will be on its way soon!<br><br>"
					."If you have any questions or need help with our website, or if you have ideas or suggestions to share,"
					." please contact us.<br><br>";
if($renewmessage) {
	$strMessageBody2 .="Once again, thank you for renewing your Family Membership and for being part of our community!   ";	
} else {
	$strMessageBody2 .="Once again, thank you for becoming a Family Member and being part of our community!   ";
}
		$strMessageBody2 .="
					We look forward to continuing to work together to keep your child safe, healthy and included in daily "
					." activities.<br><br>"
					."Kind Regards,<br><br>Melanie Croft<br>Membership Coordinator<br>"
					."<a href='mailto:info@kidswithfoodallergies.org' target='_blank' />info@kidswithfoodallergies.org</a>";
//if ($renewmessage) $strMessageBody2 .= "<br><br>P.S. ".$renewmessage;
$strMessageBody2 .= "<br><br>Your purchase information is detailed below; you can print this confirmation for your records.\n";
$strMessageBody2 .= "Purchase made by:\n";
$strMessageBody2 .=    stripslashes($x_first_name)." ".stripslashes($x_last_name)." <br>";
$strMessageBody2 .=    stripslashes($x_address)." <br>";
$strMessageBody2 .=    stripslashes($x_city).", ".stripslashes($x_state)."  ".stripslashes($x_zip)." <br>";
$strMessageBody2 .=    stripslashes($x_country)." <br>";
$strMessageBody2 .=    stripslashes($x_phone)." <br>";
$strMessageBody2 .=    stripslashes($x_fax)." <br>";
$strMessageBody2 .=    stripslashes($x_email)." <br>";
$strMessageBody2 .= "Description: $x_description<br>";
$strMessageBody2 .= "Comments: ".stripslashes($comments)."<br>";
$strMessageBody2 .= "Order TOTAL: $x_amount <br>";
$strMessageBody2 .= "Order Date: $today <br>";
$strMessageBody2 .= " <br><br>";

$salesemail = "info@kidswithfoodallergies.org";
//# Send email confirmation to customer.....
$mailheaders = "From: " . strip_tags($salesemail) . "\r\n";
$mailheaders .= "Reply-To: ". strip_tags($salesemail) . "\r\n";
$mailheaders .= "MIME-Version: 1.0\r\n";
$mailheaders .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$subject2 = "Your Kids With Food Allergies Foundation Family Membership Confirmation";
mail('heather@allergicchild.com', $subject2, $strMessageBody2, $mailheaders);
	

$renewmessage = false;
	$strMessageBody2 = "<html>
				    <body style='font-family:Verdana;font-size:12px;line-height:1.5em;'>
					<img src='http://www.kidswithfoodallergies.org/images/emailLogo.png' width='150' height='143' alt='kidswithfoodallergies.org' align='left' style='margin:10px;'/>
					<br /><br />Subscription: Confirmed<br>";
if ($renewmessage) {
					
  $strMessageBody2 .="We are thrilled you have renewed your Family Membership with Kids With Food Allergies Foundation!   "
					."We look forward to continuing to work together to manage your child's food allergies.<br><br>";
} else {
  $strMessageBody2 .="Thank you for choosing to become a Family Member of Kids With Food Allergies Foundation!   "
  				    ."We look forward to helping you manage your child's food allergies.<br><br>"
					."Your membership will be upgraded in our system within the next 24 hours.  If you need access "
					."immediately, please do not hesitate to contact us at the email address below.  We will be sure "
					."you are able to get to the information you need. <br><br>";

}
$strMessageBody2 .="We hope you have been able to make full use of your Family Membership benefits including:"
					."<ul><li>Exclusive online resources including sample 504 plans and food allergens in vaccines!<br>&nbsp;</li>"
					."<li>Access to the complete collection of more than 1,200 awesome Safe Eats Recipes!</li></ul>"
					."Your Family Membership also includes a Welcome Kit mailed to your home with educational materials, "
					."coupons and free samples.   Your kit will be on its way soon!<br><br>"
					."If you have any questions or need help with our website, or if you have ideas or suggestions to share,"
					." please contact us.<br><br>";
if($renewmessage) {
	$strMessageBody2 .= "Once again, thank you for renewing your Family Membership and for being part of our community!   ";	
} else {
	$strMessageBody2 .= "Once again, thank you for becoming a Family Member and being part of our community!   ";
}
		$strMessageBody2 .= "
					We look forward to continuing to work together to keep your child safe, healthy and included in daily "
					." activities.<br><br>"
					."Kind Regards,<br><br>Melanie Croft<br>Membership Coordinator<br>"
					."<a href='mailto:info@kidswithfoodallergies.org' target='_blank' />info@kidswithfoodallergies.org</a>";
//if ($renewmessage) $strMessageBody2 .= "<br><br>P.S. ".$renewmessage;
$strMessageBody2 .= "<br><br>Your purchase information is detailed below; you can print this confirmation for your records.\n";
$strMessageBody2 .= "Purchase made by:\n";
$strMessageBody2 .=    stripslashes($x_first_name)." ".stripslashes($x_last_name)." <br>";
$strMessageBody2 .=    stripslashes($x_address)." <br>";
$strMessageBody2 .=    stripslashes($x_city).", ".stripslashes($x_state)."  ".stripslashes($x_zip)." <br>";
$strMessageBody2 .=    stripslashes($x_country)." <br>";
$strMessageBody2 .=    stripslashes($x_phone)." <br>";
$strMessageBody2 .=    stripslashes($x_fax)." <br>";
$strMessageBody2 .=    stripslashes($x_email)." <br>";
$strMessageBody2 .= "Description: $x_description<br>";
$strMessageBody2 .= "Comments: ".stripslashes($comments)."<br>";
$strMessageBody2 .= "Order TOTAL: $x_amount <br>";
$strMessageBody2 .= "Order Date: $today <br>";
$strMessageBody2 .= " <br><br>";

$salesemail = "info@kidswithfoodallergies.org";
//# Send email confirmation to customer.....
$mailheaders = "From: " . strip_tags($salesemail) . "\r\n";
$mailheaders .= "Reply-To: ". strip_tags($salesemail) . "\r\n";
$mailheaders .= "MIME-Version: 1.0\r\n";
$mailheaders .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$subject2 = "Your KFA Family Membership Confirmation";
mail('heather@allergicchild.com', $subject2, $strMessageBody2, $mailheaders);
	
	
	
	
	
	/// this is only for new members NOT renewing members
$renewal = "Y";	
$weekmessage = "<html>
				    <body style='font-family:Verdana;font-size:12px;line-height:1.5em;'>
					<img src='http://www.kidswithfoodallergies.org/images/emailLogo.png' width='150' height='143' alt='kidswithfoodallergies.org' align='left' style='margin:10px;'/>
					<br /><br />Dear ";
	$weekmessage .= $username;
	$weekmessage .= ",<br /><br />";
	if($renewal=="Y"){
		
		$weekmessage .= "We are thrilled you renewed your Family Membership with Kids With Food Allergies Foundation.  We are here to do all we can to help keep food allergic kids safe, healthy and happy!  <br /><br />";
	} else {
		$weekmessage .= "We are thrilled you have purchased a Family Membership with Kids With Food Allergies Foundation.  "
						."We are here to do all we can to help keep food allergic kids safe, healthy and happy! <br /><br /> ";
	
	}// end if renewal
	
			$weekmessage .= "If you haven't had the chance to look around all areas of the KFA website, please explore the "
						."ways we can help you:<br /><br />"
						."<ul><li>Look through the extensive KFA Resource Center where you can browse topics such as "
						." <a href='http://www.kidswithfoodallergies.org/resourcetopic.php?topic=diagnosis-testing' target='_blank' />diagnosis and testing</a>, <a href='http://www.kidswithfoodallergies.org/resourcetopic.php?topic=emotional_social' target='_blank' />emotional and social issues</a>, and <a href='http://www.kidswithfoodallergies.org/resourcetopic.php?topic=holidays' target='_blank' />navigating holidays</a>.<br>&nbsp;</li>"
						."<li>Explore the awesome <a href='http://www.kidswithfoodallergies.org/recipes.html' target='_blank' />Safe Eats Recipe collection</a> with more than 1,000 recipes you can search "
						." by allergen(s) you need to avoid to come up with ideas for dinner tonight.<br>&nbsp;</li>"
						."<li>Check out the numerous <a href='http://community.kidswithfoodallergies.org/forums' target='_blank' />Support Forums</a> where you can share information, ask questions, "
						."or to just connect with other parents online.</li></ul>"
						."If you need help with finding what you are looking for or if you need help logging in to access our support forums, recipe database or resources, please contact us at <a href='mailto:info@kidswithfoodallergies.org' />info@kidswithfoodallergies.org</a>.<br><br>"
						."We are so glad you've joined our thriving community! We are here to make managing food allergies easier for you and help you keep your child happy, healthy and safe!  Please contact us with any comments or suggestions you might have.<br><br>
						Kind Regards,<br /><br />Melanie Croft<br />Membership Coordinator<br /><a href='mailto:info@kidswithfoodallergies.org'>info@kidswithfoodallergies.org</a><br><br>
						KFA is a non-profit 501(c)(3) organization. Please consider donating to <br>
Kids With Food Allergies Foundation. <a href='https://www.kidswithfoodallergies.org/donate.html' target='_blank' />https://www.kidswithfoodallergies.org/donate.html
</a>";

	$weekmessage .= "</body></html>";

	//# Send email 
	$mailheaders = "From: " . strip_tags($salesemail) . "\r\n";
	$mailheaders .= "Reply-To: ". strip_tags($salesemail) . "\r\n";
	$mailheaders .= "MIME-Version: 1.0\r\n";
	$mailheaders .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	if($renewal=="Y") $subject = "Your Kids With Food Allergies Foundation Family Membership";
	else $subject = "Thank you for becoming a Family Member of Kids With Food Allergies Foundation!";

	mail($myemail, $subject, $weekmessage, $mailheaders);
	
	$renewal="N";
	$weekmessage = "<html>
				    <body style='font-family:Verdana;font-size:12px;line-height:1.5em;'>
					<img src='http://www.kidswithfoodallergies.org/images/emailLogo.png' width='150' height='143' alt='kidswithfoodallergies.org' align='left' style='margin:10px;'/>
					<br /><br />Dear ";
	$weekmessage .= $username;
	$weekmessage .= ",<br /><br />";
	if($renewal=="Y"){
		
		$weekmessage .= "We are thrilled you renewed your Family Membership with Kids With Food Allergies Foundation.  We are here to do all we can to help keep food allergic kids safe, healthy and happy!  <br /><br />";
	} else {
		$weekmessage .= "We are thrilled you have purchased a Family Membership with Kids With Food Allergies Foundation.  "
						."We are here to do all we can to help keep food allergic kids safe, healthy and happy! <br /><br /> ";
	
	}// end if renewal
	
			$weekmessage .= "If you haven't had the chance to look around all areas of the KFA website, please explore the "
						."ways we can help you:<br /><br />"
						."<ul><li>Look through the extensive KFA Resource Center where you can browse topics such as "
						." <a href='http://www.kidswithfoodallergies.org/resourcetopic.php?topic=diagnosis-testing' target='_blank' />diagnosis and testing</a>, <a href='http://www.kidswithfoodallergies.org/resourcetopic.php?topic=emotional_social' target='_blank' />emotional and social issues</a>, and <a href='http://www.kidswithfoodallergies.org/resourcetopic.php?topic=holidays' target='_blank' />navigating holidays</a>.<br>&nbsp;</li>"
						."<li>Explore the awesome <a href='http://www.kidswithfoodallergies.org/recipes.html' target='_blank' />Safe Eats Recipe collection</a> with more than 1,000 recipes you can search "
						." by allergen(s) you need to avoid to come up with ideas for dinner tonight.<br>&nbsp;</li>"
						."<li>Check out the numerous <a href='http://community.kidswithfoodallergies.org/forums' target='_blank' />Support Forums</a> where you can share information, ask questions, "
						."or to just connect with other parents online.</li></ul>"
						."If you need help with finding what you are looking for or if you need help logging in to access our support forums, recipe database or resources, please contact us at <a href='mailto:info@kidswithfoodallergies.org' />info@kidswithfoodallergies.org</a>.<br><br>"
						."We are so glad you've joined our thriving community! We are here to make managing food allergies easier for you and help you keep your child happy, healthy and safe!  Please contact us with any comments or suggestions you might have.<br><br>
						Kind Regards,<br /><br />Melanie Croft<br />Membership Coordinator<br /><a href='mailto:info@kidswithfoodallergies.org'>info@kidswithfoodallergies.org</a><br><br>
						KFA is a non-profit 501(c)(3) organization. Please consider donating to <br>
Kids With Food Allergies Foundation. <a href='https://www.kidswithfoodallergies.org/donate.html' target='_blank' />https://www.kidswithfoodallergies.org/donate.html
</a>";

	$weekmessage .= "</body></html>";

	//# Send email 
	$mailheaders = "From: " . strip_tags($salesemail) . "\r\n";
	$mailheaders .= "Reply-To: ". strip_tags($salesemail) . "\r\n";
	$mailheaders .= "MIME-Version: 1.0\r\n";
	$mailheaders .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	if($renewal=="Y") $subject = "Your Kids With Food Allergies Foundation Family Membership";
	else $subject = "Thank you for becoming a Family Member of Kids With Food Allergies Foundation!";

	mail($myemail, $subject, $weekmessage, $mailheaders);
    /*
	//Insert actions table with this 
	$thisdate = date("Y-m-d");
	$sql2 = "insert into membership_acct set 
		memid =	'".$id."',
		mytable =	'sponsor',
		date =	'".$thisdate."',
		action ='Sent out Message to FM 1 Week Later'";
	mysql_query( $sql2 ) or die( "Error creating new 1 week message action: " . mysql_error() . " Query: $sql2 " );	

*/
//Send out an email if they have only a week before their membership expires
//if ($left == '7') {

	$weekmessage = "Dear ";
	$weekmessage .= $username;
	$weekmessage .= ",\n\n";
	$weekmessage .= "Your Family Membership will expire soon! It is time to renew your Family Membership for Kids With Food Allergies. We trust you have found the Family Membership helpful to you and your family, and we encourage you to renew your Family Membership with us so you can continue to have full access to our growing recipe collection and educational resources, interact on our Friends Connection service, join in on our hosted live chats, and receive our twice-yearly magazine, Support Net.\n\n";
	$weekmessage .= "Membership is still only $25 a year or 2 years for $40, and provides day-to-day access to our awesome recipe collection, premium resources, Friends Connection and more. \n\n";
	$weekmessage .= "To renew your Family Membership you can go to https://www.kidswithfoodallergies.org/membership_purchase.html\n\n";
	$weekmessage .= "If your circumstances have changed and you are unable to afford the cost of renewal, we will be happy to provide a sponsored Family Membership for you. You will need to request a sponsored Family Membership  by going to http://www.kidswithfoodallergies.org/sponsormem.html \n\n";
	$weekmessage .= "If we do not hear from you, your Family Membership will expire automatically at the conclusion of your 12 month subscription period which began on ";
	$weekmessage .= $signupdate;
	$weekmessage .= ", and your membership will revert to Associate Membership status.\n\n";
	$weekmessage .= "Please let me know if you have any questions about your Family Membership!\n\n";
	$weekmessage .= "Warm regards,\n\n Melanie Croft\n KFA Membership Coordinator\n\n";
	$weekmessage .= "P.S. If you have already renewed, thank you! Just disregard this message.\n\n";
	$weekmessage .= "KFA is a non-profit 501(c)(3) organization. Please consider donating to Kids With Food Allergies and earn a 2009 star!! Follow this link for more information -- Donate to KFA!  https://www.kidswithfoodallergies.org/donate.html";


	//# Send email 
$mailheaders = "From: $salesemail\r\n";
$mailheaders .="X-Mailer: PHP Mail generated by:Kidswithfoodallergies.org\r\n";
$subject = "Your KFA Family Membership Expires in 1 Week";
mail($myemail, $subject, $weekmessage, $mailheaders);

	//Update actions table with this 
	$thisdate = date("Y-m-d");
	$sql2 = "insert into membership_acct set 
		memid =	'".$id."',
		mytable =	'sponsor',
		date =	'".$thisdate."',
		action=	'Sent out Message 7 days to FM Expiration'";
	mysql_query( $sql2 ) or die( "Error creating new employee application: " . mysql_error() . " Query: $sql2 " );	
//}	

  	
	// Here are all the emails that are sent from edit member screen
	///////////////////////////////////////////////////////////////////
	
	$fromname = "Kids with Food Allergies";
	$salesemail = "info@kidswithfoodallergies.org";
	$salesname2 = "Melanie Croft";
	
	
	$sponMessage =  "Dear $username,<br><br>"
					."Welcome! I have added you as a Sponsored Family Member..<br><br>"
					."As a new Family Member, I welcome you to Kids With Food Allergies and invite you to post a message "
					."and introduce yourself in our Kids With Food allergies Family Forums (if you have not already done so) "
					."and to take full advantage of the other membership benefits your Family Membership provides you. <br><br>"
					."Your membership benefits give you special access to parts of our Web site not open to the public. "
					."To access everything, you will need to log in with your email address and the password you established "
					."at registration.  To make things easier when you visit our Web site, check the box "
					."\"Remember Me for Kids With Food Allergies\" when you first log in. Doing that will eliminate "
					."the need to reenter your email address and password each time you visit our Web site.<br><br>"
					."The following is a list of the additional privileges you will now have on our Web site and in "
					."our support community.<br><br>"
					." * Connect and share with other parents by logging in "
					."<a href='http://kidswithfoodallergies.org/eve/forums' target='_blank' />"
					."http://kidswithfoodallergies.org/eve/forums</a> to our very popular and active Kids "
					."With Food Allergies Family Forums online community<br>"
					." * Learn how to live better by accessing articles, videos and more in our growing Online "
					."Resource Center <a href='http://www.kidswithfoodallergies.org/resources/resourcesnew.php' target='_blank' />http://www.kidswithfoodallergies.org/resources/resourcesnew.php</a> <br>"
					." * Get help with food and cooking by using our growing, searchable Safe Eats Recipe Database, " 
					."<a href='http://kidswithfoodallergies.org/recipes/introduction.php' target='_blank' />http://kidswithfoodallergies.org/recipes/introduction.php</a><br>"
					." * A twice yearly publication, The Kids With Food Allergies Support Net, just for Family Membership "
					."subscribers .You can view the most recent issue by going to "
					."<a href='http://www.kidswithfoodallergies.org/resourcetopic.php?topic=supportnet' target='_blank' />"
					."http://www.kidswithfoodallergies.org/resourcetopic.php?topic=supportnet</a> and scroll down to find "
					."the most recent issue.<br><br>"
					." To learn more about your family membership, and using your new privileges, please see:<br><br>"
					."<a href='http://kidswithfoodallergies.org/eve/forums/a/tpc/f/7440057262/m/8530099723' target='_blank' />"
					."http://kidswithfoodallergies.org/eve/forums/a/tpc/f/7440057262/m/8530099723</a><br><br>"
					."Due to cost, we are unable to offer the Kids With Food Allergies Welcome kit to sponsored members.<br><br>"
					." We very much appreciate your support and you being a member of Kids With Food Allergies! <br><br>"
					."Sincerely, <br><br>"
					.$salesname2."<br>Forum Coordinator<br>'A World of Support'<br>".$salesemail
					."<br><a href='http://www.kidswithfoodallergies.org' target='_blank' />www.kidswithfoodallergies.org</a><br>";

	
	//# Send email 
	$mailheaders = "From: " . strip_tags($salesemail) . "\r\n";
	$mailheaders .= "Reply-To: ". strip_tags($salesemail) . "\r\n";
	$mailheaders .= "MIME-Version: 1.0\r\n";
	$mailheaders .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$subject = "Sponsor Membership Approved";
	mail($myemail, $subject, $sponMessage, $mailheaders);
	
	
	$fp = popen("/usr/sbin/sendmail -t","w");
	fputs($fp, "To: $myemail\n");
	fputs($fp, "From: $name <$email>\n");
	fputs($fp, "Subject: Sponsor Membership Approved\n\n");
	fputs($fp, "$name, has been approved to receive a Sponsored Family Membership.\n\n");
	fputs($fp, "E-mail Address: $email\n");
	fputs($fp, "Username: $username\n");
	fputs($fp, "Thanks Again,\n\n");

	fputs($fp, "$salesname\nComunity Manager\n$salesemail\nwww.kidswithfoodallergies.org\n");
	pclose($fp);



	$compEmail = "Dear $username,<br><br>"
				."Welcome! You now have a complimentary one year Family Membership with Kids With Food Allergies.<br><br>"
				."As a new Family Member, I welcome you to Kids With Food Allergies and invite you to post a message and "
				."introduce yourself in our Kids With Food allergies Family Forums (if you have not already done so) and to "
				."take full advantage of the other membership benefits your Family Membership provides you. <br><br>"
				."Your membership benefits give you special acess to parts of our Web site not open to the public. "
				."To access everything, you will need to log in with your email address and the password you established at "
				."registration.  To make things easier when you visit our Web site, check the box "
				."\"Remember Me for Kids With Food Allergies\" when you first log in. Doing that will eliminate the need to "
				."reenter your email address and password each time you visit our Web site.<br><br>"
				."The following is a list of the additional privileges you will now have on our Web site and in our support "
				."community.<br><br>"
				." * Connect and share with other parents by logging in <a href='http://kidswithfoodallergies.org/eve/forums' "
				."target='_blank' />http://kidswithfoodallergies.org/eve/forums</a> to our very popular and active "
				."Kids With Food Allergies Family Forums online community<br>"
				." * Learn how to live better by accessing articles, videos and more in our growing online Resource Center "
				."<a href='http://www.kidswithfoodallergies.org/resources/resourcesnew.php' target='_blank' />"
				."http://www.kidswithfoodallergies.org/resources/resourcesnew.php</a><br>"
				." * Get help with food and cooking by using our growing, searchable Safe Eats Recipe Database, "
				."<a href='http://kidswithfoodallergies.org/recipes/introduction.php' target='_blank' />"
				."http://kidswithfoodallergies.org/recipes/introduction.php</a><br>"
				." * Receive a twice yearly publication, The Kids With Food Allergies Support Net, just for Family Membership "
				."subscribers .You can view the most recent issue by going to "
				."<a herf='http://www.kidswithfoodallergies.org/resourcetopic.php?topic=supportnet' target='_blank' />"
				."http://www.kidswithfoodallergies.org/resourcetopic.php?topic=supportnet</a> and scroll down to find "
				."the most recent issue. <br><br>"
				." To learn more about your family membership, and using your new privileges, please see:<br><br>"
				." <a href='http://kidswithfoodallergies.org/eve/forums/a/tpc/f/7440057262/m/8530099723' target='_blank' />"
				."http://kidswithfoodallergies.org/eve/forums/a/tpc/f/7440057262/m/8530099723</a><br><br>"
				." We very much appreciate your support and you being a member of Kids With Food Allergies! <br><br>"
				."Sincerely, <br><br>"
				.$salesname2."<br>Membership Coordinator<br>'A World of Support'<br>".$salesemail2
				."<a href='http://www.kidswithfoodallergies.org' target='_blank' />www.kidswithfoodallergies.org</a><br>";


	# Send email 
	$mailheaders = "From: " . strip_tags($salesemail) . "\r\n";
	$mailheaders .= "Reply-To: ". strip_tags($salesemail) . "\r\n";
	$mailheaders .= "MIME-Version: 1.0\r\n";
	$mailheaders .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$subject = "Complimentary Membership Approved";
	mail($myemail, $subject, $sponMessage, $mailheaders);

	$fp = popen("/usr/sbin/sendmail -t","w");
	fputs($fp, "To: $myemail\n");
	fputs($fp, "From: $name <$email>\n");
	fputs($fp, "Subject: Complimentary Membership Approved\n\n");
	fputs($fp, "$name, has been approved to receive a Complimentary Sponsored Family Membership.\n\n");
	fputs($fp, "E-mail Address: $email\n");
	fputs($fp, "Username: $username\n");
	fputs($fp, "Thanks Again,\n\n");

	fputs($fp, "$salesname\nComunity Manager\n$salesemail\nwww.kidswithfoodallergies.org\n");
	pclose($fp);
		
	/// Welcome email for Membership Activitated
	
	$memActive = "Dear $username,<br><br>"
				."Thank you for becoming a KFA Family Membership subscriber! As a new Family<br>"
				."Member,  I welcome you to Kids With Food Allergies and invite you to post a message and introduce yourself "
				."in our Kids With Food allergies Family Forums (if you have not already done so) and to take full advantage of "
				."the other membership benefits your Family Membership provides you. <br><br>"
				."Your membership benefits give you special access to parts of our Web site not open to the public. "
				."To access everything, you will need to log in with your email address and the password you established at registration.  To make things easier when you visit our Web site, check the box \"Remember Me for Kids With Food Allergies\" when you first log in. Doing that will eliminate the need to reenter your email address and password each time you visit our Web site.<br><br>"
				."The following is a list of the additional privileges you will now have on our Web site and in our support community.<br><br>"
				." * Connect and share with other parents by logging in <a href='http://kidswithfoodallergies.org/eve/forums' "
				."target='_blank' />http://kidswithfoodallergies.org/eve/forums</a> to our very popular and active "
				."Kids With Food Allergies Family Forums online community<br>"
				." * Learn how to live better by accessing articles, videos and more in our growing online Resource Center "
				."<a href='http://www.kidswithfoodallergies.org/resources/resourcesnew.php' target='_blank' />"
				."http://www.kidswithfoodallergies.org/resources/resourcesnew.php</a><br>"
				." * Get help with food and cooking by using our growing, searchable Safe Eats Recipe Database, "
				."<a href='http://kidswithfoodallergies.org/recipes/introduction.php' target='_blank' />"
				."http://kidswithfoodallergies.org/recipes/introduction.php</a><br>"
				." * Receive a twice yearly publication, The Kids With Food Allergies Support Net, just for Family Membership "
				."subscribers .You can view the most recent issue by going to "
				."<a herf='http://www.kidswithfoodallergies.org/resourcetopic.php?topic=supportnet' target='_blank' />"
				."http://www.kidswithfoodallergies.org/resourcetopic.php?topic=supportnet</a> and scroll down to find "
				."the most recent issue. <br><br>"
				." To learn more about your family membership, and using your new privileges, please see:<br><br>"
				." <a href='http://kidswithfoodallergies.org/eve/forums/a/tpc/f/7440057262/m/8530099723' target='_blank' />"
				."http://kidswithfoodallergies.org/eve/forums/a/tpc/f/7440057262/m/8530099723</a><br><br>"
				." We very much appreciate your support and you being a member of Kids With Food Allergies! <br><br>"
				."Sincerely, <br><br>"
				.$salesname2."<br>Membership Coordinator<br>'A World of Support'<br>".$salesemail2
				."<a href='http://www.kidswithfoodallergies.org' target='_blank' />www.kidswithfoodallergies.org</a><br>";
	
	# Send email 
	$mailheaders = "From: " . strip_tags($salesemail) . "\r\n";
	$mailheaders .= "Reply-To: ". strip_tags($salesemail) . "\r\n";
	$mailheaders .= "MIME-Version: 1.0\r\n";
	$mailheaders .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$subject = "Membership Actived";
	mail($myemail, $subject, $sponMessage, $mailheaders);

	$fp = popen("/usr/sbin/sendmail -t","w");
	fputs($fp, "To: $myemail\n");
	fputs($fp, "From: $name <$email>\n");
	fputs($fp, "Subject: Membership Activated\n\n");
	fputs($fp, "$name, has had their Family Membership Activated.\n\n");
	fputs($fp, "E-mail Address: $email\n");
	fputs($fp, "Username: $username\n");
	fputs($fp, "Thanks Again,\n\n");

	fputs($fp, "$salesname\nComunity Manager\n$salesemail\nwww.kidswithfoodallergies.org\n");
	pclose($fp);
		

// Renew your membership please



	$dontForget = "Dear $username,<br><br>"
				 ."It is time to renew your Family Membership for Kids With Food Allergies! We trust you have found the Family Membership helpful to you and your family, and we encourage you to renew your Family Membership with us so you can continue to have full access to our support forums, our growing recipe database and educational resources, and our twice yearly e-publication, Support Net.<br>"
				 ."Membership is still only $25 for one year, or $40 for two years,an amazing value to connect and share, learn how to live better, get help with food and cooking  and obtain additional day-to-day support for raising a child with food allergies. <br>"
				 ."To renew your Family Membership:<br><br>"
				 ."Renew or purchase a Family Membership by going to <a href='http://kidswithfoodallergies.org/eve/thrive' target='_blank' />http://kidswithfoodallergies.org/eve/thrive</a><br><br>"
				 ."Renew or apply for a Sponsored Family Membership by going to <a href='https://www.kidswithfoodallergies.org/sponsormem.html' target='_blank' />https://www.kidswithfoodallergies.org/sponsormem.html</a> if you are unable to afford the cost of a Family Membership.<br><br>"
				 ."If you have any questions or problems renewing, please just write to us at <a href='http://www.kidswithfoodallergies.org/email.php?to=webmaster' target='_blank' />http://www.kidswithfoodallergies.org/email.php?to=webmaster</a>.<br><br>"
				 ."If you'd like to renew by postal mail, you can send your check to:<br><br>"
				 ."Kids With Food Allergies, Inc.<br>"
				 ."73 Old Dublin Pike, Ste. 10, #163<br>"
				 ."Doylestown, PA 18901<br><br>"
				 ."If we do not hear from you, your Family Membership will expire in 30 days, and your membership will revert to Associate Membership status. If you have signed up for our monthly newsletter, you will still continue to receive your monthly issues.<br><br>"
				 ."Thanks for being a member of the Kids With Food Allergies online community.<br><br>"
				 ."Kind regards, <br><br>"
				 ."Melanie Croft, <br>Membership Coordinator<br>Kids With Food Allergies, Inc.<br>"
				 ."A World of Support<br><a href='http://kidswithfoodallergies.org' target='_blank' />http://kidswithfoodallergies.org</a><br><a href='mailto:info@kidswithfoodallergies.org'>info@kidswithfoodallergies.org</a><br><br>"
				 ."P.S. If you've already renewed, thank you! Just disregard this message.<br>";
		
	# Send email 
	$mailheaders = "From: " . strip_tags($salesemail) . "\r\n";
	$mailheaders .= "Reply-To: ". strip_tags($salesemail) . "\r\n";
	$mailheaders .= "MIME-Version: 1.0\r\n";
	$mailheaders .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$subject = "Renew your Membership";
	mail($myemail, $subject, $sponMessage, $mailheaders);


	$fp = popen("/usr/sbin/sendmail -t","w");
	fputs($fp, "To: $myemail\n");
	fputs($fp, "From: $name <$email>\n");
	fputs($fp, "Subject: Membership Renewal\n\n");
	fputs($fp, "$name, has been sent a notification that their membership is expiring in 30 days.\n\n");
	fputs($fp, "E-mail Address: $email\n");
	fputs($fp, "Username: $username\n");
	fputs($fp, "Thanks Again,\n\n");

	fputs($fp, "$salesname\nComunity Manager\n$salesemail\nwww.kidswithfoodallergies.org\n");
	pclose($fp);
		
	// Thank you for renewing your membership
	


	$renewMembership = "Dear $username,<br><br>"
					  ."Thank you for renewing your Family Membership!<br><br>"
					  ."I trust you have found the Family Membership helpful to you and your family, and I encourage you to continue to  take full advantage of your family membership benefits which include:<br><br>"
					  ." * Connect and share with other parents by logging in <a href='http://kidswithfoodallergies.org/eve/forums' "
				."target='_blank' />http://kidswithfoodallergies.org/eve/forums</a> to our very popular and active "
				."Kids With Food Allergies Family Forums online community<br>"
				." * Learn how to live better by accessing articles, videos and more in our growing online Resource Center "
				."<a href='http://www.kidswithfoodallergies.org/resources/resourcesnew.php' target='_blank' />"
				."http://www.kidswithfoodallergies.org/resources/resourcesnew.php</a><br>"
				." * Get help with food and cooking by using our growing, searchable Safe Eats Recipe Database, "
				."<a href='http://kidswithfoodallergies.org/recipes/introduction.php' target='_blank' />"
				."http://kidswithfoodallergies.org/recipes/introduction.php</a><br>"
				." * Receive a twice yearly publication, The Kids With Food Allergies Support Net, just for Family Membership "
				."subscribers .You can view the most recent issue by going to "
				."<a herf='http://www.kidswithfoodallergies.org/resourcetopic.php?topic=supportnet' target='_blank' />"
				."http://www.kidswithfoodallergies.org/resourcetopic.php?topic=supportnet</a> and scroll down to find "
				."the most recent issue. <br><br>"
				."To learn more about your family membership, and using your privileges, please see:<br><br>"
				."<a href='http://kidswithfoodallergies.org/eve/forums/a/tpc/f/7440057262/m/8530099723' target='_blank' />"
				."http://kidswithfoodallergies.org/eve/forums/a/tpc/f/7440057262/m/8530099723</a><br><br>"
				."We very much appreciate your support and you being a member of Kids With Food Allergies! <br><br>"
				."Sincerely, <br><br>"
				.$salesname2."<br>Membership Coordinator<br>'A World of Support'<br>".$salesemail2
				."<a href='http://www.kidswithfoodallergies.org' target='_blank' />www.kidswithfoodallergies.org</a><br>";
	
	# Send email 
	$mailheaders = "From: " . strip_tags($salesemail) . "\r\n";
	$mailheaders .= "Reply-To: ". strip_tags($salesemail) . "\r\n";
	$mailheaders .= "MIME-Version: 1.0\r\n";
	$mailheaders .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$subject = "Thank you for renewing your Family Membership";
	mail($myemail, $subject, $sponMessage, $mailheaders);


	$fp = popen("/usr/sbin/sendmail -t","w");
	fputs($fp, "To: $myemail\n");
	fputs($fp, "From: $name <$email>\n");
	fputs($fp, "Subject: Membership Renewal\n\n");
	fputs($fp, "$name, has been sent a thank you notification for renewing their membership.\n\n");
	fputs($fp, "E-mail Address: $email\n");
	fputs($fp, "Username: $username\n");
	fputs($fp, "Thanks Again,\n\n");

	fputs($fp, "$salesname\nComunity Manager\n$salesemail\nwww.kidswithfoodallergies.org\n");
	pclose($fp);
		

	//Renewing sponsored membership

	$sponRenew = "Dear $username,<br><br>"
				 ."Thank you for remaining as a family member of our organization.<br><br>"
				 ."I trust you have found the Family Membership helpful to you and your family, and I encourage you to continue to take full advantage of your  membership benefits which include:<br><br>"
				 ." * Connect and share with other parents by logging in <a href='http://kidswithfoodallergies.org/eve/forums' "
				."target='_blank' />http://kidswithfoodallergies.org/eve/forums</a> to our very popular and active "
				."Kids With Food Allergies Family Forums online community<br>"
				." * Learn how to live better by accessing articles, videos and more in our growing online Resource Center "
				."<a href='http://www.kidswithfoodallergies.org/resources/resourcesnew.php' target='_blank' />"
				."http://www.kidswithfoodallergies.org/resources/resourcesnew.php</a><br>"
				." * Get help with food and cooking by using our growing, searchable Safe Eats Recipe Database, "
				."<a href='http://kidswithfoodallergies.org/recipes/introduction.php' target='_blank' />"
				."http://kidswithfoodallergies.org/recipes/introduction.php</a><br>"
				." * Receive a twice yearly publication, The Kids With Food Allergies Support Net, just for Family Membership "
				."subscribers .You can view the most recent issue by going to "
				."<a herf='http://www.kidswithfoodallergies.org/resourcetopic.php?topic=supportnet' target='_blank' />"
				."http://www.kidswithfoodallergies.org/resourcetopic.php?topic=supportnet</a> and scroll down to find "
				."the most recent issue. <br><br>"
				."To learn more about your family membership, and using your privileges, please see:<br><br>"
				."<a href='http://kidswithfoodallergies.org/eve/forums/a/tpc/f/7440057262/m/8530099723' target='_blank' />"
				."http://kidswithfoodallergies.org/eve/forums/a/tpc/f/7440057262/m/8530099723</a><br><br>"
				."We very much appreciate your support and you being a member of Kids With Food Allergies! <br><br>"
				."Sincerely, <br><br>"
				.$salesname2."<br>Membership Coordinator<br>'A World of Support'<br>".$salesemail2
				."<a href='http://www.kidswithfoodallergies.org' target='_blank' />www.kidswithfoodallergies.org</a><br>";
	
	# Send email 
	$mailheaders = "From: " . strip_tags($salesemail) . "\r\n";
	$mailheaders .= "Reply-To: ". strip_tags($salesemail) . "\r\n";
	$mailheaders .= "MIME-Version: 1.0\r\n";
	$mailheaders .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$subject = "Thank you for renewing your sponsored membership";
	mail($myemail, $subject, $sponMessage, $mailheaders);

	$fp = popen("/usr/sbin/sendmail -t","w");
	fputs($fp, "To: $myemail\n");
	fputs($fp, "From: $name <$email>\n");
	fputs($fp, "Subject: Membership Renewal\n\n");
	fputs($fp, "$name, has been sent a notification that their membership has been renewed.\n\n");
	fputs($fp, "E-mail Address: $email\n");
	fputs($fp, "Username: $username\n");
	fputs($fp, "Thanks Again,\n\n");

	fputs($fp, "$salesname\nComunity Manager\n$salesemail\nwww.kidswithfoodallergies.org\n");
	pclose($fp);
		
	//////////////////////////////////////////////////////////////////
	// end emails that are sent from edit member screen
	
?>
