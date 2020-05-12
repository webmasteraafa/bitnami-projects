<?php
 session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/resourcesmainmem.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<?php
//These control the meta tags
if ($pagetopic == 'allergy-friendly'){
 $title = "New Allergy Friendly Foods";
 $keywords = "allergy free, allergy friendly, allergy foods, allergy free foods, kids with food allergies, allergy-friendly foods for kids,  food allergies, food allergy, POFAK, KFA, milk-free, egg-free, nut-free, peanut-free";
 $description = "KFA releases these special reports twice a year to reveal new allergy-free foods coming out for food allergic consumers.  Find new milk-free, peanut-free, soy-free, egg-free, wheat-free, nut-free (and more) products.";
 }
if ($pagetopic == 'basics') {
 $title = "Basic Information for Food Allergy";
 $keywords = "food allergies, food allergy, allergy prevention, diet, food allergy facts, food allergy statistics, risks of food allergies, signs and symptoms of an allergic reaction, life-threatening, severe food allergies, rise in food allergies, asthma, eczea, atopic disorders, pediatric allergist";
 $description = "Everything you need to keep your food-allergic child safe is right here! Learn how to: help prevent food allergies, ask your pediatric allergist the right questions, keep allergies under control, reduce your child's food-allergy risks and more! KFA provides the latest statistics and facts about food allergies.";
 }
if ($pagetopic == 'food-allergens') {
 $title = "Common Food Allergens | Hidden Names";
 $keywords = "peanut allergy, food allergens, nut avoidance, milk avoidance, milk allergy, egg allergy, hidden names for tree nuts, wheat allergy, wheat names, egg names, hidden names for soy, soy allergy, sesame allergy, kids with food allergies, labels";
 $description = "Hidden names for food allergens including milk, soy, wheat, tree nuts, peanuts; and sesame allergy facts.";
 }
if ($pagetopic == 'diagnosis-testing') {
 $title = "Testing and Diagnosis for Food Allergy";
 $keywords = "food allergy, food allergies, diagnosis, testing, allergy tests, diagnose food allergies, alternative food allergy test, RAST, CAP-RAST, allergy blood tests, kids with food allergies";
 $description = "Unfortunately there is no quick and easy test to diagnose food allergies. But there are many tests available that claim to do just that.  Find out which allergy tests are more reliable and which tests should be avoided.";
 }
if ($pagetopic == 'emotional_social') {
 $title = "Emotional and Social Issues Concerning Food Allergic Kids";
 $keywords = "food allergy, food allergies, anxiety, diagnosis of food allergy, emotional issues, social issues, stress, how to cope, kids with food allergies, KFA, food allergy resources";
 $description = "Parents and children often become anxious upon receiving a diagnosis of food allergy.  Learn about the emotional and social issues that face a family with food allergies and how to cope with the stress.";
 }
if ($pagetopic == 'food-cooking') {
 $title = "Food and Cooking Resources | Allergy-Free";
 $keywords = "peanut allergy, dairy free recipes, dairy free, food allergies, food allergy, POFAK, wheat free recipes, egg free recipes, wheat free, nut free, peanut free, milk free recipes, food allergy recipes, milk allergy, egg allergy";
 $description = "Ingredient substitutions, safe food preparation strategies, menu planning and food allergy cooking basics are provided to help you cope with food allergies and how to prepare safe meals. ";
 }
if ($pagetopic == 'pfood-safety-labeling') {
 $title = "Food Allergies | Product Safety and Labeling";
 $keywords = "food allergies, food allergy, food allergens, unsafe ingredients, label reading, labeling, labels, product safety, cosmetics, ingredients, cross contamination, nondairy, FALCPA, food allergen labeling, allergy safe food,  Kosher labeling, milk allergy, pet food allergy, reporting allergic reaction, allergenic foods, Kosher for Passover";
 $description = "Food allergens aren't constrained to common foods. Household creams, cosmetics, shampoos (even pet food) can contain unsafe ingredients. By learning to properly read labels (and teaching your food-allergic child to do the same) you will minimize your child's risk of an allergic reaction.";
 }
