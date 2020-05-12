<?php
/*
echo ("after start".session_id()."<BR>");
*/
$KWFAAdmin = '7880084762';
$RecipesInOurDB = '5260079562';
$RecipesDBTeam = '2670065682';

if(isset($_COOKIE['site_2400067262'])){
  $site_cookie = $_COOKIE['site_2400067262'];
  list($u,$md5p,$user_oid,$pref_datetime,$perms_datetime,$pl) = explode("&", $site_cookie);
  $u_name = split("=", $u);
  $u_login = split("=", $l);
  $u_oid = split("=", $user_oid);
  $_SESSION['u_name'] = $u_name;
  $_SESSION['u_login'] = $u_login;
  $_SESSION['u_oid'] = $u_oid;
  
} else {
    echo "<meta http-equiv=\"Refresh\" CONTENT=\"0; URL=http://kidswithfoodallergies.org/resources/resourcesnew.php\">";
}

$result_array = array();
$isAdmin = false;

if (isset($u_oid[1])){
  $db = mysql_connect("www.kidswithfoodallergies.org:3306", "kidswitror_rcp", "allergenfree");
  mysql_select_db("kidswitror_eve",$db);

  $sql = "SELECT GROUP_OID FROM IP_GROUP_USERS WHERE USER_OID ='$u_oid[1]'";
  $result = mysql_query($sql) or trigger_error(mysql_error(), E_USER_ERROR);
  while($row = mysql_fetch_array($result)){
    if (($row['GROUP_OID'] == $KWFAAdmin) || ($row['GROUP_OID'] == $RecipesInOurDB) || ($row['GROUP_OID'] == $RecipesDBTeam)){
      $isAdmin = true;
      break;
    }
  }
}


$_SESSION['user_name'] = $u_name[1];
$_SESSION['user_login'] = $u_login[1];
$_SESSION['user_oid'] = $u_oid[1];
$_SESSION['isAdmin'] = $isAdmin;
$_SESSION['frompage'] = 'introduction';
$_SESSION['db_result'] = $result_array;
$_SESSION['total_rows'] = 0;
$_SESSION['category'] = '';
session_write_close();
//echo ("after session write".session_id()."<BR>");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/maincgi.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<link href="../js/main.css" rel="stylesheet" type="text/css">
<script language="javascript" src="../js/menu.js"></script>
<script language="javascript" src="../js/sidemenu.js"></script>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Kids With Food Allergies - Online Support for Families</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="keywords" content="peanut allergy, dairy free recipes, dairy free, food allergies, food allergy, POFAK, wheat free recipes, egg free recipes, wheat free, nut free, peanut free, milk free recipes, food allergy recipes, milk allergy, egg allergy">
<meta name="description" content="Nonprofit organization providing online support groups, recipes, parent education and news for families raising children with food allergies">
<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
<META NAME="REVISIT-AFTER" CONTENT="7 days">
<?php
include ("config.php");
include ("common.php");
?> 
<!-- InstanceEndEditable -->
</head>
<BODY BGCOLOR="#FFFFFF" text="#333333" alink="#17597F">
<div align="center">
  <table id="Table_01" width="750" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td rowspan="2" valign="bottom"> <a href="http://www.kidswithfoodallergies.org"> <img src="../siteimages/logof.gif" width="163" height="135" border="0"></a></td>
      <td colspan="4" valign="top"><img src="../siteimages/welcomef.gif" width="502" height="63"></td>
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
                    <td width="17%"><div align="center"><a href="http://www.kidswithfoodallergies.org/recipes.html" class="Orange2MenuText" title="Search for dairy free recipes, egg free recipes, nut free recipes, peanut free recipes and more!">recipes</a>&nbsp;</div></td>
                    <td width="19%"><div align="center"><a href="http://www.kidswithfoodallergies.org/resourcesnew.php" title="Food allergy articles, research, and resources" class="PinkMenuText">resources</a></div></td>
                    <td width="23%"><div align="center"><a href="http://www.kidswithfoodallergies.org/faalerts.php" class="OrangeMenuText" title="Food allergy recalls for undeclared food allergens">allergy alerts</a></div></td>
                    <td width="19%"><div align="center"><a href="http://www.kidswithfoodallergies.org/interlink.html" class="Orange2MenuText">allergy links</a></div></td>
                  </tr>
                </table>
                <table width="100%"  height='15' bordercolor="#3F679B" border="1" cellspacing="0" cellpadding="0">
                  <tr >
                    <td width="16%" height="12"><div align="center"><a href="http://www.kidswithfoodallergies.org/donate.html" class="PinkMenuText"> donate</a></div></td>
                    <td width="16%"><div align="center"><a href="http://www.kidswithfoodallergies.org/shopping.html" title="Items including food allergy t-shirts, allergy cookbooks and books, children's allergy books, food allergy awareness holiday cards, and more
