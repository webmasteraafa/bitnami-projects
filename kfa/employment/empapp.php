<?php
	$formname = $_REQUEST['formname'];

	$reason = $_REQUEST['reason'];
	$fname = $_REQUEST['fname'];
	$lname = $_REQUEST['lname'];
	$username = $_REQUEST['username'];
	$ssnum = $_REQUEST['ssnum'];
	$email = $_REQUEST['email'];
	$address = $_REQUEST['address'];
	$apt = $_REQUEST['apt'];
	$city = $_REQUEST['city'];
	$state = $_REQUEST['state'];
	$country = $_REQUEST['country'];
	$zip = $_REQUEST['zip'];
	$phone = $_REQUEST['phone'];
	$other_name = $_REQUEST['other_name'];
	$what_name = $_REQUEST['what_name'];
	$at_least_18 = $_REQUEST['at_least_18'];
	$work_cert = $_REQUEST['work_cert'];
	$legal_resident = $_REQUEST['legal_resident'];
	$high_school = $_REQUEST['high_school'];
	$hsaddress1 = $_REQUEST['hsaddress1'];
	$hsaddress2 = $_REQUEST['hsaddress2'];
	$hsgraduate = $_REQUEST['hsgraduate'];
	$college1 = $_REQUEST['college1'];
	$c1address1 = $_REQUEST['c1address1'];
	$c1address2 = $_REQUEST['c1address2'];
	$c1major = $_REQUEST['c1major'];
	$c1degree = $_REQUEST['c1degree'];
	$college2 = $_REQUEST['college2'];
	$c2address1 = $_REQUEST['c2address1'];
	$c2address2 = $_REQUEST['c2address2'];
	$c2major = $_REQUEST['c2major'];
	$c2degree = $_REQUEST['c2degree'];
	$licence_cert = $_REQUEST['licence_cert'];
	$clerical = $_REQUEST['clerical'];
	$accounting_bookkeeping = $_REQUEST['accounting_bookkeeping'];
	$msexcel = $_REQUEST['msexcel'];
	$msword = $_REQUEST['msword'];
	$mspower = $_REQUEST['mspower'];
	$sup = $_REQUEST['sup'];
	$database = $_REQUEST['database'];
	$editing = $_REQUEST['editing'];
	$writing = $_REQUEST['writing'];
	$marketing = $_REQUEST['marketing'];
	$helpdesk = $_REQUEST['helpdesk'];
	$desktop_pub = $_REQUEST['desktop_pub'];
	$web = $_REQUEST['web'];
	$relevent_skills = $_REQUEST['relevent_skills'];
	$employer1 = $_REQUEST['employer1'];
	$employercity1 = $_REQUEST['employercity1'];
	$postion1 = $_REQUEST['position1'];
	$duties1 = $_REQUEST['duties1'];
	$employstartdate1 = $_REQUEST['employstartdate1'];
	$employenddate1 = $_REQUEST['employenddate1'];
	$startsalary1 = $_REQUEST['startsalary1'];
	$endsalary1 = $_REQUEST['endsalary1'];
	$hoursweek1 = $_REQUEST['hoursweek1'];
	$reasonleave1 = $_REQUEST['reasonleave1'];
	$employer2 = $_REQUEST['employer2'];
	$employercity2 = $_REQUEST['employercity2'];
	$postion2 = $_REQUEST['position2'];
	$duties2 = $_REQUEST['duties2'];
	$employstartdate2 = $_REQUEST['employstartdate2'];
	$employenddate2 = $_REQUEST['employenddate2'];
	$startsalary2 = $_REQUEST['startsalary2'];
	$endsalary2 = $_REQUEST['endsalary2'];
	$hoursweek2 = $_REQUEST['hoursweek2'];
	$reasonleave2 = $_REQUEST['reasonleave2'];
	$employer3 = $_REQUEST['employer3'];
	$employercity3 = $_REQUEST['employercity3'];
	$postion3 = $_REQUEST['position3'];
	$duties3 = $_REQUEST['duties3'];
	$employstartdate3 = $_REQUEST['employstartdate3'];
	$employenddate3 = $_REQUEST['employenddate3'];
	$startsalary3 = $_REQUEST['startsalary3'];
	$endsalary3 = $_REQUEST['endsalary3'];
	$hoursweek3 = $_REQUEST['hoursweek3'];
	$reasonleave3 = $_REQUEST['reasonleave3'];
	$refphone1 = $_REQUEST['refphone1'];
	$refname1 = $_REQUEST['refname1'];
	$refrelationship1 = $_REQUEST['refrelationship1'];
	$refphone2 = $_REQUEST['refphone2'];
	$refname2 = $_REQUEST['refname2'];
	$refrelationship2 = $_REQUEST['refrelationship2'];
	$position_apply = $_REQUEST['position_apply'];
	$time = $_REQUEST['time'];
	$avail_days = $_REQUEST['avail_days'];
	$avail_eve = $_REQUEST['avail_eve'];
	$avail_nights = $_REQUEST['avail_nights'];
	$avail_sat = $_REQUEST['avail_sat'];
	$avail_sun = $_REQUEST['avail_sun'];
	$avail_oncall = $_REQUEST['avail_oncall'];
	$avail_holidays = $_REQUEST['avail_holidays'];
	$date_avail = $_REQUEST['date_avail'];
	$applied_before = $_REQUEST['applied_before'];
	$applied_when = $_REQUEST['applied_when'];
	$employed_before = $_REQUEST['employed_before'];
	$before_when = $_REQUEST['before_when'];
	$before_position = $_REQUEST['before_position'];
	$how_referred = $_REQUEST['how_referred'];
	$convicted = $_REQUEST['convicted'];
	$convicted_yes = $_REQUEST['convicted_yes'];
	$convicted2 = $_REQUEST['convicted2'];
	$enjoined = $_REQUEST['enjoined'];
	$date = date("Y-m-d");

	include ("config.php");


