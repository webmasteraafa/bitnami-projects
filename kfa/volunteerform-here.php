<?php
	$formname = $_REQUEST['formname'];
	$role_supportforum = $_REQUEST['role_supportforum'];
	$role_committe = $_REQUEST['role_committe'];

	$role_chathost = $_REQUEST['role_chathost'];
	$role_web = $_REQUEST['role_web'];
	$role_boardmem = $_REQUEST['role_boardmem'];
	$role_specialevents = $_REQUEST['role_specialevents'];
	$role_publicrel = $_REQUEST['role_publicrel'];
	$role_clerical = $_REQUEST['role_clerical'];
	$role_fundraising = $_REQUEST['role_fundraising'];
	$role_marketing = $_REQUEST['role_marketing'];
	$role_writing = $_REQUEST['role_writing'];
	$role_grantwriting = $_REQUEST['role_grantwriting'];
	$role_humanres = $_REQUEST['role_humanres'];
	$role_legalresearch = $_REQUEST['role_legalresearch'];
	$role_healthinfo = $_REQUEST['role_healthinfo'];
	$role_other = $_REQUEST['role_other'];
	$role_other = str_replace('\'', '&#039;', $role_other);
	$role_leadother = $_REQUEST['role_otherlead'];
	$role_leadother = str_replace('\'', '&#039;', $role_leadother);
	$skills_web = $_REQUEST['skills_web'];
	$skills_legal = $_REQUEST['skills_legal'];
	$skills_research = $_REQUEST['skills_research'];
	$skills_proofreading = $_REQUEST['skills_proofreading'];
	$skills_msword = $_REQUEST['skills_msword'];
	$skills_salesmarketing = $_REQUEST['skills_salesmarketing'];
	$skills_fundraising = $_REQUEST['skills_fundraising'];
	$skills_msexcel = $_REQUEST['skills_msexcel'];
	$skills_assembly = $_REQUEST['skills_assembly'];
	$skills_mspoint = $_REQUEST['skills_mspoint'];
	$skills_graphicdesign = $_REQUEST['skills_graphicdesign'];
	$skills_writing = $_REQUEST['skills_writing'];
	$skills_accounting = $_REQUEST['skills_accounting'];
	$skills_recordkeeping = $_REQUEST['skills_recordkeeping'];
	$skills_other = $_REQUEST['skills_other'];
	$skills_other = str_replace('\'', '&#039;', $skills_other);
	$education = $_REQUEST['education'];
	$employexp = $_REQUEST['employexp'];
	$employexp = str_replace('\'', '&#039;', $employexp);
	$othertraining = $_REQUEST['othertraining'];
	$othertraining = str_replace('\'', '&#039;', $othertraining);
	$hobbies = $_REQUEST['hobbies'];
	$hobbies = str_replace('\'', '&#039;', $hobbies);
	$previousexp = $_REQUEST['previousexp'];
	$previousexp = str_replace('\'', '&#039;', $previousexp);
	$ref1_phone = $_REQUEST['ref1_phone'];
	$ref1_phone = str_replace('\'', '&#039;', $ref1_phone);
	$ref1_name = $_REQUEST['ref1_name'];
	$ref1_name = str_replace('\'', '&#039;', $ref1_name);
	$ref1_relationship = $_REQUEST['ref1_relationship'];
	$ref1_relationship = str_replace('\'', '&#039;', $ref1_relationship);
	$ref2_phone = $_REQUEST['ref2_phone'];
	$ref2_phone = str_replace('\'', '&#039;', $ref2_phone);
	$ref2_name = $_REQUEST['ref2_name'];
	$ref2_name = str_replace('\'', '&#039;', $ref2_name);
	$ref2_relationship = $_REQUEST['ref2_relationship'];
	$ref2_relationship = str_replace('\'', '&#039;', $ref2_relationship);
	$avail_project = $_REQUEST['avail_project'];
	$avail_variable = $_REQUEST['avail_variable'];
	$avail_5hour = $_REQUEST['avail_5hour'];
	$avail_10hour = $_REQUEST['avail_10hour'];
	$avail_20hour = $_REQUEST['avail_20hour'];
	$avail_more20 = $_REQUEST['avail_more20'];
	$reason = $_REQUEST['reason'];
	$reason = str_replace('\'', '&#039;', $reason);
	$first_name = $_REQUEST['first_name'];
	$first_name = str_replace('\'', '&#039;', $first_name);
	$last_name = $_REQUEST['last_name'];
	$last_name = str_replace('\'', '&#039;', $last_name);
	$username = $_REQUEST['username'];
	$username = str_replace('\'', '&#039;', $username);
	$email = $_REQUEST['email'];
	$email = str_replace('\'', '&#039;', $email);
	$address1 = $_REQUEST['address1'];
	$address1 = str_replace('\'', '&#039;', $address1);
	$address2 = $_REQUEST['address2'];
	$address2 = str_replace('\'', '&#039;', $address2);
	$city = $_REQUEST['city'];
	$city = str_replace('\'', '&#039;', $city);
	$state = $_REQUEST['state'];
	$state = str_replace('\'', '&#039;', $state);
	$country = $_REQUEST['country'];
	$country = str_replace('\'', '&#039;', $country);
	$zip = $_REQUEST['zip'];
	$zip = str_replace('\'', '&#039;', $zip);
	$phone = $_REQUEST['phone'];
	$phone = str_replace('\'', '&#039;', $phone);
	$status = 'pending';
	$date = date("Y-m-d");
	$convicted = $_REQUEST['convicted'];
	$enjoined = $_REQUEST['enjoined'];


	include ("config.php");

	$sql = "select * from user where login = '$username'";
	$result = mysql_query( $sql ) or die( mysql_error() );

	if( mysql_num_rows( $result ) >= 1 ){
	$duplicate = 'yes';
	
	}else {
	$duplicate = "";

	$sql = "insert into user set login='$username', salt='aaa', password=PASSWORD('letmeinaaa')";
	mysql_query( $sql ) or die( "Error adding user: $login " . mysql_error() );

	$sql = "insert into volunteers set role_leadother='$role_leadother', skills_other='$skills_other', role_committe='$role_committe', date='$date', role_supportforum ='$role_supportforum', role_chathost='$role_chathost', role_web='$role_web', role_boardmem='$role_boardmem', role_specialevents='$role_specialevents', role_publicrel='$role_publicrel', role_clerical='$role_clerical', role_fundraising='$role_fundraising', role_marketing='$role_marketing', role_writing='$role_writing', role_grantwriting='$role_grantwriting', role_humanres='$role_humanres', role_legalresearch='$role_legalresearch', role_healthinfo='$role_healthinfo', role_other='$role_other', skills_web='$skills_web', skills_legal='$skills_legal', skills_research='$skills_research', skills_proofreading='$skills_proofreading', skills_msword='$skills_msword', skills_salesmarketing='$skills_salesmarketing', skills_fundraising='$skills_fundraising', skills_msexcel='$skills_msexcel', skills_assembly='$skills_assembly', skills_mspoint='$skills_mspoint', skills_graphicdesign='$skills_graphicdesign', skills_writing='$skills_writing', skills_accounting='$skills_accounting', skills_recordkeeping='$skills_recordkeeping', education='$education', employexp='$employexp', othertraining='$othertraining', hobbies='$hobbies', previousexp='$previousexp', ref1_phone='$ref1_phone', ref1_name='$ref1_name', ref1_relationship='$ref1_relationship', ref2_phone='$ref2_phone', ref2_name='$ref2_name', ref2_relationship='$ref2_relationship', avail_project='$avail_project', avail_variable='$avail_variable', avail_5hour='$avail_5hour', avail_10hour='$avail_10hour', avail_20hour='$avail_20hour', avail_more20='$avail_more20', reason='$reason', first_name='$first_name', last_name='$last_name', username='$username', email='$email', address1='$address1', address2='$address2', city='$city', state='$state', country='$country', zip='$zip', phone='$phone', status='$status', convicted='$convicted', enjoined='$enjoined'";
	mysql_query( $sql ) or die( "Error creating new volenteer: " . mysql_error() . " Query: $sql " );

	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/main.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<link href="js/main.css" rel="stylesheet" type="text/css">
<script language="javascript" src="js/menu.js"></script>
<script language="javascript" src="js/sidemenu.js"></script>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Kids With Food Allergies - Online Support for Families</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="keywords" content="peanut allergy, dairy free recipes, dairy free, food allergies, food allergy, POFAK, wheat free recipes, egg free recipes, wheat free, nut free, peanut free, milk free recipes, food allergy recipes, milk allergy, egg allergy">
<meta name="description" content="Nonprofit organization providing online support groups, recipes, parent education and news for families raising children with food allergies">
<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
<META NAME="REVISIT-AFTER" CONTENT="7 days"> 
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0  
	window.open(theURL,winName,features);
  return false;
}//-->
</script>

