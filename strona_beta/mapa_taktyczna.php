<?php
$p=" , ";

echo'<table align="center"><TR><TD><img src="http://pl5.plemiona.pl/user_image.php?image_id=11528"></TD></TR></table>
<table border="1" align="center"><TR><TD align="center">';

if( $_GET[szer]== null ){echo'<b>Witam w Generatorze Map</b><br><br>
Jaka okolica cie interesuje? <br><br>
<FORM NAME ACTION=""  METHOD="GET">
x: <input name="x" tabindex="13" id="inputx" value="" size="5" onkeyup="xProcess(\'inputx\', \'inputy\')" type="text">
y: <input name="y" tabindex="14" id="inputy" value="" size="5" type="text"><br>
<input name="m" id="m" value="3"  type="hidden"><br> ';

 /*Aby nadac kolory wioska i plemionom wybierz z listy Twoje Plemie <br>
<SELECT name="plemie"> </select><br>

 £¹czenie i wybranie bazy
connection();
$opcje = mysql_query("SELECT nazwa FROM plemie " )or die(mysql_error());

 while($op = mysql_fetch_array($opcje)){
   echo "<option value=\"".$op[0]."\">".$op[0]."</option>";

destructor(); */
echo '</TD></TR><TR><TD align="center"><BR>Jak duza ma byc mapa?<BR><BR>';
echo '<SELECT name="szer">
<OPTION value="5">5x5</OPTION>
<OPTION value="20">20x20</OPTION>
<OPTION selected="selected" value="45">45x45</OPTION>
<OPTION value="100">100x100</OPTION>
</select><BR><BR>';

echo'</TD></TR><TR><TD align="center"><b>Dziekuje za wspolprace </b> <br><br>
<INPUT TYPE="submit" VALUE="Wygeneruj mape"> </FORM> <br><br></TD></TR>';
}elseif( $_GET!= null ){

echo '<table style="border: 1px solid rgb(241, 235, 221); background-color: rgb(241, 235, 221);" id="mapCoords" cellpadding="0" cellspacing="0">
<tr><td colspan="2" align="center"><a href="?m=3&x='.($_GET[x]-$_GET[szer])."&y=".($_GET[y]-$_GET[szer]).'&szer='.$_GET[szer].'">skos</a></td>
<td colspan="1" align="center"><a href="?m=3&x='.$_GET[x]."&y=".($_GET[y]-$_GET[szer]).'&szer='.$_GET[szer].'">gora</a></td>
<td colspan="2" align="center"><a href="?m=3&x='.($_GET[x]+$_GET[szer])."&y=".($_GET[y]-$_GET[szer]).'&szer='.$_GET[szer].'">skos</a></td></tr>
<tr><td colspan="1" align="center"><a href="?m=3&x='.($_GET[x]-$_GET[szer])."&y=".$_GET[y].'&szer='.$_GET[szer].'">bok</td>

<td colspan="3" align="center"><table style="border: 1px solid rgb(241, 235, 221); background-color: rgb(241, 235, 221);" id="mapCoords" cellpadding="0" cellspacing="0">';


echo'<TABLE class="map_container" cellspacing =0 cellpadding =0 ><tbody><TR>';
  $step = intval($_GET[szer]/2);
  $szerokosc = $_GET[szer]; //ilosc kolumn i wierszy
  $x=$_GET[x]-$step;        //z uchwytu pobiera x
  $y=$_GET[y]-$step;        //z uchwytu pobiera y
  $licz = 0;                // liczy ilosc kolumn
$yb=$y+$_GET[szer];

echo '<table style="border: 1px solid rgb(241, 235, 221); background-color: rgb(241, 235, 221);" id="mapCoords" cellpadding="0" cellspacing="0">';
     while($y<$yb){
    if($licz<$szerokosc){
       $linnia = $y+1;
connection();
      $wynik = @mysql_query("SELECT w.id AS id_wsi, w.x, w.y, p.id AS id_User, p.name, a.id AS id_plemie, a.tag, w.name, w.points, w.typ, w.data, w.mur, w.pik, w.mie, w.axe, w.luk, w.zw, w.lk, w.kl, w.ck, w.tar, w.kat, w.ry, w.sz, w.opis
FROM village w, tribe p, ally a 
WHERE w.player = p.id
AND p.ally = a.id
      And w.x ='$x'
      And w.y ='$y'");
      $linnie = $x;
            echo'<TD class="';                  //tworzymy linie kontynêtów
            if($linnie%10 == 0){echo'con'   ;}
        else{echo'border';}
                                                         echo'-left-new ';
    if($linnia%10 == 0){echo'con'   ;}

else{echo'border';}

     echo'-bottom-new" ';                                               // dajemy kolory  ??


      if($r = mysql_fetch_array($wynik)){
      echo 'style="background-color: rgb';   //wioska istnieje
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

if($data=$r[data]){                         //raport istnieje   $r[10]
     $da="'".$data."'";	                      //data
     $off = $r[axe]+($r[lk]*4)+ ($r[kl]*5)+ ($r[tar]*5)+ ($r[kat]*6);
     $def= $r[pik]+$r[mie]+$r[luk]+($r[ck]*6);
     $zw=$r[zw];
                                                            //sumuje wojsko - off
  if($off!=Null){
               if($off>18000){$off=intval($off/18000);}
               else{$off='0'.intval($off/1800);}}
  elseif($data!=null){$off=0;$dd=1;}elseif($data==null){$off=' ';}
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
 }else{$dd=0;
$raport_data="'NULL','','','','','','','','','','','',''";                                                           //raport nie istnieje
 }
echo'<a href="javascript:popup_scroll(\'edyt/menu.php?id='.$r[id_wsi].'\',310,290)">';

$wx="?t=".$r[typ];
if($dd==1){$wx.='&r=1';}
if(ile_woja($r[12],$r[13],$r[14],$r[15], $r[16], $r[17], $r[18],$r[19],$r[20],$r[21])>35000)
{$wx.="&b=1";}
echo'<img src="tys/xw.php'.$wx.'" ';

 echo' onmouseover="map_popup('.$typ.$p.$wsi.$p.$raport_gracz.$p.$mur.$p.$raport_data.$p.$raport_opis.')" onmouseout="map_kill()">';
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

                                 echo '</td>';
      }else{ echo'style="background-color: rgb(0, 130, 0);" id="'.$x.'|'.$y.'"><img src="tys/xw.php"></TD>'; //wioska nie istnieje
      } @destructor();
     $licz++;
     $x++;
}else{  echo"</tr>\n<tr>";
$licz = 0;                 // zeruje kolumne
     $y++;                      // nowy wiersz
     $x=$_GET[x]-$step; }//koniec wewnêtrznej pêtli
              }
     echo "</TR></tbody></TABLE>";
     echo '
</td><td align="center"><a href="?m=3&x='.($_GET[x]+$_GET[szer])."&y=".($_GET[y]).'&szer='.$_GET[szer].'">bok</td></tr>
<tr><td colspan="2" align="center" ><a href="?m=3&x='.($_GET[x]-$_GET[szer])."&y=".($_GET[y]+$_GET[szer]).'&szer='.$_GET[szer].'">skos</a></td>
<td colspan="1" align="center"><a href="?m=3&x='.($_GET[x])."&y=".($_GET[y]+$_GET[szer]).'&szer='.$_GET[szer].'">dol</td>

<td  colspan="2" align="center"><a href="?m=3&x='.($_GET[x]+$_GET[szer])."&y=".($_GET[y]+$_GET[szer]).'&szer='.$_GET[szer].'">skos</td></tr>
</tbody></table>';
}

?>