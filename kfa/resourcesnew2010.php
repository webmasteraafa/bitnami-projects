<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/resourcesmain.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Food Allergy Resources | Kids With Food Allergies</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="food allergies, food allergy, allergy avoidance, allergy posters, food allergy information, diagnosis, testing, allergist, POFAK, RAST, CAP-RAST, allergen-free foods, eosinophilic esophagitis, holidays, no peanuts, allergic reaction, milk protein, nondairy, school, children, support group, peanut allergy, wheat free recipes, egg free recipes, wheat free, nut free, peanut free, milk free recipes, food allergy recipes, milk allergy, egg allergy" />
<meta name="description" content="Kids With Food Allergies provides allergy information and parent resources, such as food allergy articles, allergen avoidance lists, a monthly newsletter and a quarterly publication for families raising children with food allergies." />

<meta name="revisit-after" content="7 days" /> 
<?php
include ("config.php");
include ("common.php");

?>
<link href="js/balloons.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
<meta name="copyright" content="Copyright (c) 2005-2009, Kids With Food Allergies, Inc. All Rights Reserved." />
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="classification" content="Nonprofit organization" />
<link rel="alternate" type="application/rss+xml"
	title="Kids With Food Allergies" href="http://feeds2.feedburner.com/kidswithfoodallergies" />

<link href="http://www.kidswithfoodallergies.org/js/main.css" rel="stylesheet" type="text/css" />
<link href="http://www.kidswithfoodallergies.org/js/images.css" rel="stylesheet" type="text/css" />
<link href="http://www.kidswithfoodallergies.org/js/forms.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="favicon.ico" />
<script type="text/javascript" language="javascript" src="http://www.kidswithfoodallergies.org/js/menu.js"></script>
</head>
<body>
<?php
include ("header-resources.php");
?>
	  <!-- InstanceBeginEditable name="under menu" --> <div class="pinkbox" style="width:192px" align="left">
     <div align="center"> <img src="siteimages/tipweek.gif" width="160" height="52" border="0" alt="Tip of the Week" /><br /> <img src="siteimages/rulebie.gif" width="135" height="6" alt="" /></div>

<div align="center" style="padding:2px"> <span style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color: #427DA6;">

<?php
	$sql = "select * from resources where current='current'";
	$result2 = mysql_query( $sql ) or die( mysql_error() );
	
	$row = mysql_fetch_array( $result2 );
	echo "<b>".stripslashes($row['title'])."</b>"

?>

</span></div><br />

<div class="style24" align="left" style="padding:3px">
<?
 echo stripslashes($row['intro'])

?>
<br />
<br />

<a href="resources.php"><br>Read more...</a></span></div></div><br />
	  <div class="pinkleftbox" style="height:50px">&quot;how do I access &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;premium articles?&quot;</div>
      <div class="ltgreybox186">
      <div align="left" class="style12">
      <ul>
            <li>Most of our educational resources are free. </li>
            <br />
            <li>To access our premium articles, <a href="https://www.kidswithfoodallergies.org/membership_purchase.html">subscribe to a Family Membership</a>  ($25/yr) to enjoy maximum <a href="memberships.html" target="_blank">benefits</a>, including full access to the premium articles, our recipes, a subscription to Support Net&reg; and more. </li>
            <br />
            <li><em>Sponsorships are available for families who cannot afford the membership fee.</em></li>
          </ul> 
       </div>
      </div>
       <br />
        
	  <!-- InstanceEndEditable --></div><!--endsleftcolumn--></td>
 <td valign="top" width="538" colspan="1">    
<div class="maintextrightR">     
<div class="blueheaderbox"> <h1><!-- InstanceBeginEditable name="title" -->
		Parent Resources: Food Allergy Information<!-- InstanceEndEditable --></h1>
</div>
<div class="ltgreyboxmainR">

			<!-- #BeginEditable "text" --><div align="center" style="padding:8px 6px 8px 6px;" class="right"><a href="http://www.kidswithfoodallergies.org/resources/resourcesnew.php"><img src="images/resourcelogin.gif" alt="Family Member Login" width="160" height="52" border="0" style="padding-bottom:6px" /></a><br />