$salesemail = "lmitchell@kidswithfoodallergies.org";

//$salesemail = "h.abbott@cpubroadband.net";
$salesname = "Lynda Mitchell";
$fromname = "Kids with Food Allergies";
	$fd = popen("/usr/sbin/sendmail -t","w");
	fputs($fd, "To: $salesemail\n");
	fputs($fd, "From: $fromname <$salesemail>\n");
	fputs($fd, "Subject: Employment Application Received\n\n");
	fputs($fd, "$fname $lname has submitted an employment application on the web\n\n");

	fputs($fd, "Thanks,\n\n");
	fputs($fd, "$salesname\n");

	fputs($fd, "Community Manager\n$salesemail\nwww.kidswithfoodallergies.org\n");
	pclose($fd);




	$sql = "insert into empapp set 
		reason=	'".addslashes($reason		)."', 
		fname=	'".addslashes($fname		)."', 	
		lname=	'".addslashes($lname		)."', 	
		username='".addslashes($username	)."',
		ssnum='".addslashes($ssnum		)."',
		email='".addslashes($email		)."',
		address='".addslashes($address		)."',
		apt='".addslashes($apt			)."',
		city='".addslashes($city		)."',
		state='".addslashes($state		)."',
		country='".addslashes($country		)."',
		zip='".addslashes($zip			)."',
		phone='".addslashes($phone		)."',
		other_name='".addslashes($other_name	)."',
		what_name='".addslashes($what_name	)."',
		at_least_18='".addslashes($at_least_18	)."',
		work_cert='".addslashes($work_cert	)."',
		legal_resident='".addslashes($legal_resident)."',
		high_school='".addslashes($high_school	)."',
		hsaddress1='".addslashes($hsaddress1	)."',
		hsaddress2='".addslashes($hsaddress2	)."',
		hsgraduate='".addslashes($hsgraduate	)."',
		college1='".addslashes($college1	)."',
		c1address1='".addslashes($c1address1	)."',
		c1address2='".addslashes($c1address2	)."',
		c1major='".addslashes($c1major		)."',
		c1years='".addslashes($c1years		)."',
		c1degree='".addslashes($c1degree	)."',
		college2='".addslashes($college2	)."',
		c2address1='".addslashes($c2address1	)."',
		c2address2='".addslashes($c2address2	)."',
		c2major='".addslashes($c2major		)."',
		c2years='".addslashes($c2years		)."',
		c2degree='".addslashes($c2degree	)."',
		licence_cert='".addslashes($licence_cert)."',
		clerical='".addslashes($clerical	)."',
		accounting_bookkeeping='".addslashes($accounting_bookkeeping)."',
		msexcel='".addslashes($msexcel		)."',
		msword='".addslashes($msword		)."',
		mspower='".addslashes($mspower)."',
		sup='".addslashes($sup)."',
		database1='".addslashes($database1)."',	
		editing='".addslashes($editing		)."',
		writing='".addslashes($writing		)."',
		marketing='".addslashes($marketing	)."',
		helpdesk='".addslashes($helpdesk	)."',
		desktop_pub='".addslashes($desktop_pub	)."',
		web='".addslashes($web			)."',
		relevent_skills='".addslashes($relevent_skills)."',
		employer1='".addslashes($employer1	)."',
		employercity1='".addslashes($employercity1)."',
		position1='".addslashes($position1	)."',
		duties1='".addslashes($duties1		)."',
		employerphone1='".addslashes($employerphone1)."',
		employstartdate1='".addslashes($employstartdate1)."',
		employenddate1='".addslashes($employenddate1)."',
		startsalary1='".addslashes($startsalary1)."',
		endsalary1='".addslashes($endsalary1	)."',
		hoursweek1='".addslashes($hoursweek1	)."',
		reasonleave1='".addslashes($reasonleave1)."',
		employer2='".addslashes($employer2	)."',
		employercity2='".addslashes($employercity2)."',
		position2='".addslashes($position2)."',
		duties2='".addslashes($duties2)."',
		employerphone2='".addslashes($employerphone2)."',
		employstartdate2='".addslashes($employstartdate2)."',
		employenddate2='".addslashes($employenddate2)."',
		startsalary2='".addslashes($startsalary2)."',
		endsalary2='".addslashes($endsalary2)."',
		hoursweek2='".addslashes($hoursweek2)."',
		reasonleave2='".addslashes($reasonleave2)."',
		employer3='".addslashes($employer3)."',
		employercity3='".addslashes($employercity3)."',
		position3='".addslashes($position3)."',
		duties3='".addslashes($duties3)."',
		employerphone3='".addslashes($employerphone3)."',
		employstartdate3='".addslashes($employstartdate3)."',
		employenddate3='".addslashes($employenddate3)."',
		startsalary3='".addslashes($startsalary3)."',
		endsalary3='".addslashes($endsalary3)."',
		hoursweek3='".addslashes($hoursweek3)."',
		reasonleave3='".addslashes($reasonleave3)."',
		refphone1='".addslashes($refphone1)."',
		refname1='".addslashes($refname1)."',
		refrelationship1='".addslashes($refrelationship1)."',
		refphone2='".addslashes($refphone2)."',
		refname2='".addslashes($refname2)."',
		refrelationship2='".addslashes($refrelationship2)."',
		position_apply='".addslashes($position_apply)."',
		time='".addslashes($time)."',
		avail_days='".addslashes($avail_days)."',
		avail_eve='".addslashes($avail_eve)."',	
		avail_nights='".addslashes($avail_nights)."',
		avail_sat='".addslashes($avail_sat)."',
		avail_sun='".addslashes($avail_sun)."',
		avail_oncall='".addslashes($avail_oncall)."',
		avail_holidays='".addslashes($avail_holidays)."',
		date_avail='".addslashes($date_avail)."',
		applied_before='".addslashes($applied_before)."',
		applied_when='".addslashes($applied_when)."',
		employed_before='".addslashes($employed_before)."',
		before_when='".addslashes($before_when)."',
		before_position='".addslashes($before_position)."',
		how_referred='".addslashes($how_referred)."',
		convicted='".addslashes($convicted)."',
		convicted_yes='".addslashes($convicted_yes)."',
		convicted2='".addslashes($convicted2)."',
		enjoined='".addslashes($enjoined)."',
		date ='$date'
		";

	mysql_query( $sql ) or die( "Error creating new employee application: " . mysql_error() . " Query: $sql " );

	
