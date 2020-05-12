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
   // echo "<meta http-equiv=\"Refresh\" CONTENT=\"0; URL=http://kidswithfoodallergies.org/resources/resourcesnew.php\">";
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
<title>Support Net for Family Members</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Keywords" content="peanut allergy, dairy free recipes, dairy free, food allergies, food allergy, POFAK, wheat free recipes, egg free recipes, wheat free, nut free, peanut free, milk free recipes, food allergy recipes, milk allergy, egg allergy" />
<meta name="Description" content="Nonprofit organization providing online support groups, recipes, parent education and news for families raising children with food allergies" />
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW" />

<script language="JavaScript" type="text/javascript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0  
	window.open(theURL,winName,features);
  return false;
}//-->
</script>

<?php
include ("config.php");
include ("common.php");
?><!-- InstanceEndEditable -->
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
		Support Net &trade;: A Food Allergy e-Magazine<!-- InstanceEndEditable --></h1>
</div>
<div class="ltgreyboxmainR">

			<!-- #BeginEditable "text" -->
Your Family Membership subscription benefits include a twice yearly issue of our e-publication, the Kids With Food Allergies <em>Support Net&trade;</em>. <br /><br />

<p><strong>In the <a href="SupportNetSpring2009.pdf" target="_blank">Spring 2009</a> issue:</strong></p>
<img src="http://www.kidswithfoodallergies.org/images/supportnetspring09.gif" class="right" alt="Money Saving Secrets"/>
<ul style="line-height:1.15">
  <li><strong>Hot Stuff!</strong> - Recent research has shown that some allegenic foods are 
    tolerable when heated. Find out what the latest studies are all about, and 
    what this does - and doesn't mean - for your child right now.</li>
  <li><strong>Money Saving Secrets from the Coupon Queen</strong> - Tulsa Oklahoma's Coupon 
    Queen, Sarah Roe tells how she turned to couponing to lower her grocery 
    bills afer her son was diagnosed with multiple food allergies.</li>
  <li><strong>KFA's Rising Star</strong> - Meet Blake, age 5, who is so happy with the new 
    foods he can eat after he passed some oral food challenges during a recent 
    stay at National Jewish Research Center in Denver.</li>
</ul>
<p><strong>In the<a href="SupportNetFall08.pdf" target="_blank"> Fall 2008</a> issue:</strong></p>
<img src="http://www.kidswithfoodallergies.org/images/supportnetfall08.jpg" class="right" alt="Back to School Issue"/>
<ul style="line-height:1.15">
     <li><strong>Take steps to ensure your child has a safe school year</strong> - Educational rights advocate Ellie       Goldberg, M.Ed., says school planning and partnering is the most effective       way to keep your child safe. </li>
     <li><strong>Allergist ABC&rsquo;s</strong> &ndash; An interview with pediatric allergist Mike Pistiner,       M.D., reveals the role of a child's allergist in back-to-school planning. </li>
     <li><strong>KFA's Rising Star</strong> - Meet Ruthie, age 4, whose multiple food allergies  haven&rsquo;t dampened her outgoing spirit one bit. </li>
</ul>
<br />
<br />
<div align="center"></div>
<p><strong>In the <a href="SupportNetSpring08.pdf" target="_blank">Spring 2008</a> issue:</strong></p>
<img src="http://www.kidswithfoodallergies.org/images/SupNetSpring2008.jpg" class="right" alt="Holidays, Epinephrine, and more"/>
<ul style="line-height:1.15">
  <li><strong>Rising Star</strong> - Meet 6-year-old twins, and food  allergy buddies, Audrey and Lillian. </li>
  <li><em><strong>Seeking a Solution</strong></em><em><strong> </strong></em><strong>- </strong>Mary Klinnert, Ph.D., a psychologist from  National Jewish Medical Center, explains the normal levels of stress for a  child&mdash;and when you should seek professional help. </li>
  <li><em><strong>11 Ways to Organize - </strong>Tips to help you o</em>rganize your home and keep your food-allergic child  safe.</li>
  </ul>
