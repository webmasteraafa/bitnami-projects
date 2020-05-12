<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/membershipmainssl.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<link href="js/main.css" rel="stylesheet" type="text/css">
<script language="javascript" src="js/menu.js"></script>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Kids With Food Allergies - Online Support for Families</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="keywords" content="peanut allergy, dairy free recipes, dairy free, food allergies, food allergy, POFAK, wheat free recipes, egg free recipes, wheat free, nut free, peanut free, milk free recipes, food allergy recipes, milk allergy, egg allergy">
<meta name="description" content="Nonprofit organization providing online support groups, recipes, parent education and news for families raising children with food allergies">
<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
<META NAME="REVISIT-AFTER" CONTENT="7 days"> 
<script>
function RSto() {window.resizeTo(800,800)}



</script>
<?
/* a function to get the USER_OID from the cookie/session info */
function get_user_oid() {
  if (isset($_COOKIE['site_2400067262'])) {
    $site_cookie = $_COOKIE['site_2400067262'];
    list($u,$md5p,$user_oid,$pref_datetime,$perms_datetime,$pl) = explode("&", $site_cookie);
    $oid_arr = split("=", $user_oid);
    $u_oid = $oid_arr[1];
  }
  return $u_oid;
}

	$formname = $_REQUEST['formname'];
	$name = $_REQUEST['name'];
	$lname = $_REQUEST['lname'];
	$date = date("Y-m-d");
	$email1 = $_REQUEST['email1'];
	$username = $_REQUEST['username'];
	$comments = $_REQUEST['comments'];
	$address1 = $_REQUEST['address1'];
	$address2 = $_REQUEST['address2'];
	$city = $_REQUEST['city'];
	$state = $_REQUEST['state'];
	$zip = $_REQUEST['zip'];
$user_oid = get_user_oid();
	
	include ("config.php");

	$sql = "insert into supportnet_send set name='".addslashes($name)."',
			lname='".addslashes($lname)."', 
			user_oid = '$user_oid',
			email='$email1', 
			username='".addslashes($username)."', 
			comments='".addslashes($comments)."', 
			date='$date', 
			address1='".addslashes($address1)."', 
			address2='".addslashes($address2)."', 
			city='".addslashes($city)."', 
			state='".addslashes($state)."', 
			zip='".addslashes($zip)."'";
	mysql_query( $sql ) or die( "Error adding user: $login " . mysql_error() );


$salesemail = "lmitchell@kidswithfoodallergies.org";

//$salesemail = "heather@allergicchild.com";
//$salesemail2 = "heather@allergicchild.com";


$salesname = "Lynda Mitchell";
$fromname = "Kids with Food Allergies";
/*
	$fd = popen("/usr/sbin/sendmail -t","w");
	fputs($fd, "To: $email1\n");
	fputs($fd, "From: $fromname <$salesemail>\n");
	fputs($fd, "Subject: Support Net\n\n");
	fputs($fd, "Hello $name,\n\n");
	fputs($fd, "Thank you for submitting your request for a sponsored Family Membership. We are glad you would like to be an active member of Kids With Food Allergies.\n\n");
	fputs($fd, "Our office hours are Monday - Friday 8:30 a.m. to 5:00 p.m. Eastern Time. If you do not hear back from us within two business days, please alert us by sending an email to webmaster@kidswithfoodallergies.org.\n\n");

	fputs($fd, "Thank You,\n\n");
	fputs($fd, "$salesname\n");

	fputs($fd, "President\n$salesemail\nwww.kidswithfoodallergies.org\n");
	pclose($fd);


	$fp = popen("/usr/sbin/sendmail -t","w");
	fputs($fp, "To: $salesemail\n");
	fputs($fp, "From: $name <$email>\n");
	fputs($fp, "Subject: Sponsor Membership Request\n\n");
	fputs($fp, "$name, has submitted a Sponsored Membership Request.\n\n");
	fputs($fp, "E-mail Address: $email1\n");
	fputs($fp, "Thanks Again,\n\n");

	fputs($fp, "$salesname\nComunity Manager\n$salesemail\nwww.kidswithfoodallergies.org\n");
	pclose($fp);

	$fp2 = popen("/usr/sbin/sendmail -t","w");
	fputs($fp2, "To: $salesemail2\n");
	fputs($fp2, "From: $name <$email>\n");
	fputs($fp2, "Subject: Sponsor Membership Request\n\n");
	fputs($fp2, "$name, has submitted a Sponsored Membership Request.\n\n");
	fputs($fp2, "E-mail Address: $email1\n");
	fputs($fp2, "Thanks Again,\n\n");

	fputs($fp2, "$salesname\nComunity Manager\n$salesemail\nwww.kidswithfoodallergies.org\n");
	pclose($fp2);

*/

