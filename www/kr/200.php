<?PHP
################################
# Drukowanie porównania z baz± #
################################

$zap="SELECT w.id AS id_wsi, w.x, w.y, p.id AS id_User, p.name AS G_name, a.id AS id_plemie, a.tag, w.name AS W_name, w.points, w.typ, w.data, w.mur, w.pik, w.mie, w.axe, w.luk, w.zw, w.lk, w.kl, w.ck, w.tar, w.kat, w.ry, w.sz, w.opis
FROM village w, tribe p, ally a
WHERE w.player = p.id
AND p.ally = a.id
AND w.x ='$f_x'
AND w.y ='$f_y'";

connection();//echo $zap;
$wynik = mysql_query($zap) or die (mysql_error());


// Wyswietlane efektu

if($r = @mysql_fetch_array($wynik)){
echo"<center><big>Uchwyty wylapaly</big></center>";
$id_wsi=$r[id_wsi];
echo'<TABLE border="0" class="vis" align="center">
<form  action="?kr='.$_GET[kr].'&krs=1" method="POST">
<tr><Td>'.$r[G_name].'</Td></tr>
<tr><Td>'.$r[W_name].'</Td></tr> ';

echo' <tr>
<Th></Th>

<Th>X</Th>
<Th>Y</Th>
<Th>Typ wioski</Th>

<Th>Data</Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/buildings/wall.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_spear.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_sword.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_axe.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_archer.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_spy.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_light.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_marcher.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_heavy.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_ram.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_catapult.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_knight.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_snob.png"></Th>
<Th>Opis</Th></tr>';

echo'<tr>
<Td>z bazy :</Td>
<Th>'.$r[x].'</Th>
<Th>'.$r[y].'</Th>
<Th>'.$rodzaje[$r[typ]].'</Th>
<Th>'.$r[data].'</Th>
<Th>'.$r[mur].'</Th>
<Th>'.$r[pik].'</Th>
<Th>'.$r[mie].'</Th>
<Th>'.$r[axe].'</Th>
<Th>'.$r[luk].'</Th>
<Th>'.$r[zw].'</Th>
<Th>'.$r[lk].'</Th>
<Th>'.$r[kl].'</Th>
<Th>'.$r[ck].'</Th>
<Th>'.$r[tar].'</Th>
<Th>'.$r[kat].'</Th>
<Th>'.$r[ry].'</Th>
<Th>'.$r[sz].'</Th>
<Th>'.$r[opis].'</Th></tr>';


echo'<tr>
<Td>z raportu :</Td>
<Th>'.$f_x.'			<input type="hidden" name="x" value="'.$f_x.'">		</Th>
<Th>'.$f_y.'			<input type="hidden" name="y" value="'.$f_y.'">		</Th>
<Th>'.$rodzaje[$f_typ].'	<input type="hidden" name="typ" value="'.$f_typ.'">	</Th>
<Th>';

if($nev_data[2]!==NULL){echo'20'.$nev_data[2].'-'.$nev_data[1].'-'.$nev_data[0];}
echo'				<input type="hidden" name="data" value="'.$nev_data[2].'-'.$nev_data[1].'-'.$nev_data[0].'"></Th>';

destructor();
} //koniec if r=array

 if($_GET[kr]==1)
 {
    if($nev_mur!=NULL)
    {
       echo'<Th>'.$nev_mur.'		<input type="hidden" name="mur" value="'.$nev_mur.'">	</Th>';
    }
    else
    {
       echo'<Th></Th>';
    }
    if($f_obr==1)
    {
       echo'
       <Th>'.$wojo_obr[1].'		<input type="hidden" name="pik" value="'.$wojo_obr[1].'"></Th>
       <Th>'.$wojo_obr[2].'		<input type="hidden" name="mie" value="'.$wojo_obr[2].'"></Th>
       <Th>'.$wojo_obr[3].'		<input type="hidden" name="axe" value="'.$wojo_obr[3].'"></Th>
       <Th>'.$wojo_obr[4].'		<input type="hidden" name="luk" value="'.$wojo_obr[4].'"></Th>
       <Th>'.$wojo_obr[5].'		<input type="hidden" name="zw" value="'.$wojo_obr[5].'"></Th>
       <Th>'.$wojo_obr[6].'		<input type="hidden" name="lk" value="'.$wojo_obr[6].'"></Th>
       <Th>'.$wojo_obr[7].'		<input type="hidden" name="kl" value="'.$wojo_obr[7].'"></Th>
       <Th>'.$wojo_obr[8].'		<input type="hidden" name="ck" value="'.$wojo_obr[8].'"></Th>
       <Th>'.$wojo_obr[9].'		<input type="hidden" name="tar" value="'.$wojo_obr[9].'"></Th>
       <Th>'.$wojo_obr[10].'		<input type="hidden" name="kat" value="'.$wojo_obr[10].'"></Th>
       <Th>'.$wojo_obr[11].'		<input type="hidden" name="ry" value="'.$wojo_obr[11].'"></Th>
       <Th>'.$wojo_obr[12].'		<input type="hidden" name="sz" value="'.$wojo_obr[12].'"></Th> ';
    }
elseif($f_obr==2)
    {
       echo'<Th colspan="12" > Zaden zolnierz nie wrocil zywy.</Th>';
    }
elseif($f_obr==0)
    {
       echo'<Th colspan="12" > blad uchwytu</Th>';}
 }
 if($_GET[kr]==2)
 {
    echo'<Th></Th>';//mur w off nie zmieniam
    if($f_agr==1)
    {
       echo'
          <Th>';if($wojo_agr[1]>0){echo $wojo_agr[1].'<input type="hidden" name="pik" value="'.$wojo_agr[1].'">';}  echo'</Th>
          <Th>';if($wojo_agr[2]>0){echo $wojo_agr[2].'<input type="hidden" name="mie" value="'.$wojo_agr[2].'">';}  echo'</Th>
          <Th>';if($wojo_agr[3]>0){echo $wojo_agr[3].'<input type="hidden" name="axe" value="'.$wojo_agr[3].'">';}  echo'</Th>
          <Th>';if($wojo_agr[4]>0){echo $wojo_agr[4].'<input type="hidden" name="luk" value="'.$wojo_agr[4].'">';}  echo'</Th>
          <Th>';if($wojo_agr[5]>0){echo $wojo_agr[5].'<input type="hidden" name="zw" value="'.$wojo_agr[5].'">';}   echo'</Th>
          <Th>';if($wojo_agr[6]>0){echo $wojo_agr[6].'<input type="hidden" name="lk" value="'.$wojo_agr[6].'">';}   echo'</Th>
          <Th>';if($wojo_agr[7]>0){echo $wojo_agr[7].'<input type="hidden" name="kl" value="'.$wojo_agr[7].'">';}   echo'</Th>
          <Th>';if($wojo_agr[8]>0){echo $wojo_agr[8].'<input type="hidden" name="ck" value="'.$wojo_agr[8].'">';}   echo'</Th>
          <Th>';if($wojo_agr[9]>0){echo $wojo_agr[9].'<input type="hidden" name="tar" value="'.$wojo_agr[9].'">';}  echo'</Th>
          <Th>';if($wojo_agr[10]>0){echo $wojo_agr[10].'<input type="hidden" name="kat" value="'.$wojo_agr[10].'">';}echo'</Th>
          <Th>';if($wojo_agr[11]>0){echo $wojo_agr[11].'<input type="hidden" name="ry" value="'.$wojo_agr[11].'">';} echo'</Th>
          <Th>';if($wojo_agr[12]>0){echo $wojo_agr[12].'<input type="hidden" name="sz" value="'.$wojo_agr[12].'">';} echo'</Th> ';
    }
elseif($f_agr==0)
    {
       echo'<Th colspan="12" > blad uchwytu.</Th>';
    }
 }


