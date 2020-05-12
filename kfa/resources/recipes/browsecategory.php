<?php
  session_start();
  $debug = FALSE;
  $result_array = array(array());
  $brwsCategory = $_GET[category];

//  echo "Browse category is ".$brwsCategory."<BR>";
  

  $db = mysql_connect("kidswithfoodallergies.org:3306", "kidswitror_rcp", "allergenfree");
  mysql_select_db("kidswitror_eve",$db);
  $query = "SELECT RECIPE_ID, NAME, SOURCE FROM TBL_RECIPE
            WHERE CATEGORY='".$brwsCategory."' AND APPROVED = 'Y'
            AND DELETED = 'N' order by NAME;";

  $result = mysql_query($query) or trigger_error(mysql_error(), E_USER_ERROR);
  if (($debug) && (mysql_num_rows($result) > 0)){
/*      echo "Found ".mysql_num_rows($result)." recipes"; */
      while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
/*          printf("ID: %d Name: %s Contributor: %s<BR>", $row["RECIPE_ID"],
                 $row["NAME"], $row["CONTRIBUTOR"]); */
     }
  }
  if (mysql_num_rows($result) > 0){
    $i = 0;
    while ($result_row = mysql_fetch_array($result, MYSQL_ASSOC)){
      $result_array[$i][0] = $result_row["RECIPE_ID"];
      $result_array[$i][1] = $result_row["NAME"];
      $result_array[$i][2] = $result_row["SOURCE"];
      
      $legend_query = "SELECT DISTINCT(ALLERGEN), LEGEND FROM TBL_FREEOF
                       WHERE RECIPE_ID = ".$result_array[$i][0].
                       " ORDER BY LEGEND;";
      $legend_result = mysql_query($legend_query) or
                trigger_error(mysql_error(), E_USER_ERROR);
      $legend_string = "";
      $truelegend_string = "";
      while ($legend_row = mysql_fetch_array($legend_result, MYSQL_ASSOC)){
        $legend_string = $legend_string.$legend_row["ALLERGEN"].", ";
        $truelegend_string = $truelegend_string.$legend_row["LEGEND"].", ";
      }

      $legend_string = substr($legend_string,0, (strlen($legend_string) - 2));
      $truelegend_string = substr($truelegend_string,0, (strlen($truelegend_string) - 2));
      
      $result_array[$i][3] = $legend_string;
	$result_array[$i][4] = $truelegend_string;
	$i++;
    }
  }

  $_SESSION['db_result'] = $result_array;
  $_SESSION['total_rows'] = mysql_num_rows($result);
  $_SESSION['category'] = $brwsCategory;
  $_SESSION['from_page'] = 'browsecategory';
  session_write_close();
  header( "Location: BrowseResultPage.php");
//  ob_flush();
//  exit();
?>

