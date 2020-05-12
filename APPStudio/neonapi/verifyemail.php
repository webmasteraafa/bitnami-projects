<?php 
session_start();


require('/inc/neon_lib.php');
$session_id = $_SESSION['session_id'];
$acct_email = $_GET['accountemail'];


include ('email_check.php');

$check = Check_email($acct_email, $session_id);
echo $check;
if ($check == "0")
{
	echo "no account in Neon";
}
else 
{
	echo "account in Neon";
}
?>