<?php
	$formname = $_REQUEST['formname'];
	$role_supportforum = $_REQUEST['role_supportforum'];
	$role_committe = $_REQUEST['role_committe'];

	$role_chathost = $_REQUEST['role_chathost'];
	$role_web = $_REQUEST['role_web'];
	$role_boardmem = $_REQUEST['role_boardmem'];
	$role_specialevents = $_REQUEST['role_specialevents'];
	$role_publicrel = $_REQUEST['role_publicrel'];
	$role_clerical = $_REQUEST['role_clerical'];
	$role_fundraising = $_REQUEST['role_fundraising'];
	$role_marketing = $_REQUEST['role_marketing'];
	$role_writing = $_REQUEST['role_writing'];
	$role_grantwriting = $_REQUEST['role_grantwriting'];
	$role_humanres = $_REQUEST['role_humanres'];
	$role_legalresearch = $_REQUEST['role_legalresearch'];
	$role_healthinfo = $_REQUEST['role_healthinfo'];
	$role_other = $_REQUEST['role_other'];
	$role_other = str_replace('\'', '&#039;', $role_other);
	$role_leadother = $_REQUEST['role_otherlead'];
	$role_leadother = str_replace('\'', '&#039;', $role_leadother);
	$skills_web = $_REQUEST['skills_web'];
	$skills_legal = $_REQUEST['skills_legal'];
	$skills_research = $_REQUEST['skills_research'];
	$skills_proofreading = $_REQUEST['skills_proofreading'];
	$skills_msword = $_REQUEST['skills_msword'];
	$skills_salesmarketing = $_REQUEST['skills_salesmarketing'];
	$skills_fundraising = $_REQUEST['skills_fundraising'];
	$skills_msexcel = $_REQUEST['skills_msexcel'];
	$skills_assembly = $_REQUEST['skills_assembly'];
	$skills_mspoint = $_REQUEST['skills_mspoint'];
	$skills_graphicdesign = $_REQUEST['skills_graphicdesign'];
	$skills_writing = $_REQUEST['skills_writing'];
	$skills_accounting = $_REQUEST['skills_accounting'];
	$skills_recordkeeping = $_REQUEST['skills_recordkeeping'];
	$skills_other = $_REQUEST['skills_other'];
	$skills_other = str_replace('\'', '&#039;', $skills_other);
	$education = $_REQUEST['education'];
	$employexp = $_REQUEST['employexp'];
	$employexp = str_replace('\'', '&#039;', $employexp);
	$othertraining = $_REQUEST['othertraining'];
	$othertraining = str_replace('\'', '&#039;', $othertraining);
	$hobbies = $_REQUEST['hobbies'];
	$hobbies = str_replace('\'', '&#039;', $hobbies);
	$previousexp = $_REQUEST['previousexp'];
	$previousexp = str_replace('\'', '&#039;', $previousexp);
	$ref1_phone = $_REQUEST['ref1_phone'];
	$ref1_phone = str_replace('\'', '&#039;', $ref1_phone);
	$ref1_name = $_REQUEST['ref1_name'];
	$ref1_name = str_replace('\'', '&#039;', $ref1_name);
	$ref1_relationship = $_REQUEST['ref1_relationship'];
	$ref1_relationship = str_replace('\'', '&#039;', $ref1_relationship);
	$ref2_phone = $_REQUEST['ref2_phone'];
	$ref2_phone = str_replace('\'', '&#039;', $ref2_phone);
	$ref2_name = $_REQUEST['ref2_name'];
	$ref2_name = str_replace('\'', '&#039;', $ref2_name);
	$ref2_relationship = $_REQUEST['ref2_relationship'];
	$ref2_relationship = str_replace('\'', '&#039;', $ref2_relationship);
	$avail_project = $_REQUEST['avail_project'];
	$avail_variable = $_REQUEST['avail_variable'];
	$avail_5hour = $_REQUEST['avail_5hour'];
	$avail_10hour = $_REQUEST['avail_10hour'];
	$avail_20hour = $_REQUEST['avail_20hour'];
	$avail_more20 = $_REQUEST['avail_more20'];
	$reason = $_REQUEST['reason'];
	$reason = str_replace('\'', '&#039;', $reason);
	$first_name = $_REQUEST['first_name'];
	$first_name = str_replace('\'', '&#039;', $first_name);
	$last_name = $_REQUEST['last_name'];
	$last_name = str_replace('\'', '&#039;', $last_name);
	$username = $_REQUEST['username'];
	$username = str_replace('\'', '', $username);
	$email = $_REQUEST['email'];
	$email = str_replace('\'', '&#039;', $email);
	$address1 = $_REQUEST['address1'];
	$address1 = str_replace('\'', '&#039;', $address1);
	$address2 = $_REQUEST['address2'];
	$address2 = str_replace('\'', '&#039;', $address2);
	$city = $_REQUEST['city'];
	$city = str_replace('\'', '&#039;', $city);
	$state = $_REQUEST['state'];
	$state = str_replace('\'', '&#039;', $state);
	$country = $_REQUEST['country'];
	$country = str_replace('\'', '&#039;', $country);
	$zip = $_REQUEST['zip'];
	$zip = str_replace('\'', '&#039;', $zip);
	$phone = $_REQUEST['phone'];
	$phone = str_replace('\'', '&#039;', $phone);
	$status = 'pending';
	$date = date("Y-m-d");
	$convicted = $_REQUEST['convicted'];
	$enjoined = $_REQUEST['enjoined'];


	include ("config.php");

	$sql = "select * from user where login = '$username'";
	$result = mysql_query( $sql ) or die( mysql_error() );

	if( mysql_num_rows( $result ) >= 1 ){
	$duplicate = 'yes';
	
	}else {
	$duplicate = "";

	$sql = "insert into user set login='$username', salt='aaa', password=PASSWORD('letmeinaaa')";
	mysql_query( $sql ) or die( "Error adding user: $login " . mysql_error() );

	$sql = "insert into volunteers set role_leadother='$role_leadother', skills_other='$skills_other', role_committe='$role_committe', date='$date', role_supportforum ='$role_supportforum', role_chathost='$role_chathost', role_web='$role_web', role_boardmem='$role_boardmem', role_specialevents='$role_specialevents', role_publicrel='$role_publicrel', role_clerical='$role_clerical', role_fundraising='$role_fundraising', role_marketing='$role_marketing', role_writing='$role_writing', role_grantwriting='$role_grantwriting', role_humanres='$role_humanres', role_legalresearch='$role_legalresearch', role_healthinfo='$role_healthinfo', role_other='$role_other', skills_web='$skills_web', skills_legal='$skills_legal', skills_research='$skills_research', skills_proofreading='$skills_proofreading', skills_msword='$skills_msword', skills_salesmarketing='$skills_salesmarketing', skills_fundraising='$skills_fundraising', skills_msexcel='$skills_msexcel', skills_assembly='$skills_assembly', skills_mspoint='$skills_mspoint', skills_graphicdesign='$skills_graphicdesign', skills_writing='$skills_writing', skills_accounting='$skills_accounting', skills_recordkeeping='$skills_recordkeeping', education='$education', employexp='$employexp', othertraining='$othertraining', hobbies='$hobbies', previousexp='$previousexp', ref1_phone='$ref1_phone', ref1_name='$ref1_name', ref1_relationship='$ref1_relationship', ref2_phone='$ref2_phone', ref2_name='$ref2_name', ref2_relationship='$ref2_relationship', avail_project='$avail_project', avail_variable='$avail_variable', avail_5hour='$avail_5hour', avail_10hour='$avail_10hour', avail_20hour='$avail_20hour', avail_more20='$avail_more20', reason='$reason', first_name='$first_name', last_name='$last_name', username='$username', email='$email', address1='$address1', address2='$address2', city='$city', state='$state', country='$country', zip='$zip', phone='$phone', status='$status', convicted='$convicted', enjoined='$enjoined'";
	mysql_query( $sql ) or die( "Error creating new volenteer: " . mysql_error() . " Query: $sql " );

	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/aboutmainssl.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Volunteer Kids With Food Allergies</title>

<meta name="Description" content="Kids with food allergies information and support" />
<meta name="Keywords" content="kids with food allergies, children with food allergies, food allergies, milk allergy, egg allergy, soy allergy, peanut allergy, allergy support, allergy group, latex allergy, food allergy dictionary, allergy chat, allergy newsletter" />

<link href="https://www.kidswithfoodallergies.org/js/main.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="https://www.kidswithfoodallergies.org/js/menu.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0  
	window.open(theURL,winName,features);
  return false;
}//-->
</script>
<!-- InstanceEndEditable -->
<meta name="copyright" content="Copyright (c) 2005-2007, Kids With Food Allergies, Inc. All Rights Reserved." />
<link href="js/main.css" rel="stylesheet" type="text/css" />
<link href="js/images.css" rel="stylesheet" type="text/css" />
<link href="js/forms.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="http://www.kidswithfoodallergies.org/favicon.ico" />
<script type="text/javascript" language="javascript" src="js/menu.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<div align="center">
<table border="0" align="center">
<tr><td align="center">
<!-- page center -->
 <table width="750"  border="0" cellpadding="0" cellspacing="0"><!-- top table -->
  <tr>
      <td width="163" rowspan="2" valign="bottom" class="logoborder">
      <a href="http://www.kidswithfoodallergies.org"><img src="siteimages/logof.gif" width="163" height="135" alt="Kids With Food Allergies" /></a></td>
      
      <td>
