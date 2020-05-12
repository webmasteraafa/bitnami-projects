<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Email - Kids With Food Allergies</title>
<?php
include ("config.php");
$to = $_REQUEST['to'];


if ($to == 'lynda') $salesemail = 'lmitchell@kidswithfoodallergies.org';
if ($to == 'lynda') $salesname = 'Lynda Mitchell';
if ($to == 'veronica') $salesemail = 'webmaster@kidswithfoodallergies.org';
if ($to == 'veronica') $salesname = 'Veronica Broadley';
if ($to == 'danielle') $salesemail = 'deestricky1@yahoo.com';
if ($to == 'danielle') $salesname = 'Danielle Keblaitis';
if ($to == 'webmaster') $salesemail = 'webmaster@kidswithfoodallergies.org';
if ($to == 'webmaster') $salesname = 'Webmaster';
if ($to == 'info') $salesemail = 'info@kidswithfoodallergies.org';
if ($to == 'info') $salesname = 'Information';
if ($to == 'heather') $salesemail = 'h.abbott@cpubroadband.net';
if ($to == 'heather') $salesname = 'Heather Abbott';
if ($to == 'nicole') $salesemail = 'nicole@allergicchild.com';
if ($to == 'nicole') $salesname = 'Nicole Smith';
if ($to == 'janet') $salesemail = 'jburns@kidswithfoodallergies.org';
if ($to == 'janet') $salesname = 'Janet Burns';


?>

<!--------------------------------------------------------------------------->
<!-- Insert function and stylesheet -->
<link rel="stylesheet" type="text/css" href="js/main.css" title="mainstyles">
<!--------------------------------------------------------------------------->
<script>
function checkRequired(myform, vals) {
	for (i=0; i< vals.length; i++) {
		if (myform.elements[vals[i]].value == "") {
			alert("The " + myform.elements[vals[i]].name + " field is required. Please fill out all required fields and try again.");
			myform.elements[vals[i]].focus()
			return false;
		}
	}
	return true;
}

function validate() {
	if (!checkRequired(document.MainForm, new Array('name','email','body','email2'))) {
		return false;
	}
	 if (document.MainForm.email.value != document.MainForm.email2.value) 
	{
		 alert("Please check your email address, the two Email addresses are not the same.");
		 document.MainForm.email.focus();
		 return (false); 
	}
	return true;
}



</script>
<link href="js/main.css" rel="stylesheet" type="text/css">

</head>

<body  TOPMARGIN="0" LEFTMARGIN="0" MARGINWIDTH="0" MARGINHEIGHT="0" HSPACE="0" VSPACE="0">


<!-- start my code -->

	<table width=100% cellspacing="10" cellpadding="10">
	<tr><td width=100% valign="top"> 

	<form method="POST" action="emailformtest.php" name="MainForm" id="MainForm" onSubmit="return validate()">
	<input type="hidden" name="formname" value="Email">

<table class="style27" border="0" width="450" cellspacing="0" cellpadding="2">
  <tr>
    <td width="180" class="style27" align="right"><b>To:&nbsp;</b></td>
    <td width="270" class="style27"><?echo $salesname; ?>
	<input type="hidden" name="to" id="to" ALIGN="bottom" value="<? echo $to;?>" ></td>
  </tr>
  <tr>
    <td align="right"><b>Your Name*&nbsp;&nbsp;</b></td>
    <td><input name="name" id="name" ALIGN="bottom" SIZE="40" MAXLENGTH="60" ></td>
  </tr>
  <tr>
    <td align="right"><b>Your E-mail Address*&nbsp;&nbsp;</b></td>
    <td ><input name="email" id="email" ALIGN="bottom" SIZE="40" MAXLENGTH="150" ></td>
  </tr>
  <tr>
    <td align="right"><b>Verify Your E-mail Address*&nbsp;&nbsp;</b></td>
    <td ><input name="email2" id="email2" ALIGN="bottom" SIZE="40" MAXLENGTH="150" ></td>
  </tr>
  <tr>
    <td align="right"><b>Subject&nbsp;&nbsp;</b></td>
    <td >
		<? 
			if ($subject) {
				echo $subject;
				echo "<input type='hidden' name='subject' id='subject' ALIGN='bottom' value='". $subject ."'>";
				echo "<input type='hidden' name='to' value='". $to ."'>";
			}else {
				echo "<input name='subject' id='subject' ALIGN='bottom' SIZE='40' MAXLENGTH='50'>";
				echo "<input type='hidden' name='to' value='". $to ."'>";

			}
		?>
		</td>
  </tr>
  <tr>
    <td valign="top">
      <p align="right"><b>Email Body*&nbsp;&nbsp;</b></p>
    </td>
    <td ><textarea rows="15" name="body" cols="36"></textarea></td>
  </tr>

</table><br>
      <input type="submit" value="Submit" name="B1"><input type="reset" value="Reset" name="B2">
    <p class="style27">* Required Field</p>
    </form>
   </td></tr>	
	</table>

<!-- end my code -->


</td>
  </tr>
</table>

	
</body>

