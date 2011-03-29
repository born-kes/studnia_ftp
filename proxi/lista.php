<?PHP include_once('../connection.php');

 ?>
<table border="1"><?
$st=array ('niewybrane','brak ramki - js','ramka ok - js','ramka ok + js ok','brak ramki + js ok');
if($_GET[x]==NULL){
 $zap="SELECT id,name,status,ip FROM `list_proxi`";
#echo $zap;
connection();
$wynik = mysql_query($zap);
echo '<tr><td align="center"><form name="tu" action="t.php" method="post"> dodaj <input type="submit" name="nowe" value="nowe" /> proxy</form></td></tr>';
echo '<tr><td>adres Strony </td><td>status</td><td>IP serwera</tr>';
while($r = @mysql_fetch_array($wynik))
  {
echo '<tr>';
//echo '<td>'.$r[id].'</td>';
echo '<td nowrap><a href="t.php?g='.$r[id].'&gg=test" target="test_ip">'.$r[name].'</a></td>';
echo '<td nowrap>'.$st[$r[status]].'</td>';
echo '<td nowrap>'.$r[ip].'</td>';
echo '</tr>
';
  }
        destructor();}
else{
 $zap="SELECT l.`id` , l.`name` , p.`tag` ,l.`haslo2` , l.`nr_proxi`
FROM `list_user` l
LEFT JOIN `list_plemie` p ON p.id = l.ally
Where gra=1
ORDER BY `id` ASC";
#echo $zap;
connection();
$wynik = mysql_query($zap);
echo '<tr><td>nr Id.</td><td>login</td><td>plemie</td><td>passy</td><td>nr proxy</td></tr>';
while($r = @mysql_fetch_array($wynik))
  {
echo '<tr>';
echo '<td>'.$r[id].'</td>';
echo '<td nowrap><a href="edyt.php?g='.$r[id].'" target="test_ip">'.urldecode($r[name]).'</a></td>';
echo '<td nowrap>'.urldecode($r[tag]).'</td>';
      if($r[haslo2]!=NULL&&$r[haslo2]!='0'){echo '<td><img src="http://pl5.plemiona.pl/graphic/dots/green.png?1" title="Tak" alt=""></td>';}
                      else{echo '<td><img src="http://pl5.plemiona.pl/graphic/dots/grey.png?1" title="Nie" alt=""></td>';}
echo '<td nowrap>'.$r[nr_proxi].'</td>';
echo '</tr>
';
  }
        destructor();}     
?></table>