<?php
session_start();
if(!isSet($_SESSION['zalogowany'])){

if($_GET[img]!=NULL){$dest=ImageCreate(53,38);$kolor_tla = ImageColorAllocate($dest,100,150,50); $kolor_tla_przezroczysty = ImageColorTransparent($dest, $kolor_tla); $img= imagecreatefrompng('wsi/'.$_GET[img]);imagecopy($dest, $img , 0, 0, 0, 0, 53,38);}
else{ $dest=ImageCreate(1,1);$kolor_tla = ImageColorAllocate($dest,100,150,50); $kolor_tla_przezroczysty = ImageColorTransparent($dest, $kolor_tla);}

header('Content-Type: image/png');
imagepng($dest);
imagedestroy($dest);
imagedestroy($src);
exit();
}
 include('../connection.php');
$dest=ImageCreate(53,38);

$kolor = ImageColorAllocate($dest,255,255,155);
if($_GET[img]!==NULL){   $img= imagecreatefromgif('wsi/'.$_GET[img].'.gif');   //http://pl5.plemiona.pl/graphic/map/
imagecopy($dest, $img , 0, 0, 0, 0, 53,38);
}

//*
//$kolor_tla = ImageColorAllocate($dest,255,255,255);
//$kolor = ImageColorAllocate($dest,103,130,250);       //ImageString($dest, 0, 1, 3, $_GET[id],$kolor); 

$id = intval($_GET[id]);
$x_0 = 4;
$y_0 =0;
include('img_.php');
//$kolor_tla = ImageColorAllocate($dest,255,255,155);

$kolor_tla_przezroczysty = ImageColorTransparent($dest, $kolor );//*/

header('Content-Type: image/gif');
imagegif($dest);

imagedestroy($dest);
imagedestroy($src);//*/

?>