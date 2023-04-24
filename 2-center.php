<?php
// (A) OPEN IMAGE
$img = imagecreatefromjpeg('balloon.jpg');

// (B) WRITE TEXT
$red = imagecolorallocate($img, 255, 0, 0);
$txt = "SOLD";
$font = "C:\Windows\Fonts\arial.ttf"; 

// THE IMAGE SIZE
$width = imagesx($img);
$height = imagesy($img);

// THE TEXT SIZE
$text_size = imagettfbbox(24, 0, $font, $txt);
$text_width = max([$text_size[2], $text_size[4]]) - min([$text_size[0], $text_size[6]]);
$text_height = max([$text_size[5], $text_size[7]]) - min([$text_size[1], $text_size[3]]);

// CENTERING THE TEXT BLOCK
$centerX = CEIL(($width - $text_width) / 2);
$centerX = $centerX<0 ? 0 : $centerX;
$centerY = CEIL(($height - $text_height) / 2);
$centerY = $centerY<0 ? 0 : $centerY;
imagettftext($img, 36, 25, $centerX, $centerY, $red, $font, $txt);

// (C) OUTPUT IMAGE
header('Content-type: image/jpeg');
imagejpeg($img);
imagedestroy($jpg_image);