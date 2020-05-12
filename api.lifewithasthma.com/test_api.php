<?php
require ('inc/api_lib.php');
$username = get_aafa_user();
$password = '';
$url = 	'https://community.aafa.org/api/v1/members/487274457288550788?m_id=457293735035228056';
         $json = curl_json($username, $password, $url); 
         	echo $json['user']['displayName'];
           //$displayName = mysql_real_escape_string($displayName);
            echo '<br>';
            echo  $json['user']['emailAddress'];
        $x= 0;
        while ($x <= 5)
        {
        	$field = $json['customProfileFields'][$x]['name'];
            switch ($field){
				case 'First Name (Private)':
				echo $json['customProfileFields'][$x]['value'];
				echo '<br>';
				break;
			    case 'Last Name (Private)':
				echo $json['customProfileFields'][$x]['value'];
				echo '<br>';
				break;
			    case 'I am a':
				echo $custprofileoption =  $json['customProfileFields'][$x]['selectedOptions']['0']['title'];
			    echo '<br>';
				break;
				case 'I manage':
				include ('inc/asthmamanage.php');   
			    echo '<br>';
				break;
				case 'Would you like to find out more about research opportunities or clinical trials that will help shape the future for those living with asthma and allergies?':
				echo $custprofileoption =  $json['customProfileFields'][$x]['selectedOptions']['0']['title'];
			    echo '<br>';
				break;
				case 'default':
				break;
			}
          
            $x = $x + 1;
		}
?>