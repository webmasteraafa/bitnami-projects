<?php
  session_start();
  $allRecipes = $_SESSION['db_result'];
  $totRecipes = $_SESSION['total_rows'];
  $fromPage = $_SESSION['from_page'];
  $currentPage = 'type';
  //Checks user type
  if($_SESSION[isAdmin] == true){
    $usertype = 'admin';
  }
  else{
    $usertype = 'user';
  }
  //Code for paging
  if ($fromPage != $currentPage){
    $calledFrom = $fromPage;
  }
  $limit = $_GET[limit];
  $page = $_GET[page];
  if (!($limit)){
     $limit = 20;} // Default results per-page.
  if (!($page)){
     $page = 0;} // Default page value.
  if ($fromPage == 'type'){
    $filteredRecipes = array();
    $allr_array = array();
    setAllergens();
    if (sizeof($allr_array) > 0){
      filterRecipes();
      $allRecipes = $filteredRecipes;
      $totRecipes = sizeof($filteredRecipes);
    }
  }
  $_SESSION['from_page'] = $currentPage;
  session_write_close();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
   <link rel="stylesheet" href="style.css" type="text/css" />
   <link href="../js/main.css" rel="stylesheet" type="text/css">
<meta name="keywords" content="recipe, allergy-friendly, allergy-free, food allergies, milk allergy, egg allergy, peanut allergy, soy allergy">
<meta name="description" content="Safe Eats Recipes from Kids With Food Allergies.">

<link href="http://www.kidswithfoodallergies.org/js/main.css" rel="stylesheet" type="text/css">
<script language="javascript" src="http://www.kidswithfoodallergies.org/js/menu.js"></script>
<script language="javascript" src="http://www.kidswithfoodallergies.org/js/sidemenu.js"></script>
   <title>Browse for Allergy-Friendly Recipes</title>

<script language="JavaScript" type="text/javascript">

   /*** Method that calls the browse results if category clicked ***/
   function callBrowseCategory(){
     document.browseform.action = "type.php?category="+browseform.category.value;
     document.browseform.submit();
   }

   /*** This method handles all the button pushes ***/
	function handleButton(){
   var checked, anylisted, elements, selectedrecipes;
   selectedrecipes = "";
   elements = document.browseform.elements;
   checked = false;
   anylisted = 0;
   
   if(document.pressed == 'Refine Search'){
       document.browseform.action = "<?php $PHP_SELF ?>";
       return;
   }
	 for(i=0; i < (elements.length); i++){
			if(elements[i].type == 'checkbox'){
                anylisted += 1;
				if(elements[i].checked == true && i != 0){
                   if(checked == false)
                      selectedrecipes = ""+elements[i].value;
                   else
                      selectedrecipes = selectedrecipes+","+elements[i].value;
                   checked = true;
 			    }
			}
		}
		if(anylisted <= 1){
      alert("No recipes listed");
			event.returnValue = false;
			return;
        }
        if(!checked){
		    alert("You must select a recipe");
		    event.returnValue = false;
            return;
        }

        if(document.pressed == 'Approve'){
           document.browseform.action = "SearchResultHandling.php?button=approve";
        }
        else if(document.pressed == 'Delete'){
           document.browseform.action = "SearchResultHandling.php?button=delete";
        }
	}
   /*** This method handles check all and clear all ***/
   function checkRecipe(option){
     var i, elements, num, first;
     num = 0;
     elements = document.browseform.elements;
     if (option == 'check'){
       for (i=0;i<elements.length;i++){
       	 if(elements[i].type == 'checkbox'){
         	if(num == 12)
         	   first = i;
         	num++;
            if(num > 12)
         	   elements[i].checked=true;
         }
       }
       if(num <= 13){
       	 alert("No Recipes Listed");
       	 return;
       }
       return;
     }
     if (option == 'clear'){
       for(i=0;i<elements.length;i++){
         if(elements[i].type == 'checkbox'){
         	if(num == 12)
         	   first = i;
         	num++;
            if(num > 12)
         	   elements[i].checked=false;
         }
       }
       if(num <= 13){
       	 alert("No Recipes Listed");
       	 return;
       }
       return;
     }
   }
   /*** This method handles the master check box clicks ***/
   function handleTopOfList(){
     var elements, first, num;
     num = 0;
     elements = document.browseform.elements;
     for(i=0;i<elements.length;i++){
         if(elements[i].type == 'checkbox'){
            num++;
            if(num == 13){
	             first = i;
               break;
            }
         }
     }

     if (elements[first].checked == true){
       checkRecipe('check');
     } else {
       checkRecipe('clear');
     }
   }
