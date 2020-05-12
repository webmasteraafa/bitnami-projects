<?php

$script = 'X-Poll';


function insert () { 
	
	include ("../config.php");
	
	// Create Database
	
	$sql = mysql_query ("CREATE DATABASE $db");
	
	include ("../config.php");
	
	// Blocked
	
	$sql = mysql_query ('CREATE TABLE `blocked` ( `blockedid` int( 8 ) NOT NULL default \'0\','
        . ' `ip` varchar( 15 ) NOT NULL default \'\','
        . ' `polls` longtext NOT NULL ) TYPE = MYISAM ');
		
	// IP
	
	$sql = mysql_query ('CREATE TABLE `ip` ( `ipid` int( 8 ) NOT NULL default \'0\','
        . ' `title` varchar( 255 ) NOT NULL default \'0\','
        . ' `ip` varchar( 15 ) NOT NULL default \'\','
        . ' `vote` int( 15 ) NOT NULL default \'0\','
        . ' PRIMARY KEY ( `ipid` ) ) TYPE = MYISAM ');
		
	// Options
	
	$sql = mysql_query ('CREATE TABLE `options` ( `optionid` int( 8 ) NOT NULL default \'0\','
        . ' `pollid` int( 8 ) NOT NULL default \'0\','
        . ' `options` varchar( 255 ) NOT NULL default \'\','
        . ' `images` varchar( 255 ) NOT NULL default \'\','
        . ' `votes` int( 8 ) NOT NULL default \'0\','
        . ' `order_id` int( 8 ) NOT NULL default \'0\','
        . ' PRIMARY KEY ( `optionid` ) ) TYPE = MYISAM ');
		
	// Polls

	$sql = mysql_query ('CREATE TABLE `polls` ( `pollid` int( 8 ) NOT NULL default \'0\','
        . ' `title` varchar( 255 ) NOT NULL default \'\','
        . ' `starts` varchar( 10 ) NOT NULL default \'\','
        . ' `expires` varchar( 10 ) NOT NULL default \'\','
        . ' `vote` int( 15 ) NOT NULL default \'0\','
        . ' `voting` char( 3 ) NOT NULL default \'\','
        . ' `results` char( 3 ) NOT NULL default \'\','
        . ' `graph` char( 3 ) NOT NULL default \'\','
        . ' `resultsvotes` char( 3 ) NOT NULL default \'\','
        . ' `ip` char( 3 ) NOT NULL default \'\','
        . ' `cookies` char( 3 ) NOT NULL default \'\','
        . ' `subdate` varchar( 10 ) NOT NULL default \'\','
        . ' `status` char( 3 ) NOT NULL default \'\','
        . ' PRIMARY KEY ( `pollid` ) ) TYPE = MYISAM ');

	// Test table
	
	$sql = mysql_query ("INSERT INTO ip (ipid, title, ip, vote) VALUES ('1', 'test', '1', '1')");

}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Install <?php echo $script; ?></title>
<style type="text/css">
<!--
body {
	background-color: #D1D1C5;
}
-->
</style>
<link href="../css/css.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php function body ($what) { ?>
<div align="center">
<table width="500" border="0" cellspacing="0" cellpadding="3" class="border2">
	<tr>
		<td height="30" colspan="2" align="center" bgcolor="#0099FF" class="big">
			<b><?php echo $what; ?></b>
		</td>
	</tr>
	<tr align="left">
		<td height="15" colspan="2" valign="top" class="text">
			<p>The following script will install <b><?php echo $what; ?></b>. Before you proceed please ensure that you have completed the following list:<br><br></p>
		</td>
	</tr>
	<tr>
		<td width="465" height="20" align="left" valign="middle" class="text">
			I have edited <i>config.php</i> in the way described in the user guide.
		</td>
	    <td width="35" align="center" valign="middle" class="text">
			<img src="tickbox.gif" alt="tick" width="18" height="18">
		</td>
	</tr>
	<tr>
		<td height="20" align="left" valign="middle" class="text">
			I have uploaded all the files to the place I want.
		</td>
		<td width="35" align="center" valign="middle" class="text">
			<img src="tickbox.gif" alt="tick" width="18" height="18">
		</td>
	</tr>
	<tr>
		<td height="20" align="left" valign="middle" class="text">
			I am aware that the database tables will now be created.
		</td>
		<td align="center" valign="middle" class="text">
			<img src="tickbox.gif" alt="tick" width="18" height="18">
		</td>
	</tr>
	<tr>
		<td height="20" align="left" valign="middle" class="text">
			I agree to vote for <b><?php echo $what; ?></b> at hotscripts.com so others can see it.
		</td>
		<td align="center" valign="middle" class="text">
			<img src="tickbox.gif" alt="tick" width="18" height="18">
		</td>
	</tr>
	<tr align="center">
		<td width="500" height="20" valign="middle" class="text" colspan="2">
			<br><br><a href="<?php echo $_SERVER['PHP_SELF']; ?>?step=2"><img src="install.gif" alt="Install" width="150" height="14" border="0"></a><br><br>
		</td>
	</tr>
	<tr>
		<td height="30" colspan="2" align="center" bgcolor="#0099FF" class="small">
			X-Install by X-Scripts
		</td>
	</tr>
</table>
</div>
<?php } function confirm ($what) { ?>
<div align="center">
<table width="500" border="0" cellspacing="0" cellpadding="3" class="border2">
    <tr>
    	<td height="30" align="center" valign="middle" class="text">
			Thanks! <b><?php echo $what; ?></b> has been installed. Please visit <a href="../admin/index.php" class="text">here</a> to set up a poll
		</td>
   	</tr>
</table>
</div>
<?php 

} function error ($what) {

?>
<div align="center">
<table width="500" border="0" cellspacing="0" cellpadding="3" class="border2">
    <tr>
    	<td height="30" align="left" valign="middle" class="text">
			<p>Error! <b><?php echo $what; ?></b> has not been installed. Please create the database manually using the supplied <b><?php echo $what; ?></b>.sql file. In phpMyAdmin simply do the following: </p>
			<ol>
				<li>Create the database you named in config.php.</li>
			    <li> Now click on the SQL tab and browse for the <b><?php echo $what; ?></b>.sql file.</li>
			    <li>Press Go, and the database should be setup.</li>
			    </ol>
			<p>If you still cannot get <b><?php echo $what; ?></b> to work then please email us @ <a href="mailto:xscripts@f2s.com" class="text">xscripts@f2s.com</a>.</p></td>
   	</tr>
</table>
</div>
<?php 

}

if (!isset ($_REQUEST['step'])) {

	body ($script);
	
} else {

	if ($_REQUEST['step'] == '2') {

		include ("../config.php");

		insert ();
		
		@$getrows = mysql_num_rows (mysql_query ("SELECT ipid FROM ip"));
		
		if ($getrows > '0') {
		
			confirm ($script);
			
			$sql = mysql_query ("TRUNCATE TABLE ip");
			
		} else {
		
			error ($script);
			
		}
		
	}

}

?>
</body>
</html>
