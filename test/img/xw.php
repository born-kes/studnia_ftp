<?php

if($_GET[t]!=Null){
switch($_GET[t]){
case 1:
$dest=  imagecreatefrompng("off.png");
break;
case 2:
$dest=  imagecreatefrompng("def.png");
break;
case 3:
$dest=  imagecreatefrompng("zw.png");
break;
case 4:
$dest=  imagecreatefrompng("lk.png");//  LK
break;
case 5:
$dest=  imagecreatefrompng("ck.png");
break;
case 6:
$dest=  imagecreatefrompng("dr.png");
break;

default:
$dest= imagecreatefrompng("null.PNG");
break;
}}else{$dest= ImageCreateFromPng("null.PNG");}

if($_GET[r]!=Null){ //raport
$kolor_cz = ImageColorAllocate($dest,1,1,1);
ImageRectangle($dest,7,8,8,7,$kolor_cz);
}
if($_GET[b]!=Null){
  if($_GET[b]==0){
  //$kolorrz = ImageColorAllocate($dest,154,154,24);
  /* ImageRectangle($dest,12,12,12,12,$kolorrz);*/
  }elseif($_GET[b]==1){
 $kolor = ImageColorAllocate($dest,254,254,254);
   ImageRectangle($dest,0,9,10,10,$kolorrz);
  }elseif($_GET[b]==2){
 $kolor = ImageColorAllocate($dest,254,254,254);
   ImageRectangle($dest,0,9,10,10,$kolor);
  }elseif($_GET[b]==3){
 $kolor = ImageColorAllocate($dest,254,254,254);
  ImageRectangle($dest,0,0,1,10,$kolor);
  ImageRectangle($dest,9,0,10,10,$kolor);
  ImageRectangle($dest,0,10,10,10,$kolor);
  }
}
if($_GET[sz]!=NULL){
$kolor_sz = ImageColorAllocate($dest,140,140,0);
ImageRectangle($dest,0,0,10,1,$kolor_sz);
}

//$rodzaje = array ('brak typu','wioska off','wioska def','wioska ck','wioska palac','wioska zwiadowcza');
$kolor_tla = ImageColorAllocate($dest,255,255,255);
$kolor_tla_przezroczysty = ImageColorTransparent($dest, $kolor_tla);

header('Content-Type: image/png');
imagepng($dest);

imagedestroy($dest);
imagedestroy($src);
?>