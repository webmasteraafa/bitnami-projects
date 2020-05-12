<?php
  session_start();
  //if($_SESSION[isAdmin] != true){
   //  echo "<meta http-equiv=\"Refresh\" CONTENT=\"5; URL=http://kidswithfoodallergies.org/recipes/introduction.php\">";
    // echo "You tried to access which requires administrator privileges";
 // }
  $debug = FALSE;
  $result_array = array(array());
  //Connect to database
  $db = mysql_connect("kidswithfoodallergies.org:3306", "kidswitror_rcp", "allergenfree");
  mysql_select_db("kidswitror_eve",$db);

  //Find all recipes to be approved
  $query = "SELECT APPROVAL_DATE, RECIPE_ID, NAME, SOURCE FROM TBL_RECIPE
            WHERE APPROVED = 'Y'AND DELETED = 'N' order by APPROVAL_DATE DESC";

  $result = mysql_query($query) or trigger_error(mysql_error(), E_USER_ERROR);

  if (($debug) && (mysql_num_rows($result) > 0)){
      while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
     }
  }
  //Fills results array to be accessed by result page
  if (mysql_num_rows($result) > 0){
    $i = 0;
    while ($result_row = mysql_fetch_array($result, MYSQL_ASSOC)){

//Get this month and only show recipes that are approved for the past 60 days
$thismonth = date(m);
$lastmonth = date(m)-2;
if (strlen($lastmonth) < 2) $lastmonth = "0".$lastmonth;
$ourtoday = date(d);
$thisyear = date(Y);
$ourstartdate = $thisyear.$lastmonth.$ourtoday;
$ourenddate = $thisyear.$thismonth.$ourtoday;
//echo "Hi I am here";
//Find this month and only get recipes from this month
	// Delimiters may be slash, dot, or hyphen
	$datadate = substr($result_row['APPROVAL_DATE'], 0, 10); 
	//echo "Date: ".$datadate."<br>";
	list($datayear, $datamonth, $dataday) = split('[-]', $datadate);
	//echo "Month: $month; Day: $day; Year: $year<br />\n";
	//echo "This month ".$thismonth;
	//echo "<br>Month = ".$datamonth;
	//echo $dataday;
	$rightdatadate = $datayear.$datamonth.$dataday;
	//echo "This is the original date " .$rightdatadate;
	//echo "Start Date: ".$ourstartdate;
	//echo "<br>End Date: ".$ourenddate;
	//echo "<br>";
	if (($rightdatadate >= $ourstartdate) && ($rightdatadate <= $ourenddate)){

      $result_array[$i][0] = $result_row["RECIPE_ID"];
      $result_array[$i][1] = $result_row["NAME"];
      $result_array[$i][3] = $result_row["SOURCE"];

      
      $legend_query = "SELECT DISTINCT(LEGEND) FROM TBL_FREEOF
                       WHERE RECIPE_ID = ".$result_array[$i][0].
                       " ORDER BY LEGEND;";
      $legend_result = mysql_query($legend_query) or
                trigger_error(mysql_error(), E_USER_ERROR);
      $legend_string = "";
      while ($legend_row = mysql_fetch_array($legend_result, MYSQL_ASSOC)){
        $legend_string = $legend_string.$legend_row["LEGEND"].", ";
      }
      $legend_string = substr($legend_string,0, (strlen($legend_string) - 2));
      
      $result_array[$i][2] = $legend_string;
      $i++;
    }else {
    }
   }
  }

$total = $i;
  //Session data will be accessed by the result page
  $_SESSION['db_result'] = $result_array;
  $_SESSION['total_rows'] = $total;
  $_SESSION['from_page'] = 'newrecipes';
  session_write_close();
  //Redirect to result page to display all recipes to be approved
  header( "Location: SearchResultPageUn.php");
?>

