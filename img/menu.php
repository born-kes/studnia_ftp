<?php
session_start();
if(!isSet($_SESSION['zalogowany'])){

$dest=ImageCreate(99,40);
$kolor_tla = ImageColorAllocate($dest,250,250,250);
$k_txt_cz = ImageColorAllocate($dest,1,1,1);
ImageString($dest,3,5,5,'Niezalogowany ',$k_txt_cz);
header('Content-Type: image/gif');
imagegif($dest);
imagedestroy($dest);
imagedestroy($src);

exit();
}


      include('../hello/id.php');
if($_GET[w]!==$name)
{
$dest=ImageCreate(95,20);
$kolor_tla1 = ImageColorAllocate($dest,240,10,10);
$kolor_tla = ImageColorAllocate($dest,10,10,10);
$k_txt_cz = ImageColorAllocate($dest,1,1,1);
ImageString($dest,3,5,5,'Nowa Wtyczka',$k_txt_cz);

}else{
$dest=ImageCreate(1,1);
$kolor_tla = ImageColorAllocate($dest,0,0,0);

}


$kolor_tla_przezroczysty = ImageColorTransparent($dest, $kolor_tla);
header('Content-Type: image/gif');
imagegif($dest);
imagedestroy($dest);
imagedestroy($src);

?>