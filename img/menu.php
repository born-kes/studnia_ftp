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

$dest=ImageCreate(15,15);
$kolor_tla = ImageColorAllocate($dest,0,0,0);

      include('../hello/id.php');
if($_GET[w]!==$name)
{
// jest nowsza wersja z4.gif
$src =  imagecreatefromgif("z4.gif");
imagecopy($dest, $src, 2, 0, 0, 0, 15,15);

}


$kolor_tla_przezroczysty = ImageColorTransparent($dest, $kolor_tla);
header('Content-Type: image/gif');
imagegif($dest);
imagedestroy($dest);
imagedestroy($src);

?>