<?php
	include( "session.php" );
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./main.css" title="mainstyles">
		<link rel="stylesheet" type="text/css" href="./style.css" title="mainstyles2">

		<!--------------------------------------------------------------------------->

		<script>
			function gotoPage( page )
			{
				top.location=page;
			};

			function areYouSure( message )
			{
				return confirm( message + "\r\nAre you sure?" );
			};
		</script>
 		<TITLE>Kids with Food Allergies</TITLE>
	</head>
	<body>
		<table class=main>
			<tr>
				<td width=15% valign=top>

<?php if ( $session->getVar( 'auth' ) == 1 )
					{
					?>
						
						<div align=center>
							<a href='./changepassword.php'>Change Password</a> | <a href='./editvolunteer.php?username=<?php echo $session->getVar('login' ); ?>'>Update Profile</a>  

		<?

	$username = $session->getVar('login' );

			$sql = "select * from independent where username='$username'";
			$result = mysql_query( $sql ) or die( "Error querying volunteers list: " . mysql_error() . " Query: $sql " );
			$row = mysql_fetch_array( $result );
					// If the person's update date is more than 365 days - we want to see their name.
					$date = $row['statement_date'];
					list($year, $month, $day) = split('[-]', $date);
					//echo "Month: $month; Day: $day; Year: $year<br />\n";

					//find interval of time that has passed.
					$time_passed = intval((time()-mktime(0,0,0,$month,$day,$year))/86400);
					//echo "Days that have passed: ".$time_passed."<br>";
						if ($time_passed > 365) {

							echo " | <a href='./volunteer_statement.php?username=".$session->getVar('login')."'>Independent Contractor Statement</a> ";
							$expired++;
						}

	
?>

| <a href='./suggestions.php'>Suggestions / Feedback</a> | <a href='./logout.php'>Logout (<?php echo $session->getVar('login' ); ?>)</a>
						</div>
					<?php
					}
					?>
				</td>
			</tr>
			<tr>
				<td valign=top>
					<br/>
