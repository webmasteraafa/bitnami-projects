<?php 
function db_connect(){
	define('SQL_HOST','localhost:3306');
	define('SQL_USER','admin-image-app');
	define('SQL_PASS','nFae@830');
	define('SQL_DB','admin_image-app');

	$conn = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS)
	or die ('Could not connect to  database; ' .mysql_error());
	mysql_select_db(SQL_DB, $conn)
	or die ('Could not select database; ' . mysql_error());
	
	
}
db_connect();
$doc_root = $_SERVER["DOCUMENT_ROOT"];
$album = 'matt';
$category = 'recalls';
$filename = 'setup_file.csv';

$target_path = $doc_root.'/media/' .$album .'/'. $category.'/'.$filename;
echo $target_path;
    $handle = fopen($target_path,"r");
    
    //loop through the csv file and insert into database
    do {
        if ($data[0]) {
            mysql_query("INSERT INTO `images` (`id`, `filelocation`, `imagename`, `extension`, `uploaddate`, `album`, `category`, `user`, `keywords`, `liscense`, `tracking`, `source`, `notes`, `version`) VALUES
                (
                    '".addslashes($data[0])."',
                    '".addslashes($data[1])."',
                    '".addslashes($data[2])."',
                     '".addslashes($data[3])."',
                    '".addslashes($data[4])."',
                    '".addslashes($data[5])."',
                     '".addslashes($data[6])."',
                    '".addslashes($data[7])."',
                    '".addslashes($data[8])."',
                    '".addslashes($data[9])."',
                     '".addslashes($data[10])."',
                    '".addslashes($data[11])."',
                    '".addslashes($data[12])."',
                     '".addslashes($data[13])."'
                )
            ");
            echo $data[1];
        }
    } while ($data = fgetcsv($handle,1000,",","'"));


?>