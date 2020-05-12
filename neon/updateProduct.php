<?php
  session_start();
  $session_id = $_SESSION['session_id'];
  require('/inc/neon_lib.php');
  
  $unitprice = $_GET['unitprice'];
  $pname = $_GET['productname'];
  $pid = $_GET['productId'];
  $pstatus = $_GET['status'];
  $url = 'https://api.neoncrm.com/neonws/services/api/store/updateProduct?userSessionId='. $session_id .'&product.name=' . $pname . '&product.unitPrice=' .$unitprice . '&product.status=' .$pstatus .'&product.productId='.$pid;
  echo $url;
	$json = curl($url);
  $message = $json[UpdateProductResponse][operationResult];
  echo $message;
  


  
?>