/*** This method displays the help screen ***/
function showHelp(topic){
	var m = window.open("http://kidswithfoodallergies.org/recipes/help.html#"+ topic,"","scrollbars=yes, toolbar=no, resizable=no, width=550 s,height=250"); 
}
   
</script>


</head>
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
                     <td>
                     <h2 align="center">Browse  Allergy-Friendly <?php echo $category; ?></h2>
                      <!-- INSERT CONTENT HERE -->
       <table width="568" class="style19" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#E1E1E1">
        <tr valign="top" bgcolor="#CCCCCC" bordercolor="#FFFFFF" align="left">
        <td colspan="2" bgcolor="#FFFFFF"><form method=POST name="browseform" id="browseform" onSubmit="handleButton();">
      
                
      <!-- Allergen info table --> 
      <!-- closed--> <table width="585" align="center" border="0" cellpadding="5" cellspacing="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1" class="style19">
          <tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
            <td height="33" colspan="2" bgcolor="#FFFFFF" >
     <!-- closed--> <table id="tblAllergenInfo" cellSpacing="2" cellPadding="1" width="565" align="center" border="0">
         <tr>
            <?php echo "<td class=\"header\" colSpan=\"6\" width=\"506\">&nbsp;Show only recipes that are FREE of:&nbsp;<a onClick=\"showHelp('allergenbrowse')\" href=\"javascript:void(0)\"><img src=\"images/BtnHelpB.gif\" border=\"0\"></a></td>"?>
         </tr>
         <tr>
            <td class="celltitlebg" width="78">   
            <input id="milkfree" type="checkbox" name="milkfree" <?php if (strtoupper($_POST[milkfree]) == "ON") echo "checked";?>>&nbsp;<span class="allergenKey">M</span>ilk</td>
            <td class="celltitlebg" width="78">
            <input id="peanutfree" type="checkbox" name="peanutfree" <?php if (strtoupper($_POST[peanutfree]) == "ON") echo "checked";?>>&nbsp;<span class="allergenKey">P</span>eanut</td>
            <td class="celltitlebg" width="78">
            <input id="eggfree" type="checkbox" name="eggfree" <?php if (strtoupper($_POST[eggfree]) == "ON") echo "checked";?>>&nbsp;<span class="allergenKey">E</span>gg</td>
            <td class="celltitlebg" width="78">
            <input id="soyfree" type="checkbox" name="soyfree" <?php if (strtoupper($_POST[soyfree]) == "ON") echo "checked";?>>&nbsp;<span class="allergenKey">S</span>oy</td>
            <td class="celltitlebg" width="78">
            <input id="nutfree" type="checkbox" name="nutfree" <?php if (strtoupper($_POST[nutfree]) == "ON") echo "checked";?>>&nbsp;<span class="allergenKey">T</span>ree nut</td>
            <td class="celltitlebg" width="78">
            <input id="cornfree" type="checkbox" name="cornfree" <?php if (strtoupper($_POST[cornfree]) == "ON") echo "checked";?>>&nbsp;<span class="allergenKey">C</span>orn</td>
         </tr>
         <tr>
            <td class="celltitlebg" width="78">
            <input id="glutenfree" type="checkbox" name="glutenfree" <?php if (strtoupper($_POST[glutenfree]) == "ON") echo "checked";?>>&nbsp;<span class="allergenKey">G</span>luten</td>
            <td class="celltitlebg" width="78">
            <input id="wheatfree" type="checkbox" name="wheatfree" <?php if (strtoupper($_POST[wheatfree]) == "ON") echo "checked";?>>&nbsp;<span class="allergenKey">W</span>heat</td>
            <td class="celltitlebg" width="78">
            <input id="fishfree" type="checkbox" name="fishfree" <?php if (strtoupper($_POST[fishfree]) == "ON") echo "checked";?>>&nbsp;<span class="allergenKey">F</span>ish</td>
            <td class="celltitlebg" width="78">
            <input id="shellfishfree" type="checkbox" name="shellfishfree" <?php if (strtoupper($_POST[shellfishfree]) == "ON") echo "checked";?>>&nbsp;<span class="allergenKey">Sh</span>ellfish</td>
            <td class="celltitlebg" width="78">
            <input id="sesamefree" type="checkbox" name="sesamefree" <?php if (strtoupper($_POST[sesamefree]) == "ON") echo "checked";?>>&nbsp;<span class="allergenKey">Ses</span>ame</td>
            <td class="celltitlebg" width="78">
            <input id="other" type="checkbox" name="other" <?php if (strtoupper($_POST[other]) == "ON") echo "checked";?>>&nbsp;<span class="allergenKey">O</span>ther</td>
         </tr>
      </table></td></tr></table>
  <br>
