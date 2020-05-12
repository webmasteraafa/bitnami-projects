<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
   <link rel="stylesheet" href="style.css" type="text/css" />
   <link href="../js/main.css" rel="stylesheet" type="text/css">
<meta name="keywords" content="food allergies, milk allergy , egg allergy, peanuts allergy, nut, latex, corn, soy allergy">
<meta name="description" content="Kids with food allergies information and support">
<meta name="keywords" content="kids with food allergies, children with food allergies, food allergies, milk allergy, egg allergy, soy allergy, peanut allergy, allergy support, allergy group, latex allergy, food allergy dictionary, allergy chat, allergy newsletter">
<meta name="description" content="Home for families with food allergic kids. A place where you will find a lot of information and support regarding allergies">
<link href="http://www.kidswithfoodallergies.org/js/main.css" rel="stylesheet" type="text/css">
<script language="javascript" src="http://www.kidswithfoodallergies.org/js/menu.js"></script>
<script language="javascript" src="http://www.kidswithfoodallergies.org/js/sidemenu.js"></script>
   <title>Edit Recipe</title>
</head>
<script language="JavaScript">
/*** This method handles the enter button push ***/
function handleEnter (field, event) {
	var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
	if (keyCode == 13) {
		var i;
		for (i = 0; i < field.form.elements.length; i++)
			if (field == field.form.elements[i])
         if (field.id == 'servings'){
         return false;
         } else {
         break;
         }
		i = (i + 1) % field.form.elements.length;
		field.form.elements[i].focus();
		return false;
	}
	else{
   return true;
   }
}



function validate(){
  var message, newMessage, error, strLen;
    message = '';

    if (mainform.recipename.value == ''){
        message = message + "Recipe Name, ";
        error = true;
    }
    if (mainform.category.value == ''){
        message = message + "Category, ";
        error = true;
    }
    if (mainform.instructions.value == ''){
        message = message + "Instructions, ";
        error = true;

    }
   // if (((mainform.other.value != '') && (mainform.other0.value = "ON")) ||
   //     ((mainform.other.value == '') && (mainform.other0.value = "OFF"))){
   //     message = message + "Other Allergens, ";
   //     error = true;
   // }

    if (error){
        strLen = message.length;
        newMessage = message.substring(0, (strLen - 2));
        alert ("The infomation on the fields: " + newMessage +
               " are invalid.\n Please make the necessary corrections before proceeding");
        event.returnValue = false;
    }
}

function showHelp(topic){
	var m = window.open("http://kidswithfoodallergies.org/recipes/help.html#"+ topic,"","scrollbars=yes, toolbar=no, resizable=no, width=550, height=250"); 
}

</script>

<?php
  $edit_id = $_GET[id];

  $allr_array = array();

  //select the data from the database
  
  $db = mysql_connect("kidswithfoodallergies.org:3306", "kidswitror_rcp", "allergenfree");
  mysql_select_db("kidswitror_eve",$db);
  
  $sql_recipe = "SELECT RECIPE.NAME, RECIPE.CATEGORY, RECIPE.SERVINGS,
                        RECIPE.CONTRIBUTOR, RECIPE.SOURCE, RECIPE.INSTRUCTIONS, RECIPE.iron_chef,
                        RECIPE.SUBMITTER_COMMENTS, RECIPE.SUBST_NOTES
                 FROM TBL_RECIPE AS RECIPE
		             WHERE RECIPE.RECIPE_ID ='$edit_id'";
               
  $rcp_result = mysql_query($sql_recipe) or trigger_error(mysql_error(),E_USER_ERROR);
  if(mysql_num_rows($rcp_result) <= 0){
    echo 'The recipe requested was not found';
    exit();
  }
  
  $sql_ingredients = "SELECT CONTAINS.QUANTITY, CONTAINS.MEASURE,
                             INGREDIENT.NAME, CONTAINS.OPTIONAL, CONTAINS.ORDER
                      FROM TBL_CONTAINS AS CONTAINS,
                           TBL_INGREDIENT AS INGREDIENT
                      WHERE CONTAINS.RECIPE_ID ='$edit_id' AND
                            CONTAINS.INGREDIENT_ID = INGREDIENT.INGREDIENT_ID ORDER BY CONTAINS.ORDER";

  $ingr_result = mysql_query($sql_ingredients) or trigger_error(mysql_error(),E_USER_ERROR);
                                                                
  $total_ingredients = mysql_num_rows($ingr_result);

  $sql_allergens = "SELECT FREEOF.ALLERGEN
                    FROM TBL_FREEOF AS FREEOF
                    WHERE FREEOF.RECIPE_ID ='$edit_id'";
  $allr_result = mysql_query($sql_allergens) or trigger_error(mysql_error(),
                                                              E_USER_ERROR);
  $rowold = mysql_fetch_array( $rcp_result)or die( mysql_error() );