if ($pagetopic == 'gastrointestinal-disorders') {
 $title = "Food Allergy Related Gastrointestinal Disorders";
 $keywords = "food allergies, food allergy, gastrointestinal disorders, eosinophilic esophagitis, food protein induced enterocolitis syndrome, FPIES, EE, eosinophils, g-tubes, reaction, kids with food allergies, KFA ";
 $description = "KFA explains food allergy-related gastrointestinal disorders in plain English for parents.";
 }
if ($pagetopic == 'holidays') {
 $title = "Celebrating Holidays with Food Allergic Children";
 $keywords = "food allergies, food allergy, holidays, celebrating holidays, food allergic children, celebrating holidays with food allergies, allergy restricted diet, Valentine's Day, Christmas, Easter, Thanksgiving, Halloween, Passover, Chanukah, allergy safe activities, allergy free recipes, egg allergy, Easter egg decorating, allergy friendly treats, parties at school, breastfeeding a food allergic child ";
 $description = "Just because holidays typically incorporate food doesn't mean your food-allergic child should shy away from celebrating. Here, KFA supplies you with the information needed to keep your children safe during holiday celebrations throughout the year.";
 }
if ($pagetopic == 'medication-pharmacy') {
  $title = "Food Allergy | Medications and Vaccinations";
 $keywords = "food allergy, food allergies, medication, vaccination, inactive ingredients, allergens, vaccines, inhalers, asthma inhalers ingredients, vaccine ingredients, sublingual immunotherapy, treat food allergies, vaccine safety, ingredients, food allergens, kids with food allergies";
 $description = "Inactive versus active, generic or brand-name; there's a lot to consider before giving your food-allergic child medicine. Find the answers to your concerns - as well as what ingredients (food allergens) are hiding in your child's vaccines and inhalers.";
 }
if ($pagetopic == 'school-preschool') {
 $title = "Food Allergic Kids | School Resources";
 $keywords = "food allergy, food allergies, school, preschool, college, kids with food allergies, Section 504 Plan, managing food allergies, school health plans, food allergic child, food allergens in school, school planning, food allergic students  ";
 $description = "From creating a Section 504 plan to communicating early on with teachers and school nurses, planning is essential. KFA provides you with the resources your child needs to guarantee a successful (and safe) school year for your food allergic child.";
 }
if ($pagetopic == 'shopping') {
 $title = "Grocery Shopping for Food Allergies";
 $keywords = "food allergy, food allergies, shopping, food allergic child, grocery shopping, cross contamination, allergenic foods,  how to read labels, kids with food allergies, child with food allergies";
 $description = "Grocery shopping for a child with food allergies doesn't have to be stressful - as long as you go prepared. These articles will provide you with smart shopping strategies to keep your experience at the grocery store stress-free and safe!";
 }
if ($pagetopic == 'support_group') {
 $title = "Food Allergy | Support Groups";
 $keywords = "food allergy, food allergies, support group, support groups, support group leader, food allergy support group, forum, advocacy, local support groups, kids with food allergies, food allergy resources, start a support group";
 $description = "Find a local food allergy support group near you, or learn how to start a support group with help from Kids With Food Allergies.  Support Group Leaders are offered a special forum to discuss outreach, events and advocacy.";
 }
if ($pagetopic == 'managing_allergies') {
 $title = "Managing Food Allergies | Travel, Parties and More";
 $keywords = "food allergy, food allergies, food allergy resources, travel, travel with food allergies, camping with food allergies, no peanuts poster, peanut allergy, peanut allergy sign, peanut-free, managing food allergies, kids with food allergies, kissing, allergic reaction, food allergic child, parties, organization tips, restaurant";
 $description = "How to keep your child safe when you travel, eat out at restaurants, attend parties and more.  These tips will help you manage food allergies at home and beyond.";
  }
 if ($pagetopic == 'research') {
 $title = "Food Allergy Research and Clinical Trials";
 $keywords = "food allergy, food allergies, food allergy research, clinical trials, peanut allergy research, milk allergy research, egg allergy research, treatment for food allergies";
 $description = "Research studies and clinical trials in the United States involving food allergies.";
 }

 ?>
