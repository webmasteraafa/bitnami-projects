<?php
session_start();
    $page = "showrecipe.php?id=".$upd_rcp_id."";
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=<?php echo $page;?>">

<meta name="keywords" content="Safe Eats recipes updates.">
<meta name="description" content="Update allergy recipes">
<link href="http://www.kidswithfoodallergies.org/js/main.css" rel="stylesheet" type="text/css">
<link href="http://www.kidswithfoodallergies.org/js/forms.css" rel="stylesheet" type="text/css">
<link href="http://www.kidswithfoodallergies.org/js/images.css" rel="stylesheet" type="text/css">
<script language="javascript" src="http://www.kidswithfoodallergies.org/js/menu.js" type="text/javascript"></script>
 <link rel="stylesheet" href="style.css" type="text/css">
   <title>Update Confirmation</title>
</head>


<?php
  $ingr_array = array(array());
  $allr_array = array();
  $debug = FALSE;
  fill_ingr_array();
  fill_allr_array();
  $recipe_id = $_POST[upd_rcp_id];
?>
  <body>
  <?php
    require ("topbanner1.html");
  ?>

  <table class="background" cellpadding="0" cellspacing="0" border="0" align="center" width="750">
       <tr>
           <td valign="top" width="180">
               <?php require("leftnavigation.html"); ?>
           </td>
          <td class="title" valign="top" align="center" width="560">
           <table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF">
          <tr valign="top" bgcolor="#CCCCCC" align="left">
            <td height="33" colspan="2" valign="middle" bgcolor="#3F679B"><div align="left"><h1>&nbsp;&nbsp;&nbsp;
 Updated Recipe


	</h1>
            </div></td>
          </tr>
        </table>
           <br>
           <br>
           <br>
          <!-- Start pasting your code right here !!! -->

<?php
  /*
  $db = mysql_connect("messena.cc.gatech.edu:19220", "root");
  mysql_select_db("pofak",$db);
  */
