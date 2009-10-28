<html> Aktualizacja Plemion<br>Zmiana nazw i skrótów<br>
<?PHP  require "connection.php"; uakt(3); echo "po³±czenie OK,<br> ¶ci±gam dane z serwera plemion";

$lines = gzfile('http://pl5.plemiona.pl/map/ally.txt.gz');
if(!is_array($lines)) die("Nie mo¿na by³o otworzyæ pliku"); 
foreach($lines as $line) {list($id, $name, $tag, $members, $villages, $points, $all_points, $rank) = explode(',', $line);
	$name = urldecode($name);
	$name = addslashes($name);
connection();
	if(!@mysql_query("UPDATE ally SET name='$name', tag='$tag' WHERE id='$id'; ")){
	@mysql_query("INSERT INTO ally SET id='$id', name='$name', tag='$tag';");}
destructor();
} 

uakt(3);
?>
<br> skonczylem</html>