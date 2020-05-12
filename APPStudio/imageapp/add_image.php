<?php 
include ('/../main_files/inc/lib.php');
include ('/inc/image_app_lib.php');
db_connect();

//Server 
$imagename = $_POST['image-name'];
$filelocation = $_POST['file-location'];
$website= $_POST['website'];
$action = $_POST['action'];
echo $website;
echo $action;
//Album
$album_name = $_POST['albumname'];
// Category 
$category_name = $_POST['categoryname'];
$albums = $_POST['albums'];

switch ($action){

	case 'add':
		add_image_db ($imagename, $filelocation, $website);
		break;
	case 'add_album':
		add_album($album_name);
		break;
    case 'add_category':
		add_category($category_name, $albums);
		break;
	



}
?>