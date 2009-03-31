<?
function zapelnij_mape($x,$y)
{
  echo'<TD class="';                  //tworzymy linie kontynêtów
 $p =" , ";
if($x%10 == 0){echo'con';}else{echo'border';}echo'-left-new ';

if(($y+1)%10 == 0){echo'con';}else{echo'border';}echo'-bottom-new" ';

   $Zapp=zap_mapa()." And w.x ='$x' And w.y ='$y'";
  connection();
   $wynik = @mysql_query($Zapp);

 if($r = mysql_fetch_array($wynik))         //za³adowanie zapytania do $r   - wioska istnieje
  {                                               // dajemy kolory
      echo 'style="background-color: rgb'; map_color($r[id_User],$r[id_plemie]); echo';" >';
    if($r[typ]!=NULL)
    {
     $typ= "'".rodzaj($r[typ])."'";
    }
    else
    {
     $typ="'NULL'";
    }
    if($r[11]!=NULL)
    {
     $mur= $r[11];
    }
    else
    {
     $mur="' '";
    }		//mur
    if($r[7]!=NULL)
    {
     $wsi="'".$r[7]."(".$r[1]."|".$r[2].") pkt:".$r[8]."'";
    }
    else
    {
      $wsi="'Blad'";        	//nazwa wioski(x|y)
    }                                                //wykrywamy istnienia
    if($gr=$r[id_User] && $r[id_User]!=0)
    {         //gracz istnieje
      if($r[5]==0)
      {
        $gracz="'".$r[4]."'";
      }
      else
      {
        $plemz=urldecode($r[tag]);
        $gracz="'".$r[4]."(".$plemz.")'";
      }		//gracz (plemie)
     $raport_gracz=$gracz;
    }
    else
    {                                         //gracz nie istnieje
     $raport_gracz="'NULL'";
    }
    if($r[opis]!='' && $op=$r[opis])
    {
     $opis=$r[opis];
     $raport_opis="'".$opis."'";
    }
    else
    {
     $raport_opis="'NULL'";
    }
    if($data=$r[data])
    {
     $off = $r[axe]+($r[lk]*4)+ ($r[kl]*5)+ ($r[tar]*5)+ ($r[kat]*6);
     $def= $r[pik]+$r[mie]+$r[luk]+($r[ck]*6);
     $zw=$r[zw];
  if($off!=Null){  if($off>18000){$off=intval($off/18000);}else{$off='0'.intval($off/1800);}
  }
  elseif($data!=null){$off=0;}elseif($data==null){$off=' ';}
                                                            //sumuje wojsko - def
  if($def!=Null){  if($def>18000){$def=intval($def/18000);}else{$def='0'.intval($def/1800);}
  }
  elseif($data!=null){$def=0;}elseif($data==null){$def=' ';}
                                                            //sumuje wojsko - zw
  if($zw!=Null){   if($zw>999){$zw=intval($zw/1000);}      else{$zw='0'.intval($zw/100);}
  }
  elseif($data!=null){$zw=0;}elseif($data==null){$zw=' ';}


      $da="'".$data."'";	                      //data
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
 }
 else
 {
     $raport_data="'NULL','','','','','','','','','','','',''";                                                           //raport nie istnieje
 }
echo '<a class="sel" href="javascript:popup_scroll(\'../edyt/menu.php?id='.$r[id_wsi].'\',310,290)">';
echo '<div onmouseover="map_popup('.$typ.$p.$wsi.$p.$raport_gracz.$p.$mur.$p.$raport_data.$p.$raport_opis.')" onmouseout="map_kill()">';
switch($r[typ]){case 0:
break;
case 1:
echo '<div class="lay1"><img src="../tys/mie.png"></div>';
break;
case 2:
echo '<div class="lay1"><img src="../tys/tarc.png"></div>';
break;
case 3:
echo '<div class="lay1"><img src="../tys/zwi.png"></div>';
break;
case 4:
echo '<div class="lay1"><img src="http://pl5.plemiona.pl/graphic/unit/unit_light.png"></div>';//  LK
break;
case 5:
echo '<div class="lay1"><img src="../tys/ck.png"></div>';
break;
case 6:
echo '<div class="lay1"><img src="../tys/wsi.png"></div>';
break;
case 7:
echo '<div class="lay1"><img src="../tys/pal.png"></div>';
break;
default:
break;}
if($r[typ]!=NULL || $r[opos]!=NULL){ echo '<div class="lay2">';}

echo'<img src="../tys/i_m.php?m='.$r[mur].'">';
echo '<img src="../tys/';
      if($r[8] <   299 ){echo '1';}
  elseif($r[8] <   999 ){echo '2';}
  elseif($r[8] <  2999 ){echo '3';}
  elseif($r[8] <  8999 ){echo '4';}
  elseif($r[8] < 10999 ){echo '5';}
  elseif($r[8] >=10999 ){echo '6';}
      if($r[id_User]!=0){echo 'v';}
   echo '.PNG">';
echo'<img src="../tys/i_w.php?zw='.$zw.'&def='.$def.'&off='.$off.'"><br>';
//<img src="../tys/i_s.php?n='.$r[7].'">';
echo "<small>".substr($r[7],0,9)."</small>";
if($r[typ]!=NULL|| $r[opos]!=NUL){ echo '</div>';}
if($r[opis]!=NULL){ echo '<div class="lay3"><img src="../tys/wykrzyk.png"></div>';}

echo '</div></a></td>';
 }else{
echo'style="background-color: rgb(66, 120, 40);" id="'.$x.'|'.$y.'"><img src="../tys/0.png"></td>';
}
}
?>