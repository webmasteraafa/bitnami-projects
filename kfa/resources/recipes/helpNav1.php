<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
   <head>
   <link href="../js/main.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="style.css" type="text/css">
<meta name="keywords" content="food allergies, milk allergy , egg allergy, peanuts allergy, nut, latex, corn, soy allergy">
<meta name="description" content="Kids with food allergies information and support">
<meta name="keywords" content="kids with food allergies, children with food allergies, food allergies, milk allergy, egg allergy, soy allergy, peanut allergy, allergy support, allergy group, latex allergy, food allergy dictionary, allergy chat, allergy newsletter">
<meta name="description" content="Home for families with food allergic kids. A place where you will find a lot of information and support regarding allergies">
<link href="http://www.kidswithfoodallergies.org/js/main.css" rel="stylesheet" type="text/css">
<link href="http://www.kidswithfoodallergies.org/js/images.css" rel="stylesheet" type="text/css">
<link href="http://www.kidswithfoodallergies.org/js/forms.css" rel="stylesheet" type="text/css">
<script language="javascript" src="http://www.kidswithfoodallergies.org/js/menu.js" type="text/javascript"></script>

      <title>Help - Safe Eats Recipe Database</title>
   </head>
<body>
<?php
  //Imports the top banner for viewing
  require("topbanner1.html");
?>

<table class="background" cellpadding="0" cellspacing="0" border="0" align="center">
   <tr>
      <td valign="top" width="180">
         <?php
              //Imports left navigation for viewing
              require("leftnavigation1.html");
         ?>
      </td>
      <td align="left" valign="top">
      <form action="insert_recipe.php" method="POST" name="mainform" onSubmit="validate();" ID="Form1">
         <!--Header Table -->
         <table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF">
          <tr valign="top" bgcolor="#CCCCCC" align="left">
            <td height="33" colspan="2" valign="middle" bgcolor="#3F679B"><div align="left">
            <h1>&nbsp;&nbsp;&nbsp; Safe Eats Database Help</h1>
            </div></td>
          </tr>
        </table>
