<html> Aktualizacja Graczy<br>przynale¿no¶æ do plemienia<br>
<?PHP   require "connection.php";   uakt(2);
echo "po³±czenie OK,<br> ¶ci±gam dane z serwera plemion";

$lines = gzfile('http://pl5.plemiona.pl/map/player.txt.gz');
if(!is_array($lines)) die("Nie mo¿na by³o otworzyæ pliku"); 
foreach($lines as $line) {list($id, $name, $ally, $villages, $points, $rank) = explode(',', $line);
	//$name = urldecode($name);
	//$name = addslashes($name);
	//$query ="UPDATE tribe SET `ally` ='$ally' WHERE id='$id';";

connection();
	@mysql_query("INSERT INTO tribe SET id='$id', name='$name', ally='$ally', haslo='', haslo2='',nr_proxi=0 ");

//mysql_query($query);
destructor();}


uakt(2);
?>
<br> skonczylem</html>