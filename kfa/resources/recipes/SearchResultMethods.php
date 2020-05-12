<?php

     /******ECHOS QUERY RESULTS DYNAMICALLY IN TABLE ROWS*******/
	function echoTableResults(){

        	$results_array = $_SESSION[db_result];
        	$num_results = $_SESSION[total_rows];

		//No recipes to display
		if($results_array == NULL || $num_results == 0){
			echo "<tr>";
			echo "<td align=\"center\" colspan=\"4\" class=\"searchresultbg\" width=\"468\"><i>No Recipes
                               Found</i></td>";
			echo "</tr>";
		}
		else{
            	//Recipes displayed
	    		for($counter = 0; $counter<$num_results; $counter += 1){
                		//Show only a max of 100 recipes
                		if($counter > 100)
                   			break;
                		$name_id = $results_array[$counter][0];
				$name = $results_array[$counter][1];
        $source = $results_array[$counter][2];
				$allergens = $results_array[$counter][3];

				echo "<tr>";
                echo "<input type=hidden id=\"srid\" name=\"sr\" value=>";
				echo "<td align=\"center\" class=\"searchresultbg\" width=\"30\">";
				echo "<input type=checkbox name=list  value=\"";
				echo "". $name_id . "\" class=\"defaultfont\"></td>";
				echo "<td align=\"left\" class=\"searchresultbg\" width=\"238\"> &nbsp; <a
				class=\"resultlink\" href=\"http://cgi3-int.cc.gatech.edu/php/classes/AY2005/cs3911b_fall/Projects/Team1/showrecipe.php?id=" . $name_id . "\">" . $name . "</a></td>";
        echo "<td align=\"left\" class=\"resultlink\" width=\"95\"> &nbsp;". $source ."</td>";
				echo "<td align=\"left\" class=\"resultlink\" width=\"100\"> &nbsp;" . $allergens . "</td>";
				echo "</tr>";
	   		}
		}
	}


      /***HANDLES SERVER SIDE OF DELETE BUTTON***/
     function handleDelete(){
        $selectedrecipes = $_GET[r];

        //DEBUGGING
        //echo "IN DELETE HANDLE";
        //echo "<br>";
        //echo $selectedrecipes;
        //END DEBUGGING
        
        if($selectedrecipes != ""){
           $id = strtok($selectedrecipes, ",");
           while($id){
              $query = "UPDATE TBL_RECIPE SET DELETED = 'Y' WHERE RECIPE_ID = '".$id."'";
              $result = mysql_query($query) or trigger_error(mysql_error(), E_USER_ERROR);
              $id = strtok(",");
           }
        }
     }
      /***HANDLES SERVER SIDE OF APPROVE BUTTON***/
     function handleApprove(){
        $selectedrecipes = $_GET[r];
        
        //DEBUGGING
        //echo "IN APPROVE HANDLE";
        //echo "<br>";
        //echo $selectedrecipes;
        //END DEBUGGING
        
        if($selectedrecipes != ""){
           $id = strtok($selectedrecipes, ",");
           while($id){
              $query = "UPDATE TBL_RECIPE SET APPROVED = 'Y', APPROVAL_DATE = '".get_SQL_date()."' WHERE RECIPE_ID = '".$id."'";
              $result = mysql_query($query) or trigger_error(mysql_error(), E_USER_ERROR);
              $id = strtok(",");
           }
        }
     }

	/****SETS UP CONNECTION TO THE DATABASE****/
	function makeConnectionToDb(){

    /*
		$host = "messena.cc.gatech.edu:19220";
		$user = "root";
		$database = "pofak";
  */
		Global $connection;
    /*
		$connection = mysql_connect($host, $user);
		mysql_select_db("pofak", $connection);
  */
  
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


      /***HANDLES SEARCH, FILLS THE GLOBAL 2-D RESULTS_ARRAY***/
     function handleSearch($selected_keyword, $selected_course, $selected_allergens){


        //Get selections
        Global $results_array;
        Global $num_of_recipes;

        $keyword = format_entry($selected_keyword);
        $course = format_entry($selected_course);
        $allr_array = $selected_allergens;

        //No selections were made
	    if($keyword == NULL && $course == NULL && $allr_array == NULL){
           return 0;
        }

        //All the rest gets all the recipes depending on the cases of what search criterias used

        if($keyword == NULL && $course == NULL && $allr_array != NULL){
           $relevant_ids = array();
           $helper_string = "";

           for($i=0;$i<count($allr_array);$i++){
              if($i+1 == count($allr_array)){

                 if($i == 0)
                    $query = "SELECT RECIPE_ID FROM TBL_FREEOF WHERE ALLERGEN ='".$allr_array[$i]."'";
                 else
                    $query = "SELECT RECIPE_ID FROM TBL_FREEOF WHERE RECIPE_ID IN (".$helper_string.") AND ALLERGEN ='".$allr_array[$i]."'";

                 $result = mysql_query($query) or trigger_error(mysql_error(), E_USER_ERROR);
                 if($result == false)
                    break;
                 while($row = mysql_fetch_assoc($result)){
                    $id = $row["RECIPE_ID"];

                    $name_query = "SELECT NAME FROM TBL_RECIPE WHERE RECIPE_ID ='".$id."' AND DELETED = 'N' AND APPROVED = 'Y'";
                    $name_result = mysql_query($name_query) or trigger_error(mysql_error(), E_USER_ERROR);
                    $name_row = mysql_fetch_assoc($name_result);

                    $name = $name_row["NAME"];
                    mysql_free_result($name_result);

                    //Find all legends for this recipe id because could be more than just passed ones
                    $query = "SELECT LEGEND FROM TBL_FREEOF WHERE RECIPE_ID = '".$id."'";
                    $legend_result = mysql_query($query) or trigger_error(mysql_error(), E_USER_ERROR);
                    $string = "";
                    $start = true;
                    while($legend_row = mysql_fetch_assoc($legend_result)){
                       if($start){
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
                    $num_of_recipes += 1;
                 }

                 continue; //Go off to free result and return out
              }/***END If $i+1 == count($allr_array)***/

              if($i == 0){
                 $query = "SELECT RECIPE_ID FROM TBL_FREEOF WHERE ALLERGEN ='".$allr_array[$i]."'";
                 $result = mysql_query($query) or trigger_error(mysql_error(), E_USER_ERROR);
              }
              else{
                 $query = "SELECT RECIPE_ID FROM TBL_FREEOF WHERE RECIPE_ID IN (".$helper_string.") AND ALLERGEN ='".$allr_array[$i]."'";
                 $result = mysql_query($query) or trigger_error(mysql_error(), E_USER_ERROR);
              }
              if($result == false)
                 break;
              $helper_string = "";
              $start = true;
              while($row = mysql_fetch_assoc($result)){
                 if($start){
                    $helper_string = "".$row["RECIPE_ID"];
                    $start = false;
                 }
                 else{
                    $helper_string = $helper_string.",".$row["RECIPE_ID"];
                 }
              }

              mysql_free_result($result);

           }/***END FOR LOOP***/

           mysql_free_result($result);
           return 0;
        }

        //From this point, guaranteed to have keyword and/or course
        if($keyword != NULL && $course != NULL){
           $query = "SELECT RECIPE_ID, NAME FROM TBL_RECIPE WHERE NAME LIKE '%".$keyword."%' AND CATEGORY = '".$course."' AND DELETED = 'N' AND APPROVED = 'Y'";
           $result = mysql_query($query) or trigger_error(mysql_error(), E_USER_ERROR);
        }
        if($keyword != NULL && $course == NULL){
           $query = "SELECT RECIPE_ID, NAME FROM TBL_RECIPE WHERE NAME LIKE '%".$keyword."%' AND DELETED = 'N' AND APPROVED = 'Y'";
           $result = mysql_query($query) or trigger_error(mysql_error(), E_USER_ERROR);
        }
        if($keyword == NULL && $course != NULL){
           $query = "SELECT RECIPE_ID, NAME FROM TBL_RECIPE WHERE CATEGORY = '".$course."' AND DELETED = 'N' AND APPROVED = 'Y'";
           $result = mysql_query($query) or trigger_error(mysql_error(), E_USER_ERROR);
        }
        //If no results given from keyword/course queries, then no need to check allergens
        if($result == false){
           mysql_free_result($result);
           return 0;
        }

        //If allergens checked
        if($allr_array != NULL){
           while($row = mysql_fetch_assoc($result)){
              $result_allrs = array();
              $id = $row["RECIPE_ID"];
              $name = $row["NAME"];

              $query = "SELECT ALLERGEN FROM TBL_FREEOF WHERE RECIPE_ID ='".$id."'";
              $allr_result = mysql_query($query) or trigger_error(mysql_error(), E_USER_ERROR);
              if($allr_result == false){
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
              if($match_all){

                 //Find all legends for this recipe id because could be more than just passed ones
                 $query = "SELECT LEGEND FROM TBL_FREEOF WHERE RECIPE_ID = '".$id."'";
                 $legend_result = mysql_query($query) or trigger_error(mysql_error(), E_USER_ERROR);
                 $string = "";
                 $start = true;
                 while($legend_row = mysql_fetch_assoc($legend_result)){
                    if($start){
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
                 $num_of_recipes += 1;
              }

              mysql_free_result($allr_result);
           }/***END WHILE***/
        }/***END IF $allr_array != NULL***/

        //No allergens checked
        if($allr_array == NULL){
           while($row = mysql_fetch_assoc($result)){
              $id = $row["RECIPE_ID"];
              $name = $row["NAME"];

              //Find all legends for this recipe id because could be more than just passed ones
              $query = "SELECT LEGEND FROM TBL_FREEOF WHERE RECIPE_ID = '".$id."'";
              $legend_result = mysql_query($query) or trigger_error(mysql_error(), E_USER_ERROR);
              $string = "";
              $start = true;
              while($legend_row = mysql_fetch_assoc($legend_result)){
                 if($start){
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
              $num_of_recipes += 1;
           }
        }/**END IF $allr_array == NULL***/


        mysql_free_result($result);
        return 0;
      }
      
      //HELPER FUNCTION: Used in handle Approve to get the date
      function get_SQL_date(){
         $today = getdate();
         $sql_date = $today[year]."-".$today[mon]."-".$today[mday]." ".$today[hours].
               ":".$today[minutes].":".$today[seconds];
         return $sql_date;
      }

?>
