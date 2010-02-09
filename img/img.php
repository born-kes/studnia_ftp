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
$dest=ImageCreate(53,38);
$kolor_tla = ImageColorAllocate($dest,255,255,255);

$kolor = ImageColorAllocate($dest,103,130,250);

//ImageString($dest, 0, 1, 3, $_GET[id],$kolor);
 $ec =mktime()-$godzina_zero; 
$zapytanie="SELECT  wm.typ, a.godz, wr.mur,wr.status,
     wr.data,wr.pik,wr.mie,wr.luk,wr.ck,wr.zw,wr.sz
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
//ImageString($dest,1,17,0,'aaa',$kolor );

if( ($r[mur]!=NULL) || ($r[typ]!=NULL&&$r[typ]!=0) || ($r[data]!=NULL) || ($r[sz]!=NULL&&$r[sz]!=0) || ($r[godz]!=NULL) )
{
//$dest=  imagecreatefromgif("img0.gif");

 if($r[mur]!=NULL){ include('imur.php'); }
 if($r[typ]!=NULL&&$r[typ]!=0){ include('ityp.php'); }
 if($r[data]!=NULL){ include('iwoj.php'); }
 if($r[sz]!=NULL&&$r[sz]!=0){ include('isz.php'); }
 if($r[godz]!=NULL){ include('iatak.php'); }
}else{
 //$dest=ImageCreate(1,38);$kolor_tla = ImageColorAllocate($dest,255,255,255);
}

}destructor();

$kolor_tla_przezroczysty = ImageColorTransparent($dest, $kolor_tla);

header('Content-Type: image/gif');
imagegif($dest);

imagedestroy($dest);
imagedestroy($src);//*/

?>