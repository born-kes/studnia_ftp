<?PHP
 include_once('../connection.php');
$czas   = mktime();
$wczasy = mktime()-$godzina_zero;
$i = 0;
if($_GET[pas]==1){
$trach=" UPDATE `ws_all` SET name='$wczasy' WHERE id='0';";

 $zi ="SELECT `id` , `name` , `player` , `points` FROM `ws_all`";
 connection();
      $wynik = @mysql_query($zi);

 while( $r = @mysql_fetch_array($wynik) )
 {
$row[$r[0]][1]=$r[1];  //'name'
$row[$r[0]][2]=$r[2];  //'player'
$row[$r[0]][3]=$r[3];  //'points'
 } destructor();
$lines = gzfile('http://pl5.plemiona.pl/map/village.txt.gz');
foreach($lines as $line)
{
    list($id, $name, $x, $y, $player, $points, $rank) = explode(',', $line);       $name = addslashes($name);
	if($row[$id][2]!=$player){ $delete .= $w.$id;    if($w==NULL) $w=' , ';}

	if($row[$id][1]==NULL)
		$zaptr=" INSERT INTO `ws_all` VALUES ( $id ,$x , $y , '$name' , $player , $points ); ";
else	if($row[$id][1]!=$name || $row[$id][2]!=$player)
		$zaptr=" UPDATE `ws_all` SET name='$name', player='$player', points='$points' WHERE id='$id'; ";
else	if($row[$id][3]!=$points)
		$zaptr=" UPDATE `ws_all` SET points='$points' WHERE id='$id'; ";

	if($zaptr!=NULL)
	{ //echo (mktime()-$czas).'<br>'.$zaptr.'<br>';
	 connection();
	      if( @mysql_query($zaptr) ){ $i++; }
	 destructor(); $zaptr=NULL;
	}
}
if($w==' , ')
{
   $zap1="DELETE FROM `ws_raport` WHERE `id` IN ($delete);";
   $zap2="DELETE FROM `ws_mobile` WHERE `id` IN ($delete);";

}


if($i>0){ echo 'Wykonane w '.(mktime()-$czas).' sek. Zmieniono '.$i.' wpisów.'; connection(); @mysql_query($trach); destructor();}else{ echo 'Nie Wykonane, moze to dlatego ze niema zmian. ';}
if($w!=NULL)
{
 connection();
      if( @mysql_query($zap1) && @mysql_query($zap2)) echo ' Usuniêto nieaktualne raporty '; else echo 'Niema wiosek które zmieni³y w³a¶ciciela';
 destructor();
}
 }else if($_GET[pas]==2){
$trach="UPDATE `list_user` SET data=$wczasy, gra=1 where id=0; ";

 $zi ="SELECT `id` , `ally` FROM `list_user`";
 connection();
      $wynik = @mysql_query($zi);

 while( $r = @mysql_fetch_array($wynik) )
 {
$row[$r[0]]=$r[1];  //'ally'

 } destructor();
$lines = gzfile('http://pl5.plemiona.pl/map/player.txt.gz');
foreach($lines as $line)
{    list($id, $name, $ally, $villages, $points, $rank) = explode(',', $line);

 if($row[$id]!=$ally)
   {	 connection();
	      if( @mysql_query("UPDATE `list_user` SET ally=$ally, gra=1 where id=$id ;") ){ $i++; }
	 destructor();
   }
}
if($i>0){ echo 'Wykonane w '.(mktime()-$czas).' sek. Zmieniono '.$i.' wpisów.'; connection(); @mysql_query($trach); destructor();}else echo 'Nie Wykonane, moze to dlatego ze niema zmian. ';
 }else if($_GET[pas]==3){
$trach="UPDATE `list_plemie` SET name=$wczasy where id=0; ";


 $zi ="SELECT `id` , `name`,tag FROM `list_plemie`";
 connection();
      $wynik = @mysql_query($zi);

 while( $r = @mysql_fetch_array($wynik) )
 {
$row[$r[0]][1]=$r[1];  //'name'
$row[$r[0]][2]=$r[2];  //'tag'

 } destructor();
$lines = gzfile('http://pl5.plemiona.pl/map/ally.txt.gz');
foreach($lines as $line)
{    list($id, $name, $tag, $members, $villages, $points, $all_points, $rank) = explode(',', $line);

 if($row[$id][1]!=$name || $row[$id][2]!=$tag)
   {	 connection();
	      if( @mysql_query("UPDATE `list_plemie` SET name=$name, tag=$tag where id=$id ;") ){ $i++; }
	 destructor();
   }
}
if($i>0){ echo 'Wykonane w '.(mktime()-$czas).' sek. Zmieniono '.$i.' wpisów.'; connection(); @mysql_query($trach); destructor();}else echo 'Nie Wykonane, moze to dlatego ze niema zmian.';

 }
?>