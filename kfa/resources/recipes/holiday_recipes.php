<?php

session_start();
/*
echo ("after start".session_id()."<br />");
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
//echo ("after session write".session_id()."<br />");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <link rel="stylesheet" href="style.css" type="text/css" />
   <link href="../js/main.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="../js/forms.css" type="text/css" />
   <link href="../js/images.css" rel="stylesheet" type="text/css" />
<meta name="keywords" content="food allergies, allergy-safe recipes, allergen, allergy-free recipes" />
<meta name="description" content="Welcome to Safe Eats, an allergy-free recipe database." />

<link href="http://www.kidswithfoodallergies.org/js/main.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="http://www.kidswithfoodallergies.org/js/menu.js"></script>

   <title>Allergen-Free Holiday Recipes</title>
   <script src="../../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /></head>
<body>
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
              <h1 align="center">Allergy-Free Holiday Recipes Collection</h1>
          </td>
          </tr>
                     </table>
        <table width="575" align="center" border="0" cellpadding="5" class="style19" cellspacing="2" bgcolor="#E1E1E1">
          <tr valign="top" bgcolor="#CCCCCC" align="left">
            <td height="33" colspan="2" bgcolor="#FFFFFF" >
               
                 <!-- <p><strong>Welcome to the Kids With Food Allergies Kitchen Stadium!</strong><br />-->                      The holiday season can be very stressful for families dealing with food allergies. This collection of recipes will help you plan your allergy-free menus. Thank you to our  KFA Iron Chef Contestants, Family Members and Volunteers who have submitted these great recipes and photos.<br />
                 <br />
                 <strong>If you need any assistance</strong> with altering a recipe to make it safe for your needs, finding safe ingredients for a particular recipe, or have any other questions, <strong>click on &quot;have a question about this recipe&quot;</strong> to post on our Food &amp; Cooking forums.<br />
                 <br />
                <h2 align="center"> Main Dish Recipes</h2>
                
                <table width="561" border="0" align="center">
                  <tr>
                   <td width="158" align="center" valign="top"><a href="showrecipe.php?id=1361"><img src="../ironchef/roastchicken1361.jpg" alt="Baked Chicken and Apples" width="99" height="75"><br />Baked Chicken with Homemade Applesauce</a><br />
                     <br />
                     <a href="showrecipe.php?id=1518">Quinoa &amp; Turkey Loaf</a></td> <td width="226" align="center" valign="top"><a href="showrecipe.php?id=1164">Annika's Turkey Meatloaves</a><br />
                      <br />
                      <a href="showrecipe.php?id=1269">Annika's Turkey Pumpkin Patties</a><br /> 
<br />
<a href="showrecipe.php?id=5">Apple Turkey Meatballs</a><br />
<br />
<a href="showrecipe.php?id=1524">One-Dish Turkey Casserole</a><br />
<br /></td>
                    
                    <td width="163" align="center" valign="top"><a href="showrecipe.php?id=1604"><img src="http://www.kidswithfoodallergies.org/ironchef/showdown13.jpg" alt="Turkey Patties" width="100" height="75"><br />
Bubby's Turkey Patties</a><br />
<br />
<br />
<a href="showrecipe.php?id=25">Turkey Nuggets</a></td>
                  </tr>
                </table>
                <br />
                <br />
                <br />
             <h2 align="center">Side Dish Recipes</h2>
                <table width="561" border="0" cellpadding="6">
                  <tr>
                    <td width="149" align="center" valign="top"><a href="showrecipe.php?id=1171"><img src="../zoomimg/annikastuffing1171.jpg" alt="Gluten Free Stuffing" width="101" height="76"><br />
                      Annika's Stuffing</a></td>
                    <td width="205" align="center" valign="middle"><a href="showrecipe.php?id=1514">Angie's Unscalloped Potatoes</a><br />
                      <br />
                      <a href="showrecipe.php?id=1497">Clay's Savory Dressing Cookies</a></td>
                    <td width="163" align="center" valign="top"><a href="showrecipe.php?id=1754"><img src="../zoomimg/cranberrysauce1754.jpg" alt="Cranberry Sauce" width="99" height="74"><br />
                      Cranberry Orange Sauce</a></td>
                  </tr>
                  <tr>
                    <td align="center" valign="top"><a href="showrecipe.php?id=1523"><img src="../zoomimg/StuffingMadeSafe1523.jpg" alt="Allergy-Safe Stuffing" width="100" height="75"><br />
                      Grandma's Stuffing <br />
                      Made Safe</a></td>
                    <td align="center" valign="top"><img src="../images/boy_baking_pie.jpg" alt="Baking Food Allergy Safe Meals" width="184" height="122"></td>
                    <td align="center" valign="top"><a href="showrecipe.php?id=1560"><img src="../zoomimg/FruityChickenSalad1560.jpg" alt="Chicken/Turkey and Rice Salad" width="100" height="81"><br />
                      Fruity Chicken (or Turkey)<br />
 &amp; Rice Salad</a></td>
                  </tr>
                  <tr>
                    <td align="center" valign="top"><a href="showrecipe.php?id=259"><img src="../zoomimg/butternut259.jpg" alt="Butternut Squash" width="100" height="67"><br />
                      Mashed Butternut Squash</a></td>
                    <td align="center" valign="middle"><a href="showrecipe.php?id=705">Mashed Rutabagas</a><br />
                        <br />
                          <br />
                          <a href="showrecipe.php?id=875">My Sister's Famous Holiday Stuffing</a></td>
                    <td align="center" valign="top"><a href="showrecipe.php?id=1755"><img src="../zoomimg/roastedyams1755.jpg" alt="Roasted Yams" width="99" height="74"><br />
                      Roasted Sweet Potatoes <br />
&amp; Yams</a></td>
                  </tr><tr>
                    <td align="center" valign="top"><a href="showrecipe.php?id=1756"><img src="../zoomimg/mashedpotatoes1756.jpg" alt="Mashed Potatoes" width="100" height="67"><br />
                      Mashed Potatoes</a></td>
                    <td align="center" valign="middle"><a href="showrecipe.php?id=1636">Holiday Orange <br />
                      Sweet Potato Bake</a></td>
                    <td align="center" valign="top"><a href="showrecipe.php?id=1372"><img src="../zoomimg/spinachapplesalad1372.jpg" alt="Spinach Salad" width="99" height="74"><br />
                      Spinach Apple Salad</a></td>
                  </tr>
                </table>
                <br />
                <br />
                <br />

                <h2 align="center">Bread Recipes</h2>
                        <table width="561" border="0" align="center" cellpadding="3">
                          <tr>
                            <td width="132" align="center" valign="top"><a href="showrecipe.php?id=232"><img src="../zoomimg/BasicWhiteBread232.jpg" alt="Basic White Bread" width="100" height="81"><br />
                            Basic White Bread</a></td>
                            <td width="134" align="center" valign="top"><a href="showrecipe.php?id=1664"><img src="../zoomimg/butterhornrolls1664.jpg" alt="Crescent Rolls"><br />
                            Butterhorn Crescent Rolls</a></td>
                            <td width="137" align="center" valign="top"><a href="showrecipe.php?id=954"><img src="../zoomimg/DinnerRolls954.jpg" alt="Dinner Rolls"><br />
Dinner Rolls</a></td>
                            <td width="124" align="center" valign="top"><a href="showrecipe.php?id=1353"><img src="../zoomimg/fallcolorsbread.jpg" alt="Fall Colors Bread"><br />
Fall Colors Bread</a></td>
                          </tr>
                        </table>
                        <br />
                        <br />
                      <br />     
                      <h2 align="center">Beverages</h2>
                
<table width="561" border="0" align="center" cellpadding="3">
                          <tr>
                            <td width="163" align="center" valign="middle"><a href="showrecipe.php?id=1202"><img src="../zoomimg/ricenog.jpg" alt="Egg-Free Milk-Free Rice Nog" width="100" height="79"><br />
                            Egg-Free Milk-Free <br />
                            Rice Nog</a></td>
                            <td width="237" align="center" valign="middle">        <a href="showrecipe.php?id=330">Cranberry Ice</a><br />
                            <a href="showrecipe.php?id=1343"><br />
                            Milk-Free Hot Chocolate</a><br />
                            <br />
                        <a href="showrecipe.php?id=525">No Egg Eggnog</a></td>
                            <td width="135" align="center" valign="middle"><img src="../images/girl-eating2.jpg" alt="Food Allergic Kids" width="77" height="116">                    </td>
                            
                          </tr>
                        </table>
                        <br />
                      <br />  
                      <h2 align="center">Desserts</h2>
                      <table width="561" border="0" align="center" cellpadding="5">
                        <tr>
                          <td width="132" align="center" valign="top"><a href="showrecipe.php?id=1027"><img src="../zoomimg/applecrisp1027.jpg" alt="Apple Crisp" width="101" height="75"  border="0"  /><br />
                          Apple Crisp</a></td>
                          <td width="134" align="center" valign="top"><a href="showrecipe.php?id=848"><img src="../zoomimg/milletcrust848.jpg" alt="Millet Pie Crust" width="90" height="86"  border="0"  /><br />
                          Millet Pie Crust</a></td>
                          <td width="137" align="center" valign="top"><a href="showrecipe.php?id=1351"><img src="../zoomimg/pumpkincrumble.jpg" alt="Pumpkin Crumble" width="97" height="85"  border="0"  /><br />
                          Pumpkin Crumble</a></td>
                          <td width="124" align="center" valign="top"><a href="showrecipe.php?id=1529"><img src="http://kidswithfoodallergies.org/images/ironchef12.jpg" alt="Sunbutter Pie" width="110" height="83"  border="0"  /><br />
                        Sunbutter Pie</a></td>
                        </tr>
                        <tr>
                          <td width="132" align="center" valign="top"><a href="showrecipe.php?id=1363"><img src="../zoomimg/applegingerbreadcake.jpg" alt="Apple Ginger Cake" width="100" height="75"  border="0"  /><br />
                          Applesauce Gingerbread Cake</a></td>
                          <td width="134" align="center" valign="top"><a href="showrecipe.php?id=1165"><img src="../zoomimg/berrycake.jpg" alt="Gluten Free Berry Cake"  border="0"  /><br />
                          Berry Cake</a></td>
                          <td width="137" align="center" valign="top"><a href="showrecipe.php?id=45"><img src="../zoomimg/wackystarcupcakes.jpg" alt="Wacky Cake"  border="0"  /><br />
                          Wacky Cupcakes</a></td>
                          <td width="124" align="center" valign="top"><a href="showrecipe.php?id=1522"><img src="http://kidswithfoodallergies.org/images/ironchef11.jpg" alt="Black Forest Brownie Torte with Cherry Filling" width="114" height="84"  border="0"  /><br />
                          Black Forest Brownie Torte </a></td>
                        </tr>
                        <tr>
                          <td width="132" align="center" valign="top"><a href="showrecipe.php?id=387"><img src="../zoomimg/gingerbread_cookies.jpg" alt="Gingerbread Cookies"  border="0" /><br />
        Gingerbread Cookies</a></td>
                          <td width="134" align="center" valign="top"><a href="showrecipe.php?id=974"><img src="../zoomimg/gbcookies387.jpg" alt="Gingerbread Cookies"  border="0"  /><br />
                          Gluten Free Gingerbread Cookies</a></td>
                          <td width="137" align="center" valign="top"><a href="showrecipe.php?id=190"><img src="../zoomimg/gbfrosting190.jpg" alt="Gingerbread House Frosting"  border="0"  /><br />
                          Gingerbread House Frosting</a></td>
                          <td width="124" align="center" valign="top"><a href="showrecipe.php?id=1669"><img src="../zoomimg/sugarcookies1669.jpg" alt="Sugar Cookies" width="88" height="87"  border="0"  /><br />
                         Sugar Cookies</a></td>
                        </tr>
                        <tr>
                          <td width="132" align="center" valign="top"><a href="showrecipe.php?id=1355"><img src="../zoomimg/harvestoat.jpg" alt="Harvest Oat Cookies" width="101" height="76"  border="0"  /><br />
                          Harvest Oat Cookies</a></td>
                          <td width="134" align="center" valign="top"><a href="showrecipe.php?id=1180"><img src="../zoomimg/pumpkincookies.jpg" alt="Soft Pumpkin Cookies"  border="0"  /><br />
                          Soft Pumpkin Cookies</a></td>
                          <td width="137" align="center" valign="top"><a href="showrecipe.php?id=1457"><img src="../zoomimg/pumpkinmuffins1347.jpg" alt="Pumpkin Muffins"  border="0"  /><br />
                          Pumpkin Honey Streusel Muffins or Donuts</a></td>
                          <td width="124" align="center" valign="top"><a href="showrecipe.php?id=309"><img src="../zoomimg/pumpkin_muffins.jpg" alt="Pumpkin Muffins"  border="0"  /><br />
                         Cheryl's Pumpkin Muffins</a></td>
                        </tr>
                        
                        <tr>
                          <td width="132" align="center" valign="top"><a href="showrecipe.php?id=1356"><img src="http://www.kidswithfoodallergies.org/images/ironchef8.jpg" alt="Pumpkin Muffins with Streusel" width="104" height="81" border="0" /><br />
                         Pumpkin Muffins &amp; Pumpkin Seed Streusel</a></td>
                          <td width="134" align="center" valign="top"><a href="showrecipe.php?id=1665"><img src="../zoomimg/buckeyes.jpg" alt="Peanut-Free Buckeyes"  border="0"  /><br />
                         Peanut-Free Buckeyes</a></td>
                          <td width="137" align="center" valign="top"><a href="showrecipe.php?id=1375"><img src="../images/ironchef7.jpg" alt="Gluten Free Donuts" width="98" height="86"  border="0"  /><br />
                         Gluten Free Donuts</a></td>
                          <td width="124" align="center" valign="top"><a href="showrecipe.php?id=1352"><img src="../zoomimg/pumpkin_pastry.jpg" alt="Pumpkin Pastry Bites"  border="0"  /><br />
                         Pumpkin Pastry Bites</a></td>
                        </tr>
                      </table>
                      <br />
                      <br />
             
                      <br />
                      For &quot;traditional&quot; pumpkin pies, try:<br />
                      <br />
                      <a href="showrecipe.php?id=1109">No-Bake Pumpkin Pie</a> <br />
                      <br />
                      <a href="showrecipe.php?id=168">Mom's Pumpkin Pie</a><br />
                      <br />
                      <a href="showrecipe.php?id=760">Teresa's Pumpkin Pie</a><br />
<br />
<br />
<p>Don't forget to check out the <a href="http://kidswithfoodallergies.org/recipes/browsecategory.php?category=Candy"><strong>Candy</strong></a> category for a wide variety of allergy-friendly candy recipes.</p>
                      <p><br />
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
                        <br /><br /><p><b>Copyright Policy:</b></p>
            <p><em>Recipes are shared for your <strong>personal use only</strong>. </em>
            <p><em>You are welcome to enjoy these recipes, but please don't reprint, 
              electronically reproduce, repost or redistribute recipes elsewhere without <a class="style30" href="http://www.kidswithfoodallergies.org/email.php?to=info;" onclick="MM_openBrWindow('../email.php?to=info','','width=500,height=500');return false">obtaining 
                permission</a>. <br />
              For more information, see our <a href="http://www.kidswithfoodallergies.org/tos.html">terms of 
                service</a>. <br />
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
      <p align="center" class="style24">Page last updated 11/17/2009<br />
        <br />
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
pageTracker._trackPageview("/Holiday Recipes in Safe Eats");
} catch(err) {}</script>
</body>
</html>
