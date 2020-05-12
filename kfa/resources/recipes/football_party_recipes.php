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
   <link rel="stylesheet" href="style.css" type="text/css" />
   <link href="../js/main.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="../js/forms.css" type="text/css" />
   <link href="../js/images.css" rel="stylesheet" type="text/css" />
<meta name="keywords" content="food allergies, allergy-safe recipes, allergen, allergy-free recipes" />
<meta name="description" content="Welcome to Safe Eats, an allergy-free recipe database." />

<link href="http://www.kidswithfoodallergies.org/js/main.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="http://www.kidswithfoodallergies.org/js/menu.js"></script>

   <title>Allergen-Free Football Party Recipes</title>
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
              <h1 align="center">Allergy-Free Football Party Recipes</h1>
          </td>
          </tr>
                     </table>
        <table width="575" align="center" border="0" cellpadding="5" class="style19" cellspacing="2" bgcolor="#E1E1E1">
          <tr valign="top" bgcolor="#CCCCCC" align="left">
            <td height="33" colspan="2" bgcolor="#FFFFFF" >
               
                 <!-- <p><strong>Welcome to the Kids With Food Allergies Kitchen Stadium!</strong><br>-->
                 <img src="../images/football.jpg" alt="Football party" width="107" height="133" class="right" />                 Super Bowl Sunday is one of the largest food holidays of the year! Food allergies shouldn't prevent you from hosting the ultimate football party. With these 13 recipes, your party will be allergy-friendly and delicious!<br />
                 <br />
                 Don't forget to visit one of our <a href="http://kidswithfoodallergies.org/eve/forums/a/cfrm/f/5750079562" target="_blank">Food & Cooking forums</a> if you need any additional party or recipe ideas, or if you need assistance with recipe substitutions.<br />
                 <br />
                  Thank you to our members and volunteers that have submitted these amazing recipes and photos. <br />
<br />

                
                
                <table width="561" border="0" cellpadding="15">
               <tr>
                    <td valign="top"><div align="center"><a href="showrecipe.php?id=1397" target="_blank"><img src="../ironchef/sausagerolls.jpg" alt="Asian Fusion Sausage Rolls" width="125" height="94" border="0" /></a></div></td>
                    <td><a href="showrecipe.php?id=1397" target="_blank"> <strong>Asian Fusion Sausage Rolls</strong></a><br />
                      A twist on traditional Australian sausage rolls (filled with pork sausage and Italian herbs) with some Asian flavors. <br />
<br />


Ingredients are ground chicken, purchased puff pastry, bread, cabbage, onion, carrot, garlic, lemon zest, cilantro, fresh ginger, chili powder, black pepper and salt.</td>
                  </tr>   <tr>
                    <td width="171" valign="top"><div align="center"><a href="showrecipe.php?id=1391" target="_blank"><img src="../ironchef/avacado1391-lg.jpg" alt="Avocado Wrappers" width="138" height="110" border="0" /></a></div></td>
                    <td width="324"><a href="http://kidswithfoodallergies.org/recipes/showrecipe.php?id=1391" target="_blank"><strong>Avocado Wrappers</strong></a>&nbsp;with<strong>&nbsp;<a href="http://kidswithfoodallergies.org/recipes/showrecipe.php?id=1392" target="_blank">Honey Lime Dipping Sauce</a></strong><a href="http://kidswithfoodallergies.org/recipes/showrecipe.php?id=1392" target="_blank"></a><br />
                    Inspired by the Avocado Egg Rolls at The Cheesecake Factory, these are made with wonton wrappers and served with a sweet &amp; sour dipping sauce with a Mexican kick.<br />
                      <br />
                      Ingredient for the Avocado Wrappers are scallions, vegetable oil, fresh lime juice, sundried tomatoes (packed in oil), cilantro, salt, black pepper, avocados, wonton wrappers and oil.<br />
                      <br />
                      Ingredients for the Honey Lime Dipping Sauce are honey, white vinegar, balsamic vinegar, ground ginger, garlic, green onions, black pepper, salt, lime, cilantro and extra virgin olive oil. </td>
                  </tr><tr>
                    <td valign="top"><div align="center"><a href="showrecipe.php?id=1589" target="_blank"><img src="../ironchef/kabobs.jpg" alt="Bacon-Wrapped Chicken Kabobs" width="161" height="117" border="0"></a> </div></td>
                     <td><a href="showrecipe.php?id=1589" target="_blank"> <strong>Bacon-Wrapped Chicken Kabobs</strong> </a><br /> 
                       These are a big crowd pleaser, and even people who don't think they like mushrooms will love these!
                       
                       
