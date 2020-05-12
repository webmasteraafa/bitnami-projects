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
<title>Kids With Food Allergies - Online Support for Families</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Keywords" content="peanut allergy, dairy free recipes, dairy free, food allergies, food allergy, POFAK, wheat free recipes, egg free recipes, wheat free, nut free, peanut free, milk free recipes, food allergy recipes, milk allergy, egg allergy" />
<meta name="Description" content="Nonprofit organization providing online support groups, recipes, parent education and news for families raising children with food allergies" />
<meta name="ROBOTS" content="INDEX, FOLLOW" />
<meta name="REVISIT-AFTER" content="7 days" />
<?php
include ("config.php");
include ("common.php");
?> 
<!-- InstanceEndEditable -->
<meta name="copyright" content="Copyright (c) 2005-2008, Kids With Food Allergies, Inc. All Rights Reserved." />
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="classification" content="Nonprofit organization" />
<link rel="alternate" type="application/rss+xml"
	title="Kids With Food Allergies" href="http://feeds.feedburner.com/kidswithfoodallergies" />

<link href="../js/main.css" rel="stylesheet" type="text/css" />
<link href="../js/images.css" rel="stylesheet" type="text/css" />
<link href="../js/forms.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../favicon.ico" />
<script type="text/javascript" language="javascript" src="../js/menu.js"></script>
</head>
<body onload="preloadImgs();randomImages();">
<div align="center">
<table border="0" align="center">
<tr><td align="center">
<!-- page center -->
 	<table width="750"  border="0" cellpadding="0" cellspacing="0"><!-- top table -->
      <tr>
      <td width="163" rowspan="2" valign="bottom" class="logoborder">
      <a href="http://www.kidswithfoodallergies.org"><img src="../siteimages/logof.gif" width="163" height="135" alt="Kids With Food Allergies" /></a></td>
      
      <td><div id="welcome1"></div></td>
 	</tr>
 	<tr><td colspan="4" valign="bottom">
        
		 <table cellpadding="0" cellspacing="0" class="one" width="100%"><!-- menu table1 -->
  			<tr bgcolor="#3F679B">
  			<td height="12" bgcolor="#3F679B">
  			<div align="right">
			<a href="../index.html" class="WhiteMenuText">&nbsp;home</a>&nbsp;&nbsp;&nbsp;</div></td></tr>
  
  	<tr><!-- menu --><td  valign="middle">
 		<table width="100%" class="one" cellspacing="0" cellpadding="0"><!-- menu table -->
  		<tr class="one">
         <td width="22%" class="one">
        <a href="../whatsnew.html" class="PurpleMenuText" title="Announcements, Publications, and Press Releases">what's new</a>        </td>
         <td width="17%" class="one">
        <a href="../recipes.html" class="GrayMenuText"
         title="Dairy free recipes, egg free recipes, nut free recipes, peanut free recipes, wheat free recipes">recipes</a>         </td>
        <td width="19%" class="one">
        <a href="../resourcesnew.php" title="Food allergy articles, research, and resources" class="PinkMenuText">resources</a>        </td>
        <td width="23%" class="one">
     <a href="../faalerts.php" class="OrangeMenuText" title="Food allergy recalls for undeclared food allergens">allergy alerts</a>        </td>
        <td width="19%" class="one"><a href="../interlink.html" class="GreenMenuText">allergy links</a></td></tr></table>
        <!-- end top row menu start 2nd row -->
         
        <table width="100%" class="one" cellspacing="0" cellpadding="0">
          <tr class="one">
       <td width="16%" class="one"><a href="../donate.html" class="PinkMenuText">donate</a></td>
          <td width="18%" class="one">
          <a href="../shopping.html" title="Food allergy t-shirts, allergy cookbooks, allergy books" class="OrangeMenuText">
         shop KFA</a></td>
         <td width="37%" class="one">
         <a href="../marketplace.html" title="Find makers of allergen free foods, peanut allergy posters, allergy products"
          class="GreenMenuText">allergy buyer's guide</a></td>
          <td width="29%" class="one">
       <a href="../community.html" class="GrayMenuText" title="Register as a member or log in to our food allergy message boards">
       support forums</a></td></tr></table><!-- ends second row menu --></td></tr></table><!-- end menu table1 -->
        </td></tr>
 		 <tr><!--3rd row menu -->
		<td width="163" align="center" class="style29">
 				<script type="text/javascript">showDate();</script> </td>
               
    	<td colspan="5" align="right"><!-- 3rd row td -->
          	&nbsp;<a href="../memberships.html" class="GrayMenuText" 
	title="Become a member of Kids With Food Allergies and the Parents of Food Allergic Kids (POFAK) online allergy support group">
     membership</a> &nbsp;&nbsp;<a href="../site_map.html" class="PurpleMenuText">site map </a>&nbsp; &nbsp;
     <a href="../contactus.html" class="PinkMenuText">contact us</a>&nbsp;&nbsp; 
     <a href="../about.html" class="GreenMenuText">about</a>&nbsp;&nbsp;&nbsp; </td><!-- end 3rd row td -->
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
    <div align="right"><a href="../newsletter_sign-up.html" class="formlink" title="Kids With Food Allergies e-news is a free e-newsletter containing news and hot discussion topics about food allergies, allergy free recipes and safe food ideas for children with food allergies">more info</a></div>

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
<div class="pinkleftbox">resources</div>            
<div class="ltgreybox186">
      
         <a href="resourcesnew.php" class="style27">Family Member Resources</a>
           
       <p><a href="resources.php" class="style27">Tip of the Week</a></p>
       <?
	$sql = "select * from resources order by topic";
	$result = mysql_query( $sql ) or die( "Error querying Resources list: " . mysql_error() . " Query: $sql " );
	$topic = '';
	$oldtopic = '';
		while( $row = mysql_fetch_array( $result ) )
		{
	$topic = $row['topic'];
	if (($topic == $oldtopic) ||($topic == '')){
		 echo "";
	}else{
?>
                     
                      <p><a href="resourcetopic.php?topic=<? echo stripslashes($row['topic']); ?>" class="style27"><? echo GetTopic($row['topic']);?></a></p>
                      
<?
	}
	$oldtopic=$topic;

		}
