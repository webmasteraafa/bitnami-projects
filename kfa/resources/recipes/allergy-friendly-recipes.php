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






?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Safe Eats Allergy-Friendly Recipes</title>
<meta name="keywords" content="allergy, recipes, allergy-free, allergy-friendly, kids with food allergies, recipe, substitutions" />
<meta name="description" content="Kids With Food Allergies offers the largest allergy-free recipe collection: search for recipes free of your allergens, browse by category, and get personal help with substitutions." />

   <link rel="stylesheet" href="style.css" type="text/css" />
   <link href="../js/main.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="../js/forms.css" type="text/css" />
   <link href="../js/images.css" rel="stylesheet" type="text/css">


<link href="http://www.kidswithfoodallergies.org/js/main.css" rel="stylesheet" type="text/css">
<script language="javascript" src="http://www.kidswithfoodallergies.org/js/menu.js" type="text/javascript"></script>



<script language="JavaScript" type="text/javascript">

/*** Method that displays the pop window for help ***/
function showHelp(topic){
	var m = window.open("http://kidswithfoodallergies.org/recipes/help.html#"+ topic,"","scrollbars=yes, toolbar=no, resizable=no, width=550, height=250"); 
}

/*** Method that validates entered data ***/
function validate(){
   var error, emptyother, string, checkboxes, checked;
   checkboxes = document.searchform.elements;
   error = false;
   emptyother = false;
   string = "";

   if (searchform.course.value == '' && searchform.keyword.value == ''){
      checked = false;
      for(i=0; i < checkboxes.length; i++){
         if(checkboxes[i].type == 'checkbox'){
            if(checkboxes[i].checked == true){
               checked = true;
               break;
            }
         }
      }
      if(!checked){
         error = true;
		   string = "Must use Keyword, Course, Allergens ";
      }
   }

   if(document.searchform.other.checked && searchform.othertext.value == ''){
      emptyother = true;
      if(error)
	      string = string + "AND";
      string = string + " Fill in other allergens";
   }

   if (error || emptyother){
      alert (string);
      event.returnValue = false;
   }
}
</script>

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0  
	window.open(theURL,winName,features);
  return false;
}//-->
</script></head>
<body>
<?php
  require("topbanner2014.html");
?>

<table class="background" cellpadding="0" cellspacing="0" border="0" align="center" width="1000">
<tr>
<td valign="top" width="240">
         <?php
         require("leftnavigation2014.html"); ?>
