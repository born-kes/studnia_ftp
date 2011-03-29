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
$x_0 = 0;
$y_0 =0;
include('i_d.php');
$kolor = ImageColorAllocate($dest,103,130,250);
$kolor_tla_przezroczysty = ImageColorTransparent($dest, $kolor_tla);


//ImageString($dest, 0, 1, 3, $_GET[id],$kolor);
 //$ec =mktime()-$godzina_zero; 
$r[typ] = $_GET[typ];   $x_0=0; $y_0=0;
$r[godz] = $_GET[godz];

$r[mur] = $_GET[mur];
$a = $_GET[ilosc];
$r[pik] = $_GET[pik];
$r[mie] = $_GET[mie];
$r[luk] = $_GET[luk];
$r[ck] = $_GET[ck];
$r[zw] = $_GET[zw];
$r[sz] = $_GET[sz];
$r[data] = $r[pik]+$r[mie]+$r[luk]+$r[ck]+$_GET[zw];
if($r[data]==0){$r[data]=null;}
//$wynik = @mysql_query($zapytanie);

if($_GET!=NULL)
{
//ImageString($dest,1,17,0,'aaa',$kolor );

if( ($r[mur]!=NULL) || ($r[typ]!=NULL&&$r[typ]!=0) || ($r[data]!=NULL) || ($r[sz]!=NULL&&$r[sz]!=0) || ($r[godz]!=NULL) )
{
//$dest=  imagecreatefromgif("img0.gif");

 if($r[mur]!=NULL){ include('imur.php'); }
 if($r[typ]!=NULL&&$r[typ]!=0){ include('ityp.php'); }
 if($r[data]!=NULL){ include('iwoj.php'); }
 if($r[sz]!=NULL&&$r[sz]!=0){ include('isz.php'); }
 if($r[godz]!=NULL){ include('iataki_s.php'); }
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