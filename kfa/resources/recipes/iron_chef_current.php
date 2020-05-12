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


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
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
		            <table align="center" border="0" cellpadding="5" cellspacing="2" ID="information" width="575">
		               <tr valign="top" bgcolor="#CCCCCC" align="left">
            <td height="33" colspan="2" valign="middle" bgcolor="#3F679B">
              <h1 align="center"><em>Creating Better Lives Today</em> for Kids With Food Allergies <br>
                 Recipe Showdown Fundraiser</h1>
          </td>
          </tr>
                     </table>
        <table width="575" align="center" border="0" cellpadding="5" class="style19" cellspacing="2" bgcolor="#E1E1E1">
          <tr valign="top" bgcolor="#CCCCCC" align="left">
            <td height="33" colspan="2" bgcolor="#FFFFFF" >
               
                        <!-- <p><strong>Welcome to the Kids With Food Allergies Kitchen Stadium!</strong><br>-->
           
                   
                       Thank you to all who participated in our <a href="http://www.kidswithfoodallergies.org/fundraisers.html" target="_blank">&quot;Recipe Showdown&quot; fundraiser</a>. KFA supporters like you helped raise over $1100 for Kids With Food Allergies. These recipes were served at parties across the nation and helped spread awareness about food allergies and the mission of Kids With Food Allergies.<br>
                  
                       <br>
                        <br>
                          <div align="center">  <strong>Showdown Theme: Grillin' &amp; Chillin'<br>
Secret Without(s): Dairy/Milk, Peanuts, Tree nuts, Shellfish, Fish</strong></strong><br>
<br>

                   </div>
                   <div align="center" style="margin-top:8px; margin-bottom:8px">
                  <table width="559" border="0" cellspacing="2" cellpadding="2" class="style19">
                          <tr valign="top">
                            <td width="157"><div align="center" style="padding-top:5px; padding-bottom:5px">Challenger #1:<br>
                
                           <a href="showrecipe.php?id=1588" target="_blank">
                           <img src="../ironchef/showdown1.jpg"  width="125" height="94" border="0" alt="I love tomatoes! Pasta Salad"><br>I Love Tomatoes Pasta Salad</a><br>                              
                               <br>
                               <br>
                               <br>
                            </div></td>
                            <td width="214"><div align="center" style="padding-top:5px; padding-bottom:5px">Challenger #2:<br>
                             <a href="showrecipe.php?id=1589" target="_blank"><img src="../ironchef/showdown2.jpg" alt="Bacon-Wrapped Chicken Kabobs" width="125" height="94" border="0"><br>
                             Bacon-Wrapped Chicken Kabobs</a><br>
                             <br>
 <div style="color:#006600">2nd place winner</div><br>
<br>
                            </div></td>
                            <td width="168"><div align="center" style="padding-top:5px; padding-bottom:5px">Challenger #3:<br>
                                <a href="showrecipe.php?id=1590" target="_blank"> <img src="../ironchef/showdown3.jpg" alt="Grilled Tortilla Wraps" width="125" height="94" border="0"><br>
                              Grilled Tortilla Wraps</a><br>
                              <br>
                              <div style="color:#006600">3rd place tie</div><br>
                               <br>
                            </div></td>
                          </tr>
                          <tr valign="top">
                            <td><div align="center" style="padding-top:5px; padding-bottom:5px">Challenger #4:<br>
                            <a href="showrecipe.php?id=1592" target="_blank"><img src="../ironchef/showdown4.jpg" alt="Berry Berry Ice Cream Pie" border="0"><br>
                            Berry Berry Ice Cream Pie</a><br>
                            <br>
                            <br>
                            <br>
                           </div></td>
                            <td><div align="center" style="padding-top:5px; padding-bottom:5px">Challenger #5:<br>
                             <a href="showrecipe.php?id=1593" target="_blank"> <img src="../ironchef/showdown5.jpg" alt="Mango Apricot Ice Cream" width="125" height="94" border="0"><br>
                              Mango Apricot &quot;Ice Cream&quot;</a><br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                            </div></td>
                            <td><div align="center" style="padding-top:5px; padding-bottom:5px">Challenger #6:<br>
