<?php
session_start();
$categoryid = $_GET['categoryid'];
$categoryname = $_GET['categoryname'];
$session_id = $_SESSION['session_id'];
require('/inc/api_lib.php');
require('/inc/neon_lib.php');
$json = get_product_listing($session_id, $categoryid);
$message = $json[ListProductsResponse][responseMessage];
echo $message;
$message2 = array();

$message2 = explode(" ",$message);

$counter = $message2[0];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Storefront Product Listing</title>
</head>
<h3>List Products </h3>
<table cellpadding="5" width="100%">
<tr><td>Product ID</td><td>Category Name</td><td>Name</td><td>Status</td><td>Unit Price</td><td>Change status</td></tr>
	<?php
	 for ($x=0; $x<$counter; $x++)
		{
		echo '<tr><td>';
		echo $json[ListProductsResponse][products][product][$x][productId];
		$pid = $json[ListProductsResponse][products][product][$x][productId];
		echo '</td><td>';
		echo $categoryname;
		echo '</td><td>';
		echo $json[ListProductsResponse][products][product][$x][name];
		$pname = $json[ListProductsResponse][products][product][$x][name];
		echo '</td><td>';
		echo $json[ListProductsResponse][products][product][$x][status];
	 $pstatus = $json[ListProductsResponse][products][product][$x][status];
		switch ($pstatus)
		{
			 case 'INACTIVE':
					$pstatus = 'ACTIVE';
					break;
				case 'ACTIVE':
					$pstatus ='INACTIVE';
					break;
		}
		echo '</td><td>';
		echo $json[ListProductsResponse][products][product][$x][unitPrice];
		$unitprice = $json[ListProductsResponse][products][product][$x][unitPrice];
		echo '</td>';
		echo '<td><a href="UpdateProduct.php?productId=';
		echo $pid;
		echo '&productname=';
		echo $pname;
		echo '&unitprice=';
		echo $unitprice;
		echo '&status=';
		echo $pstatus;
		echo '">Update Status</a></td></tr>';
		
	} ?>
</table>

<body>
</body>
</html>