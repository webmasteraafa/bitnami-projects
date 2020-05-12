<?php
  session_start();
  $from_page = $_SESSION['from_page'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <?php
      //Code to check were the redirection will occur to go back to page user came from
      if($from_page == "SearchResultPage"){
         echo "<meta http-equiv=\"Refresh\" CONTENT=\"5; URL=SearchPage.php\">";
      }
      if($from_page == "admin"){
         echo "<meta http-equiv=\"Refresh\" CONTENT=\"5; URL=admin.php\">";
      }
      if($from_page == "approved"){
         echo "<meta http-equiv=\"Refresh\" CONTENT=\"5; URL=approved.php\">";
      }
      if($from_page == "BrowseResultPage"){
         $category = $_SESSION['category'];
         echo "<meta http-equiv=\"Refresh\" CONTENT=\"5; URL=browsecategory.php?category=".$category."\">";
      }
   ?>

<link href="http://www.kidswithfoodallergies.org/js/main.css" rel="stylesheet" type="text/css">
<script language="javascript" src="http://www.kidswithfoodallergies.org/js/menu.js"></script>
<script language="javascript" src="http://www.kidswithfoodallergies.org/js/sidemenu.js"></script>
   <link rel="stylesheet" href="style.css" type="text/css" />
   <title>Recipe Confirmation Page</title>
</head>

<body>
<?php
  require("topbanner1.html");
?>

<table class="background" cellpadding="0" cellspacing="0" border="0" align="center">
   <tr>
  
      <td align="center" valign="top">
            
            
            
         <!-- Table showing the message for success -->
         
         
         
         
		<table align="center" border="0" cellpadding="8" cellspacing="2" ID="information" width="468" style="border:#999999 2px solid; margin:10px;">
    <tr>
                    <td class="header" width="306" align="left">&nbsp;<strong>SUCCESS</strong></td>
              </tr>
                  <tr class="cellbg">
                    <td width="460" class="introtext">
                    Your <?php echo $trans_type; ?> transaction(s) has/have been executed successfully.<BR><BR>
                    In a few seconds you will be redirected to the <?php
                                                                        if($from_page == 'admin'){
                                                                           echo "Administrator Page";
                                                                        }else if ($from_page == 'BrowseResultPage'){
                                                                           echo "Browse Page";
												}else if ($from_page == 'approved'){
                                                                           echo "Un-Approve Recipe Page";
                                                                        } else {
                                                                           echo "Search Page";
                                                                        }
                                                                        ?>.
          					</td>
                  </tr>
      </table>
		</td>
	      </tr>
	    </table>


          </td>
          </td>
    </tr>
</DEFANGED_form>
</table>


 <table width="750" border="0" cellspacing="0" cellpadding="0" align="center" style="clear:both">
    <tr>
      <td>	
      <p align="center" class="style24">Page last updated 11/24/2009</p>
       </td></tr>	  
         <tr><td>
         <?php
  require("footer1.html");
?>
         </td></tr></table>
         
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try{
var pageTracker = _gat._getTracker("UA-216208-1");
pageTracker._trackPageview("/Recipe Transaction Successful");
} catch(err) {}</script>
</body>
</html>
