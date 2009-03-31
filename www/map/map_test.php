<html><head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="stamm.css">
<script src="../mootools.js" type="text/javascript"></script>
<script src="../scriptt.js" type="text/javascript"></script>
</head>
<body link="#ffffff" alink="#ffffff" vlink="#ffffff">
<?php
include_once(dirname(dirname(__FILE__)) . '/connection.php');
include('f-cja.php');
$xy = explode("|", $_GET[xy]);
include_once('chmurka.php');
echo'<form name="zmiana opisu" action="" METHOD="post">';
echo'<TABLE class="map_container" cellspacing =0 cellpadding =0 align="center"><tbody link="#ffffff" alink="#ffffff" vlink="#ffffff"><TR>';
  $szerokosc = 14; //ilosc kolumn i wierszy
  $step = intval($szerokosc/2);
  $x=$xy[0]-$step;        //z uchwytu pobiera x
  $y=$xy[1]-$step;        //z uchwytu pobiera y
  $wiersz =0;               // wiersz poczatkowy
  $licz = 0;                // liczy ilosc kolumn

echo '<table align="center" style="border: 2px solid rgb(41, 35, 21); background-color: rgb(241, 235, 221);" id="mapCoords" cellpadding="0" cellspacing="0">
<tr><td colspan="2" align="center"><a href="?m=4&xy='.($xy[0]-$szerokosc)."|".($xy[1]-$szerokosc).'">skos</a></td>
<td colspan="1" align="center"><a href="?m=4&xy='.$xy[0]."|".($xy[1]-$szerokosc).'">gora</a></td>
<td colspan="2" align="center"><a href="?m=4&xy='.($xy[0]+$szerokosc)."|".($xy[1]-$szerokosc).'">skos</a></td></tr>
<tr><td colspan="1" align="center"><a href="?m=4&xy='.($xy[0]-$szerokosc)."|".$xy[1].'">bok</td>
<td colspan="3" align="center">

<div style="overflow: hidden; background-image: url(/typ/0.png); position: relative; width: 1060px; height: 690px;" id="map">
<div id="mapOld" style="position: absolute; left: 0px; top: 0px;">
<table class="map" style="border: 2px solid rgb(41, 35, 21); background-color: rgb(241, 235, 221);" cellpadding="0" cellspacing="0">';

    while($wiersz<$szerokosc){$wiersz++;  echo"\n<tr><TD>$y</TD>";                //pêtla 1 = zapisuje wiersze
     while($licz<$szerokosc){ zapelnij_mape($x,$y);                                //pêtla 2 = zapisuje kolumny 
     ++$licz; $x++;
#echo"<TD>$x|$y</td>\n";
}                                                   //koniec wewnêtrznej pêtli
     $licz = 0;                                                 // zeruje kolumne
     $y++;                                                      // nowy wiersz
     $x=$xy[0]-$step;                                         // zeruje x przed pêtla
echo '</tr>';         }
echo"<tr><td></td>";
for($licz=0;$licz<$szerokosc;$licz++){
echo'<td align="center" >'.$x++.'</td>';}
                                                      //koniec zewnêtrznej pêtli
     echo '</tr></TABLE>
</td><td align="center"><a href="?m=4&xy='.($xy[0]+$szerokosc)."|".($xy[1]).'">bok</td></tr>
<tr><td colspan="2" align="center" ><a href="?m=4&xy='.($xy[0]-$szerokosc)."|".($xy[1]+$szerokosc).'">skos</a></td>
<td colspan="1" align="center"><a href="?m=4&xy='.($xy[0])."|".($xy[1]+$szerokosc).'">dol</td>
<td  colspan="2" align="center"><a href="?m=4&xy='.($xy[0]+$szerokosc)."|".($xy[1]+$szerokosc).'">skos</td></tr>
</tbody></table>';
?>
