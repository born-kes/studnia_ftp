<html> Aktualizacja Graczy<br>przynale¿no¶æ do plemienia<br>
<?PHP
require "connection.php";

$ddd=date("y-m-d G:i:s");
connection();
mysql_query("UPDATE uakt SET data='$ddd' WHERE id=2; ");
destructor();
echo "po³±czenie OK,<br> ¶ci±gam dane z serwera plemion";

$lines = gzfile('http://pl5.plemiona.pl/map/tribe.txt.gz');
if(!is_array($lines)) die("Nie mo¿na by³o otworzyæ pliku"); 
foreach($lines as $line) {list($id, $name, $ally, $villages, $points, $rank) = explode(',', $line);
	//$name = urldecode($name);
	//$name = addslashes($name);
	//$query ="UPDATE tribe SET `ally` ='$ally' WHERE id='$id';";

connection();
	@mysql_query("INSERT INTO tribe SET id='$id', name='$name', ally='$ally' ");

//mysql_query($query);
destructor();}


$ddd=date("y-m-d G:i:s");
$query =" UPDATE uakt SET data='$ddd' WHERE id=2; ";
connection();
mysql_query($query);
destructor();
?>
<br> skonczylem</html>