<title><?php echo $title;?></title>
<meta name="keywords" content="<?php echo $keywords;?>" />
<meta name="description" content="<?php echo $description;?>" />
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW" />

<?php
include ("config.php");
include ("common.php");
$pagetopic = $_REQUEST['topic'];
//These statements control the image on the page
			if ($pagetopic == 'allergy-friendly') $theimage = "food-reportsnp.jpg";
			if ($pagetopic == 'allergy-friendly') $smalldescrip = "KFA releases these special reports twice a year to reveal new allergy-free foods coming out for food allergic consumers.  Find new milk-free, peanut-free, soy-free, egg-free, wheat-free, nut-free (and more) products.";
			if ($pagetopic == 'allergy-friendly-new') $theimage = "food-allergensnp.jpg";
			if ($pagetopic == 'allergy-friendly-new') $smalldescrip = "New allergy-free foods to watch out for.";
			if ($pagetopic == 'basics') $theimage = "basicsnp.jpg";
			if ($pagetopic == 'basics') $smalldescrip = "Everything you need to keep your food-allergic child safe is right here! Learn how to: help prevent food allergies, ask your pediatric allergist the right questions, keep allergies under control, reduce your child's food-allergy risks and more! KFA provides the latest statistics and facts about food allergies";
			if ($pagetopic == 'food-allergens') $theimage = "food-allergensnp.jpg";
			if ($pagetopic == 'food-allergens') $smalldescrip = "Allergens may be lurking in labels under unfamiliar names. Would you know to search for &ldquo;Lysozyme&rdquo; if your child is allergic to eggs? Or &ldquo;Arachis&rdquo; if your child is allergic to peanuts? Refer to KFA's avoidance lists when shopping for your food-allergic child. Remember: a product's ingredient list can change without warning, so read all labels carefully before consumption, even if it has been eaten safely in the past.";
			if ($pagetopic == 'diagnosis-testing') $theimage = "testingnp.jpg";
			if ($pagetopic == 'diagnosis-testing') $smalldescrip = "Unfortunately there is no quick and easy test to diagnose food allergies. But there are many tests available that claim to do just that.  Find out which allergy tests are more reliable and which tests should be avoided.";
			if ($pagetopic == 'emotional_social') $theimage = "socialissuesnp.jpg";
			if ($pagetopic == 'emotional_social') $smalldescrip = "Children can often become anxious upon learning they have food allergies. As their parent, you can help them handle their emotions &#8212; once you get a grip on yours! Read up on how to nurture a stable child.";
			if ($pagetopic == 'food-cooking') $theimage = "food-cookingnp.jpg";
			if ($pagetopic == 'food-cooking') $smalldescrip = "Want to make home-cooked meals for your food-allergic family, but don't know where to begin? Look no further! Read KFA's tips and tricks to gain confidence in your kitchen and create mouth-watering cuisine that's safe for the whole family.";
			if ($pagetopic == 'pfood-safety-labeling') $theimage = "labelingnp.jpg";
			if ($pagetopic == 'pfood-safety-labeling') $smalldescrip = "Food allergens aren't constrained to common foods. Household creams, cosmetics, shampoos &#8212; even pet food &#8212; can contain unsafe ingredients. By learning to properly read labels &#8212; and teaching your food-allergic child to do the same &#8212; you will minimize your child's risk of an allergic reaction.";
			if ($pagetopic == 'gastrointestinal-disorders') $theimage = "gastro-disordersnp.jpg";
			if ($pagetopic == 'gastrointestinal-disorders') $smalldescrip = "Whether your child's tummy problems are unexplainable or identifiable, you've come to the right place. Normally an &lsquo;indigestible&rsquo; topic, KFA explains food allergy-related gastrointestinal disorders in plain English &#8212; for parents like you!";
			if ($pagetopic == 'holidays') $theimage = "holidaysnp.jpg";
			if ($pagetopic == 'holidays') $smalldescrip = "Just because holidays typically incorporate food doesn't mean your food-allergic child should shy away from celebrating. Here, KFA supplies you with the information needed to keep your children safe from allergic reactions during holiday celebrations throughout the year.";
			if ($pagetopic == 'medication-pharmacy') $theimage = "medicationnp.jpg";
			if ($pagetopic == 'medication-pharmacy') $smalldescrip = "Inactive versus active, generic or brand-name &#8212; there's a lot to consider before giving your food-allergic child medicine. Find the answers to your concerns &#8212; as well as what ingredients are hiding in your child's vaccines and inhalers &#8212; with KFA's comprehensive lists.";
			if ($pagetopic == 'school-preschool') $theimage = "preschoolnp.jpg";
			if ($pagetopic == 'school-preschool') $smalldescrip = "No matter if it's daycare or college, sending your child off to school is tough for any parent &#8212; especially those with food-allergic children. From creating a Section 504 Plan to communicating early on with teachers and school nurses, planning is essential. KFA provides you with the resources your child needs to guarantee a successful (and safe) school year.";
			if ($pagetopic == 'shopping') $theimage = "shoppingnp.jpg";
			if ($pagetopic == 'shopping') $smalldescrip = "Grocery shopping for a child with food allergies doesn't have to be stressful &#8212; as long as you go prepared. These articles will provide you with smart shopping strategies to keep your experience at the grocery store stress-free and safe!";
			if ($pagetopic == 'support_group') $theimage = "supportgroupnp.jpg";
			if ($pagetopic == 'support_group') $smalldescrip = "Glean knowledge and emotional support from a support group of other parents facing similar challenges. Find a local food allergy support group near you, or learn how to start a support group with help from Kids With Food Allergies.  Support Group Leaders are offered a special forum to discuss outreach, events and advocacy.";
			if ($pagetopic == 'managing_allergies') $theimage = "managing-allergiesnp.jpg";
			if ($pagetopic == 'managing_allergies') $smalldescrip = "How to keep your child safe when you travel, eat out at restaurants, attend parties and more.  These tips will help you manage food allergies at home and beyond.";
			if ($pagetopic == 'research') $theimage = "researchnp.jpg";
			if ($pagetopic == 'research') $smalldescrip = "Find research studies and clinical trials involving food allergies near you.  Studies range from quality of life assessments to clinical drug trials.<br><br>";

