<?PHP
//a => ilosc atakow
//  $mktt =  +$godzina_zero-mktime();
$odliczanie =explode(":", $r[godz]);


//f => fers (pierwszy atak)

if($odliczanie[0]>24){             // wiecej niz 24 godziny
    $f =intval($odliczanie[0]/24);//.'Godz';
    $e = 'dni';
$k_txt = ImageColorAllocate($dest,4,2,2); //czarny
}elseif($odliczanie[0]>=1){         // wiecej niz 1 godzina
    $f =intval($odliczanie[0]);//.'Godz';
    $e = 'godz';
$k_txt = ImageColorAllocate($dest,204,200,200); //bialy
            }else{                 // mniej ni¿ godzina
$k_txt = ImageColorAllocate($dest,244,240,24); //¿ó³ty
    $f=intval($odliczanie[1]);//.'min';
    $e = 'min';}

$flaga =  imagecreatefromgif("ata.gif");
imagecopy($dest, $flaga , 5, 0, 0, 0, 11,11);
$k_txt_ = ImageColorAllocate($dest,244,240,24); //¿ó³ty
//    $e = 'dni';


ImageString($dest,1,17,0,$a,$k_txt_);
ImageString($dest,3,5,13,$f,$k_txt);
ImageString($dest,0,23,17,$e,$k_txt);

?>