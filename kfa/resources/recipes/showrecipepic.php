<?php
session_start();
if($_SESSION[isAdmin] == true){
    $usertype = 'admin';
}
else{
  $usertype = 'user';
}
//echo $usertype;

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
   <link rel="stylesheet" href="style.css" type="text/css">

<meta name="keywords" content="allergy recipes">
<meta name="description" content="Display Safe Eats Recipes">
<link href="http://www.kidswithfoodallergies.org/js/main.css" rel="stylesheet" type="text/css">
<link href="http://www.kidswithfoodallergies.org/js/images.css" rel="stylesheet" type="text/css">
<link href="http://www.kidswithfoodallergies.org/js/forms.css" rel="stylesheet" type="text/css">
<script language="javascript" src="http://www.kidswithfoodallergies.org/js/menu.js" type="text/javascript"></script>
   <title>Display Recipe - Safe Eats Recipe Database</title>
</head>
   <!-- Start pasting your code right here !!! -->           
            <?php
              $in_recipe_id = $_GET[id];
              
              if ($in_recipe_id == NULL){
                echo "Invalid recipe Id. Please try again.<BR>";
                exit();
              }
              
              $db = mysql_connect("kidswithfoodallergies.org:3306", "kidswitror_rcp", "allergenfree");
              mysql_select_db("kidswitror_eve",$db);
              $sql = "SELECT RECIPE.NAME, RECIPE.CATEGORY,
                      RECIPE.SERVINGS, RECIPE.CONTRIBUTOR, RECIPE.SOURCE,
                      RECIPE.INSTRUCTIONS, RECIPE.SUBMITTER_COMMENTS,
		      RECIPE.SUBST_NOTES, RECIPE.APPROVED, RECIPE.picture, RECIPE.pic_alt FROM TBL_RECIPE AS RECIPE
		      WHERE RECIPE.RECIPE_ID =" .$in_recipe_id.";";
	      $result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
	      if(mysql_num_rows($result) <= 0) {echo 'The recipe requested was not found'; exit();}

	      $sql2 = "SELECT CONTAINS.QUANTITY, CONTAINS.MEASURE, 
		      INGREDIENT.NAME, CONTAINS.OPTIONAL, CONTAINS.ORDER FROM TBL_CONTAINS
		      AS CONTAINS, TBL_INGREDIENT AS INGREDIENT WHERE
		      CONTAINS.RECIPE_ID =" .$in_recipe_id." AND
		      CONTAINS.INGREDIENT_ID = INGREDIENT.INGREDIENT_ID order by CONTAINS.ORDER";
	      $result2 = mysql_query($sql2) or trigger_error(mysql_error(), E_USER_ERROR);

	      $sql3 = "SELECT TBL_FREEOF.ALLERGEN, TBL_FREEOF.LEGEND
                 FROM TBL_FREEOF WHERE TBL_FREEOF.RECIPE_ID =" .$in_recipe_id.";";
	      $result3 = mysql_query($sql3) or trigger_error(mysql_error(), E_USER_ERROR);



              $db_name = mysql_result($result,0,"name");
              $db_category = mysql_result($result,0,"category");
              $db_servings = mysql_result($result,0,"servings");
              $db_contributor = mysql_result($result,0,"contributor");
              $db_source = mysql_result($result,0,"source");
              $db_instructions = mysql_result($result,0,"instructions");
              $db_submitter_comments = mysql_result($result,0,"submitter_comments");
              $db_subst_notes = mysql_result($result,0,"subst_notes");
              $db_approved = mysql_result($result,0,"approved");
			  $db_picture = mysql_result($result,0,"picture");
			  $db_picalt = mysql_result($result,0,"pic_alt");
              $allr_array = array();
            ?>

