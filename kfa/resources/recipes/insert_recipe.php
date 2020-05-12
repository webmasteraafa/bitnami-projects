<?php
 session_start();
?>

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
   <title>Confirmation Page</title>
</head>
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
            <td height="33" colspan="2" bgcolor="#FFFFFF" >
                  <table align="center" border="0" cellpadding="1" cellspacing="2" width="468">
<?php

  $ingr_array = array(array());
  $allr_array = array();
  $debug = FALSE;
  $has_other = FALSE;
  fill_ingr_array();
  fill_allr_array();

  if ($has_other){
      $other = 'Y';
  } else {
      $other = 'N';
  }
  
  if ($_POST[recipename] == ""){
    echo "Sorry, you did not enter a recipe name, please try again.<br>";
    exit();
  }
  
  $db = mysql_connect("kidswithfoodallergies.org:3306", "kidswitror_rcp", "allergenfree");
  mysql_select_db("kidswitror_eve",$db);

  
  $sql = "INSERT INTO TBL_RECIPE (name, category, servings, contributor, source,
                                  approved, deleted, others, submission_date,
                                  instructions, submitter_comments, subst_notes)
          VALUES ('".$_POST[recipename]."',
                  '".$_POST[category]."',
                  '".$_POST[servings]."',
                  '".$_POST[contributor]."',
                  '".$_POST[source]."' , 'N', 'N', '".$other."',
                  '".get_SQL_date()."','".nl2br($_POST[instructions])."',
                  '".nl2br($_POST[comments])."','".nl2br($_POST[subnotes])."')";
  if ($debug){
      echo "Statement is ".$sql."<BR>";
  }
  $result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
  $recipe_id = mysql_insert_id();
  if ($debug){
      printf ("The recipe id is %d\n", $recipe_id);
  }
  if ($result){
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
          $sql = "SELECT INGREDIENT_ID FROM TBL_INGREDIENT
                  WHERE NAME='".$row[2]."'";
          $result = mysql_query($sql) or
                    trigger_error(mysql_error(), E_USER_ERROR);
          if (mysql_num_rows($result)>0){
              $row1=mysql_fetch_array($result);
              $ingr_id = $row1[0];
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
              $result = mysql_query($insert_ingredient) or
                        trigger_error(mysql_error(), E_USER_ERROR);
              $ingr_id = mysql_insert_id();
              if ($debug){
                  printf("The last ingr id was %d\n", $ingr_id);
              }
          }
          $insert_contains = "INSERT INTO TBL_CONTAINS set RECIPE_ID='".$recipe_id."', INGREDIENT_ID='".$ingr_id."', QUANTITY='".$row[0]."',
                             MEASURE='".$row[1]."', OPTIONAL='".$ingr_opt."'";

/*          $result = mysql_query($insert_contains) or
                    trigger_error(mysql_error(), E_USER_ERROR);
                    */
            $result = mysql_query($insert_contains);
            if (!$result) {
              if (mysql_errno() == 1062){
                    echo "<tr><td class=\"header\" width=\"468\">&nbsp;submission error&nbsp;</td></tr>";
                    echo "<tr class=\"cellbg\"><td class=\"introtext\">An error was detected on your submission. <br><br> Your recipe could not be added to our database";
                    echo " because two of the ingredients you tried to enter are the same.";
                    echo "<BR><BR> E.g.: <BR><i>2 Cups Sugar</i> can only be entered once on each recipe.<BR><br>";
					                    echo "Please try again.</td></tr>";
                    $delete_duplicate = "UPDATE TBL_RECIPE SET DELETED = 'Y' WHERE
                                         RECIPE_ID = ".$recipe_id.";";
                    $result = mysql_query($delete_duplicate) or
                              trigger_error(mysql_error(), E_USER_ERROR);
                    exit(0);
              } else {
                    trigger_error(mysql_error(), E_USER_ERROR);
              }
            }
                    
      }


