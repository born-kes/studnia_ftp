<html> Aktualizacja Wiosek<br> zmiana w³a¶cicieli, nazw, i pkt...<br>
<?PHP
require "connection.php";  $licz=0; $zap ='';
$ddd=date("y-m-d G:i:s");
connection();
mysql_query("UPDATE uakt SET data='$ddd' WHERE id=1; ");
destructor();
$lines = gzfile('http://pl5.plemiona.pl/map/village.txt.gz');
if(!is_array($lines)) die("Nie mo¿na by³o otworzyæ pliku");

foreach($lines as $line) 
{
list($id, $name, $x, $y, $tribe, $points, $bonus) = explode(',', $line);
if($x>=300 && $y>=400)  { $name = addslashes(urldecode($name));

  $zap="
UPDATE village 
SET name='$name' , player=$tribe , points=$points , uakt=1
WHERE id=$id; ";  
connection();  @mysql_query($zap);   destructor();}

# if($id>331849){ $licz++;  $zap.=" INSERT INTO village SET id=$id, name='$name', x=$x, y=$y, player=$tribe, points=$points; ";  }else{      $licz++; } if($licz>5){  $licz=0; $zap =''; }  }
 
}

$ddd=date("y-m-d G:i:s");
$query =" UPDATE uakt SET data='$ddd' WHERE id=1; ";

connection();
mysql_query($query);
destructor();
?>
<br> skonczylem</html> 