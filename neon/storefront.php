<?php
session_start();
$session_id = $_SESSION['session_id'];
require('/inc/api_lib.php');
require('/inc/neon_lib.php');
$json = get_category_id($session_id);
$message = $json[ListCategoriesResponse][responseMessage];
echo $message;
$message2 = array();
$message2 = explode(" ",$message);

$counter = $message2[0];


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Storefront Product</title>
</head>
<h3>List Categories</h3>
<table cellpadding="5" width="100%">
<tr><td>Category ID</td><td>Code</td><td>Name</td><td>Description</td><td>Status</td><td>View Porducts</td></tr>
	<?php
	 for ($x =0; $x<$counter; $x++)
		{
		echo '<tr><td>';
		$catid = $json[ListCategoriesResponse][categories][category][$x][categoryId];
		echo $json[ListCategoriesResponse][categories][category][$x][categoryId];
		echo '</td><td>';
		echo $json[ListCategoriesResponse][categories][category][$x][code];
		echo '</td><td>';
		echo $catname = $json[ListCategoriesResponse][categories][category][$x][name];
		echo $catname;
		echo '</td><td>';
		echo $json[ListCategoriesResponse][categories][category][$x][description];															 
		echo '</td><td>';
		echo $json[ListCategoriesResponse][categories][category][$x][status];															 
		echo '</td>';
		echo '<td><a href="ListProducts.php?categoryid=';
		echo $catid ;
		echo '&categoryname=';
		echo $catname;
		echo '">View</a></td></tr>';
	}
				?>
</table>

<body>
</body>
</html>