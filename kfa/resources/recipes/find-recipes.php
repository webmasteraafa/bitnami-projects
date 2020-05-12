<?php
  session_start();
  $numrecipe = $_SESSION[total_rows];
  $fromPage = $_SESSION[from_page];
  $currentPage = "find-recipes";
  //Checks the type of the user
  if($_SESSION[isAdmin] == true)
     $usertype = 'admin';
  else
     $usertype = 'user';
  
  //CODE FOR MULTIPLE PAGING
  $limit = $_GET[limit];
  $page = $_GET[page];
  if (!($limit)){
     $limit = 20;} // Default results per-page.
  if (!($page)){
     $page = 0;} // Default page value.
  //numrows contains the number of results
  $numrows = $_SESSION['total_rows'];
  //pages contains number of pages needed for all results
  $pages = intval($numrows/$limit); // Number of results pages.
  //$pages now contains int of pages, unless there is a remainder from division.
  if ($numrows%$limit) {
     $pages++;} // has remainder so add one page
  //current is the current page number
  $current = ($page/$limit) + 1; // Current page number.
  if (($pages < 1) || ($pages == 0)) {
     $total = 1;} // If $pages is less than one or equal to 0, total pages is 1.
  else {
       $total = $pages;} // Else total pages is $pages value.
       

    $first = $page + 1;
  if (!((($page + $limit) / $limit) >= $pages) && $pages != 1) {
     $last = $page + $limit;} //If not last results page, last result equals $page plus $limit.
  else{
       $last = $numrows;} // If last results page, last result equals total number of results.
  if ($from_page != 'admin'){
    $_SESSION['from_page'] = $currentPage;
  }
  session_write_close();

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
   <title>Search Results Safe Eats Recipe Database</title>
   
   <script language="JavaScript" type="text/javascript">

    /*** This method handles all the button pushes ***/
	function handleButton(){
		var checked, anylisted, elements, selectedrecipes;
        selectedrecipes = "";
		elements = document.listedrecipes.elements;
		checked = false;
        anylisted = 0;
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
           document.listedrecipes.action = "SearchResultHandling.php?button=approve";
        }
     	else if(document.pressed == 'Delete'){
           document.listedrecipes.action = "SearchResultHandling.php?button=delete";
        }
	}

    /*** This method handles check all and clear all ***/
	function checkRecipe(option){
     var i, elements, num, first;
     num = 0;
     elements = document.listedrecipes.elements;
     if (option == 'check'){
       for (i=0;i<elements.length;i++){
       	 if(elements[i].type == 'checkbox'){
         	if(num == 0)
         	   first = i;
         	num++;
         	elements[i].checked=true;
         }
       }
       if(num <= 1){
       	 alert("No Recipes Listed");
       	 return;
       }
       return;
     }
     if (option == 'clear'){
       for(i=0;i<elements.length;i++){
         if(elements[i].type == 'checkbox'){
         	if(num == 0)
         	   first = i;
         	num++;
         	elements[i].checked=false;
         }
       }
       if(num <= 1){
       	 alert("No Recipes Listed");
       	 return;
       }
       return;
     }
   }
   
   /*** This method handles the master check box ***/
   function handleTopOfList(){
     var elements, first;
     elements = document.listedrecipes.elements;
     for(i=0;i<elements.length;i++){
         if(elements[i].type == 'checkbox'){
            first = i;
            break;
         }
     }

     if (elements[first].checked == true){
       checkRecipe('check');
     } else {
       checkRecipe('clear');
     }
   }

function showHelp(topic){
	var m = window.open("http://kidswithfoodallergies.org/recipes/help.html#"+ topic,"","scrollbars=yes, toolbar=no, resizable=no, width=550 s,height=250"); 
}
</script>



</head>

<body>
<!-- Main table that holds all -->
<?php
  require("topbanner2014.html");
?>

