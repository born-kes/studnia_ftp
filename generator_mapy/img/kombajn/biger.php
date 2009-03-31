<?php

if($_GET[pkt]!=Null){
      if($_GET[pkt]< 299 ){$pkt=1;}
  elseif($_GET[pkt]< 999 ){$pkt=2;}
  elseif($_GET[pkt]< 2999 ){$pkt=3;}
  elseif($_GET[pkt]< 8999 ){$pkt=4;}
  elseif($_GET[pkt]< 10999 ){$pkt=5;}
  elseif($_GET[pkt]>= 10999 ){$pkt=6;}
if($_GET[gracz]==1){$pkt.="v";}
$pkt.=".png";}else{$pkt='0.png';}

$dest = imagecreatefrompng("$pkt");
$src = imagecreatefrompng('mie.png');

if($_GET[typ]!=Null){
switch($_GET[typ]){
case 1:
$typ=   ImageCreateFromPng("mie.png"); 
break;
case 2:
$typ=   ImageCreateFromPng("tarc.png"); 
break;
case 3:
$typ=   ImageCreateFromPng("zwi.png"); 
break;
case 4:
$typ=   ImageCreateFromPng("ryck.png"); 
break;
case 5:
$typ=   ImageCreateFromPng("pal.png"); 
break;
default:
$typ=null;
break;
}
if($typ!=Null){imagecopy($dest, $typ, 40, 0, 0, 0, 12,11);}}


switch($_GET[op]){
case 1:
$wykrzyk=   ImageCreateFromPng("wykrzyk.png");
imagecopy($dest, $wykrzyk, 7, 0, 0, 0, 5,11);
break;
default:
break;
}
$kolor = ImageColorAllocate($dest,200,0,0);
$k_txt = ImageColorAllocate($dest,54,254,254);
$off = imagecolorallocate($dest, 175, 0, 0);
$def = imagecolorallocate($dest, 0, 0, 0);
$zw  = imagecolorallocate($dest, 70, 80, 70);
//wojska
if($_GET[mur]!=NULL){ //imagecopy($dest, $mur, 10, 0, 0, 0, 18,18);
$wys=39; for($i=0 ;$i<$_GET[mur]; $i++){ImageRectangle($dest,0,$wys--,8,$wys--,$kolor);} }

imagestring($dest,3,55,-1, $_GET[off],$off);
imagestring($dest,3,55,9,$_GET[def],$def);
imagestring($dest,3,55,18, $_GET[zw],$zw);
ImageString($dest,-1,0,15,$_GET[mur],$k_txt);
ImageString($dest,1,0,28,$_GET[name],$k_txt);

$kolor_tla = ImageColorAllocate($dest,255,55,255);

$kolor_tla_przezroczysty = ImageColorTransparent($dest, $kolor_tla);


header('Content-Type: image/png');
imagepng($dest);

imagedestroy($dest);
imagedestroy($src);
?>