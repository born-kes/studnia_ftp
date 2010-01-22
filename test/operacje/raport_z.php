<?PHP
echo'<br /><TABLE border="0" class="vis" align="center"><tr>
<Th>Gracz</Th>
<Th>Nazwa</Th>
<Th>X|Y</Th>
<Th>Punkty</Th>
<Th>Data</Th>
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
</tr>';
$zapytanie="SELECT  v.name AS n_wsi, 
v.id AS id_wsi,v.x,v.y,v.points,t.name AS gracz,t.id AS g_id,

m.pik,m.mie,m.axe,m.luk,m.zw,m.lk,m.kl,m.ck,m.tar,m.kat,m.ry,m.sz ,m.typ,m.data,
r.pik AS PIK ,r.mie AS MIE,r.axe AS AXE,r.luk AS LUK,r.zw AS ZW,r.lk AS LK,r.kl AS KL,r.ck AS CK,r.tar AS TAR,r.kat AS KAT,r.ry AS RY,r.sz AS SZ, r.data AS DATA,r.mur,r.status 

  FROM ws_all v, list_user t
LEFT JOIN ws_mobile m ON m.id=v.id
LEFT JOIN ws_raport r ON r.id=v.id
  WHERE v.player = t.id";

$zapytanie.=$zap;
//echo $zapytanie;
connection();
$wynik = @mysql_query($zapytanie);

while($r = mysql_fetch_array($wynik)){
if($ab==1){$ab_c='a';$ab=0;}else{$ab_c='b';$ab=1;}

echo'<tr style="white-space: nowrap;" class="nowrap row_'.$ab_c.'">

<TD>'.$r[gracz].'</TD>
<TD><a href="javascript:popup_scroll(\''.$include_per.'menu.php?id='.$r[id_wsi].'\',350,380)">'.urldecode($r[n_wsi]).'</a></TD>
<TD>'.$r[x].'|'.$r[y].'</TD>
<TD class="hidden">'.$r[points].'</TD>
<TD>'.$statuss[typ][$r[status]].'</TD>
<tr style="white-space: nowrap;" class="nowrap row_'.$ab_c.'">
<td colspan="4" class="hidden" >W wiosce</td>
<TD>'.data_z_bazy($r[DATA]).'</TD>
<TD><IMG SRC="http://pl5.plemiona.pl/graphic/buildings/wall.png"> '.$r[mur].'</TD>
<TD>'.$r[PIK].'</TD>
<TD>'.$r[MIE].'</TD>
<TD>'.$r[AXE].'</TD>
<TD>'.$r[LUK].'</TD>
<TD>'.$r[ZW].'</TD>
<TD>'.$r[LK].'</TD>
<TD>'.$r[KL].'</TD>
<TD>'.$r[CK].'</TD>
<TD>'.$r[TAR].'</TD>
<TD>'.$r[KAT].'</TD>
<TD>'.$r[RY].'</TD>
<TD>'.$r[SZ].'</TD>
<tr style="white-space: nowrap;" class="nowrap row_'.$ab_c.'">
<td colspan="4" class="hidden">Mobilne</td>
<TD>'.data_z_bazy($r[data]).'</TD>
<TD>'.$rodzaje[$r[typ]].'</TD>
<TD>'.$r[pik].'</TD>
<TD>'.$r[mie].'</TD>
<TD>'.$r[axe].'</TD>
<TD>'.$r[luk].'</TD>
<TD>'.$r[zw].'</TD>
<TD>'.$r[lk].'</TD>
<TD>'.$r[kl].'</TD>
<TD>'.$r[ck].'</TD>
<TD>'.$r[tar].'</TD>
<TD>'.$r[kat].'</TD>
<TD>'.$r[ry].'</TD>
<TD>'.$r[sz].'</TD>
</tr>'; }
destructor();
echo'</TABLE>';
?>