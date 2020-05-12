         <?php
             $in_recipe_id =1489;
              
                       
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/recipesfeatured.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Free Allergy Recipes: Chocolate Chip Cookie Dough Truffles</title>
<meta name="keywords" content="cookie truffle, cookie dough recipe, truffle recipe, allergy free recipe, peanut free, dairy free recipes, dairy free, food allergies, food allergy, POFAK, kids with food allergies, egg free, wheat free, nut free, food allergy recipes, chocolate chip, cookie dough, truffle" />
<meta name="description" content="Chocoloate Chip Cookie Dough Truffles: a milk and nut free dessert recipe. Allergy-free recipe database filled with hundreds of recipes that are allergy-friendly.  Free featured recipes offer allergy-free desserts, main dishes and more." />
<?
if ($db_picture2 != '') echo "<meta name='zoomimage' content='http://www.kidswithfoodallergies.org/zoomimg/".$db_picture2."'>";
?>
<!-- InstanceEndEditable -->
<link href="http://www.kidswithfoodallergies.org/js/main.css" rel="stylesheet" type="text/css" />
<link href="http://www.kidswithfoodallergies.org/js/images.css" rel="stylesheet" type="text/css" />
<link href="http://www.kidswithfoodallergies.org/js/forms.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="favicon.ico" />
<meta name="copyright" content="Copyright (c) 2005-2009, Kids With Food Allergies, Inc. All Rights Reserved." />
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="classification" content="Nonprofit organization" />
<link rel="alternate" type="application/rss+xml"
	title="Kids With Food Allergies" href="http://feeds.feedburner.com/kidswithfoodallergies" />
<script type="text/javascript" language="javascript" src="js/menu.js"></script>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0  
	window.open(theURL,winName,features);
  return false;
}//-->
</script>
</head>
<body>
<div align="center">
<table border="0" align="center">
<tr><td align="center">
<!-- page center -->
 	<table width="750"  border="0" cellpadding="0" cellspacing="0"><!-- top table -->
      <tr>
      <td width="163" rowspan="2" valign="bottom">
      <a href="http://www.kidswithfoodallergies.org"><img src="http://www.kidswithfoodallergies.org/siteimages/logof.gif" width="163" height="135" alt="Kids With Food Allergies" /></a></td>
      
      <td><div id="welcome1"></div></td>
 	</tr>
 	<tr><td colspan="4" valign="bottom">
        
		 <table cellpadding="0" cellspacing="0" class="one" width="100%"><!-- menu table1 -->
  			<tr bgcolor="#3F679B">
  			<td height="12" bgcolor="#3F679B">
  			<div align="right">
			<a href="index.html" class="WhiteMenuText">&nbsp;home</a>&nbsp;&nbsp;&nbsp;</div></td></tr>
  
  	<tr><!-- menu --><td  valign="middle">
 		<table width="100%" class="one" cellspacing="0" cellpadding="0"><!-- menu table -->
  		<tr class="one">
         <td width="22%" class="one">
        <a href="whatsnew.html" class="PurpleMenuText" title="Announcements, Publications, and Press Releases">what's new</a>        </td>
         <td width="17%" class="one">
        <a href="recipes.html" class="GrayMenuText"
         title="Dairy free recipes, egg free recipes, nut free recipes, peanut free recipes, wheat free recipes">recipes</a>         </td>
        <td width="19%" class="one">
        <a href="resourcesnew.php" title="Food allergy articles, research, and resources" class="PinkMenuText">resources</a>        </td>
        <td width="23%" class="one">
     <a href="faalerts.php" class="OrangeMenuText" title="Food allergy recalls for undeclared food allergens">allergy alerts</a>        </td>
        <td width="19%" class="one"><a href="food_allergy_social_network.html" class="GreenMenuText">find friends</a></td></tr></table>
        <!-- end top row menu start 2nd row -->
         
        <table width="100%" class="one" cellspacing="0" cellpadding="0">
          <tr class="one">
       <td width="16%" class="one"><a href="donate.html" class="PinkMenuText">donate</a></td>
          <td width="18%" class="one">
          <a href="shopping.html" title="Food allergy t-shirts, allergy cookbooks, allergy books" class="OrangeMenuText">
         shop KFA</a></td>
         <td width="37%" class="one">
         <a href="marketplace.html" title="Find makers of allergen free foods, peanut allergy posters, allergy products"
          class="GreenMenuText">allergy buyer's guide</a></td>
          <td width="29%" class="one">
       <a href="community.html" class="GrayMenuText" title="Register as a member or log in to our food allergy message boards">
       support forums</a></td></tr></table><!-- ends second row menu --></td></tr></table><!-- end menu table1 -->
        </td></tr>
 		 <tr><!--3rd row menu -->
		<td width="163" align="center" class="style29">
 				<script type="text/javascript">showDate();</script> </td>
               
    	<td colspan="5" align="right"><!-- 3rd row td -->
          	&nbsp;<a href="memberships.html" class="GrayMenuText" 
	title="Become a member of Kids With Food Allergies and the Parents of Food Allergic Kids (POFAK) online allergy support group">
     membership</a> &nbsp;&nbsp;<a href="site_map.html" class="PurpleMenuText">site map </a>&nbsp; &nbsp;
     <a href="contactus.html" class="PinkMenuText">contact us</a>&nbsp;&nbsp; 
     <a href="about.html" class="GreenMenuText">about</a>&nbsp;&nbsp;&nbsp; </td><!-- end 3rd row td -->
  	</tr><!-- end 3rd row menu -->
  	</table><!-- end top table -->


