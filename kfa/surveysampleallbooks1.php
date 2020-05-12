<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/resourcesmain.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" --><title>Food Allergy Cookbook Survey</title>

<meta name="Keywords" content="peanut allergy, dairy free recipes, dairy free, food allergies, food allergy, POFAK, wheat free recipes, egg free recipes, wheat free, nut free, peanut free, milk free recipes, food allergy recipes, milk allergy, egg allergy" />
<meta name="Description" content="Kids With Food Allergies conducted a survey about food allergy cookbooks in February 2008.  These results are available to consumers to help them find quality cookbooks for food allergies." />
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
Subscribe to Kids With Food Allergies, and receive weekly food allergy news, food allergy recall alerts, allergy articles, and press releases all in one easy location.

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
<div class="blueheaderbox"> <h1><!-- InstanceBeginEditable name="title" -->KFA Food Allergy Cookbook Survey February 2008 <!-- InstanceEndEditable --></h1>
</div>
<div class="ltgreyboxmainR">

			<!-- #BeginEditable "text" -->
<?php
	include("config.php");
	$sql = "select * from cookrating order by ratingave + 0 DESC";
	$result = mysql_query( $sql ) or die( mysql_error() );
	//if( mysql_num_rows( $result ) > 1 ) die( "Query unexpectedly returned more than one result: " . $sql );
	while ($row = mysql_fetch_array( $result ) or die( mysql_error() )){
		$id = $row['id'];
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="style24">
  <tr>
    <td colspan="3"><strong>Survey Results for</strong> <br />
      <h2>&quot;<?php echo stripslashes($row['bookname']);?>&quot;</h2> </td>
  </tr>
  <tr>
    <td><strong>by <?php echo stripslashes($row['author']);?>. <?php echo stripslashes($row['publication']);?>.</strong></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="331"><strong>Rating: </strong><?php echo stripslashes($row['ratingave']);?> out of 5</td>
    <td colspan="2"><strong>Total Votes: </strong><?php echo stripslashes($row['noresponses']);?> </td>
  </tr>
  <tr>
    <td colspan="3" valign="top"><br />      
      <table width="250"  align="center" border="1" cellpadding="0" cellspacing="0" bordercolor="#E1E1E1" bgcolor="#FFFFFF">
      <tr>
	  <?php
	  $unsuitable = round(stripslashes($row['unsuitable']));
	  $poor = round(stripslashes($row['poor']));
	  $fair = round(stripslashes($row['fair']));
	  $good = round(stripslashes($row['good']));
	  $excellent = round(stripslashes($row['excellent']));
	  ?>
        <td valign="bottom">
		<?php //put if it is 0 then not show table in there
		if ($unsuitable == 0) {
		}else {
		?>
		<table width="100%"  border="0" cellspacing="0" cellpadding="0"  height="<?php echo $unsuitable; ?>" bgcolor="#CC3300">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
	<?php
	}
	?>
</td>
        <td valign="bottom">
		<?php //put if it is 0 then not show table in there
		if ($poor == 0) {
		}else {
		?>
		<table width="100%"  border="0" cellspacing="0" cellpadding="0" height="<?php echo $poor; ?>"  bgcolor="#D856A0" >
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
	<?php
	}
	?>
	</td>
        <td valign="bottom">
		<?php //put if it is 0 then not show table in there
		if ($fair == 0) {
		}else {
		?>
		<table width="100%"  border="0" cellspacing="0" cellpadding="0" height="<?php echo $fair; ?>"  bgcolor="#6699CC" >
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
	<?php
	}
	?>
</td>
        <td valign="bottom">
          <?php //put if it is 0 then not show table in there
		if ($good == 0) {
		}else {
		?>
		<table width="100%"  border="0" cellspacing="0" cellpadding="0" height="<?php echo $good; ?>"  bgcolor="#8156D8" >
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table>
		  <?php
		  }
		  ?>
		  </td>
        <td valign="bottom">
		<?php //put if it is 0 then not show table in there
		if ($excellent == 0) {
		}else {
		?>
		<table width="100%"  border="0" cellspacing="0" cellpadding="0" height="<?php echo $excellent; ?>"   bgcolor="#00885B" >
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
	<?php
	}
	?>
</td>
      </tr><tr>
        <td>&nbsp; <?php echo $unsuitable;?>% &nbsp;</td>
        <td>&nbsp; <?php echo $poor;?>% &nbsp;</td>
        <td>&nbsp; <?php echo $fair;?>% &nbsp;</td>
        <td>&nbsp; <?php echo $good;?>% &nbsp;</td>
        <td>&nbsp; <?php echo $excellent;?>% &nbsp;</td>
      </tr>
    </table><br /><table width="100%"  border="0" cellspacing="5" cellpadding="0">
  <tr>
    <td width="20" bgcolor="#CC3300">&nbsp;</td>
    <td width="298" > Unsuitable for those dealing with food allergies </td>
  </tr>
  <tr>
    <td  bgcolor="#D856A0">&nbsp;</td>
    <td> Poor, not useful </td>
  </tr>
  <tr>
    <td bgcolor="#6699CC">&nbsp;</td>
    <td> Fair, somewhat useful </td>
  </tr>
  <tr>
    <td  bgcolor="#8156D8">&nbsp;</td>
    <td> Good cookbook, useful </td>
  </tr>
  <tr>
    <td  bgcolor="#00885B">&nbsp;</td>
    <td> Excellent cookbook, very useful </td>
  </tr>
</table>    <div align="right"></div></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;   </td>
  </tr>
  <tr>
    <td colspan="3" ><div align="center">
      <p align="left"><strong>Comments</strong>:</p>
    </div></td>
  </tr>
  <tr>
    <td colspan="3" ><ul>
	<?php
	$sql2 = "SELECT * FROM comments WHERE bookid=$id";
	$result2 = mysql_query( $sql2 ) or die( "Error querying edge type list: " . mysql_error() . " Query: $sql2 " );
	while( $row2 = mysql_fetch_array( $result2 ) )
		{	
			echo "<li>";
			echo stripslashes($row2['comment']);
			echo "</li>";
		
		}
	?>
	</ul></td>
  </tr>
  <tr>
    <td colspan="3" >&nbsp; </td>
  </tr>
  <tr>
    <td colspan="3" ><div align="center"><span class="stylebig"><strong>The Survey Rating for this book is </strong><?php echo stripslashes($row['ratingave']);?> out of 5</span><br />
          <span class="style24">Results from KFA survey conducted February 2008</span> <br />
      </div>
      <?php
	
						echo "<br><div align='center'>";
				
				echo "<a href='bookrate/surveysample.php?id=".$id."' target='_blank'>Click Here to Rate this book</a>";
				echo "<br></div>";
				?>
      <div align="center"></div></td>
  </tr>
  <tr>
    <td colspan="3" ><br />
<hr /><br />
</td>
  </tr>
</table>
<?php
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
      <p>Page last updated 03/29/2009</p>
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
