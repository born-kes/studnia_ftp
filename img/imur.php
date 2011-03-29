<?php          //wojska
if($r[mur]>=0){
//imagecopy($dest, $flaga_m , $x_0+0, $y_0+28, $x_0+0, $y_0+0, 12,10);
ImageRectangle($dest,$x_0+6,$y_0+28 ,12+$x_0+6,$y_0+37,$k_txt_cz);
$wys=36;
$mur=intval($r[mur]/3)+1;
for($i=1 ;$i<$mur; $i++){ ImageRectangle($dest,$x_0+7,$y_0+$wys-- ,10+$x_0+7,$y_0+$wys,$kolor_1);}
if($r[mur]==20)         { ImageRectangle($dest,$x_0+7,$y_0+$wys-- ,10+$x_0+7,$y_0+$wys,$kolor_1);}else{
if($r[mur]==0){           ImageRectangle($dest,$x_0+7,$y_0+$wys   ,10+$x_0+7,$y_0+$wys,$kolor_sz);}//else{ $wys--;}
for($i=$mur+1;$i<9;$i++){ ImageRectangle($dest,$x_0+7,$y_0+$wys-- ,10+$x_0+7,$y_0+$wys,$k_txt_sz);}    }

}

if($r[mur]<5 ){             ImageString($dest,0,$stopka+$x_0+7,29+$y_0,$r[mur],$k_txt_20);}else
if($r[mur]<10){$stopka = 4; ImageString($dest,0,$stopka+$x_0+6,29+$y_0,$r[mur],$k_txt_ma);}else
if($r[mur]<20){             ImageString($dest,0,$stopka+$x_0+6,29+$y_0,$r[mur],$k_txt_yo);}else
              {$stopka = 1; ImageString($dest,0,$stopka+$x_0+6,29+$y_0,$r[mur],$k_txt_cz);}


?>