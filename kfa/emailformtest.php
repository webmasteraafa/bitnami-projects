<?php
	$formname = $_REQUEST['formname'];
	$name = $_REQUEST['name'];
	$name = str_replace('\'', '&#039;', $name);
	$subject = $_REQUEST['subject'];
	$subject = str_replace('\'', '&#039;', $subject);
	$email = $_REQUEST['email'];
	$body = $_REQUEST['body'];
	$body = str_replace('\'', '&#039;', $body);
	$to = $_REQUEST['to'];

if ($to == 'lynda') $salesemail = 'lmitchell@kidswithfoodallergies.org';
if ($to == 'lynda') $salesname = 'Lynda Mitchell';
if ($to == 'veronica') $salesemail = 'vbroadley@kidswithfoodallergies.org';
if ($to == 'veronica') $salesname = 'Veronica Broadley';
if ($to == 'danielle') $salesemail = 'deestricky1@yahoo.com';
if ($to == 'danielle') $salesname = 'Danielle Keblaitis';

//if ($to == 'webmaster') $salesemail = 'webmaster@kidswithfoodallergies.org';
if ($to == 'webmaster') $salesname = 'Webmaster';
//if ($to == 'info') $salesemail = 'info@kidswithfoodallergies.org';
if ($to == 'info') $salesname = 'Information';

if ($to == 'webmaster') $salesemail = 'h.abbott@cpubroadband.net';
if ($to == 'info') $salesemail = 'h.abbott@cpubroadband.net';

if ($to == 'heather') $salesemail = 'h.abbott@cpubroadband.net';
if ($to == 'heather') $salesname = 'Heather Abbott';
if ($to == 'nicole') $salesemail = 'nicole@allergicchild.com';
if ($to == 'nicole') $salesname = 'Nicole Smith';

	include ("config.php");
	

?>

<html>

<head>
<meta name="keywords" content="food allergies, milk allergy , egg allergy, peanuts allergy, nut, latex, corn, soy allergy">
<meta name="description" content="Kids with food allergies information and support">
<meta name="keywords" content="kids with food allergies, children with food allergies, food allergies, milk allergy, egg allergy, soy allergy, peanut allergy, allergy support, allergy group, latex allergy, food allergy dictionary, allergy chat, allergy newsletter">
<meta name="description" content="Home for families with food allergic kids. A place where you will find a lot of information and support regarding allergies">
<link href="search.css" rel="stylesheet" type="text/css">
<link href="js/main.css" rel="stylesheet" type="text/css">
<script language="javascript" src="js/menu.js"></script>
<script language="javascript" src="js/sidemenu.js"></script>
<title>Online Volunteer Form</title>
</head>

<BODY BGCOLOR="#FFFFFF" text="#333333" alink="#17597F">
<div align="center">
  <table id="Table_01" width="655" height="401" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td rowspan="2" valign="bottom"> <img src="siteimages/logof.gif" width="163" height="135"></td>
      <td colspan="4" valign="top"><img src="siteimages/welcomef.gif" width="502" height="63"> </td>
    </tr>
    <tr>
      <td colspan="4" valign="bottom"><SCRIPT>DisplayMenu();</SCRIPT></td>
    </tr>
    <tr>
      <td colspan="3"><table width="127" border="0" cellspacing="0" cellpadding="0" align="left">
          <tr valign="top">
            <td height="30" colspan="4" valign="middle">
                  <span class="style29">
				<script>showDate();</script>
                </span> 
		</td>
          </tr>
      </table> 
	</td>
      <td valign="middle" align="right" colspan="2">
