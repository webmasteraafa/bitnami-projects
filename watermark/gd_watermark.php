
<?php
$imageURL = "http://localhost:81/watermark/images/3430dbe26bb0-282d-4c34-a854-6a17c5982973.jpg";
list($width,$height) = getimagesize($imageURL);
$imageProperties = imagecreatetruecolor($width, $height);
$targetLayer = imagecreatefrompng($imageURL);
imagecopyresampled($imageProperties, $targetLayer, 0, 0, 0, 0, $width, $height, $width, $height);
$WaterMarkText = 'Safe Eats® Recipes';
$watermarkColor = imagecolorallocate($imageProperties, 191,191,191);
imagestring($imageProperties, 5, 130, 117, $WaterMarkText, $watermarkColor);
header('Content-type: image/jpeg');
imagejpeg ($imageProperties);
imagedestroy($targetLayer);
imagedestroy($imageProperties);
?>
