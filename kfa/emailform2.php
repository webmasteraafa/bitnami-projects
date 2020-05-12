<?php
	$formname = $_REQUEST['formname'];
	$name = $_REQUEST['name'];
	$name = str_replace('\'', '&#039;', $name);
	$subject = $_REQUEST['subject'];
	$subject = str_replace('\'', '&#039;', $subject);
	$email = $_REQUEST['email'];
	$body = $_REQUEST['body'];
	$body = str_replace('\'', '&#039;', $body);
	$to = $_REQUEST['to'];

if ($to == 'lynda') $salesemail = 'lmitchell@kidswithfoodallergies.org';
if ($to == 'lynda') $salesname = 'Lynda Mitchell';
if ($to == 'admin') $salesemail = 'admin@kidswithfoodallergies.org';
if ($to == 'admin') $salesname = 'Administration';
if ($to == 'heather') $salesemail = 'heather@allergicchild.com';
if ($to == 'heather') $salesname = 'Heather Abbott';
if ($to == 'webmaster') $salesemail = 'webmaster@kidswithfoodallergies.org';
if ($to == 'webmaster') $salesname = 'Webmaster';
if ($to == 'info') $salesemail = 'info@kidswithfoodallergies.org';
//if ($to == 'info') $salesemail = 'dhabot@gmail.com';
if ($to == 'info') $salesname = 'Information';
if ($to == 'janet') $salesemail = 'jburns@kidswithfoodallergies.org';
if ($to == 'janet') $salesname = 'Janet Burns';
if ($to == 'fundraisers') $salesemail = 'fundraisers@kidswithfoodallergies.org';
if ($to == 'media') $salesemail = 'mcassalia@kidswithfoodallergies.org';
if ($to == 'media') $salesname = 'KFA Media Inquiry';

if ($to == 'fundraisers') $salesname = 'KFA Fundraisers';
//if ($to == 'media') $salesemail = 'heather@allergicchild.com';
if ($to == 'supportgroups') $salesemail = 'supportgroups@kidswithfoodallergies.org';


if ($to == 'supportgroups') $salesname = 'KFA Support Groups';

//if ($to == 'webmaster') $salesemail = 'h.abbott@cpubroadband.net';
//if ($to == 'info') $salesemail = 'h.abbott@cpubroadband.net';


	include ("config.php");
	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/contactmain.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Contact Kids With Food Allergies</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Keywords" content="Kids with food allergies, nonprofit food allergy, support group, food allergy support group, children with food allergies, pofak, parents of food allergic kids" />
<meta name="Description" content="Contact Kids With Food Allergies, Inc., a nonprofit organization providing online support groups, recipes, parent education and news for families raising children with food allergies" />
<meta name="revisit-after" content="7 days" />

