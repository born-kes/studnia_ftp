<?php

$dest = imagecreatefrompng("ata.png");
$k_txt_ = ImageColorAllocate($dest,230,230,50);
$k_txt = ImageColorAllocate($dest,200,0,50);
ImageString($dest,1,17,0,$_GET[a],$k_txt_);
ImageString($dest,3,0,13,$_GET[f],$k_txt);
ImageString($dest,0,17,17,'min.',$k_txt);
//a => atak
//f => fers (pierwszy atak)
$kolor_tla = ImageColorAllocate($dest,255,255,255);
$kolor_tla_przezroczysty = ImageColorTransparent($dest, $kolor_tla);

header('Content-Type: image/png');
imagepng($dest);

imagedestroy($dest);
imagedestroy($src);
?>