?>
<!-- InstanceEndEditable -->

</head>
<body bgcolor="#FFFFFF" text="#333333" alink="#17597F">
<div align="center">
  <table id="Table_01" width="750" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td rowspan="2" valign="bottom"> <a href="http://www.kidswithfoodallergies.org"> <img src="siteimages/logof.gif" width="163" height="135" border="0"></a></td>
      <td width="587" height="80" colspan="4" valign="top"><div id="welcome">&nbsp;</div></td>
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
                    <td width="18%"><div align="center"><a href="http://www.kidswithfoodallergies.org/shopping.html" title="Items including food allergy t-shirts, allergy cookbooks and books, children's allergy books, food allergy awareness holiday cards, and more" class="OrangeMenuText">shop KFA </a></div></td>
                    <td width="38%" align="center"><div align="center"><a href="http://www.kidswithfoodallergies.org/marketplace.html" title="Find makers of allergen free foods, peanut allergy posters, special formula for severe food allergies, epinephrine autoinjectors for anaphylaxis, and more" class="GreenMenuText">allergy buyer's guide</a></div></td>
                    <td width="28%"><div align="center"><a href="http://www.kidswithfoodallergies.org/community.html" class="GrayMenuText" title="Register as a member or log in to our food allergy message boards">support forums</a></div></td>
                  </tr>
                </table></td>
          </tr>
        </table>
      </td>
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
<table cellspacing=0 border=0><tr valign=top>
<td width="369" align="center">  <div align="left">
<form method="get" action="http://www.kidswithfoodallergies.org/search.php" class="zoom_searchform" />
<input type="text" name="zoom_query" size="20" value="" class="zoom_searchbox" />
<input type="submit" value="Search KFA Site" class='stylewhite' style="background:#3F679B none; color:#FFFFFF;" />
<input type="hidden" name="zoom_per_page" value="10" />
<input type="hidden" name="zoom_and" value="0"/>
<input type="hidden" name="zoom_sort" value="0" />
</form><br />&nbsp;
</div></td></tr></table>


</td>
    <td width="47%" align="right"><form method="post" action="http://www.kidswithfoodallergies.org/newsletter_sign-up.php">
	<input type="text" name="Email" size="15" class="style16" maxlength="120" value="your email" />
	<input class="stylewhite" type="submit" value="Subscribe to Newsletter" style="background:#CC3300" /><br />
    <div align="right"><a href="http://www.kidswithfoodallergies.org/newsletter_sign-up.html" class="formlink" title="Kids With Food Allergies e-news is a free e-newsletter containing news and hot discussion topics about food allergies, allergy free recipes and safe food ideas for children with food allergies">more info</a></div>

	</form></td>
  </tr>
