<?php
	$formname = $_REQUEST['formname'];
	$name = $_REQUEST['name'];
	$name = str_replace('\'', '&#039;', $name);
	$date = $_REQUEST['date'];
	$date = str_replace('\'', '&#039;', $date);
	$email = $_REQUEST['email'];
	$email = str_replace('\'', '&#039;', $email);
	$position = $_REQUEST['position'];
	$postion = str_replace('\'', '&#039;', $position);
	$statement = $_REQUEST['statement'];
	$statement = str_replace('\'', '&#039;', $statement);
	$actual_date = date("Y-m-d");
	$status = 'pending';



	include ("config.php");

	$sql = "insert into volunteers_statement set email='$email', actual_date= '$actual_date', name='$name', date='$date', position='$position', statement='$statement', status='$status'";
	mysql_query( $sql ) or die( "Error creating new volenteer statement: " . mysql_error() . " Query: $sql " );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/aboutmainssl.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Volunteer StatementKids With Food Allergies</title>


<meta name="robots" content="noindex, nofollow" />

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
		Volunteer Statement<!-- InstanceEndEditable --></h1>
</div>
<div class="ltgreyboxmain">

			<!-- #BeginEditable "text" -->
            <!-- start my code -->


<p>Thank you!</p>
<p>Please be sure you send the printed form to:<br />
&nbsp;&nbsp;&nbsp;&nbsp;Kids With Food Allergies, Inc.<br />
&nbsp;&nbsp;&nbsp;&nbsp;73 Old Dublin Pike, Ste 10, #163<br />
&nbsp;&nbsp;&nbsp;&nbsp;Doylestown, PA 18901<br />
</p>

<p>For questions, please send an email to our <a class="style20" href="https://www.kidswithfoodallergies.org/email.php?to=lynda;" onclick="MM_openBrWindow('https://www.kidswithfoodallergies.org/email.php?to=lynda','','width=500,height=430');return false">Volunteer Coordinator</a></p>




<!-- end my code -->
            <!-- #EndEditable --></div>
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
