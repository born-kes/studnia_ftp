<?php
if($_GET[x]==NULL&&$_GET[y]==NULL){
echo'<table border="1" align="center"><TR><TD align="center">';

echo'<b>Witam w Generatorze Mapy Klasycznej</b><br><br>
Jaka okolica cie interesuje? <br><br>
<FORM NAME ACTION=""  METHOD="GET">
x: <input name="x" tabindex="13" id="inputx" value="" size="5" onkeyup="xProcess(\'inputx\', \'inputy\')" type="text">
y: <input name="y" tabindex="14" id="inputy" value="" size="5" type="text"><br>
<input name="m" id="m" value="4"  type="hidden">
<br><input name="szer" id="szer" value="15"  type="hidden"><INPUT TYPE="submit" VALUE="Wygeneruj mape"></FORM> ';

}else{
echo'<form name="zmiana opisu" action="" METHOD="post">';
echo'<TABLE class="map_container" cellspacing =0 cellpadding =0 ><tbody><TR>';
  $szerokosc = 14; //ilosc kolumn i wierszy
  $step = intval($szerokosc/2);
  $x=$_GET[x]-$step;        //z uchwytu pobiera x
  $y=$_GET[y]-$step;        //z uchwytu pobiera y
  $wiersz =0;               // wiersz poczatkowy
  $licz = 0;                // liczy ilosc kolumn

echo '<table style="border: 1px solid rgb(241, 235, 221); background-color: rgb(241, 235, 221);" id="mapCoords" cellpadding="0" cellspacing="0"
<tr><td colspan="2" align="center"><a href="?m=4&x='.($_GET[x]-$szerokosc)."&y=".($_GET[y]-$szerokosc).'">skos</a></td>
<td colspan="1" align="center"><a href="?m=4&x='.$_GET[x]."&y=".($_GET[y]-$szerokosc).'">gora</a></td>
<td colspan="2" align="center"><a href="?m=4&x='.($_GET[x]+$szerokosc)."&y=".($_GET[y]-$szerokosc).'">skos</a></td></tr>
<tr><td colspan="1" align="center"><a href="?m=4&x='.($_GET[x]-$szerokosc)."&y=".$_GET[y].'">bok</td>
<td colspan="3" align="center"><table style="border: 1px solid rgb(241, 235, 221); background-color: rgb(241, 235, 221);" id="mapCoords" cellpadding="0" cellspacing="0">';
$p=", ";
    while($wiersz<$szerokosc){$wiersz++;  echo"\n<tr><TD>$y</TD>";  //pêtla 1 = zapisuje wiersze
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
map_color($r[id_User],$r[id_plemie]);
                                 echo';" id="'.$x.'|'.$y.'">';


if($r[typ]!=NULL){
$typ= "'".$rodzaje[$r[typ]]."'";}else{$typ="'NULL'";}		//typ
if($r[11]!=NULL){$mur= $r[11];}else{$mur="' '";}		//mur
if($r[7]!=NULL){$wsi="'".$r[7]."(".$r[1]."|".$r[2].") pkt:".$r[8]."'";}else{$wsi="'Blad'";}	//nazwa wioski(x|y)

                                                //wykrywamy istnienia
 if($user=$r[id_User]&&$r[id_User]!=0){         //gracz istnieje
     if($r[5]==0){$gracz="'".$r[4]."'";
    }else{$plemz=urldecode($r[tag]);
    $gracz="'".$r[4]."(".$plemz.")'";}		//gracz (plemie)
   $gr=1;
   $raport_gracz=$gracz;
 }else{                                         //gracz nie istnieje
   $gr=0;
   $raport_gracz="'NULL'";
 }

if($r[opis]!=''&&$opis=$r[opis]){              //opis istnieje
$opis=$r[opis];
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
if($r[tar]!==NULL){$w[8]=$r[20];}else{$w[8]="' '";}      //tar
if($r[ry]!==NULL){$w[10]=$r[22];}else{$w[10]="' '";}      //ry

if($r[zw]!==NULL){$w[4]= $r[16];}else{$w[4]= "' '";}     //zw
if($r[lk]!==NULL){$w[5]= $r[17];}else{$w[5]= "' '";}     //lk
if($r[kl]!==NULL){$w[6]= $r[18];}else{$w[6]= "' '";}     //k³
if($r[ck]!==NULL){$w[7]= $r[19];}else{$w[7]= "' '";}     //ck
if($r[kat]!=NULL){$w[9]= $r[21];}else{$w[9]="' '";}     //kat
if($r[sz]!==NULL){$w[11]=$r[23];}else{$w[11]="' '";}	 //sz

$raport_data=$da.$p.$w[0].$p.$w[1].$p.$w[2].$p.$w[3].$p.$w[4].$p.$w[5].$p.$w[6].$p.$w[7].$p.$w[8].$p.$w[9].$p.$w[10].$p.$w[11];
 }else{
$raport_data="'NULL','','','','','','','','','','','',''";                                                           //raport nie istnieje
 }
echo'<a href="javascript:popup_scroll(\'edyt/menu.php?id='.$r[id_wsi].'\',310,290)">';

      //             <INPUT size="25" TYPE="image" NAME="id" value="'.$r[0].'"
 echo'<img src="../generator_mapy/img/tys/i_m.php?m='.$r[mur].'">';
 echo'<img src="../generator_mapy/img/tys/i_wsi.php?t='.$r[typ].'&op='.$op.'&p='.$r[8].'&g='.$gr.'"';
 echo" onmouseover=\"map_popup(".$typ.$p.$wsi.$p.$raport_gracz.$p.$mur.$p.$raport_data.$p.$raport_opis.")\" onmouseout=\"map_kill()\">";
 echo'<img src="../generator_mapy/img/tys/i_w.php?zw='.$zw.'&def='.$def.'&off='.$off.'"><br>';
 echo'<img src="../generator_mapy/img/tys/i_s.php?n='.$r[7].'">';
destructor();
$op=$nulls;
$da=$nulls;
$off=$nulls;
$def=$nulls;
$zw=$nulls;
$typ=$nulls;
$wsi=$nulls;
$raport_gracz=$nulls;
$mur=$nulls;
$raport_data=$nulls;
$raport_opis=$nulls;
echo '</a></td>';                                                  //zamkniecie komurki
      }else{
                                                               //wioska nie istnieje
      echo'style="background-color: rgb(66, 120, 40);" id="'.$x.'|'.$y.'"><img src="../generator_mapy/img/0.png"></TD>';
      } @destructor();
     ++$licz;
#echo"<TD>$x|$y</td>\n";
$x++;
}                                                   //koniec wewnêtrznej pêtli
     $licz = 0;                                                 // zeruje kolumne
     $y++;                                                      // nowy wiersz
     $x=$_GET[x]-$step;                                         // zeruje x przed pêtla
echo '</tr>';         }
echo"<tr><td></td>";
for($licz=0;$licz<$szerokosc;$licz++){
echo'<td align="center" >'.$x++.'</td>';}
                                                      //koniec zewnêtrznej pêtli
     echo '</tr></TABLE>
</td><td align="center"><a href="?m=4&x='.($_GET[x]+$szerokosc)."&y=".($_GET[y]).'">bok</td></tr>
<tr><td colspan="2" align="center" ><a href="?m=4&x='.($_GET[x]-$szerokosc)."&y=".($_GET[y]+$szerokosc).'">skos</a></td>
<td colspan="1" align="center"><a href="?m=4&x='.($_GET[x])."&y=".($_GET[y]+$szerokosc).'">dol</td>
<td  colspan="2" align="center"><a href="?m=4&x='.($_GET[x]+$szerokosc)."&y=".($_GET[y]+$szerokosc).'">skos</td></tr>
</tbody></table>';}
?>