</table>
	</td>
    </tr>
    <tr>
      <td colspan="5"><img src="siteimages/indexillustrator_07.gif" width="750" height="3" alt=""> </td>
    </tr>
    
    <tr valign="top">
      <td colspan="2">
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
        		<tr bgcolor="#E5DEFF" valign="top" align="left">
		          <td >
            	    <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#6699CC">
		              <tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
					  <td colspan="2" bgcolor="#6699CC" height="25" bordercolor="#FFFFFF" valign="middle"><span class="stylewhite3"><strong>&nbsp;&nbsp;
            		    membership</strong></span>
				    </td>
              		  </tr>
		          </table>
            		<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#CCCCCC">
              			<tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
                				<td colspan="2" bgcolor="#FFCBB3">
								
				                  <table width="100%"  border="0" cellpadding="10" cellspacing="2" bgcolor="#E1E1E1">
                    <tr valign="middle" bordercolor="#FFFFFF" bgcolor="#ffffff" align="left">
                      <td valign="top" ><p> <a href="http://kidswithfoodallergies.org/eve/login" class="style27" title="Register as an Associate (free) or Log in if you are already a member">Register or Log in <img src="/siteimages/check.gif" width="8" height="8" border="0"></a> </p>
					  <p> <a href="http://kidswithfoodallergies.org/eve/thrive" class="style27" title="Family Memberships are $25 per year">Upgrade to Family Membership</a> </p>
                      <p> <a href="http://www.kidswithfoodallergies.org/community.html" class="style27" title="Read more about our Community Support Forums for Parents of Food Allergic Kids">POFAK &#8482; Support Forums</a> </p>
					  <p> <a href="http://www.kidswithfoodallergies.org/resourcesnew.php" class="style27" title="Browse our Allergy Education Resources">Parent Education Resources</a></p>
					  <p> <a href="http://www.kidswithfoodallergies.org/recipes.html" class="style27" title="Hundreds of Allergy Free Recipes">Safe Eats &#8482; Recipes</a></p>
					  <p> <a href="http://www.kidswithfoodallergies.org/eve/chat" class="style27" title="Live chat rooms for Family Members">Family Chat Rooms</a></p>
					  <p> <a href="http://www.kidswithfoodallergies.org/eve/members" class="style27">Member Directory</a></p>
					  <p> <a href="http://www.kidswithfoodallergies.org/supportnetshop.php" class="style27" title="Quarterly Publication for Family Members">Support Net &reg;</a></p>
					   <p> <a href="http://kidswithfoodallergies.org/newsletter_sign-up.html" class="style27" title="Monthly e-newsletter for Associate and Family Members">KFA e-Newsletter</a></p>
				 <p> <a href="http://kidswithfoodallergies.org/about.html" class="style27">About KFA</a></p>	
				  <p> <a href="http://kidswithfoodallergies.org/contactus.html" class="style27">Contact Us</a></p></td>
                      </tr>

                  </table>
								</td>
				      </tr>
		            </table>
			</td>
        	</tr>
   	  </table> 
	  <!-- InstanceBeginEditable name="under menu" --><!-- InstanceEndEditable --></td>
      <td width="11"> <img src="siteimages/indexjan2005_08.gif" width="11" height="246"></td>
      <td colspan="2" align="left" bordercolor="#FFFFFF">
		<table width="100%" border="0" cellpadding="5" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
          <tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
            <td height="33" colspan="2" valign="middle" bgcolor="#3F679B"><div align="left"><h1>&nbsp;&nbsp;&nbsp;<!-- InstanceBeginEditable name="title" -->
		Community<!-- InstanceEndEditable -->
	</h1>
            </div></td>
          </tr>
        </table>
        <table width="100%" height="300" border="0" cellpadding="15" cellspacing="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1">
          <tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
            <td height="33" colspan="2" bgcolor="#FFFFFF" >
			<!-- #BeginEditable "text" -->
            

              Thank You!
              <p>Your request for printed copies of Support Net. Support Net is published in the spring and   fall; you will begin receiving copies with the next available issue.<br>
              <br>
              Thank you for wanting to be an active member of our Kids With Food Allergies online community.<br>
&nbsp;            <!-- #EndEditable -->
           
		</td>
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
  <table width="750" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>	<!-- #BeginEditable "date" -->
      <p align="center" class="style24">Page last updated 3/24/2009</p>
      <!-- #EndEditable -->       <div class="mainbox2">
<div class="blueinsidebox">
  <span class="style61">KFA is a national nonprofit food allergy support group dedicated to fostering optimal health, <br />
    nutrition, 
                              and well-being of children with food allergies by providing education and a caring<br /> 
                              support community for their families and caregivers.</span>
  
</div>
<div align="center">
   
    <br />
    <span class="style24">
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
          before becoming a tax exempt charity in 2005.</em>			
    </span>
</div>
</div></td>
    </tr>
  </table>
</div>
</div>
</body>
<!-- InstanceEnd --></html>
