<?php

session_start();
/*
echo ("after start".session_id()."<BR>");
*/
$KWFAAdmin = '7880084762';
$RecipesInOurDB = '5260079562';
$RecipesDBTeam = '2670065682';
$chartermember = '5120049793';
$familymember = '3780052503';

print_r($_COOKIE);
if(isset($_COOKIE['site_2400067262'])){
  $site_cookie = $_COOKIE['site_2400067262'];
  list($u,$md5p,$user_oid,$pref_datetime,$perms_datetime,$pl) = explode("&", $site_cookie);
  $u_name = split("=", $u);
  $u_login = split("=", $l);
  $u_oid = split("=", $user_oid);
  $_SESSION['u_name'] = $u_name;
  $_SESSION['u_login'] = $u_login;
  $_SESSION['u_oid'] = $u_oid;
  
} else {
    //echo "<meta http-equiv=\"Refresh\" CONTENT=\"0; URL=http://kidswithfoodallergies.org/recipes/introduction.php\">";
}

$isAdmin = false;

if (isset($u_oid[1])){
  $db = mysql_connect("www.kidswithfoodallergies.org:3306", "kidswitror_rcp", "allergenfree");
  mysql_select_db("kidswitror_eve",$db);

  $sql = "SELECT GROUP_OID FROM IP_GROUP_USERS WHERE USER_OID ='$u_oid[1]'";
  $result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
  while($row = mysql_fetch_array($result)){
    if (($row['GROUP_OID'] == $KWFAAdmin) || ($row['GROUP_OID'] == $RecipesInOurDB) || ($row['GROUP_OID'] == $RecipesDBTeam)){
      $isAdmin = true;
      break;
    }
  }
 }

//echo $row['GROUP_OID'];


$_SESSION['user_name'] = $u_name[1];
$_SESSION['user_login'] = $u_login[1];
$_SESSION['user_oid'] = $u_oid[1];
$_SESSION['isAdmin'] = $isAdmin;
$_SESSION['frompage'] = 'introduction';
$_SESSION['db_result'] = $result_array;
$_SESSION['total_rows'] = 0;
$_SESSION['category'] = '';
session_write_close();
//echo ("after session write".session_id()."<BR>");
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
   <link rel="stylesheet" href="style.css" type="text/css" />
   <link href="../js/main.css" rel="stylesheet" type="text/css">
<meta name="keywords" content="food allergies, milk allergy , egg allergy, peanuts allergy, nut, latex, corn, soy allergy">
<meta name="description" content="Kids with food allergies information and support">
<meta name="keywords" content="kids with food allergies, children with food allergies, food allergies, milk allergy, egg allergy, soy allergy, peanut allergy, allergy support, allergy group, latex allergy, food allergy dictionary, allergy chat, allergy newsletter">
<meta name="description" content="Home for families with food allergic kids. A place where you will find a lot of information and support regarding allergies">
<link href="http://www.kidswithfoodallergies.org/js/main.css" rel="stylesheet" type="text/css">
<script language="javascript" src="http://www.kidswithfoodallergies.org/js/menu.js"></script>
<script language="javascript" src="http://www.kidswithfoodallergies.org/js/sidemenu.js"></script>
   <title>Welcome to the POFAK Recipes Database</title>
</head>
<body>
<?php
  require("topbanner.html");
?>

<table class="background" cellpadding="0" cellspacing="0" border="0" align="center">
   <tr>
      <td valign="top" width="*" align="left">
         <?require("leftnavigation.html"); ?>
      </td>
      <td align="left" valign="top">

   
      <!-- Start pasting your code right here !!! --> 
          <table align="center" cellpadding="2" cellspacing="0">
	         <tr>
	            <td>
		            <table align="center" border="0" cellpadding="5" cellspacing="2" ID="information" width="575">
		               <tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
            <td height="33" colspan="2" valign="middle" bgcolor="#3F679B"><div align="left"><h1>&nbsp;&nbsp;&nbsp;
 Recipes


	</h1>
            </div></td>
          </tr>
                     </table>
        <table width="575" align="center" border="0" cellpadding="5" class="style19" cellspacing="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1">
          <tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
            <td height="33" colspan="2" bgcolor="#FFFFFF" >
                        Welcome to our wonderful recipe database!<br><br>
                        Parents of food allergic children have shared their favorite recipes here that are indicated as free of many different allergens.  You can search to meet your special dietary needs, or you can browse by category.<br><br>
                        If you would like to come directly to the recipe database, please <b>bookmark this page</b>. If you have Internet Explorer, click on the "Favorites" button and choosing to add. If you are using Mozilla, FoxFire, or Netscape, click on the Bookmarks link at the top of the page.<br><br>
                        We encourage and welcome you to share your own favorite recipes and contribute to the growth of our recipe database.

                        <br><br>
                        <b>Some notes of caution:</b>
				<ol>
					  <li>These recipes have been donated by our members and have not
						    been tested in a test kitchen, therefore we can't guarantee the results.</li>
					  <li>Safety of ingredients is important. As we all know the same
						    product manufactured in different plants at different parts of the country
						    may not contain the same ingredients.</li>
					  <li>For the &quot;free of&quot; categorization, you should not
							 any assumptions as to the safety of an ingredient that is included in
							 any of these recipes. It will be up to you to do your own
						    research to make sure that each ingredient in these recipes is indeed safe
						    for your child's unique allergy issues.</li>
					  <li>Use of the database indicates the user's agreement
						    with our terms of service.</li>
		</ol>
                        <br><br></td>
                     </tr>
    		         </table>
		         </td>
	         </tr>
	      </table>
      <!-- End of the code. Do not mess with the page beyond this point -->
      </td>
    </tr>