$rowold['NAME'] = str_replace('\'', '&#039;', $rowold['NAME']);
$rowold['NAME'] = str_replace('\"', '&quot;', $rowold['NAME']);

  while($row = mysql_fetch_array($allr_result)){
//    echo "Found ".$row[0]."<BR>";
    $allr_array[] = $row[0];
  }
?>

<body>
<?php
  require("topbanner.html");
?>

<table class="background" cellpadding="0" cellspacing="0" border="0" align="center">
   <tr>
      <td valign = "top" width="*">
         <?php require("leftnavigation.html"); ?>
      </td>
      <td align="left" valign="top">
      
      <!-- Start pasting your code right here !!! -->
      <form action="update_recipe.php" method="POST" name="mainform" onSubmit="validate();" ID="Form1">
         <table width="100%" border="0" cellpadding="5" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
          <tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
            <td height="33" colspan="2" valign="middle" bgcolor="#3F679B"><div align="left"><h1>&nbsp;&nbsp;&nbsp;
 Recipes


	</h1>
            </div></td>
          </tr>
        </table>
      
     		<table width="575" class="style19" align="center" border="0" cellpadding="5" cellspacing="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1">
          <tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
            <td height="33" colspan="2" bgcolor="#FFFFFF" ><!-- Add Recipe / Recipe Info -->
                  <table align="center" border="0" cellpadding="1" cellspacing="2" width="468">
                     <tr>
                        <td class="header" colspan="3" width="468">&nbsp;Edit Recipe info&nbsp;&nbsp;</td>
                     </tr>
                     <tr class="cellbg">
                        <td align="right" class="celltitlebg">Recipe Name:&nbsp;<a onClick="showHelp('recipename')" href="javascript:void(0)"><img src="images/BtnHelpG.gif" border="0" title="recipe name"></a></td>
                        <td align="left" class="cellbg" width="300"><input type="text" onKeyPress="return handleEnter(this, event)" name="recipename" ID="recipename" class="defaultfont" value='<?php echo $rowold['NAME'];?>'></td>
                     </tr>
                     <tr class="cellbg">
                        <td align="right" class="celltitlebg" width="">Category:&nbsp;<a onClick="showHelp('category')" href="javascript:void(0)"><img src="images/BtnHelpG.gif" border="0" title="category"></a></td>
                        <td align="left" class="cellbg">
                           <select name="category" ID="category" onkeypress="return handleEnter(this, event)" class="defaultfont" size="1">
                              <option value="">Please choose</option>
                              <option value="Appetizers" <?php if($rowold['CATEGORY'] == "Appetizers"){echo "SELECTED";}?> >Appetizers</option>
                              <option value="Baby Food" <?php if($rowold['CATEGORY'] == "Baby Food"){echo "SELECTED";}?> >Baby Food</option>
                              <option value="Beverages" <?php if($rowold['CATEGORY'] == "Beverages"){echo "SELECTED";}?> >Beverages</option>
                              <option value="Breads" <?php if($rowold['CATEGORY'] == "Breads"){echo "SELECTED";}?> >Breads</option>
                              <option value="Breakfast" <?php if($rowold['CATEGORY'] == "Breakfast"){echo "SELECTED";}?> >Breakfast</option>
                              <option value="Cakes" <?php if($rowold['CATEGORY'] == "Cakes"){echo "SELECTED";}?> >Cakes</option>
                              <option value="Candy" <?php if($rowold['CATEGORY'] == "Candy"){echo "SELECTED";}?> >Candy</option>
                              <option value="Casseroles" <?php if($rowold['CATEGORY'] == "Casseroles"){echo "SELECTED";}?> >Casseroles</option>
                              <option value="Condiments" <?php if($rowold['CATEGORY'] == "Condiments"){echo "SELECTED";}?> >Condiments</option>
                              <option value="Cookies" <?php if($rowold['CATEGORY'] == "Cookies"){echo "SELECTED";}?> >Cookies</option>
                              <option value="Crafts" <?php if($rowold['CATEGORY'] == "Crafts"){echo "SELECTED";}?> >Crafts</option>
                              <option value="Desserts" <?php if($rowold['CATEGORY'] == "Desserts"){echo "SELECTED";}?> >Desserts</option>
                              <option value="Flour Mixes" <?php if($rowold['CATEGORY'] == "Flour Mixes"){echo "SELECTED";}?> >Flour Mixes</option>
                              <option value="Frostings" <?php if($rowold['CATEGORY'] == "Frostings"){echo "SELECTED";}?> >Frostings</option>
                              <option value="Frozen Desserts" <?php if($rowold['CATEGORY'] == "Frozen Desserts"){echo "SELECTED";}?> >Frozen Desserts</option>
                              <option value="Jam" <?php if($rowold['CATEGORY'] == "Jam"){echo "SELECTED";}?> >Jam</option>
                              <option value="Main Dishes" <?php if($rowold['CATEGORY'] == "Main Dishes"){echo "SELECTED";}?> >Main Dishes</option>
                              <option value="Miscellaneous" <?php if($rowold['CATEGORY'] == "Miscellaneous"){echo "SELECTED";}?> >Miscellaneous</option>
                              <option value="Muffins" <?php if($rowold['CATEGORY'] == "Muffins"){echo "SELECTED";}?> >Muffins</option>
                              <option value="Pasta" <?php if($rowold['CATEGORY'] == "Pasta"){echo "SELECTED";}?> >Pasta</option>
                              <option value="Pies" <?php if($rowold['CATEGORY'] == "Pies"){echo "SELECTED";}?> >Pies</option>
                              <option value="Sauces & Salsas" <?php if($rowold['CATEGORY'] == "Sauces & Salsas"){echo "SELECTED";}?> >Sauces &amp; Salsas</option>
                              <option value="Side Dishes" <?php if($rowold['CATEGORY'] == "Side Dishes"){echo "SELECTED";}?> >Side Dishes</option>
                              <option value="Smoothies" <?php if($rowold['CATEGORY'] == "Smoothies"){echo "SELECTED";}?> >Smoothies</option>
                              <option value="Snacks" <?php if($rowold['CATEGORY'] == "Snacks"){echo "SELECTED";}?> >Snacks</option>
                              <option value="Soups & Broths" <?php if($rowold['CATEGORY'] == "Soups & Broths"){echo "SELECTED";}?> >Soups &amp; Broths</option>
                              <option value="Soy, Seed & Nut Butters" <?php if($rowold['CATEGORY'] == "Soy, Seed & Nut Butters"){echo "SELECTED";}?> >Soy, Seed &amp; Nut Butters</option>
                              <option value="Substitutes" <?php if($rowold['CATEGORY'] == "Substitutes"){echo "SELECTED";}?> >Substitutes</option>
                           </select></td>
                     </tr>
                     <tr>
                        <td align="right" class="celltitlebg" width="">Number of Servings:&nbsp;<a onClick="showHelp('servings')" href="javascript:void(0)"><img src="images/BtnHelpG.gif" border="0"></a></td>
                        <td align="left" class="cellbg" width="101"><input type="text" onKeyPress="return handleEnter(this, event)" name="servings" ID="servings" class="defaultfont" size="27" value='<?php echo $rowold['SERVINGS']; ?>' ></td>
                     </tr>
                     <tr>
                        <td align="right" class="celltitlebg" width="">Recipe Entered By:&nbsp;<a onClick="showHelp('contributor')" href="javascript:void(0)"><img src="images/BtnHelpG.gif" border="0"></a></td>
                        <td align="left" class="cellbg" width="101"><input type="text" onKeyPress="return handleEnter(this, event)" name="contributor" ID="source" class="defaultfont" size="36" value='<?php echo $rowold['CONTRIBUTOR'];?>' ></td>
                     </tr>
                     <tr>
                        <td align="right" class="celltitlebg" width="">Recipe Created By:&nbsp;<a onClick="showHelp('source')" href="javascript:void(0)"><img src="images/BtnHelpG.gif" border="0"></a></td>
                        <td align="left" class="cellbg" width="101"><input type="text" onKeyPress="return handleEnter(this, event)" name="source" ID="source" class="defaultfont" size="36" value='<?php echo $rowold['SOURCE'];?>' ></td>
                     </tr>
                     <tr>
                        <td align="left"  colspan='2'class="cellbg" width=""><input name="iron_chef" type="checkbox" value="yes" <?php if($rowold['iron_chef'] == "yes"){echo "CHECKED";}?> > Iron Chef Recipe</td>
                     </tr>
                  </table>

                  
                  <table align="center" cellpadding="2" cellspacing="10"><tr><td>                  
                  <!--Ingredients -->
                  <table align="center" border="0" cellpadding="1" cellspacing="2" ID="tblIngredients" width="468">
                     <tr>
                        <td class="header" colspan="8" width="4">&nbsp;Ingredients</td>
                     </tr>
                     <tr>
                        <td align="center" class="celltitlebg">Quantity&nbsp;<a onClick="showHelp('quantity')" href="javascript:void(0)"><img src="images/BtnHelpG.gif" border="0"></a></td>
                        <td align="center" class="celltitlebg">Measure&nbsp;<a onClick="showHelp('measure')" href="javascript:void(0)"><img src="images/BtnHelpG.gif" border="0"></a></td>
                        <td align="center" class="celltitlebg" width="150">Ingredient&nbsp;<a onClick="showHelp('ingredient')" href="javascript:void(0)"><img src="images/BtnHelpG.gif" border="0"></a></td>
                        <td align="center" class="celltitlebg" width="70">Optional&nbsp;<a onClick="showHelp('optional')" href="javascript:void(0)"><img src="images/BtnHelpG.gif" border="0"></a></td>
                     </tr>
                     
                     <?php
                     $i = 0;
                     while($row = mysql_fetch_array($ingr_result)){
			//allow you to use ' and " in the ingredients
				$row['NAME'] = str_replace('\'', '&#039;', $row['NAME']);
				$row['NAME'] = str_replace('\"', '&quot;', $row['NAME']);
			
                       echo "<tr>";
                    //   echo "<td align='center' class='cellbg' width='79'><input type='text' onkeypress='return handleEnter(this, event)' name='quantity".$i."' ID='quantity".$i."' size='5' class='defaultfont' value='".$row['QUANTITY']."'></td>";
                    //   echo "<td align='center' class='cellbg' width='108'><input type='text' onkeypress='return handleEnter(this, event)' name='measure".$i."' ID='measure".$i."' size='20' class='defaultfont' maxlength='25' value='".$row['MEASURE']."'></td>";
                    //   echo "<td align='center' class='cellbg' width='143'><input type='text' onkeypress='return handleEnter(this, event)' name='ingredient".$i."' ID='ingredient".$i."' class='defaultfont' size='27' maxlength='100' value='".$row['INGREDIENT']."'></td>";
																															
                       echo "<td align='center' class='cellbg' width='79'><input type='text'    name='quantity".$i."' onkeypress='return handleEnter(this, event)'    ID='quantity".$i."' size='5' class='defaultfont'  value='".$row['QUANTITY']."'></td>";
                       echo "<td align='center' class='cellbg' width='108'><input type='text' onkeypress='return handleEnter(this, event)' name='measure".$i."' ID='measure".$i."' size='20' class='defaultfont' maxlength='25' value='".$row['MEASURE']."'></td>";
                       echo "<td align='center' class='cellbg' width='143'><input type='text' onkeypress='return handleEnter(this, event)' name='ingredient".$i."' ID='ingredient".$i."' class='defaultfont' size='27' value='".$row['NAME']."'></td>";


                       if ($row[3] == "Y"){
                         echo "<td align='center' class='cellbg' width='79'><input type='checkbox' onkeypress='return handleEnter(this, event)' name='optional".$i."' ID='optional".$i."' class='defaultfont' checked></td>";
                       } else {
                         echo "<td align='center' class='cellbg' width='79'><input type='checkbox' onkeypress='return handleEnter(this, event)' name='optional".$i."' ID='optional".$i."' class='defaultfont'></td>";
                       }
                         
                       echo "</tr>";
                       $i++;
                     }
                     for ($j = $i; $j < $i + 5; $j++){
                       echo "<tr>";
                       echo "<td align='center' class='cellbg' width='79'><input type='text' onkeypress='return handleEnter(this, event)' name='quantity".$j."' ID='quantity".$j."' size='5' class='defaultfont'></td>";
                       echo "<td align='center' class='cellbg' width='108'><input type='text' onkeypress='return handleEnter(this, event)' name='measure".$j."' ID='measure".$j."' size='20' class='defaultfont'></td>";
                       echo "<td align='center' class='cellbg' width='143'><input type='text' onkeypress='return handleEnter(this, event)' name='ingredient".$j."' ID='ingredient".$j."' class='defaultfont' size='27'></td>";
                       echo "<td align='center' class='cellbg' width='79'><input type='checkbox' onkeypress='return handleEnter(this, event)' name='optional".$j."' ID='optional".$j."' class='defaultfont'></td>";
                       echo "</tr>";
                     }
                     ?>
                     
                  </table>
                  </td></tr></table>
                  <table align="center" cellpadding="2" cellspacing="10"><tr><td>                  
                  <!--Instructions -->
                  <table align="center" border="0" cellpadding="1" cellspacing="2" ID="tblInstructions" width="468">
                     <tr>
                        <td class="header">&nbsp;Instructions&nbsp;<a onClick="showHelp('instructions')" href="javascript:void(0)"><img src="images/BtnHelpB.gif" border="0"></a></td>
                     </tr>
                     <tr class="cellbg">
                        <td colspan="1" width="460"><textarea cols="55" name="instructions" rows="15" id="instructions"><?php echo $rowold['INSTRUCTIONS'];?></textarea></td>
                     </tr>
                  </table>
                  </td></tr></table>
                  <table align="center" cellpadding="2" cellspacing="10"><tr><td>                  
                  <!--Comments -->
                  <table align="center" border="0" cellpadding="1" cellspacing="2" ID="tblComments" width="468">
                     <tr>
                        <td class="header">&nbsp;Comments&nbsp;<a onClick="showHelp('comments')" href="javascript:void(0)"><img src="images/BtnHelpB.gif" border="0"></a></td>
                     </tr>
                     <tr class="cellbg">
                        <td width="460"><textarea cols="55" name="comments" rows="7" id="comments"><?php echo $rowold['SUBMITTER_COMMENTS'];?></textarea></td>
                     </tr>
                  </table>
                  </td></tr></table>
                  <table align="center" cellpadding="2" cellspacing="10"><tr><td>                  
                  <!--Substitution Notes -->
                  <table align="center" border="0" cellpadding="1" cellspacing="2" ID="tblSubNotes" width="468">
                     <tr>
                        <td class="header">&nbsp;Substitution Notes&nbsp;<a onClick="showHelp('substitution')" href="javascript:void(0)"><img src="images/BtnHelpB.gif" border="0"></a></td>
                     </tr>
                     <tr class="cellbg">
                        <td><textarea cols="55" name="subnotes" rows="7" id="subnotes"><?php echo $rowold['SUBST_NOTES'];?></textarea></td>
                     </tr>
					 
                  </table>
                  </td></tr></table>
                  <table align="center" cellpadding="2" cellspacing="10"><tr><td>                  
                  <!-- Allergen Information -->
                  <table align="center" border="0" cellpadding="1" cellspacing="2" width="468" ID="tblAllergenInfo">
                     <tr>
                        <td class="header" colspan="6">&nbsp;Allergen Free Information&nbsp;<a onClick="showHelp('allergen')" href="javascript:void(0)"><img src="images/BtnHelpB.gif" border="0"></a></td>
                     </tr>
                     <tr>
                        <td class="celltitlebg"><input type="checkbox" onKeyPress="return handleEnter(this, event)"
						name="milkfree" id="milkfree" <?php if (check_allergen('milk')){ echo "checked";}?>>&nbsp;<span class="allergenKey">M</span>ilk</td>
                        <td class="celltitlebg"><input type="checkbox" onKeyPress="return handleEnter(this, event)"
						name="peanutfree" id="peanutfree" <?php if (check_allergen('peanut')){ echo "checked";}?>>&nbsp;<span class="allergenKey">P</span>eanut</td>
                        <td class="celltitlebg"><input type="checkbox" onKeyPress="return handleEnter(this, event)" name="eggfree"
						id="eggfree" <?php if (check_allergen('egg')){ echo "checked";}?>>&nbsp;<span class="allergenKey">E</span>gg</td>
                        <td class="celltitlebg"><input type="checkbox" onKeyPress="return handleEnter(this, event)" name="soyfree"
						id="soyfree" <?php if (check_allergen('soy')){ echo "checked";}?>>&nbsp;<span class="allergenKey">S</span>oy</td>
                        <td class="celltitlebg"><input type="checkbox" onKeyPress="return handleEnter(this, event)" name="nutfree"
						id="nutfree" <?php if (check_allergen('treenut')){ echo "checked";}?>>&nbsp;<span class="allergenKey">T</span>ree nut</td>
                        <td class="celltitlebg"><input type="checkbox" onKeyPress="return handleEnter(this, event)"
						name="cornfree" id="cornfree" <?php if (check_allergen('corn')){ echo "checked";}?>>&nbsp;<span class="allergenKey">C</span>orn</td>
                     </tr>
					 <tr>
						<td class="celltitlebg"><input type="checkbox" onKeyPress="return handleEnter(this, event)"
						name="glutenfree" id="glutenfree" <?php if (check_allergen('gluten')){ echo "checked";}?>>&nbsp;<span class="allergenKey">G</span>luten</td>
                        <td class="celltitlebg"><input type="checkbox" onKeyPress="return handleEnter(this, event)"
						name="wheatfree" id="wheatfree" <?php if (check_allergen('wheat')){ echo "checked";}?>>&nbsp;<span class="allergenKey">W</span>heat</td>
                        <td class="celltitlebg"><input type="checkbox" onKeyPress="return handleEnter(this, event)"
						name="fishfree" id="fishfree" <?php if (check_allergen('fish')){ echo "checked";}?>>&nbsp;<span class="allergenKey">F</span>ish</td>
                        <td class="celltitlebg"><input type="checkbox" onKeyPress="return handleEnter(this, event)"
						name="shellfishfree" id="shellfishfree" <?php if (check_allergen('shellfish')){ echo "checked";}?>>&nbsp;<span class="allergenKey">Sh</span>ellfish</td>
                        <td class="celltitlebg"><input type="checkbox" onKeyPress="return handleEnter(this, event)"
						name="sesamefree" id="sesamefree" <?php if (check_allergen('sesame')){ echo "checked";}?>>&nbsp;<span class="allergenKey">Ses</span>ame</td>
                        <td class="celltitlebg"></td>
                     </tr>
                     <tr>
                        <td class="celltitlebg" width="460" colspan="6"><input type="checkbox" onKeyPress="return handleEnter(this, event)" name="other0" id="other0" value="ON" <?php if(sizeof($allr_array) > 0){ echo "checked";}?>><span class="allergenKey">O</span>ther&nbsp;&nbsp;
                           <input type="text" class="defaultfont" name="other1" size="58" onKeyPress="return handleEnter(this, event)" id="other1" value='<?php echo print_array($allr_array);?>'></td>
                     </tr>
                  </table>                  
                  <table width="100" height="100" align="center">
                     <tr>
                        <td class="background">
                           <button name="updaterecipe" type="submit" value="updaterecipe">Update Recipe</button>
                            <input type="hidden" name="upd_rcp_id" id="upd_rcp_id" value='<?php echo $edit_id; ?>'>
                        </td>
                     </tr>
                  </table>
               </td>
		      </tr>
		   </table>
          <!-- End of the code. Do not mess with the page beyond this point -->
          </td>
    </tr>
