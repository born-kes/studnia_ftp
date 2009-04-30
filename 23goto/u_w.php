<html> Aktualizacja Wiosek<br> zmiana w³a¶cicieli, nazw, i pkt...<br>
<?PHP  require "connection.php";  // uakt(1);

function ustal_k($x,$y)
{
$k = intval($y /100).intval($x /100);
    return $k;
}
function update($id,$name,$player,$points){
$zap=" UPDATE village SET name='".$name."', player=".$player.", points=".$points." WHERE id=".$id; 
 connection();   @mysql_query($zap);  destructor();}

$lines = gzfile('http://pl5.plemiona.pl/map/village.txt.gz');
foreach($lines as $line) { $tot = explode(',', $line);
$k=ustal_k($tot[2],$tot[3]);
if(($k>53&&$k<60)||($k>63&&$k<70) || ($k>73&&$k<80))
//if(($k>83&&$k<90)||($k>93&&$k<100))  
{   $name = addslashes(urldecode($tot[1])); update($tot[0],$name,$tot[4],$tot[5]); }
}
uakt(1);
?>
<br> skonczylem</html> 