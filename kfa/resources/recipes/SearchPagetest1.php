<?php
  session_start();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta name="keywords" content="recipe search, recipes">
<meta name="description" content="Advance Search for allergy-free recipes in Safe Eats.">

<link href="http://www.kidswithfoodallergies.org/js/main.css" rel="stylesheet" type="text/css">
<link href="http://www.kidswithfoodallergies.org/js/images.css" rel="stylesheet" type="text/css">
<link href="http://www.kidswithfoodallergies.org/js/forms.css" rel="stylesheet" type="text/css">
<script language="javascript" src="http://www.kidswithfoodallergies.org/js/menu.js" type="text/javascript"></script>

   <link rel="stylesheet" href="style.css" type="text/css">
   <title>Safe Eats Recipe Search</title>
</head>

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
</script>

<body>
<?php
  //Imports to display the top banner for viewing
  require("topbanner1.html");
  $currentPage = "SearchPage";
?>
<!-- Main table that holds all -->
<table class="background" cellpadding="0" cellspacing="0" border="0" align="center" width="750">
   <tr>
      <td valign= "top" width="180">
         <?php require("leftnavigation1.html"); ?>
      </td>
      <td align="left" valign="top">
      <form action="SearchHandling.php" method="POST" name="searchform" onSubmit="validate();">
         <!-- Table that holds the header -->
<table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF">
          <tr valign="top" bgcolor="#CCCCCC" align="left">
            <td height="33" colspan="2" valign="middle" bgcolor="#3F679B"><div align="left"><h1>&nbsp;&nbsp;&nbsp;
 Search Recipes in Safe Eats &#8482;


	</h1>
            </div></td>
          </tr>
        </table>

         <!-- Table for search parameters -->
         <table width="575" align="center" border="0" cellpadding="5" cellspacing="2" bgcolor="#E1E1E1">
          <tr valign="top" bgcolor="#CCCCCC" align="left">
            <td height="33" colspan="2" bgcolor="#FFFFFF" > 
                  <table align="center" border="0" cellpadding="1" cellspacing="2" ID="Table3" width="565">
                     <tr>
                        <td class="header" colspan="2" width="506">&nbsp;Recipe Search <a href="search_tips.html;" onClick="MM_openBrWindow('search_tips.html','','width=400,height=280');return false">(Click here for Search Tips)</a></td>
                     </tr>
                     <tr>
                        <td align="right" class="celltitlebg">Keyword:&nbsp;<a onClick="showHelp('keywordsearch')" href="javascript:void(0)"><img src="images/BtnHelpG.gif" border="0" alt="keyword"></a></td>
                        <td align="left" class="cellbg">
                           <input type="text" name="keyword" ID="keyword" class="defaultfont" size="50"></td>
                     </tr>
                  <tr>
                     <td align="right" class="celltitlebg">Exclude Words:&nbsp;<a onClick="showHelp('excludesearch')" href="javascript:void(0)"><img src="images/BtnHelpG.gif" border="0" alt="exclude words"></a></td>
                     <td align="left" class="cellbg">
                        <input type="text" name="exclude" ID="exclude" class="defaultfont" size="50"></td>
                  </tr>
                  <tr>
                     <td align="right" class="celltitlebg">Category:&nbsp;<a onClick="showHelp('categorysearch')" href="javascript:void(0)"><img src="images/BtnHelpG.gif" border="0" alt="category"></a></td>
                     <td align="left" class="cellbg">
                        <select name="course" ID="course" class="defaultfont">
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
            <table align="center" cellpadding="2" cellspacing="10">
	         <tr>
	            <td> 
                  <table id="tblAllergenInfo" cellSpacing="2" cellPadding="1" width="468" align="center" border="0">
                  <tr>
                     <td class="header" colSpan="6" width="460">&nbsp;Show Only Recipes that are Free of:&nbsp;<a onClick="showHelp('allergensearch')" href="javascript:void(0)"><img src="images/BtnHelpB.gif" border="0" alt="allergens"></a></td>
                  </tr>
                  <tr>
                     <td class="celltitlebg" width="167">
           		      <input id="milkfree" type="checkbox" name="milkfree" value="ON">&nbsp;<span class="allergenKey">M</span>ilk</td>
                     <td class="celltitlebg" width="162">
                     <input id="peanutfree" type="checkbox" name="peanutfree" value="ON">&nbsp;<span class="allergenKey">P</span>eanut</td>
                     <td class="celltitlebg" width="125">
                     <input id="eggfree" type="checkbox" name="eggfree" value="ON">&nbsp;<span class="allergenKey">E</span>gg</td>
                     <td class="celltitlebg" width="167">
                     <input id="soyfree" type="checkbox" name="soyfree" value="ON">&nbsp;<span class="allergenKey">S</span>oy</td>
                     <td class="celltitlebg" width="162">
                     <input id="nutfree" type="checkbox" name="nutfree" value="ON">&nbsp;<span class="allergenKey">T</span>ree nut</td>
                     <td class="celltitlebg" width="125">
                     <input id="cornfree" type="checkbox" name="cornfree" value="ON">&nbsp;<span class="allergenKey">C</span>orn</td>
                  </tr>
                  <tr>  
                     <td class="celltitlebg" width="167">
                     <input id="glutenfree" type="checkbox" name="glutenfree" value="ON">&nbsp;<span class="allergenKey">G</span>luten</td>
                     <td class="celltitlebg" width="162">
                     <input id="wheatfree" type="checkbox" name="wheatfree" value="ON">&nbsp;<span class="allergenKey">W</span>heat</td>
                     <td class="celltitlebg" width="125">
                     <input id="fishfree" type="checkbox" name="fishfree" value="ON">&nbsp;<span class="allergenKey">F</span>ish</td>
                     <td class="celltitlebg" width="167">
                     <input id="shellfishfree" type="checkbox" name="shellfishfree" value="ON">&nbsp;<span class="allergenKey">Sh</span>ellfish</td>
                     <td class="celltitlebg" width="162">
                     <input id="sesamefree" type="checkbox" name="sesamefree" value="ON">&nbsp;<span class="allergenKey">Ses</span>ame</td>
                     <td class="celltitlebg" width="125">
                     <input id="empty" type="checkbox" name="other" value="ON">&nbsp;<span class="allergenKey">O</span>ther</td>
                  </tr>
                  </table></td>
               </tr>
            </table>
            <!-- Search Button table -->
            <table align="center" cellpadding="2" cellspacing="10">
	            <tr>
	               <td>
                     <table ID="SearchButtonTb" align="center">
                        <tr>
                           <td class="background"><button name="search" type="submit" value="search">Search</button></td>
                        </tr>
                     </table>
                  </td>
               </tr>
            </table>
            </form>
        </td>
	</tr>
</table>
</td>
            </tr>
           

  <table width="750" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>	
      <p align="center" class="style24">Page last updated 12/30/2007</p></td></tr></table>
   <table>
<tr><td>
<?php
  /*Imports the top banner to display*/
  require("footer1.html");
?>
  </td></tr></table>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-216208-1";
urchinTracker();
</script>
</body>
</html>