<br>
<input type="submit" name="Filter" onClick="document.pressed=this.value" value="Refine Search">
<?php
  //Code to display page numbers and links
  if (!($limit)){
    $limit = 1;
  }
  if (!($page)){
    $page = 0;
  }
  $pages = intval($totRecipes/$limit);
  if ($totRecipes%$limit){
    $pages++;
  }

  $current = ($page/$limit) + 1;
  
  if (($pages < 1) || ($pages == 0)){
    $total = 1;
  } else {
    $total = $pages;
  }

  $first = $page + 1;

  if (!((($page + $limit) / $limit) >= $pages) && $pages != 1){
    $last = $page + $limit;
  } else {
    $last = $totRecipes;
  }

?>
<input type="hidden" value="<?php echo $category; ?>" name="browse_category">

   <table border="0" cellpadding="0" cellspacing="2" ID="PagingTable" width="568">
      <tr>
         <td colspan="2" align="right" class="normal">
             <?php
             //Code to set up results per page links
             $five_page = $page;
             $ten_page = $page;
             $twenty_page = $page;
             $fifty_page = $page;
             if($numrows < ($page + 6)){
               $five_page = 0;
             }
             if($numrows < ($page + 11)){
               $ten_page = 0;
             }
             if($numrows < ($page + 21)){
               $twenty_page = 0;
             }
             if($numrows < ($page + 51)){
               $fifty_page = 0;
             }
             ?>
             Results per-page: <a href="<?=$PHP_SELF?>?page=<?=$five_page?>&limit=5">5</a> | <a href="<?=$PHP_SELF?>?page=<?=$ten_page?>&limit=10">10</a> | <a href="<?=$PHP_SELF?>?page=<?=$twenty_page?>&limit=20">20</a> | <a href="<?=$PHP_SELF?>?page=<?=$fifty_page?>&limit=50">50</a>
</center>
   <!-- Paging bar tags that follow close page table --></td></tr></table>
   <!--closed--><table align="center" border="0" cellpadding="0" cellspacing="0" width="568">
      <tr>
         <td class="headerleft">&nbsp;Browse Results (<?=$first?> - <?=$last?> of <?=$totRecipes?>)</td>
         <td class="headerright">page <?=$current?> of <?=$total?></td>
      </tr>
   </table>
   <!-- Search criteria table -->
    <!--closed--><table align="center" border="0" cellpadding="1" cellspacing="2" ID="titleTable" width="568">
		<tr>
			<td align="center" class="celltitlebg" width="30"><?php if($usertype == 'admin') echo "<INPUT type=checkbox onClick=\"handleTopOfList()\">";?> </td>
			<td align="center" class="celltitlebg" width="226">&nbsp;Recipe Name&nbsp;<a onClick="showHelp('recipenamebrowse')" href="javascript:void(0)"><img src="images/BtnHelpG.gif" border="0" title="recipe name"></a> </td>
         <td align="center" class="celltitlebg" width="100">&nbsp;Created By&nbsp;<a onClick="showHelp('sourcebrowse')" href="javascript:void(0)"><img src="images/BtnHelpG.gif" border="0" title="source"></a> </td>
			<td align="center" class="celltitlebg" width="112">&nbsp;Allergen Free&nbsp;<a onClick="showHelp('allergenfreebrowse')" href="javascript:void(0)"><img src="images/BtnHelpG.gif" border="0" title="allergen free"></a> </td>
		</tr>
	</table>
   <!--closed--><table align="center" border="0" cellpadding="0" cellspacing="0" width="568">		
      <?php displayRecipes();?>
      <tr>
         <td class="footerleft" colspan="3">
            <?php
            //Only displays check all and clear all if admin
            if ($usertype == 'admin'){
              echo "<a href=\"javascript:void(0)\" onClick=\"checkRecipe('check')\">Check All</a> -";
              echo "<a href=\"javascript:void(0)\" onClick=\"checkRecipe('clear')\">Clear All</a>";
            }
            ?>
         </td>
         <td class="footerright" colspan="2">
          <?php
          //CODE FOR PAGING LINKS
          if ($page != 0) {
            $back_page = $page - $limit;
            if($back_page < 0){
              $back_page = 0;
            }
            echo("<a href=\"$PHP_SELF?page=$back_page&limit=$limit\">back</a> \n");
          }
          for ($i=1; $i <= $pages; $i++){
            $ppage = $limit*($i - 1);
            if ($ppage == $page){
              echo("<b>$i</b> \n");
            } else{
              echo("<a href=\"$PHP_SELF?page=$ppage&limit=$limit\">$i</a> \n");
            }
          }
          if (!((($page+$limit) / $limit) >= $pages) && $pages != 1){
            $next_page = $page + $limit;
            echo("<a href=\"$PHP_SELF?page=$next_page&limit=$limit\">next</a>\n");
          }
          ?></form>
          </td>
      </tr>	
      
      <tr>
        <td colspan="4" align="right" class="normal">
            <a href="Search.php">Search Again</a>
          </td>
      </tr>
   </table>
   
   