<br />
<br />Ingredients include chicken, bacon, mushrooms, pineapple, honey, ume plum vinegar, cider vinegar, green onions and oil.

</td>
                  </tr><tr>
                    <td valign="top"><div align="center"><a href="showrecipe.php?id=1396" target="_blank"><img src="../ironchef/bakedchickenbites-sm.jpg" alt="Baked Chicken Bites" width="125" height="94" border="0" /></a></div></td>
                    <td><a href="showrecipe.php?id=1396" target="_blank"><strong>Baked Party Chicken Bites</strong></a>&nbsp;with&nbsp;<a href="showrecipe.php?id=1398" target="_blank"><strong>Sweet &amp; Sour Dipping Sauce</strong></a><strong>&nbsp;</strong><br />
                       These &quot;top-8-free&quot; chicken nuggets coated with rice cereal bake up to a crunchy, golden brown. Served with a tangy sweet and sour sauce they are a wonder party treat for everyone.<br />
                      <br />
The ingredients for the baked chicken bites are Rice Crunch 'Ems or other crispy rice cereal, sorghum flour, tapioca flour, dried oregano, dried thyme, fresh ground pepper, salt, boneless, skinless chicken breasts and olive oil.<br />
<br />
The ingredients for the sweet &amp; sour dipping sauce are cornstarch or sweet rice flour, agave nectar, rice vinegar, pineapple juice, wheat-free soy sauce, water. </td>
                  </tr>
                    <tr>
                    <td valign="top"><div align="center"><a href="showrecipe.php?id=1395" target="_blank"><img src="../ironchef/buffalochickendip-sm.jpg" alt="Buffalo Chicken Dip" width="134" height="101" border="0" /></a></div></td>
                    <td><a href="showrecipe.php?id=1395" target="_blank"><strong>Buffalo Chicken Dip</strong></a><strong>&nbsp;</strong><br /> 
                      A baked dip that combines  spicy, buffalo chicken meat with a cooling ranch dressing taste created by using pureed canned beans.<br />
                      <br />
Ingredients are cannellini beans, unflavored milk alternative or chicken broth, lemon juice, garlic powder, onion powder, parsley, cayenne pepper, salt, pepper, cooked chicken (can be canned), margarine and Frank's Red Hot Sauce. </td>
                  </tr>    <tr>
                    <td valign="top"><div align="center"><a href="showrecipe.php?id=1595" target="_blank"><img src="../ironchef/showdown7.jpg" alt="California Caviar Bruschetta" width="125" height="94" border="0"></a></div></td>
                       <td><a href="showrecipe.php?id=1595" target="_blank">
                          <strong>California Caviar Bruschetta</strong></a><br />
This is a California twist on a Texas classic. The creaminess of the avocado blends nicely with the tangy vinegar and lime juice. Fast and easy to make, this recipe is perfect for parties! *Vegetarian<br />
<br />
Ingredients include black beans, French bread, onion, tomato, cilantro, garlic, avocados, olive oil, lime juice, red wine vinegar, salt and pepper.</td></tr>   <tr>
                    <td valign="top"><div align="center"><a href="showrecipe.php?id=1590" target="_blank"> <img src="../ironchef/showdown3.jpg" alt="Grilled Tortilla Wraps" width="125" height="94" border="0"></a></div></td>
                       <td><a href="showrecipe.php?id=1590" target="_blank"> 
                              <strong>Grilled Tortilla Wraps</strong></a><br />
Each of your guests can customize their toppings for these tortilla wraps.  Offer an array of grilled meat and vegetables to please everyone.<br />
<br />
Ingredients can include tortillas, meat of your choice, vegetables of your choice, Tofutti soy sour cream, salsa, spices and oil.</td></tr><tr>
                    <td valign="top"><div align="center"><a href="showrecipe.php?id=1390" target="_blank"><img src="../ironchef/salsabeef1390.jpg" alt="Salsa Beef or Chicken Bites" width="126" height="84" border="0" /></a></div></td>
                    <td><a href="showrecipe.php?id=1390" target="_blank"><strong>Salsa Beef or Chicken Bakes</strong></a><strong>&nbsp;</strong><br />
                      Use  leftover shredded beef or chicken and  crescent rolls to quickly make these tasty bites.<br />
                      <br />
