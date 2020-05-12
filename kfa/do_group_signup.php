<?php
if (sizeof($_POST) == 0) {
  header("Location: groups.php");
  exit();
}
?>
<!--
     do_group_signup.php
     This file takes in the values from the form filled out by the user in the
     group_signup.php file, and then creates a new row in the SEARCH_GROUPS
     table with the approval values set to the automatic approval code in the 
     SEARCH_CONFIG table.  The administrator would then verify the new group''s
     information and if it is valid then he/she would set the approval field 
     for that group to one, and notify that group. -->
 
<!-- Entering PHP script -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/resourcesmain.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" --><title>Add a Support Group</title>

<meta name="Keywords" content="peanut allergy, dairy free recipes, dairy free, food allergies, food allergy, POFAK, wheat free recipes, egg free recipes, wheat free, nut free, peanut free, milk free recipes, food allergy recipes, milk allergy, egg allergy" />
<meta name="Description" content="Kids With Food Allergies provides allergy information and parent resources, such as food allergy articles, a monthly newsletter and a quarterly publication for families raising children with food allergies." />
<meta name="revisit-after" content="7 days" />
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
	  
<div class="pinkleftbox">subscribe to our rss</div>            
<div class="ltgreybox186">
<div align="left" class="style12" style="clear"><a href="http://feeds.feedburner.com/kidswithfoodallergies" rel="alternate" type="application/rss+xml" class="right" style="padding-right:3px"><img src="http://www.feedburner.com/fb/images/pub/feed-icon16x16.png" alt="Subscribe to KFA RSS" class="mybuggyelement" border="0"/></a>
Subscribe to Kids With Food Allergies, and receive instant food allergy news, food allergy recall alerts, allergy articles, and press releases all in one easy location.

<p>  KFA alerts can be added to a &quot;reader&quot; of your choice, to your browser bookmarks, or to email.</p>
</div> 
        
      <div align="center"><a href="http://feeds.feedburner.com/kidswithfoodallergies" rel="alternate" type="application/rss+xml" class="style19">Subscribe in a reader</a><br /><br />
       <a href="http://fusion.google.com/add?feedurl=http://feeds.feedburner.com/kidswithfoodallergies"><img src="http://buttons.googlesyndication.com/fusion/add.gif" width="104" height="17" style="border:0" alt="Add to Google Reader or Homepage"/></a><br /><br />
      <a href="http://add.my.yahoo.com/rss?url=http://feeds.feedburner.com/kidswithfoodallergies" title="Kids With Food Allergies"><img src="http://us.i1.yimg.com/us.yimg.com/i/us/my/addtomyyahoo4.gif" alt="" style="border:0"/></a><br /> <br />
        <a href="http://feeds.my.aol.com/add.jsp?url=http://feeds.feedburner.com/kidswithfoodallergies"><img src="http://myfeeds.aolcdn.com/vis/myaol_cta1.gif" alt="Add to My AOL" style="border:0"/></a><br /><br />
        
        <a href="http://www.bloglines.com/sub/http://feeds.feedburner.com/kidswithfoodallergies" title="Kids With Food Allergies" type="application/rss+xml"><img src="http://www.bloglines.com/images/sub_modern11.gif" alt="Subscribe in Bloglines" style="border:0"/></a><br /><br />
        <a href="http://www.newsgator.com/ngs/subscriber/subext.aspx?url=http://feeds.feedburner.com/kidswithfoodallergies" title="Kids With Food Allergies"><img src="http://www.newsgator.com/images/ngsub1.gif" alt="Subscribe in NewsGator Online" style="border:0"/></a><br />
</div>     
</div><!-- InstanceEndEditable --></div><!--endsleftcolumn--></td>
 <td valign="top" width="538" colspan="1">    
<div class="maintextrightR">     
<div class="blueheaderbox"> <h1><!-- InstanceBeginEditable name="title" -->Parent Education Resources: Allergy Information<!-- InstanceEndEditable --></h1>
</div>
<div class="ltgreyboxmainR">

			<!-- #BeginEditable "text" -->
			<? include("defs.php");
            //$state = $_REQUEST["location"];

