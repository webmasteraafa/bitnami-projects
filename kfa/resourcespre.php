<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/resourcesmain.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<?
		include ("config.php");
			include ("common.php");
	$id = $_REQUEST['id'];
	//echo $id;
	$sql = "select * from resources where id='$id'";
	$result = mysql_query( $sql ) or die( mysql_error() );
	
	$row = mysql_fetch_array( $result );
if ($row['pagetitle']){
?>
<title><? echo stripslashes($row['pagetitle']);?></title>
<?
}else {
?>
<title>Parent Resources: Kids With Food Allergies</title>
<?
}
if ($row['keywords']){
?>
<meta name="keywords" content="<? echo $row['keywords'];?>" />
<?
}else {
?>
<meta name="keywords" content="peanut allergy, dairy free recipes, dairy free, food allergies, food allergy, POFAK, wheat free recipes, egg free recipes, wheat free, nut free, peanut free, milk free recipes, food allergy recipes, milk allergy, egg allergy" />
<?
}
if (stripslashes($row['descrip'])){
?>
<meta name="description" content="<? echo stripslashes($row['descrip']);?>" />
<?
}else {
?>
<meta name="description" content="Nonprofit organization providing online support groups, recipes, parent education and news for families raising children with food allergies" />
<?
}
if ($row['zoomimage'] != '') echo "<meta name=\"zoomimage\" content=\"http://www.kidswithfoodallergies.org/zoomimg/".$row['zoomimage']."\">";

?>



<!-- InstanceEndEditable -->
<meta name="copyright" content="Copyright (c) 2005-2012, Kids With Food Allergies Foundation. All Rights Reserved." />
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="classification" content="Nonprofit organization" />
<link rel="alternate" type="application/rss+xml"
	title="Kids With Food Allergies" href="http://feeds2.feedburner.com/kidswithfoodallergies" />

<link href="http://www.kidswithfoodallergies.org/js/main.css" rel="stylesheet" type="text/css" />
<link href="http://www.kidswithfoodallergies.org/js/images.css" rel="stylesheet" type="text/css" />
<link href="http://www.kidswithfoodallergies.org/js/forms.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="favicon.ico" />
<script type="text/javascript" language="javascript" src="http://www.kidswithfoodallergies.org/js/menu.js"></script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "d1cb1749-92cb-45bf-b8fe-7146fdb014fb"}); </script>
</head>
<body>
<?php
include ("header-resources.php");
?>
	  <!-- InstanceBeginEditable name="under menu" --> 
<!-- InstanceEndEditable --></div><!--endsleftcolumn--></td>
 <td valign="top" width="538" colspan="1">    
<div class="maintextrightR">     
<div class="blueheaderbox"> <h1><!-- InstanceBeginEditable name="title" -->
		Food Allergy Resources<!-- InstanceEndEditable --></h1>
</div>
<div class="ltgreyboxmainR">

			<!-- #BeginEditable "text" -->
<?php
	
	$id = $_REQUEST['id'];
	//echo $id;
	$sql = "select * from resources where id='$id'";
	$result = mysql_query( $sql ) or die( mysql_error() );
	
	$row = mysql_fetch_array( $result );
	if ($row['preview'] == 'preview'){
		echo "<h4>". stripslashes($row['title'])."</h4>
		<table width='497'><tr><td align='left'>".$row['date']." </td><td align='right'>
		
		
		
		
	
<br /><span class='st_facebook_large' displayText='Facebook'></span>
<span class='st_twitter_large' displayText='Tweet' st_via='kfatweets' st_msg='#foodallergy'></span>
<span class='st_googleplus_large' displayText='Google +'></span>
<span class='st_linkedin_large' displayText='LinkedIn'></span>
<span class='st_pinterest_large' displayText='Pinterest'></span>
<span class='st_blogger_large' displayText='Blogger'></span>
<span class='st_email_large' displayText='Email'></span>
<br />
<span class='st_fbrec_large' displayText='Facebook Recommend'></span>
<span class='st_fblike_large' displayText='Facebook Like'></span>

		
		
		
		</td></tr></table><br /><br />";
		if ($row['show_all'] == 'part') {
		
		}else {
		$resources = $row['resources'];
		}

		if ($row['add_html'] == 'html') {
			echo stripslashes($resources);
			//echo "hello world";
		} else {
			$resources = str_replace("\n", "<br />", $resources);
			echo stripslashes($resources);
		}

		
		echo "<br /><br /><br /><br /><div align=\"center\"><div style=\"border-width: 1px; border-style: solid; border-color: #3F679B; background-color: #D5E6F6; padding:2px; width:480px;text-align:center;\">Kids With Food Allergies is a nonprofit charity.  More than 80% of KFA's financial support comes from donors like you.  If KFA has helped you in some way, please <a href='https://www.kidswithfoodallergies.org/donate.html'>make a donation</a> to support our work.</div></div>";



	} else {
		echo "<b>This resource is not one you can preview.</b>";
		echo "<br /><br />To have access to this article, you must become a Family Member - <a href='https://www.kidswithfoodallergies.org/membership_purchase.html'>click here</a> to subscribe!  KFA Family Members enjoy many benefits such as accessing premium educational articles, full access to our collection of allergy-free recipes, an invitation to our private social network to help you find friends in your area, a subscription to Support Net and more!";
	}

?>


            <!-- #EndEditable --></div>
</div><!--endsmaincolumn-->
</td></tr></table>
</div><!--endsmainbox-->
</td>
</tr>

<tr><td>
  <div align="center" class="style24">
<!-- #BeginEditable "date" -->
      <p align="center" class="style24">Page last updated 7/29/2012</p>
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
pageTracker._trackPageview("<?php echo $row['googlecode'];?>");
} catch(err) {}</script>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