?>  
<!-- InstanceEndEditable -->
<meta name="copyright" content="Copyright (c) 2005-2010, Kids With Food Allergies, Inc. All Rights Reserved." />
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="classification" content="Nonprofit organization" />
<link rel="alternate" type="application/rss+xml"
	title="Kids With Food Allergies" href="http://feeds2.feedburner.com/kidswithfoodallergies" />

<link href="http://www.kidswithfoodallergies.org/js/main.css" rel="stylesheet" type="text/css" />
<link href="http://www.kidswithfoodallergies.org/js/images.css" rel="stylesheet" type="text/css" />
<link href="http://www.kidswithfoodallergies.org/js/forms.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="..favicon.ico" />
<script type="text/javascript" language="javascript" src="http://www.kidswithfoodallergies.org/js/menu.js"></script>
</head>
<body>
<div align="center">
<table border="0" align="center">
<tr><td align="center">
<!-- page center -->
 	<table width="750"  border="0" cellpadding="0" cellspacing="0"><!-- top table -->
      <tr>
      <td width="163" rowspan="2" valign="bottom" class="logoborder">
      <a href="http://www.kidswithfoodallergies.org"><img src="http://www.kidswithfoodallergies.org/siteimages/logof.gif" width="163" height="135" alt="Kids With Food Allergies" border="0" /></a></td>
      
      <td><div id="welcome1"></div></td>
 	</tr>
 	<tr><td colspan="4" valign="bottom">
        
		 <table cellpadding="0" cellspacing="0" class="one" width="100%"><!-- menu table1 -->
  			<tr bgcolor="#3F679B">
  			<td height="12" bgcolor="#3F679B">
  			<div align="right">
			<a href="http://www.kidswithfoodallergies.org/index.html" class="WhiteMenuText">&nbsp;home</a>&nbsp;&nbsp;&nbsp;</div></td></tr>
  
  	<tr><!-- menu --><td  valign="middle">
 		<table width="100%" class="one" cellspacing="0" cellpadding="0"><!-- menu table -->
  		<tr class="one">
         <td width="22%" class="one">
        <a href="http://www.kidswithfoodallergies.org/whatsnew.html" class="PurpleMenuText" title="Announcements, Publications, and Press Releases">what's new</a>        </td>
         <td width="17%" class="one">
        <a href="http://www.kidswithfoodallergies.org/recipes.html" class="GrayMenuText"
        >recipes</a>         </td>
        <td width="19%" class="one">
        <a href="http://www.kidswithfoodallergies.org/resourcesnew.php" title="Food allergy articles, research, and resources" class="PinkMenuText">resources</a>        </td>
        <td width="23%" class="one">
     <a href="http://www.kidswithfoodallergies.org/faalerts.php" class="OrangeMenuText" title="Food allergy recalls for undeclared food allergens">allergy alerts</a>        </td>
        <td width="19%" class="one"><a href="http://www.kidswithfoodallergies.org/food_allergy_social_network.html" class="GreenMenuText">find friends</a></td></tr></table>
    
         
        <table width="100%" class="one" cellspacing="0" cellpadding="0">
          <tr class="one">
       <td width="16%" class="one"><a href="http://www.kidswithfoodallergies.org/donate.html" class="PinkMenuText">donate</a></td>
          <td width="18%" class="one">
          <a href="http://www.kidswithfoodallergies.org/shopping.html" title="Food allergy t-shirts, allergy cookbooks, allergy books" class="OrangeMenuText">
         shop KFA</a></td>
         <td width="37%" class="one">
         <a href="http://www.kidswithfoodallergies.org/marketplace.html" title="Find makers of allergen free foods, peanut allergy posters, allergy products"
          class="GreenMenuText">allergy buyer's guide</a></td>
          <td width="29%" class="one">
       <a href="http://www.kidswithfoodallergies.org/community.html" class="GrayMenuText" title="Register as a member or log in to our food allergy message boards">
       support forums</a></td></tr></table><!-- ends second row menu --></td></tr></table><!-- end menu table1 -->
        </td></tr>
 		 <tr><!--3rd row menu -->
		<td width="163" align="center" class="style29">
 				<script type="text/javascript">showDate();</script> </td>
               
    	<td colspan="5" align="right"><!-- 3rd row td -->
          	&nbsp;<a href="http://www.kidswithfoodallergies.org/memberships.html" class="GrayMenuText" 
	title="Become a member of Kids With Food Allergies and the Parents of Food Allergic Kids (POFAK) online allergy support group">
     membership</a> &nbsp;&nbsp;<a href="http://www.kidswithfoodallergies.org/site_map.html" class="PurpleMenuText">site map </a>&nbsp; &nbsp;
     <a href="http://www.kidswithfoodallergies.org/contactus.html" class="PinkMenuText">contact us</a>&nbsp;&nbsp; 
     <a href="http://www.kidswithfoodallergies.org/about.html" class="GreenMenuText">about</a>&nbsp;&nbsp;&nbsp; </td><!-- end 3rd row td -->
  	</tr><!-- end 3rd row menu -->
  	</table><!-- end top table -->


