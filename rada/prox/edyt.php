<?PHP include_once('../../connection.php'); ?>

<?PHP
 if($_SESSION['zalogowany']!='9oKesi'
 && $_SESSION['zalogowany']!='bampi'
 && $_SESSION['zalogowany']!='ZOMox' )
    {echo 'brak uprawnien...';exit();}
if($_GET[g]==NULL){echo'Gracz nie istnieje';exit();}
$g =intval($_GET[g]);
include_once('select.php');

if($g!=NULL){
 $zap="
SELECT *
FROM `list_user`
WHERE id='$g' and gra=1;
";
connection();$wynik = mysql_query($zap);
 //zakonczenie poloczenia z baza

 //efekt
  if($r = @mysql_fetch_array($wynik))
  {
$login = '<td><b>'.urldecode($r[name]).'</b> <input type="submit" value="usun gracza" name="usun" class="xs" onclick="Klik(\'a'.$g.'\',\'prox/zmien.php?g='.$g.'&usun=1\');" /></td>';
$passi = '<td><input type="text" id="passy_'.$g.'" value="'.$r[haslo2].'" size="5" style="font-size:x-small;" /></td>';
if($r[wtyczka]=='T'){$el = ' checked="tak" ';}
$spay = '<td>Ukryj dla nieuprawnionych <input type="checkbox" id="ukryj_'.$g.'"'.$el.' value="1" /></td>';
$funkc= '<td><select id="funkcja_'.$g.'" class="xs" >'.wpisz_rodzaj($r[funkcja],$funkcja ).'</select></td>';
$nr_pr= '<td><a href="javascript:show(\'div_proxi\');Klik(\'div_proxi\',\'prox/t.php?g='.$r[nr_proxi].'&gg=test\')" title="Edycja Proxy" >'.$r[nr_proxi].'</a> (<b>IP</b> '.$this_ip.')</td>';


//      echo '<form name="tu" action="" method="post">';
/*echo '<tr>
      <td nowrap>Login</td>
      <td nowrap>Has³o</td>
      <td>Ukryj</td>
      <td nowrap>Nr Proxi</td>
      <td nowrap>Proxi</td>
      <td nowrap>Pelniona funkcja</td>
</tr>*/

echo '<td style="display:none;">'.$r[data].'</td>'.$login . $passi . $nr_pr . '
<td>' . $select . '</td>' . $spay . $funkc.'
<td><input type="submit" value="zapisz zmiany" onclick="zapisz_to('.$g.')" /></td>';
 //     echo '</form>';

  }else{echo'Gracz nie istnieje';}         destructor();     }
?>
