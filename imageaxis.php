<?php
$frame = 5;
        $image_path ='Frames/' . $frame . '.jpg' ; 

if (!file_exists($image_path));
    list($width, $height, $type, $attr) = getimagesize($image_path);

    echo $width . ' ' . $height; 
   
?>