<?
session_start();                     # deklaracja logowania
if(!isSet($_SESSION['zalogowany'])){
$dest=ImageCreate(200,15);
$kolor_tla = ImageColorAllocate($dest,255,255,255);
$k_txt_ = ImageColorAllocate($dest,0,0,0);

ImageString($dest,2,2,0," Nie jeste¶ zalogowany",$k_txt_);

header('Content-Type: image/gif');
imagegif($dest);
imagedestroy($dest);
exit();
}
 include_once(dirname(dirname(__FILE__)) . '/connection.php');

                                  # deklaracje wstêpne
 function xy($x,$y) { global $x_,$y_;   $x=($x*$x_);   $y=($y*$y_);   return array ($x,$y); }


if($_GET[wymiar]) {$s=$wymiar = intval($_GET[wymiar]);} else {$s=$wymiar =1;}

$x_ = 53;
$y_ = 38;
$x=intval($_GET[x]);
$y=intval($_GET[y]);
                                  # Tworzenie obrazka
 $dest=ImageCreate($x_ * $wymiar ,$y_ * $wymiar );
                                 # deklaracja Kolorów
$kolor_tla = ImageColorAllocate($dest,255,255,255);
$kolor_tla_przezroczysty = ImageColorTransparent($dest, $kolor_tla);
$k_txt_ = ImageColorAllocate($dest,0,0,0);

                                  // Tworzenie zapytania
$oko = intval($wymiar/2);

$x1=$x-$oko; $x2=$x+$oko;
$y1=$y-$oko; $y2=$y+$oko;

$zap="SELECT w.id, w.x, w.y
FROM ws_all w
WHERE w.x <='$x2' AND w.x>='$x1'
  And w.y <='$y2' AND w.y>='$y1'
GROUP BY w.`id`
ORDER BY w.y ASC";
                  //echo $zap;
                                  // Zapytanie
$licz=0;
connection();      $wynik = @mysql_query($zap);
 while($r = mysql_fetch_array($wynik))  {   $xyz[$licz]=xy($r[x]-$x1,$r[y]-$y1); $xyz[$licz++][2]=$r[id]; }
destructor();

foreach($xyz as $xy)
{ $x_0 =$xy[0]; $y_0 =$xy[1];$id = $xy[2];
                             //echo $x_0.' : '.$y_0.' : '.$id.' <br> ';
                             //ImageString($dest,2,2+$x_0,0+$y_0,$id,$k_txt_);
include('img_.php');
}
//imagecopy($dest, $flaga_m , 0, 0, 0, 0, 12,10);
                                  # ³adowanie obrazka

header('Content-Type: image/gif');
imagegif($dest);
imagedestroy($dest);
imagedestroy($src);//*/
?>