echo '<Th style="" id="info_opi_on">'.$opis.'
<a href="javascript:editToggle(\'info_opi_on\' , \'info_opi_off\')"><img src="img/rename.png" alt="zmieñ opis" title="zmieñ opis"></a>
</th>
<th style="display: none;" id="info_opi_off">
<input value="'.$opis.'" name="opis" type="tekst" size="15">
</td></tr>';

echo'<tr><td>Zapisz do bazy:</td></tr>
<tr><th>Nic nie zapisuj <a href="javascript:editToggle(\'opcje_nic\' , \'opcje_cos\')"><input type="radio" name="z_nic" value="0" ></a></th></tr>
<tr><th >Wszystko zapisz<a href="javascript:editToggle(\'opcje_nic\' , \'opcje_cos\')"><input type="radio" name="z_nic" value="2" ></a></th></tr>
</tr>
<tr><th>Tylko wybrane   <a href="javascript:editToggle(\'opcje_cos\' , \'opcje_nic\')"><input type="radio" name="z_nic" value="1" onclick="javascript:editToggle(\'opcje_nic\' , \'opcje_cos \')";></a></th>
<th colspan="2"></th> </tr>
<tr style="display :none" id="opcje_nic"><th height="30"></th><th></th><th></th>
<th>Typ<input type="checkbox" name="z_typ" value="1"></th>
<th>Data<input type="checkbox" name="z_data" value="1"></th>
<th>';if($nev_mur!=NULL){echo'Mur<input type="checkbox" name="z_mur" value="1">';}echo'</th>
<td colspan="12" align="center">wojsko<input type="checkbox" name="z_wor" value="1"></td>
<th>opis<input type="checkbox" name="z_opis" value="1"></th>
   </tr>
