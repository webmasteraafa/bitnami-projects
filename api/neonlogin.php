<?php 
		
		$url = neonlogin;
		$json = neon_curl($url);
		//Get session#
		$session_id = $json[loginResponse][userSessionId];
		$_SESSION['session_id'] = $session_id;
		
	    
	    		
?>