</form>
</table>
</td></tr></table>
<center>
  <table width="750" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>	<!-- #BeginEditable "date" -->
      <p align="center" class="style24">Page last updated 3/26/2007</p>
      <!-- #EndEditable -->        <div align="center">		  
         <table width=750 align="center">
                        <tr bgcolor="#FFFFFF"  valign="top" align="center">
                          <td colspan='5'>&nbsp;</td>
                        </tr>
                        <tr bgcolor="#FFFFFF"  valign="top" align="center">
                          <td colspan='5' bgcolor="#3F679B"><span class="style61">KFA is a national nonprofit food allergy support group dedicated to fostering optimal health, <br />nutrition, 
                            and well-being of children with food allergies by providing education and a caring<br /> support community for their families and caregivers.</span></td>
                        </tr>
        
    <tr>
      <td> <img src="http://www.kidswithfoodallergies.org/images/spacer.gif" width="155" height="1" alt=""></td>
      <td> <img src="http://www.kidswithfoodallergies.org/images/spacer.gif" width="35" height="1" alt=""></td>
      <td> <img src="http://www.kidswithfoodallergies.org/images/spacer.gif" width="11" height="1" alt=""></td>
      <td> <img src="http://www.kidswithfoodallergies.org/images/spacer.gif" width="152" height="1" alt=""></td>
      <td> <img src="http://www.kidswithfoodallergies.org/images/spacer.gif" width="302" height="1" alt=""></td>
    </tr></table>
  <p align="center"><center><!-- AddThis Bookmark Button BEGIN -->