</form>
</table>
<center>
	
  <table width="750" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>	<!-- #BeginEditable "date" -->
      <p align="center" class="style24">Page last updated 3/26/2007</p>
      <!-- #EndEditable -->        <div align="center">		  
         <table width=750 align="center">
                        <tr bgcolor="#FFFFFF"  valign="top" align="center">
                          <td colspan='5'>&nbsp;</td>
                        </tr>
                        <tr bgcolor="#FFFFFF"  valign="top" align="center">
                          <td colspan='5' bgcolor="#3F679B"><span class="style61">KFA is a national nonprofit food allergy support group dedicated to fostering optimal health, <br />nutrition, 
                            and well-being of children with food allergies by providing education and a caring<br /> support community for their families and caregivers.</span></td>
                        </tr>
        
    <tr>
      <td> <img src="http://www.kidswithfoodallergies.org/images/spacer.gif" width="155" height="1" alt=""></td>
      <td> <img src="http://www.kidswithfoodallergies.org/images/spacer.gif" width="35" height="1" alt=""></td>
      <td> <img src="http://www.kidswithfoodallergies.org/images/spacer.gif" width="11" height="1" alt=""></td>
      <td> <img src="http://www.kidswithfoodallergies.org/images/spacer.gif" width="152" height="1" alt=""></td>
      <td> <img src="http://www.kidswithfoodallergies.org/images/spacer.gif" width="302" height="1" alt=""></td>
    </tr></table>
  <p align="center"><center><!-- AddThis Bookmark Button BEGIN -->
<a href="http://www.addthis.com/bookmark.php" onClick="
addthis_url   = location.href;
addthis_title = document.title;
return addthis_click(this);" target="_blank"><img src="http://s5.addthis.com/button1-bm.gif" width="125" height="16" border="0" alt="AddThis Social Bookmark Button" /></a> <script type="text/javascript">var addthis_pub = 'GS9I01DT8FO8Y99T';</script><script type="text/javascript" src="http://s5.addthis.com/js/widget.php?v=10"></script>  
<!-- AddThis Bookmark Button END --></center>
  <table width="750" border="0" align='center' cellspacing="0" cellpadding="0">
    <tr><td></td>
      <td><p align="center" class="style24">

<a href="http://www.kidswithfoodallergies.org/whatsnew.html">What's New</a>      <a href="http://www.kidswithfoodallergies.org/recipes.html">Recipes</a>      <a href="http://www.kidswithfoodallergies.org/resourcesnew.php">Parent Education Resources</a>         <a href="http://www.kidswithfoodallergies.org/faalerts.php">Food Allergy Alerts</a>        
<a href="http://www.kidswithfoodallergies.org/interlink.html">Allergy Links</a><BR>        <a href="http://www.kidswithfoodallergies.org/donate.html">Donate</a>   
<a href="http://www.kidswithfoodallergies.org/shopping.html">Shop KFA</a>        <a href="http://www.kidswithfoodallergies.org/marketplace.html">Allergy Friendly Businesses</a>        <a href="http://www.kidswithfoodallergies.org/community.html">Support Forums</a>        <a href="http://www.kidswithfoodallergies.org/memberships.html">Membership</a>	<a href="http://www.kidswithfoodallergies.org/contactus.html">Contact Us</a>        <a href="http://www.kidswithfoodallergies.org/about.html">About  </a> <BR>
<BR> 

       <a href="http://www.kidswithfoodallergies.org/privacy.html">Privacy Policy</a> and <a href="http://www.kidswithfoodallergies.org/tos.html">Terms of Service</a><br>
            Copyright (c) 2005-2007, Kids With Food Allergies, Inc.
            All Rights Reserved.<br>
            <i>
       Kids With Food Allergies was formerly known as POFAK (Parents of Food Allergic Kids)<br>
        before becoming a tax exempt charity in 2005.</i> &nbsp;</p></td>
    </tr>
  </table>
</center>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-216208-1";
urchinTracker();
</script>
</body>
</html>
