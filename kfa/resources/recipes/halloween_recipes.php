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

//print_r($_COOKIE);
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
    //echo "<meta http-equiv=\"Refresh\" CONTENT=\"0; URL=http://www.kidswithfoodallergies.org/recipes/introduction.php\">";
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


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <link rel="stylesheet" href="style.css" type="text/css">
   <link href="../js/main.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="../js/forms.css" type="text/css">
   <link href="../js/images.css" rel="stylesheet" type="text/css">
<meta name="keywords" content="food allergies, allergy-safe recipes, allergen, allergy-free recipes">
<meta name="description" content="Welcome to Safe Eats, an allergy-free recipe database.">

<link href="http://www.kidswithfoodallergies.org/js/main.css" rel="stylesheet" type="text/css">
<script language="javascript" type="text/javascript" src="http://www.kidswithfoodallergies.org/js/menu.js"></script>

   <title>Safe Eats Recipe database: Allergen free recipes</title>
   <script src="../../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>
<body>
<div align="center">
  <?php
  require("topbanner1.html");
?>
  

<table class="background" cellpadding="0" cellspacing="0" border="0" align="center" width="750">
   <tr>
      <td valign="top" align="left"><?php
         require("leftnavigation.html"); ?></td>
      <td align="left" valign="top">

   
      <!-- Start pasting your code right here !!! --> 
          <table align="center" cellpadding="2" cellspacing="0">
	         <tr>
	            <td>
		            <table align="center" border="0" cellpadding="5" cellspacing="2" id="information" width="575">
		               <tr valign="top" bgcolor="#CCCCCC" align="left">
            <td height="33" colspan="2" valign="middle" bgcolor="#3F679B">
              <h1 align="center">Halloween Treats Without Tricky Allergens</h1>
          </td>
          </tr>
                     </table>
        <table width="575" align="center" border="0" cellpadding="5" class="style19" cellspacing="2" bgcolor="#E1E1E1">
          <tr valign="top" bgcolor="#CCCCCC" align="left">
            <td height="33" colspan="2" bgcolor="#FFFFFF" >
               
                 <div align="center" style="width:500px">
                   <!-- <p><strong>Welcome to the Kids With Food Allergies Kitchen Stadium!</strong><br>--><br>
                     <br>
                   These Spooktacular recipes for Halloween offer great allergy-friendly alternatives!
                   Thank you to our KFA members and volunteers who have submitted these recipes and photos.<br>
                 </div>
                 <table width="500" border="0" cellpadding="3" align="center" style="font-family: Arial, Helvetica, sans-serif; color:#666666; font-size:12px;">
  <tr>
    <td width="163" align="center" valign="top"><a href="http://kidswithfoodallergies.org/recipes/showrecipe.php?id=309" target="_blank" style="color: #006699; font-size:12px;"><img src="http://www.kidswithfoodallergies.org/zoomimg/pumpkin_muffins.jpg" alt="Pumpkin Muffins" border="0" /><br />
          <strong>Pumpkin Muffins</strong></a><br />
          <span style="font-size:10px;">A very popular milk-free, <br />
            egg-free recipe </span></td>
    <td width="164" align="center" valign="top"><a href="http://kidswithfoodallergies.org/recipes/showrecipe.php?id=387" target="_blank" style="color: #006699; font-size:12px;"><img src="http://www.kidswithfoodallergies.org/zoomimg/gingerbread_cookies.jpg" alt="Gingerbread Cookies"  border="0" /><br />
          <strong>Gingerbread Cookies</strong></a><br />
          <span style="font-size:10px;">These little pumpkins are sure to please!</span></td>
    <td width="147" align="center" valign="top"><a href="http://kidswithfoodallergies.org/recipes/showrecipe.php?id=188" target="_blank" style="color: #006699; font-size:12px;"><img src="http://www.kidswithfoodallergies.org/zoomimg/softsugarcookies1.jpg" alt="Soft Sugar Cookies" border="0" /><br />
          <strong>Soft Sugar Cookies</strong></a><br />
          <span style="font-size:10px;">Boo-tiful treats that can be made without milk or eggs</span> </td>
  </tr>
  <tr>
    <td align="center" valign="top"><a href="http://kidswithfoodallergies.org/recipes/showrecipe.php?id=1352" target="_blank" style="color: #006699; font-size:12px;"><img src="http://www.kidswithfoodallergies.org/zoomimg/pumpkin_pastry.jpg" alt="Pumpkin Pastry Bites" border="0" /><br />
          <strong>Pumpkin Pastry Bites</strong></a><br />
          <span style="font-size:10px;"> Light and flaky dough filled with a creamy filling</span></td>
    <td align="center" valign="top"><a href="http://kidswithfoodallergies.org/recipes/showrecipe.php?id=1356" target="_blank" style="color: #006699; font-size:12px;"><img src="http://www.kidswithfoodallergies.org/images/ironchef8.jpg" alt="Pumpkin Muffins with Streusel" width="104" height="81" border="0" /><br />
          <strong>Pumpkin Muffins &amp; Pumpkin Seed Streusel</strong></a><br />
          <span style="font-size:10px;">Free of milk, eggs, wheat</span></td>
    <td align="center" valign="top"><a href="http://kidswithfoodallergies.org/recipes/showrecipe.php?id=1115" target="_blank" style="color: #006699; font-size:12px;"><img src="http://www.kidswithfoodallergies.org/zoomimg/caramel-apple.jpg" alt="Caramel Apple Dip" border="0" /><br />
          <strong>Caramel Apple Dip</strong></a><br />
          <span style="font-size:10px;">A sticky, gooey delight!</span></td>
  </tr>
  <tr>
    <td align="center" valign="top"><a href="http://kidswithfoodallergies.org/recipes/showrecipe.php?id=1544" target="_blank" style="color: #006699; font-size:12px;"><img src="http://www.kidswithfoodallergies.org/ironchef/just-sugar-lollipops.jpg" alt="Just Sugar Lollipops" border="0" width="100" /><br />
          <strong>Just Sugar Lollipops</strong></a><br />
          <span style="font-size:10px;">A sugar-only treat!</span></td>
    <td align="center" valign="top"><a href="http://kidswithfoodallergies.org/recipes/showrecipe.php?id=974" target="_blank" style="color: #006699; font-size:12px;"><img src="http://www.kidswithfoodallergies.org/ironchef/gingerbread_coffin_skeleton.jpg" alt="Gingerbread Cookies"  border="0" width="110" /><br />
        <strong>Gingerbread Cookies</strong></a><br />
        <span style="font-size:10px;">This skeleton and coffin is made gluten-free! <a href="http://kidswithfoodallergies.org/recipes/showrecipe.php?id=4" target="_blank" >Mock Royal Icing</a></span></td>
    <td align="center" valign="top"><a href="http://kidswithfoodallergies.org/recipes/showrecipe.php?id=1556" target="_blank" style="color: #006699; font-size:12px;"><img src="http://www.kidswithfoodallergies.org/ironchef/eyeball-cupcakes.jpg" alt="Starlight Cupcakes as Eyeballs" border="0" width="100" /><br />
          <strong>Eyeball Cupcakes</strong></a><br />
          <span style="font-size:10px;">Made with Starlight Cake and <a href="http://kidswithfoodallergies.org/recipes/showrecipe.php?id=577" target="_blank">Buttercream Frosting</a>. <a href="http://www.kidswithfoodallergies.org/resourcespre.php?id=119&title=allergy_free_halloween_recipes">Instructions here</a></span></td>
  </tr>
  <tr>
    <td align="center" valign="top"><a href="http://kidswithfoodallergies.org/recipes/showrecipe.php?id=1352" target="_blank" style="color: #006699; font-size:12px;"><img src="http://www.kidswithfoodallergies.org/ironchef/pumpkin-pie-molds.jpg" alt="Pumpkin Pastry Bites" border="0" height="90" /><br />
          <strong>Pumpkin Pie Jack o' Lanterns</strong></a><br />
          <span style="font-size:10px;"> Egg-free, milk-free pumpkin pie molded into jack-o'-lanterns</span></td>
    <td align="center" valign="top"><a href="http://kidswithfoodallergies.org/recipes/showrecipe.php?id=1791" target="_blank" style="color: #006699; font-size:12px;"><img src="http://www.kidswithfoodallergies.org/ironchef/worms-sm.jpg" alt="Jello Worms" width="104" height="81" border="0" /><br />
          <strong>Gel Worms</strong></a><br />
          <span class="style22">Realistic-looking worms  will creep out your party-goers!</span></td>
    <td align="center" valign="top"><a href="http://kidswithfoodallergies.org/recipes/showrecipe.php?id=1180" target="_blank" style="color: #006699; font-size:12px;"><img src="http://www.kidswithfoodallergies.org/ironchef/pumpkincookies.jpg" alt="Gluten Free" border="0" width="100"/><br />
          <strong>Soft Pumpkin Cookies</strong></a><br />
          <span class="style22">Gluten-free</span></td></tr><tr><td colspan="3" align="center" valign="top"><a href="http://www.kidswithfoodallergies.org/resourcespre.php?id=119&title=allergy_free_halloween_recipes#witch" target="_blank"style="color: #006699; font-size:12px;"><img src="../ironchef/witch-cake.jpg" height="180" /><br />
                <strong>Witch Cake</strong></a></td>
  </tr>
