<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/membershipmainssl.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<link href="https://www.kidswithfoodallergies.org/js/main.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/menu.js" type="text/javascript"></script>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Sponsored Family Membership</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Keywords" content="peanut allergy, dairy free recipes, dairy free, food allergies, food allergy, POFAK, wheat free recipes, egg free recipes, wheat free, nut free, peanut free, milk free recipes, food allergy recipes, milk allergy, egg allergy" />
<meta name="Description" content="Nonprofit organization providing online support groups, recipes, parent education and news for families raising children with food allergies" />
<meta name="robots" content="noindex,nofollow" />
<meta name="classification" content="Nonprofit organization" />
<meta name="revisit-after" content="30 days" />
<meta name="copyright" content="Copyright (c) 2005-2007, Kids With Food Allergies, Inc. All Rights Reserved." />
<script>
function RSto() {window.resizeTo(800,800)}



</script>
<?
	$formname = $_REQUEST['formname'];
	$name = $_REQUEST['name'];
	$date = date("Y-m-d");
	$email1 = $_REQUEST['email1'];
	$username = $_REQUEST['username'];
	$comments = $_REQUEST['comments'];
	$status = 'pending';


	include ("config.php");

	$sql = "insert into sponsor set status='$status', name='$name', email='$email1', username='$username', comments='$comments', date='$date'";
	mysql_query( $sql ) or die( "Error adding user: $login " . mysql_error() );


$salesemail = "lmitchell@kidswithfoodallergies.org";
$salesemail2 = "jstromberg@kidswithfoodallergies.org";

//$salesemail = "heather@allergicchild.com";
//$salesemail2 = "heather@allergicchild.com";


$salesname = "Lynda Mitchell";
$fromname = "Kids with Food Allergies";

	$fd = popen("/usr/sbin/sendmail -t","w");
	fputs($fd, "To: $email1\n");
	fputs($fd, "From: $fromname <$salesemail>\n");
	fputs($fd, "Subject: Sponsor Membership\n\n");
	fputs($fd, "Hello $name,\n\n");
	fputs($fd, "Thank you for submitting your request for a sponsored Family Membership. We are glad you would like to be an active member of Kids With Food Allergies.\n\n");
	fputs($fd, "Our office hours are Monday - Friday 8:30 a.m. to 5:00 p.m. Eastern Time. If you do not hear back from us within two business days, please alert us by sending an email to webmaster@kidswithfoodallergies.org.\n\n");

	fputs($fd, "Thank You,\n\n");
	fputs($fd, "$salesname\n");

	fputs($fd, "President\n$salesemail\nwww.kidswithfoodallergies.org\n");
	pclose($fd);


	$fp = popen("/usr/sbin/sendmail -t","w");
	fputs($fp, "To: $salesemail\n");
	fputs($fp, "From: $name <$email>\n");
	fputs($fp, "Subject: Sponsor Membership Request\n\n");
	fputs($fp, "$name, has submitted a Sponsored Membership Request.\n\n");
	fputs($fp, "E-mail Address: $email1\n");
	fputs($fp, "Thanks Again,\n\n");

	fputs($fp, "$salesname\nComunity Manager\n$salesemail\nwww.kidswithfoodallergies.org\n");
	pclose($fp);

	$fp2 = popen("/usr/sbin/sendmail -t","w");
	fputs($fp2, "To: $salesemail2\n");
	fputs($fp2, "From: $name <$email>\n");
	fputs($fp2, "Subject: Sponsor Membership Request\n\n");
	fputs($fp2, "$name, has submitted a Sponsored Membership Request.\n\n");
	fputs($fp2, "E-mail Address: $email1\n");
	fputs($fp2, "Thanks Again,\n\n");

	fputs($fp2, "$salesname\nComunity Manager\n$salesemail\nwww.kidswithfoodallergies.org\n");
	pclose($fp2);


?>
<!-- InstanceEndEditable -->