</td></tr>
<tr><td align="center">
	<div class="FormContain">
	<div id="Form">
	<div class="Form1" align="left">


	<form method="get" action="http://www.kidswithfoodallergies.org/search.php" class="zoom_searchform" />
	<input type="text" name="zoom_query" size="20" value="" class="zoom_searchbox" />
	<input type="submit" value="Search KFA Site" class="stylewhite" style="background:#3F679B none; color:#FFFFFF;" />
	<input type="hidden" name="zoom_per_page" value="10" />
	<input type="hidden" name="zoom_and" value="0" />
	<input type="hidden" name="zoom_sort" value="0" />
	</form>
 		<br />
	</div>
	<div class="Form2" align="right">
<form method="post" action="http://www.kidswithfoodallergies.org/newsletter_sign-up.php">
	<input type="text" name="Email" size="15" class="style16" maxlength="120" value="your email" />
	<input class="stylewhite" type="submit" value="Subscribe to Newsletter" style="background:#CC3300" /><br />
    <div align="right"><a href="newsletter_sign-up.html" class="formlink" title="Kids With Food Allergies e-news is a free e-newsletter containing news and hot discussion topics about food allergies, allergy free recipes and safe food ideas for children with food allergies">more info</a></div>

	</form>
</div><!--endform2-->

</div><!-- ends div form-->


</div><!--ends formcontain-->
</td></tr>

<!--</table><table border="0" align="center">-->
<tr><td align="center">
<div align="center"><img src="http://www.kidswithfoodallergies.org/siteimages/indexillustrator_07.gif" width="750" height="3" alt="" /></div>

<div class="mainbox3" align="center"><!-- 2 columns box -->   
<table style="padding:0px; margin:0px; border:none"><tr valign="top"><td>
<div class="leftbox2"><!-- Left column -->
<div class="ltblueleftbox">sponsored by</div>            
<div class="ltgreybox186">
     <!-- START 175x175 AdPeeps.com Code --> 
<div align="center"> 
<script type="text/javascript" src="http://www.kidswithfoodallergies.org/adpeeps/adpeeps.php?bfunction=showad&amp;uid=100000&amp;bmode=off&amp;gpos=center&amp;bzone=recipes_sponsor&amp;bsize=175x175&amp;btype=3&amp;bpos=default&amp;ver=2.0&amp;btotal=1&amp;btarget=_blank&amp;bborder=0&amp;gspacing=1"> 
</script> 
<noscript> 
<a href="http://www.kidswithfoodallergies.org/adpeeps/adpeeps.php?bfunction=go&amp;uid=100000&amp;bmode=off&amp;bzone=recipes_sponsor&amp;bsize=175x175&amp;btype=1&amp;bpos=default&amp;ver=2.0" target="_blank">
<img src="http://www.kidswithfoodallergies.org/adpeeps/adpeeps.php?bfunction=showad&amp;uid=100000&amp;bmode=off&amp;bzone=recipes_sponsor&amp;bsize=175x175&amp;btype=1&amp;bpos=default&amp;ver=2.0" width="175" height="175" alt="Click Here!" title="Click Here!" border="0" /></a>
</noscript> 
</div> 
<!-- END AdPeeps.com Code -->  

