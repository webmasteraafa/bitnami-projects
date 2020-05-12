<?php

$images = new Imagick(glob('/images/*.JPEG'));

foreach($images as $image) {

    // Providing 0 forces thumbnailImage to maintain aspect ratio
    $image->thumbnailImage(1024,0);

}

$images->writeImages();

?>