$recipename = $_REQUEST['recipiename'];
$recipename = str_replace('&#039;', '\'', $recipename);
$recipename = str_replace("&quot;", "\"", $recipename);
  $db = mysql_connect("kidswithfoodallergies.org:3306", "kidswitror_rcp", "allergenfree");
  mysql_select_db("kidswitror_eve",$db);
  $update_rcp = "UPDATE TBL_RECIPE SET
                 name = '".$_POST[recipename]."',
                 category = '".$_POST[category]."',
                 servings = '".$_POST[servings]."',
                 contributor = '".$_POST[contributor]."',
                 source =  '".$_POST[source]."' ,
                 instructions = '".$_POST[instructions]."',
                 submitter_comments = '".$_POST[comments]."',
                 subst_notes = '".$_POST[subnotes]."',
				 iron_chef = '".$_POST[iron_chef]."'
                 WHERE RECIPE_ID = '$recipe_id'";
  if ($debug){
      echo "Statement is ".$update_rcp."<BR>";
  }
  $rcp_result = mysql_query($update_rcp) or trigger_error(mysql_error(), E_USER_ERROR);
  if ($debug){
      printf ("The recipe id is %d\n", $recipe_id);
  }
  /* Delete all the existing ingredients before we add them up again */
  $delete_contains = "DELETE FROM TBL_CONTAINS
                      WHERE RECIPE_ID = '$recipe_id'";
  $result_delete_contains = mysql_query($delete_contains) or trigger_error(mysql_error(), E_USER_ERROR);

  if ($rcp_result){
      foreach ($ingr_array as $row){
          if ($debug){
              echo "The ingredient is ".$row[2]."<BR>";
          }
          if (strtoupper($row[3]) == "ON"){
              $ingr_opt = 'Y';
          }
          else {
              $ingr_opt = 'N';
          }
          $select_ingr = "SELECT INGREDIENT_ID FROM TBL_INGREDIENT
                  WHERE NAME='".$row[2]."'";
          $ingr_result = mysql_query($select_ingr) or
                    trigger_error(mysql_error(), E_USER_ERROR);
          if (mysql_num_rows($ingr_result)>0){
              $row1=mysql_fetch_array($ingr_result);
              $ingr_id = $row1[0];
 
		//force the ingredient name to be updated even when the name is already there.
  	        $update_ingredname = "UPDATE TBL_INGREDIENT SET
                 NAME = '".$row[2]."' WHERE INGREDIENT_ID = '$row1[0]'";
		  $ingredname_result = mysql_query($update_ingredname) or trigger_error(mysql_error(), E_USER_ERROR);


              if ($debug){
                  echo "Ingredient id=".$ingr_id."<BR>";
              }
          }
          else {
              if ($debug){
                  echo "Found no row<BR>";
              }
              $insert_ingredient = "INSERT INTO TBL_INGREDIENT (name)
                                    VALUES ('".$row[2]."')";
              $result_insert_ingr = mysql_query($insert_ingredient) or
                        trigger_error(mysql_error(), E_USER_ERROR);
              $ingr_id = mysql_insert_id();
              if ($debug){
                  printf("The last ingr id was %d\n", $ingr_id);
              }
          }

          //Maybe put an error handling here before proceeding.

          $insert_contains = "INSERT INTO TBL_CONTAINS set RECIPE_ID='".$recipe_id."', INGREDIENT_ID='".$ingr_id."', QUANTITY='".$row[0]."',
                             MEASURE='".$row[1]."', OPTIONAL='".$ingr_opt."'";
          $result_insert_contains = mysql_query($insert_contains) or
                    trigger_error(mysql_error(), E_USER_ERROR);
      }


// traverse the allergen array and insert each element into the tbl_freeof

      $delete_allergens = "DELETE FROM TBL_FREEOF
                           WHERE RECIPE_ID = '$recipe_id'";
      $result_delete_allergens = mysql_query($delete_allergens) or trigger_error(mysql_error(), E_USER_ERROR);

      foreach ($allr_array as $allergen){
        $allr_value = strtok($allergen, ",");
        $legend_value = strtok(",");
        $insert_allergen = "INSERT INTO TBL_FREEOF (recipe_id, allergen, legend)
                            VALUES (".$recipe_id.",'".$allr_value."','".$legend_value."')";

        $result_insert_contains = mysql_query($insert_allergen) or
                  trigger_error(mysql_error(), E_USER_ERROR);
      }


     echo "<table valign= \"top\" align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"2\" ID=\"information\" width=\"468\">";
     echo "<tr>";
     echo "<td class=\"header\" width=\"468\">&nbsp;SUCCESS&nbsp;&nbsp;</td>";
     echo "</tr>";
     echo "<tr class=\"cellbg\">";
     echo "<td width=\"460\" class=\"introtext\">";
     echo "Recipe #:".$recipe_id." has been updated.<BR>";
     echo "In a few seconds you will be redirected back to the Recipe #:".$recipe_id.".";
//    echo "<script>setTimeout(top.location.href='". $page . "',1000);</script>";
    echo "</td>";
     echo "</tr>";
     echo "</table>";

  }
  else {
	  echo "Error inserting data";
  }
?>
</td>
</tr>
</table>

  <table width="750" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
      <td>	
      <p align="center" class="style24">Page last updated 12/30/2007</p></td></tr>
      
      <tr><td><?php
    require ("footer1.html");
  ?></td>
      </tr>
      </table>
      
             

</body>
</html>
<?php
function format_entry($input){
      $temp_string = strtolower($input);
      return trim(ucwords($temp_string));
}

/*
 * This function evaluate which allergen checkboxes have been selected and
 * add the choosen allergen to an array.
 */
function fill_allr_array(){
  global $allr_array, $has_other;
  if (strtoupper($_POST[milkfree]) == "ON"){
      $allr_array[] = "milk,M";
  }
  if (strtoupper($_POST[peanutfree]) == "ON"){
      $allr_array[] = "peanut,P";
  }
  if (strtoupper($_POST[eggfree]) == "ON"){
      $allr_array[] = "egg,E";
  }
  if (strtoupper($_POST[soyfree]) == "ON"){
      $allr_array[] = "soy,S";
  }
  if (strtoupper($_POST[nutfree]) == "ON"){
      $allr_array[] = "treenut,T";
  }
  if (strtoupper($_POST[cornfree]) == "ON"){
      $allr_array[] = "corn,C";
  }
  if (strtoupper($_POST[glutenfree]) == "ON"){
      $allr_array[] = "gluten,G";
  }
  if (strtoupper($_POST[wheatfree]) == "ON"){
      $allr_array[] = "wheat,W";
  }
  if (strtoupper($_POST[fishfree]) == "ON"){
      $allr_array[] = "fish,F";
  }
  if (strtoupper($_POST[shellfishfree]) == "ON"){
      $allr_array[] = "shellfish,Sh";
  }
  if (strtoupper($_POST[sesamefree]) == "ON"){
      $allr_array[] = "sesame,Ses";
  }

  if (strtoupper($_POST[other0]) == "ON"){
      $has_other = TRUE;
      $tok = strtok($_POST[other1], ",");
      while ($tok){
          $allr_array[] = strtolower(trim($tok)).",O";
          $tok = strtok(",");
      }
  }

  if ($debug){
      echo "allergens array has ".sizeof($allr_array)."<BR>";
  }
  return $allr_array;
}

