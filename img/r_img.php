<?php
session_start();
if(!isSet($_SESSION['zalogowany'])){
$dest=ImageCreate(1,1);
$kolor_tla = ImageColorAllocate($dest,25,25,25);
$kolor_tla_przezroczysty = ImageColorTransparent($dest, $kolor_tla);
header('Content-Type: image/gif');
imagegif($dest);
imagedestroy($dest);
imagedestroy($src);
exit();
}

 include('../connection.php');
$dest=ImageCreate(35,7);
$kolor_tla = ImageColorAllocate($dest,255,255,255);

$kolor = ImageColorAllocate($dest,103,130,250);

//ImageString($dest, 0, 1, 3, $_GET[id],$kolor);
 $ec =mktime()-$godzina_zero; 
$zapytanie="SELECT  wm.data, a.godz, wr.data As dat
FROM ws_all w
LEFT JOIN ws_raport wr ON wr.id = w.id
LEFT JOIN ws_mobile wm ON wm.id = w.id
LEFT JOIN list_ataki a ON w.id = a.cel AND a.godz>$ec
  WHERE w.id='$_GET[id]' ORDER BY `a`.`godz` ASC ;";//LIMIT 1;";
//echo $zapytanie;
connection();
$wynik = @mysql_query($zapytanie);

if($r = mysql_fetch_array($wynik))
{

// Raport z wioski
// Raport Mobilny
// Ataki ??
$k_txt_ = ImageColorAllocate($dest,244,240,24); //¿ó³ty

 if($r[dat]!=null)
 {
    if($r[dat]==NULL          || $r[dat]== $godzina_zero){  $ciag = 'z5';}
elseif($r[dat]<$godzina_jeden && $r[dat]<$godzina_jeden-518400 ){   $ciag ='z2';}
elseif($r[dat]<$godzina_jeden && $r[dat]>$godzina_jeden-518400 ){   $ciag ='z3';}
elseif($r[dat]>$godzina_jeden && $r[dat]<mktime()-$godzina_zero ){  $ciag ='z1';}
elseif($r[dat]<mktime() ){  $ciag ='z4';}

  $rw=  imagecreatefromgif($ciag.".gif");
  imagecopy($dest, $rw, -2, -4, 0, 0, 14,14);
 }

 if($r[data]!=null)
 {
    if($r[dat]==NULL          || $r[dat]== $godzina_zero){  $ciag = 'z5';}
elseif($r[dat]<$godzina_jeden && $r[dat]<$godzina_jeden-518400 ){   $ciag ='z2';}
elseif($r[dat]<$godzina_jeden && $r[dat]>$godzina_jeden-518400 ){   $ciag ='z3';}
elseif($r[dat]>$godzina_jeden && $r[dat]<mktime()-$godzina_zero ){  $ciag ='z1';}
elseif($r[dat]<mktime() ){  $ciag ='z4';}

  $rm=  imagecreatefromgif($ciag.".gif");
  imagecopy($dest, $rm, 9, -4, 0, 0, 14,14);
 }
 if($r[godz]!=null)
 {
  $a= mysql_num_rows($wynik);
  $ata=  imagecreatefromgif("ata.gif");
  imagecopy($dest, $ata, 21, -2, 0, 0, 10,10);
  ImageString($dest,0,30,0,'1',$k_txt_ );
 }

}destructor();

$kolor_tla_przezroczysty = ImageColorTransparent($dest, $kolor_tla);

header('Content-Type: image/gif');
imagegif($dest);

imagedestroy($dest);
imagedestroy($src);//*/

?>