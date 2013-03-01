<?PHP include_once('../connection.php'); ?>

<?PHP
 if($_SESSION['zalogowany']!='9oKesi' 
 && $_SESSION['zalogowany']!='bampi' 
 && $_SESSION['zalogowany']!='ZOMox' )
    {echo 'brak uprawnien...';exit();}

if($_POST!=NULL && $_GET!=NULL)
{
 if($_POST[usun]!=NULL){
 $id_user = $_GET[g];
   $zap="UPDATE list_user SET gra=0, nr_proxi=0 Where id='$id_user'" ;
}else{
  if($_POST[funkcja]!=NULL){$ff = ',funkcja ='.$_POST[funkcja];}
  if($_POST[ukryj]==1){$ff .= ',wtyczka="T"';}else{$ff .= ',wtyczka="N"';}
  if($_POST[passy]!=NULL){$ff .= ", haslo2 ='$_POST[passy]' ";}
 $nr_proxi = $_POST[proxi];
 $id_user = $_GET[g];
   $zap="UPDATE list_user SET nr_proxi='$nr_proxi' $ff Where id='$id_user'" ;
}
connection();if(mysql_query($zap)){echo 'zapisabo zmiany';}  destructor();
}
$st=array ('niewybrane','error','OK','OK+js','error + js');
$zap="
SELECT prx.*,u.id as user,prx.ip
FROM `list_proxi` prx
left join `list_user` u
ON prx.id=u.nr_proxi
WHERE prx.id!=0;
";
$select = '<select name="proxi"><option value="0"></option>';
connection();
  $wynik = mysql_query($zap);
  while($r = @mysql_fetch_array($wynik))
  { if($r[user]!=NULL && $r[user]!=$_GET[g]){$zajente_proxi='disabled="tak" ';}
elseif($r[user]==$_GET[g]){$zajente_proxi='selected="tak" ';$this_ip=$r[ip]; }
else{$zajente_proxi='';}   $s = $st[$r[status]];

$select .='<option value="'.$r[id].'" '.$zajente_proxi.'>'.$r[id].'=('.$s.') '.$r[name].'</option>';
  }
destructor();
$select .= '</select>';

if($_GET[g]!=NULL){
 $zap="
SELECT *
FROM `list_user`
WHERE id='$_GET[g]' and gra=1;
";
connection();$wynik = mysql_query($zap);
 //zakonczenie poloczenia z baza

 //efekt
  if($r = @mysql_fetch_array($wynik))
  {


      echo '<form name="tu" action="" method="post"><table border="1">';
echo '<tr>';
      echo '<td nowrap>Login</td><td>'.urldecode($r[name]).'</td>';
echo '</tr>';
echo '<tr>';
      echo '<td nowrap>Passy do Proxi</td><td><input type="text" name="passy" value="'.$r[haslo2].'" /></td>';
echo '</tr>';
echo '<tr>';
      echo '<td nowrap>Pe³niona funkcja</td><td><select name="funkcja">'.wpisz_rodzaj($r[funkcja],$funkcja ).'</select></td>';
echo '</tr>';
echo '<tr>';
      echo '<td nowrap>Nr Proxi</td><td><a href="t.php?g='.$r[nr_proxi].'&gg=test" target="test_ip" title="Edycja Proxy" >'.$r[nr_proxi].'</a> (<b>IP</b> '.$this_ip.')</td>';
echo '</tr>';
echo '<tr>';
      echo '<td nowrap>Proxi</td><td>'.$select.'</td>';
echo '</tr>';
echo '<tr>';
if($r[wtyczka]=='T'){$el = ' checked="tak" ';}
      echo '<td>Ukryj</td><td><input type="checkbox" name="ukryj"'.$el.' value="1" /></td>';
echo '</tr>';
echo '<tr>';
      echo '<td><input type="submit" value="zapisz zmiany" /></td>';
      echo '<td align="right">je¶li gracz ju¿ nie gra <input type="submit" value="usun" name="usun" /></td>';

echo '</tr>';
      echo '</table></form>';

  }else{echo'Gracz nie istnieje';}         destructor();     }
?>
