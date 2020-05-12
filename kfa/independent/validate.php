<?php
include( "session.php" );

?>

<html>
<head>
<script>
function gotoLogin()
{
	top.location='./login.php';
}
</script>

<body>

<?php
	$session->initSession( $_REQUEST['username'], $_REQUEST['password'] );
	//$session->initSession( "kendee", "random7" );
	if(( $session->getVar( 'auth' ) ) && ($session->getVar('userid') < 8))
		echo "<script>top.location='./index.php'</script>";
	else if(( $session->getVar( 'auth' ) ) && ($session->getVar('userid') > 7))
		echo "<script>top.location='./index.php'</script>";
	else
		echo "<strong>Unable to athenticate.</strong> Please wait...
		      <script> window.setTimeout( 'gotoLogin()', 2000 ) </script>";
?>


</body>
</html>