// traverse the allergen array and insert each element into the tbl_freeof
      foreach ($allr_array as $allergen){
        $allr_value = strtok($allergen, ",");
        $legend_value = strtok(",");
        $insert_allergen = "INSERT INTO TBL_FREEOF (recipe_id, allergen, legend)
                            VALUES (".$recipe_id.",'".$allr_value."','".$legend_value."')";

        $result = mysql_query($insert_allergen) or
                  trigger_error(mysql_error(), E_USER_ERROR);
      }
    echo "<tr><td class=\"header\" width=\"468\">&nbsp;Submission Successful&nbsp;</td></tr>";
    echo "<tr class=\"cellbg\"><td class=\"introtext\">Thank you for your submission. <br><br> Your recipe has been added to our database and before it can be";
    echo " displayed and searched by other users, it needs to be reviewed and";
    echo " approved by one of the site administrators.<BR><br>";
    echo "Recipe #: ".$recipe_id."</td></tr>";
  }
  else {
	echo "Error inserting data";
  }
  
function format_entry($input){
      $temp_string = strtolower($input);
      return trim(ucwords($temp_string));
}

// This function gets the current date & time and formats it for SQL inserts.
function get_SQL_date(){
  $today = getdate();
  $sql_date = $today[year]."-".$today[mon]."-".$today[mday]." ".$today[hours].
               ":".$today[minutes].":".$today[seconds];
  return $sql_date;
}

// This will send notice to person when new recipe is submited



$salesemail2 = 'kprzywara@kidswithfoodallergies.org';
$salesemail3 = 'mcarver@kidswithfoodallergies.org';
$fromname = "Recipe Database";
$fromemail = "webmaster@kidswithfoodallergies.org";

$today = getdate();
$sql_date2 = $today[year]."-".$today[mon]."-".$today[mday]." ".$today[hours].
               ":".$today[minutes].":".$today[seconds];
	$fp = popen("/usr/sbin/sendmail -t","w");
	fputs($fp, "To: $salesemail1\n");
	fputs($fp, "From: $fromname <$fromemail>\n");
	fputs($fp, "Subject: New Recipe has been submitted\n\n");
	fputs($fp, "A new recipe has been submitted to the Safe Eats Recipe Database. \n\n");
	fputs($fp, "Recipe Name: $_POST[recipename]\n");
	fputs($fp, "Date Submited: $sql_date2\n");
	fputs($fp, "Copy and paste this link to view new recipe 'http://kidswithfoodallergies.org/recipes/showrecipe.php?id=$recipe_id'\n");

	fputs($fp, "$salesemail1\nhttp://www.kidswithfoodallergies.org\n");
	pclose($fp);

	$fp2 = popen("/usr/sbin/sendmail -t","w");
	fputs($fp2, "To: $salesemail2\n");
	fputs($fp2, "From: $fromname <$fromemail>\n");
	fputs($fp2, "Subject: New Recipe has been submitted\n\n");
	fputs($fp2, "A new recipe has been submitted to the Safe Eats Recipe Database. \n\n");
	fputs($fp2, "Recipe Name: $_POST[recipename]\n");
	fputs($fp2, "Date Submited: $sql_date2\n");
	fputs($fp2, "Copy and paste this link to view new recipe 'http://kidswithfoodallergies.org/recipes/showrecipe.php?id=$recipe_id'\n");


	fputs($fp2, "$salesemail3\nhttp://www.kidswithfoodallergies.org\n");
	pclose($fp2);
	
	$fp3 = popen("/usr/sbin/sendmail -t","w");
	fputs($fp3, "To: $salesemail3\n");
	fputs($fp3, "From: $fromname <$fromemail>\n");
	fputs($fp3, "Subject: New Recipe has been submitted\n\n");
	fputs($fp3, "A new recipe has been submitted to the Safe Eats Recipe Database. \n\n");
	fputs($fp3, "Recipe Name: $_POST[recipename]\n");
	fputs($fp3, "Date Submited: $sql_date2\n");
	fputs($fp3, "Copy and paste this link to view new recipe 'http://kidswithfoodallergies.org/recipes/showrecipe.php?id=$recipe_id'\n");


	fputs($fp3, "$salesemail3\nhttp://www.kidswithfoodallergies.org\n");
	pclose($fp3);




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
  return $ingr_array;
}
 ?>
  <!-- End of the code. Do not mess with the page beyond this point -->
  			</td></tr></table>
  		</td>
	</tr>
</table>
<center>
  <table width="750" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>	<!-- #BeginEditable "date" -->
      <p align="center" class="style24">Page last updated 6/26/2009</p>
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