</td><td width="20"></td>
<td align="left" valign="top" width="740">
    
              
 
            <div  style="background-color:#3F679B; padding:6px; color:#ffffff;" align="center"><h2 style="font-family:Cabin; font-size:16px; color:#ffffff;">Safe Eats &trade; Recipes (Allergy-Friendly, Search Free of Your Allergens)</h2>
            </div>
       <!--<table width="568" class="style19" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#E1E1E1">
        <tr valign="top" bgcolor="#CCCCCC" bordercolor="#FFFFFF" align="left">
        <td colspan="2" bgcolor="#FFFFFF">-->
         <div class="recipesgreyboxmain" style="color:#333333">
                <table border="0" align="center" cellpadding="1" cellspacing="2" id="ingredients" width="720">
                     <tr>
                     <td >
                     <h2 align="center">Welcome to Our Wonderful Collection of Safe Eats &trade; Allergy-Friendly Recipes!</h2>
                          Parents of food allergic children have shared thousands of their favorite recipes  that are indicated as &quot;free of&quot; many different allergens.  You can search to meet your special dietary needs, or you can browse by category. The &quot;free of&quot; boxes indicate that the recipe <em>can be</em> made without those allergens (it may require substitution to make the recipe safe for your particular needs).<br /> <br />
                       
                            <h2> Recipe Search</h2>
                        <form action="SearchHandling2014.php" method="POST" name="searchform" onsubmit="validate();">
                                             <table class="style19" style="color:#333333; border:#6AAFCA 2px solid;" align="center" width="488"><tr>   <td align="right" class="celltitlebg">Keyword:&nbsp;<a onclick="showHelp('keywordsearch')" href="javascript:void(0)"><img src="images/BtnHelpG.gif" border="0" alt="Keyword Help" /></a></td>
                        <td align="left" class="cellbg">
                           <input type="text" name="keyword" id="keyword" class="defaultfont" size="50" /></td>
                     </tr>
                  <tr>
                     <td align="right" class="celltitlebg">Exclude Words:&nbsp;<a onclick="showHelp('excludesearch')" href="javascript:void(0)"><img src="images/BtnHelpG.gif" border="0" alt="Exclude Words Help" /></a></td>
                     <td align="left" class="cellbg">
                        <input type="text" name="exclude" id="exclude" class="defaultfont" size="50" /></td>
                  </tr>
                  <tr>
                     <td align="right" class="celltitlebg">Category:&nbsp;<a onclick="showHelp('categorysearch')" href="javascript:void(0)"><img src="images/BtnHelpG.gif" border="0" alt="Category Help" /></a></td>
                     <td align="left" class="cellbg"><select name="course" id="course" class="defaultfont">
                       <option value="Any">Any</option>
                       <option value="Appetizers">Appetizer</option>
                       <option value="Baby Food">Baby Food</option>
                       <option value="Beverages">Beverages</option>
                       <option value="Breads">Breads</option>
                       <option value="Breakfast">Breakfast</option>
                       <option value="Cakes">Cakes</option>
                       <option value="Candy">Candy</option>
                       <option value="Casseroles">Casseroles</option>
                       <option value="Condiments">Condiments</option>
                       <option value="Cookies">Cookies</option>
                       <option value="Crafts">Crafts</option>
                       <option value="Desserts">Desserts</option>
                       <option value="Flour Mixes">Flour Mixes</option>
                       <option value="Frostings">Frostings</option>
                       <option value="Frozen Desserts">Frozen Desserts</option>
                       <option value="Jam">Jam</option>
                       <option value="Main Dishes">Main Dishes</option>
                       <option value="Miscellaneous">Miscellaneous</option>
                       <option value="Muffins">Muffins</option>
                       <option value="Pasta">Pasta</option>
                       <option value="Pies">Pies</option>
                       <option value="Sauces & Salsas">Sauces &amp; Salsas</option>
                       <option value="Side Dishes">Side Dishes</option>
                       <option value="Smoothies">Smoothies</option>
                       <option value="Snacks">Snacks</option>
                       <option value="Soups & Broths">Soups &amp; Broths</option>
                       <option value="Soy, Seed & Nut Butters">Soy, Seed &amp; Nut Butters</option>
                       <option value="Substitutes">Substitutes</option>
                     </select></td>
                     </tr>
                  </table>
               
            <!-- Allergen checkbox table -->
          
                  <table id="tblAllergenInfo" cellspacing="2" cellpadding="1" width="488" align="center" border="0" style="border:#6AAFCA 2px solid;">
                  <tr>
                     <td class="header" colspan="6">&nbsp;Show only recipes that are FREE of:&nbsp;<a onclick="showHelp('allergensearch')" href="javascript:void(0)"><img src="images/BtnHelpB.gif" border="0" alt="Search Help"></a></td>
                  </tr>
                  <tr>
                     <td class="celltitlebg" width="79">
           		      <input id="milkfree" type="checkbox" name="milkfree" value="ON" />&nbsp;<span class="allergenKey">M</span>ilk</td>
                     <td class="celltitlebg" width="80">
                     <input id="peanutfree" type="checkbox" name="peanutfree" value="ON" />&nbsp;<span class="allergenKey">P</span>eanut</td>
                     <td class="celltitlebg" width="60">
                     <input id="eggfree" type="checkbox" name="eggfree" value="ON" />&nbsp;<span class="allergenKey">E</span>gg</td>
                     <td class="celltitlebg" width="85">
                     <input id="soyfree" type="checkbox" name="soyfree" value="ON" />&nbsp;<span class="allergenKey">S</span>oy</td>
                     <td class="celltitlebg" width="84">
                     <input id="nutfree" type="checkbox" name="nutfree" value="ON" />&nbsp;<span class="allergenKey">T</span>ree nut</td>
                     <td class="celltitlebg" width="74">
                     <input id="cornfree" type="checkbox" name="cornfree" value="ON" />&nbsp;<span class="allergenKey">C</span>orn</td>
                  </tr>
                  <tr>  
                     <td class="celltitlebg" width="79">
                     <input id="glutenfree" type="checkbox" name="glutenfree" value="ON" />&nbsp;<span class="allergenKey">G</span>luten</td>
                     <td class="celltitlebg" width="80">
                     <input id="wheatfree" type="checkbox" name="wheatfree" value="ON" />&nbsp;<span class="allergenKey">W</span>heat</td>
                     <td class="celltitlebg" width="60">
                     <input id="fishfree" type="checkbox" name="fishfree" value="ON" />&nbsp;<span class="allergenKey">F</span>ish</td>
                     <td class="celltitlebg" width="85">
                     <input id="shellfishfree" type="checkbox" name="shellfishfree" value="ON" />&nbsp;<span class="allergenKey">Sh</span>ellfish</td>
                     <td class="celltitlebg" width="84">
                     <input id="sesamefree" type="checkbox" name="sesamefree" value="ON" />&nbsp;<span class="allergenKey">Ses</span>ame</td>
                     <td class="celltitlebg" width="74">
                     <input id="empty" type="checkbox" name="other" value="ON" />&nbsp;<span class="allergenKey">O</span>ther</td>
                  </tr>
                  </table>
            <!-- Search Button table -->
            <table align="center" cellpadding="2" cellspacing="10">
	            <tr>
	               <td>
                     <table id="SearchButtonTb" align="center">
                        <tr>
                           <td class="background"><input class="style19" name="search" type="submit" value="Search" style="color:#333333;" /></td>
                        </tr>
                     </table>
                  </td>
               </tr>
            </table>
            </form>
                       <br />