<!-- Newsletter sign up -->
<form method="post" action="http://www.icebase.com/multidouble.ice">
<input type=hidden name="username" value="KFA">
<input type=hidden name="notification" value="lmitchell@kidswithfoodallergies.org">
<input type=hidden name="contactemail" value="lmitchell@kidswithfoodallergies.org">
<input type=hidden name="contactname" value="Kids With Food Allergies Inc">
<input type=hidden name="list1" value="FirstMailingList">
<input type=hidden name="mandatory" value="Email">
<input type=hidden name="thankyou_firstdouble" value="http://www.kidswithfoodallergies.org/newsletter_thankyou.html">
<input type=hidden name="thankyou_message" value="http://www.kidswithfoodallergies.org/newsletter_thankyou2.html">
<input type=hidden name="thankyou_invalidemail" value="http://www.kidswithfoodallergies.org/newsletter_invalidemail.html">
<input type=hidden name="thankyou_alreadyonlist" value="http://www.kidswithfoodallergies.org/newsletter_alreadyhave.html">
<TABLE bgcolor=#FFFFFF cellspacing=0 border=0><tr valign=middle>
<td align="center">
<p align="right">
<input type=text name="Email" size=15 class='style16' maxlength=120 value="Your Email"><INPUT class='style16' type=submit  VALUE="Subscribe to Newsletter" class="MainBodyText" STYLE="background:#DF8FBD none; color:#000;"><a href="newsletter_sign-up.html" class="style27"><br>
more info</a>
</p>
</td></tr></TABLE>
</form>
<!-- Newsletter Sign-up -->
</td>
    </tr>
    <tr>
      <td colspan="5"><img src="siteimages/indexillustrator_07.gif" width="665" height="3"> </td>
    </tr>
    <tr valign="top">
      <td colspan="2"><table width="99%" border="0" cellpadding="0" cellspacing="0">
        <tr bgcolor="#E5DEFF" valign="top" align="left">
          <td>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#F76973">
              <tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
                <td colspan="2" bgcolor="#EDAC57"><span class="style11"> <!-- #BeginEditable "titulograndeenCOLOR" --><img src="siteimages/contus.gif" width="165" height="30"><!-- #EndEditable --></span></td>
              </tr>
            </table>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#CCCCCC">
              <tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
                <td colspan="2" bgcolor="#E5DEFF">

<!-- InstanceBeginEditable name="Tablasubmenu" -->
                  <table width="100%" height="35" border="0" cellpadding="10" cellspacing="2" bgcolor="#E5DEFF">
                    <tr valign="middle" bordercolor="#FFFFFF" bgcolor="#EDEDED" align="left">
                      <td height="31" valign="top" class="style22"><a href="http://kidswithfoodallergies.org/contactus.html" class="style27">Contact Information</a></td>
                      <td width="11%" align="left" valign="middle"><a href="http://kidswithfoodallergies.org/contactus.html" class="style27">&gt;</a></td>
                    </tr>
				<tr valign="middle" bordercolor="#FFFFFF" bgcolor="#EDEDED" align="left">
	                      <td valign="top" class="style21">
							<center>
<FORM method=GET action=http://www.google.com/u/KFA>
<TABLE  cellspacing=0 border=0><tr valign=middle><td>
</td>
<td align="center">
<INPUT TYPE=text name=q size=15 maxlength=255 value=""><br>
<INPUT type=submit name=sa VALUE="Google Search">
<input type=hidden name=domains value="kidswithfoodallergies.org"><input type=hidden name=sitesearch value="kidswithfoodallergies.org">
</td></tr></TABLE>
</FORM>
</center>
</td>
	                      <td width="11%" align="left" valign="middle" bgcolor="#EDEDED"></td>
	                    </tr>
                  </table>
                <!-- InstanceEndEditable --></td>
              </tr>
            </table>
</td>
        </tr>
      </table> </td>
      <td> <img src="siteimages/indexjan2005_08.gif" width="11" height="246"></td>
      <td colspan="2" align="left" bordercolor="#FFFFFF"><table width="100%"  border="0" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#CCCCCC">
        <tr>
          <td bgcolor="#CCCCCC"><table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#9999CC">
            <tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
              <td height="33" colspan="2" bgcolor="#EFB76E"><font face="Verdana, Arial, Helvetica, sans-serif" size="1"> </font><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#666666">&nbsp;</font><!-- #BeginEditable "graficogrande" --><img src="siteimages/contusban.gif" width="418" height="60"><!-- #EndEditable --></td>
            </tr>
          </table></td>
        </tr>
      </table>
        <table width="100%" border="0" cellpadding="5" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
          <tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
            <td height="33" colspan="2" valign="middle" bgcolor="#EFB76E"><div align="left" class="style11 style18"> <!-- #BeginEditable "subtemas-derecho" -->&nbsp;&nbsp;&nbsp;Contacting
            Kids With Food Allergies <!-- #EndEditable --></div></td>
          </tr>
        </table>
        <table width="100%" height="300" border="0" cellpadding="15" cellspacing="2" bordercolor="#FFFFFF" bgcolor="#E5DEFF">
          <tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
            <td height="33" colspan="2" bgcolor="#EDEDED"><span class="style16"> </span><span class="style16">
