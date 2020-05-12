<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta name="keywords" content="food allergies, milk allergy , egg allergy, peanuts allergy, nut, latex, corn, soy allergy">
<meta name="description" content="Kids with food allergies information and support">
<meta name="keywords" content="kids with food allergies, children with food allergies, food allergies, milk allergy, egg allergy, soy allergy, peanut allergy, allergy support, allergy group, latex allergy, food allergy dictionary, allergy chat, allergy newsletter">
<meta name="description" content="Home for families with food allergic kids. A place where you will find a lot of information and support regarding allergies">
<link href="http://www.kidswithfoodallergies.org/js/main.css" rel="stylesheet" type="text/css">
<script language="javascript" src="http://www.kidswithfoodallergies.org/js/menu.js"></script>
<script language="javascript" src="http://www.kidswithfoodallergies.org/js/sidemenu.js"></script>
   <link rel="stylesheet" href="recipes/style.css" type="text/css" />
   <title>Display Recipe</title>
</head>

<script language = "JavaScript">
  function selectAction(option, id){
    if (option == 1){
      document.showrcpform.action="editrecipe.php?id="+id;
    }
    if (option == 2){
      document.showrcpform.action="SearchResultHandling.php?button=approve";
    }
    if (option == 3){
      document.showrcpform.action="SearchResultHandling.php?button=delete";
    }
    
  }
</script>