Ingredients are  crescent rolls, leftover beef or chicken, chunky salsa and green onions. </td>
                  </tr> <tr>
                    <td valign="top">
                      <div align="center"><a href="showrecipe.php?id=1420" target="_blank"><img src="../ironchef/swbakedbeans.jpg" alt="Southwestern Baked Beans" width="131" height="104" border="0" /></a></div></td>
                       <td><a href="showrecipe.php?id=1420" target="_blank"><strong>Southwestern Baked Beans</strong></a><br />
                       Warm, hearty baked beans with southwestern flavors. This vegetarian option is great comfort food and is sure to be a hit!
                         *Vegetarian<br />
                         <br />
                         Ingredients are vegetarian baked beans, tomatoes, chipotle peppers in adobo sauce, mushrooms, scallions, cilantro, olive oil and water.</td>
                  </tr><tr>
                    <td valign="top"><div align="center"><a href="showrecipe.php?id=1590" target="_blank"><img src="../ironchef/artichoke1394-lg.jpg" alt="Spinach Artichoke Dip" width="124" height="151" border="0" /></a></div></td>
                    <td><a href="showrecipe.php?id=1394" target="_blank"><strong>Spinach and Artichoke Tailgate Dip</strong></a><strong>&nbsp;</strong><br />
                      A crowd-pleasing dip based on soy sour cream and cream cheese&#8212; it relies on the salty smokiness of bacon, the sweet caramelization of onions and the fresh bite of tomatoes to overpower the &quot;soy&quot; aftertaste. *Vegetarian<br />
                      <br />
Ingredients are bacon, onions, salt, fresh ground black pepper, Tofutti Better Than Cream Cheese, Tofutti Sour Supreme, cayenne pepper, canned artichoke hearts, extra-virgin olive oil, fresh baby spinach and tomato. </td>
                  </tr>
                  
                  <tr>
                    <td valign="top"><div align="center"><a href="showrecipe.php?id=1400" target="_blank"><img src="../ironchef/fruitdip1400.jpg" width="125" height="87" alt="Fruit and Dip" border="0" /></a></div></td>
                    <td><a href="showrecipe.php?id=1400" target="_blank"><strong>Super Bowls of Fruit Dip</strong></a><strong>&nbsp;</strong><br /> 
                      Creamy fruit dip based on coconut milk with many flavor options. *Vegetarian<br />
                      <br />
Ingredients are canned coconut milk, sugar, vanilla extract, corn or tapioca starch, plus the flavoring options of your choice. Serve with sliced fruits of your choice. </td>
                  </tr>
                </table>
                <br>
                <br />
               <br />
                <br />
                 <div align="center">  <div align="center" style="background-color:#003366; padding:3px; width:425px;"> <div style="padding:6px; background-color:#FFFFFF" align="left"><b>Please note:&nbsp;</b>
          <br />
<ol>
                  <li style="padding-bottom:5px;">These recipes have been donated by our members and have not been tested in a test kitchen, therefore we can't guarantee the results.&nbsp;<br />
                  </li>
                  <li style="padding-bottom:5px;">Safety of ingredients is important. As we all know the same product manufactured in different plants at different parts of the country may not contain the same ingredients.&nbsp;<br />
                  </li>
                  <li style="padding-bottom:5px;">For the &quot;free of&quot; categorization, you should not make any assumptions as to the safety of an ingredient that is included in any of these recipes. It will be up to you to do your own research to make sure that each ingredient in these recipes is indeed safe for your child's unique allergy issues.&nbsp;<br />
                  </li>
                  <li style="padding-bottom:5px;">Use of the database indicates your agreement with our <a href="tos.html">terms of service</a>.</li>
            </ol></div></div></div><br />
<br />

                      <strong>Copyright Policy:</strong>
           <br />
<br />
<em>Recipes are shared for your <strong>personal use only</strong>. </em>
           <br />
<br />
You are welcome to enjoy these recipes, but please don't reprint, 
              electronically reproduce, repost or redistribute recipes elsewhere without <a class="style30" href="http://www.kidswithfoodallergies.org/email.php?to=info;" onclick="MM_openBrWindow('../email.php?to=info','','width=500,height=500');return false">obtaining 
                permission</a>. <br>
              For more information, see our <a href="http://www.kidswithfoodallergies.org/tos.html">terms of 
                service</a>. <br />
                <br>
                Copyright &copy; 2005-2010, Kids With Food Allergies, Inc. All rights reserved.<br />
                <br /></td>
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
      <p align="center" class="style24">Page last updated 02/02/2010<br>
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
pageTracker._trackPageview("/Holiday Recipes in Safe Eats");
} catch(err) {}</script>
</body>
</html>