<!-- InstanceEndEditable -->
</head>
<BODY BGCOLOR="#FFFFFF" text="#333333" alink="#17597F">
<div align="center">
  <table id="Table_01" width="750" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td rowspan="2" valign="bottom"> <a href="http://www.kidswithfoodallergies.org"> <img src="siteimages/logof.gif" width="163" height="135" border="0"></a></td>
      <td colspan="4" valign="top"><img src="siteimages/welcomef.gif" width="502" height="63"></td>
    </tr>
    <tr>
      <td colspan="5" valign="bottom" height="72" >
        <table border="1" cellpadding="0" cellspacing="0" bordercolor="#3F679B" width="100%">
          <tr bgcolor="#3F679B">
            <td height='12'>
              <div align="right"><a href="index.html" class="WhiteMenuText">&nbsp;home</a>&nbsp;&nbsp;&nbsp;</div></td>
          </tr>
          <tr>
            <td  valign="middle">
                <table width="100%" bordercolor="#3F679B" border="1" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="22%" height='12'><div align="center"><a href="whatsnew.html" class="PurpleMenuText" title="New Updates to Kids With Food Allergies: Announcements, Publications, and Contests">what's new</a></div></td>
                    <td width="17%"><div align="center"><a href="recipes.html" class="Orange2MenuText" title="Search for dairy free recipes, egg free recipes, nut free recipes, peanut free recipes and more!">recipes</a>&nbsp;</div></td>
                    <td width="19%"><div align="center"><a href="resourcesnew.php" title="Food allergy articles, research, and resources" class="PinkMenuText">resources</a></div></td>
                    <td width="23%"><div align="center"><a href="faalerts.php" class="OrangeMenuText" title="Food allergy recalls for undeclared food allergens">allergy alerts</a></div></td>
                    <td width="19%"><div align="center"><a href="interlink.html" class="Orange2MenuText">allergy links</a></div></td>
                  </tr>
                </table>
                <table width="100%"  height='15' bordercolor="#3F679B" border="1" cellspacing="0" cellpadding="0">
                  <tr >
                    <td width="16%" height="12"><div align="center"><a href="donate.html" class="PinkMenuText"> donate</a></div></td>
                    <td width="16%"><div align="center"><a href="shopping.html" title="Items including food allergy t-shirts, allergy cookbooks and books, children's allergy books, food allergy awareness holiday cards, and more" class="OrangeMenuText">shop KFA </a></div></td>
                    <td width="40%" align="center"><div align="center"><a href="marketplace.html" title="Find makers of allergen free foods, peanut allergy posters, special formula for severe food allergies, epinephrine autoinjectors for anaphylaxis, and more" class="GreenMenuText">allergy buyer's guide</a></div></td>
                    <td width="28%"><div align="center"><a href="community.html" class="GrayMenuText" title="Register as a member or log in to our food allergy message boards">support forums</a></div></td>
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
		  <td colspan="5"><div align="right">&nbsp;<a href="community.html" class="GrayMenuText" title="Become a member of Kids With Food Allergies and the Parents of Food Allergic Kids (POFAK) online allergy support group"> membership</a> &nbsp;&nbsp;<a href="site_map.html" class="PurpleMenuText">site map </a>&nbsp; &nbsp;<a href="contactus.html" class="PinkMenuText">contact us</a>&nbsp;&nbsp; <a href="about.html" class="GreenMenuText">about</a>&nbsp;&nbsp;&nbsp;</div></td>
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
<input type="submit" value="Site Search" class='stylewhite' style="background:#3F679B none; color:#FFFFFF;" />
<input type="hidden" name="zoom_per_page" value="10">
<input type="hidden" name="zoom_and" value="0"/>
<input type="hidden" name="zoom_sort" value="0" />
</form> 
</div></td></tr></TABLE>


