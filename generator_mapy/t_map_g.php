<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Aurelia1 (613|681) - Plemiona</title>


<link rel="stylesheet" type="text/css" href="img/stamm1201718544.css">
<script src="img/mootools.js" type="text/javascript"></script>
<script src="img/script.js" type="text/javascript"></script>
</head>
<BR><BR>
<table><tr><td><b>LEGENDA : </b></td>
<td><img src="img/m3.png"></td><td><b>mur</b>
<td><img src="img/img.php?off=Off&def=deff&zw=zwiad"></td><td>-off<br>-def<br>-zwiad</td>
<td><img src="img/img.php?off=01&def=&zw="></td><td>01 oznacza 0,1<br>10% zagrody?<br> tutaj<b> off</b></td>
<td><img src="img/img.php?off=&def=6&zw="></td><td>6 x 18k <br> Ile wiosek broni<br> <b>tu deff</b></td>
<td><img src="img/img.php?off=&def=&zw=00"></td><td>tylko <b>Zwiad</b><br>liczymy w tys. <br>00 to mniej ni¿ 100</td>


</table><br><br>

<body style="margin-top: 6px;">
<tbody>

<?php
require "chmurka.php";
echo'<form name="zmiana opisu" action="" METHOD="post">';
echo'<TABLE class="map_container" cellspacing =0 cellpadding =0 ><tbody><TR>';
  $step = intval($_GET[szer]/2);
  $szerokosc = $_GET[szer]; //ilosc kolumn i wierszy
  $x=$_GET[x]-$step;        //z uchwytu pobiera x
  $y=$_GET[y]-$step;        //z uchwytu pobiera y
  $wiersz =0;               // wiersz poczatkowy
  $licz = 0;                // liczy ilosc kolumn