?> 
<HTML>
<HEAD>
<!-- InstanceBeginEditable name="doctitle" -->
<TITLE>Employment Application for Kids With Food Allergies</TITLE>
<!-- InstanceEndEditable --><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="keywords" content="food allergies, milk allergy , egg allergy, peanuts allergy, nut, latex, corn, soy allergy">
<meta name="description" content="Kids with food allergies information and support">
<meta name="keywords" content="kids with food allergies, children with food allergies, food allergies, milk allergy, egg allergy, soy allergy, peanut allergy, allergy support, allergy group, latex allergy, food allergy dictionary, allergy chat, allergy newsletter">
<meta name="description" content="Home for families with food allergic kids. A place where you will find a lot of information and support regarding allergies">
<link href="https://www.kidswithfoodallergies.org/search.css" rel="stylesheet" type="text/css">
<link href="https://www.kidswithfoodallergies.org/js/main.css" rel="stylesheet" type="text/css">
<script language="javascript" src="https://www.kidswithfoodallergies.org/js/menu.js"></script>
<script language="javascript" src="https://www.kidswithfoodallergies.org/js/sidemenu.js"></script>
</HEAD>
<BODY BGCOLOR="#FFFFFF" text="#333333" alink="#17597F">
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
<div align="center">
  <table id="Table_01" width="655" height="401" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td rowspan="2" valign="bottom"> <img src="https://www.kidswithfoodallergies.org/siteimages/logof.gif" width="163" height="135"></td>
      <td colspan="4" valign="top"><img src="https://www.kidswithfoodallergies.org/siteimages/welcomef.gif" width="502" height="63"> </td>
    </tr>
    <tr>
      <td colspan="4" valign="bottom"><SCRIPT>DisplayMenuSSL();</SCRIPT></td>
    </tr>
    <tr>
      <td colspan="4"><table width="127" border="0" cellspacing="0" cellpadding="0" align="left">
          <tr valign="top">
            <td height="30" colspan="4" valign="middle">
                  <span class="style29">
				<script>showDate();</script>
                </span> 
		</td>
          </tr>
      </table> 
	</td>
      <td valign="middle" align="right">