</td></tr>
<tr><td align="center">
	<table width="750" cellpadding="1" style="margin-bottom:10px"><tr><td align="left" valign="top">
<form method="get" action="http://www.kidswithfoodallergies.org/search.php" class="zoom_searchform">
	<input type="text" name="zoom_query" size="20" value="" class="zoom_searchbox" />
	<input type="submit" value="Search KFA Site" class="stylewhite" style="background:#3F679B none; color:#FFFFFF;" />
	<input type="hidden" name="zoom_per_page" value="10" />
	<input type="hidden" name="zoom_and" value="0" />
	<input type="hidden" name="zoom_sort" value="0" />
	</form>
 	
</td><td align="right" valign="top">

<form method="post" action="http://www.kidswithfoodallergies.org/newsletter_sign-up.php">
	<input type="text" name="Email" size="15" class="style16" maxlength="120" value="your email" />
	<input class="stylewhite" type="submit" value="Subscribe to Newsletter" style="background:#CC3300" /><br />
    <div align="right"><a href="http://www.kidswithfoodallergies.org/newsletter_sign-up.html" class="formlink">more info</a></div>
	</form>
</td></tr></table>
</td></tr>

<!--</table><table border="0" align="center">-->
<tr><td align="center">
<div align="center"><img src="http://www.kidswithfoodallergies.org/siteimages/indexillustrator_07.gif" width="750" height="3" alt="" /></div>