<!-- start my code -->

<font face="Verdana, Arial, Helvetica, sans-serif" size="2" align="left">
<p>Thank you for your email!</p>

<strong><br>

<!-- end my code -->

</span></td>
          </tr>
        </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#F76973">
          <tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
            <td colspan="2" bgcolor="#E5DEFF"></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td> <img src="images/spacer.gif" width="155" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="35" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="11" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="152" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="302" height="1" alt=""></td>
    </tr>
  </table>
  <br>
  <table width="665" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><p align="center" class="style24"><font FACE="verdana" siz="1">Page
        last updated 2/21/2005</font><br>
        <a href="privacy.html">Privacy Policy</a> and <a href="tos.html">Terms
        of Service</a>   <br>  Copyright (c) 2005-2006, Kids With Food Allergies, Inc.
            All Rights Reserved.</p>      </td>
    </tr>
  </table>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-216208-1";
urchinTracker();
</script>

</BODY>
<!-- InstanceEnd --></HTML>


<?

if (($to == 'webmaster') || ($to == 'info')) {


	$sql = "insert into emailreply set toemail='$to', name='$name', subject='$subject', email='$email', body='".addslashes($body)."'";
	mysql_query( $sql ) or die( "Error creating new volenteer: " . mysql_error() . " Query: $sql " );

	$sql1 = "select * from emailreply where body='".addslashes($body)."' and name='$name' and subject='$subject' and email='$email'";
	$result1 = mysql_query( $sql1 ) or die( "Error querying Vendor list: " . mysql_error() . " Query: $sql1 " );
	$row1 = mysql_fetch_array( $result1 );

	$id = $row1['id'];
	//echo $id;

	$sql2 = "update emailreply set messageid='$id' where id='$id'";
	mysql_query( $sql2 ) or die( "Error creating new volenteer: " . mysql_error() . " Query: $sql2 " );

	$fromname = "Kids with Food Allergies";

		$fp = popen("/usr/sbin/sendmail -t","w");
		fputs($fp, "To: $salesemail\n");
		fputs($fp, "From: $name <$email>\nContent-type: text/html\r\n");
		fputs($fp, "Subject: $subject\n\n");
		fputs($fp, "$name, has sent you the following information via the kidswithfoodallergies website.<br><br>");
		fputs($fp, "This information has been placed in a database for you<br>");
		fputs($fp, "Go to <a href='http://www.kidswithfoodallergies.org/edit/'>http://www.kidswithfoodallergies.org/edit/</a> to reply to this person.<br>");
		fputs($fp, "<b>E-mail Address:</b> $email<br>");
		fputs($fp, "$body<br><br>");
		fputs($fp, "$salesemail<br>http://www.kidswithfoodallergies.org<br>");
		pclose($fp);

	}else {


	$fromname = "Kids with Food Allergies";


		$fp = popen("/usr/sbin/sendmail -t","w");
		fputs($fp, "To: $salesemail\n");
		fputs($fp, "From: $name <$email>\nContent-type: text/html\r\n");
		fputs($fp, "Subject: $subject\n\n");
		fputs($fp, "$name, has sent you the following information via the kidswithfoodallergies website.\n\n");
		fputs($fp, "E-mail Address: $email\n");
		fputs($fp, "$body\n\n");

		fputs($fp, "$salesemail\nhttp://www.kidswithfoodallergies.org\n");
		pclose($fp);
	}
?>