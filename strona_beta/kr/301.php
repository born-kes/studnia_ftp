<?PHP

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
?>