<div id="welcome1"></div>     </td>
 </tr>
 <tr><!-- top tr -->
 <td colspan="4" valign="bottom"> <!-- top td -->
    
    
 <table cellpadding="0" cellspacing="0" class="one" width="100%"><!-- menu table1 -->
  <tr bgcolor="#3F679B">
  <td height="12" bgcolor="#3F679B">
  
<div align="right"><!-- aligns home -->
	<a href="index.html" class="WhiteMenuText">&nbsp;home</a>&nbsp;&nbsp;&nbsp;</div>  </td>
  </tr>
  
  <tr><!-- tr menu -->
  <td  valign="middle"><!-- td menu -->
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
                    
        <td width="19%" class="one"><a href="interlink.html" class="GreenMenuText">allergy links</a></td>
   </tr>
 </table><!-- end top row menu -->
                  
 <table width="100%" class="one" cellspacing="0" cellpadding="0"><!-- 2nd row menu -->
            
   <tr class="one">

       <td width="16%" class="one"><a href="donate.html" class="PinkMenuText">donate</a></td>
          
       <td width="18%" class="one">
         <a href="shopping.html" title="Food allergy t-shirts, allergy cookbooks, children's allergy books" class="OrangeMenuText">
         shop KFA</a></td>
                    
       <td width="37%" class="one">
         <a href="marketplace.html" title="Find makers of allergen free foods, peanut allergy posters, allergy products and more"
          class="GreenMenuText">allergy buyer's guide</a></td>
          
       <td width="29%" class="one">
       <a href="community.html" class="GrayMenuText" title="Register as a member or log in to our food allergy message boards">
       support forums</a></td>
   </tr>
 </table><!-- ends second row menu -->    </td>
  </tr>
 </table><!-- end menu table1 -->    </td>
  </tr>
 
  <tr><!--3rd row menu -->
	<td width="163" align="center">
    <!--insert date box-->
          <span class="style29">
				<script type="text/javascript">showDate();</script>
                </span>  
		  <!--end date box-->    </td>
    <td colspan="5" align="right"><!-- 3rd row td -->
          

	&nbsp;<a href="memberships.html" class="GrayMenuText" 
	title="Become a member of Kids With Food Allergies and the Parents of Food Allergic Kids (POFAK) online allergy support group">
     membership</a> &nbsp;&nbsp;<a href="site_map.html" class="PurpleMenuText">site map </a>&nbsp; &nbsp;
     <a href="contactus.html" class="PinkMenuText">contact us</a>&nbsp;&nbsp; 
     <a href="about.html" class="GreenMenuText">about</a>&nbsp;&nbsp;&nbsp; </td><!-- end 3rd row td -->
  </tr><!-- end 3rd row menu -->
  </table>
 <!-- end top table -->


