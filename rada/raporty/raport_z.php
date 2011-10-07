<?PHP
echo'<br /><TABLE border="0" class="vis" align="center"><tr>
<Th>Znalezione Rapory</Th>

</tr>';
$zapytanie="SELECT  v.name AS n_wsi,
v.id AS id_wsi,v.x,v.y,v.points,t.name AS gracz,t.id AS g_id,
m.typ,m.data,r.data AS DATA,r.mur,r.status

  FROM ws_all v, list_user t
LEFT JOIN ws_mobile m ON m.id=v.id $data1
LEFT JOIN ws_raport r ON r.id=v.id $data2
  WHERE v.player = t.id  ";
if($zerw){$zapytanie.=" AND (r.id is not NULL or m.id is not NULL)";}
$zapytanie.=$zap;
//echo $zapytanie;


connection();
$wynik = @mysql_query($zapytanie);

while($r = @mysql_fetch_array($wynik)){
//if($r[DATA]==null && $r[data]==null){
if($ab==1){$ab_c='a';$ab=0;}else{$ab_c='b';$ab=1;}

echo'<tr style="white-space: nowrap;" class="nowrap row_'.$ab_c.'">
<td>
 <table>
  <tbody>
   <tr class="row_'.$ab_c.'">
    <TD><b>GRACZ:</b> '.urldecode($r[gracz]).'</TD>
    <TD class="hidden">'.$r[points].' pkt wioski</TD>
   </tr><tr class="row_'.$ab_c.'">
    <TD colspan="2"><a href="http://pl5.plemiona.pl/game.php?village='.$_GET[village].'&screen=info_village&id='.$r[id_wsi].'">'.urldecode($r[n_wsi]).'</a>
 ('.$r[x].'|'.$r[y].')</TD><tr class="row_'.$ab_c.'"><td colspan="2"><hr></td></tr>
    </tr><tr class="row_'.$ab_c.'">

<TD>'.$statuss[typ][$r[status]].'</TD>
<td>
  <a href="#" onclick="show(\'mob_'.$r[id_wsi].'\');Klik(\'mob_'.$r[id_wsi].'\',\'../pl/raport2.php?id='.$r[id_wsi].'&amp;yes=pies\'); return false;" title="pokarz raport">
   <img src="../img/rap.png">
  </a>
</td>
</tr>
 <tr class="row_'.$ab_c.'"><td align="right" class="hidden"> w Wioski</td>';

if($r[DATA]==null)
{
  echo '<td>BRAK</td>';
}else{
echo'<TD>'.data_z_bazy($r[DATA],false).dns($r[DATA]).'</TD>';
if($r[mur]!=NULL)
echo '<TD><IMG SRC="http://pl5.plemiona.pl/graphic/buildings/wall.png"> '.$r[mur].'</TD>';
}
echo '</tr>
<tr class="nowrap row_'.$ab_c.'">
 <td align="right" class="hidden">Mobilne</td>';

if($r[data]==null){ echo '<td>BRAK</td>';
}else{
echo'
<TD>'.data_z_bazy($r[data],false).dns($r[data]).'</TD>';
}
echo'</tr><tr><td style="display: none;" id="mob_'.$r[id_wsi].'" colspan="3"></td></tr>
  </tbody>
 </table>
</td>
</tr>';
}
destructor();
echo'</TABLE>';
?>