<table width="565" align="center" border="0" cellpadding="5" cellspacing="2" bgcolor="#E1E1E1">
<tr valign="top" bgcolor="#CCCCCC" align="left">
<td colspan="2" bgcolor="#FFFFFF" align="center">
                  <!--Add Recipe Help -->
                  <table align="left" border="0" cellpadding="1" cellspacing="2" ID="tblInstructions" width="468">
                     <tr>
                        <td class="header">&nbsp;&quot;Share A Recipe&quot; Help&nbsp;</td>
                     </tr>
                     <tr class="cellbg">
                        <td class="helppanel">
                           <p>This section describes each field on the share a recipe page.</p>
                           <p>
                              <a name="recipename"><b>Recipe Name</b></a>: The name of the recipe.<br>
                              <br>
                              <a name="category"><b>Category</b></a>: Select the option that 
                              best describe the recipe.<br>
                              <br>
                              <a name="servings"><b>Number of Servings</b></a>: If available, enter the number 
                              of people this recipe serves.<br>
                              <br>
                              <a name="contributor"><b>Recipe Entered By</b></a>: The display name (User ID) 
                              of the individual submitting this recipe.<br>
                              <br>
                              <a name="source"><b>Recipe Created By</b></a>: This should either be your name or, if you 
                              obtain permission, you may list the creator of a recipe other than yourself 
                              (for instance, indicate &quot;Mary Jones, with permission&quot;) Make sure a recipe is in 
                              your own words. If you've modified someone else's a recipe and it's in your own 
                              words, review <a href="http://www.copyright.gov/fls/fl122.html" target="_blank">http://www.copyright.gov/fls/fl122.html</a>
                              to see if you believe it meets the intent of U.S. copyright laws as your own 
                              creation. We are unable to accept recipes copied word for word from cookbooks, 
                              publications or other Web sites.<br>
                              <br>
                              <a name="quantity"><b>Quantity</b></a>: A numeric value, fractions and decimals 
                              accepted (e.g. 1, 2.5, 3/4).<br>
                              <br>
                              <a name="measure"><b>Measure</b></a>: A unit of measure (e.g. teaspoon, 
                              tablespoon, cup, pinch).<br>
                              <br>
                              <a name="ingredient"><b>Ingredient</b></a>: The items needed for the recipe. This 
                              section may also include descriptions (e.g. CHOPPED onion, or DICED carrots).<br>
                              <br>
                              <a name="optional"><b>Optional</b></a>: Check the checkbox if this ingredient is 
                              optional in the recipe. Leave unchecked if the ingredient is required.<br>
                              <br>
                              <a name="instructions"><b>Instructions</b></a>: Give a detailed description on how 
                              to prepare the food with the ingredients entered above.<br>
                              <br>
                              <a name="comments"><b>Comments</b></a>: Your personal comment or tips about this 
                              recipe.<br>
                              <br>
                              <a name="substitution"><b>Substitution Notes</b></a>: Ingredients that can be 
                              substituted or replaced with other ingredients.<br>
                              <br>
                              <a name="allergen"><b>Allergen Information</b></a>: Check the checkbox that this 
                              recipe is free of. If there is not a checkbox available, check the other box 
                              and type in the allergen this recipe is free of. If there is more than one, 
                              separate each allergen by a comma (,).<br>
                              <br>
                           </p>
                        </td>
                     </tr>
                  </table>
                  <!--End Add Recipe Help -->
 </td></tr>
 <tr><td colspan="2" bgcolor="#FFFFFF">              
			  <p>&nbsp;</p>
                  <!--Search Recipe Help -->
                  <table align="left" border="0" cellpadding="1" cellspacing="2" width="468">
                     <tr>
                        <td class="header">&nbsp;&quot;Recipe Search&quot; help&nbsp;</td>
                     </tr>
                     <tr class="cellbg">
                        <td class="helppanel">
                           <p>This section describes each field on the search recipe page.</p>
                           <p>
                              <a name="keywordsearch"><b>Keyword</b></a>: Searches title, person who entered the recipe, and 
                              ingredients of all recipes<br>
                              <br>
                              <a name="categorysearch"><b>Category</b></a>: Select the option that best 
                              describe the recipe you are searching for.<br>
                              <br>
                              <a name="excludesearch"><b>Exclude Words</b></a>: Type in words in this field 
                              that you would like to exclude from your search.<br>
                              <br>
                              <a name="allergensearch"><b>Show only recipes that are free of</b></a>: By 
                              checking these boxes you restrict the results to only recipes that are free of 
                              the allergens you have selected.<br>
                              <br>
                           </p>
                        </td>
                     </tr>
                  </table>
 </td></tr>
 <tr bgcolor="#FFFFFF"><td colspan="2" bgcolor="#FFFFFF">                <!--End Search Recipe Help -->
               <p>&nbsp;</p>
                  <!--Browse Recipe Help -->
                  <table align="left" border="0" cellpadding="1" cellspacing="2" width="468">
                     <tr>
                        <td class="header">&nbsp;"Browse Recipe" Help&nbsp;</td>
                     </tr>
                     <tr class="cellbg">
                        <td class="helppanel">
                           <p>This section describes terms when browsing for recipes.</p>
                           <p>
                              <a name="allergenbrowse"><b>Show only recipes that are free of</b></a>: By 
                              checking these boxes you restrict the results to only recipes that are free of 
                              the allergens you have selected.<br>
                              <br>
                              <a name="recipenamebrowse"><b>Recipe Name</b></a>: The name of the recipe.<br>
                              <br>
                              <a name="contributorbrowse"><b>Recipe Entered By</b></a>: The display name (User 
                              ID) of the individual who submitted this recipe.<br>
                              <br>
                              <a name="allergenfreebrowse"><b>Allergen Free</b></a>: Symbols of the allergen 
                              that this recipe is free of.<br>
                           </p>
                        </td>
                     </tr>
                  </table></form>
                  <!--End Search Recipe Help -->
</td>
</tr>
</table>
</td>
</tr>
</table>

<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-216208-1";
urchinTracker();
</script>
</body>
</html>