<a href="showrecipe.php?id=1594" target="_blank"><img src="../ironchef/showdown6.jpg" alt="Honeyed Mint Fruit Salad" width="125" height="94" border="0"><br>
Honeyed Mint Fruit Salad</a><br>
<br>
<br>
<br>
<br>
                         
                            </div></td>
                          </tr>
                          <tr valign="middle">
                            <td><div align="center" style="padding-top:5px; padding-bottom:5px">Challenger #7:<br>
                                <a href="showrecipe.php?id=1595" target="_blank"><img src="../ironchef/showdown7.jpg" alt="California Caviar Bruschetta" width="125" height="94" border="0"><br>
                                California Caviar Bruschetta</a><br>
                                <br>
                                <div style="color:#006600">1st place winner!</div><br>
                                <br>
                            </div></td>
                            <td align="center" valign="middle">Thank you to all who participated and helped create this amazing array of summertime recipes!</td>
                            <td><div align="center" style="padding-top:5px; padding-bottom:5px">Challenger #8:<br>
                               <a href="showrecipe.php?id=1596" target="_blank"> <img src="../ironchef/showdown8.jpg" alt="Citrus Grilling Marinade" width="125" height="94" border="0"><br>Citrus Grilling Marinade</a><br>
                                <br>
                                <br>
                                <br>
                                <br>
                            </div></td>
                          </tr>
                        <tr valign="middle">
                            <td><div align="center" style="padding-top:5px; padding-bottom:5px"><br>
                              Challenger #9:<br>
                            <a href="showrecipe.php?id=1598" target="_blank"><img src="../ironchef/showdown9.jpg" alt="Summer Strawberry Delight" width="125" height="94"><br>Summer Strawberry Delight</a><br>
                            <br>
                          <br>
                            <br>
                            </div></td>
                            <td><div align="center" style="padding-top:5px; padding-bottom:5px"><br>
                              Challenger #10:<br>
                                <a href="showrecipe.php?id=1591" target="_blank"><img src="../ironchef/showdown10.jpg" alt="Creamy Potato Salad " width="125" height="94" border="0"><br>
                                Creamy Potato Salad </a><br>
                                <br>
                                <br>
                               <br>
                                <br>
                            </div></td>
                            <td><div align="center" style="padding-top:5px; padding-bottom:5px"><br>
                              Challenger #11:<br>
                               <a href="showrecipe.php?id=1600" target="_blank"> <img src="../ironchef/showdown11.jpg" alt="Vanilla JavAgave" width="125" height="94" border="0"><br>
Vanilla JavAgave</a><br>
                            
                            
                                <div style="color:#006600">Honorable Mention:<br>
                                Youngest challenger</div>
                                <br>
                            </div></td>
                          </tr>
                           <tr valign="middle">
                            <td><div align="center" style="padding-top:5px; padding-bottom:5px">Challenger #12:<br>
                            <a href="showrecipe.php?id=1599" target="_blank"><img src="../ironchef/showdown12.jpg" alt="Nectarine Ginger BBQ Sauce" width="125" height="94"><br>Nectarine Ginger BBQ Sauce</a><br>
                            <br>
                            <div style="color:#006600">3rd place tie</div><br>
                            </div></td>
                            <td><div align="center" style="padding-top:5px; padding-bottom:5px">Challenger #13:<br>
                            <a href="showrecipe.php?id=1604" target="_blank"><img src="../ironchef/showdown13.jpg" alt="Bubby's Turkey Patties" width="125" height="94"><br>
                            Bubby's Turkey Patties</a><br>
                            <br>
                            <br>
                            <br>
                            </div></td>
                            <td>
                            <div align="center" style="padding-top:5px; padding-bottom:5px">Challenger #14:<br>
                            <a href="showrecipe.php?id=1606" target="_blank"><img src="../ironchef/showdown14.jpg" alt="Grilled Rosemary Chicken &amp; Herb Potatoes" width="125" height="94" border="0"><br>
Rosemary Grilled Chicken
 &amp; Herb Potatoes</a><br>
                               <br>
                                <br>
                            </div>
                            </td>
                          </tr>
                        </table>
                  </div>
                        
                        <p>&nbsp;</p>
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
              electronically reproduce, repost or redistribute recipes elsewhere without <a class="style30" href="http://www.kidswithfoodallergies.org/email.php?to=info;" onClick="MM_openBrWindow('email.php?to=info','','width=500,height=500');return false">obtaining 
                permission</a>. <br>
              For more information, see our <a href="http://www.kidswithfoodallergies.org/tos.html">terms of 
                service</a>. <br>
                Copyright &copy; 2005-2009, Kids With Food Allergies, Inc. All rights reserved.</em>	
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
      <p align="center" class="style24">Page last updated 06/26/2009<br>
        <br>
      </p>      </td></tr>	  
         <tr><td><?php
  require("footer.html");
?></td>
      </tr></table>
         
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-216208-1";
urchinTracker();
</script>
</body>
</html>
