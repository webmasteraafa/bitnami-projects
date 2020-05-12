
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link href="js/main.css" rel="stylesheet" type="text/css">
<link href="js/images.css" rel="stylesheet" type="text/css">
<link href="js/forms.css" rel="stylesheet" type="text/css">
<script language="javascript" src="js/menu.js"></script>
<title>Brochure Order Processed Kids With Food Allergies</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="description" content="Allergy patient brochure order processed.">
<meta name="robots" content="noindex, follow">
<meta name="revisit-after" content="7 days"> 
<?php
	$formname = $_REQUEST['formname'];
	$name = $_REQUEST['name'];
	$name = str_replace('\'', '&#039;', $name);
	$name = str_replace('\"', '&quot;', $name);
	$businessname = $_REQUEST['businessname'];
	$businessname = str_replace('\'', '&#039;', $businessname);
	$businessname = str_replace('\"', '&quot;', $businessname);
	$email = $_REQUEST['email'];
	$address1 = $_REQUEST['address1'];
	$address1 = str_replace('\'', '&#039;', $address1);
	$address1 = str_replace('\"', '&quot;', $address1);
	$address2 = $_REQUEST['address2'];
	$address2 = str_replace('\'', '&#039;', $address2);
	$address2 = str_replace('\"', '&quot;', $address2);
	$city = $_REQUEST['city'];
	$city = str_replace('\'', '&#039;', $city);
	$city = str_replace('\"', '&quot;', $city);
	$state = $_REQUEST['state'];
	$state = str_replace('\'', '&#039;', $state);
	$state = str_replace('\"', '&quot;', $state);
	$postal_code = $_REQUEST['postal_code'];
	$phone = $_REQUEST['phone'];
	$quantity = $_REQUEST['quantity'];
	$comments = $_REQUEST['comments'];
	$comments = str_replace('\"', '&quot;', $comments);
	$comments = str_replace('\'', '&#039;', $comments);
	$distributed= $_REQUEST['distributed'];
	$distributeother= $_REQUEST['distributeother'];
	$distributeother = str_replace('\"', '&quot;', $distributeother);
	$distributeother = str_replace('\'', '&#039;', $distributeother);
	$datesub = date("Y-m-d");
	$kfayes = $_REQUEST['kfayes'];


	include ("config.php");

	$sql = "insert into brochure set kfayes='$kfayes', datesub='$datesub', name='$name', businessname='$businessname', email='$email', address1='$address1', address2='$address2', city='$city', state='$state', postal_code='$postal_code', quantity='$quantity', comments='$comments', distributed='$distributed', phone='$phone', sent='no'";
	mysql_query( $sql ) or die( "Error creating new brochure: " . mysql_error() . " Query: $sql " );


//$salesemail = 'mcroft@kidswithfoodallergies.org';
$salesemail2 = 'lmitchell@kidswithfoodallergies.org';
//$salesemail = 'h.abbott@cpubroadband.net';

	$fromname = "Kids with Food Allergies";

	$message =  "$name, has requested brochures via the kidswithfoodallergies website.<br><br>";
	$message .=	"<b>Name:</b> $name<br>";
	$message .=	"<b>Email Address:</b> $email<br>";
	$message .=	"<b>Business Name:</b> $businessname<br>";
	$message .=	"<b>Address:</b> $address1<br>";
	$message .=	"                $address2<br>";
	$message .=	"<b>City:</b> $city<br>";
	$message .=	"<b>State:</b> $state<br>";
	$message .=	"<b>Postal Code:</b> $postal_code<br>";
	$message .=	"<b>Phone:</b> $phone<br>";
	$message .=	"<b>Quantity:</b> $quantity<br>";
	$message .=	"<b>Comments:</b> $comments<br>";
	$message .=	"<b>How Distributed:</b> $distributed<br>";
	$message .=	"<br><br>";
	$message .= "$name<br>";
	$message .= "$address1<br>";
	if ($address2) $message .= "$address2<br>";
	$message .= "$city, $state $postal_code";
	$message .=	"<br><br>";

/*		$fp = popen("/usr/sbin/sendmail -t","w");
		fputs($fp, "To: $salesemail\n");
		fputs($fp, "From: $name <$email>\nContent-type: text/html\r\n");
		fputs($fp, "Subject: Brochure Request\n\n");
		fputs($fp, "$message");
		fputs($fp, "$salesemail\nhttp://www.kidswithfoodallergies.org<br>");
		pclose($fp);
*/
		$fp2 = popen("/usr/sbin/sendmail -t","w");
		fputs($fp2, "To: $salesemail2\n");
		fputs($fp2, "From: $email \nContent-type: text/html\r\n");
		fputs($fp2, "Subject: Brochure Request\n\n");
		fputs($fp2, "$message");
		fputs($fp2, "$salesemail\nhttp://www.kidswithfoodallergies.org<br>");
		pclose($fp2);


