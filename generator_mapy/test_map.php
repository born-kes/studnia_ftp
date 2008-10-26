<?php
echo'<TABLE class="map_container" cellspacing =0 cellpadding =0 ><tbody><TR>';
  $step = intval($_GET[szer]/2);
  $szerokosc = $_GET[szer]; //ilosc kolumn i wierszy
  $x=$_GET[x]-$step;              //z uchwytu pobiera x
  $y=$_GET[y]-$step;              //z uchwytu pobiera y
  $wiersz =0;               // wiersz poczatkowy
  $licz = 0;                // liczy ilosc kolumn
echo '<table style="border: 1px solid rgb(241, 235, 221); background-color: rgb(241, 235, 221);" id="mapCoords" cellpadding="0" cellspacing="0">';

require "connection.php";
    while($wiersz<$szerokosc){$wiersz++;  echo"</tr>\n<tr>";
     while($licz<$szerokosc){   //pêtla 2

connection();
      $wynik = mysql_query("SELECT w.id, w.x, w.y, p.id, p.name, a.id, a.tag, w.name, w.points, w.data, w.typ, w.mur, w.pik, w.mie, w.axe, w.luk, w.zw, w.lk, w.kl, w.ck, w.tar, w.kat, w.ry, w.sz, w.opis
      FROM village w, tribe p, ally a
      WHERE w.player = p.id
      AND p.ally = a.id
      And w.x ='$x'
      And w.y ='$y'")or die('Blad zapytania');

      $linnie = $x;
            echo'<TD class="';                  //tworzymy linie kontynêtów
            if($linnie%10 == 0){echo'con'   ;}
        else{echo'border';}
                                                         echo'-left-new ';

       $linnia = $y+1;
    if($linnia%10 == 0){echo'con'   ;}
else{echo'border';}


     echo'-bottom-new" ';
                                               // dajemy kolory  ??


      if($r = mysql_fetch_array($wynik)){
      echo 'style="background-color: rgb';   //wioska istnieje

           if($r[5] =='4469')  { echo '(244, 0, 0);">';    }   //zp
       elseif($r[5] =='50811') { echo '(0, 0, 200);">';    }   //-SNRG- i HW
       elseif($r[5] =='23185') { echo '(241, 235, 221);">';}   //MAD
       elseif($r[5] =='0') { echo '(190, 190, 190);">';}   //opuszczona
       else                    { echo '(170, 100, 0);">';    }
                                 echo'<img src="img/10x10.png" onmouseover="map_popup';  //img

if($r[9]!=NULL){$o1= "$r[9]";}else{$o1="NULL";}			//data
if($r[7]!=NULL){$o2= "$r[7] ($r[1]|$r[2])";}else{$o2="NULL";}	//nazwa wioski(x|y)
$plemz=urldecode($r[6]);
if($r[3]==0){$o3="NULL";}else{$o3= "$r[4] ($plemz)";}		//gracz (plemie)
if($r[11]!=NULL){$o4= $r[11];}else{$o4="'?'";}			//mur
if($r[10]!=NULL){$o5= "$r[10]";}else{$o5="Brak danych";}		//typ wioski
if($r[12]!=NULL){$o6[0]=$r[12];}else{$o6[0]="'?'";}
if($r[13]!=NULL){$o6[1]=$r[13];}else{$o6[1]="'?'";}
if($r[14]!=NULL){$o6[2]=$r[14];}else{$o6[2]="'?'";}
if($r[15]!=NULL){$o6[3]=$r[15];}else{$o6[3]="'?'";}
if($r[16]!=NULL){$o6[4]=$r[16];}else{$o6[4]="'?'";}
if($r[17]!=NULL){$o6[5]=$r[17];}else{$o6[5]="'?'";}
if($r[18]!=NULL){$o6[6]=$r[18];}else{$o6[6]="'?'";}
if($r[19]!=NULL){$o6[7]=$r[19];}else{$o6[7]="'?'";}
if($r[20]!=NULL){$o6[8]=$r[20];}else{$o6[8]="'?'";}
if($r[21]!=NULL){$o6[9]=$r[21];}else{$o6[9]="'?'";}
if($r[22]!=NULL){$o6[10]=$r[22];}else{$o6[10]="'?'";}
if($r[23]!=NULL){$o6[11]=$r[23];}else{$o6[11]="'?'";}		//wojsko
if($r[24]!=NULL){$o7= "$r[24]";}else{$o7="NULL";}		//opis

       echo"( '$o1', '$o2', '$o3', $o4, '$o5', $o6[0], $o6[1], $o6[2], $o6[3], $o6[4], $o6[5], $o6[6], $o6[7], $o6[8], $o6[9], $o6[10], $o6[11], '$o7')";
                          echo '" onmouseout="map_kill()">';
                                 echo '</td>';
      }else{ echo'style="background-color: rgb(0, 130, 0);" id="'.$x.'|'.$y.'"><img src="img/5x5.png"></TD>'; //wioska nie istnieje
      }
     ++$licz;
#echo"<TD>$x|$y</td>\n";
$x++;
}//koniec wewnêtrznej pêtli
     $licz = 0;                 // zeruje kolumne
     $y++;                      // nowy wiersz
     $x=$_GET[x]-$step;               // zeruje x przed pêtla
         }                             //koniec zewnêtrznej pêtli
     echo "</TR></tbody></TABLE>";
?>