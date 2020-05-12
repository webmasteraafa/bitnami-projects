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
   <title>Edit Recipe Picture</title>
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
                        RECIPE.SUBMITTER_COMMENTS, RECIPE.SUBST_NOTES, RECIPE.picture, RECIPE.pic_alt, RECIPE.picture2
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
      <form action="update_recipepic.php" method="POST" name="mainform" onsubmit="validate();" ID="Form1">
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
                        <td class="header" colspan="3" width="468">&nbsp;Edit Recipe Picture&nbsp;&nbsp;</td>
                     </tr>
                     <tr class="cellbg">
                        <td align="right" class="celltitlebg">Recipe Name:&nbsp;<a onClick="showHelp('recipename')" href="javascript:void(0)"><img src="images/BtnHelpG.gif" border="0" title="recipe name"></a></td>
                        <td align="left" class="cellbg" width="250"><?php echo $rowold['NAME'];?></td>
                     </tr>
                     <tr>
                        <td align="right" class="celltitlebg" width="">Ironchef Picture Name:&nbsp;</td>
                        <td align="left" class="cellbg" >../ironchef/<input type="text" onkeypress="return handleEnter(this, event)" name="picture" ID="picture" class="defaultfont" size="25" value='<?php echo $rowold['picture']; ?>' ></td>
                     </tr>
                     <tr>
                        <td align="right" class="celltitlebg" width="">Picture Alt Text:&nbsp;</td>
                        <td align="left" class="cellbg"><input type="text" onkeypress="return handleEnter(this, event)" name="pic_alt" ID="pic_alt" class="defaultfont" size="40" value='<?php echo $rowold['pic_alt'];?>' ></td>
                     </tr>
                     <tr>
                        <td align="right" class="celltitlebg" width="">Zoom Picture Name:&nbsp;</td>
                        <td align="left" class="cellbg">../zoomimg/<input type="text" onkeypress="return handleEnter(this, event)" name="picture2" ID="picture2" class="defaultfont" size="25" value='<?php echo $rowold['picture2']; ?>' ></td>
                     </tr>
                  </table>
                  
                  </td></tr></table>

                  <table align="center" cellpadding="2" cellspacing="10"><tr><td>                  
                  <!-- Allergen Information -->
                  <table width="100" height="100" align="center">
                     <tr>
                        <td class="background">
                           <button name="updaterecipepic" type="submit" value="updaterecipepic">Update Recipe Picture</button>
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
      <p align="center" class="style24">Page last updated 2/12/2009</p>
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
