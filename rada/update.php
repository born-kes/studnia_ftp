<?PHP
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

 include_once('../connection.php');
$czas   = mktime();
$wczasy = mktime()-$godzina_zero;
$j = 0;
$i = 0;
if($_GET[pas]==1){ $word[$j++]=(" UPDATE `ws_all` SET name='$wczasy' WHERE id='0';");

 $zi ="SELECT `id` , `name` , `player` , `points` FROM `ws_all` Where id!=0 ORDER BY `id` ASC";

 $id_user;

 connection();
      $wynik = @mysql_query($zi); $row = NULL;

 while( $r = @mysql_fetch_array($wynik) )
  {
 $row[$r[id]][1]=$r[1];  //'name'
 $row[$r[id]][2]=$r[2];  //'player'
 $row[$r[id]][3]=$r[3];  //'points'
  } destructor();
  $lines = gzfile('http://pl5.plemiona.pl/map/village.txt.gz');
 foreach($lines as $line)
 {
    list($id, $name, $x, $y, $player, $points, $rank) = explode(',', $line);       $name = addslashes($name);
	if(intval($row[$id][2])!=intval($player)){ $delete .= $w.$id;    if($w==NULL) $w=' , ';}

	if( plCharset($row[$id][1])!=plCharset($name) || intval($row[$id][2])!=intval($player) )
		$word[$j++]=(" UPDATE `ws_all` SET name='$name', player='$player', points='$points' WHERE id='$id';");
 else	if(intval($row[$id][3])!=intval($points))
		$word[$j++]=(" UPDATE `ws_all` SET points='$points' WHERE id='$id';");
 }
 if($w==' , ')
 {
        $word[$j++]=("DELETE FROM `ws_raport` WHERE `id` IN ($delete);\n OPTIMIZE TABLE `ws_raport` ;");
        $word[$j++]=("DELETE FROM `ws_mobile` WHERE `id` IN ($delete);\n OPTIMIZE TABLE `ws_mobile` ;");

 }
 echo 'Wykonane w '.(mktime()-$czas).' sek. Zmieniono '.$i.' wpisów.<br>';

$zaptr = $word;

  $hr=0; $hu=0;	 connection();

 foreach($zaptr as $line)
 {$line=trim($line);
   if($line!='')
   {
 				if(! @mysql_query($line) )
      { $huw.= $line."\n";$hu++; echo mysql_query($line).'<br>'; }else{$hr++;};	
   }
 } destructor();     echo '<br>Koniec ';
  echo '<br>Wykonane w '.(mktime()-$czas).' sek. => '.$hr.' Nie udalo siê z '.$hu;


 }else if($_GET[pas]==2){
$trach="UPDATE `list_user` SET data=$wczasy, gra=1 where id=0; ";

 $zi ="SELECT `id` , `ally`, `name` FROM `list_user`";
 connection();
     $wynik = @mysql_query($zi);

 while( $r = @mysql_fetch_array($wynik) )
 {
$row[$r[0]]=$r[1];  //'ally'
$ron[$r[0]]=$r[2];
 } destructor();
$lines = gzfile('http://pl5.plemiona.pl/map/player.txt.gz');
foreach($lines as $line)
{    list($id, $name, $ally, $villages, $points, $rank) = explode(',', $line);

 if($row[$id]!=$ally )
   {	 connection();
	      if( @mysql_query("UPDATE `list_user` SET ally=$ally, gra=1 where id=$id ;") ){ $i++; }
	 destructor();
   }
 if($ron[$id]!=$name)
   {	 connection();
	      if( @mysql_query("UPDATE `list_user` SET name='$name', gra=1 where id=$id ;") ){ $i++; }
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