</td></tr>
<tr><td align="center">
<div class="FormContain">
<div id="Form">
<div class="Form1" align="left">


	<form method="get" action="http://www.kidswithfoodallergies.org/search.php" class="zoom_searchform" />
	<input type="text" name="zoom_query" size="20" value="" class="zoom_searchbox" />
	<input type="submit" value="Search KFA Site" class="stylewhite" style="background:#3F679B none; color:#FFFFFF;" />
	<input type="hidden" name="zoom_per_page" value="10" />
	<input type="hidden" name="zoom_and" value="0" />
	<input type="hidden" name="zoom_sort" value="0" />
	</form>
 		<br />
</div>
<div class="Form2" align="right">
<form method="post" action="http://www.kidswithfoodallergies.org/newsletter_sign-up.php">
	<input type="text" name="Email" size="15" class="style16" maxlength="120" value="your email" />
	<input class="stylewhite" type="submit" value="Subscribe to Newsletter" style="background:#CC3300" /><br />
    <div align="right"><a href="http://www.kidswithfoodallergies.org/newsletter_sign-up.html" class="formlink" title="Kids With Food Allergies e-news is a free e-newsletter containing news and hot discussion topics about food allergies, allergy free recipes and safe food ideas for children with food allergies">more info</a></div>

	</form>