</td></tr></table>
   
   
   <h2> Recipe Help</h2>
              <div class="style19"> <p>If you have any questions or comments about any of the recipes in Safe Eats&trade;, <a href="http://community.kidswithfoodallergies.org/createForumContent/forum/safe_eats_comments">start a discussion topic</a> now or click &quot;have a question about this recipe&quot; on the recipe's page. This will lead you to discuss the recipe with our Food &amp; Cooking Support Team and other fellow members on our <a href="http://community.kidswithfoodallergies.org/category/food-and-cooking-support">Food &amp; Cooking Support Forums</a>.  They can help you alter a recipe to make it allergy-free for your child's needs.  Registration is free!</p> 
                        <p><b>Some notes of caution:</b></p>
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
		</ol> <br />
<br />

        <p><b>Copyright Policy: Copyright &copy; 2005-2014, Kids With Food Allergies. All rights reserved.</b></p>
            <p><em>Recipes are shared for your <strong>personal use only</strong>.</em> You are welcome to enjoy these recipes and share links to our recipes, but please don't reprint, electronically reproduce, repost or redistribute recipes elsewhere without <a href="http://www.kidswithfoodallergies.org/email.php?to=info;" onClick="MM_openBrWindow('email.php?to=info','','width=500,height=500');return false">obtaining permission</a>. For more information, see our <a href="http://www.kidswithfoodallergies.org/tos.html">terms of 
                service</a>. 
               	</p>
            <p>&nbsp;</p></div></td></tr></table>
      <!-- End of the code. Do not mess with the page beyond this point
      
      End of "background table"
       --></div>
      </td>
    </tr>

</table>

	
  <table width="750" border="0" cellspacing="5" cellpadding="0" align="center">
    <tr>
      <td>	
      <p align="center" class="style24">Page last updated 01/06/2014</p>
       </td></tr></table>  
     
         <?php
  require("footer2014.html");
?>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ?
"https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost +
"google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-216208-1");
pageTracker._initData();
pageTracker._trackPageview("/Browse Recipes Results");
</script>
</body>
</html>

<?php

 /////////////////////////////////***ONLY METHOD DEFINITIONS BEYOND THIS POINT***///////////////////////////////////


 /*** This method sets all the allergen checkboxes if selected on previous search ***/