<body width="550">
   <?php
             $in_recipe_id = 45;
              
              
              /* mysql_select_db("pofak",$db); */
              
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
		      INGREDIENT.NAME, CONTAINS.OPTIONAL FROM TBL_CONTAINS
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
<table class="background" cellpadding="0" cellspacing="0" border="0" align="center">
       <tr>
    
         <td align="left" valign="top"><img src="logo/KFA_Fnd_logo_BW_wURL200.png" alt="Kids With Food Allergies Foundation" width="200"></td>
         <td  valign="middle" class="titleprint" align="center" width="260">
                   <?php echo $db_name; ?>
                 </td>
       </tr>
       <tr>
           
           <td colspan="2" align="left" valign="top">
          <!-- Start pasting your code right here !!! -->
          
          

         

            <table align="center" cellpadding="2" cellspacing="10" class="style19">
                <tr>
	            <td>
             <table align="center" border="0" cellpadding="1" cellspacing="2" ID="ingredients" width="468">
            
               <tr>
                 <td class="normal" align="right" width="468">
                    <a href='javascript:window.print()'>
                     click to print
                    </a>
                 </td>
               </tr>
               
             </table>
                        <table align="center" border="0" cellpadding="1" cellspacing="2" ID="information" width="468">
                            <tr>
                                <td class="headerprint" width="306">&nbsp;Recipe Information&nbsp;&nbsp;</td>
                            </tr>
                            <tr class="cellbgprint">
                                <td width="460"><?php if($db_category) {echo 'Category: '.$db_category.'<br>';} ?>
				    <?php if($db_servings) {echo '# of Servings: '.$db_servings.'<br>';} ?>
			            <?php if($db_contributor) {echo 'Contributor: '.$db_contributor.'<br>';} ?>
				    <?php if($db_source) {echo 'Source: '.$db_source.'<br>';} ?></td>
                	    </tr>
       		    </td>
         		</tr>
	    		</table>



    		<tr>
		    <td>
            		<table align="center" border="0" cellpadding="1" cellspacing="2" ID="ingredients" width="468">
	        	    <tr>
                    		<td class="headerprint" width="106">&nbsp;Ingredients&nbsp;&nbsp;</td>
               	      </tr>
                	    <tr class="cellbgprint">
                    		<td width="460"><?php while($row = mysql_fetch_array($result2, MYSQL_NUM))
				{echo $row[0].'&nbsp;&nbsp;'.$row[1].'&nbsp;&nbsp;'.$row[2];
         if ($row[3] == 'Y'){
           echo ' <i>(optional)</i>';
         }
         echo '<br>';
        }
				mysql_free_result($result2);?></td>
                	    </tr>
            		</table>
       	      </td>
    		</tr>

    		<tr>
		    <td>
            		<table align="center" border="0" cellpadding="1" cellspacing="2" ID="instructions" width="468">
	        	    <tr>
                    		<td class="headerprint" width="106">&nbsp;Instructions&nbsp;&nbsp;</td>
               	      </tr>
                	    <tr class="cellbgprint">
                    		<td width="460"><?php if($db_instructions) {echo $db_instructions;} ?></td>
                	    </tr>
            		</table>
       	      </td>
    		</tr>

		<tr>
		    <td>
            		<table align="center" border="0" cellpadding="1" cellspacing="2" ID="comments" width="468">
	        	    <tr>
                    		<td class="headerprint" width="106">&nbsp;Comments&nbsp;&nbsp;</td>
               	      </tr>
                	    <tr class="cellbgprint">
                    	 	<td width="460"><?php if($db_submitter_comments) {echo $db_submitter_comments;} ?></td>
                	    </tr>
            		</table>
   	      </td>
    		</tr>

    		<tr>
		    <td>
            		<table align="center" border="0" cellpadding="1" cellspacing="2" ID="substitutions" width="468">
	        	    <tr>
                    		<td class="headerprint" width="106">&nbsp;Substitutions&nbsp;&nbsp;</td>
               	      </tr>
                	    <tr class="cellbgprint">
                    		<td width="460"><?php if($db_subst_notes) {echo $db_subst_notes;} ?></td>
                	    </tr>
            		</table>
       	      </td>
    		</tr>

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

	       <tr>
		     <td>
         <table id="tblAllergenInfo" cellSpacing="2" cellPadding="1" width="468" align="center" border="0">
         <tr>
            <?php echo "<td class=\"headerprint\" colSpan=\"6\" width=\"468\">&nbsp;This recipe is free of:</td>"?>
         </tr>
         <tr>
            <td class="celltitlebgprint" width="78">
            <input id="milkfree" type="checkbox" disabled name="milkfree" <?php if (is_array($allr_legends) && (in_array("M", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">M</span>ilk</td>
            <td class="celltitlebgprint" width="78">
            <input id="peanutfree" type="checkbox" disabled name="peanutfree" <?php if (is_array($allr_legends) && (in_array("P", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">P</span>eanut</td>
            <td class="celltitlebgprint" width="78">
            <input id="eggfree" type="checkbox" disabled name="eggfree" <?php if (is_array($allr_legends) && (in_array("E", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">E</span>gg</td>
            <td class="celltitlebgprint" width="78">
            <input id="soyfree" type="checkbox" disabled name="soyfree" <?php if (is_array($allr_legends) && (in_array("S", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">S</span>oy</td>
            <td class="celltitlebgprint" width="78">
            <input id="nutfree" type="checkbox" disabled name="nutfree" <?php if (is_array($allr_legends) && (in_array("T", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">T</span>ree nut</td>
            <td class="celltitlebgprint" width="78">
            <input id="cornfree" type="checkbox" disabled name="cornfree" <?php if (is_array($allr_legends) && (in_array("C", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">C</span>orn</td>
         </tr>
         <tr>
            <td class="celltitlebgprint" width="78">
            <input id="glutenfree" type="checkbox" disabled name="glutenfree" <?php if (is_array($allr_legends) && (in_array("G", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">G</span>luten</td>
            <td class="celltitlebgprint" width="78">
            <input id="wheatfree" type="checkbox" disabled name="wheatfree" <?php if (is_array($allr_legends) && (in_array("W", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">W</span>heat</td>
            <td class="celltitlebgprint" width="78">
            <input id="fishfree" type="checkbox" disabled name="fishfree" <?php if (is_array($allr_legends) && (in_array("F", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">F</span>ish</td>
            <td class="celltitlebgprint" width="78">
            <input id="shellfishfree" type="checkbox" disabled name="shellfishfree" <?php if (is_array($allr_legends) && (in_array("Sh", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">Sh</span>ellfish</td>
            <td class="celltitlebgprint" width="78">
            <input id="sesamefree" type="checkbox" disabled name="sesamefree" <?php if (is_array($allr_legends) && (in_array("Ses", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">Ses</span>ame</td>
            <td class="celltitlebgprint" width="78">&nbsp;
            
            </td>
         </tr>
         <tr>
           <td class="celltitlebgprint" width="468" colspan="6">
           <input id="other" type="checkbox" disabled name="other" <?php if (is_array($allr_legends) && (in_array("O", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">O</span>ther
           <input type="text" disabled class="defaultfont" name="other1" size="60" id="other1" value="<?php echo $other_allergens; ?>">

           </td>
         </tr>
	<tr>
	<td width="468" colspan="6">
	  <p class="style1"><b>Disclaimer</b><br>
	      1) These recipes have been donated by our members and have not been tested in a test kitchen, therefore we can't guarantee the results. 2) Safety of ingredients is important. As we all know the same product manufactured in different plants at different parts of the country may not contain the same ingredients. 3) For the &quot;free of&quot; categorization, you should not make any assumptions as to the safety of an ingredient that is included in any of these recipes. It will be up to you to do your own research to make sure that each ingredient in these recipes is indeed safe for your child's unique allergy issues. 4) Use of the database indicates the user's agreement with our terms of service. </p>
	  <p align="left" class="celltitlebgprint">        <strong>Copyright Policy: </strong> </p>
	  <p class="defaultfont">Recipes are shared for your personal use only.</p>
	  <p class="defaultfont">You are welcome to enjoy these recipes, but please don't reprint, electronically reproduce, repost or redistribute recipes elsewhere without <a href="http://www.kidswithfoodallergies.org/email.php?to=info;" class="resultlinkodd">obtaining permission</a>. For more information, see our <a href="http://www.kidswithfoodallergies.org/tos.html" class="resultlinkodd">terms of service </a>. </p>	  <p class="defaultfont">Copyright &copy; 2005-2013, Kids With Food Allergies Foundation. All rights reserved. </p>
	  <p align="left" class="style1">&nbsp; </p></td>
	</tr>         


         
      </table>

      	    </td>
    		</tr>
        <tr>
		      <td align="right" class="normalprint">
          <a href="javascript:self.close()">close this page</a>
          </td>
    		</tr>
	    </table>
        </td>
    </tr>
          <!-- End of the code. Do not mess with the page beyond this point -->
          </td>
    </tr>
</table>
</body>
</html>