<script language="JavaScript" type="text/javascript">

  var newwindow;
  var postwindow;
  function popWindow(recipe_id)
  {
	  newwindow=window.open("PrintRecipe.php?id="+recipe_id, "", "toolbar=no,resizable=no,scrollbars=yes,width=530,height=800");
	  if (window.focus) {newwindow.focus();}
  }


 function selectAction(option, id){
    if (option == 1){
      document.showrcpform.action="editrecipe.php?id="+id;
    }
    if (option == 2){
      document.showrcpform.action="SearchResultHandling.php?button=approve&r="+id+",";
    }
    if (option == 3){
      document.showrcpform.action="SearchResultHandling.php?button=delete&r="+id+",";

    }
	if (option == 4){
      document.showrcpform.action="editpicture.php?id="+id;

    }

  }
  function postComment()
  {
    var id = document.showrcpform.recipe_id.value;
    var subject = document.showrcpform.recipe_name.value;
    postwindow=window.open("http://kidswithfoodallergies.org/eve/ubb.x?a=dl&f=5260079562&s=2400067262&x_id="+id+"&x_subject="+subject+"&x_link=http://kidswithfoodallergies.org/recipes/showrecipetest1.php?id="+id,  "", "toolbar=yes,resizable=yes,scrollbars=yes,width=600,height=800");
 	  if (window.focus) {postwindow.focus();}
  }
</script>


<body>
<?php
  require("topbanner1.html");
?>

<table class="background" cellpadding="0" cellspacing="0" border="0" align="center" width="750">
<tr>
<td valign="top" width="180">
         <?php
         require("leftnavigation.html"); ?>
