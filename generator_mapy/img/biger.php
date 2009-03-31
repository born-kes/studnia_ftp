<?php

$dest = imagecreatefrompng('0.png');
$src = imagecreatefrompng('unit_axe.png');
$mur=   ImageCreateFromPng("m0.png");

imagecopy($dest, $src, 10, 0, 0, 0, 18,18);

$kolor = ImageColorAllocate($dest,0,0,0);
$k_txt = ImageColorAllocate($dest,255,255,255);
$off = imagecolorallocate($dest, 175, 0, 0);
$def = imagecolorallocate($dest, 0, 0, 0);
$zw  = imagecolorallocate($dest, 70, 80, 70);
//wojska
if($_GET[mur]!=NULL){imagecopy($dest, $mur, 10, 0, 0, 0, 18,18);
$wys=39; for($i=0 ;$i<$_GET[mur]; $i++){ImageRectangle($dest,1,$wys--,9,$wys--,$kolor);} }

imagestring($dest,3,0,1, $_GET[off],$off);
imagestring($dest,3,0,13,$_GET[def],$def);
imagestring($dest,3,0,24, $_GET[zw],$zw);
ImageString($dest,0,0,30,$_GET[mur],$k_txt);
ImageString($dest,0,0,30,$_GET[name],$k_txt);

header('Content-Type: image/png');
imagepng($dest);

imagedestroy($dest);
imagedestroy($src);
?>