" class="OrangeMenuText">shop KFA </a></div></td>
                    <td width="40%" align="center"><div align="center"><a href="http://www.kidswithfoodallergies.org/marketplace.html" title="Find makers of allergen free foods, peanut allergy posters, special formula for severe food allergies, epinephrine autoinjectors for anaphylaxis, and more" class="GreenMenuText">allergy buyer's guide</a></div></td>
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
		  <td colspan="5"><div align="right">&nbsp;<a href="http://www.kidswithfoodallergies.org/community.html" class="GrayMenuText" title="Become a member of Kids With Food Allergies and the Parents of Food Allergic Kids (POFAK) online allergy support group"> membership</a> &nbsp;&nbsp;<a href="http://www.kidswithfoodallergies.org/site_map.html" class="PurpleMenuText">site map </a>&nbsp; &nbsp;<a href="http://www.kidswithfoodallergies.org/contactus.html" class="PinkMenuText">contact us</a>&nbsp;&nbsp; <a href="http://www.kidswithfoodallergies.org/about.html" class="GreenMenuText">about</a>&nbsp;&nbsp;&nbsp;</div></td>
	</tr>
    <tr>
      <td colspan="5" valign="top">
	

<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="54%">
<FORM method=GET action=http://www.google.com/u/KFA>
<TABLE cellspacing=0 border=0><tr valign=top>
<td width="397" align="center">
  <div align="left">
  <INPUT TYPE=text name=q size=15 maxlength=255 value="">
  <input type=hidden name=domains value="kidswithfoodallergies.org">
  <input type=submit name=sa class='stylewhite' style="background:#3F679B none; color:#FFFFFF;" value="Google KFA Search" >
  <input type=hidden name=sitesearch value="kidswithfoodallergies.org">
  <br>&nbsp;
  </div></td></tr></TABLE>
</FORM>

</td>
    <td width="46%" align="right"><!-- Newsletter sign up -->
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
            		    <!-- #BeginEditable "topgraphic" --><td colspan="2" bgcolor="#DF8FBD"><span class="style11"> 
						<img src="../siteimages/resources.gif" width="165" height="30"></span>
				    </td>
            		    <!-- #EndEditable -->
              		  </tr>
		          </table>
            		<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#CCCCCC">
              			<tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
                				<td colspan="2" bgcolor="#E5DEFF">
								<!-- #BeginEditable "menu" -->
                  <table width="100%" height="35" border="0" cellpadding="10" cellspacing="2" bgcolor="#E5DEFF">
                    <tr valign="middle" bordercolor="#FFFFFF" bgcolor="#EDEDED" align="left">
                      <td height="21" valign="top" class="SmallSpaceText"><a href="resourcesnew.php" class="style27">Resources Home</a>
</td>
                      <td width="11%" align="left" valign="top"><a href="resourcesnew.php" class="style27">&gt;</a></td>
</tr>
                    <tr valign="middle" bordercolor="#FFFFFF" bgcolor="#EDEDED" align="left">
                      <td valign="top" class="style21"><a href="resources.php" class="style27">Tip of the Week</a></td>
                      <td width="11%" align="left" valign="middle"></td>
                    </tr>


<!-- List all previous resources in menu start -->

<?
	
	$sql = "select * from resources order by topic";
	$result = mysql_query( $sql ) or die( "Error querying Resources list: " . mysql_error() . " Query: $sql " );
	$topic = '';
	$oldtopic = '';
		while( $row = mysql_fetch_array( $result ) )
		{
	$topic = $row['topic'];
	if (($topic == $oldtopic) ||($topic == '')){
		 echo "";
	}else{
?>
                     <tr valign='middle' bordercolor='#FFFFFF' bgcolor='#EDEDED' align='left'>
                      <td valign="top" class="style21"><a href="resourcetopic.php?topic=<? echo $row['topic']; ?>" class="style27"><? echo GetTopic($row['topic']);?></a></td>
                      <td width="11%" align="left" valign="middle"></td>
                    </tr>
<?
	}
	$oldtopic=$topic;

		}