</td>
<td align="left" valign="top" width="560">
    
              
      <table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF">
          <tr valign="top" bgcolor="#CCCCCC" align="left">
            <td height="33" colspan="2" valign="middle" bgcolor="#3F679B">
            <div align="left"><h1>&nbsp;&nbsp;&nbsp; Safe Eats &trade; Recipes</h1>
            </div></td>
          </tr>
       </table>
       <!--<table width="568" class="style19" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#E1E1E1">
        <tr valign="top" bgcolor="#CCCCCC" bordercolor="#FFFFFF" align="left">
        <td colspan="2" bgcolor="#FFFFFF">-->
         <div class="recipesgreyboxmain">
                <table border="0" align="center" cellpadding="1" cellspacing="2" ID="ingredients" width="468">
                     <tr>
                     <td class="title" align="center">
                     <form name="showrcpform" method="POST" action="">
                     
                        <?php echo $db_name; ?>
						
                        <input name="recipe_id" type="hidden" value="<?php echo $in_recipe_id; ?>">
                        <input name="recipe_name" type="hidden" value="<?php echo urlencode($db_name);?>">
                     </td>
                     </tr>
                                             
                     <tr>                       
                        <td class="recipedetaillink">
                           <a href="javascript:postComment();" class="left">have a question about this recipe</a>
                      
                           <a class="right" href="javascript:popWindow(<?php echo $in_recipe_id; ?>);">printer friendly version</a>
                        </td></tr>
                     
					
                     <tr><td align="center"> <?php
                    if ($usertype == 'admin'){
                      echo "&nbsp;<button name=\"editbutton\" type=\"submit\" value=\"edit\" onClick=\"selectAction(1,".$in_recipe_id.")\">Edit</button>&nbsp;";
					  echo "&nbsp;<button name=\"picbutton\" type=\"submit\" value=\"editpicture\" onClick=\"selectAction(4,".$in_recipe_id.")\">Edit Picture</button>&nbsp;";
                      if ($db_approved == 'N'){
                        echo "&nbsp;<button name=\"approverecipe\" type=\"submit\" value=\"approve\" onClick=\"selectAction(2,".$in_recipe_id.")\">Approve</button>&nbsp;";
                      }
                      echo "&nbsp;<button name=\"deletebutton\" type=\"submit\" value=\"delete\" onClick=\"selectAction(3,".$in_recipe_id.")\">Delete</button>&nbsp;";
                      echo "<input name=list[] type=hidden value=\"".$in_recipe_id."\">";
                    }
                    ?>
                    </form>
                    </td></tr>
                  </table>
                  
                 <table align="center" border="0" width="468">
	         <tr> <td width="460" align="center" valign="middle" class="background">
			 <?php
						echo "<br>";
				$rater_id=$in_recipe_id;
				$rater_item_name='Recipe '.$db_name;
				include("rating.php");
				echo "<br>";
				?>
                </td>
         	    </tr>
				</table>
                  
                  <table align="center" border="0" cellpadding="1" cellspacing="2" ID="information" width="468">
                        <tr>
                        <td class="header" width="306">&nbsp;Recipe Information&nbsp;&nbsp;</td>
                        </tr>
                        <tr class="cellbg">
                           <td width="468" class="resultspacing"><?php if($db_category) {echo 'Category: '.$db_category.'<br>';} ?>
				    <?php if($db_servings) {echo '# of Servings: '.$db_servings.'<br>';} ?>
			            <?php if($db_contributor) {echo 'Recipe Entered By: '.$db_contributor.'<br>';} ?>
				    <?php if($db_source) {echo 'Recipe Created By: '.$db_source.'<br>';} ?></td>
                	    </tr>
       		       </table>

    		<br>&nbsp;<br>&nbsp;
            	  <table align="center" border="0" cellpadding="1" cellspacing="2" ID="ingredients" width="468">
	        	      <tr><td class="header" width="106">&nbsp;Ingredients&nbsp;&nbsp;</td>
                  </tr>
                	 <tr class="cellbg">
                    <td width="460" class="resultspacing"><?php while($row = mysql_fetch_array($result2, MYSQL_NUM))
				{echo $row[0].'&nbsp;&nbsp;'.$row[1].'&nbsp;&nbsp;'.$row[2];
         if ($row[3] == 'Y'){
           echo ' <i>(optional)</i>';
         }
         echo '<br>';
        }
				mysql_free_result($result2);?></td>
                	    </tr>
            		</table>
        	   <br>&nbsp;<br>&nbsp;
            		
                 <table align="center" border="0" cellpadding="1" cellspacing="2" ID="instructions" width="468">
	        	    <tr><td class="header" width="106">&nbsp;Instructions&nbsp;&nbsp;</td>
                	    </tr>
                	    <tr class="cellbg">
                    	<td width="468" class="resultspacing"><?php
																	if($db_instructions) {echo $db_instructions;} ?></td>
                	    </tr>
            		</table>
        	    <br>&nbsp;<br>&nbsp;
                
                
            	<table align="center" border="0" cellpadding="1" cellspacing="2" ID="comments" width="468">
	        	    <tr><td class="header" width="106">&nbsp;Comments&nbsp;&nbsp;</td>
                	 </tr>
                	 <tr class="cellbg">
                    <td width="468" class="resultspacing"><?php 
					 if($db_picture) {echo "<img src=\"http://www.kidswithfoodallergies.org/zoomimg/".$db_picture."\" alt=\"".$db_picalt."\" width=\"125\" height=\"94\" border=\"0\" class=\"right\" />";}
										if($db_submitter_comments) {echo $db_submitter_comments;} ?></td>
                	    </tr>
            		</table>
        	    <br>&nbsp;<br>&nbsp;
                
                
            	<table align="center" border="0" cellpadding="1" cellspacing="2" ID="substitutions" width="468">
	        	   <tr><td class="header" width="106">&nbsp;Substitutions&nbsp;&nbsp;</td>
                	    </tr>
                	<tr class="cellbg">
                    <td width="468" class="resultspacing"><?php if($db_subst_notes) {echo $db_subst_notes;} ?></td>
                	    </tr>
            		</table>
        	    <br>&nbsp;<br>&nbsp;
                

        <?php
        $other_allergens = '';
        while($row = mysql_fetch_array($result3, MYSQL_NUM)){
           $allr_legends[] = $row[1];
           if ($row[1] == "O"){
             $other_allergens = $other_allergens.$row[0].', ';
           }
        }
        $other_allergens = substr($other_allergens,0, (strlen($other_allergens) - 2));
				?>

	       
         <table id="tblAllergenInfo" cellSpacing="2" cellPadding="1" width="468" align="center" border="0">
         <tr>
            <?php echo "<td class=\"header\" colSpan=\"6\" width=\"468\">&nbsp;This recipe is free of:</td>"?>
         </tr>
         <tr>
            <td class="celltitlebg" width="78">
            <input id="milkfree" type="checkbox" disabled name="milkfree" <?php if (is_array($allr_legends) && (in_array("M", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">M</span>ilk</td>
            <td class="celltitlebg" width="78">
            <input id="peanutfree" type="checkbox" disabled name="peanutfree" <?php if (is_array($allr_legends) && (in_array("P", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">P</span>eanut</td>
            <td class="celltitlebg" width="78">
            <input id="eggfree" type="checkbox" disabled name="eggfree" <?php if (is_array($allr_legends) && (in_array("E", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">E</span>gg</td>
            <td class="celltitlebg" width="78">
            <input id="soyfree" type="checkbox" disabled name="soyfree" <?php if (is_array($allr_legends) && (in_array("S", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">S</span>oy</td>
            <td class="celltitlebg" width="78">
            <input id="nutfree" type="checkbox" disabled name="nutfree" <?php if (is_array($allr_legends) && (in_array("T", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">T</span>ree nut</td>
            <td class="celltitlebg" width="78">
            <input id="cornfree" type="checkbox" disabled name="cornfree" <?php if (is_array($allr_legends) && (in_array("C", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">C</span>orn</td>
         </tr>
         <tr>
            <td class="celltitlebg" width="78">
            <input id="glutenfree" type="checkbox" disabled name="glutenfree" <?php if (is_array($allr_legends) && (in_array("G", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">G</span>luten</td>
            <td class="celltitlebg" width="78">
            <input id="wheatfree" type="checkbox" disabled name="wheatfree" <?php if (is_array($allr_legends) && (in_array("W", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">W</span>heat</td>
            <td class="celltitlebg" width="78">
            <input id="fishfree" type="checkbox" disabled name="fishfree" <?php if (is_array($allr_legends) && (in_array("F", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">F</span>ish</td>
            <td class="celltitlebg" width="78">
            <input id="shellfishfree" type="checkbox" disabled name="shellfishfree" <?php if (is_array($allr_legends) && (in_array("Sh", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">Sh</span>ellfish</td>
            <td class="celltitlebg" width="78">
            <input id="sesamefree" type="checkbox" disabled name="sesamefree" <?php if (is_array($allr_legends) && (in_array("Ses", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">Ses</span>ame</td>
            <td class="celltitlebg" width="78">&nbsp;
            
            </td>
         </tr>

         <tr>
           <td class="celltitlebg" width="468" colspan="6">
           <input id="other" type="checkbox" disabled name="other" <?php if (is_array($allr_legends) && (in_array("O", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">O</span>ther
           <input type="text" disabled class="defaultfont" name="other1" size="60" id="other1" value="<?php echo $other_allergens; ?>">
           </td>
         </tr>
         
      </table>
      	    <br>&nbsp;<br>&nbsp;
            
   
            
            <table align="center" border="0" width="468">
	         <tr> <td width="460" align="center" valign="middle" class="background">

                
                  </td>
         	    </tr>
				</table>
                  <br>
  <p class="style19"><strong>Copyright Policy:</strong></p>
            <p><em>Recipes are shared for your <strong>personal use only</strong>. </em>
            <p>You are welcome to enjoy these recipes, but please don't reprint, 
              electronically reproduce, repost or redistribute recipes elsewhere without <a class="style30" href="email.php?to=info;" onClick="MM_openBrWindow('email.php?to=info','','width=500,height=500');return false">obtaining 
                permission</a>. 
              For more information, see our <a href="http://www.kidswithfoodallergies.org/tos.html">terms of 
                service</a>. 
            <p><em>Copyright &copy; 2005-2008, Kids With Food Allergies, Inc. All rights reserved.</em>	</p>
				  
        <table> <tr><td class="style1"><div align="center"><div style="width:500px" align="left"><b>Disclaimer</b><br>
1) These recipes have been donated by our members and have not been tested in a test kitchen, therefore we can't guarantee the results. <br>2) Safety of ingredients is important. As we all know the same product manufactured in different plants at different parts of the country may not contain the same ingredients. <br>3) For the &quot;free of&quot; categorization, you should not make any assumptions as to the safety of an ingredient that is included in any of these recipes. It will be up to you to do your own research to make sure that each ingredient in these recipes is indeed safe for your child's unique allergy issues.<br> 4) Use of the database indicates the user's agreement with our terms of service.</div></div></td></tr></table>

        
	 </td></tr></table>
      </div>
          <!-- End of the code. Do not mess with the page beyond this point -->
<!--</td>
</tr>
</table>-->


</td></tr></table>

  <table width="750" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
      <td>	
      <p align="center" class="style24">Page last updated 2/24/2008</p></td></tr>

<tr><td>
<?php 
  require("footer.html");
?>

</td></tr></table>



  


</body>
</html>
