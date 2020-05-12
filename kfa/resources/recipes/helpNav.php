


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <link rel="stylesheet" href="style.css" type="text/css" />
   <link href="../js/main.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="../js/forms.css" type="text/css" />
   <link href="../js/images.css" rel="stylesheet" type="text/css">
<meta name="keywords" content="food allergies, allergy-safe recipes, allergen, allergy-free recipes">
<meta name="description" content="Welcome to Safe Eats, an allergy-free recipe database.">

<link href="http://www.kidswithfoodallergies.org/js/main.css" rel="stylesheet" type="text/css">
<script language="javascript" src="http://www.kidswithfoodallergies.org/js/menu.js" type="text/javascript"></script>

   <title>Safe Eats Recipes: Navigation Tips</title>

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
                         <h2 align="center">Recipe Database Search Tips</h2>
                          
                       <!-- INSERT CONTENT HERE -->
                       
                       <p>How to use the fields on the search recipe page:</p>
                           <p>
                              <a name="keywordsearch" /></a><b>Keyword</b>: Searches title, person who entered the recipe, and 
                              ingredients and comments on all recipes.<br>
                              <br>
                              <a name="categorysearch" /></a><b>Category</b>: Select the option that best 
                            describes the recipe you are searching for. Using the category filter can help tailor your results.<br>
                              <br>
                              <a name="excludesearch" /></a><b>Exclude Words</b>: Type in words in this field 
                              that you would like to exclude from your search.  Use commas to separate keywords if you want to look for recipes that exclude EITHER keyword. <br>
                              <br>
                             For example, &quot;chicken beef&quot; will exclude all recipes that contain both chicken AND beef; but &quot;chicken, beef&quot; will exclude all recipes that contain either chicken or beef.  <br>
                             <br>
                             The search will only exclude exact matches for your keywords.  If you exclude the word "meat", it will only display recipes that do not contain the word meat, but the recipes could still contain beef, chicken, etc.<br>
                              <br>
                              <a name="allergensearch" /></a><b>Show only recipes that are free of</b>: By 
                              checking these boxes you restrict the results to only recipes that are free of 
                        the allergens you have selected.  <br>
                        <br>
                      *Due to limitations in our search, avoid selecting free of &quot;other&quot;. We will be updating this soon.<br>
                              <br>
                           </p>
                           
                           <p><strong>Search tips:</strong></p>
                           <p><strong>AND:</strong> Use the word <strong>and</strong>, the plus sign or the &amp; to connect your keywords and narrow your search.  For example: &quot;chocolate and cake&quot; or &quot;chocolate &amp; cake&quot; or &quot;chocolate + cake&quot; will give you less results to browse than &quot;chocolate cake&quot; </p>
                          <p><strong>PERCENT SIGN %:</strong> Use the % sign to widen your search. For example:<br>
- appl% would match apple, application, etc.<br>
- Pumpkin % muffins would match Pumpkin  or muffins</p>
                       
                      <h2> Recipe Help</h2>
                         If you have any questions or comments about any of the recipes in Safe Eats, click on &quot;have a question about this recipe&quot; on the recipe's page. This will lead you to discuss the recipe with our Food &amp; Cooking Support Team and other fellow members on our <a href="http://community.kidswithfoodallergies.org/category/food-and-cooking-support">Food &amp; Cooking Support Forums</a>.  They can help you alter a recipe to make it allergy-free for your child's needs.  Registration is free!<br /> <br /> <br />
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
              electronically reproduce, repost or redistribute recipes elsewhere without <a href="http://www.kidswithfoodallergies.org/email.php?to=info;" onclick="MM_openBrWindow('email.php?to=info','','width=500,height=500');return false">obtaining 
                permission</a>. 
              For more information, see our <a href="http://www.kidswithfoodallergies.org/tos.html">terms of 
                service</a>. <br />
                </em>	
            <p>&nbsp;</p></td>
              </tr>
    		         </table>
		  
      <!-- End of the code. Do not mess with the page beyond this point -->
      </td>
    </tr>
</form>
</table>

	
  <table width="750" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
      <td>	
      <p align="center" class="style24">Page last updated 01/06/2014</p>
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
pageTracker._trackPageview("/Recipe Technical Help");
} catch(err) {}</script>
</body>
</html>