<!-- Search Google -->
<center>
<FORM method=GET action=http://www.google.com/u/KFA>
<TABLE bgcolor=#FFFFFF cellspacing=0 border=0><tr valign=middle><td>
</td>
<td>
<INPUT TYPE=text name=q size=20 maxlength=255 value="">
<INPUT type=submit name=sa VALUE="Google Search">
<input type=hidden name=domains value="kidswithfoodallergies.org"><input type=hidden name=sitesearch value="kidswithfoodallergies.org">
</td></tr></TABLE>
</FORM>
</center>
<!-- Search Google -->
</td>
    </tr>
    <tr>
      <td colspan="5"><img src="https://www.kidswithfoodallergies.org/siteimages/indexillustrator_07.gif" width="665" height="3"> </td>
    </tr>
    <tr valign="top">
      <td colspan="2"><table width="99%" border="0" cellpadding="0" cellspacing="0">
        <tr bgcolor="#E5DEFF" valign="top" align="left">
          <td>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
              <tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
                <td colspan="2" bgcolor="#DF8FBD"><span class="style11"> <!-- #BeginEditable "titulograndeenCOLOR" --><img src="https://www.kidswithfoodallergies.org/siteimages/resources.gif" width="165" height="30"><!-- #EndEditable --></span></td>
              </tr>
            </table>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#CCCCCC">
              <tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
                <td colspan="2" bgcolor="#E5DEFF">

