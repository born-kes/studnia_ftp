<?php

$k_txt = ImageColorAllocate($dest,0,0,0);
$kolor  = ImageColorAllocate($dest,100,55,0);

if($r[mur]>=0){
$flaga =  imagecreatefrompng("m.png");
imagecopy($dest, $flaga , 0, 28, 0, 0, 12,10);

$wys=36;//wojska


 //imagecopy($dest, $mur, 10, 0, 0, 0, 18,18);
for($i=1 ;$i<($r[mur]/3)+1; $i++){ImageRectangle($dest,1,$wys--,10,$wys,$kolor);}

//if($r[mur]==20){ImageRectangle($dest,1,$wys--,10,$wys,$kolor);}
}
if($r[mur]<20){$k_txt = ImageColorAllocate($dest,224,112,0);}
if($r[mur]<5){$k_txt = ImageColorAllocate($dest,204,0,0);}
if($r[mur]<10){$stopka = 4;}else{$stopka = 1;}

ImageString($dest,0,$stopka,29,$r[mur],$k_txt);
?>