<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/resourcesmain.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Food Allergy Infomation: Tip of the Week</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="allergy information, food allergy, parent resources, food allergy publication, food allergy articles, peanut allergy, dairy free recipes, dairy free, food allergies, POFAK, wheat free recipes, egg free recipes, wheat free, nut free, peanut free, milk free recipes, food allergy recipes, milk allergy, egg allergy" />
<meta name="description" content="Kids With Food Allergies provides allergy information such as food allergy articles, a biweekly newsletter and a biannual magazine for families raising children with food allergies." />
<meta name="classification" content="Nonprofit organization" />
<meta name="revisit-after" content="7 days" />
<meta name="copyright" content="Copyright (c) 2005-2009, Kids With Food Allergies, Inc. All Rights Reserved." />
<link rel="shortcut icon" href="favicon.ico" />

<?php
include ("config.php");
include ("common.php");

?>


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
	  <!-- InstanceBeginEditable name="under menu" --> 
     
	  <!-- InstanceEndEditable --></div><!--endsleftcolumn--></td>
 <td valign="top" width="538" colspan="1">    
<div class="maintextrightR">     
<div class="blueheaderbox"> <h1><!-- InstanceBeginEditable name="title" -->Tip of the Week: Allergy Information for Parents<!-- InstanceEndEditable --></h1>
</div>
<div class="ltgreyboxmainR">

			<!-- #BeginEditable "text" -->
           Kids With Food Allergies provides allergy information and parent resources, such as food allergy articles, a biweekly newsletter and a biannual publication for families raising children with food allergies.<br />
           <br />
           <h2>Tip of the Week</h2>
           
            <?php
	$sql = "select * from resources where current='current'";
	$result = mysql_query( $sql ) or die( mysql_error() );
	
	$row = mysql_fetch_array( $result );
	if ($row['preview'] == 'preview'){
		echo "<h4>". stripslashes($row['title'])."</h4><br />"."<br /><br />";
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

	echo "<br /><br />To view our entire resource library, you must become a <a href='http://kidswithfoodallergies.org/eve/thrive'>KFA Family Member</a>. Sign up today!";
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
      <p align="center" class="style24">Page last updated 03/11/2010</p>
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
pageTracker._trackPageview("Tip of the Week");
} catch(err) {}</script>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