<!-- InstanceEndEditable -->
<link href="http://www.kidswithfoodallergies.org/js/main.css" rel="stylesheet" type="text/css" />
<link href="http://www.kidswithfoodallergies.org/js/images.css" rel="stylesheet" type="text/css" />
<link href="http://www.kidswithfoodallergies.org/js/forms.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="favicon.ico" />
<script language="javascript" type="text/javascript" src="http://www.kidswithfoodallergies.org/js/menu.js"></script>
<meta name="copyright" content="Copyright (c) 2005-2008, Kids With Food Allergies, Inc. All Rights Reserved." />
</head>
<!-- InstanceBeginEditable name="onload" -->
<body onload=" window.resizeTo(screen.availWidth -10,screen.availHeight -122)" >
<!-- InstanceEndEditable -->
<div align="center">
<table border="0" align="center">
<tr><td align="center">
<!-- page center -->
 	<table width="750"  border="0" cellpadding="0" cellspacing="0"><!-- top table -->
      <tr>
      <td width="163" rowspan="2" valign="bottom" class="logoborder">
      <a href="http://www.kidswithfoodallergies.org" rel="self"><img src="http://www.kidswithfoodallergies.org/siteimages/logof.gif" width="163" height="135" alt="Kids With Food Allergies" /></a></td>
      
      <td><div id="welcome1"></div></td>
 	</tr>
 	<tr><td colspan="4" valign="bottom">
        
		 <table cellpadding="0" cellspacing="0" class="one" width="100%"><!-- menu table1 -->
  			<tr bgcolor="#3F679B">
  			<td height="12" bgcolor="#3F679B">
  			<div align="right">
			<a href="index.html" class="WhiteMenuText">&nbsp;home</a>&nbsp;&nbsp;&nbsp;</div></td></tr>
  
  	<tr><!-- menu --><td  valign="middle">
 		<table width="100%" class="one" cellspacing="0" cellpadding="0"><!-- menu table -->
  		<tr class="one">
         <td width="22%" class="one">
        <a href="whatsnew.html" class="PurpleMenuText" title="Announcements, Publications, and Press Releases">what's new</a>        </td>
         <td width="17%" class="one">
        <a href="recipes.html" class="GrayMenuText"
         title="Dairy free recipes, egg free recipes, nut free recipes, peanut free recipes, wheat free recipes">recipes</a>         </td>
        <td width="19%" class="one">
        <a href="resourcesnew.php" title="Food allergy articles, research, and resources" class="PinkMenuText">resources</a>        </td>
        <td width="23%" class="one">
     <a href="faalerts.php" class="OrangeMenuText" title="Food allergy recalls for undeclared food allergens">allergy alerts</a>        </td>
        <td width="19%" class="one"><a href="interlink.html" class="GreenMenuText">allergy links</a></td></tr></table>
        <!-- end top row menu start 2nd row -->
         
        <table width="100%" class="one" cellspacing="0" cellpadding="0">
          <tr class="one">
       <td width="16%" class="one"><a href="donate.html" class="PinkMenuText">donate</a></td>
          <td width="18%" class="one">
          <a href="shopping.html" title="Food allergy t-shirts, allergy cookbooks, allergy books" class="OrangeMenuText">
         shop KFA</a></td>
         <td width="37%" class="one">
         <a href="marketplace.html" title="Find makers of allergen free foods, peanut allergy posters, allergy products"
          class="GreenMenuText">allergy buyer's guide</a></td>
          <td width="29%" class="one">
       <a href="community.html" class="GrayMenuText" title="Register as a member or log in to our food allergy message boards">
       support forums</a></td></tr></table><!-- ends second row menu --></td></tr></table><!-- end menu table1 -->
        </td></tr>
 		 <tr><!--3rd row menu -->
		<td width="163" align="center" class="style29">
 				<script type="text/javascript">showDate();</script> </td>
               
    	<td colspan="5" align="right"><!-- 3rd row td -->
          	&nbsp;<a href="memberships.html" class="GrayMenuText" 
	title="Become a member of Kids With Food Allergies and the Parents of Food Allergic Kids (POFAK) online allergy support group">
     membership</a> &nbsp;&nbsp;<a href="site_map.html" class="PurpleMenuText">site map </a>&nbsp; &nbsp;
     <a href="contactus.html" class="PinkMenuText">contact us</a>&nbsp;&nbsp; 
     <a href="about.html" class="GreenMenuText">about</a>&nbsp;&nbsp;&nbsp; </td><!-- end 3rd row td -->
  	</tr><!-- end 3rd row menu -->
  	</table><!-- end top table -->


</td></tr>
<tr><td align="center">
	<table width="750" cellpadding="1" style="margin-bottom:10px"><tr><td align="left" valign="top">
<form method="get" action="http://www.kidswithfoodallergies.org/search.php" class="zoom_searchform">
	<input type="text" name="zoom_query" size="20" value="" class="zoom_searchbox" />
	<input type="submit" value="Search KFA Site" class="stylewhite" style="background:#3F679B none; color:#FFFFFF;" />
	<input type="hidden" name="zoom_per_page" value="10" />
	<input type="hidden" name="zoom_and" value="0" />
	<input type="hidden" name="zoom_sort" value="0" />
	</form>
 	
</td><td align="right" valign="top">

<form method="post" action="http://www.kidswithfoodallergies.org/newsletter_sign-up.php">
	<input type="text" name="Email" size="15" class="style16" maxlength="120" value="your email" />
	<input class="stylewhite" type="submit" value="Subscribe to Newsletter" style="background:#CC3300" /><br />
    <div align="right"><a href="newsletter_sign-up.html" class="formlink" title="Kids With Food Allergies e-news is a free e-newsletter containing news and hot discussion topics about food allergies, allergy free recipes and safe food ideas for children with food allergies">more info</a></div>
	</form>
