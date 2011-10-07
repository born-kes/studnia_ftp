<? include_once('../../connection.php');
$st=array ('niewybrane','Nie dziala ','OK','OK+wtyczka');

$id = intval($_GET[g]);

 $zap="SELECT id,name,status,ip FROM `list_proxi` Where id=".$id;
echo '<table><tr><td colspan="3" ><center style="color:#006600;">_'.$Raport.'_</center></td></tr>';
 connection();
  $wynik = mysql_query($zap);


  if($r = @mysql_fetch_array($wynik))
{
  echo '<tr><td colspan="3">
        <a href="'.$r[name].'" target="_blank"><input type="submit" value="Testuj proxy"  /></a>
        jako url wpisz: </td></tr>
        <tr><td colspan="3"><b>http://www.bornkes.w.szu.pl/proxi/t.php?g='.$id.'</b></td></tr>';

      echo '<tr><td>Adres: </td><td> <input type="text" id="url" value="'.$r[name].'" /></td><td><input type="submit" value="Zmien" onclick="Klik(\'div_proxi\',\'prox/t_edit.php?g='.$id.'&url=\'+gid_kes(\'url\').value)" /></td></tr>';
      echo '<tr><td>IP:    </td><td> <input type="text" id="ip" value="'.$r[ip].'" /></td><td><input type="submit" value="Zmien" onclick="Klik(\'div_proxi\',\'prox/t_edit.php?g='.$id.'&ip=\'+gid_kes(\'ip\').value)" /><br>';
      echo '<tr><td>Status:</td><td> <b>'.$st[$r[status]].'</b></td><td><br /><br /></td></tr>';

}         destructor();
?>
<tr><td /><td><input type="submit" value="jest OK" onclick="Klik('div_proxi','prox/t_edit.php?g=<? echo $id; ?>&status=2')" /></td></tr>
<tr><td /><td><input type="submit" value="jest OK + wtyczka" onclick="Klik('div_proxi','prox/t_edit.php?g=<? echo $id; ?>&status=3')" /></td></tr>
<tr><td /><td><input type="submit" value="Nie dziala " onclick="Klik('div_proxi','prox/t_edit.php?g=<? echo $id; ?>&status=1')" /></td></tr>

</table>