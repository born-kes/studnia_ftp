<?php
$dest = imagecreatefrompng("des.PNG");

$off = imagecolorallocate($dest, 175, 0, 0);
$def = imagecolorallocate($dest, 0, 0, 0);
$zw  = imagecolorallocate($dest, 70, 80, 70);

imagestring($dest,3,0,-1, $_GET[off],$off);
imagestring($dest,3,0,10,$_GET[def],$def);
imagestring($dest,3,0,20, $_GET[zw],$zw);

header('Content-Type: image/png');
imagepng($dest);

imagedestroy($dest);
imagedestroy($src);
?>