<div class="mainbox3" align="center"><!-- 2 columns box -->   
<table style="padding:0px; margin:0px; border:none"><tr valign="top"><td>
<div class="leftbox2"><!-- Left column -->
<div class="pinkleftbox">resources</div>            
<div class="ltgreybox186">
      
         
        <a href="http://www.kidswithfoodallergies.org/resources/resourcesnew.php" class="style27">Family Member Login</a> <img src="http://www.kidswithfoodallergies.org/siteimages/check.gif" />
     <br />
<br />
<a href="http://www.kidswithfoodallergies.org/resourcesnew.php" class="style27">Resources Home</a>
     <br />
     <br />
     <br />
<span class="style24">KFA Publications</span><br />
&nbsp;&nbsp;&nbsp;<a href="http://www.kidswithfoodallergies.org/resourcetopic.php?topic=supportnet" class="style27" title="Support Net &reg; magazine">Support Net &reg;</a><br />
 &nbsp;&nbsp;&nbsp;<a href="http://www.kidswithfoodallergies.org/newsletter.html" class="style27" title="Old Issues of KFA eNews">KFA eNews Archive</a><br />
 &nbsp;&nbsp;&nbsp;<a href="http://www.kidswithfoodallergies.org/sendcard" class="style27" title="Allergy Awareness Message e-Cards">Send Free e-Cards</a><br />
<br />
<span class="style24"><br />
KFA Resources</span><br />
&nbsp;&nbsp;&nbsp;<a href="http://www.kidswithfoodallergies.org/resources/resourcetopic.php?topic=allergy-friendly" class="style27">Allergy-Friendly Food Reports</a><br />
 &nbsp;&nbsp;&nbsp;<a href="http://www.kidswithfoodallergies.org/resources/resourcetopic.php?topic=basics" class="style27">Food Allergy Basics</a><br />
 &nbsp;&nbsp;&nbsp;<a href="http://www.kidswithfoodallergies.org/resources/resourcetopic.php?topic=diagnosis-testing" class="style27">Diagnosis &amp; Testing</a><br />
  &nbsp;&nbsp;&nbsp;<a href="http://www.kidswithfoodallergies.org/resources/resourcetopic.php?topic=emotional_social" class="style27">Emotional &amp; Social Issues</a><br />
 &nbsp;&nbsp;&nbsp;<a href="http://www.kidswithfoodallergies.org/resources/resourcetopic.php?topic=food-allergens" class="style27">Food Allergens</a><br />
 &nbsp;&nbsp;&nbsp;<a href="http://www.kidswithfoodallergies.org/resources/resourcetopic.php?topic=food-cooking" class="style27">Food &amp; Cooking</a><br />
 &nbsp;&nbsp;&nbsp;<a href="http://www.kidswithfoodallergies.org/resources/resourcetopic.php?topic=gastrointestinal-disorders" class="style27">Gastrointestinal Disorders</a><br />
 &nbsp;&nbsp;&nbsp;<a href="http://www.kidswithfoodallergies.org/resources/resourcetopic.php?topic=holidays" class="style27">Holiday Celebrations</a><br />
 &nbsp;&nbsp;&nbsp;<a href="http://www.kidswithfoodallergies.org/resources/resourcetopic.php?topic=managing_allergies" class="style27">Managing Food Allergies</a><br />
 &nbsp;&nbsp;&nbsp;<a href="http://www.kidswithfoodallergies.org/resources/resourcetopic.php?topic=medication-pharmacy" class="style27">Medication &amp; Pharmacy</a><br />
 &nbsp;&nbsp;&nbsp;<a href="http://www.kidswithfoodallergies.org/resources/resourcetopic.php?topic=pfood-safety-labeling" class="style27">Product Safety &amp; Labeling</a><br />
  &nbsp;&nbsp;&nbsp;<a href="http://www.kidswithfoodallergies.org/resources/resourcetopic.php?topic=research" class="style27">Research &amp; Clinical Trials</a><br />
 &nbsp;&nbsp;&nbsp;<a href="http://www.kidswithfoodallergies.org/resources/resourcetopic.php?topic=school-preschool" class="style27">School &amp; Preschool</a><br />
 &nbsp;&nbsp;&nbsp;<a href="http://www.kidswithfoodallergies.org/resources/resourcetopic.php?topic=shopping" class="style27">Shopping</a><br />
 &nbsp;&nbsp;&nbsp;<a href="http://www.kidswithfoodallergies.org/resources/resourcetopic.php?topic=support_group" class="style27">Support Group</a><br />