</td>
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
  <a href="http://www.kidswithfoodallergies.org/newsletter_sign-up.html" class="style27"><br>
  more info</a>
  </p>
  </td></tr></TABLE>
</form><!-- Newsletter Sign-up --></td>
  </tr>
</table>
	</td>
    </tr>
    <tr>
      <td colspan="5"><img src="siteimages/indexillustrator_07.gif" width="750" height="3"> </td>
    </tr>
    
    <tr valign="top">
      <td colspan="2">
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
        		<tr bgcolor="#E5DEFF" valign="top" align="left">
		          <td >
            	    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#F76973">
		              <tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
            		    <!-- #BeginEditable "topgraphic" --><td colspan="2" bgcolor="#53AA6A"><span class="style11"> 
						<img src="siteimages/about.gif" width="165" height="30"></span>
				    </td><!-- #EndEditable -->
              		  </tr>
		          </table>
            		<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#CCCCCC">
              			<tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
                				<td colspan="2" bgcolor="#E5DEFF">
								<!-- #BeginEditable "menu" --><script>DisplayAboutMenuSSL('','','','','<a href="http://www.kidswithfoodallergies.org/volunteers.html" class="style27">&gt;</a>','','','','','','');</script><!-- #EndEditable --></td>
				      </tr>
		            </table>
			</td>
        	</tr>
   	  </table> 
	  <!-- InstanceBeginEditable name="under menu" --><!-- InstanceEndEditable --></td>
      <td width="12"> <img src="siteimages/indexjan2005_08.gif" width="11" height="246"></td>
      <td colspan="2" align="left" bordercolor="#FFFFFF">
		<table width="100%"  border="0" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#CCCCCC">
		        <tr>
		          <td bgcolor="#CCCCCC"><table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#9999CC">
	            <tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
      		        <!-- InstanceBeginEditable name="graphic" --><td height="33" colspan="2" bgcolor="#77B486"><img src="siteimages/aboutban.gif" width="456" height="60"></td><!-- InstanceEndEditable -->
            	</tr>
	      </table>
	</td>
      </tr>
      </table>
      <table width="100%" border="0" cellpadding="5" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
          <tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
            <!-- #BeginEditable "title" --><td height="33" colspan="2" valign="middle" bgcolor="#77B486"><div align="left" class="style11 style18"> 
		&nbsp;&nbsp;&nbsp; Volunteers</div>
	</td><!-- #EndEditable -->
          </tr>
        </table>
        <table width="100%" height="300" border="0" cellpadding="15" cellspacing="2" bordercolor="#FFFFFF" bgcolor="#E5DEFF">
          <tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
            <td height="33" colspan="2" bgcolor="#EDEDED" >
			<span class="style19"><!-- #BeginEditable "text" -->
