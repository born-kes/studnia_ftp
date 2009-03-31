<?php

if($_GET[m]!=Null){$dest = imagecreatefrompng("m1.PNG");}else{$dest = imagecreatefrompng("m0.PNG");}

$kolor = ImageColorAllocate($dest,0,0,0);
$k_txt = ImageColorAllocate($dest,255,255,255);
$wys=26;//wojska
if($_GET[m]!=NULL){
ImageRectangle($dest,0,$wys--,8,$wys,$kolor);
ImageRectangle($dest,0,$wys--,8,$wys,$kolor);

 //imagecopy($dest, $mur, 10, 0, 0, 0, 18,18);
for($i=0 ;$i<$_GET[m]; $i++){ImageRectangle($dest,0,$wys--,8,$wys,$kolor);} 
if($_GET[m]==20){ImageRectangle($dest,0,$wys--,8,$wys,$kolor);ImageRectangle($dest,0,$wys--,8,$wys,$kolor);}
}

ImageString($dest,0,0,27,$_GET[m],$k_txt);
//$kolor_tla_przezroczysty = ImageColorTransparent($dest, $k_txt);


header('Content-Type: image/png');
imagepng($dest);

imagedestroy($dest);
imagedestroy($src);
?>