?>
       <p><a href="supportnet.php" class="style27" title="Download Support Net &reg; publications">Support Net &reg;</a></p>
       <p><a href="http://www.kidswithfoodallergies.org/newsletter_sign-up.html" class="style27" title="monthly KFA eNews subscription">Newsletter Sign-up</a></p>
       <p><a href="http://www.kidswithfoodallergies.org/newsletter.html" class="style27" title="Old Issues of KFA eNews">Past Copies of KFA eNews</a></p>
       <p><a href="http://www.kidswithfoodallergies.org/sendcard" class="style27" title="Allergy Awareness Message e-Cards">Send Free e-Cards</a></p>
          </div>                                
       <br /> 


	  <!-- InstanceBeginEditable name="under menu" --><!-- InstanceEndEditable --></div><!--endsleftcolumn--></td>
 <td valign="top" width="538" colspan="1">    
<div class="maintextrightR">     
<div class="blueheaderbox"> <h1><!-- InstanceBeginEditable name="title" -->
		Resources<!-- InstanceEndEditable --></h1>
</div>
<div class="ltgreyboxmainR">

			<!-- #BeginEditable "text" -->

            <?php

	$sql = "select * from resources order by topic, title";
	$result = mysql_query( $sql ) or die( mysql_error() );
	
			$topic = '';
			$oldtopic = '';
			$rownum = '';
		while( $row = mysql_fetch_array( $result ) )
		{
			$sdate = $row['sdate'];
			list($myyear, $mymonth) = split('[-]', $sdate);
			$myday = '01';
			$time_passed = intval((time()- mktime(0,0,0,$mymonth,$myday,$myyear))/86400);
			//echo $sdate;
			//echo $time_passed;
			$topic = $row['topic'];
		if ($topic == $oldtopic){
			if ($time_passed < 60){
			echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><font color='#CC3300'>NEW!</font></b> <a href='resourceshow.php?id=". $row['id']   ."' class='style12'>". $row['title']           ."</a>";
			$rater_id=$row['id'];
			$rater_item_name=stripslashes($row['title']);
			include("../resourcerate/ratingshort.php");
			} else {
			echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='resourceshow.php?id=". $row['id']   ."' class='style12'>". $row['title']           ."</a>";
			$rater_id=$row['id'];
			$rater_item_name=stripslashes($row['title']);
			include("../resourcerate/ratingshort.php");
			}
		}else {
			if ($rownum!='') echo "<br><br>";
			?>
			<a href="resourcetopic.php?topic=<? echo $row['topic']; ?>" class="style16"><? echo GetTopic($row['topic']);?></a>
			<?
			
			
			
			if ($time_passed < 60){
			echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><font color='#CC3300'>NEW!</font></b> <a href='resourceshow.php?id=". $row['id']   ."' class='style12'>". $row['title']           ."</a>";
			$rater_id=$row['id'];
			$rater_item_name=stripslashes($row['title']);
			include("../resourcerate/ratingshort.php");
			} else {
			echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='resourceshow.php?id=". $row['id']   ."' class='style12'>". $row['title']           ."</a>";
			$rater_id=$row['id'];
			$rater_item_name=stripslashes($row['title']);
			include("../resourcerate/ratingshort.php");			
			}
		}
	$oldtopic=$topic;
	$rownum++;
	$time_passed = '';
	$sdate = '';
	$mymonth = '';
	$myyear = '';
		}
