<html> sciaganie <b>start</b>
<?PHP
require "connection.php";

echo "sci±gam dane z serwera plemion";
$lines = gzfile('http://pl5.plemiona.pl/map/village.txt.gz');
if(!is_array($lines)) die("Nie mo¿na by³o otworzyæ pliku"); 
foreach($lines as $line) {list($id, $name, $x, $y, $tribe, $points, $bonus) = explode(',', $line);
	$name = urldecode($name);
	$name = addslashes($name);
if($x>=300&& $y>=400){connection();
	mysql_query("UPDATE village SET name='$name', player='$tribe', points='$points' WHERE id='$id'; ");}
}
echo"<br> skonczylem";
?></html>