</div>
<br />



<div class="ltblueleftbox">recipes</div>            
<div class="ltgreybox186">
      
         
        <a href="http://www.kidswithfoodallergies.org/recipes.html" class="style27"><br />
        Recipes Home</a><br />
<br />

					   <a href="http://www.kidswithfoodallergies.org/featured_recipes.html" class="style27">Free Featured Recipes</a><br />
<br />

						<a href="http://www.kidswithfoodallergies.org/recipes/introduction.php" class="style27" title="I am already a Family Member and want to login">Recipes Login</a>&nbsp;<img src="../siteimages/check.gif" width="8" height="8" border="0" alt="" align="absmiddle" /><br />
<br />

					<a href="http://www.kidswithfoodallergies.org/recipesloginerror.html" target="_blank" class="style27" onclick="MM_openBrWindow('../recipesloginerror.html','','scrollbars=yes,width=400,height=200');return false">Login Problems?</a>&nbsp;<img src="../siteimages/highlight.gif" border="0" align="absmiddle" alt="" /><br />
<br />

                     <a href="https://www.kidswithfoodallergies.org/membership_purchase.html" class="style27" target="_blank" title="I want to sign-up as a Family Member">Become a Family Member</a><br />
<br />

<br />

					
</div>                                
       <br /> 


	  <!-- InstanceBeginEditable name="under menu" -->
	  
<!-- InstanceEndEditable --></div><!--endsleftcolumn--></td>
 <td valign="top" width="538" colspan="1">    