?>
<br />
<br />

<a href="http://kidswithfoodallergies.org/resources/supportnet.php" class="style16">Support Net</a>
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://kidswithfoodallergies.org/resources/SupportNetWinter07HB.pdf' class='style12'>Winter 2007</a>
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://kidswithfoodallergies.org/resources/KWFAnewsletterfall2007FINAL.pdf' class='style12'>Fall 2007</a>
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://kidswithfoodallergies.org/resources/SupportNetSummer07HB.pdf' class='style12'>Summer 2007</a> <span class="style12">(high bandwidth connection - cable or DSL)</span>
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://kidswithfoodallergies.org/resources/SupportNetSummer07LB.pdf' class='style12'>Summer 2007</a> <span class="style12">(low bandwidth connection - dial up)</span>
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://kidswithfoodallergies.org/resources/SupportNetSpring07LB.pdf' class='style12'>Spring 2007</a> <span class="style12"></span>
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://kidswithfoodallergies.org/resources/SupportNetWinter06HB.pdf' class='style12'>Winter 2006</a> <span class="style12">(high bandwidth connection - cable or DSL)</span>
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://kidswithfoodallergies.org/resources/SupportNetWinter06LB.pdf' class='style12'>Winter 2006</a> <span class="style12">(low bandwidth connection - dial up)</span>
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://kidswithfoodallergies.org/resources/KWFAsupportnewfall06.pdf' class='style12'>Fall 2006</a> <span class="style12">(high bandwidth connection - cable or DSL)</span>
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://kidswithfoodallergies.org/resources/KWFAsupportnewfall06LR.pdf' class='style12'>Fall 2006</a> <span class="style12">(low bandwidth connection - dial up)</span>
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://kidswithfoodallergies.org/resources/SupportNetSummer06HB.pdf' class='style12'>Summer 2006</a> <span class="style12">(high bandwidth connection - cable or DSL)</span>
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://kidswithfoodallergies.org/resources/SupportNetSummer06LB.pdf' class='style12'>Summer 2006</a> <span class="style12">(low bandwidth connection - dial up)</span>
<br />
<br />
<img src='http://www.kidswithfoodallergies.org/siteimages/newicon.gif' width='11' height='10' /> = New Resources            <!-- #EndEditable --></div>
</div><!--endsmaincolumn-->
</td></tr></table>
</div><!--endsmainbox-->
</td>
</tr>
<!--</table><table align="center" border="0">-->
<tr><td>
  <div align="center" class="style24">
<!-- #BeginEditable "date" -->
      <p align="center" class="style24">Page last updated 3/26/2007</p>
      <!-- #EndEditable --></div>
<div class="mainbox2" align="center">
<div class="blueinsidebox">
  	<span class="style61">KFA is a national nonprofit food allergy support group dedicated to fostering optimal health, 
    nutrition, <br />and well-being of children with food allergies by providing education and a caring<br /> 
                              support community for their families and caregivers.</span></div>
<br />
<div align="center">
    
    <a href="/whatsnew.html" class="style24">What's New</a>      <a 
    href="/recipes.html" class="style24">Allergy-Free Recipes</a>      <a 
    href="/resourcesnew.php" class="style24">Parent Education Resources</a>         <a 
    href="/faalerts.php" class="style24">Food Allergy Alerts</a>        
    <a href="/interlink.html" class="style24">Allergy Links</a><br />        
    <a href="/donate.html" class="style24">Donate</a>   
    <a href="/shopping.html" class="style24">Shop KFA</a>        <a 
    href="/marketplace.html" class="style24">Allergy Buyer's Guide</a>        <a 
    href="/community.html" class="style24">Support Forums</a>        <a 
    href="/memberships.html" class="style24">Memberships</a>	<a 
    href="/contactus.html" class="style24">Contact Us</a>        <a 
    href="/about.html" class="style24">About</a> 
 
  
      <p class="style24"><a href="../privacy.html" class="style24">Privacy Policy</a> and <a href="../tos.html" class="style24">Terms of Service</a><br />
              Copyright (c) 2005-2008, Kids With Food Allergies, Inc.  All Rights Reserved.
              <br />
         <em>Kids With Food Allergies was formerly known as POFAK (Parents of Food Allergic Kids)<br />
          before becoming a tax exempt charity in 2005.</em></p>
</div>
<!-- ends center on bottom links-->
</div><!-- end mainbox2-->
<!-- ends bottom center -->
</td></tr></table>
</div>

 
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-216208-1";
urchinTracker();
</script>
</body>
<!-- InstanceEnd --></html>
