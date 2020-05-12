<?php
session_start();

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=<?php echo $page;?>">
<meta name="keywords" content="food allergies, milk allergy , egg allergy, peanuts allergy, nut, latex, corn, soy allergy">
<meta name="description" content="Kids with food allergies information and support">
<meta name="keywords" content="kids with food allergies, children with food allergies, food allergies, milk allergy, egg allergy, soy allergy, peanut allergy, allergy support, allergy group, latex allergy, food allergy dictionary, allergy chat, allergy newsletter">
<meta name="description" content="Home for families with food allergic kids. A place where you will find a lot of information and support regarding allergies">
<link href="http://www.kidswithfoodallergies.org/js/main.css" rel="stylesheet" type="text/css">
<script language="javascript" src="http://www.kidswithfoodallergies.org/js/menu.js"></script>
<script language="javascript" src="http://www.kidswithfoodallergies.org/js/sidemenu.js"></script>

   <link rel="stylesheet" href="style.css" type="text/css" />
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
    require ("topbanner.html");
  ?>

  <table class="background" cellpadding="0" cellspacing="0" border="0" align="center">
       <tr>
           <td valign="top" width="*">
               <?php require("leftnavigation.html"); ?>
           </td>
          <td class="title" valign="top" align="center" width="460">
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
                 picture = '".$_POST[picture]."',
				 picture2 = '".$_POST[picture2]."',
                 pic_alt = '".$_POST[pic_alt]."'
                 WHERE RECIPE_ID = '$recipe_id'";
    $page = "showrecipe.php?id=".$recipe_id."";				 
  if ($debug){
      echo "Statement is ".$update_rcp."<BR>";
  }
  $rcp_result = mysql_query($update_rcp) or trigger_error(mysql_error(), E_USER_ERROR);
  if ($debug){
      printf ("The recipe id is %d\n", $recipe_id);
  }

	if ($rcp_result){
     echo "<table valign= \"top\" align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"2\" ID=\"information\" width=\"468\">";
     echo "<tr>";
     echo "<td class=\"header\" width=\"468\">&nbsp;SUCCESS&nbsp;&nbsp;</td>";
     echo "</tr>";
     echo "<tr class=\"cellbg\">";
     echo "<td width=\"460\" class=\"introtext\">";
     echo "Recipe #:".$recipe_id." picture has been updated.<BR>";
     echo "In a few seconds you will be redirected back to the Recipe #:".$recipe_id.".";
    echo "<script>setTimeout(top.location.href='". $page . "',4000);</script>";
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
 

