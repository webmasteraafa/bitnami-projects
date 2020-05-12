<?php
/*
echo ("after start".session_id()."<BR>");
*/
$KWFAAdmin = '7880084762';
$RecipesInOurDB = '5260079562';
$RecipesDBTeam = '2670065682';

if(isset($_COOKIE['site_2400067262'])){
  $site_cookie = $_COOKIE['site_2400067262'];
  list($u,$md5p,$user_oid,$pref_datetime,$perms_datetime,$pl) = explode("&", $site_cookie);
  $u_name = split("=", $u);
  $u_login = split("=", $l);
  $u_oid = split("=", $user_oid);
  $_SESSION['u_name'] = $u_name;
  $_SESSION['u_login'] = $u_login;
  $_SESSION['u_oid'] = $u_oid;
  
} else {
    //echo "<meta http-equiv=\"Refresh\" CONTENT=\"0; URL=http://kidswithfoodallergies.org/resources/resourcesnew.php\">";
}

$result_array = array();
$isAdmin = false;

if (isset($u_oid[1])){
  $db = mysql_connect("www.kidswithfoodallergies.org:3306", "kidswitror_rcp", "allergenfree");
  mysql_select_db("kidswitror_eve",$db);

  $sql = "SELECT GROUP_OID FROM IP_GROUP_USERS WHERE USER_OID ='$u_oid[1]'";
  $result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
  while($row = mysql_fetch_array($result)){
    if (($row['GROUP_OID'] == $KWFAAdmin) || ($row['GROUP_OID'] == $RecipesInOurDB) || ($row['GROUP_OID'] == $RecipesDBTeam)){
      $isAdmin = true;
      break;
    }
  }
}


$_SESSION['user_name'] = $u_name[1];
$_SESSION['user_login'] = $u_login[1];
$_SESSION['user_oid'] = $u_oid[1];
$_SESSION['isAdmin'] = $isAdmin;
$_SESSION['frompage'] = 'introduction';
$_SESSION['db_result'] = $result_array;
$_SESSION['total_rows'] = 0;
$_SESSION['category'] = '';
session_write_close();
//echo ("after session write".session_id()."<BR>");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/resourcesmainmem.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Family Member Allergy Resources</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Keywords" content="peanut allergy, dairy free recipes, dairy free, food allergies, food allergy, POFAK, wheat free recipes, egg free recipes, wheat free, nut free, peanut free, milk free recipes, food allergy recipes, milk allergy, egg allergy" />
<meta name="Description" content="Nonprofit organization providing online support groups, recipes, parent education and news for families raising children with food allergies" />
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW" />

<?php
include ("config.php");
include ("common.php");
?> <link href="http://www.kidswithfoodallergies.org/js/balloons.css" rel="stylesheet" type="text/css" />
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
<div class="blueheaderbox"> <h1><!-- InstanceBeginEditable name="title" -->Resources for Family Members<!-- InstanceEndEditable --></h1>
</div>
<div class="ltgreyboxmainR">

			<!-- #BeginEditable "text" -->
            You are logged in as a Family Member and can access all premium resources:<br />
            <br />

<div style="padding:10px;">

<!--- put styling here -->

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="style16">
<tr><td colspan="2"><h2>KFA Publications</h2></td></tr>

<tr>
    <td><div class="balloon"><ul><li><a href="http://www.kidswithfoodallergies.org/resourcetopic.php?topic=freeguides" class="style19"><img src="http://www.kidswithfoodallergies.org/images/rec/guides.jpg" width="105" height="91" alt="Food Allergy Guides" align="left" style="padding:3px;" border="0"/><strong class="style19">Free Guides<br />
    </strong>Printable guides, booklets and more for dealing with food allergies.<br />
    <span style="color:#3F679B; text-decoration:underline">Learn More...</span></a></li></ul></div>
    
    
      </td><td>
      
      
      <div class="balloon"><ul><li><a href="http://www.kidswithfoodallergies.org/resourcetopic.php?topic=supportnet" class="style19"><img src="http://www.kidswithfoodallergies.org/images/rec/supportnetnp.jpg" width="105" height="91" alt="Support Net Magazine" align="left" style="padding:3px;" border="0" /><strong class="style19">Support Net&reg;<br />
    </strong>Biannual magazines with news, views, personal stories. <br />
    <span style="color:#3F679B; text-decoration:underline">Learn More...</span></a>
    
   </li></ul></div>  
    

    
    </td></tr>
<tr>
  <td>
  <div class="balloon"><ul><li><a href="http://www.kidswithfoodallergies.org/newsletter.html" class="style19"><img src="http://www.kidswithfoodallergies.org/images/rec/enewsnp.jpg" width="105" height="91" alt="KFA eNews" align="left" style="padding:3px;" border="0" /><strong class="style19">KFA eNews</strong><br />
   E-newsletters filled with allergy-free recipes, hot topics and news.<br />
     <span style="color:#3F679B; text-decoration:underline">Learn More...</span></a>
    
    <!--[if IE 7]><!--></a><!--<![endif]-->
   <!-- <dl id='web1'><dt>KFA eNews</dt><dd>
     <blockquote><a href="newsletter_sign-up.html">Subscribe now</a></blockquote>
    <blockquote><a href="newsletter.html">Read old issues</a></blockquote>

 </dd></dl><!--[if lte IE 6]></a><![endif]--></li></ul></div>
  
  
  
  </td>
  <td> <div class="balloon"><ul><li><a href="http://www.kidswithfoodallergies.org/sendcard" class="style19"><img src="http://www.kidswithfoodallergies.org/images/rec/ecardnp.jpg" width="105" height="91" alt="Send Free e-Cards" align="left" style="padding:3px;" border="0"/><strong class="style19">Free e-Cards<br />
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
			
	echo "    <a href='resourcetopic.php?topic=".$row['topic']."' ><img src=\"http://www.kidswithfoodallergies.org/images/rec/".$theimage."\" width=\"105\" height=\"91\" alt=\"\" align=\"left\" style=\"padding:3px;\"/><strong class='style19'>";
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
<!--</table><table align="center" border="0">-->
<tr><td>
  <div align="center" class="style24">
<!-- #BeginEditable "date" -->
      <p align="center" class="style24">Page last updated 03/08/2010</p>
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
pageTracker._trackPageview("Family Member Resources");
} catch(err) {}</script>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