<a href="http://www.addthis.com/bookmark.php" onClick="
addthis_url   = location.href;
addthis_title = document.title;
return addthis_click(this);" target="_blank"><img src="http://s5.addthis.com/button1-bm.gif" width="125" height="16" border="0" alt="AddThis Social Bookmark Button" /></a> <script type="text/javascript">var addthis_pub = 'GS9I01DT8FO8Y99T';</script><script type="text/javascript" src="http://s5.addthis.com/js/widget.php?v=10"></script>  
<!-- AddThis Bookmark Button END --></center>
  <table width="750" border="0" align='center' cellspacing="0" cellpadding="0">
    <tr><td></td>
      <td><p align="center" class="style24">

<a href="http://www.kidswithfoodallergies.org/whatsnew.html">What's New</a>      <a href="http://www.kidswithfoodallergies.org/recipes.html">Recipes</a>      <a href="http://www.kidswithfoodallergies.org/resourcesnew.php">Parent Education Resources</a>         <a href="http://www.kidswithfoodallergies.org/faalerts.php">Food Allergy Alerts</a>        
<a href="http://www.kidswithfoodallergies.org/interlink.html">Allergy Links</a><BR>        <a href="http://www.kidswithfoodallergies.org/donate.html">Donate</a>   
<a href="http://www.kidswithfoodallergies.org/shopping.html">Shop KFA</a>        <a href="http://www.kidswithfoodallergies.org/marketplace.html">Allergy Friendly Businesses</a>        <a href="http://www.kidswithfoodallergies.org/community.html">Support Forums</a>        <a href="http://www.kidswithfoodallergies.org/memberships.html">Membership</a>	<a href="http://www.kidswithfoodallergies.org/contactus.html">Contact Us</a>        <a href="http://www.kidswithfoodallergies.org/about.html">About  </a> <BR>
<BR> 

       <a href="http://www.kidswithfoodallergies.org/privacy.html">Privacy Policy</a> and <a href="http://www.kidswithfoodallergies.org/tos.html">Terms of Service</a><br>
            Copyright (c) 2005-2007, Kids With Food Allergies, Inc.
            All Rights Reserved.<br>
            <i>
       Kids With Food Allergies was formerly known as POFAK (Parents of Food Allergic Kids)<br>
        before becoming a tax exempt charity in 2005.</i> &nbsp;</p></td>
    </tr>
  </table>
</center>
</body>
</html>

<?php
function check_allergen($allr_name){
  global $allr_array;

  if (in_array($allr_name, $allr_array)){
    $allr_key = array_search($allr_name, $allr_array);
    array_remove($allr_key);
    return TRUE;
  } else {
    return FALSE;
  }
}

function array_remove($key_index) {
  global $allr_array;
  unset($allr_array[$key_index]);
  if(gettype($key_index)!="string"){
    $temparray=array();
    $i=0;
    foreach ($allr_array as $value){
      $temparray[$i]=$value;
      $i++;
    }
    $allr_array=$temparray;
  }
}

function print_array($allr_array){
  $ret_string = "";
  foreach ($allr_array as $allergen){
    $ret_string = $ret_string.$allergen.", ";
  }
  $ret_string = substr($ret_string,0, (strlen($legend_string) - 2));
  return $ret_string;
}
?>