</head>
<body>
<div align="center">
<table border="0" align="center">
<tr><td align="center">
<!-- page center -->
 	<table width="750"  border="0" cellpadding="0" cellspacing="0"><!-- top table -->
      <tr>
      <td width="163" rowspan="2" valign="bottom" class="logoborder">
      <a href="http://www.kidswithfoodallergies.org" rel="self" title="Kids With Food Allergies"><img src="https://www.kidswithfoodallergies.org/siteimages/logof.gif" width="163" height="135" alt="Kids With Food Allergies" border="0" /></a></td>
      
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
</td></tr></table><!--endform2-->
</td></tr>

<!--</table><table border="0" align="center">-->
<tr><td align="center">
<div align="center"><img src="siteimages/indexillustrator_07.gif" width="750" height="3" alt="" /></div>

<div class="mainbox3" align="center"><!-- 2 columns box -->   
<table style="padding:0px; margin:0px; border:none"><tr valign="top"><td>
<div class="leftbox2"><!-- Left column -->
<div class="ltblueleftbox"><strong>membership</strong></div>            
<div class="ltgreybox186" align="left">
<a href="http://kidswithfoodallergies.org/eve/forums" class="style27">Register or Log in</a> <img src="http://www.kidswithfoodallergies.org/siteimages/check.gif" alt="" border="0" /> 
  <p><a href="http://www.kidswithfoodallergies.org/eve/thrive" class="style27" rel="self">Upgrade to Family Membership</a></p>
  <p><a href="http://www.kidswithfoodallergies.org/renew.html" class="style27" title="Renew Family Membership Annually">Renew Family Membership</a></p>
  <p><a href="http://www.kidswithfoodallergies.org/community.html" class="style27" title="Read more about our Community Support Forums for Parents of Food Allergic Kids">POFAK &#8482; Support Forums</a> </p>
 <p><a href="http://www.kidswithfoodallergies.org/eve/chat" class="style27" title="Live chat rooms for Family Members">Family Chat Rooms</a></p>  <p><a href="http://www.kidswithfoodallergies.org/resourcesnew.php" class="style27" title="Browse our Allergy Education Resources">Allergy Education Resources</a></p>
  <p> <a href="http://www.kidswithfoodallergies.org/recipes.html" class="style27" title="Hundreds of Allergy Free Recipes">Safe Eats &#8482; Recipes</a></p>
    <p> <a href="http://kidswithfoodallergies.org/newsletter_sign-up.html" class="style27" title="Monthly e-newsletter for Associate and Family Members">KFA e-Newsletter</a></p>
  <p> <a href="http://www.kidswithfoodallergies.org/supportnetshop.php" class="style27" title="Quarterly Publication for Family Members">Support Net &reg;</a></p>


  <p> <a href="http://kidswithfoodallergies.org/contactus.html" class="style27">Contact Us</a></p>
  </div>                             
       <br /> 


	  <!-- InstanceBeginEditable name="under menu" --><!-- InstanceEndEditable --></div><!--endsleftcolumn--></td>
 <td valign="top" colspan="1">    
<div class="maintextrightR">     
<div class="blueheaderbox"> <h1><!-- InstanceBeginEditable name="title" -->
		Sponsored Family Memberships<!-- InstanceEndEditable --></h1>
</div>
<div class="ltgreyboxmainR">

			<!-- #BeginEditable "text" -->
            <span class="style19">

              Thank You!
              <p>Your request for a sponsored membership has been submitted, and you should hear from us within 1 business day.&nbsp;<br />
              <br />
              Thank you for wanting to be an active member of our Kids With Food Allergies online community.<br />
              &nbsp;
</p></span>
            <!-- #EndEditable --></div>
</div><!--endsmaincolumn-->
</td></tr></table>
</div><!--endsmainbox-->
</td>
</tr>
<!--</table><table align="center" border="0">-->
<tr><td>
  <div align="center" class="style24">
<!-- #BeginEditable "date" -->
      <p align="center" class="style24">Page last updated 11/4/2007</p>
      <!-- #EndEditable --></div>
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

 
<!-- InstanceBeginEditable name="Google Analytics" --><script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ?
"https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost +
"google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-216208-1");
pageTracker._initData();
pageTracker._trackPageview("/membership");
</script>
<!-- InstanceEndEditable --> 
</body>
<!-- InstanceEnd --></html>