<tr style="" id="opcje_cos"><th height="30"></th></tr>

<tr></tr>
<tr><td colspan="18" align="center"><input type="submit" value="Wyslij - Przetwarzaj dalej"> </td> <th>
<a  onclick="javascript:popup_scroll(\'edyt/menu.php?id='.$id_wsi.'\',310,290)";">
    Otwórz podgl±d wioski<hr> w nowym oknie
  </a></th>
</tr>';


if($f_widmo == 1){
echo'<tr><td colspan="19" > Wojska jakie zniklo <input type="checkbox" name="widmo" value=""></th></td>
</tr><tr>
<Th></Th>
<Th>X</Th>
<Th>Y</Th>
<Th></Th>
<Th></Th>
<Th></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_spear.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_sword.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_axe.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_archer.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_spy.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_light.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_marcher.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_heavy.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_ram.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_catapult.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_knight.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_snob.png"></Th>
<Th></Th></tr>';


for($l=1; $l<=count($wojo_kasacja); $l++){
echo'<tr>
<Th><input type="hidden" name="widmo[]" value="'.$widmo_gdzie[$l][0].','.$widmo_gdzie[$l][1].','.$widmo[$l][1].','.$widmo[$l][2].','.$widmo[$l][3].','.$widmo[$l][4].','.$widmo[$l][5].','.$widmo[$l][6].','.$widmo[$l][7].','.$widmo[$l][8].','.$widmo[$l][9].','.$widmo[$l][10].','.$widmo[$l][11].','.$widmo[$l][12].'"></Th>
<Th>'.$widmo_gdzie[$l][0].'</Th>
<Th>'.$widmo_gdzie[$l][1].'</Th>
<Th></Th>
<Th></Th>
<Th></Th>
<Th>'.$widmo[$l][1].'</Th>
<Th>'.$widmo[$l][2].'</Th>
<Th>'.$widmo[$l][3].'</Th>
<Th>'.$widmo[$l][4].'</Th>
<Th>'.$widmo[$l][5].'</Th>
<Th>'.$widmo[$l][6].'</Th>
<Th>'.$widmo[$l][7].'</Th>
<Th>'.$widmo[$l][8].'</Th>
<Th>'.$widmo[$l][9].'</Th>
<Th>'.$widmo[$l][10].'</Th>
<Th>'.$widmo[$l][11].'</Th>
<Th>'.$widmo[$l][12].'</Th>
<Th></Th>
<Th></Th></tr><tr><td colspan="19" > </td></tr>';

}//koniec for
}  // if(widmo)
?>