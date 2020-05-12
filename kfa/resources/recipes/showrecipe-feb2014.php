

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <?php
              $in_recipe_id = $_GET[id];
              
              if ($in_recipe_id == NULL){
                echo "Invalid recipe Id. Please try again.<br />";
                exit();
              }
              
              $db = mysql_connect("kidswithfoodallergies.org:3306", "kidswitror_rcp", "allergenfree");
              mysql_select_db("kidswitror_eve",$db);
              $sql = "SELECT RECIPE.NAME, RECIPE.CATEGORY,
                      RECIPE.SERVINGS, RECIPE.CONTRIBUTOR, RECIPE.SOURCE,
                      RECIPE.INSTRUCTIONS, RECIPE.SUBMITTER_COMMENTS,
		      RECIPE.SUBST_NOTES, RECIPE.APPROVED, RECIPE.picture, RECIPE.picture2, RECIPE.pic_alt FROM TBL_RECIPE AS RECIPE
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
			  $db_picture2 = mysql_result($result,0,"picture2");
			  $db_picalt = mysql_result($result,0,"pic_alt");
              $allr_array = array();
            ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <link rel="stylesheet" href="style.css" type="text/css" />

<meta name="keywords" content="allergy, recipes, allergy-free, allergy-friendly, kids with food allergies, recipe, substitutions" />
<meta name="description" content="Kids With Food Allergies offers the largest allergy-friendly recipe collection: search for recipes free of your allergens, browse by category, and get personal help with substitutions." />
<link href="http://www.kidswithfoodallergies.org/js/main.css" rel="stylesheet" type="text/css" />
<link href="http://www.kidswithfoodallergies.org/js/images.css" rel="stylesheet" type="text/css" />
<link href="http://www.kidswithfoodallergies.org/js/forms.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="http://www.kidswithfoodallergies.org/js/menu.js" type="text/javascript"></script>
   <title><?php echo $db_name; ?> Allergy-Friendly Recipe</title>


<script language="JavaScript1.1" type="text/javascript">
 	var debug = true; function 