<div class="maintextrightR">     
<div class="blueheaderbox"> <h1><!-- InstanceBeginEditable name="title" -->Featured Allergy-Free Recipe: Chocolate Chip Cookie Dough Truffle<!-- InstanceEndEditable --></h1>
</div>
<div class="ltgreyboxmainR">
<div class="right"><script type="text/javascript" src="http://w.sharethis.com/button/sharethis.js#publisher=d1cb1749-92cb-45bf-b8fe-7146fdb014fb&amp;type=website&amp;popup=true&amp;style=rotate"></script></div>
			<!-- #BeginEditable "text" -->

      <table align="center" cellpadding="2" cellspacing="10">
            <tr>
	            <td>
                  <table border="0" align="center" cellpadding="1" cellspacing="2" id="ingredients" >
                     <tr>
                     <td class="title" align="center">
                       <b>Allergy-Free Dessert Recipe:</b> <?php echo "<b>$db_name </b>"?>
                        <input name="recipe_id" type="hidden" value="<?php echo $in_recipe_id; ?>">
                        <input name="recipe_name" type="hidden" value="<?php echo urlencode($db_name);?>">                     </td>
                     </tr>
                  </table>
                  <table align="center" border="0" cellpadding="1" cellspacing="2">
                     <tr>
                        <td class="recipedetaillink">                        </td>
                     </tr>
                  </table>
                  <table align="center" border="0" cellpadding="1" cellspacing="2" id="information" >
                        <tr>
                           <td class="header" width="460"><b>Recipe Information</b>&nbsp;&nbsp;</td>
                        </tr>
                        <tr class="cellbg">
                           <td class="resultspacing"><?php if($db_category) {echo 'Category: '.$db_category.'<br>';} ?>
				    <?php if($db_servings) {echo '# of Servings: '.$db_servings.'<br>';} ?>
			   
				    <?php if($db_source) {echo 'Recipe Created By: '.$db_source.'<br>';} ?></td><td width="60" valign="top"></td>
                	    </tr>
       		   </td>
            </tr>
	      </table>

    		<tr>
		    <td>
            	   <table align="center" border="0" cellpadding="1" cellspacing="2" id="ingredients" >
	        	      <tr>
                     <td class="header" width="460"><li><b>Ingredients&nbsp;&nbsp;</b></li></td>
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
            		</table>        	    </td>
    		</tr>

    		<tr>
		    <td>
            		<table align="center" border="0" cellpadding="1" cellspacing="2" id="instructions" >
	        	    <tr>
                    		<td class="header" width="460"><li><b>Instructions</b></li></td>
                	    </tr>
                	    <tr class="cellbg">
                    		<td class="resultspacing"><?php if($db_instructions) {echo $db_instructions;} ?></td>
                	    </tr>
            		</table>        	    </td>
    		</tr>

		<tr>
		    <td>
            		<table align="center" border="0" cellpadding="1" cellspacing="2" id="comments" >
	        	    <tr>
                    		<td class="header" width="460"><li><b>Comments&nbsp;&nbsp;</b></li></td>
                	    </tr>
                	    <tr class="cellbg">
                    	 	<td class="resultspacing"><?php if($db_picture) {echo "<img src=\"http://www.kidswithfoodallergies.org/ironchef/".$db_picture."\" alt=\"".$db_picalt."\"  border=\"0\" class=\"right\" />";}
							if($db_submitter_comments) {echo $db_submitter_comments;} ?></td>
                	    </tr>
            		</table>        	    </td>
    		</tr>

    		<tr>
		    <td>
            		<table align="center" border="0" cellpadding="1" cellspacing="2" id="substitutions" >
	        	          <tr>
                    		<td class="header" width="460"><li><b>Substitutions&nbsp;&nbsp;</b></li></ul></td>
                	    </tr>
                	    <tr class="cellbg">
                    		<td class="resultspacing"><?php if($db_subst_notes) {echo $db_subst_notes;} ?></td>
                	    </tr>
            		</table>        	    </td>
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
         <table id="tblAllergenInfo" cellspacing="2" cellpadding="1" align="center" border="0">
         <tr>
            <?php echo "<td class=\"header\" colSpan=\"6\" >&nbsp;This recipe is free of:</td>"?>         </tr>
         <tr>
            <td class="celltitlebg" width="78">
            <input id="milkfree" type="checkbox" disabled="disabled" name="milkfree" <?php if (is_array($allr_legends) && (in_array("M", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">M</span>ilk</td>
            <td class="celltitlebg" width="78">
            <input id="peanutfree" type="checkbox"  disabled="disabled" name="peanutfree" <?php if (is_array($allr_legends) && (in_array("P", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">P</span>eanut</td>
            <td class="celltitlebg" width="78">
            <input id="eggfree" type="checkbox"  disabled="disabled" name="eggfree" <?php if (is_array($allr_legends) && (in_array("E", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">E</span>gg</td>
            <td class="celltitlebg" width="78">
            <input id="soyfree" type="checkbox" disabled="disabled" name="soyfree" <?php if (is_array($allr_legends) && (in_array("S", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">S</span>oy</td>
            <td class="celltitlebg" width="78">
            <input id="nutfree" type="checkbox"  disabled="disabled" name="nutfree" <?php if (is_array($allr_legends) && (in_array("T", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">T</span>ree nut</td>
            <td class="celltitlebg" width="78">
            <input id="cornfree" type="checkbox"  disabled="disabled"  name="cornfree" <?php if (is_array($allr_legends) && (in_array("C", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">C</span>orn</td>
         </tr>
         <tr>


            <td class="celltitlebg" width="78">
            <input id="glutenfree" type="checkbox"  disabled="disabled"  name="glutenfree" <?php if (is_array($allr_legends) && (in_array("G", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">G</span>luten</td>
            <td class="celltitlebg" width="78">
            <input id="wheatfree" type="checkbox" disabled="disabled" name="wheatfree" <?php if (is_array($allr_legends) && (in_array("W", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">W</span>heat</td>
            <td class="celltitlebg" width="78">
            <input id="fishfree" type="checkbox" disabled="disabled" name="fishfree" <?php if (is_array($allr_legends) && (in_array("F", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">F</span>ish</td>
            <td class="celltitlebg" width="78">
            <input id="shellfishfree" type="checkbox" disabled="disabled" name="shellfishfree" <?php if (is_array($allr_legends) && (in_array("Sh", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">Sh</span>ellfish</td>
            <td class="celltitlebg" width="78">
            <input id="sesamefree" type="checkbox" disabled="disabled" name="sesamefree" <?php if (is_array($allr_legends) && (in_array("Ses", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">Ses</span>ame</td>
            <td class="celltitlebg" width="78">&nbsp;            </td>
         </tr>
         <tr>
           <td class="celltitlebg" colspan="6">
           <input id="other" type="checkbox"  disabled="disabled"  name="other" <?php if (is_array($allr_legends) && (in_array("O", $allr_legends))) echo "checked";?>>&nbsp;<span class="allergenKey">O</span>ther
           <input type="text"  disabled="disabled"  class="defaultfont" name="other1" size="60" id="other1" value="<?php echo $other_allergens; ?>">           </td>
         </tr>
      </table> <p>&nbsp;</p></td></tr></table>
            <!-- #EndEditable -->
            <p><strong>Copyright Policy:</strong></p>
          
<p><em>Recipes are shared for your <strong>personal use only</strong>.</em>
<p>You are welcome to enjoy these recipes, but please don't reprint, 
              electronically reproduce, repost or redistribute recipes elsewhere without <a class="style30" href="email.php?to=info;" onclick="MM_openBrWindow('email.php?to=info','','width=500,height=500');return false">obtaining 
                permission</a>. For more information, see our <a href="http://www.kidswithfoodallergies.org/tos.html" target="_blank">terms of 
                  service</a>. 
            <p><em>Copyright &copy; 2005-2011, Kids With Food Allergies Foundation. All rights reserved.</em></em></div>
</div><!--endsmaincolumn-->
</td></tr></table>
</div><!--endsmainbox-->
</td>
</tr>
<!--</table><table align="center" border="0">-->
<tr><td>
  <div align="center" class="style24">

      <p>Page last updated 09/10/2011</p>
    </div>
<div class="mainbox2" align="center">
<div class="blueinsidebox">
  	<span class="style61"> We improve the day-to-day lives of families raising children with food allergies<br />
  	and empower them to create a safe and healthy future for their children.</span></div>
<br />
<div align="center">
    
 <a 
    href="memberships.html" class="style24" rel="self">Memberships</a> <a 
    href="community.html" class="style24" rel="self">Support Forums</a> <a 
    href="recipes.html" class="style24" rel="self">Allergy-Free Recipes</a> <a 
    href="resourcesnew.php" class="style24" rel="self">Allergy Education Resources</a> <a 
    href="food_allergy_social_network.html" class="style24" rel="self">Friends Connection</a> <br /><a 
    href="faalerts.php" class="style24" rel="self">Food Allergy Alerts</a>
    <a href="donate.html" class="style24" rel="self">Donate</a>  <a href="shopping.html" class="style24" rel="self">Shop KFA</a> <a 
    href="marketplace.html" class="style24" rel="self">Allergy Buyer's Guide</a> <a 
    href="community.html" class="style24" rel="self"></a>  <a 
    href="contactus.html" class="style24" rel="self">Contact Us</a>  <a href="presskit.html" class="style24" rel="self">Press | Media</a>
 
  
      <p class="style24"><a href="privacy.html" class="style24">Privacy Policy</a> and <a href="tos.html" class="style24">Terms of Service</a><br />
              Copyright (c) 2005-2011, Kids With Food Allergies Foundation.  All Rights Reserved.
              <br />
         <em>Kids With Food Allergies is a tax exempt charity.</em></p>
</div>
<!-- ends center on bottom links-->
</div><!-- end mainbox2-->
<!-- ends bottom center -->
</td></tr></table>
</div>

<!-- InstanceBeginEditable name="Google Analytics" --><script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ?
"https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost +
"google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>

<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-216208-1");
pageTracker._initData();
pageTracker._trackPageview("/ChocoChipCookieTruffle");
</script><!-- InstanceEndEditable -->

</body>
<!-- InstanceEnd --></html>
