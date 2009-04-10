<?PHP
echo'<br /><TABLE border="0" class="vis" align="center"><tr>
<Th>Gracz</Th>
<Th>Nazwa</Th>
<Th>X|Y</Th>
<Th>Punkty</Th>
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
<Th>Opis</Th>
<Th>Status</Th>
</tr>';
$zapytanie=zap_raport();
$zapytanie.=$zap;
connection();
$wynik = @mysql_query($zapytanie);

while($r = mysql_fetch_array($wynik)){
if($ab==1){$ab_c='a';$ab=0;}else{$ab_c='b';$ab=1;}
echo'<tr style="white-space: nowrap;" class="nowrap row_'.$ab_c.'">';
echo'<TD>'.$r[gracz].'</TD>
<TD><a href="javascript:popup_scroll(\''.$include_per.'menu.php?id='.$r[id_wsi].'\',350,380)">'.$r[n_wsi].'</a></TD>
<TD>'.$r[x].'|'.$r[y].'</TD>
<TD class="hidden">'.$r[points].'</TD>
<TD>'.$rodzaje[$r[typ]].'</TD>
<TD>'.data_z_bazy($r[data]);

echo '</TD>
<TD>'.$r[mur].'</TD>
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
<TD>'.$r[opis].'</TD>
<TD>'.$status[typ][$r[status]].'</TD>
</tr>'; }
destructor();
echo'</TABLE>';
?>