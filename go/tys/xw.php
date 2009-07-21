<?php

if($_GET[t]!=Null){
switch($_GET[t]){
case 1:
$dest=  imagecreatefrompng("mie1.PNG");
break;
case 2:
$dest=  imagecreatefrompng("tarc1.PNG");
break;
case 3:
$dest=  imagecreatefrompng("zwi1.PNG");
break;
case 4:
$dest=  imagecreatefrompng("ck1.PNG");//  LK
break;
case 5:
$dest=  imagecreatefrompng("ck1.PNG");
break;
case 6:
$dest=  imagecreatefrompng("wsi1.PNG");
break;

default:
$dest= imagecreatefrompng("null.PNG");
break;
}}else{$dest= ImageCreateFromPng("null.PNG");}

if($_GET[b]!=Null){
$kolor = ImageColorAllocate($dest,254,254,254);
ImageRectangle($dest,0,10,10,$wys,$kolor);
ImageRectangle($dest,1,11,9,$wys,$kolor);

}

//$rodzaje = array ('brak typu','wioska off','wioska def','wioska ck','wioska palac','wioska zwiadowcza');
$kolor_tla = ImageColorAllocate($dest,255,255,255);
$kolor_tla_przezroczysty = ImageColorTransparent($dest, $kolor_tla);

header('Content-Type: image/png');
imagepng($dest);

imagedestroy($dest);
imagedestroy($src);
?>