<table class="background" cellpadding="0" cellspacing="0" border="0" align="center" width="1000">
	<tr>
		<td valign="top" width="240">
         <?php
         require("leftnavigation2014.html"); ?>
			</td>
        <td width="20"></td>
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
                     <h2 align="center">Search Results Allergy-Friendly Recipes</h2>
                      <!-- INSERT CONTENT HERE -->

         		<table width="568" align="center" border="0" class="style19" cellpadding="5" cellspacing="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1">
          			<tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
            			<td height="33" colspan="2" bgcolor="#FFFFFF" >
             <form method=POST name=listedrecipes onSubmit="handleButton();">

             <!-- Allergen Legend Table closed -->
             				<table id="tblAllergenInfo" cellSpacing="2" cellPadding="1" width="568" align="center" border="0">
              					<tr>
                <?php echo "<td class=\"header\" colSpan=\"6\" width=\"506\">&nbsp;Allergen Legend:</td>"?>
              					</tr>
              					<tr>
                					<td class="celltitlebg" width="78">&nbsp;<span class="allergenKey">M</span>ilk</td>
               						<td class="celltitlebg" width="78">&nbsp;<span class="allergenKey">P</span>eanut</td>
                					<td class="celltitlebg" width="78">&nbsp;<span class="allergenKey">E</span>gg</td>
                					<td class="celltitlebg" width="78">&nbsp;<span class="allergenKey">S</span>oy</td>
                					<td class="celltitlebg" width="78">&nbsp;<span class="allergenKey">T</span>ree nut</td>
                					<td class="celltitlebg" width="78">&nbsp;<span class="allergenKey">C</span>orn</td>
              					</tr>
              					<tr>
                					<td class="celltitlebg" width="78">&nbsp;<span class="allergenKey">G</span>luten</td>
                					<td class="celltitlebg" width="78">&nbsp;<span class="allergenKey">W</span>heat</td>
                					<td class="celltitlebg" width="78">&nbsp;<span class="allergenKey">F</span>ish</td>
                					<td class="celltitlebg" width="78">&nbsp;<span class="allergenKey">Sh</span>ellfish</td>
                					<td class="celltitlebg" width="78">&nbsp;<span class="allergenKey">Ses</span>ame</td>
                					<td class="celltitlebg" width="78">&nbsp;<span class="allergenKey">O</span>ther</td>
              					</tr>
            				</table>
         
<!-- closed -->	   <table align="center" cellpadding="2" cellspacing="10">
      				<tr>
         				<td>
            <!-- Result Paging Table -->
<!-- closed -->	            <table border="0" cellpadding="0" cellspacing="2" ID="PagingTable" width="568">
               					<tr>
                  					<td colspan="2" align="right" class="normal">
                 	 <?php
                  //Code for setting up results per page values
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
                  					</td>
               					</tr>
            				</table>
   
            <!-- Search Result Label -->
 <!-- closed -->	         <table align="center" border="0" cellpadding="0" cellspacing="0" width="568">
               					<tr>
	               					<td class="headerleft">&nbsp;Search Results (<?if($last == 0) echo "0"; else echo $first; ?> - <?=$last?> of <?=$numrows?>)
                                    </td>
                  					<td class="headerright">page <?=$current?> of <?=$total?>
                                    </td>
               					</tr>
            				</table>

          <!-- Show Results Table -->
<!-- closed -->			 	<table border="0" cellpadding="0" cellspacing="2" ID="resultTable" width="568">
								<tr>
               						<td align="center" class="celltitlebg" width="30"> <?php if($usertype == 'admin') echo "<INPUT type=checkbox onClick=\"handleTopOfList()\">";?> 
                                    </td>
									<td align="center" class="celltitlebg" width="238"> &nbsp;Recipe Name 
                                    </td>
               						<td align="center" class="celltitlebg" width="100"> &nbsp;Created By 
                                    </td>
									<td align="center" class="celltitlebg" width="100"> &nbsp;Allergen Free 
                                    </td>
								</tr>
                
                			</table>
                
                
