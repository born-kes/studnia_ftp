<?php  
  require_once('error_handler.php');
  require_once('config.php'); 
   connection();
$wynik = mysql_query("SELECT *
FROM tos t, wsi w
WHERE w.wsi_id = t.wsi_id
ORDER BY w.wsi_id")
or die('B³±d zapytania');

if(mysql_num_rows($wynik) > 0) {

    echo "<table cellpadding=\"2\" border=1>";
    while($r = mysql_fetch_array($wynik)) {
        echo "<tr>";
        echo "<td>".$r[0]."</td>";
        echo "<td>
       </td>";
        echo "</tr>";
    }
    echo "</table>";
}

?>