<!-- start my code -->
<?

if ($duplicate){

?>
<font face="Verdana, Arial, Helvetica, sans-serif" size="2" align="left">
<p>We already have a profile for Username <? echo $username;?></p>
<p>Please make sure you have the correct username, or that you have not created a profile in the past. 
Please click the BACK button and choose another username or contact us using the link below to find out how to access your profile.
</p>

<p>For questions, please send an email to our <a class="style20" href="https://www.kidswithfoodallergies.org/email.php?to=lynda;" onclick="MM_openBrWindow('https://www.kidswithfoodallergies.org/email.php?to=lynda','','width=500,height=430');return false">Volunteer Coordinator</a></p>

<?

}else {

?>


<font face="Verdana, Arial, Helvetica, sans-serif" size="2" align="left">
<p>Thank you for submitting your Profile!</p>
<p>We look forward to working with you, someone will be in touch with your
shortly to let you know what volunteer opportunities we would like you to fill.</p>

<p>For questions, please send an email to our <a class="style20" href="email.php?to=lynda;" onclick="MM_openBrWindow('email.php?to=lynda','','width=500,height=430');return false">Volunteer Coordinator</a></p>
<?

}
?>
<strong><br>

<!-- end my code -->

            <!-- #EndEditable -->
            </span>

		</td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td> <img src="images/spacer.gif" width="155" height="1" alt=""></td>
      <td width="61"> <img src="images/spacer.gif" width="35" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="11" height="1" alt=""></td>
      <td width="172"> <img src="images/spacer.gif" width="152" height="1" alt=""></td>
      <td width="342"> <img src="images/spacer.gif" width="302" height="1" alt=""></td>
    </tr>
  </table>
  <table width="750" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>	<!-- #BeginEditable "date" -->
      <p align="center" class="style24">Page last updated 3/26/2007</p>
      <!-- #EndEditable -->        <div align="center">		  
         <table width=750 align="center">
                        <tr bgcolor="#FFFFFF"  valign="top" align="center">
                          <td colspan='5'>&nbsp;</td>
                        </tr>
                        <tr bgcolor="#FFFFFF"  valign="top" align="center">
                          <td colspan='5' bgcolor="#3F679B"><span class="style61">KFA is a national nonprofit food allergy support group dedicated to fostering optimal health, <br />nutrition, 
                            and well-being of children with food allergies by providing education and a caring<br /> support community for their families and caregivers.</span></td>
                        </tr>
        
    <tr>
      <td> <img src="images/spacer.gif" width="155" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="35" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="11" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="152" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="302" height="1" alt=""></td>
    </tr></table>
  <p align="center">
  <table width="750" border="0" align='center' cellspacing="0" cellpadding="0">
    <tr><td></td>
      <td><p align="center" class="style24">

