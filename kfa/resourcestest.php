<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="js/main.css" rel="stylesheet" type="text/css" />
<link href="js/images.css" rel="stylesheet" type="text/css" />
<link href="js/forms.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="js/balloons.css" rel="stylesheet" type="text/css" />
<title>testing resources</title>
</head>

<body>

<table width="520" border="0" cellspacing="0" cellpadding="0" class="style16">
<?php 

include ("config.php");
include ("common.php"); 
	$sql = "select * from resources order by topic, topic_sort, title";
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
			if ($topic == 'allergy-friendly') $theimage = "food-reports.jpg";
			if ($topic == 'allergy-friendly') $smalldescrip = "Reports that provide important information.";
			if ($topic == 'allergy-friendly-new') $theimage = "food-allergens.jpg";
			if ($topic == 'allergy-friendly-new') $smalldescrip = "New foods to watch out for.";
			if ($topic == 'basics') $theimage = "basics.jpg";
			if ($topic == 'basics') $smalldescrip = "Learn the basics to keeping your child safe.";
			if ($topic == 'food-allergens') $theimage = "food-allergens.jpg";
			if ($topic == 'food-allergens') $smalldescrip = "Information about food allergens";
			if ($topic == 'diagnosis-testing') $theimage = "testing.jpg";
			if ($topic == 'diagnosis-testing') $smalldescrip = "Diagnosis and testing short intro here";
			if ($topic == 'emotional_social') $theimage = "socialissues.jpg";
			if ($topic == 'emotional_social') $smalldescrip = "Important articles that will help you deal with emotional and social problems that may occur with food allergies.";
			if ($topic == 'food-cooking') $theimage = "food-cooking.jpg";
			if ($topic == 'food-cooking') $smalldescrip = "Recipe substitutions and other great ideas for you in the kitchen.";
			if ($topic == 'pfood-safety-labeling') $theimage = "labeling.jpg";
			if ($topic == 'pfood-safety-labeling') $smalldescrip = "Articles that show what to look for on labels and where to look.";
			if ($topic == 'gastrointestinal-disorders') $theimage = "gastro-disorders.jpg";
			if ($topic == 'gastrointestinal-disorders') $smalldescrip = "Gastro - description goes here.";
			if ($topic == 'holidays') $theimage = "holidays.jpg";
			if ($topic == 'holidays') $smalldescrip = "Great ideas to enjoy the holidays while still keeping your food allergic child safe";
			if ($topic == 'medication-pharmacy') $theimage = "medication.jpg";
			if ($topic == 'medication-pharmacy') $smalldescrip = "Great information about medications and how to get help.";
			if ($topic == 'school-preschool') $theimage = "preschool.jpg";
			if ($topic == 'school-preschool') $smalldescrip = "Resources that will help you put your child in school without fear.";
			if ($topic == 'shopping') $theimage = "shopping.jpg";
			if ($topic == 'shopping') $smalldescrip = "Learn great tricks to make shopping fun and safe.";
			if ($topic == 'support_group') $theimage = "supportgroup.jpg";
			if ($topic == 'support_group') $smalldescrip = "Find a support group in your area.";
			if ($topic == 'managing_allergies') $theimage = "managing-allergies.jpg";
			if ($topic == 'managing_allergies') $smalldescrip = "Great ideas to help you manage your child's food allergies.";
			$title = stripslashes($row['title']);
			$title = preg_replace("/'/", "", $title);
			$title = preg_replace('/&quot;/', '', $title);
			$title = preg_replace('/\s+/', '_', $title);
			$urltitle = stripslashes($row['urltitle']);
			$urltitle = preg_replace("/'/", "", $urltitle);
			$urltitle = preg_replace('/&quot;/', '', $urltitle);
			$urltitle = preg_replace('/\s+/', '_', $urltitle);
		if ($topic == $oldtopic){
			if ($row['preview'] == 'preview'){
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			if ($time_passed < 60) echo "<strong><font color='#CC3300'>NEW!</font></strong> ";
			echo "<a border='0' href='resourcespre.php?id=".$row['id']."&title=".$urltitle."'> ". stripslashes($row['title'])."</a><br />";
			}else {
			echo "&nbsp;&nbsp;&nbsp;&nbsp;<img src='http://kidswithfoodallergies.org/infopop/eve/star.gif'> ";
			if ($time_passed < 60) echo "<strong><font color='#CC3300'>NEW!</font></strong> ";
			echo $row['title']           ."<br />";
			}
		}else {
			$count++;
			if ($rownum!='') echo "</dd></dl><!--[if lte IE 6]></a><![endif]--></li></ul></div></td>";

	if( $odd != $count%2 ) {
		if ($rownum=='') { echo "<tr>";
		}else {
		echo "    </tr><tr>";
		}
		}
	echo "<td width=\"260\">";
					echo "<div class=\"balloon\"><ul><li>";
			
	echo "    <img src=\"images/rec/".$theimage."\" width=\"105\" height=\"91\" alt=\"Allergy Friendly Food Reports\" align=\"left\" style=\"padding:3px;\"/><strong class='style19'>";
	echo GetTopic($row['topic']);
	echo "<br /></strong>".$smalldescrip."<br />
    <a href='resourcetopic.php?topic=".$row['topic']."' ><font color=\"#3F679B\"><u>Learn More...</u></font></a>";
    

	echo "<!--[if IE 7]><!--></a><!--<![endif]-->";
			$mytopic = ShowTopic($row['topic']);
			//echo $mytopic;
			echo "<dl id='web1'><dt>".$mytopic."</dt><dd>";
			if ($row['preview'] == 'preview'){
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			if ($time_passed < 60) echo "<strong><font color='#CC3300'>NEW!</font></strong> ";
			echo "<a border='0' href='resourcespre.php?id=".$row['id']."&title=".$urltitle."'> ". stripslashes($row['title'])."</a><br />";
			}else {
			echo "&nbsp;&nbsp;&nbsp;&nbsp;<img src='http://kidswithfoodallergies.org/infopop/eve/star.gif'> ";
			if ($time_passed < 60) echo "<strong><font color='#CC3300'>NEW!</font></strong> ";
			echo  stripslashes($row['title'])           ."<br />";
			}
		}
	$oldtopic=$topic;
	$smalldescrip = '';
	$rownum++;

		}
		
?>
</table>

</body>
</html>