<span class="style12">Resources marked with a <img src="http://kidswithfoodallergies.org/infopop/eve/star.gif" alt="Family Member Star" width="10" height="9" /> <br />
require a <a href='https://www.kidswithfoodallergies.org/membership_purchase.html' target=_'blank'>Family Membership</a>.</span></div>
 <h2>Food Allergy Resource Center</h2>
    <em>Living with food allergies isn't easy!</em><br />
        <br />
        Whether you are looking for   information from food allergy basics, emotional and social issues, safe label   reading, food preparation techniques or school planning, we hope you will find   what you need here.<br />
        <br />
      All medical information in this section of the KFA website is reviewed   by our <a href="http://www.kidswithfoodallergies.org/mat.html" target="_blank">Medical Advisory Team</a>. Our goal is to provide reliable and   accurate health information to parents and caregivers which, in turn, benefits the health and well-being of children.<br />
      <br />&nbsp;
  

    <div style="padding:10px;">

<!--- put styling here -->

<table border="0" cellspacing="0" cellpadding="0" class="style16">
<tr><td colspan="2"><h2>KFA Publications</h2></td></tr>

<tr>
    <td><div class="balloon"><ul><li><a href="resourcetopic.php?topic=freeguides" class="style19"><img src="images/rec/guides.jpg" width="105" height="91" alt="Food Allergy Guides" align="left" style="padding:3px;" border="0"/><strong class="style19">Free Guides<br />
    </strong>Printable guides, booklets and more for dealing with food allergies.<br />
    <span style="color:#3F679B; text-decoration:underline">Learn More...</span></a></li></ul></div>
    
    
      </td><td>
      
      
      <div class="balloon"><ul><li><a href="resourcetopic.php?topic=supportnet" class="style19"><img src="images/rec/supportnetnp.jpg" width="105" height="91" alt="Support Net Magazine" align="left" style="padding:3px;" border="0" /><strong class="style19">Support Net&reg;<br />
    </strong>Biannual magazines with news, views, personal stories. <br />
    <span style="color:#3F679B; text-decoration:underline">Learn More...</span></a>
    
   </li></ul></div>  
    

    
    </td></tr>
<tr>
  <td>
  <div class="balloon"><ul><li><a href="newsletter.html" class="style19"><img src="images/rec/enewsnp.jpg" width="105" height="91" alt="KFA eNews" align="left" style="padding:3px;" border="0" /><strong class="style19">KFA eNews</strong><br />
   E-newsletters filled with allergy-free recipes, hot topics and news.<br />
     <span style="color:#3F679B; text-decoration:underline">Learn More...</span></a>
    
    <!--[if IE 7]><!--></a><!--<![endif]-->
   <!-- <dl id='web1'><dt>KFA eNews</dt><dd>
     <blockquote><a href="newsletter_sign-up.html">Subscribe now</a></blockquote>
    <blockquote><a href="newsletter.html">Read old issues</a></blockquote>

 </dd></dl><!--[if lte IE 6]></a><![endif]--></li></ul></div>
  
  
  
  </td>
  <td> <div class="balloon"><ul><li><a href="http://www.kidswithfoodallergies.org/sendcard" class="style19"><img src="images/rec/ecardnp.jpg" width="105" height="91" alt="Send Free e-Cards" align="left" style="padding:3px;" border="0"/><strong class="style19">Free e-Cards<br />
    </strong>Send allergy-awareness e-Cards featuring children's art.<br />
    <span style="color:#3F679B; text-decoration:underline">Learn More...</span></a></li></ul></div></td>
</tr>
<tr><td colspan="2"><h2>KFA Resource Topics</h2></td></tr>
    