<br />
          </div>                                
       <br /> 


	  <!-- InstanceBeginEditable name="under menu" --><!-- InstanceEndEditable --></div><!--endsleftcolumn--></td>
 <td valign="top" width="538" colspan="1">    
<div class="maintextrightR">     
<div class="blueheaderbox"> <h1><!-- InstanceBeginEditable name="title" -->
		Food Allergy Resources: <?php echo GetTopic($pagetopic); ?><!-- InstanceEndEditable --></h1>
</div>
<div class="ltgreyboxmainR">

			<!-- #BeginEditable "text" -->

<?php
	

	echo "<img src=\"http://www.kidswithfoodallergies.org/images/rec/".$theimage."\" alt=\"".$mytopic."\"  height=\"50\" align=\"left\"/><br /><h2>";
	echo GetTopic($pagetopic);
	echo "</h2>";
	echo "<br /></strong>".$smalldescrip."<br />";
	$sql = "select * from resources where topic='$pagetopic' and archive = 'no'order by preview, topic_sort, title";
	$result = mysql_query( $sql ) or die( mysql_error() );
	$show_premium = '1';
	$show_additional = '1';
	if ($pagetopic == 'support_group') echo "<h4><a border='0' href='http://www.kidswithfoodallergies.org/groups.php'>Support Group Searchable Database
</a></h4><div class='style24' style='padding-left:10px;'>Search for a local support group in your area, or add your local group to let others know about it.</div><br />";
		while( $row = mysql_fetch_array( $result ) )
		{
			$sdate = $row['sdate'];
			list($myyear, $mymonth) = split('[-]', $sdate);
			$myday = '01';
			$time_passed = intval((time()- mktime(0,0,0,$mymonth,$myday,$myyear))/86400);
			$title = stripslashes($row['title']);
			$title = preg_replace("/'/", "", $title);
			$title = preg_replace('/&quot;/', '', $title);
			$title = preg_replace('/\s+/', '_', $title);
			$urltitle = stripslashes($row['urltitle']);
			$urltitle = preg_replace("/'/", "", $urltitle);
			$urltitle = preg_replace('/&quot;/', '', $urltitle);
			$urltitle = preg_replace('/\s+/', '_', $urltitle);
			if ($row['preview'] == 'preview'){
			if (($show_additional == 1) && ($show_premium != '1')) echo "<br /><h2 style=\"text-align:left; margin-left:0px; font-size:12pt; font-weight:bold; color: #D856A0; font-family: Arial, Helvetica, sans-serif; line-height:1.1\">Free Featured Resources:</h2>
";
			if ($time_passed < 60){
			echo "<h4><a border='0' href='resourceshow.php?id=".$row['id']."&title=".$urltitle."'>". stripslashes($row['title'])."</a>&nbsp;<b><font color='#CC3300'>NEW!</font></b></h4><div class='style24' style='padding-left:10px;'>".stripslashes($row['intro'])."</div><br />";
			} else {
			echo "<h4><a border='0' href='resourceshow.php?id=".$row['id']."&title=".$urltitle."'>".stripslashes($row['title'])."</a></h4><div class='style24' style='padding-left:10px;'>".stripslashes($row['intro'])."</div><br />";
			}
			$show_additional = $show_additional + 1;
			}else {
			if ($show_premium == '1' ) echo "<br /><h2 style=\"text-align:left; margin-left:0px; font-size:12pt; font-weight:bold; color: #D856A0; font-family: Arial, Helvetica, sans-serif; line-height:1.1\">Premium Resources for Family Membership Subscribers:</h2>
";
			
			if ($time_passed < 60){
			echo "<h4><a href='resourceshow.php?id=".$row['id']."'>". stripslashes($row['title'])."</a> &nbsp;<img src=\"http://kidswithfoodallergies.org/infopop/eve/star.gif\" alt=\"New\" />&nbsp;<font color='#CC3300'>NEW!</font></h4><div class='style24' style='padding-left:10px;'>".stripslashes($row['intro'])."</div><br />";
			} else {
			echo "<h4><a href='resourceshow.php?id=".$row['id']."'>". stripslashes($row['title'])."</a> &nbsp;<img src=\"http://kidswithfoodallergies.org/infopop/eve/star.gif\" alt=\"New\" /></h4><div class='style24' style='padding-left:10px;'>".stripslashes($row['intro'])."</div><br />";
			}
			$show_premium = $show_premium + 1;
			}
			
		}
		
	