<br />
<br />
<div align="center">
  <div align="center"></div>
</div>
<p><strong>In the <a href="SupportNetWinter07HB.pdf" target="_blank">Winter 2007</a> issue:</strong></p>
<a href="SupportNetWinter07HB.pdf" target="_blank"> <img src="http://www.kidswithfoodallergies.org/images/supnetdec2007.jpg" class="right" alt="Holidays, Epinephrine, and more"/></a>
           <ul style="line-height:1.15">
               <li><strong>Enjoying       the holidays while dealing with the emotional challenges of a restricted       diet</strong> - An       excerpt from <em>Why Can't I Eat That!       Helping Kids Obey Medical</em> <em>Diets</em> by John F. Taylor, Ph.D. and R. Sharon Latta. </li>
               <li><strong>A single life-saving shot of       epinephrine</strong> -       Hearing these words changed one mom's life. </li>
               <li><strong>Rising Star</strong> -  Corrine, age 10, takes good care of her own food allergies&mdash;and helps care for  her younger sibs' allergies, too. </li>
           </ul>
           <br /><br />



 <p><strong>In the <a href="KWFAnewsletterfall2007FINAL.pdf" target="_blank">Fall 2007</a> issue:</strong></p>
              <ul style="line-height:1.15"><li><strong>Rising Star - </strong>Meet 5-year-old Ian, an incredible boy with an  incredible spirit.</li>
<a href="KWFAnewsletterfall2007FINAL.pdf" target="_blank"><img src="http://www.kidswithfoodallergies.org/images/KWFAnewsletterfall20071.jpg" class="right" alt="School planning for food allergic children" /></a>
   <li><strong>Managing food allergies at school -</strong> Allergy specialist Paul J.       Hannaway, M.D., author of &quot;On the Nature of Food Allergy,&quot;       discloses tips for parents to keep food-allergic children safe at school. </li>
              <li><strong>Finding the right daycare or preschool</strong> <strong>for a food  allergic child - </strong>Parent-tested strategies for finding a preschool that will  keep your child safe and allow him or her to thrive.              </li>
              </ul>
              <br /><br />



<strong>In the <a href="SupportNetSummer07HB.pdf" target="_blank">Summer 2007</a> issue:</strong>
  <ul style="line-height:1.15"><li><strong>Rising Star</strong> - Meet Madeline, whose positive attitude helps her  overcome food allergy fears.</li>
<a href="SupportNetSummer07HB.pdf" target="_blank"><img src="../images/supportnetsum07.jpg" width="100" height="129" class="right" alt="enteral tubes, food allergy fears, alternative treatments for food allergies" /></a>
<li><strong>Debunking Alternative  Tests &amp; Therapies -</strong> Robert Wood, M.D., food allergy expert and author of<strong> </strong><a href="http://www.amazon.com/Food-Allergies-Dummies-Robert-Wood/dp/0470095849/ref=pd_bbs_sr_1/105-8916425-5706814?ie=UTF8&amp;s=books&amp;qid=1181685364&amp;sr=1-1/kidswithfooda-20">Food Allergies for Dummies</a>, shares his       insights on alternative treatments and tests for food allergies. </li>
<li><strong>Tips for Traveling with Food       Allergies</strong> -       Parent-tested strategies for making your trips away from home worry-free. </li>
<li><strong>Tubey Monkeys</strong> - Some of our children with stomach       tubes share stories about their new and special fuzzy friends. </li>
  </ul>
<br />
<br />

<br />
 <strong>In the <a href="SupportNetSpring07LB.pdf" target="_blank">Spring 2007</a> issue:</strong>