<!--closed-->		 				<table align="center" border="0" cellpadding="0" cellspacing="0" width="568">				
                <?php echoTableResults();?>
                				<tr>
          							<td class="footerleft" colspan="3">
          				<?php
                              //Code that only displays checkall and clear all for administrator
                              if($usertype == 'admin'){
            					echo "<a href=\"javascript:void(0)\" onClick=\"checkRecipe('check')\">Check All</a> -";
            					echo "<a href=\"javascript:void(0)\" onClick=\"checkRecipe('clear')\">Clear All</a>";
          				  	  }
                   ?>
									</td>
          							<td class="footerright" colspan="2">
          			<?php
                  //Code that displays paging and links
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
          			?>
          							</td>
        						</tr>
            					<tr>
              						<td colspan="5" align="right" class="normal">
                <a href="search.php">Search Again</a>
              						</td>
            					</tr>
            					<tr>
               						<td class="background" colspan="5" align="center">
                  <?php
                       //Code that only displays approve and delete buttons if administrator
    	               if ($usertype == 'admin'){
                     if ($fromPage == 'admin'){
                        echo "&nbsp;<INPUT type=\"SUBMIT\" name=\"Approve\" onClick=\"document.pressed=this.value\" value=\"Approve\">&nbsp;";
                        echo "&nbsp&nbsp&nbsp";
                     }
			               echo "&nbsp;<INPUT type=\"SUBMIT\" name=\"Delete\" onClick=\"document.pressed=this.value\" value=\"Delete\">&nbsp;";
                     }
                  ?>             
               						</td>
            					</tr>            
         				</table>      
          </form>  
          
          			</td>
       				</tr>
				</table><!-- closes 221-->
                
                </td></tr></table>
        <br />
<br />
        
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
            <p>&nbsp;</p>
            
            
            
            
            </div>

</td></tr></table>




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
pageTracker._trackPageview("/Search Recipes Results");
</script>
</body>
</html>

<?php

 /////////////////////////////////***ONLY METHOD DEFINITIONS BEYOND THIS POINT***///////////////////////////////////
 
 /******ECHOS QUERY RESULTS DYNAMICALLY IN TABLE ROWS*******/
	function echoTableResults(){

global $first;
global $last;
global $usertype;
        	$results_array = $_SESSION[db_result];
			$myquery = $_SESSION[query];
        	$num_results = $_SESSION[total_rows];
			//echo $myquery;
         

		//No recipes to display
		if($results_array == NULL || $num_results == 0){
			echo "<tr>";
			echo "<td align=\"center\" colspan=\"4\" class=\"searchresultbg\" width=\"468\"><i>No Recipes
                               Found</i></td>";
			echo "</tr>";
		}
		else{
            	//Recipes displayed
	    		for($counter = ($first-1); $counter<$last; $counter += 1){

     		            $name_id = $results_array[$counter][0];
                        $name = $results_array[$counter][1];
                        $allergens = $results_array[$counter][2];
                        $source = $results_array[$counter][3];

				if ($counter % 2 == 0){
                echo "<tr>";
                echo "<td align=\"center\" class=\"searchresultbgeven\" width=\"30\">";
                if($usertype == 'admin')
                	echo "<INPUT type=checkbox name=list[] value=\"". $name_id . "\">";
                echo "</td>";
				echo "<td align=\"left\" class=\"searchresultbgeven\" width=\"238\"> &nbsp; <a class=\"resultlinkeven\" href=\"showrecipe.php?id=" . $name_id . "\">" . $name . "</a></td>";
                echo "<td align=\"left\" class=\"resultlinkeven\" width=\"100\"> &nbsp;". $source ."</td>";
				echo "<td align=\"left\" class=\"resultlinkeven\" width=\"100\"> &nbsp;" . $allergens . "</td>";
				echo "</tr>";
				} else {
				echo "<tr>";
                echo "<td align=\"center\" class=\"searchresultbgodd\" width=\"30\">";
                if($usertype == 'admin')
                	echo "<INPUT type=checkbox name=list[] value=\"". $name_id . "\">";
                echo "</td>";
				echo "<td align=\"left\" class=\"searchresultbgodd\" width=\"238\"> &nbsp; <a class=\"resultlinkodd\" href=\"showrecipe.php?id=" . $name_id . "\">" . $name . "</a></td>";
                echo "<td align=\"left\" class=\"resultlinkodd\" width=\"100\"> &nbsp;". $source ."</td>";
				echo "<td align=\"left\" class=\"resultlinkodd\" width=\"100\"> &nbsp;" . $allergens . "</td>";
				echo "</tr>";				
				}
				
	   		}
		}
	}

?>