?>
<!-- List all previous resources in menu end -->
	                    <tr valign="middle" bordercolor="#FFFFFF" bgcolor="#EDEDED" align="left">
                      <td valign="top" class="style21"><a href="supportnet.php" class="style27">Support Net</a></td>
                      <td width="11%" align="left" valign="middle"></td>
                    </tr>

                    <tr valign="middle" bordercolor="#FFFFFF" bgcolor="#EDEDED" align="left">
                      <td valign="top" class="style21"><a href="http://www.kidswithfoodallergies.org/newsletter_sign-up.html" class="style27">Newsletter</a></td>
                      <td width="11%" align="left" valign="middle"></td>
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

								<!-- #EndEditable --></td>
				      </tr>
		            </table>
			</td>
        	</tr>
      	</table> <!-- InstanceBeginEditable name="under menu" --><!-- InstanceEndEditable -->
	</td>
      <td width="12"> <img src="../siteimages/indexjan2005_08.gif" width="11" height="246"></td>
      <td colspan="2" align="left" bordercolor="#FFFFFF">
		<table width="100%"  border="0" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#CCCCCC">
		        <tr>
		          <td bgcolor="#CCCCCC"><table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#9999CC">
	            <tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
      		        <!-- InstanceBeginEditable name="graphic" --><td height="33" colspan="2" bgcolor="#ECAFD2"><img src="../siteimages/resourbann.gif" width="418" height="60"></td>
      		        <!-- InstanceEndEditable -->
            	</tr>
	      </table>
	</td>
      </tr>
      </table>
      <table width="100%" border="0" cellpadding="5" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
          <tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
            <!-- #BeginEditable "title" --><td height="33" colspan="2" valign="middle" bgcolor="#ECAFD2"><div align="left" class="style11 style18"> 
		&nbsp;&nbsp;&nbsp;Resources</div>
	</td><!-- #EndEditable -->
          </tr>
        </table>
        <table width="100%" height="300" border="0" cellpadding="15" cellspacing="2" bordercolor="#FFFFFF" bgcolor="#E5DEFF">
          <tr valign="top" bordercolor="#FFFFFF" bgcolor="#CCCCCC" align="left">
            <td height="33" colspan="2" bgcolor="#EDEDED" >
						<span class="style19"><!-- #BeginEditable "text" -->

            <?php

	$sql = "select * from resources order by topic, title";
	$result = mysql_query( $sql ) or die( mysql_error() );
	
			$topic = '';
			$oldtopic = '';
			$rownum = '';
		while( $row = mysql_fetch_array( $result ) )
		{
			$sdate = $row['sdate'];
			list($myyear, $mymonth) = split('[-]', $sdate);
			$myday = '01';
			$time_passed = intval((time()- mktime(0,0,0,$mymonth,$myday,$myyear))/86400);
			//echo $sdate;
			//echo $time_passed;
			$topic = $row['topic'];
		if ($topic == $oldtopic){
			if ($time_passed < 60){
			echo "<br>&nbsp;&nbsp;&nbsp;<img src='http://www.kidswithfoodallergies.org/siteimages/newicon.gif' width='11' height='10'><a href='resourceshow.php?id=". $row['id']   ."' class='style12'>". $row['title']           ."</a>";
			} else {
			echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='resourceshow.php?id=". $row['id']   ."' class='style12'>". $row['title']           ."</a>";
			}
		}else {
			if ($rownum!='') echo "<br><br>";
			?>
			<a href="resourcetopic.php?topic=<? echo $row['topic']; ?>" class="style16"><? echo GetTopic($row['topic']);?></a>
			<?
			$sdate = $row['sdate'];
			list($myyear, $mymonth) = split('[-]', $sdate);
			$myday = '01';
			$time_passed = intval((time()- mktime(0,0,0,$month,$day,$year))/86400);
			$left = 365 - $time_passed;
			
			if ($time_passed < 60){
			echo "<br>&nbsp;&nbsp;&nbsp;<img src='http://www.kidswithfoodallergies.org/siteimages/newicon.gif' width='11' height='10'><a href='resourceshow.php?id=". $row['id']   ."' class='style12'>". $row['title']           ."</a>";
			} else {
			echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='resourceshow.php?id=". $row['id']   ."' class='style12'>". $row['title']           ."</a>";
			}
		}
	$oldtopic=$topic;
	$rownum++;
	$time_passed = '';
	$sdate = '';
	$mymonth = '';
	$myyear = '';
		}
?>
<br>
<br>

<a href="http://kidswithfoodallergies.org/resources/supportnet.php" class="style16">Support Net</a>
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://kidswithfoodallergies.org/resources/SupportNetSpring07LB.pdf' class='style12'>Spring 2007</a> <span class="style12"></span>
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://kidswithfoodallergies.org/resources/SupportNetWinter06HB.pdf' class='style12'>Winter 2006</a> <span class="style12">(high bandwidth connection - cable or DSL)</span>
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://kidswithfoodallergies.org/resources/SupportNetWinter06LB.pdf' class='style12'>Winter 2006</a> <span class="style12">(low bandwidth connection - dial up)</span>
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://kidswithfoodallergies.org/resources/KWFAsupportnewfall06.pdf' class='style12'>Fall 2006</a> <span class="style12">(high bandwidth connection - cable or DSL)</span>
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://kidswithfoodallergies.org/resources/KWFAsupportnewfall06LR.pdf' class='style12'>Fall 2006</a> <span class="style12">(low bandwidth connection - dial up)</span>
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://kidswithfoodallergies.org/resources/SupportNetSummer06HB.pdf' class='style12'>Summer 2006</a> <span class="style12">(high bandwidth connection - cable or DSL)</span>
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://kidswithfoodallergies.org/resources/SupportNetSummer06LB.pdf' class='style12'>Summer 2006</a> <span class="style12">(low bandwidth connection - dial up)</span>
<br><br><img src='http://www.kidswithfoodallergies.org/siteimages/newicon.gif' width='11' height='10'> = New Resources

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
  <tr>
      <td>	<!-- #BeginEditable "date" -->
      <p align="center" class="style24">Page last updated 3/26/2007</p>
      <!-- #EndEditable -->		<div align="center">
		  
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

       <a href="http://www.kidswithfoodallergies.org/privacy.html">Privacy Policy</a> and <a href="http://www.kidswithfoodallergies.org/tos.html">Terms of Service</a><br>
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
