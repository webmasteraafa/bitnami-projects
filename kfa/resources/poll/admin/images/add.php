<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>X-Poll | Admin | Images > Upload An Image</title>
<link href="../../css/css.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<?php $page = 'images'; @include ("../template.php"); ?>
	<tr>
		<td colspan="4">
			<table width="100%" border="0" cellspacing="0" cellpadding="2" class="border">
				<tr class="text">
					<td align="center" height="25"><a href="index.php" class="text">Images</a> > <b>Upload An Image</b></td>
				</tr>
			</table>
			<br>
			<?php function complete () { ?>
			<table width="100%"  border="0" cellspacing="0" cellpadding="2" class="border">
				<tr class="text">
					<td align="center" height="25"><meta http-equiv="refresh" content="2;URL=index.php"><b>Success:</b> Your image has been uploaded</td>
				</tr>
			</table>
			<br>
			<?php } function imageupload () { ?>
			<form name="frmUpload" method="post" action="add.php" enctype="multipart/form-data">
			<table width="100%" border="0" cellspacing="0" cellpadding="2" class="border">
				<tr>
					<td>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr class="text">
								<td width="25%" height="25" align="right"><b>Image:</b></td>
								<td align="center" width="75%"><input name="txtImage" type="file" class="text" size="60"<?php if (isset ($_REQUEST['txtImage'])) { echo " value=\"".$_REQUEST['txtImage']."\">"; } ?>></td>
							</tr>
							<tr align="center">
								<td height="25" colspan="2"><input name="stage" type="hidden" value="2"><input name="btnSubmit" type="submit" class="text" value="Finish &gt;&gt;"></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			</form>
			<?php } ?>
		</td>
	</tr>
</table>
<?php 

if (!isset ($_REQUEST['stage'])) {

	imageupload ();
	
} else {

	include ("../../config.php");

	function upload ($filedir, $source, $lastname) {
						
		chmod ($filedir, 0777);
		move_uploaded_file ($source, "$filedir/$lastname");
			
	}
		
	$filename = $_FILES['txtImage']['name'];
	$tempname = $_FILES['txtImage']['tmp_name'];
		
	upload ("../".$dir, $tempname, $filename);
		
	complete ();
	
} 

?>
</body>
</html>