</td></tr></table>
</td></tr>

<!--</table><table border="0" align="center">-->
<tr><td align="center">
<div align="center"><img src="siteimages/indexillustrator_07.gif" width="750" height="3" alt="" /></div>
   <div class="mainbox3R" align="center"><!-- 2 columns box -->   
<table style="padding:0px; margin:0px; border:none"><tr valign="top"><td>
<div class="leftbox2"><!-- Left column -->

     <div class="pinkleftbox"><strong>contact us</strong></div>            
<div class="ltgreybox186" align="left">
       <a href="http://www.kidswithfoodallergies.org/contactus.html" class="style27">Contact Information</a>
        <p><a href="https://www.kidswithfoodallergies.org/brochure.php" class="style27">Request KFA Brochures</a></p>   <p><a href="http://www.kidswithfoodallergies.org/presskit.html" class="style27">KFA Press Kit</a></p>
</div>                             
       <br /> 

	  <!-- InstanceBeginEditable name="under menu" --><!-- InstanceEndEditable --></div><!--endsleftcolumn--></td>
 <td valign="top" colspan="1">    
<div class="maintextrightR">     
<div class="blueheaderbox"> <h1><!-- InstanceBeginEditable name="title" -->Contact Kids With Food Allergies<!-- InstanceEndEditable --></h1>
</div>
<div class="ltgreyboxmainR">

			<!-- #BeginEditable "text" --><strong>Thank you for contacting Kids With Food Allergies! We will respond to you as quickly as possible.</strong>
			<p><strong></strong></p>
            <!-- #EndEditable --></div>
</div><!--endsmaincolumn-->
</td></tr></table>
</div><!--endsmainbox-->
</td>
</tr>
<!--</table><table align="center" border="0">-->
<tr><td>
  <div align="center" class="style24">
<!-- #BeginEditable "date" --><p>Page last updated 3/01/2008</p><script type="text/javascript">
_uacct = "UA-216208-1";
urchinTracker();
</script><!-- #EndEditable --></div>
<div class="mainbox2" align="center">
<div class="blueinsidebox">
  	<span class="style61">KFA is a national nonprofit food allergy support group dedicated to fostering optimal health, 
    nutrition, <br />and well-being of children with food allergies by providing education and a caring<br /> 
                              support community for their families and caregivers.</span></div>
<br />
<div align="center">
    
<a 
    href="community.html" class="style24" rel="self">Support Forums</a>      <a 
    href="recipes.html" class="style24" rel="self">Allergy-Free Recipes</a>      <a 
    href="resourcesnew.php" class="style24" rel="self">Allergy Education Resources</a>         <a 
    href="faalerts.php" class="style24" rel="self">Food Allergy Alerts</a>        
    <a href="presskit.html" class="style24" rel="self"></a><br />        
    <a href="donate.html" class="style24" rel="self">Donate</a> <a href="whatsnew.html" class="style24" rel="self">What's New</a>  
    <a href="shopping.html" class="style24" rel="self">Shop KFA</a>        <a 
    href="marketplace.html" class="style24" rel="self">Allergy Buyer's Guide</a>        <a 
    href="community.html" class="style24" rel="self"></a>        <a 
    href="memberships.html" class="style24" rel="self">Memberships</a> <a 
    href="about.html" class="style24" rel="self">About</a>	<a 
    href="contactus.html" class="style24" rel="self">Contact Us</a>        <a 
    href="about.html" class="style24" rel="self"></a> <a href="presskit.html" class="style24" rel="self">Press | Media</a>
 
  
      <p class="style24"><a href="privacy.html" class="style24">Privacy Policy</a> and <a href="tos.html" class="style24">Terms of Service</a><br />
              Copyright (c) 2005-2009, Kids With Food Allergies, Inc.  All Rights Reserved.
              <br />
         <em>Kids With Food Allergies was formerly known as POFAK (Parents of Food Allergic Kids)<br />
          before becoming a tax exempt charity in 2005.</em></p>
</div>
<!-- ends center on bottom links-->
</div><!-- end mainbox2-->
<!-- ends bottom center -->
</td></tr></table>
</div>
<!-- InstanceBeginEditable name="Google Analytics" -->
 <script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ?