</div><!--endform2-->
</div><!-- x ends div form footer-->


</div><!-- x ends center on formcontain-->
</td></tr></table>

<table border="0" align="center">
<tr><td align="center">
<div align="center"><img src="http://www.kidswithfoodallergies.org/siteimages/indexillustrator_07.gif" width="750" height="3" alt="" />
</div>

<div class="mainbox3" align="center"><!-- 2 columns box -->   

<div class="leftbox2"><!-- Left column -->
<div class="greenleftbox">about</div>            
<div class="ltgreybox186">

         <p><a href="http://www.kidswithfoodallergies.org/about.html" class="style27">Mission and Objectives</a></p>                    
         <p> <a href="http://www.kidswithfoodallergies.org/bod.html" class="style27">Board of Directors</a></p>                        
         <p> <a href="http://www.kidswithfoodallergies.org/mat.html" class="style27">Medical Advisory Team</a></p>                        
         <p> <a href="http://www.kidswithfoodallergies.org/firsttime.html" class="style27">First Time Visitors</a></p>                        
          <p> <a href="http://www.kidswithfoodallergies.org/volunteers.html" class="style27">Volunteers</a></p>                       
         <p> <a href="http://www.kidswithfoodallergies.org/howtohelp.html" class="style27">How You Can Help</a></p>                        
          <p> <a href="http://www.kidswithfoodallergies.org/editorialpolicy.html" class="style27">Editorial Policy</a></p>                        
         <p> <a href="http://www.kidswithfoodallergies.org/acknowledgements.html" class="style27">Acknowledgments</a></p>                        
         <p> <a href="http://www.kidswithfoodallergies.org/testimonials.html" class="style27">Testimonials</a></p>                        
         <p> <a href="http://www.kidswithfoodallergies.org/privacy.html" class="style27">Privacy Policy</a> </p>                      
       <p> <a href="http://www.kidswithfoodallergies.org/tos.html" class="style27">Terms of Service</a></p>                       
       <p><a href="http://www.kidswithfoodallergies.org/history.html" class="style27">History</a></p>
           <p><a href="http://www.kidswithfoodallergies.org/funding.html" class="style27">Funding</a></p>                    
</div>                                
        	
	  <!-- InstanceBeginEditable name="under menu" --><!-- InstanceEndEditable -->
</div><!--endsleftcolumn-->
     
<div class="maintextright">     
<div class="blueheaderbox"> <h1><!-- InstanceBeginEditable name="title" -->
 Volunteers<!-- InstanceEndEditable --></h1>
</div>
<div class="ltgreyboxmain">

			<!-- #BeginEditable "text" -->
            <!-- start my code -->
<?

if ($duplicate){

?>
<p>We already have a profile for Username <? echo $username;?></p>
<p>Please make sure you have the correct username, or that you have not created a profile in the past. 
Please click the BACK button and choose another username or contact us using the link below to find out how to access your profile.
</p>

<p>For questions, please send an email to our <a class="style20" href="http://www.kidswithfoodallergies.org/email.php?to=lynda;" onclick="MM_openBrWindow('http://www.kidswithfoodallergies.org/email.php?to=lynda','','width=500,height=430');return false">Volunteer Coordinator</a></p>

<?

}else {

?>


<p>Thank you for submitting your Profile!</p>
<p>If your username contained any ' we had to take that out so please write down the information below so you have the correct login information!</p>
<p><b>Username</b> : <? echo $username;?><br />
</p><p>We look forward to working with you, someone will be in touch with your
shortly to let you know what volunteer opportunities we would like you to fill.</p>

<p>For questions, please send an email to our <a class="style20" href="http://www.kidswithfoodallergies.org/email.php?to=lynda;" onclick="MM_openBrWindow('http://www.kidswithfoodallergies.org/email.php?to=lynda','','width=500,height=430');return false">Volunteer Coordinator</a></p>
<?

}
?>


<!-- end my code -->

            <!-- #EndEditable -->
</div>
</div><!--endsmaincolumn-->
</div><!--endsmainbox-->



</td>
</tr></table>
 
		<table align="center" border="0"><tr><td>
  <div align="center" class="style24">
<!-- #BeginEditable "date" -->
      <p align="center" class="style24">Page last updated 12/02/2007</p>
      <!-- #EndEditable --></div>
