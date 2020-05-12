<?php

     ob_start();
     session_start();

     $connection;
     $results_array = array(array());
     $num_of_recipes;
     $currentPage = "SearchResultHandling";


      //Make connection to the database
      makeConnectionToDb();
       //Handle approve functionality if pushed
       if($_GET[button] == "approve"){

         handleApprove();
         //Redirect after completed
         header( "Location: successtrans.php");
         ob_flush();
         exit();
      }
      
    


      
      else{
          ob_flush();
          exit();
      }
      
 /////////////////////////////////***ONLY METHOD DEFINITIONS BEYOND THIS POINT***///////////////////////////////////


      /***HANDLES SERVER SIDE OF DELETE BUTTON***/
     function handleDelete(){
        $selectedrecipes = $_POST['list'];
        if($selectedrecipes != ""){
           for($i=0;$i<count($selectedrecipes);$i++){
              $id = $selectedrecipes[$i];
              $query = "UPDATE TBL_RECIPE SET DELETED = 'Y' WHERE RECIPE_ID = '".$id."'";
              $result = mysql_query($query) or trigger_error(mysql_error(), E_USER_ERROR);
           }
        }
     }
      /***HANDLES SERVER SIDE OF APPROVE BUTTON***/
     function handleApprove(){
        $selectedrecipes = $_POST['list'];
        if($selectedrecipes != ""){
           for($i=0;$i<count($selectedrecipes);$i++){
              $id = $selectedrecipes[$i];
              $query = "UPDATE TBL_RECIPE SET APPROVED = 'Y', APPROVAL_DATE = '".get_SQL_date()."' WHERE RECIPE_ID = '".$id."'";
              $result = mysql_query($query) or trigger_error(mysql_error(), E_USER_ERROR);
           }
        }
     }
      /***HANDLES SERVER SIDE OF UNAPPROVE BUTTON***/
     function handleUnApprove(){
        $selectedrecipes = $_POST['list'];
        if($selectedrecipes != ""){
           for($i=0;$i<count($selectedrecipes);$i++){
              $id = $selectedrecipes[$i];
              $query = "UPDATE TBL_RECIPE SET APPROVED = 'N', APPROVAL_DATE = '' WHERE RECIPE_ID = '".$id."'";
              $result = mysql_query($query) or trigger_error(mysql_error(), E_USER_ERROR);
           }
        }
     }
	/****SETS UP CONNECTION TO THE DATABASE****/
	function makeConnectionToDb(){
          $connection = mysql_connect("kidswithfoodallergies.org:3306", "kidswitror_rcp", "allergenfree");
          mysql_select_db("kidswitror_eve",$connection);
    }

    /***HELPER METHOD: For handleSearch(), formats input to a string suitable for use in the database***/
     function format_entry($input){
        if($input == NULL)
           return NULL;
        $temp_string = strtolower($input);
        return trim(ucwords($temp_string));
     }


     /***HELPER METHOD: For handleSearch(), gets all the allergens posted and returns in array***/
	function getAllergensSelected(){

		$allr_array = array();

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
				echo "hi";
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
        if (strtoupper($_POST[shrimpfree]) == "ON"){
    			$allr_array[] = "shrimp";
		}

  		if (strtoupper($_POST[other]) == "ON"){
         		$tok = strtok($_POST[othertext], ",");
      			while ($tok){
          				$allr_array[] = strtolower(trim($tok));
          				$tok = strtok(",");
			}
  		}

  		return $allr_array;

	}

 // This function gets the current date & time and formats it for SQL inserts.
 function get_SQL_date(){
  $today = getdate();
  $sql_date = $today[year]."-".$today[mon]."-".$today[mday]." ".$today[hours].
               ":".$today[minutes].":".$today[seconds];
  return $sql_date;
}

      /***HANDLES SEARCH, FILLS THE GLOBAL 2-D RESULTS_ARRAY AND NUM_OF_RECIPES***/
     function handleSearch($selected_keyword, $selected_course, $selected_allergens, $selected_exclude){
        Global $results_array;
        Global $num_of_recipes;
        $keyword = format_entry($selected_keyword);
        $course = format_entry($selected_course);
        $exclude = format_entry($selected_exclude);
        $allr_array = $selected_allergens;
        $keyword_name_string = "";
        $keyword_source_string = "";
        $keyword_ingredient_string = "";
        $course_string = "";
        $exclude_name_string = "";
        $exclude_source_string = "";
        $exclude_ingredient_string = "";
        //These if's create strings to be used in the queries
        if($keyword != NULL){
		      $start = true;
		      $tok = strtok($keyword, ",");
		      while($tok){
			     if($start == true){
				    $keyword_name_string = "NAME LIKE '%".$tok."%'";
				    $keyword_source_string = "SOURCE LIKE '%".$tok."%'";
				    $keyword_ingredient_string = "TBL_INGREDIENT.NAME LIKE '%".$tok."%'";
				    $start = false;
				    $tok = strtok(",");
			     }
			     else{
				    $keyword_name_string = $keyword_name_string." OR NAME LIKE '%".ltrim($tok)."%'";
				    $keyword_source_string = $keyword_source_string." OR SOURCE LIKE '%".ltrim($tok)."%'";
				    $keyword_ingredient_string = $keyword_ingredient_string." OR TBL_INGREDIENT.NAME LIKE '%".ltrim($tok)."%'";
				    $tok = strtok(",");
			     }
             }
        }
        if($course != NULL){
		      if($course != "Any")
			     $course_string = " AND CATEGORY = '".$course."'";
        }
        if($exclude != NULL){
		      $tok = strtok($exclude, ",");
		      while($tok){
                    $exclude_name_string = $exclude_name_string." AND NAME NOT LIKE '%".ltrim($tok)."%'";
                    $exclude_source_string = $exclude_source_string." AND SOURCE NOT LIKE '%".ltrim($tok)."%'";
                    $exclude_ingredient_string = $exclude_ingredient_string." AND TBL_INGREDIENT.NAME NOT LIKE '%".ltrim($tok)."%'";
                    $tok = strtok(",");
              }
        }
        //These if's create the query strings based on search criteria except allergens used and does the querys
        if($keyword != NULL && $course != NULL && $exclude == NULL){
           $query = "SELECT DISTINCT TBL_CONTAINS.RECIPE_ID FROM TBL_CONTAINS, TBL_INGREDIENT WHERE TBL_INGREDIENT.INGREDIENT_ID = TBL_CONTAINS.INGREDIENT_ID AND (".$keyword_ingredient_string.")";
           $result = mysql_query($query) or trigger_error(mysql_error(), E_USER_ERROR);
           $string = "";
           if($result == FALSE)
              $string = "";
           else{
              $start = false;
              while($row = mysql_fetch_assoc($result)){
              	$id = $row["RECIPE_ID"];
              	if($start == false){
                 	$start = true;
                 	$string = $id."";
              	}
              	else
              		$string = $string.", ".$id;
              }
           }
           mysql_free_result($result);
           if($string == "")
               $query = "SELECT RECIPE_ID, NAME, SOURCE FROM TBL_RECIPE WHERE (".$keyword_name_string." OR ".$keyword_source_string.") ".$course_string." AND DELETED = 'N' AND APPROVED = 'Y'";
           else
               $query = "SELECT RECIPE_ID, NAME, SOURCE FROM TBL_RECIPE WHERE (".$keyword_name_string." OR ".$keyword_source_string." OR RECIPE_ID IN (".$string.")) ".$course_string." AND DELETED = 'N' AND APPROVED = 'Y'";
           $result = mysql_query($query) or trigger_error(mysql_error(), E_USER_ERROR);
        }
        if($keyword != NULL && $course != NULL && $exclude != NULL){
           $query_keyword = "SELECT DISTINCT TBL_CONTAINS.RECIPE_ID FROM TBL_CONTAINS, TBL_INGREDIENT WHERE TBL_INGREDIENT.INGREDIENT_ID = TBL_CONTAINS.INGREDIENT_ID AND (".$keyword_ingredient_string.")";
           $result_keyword = mysql_query($query_keyword) or trigger_error(mysql_error(), E_USER_ERROR);
           $string_keyword = "";
           if($result_keyword == FALSE)
              $string_keyword = "";
           else{
              $start = false;
              while($row = mysql_fetch_assoc($result_keyword)){
              	$id = $row["RECIPE_ID"];
              	if($start == false){
                 	$start = true;
                 	$string_keyword = $id."";
              	}
              	else
              		$string_keyword = $string_keyword.", ".$id;
              }
           }
           mysql_free_result($result_keyword);
           if($string_keyword != "")
              $keyword_ingredients = " OR RECIPE_ID IN (".$string_keyword.")";
           $query = "SELECT RECIPE_ID FROM TBL_RECIPE WHERE (".$keyword_name_string." OR ".$keyword_source_string." ".$keyword_ingredients.") ".$course_string." AND DELETED = 'N' AND APPROVED = 'Y' ".$exclude_name_string." ".$exclude_source_string;
           $result = mysql_query($query) or trigger_error(mysql_error(), E_USER_ERROR);
           if($result == FALSE){
              mysql_free_result($result);
              return 0;
           }
           $string_of_recipes = "";
           $start = true;
           while($row = mysql_fetch_assoc($result)){
              $id = $row["RECIPE_ID"];
              $id_query = "SELECT INGREDIENT_ID FROM TBL_CONTAINS WHERE RECIPE_ID = ".$id;
              $matched_name_query = "SELECT TBL_INGREDIENT.NAME FROM TBL_CONTAINS, TBL_INGREDIENT WHERE TBL_CONTAINS.RECIPE_ID = '".$id."' AND TBL_CONTAINS.INGREDIENT_ID = TBL_INGREDIENT.INGREDIENT_ID ".$exclude_ingredient_string;
              $id_result = mysql_query($id_query) or trigger_error(mysql_error(), E_USER_ERROR);
              $name_result = mysql_query($matched_name_query) or trigger_error(mysql_error(), E_USER_ERROR);
              if(mysql_num_rows($id_result) == mysql_num_rows($name_result)){
                 if($start == true){
                    $string_of_recipes = "".$id;
                    $start = false;
                 }
                 else
                     $string_of_recipes = $string_of_recipes.", ".$id;
              }
              mysql_free_result($id_result);
              mysql_free_result($name_result);
           }
           if($string_of_recipes == "")
              return 0;
           else{
              $query = "SELECT RECIPE_ID, NAME, SOURCE FROM TBL_RECIPE WHERE RECIPE_ID IN (".$string_of_recipes.")";
              $result = mysql_query($query) or trigger_error(mysql_error(), E_USER_ERROR);
           }
        }
        if($keyword == NULL && $course != NULL && $exclude == NULL){
           $query = "SELECT RECIPE_ID, NAME, SOURCE FROM TBL_RECIPE WHERE DELETED = 'N' AND APPROVED = 'Y' ".$course_string."";
           $result = mysql_query($query) or trigger_error(mysql_error(), E_USER_ERROR);
        }
        if($keyword == NULL && $course != NULL && $exclude != NULL){
           $query = "SELECT RECIPE_ID FROM TBL_RECIPE WHERE DELETED = 'N' AND APPROVED = 'Y' ".$exclude_name_string." ".$exclude_source_string." ".$course_string."";
           $result = mysql_query($query) or trigger_error(mysql_error(), E_USER_ERROR);
           if($result == FALSE){
              mysql_free_result($result);
              return 0;
           }
           $string_of_recipes = "";
           $start = true;
           while($row = mysql_fetch_assoc($result)){
              $id = $row["RECIPE_ID"];
              $id_query = "SELECT INGREDIENT_ID FROM TBL_CONTAINS WHERE RECIPE_ID = ".$id;
              $matched_name_query = "SELECT TBL_INGREDIENT.NAME FROM TBL_CONTAINS, TBL_INGREDIENT WHERE TBL_CONTAINS.RECIPE_ID = '".$id."' AND TBL_CONTAINS.INGREDIENT_ID = TBL_INGREDIENT.INGREDIENT_ID ".$exclude_ingredient_string;
              $id_result = mysql_query($id_query) or trigger_error(mysql_error(), E_USER_ERROR);
              $name_result = mysql_query($matched_name_query) or trigger_error(mysql_error(), E_USER_ERROR);
              if(mysql_num_rows($id_result) == mysql_num_rows($name_result)){
                 if($start == true){
                    $string_of_recipes = "".$id;
                    $start = false;
                 }
                 else
                     $string_of_recipes = $string_of_recipes.", ".$id;
              }
              mysql_free_result($id_result);
              mysql_free_result($name_result);
           }
           if($string_of_recipes == "")
              return 0;
           else{
              $query = "SELECT RECIPE_ID, NAME, SOURCE FROM TBL_RECIPE WHERE RECIPE_ID IN (".$string_of_recipes.")";
              $result = mysql_query($query) or trigger_error(mysql_error(), E_USER_ERROR);
           }

        }
        //If no results given from keyword/course/exclude queries above, then no need to check allergens
        if($result == FALSE){
           mysql_free_result($result);
           return 0;
        }
        //Now check above results with allergens checked
        if($allr_array != NULL){
           while($row = mysql_fetch_assoc($result)){
              $result_allrs = array();
              $id = $row["RECIPE_ID"];
              $name = $row["NAME"];
              $source = $row["SOURCE"];
              $query = "SELECT ALLERGEN FROM TBL_FREEOF WHERE RECIPE_ID ='".$id."'";
              $allr_result = mysql_query($query) or trigger_error(mysql_error(), E_USER_ERROR);
              if($allr_result == FALSE){
                 mysql_free_result($allr_result);
                 continue;
              }
              //Fills temp allr array and legend array from allergen query
              for($i=0;$i<mysql_num_rows($allr_result);$i++){
                 $allr_row = mysql_fetch_assoc($allr_result);
                 $result_allrs[] = $allr_row["ALLERGEN"];
              }
              $match_all = true;
              for($i=0;$i<count($allr_array);$i++){
                 if(!in_array($allr_array[$i], $result_allrs)){
                    $match_all = false;
                    break;
                 }
              }
              //Recipes that match all allergens checked, put in the array that will be accesed for displaying
              if($match_all == true){
                 //Find all legends for this recipe id because could be more than just passed ones
                 $query = "SELECT LEGEND FROM TBL_FREEOF WHERE RECIPE_ID = '".$id."'";
                 $legend_result = mysql_query($query) or trigger_error(mysql_error(), E_USER_ERROR);
                 $string = "";
                 $start = true;
                 while($legend_row = mysql_fetch_assoc($legend_result)){
                    if($start == true){
                       $string = "".$legend_row["LEGEND"];
                       $start = false;
                    }
                    else
                       $string = $string.", ".$legend_row["LEGEND"];
                 }
                 mysql_free_result($legend_result);
                 //Recipes found to be displayed
                 $results_array[$num_of_recipes][0] = $id;
                 $results_array[$num_of_recipes][1] = $name;
                 $results_array[$num_of_recipes][2] = $string;
                 $results_array[$num_of_recipes][3] = $source;
                 $num_of_recipes += 1;
              }
              mysql_free_result($allr_result);
           }/***END WHILE***/
        }/***END IF $allr_array != NULL***/
        //No allergens were checked so just do the final queries
        if($allr_array == NULL){
           while($row = mysql_fetch_assoc($result)){
              $id = $row["RECIPE_ID"];
              $name = $row["NAME"];
              $source = $row["SOURCE"];
              //Find all legends for this recipe id because could be more than just passed ones
              $query = "SELECT LEGEND FROM TBL_FREEOF WHERE RECIPE_ID = '".$id."'";
              $legend_result = mysql_query($query) or trigger_error(mysql_error(), E_USER_ERROR);
              $string = "";
              $start = true;
              while($legend_row = mysql_fetch_assoc($legend_result)){
                 if($start == true){
                    $string = "".$legend_row["LEGEND"];
                    $start = false;
                 }
                 else
                    $string = $string.", ".$legend_row["LEGEND"];
              }
              mysql_free_result($legend_result);
              //Recipes found to be displayed
              $results_array[$num_of_recipes][0] = $id;
              $results_array[$num_of_recipes][1] = $name;
              $results_array[$num_of_recipes][2] = $string;
              $results_array[$num_of_recipes][3] = $source;
              $num_of_recipes += 1;
           }
        }/**END IF $allr_array == NULL***/
        mysql_free_result($result);
        return 0;
      }

?>
