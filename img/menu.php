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


      include('../hello/id.php');
if($_GET[w]!==$name)
{
$dest=ImageCreate(15,10);
$kolor_tla = ImageColorAllocate($dest,10,10,10);

// jest nowsza wersja z4.gif
$src =  imagecreatefromgif("z4.gif");
imagecopy($dest, $src, 2, 0, 0, 0, 15,15);

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