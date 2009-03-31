<?php
// create a 100*30 image
#$im = imagecreate(17, 38);
$im = ImageCreateFromPng("dddz.png");

// white background and blue text
#$bg = imagecolorallocate($im, 50, 140, 50);
$off = imagecolorallocate($im, 175, 0, 0);
$def = imagecolorallocate($im, 0, 0, 0);
$zw  = imagecolorallocate($im, 70, 80, 70);

// write the string at the top left
imagestring($im, 3, 0, 1,  $_GET[off],$off);
imagestring($im, 3, 0, 13, $_GET[def],$def);
imagestring($im, 3, 0, 24, $_GET[zw],$zw);
// output the image
header("Content-type: image/png");
imagepng($im);
?> 