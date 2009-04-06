<?PHP $a_xy=explode("|",$raport[w_agr]);$o_xy=explode("|",$raport[w_obr]);

$z_a="SELECT id ,typ, data, mur, pik, mie, axe, luk, zw, lk, kl, ck, tar, kat, ry, sz, opis, status
FROM village
WHERE x ='$a_xy[0]'
AND y ='$a_xy[1]'";
       
connection();
$wynik = mysql_query($z_a) or die (mysql_error());
if($r = @mysql_fetch_array($wynik)){
$baza_a[id]=$r[id];
$baza_a[typ]=$r[typ];
$baza_a[data]=$r[data];
$baza_a[mur]=$r[mur];
$baza_a[wojo]= array ($r[pik],$r[mie],$r[axe],$r[luk],$r[zw],$r[lk],$r[kl],$r[ck],$r[tar],$r[kat],$r[ry],$r[sz]);
$baza_a[opis]=$r[opis];
$baza_a[status]=$r[status];}

destructor();

$z_o="SELECT id ,typ, data, mur,pik, mie, axe, luk, zw, lk, kl, ck, tar, kat, ry, sz, opis, status
FROM village
WHERE x ='$o_xy[0]'
AND y ='$o_xy[1]'";

connection();
$wyniko = mysql_query($z_o) or die (mysql_error());
if($r = @mysql_fetch_array($wyniko)){
$baza_o[id]=$r[id];
$baza_o[typ]=$r[typ];
$baza_o[data]=$r[data];
$baza_o[mur]=$r[mur];
$baza_o[wojo]= array ($r[pik],$r[mie],$r[axe],$r[luk],$r[zw],$r[lk],$r[kl],$r[ck],$r[tar],$r[kat],$r[ry],$r[sz]);
$baza_o[opis]=$r[opis];
$baza_o[status]=$r[status];}

destructor();
echo '<input type="hidden" name="o_id" value="'.$baza_o[id].'" />
      <input type="hidden" name="a_id" value="'.$baza_a[id].'" />';
?>

<table><CAPTION><b>W bazie Raportow</b></CAPTION>
<tr><td class="hidden">| </td></tr>
<tr><td colspan="2" style="border: 1px solid black; padding: 4px;" valign="top" height="160">
<br>
<table style="border: 1px solid rgb(222, 211, 185);" width="100%">
<tbody>
<CAPTION>Raport z: <?PHP echo $baza_a[data];?></CAPTION>
<tr><th width="100">Agresor:</th><th colspan="2" valign="top"><a href="#"><?PHP echo $raport[agresor]; ?></a></th></tr>
<tr><td>Wioska:</td><td><a href="#">(<?PHP echo $raport[w_agr]; ?>)</a></td><th><?PHP echo $rodzaje[$baza_a[typ]]; ?></th></tr>
<tr><th>Opis</th><td><?PHP echo $baza_a[opis];?></td></tr>
<tr><td colspan="3">
	<table class="vis">

		<tbody><tr class="center">
			<td></td>
			<td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_spear.png?1" title="Pikinier" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_sword.png?1" title="Miecznik" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_axe.png?1" title="Topornik" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_archer.png?1" title="£ucznik" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_spy.png?1" title="Zwiadowca" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_light.png?1" title="Lekki kawalerzysta" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_marcher.png?1" title="£ucznik na koniu" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_heavy.png?1" title="Ciê¿ki kawalerzysta" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_ram.png?1" title="Taran" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_catapult.png?1" title="Katapulta" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_knight.png?1" title="Rycerz" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_snob.png?1" title="Szlachcic" alt=""></td>
		</tr>
		<tr class="center">
			<td>Zostalo:</td><?PHP echo wpisz($baza_a[wojo]); ?></tr>
	</tbody></table>
</td></tr>

<tr><td colspan="2"></td></tr>

</tbody></table><br>
<table style="border: 1px solid rgb(222, 211, 185);" width="100%">
<tbody>
<CAPTION>Raport z: <?PHP echo $baza_o[data];?></CAPTION>
<tr><th width="100">Obroñca:</th><th colspan="2"><?PHP echo $raport[obronca]; ?></th></tr>
<tr><td>Wioska:</td><td><a href="#">(<?PHP echo $raport[w_obr]; ?>)</a></td><th><?PHP echo $rodzaje[$baza_o[typ]]; ?></th></tr>
<tr><th>Opis</th><td><?PHP echo $baza_o[opis];?></td></tr>

<tr><td colspan="3">
	<table class="vis">
		<tbody><tr class="center">
			<td></td>
			<td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_spear.png?1" title="Pikinier" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_sword.png?1" title="Miecznik" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_axe.png?1" title="Topornik" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_archer.png?1" title="£ucznik" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_spy.png?1" title="Zwiadowca" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_light.png?1" title="Lekki kawalerzysta" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_marcher.png?1" title="£ucznik na koniu" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_heavy.png?1" title="Ciê¿ki kawalerzysta" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_ram.png?1" title="Taran" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_catapult.png?1" title="Katapulta" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_knight.png?1" title="Rycerz" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_snob.png?1" title="Szlachcic" alt=""></td>
		</tr>
		<tr class="center">
			<td>Zostalo:</td><?PHP echo wpisz($baza_o[wojo]); ?></tr>

	</tbody></table>
</td></tr>
</tbody></table><br><br>

<table style="border: 1px solid rgb(222, 211, 185);" width="100%">
	<tr><th width="100">Mur </th><td><?PHP echo $baza_o[mur]; ?></td></tr>
	<tr><th width="100">Poparcie </th><td><?PHP echo $raport[pop]; ?></td></tr>
	<tr><th width="100">starus </th><td><?PHP echo $status[typ][$baza_o[status]]; ?></td></tr>

</table>
</td>
</tr>
</table>