<div class="mainbox2" align="center">
<div class="blueinsidebox">
  	<span class="style61">KFA is a national nonprofit food allergy support group dedicated to fostering optimal health, 
    nutrition, <br />and well-being of children with food allergies by providing education and a caring<br /> 
                              support community for their families and caregivers.</span></div>
<br />
<div align="center">
    
    <a href="http://www.kidswithfoodallergies.org/whatsnew.html" class="style24">What's New</a>      <a 
    href="http://www.kidswithfoodallergies.org/recipes.html" class="style24">Allergy-Free Recipes</a>      <a 
    href="http://www.kidswithfoodallergies.org/resourcesnew.php" class="style24">Parent Education Resources</a>         <a 
    href="http://www.kidswithfoodallergies.org/faalerts.php" class="style24">Food Allergy Alerts</a>        
    <a href="http://www.kidswithfoodallergies.org/interlink.html" class="style24">Allergy Links</a><br />        
    <a href="http://www.kidswithfoodallergies.org/donate.html" class="style24">Donate</a>   
    <a href="http://www.kidswithfoodallergies.org/shopping.html" class="style24">Shop KFA</a>        <a 
    href="http://www.kidswithfoodallergies.org/marketplace.html" class="style24">Allergy Buyer's Guide</a>        <a 
    href="http://www.kidswithfoodallergies.org/community.html" class="style24">Support Forums</a>        <a 
    href="http://www.kidswithfoodallergies.org/memberships.html" class="style24">Memberships</a>	<a 
    href="http://www.kidswithfoodallergies.org/contactus.html" class="style24">Contact Us</a>        <a 
    href="http://www.kidswithfoodallergies.org/about.html" class="style24">About</a> 
 
  
      <p class="style24"><a href="privacy.html" class="style24">Privacy Policy</a> and <a href="tos.html" class="style24">Terms of Service</a><br />
              Copyright (c) 2005-2008, Kids With Food Allergies, Inc.
              All Rights Reserved.
              <br />
              
             <em>Kids With Food Allergies was formerly known as POFAK (Parents of Food Allergic Kids)<br />
          before becoming a tax exempt charity in 2005.</em></p>
</div>
<!-- ends center on bottom links-->
</div><!-- end mainbox2-->
<!-- ends bottom center -->
</td></tr></table>
</div>

 
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-216208-1";
urchinTracker();
</script>
</body>
<!-- InstanceEnd --></html>
<?
$salesemail = "lmitchell@kidswithfoodallergies.org";
$salesemail2 = "mcroft@kidswithfoodallergies.org";

//$salesemail = "h.abbott@cpubroadband.net";
$salesname = "Lynda Mitchell";
$fromname = "Kids with Food Allergies";
	$fd = popen("/usr/sbin/sendmail -t","w");
	fputs($fd, "To: $email\n");
	fputs($fd, "From: $fromname <$salesemail>\n");
	fputs($fd, "Subject: Volunteer Profile\n\n");
	fputs($fd, "Hi $first_name $last_name,\n\n");
	fputs($fd, "Thank you for filling out our online volunteer profile.\n");
	fputs($fd, "Someone will be in contact with you shortly.\n\n");

	fputs($fd, "Thanks Again,\n\n");
	fputs($fd, "$salesname\n");

	fputs($fd, "Community Manager\n$salesemail\nwww.kidswithfoodallergies.org\n");
	pclose($fd);


	$fp = popen("/usr/sbin/sendmail -t","w");
	fputs($fp, "To: $salesemail\n");
	fputs($fp, "From: $salename <$email>\n");
	fputs($fp, "Subject: Volunteer Profile\n\n");
	fputs($fp, "$first_name $last_name, has submitted a volunteer profile.\n\n");
	fputs($fp, "E-mail Address: $email\n");
	fputs($fp, "Thanks Again,\n\n");

	fputs($fp, "$salesname\nComunity Manager\n$salesemail\nwww.kidswithfoodallergies.org\n");
	pclose($fp);
	
	$fp2 = popen("/usr/sbin/sendmail -t","w");
	fputs($fp2, "To: $salesemail2\n");
	fputs($fp2, "From: $salename <$email>\n");
	fputs($fp2, "Subject: Volunteer Profile\n\n");
	fputs($fp2, "$first_name $last_name, has submitted a volunteer profile.\n\n");
	fputs($fp2, "E-mail Address: $email\n");
	fputs($fp2, "Thanks Again,\n\n");

	fputs($fp2, "$salesname\nComunity Manager\n$salesemail\nwww.kidswithfoodallergies.org\n");
	pclose($fp2);
?>