<br />

                
                    <img src="../images/cupcake.jpg" alt="Happy Birthday!" width="140" height="112" border="0" class="right">  <h2>Happy Birthday to Our Food Allergic Children!</h2>
                          Many parents visit us in a search for a &quot;safe&quot; birthday cake. Safe Eats&#8482; has many <a href="http://www.kidswithfoodallergies.org/recipes/browsecategory.php?category=Cakes" title="Cake Recipes">cake</a>, <a href="http://www.kidswithfoodallergies.org/recipes/browsecategory.php?category=Frostings" title="Frosting recipes">frosting</a> and <a href="http://www.kidswithfoodallergies.org/recipes/browsecategory.php?category=Frozen+Desserts" title="Ice Cream recipes">ice cream</a> recipes. Additionally, we have a support forum dedicated to <a href="http://community.kidswithfoodallergies.org/forum/celebrations_and_birthdays" title="Cake  Baking and Decorating Support Circle" target="_blank">Celebrating Birthdays &amp; Special Occasions with our Food Allergic Kids</a>   that is filled with wonderful ideas, tips, advice and pictures from other member parents (registration is free).  For tips on how to bake cakes and decorate them, check out our <a href="http://community.kidswithfoodallergies.org/tags/tag/13538049829331429">&quot;Cake Week&quot; blog posts</a>.<br /> <br /> <br /> <br />
                          
                          
                          <h2>Featured Recipes</h2>
                          
                          <table align="center" cellpadding="5" width="95%"><tr><td align="center"><a href="http://www.kidswithfoodallergies.org/recipes/showrecipe.php?id=1391"><img src="http://www.kidswithfoodallergies.org/ironchef/avacado1391-lg.jpg" alt="Avocado Wrappers" height="125" /></a><br />
<a href="http://www.kidswithfoodallergies.org/recipes/showrecipe.php?id=1391">Avocado Wrappers</a>
                          
                          </td>
                          
                          <td align="center"><a href="http://www.kidswithfoodallergies.org/recipes/showrecipe.php?id=1489"><img src="http://www.kidswithfoodallergies.org/ironchef/cookietruffles1489.jpg" alt="Chocolate Cookie Dough Truffles" height="125" /></a><br />
<a href="http://www.kidswithfoodallergies.org/recipes/showrecipe.php?id=1489">Chocolate Cookie Dough Truffles</a>
                          
                          </td>
                          
                          <td align="center">
                          <a href="http://www.kidswithfoodallergies.org/recipes/showrecipe.php?id=1165"><img src="http://www.kidswithfoodallergies.org/ironchef/berrycake.jpg" alt="Berry Cake" height="125" /></a><br />