//$salesemail1 = 'amyhugon@frontiernet.net';

	include ("config.php");

	//$sql = "insert into volunteers set role_interest='$role_interest', experience='$experience', other_interests='$other_interests', reason='$reason', first_name='$first_name', last_name='$last_name', username='$username', email='$email', address1='$address1', address2='$address2', city='$city', state='$state', country='$country', zip='$zip', phone='$phone', weekdays='$weekdays', weeknights='$weeknights', weekends='$weekends', anytime='$anytime', variable='$variable'";
	//mysql_query( $sql ) or die( "Error creating new volenteer: " . mysql_error() . " Query: $sql " );
?>
</head>
<body>
<div align="center">
  <table id="Table_01" width="750" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td rowspan="2" valign="bottom"> <a href="http://www.kidswithfoodallergies.org"> 
      <img src="siteimages/logof.gif" width="163" height="135" border="0"></a></td>
      <td colspan="4" valign="top"><img src="siteimages/welcomef.gif" width="502" height="63" border="0"></td>
    </tr>
    <tr>
      <td colspan="5" valign="bottom" height="72" >
        <table border="1" cellpadding="0" cellspacing="0" bordercolor="#3F679B" width="100%">
          <tr bgcolor="#3F679B">
            <td height='12'>
              <div align="right"><a href="http://www.kidswithfoodallergies.org/index.html" class="WhiteMenuText">&nbsp;home</a>&nbsp;&nbsp;&nbsp;</div></td>
          </tr>
          <tr>
            <td  valign="middle">
                <table width="100%" bordercolor="#3F679B" border="1" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="22%" height='12'><div align="center"><a href="http://www.kidswithfoodallergies.org/whatsnew.html" class="PurpleMenuText" title="New Updates to Kids With Food Allergies: Announcements, Publications, and Contests">what's new</a></div></td>
                    <td width="17%"><div align="center"><a href="http://www.kidswithfoodallergies.org/recipes.html" class="GrayMenuText" title="Search for dairy free recipes, egg free recipes, nut free recipes, peanut free recipes and more!">recipes</a>&nbsp;</div></td>
                    <td width="19%"><div align="center"><a href="http://www.kidswithfoodallergies.org/resourcesnew.php" title="Food allergy articles, research, and resources" class="PinkMenuText">resources</a></div></td>
                    <td width="23%"><div align="center"><a href="http://www.kidswithfoodallergies.org/faalerts.php" class="OrangeMenuText" title="Food allergy recalls for undeclared food allergens">allergy alerts</a></div></td>
                    <td width="19%"><div align="center"><a href="http://www.kidswithfoodallergies.org/interlink.html" class="GreenMenuText">allergy links</a></div></td>
                  </tr>
                </table>
                <table width="100%"  height='15' bordercolor="#3F679B" border="1" cellspacing="0" cellpadding="0">
                  <tr >
                    <td width="16%" height="12"><div align="center"><a href="http://www.kidswithfoodallergies.org/donate.html" class="PinkMenuText"> donate</a></div></td>
                    <td width="16%"><div align="center"><a href="http://www.kidswithfoodallergies.org/shopping.html" title="Items including food allergy t-shirts, allergy cookbooks and books, children's allergy books, food allergy awareness holiday cards, and more" class="OrangeMenuText">shop KFA </a></div></td>
                    <td width="40%" align="center"><div align="center"><a href="http://www.kidswithfoodallergies.org/marketplace.html" title="Find makers of allergen free foods, peanut allergy posters, special formula for severe food allergies, epinephrine autoinjectors for anaphylaxis, and more" class="GreenMenuText">allergy buyer's guide</a></div></td>
                    <td width="28%"><div align="center"><a href="http://www.kidswithfoodallergies.org/community.html" class="GrayMenuText" title="Register as a member or log in to our food allergy message boards">support forums</a></div></td>
                  </tr>
                </table></td>
          </tr>
        </table>      </td>
    </tr>
	<tr><td width="163"align="center"><!--insert date box--><span class="style29">
				<script>showDate();</script>
                </span> 
		  						  
		  
		  <!--end date box-->
		  </td>
		  <td colspan="5"><div align="right">&nbsp;<a href="http://www.kidswithfoodallergies.org/memberships.html" class="GrayMenuText" title="Become a member of Kids With Food Allergies and the Parents of Food Allergic Kids (POFAK) online allergy support group"> membership</a> &nbsp;&nbsp;<a href="http://www.kidswithfoodallergies.org/site_map.html" class="PurpleMenuText">site map </a>&nbsp; &nbsp;<a href="http://www.kidswithfoodallergies.org/contactus.html" class="PinkMenuText">contact us</a>&nbsp;&nbsp; <a href="http://www.kidswithfoodallergies.org/about.html" class="GreenMenuText">about</a>&nbsp;&nbsp;&nbsp;</div></td>
	</tr>
    <tr>
      <td colspan="5" valign="top">
	

