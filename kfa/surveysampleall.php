<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Survey Results</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="js/main.css" rel="stylesheet" type="text/css">
</head>
<?php
	$id = $_REQUEST['id'];
	$id = ereg_replace("[^0-9]", "", $id);
	if($id == "") $id = '43';
	include("config.php");
	$sql = "select * from cookrating where id='$id'";
	$result = mysql_query( $sql ) or die( mysql_error() );
	if( mysql_num_rows( $result ) > 1 ) die( "Query unexpectedly returned more than one result: " . $sql );
	$row = mysql_fetch_array( $result ) or die( mysql_error() );
?>
<body>
<table width="798" border="0" cellspacing="0" cellpadding="0" class="style24">
  <tr>
    <td colspan="2"><strong>Survey Results for <span class="stylebig"><br>
    "<?php echo stripslashes($row['bookname']);?>"</span> </strong></td>
  </tr>
  <tr>
    <td><strong>by <?php echo stripslashes($row['author']);?>. <?php echo stripslashes($row['publication']);?>.</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Rating: </strong><?php echo stripslashes($row['ratingave']);?> out of 5</td>
    <td><strong>Total Votes: </strong><?php echo stripslashes($row['noresponses']);?> </td>
  </tr>
  <tr>
    <td width="331" rowspan="2" valign="top"><br>      
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
    </table><br><table width="100%"  border="0" cellspacing="5" cellpadding="0">
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
</table></td>
    <td width="467"><strong>Comments</strong>:</td>
  </tr>
  <tr>
    <td valign="top"><ul>
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
	</ul>
     </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td valign="top">&nbsp; </td>
  </tr>
  <tr>
    <td colspan="2"><div align='center'>
	      <p><span class="stylebig"><strong>The Survey Rating for this book is </strong><?php echo stripslashes($row['ratingave']);?> out of 5</span><br>
            <span class="style24">Results from KFA survey conducted February 2008</span> <br>
	<?php
	$book = stripslashes($row['bookname']);
						echo "<br><div align='center'>";
				$rater_id=$id;
				$rater_item_name=$book;
				include("http://kidswithfoodallergies.org/bookrate/rating.php");
				echo "<br></div>";
				?>
    </div></td>
  </tr>
</table>
</body>
</html>