<!-- InstanceBeginEditable name="Tablasubmenu" -->
                  <table width="100%" height="35" border="0" cellpadding="10" cellspacing="2" bgcolor="#E5DEFF">
                    <tr valign="middle" bordercolor="#FFFFFF" bgcolor="#EDEDED" align="left">
                      <td height="31" valign="top" class="SmallSpaceText"><a href="index.html" class="style27">Employment
                        Home</a>
</td>
                      <td width="11%" align="left" valign="top"></td>
</tr>
                    <tr valign="middle" bordercolor="#FFFFFF" bgcolor="#EDEDED" align="left">
                      <td valign="top" class="style21"><a href="empapp.html" class="style27">Employment
                        Application</a></td>
                      <td width="11%" align="left" valign="middle"><a href="empapp.html" class="style27">&gt;</a></td>
                    </tr>


                  </table>
<!-- InstanceEndEditable --></td>
              </tr>
            </table>
</td>
        </tr>
      </table> </td>
      <td> <img src="https://www.kidswithfoodallergies.org/siteimages/indexjan2005_08.gif" width="11" height="246"></td>
      <td colspan="2" align="left" bordercolor="#FFFFFF"><table width="100%"  border="0" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#CCCCCC">
        <tr>
          <td bgcolor="#CCCCCC"><table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#9999CC">
            <tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
              <td height="33" colspan="2" bgcolor="#ECAFD2"><font face="Verdana, Arial, Helvetica, sans-serif" size="1"> </font><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#666666">&nbsp;</font><!-- #BeginEditable "graficogrande" --><img src="https://www.kidswithfoodallergies.org/siteimages/resourbann.gif" width="418" height="60"><!-- #EndEditable --></td>
            </tr>
          </table></td>
        </tr>
      </table>
        <table width="100%" border="0" cellpadding="5" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
          <tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
            <td height="33" colspan="2" valign="middle" bgcolor="#ECAFD2"><div align="left" class="style11 style18">&nbsp;<!-- InstanceBeginEditable name="EditRegion4" -->&nbsp;Employment
                Application<!-- InstanceEndEditable --></div></td>
          </tr>
        </table>
        <table width="100%" height="300" border="0" cellpadding="15" cellspacing="2" bordercolor="#FFFFFF" bgcolor="#E5DEFF">
          <tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
            <td height="33" colspan="2" bgcolor="#EDEDED"><span class="style16"> 
<!-- #BeginEditable "subtema-text" --><b>Thank you for your application!&nbsp;</b></span>
              <p><span class="style16"> 
<b>Kids With Food Allergies, Inc.</b><br>
              73 Old Dublin Pike, Ste. 10, #163<br>
              Doylestown, PA  18901Kids With Food Allergies<br>
              phone: 215-230-5394<br>
              fax: 215-340-7674<br>
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
      <td> <img src="https://www.kidswithfoodallergies.org/images/spacer.gif" width="155" height="1" alt=""></td>
      <td> <img src="https://www.kidswithfoodallergies.org/images/spacer.gif" width="35" height="1" alt=""></td>
      <td> <img src="https://www.kidswithfoodallergies.org/images/spacer.gif" width="11" height="1" alt=""></td>
      <td> <img src="https://www.kidswithfoodallergies.org/images/spacer.gif" width="152" height="1" alt=""></td>
      <td> <img src="https://www.kidswithfoodallergies.org/images/spacer.gif" width="302" height="1" alt=""></td>
    </tr>
  </table>
  <br>
  <table width="665" border="0" cellspacing="0" cellpadding="0">
    <tr>
<td><p align="center" class="style24"><font FACE="verdana" siz="1">Page
        last updated 05/11/2006</font><br>
        <a href="http://www.kidswithfoodallergies.org/privacy.html">Privacy Policy</a> and <a href="http://www.kidswithfoodallergies.org/tos.html">Terms
        of Service</a> <br> Copyright (c) 2005-2006, Kids With Food Allergies, Inc.
            All Rights Reserved.</p>      </td>
    </tr>
  </table>

</BODY>
<!-- InstanceBegin template="/Templates/NSresources.dwt" codeOutsideHTMLIsLocked="false" -->
</HTML>
<!-- InstanceEnd -->