<a href="http://www.kidswithfoodallergies.org/recipes/showrecipe.php?id=1165">Berry Cake</a>
                          
                          </td></tr></table>
                          
                          
                  <!-- fix pages    <a name="holidays"></a><h2>Celebrating Holidays</h2>
                          Holidays centered around food can cause quite a bit of stress for families dealing with food allergies. KFA has compiled collections of recipes to help you with your menu-planning for these events. Our <a href="http://kidswithfoodallergies.org/recipes/iron_chef.php">KFA Iron Chef Recipes</a> are also filled with many more recipes for holiday celebrations. <br /> <br />
           <div align="center"> <a style="color: #006699; font-size:14px; padding-bottom:6px" href="http://kidswithfoodallergies.org/recipes/football_party_recipes.php"><strong>13 Allergy-Free Party Recipes</strong></a><br />
 <a href="http://kidswithfoodallergies.org/recipes/football_party_recipes.php"><img src="http://www.kidswithfoodallergies.org/images/partyrecipesbanner.jpg" alt="Allergy-Free Party Recipes" width="500" height="67"  border="0" /></a>  <!-- We've put together a collection of allergy-free party recipes to help you compose a menu for this Sunday's Super Bowl game. This collection offers a wide variety of milk-free, egg-free, wheat-free, nut-free, and other allergen-free recipes so there is something safe for everyone. Full-color photos are included.</div><br />
      <br />
           
     <div align="center">  <a href="http://kidswithfoodallergies.org/recipes/valentines_day_recipes.php" style="color:#98312C;  font-size:14px; padding-bottom:6px"><strong>8 Sweet Allergy-Free Valentine's Day Recipes</strong></a><br />
  <a href="http://kidswithfoodallergies.org/recipes/valentines_day_recipes.php"><img src="http://www.kidswithfoodallergies.org/images/valentinesrecipesbanner.jpg" alt="Allergy-Free Party Recipes" width="500" height="76"  border="0" /></a><!--With these eight recipes, families with food allergies can enjoy delicious treats with their sweethearts! Find a recipe perfect for your special Valentine's Day occasion&mdash; from school parties to romantic dates for parents! </div>
      <br />
       <br />
                          <div align="center"> <a href="http://kidswithfoodallergies.org/recipes/halloween_recipes.php" style="color:#CC6600;  font-size:14px; padding-bottom:6px"><strong>15 Spooktacular Halloween Recipes</strong></a> <br />
                              <a href="http://kidswithfoodallergies.org/recipes/halloween_recipes.php"><img src="../images/halloween-recipes.jpg" alt="Allergy-Free Halloween Recipes" width="547" height="69"  border="0" /></a>
                            <!--We've put together a collection of allergy-free holiday recipes to help KFA Family Members plan delicious meals this holiday season. This collection offers a wide variety of milk-free, egg-free, wheat-free, nut-free, and other allergen-free recipes so there is something safe for everyone. Full-color photos are included.-
                          </div>
                          <br />
                          <div align="center"> <a href="http://www.kidswithfoodallergies.org/recipes/holiday_recipes.php" style="color:#668C40;  font-size:14px; padding-bottom:6px"><strong>52 Allergy-Free Holiday Recipes to the Rescue!</strong></a> <br />
                              <a href="http://www.kidswithfoodallergies.org/recipes/holiday_recipes.php"><img src="../ironchef/recipebanner.jpg" alt="Allergy-Free Holiday Recipes" width="543" height="70"  border="0" /></a>
                            <!--We've put together a collection of allergy-free holiday recipes to help KFA Family Members plan delicious meals this holiday season. This collection offers a wide variety of milk-free, egg-free, wheat-free, nut-free, and other allergen-free recipes so there is something safe for everyone. Full-color photos are included.-->
                          </div>
                      <br />
       <br />
      
 
<br />
<br />
<br />
                         
                       
                       
                     
                       
                      <h2> Recipe Help</h2>
                         If you have any questions or comments about any of the recipes in Safe Eats&trade;, <a href="http://community.kidswithfoodallergies.org/createForumContent/forum/safe_eats_comments">start a discussion topic</a> now or click &quot;have a question about this recipe&quot; on the recipe's page. This will lead you to discuss the recipe with our Food &amp; Cooking Support Team and other fellow members on our <a href="http://community.kidswithfoodallergies.org/category/food-and-cooking-support">Food &amp; Cooking Support Forums</a>.  They can help you alter a recipe to make it allergy-free for your child's needs.  Registration is free!<br /> <br /> <br />
                        <b>Some notes of caution:</b>
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
		</ol> <br /><br /><p><b>Copyright Policy: Copyright &copy; 2005-2014, Kids With Food Allergies. All rights reserved.</b></p>
            <p><em>Recipes are shared for your <strong>personal use only</strong>. </em>
            <p>You are welcome to enjoy these recipes and share links to our recipes, but please don't reprint, 
              electronically reproduce, repost or redistribute recipes elsewhere without <a href="https://www.kidswithfoodallergies.org/email.php?to=info;" onclick="MM_openBrWindow('https://www.kidswithfoodallergies.org/email.php?to=info','','width=570,height=600');return false">obtaining 
                permission</a>. 
              For more information, see our <a href="http://www.kidswithfoodallergies.org/tos.html">terms of 
                service</a>.</p> <br />
                	
            <p>&nbsp;</p></td>
              </tr>
    		         </table></div>
		  
      <!-- End of the code. Do not mess with the page beyond this point -->
      </td>
    </tr>
</form>
</table>

	
  <table width="750" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
      <td>	
      <p align="center" class="style24">Page last updated 01/01/2014</p>
       </td></tr>	  
         <tr><td>
         <?php
  require("footer2014.html");
?>
         </td></tr></table>
         
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try{
var pageTracker = _gat._getTracker("UA-216208-1");
pageTracker._trackPageview("/Recipe Home");
} catch(err) {}</script>
</body>
</html>
