<html> Aktualizacja Wiosek<br> zmiana w³a¶cicieli, nazw, i pkt...<br>
<?PHP  require "connection.php";  // uakt(1);
function update($id,$name,$player,$points){
$zap=" UPDATE village SET name='".$name."', player=".$player.", points=".$points." WHERE id=".$id; 
 connection();   @mysql_query($zap);  destructor();}

$lines = gzfile('http://pl5.plemiona.pl/map/village.txt.gz');
foreach($lines as $line) { $tot = explode(',', $line);
if(($tot[2]>=300||$tot[2]<=700) && ($tot[3]>=500||$tot[3]<=850))  {   $name = addslashes(urldecode($tot[1])); update($tot[0],$name,$tot[4],$tot[5]); }
}
uakt(1);
?>
<br> skonczylem</html> 