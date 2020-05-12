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

   <title>Allergen-Free Valentine's Day Recipes</title>
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
              <h1 align="center">Allergy-Free Valentine's Day Recipes</h1>
          </td>
          </tr>
                     </table>
        <table width="575" align="center" border="0" cellpadding="5" class="style19" cellspacing="2" bgcolor="#E1E1E1">
          <tr valign="top" bgcolor="#CCCCCC" align="left">
            <td height="33" colspan="2" bgcolor="#FFFFFF" >
               
                 <!-- <p><strong>Welcome to the Kids With Food Allergies Kitchen Stadium!</strong><br>-->
                 <img src="../images/valentines2.jpg" alt="Allergy Friendly Treats for Valentine's Day" width="300" height="190" class="right" />Chocolate...cinnamon...sugar...<br />
                 <br />
                 With these eight recipes, families with food allergies can enjoy delicious treats with their sweethearts! Find a recipe perfect for your special Valentine's Day occasion&#8212;from school parties to romantic dates for parents!<br />
                 <br />
                 Thank you to our members and volunteers that have submitted these amazing recipes and photos. <br />
                 <br />
<br />

              
                
                
                <table width="561" border="0" cellpadding="15" style="clear:right">
                <tr>
                    <td valign="top"><div align="center"><a href="showrecipe.php?id=1536" target="_blank"><img src="../zoomimg/chocolate1536.jpg" alt="Bite-Sized Chocolate Crisps" width="125" height="94" border="0" /></a></div></td>
                    <td><a href="showrecipe.php?id=1536" target="_blank" style="color:#990000"> <strong>Bite-Sized Chocolate Crisps</strong></a><br />
                       Requiring only a few ingredients and minimal cooking time, these chocolate candies can be whipped up on short notice!<br />
                      <br />
                      <br />
<br /></td>
                  </tr>  <tr>
                    <td width="171" valign="top"><div align="center"><a href="showrecipe.php?id=1522" target="_blank"><img src="../ironchef/brownie1522.jpg" alt="Black Forest Brownie Torte" width="132" height="96" border="0" /></a></div></td>
                    <td width="324"><a href="showrecipe.php?id=1522" target="_blank" style="color:#990000"><strong>Black Forest Brownie Torte</strong></a><strong>&nbsp; </strong><br />
                      A decadent dairy and egg free chocolate brownie marbled with cherry pie filling and topped with optional whipped topping.&nbsp;<br />
                      <br />
This recipe can be made free of the &quot;Top 8&quot; allergens. Kathy Przywara offers a wheat-based brownie  or a gluten-free brownie for this torte.</td>
                  </tr><tr>
                    <td valign="top"><div align="center"><a href="showrecipe.php?id=1489" target="_blank"><img src="../ironchef/cookietruffles1489.jpg" alt="Chocolate Chip Cookie Dough Truffles" width="157" height="95" border="0"></a></div></td>
                       <td><a href="showrecipe.php?id=1489" target="_blank" style="color:#990000">
                          <strong>Chocolate Chip Cookie Dough Truffles</strong></a><br />
One of our most popular recipes!  Balls of chocolate chip cookie dough smothered in melted chocolate.  This recipe makes about 52 truffles! <br /></td></tr><tr>
                    <td valign="top"><div align="center"><a href="showrecipe.php?id=1531" target="_blank"><img src="../ironchef/cinnamon1531.jpg" alt="Cinnamon Chews" width="125" height="94" border="0" /></a></div></td>
                    <td><a href="showrecipe.php?id=1531" target="_blank" style="color:#990000"><strong>Cinnamon Chews</strong></a><br />
                       These easy candies are reminiscent of spicy, little, red cinnamon hearts and have the texture of gumdrops. No candy thermometer required!</td>
                  </tr><tr>
                    <td valign="top"><div align="center"><a href="showrecipe.php?id=1669" target="_blank"> <img src="../zoomimg/sugarcookies1669.jpg" alt="Cut Out Sugar Cookies" width="99" height="98" border="0"></a></div></td>
                       <td><a href="showrecipe.php?id=1669" target="_blank" style="color:#990000"> 
                              <strong>Cut-Out Sugar Cookies</strong></a><br />
Make a nice, not overly-sweet cookie that can be eaten frosted or plain.<br />
<br /></td></tr>
                           <tr>
                    <td valign="top"><div align="center"><a href="showrecipe.php?id=1665" target="_blank"><img src="../zoomimg/buckeyes.jpg" alt="Peanut-Free Buckeyes" width="100" height="75" border="0" /></a></div></td>
                    <td><a href="showrecipe.php?id=1665" target="_blank" style="color:#990000"><strong>Peanut-Free Buckeyes</strong></a><strong>&nbsp;</strong><br />
Original &quot;Buckeyes&quot; are peanut butter balls dipped in chocolate. This version can be made safe for peanut allergy, milk allergy and soy allergy. </td>
                  </tr><tr>
                    <td valign="top"><div align="center"><a href="showrecipe.php?id=1526" target="_blank"><img src="../ironchef/cheesecake1526.jpg" alt="Dairy and Egg Free Cheesecake" width="151" height="98" border="0" /></a></div></td>
                    <td><a href="showrecipe.php?id=1526" target="_blank" style="color:#990000"><strong>Sinfully Delicious Eggless &quot;Cheese&quot;cake</strong></a><br /> 
                      Nothing is more perfect for Valentine's Day than a red and white &quot;cheesecake&quot;. The best part is that this &quot;cheesecake&quot; is dairy and egg free!</td>
                  </tr><tr>
                    <td valign="top"><div align="center"><a href="showrecipe.php?id=1529" target="_blank"><img src="../ironchef/sunbutter1529.jpg" alt="Sweetheart Sunbutter Pie" width="128" height="87" border="0"></a> </div></td>
                     <td><a href="showrecipe.php?id=1529" target="_blank" style="color:#990000"> <strong>Sweetheart Sunbutter Pie</strong> </a><br /> 
                       A fluffy, creamy replacement for peanut butter dream pie.
<br />
<br />
<br />
*A gluten-free option is included!</td>
                  </tr>
                </table>
                <br>
                <br />
                Don't forget to browse our <a href="http://kidswithfoodallergies.org/recipes/browsecategory.php?category=Candy" target="_blank" style="color:#990000"><strong>Candy</strong></a> category for more great recipes such as: <br />
<a href="showrecipe.php?id=1544" target="_blank" style="color:#990000">&quot;Just Sugar&quot; Lollipops</a>,

 <a href="showrecipe.php?id=1230" target="_blank" style="color:#990000">Crunch Chocolates</a> and  
 
 <a href="showrecipe.php?id=1532" target="_blank" style="color:#990000">Easy Chocolate Cherries</a>! <br />
                <br />
                <br />
                 <div align="center">  <div align="center" style="background-color: #990000; padding:3px; width:425px;"> <div style="padding:6px; background-color:#FFFFFF" align="left"><b>Please note:&nbsp;</b>
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
                permission</a>. <br />

              For more information, see our <a href="http://www.kidswithfoodallergies.org/tos.html">terms of 
                service</a>.<br />

                <br />
Copyright &copy; 2005-2010, Kids With Food Allergies, Inc. All rights reserved.</em>	
            <br />
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
