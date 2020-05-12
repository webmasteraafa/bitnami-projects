<?php
// Open the original image
$image = new Imagick();
$image->readImage("/watermark/images/3430dbe26bb0-282d-4c34-a854-6a17c5982973.jpg");

// Open the watermark
$watermark = new Imagick();
$watermark->readImage("/watermark/images/watermark.png");

// Overlay the watermark on the original image
$image->compositeImage($watermark, imagick::COMPOSITE_OVER, 2, 160); // specify the x, y co-ordinates of watermark image.

// send the result to the browser
//header("Content-Type: image/" . $image->getImageFormat());
//echo $image; // show image to the borwser without saving on server

$dest_image = "thumb_watermark.jpg";

$image->writeImage($dest_image); // save image on server
$image->destroy();
?>
<img src="<?php $dest_image?>">