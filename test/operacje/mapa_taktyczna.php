<html><head>
<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
<link rel="stylesheet" type="text/css" href="stamm.css">
<script src="../js/mootools.js" type="text/javascript"></script>
<script src="../js/scriptt.js" type="text/javascript"></script>
</head>
<body>

<?php
//echo $_GET[_xy];
$p=" , ";
include_once(dirname(dirname(__FILE__)) . '/connection.php');
$xy = explode("|", $_GET[_xy]);
echo'<table border="1" align="center"><TR><TD align="center">';

if( $_GET!= null ){

echo '<table style="border: 1px solid rgb(241, 235, 221); background-color: rgb(241, 235, 221);" id="mapCoords" cellpadding="0" cellspacing="0">
<tr>
<td colspan="2" align="center">
<a href="?_xy='.($xy[0]-$_GET[_oko])."|".($xy[1]-$_GET[_oko]).'&_oko='.$_GET[_oko].'">skos</a>
</td>
<td colspan="1" align="center">
<a href="?_xy='.$xy[0]."|".($xy[1]-$_GET[_oko]).'&_oko='.$_GET[_oko].'">gora</a>
</td>
<td colspan="2" align="center">
<a href="?_xy='.($xy[0]+$_GET[_oko])."|".($xy[1]-$_GET[_oko]).'&_oko='.$_GET[_oko].'">skos</a>
</td>
</tr>
<tr>
<td colspan="1" align="center">
<a href="?_xy='.($xy[0]-$_GET[_oko])."|".$xy[1].'&_oko='.$_GET[_oko].'">bok</td>

<td colspan="3" align="center"><table style="border: 1px solid rgb(241, 235, 221); background-color: rgb(241, 235, 221);" id="mapCoords" cellpadding="0" cellspacing="0">';

echo'<TABLE class="map_container" cellspacing =0 cellpadding =0 ><tbody><TR>';
  $step = intval($_GET[_oko]/2);
  $szerokosc = $_GET[_oko]; //ilosc kolumn i wierszy
  $x=$xy[0]-$step;        //z uchwytu pobiera x
  $y=$xy[1]-$step;        //z uchwytu pobiera y
  $licz = 0;                // liczy ilosc kolumn
$yb=$y+$_GET[_oko];

echo '<table style="border: 1px solid rgb(241, 235, 221); background-color: rgb(241, 235, 221);" id="mapp" name="mapp" cellpadding="0" cellspacing="0">';
     while($y<$yb){
    if($licz<$szerokosc){
       $linnia = $y+1;
connection();
      $wynik = @mysql_query("SELECT w.id AS id_wsi,p.id AS id_User, p.name, a.id AS id_plemie, a.tag, w.name, w.points, w.typ, w.data, w.mur, w.pik, w.mie, w.axe, w.luk, w.zw, w.lk, w.kl, w.ck, w.tar, w.kat, w.ry, w.sz
FROM village w, tribe p, ally a
WHERE w.player = p.id
AND p.ally = a.id
      And w.x ='$x'
      And w.y ='$y'");
      $linnie = $x;
            echo'<TD class="';                  //tworzymy linie kontynętów
    if($linnie%10 == 0){echo'c';}else{echo'b';} echo'l ';
    if($linnia%10 == 0){echo'c';}else{echo'b';} echo'b ';                                               // dajemy kolory  ??
 $wx="?1";
      if($r = mysql_fetch_array($wynik))
      {  echo map_color($r[id_User],$r[id_plemie]).'">'; //wioska istnieje

if($_GET[t_w]!=NULL){ $wx.="&t=".$r[typ];  }             // typ wioski

if($_GET[r_w]!=NULL&&$r[data]!=null){$wx.='&r=1';}  // raport istnieje
if($_GET[obrona]!=NULL){
if(ile_woja($r[12],$r[13],$r[14],$r[15], $r[16], $r[17], $r[18],$r[19],$r[20],$r[21],$r[22],$r[23])>35000)
{$wx.="&b=2";}
elseif(ile_woja($r[12],$r[13],$r[14],$r[15], $r[16], $r[17], $r[18],$r[19],$r[20],$r[21],$r[22],$r[23])>18000)            // bunkier
{$wx.="&b=1";}
}
echo'<a href="javascript:popup_scroll(\'menu.php?id='.$r[id_wsi].'\',315,350)">';
if($_GET[sz_w]!=NULL && $r[sz]!=NULL && $r[sz]!=0){$wx.="&sz=1";}

echo'<img src="../img/xw.php'.$wx.'" >';

                                 echo '</td>';
      }else{ echo 'rr"><img src="../img/xw.php"></TD>'; //wioska nie istnieje
      } @destructor();
     $licz++;
     $x++;
}else{  echo"</tr>\n<tr>";
$licz = 0;                 // zeruje kolumne
     $y++;                      // nowy wiersz
     $x=$xy[0]-$step; }//koniec wewnętrznej pętli
              }
     echo "</TR></tbody></TABLE>";
     echo '
</td><td align="center"><a href="?_xy='.($xy[0]+$_GET[_oko])."|".($xy[1]).'&_oko='.$_GET[_oko].'">bok</td></tr>
<tr><td colspan="2" align="center" ><a href="?_xy='.($xy[0]-$_GET[_oko])."|".($xy[1]+$_GET[_oko]).'&_oko='.$_GET[_oko].'">skos</a></td>
<td colspan="1" align="center"><a href="?_xy='.($xy[0])."|".($xy[1]+$_GET[_oko]).'&_oko='.$_GET[_oko].'">dol</td>
<td  colspan="2" align="center"><a href="?_xy='.($xy[0]+$_GET[_oko])."|".($xy[1]+$_GET[_oko]).'&_oko='.$_GET[_oko].'">skos</td></tr>
</tbody></table>';
}

?>