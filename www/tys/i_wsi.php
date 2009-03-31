<?php

if($_GET[p]!=Null){
      if($_GET[p]< 299 ){$pkt=1;}
  elseif($_GET[p]< 999 ){$pkt=2;}
  elseif($_GET[p]< 2999 ){$pkt=3;}
  elseif($_GET[p]< 8999 ){$pkt=4;}
  elseif($_GET[p]< 10999 ){$pkt=5;}
  elseif($_GET[p]>= 10999 ){$pkt=6;}
if($_GET[g]==1){$pkt.="v";}
$pkt.=".PNG";}else{$pkt='0.PNG';}

$dest = imagecreatefrompng("$pkt");

if($_GET[t]!=Null){
switch($_GET[t]){
case 0:
$typ=null;
break;
case 1:
$typ=  imagecreatefrompng("mie1.PNG");
break;
case 2:
$typ=  imagecreatefrompng("tarc1.PNG");
break;
case 3:
$typ=  imagecreatefrompng("zwi1.PNG");
break;
case 4:
$typ=  imagecreatefrompng("ck1.PNG");//  LK
break;
case 5:
$typ=  imagecreatefrompng("ck1.PNG");
break;
case 6:
$typ=  imagecreatefrompng("wsi1.PNG");
break;
default:
$typ=null;
break;
}
if($typ!=Null){imagecopy($dest, $typ, 32, 0, 0, 0, 11,11);}}

switch($_GET[op]){
case 1:
$wykrzyk=   ImageCreateFromPng("wykrzyk.png");
imagecopy($dest, $wykrzyk, 5, 4, 0, 0, 5,11);
break;
default:
break;
}
$kolor_tla = ImageColorAllocate($dest,255,255,255);
$kolor_tla_przezroczysty = ImageColorTransparent($dest, $kolor_tla);

header('Content-Type: image/png');
imagepng($dest);

imagedestroy($dest);
imagedestroy($src);
?>