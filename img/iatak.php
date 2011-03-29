<?PHP
//*/a => ilosc atakow
$a= mysql_num_rows($wynik);
  $mktt =  $r[godz]+$godzina_zero-mktime();
$odliczanie =explode(":", przeliczenie($mktt));
//f => fers (pierwszy atak)

if($odliczanie[0]>24){             // wiecej niz 24 godziny
    $f =intval($odliczanie[0]/24);//.'Godz';
  if($f==1){$e='dzien';}else{ $e = 'dni'; }
$k_txt_a = $k_txt_zie; //czarny
}elseif($odliczanie[0]>=1){         // wiecej niz 1 godzina
    $f =intval($odliczanie[0]);//.'Godz';
    $e = 'godz';
$k_txt_a = $k_txt_red; //szary
            }else{                 // mniej ni¿ godzina
$k_txt_a = $k_txt_yo; //¿ó³ty
    $f=intval($odliczanie[1]);//.'min';
    $e = 'min';}

                    $flaga_a =  imagecreatefromgif("ata.gif");
imagecopy($dest, $flaga_a, 5+$x_0+28, 0+$y_0+5, 0+$x_0-4, 0+$y_0, 12,12);
$k_txt_ = $k_txt_yo; //¿ó³ty
//    $e = 'dni';

if($a>9){$as_ = -5;}else{$as_ = 0;}
ImageString($dest,1,17+$x_0+28+$as_,0+$y_0,$a,$k_txt_); // ilo¶æ ataków
ImageString($dest,3,5+$x_0,13+$y_0,$f,$k_txt_a);  // odliczanie
ImageString($dest,0,23+$x_0,17+$y_0,$e,$k_txt_a);   // slowo
//*/
?>