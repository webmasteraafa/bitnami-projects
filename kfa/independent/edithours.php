<?php

	include("htmlheader.php");	
	include("config.php");
	include("common.php");
	$username = $_REQUEST['username'];

	//find last month variable
	$lastmonth=mktime(0,0,0,date("m")-1,1,date("Y"));
	$lastmonth= date("M", $lastmonth);
	
	if ($lastmonth == "Dec") {
		$year = mktime(0,0,0,date("m"),1,date("Y")-1);
		$year = date("Y", $year);
	} else {
		$year= date("Y");
	}
	
	$thismonth = $lastmonth;
	$thismonth .= $year;
	//echo $thismonth;


	//query database for volunteerid
	$sql = "select * from volunteers where username='$username'";
	$result = mysql_query( $sql ) or die( mysql_error() );
	$row = mysql_fetch_array( $result ) or die( mysql_error() );
	$volunteerid = $row['id'];
	//echo $volunteerid;
	
	//query hours database to see if there is alreay an entry for this month.
	$sql = "select * from hours where volunteerid='$volunteerid' and month='$thismonth'";
		$result = mysql_query( $sql ) or die( mysql_error() );

		if( mysql_num_rows( $result ) < 1 ){
		echo "<a href='./edithour.php?month=" . $thismonth . "&volid=". $volunteerid . "'>Enter Volunteer hours for " . $lastmonth . "</a><br>";
			$sql = "select * from hours where volunteerid='$volunteerid' order by date DESC";
			$result = mysql_query( $sql ) or die( mysql_error() );
				while ($row = mysql_fetch_array( $result ))
					echo "<a href='./edithour.php?id=" . $row['id'] . "'>Edit hours for " . $row['month'] . "</a><br>";
		
		}else {
			$sql = "select * from hours where volunteerid='$volunteerid' order by date DESC";
			$result = mysql_query( $sql ) or die( mysql_error() );
				while ($row = mysql_fetch_array( $result )){
					echo "<a href='./edithour.php?id=" . $row['id'] . "'>Edit hours for " . $row['month'] . "</a><br>";
				}

		}


	include("htmlfooter.php");	

?>





  