/* Import all of the variables from the form in group_signup.php */
import_request_variables('p', '');
$location2 = validateinput($location2);
$name = validateinput($name);
$audience = validateinput($audience);
$focus = validateinput($focus);
$location = validateinput($location);
$meetings = validateinput($meetings);
$coordinator = validateinput($coordinator);
$areacode = validateinput($areacode);
$three_digit_ph = validateinput($three_digit_ph);
$four_digit_ph = validateinput($four_digit_ph);
$email = validateinput($email);
$website = validateinput($website);
$state = validateinput($state);
$physician = validateinput($physician);
$affiliated = validateinput($affiliated);
$faan_list = validateinput($faan_list);
$description = validateinput($description);

/* Concatenate the values from the three text boxes in group_signup.php that
   represent the phone number */
$phone = $areacode.$three_digit_ph.$four_digit_ph;
 
/* determine whether or not to auto-approve groups */
$apprvQuery = "SELECT auto_approve_groups
               FROM SEARCH_CONFIG
               LIMIT 1";

$approvalCode = mysql_query($apprvQuery);

$row = mysql_fetch_array($approvalCode, MYSQL_ASSOC);
if($row["auto_approve_groups"] == 1) {
  $approve = 1;
} else {
  $approve = 0;
}

$safe_name = mysql_real_escape_string(stripslashes($name));
$safe_area = mysql_real_escape_string(stripslashes($area));
$safe_audience = mysql_real_escape_string(stripslashes($audience));
$safe_focus = mysql_real_escape_string(stripslashes($focus));
$safe_location = mysql_real_escape_string(stripslashes($location));
$safe_location2 = mysql_real_escape_string(stripslashes($location2));
$safe_meetings = mysql_real_escape_string(stripslashes($meetings));
$safe_coordinator = mysql_real_escape_string(stripslashes($coordinator));
$safe_phone = mysql_real_escape_string(stripslashes($phone));
$safe_email = mysql_real_escape_string(stripslashes($email));
$safe_website = mysql_real_escape_string(stripslashes($website));
$safe_description = mysql_real_escape_string(stripslashes($description));
$mydate = date("Y-m-d");

$sql = "SELECT name
        FROM SEARCH_GROUPS
        WHERE name = '$safe_name'";

$res = mysql_query($sql);
$count = mysql_num_rows($res);
/* Create a new row in the SEARCH_GROUPS table with the values passed in from
   group_signup.php */
$query = "INSERT INTO SEARCH_GROUPS (name, area, audience, focus, location, location2, 
            meetings, coordinator, phone, email, website, state, approved,
            id, physician, affiliated, faan_list, description, date) 
            values ('$safe_name', '$safe_area', '$safe_audience', 
                    '$safe_focus', '$safe_location', '$safe_location2', '$safe_meetings', 
                    '$safe_coordinator', '$safe_phone', '$safe_email',
                    '$safe_website','$state', $approve, NULL, '$physician', '$affiliated', '$faan_list', '$safe_description', '$mydate')";

    	    
if ($count == 0) {
  $result = mysql_query($query);
  //echo "Error message = ".mysql_error(); 
} else {
  $message = "A support group already exists with the name, $safe_name!  
        Please press the back button and fill out the form again with a different name.";
?>
  <table align='top' width='100%' border='0' class="style19">
     <tr>
        <td align='center'> <b><h2> Support Group Application </h2></b>
     </td>
     </tr>
     <tr><td align='center'><br> * <?php echo $message ?> </td></tr>
  </table>
      <br>


    <table align = 'top' width = '100%' class="style19">
    <br>
    <br>
    <tr> 
     <td align='center'>  </td>
     <form action="groups.php">
       <td align='center'><input class='search-submit' type="submit" 
       value="Go Back to Groups"></td>
     </form>
   </tr>
</table>
<?php } ?>
<!-- Exiting PHP script 

A notification message upon the submission of a valid search group -->
<?php
if ($count == 0) {
  echo "<table>";
  if ($approve == 0) {
  ?>
 <tr> <td class="style19"> Thank you for your submission.  The creation of your group, 
	   <?php echo $name; ?>, is being processed, and you will recieve a 
	   notification to the email address, <?php echo $email; ?>.
	   <?php
  } else {
  ?>
 <tr> <td class="style19"> Thank you for your submission.  Your group named, 
	   <?php echo $name ?>, was created. 
	   
<br>
<br>
 </td> </tr>
<form action="groups.php">
<tr>
<td align='center'><input class='search-submit' type='submit' value='Go Back To Groups'></td>
</tr>

<!-- mysql_real_escape_string("variablename"); -->
<?php
    } 
  echo "</table>";
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
      <p>Page last updated 1/30/2008</p>
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
