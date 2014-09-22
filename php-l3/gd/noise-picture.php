<?php
session_start();
$i = imagecreatefromjpeg("images/noise.jpg");
$color = imagecolorallocate($i, 64, 64, 64);
imageAntiAlias($i, true);

$nChars = 5;

$randStr = substr(md5(uniqid()), 0 , $nChars);

$_SESSION['randStr'] = $randStr;

$x = 20; $y = 30; $deltaX = 40;

for ($j = 0; $j < $nChars; $j++) {
    
    $size = rand(18, 30);
    $angle = -30 + rand(0, 60);
    
    imagettftext($i, $size, $angle, $x, $y, $color, "fonts/bellb.ttf", $randStr{$j} );
    
    $x +=$deltaX;
}

header('Content-Type: image/jpeg');

imageJPEG($i, null, 50);