<?php

header("Content-type: image/png");
if($_GET[sz]==NULL){$obrazek = ImageCreateFrompng("m.png");}
else {$obrazek = ImageCreateFrompng("m0.png");

$kolor = ImageColorAllocate($obrazek,0,0,0);
$kolor_tekstu = ImageColorAllocate($obrazek,255,255,255);
$wys=39;
for($i=0;$i<$_GET[sz]; $i++){ImageRectangle($obrazek,1,$wys--,9,$wys--,$kolor);}
ImageString($obrazek,0,0,30,"$_GET[sz]",$kolor_tekstu);}

ImageGif($obrazek);

ImageDestroy($obrazek); 

?>