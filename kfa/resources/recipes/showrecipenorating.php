<?php
session_start();
if($_SESSION[isAdmin] == true){
    $usertype = 'admin';
}
else{
  $usertype = 'user';
}

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
   <title>Display Recipe - Safe Eats Recipe Database</title>
</head>


<script language = "JavaScript">

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

  }
  function postComment()
  {
    var id = document.showrcpform.recipe_id.value;
    var subject = document.showrcpform.recipe_name.value;
    postwindow=window.open("http://kidswithfoodallergies.org/eve/ubb.x?a=dl&f=5260079562&s=2400067262&x_id="+id+"&x_subject="+subject+"&x_link=http://kidswithfoodallergies.org/recipes/showrecipe.php?id="+id,  "", "toolbar=yes,resizable=yes,scrollbars=yes,width=600,height=800");
 	  if (window.focus) {postwindow.focus();}
  }
</script>


<body>
<?php
  require("topbanner.html");
?>

<table class="background" cellpadding="0" cellspacing="0" border="0" align="center">
   <tr>
      <td valign= "top" width="*">
         <?require("leftnavigation.html"); ?>
      </td>
      <td align="left" valign="top">
   
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
		      RECIPE.SUBST_NOTES, RECIPE.APPROVED FROM TBL_RECIPE AS RECIPE
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
              $allr_array = array();
            ?>

            <form name="showrcpform" method="POST" action="">
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
                  <table border="0" align="center" cellpadding="1" cellspacing="2" ID="ingredients" width="468">
                     <tr>
                     <td class="title" align="center" width="468">
                        <?php echo $db_name; ?>
                        <input name="recipe_id" type="hidden" value="<?php echo $in_recipe_id; ?>">
                        <input name="recipe_name" type="hidden" value="<?php echo urlencode($db_name);?>">
                     </td>
                     </tr>
                  </table>
                  <table align="center" border="0" cellpadding="1" cellspacing="2" width="468">
                     <tr>
                        <td class="recipedetaillink">
                           <a href='javascript:postComment();'>have a question about this recipe</a>
                        </td>
                        <td class="recipedetaillink" align="right">
                           <a href='javascript:popWindow(<?php echo $in_recipe_id; ?>);'>printer friendly version</a>
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
       		   </td>
            </tr>
	      </table>

    		<br>&nbsp;<br>&nbsp;
            	   <table align="center" border="0" cellpadding="1" cellspacing="2" ID="ingredients" width="468">
	        	      <tr>
                     <td class="header" width="106">&nbsp;Ingredients&nbsp;&nbsp;</td>
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
	        	    <tr>
                    		<td class="header" width="106">&nbsp;Instructions&nbsp;&nbsp;</td>
                	    </tr>
                	    <tr class="cellbg">
                    		<td width="468" class="resultspacing"><?php if($db_instructions) {echo $db_instructions;} ?></td>
                	    </tr>
            		</table>
        	    <br>&nbsp;<br>&nbsp;
            		<table align="center" border="0" cellpadding="1" cellspacing="2" ID="comments" width="468">
	        	    <tr>
                    		<td class="header" width="106">&nbsp;Comments&nbsp;&nbsp;</td>
                	    </tr>
                	    <tr class="cellbg">
                    	 	<td width="468" class="resultspacing"><?php if($db_submitter_comments) {echo $db_submitter_comments;} ?></td>
                	    </tr>
            		</table>
        	    <br>&nbsp;<br>&nbsp;
            		<table align="center" border="0" cellpadding="1" cellspacing="2" ID="substitutions" width="468">
	        	          <tr>
                    		<td class="header" width="106">&nbsp;Substitutions&nbsp;&nbsp;</td>
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
            <table align="center" border="0" cellpadding="1" cellspacing="2" ID="freeOf" width="468">
	        	  <tr>
                <td width="460" align="center" valign="center" class="background">

                    <?php
                    if ($usertype == 'admin'){
                      echo "&nbsp;<button name=\"editbutton\" type=\"submit\" value=\"edit\" onClick=\"selectAction(1,".$in_recipe_id.")\">Edit</button>&nbsp;";
                      if ($db_approved == 'N'){
                        echo "&nbsp;<button name=\"approverecipe\" type=\"submit\" value=\"approve\" onClick=\"selectAction(2,".$in_recipe_id.")\">Approve</button>&nbsp;";
                      }
                      echo "&nbsp;<button name=\"deletebutton\" type=\"submit\" value=\"delete\" onClick=\"selectAction(3,".$in_recipe_id.")\">Delete</button>&nbsp;";
                      echo "<input name=list[] type=hidden value=\"".$in_recipe_id."\">";
                    }
                    ?>
                  </form>
                </td>
         	    </tr>
         		</table>
          </td>
    		</tr>
	    </table>
        </td>
    </tr>
          <!-- End of the code. Do not mess with the page beyond this point -->
          </td>
    </tr>
</table>
<center>
  <table width="750" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>	<!-- #BeginEditable "date" -->
      <p align="center" class="style24">Page last updated 3/26/2007</p>
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
      <td><span class="style1"><b>Disclaimer</b><br>
1) These recipes have been donated by our members and have not been tested in a test kitchen, therefore we can't guarantee the results. <br>2) Safety of ingredients is important. As we all know the same product manufactured in different plants at different parts of the country may not contain the same ingredients. <br>3) For the &quot;free of&quot; categorization, you should not make any assumptions as to the safety of an ingredient that is included in any of these recipes. It will be up to you to do your own research to make sure that each ingredient in these recipes is indeed safe for your child's unique allergy issues.<br> 4) Use of the database indicates the user's agreement with our terms of service.
	</span>

<p align="center" class="style24"><br>
  <a href="http://kidswithfoodallergies.org/privacy.html">Privacy
            Policy</a> and <a href="http://kidswithfoodallergies.org/tos">Terms
            of Service</a>   <br>  Copyright (c) 2005-2006, Kids With Food Allergies, Inc.
          All Rights Reserved.</p>

<p align="center" class="style24">


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