<?php 
	$sql = "select * from resources where archive = 'no' order by topic, topic_sort, title";
	$result = mysql_query( $sql ) or die( mysql_error() );
	
			$topic = '';
			$oldtopic = '';
			$rownum = '';
			$count = '';
		while( $row = mysql_fetch_array( $result ) )
		{
		
			$sdate = $row['sdate'];
			list($myyear, $mymonth) = split('[-]', $sdate);
			$myday = '01';
			$time_passed = intval((time()- mktime(0,0,0,$mymonth,$myday,$myyear))/86400);


			$topic = $row['topic'];
			if ($topic == 'allergy-friendly') $theimage = "food-reportsnp.jpg";
			if ($topic == 'allergy-friendly') $smalldescrip = "New allergen-free foods for kids.";
			if ($topic == 'basics') $theimage = "basicsnp.jpg";
			if ($topic == 'basics') $smalldescrip = "Information to keep your food-allergic child safe.";
			if ($topic == 'food-allergens') $theimage = "food-allergensnp.jpg";
			if ($topic == 'food-allergens') $smalldescrip = "Information about food allergens including hidden name lists.";
			if ($topic == 'diagnosis-testing') $theimage = "testingnp.jpg";
			if ($topic == 'diagnosis-testing') $smalldescrip = "Find out what tests your child should—and shouldn't—receive.";
			if ($topic == 'emotional_social') $theimage = "socialissuesnp.jpg";
			if ($topic == 'emotional_social') $smalldescrip = "Dealing with your emotions and raising a well-adjusted child.";
			if ($topic == 'food-cooking') $theimage = "food-cookingnp.jpg";
			if ($topic == 'food-cooking') $smalldescrip = "Ingredient substitutions, safe food preparation strategies and more.";
			if ($topic == 'pfood-safety-labeling') $theimage = "labelingnp.jpg";
			if ($topic == 'pfood-safety-labeling') $smalldescrip = "Informing you—and your child—how to accurately read product labels.";
			if ($topic == 'gastrointestinal-disorders') $theimage = "gastro-disordersnp.jpg";
			if ($topic == 'gastrointestinal-disorders') $smalldescrip = "Conditions related to food allergies in children.";
			if ($topic == 'holidays') $theimage = "holidaysnp.jpg";
			if ($topic == 'holidays') $smalldescrip = "Tips to keep your food-allergic child safe around the holidays.";
			if ($topic == 'medication-pharmacy') $theimage = "medicationnp.jpg";
			if ($topic == 'medication-pharmacy') $smalldescrip = "Read about allergy studies, inhalers, vaccines and medications.";
			if ($topic == 'school-preschool') $theimage = "preschoolnp.jpg";
			if ($topic == 'school-preschool') $smalldescrip = "Resources to help you place your child in school without panic.";
			if ($topic == 'shopping') $theimage = "shoppingnp.jpg";
			if ($topic == 'shopping') $smalldescrip = "Safe shopping strategies for parents of food-allergic children.";
			if ($topic == 'support_group') $theimage = "supportgroupnp.jpg";
			if ($topic == 'support_group') $smalldescrip = "Find a local support group in your area.";
			if ($topic == 'managing_allergies') $theimage = "managing-allergiesnp.jpg";
			if ($topic == 'managing_allergies') $smalldescrip = "Take control of your child's food allergies.";
			if ($topic == 'research') $theimage = "researchnp.jpg";
			if ($topic == 'research') $smalldescrip = "Research studies and clinical trials involving food allergies.";
			if ($topic == 'travel') $theimage = "travel.jpg";
			if ($topic == 'travel') $smalldescrip = "Information for safe travel including camping, road trips or cruises.";
			$title = stripslashes($row['title']);
			$title = preg_replace("/'/", "", $title);
			$title = preg_replace('/&quot;/', '', $title);
			$title = preg_replace('/\s+/', '_', $title);
			
			$urltitle = stripslashes($row['urltitle']);
			$urltitle = preg_replace("/'/", "", $urltitle);
			$urltitle = preg_replace('/&quot;/', '', $urltitle);
			$urltitle = preg_replace('/\s+/', '_', $urltitle);
		if ($topic == $oldtopic){
		/*	if ($row['preview'] == 'preview'){
echo "<blockquote>";
			if ($time_passed < 60) echo "<strong><font color='#CC3300'>NEW!</font></strong> ";
			echo "&bull;<a border='0' href='resourcespre.php?id=".$row['id']."&title=".$urltitle."'> ". stripslashes($row['title'])."</a><br /><blockquote>".stripslashes($row['intro'])."</blockquote></blockquote>";
			}else {
			echo "<blockquote><img src='http://kidswithfoodallergies.org/infopop/eve/star.gif'>&bull; ";
			if ($time_passed < 60) echo "<strong><font color='#CC3300'>NEW!</font></strong>&bull; ";
			echo $row['title']           ."<br /><blockquote>".stripslashes($row['intro'])."</blockquote></blockquote>";
			}
			*/
		}else {
			$count++;
			if ($rownum!='') {
			//echo "</dd></dl><!--[if lte IE 6]></a><![endif]-->";
			echo "</li></ul></div></td>";
			}

	if( $odd != $count%2 ) {
		if ($rownum=='') { echo "<tr>";
		}else {
		echo "    </tr><tr>";
		}
		}
	echo "<td width=\"220\">";
					echo "<div class=\"balloon\"><ul><li>";
			
	echo "    <a href='resourcetopic.php?topic=".$row['topic']."' ><img src=\"images/rec/".$theimage."\" width=\"105\" height=\"91\" alt=\"\" align=\"left\" style=\"padding:3px;\"/><strong class='style19'>";
	echo GetTopic($row['topic']);
	echo "<br /></strong>".$smalldescrip."<br />
    <span style=\"color:#3F679B; text-decoration:underline\">Learn More...</span></a>";
    

	echo "<!--[if IE 7]><!--></a><!--<![endif]-->";
			$mytopic = ShowTopic($row['topic']);
			//echo $mytopic;
		/*	echo "<dl id='web1'><dt><a href='resourcetopic.php?topic=".$row['topic']."' style=\"color:#3F679B;\"> ".$mytopic."</a></dt><dd>";
			if ($row['preview'] == 'preview'){
			echo "<blockquote>";
			if ($time_passed < 60) echo "<strong><font color='#CC3300'>NEW!</font></strong> ";
			echo "&bull;<a border='0' href='resourcespre.php?id=".$row['id']."&title=".$urltitle."'> ". stripslashes($row['title'])."</a><br /><blockquote>".stripslashes($row['intro'])."</blockquote></blockquote>";
			}else {
			echo "<blockquote><img src='http://kidswithfoodallergies.org/infopop/eve/star.gif'>&bull; ";
			if ($time_passed < 60) echo "<strong><font color='#CC3300'>NEW!</font></strong>&bull; ";
			echo  stripslashes($row['title'])           ."<br /><blockquote>".stripslashes($row['intro'])."</blockquote></blockquote>";
			
			}*/
		}
	$oldtopic=$topic;
	$smalldescrip = '';
	$rownum++;

		}
		
		if ( $odd != $count%2 ) {
		echo "<td>&nbsp;</td></tr>";
		}else {
		echo "</tr>";
		}
		
?>
  </table>  

</div>
            <!-- #EndEditable --></div>
</div><!--endsmaincolumn-->
</td></tr></table>
</div><!--endsmainbox-->
</td>
</tr>

<tr><td>
  <div align="center" class="style24">
<!-- #BeginEditable "date" -->
      <p align="center" class="style24">Page last updated 07/25/2010</p>
      <!-- #EndEditable --></div>

<?php
include ("footer-resources.php");
?>

<!-- ends center on bottom links-->
</div><!-- end mainbox2-->
<!-- ends bottom center -->
</td></tr></table>
</div>

 
<!-- InstanceBeginEditable name="Google Analytics" -->
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try{
var pageTracker = _gat._getTracker("UA-216208-1");
pageTracker._trackPageview("/resourcesnew.php");
} catch(err) {}</script>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