"https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost +
"google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-216208-1");
pageTracker._initData();
pageTracker._trackPageview("/contactus");
</script>
<!-- InstanceEndEditable --> 
</body>
<!-- InstanceEnd --></html>


<?

if (($to == 'webmaster') || ($to == 'info')) {
	$thisdate = date("Y-m-d");


	$sql = "insert into emailreply set thisdate='$thisdate', toemail='$to', name='$name', subject='$subject', email='$email', body='".addslashes($body)."'";
	mysql_query( $sql ) or die( "Error creating new volenteer: " . mysql_error() . " Query: $sql " );

	$sql1 = "select * from emailreply where body='".addslashes($body)."' and name='$name' and subject='$subject' and email='$email'";
	$result1 = mysql_query( $sql1 ) or die( "Error querying Vendor list: " . mysql_error() . " Query: $sql1 " );
	$row1 = mysql_fetch_array( $result1 );

	$id = $row1['id'];
	//echo $id;

	$sql2 = "update emailreply set messageid='$id' where id='$id'";
	mysql_query( $sql2 ) or die( "Error creating new volenteer: " . mysql_error() . " Query: $sql2 " );

	$fromname = "Kids with Food Allergies";

	$message =  "$name, has sent you the following information via the kidswithfoodallergies website from the webmaster or info email addresses.<br><br>";
	$message .= "This information has been placed in a database for you<br>";
	$message .=	"Go to <a href='http://www.kidswithfoodallergies.org/edit/'>http://www.kidswithfoodallergies.org/edit/</a> to reply to this person.<br>";
	$message .=	"<b>E-mail Address:</b> $email<br>";
	$message .=	"<b>E-mail Message:</b><br>";
	$message .=	"$body<br><br>";
/*
		$fp = popen("/usr/sbin/sendmail -t","w");
		fputs($fp, "To: $salesemail\n");
		fputs($fp, "From: $name <$email>\nContent-type: text/html\r\n");
		fputs($fp, "Subject: $subject\n\n");
		fputs($fp, "$message");
		fputs($fp, "$salesemail\nhttp://www.kidswithfoodallergies.org<br>");
		pclose($fp);
*/
	} else if ($to == 'fundraisers') {
	$thisdate = date("Y-m-d");


	$sql = "insert into emailreply_fund set thisdate='$thisdate', toemail='$to', name='$name', subject='$subject', email='$email', body='".addslashes($body)."'";
	mysql_query( $sql ) or die( "Error creating new volenteer: " . mysql_error() . " Query: $sql " );

	$sql1 = "select * from emailreply_fund where body='".addslashes($body)."' and name='$name' and subject='$subject' and email='$email'";
	$result1 = mysql_query( $sql1 ) or die( "Error querying Vendor list: " . mysql_error() . " Query: $sql1 " );
	$row1 = mysql_fetch_array( $result1 );

	$id = $row1['id'];
	//echo $id;

	$sql2 = "update emailreply_fund set messageid='$id' where id='$id'";
	mysql_query( $sql2 ) or die( "Error creating new volenteer: " . mysql_error() . " Query: $sql2 " );

	$fromname = "Kids with Food Allergies";

	$message =  "$name, has sent you the following information via the kidswithfoodallergies website to the fundraising email address.<br><br>";
	$message .= "This information has been placed in a database for you<br>";
	$message .=	"Go to <a href='http://www.kidswithfoodallergies.org/edit/'>http://www.kidswithfoodallergies.org/edit/</a> to reply to this person.<br>";
	$message .=	"<b>E-mail Address:</b> $email<br>";
	$message .=	"<b>E-mail Message:</b><br>";
	$message .=	"$body<br><br>";
/*
		$fp = popen("/usr/sbin/sendmail -t","w");
		fputs($fp, "To: $salesemail\n");
		fputs($fp, "From: $name <$email>\nContent-type: text/html\r\n");
		fputs($fp, "Subject: $subject\n\n");
		fputs($fp, "$message");
		fputs($fp, "$salesemail\nhttp://www.kidswithfoodallergies.org<br>");
		pclose($fp);
*/
	} else if ($to == 'supportgroups') {
	$thisdate = date("Y-m-d");


	$sql = "insert into emailreply_support set thisdate='$thisdate', toemail='$to', name='$name', subject='$subject', email='$email', body='".addslashes($body)."'";
	mysql_query( $sql ) or die( "Error creating new volenteer: " . mysql_error() . " Query: $sql " );

	$sql1 = "select * from emailreply_support where body='".addslashes($body)."' and name='$name' and subject='$subject' and email='$email'";
	$result1 = mysql_query( $sql1 ) or die( "Error querying Vendor list: " . mysql_error() . " Query: $sql1 " );
	$row1 = mysql_fetch_array( $result1 );

	$id = $row1['id'];
	//echo $id;

	$sql2 = "update emailreply_support set messageid='$id' where id='$id'";
	mysql_query( $sql2 ) or die( "Error creating new volenteer: " . mysql_error() . " Query: $sql2 " );

	$fromname = "Kids with Food Allergies";

	$message =  "$name, has sent you the following information via the kidswithfoodallergies website to the Support Groups email address.<br><br>";
	$message .= "This information has been placed in a database for you<br>";
	$message .=	"Go to <a href='http://www.kidswithfoodallergies.org/edit/'>http://www.kidswithfoodallergies.org/edit/</a> to reply to this person.<br>";
	$message .=	"<b>E-mail Address:</b> $email<br>";
	$message .=	"<b>E-mail Message:</b><br>";
	$message .=	"$body<br><br>";
/*
		$fp = popen("/usr/sbin/sendmail -t","w");
		fputs($fp, "To: $salesemail\n");
		fputs($fp, "From: $name <$email>\nContent-type: text/html\r\n");
		fputs($fp, "Subject: $subject\n\n");
		fputs($fp, "$message");
		fputs($fp, "$salesemail\nhttp://www.kidswithfoodallergies.org<br>");
		pclose($fp);
*/
	} else if ($to == 'media') {
	$thisdate = date("Y-m-d");


	$sql = "insert into emailreply_media set thisdate='$thisdate', toemail='$to', name='$name', subject='$subject', email='$email', body='".addslashes($body)."'";
	mysql_query( $sql ) or die( "Error creating new volenteer: " . mysql_error() . " Query: $sql " );

	$sql1 = "select * from emailreply_media where body='".addslashes($body)."' and name='$name' and subject='$subject' and email='$email'";
	$result1 = mysql_query( $sql1 ) or die( "Error querying Vendor list: " . mysql_error() . " Query: $sql1 " );
	$row1 = mysql_fetch_array( $result1 );

	$id = $row1['id'];
	//echo $id;

	$sql2 = "update emailreply_media set messageid='$id' where id='$id'";
	mysql_query( $sql2 ) or die( "Error creating new volenteer: " . mysql_error() . " Query: $sql2 " );

	$fromname = "Kids with Food Allergies";

	$message =  "$name, has sent you the following information via the kidswithfoodallergies website to the Media Questions email address.<br><br>";
	$message .= "This information has been placed in a database for you<br>";
	$message .=	"Go to <a href='http://www.kidswithfoodallergies.org/edit/'>http://www.kidswithfoodallergies.org/edit/</a> to reply to this person.<br>";
	$message .=	"<b>E-mail Address:</b> $email<br>";
	$message .=	"<b>E-mail Message:</b><br>";
	$message .=	"$body<br><br>";
/*
		$fp = popen("/usr/sbin/sendmail -t","w");
		fputs($fp, "To: $salesemail\n");
		fputs($fp, "From: $name <$email>\nContent-type: text/html\r\n");
		fputs($fp, "Subject: $subject\n\n");
		fputs($fp, "$message");
		fputs($fp, "$salesemail\nhttp://www.kidswithfoodallergies.org<br>");
		pclose($fp);
*/


	}else {


	$fromname = "Kids with Food Allergies";

	$message2 = "$name, has sent you the following information via the kidswithfoodallergies website.<br><br>";
	$message2 .= "<b>E-mail Address:</b> $email<br>";
	$message2 .= "$body<br><br>";
/*
		$fp = popen("/usr/sbin/sendmail -t","w");
		fputs($fp, "To: $salesemail\n");
		fputs($fp, "From: $name <$email>\nContent-type: text/html\r\n");
		fputs($fp, "Subject: $subject\n\n");
		fputs($fp, "$message2\n\n");
		fputs($fp, "$salesemail\nhttp://www.kidswithfoodallergies.org\n");
		pclose($fp);
		*/
	}
?>