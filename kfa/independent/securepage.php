<?php
	if ( $session->getVar( 'auth' ) != 1 )
	{
		echo "<html><head><script>
			function gotoLogin()
			{
				top.location='./login.php';
			}
			</script></head>
			<body><strong>You must login to access this page! Please wait...</strong>
			<script> window.setTimeout( 'gotoLogin()', 3000 ) </script>
			</body></html>";
			exit();
	}	
?>