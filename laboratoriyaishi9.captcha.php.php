<?php
session_start();

header("Content-type: image/png");

$width = 150;
$height = 50;

$image = imagecreate($width, $height);

// Random ranglar
$bg_color = imagecolorallocate($image, rand(200,255), rand(200,255), rand(200,255));
$text_color = imagecolorallocate($image, rand(0,100), rand(0,100), rand(0,100));

// Random harflar
$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$captcha = '';
for ($i = 0; $i < 6; $i++) {
    $captcha .= $chars[rand(0, strlen($chars)-1)];
}

// Sessionga saqlaymiz
$_SESSION['captcha'] = $captcha;

// Shovqin (noise)
for ($i = 0; $i < 50; $i++) {
    imagesetpixel($image, rand(0,$width), rand(0,$height), $text_color);
}

// Matn yozish
imagestring($image, 5, 30, 15, $captcha, $text_color);

imagepng($image);
imagedestroy($image);
?>