function setAllergens(){
  global $allr_array;
  if (strtoupper($_POST[milkfree]) == "ON"){
      $allr_array[] = "milk";
  }
  if (strtoupper($_POST[peanutfree]) == "ON"){
      $allr_array[] = "peanut";
  }
  if (strtoupper($_POST[eggfree]) == "ON"){
      $allr_array[] = "egg";
  }
  if (strtoupper($_POST[soyfree]) == "ON"){
      $allr_array[] = "soy";
  }
  if (strtoupper($_POST[nutfree]) == "ON"){
      $allr_array[] = "treenut";
  }
  if (strtoupper($_POST[cornfree]) == "ON"){
      $allr_array[] = "corn";
  }
  if (strtoupper($_POST[glutenfree]) == "ON"){
      $allr_array[] = "gluten";
  }
  if (strtoupper($_POST[wheatfree]) == "ON"){
      $allr_array[] = "wheat";
  }
  if (strtoupper($_POST[fishfree]) == "ON"){
      $allr_array[] = "fish";
  }
  if (strtoupper($_POST[shellfishfree]) == "ON"){
      $allr_array[] = "shellfish";
  }
  if (strtoupper($_POST[sesamefree]) == "ON"){
      $allr_array[] = "sesame";
  }
  if (strtoupper($_POST[other]) == "ON"){
     $allr_array[] = "other";
  }
}

/*** This method displays all the recipes based on refined search ***/
function displayRecipes(){
  global $allRecipes;
  global $totRecipes;
  global $first;
  global $last;
  global $usertype;
  
  if(($totRecipes <= 0)|| (is_null($allRecipes))){
    echo "<tr>";
    echo "<td align=\"center\" colspan=\"5\" class=\"searchresultbg\" width=\"468\"><i>no recipes found</i></td>";
    echo "</tr>";
  } else{


//    foreach ($allRecipes as $recipe){
  		for($counter = ($first-1); $counter<$last; $counter += 1){
	
      $name_id = $allRecipes[$counter][0];
      $name = $allRecipes[$counter][1];
      $source = $allRecipes[$counter][2];
      $allergens = $allRecipes[$counter][4];
			
		if ($counter % 2 == 0){
			echo "<tr>";
			echo "<input type=hidden id=\"srid\" name=\"sr\" value=>";
			echo "<td align=\"center\" class=\"searchresultbgeven\" width=\"30\">";
			if ($usertype == 'admin'){
			echo "<input type=checkbox name=list[]  value=\"";
			echo "". $name_id . "\" class=\"defaultfont\">";
			}
			echo "</td>";
			echo "<td align=\"left\" class=\"searchresultbgeven\" width=\"238\"> &nbsp; <a class=\"resultlinkeven\" href=\"http://kidswithfoodallergies.org/recipes/showrecipe.php?id=".$name_id."\">".$name."</a></td>";
			echo "<td align=\"left\" class=\"resultlinkeven\" width=\"100\"> &nbsp;". $source ."</td>";
			echo "<td align=\"left\" class=\"resultlinkeven\" width=\"100\"> &nbsp;" . $allergens . "</td>";
			echo "</tr>";
		} else {
			echo "<tr>";
			echo "<input type=hidden id=\"srid\" name=\"sr\" value=>";
			echo "<td align=\"center\" class=\"searchresultbgodd\" width=\"30\">";
			if ($usertype == 'admin'){
			echo "<input type=checkbox name=list[]  value=\"";
			echo "". $name_id . "\" class=\"defaultfont\">";
			}
			echo "</td>";
			echo "<td align=\"left\" class=\"searchresultbgodd\" width=\"238\"> &nbsp; <a class=\"resultlinkodd\" href=\"showrecipe.php?id=" . $name_id . "\">" . $name . "</a></td>";
			echo "<td align=\"left\" class=\"resultlinkodd\" width=\"100\"> &nbsp;". $source ."</td>";
			echo "<td align=\"left\" class=\"resultlinkodd\" width=\"100\"> &nbsp;" . $allergens . "</td>";
			echo "</tr>";			
		}
    }
  }
}

/*** This method refines the results ***/
function filterRecipes(){
  global $allRecipes;
  global $allr_array;
  global $filteredRecipes;
  $matched = false;
  foreach ($allRecipes as $recipe){
    foreach ($allr_array as $allergen){
      if (substr_count($recipe[3], $allergen) <= 0){
        $matched = false;
        break;
      }
      $matched = true;
    }
    if ($matched){
      $filteredRecipes[] = $recipe;
      $matched = false;
    }
    $_SESSION['db_result'] = $filteredRecipes;
    $_SESSION['total_rows'] = sizeof($filteredRecipes);
  }
}
?>