<a href="http://www.kidswithfoodallergies.org/whatsnew.html">What's New</a>      <a href="http://www.kidswithfoodallergies.org/recipes.html">Recipes</a>      <a href="http://www.kidswithfoodallergies.org/resourcesnew.php">Parent Education Resources</a>         <a href="http://www.kidswithfoodallergies.org/faalerts.php">Food Allergy Alerts</a>        
<a href="http://www.kidswithfoodallergies.org/interlink.html">Allergy Links</a><BR>        <a href="http://www.kidswithfoodallergies.org/donate.html">Donate</a>   
<a href="http://www.kidswithfoodallergies.org/shopping.html">Shop KFA</a>        <a href="http://www.kidswithfoodallergies.org/marketplace.html">Allergy Friendly Businesses</a>        <a href="http://www.kidswithfoodallergies.org/community.html">Support Forums</a>        <a href="http://www.kidswithfoodallergies.org/membership.html">Membership</a>	<a href="http://www.kidswithfoodallergies.org/contactus.html">Contact Us</a>        <a href="http://www.kidswithfoodallergies.org/about.html">About  </a> <BR>
<BR> 

       <a href="privacy.html">Privacy Policy</a> and <a href="tos.html">Terms of Service</a><br>
            Copyright (c) 2005-2007, Kids With Food Allergies, Inc.
            All Rights Reserved.<br>
            <i>
       Kids With Food Allergies was formerly known as POFAK (Parents of Food Allergic Kids)<br>
        before becoming a tax exempt charity in 2005.</i> &nbsp;</p></td>
    </tr>
  </table>
</div>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-216208-1";
urchinTracker();
</script>
</body>
<!-- InstanceEnd --></html>