right(e) 
	{ if (navigator.appName == 'Netscape' && (e.which == 3 || e.which 
== 2)) return false; else if (navigator.appName == 'Microsoft Internet Explorer' 
&& (event.button == 2 || event.button == 3)) 
{ alert('This Page is fully 
protected!'); return false; } return true; } document.onmousedown=right; if (document.layers) 
window.captureEvents(Event.MOUSEDOWN); window.onmousedown=right; </script>

<script language="JavaScript" type="application/javascript"> 
 var popup="Sorry, right-click 
is disabled .\n\nThis Site is Copyright 2014"; function noway(go) { if 
(document.all) { if (event.button == 2) { alert(popup); return false; } } if (document.layers) 
{ if (go.which == 3) { alert(popup); return false; } } } if (document.layers) 
{ document.captureEvents(Event.MOUSEDOWN); } document.onmousedown=noway;  
</script>
<script type="text/javascript">
function noDrag() { return false }
function stopDrag() {
  for (i=0;i<document.links.length;i++) document.links[i].onmousedown=noDrag;
}
</script>
<style type="text/css">
.protectedText
{
    -moz-user-focus: ignore;
    -moz-user-input: disabled;
    -moz-user-select: none;
}
</style>

   <!-- Print  -->           
           

<script language="JavaScript" type="text/javascript">

  var newwindow;
  var postwindow;
  function popWindow(recipe_id)
  {
	  newwindow=window.open("PrintRecipe.php?id="+recipe_id, "", "toolbar=no,resizable=no,scrollbars=yes,width=530,height=800");
	  if (window.focus) {newwindow.focus();}
  }




  
</script>
</head>

<body ondragstart="return false" onselectstart="return false" oncontextmenu="return false;" onbeforeprint="document.body.style.display='none'" onafterprint="document.body.style.display='';"  onload="stopDrag()">
<?php
  require("topbanner2014.html");
?>
   <div class="protectedText">
<table class="background" cellpadding="0" cellspacing="0" border="0" align="center" width="1000">
<tr>
<td valign="top" width="240">
         <?php
         require("leftnavigation2014.html"); ?>
</td><td width="20"></td>
<td align="left" valign="top" width="740">
 
              
 
            <div  style="background-color:#3F679B; padding:6px; color:#ffffff;" align="center"><h2 style="font-family:Cabin; font-size:16px; color:#ffffff;">Safe Eats &trade; Recipes (Allergy-Friendly, Search Free of Your Allergens)</h2>
            </div>
       <!--<table width="568" class="style19" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#E1E1E1">
        <tr valign="top" bgcolor="#CCCCCC" bordercolor="#FFFFFF" align="left">
        <td colspan="2" bgcolor="#FFFFFF">-->
         <div class="recipesgreyboxmain" style="color:#333333">
                <table border="0" align="center" cellpadding="1" cellspacing="2" id="ingredients" width="720">
                     <tr>
                     <td class="title" align="center">
                     <form name="showrcpform" method="POST" action="">
                     
                      <h1 style="font-family:Cabin; font-size:18px; color:#369">  <?php echo $db_name; ?></h1>
						
                        <input name="recipe_id" type="hidden" value="<?php echo $in_recipe_id; ?>">
                        <input name="recipe_name" type="hidden" value="<?php echo urlencode($db_name);?>">
                     </td>
                     </tr>
                                             
                     <tr>                       
                        <td class="recipedetaillink">
                           <a href="http://community.kidswithfoodallergies.org/createForumContent/forum/safe_eats_comments" class="left" target="_blank">have a question about this recipe</a>
                     <!--javascript:postComment();-->
                           <a class="right" href="javascript:popWindow(<?php echo $in_recipe_id; ?>);">printer-friendly version</a>
                        </td></tr>
                     
					
                     <tr><td align="center">
                    </form>
                    </td></tr>
                  </table>
                  
                 <table align="center" border="0" width="508">
	         <tr> <td width="460" align="center" valign="middle" class="background">
			 <?php
						echo "<br />";
				$rater_id=$in_recipe_id;
				$rater_item_name='Recipe '.$db_name;
				include("rating.php");
				echo "<br />";
				?>
                </td>
         	    </tr>
				</table>
                  
                  <table align="center" border="0" cellpadding="1" cellspacing="2" id="information" width="508">
                        <tr>
                        <td class="header" width="306">&nbsp;Recipe Information&nbsp;&nbsp;</td>
                        </tr>
                        <tr class="cellbg">
                           <td width="508" class="resultspacing"><?php if($db_category) {echo 'Category: '.$db_category.'<br />';} ?>
				    <?php if($db_servings) {echo '# of Servings: '.$db_servings.'<br />';} ?>
			            <?php if($db_contributor) {echo 'Recipe Entered By: '.$db_contributor.'<br />';} ?>
				    <?php if($db_source) {echo 'Recipe Created By: '.$db_source.'<br />';} ?></td>
                	    </tr>
       		       </table>

    		<br />&nbsp;<br />&nbsp;
            	  <table align="center" border="0" cellpadding="1" cellspacing="2" id="ingredients" width="508">
	        	      <tr><td class="header" width="106">&nbsp;Ingredients&nbsp;&nbsp;</td>
                  </tr>
                	 <tr class="cellbg">
                    <td width="460" class="resultspacing"><?php while($row = mysql_fetch_array($result2, MYSQL_NUM))
				{echo $row[0].'&nbsp;&nbsp;'.$row[1].'&nbsp;&nbsp;'.$row[2];
         if ($row[3] == 'Y'){
           echo ' <i>(optional)</i>';
         }
         echo '<br />';
        }
				mysql_free_result($result2);?></td>
                	    </tr>
            		</table>
        	   <br />&nbsp;<br />&nbsp;
            		
                 <table align="center" border="0" cellpadding="1" cellspacing="2" id="instructions" width="508">
	        	    <tr><td class="header" width="106">&nbsp;Instructions&nbsp;&nbsp;</td>
                	    </tr>
                	    <tr class="cellbg">
                    	<td width="508" class="resultspacing"><?php
																	if($db_instructions) {echo $db_instructions;} ?></td>
                	    </tr>
            		</table>
        	    <br />&nbsp;<br />&nbsp;
                
                
            	<table align="center" border="0" cellpadding="1" cellspacing="2" id="comments" width="508">
	        	    <tr><td class="header" width="106">&nbsp;Comments&nbsp;&nbsp;</td>
                	 </tr>
                	 <tr class="cellbg">
                    <td width="508" class="resultspacing"><?php 
					 if($db_picture) {echo "<img src=\"http://www.kidswithfoodallergies.org/ironchef/".$db_picture."\" alt=\"".$db_picalt."\"  border=\"0\" class=\"right\" />";}
										if($db_submitter_comments) {echo $db_submitter_comments;} ?></td>
                	    </tr>
            		</table>
        	    <br />&nbsp;<br />&nbsp;
                
                
            	<table align="center" border="0" cellpadding="1" cellspacing="2" id="substitutions" width="508">
	        	   <tr><td class="header" width="106">&nbsp;Substitutions&nbsp;&nbsp;</td>
                	    </tr>
                	<tr class="cellbg">
                    <td width="508" class="resultspacing"><?php if($db_subst_notes) {echo $db_subst_notes;} ?></td>
                	    </tr>
            		</table>
        	    <br />&nbsp;<br />&nbsp;
                

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

	       
         <table id="tblAllergenInfo" cellspacing="2" cellpadding="1" width="508" align="center" border="0">
         <tr>
            <?php echo "<td class=\"header\" colSpan=\"6\" width=\"508\">&nbsp;This recipe is free of:</td>"?>
         </tr>
         <tr>
            <td class="celltitlebg" width="78">
            <input id="milkfree" type="checkbox" disabled="disabled" name="milkfree" <?php if (is_array($allr_legends) && (in_array("M", $allr_legends))) echo "checked";?> />&nbsp;<span class="allergenKey">M</span>ilk</td>
            <td class="celltitlebg" width="78">
            <input id="peanutfree" type="checkbox" disabled="disabled" name="peanutfree" <?php if (is_array($allr_legends) && (in_array("P", $allr_legends))) echo "checked";?> />&nbsp;<span class="allergenKey">P</span>eanut</td>
            <td class="celltitlebg" width="78">
            <input id="eggfree" type="checkbox" disabled="disabled" name="eggfree" <?php if (is_array($allr_legends) && (in_array("E", $allr_legends))) echo "checked";?> />&nbsp;<span class="allergenKey">E</span>gg</td>
            <td class="celltitlebg" width="78">
            <input id="soyfree" type="checkbox" disabled="disabled" name="soyfree" <?php if (is_array($allr_legends) && (in_array("S", $allr_legends))) echo "checked";?> />&nbsp;<span class="allergenKey">S</span>oy</td>
            <td class="celltitlebg" width="88">
            <input id="nutfree" type="checkbox" disabled="disabled" name="nutfree" <?php if (is_array($allr_legends) && (in_array("T", $allr_legends))) echo "checked";?> />&nbsp;<span class="allergenKey">T</span>ree nut</td>
            <td class="celltitlebg" width="68">
            <input id="cornfree" type="checkbox" disabled="disabled" name="cornfree" <?php if (is_array($allr_legends) && (in_array("C", $allr_legends))) echo "checked";?> />&nbsp;<span class="allergenKey">C</span>orn</td>
         </tr>
         <tr>
            <td class="celltitlebg" width="78">
            <input id="glutenfree" type="checkbox" disabled="disabled" name="glutenfree" <?php if (is_array($allr_legends) && (in_array("G", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">G</span>luten</td>
            <td class="celltitlebg" width="78">
            <input id="wheatfree" type="checkbox" disabled="disabled" name="wheatfree" <?php if (is_array($allr_legends) && (in_array("W", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">W</span>heat</td>
            <td class="celltitlebg" width="78">
            <input id="fishfree" type="checkbox" disabled="disabled" name="fishfree" <?php if (is_array($allr_legends) && (in_array("F", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">F</span>ish</td>
            <td class="celltitlebg" width="78">
            <input id="shellfishfree" type="checkbox" disabled="disabled" name="shellfishfree" <?php if (is_array($allr_legends) && (in_array("Sh", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">Sh</span>ellfish</td>
            <td class="celltitlebg" width="88">
            <input id="sesamefree" type="checkbox" disabled="disabled" name="sesamefree" <?php if (is_array($allr_legends) && (in_array("Ses", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">Ses</span>ame</td>
            <td class="celltitlebg" width="68">&nbsp;
            
            </td>
         </tr>

         <tr>
           <td class="celltitlebg" width="508" colspan="6">
           <input id="other" type="checkbox" disabled="disabled" name="other" <?php if (is_array($allr_legends) && (in_array("O", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">O</span>ther
           <input type="text" disabled="disabled" class="defaultfont" name="other1" size="60" id="other1" value="<?php echo $other_allergens; ?>">
           </td>
         </tr>
         
      </table>
      	    <br />&nbsp;<br />&nbsp;
            
   
            
     <table align="center" border="0" cellpadding="1" cellspacing="2" id="substitutions" width="508">
	        	   <tr><td class="header" width="106">&nbsp;Brought to you by:&nbsp;&nbsp;</td>
                	    </tr>
                	<tr class="cellbg">
                    <td width="508" class="resultspacing">Kids With Food Allergies (KFA) is a 501(c)3 nonprofit organization that is a division of the Asthma and Allergy Foundation of America. At KFA, we are dedicated to helping all families keep their children safe and healthy. Our supporters give us the funding to provide education and support to families in need. The services and programs we offer, including our recipes, are available thanks to the support of our donors and members. We thank you for supporting KFA.  Together, we will continue to reach more families in need of lifesaving information. If KFA has helped you in some way, <a href="https://secure.kidswithfoodallergies.org/np/clients/kidswfa/donation.jsp?campaign=30">please make a donation to support our work</a>. </td>
                	    </tr>
            		</table>
        	    <br />&nbsp;<br />
                  <br />
   <h2> Recipe Help</h2>
                         If you have any questions or comments about any of the recipes in Safe Eats&trade;, <a href="http://community.kidswithfoodallergies.org/createForumContent/forum/safe_eats_comments">start a discussion topic</a>. This will lead you to discuss the recipe with our Food &amp; Cooking Support Team and other fellow members on our <a href="http://community.kidswithfoodallergies.org/category/food-and-cooking-support">Food &amp; Cooking Support Forums</a>.  They can help you alter a recipe to make it allergy-free for your child's needs. Registration is free!<br /> <br /> <br />
                        <b>Some notes of caution:</b>
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
		</ol> <br /><br /><p><b>Copyright Policy: Copyright &copy; 2005-2014, Kids With Food Allergies. All rights reserved.</b></p>
            <p><em>Recipes are shared for your <strong>personal use only</strong>. </em>
            <p>You are welcome to enjoy these recipes and share links to our recipes, but please don't reprint, 
              electronically reproduce, repost or redistribute recipes elsewhere without <a href="http://www.kidswithfoodallergies.org/email.php?to=info;" onclick="MM_openBrWindow('email.php?to=info','','width=500,height=500');return false">obtaining 
                permission</a>. 
              For more information, see our <a href="http://www.kidswithfoodallergies.org/tos.html">terms of 
                service</a>. <br />
                </em>	
            <p>&nbsp;</p>

</div>
</div>
        
	</td></tr></table>
      
          <!-- End of the code. Do not mess with the page beyond this point -->
<!--</td>
</tr>
</table>-->



  <table width="750" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
      <td>	
      <p align="center" class="style24">Page last updated 02/15/2014</p></td></tr>

<tr><td>
<?php 
  require("footer2014.html");
?>

</td></tr></table></div>


<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try{
var pageTracker = _gat._getTracker("UA-216208-1");
pageTracker._trackPageview();
} catch(err) {}</script>


</body>
</html>