<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="53%">
<TABLE cellspacing=0 border=0><tr valign=top>
<td width="369" align="center">  <div align="left">
<form method="get" action="http://www.kidswithfoodallergies.org/search.php" class="zoom_searchform">
<input type="text" name="zoom_query" size="20" value="" class="zoom_searchbox" />
<input type="submit" value="Search KFA Site" class='stylewhite' style="background:#3F679B none; color:#FFFFFF;" />
<input type="hidden" name="zoom_per_page" value="10">
<input type="hidden" name="zoom_and" value="0"/>
<input type="hidden" name="zoom_sort" value="0" />
</form>  <br />&nbsp;
</div></td></tr></TABLE></td>
    <td width="47%" align="right"><!-- Newsletter sign up -->
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
  <input type=text name="Email" size=15 class='style16' maxlength=120 value="Your Email">
  <INPUT class='style16' type=submit VALUE="Subscribe to Newsletter"  STYLE="background:#CC3300 none; color:#ffffff;">
  <a href="http://www.kidswithfoodallergies.org/newsletter_sign-up.html" class="style27"><br />
  more info</a>  </p>  </td></tr></TABLE>
</form><!-- Newsletter Sign-up --></td>
  </tr>
</table>	</td>
    </tr>
    <tr>
      <td colspan="5"><img src="siteimages/indexillustrator_07.gif" width="750" height="3"> </td>
    </tr>
    
    <tr valign="top">
      <td colspan="2">

      <div class="pinkleftbox">contact us</div>
	  <div class="ltgreybox"><div class="insidebox2">
	    <div align="left" class="style27">
       <a href="http://kidswithfoodallergies.org/contactus.html" class="style27">Contact Information</a>
        <p><a href="http://kidswithfoodallergies.org/brochure.php" class="style27">Request KFA Brochures</a></p>
        </div>
        </div>
        </div>	  </td>
      <td width="11"> <img src="siteimages/indexjan2005_08.gif" width="11" height="246"></td>
      <td colspan="2" align="left" bordercolor="#FFFFFF">
		<table width="100%" border="0" cellpadding="5" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
          <tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
            <td height="33" colspan="2" valign="middle" bgcolor="#3F679B"><div align="left">
              <h1>&nbsp;&nbsp;&nbsp;
		Contact Us: KFA Brochures	</h1>
            </div></td>
          </tr>
        </table>
        <table width="100%" height="300" border="0" cellpadding="15" cellspacing="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1">
          <tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
            <td height="33" colspan="2" bgcolor="#FFFFFF" >
			<span class="style19">
            <!-- start my code -->


            <p>Thank you for your order request!</p>
            <!-- end my code -->
            </span>		</td>
          </tr>
      </table>      </td>
    </tr>
    <tr>
      <td> <img src="images/spacer.gif" width="155" height="1" alt=""></td>
      <td width="35"> <img src="images/spacer.gif" width="35" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="11" height="1" alt=""></td>
      <td width="199"> <img src="images/spacer.gif" width="152" height="1" alt=""></td>
      <td width="342"> <img src="images/spacer.gif" width="302" height="1" alt=""></td>
    </tr>
  </table>
  <div class="mainbox2" align="center">
    <div align="center" class="style24">Page last updated 11/25/2007</div>
    <br />
<div class="blueinsidebox">
  <div align="center" class="style61">KFA is a national nonprofit food allergy support group dedicated to fostering optimal health, <br />  nutrition, and well-being of children with food allergies by providing education and a caring<br /> 
                   support community for their families and caregivers.  </div>
</div>
<div align="center"  class="style24">
   
    <a href="http://www.kidswithfoodallergies.org/whatsnew.html">What's New</a>      <a href="http://www.kidswithfoodallergies.org/recipes.html">Allergy-Free Recipes</a>      <a href="http://www.kidswithfoodallergies.org/resourcesnew.php">Parent Education Resources</a>         <a href="http://www.kidswithfoodallergies.org/faalerts.php">Food Allergy Alerts</a>        
    <a href="http://www.kidswithfoodallergies.org/interlink.html">Allergy Links</a><br />        
    <a href="http://www.kidswithfoodallergies.org/donate.html">Donate</a>   
    <a href="http://www.kidswithfoodallergies.org/shopping.html">Shop KFA</a>        <a href="http://www.kidswithfoodallergies.org/marketplace.html">Allergy Buyer's Guide</a>        <a href="http://www.kidswithfoodallergies.org/community.html">Support Forums</a>        <a href="http://www.kidswithfoodallergies.org/memberships.html">Memberships</a>	<a href="http://www.kidswithfoodallergies.org/contactus.html">Contact Us</a>        <a href="http://www.kidswithfoodallergies.org/about.html">About  </a> <br />
    <br /> 
  
       <a href="http://www.kidswithfoodallergies.org/privacy.html">Privacy Policy</a> and <a href="http://www.kidswithfoodallergies.org/tos.html">Terms of Service</a><br />
              Copyright (c) 2005-2007, Kids With Food Allergies, Inc.
              All Rights Reserved.<br />
              <em>
         Kids With Food Allergies was formerly known as POFAK (Parents of Food Allergic Kids)<br />
          before becoming a tax exempt charity in 2005.</em></div> <!-- end div bottom nav links-->
</div><!-- end div mainbox2-->
</div> <!-- end body center-->
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-216208-1";
urchinTracker();
</script>
</body>
</html>
