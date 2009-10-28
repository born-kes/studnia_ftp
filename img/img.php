<?php
 include('../connection.php');
$dest=  imagecreatefrompng("img0.png");

//$kolor = ImageColorAllocate($dest,103,130,250);
//ImageString($dest, 0, 1, 3, $_GET[id],$kolor);
 $ec =mktime()-$godzina_zero; 
$zapytanie=" SELECT v.typ,v.mur,v.opis,v.data,v.sz, v.status,v.pik,v.mie,v.luk,v.ck,v.zw,v.sz,a.godz
  FROM `village` v LEFT JOIN ataki a ON v.id = a.cel AND a.godz>$ec 
  WHERE v.id='$_GET[id]' ORDER BY `a`.`godz` ASC;";
connection();
$wynik = @mysql_query($zapytanie);

if($r = mysql_fetch_array($wynik))
{
  if($r[mur]!=NULL){ include('imur.php'); }
  if($r[typ]!=NULL&&$r[typ]!=0){ include('ityp.php'); }
  if($r[data]!=NULL){ include('iwoj.php'); }
  if($r[sz]!=NULL&&$r[sz]!=0){ include('isz.php'); }
  if($r[godz]!=NULL){ include('iatak.php'); }
}destructor();





$kolor_tla = ImageColorAllocate($dest,255,255,255);
$kolor_tla_przezroczysty = ImageColorTransparent($dest, $kolor_tla);

header('Content-Type: image/png');
imagepng($dest);

imagedestroy($dest);
imagedestroy($src);//*/
?>