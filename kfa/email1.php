<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Email - Kids With Food Allergies</title>
<meta name="robots" content="noindex,nofollow">
<?php
include ("config.php");
$to = $_REQUEST['to'];


if ($to == 'lynda') $salesemail = 'lmitchell@kidswithfoodallergies.org';
if ($to == 'lynda') $salesname = 'Lynda Mitchell';
if ($to == 'webmaster') $salesemail = 'webmaster@kidswithfoodallergies.org';
if ($to == 'webmaster') $salesname = 'Webmaster';
if ($to == 'info') $salesemail = 'info@kidswithfoodallergies.org';
if ($to == 'info') $salesname = 'Information';
if ($to == 'heather') $salesemail = 'heather@allergicchild.com';
if ($to == 'heather') $salesname = 'Heather Abbott';
if ($to == 'admin') $salesemail = 'admin@kidswithfoodallergies.org';
if ($to == 'admin') $salesname = 'Administration';
if ($to == 'janet') $salesemail = 'jburns@kidswithfoodallergies.org';
if ($to == 'janet') $salesname = 'Janet Burns';
if ($to == 'fundraisers') $salesemail = 'fundraisers@kidswithfoodallergies.org';
if ($to == 'fundraisers') $salesname = 'KFA Fundraisers';
if ($to == 'supportgroups') $salesemail = 'supportgroups@kidswithfoodallergies.org';
if ($to == 'supportgroups') $salesname = 'KFA Support Groups';
if ($to == 'media') $salesemail = 'mcassalia@kidswithfoodallergies.org';
if ($to == 'media') $salesname = 'KFA Media Inquiry';


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

function f_open_window_max( aURL, aWinName )
{
   var wOpen;
   var sOptions;

   sOptions = 'status=yes,menubar=yes,scrollbars=yes,resizable=yes,toolbar=yes';
   sOptions = sOptions + ',width=' + (screen.availWidth - 10).toString();
   sOptions = sOptions + ',height=' + (screen.availHeight - 122).toString();
   sOptions = sOptions + ',screenX=0,screenY=0,left=0,top=0';

   wOpen = window.open( '', aWinName, sOptions );
   wOpen.location = aURL;
   wOpen.focus();
   wOpen.moveTo( 0, 0 );
   wOpen.resizeTo( screen.availWidth, screen.availHeight );
   return wOpen;
}

</script>
<link href="js/main.css" rel="stylesheet" type="text/css">

</head>

<body topmargin="0" leftmargin="0" marginwidth="0" marginheight="0" hspace="0" vspace="0" width="500px">


<!-- start my code -->

	<table width="450px" cellspacing="2" cellpadding="2">
	<tr><td width="450px" valign="top" align="center"> 
    <div class="blueheaderbox"> <h1><!-- TemplateBeginEditable name="title" -->Contact Kids With Food Allergies<!-- TemplateEndEditable --></h1>
</div>

	<form method="POST" action="emailform.php" name="MainForm" id="MainForm" onSubmit="return validate()" >
	<input type="hidden" name="formname" value="Email">

<table class="style27" border="0" width="450" cellspacing="0" cellpadding="2" >
  <tr>
    <td width="157" class="style27" align="right"><b>To:&nbsp;</b></td>
    <td width="285" class="style27"><?echo $salesname; ?>
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
      <p align="right"><b>Email Body*&nbsp;</b></p>
      <p align="right">&nbsp;</p>
      <p align="right"><b><a href="http://www.kidswithfoodallergies.org" target="_blank" rel="self"><img src="siteimages/logof-new.gif" alt="Kids With Food Allergies Logo" width="123" height="118" border="0" align="middle"></a>&nbsp;</b></p></td>
    <td><textarea rows="15" name="body" cols="30"></textarea></td>
  </tr>

</table><br>
      <input type="submit" value="Submit" name="B1" onclick="f_open_window_max('emailform.php','');return false"><input type="reset" value="Reset" name="B2">
    <p class="style27">* Required Field</p>
    </form>
   </td></tr>	
	</table>

<!-- end my code -->


</td>
  </tr>
</table>

	
</body>

