<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Survey Results</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="js/main.css" rel="stylesheet" type="text/css">

<?php
	$id = $_REQUEST['id'];
	$id = ereg_replace("[^0-9]", "", $id);
	if($id == "") $id = '43';
	?>
    
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=bookrate/surveysample.php?id=<?php echo $id;?>">


</head>
</body>
</html>