</table>
                          <p>Don't forget to check out the <a href="http://kidswithfoodallergies.org/recipes/browsecategory.php?category=Candy"><strong>Candy</strong></a> category for a wide variety of allergy-friendly candy recipes.</p>
                      <p><br>
                        <b>Some notes of caution:</b>				</p>
                      <ol>
					  <li>These recipes have been donated by our members and have not
						    been tested in a test kitchen, therefore we can't guarantee the results.</li>
					  <li>Safety of ingredients is important. As we all know the same
						    product manufactured in different plants at different parts of the country
						    may not contain the same ingredients.</li>
					  <li>For the &quot;free of&quot; categorization, you should not
							 make any assumptions as to the safety of an ingredient that is included in
							 any of these recipes. It will be up to you to do your own
						    research to make sure that each ingredient in these recipes is indeed safe
						    for your child's unique allergy issues.</li>
					  <li>Use of the database indicates the user's agreement
						    with our terms of service.</li>
		</ol>
                        <br><br><p><b>Copyright Policy:</b></p>
            <p><em>Recipes are shared for your <strong>personal use only</strong>. </em>
            <p><em>You are welcome to enjoy these recipes, but please don't reprint, 
              electronically reproduce, repost or redistribute recipes elsewhere without <a class="style30" href="http://www.kidswithfoodallergies.org/email.php?to=info;" onclick="MM_openBrWindow('../email.php?to=info','','width=500,height=500');return false">obtaining 
                permission</a>. <br>
              For more information, see our <a href="http://www.kidswithfoodallergies.org/tos.html">terms of 
                service</a>. <br>
                Copyright &copy; 2005-2010, Kids With Food Allergies, Inc. All rights reserved.</em>	
            <p>&nbsp;</p></td>
              </tr>
    		         </table>		         </td>
	         </tr>
	      </table>
      <!-- End of the code. Do not mess with the page beyond this point -->      </td>
    </tr>
</form>
</table>

	
  <table width="750" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
      <td>	
      <p align="center" class="style24">Page last updated 10/24/2010<br>
        <br>
      </p>      </td></tr>	  
         <tr><td><?php
  require("footer.html");
?></td>
      </tr></table>
         
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try{
var pageTracker = _gat._getTracker("UA-216208-1");
pageTracker._trackPageview("/Halloween Recipes in Safe Eats");
} catch(err) {}</script>
</body>
</html>
