<?PHP include_once('../connection.php'); ?>

<?PHP if($_SESSION['zalogowany']!='9oKESi'){echo 'brak uprawnien';exit();}

if($_POST!=NULL && $_GET!=NULL)
{
$nr_proxi = $_POST[proxi];
$id_user = $_GET[g];
    $zap="UPDATE list_user SET nr_proxi='$nr_proxi' Where id='$id_user'" ;
connection();if(mysql_query($zap)){echo 'zapisabo zmiany';}  destructor();
}
$st=array ('niewybrane','error','OK','OK+js','error + js');
$zap="
SELECT prx.*,u.id as user
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
elseif($r[user]==$_GET[g]){$zajente_proxi='selected="tak" ';}
else{$zajente_proxi='';}   $s = $st[$r[status]];

$select .='<option value="'.$r[id].'" '.$zajente_proxi.'>'.$r[id].'=('.$s.') '.$r[name].'</option>';
  }
destructor();
$select .= '</select>';

if($_GET[g]!=NULL){
$zap="
SELECT *
FROM `list_user`
WHERE id='$_GET[g]';
";
connection();$wynik = mysql_query($zap);
 //zakonczenie poloczenia z baza

 //efekt
  if($r = @mysql_fetch_array($wynik))
  {
      echo '<form name="tu" action="" method="post"><table border="1">';
echo '<tr>';
      echo '<td>Login</td><td>'.$r[name].'</td>';
echo '</tr>';
echo '<tr>';
      echo '<td>Passy Proxi</td><td>'.$r[haslo2].'</td>';
echo '</tr>';
echo '<tr>';
      echo '<td>Nr Proxi</td><td>'.$r[nr_proxi].'</td>';
echo '</tr>';
echo '<tr>';
      echo '<td>Proxi</td><td>'.$select.'</td>';
echo '</tr>';
echo '<tr>';
      echo '<td><input type="submit" value="zapisz" /></td>';
echo '</tr>';
      echo '</table></form>';

  }         destructor();     }
?>
