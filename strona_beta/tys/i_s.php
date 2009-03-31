<?php

$dest = imagecreatefrompng("pod.PNG");
$k_txt = ImageColorAllocate($dest,0,0,0);
ImageString($dest,1,0,0,$_GET[n],$k_txt);

//$kolor_tla_przezroczysty = ImageColorTransparent($dest, $k_txt);

header('Content-Type: image/png');
imagepng($dest);

imagedestroy($dest);
imagedestroy($src);
?>