/* This functions reads the ingredients of the recipe and moves them to
   a bidimensional array to facilitate the SQL inserts
*/
function fill_ingr_array(){

  global $ingr_array;
  
    if (strlen($_POST[ingredient0])>0){
        $ingr_array[0][0] = $_POST[quantity0];
        $ingr_array[0][1] = $_POST[measure0];
        $ingr_array[0][2] = $_POST[ingredient0];
        $ingr_array[0][3] = format_entry($_POST[optional0]);
    }
  
    if (strlen($_POST[ingredient1])>0){
        $ingr_array[1][0] = $_POST[quantity1];
        $ingr_array[1][1] = $_POST[measure1];
        $ingr_array[1][2] = $_POST[ingredient1];
        $ingr_array[1][3] = format_entry($_POST[optional1]);
    }

    if (strlen($_POST[ingredient2])>0){
        $ingr_array[2][0] = $_POST[quantity2];
        $ingr_array[2][1] = $_POST[measure2];
        $ingr_array[2][2] = $_POST[ingredient2];
        $ingr_array[2][3] = format_entry($_POST[optional2]);
    }

    if (strlen($_POST[ingredient3])>0){
        $ingr_array[3][0] = $_POST[quantity3];
        $ingr_array[3][1] = $_POST[measure3];
        $ingr_array[3][2] = $_POST[ingredient3];
        $ingr_array[3][3] = format_entry($_POST[optional3]);
    }

    if (strlen($_POST[ingredient4])>0){
        $ingr_array[4][0] = $_POST[quantity4];
        $ingr_array[4][1] = $_POST[measure4];
        $ingr_array[4][2] = $_POST[ingredient4];
        $ingr_array[4][3] = format_entry($_POST[optional4]);
    }

    if (strlen($_POST[ingredient5])>0){
        $ingr_array[5][0] = $_POST[quantity5];
        $ingr_array[5][1] = $_POST[measure5];
        $ingr_array[5][2] = $_POST[ingredient5];
        $ingr_array[5][3] = format_entry($_POST[optional5]);
    }
  
    if (strlen($_POST[ingredient6])>0){
        $ingr_array[6][0] = $_POST[quantity6];
        $ingr_array[6][1] = $_POST[measure6];
        $ingr_array[6][2] = $_POST[ingredient6];
        $ingr_array[6][3] = format_entry($_POST[optional6]);
    }

    if (strlen($_POST[ingredient7])>0){
        $ingr_array[7][0] = $_POST[quantity7];
        $ingr_array[7][1] = $_POST[measure7];
        $ingr_array[7][2] = $_POST[ingredient7];
        $ingr_array[7][3] = format_entry($_POST[optional7]);
    }

    if (strlen($_POST[ingredient8])>0){
        $ingr_array[8][0] = $_POST[quantity8];
        $ingr_array[8][1] = $_POST[measure8];
        $ingr_array[8][2] = $_POST[ingredient8];
        $ingr_array[8][3] = format_entry($_POST[optional8]);
    }
  
    if (strlen($_POST[ingredient9])>0){
        $ingr_array[9][0] = $_POST[quantity9];
        $ingr_array[9][1] = $_POST[measure9];
        $ingr_array[9][2] = $_POST[ingredient9];
        $ingr_array[9][3] = format_entry($_POST[optional9]);
    }
  
    if (strlen($_POST[ingredient10])>0){
        $ingr_array[10][0] = $_POST[quantity10];
        $ingr_array[10][1] = $_POST[measure10];
        $ingr_array[10][2] = $_POST[ingredient10];
        $ingr_array[10][3] = format_entry($_POST[optional10]);
    }
  
    if (strlen($_POST[ingredient11])>0){
        $ingr_array[11][0] = $_POST[quantity11];
        $ingr_array[11][1] = $_POST[measure11];
        $ingr_array[11][2] = $_POST[ingredient11];
        $ingr_array[11][3] = format_entry($_POST[optional11]);
    }
  
    if (strlen($_POST[ingredient12])>0){
        $ingr_array[12][0] = $_POST[quantity12];
        $ingr_array[12][1] = $_POST[measure12];
        $ingr_array[12][2] = $_POST[ingredient12];
        $ingr_array[12][3] = format_entry($_POST[optional12]);
    }
  
    if (strlen($_POST[ingredient13])>0){
        $ingr_array[13][0] = $_POST[quantity13];
        $ingr_array[13][1] = $_POST[measure13];
        $ingr_array[13][2] = $_POST[ingredient13];
        $ingr_array[13][3] = format_entry($_POST[optional13]);
    }

    if (strlen($_POST[ingredient14])>0){
        $ingr_array[14][0] = $_POST[quantity14];
        $ingr_array[14][1] = $_POST[measure14];
        $ingr_array[14][2] = $_POST[ingredient14];
        $ingr_array[14][3] = format_entry($_POST[optional14]);
    }
    if (strlen($_POST[ingredient15])>0){
        $ingr_array[15][0] = $_POST[quantity15];
        $ingr_array[15][1] = $_POST[measure15];
        $ingr_array[15][2] = $_POST[ingredient15];
        $ingr_array[15][3] = format_entry($_POST[optional15]);
    }
    if (strlen($_POST[ingredient16])>0){
        $ingr_array[16][0] = $_POST[quantity16];
        $ingr_array[16][1] = $_POST[measure16];
        $ingr_array[16][2] = $_POST[ingredient16];
        $ingr_array[16][3] = format_entry($_POST[optional16]);
    }
    if (strlen($_POST[ingredient17])>0){
        $ingr_array[17][0] = $_POST[quantity17];
        $ingr_array[17][1] = $_POST[measure17];
        $ingr_array[17][2] = $_POST[ingredient17];
        $ingr_array[17][3] = format_entry($_POST[optional17]);
    }
    if (strlen($_POST[ingredient18])>0){
        $ingr_array[18][0] = $_POST[quantity18];
        $ingr_array[18][1] = $_POST[measure18];
        $ingr_array[18][2] = $_POST[ingredient18];
        $ingr_array[18][3] = format_entry($_POST[optional18]);
    }
    if (strlen($_POST[ingredient19])>0){
        $ingr_array[19][0] = $_POST[quantity19];
        $ingr_array[19][1] = $_POST[measure19];
        $ingr_array[19][2] = $_POST[ingredient19];
        $ingr_array[19][3] = format_entry($_POST[optional19]);
    }
    if (strlen($_POST[ingredient20])>0){
        $ingr_array[20][0] = $_POST[quantity20];
        $ingr_array[20][1] = $_POST[measure20];
        $ingr_array[20][2] = $_POST[ingredient20];
        $ingr_array[20][3] = format_entry($_POST[optional20]);
    }
    if (strlen($_POST[ingredient21])>0){
        $ingr_array[21][0] = $_POST[quantity21];
        $ingr_array[21][1] = $_POST[measure21];
        $ingr_array[21][2] = $_POST[ingredient21];
        $ingr_array[21][3] = format_entry($_POST[optional21]);
    }
    if (strlen($_POST[ingredient22])>0){
        $ingr_array[22][0] = $_POST[quantity22];
        $ingr_array[22][1] = $_POST[measure22];
        $ingr_array[22][2] = $_POST[ingredient22];
        $ingr_array[22][3] = format_entry($_POST[optional22]);
    }
    if (strlen($_POST[ingredient23])>0){
        $ingr_array[23][0] = $_POST[quantity23];
        $ingr_array[23][1] = $_POST[measure23];
        $ingr_array[23][2] = $_POST[ingredient23];
        $ingr_array[23][3] = format_entry($_POST[optional23]);
    }
    if (strlen($_POST[ingredient24])>0){
        $ingr_array[24][0] = $_POST[quantity24];
        $ingr_array[24][1] = $_POST[measure24];
        $ingr_array[24][2] = $_POST[ingredient24];
        $ingr_array[24][3] = format_entry($_POST[optional24]);
    }
  return $ingr_array;
}
 ?>
 