echo '<table style="border: 1px solid rgb(241, 235, 221); background-color: rgb(241, 235, 221);" id="mapCoords" cellpadding="0" cellspacing="0">';
$p=", ";
require "connection.php";
    while($wiersz<$szerokosc){$wiersz++;  echo"</tr>\n<tr>";  //pêtla 1 = zapisuje wiersze
     while($licz<$szerokosc){                                 //pêtla 2 = zapisuje kolumny

connection();
      $wynik = @mysql_query("SELECT w.id AS id_wsi, w.x, w.y, p.id AS id_User, p.name, a.id AS id_plemie, a.tag, w.name, w.points, w.typ, w.data, w.mur, w.pik, w.mie, w.axe, w.luk, w.zw, w.lk, w.kl, w.ck, w.tar, w.kat, w.ry, w.sz, w.opis
FROM village w, tribe p, ally a
WHERE w.player = p.id
AND p.ally = a.id
      And w.x ='$x'
      And w.y ='$y'")or die('Blad zapytania');

   echo'<TD class="';                  //tworzymy linie kontynêtów
   $linnie = $x;
if($linnie%10 == 0){echo'con';}else{echo'border';}echo'-left-new ';

   $linnia = $y+1;                             //tworzymy linie kontynêtów
if($linnia%10 == 0){echo'con';}else{echo'border';}echo'-bottom-new" ';

      if($r = mysql_fetch_array($wynik)){       //za³adowanie zapytania do $r   - wioska istnieje
                                               // dajemy kolory
      echo 'style="background-color: rgb';    //tabeli td
    switch($r[5]){
case 0:
 echo '(190, 190, 190);">';
  break;
case 4469:
 echo '(244, 0, 0);">';              //zp
  break;
case 50811:
 echo '(0, 0, 200);">';              //-SNRG- i HW
  break;
case 23185:
 echo '(241, 235, 221);">';          //MAD
  break;
default:
 echo '(170, 100, 0);">';
  break;
}
if($r[typ]!=NULL){$typ= $r[typ];}else{$typ="'NULL'";}		//typ
if($r[11]!=NULL){$mur= $r[11];}else{$mur="' '";}		//mur
if($r[7]!=NULL){$wsi="'".$r[7]."(".$r[1]."|".$r[2].") pkt:".$r[8]."'";}else{$wsi="'Blad'";}	//nazwa wioski(x|y)

                                                //wykrywamy istnienia
 if($user=$r[id_User]&&$r[id_User]!=0){         //gracz istnieje
     if($r[5]==0){$gracz="'".$r[4]."'";
    }else{$plemz=urldecode($r[6]);
    $gracz="'".$r[4]."(".$plemz.")'";}		//gracz (plemie)
   $gr=1;
   $raport_gracz=$gracz;
 }else{                                         //gracz nie istnieje
   $gr=0;
   $raport_gracz="'NULL'";
 }

if($opis=$r[opis]&&$r[opis]!=''){              //opis istnieje
   $op=1;
   $raport_opis="'".$opis."'";                //opis
 }else{
   $op=0;                                     //opis nie istnieje
   $raport_opis="'NULL'";
 }

if($data=$r[data]){                          //raport istnieje   $r[10]
     $da="'".$data."'";	                      //data
     $off = $r[axe]+($r[lk]*4)+ ($r[kl]*5)+ ($r[tar]*5)+ ($r[kat]*6);
     $def= $r[pik]+$r[mie]+$r[luk]+($r[ck]*6);
     $zw=$r[zw];
                                                            //sumuje wojsko - off
  if($off!=Null){
               if($off>18000){$off=intval($off/18000);}
               else{$off='0'.intval($off/1800);}}
  elseif($data!=null){$off=0;}elseif($data==null){$off=' ';}
                                                            //sumuje wojsko - def
  if($def!=Null){
               if($def>18000){$def=intval($def/18000);}
               else{$def='0'.intval($def/1800);}}
  elseif($data!=null){$def=0;}elseif($data==null){$def=' ';}
                                                            //sumuje wojsko - zw
  if($zw!=Null){
              if($zw>999){$zw=intval($zw/1000);}
              else{$zw='0'.intval($zw/100);}}
  elseif($data!=null){$zw=0;}elseif($data==null){$zw=' ';}

if($r[pik]!==NULL){$w[0]=$r[12];}else{$w[0]="' '";}      //pik
if($r[mie]!==NULL){$w[1]=$r[13];}else{$w[1]="' '";}      //miecz
if($r[axe]!==NULL){$w[2]=$r[14];}else{$w[2]="' '";}      //axe
if($r[luk]!==NULL){$w[3]=$r[15];}else{$w[3]="' '";}      //luk
if($r[tar]!==NULL){$w[4]=$r[20];}else{$w[4]="' '";}      //tar
if($r[ryc]!==NULL){$w[5]=$r[22];}else{$w[5]="' '";}      //ry

if($r[zw]!==NULL){$w[6]= $r[16];}else{$w[6]= "' '";}     //zw
if($r[lk]!==NULL){$w[7]= $r[17];}else{$w[7]= "' '";}     //lk
if($r[kl]!==NULL){$w[8]= $r[18];}else{$w[8]= "' '";}     //k³
if($r[ck]!==NULL){$w[9]= $r[19];}else{$w[9]= "' '";}     //ck
if($r[kat]!=NULL){$w[10]=$r[21];}else{$w[10]="' '";}     //kat
if($r[sz]!==NULL){$w[11]=$r[23];}else{$w[11]="' '";}	 //sz
$raport_data=$da.$p.$o6[0].$p.$o6[1].$p.$o6[2].$p.$o6[3].$p.$o6[4].$p.$o6[5].$p.$o6[6].$p.$o6[7].$p.$o6[8].$p.$o6[9].$p.$o6[10].$p.$o6[11];
 }else{
$raport_data="'NULL','','','','','','','','','','','',''";                                                           //raport nie istnieje
 }
#       echo'<b href="javascript:displayWindow(\'edycja_wsi.php?a=edit&amp;id='.$r[0].'\',630,475)">'; "' //??? sprawdzic !!!

      //             <INPUT size="25" TYPE="image" NAME="id" value="'.$r[0].'"
 echo'<img src="img/tys/i_m.php?m='.$r[mur].'">';
 echo'<img src="img/tys/i_wsi.php?t='.$r[typ].'&op='.$op.'&p='.$r[8].'&g='.$gr.'"';
 echo" onmouseover=\"map_popup(".$typ.$p.$wsi.$p.$raport_gracz.$p.$mur.$p.$raport_data.$p.$raport_opis.")\" onmouseout=\"map_kill()\">";
 echo'<img src="img/tys/i_w.php?zw='.$zw.'&def='.$def.'&off='.$off.'"><br>';
 echo'<img src="img/tys/i_s.php?n='.$r[7].'">';

echo '</td>';                                                  //zamkniecie komurki
      }else{
                                                               //wioska nie istnieje
      echo'style="background-color: rgb(0, 130, 0);" id="'.$x.'|'.$y.'"><img src="img/0.png"></TD>';
      }
     ++$licz;
#echo"<TD>$x|$y</td>\n";
$x++;
}                                                               //koniec wewnêtrznej pêtli
     $licz = 0;                                                 // zeruje kolumne
     $y++;                                                      // nowy wiersz
     $x=$_GET[x]-$step;                                         // zeruje x przed pêtla
         }                                                      //koniec zewnêtrznej pêtli
     echo "</TR></tbody></TABLE>";
?>