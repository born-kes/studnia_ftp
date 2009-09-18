<html><head>
<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
<link rel="stylesheet" type="text/css" href="stamm.css">
<script src="../js/mootools.js" type="text/javascript"></script>
<script src="../js/scriptt.js" type="text/javascript"></script>
</head>
<body>

<?php include_once(dirname(dirname(__FILE__)) . '/connection.php');

if(isSet($_SESSION['id'])){ $moje_id= $_SESSION['id'];}
else{ $user=$_SESSION['zalogowany'];
  connection();
     $wynik = mysql_query("SELECT `Id` FROM `Users` WHERE Nazwa='$user'")or die('Blad zapytania');
       if($r = mysql_fetch_row($wynik)){$moje_id=$r[0];}
  destructor();
}
function map_color($id_gracz,$id_plemie)
{  global $moje_id;
if($id_gracz==0){return 'sz';}
elseif($id_gracz==$moje_id){ return 'ja';}

switch($id_plemie){
case 47716:
    return 'so';       //@~HW~@
case  48588:
   return 'po';       //NWO
case  51473:
   return 'po';       //TK
case  422:
   return 'aa';       //RedRub
case  4469:
   return 'aa';       //~ZP~
case  5416:
   return 'aa';       //JEJ
case  23185:
   return 'aa';       //-MAD-
case  23660:
   return 'aa';       //-BAE-
case  26084:
   return 'aa';       //ZCR
case  50650:
   return 'aa';       //SmAp
case  51091:
   return 'aa';       //NA
case  50811:
   return 'my';       //-SNRG-
//case 0:
//break;
default:
   return 'in';          // inne
break;             }
}

$nosnik="&_oko=".$_GET[_oko]."&t_w=".$_GET[t_w]."&r_w=".$_GET[r_w]."&obrona=".$_GET[obrona]."&sz_w=".$_GET[sz_w];
//echo $_GET[_xy];
$p=" , ";
$xy = explode("|", $_GET[_xy]);
echo'<table border="1" align="center"><TR><TD align="center">';

if( $_GET!= null ){

echo '<table style="border: 1px solid rgb(241, 235, 221); background-color: rgb(241, 235, 221);" id="mapCoords" cellpadding="0" cellspacing="0">
<tr>
<td colspan="2" align="center">
<a href="?_xy='.($xy[0]-$_GET[_oko])."|".($xy[1]-$_GET[_oko]).$nosnik.'"><img src="http://pl5.plemiona.pl/graphic/map/map_nw.png?1" style="z-index: 1; position: relative;" alt="map/map_n.png"></a>
</td>
<td colspan="1" align="center">
<a href="?_xy='.$xy[0]."|".($xy[1]-$_GET[_oko]).$nosnik.'"><img src="http://pl5.plemiona.pl/graphic/map/map_n.png?1" style="z-index: 1; position: relative;" alt="map/map_n.png"></a>
</td>
<td colspan="2" align="center">
<a href="?_xy='.($xy[0]+$_GET[_oko])."|".($xy[1]-$_GET[_oko]).$nosnik.'"><img src="http://pl5.plemiona.pl/graphic/map/map_ne.png?1" style="z-index: 1; position: relative;" alt="map/map_n.png"></a>
</td>
</tr>
<tr>
<td colspan="1" align="center">
<a href="?_xy='.($xy[0]-$_GET[_oko])."|".$xy[1].$nosnik.'"><img src="http://pl5.plemiona.pl/graphic/map/map_w.png?1" style="z-index: 1; position: relative;" alt="map/map_w.png"></td>

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
      $wynik = @mysql_query("SELECT w.id AS id_wsi,p.id AS id_User, p.name, a.id AS id_plemie, a.tag, w.name, w.typ, w.data, w.mur, w.status, w.sz, w.points
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

if($_GET[t_w]!=NULL){ $wx.="&t=".$r[typ];  }
elseif($_GET[t_w]==NULL){
if($r[points]>3000){ $wx.="&ww=2";  }else{$wx.="&ww=1";}
}

if($_GET[r_w]!=NULL&&$r[data]!=null){$wx.='&r='.data_map($r[data]);}  // raport istnieje
if($_GET[obrona]!=NULL){
$wx.="&b=$r[status]";
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
</td><td align="center"><a href="?_xy='.($xy[0]+$_GET[_oko])."|".($xy[1]).$nosnik.'"><img src="http://pl5.plemiona.pl/graphic/map/map_e.png?1" style="z-index: 1; position: relative;" alt="map/map_e.png"></td></tr>
<tr><td colspan="2" align="center" ><a href="?_xy='.($xy[0]-$_GET[_oko])."|".($xy[1]+$_GET[_oko]).$nosnik.'"><img src="http://pl5.plemiona.pl/graphic/map/map_sw.png?1" style="z-index: 1; position: relative;" alt="map/map_se.png"></a></td>
<td colspan="1" align="center"><a href="?_xy='.($xy[0])."|".($xy[1]+$_GET[_oko]).$nosnik.'"><img src="http://pl5.plemiona.pl/graphic/map/map_s.png?1" style="z-index: 1; position: relative;" alt="map/map_s.png"></td>
<td  colspan="2" align="center"><a href="?_xy='.($xy[0]+$_GET[_oko])."|".($xy[1]+$_GET[_oko]).$nosnik.'"><img src="http://pl5.plemiona.pl/graphic/map/map_se.png?1" style="z-index: 1; position: relative;" alt="map/map_sw.png"></td></tr>
</tbody></table>';
}

?>