?>
			<!-- #EndEditable --></div>
</div><!--endsmaincolumn-->
</td></tr></table>
</div><!--endsmainbox-->
</td>
</tr>
<!--</table><table align="center" border="0">-->
<tr><td>
  <div align="center" class="style24">
<!-- #BeginEditable "date" -->
      <p align="center" class="style24">Page last updated 01/17/2010</p>
      <!-- #EndEditable --></div>
<div class="mainbox2" align="center">
<div class="blueinsidebox">
  	<span class="style61">KFA is a national nonprofit food allergy support group dedicated to fostering optimal health, 
    nutrition, <br />and well-being of children with food allergies by providing education and a caring<br /> 
                              support community for their families and caregivers.</span></div>
<br />
<div align="center">
    
 <a 
    href="http://www.kidswithfoodallergies.org/memberships.html" class="style24" rel="self">Memberships</a> <a 
    href="http://www.kidswithfoodallergies.org/community.html" class="style24" rel="self">Support Forums</a> <a 
    href="http://www.kidswithfoodallergies.org/recipes.html" class="style24" rel="self">Allergy-Free Recipes</a> <a 
    href="http://www.kidswithfoodallergies.org/resourcesnew.php" class="style24" rel="self">Allergy Education Resources</a><a 
    href="http://www.kidswithfoodallergies.org/food_allergy_social_network.html" class="style24" rel="self">Friends Connection</a> <br /><a 
    href="http://www.kidswithfoodallergies.org/faalerts.php" class="style24" rel="self">Food Allergy Alerts</a>
    <a href="http://www.kidswithfoodallergies.org/donate.html" class="style24" rel="self">Donate</a>  <a href="http://www.kidswithfoodallergies.org/shopping.html" class="style24" rel="self">Shop KFA</a> <a 
    href="http://www.kidswithfoodallergies.org/marketplace.html" class="style24" rel="self">Allergy Buyer's Guide</a> <a 
    href="http://www.kidswithfoodallergies.org/community.html" class="style24" rel="self"></a>  <a 
    href="http://www.kidswithfoodallergies.org/contactus.html" class="style24" rel="self">Contact Us</a>  <a href="http://www.kidswithfoodallergies.org/presskit.html" class="style24" rel="self">Press | Media</a>
 
  
      <p class="style24"><a href="http://www.kidswithfoodallergies.org/privacy.html" class="style24">Privacy Policy</a> and <a href="http://www.kidswithfoodallergies.org/tos.html" class="style24">Terms of Service</a><br />
              Copyright (c) 2005-2010, Kids With Food Allergies, Inc.  All Rights Reserved.
              <br />
         <em>Kids With Food Allergies is a tax exempt charity.</em></p>
</div>
<!-- ends center on bottom links-->
</div><!-- end mainbox2-->
<!-- ends bottom center -->
</td></tr></table>
</div>

<!-- InstanceBeginEditable name="Google Analytics" --><script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try{
var pageTracker = _gat._getTracker("UA-216208-1");
pageTracker._trackPageview("<?php echo $mytopic; ?>");
} catch(err) {}</script>

<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