</p>
 <ul style="line-height:1.15"><li><strong>Rising Star</strong> - Meet funny little Jay, age 4.</li><a href="SupportNetSpring07LB.pdf" target="_blank"><img src="../images/supportnetspring07.jpg" width="100" height="129" class="right" alt="Nutrition and food allergies" /></a>
   <li><strong>The       Rise in Childhood Allergies - </strong><strong>F</strong>acts and theories regarding the       startling rise in childhood allergies&mdash;and it impacts children and their       families. </li>
   <li><strong>Is Your Dietitian the Right Fit? - D</strong>eb Indorato, RD, LDN, member of KFA&rsquo;s Medical Advisory  Team, explains how to find a dietitian who specializes in food allergies. </li>
 </ul>
 <br /><br />
<br />
<br />

<strong>In the <a href="SupportNetWinter06LB.pdf" target="_blank">Winter 2006</a> issue:</strong>
<a href="SupportNetWinter06LB.pdf" target="_blank"><img src="../images/supportnetwinter06.gif" width="100" height="129" class="right" /></a>
<ul style="line-height:1.15">
   <li><strong>Rising       Star - </strong><strong>M</strong>eet       a budding herpetologist. </li>
   <li><strong>Raising a well-adjusted child</strong> - Linda Coss, author of two books on food allergy,       shares advice on how to raise a child who happens to have food allergies. </li>
   <li><strong>Holidays on an elimination diet</strong> - Breastfeeding a child with food       allergies can be especially challenging around the holiday season.</li>
   <li><strong>Tips  for surviving the holidays</strong> &ndash; Ideas that have  worked for KFA families </li>
</ul>
<br />
<br />
<br />


<strong>In the <a href="KWFAsupportnewfall06.pdf" target="_blank">Fall 2006</a> issue:</strong><a href="KWFAsupportnewfall06.pdf"><img src="../images/supportnetfall06.gif" width="100" height="129" class="right"/></a>
<ul style="line-height:1.15">
     <li><strong>Rising       Star</strong> &ndash; A       future scientist shoots for the stars. </li>
     <li><strong>School Planning Key for Allergic       Kids</strong> - The       process may not be easy or stress-free, but planning prepared one family       for any possible difficulty.<strong></strong></li>
     <li><strong>Halloween Can Be a Witches&rsquo; Brew</strong>- Plan ahead to keep your allergic little pumpkin       safe from scary stuff. </li>
     <li><strong>A  Teacher's perspective</strong> &ndash; One educator finds that open communication is key to  keeping kids safe. </li>
</ul>
<br />
   <br /><br />
   
<strong>In the <a href="SupportNetSummer06HB.pdf" target="_blank">Summer 2006</a> issue:</strong><a href="SupportNetSummer06HB.pdf"><img src="../images/snsummer06.gif" width="100" height="130" class="right" /></a>
</p>
<ul style="line-height:1.15">
   <li><strong>Anxious About Food Allergies? You're       Not Alone - </strong>More       than 11 million people suffer from food allergies. </li>
   <li><strong>Rising       Star - </strong>Meet a       true star on ice<strong>.</strong> </li>
   <li><strong>Parents  Making a Difference: The Food Allergy Project</strong> &ndash;  The Food Allergy Project calls on the federal government to increase the  desperately-required funding for millions of American children. </li>
</ul>
<br />

<br />
<br />
These issues are in pdf format, which will require Adobe Acrobat Reader (free). You can download it <a href="http://www.adobe.com/products/acrobat/readstep2.html" rel="nofollow">here</a> if you do not already have the Reader installed on your computer: 
<br />
<br />
Please let us know if you have any difficulties downloading the document, or if you have any comments about our publications.
<br />
Please <a class="style30" href="../email.php?to=webmaster;" onclick="MM_openBrWindow('../email.php?to=webmaster','','width=500,height=500');return false">Email</a> us with any problems.<!-- #EndEditable --></div>
</div><!--endsmaincolumn-->
</td></tr></table>
</div><!--endsmainbox-->
</td>
</tr>
<!--</table><table align="center" border="0">-->
<tr><td>
  <div align="center" class="style24">
<!-- #BeginEditable "date" -->
      <p align="center" class="style24">Page last updated 2/27/2009</p>
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
pageTracker._trackPageview("<?php echo $row['googlecode'];?>");
} catch(err) {}</script>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
