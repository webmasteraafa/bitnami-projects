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
 $title = "Managing Food Allergies | Babysitters, Parties and More";
 $keywords = "food allergy, food allergies, food allergy resources, no peanuts poster, peanut allergy, peanut allergy sign, peanut-free, managing food allergies, kids with food allergies, kissing, allergic reaction, food allergic child, parties, organization tips, restaurant";
 $description = "How to keep your child safe when you eat out at restaurants, attend parties and more.  These tips will help you manage food allergies at home and beyond.";
  }
 if ($pagetopic == 'research') {
 $title = "Food Allergy Research and Clinical Trials";
 $keywords = "food allergy, food allergies, food allergy research, clinical trials, peanut allergy research, milk allergy research, egg allergy research, treatment for food allergies";
 $description = "Research studies and clinical trials in the United States involving food allergies.";
 }
 if ($pagetopic == 'travel') {
 $title = "Food Allergies: Travel, Vacations and Camps";
 $keywords = "food allergy, food allergies, vacation, allergy-friendly vacation, traveling with food allergies, camping with food allergies, summer camps, cruises";
 $description = "Information for safe travel including camping, road trips or cruises.";
 }
  if ($pagetopic == 'rising-stars') {
 $title = "Rising Stars: Real Stories of Kids with Food Allergies";
 $keywords = "food allergy, food allergies, kids with food allergies, real life stories, living with food allergies, coping with food allergies";
 $description = "Real life stories of extraordinary children who happen to have food allergies.";
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
			if ($pagetopic == 'managing_allergies') $smalldescrip = "How to keep your child safe when you  eat out at restaurants, attend parties and more.  These tips will help you manage food allergies at home and beyond.";
			if ($pagetopic == 'research') $theimage = "researchnp.jpg";
			if ($pagetopic == 'research') $smalldescrip = "Find research studies and clinical trials involving food allergies near you.  Studies range from quality of life assessments to clinical drug trials.<br><br>";
				if ($pagetopic == 'rising-stars') $theimage = "rising-stars.jpg";
			if ($pagetopic == 'rising-stars') $smalldescrip = "Real life stories of extraordinary children who just happen to have food allergies. These inspirational stories help show that our children can do anything and are not hampered by their food allergies.<br><br>";
			if ($pagetopic == 'travel') $theimage = "travel.jpg";
			if ($pagetopic == 'travel') $smalldescrip = "Planning a vacation? A night out camping? Sending your child to summer camp? Whatever your travel plans might entail, don’t depart until you’re armed with knowledge that will keep your food-allergic child safe.  Follow these tips to ensure a safe—and fun—travel experience.<br><br>";

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
<?php
include ("header-resources.php");
?>

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
      <p align="center" class="style24">Page last updated 09/23/2011</p>
      <!-- #EndEditable --></div>


<?php
include ("footer-resources.php");
?>





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
