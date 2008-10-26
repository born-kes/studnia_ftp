<?php
 echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"img/stamm1201718544.css\">
<script src=\"img/mootools.js\" type=\"text/javascript\"></script>
<script src=\"img/script.js\" type=\"text/javascript\"></script>
<script type=\"text/javascript\"><![CDATA[image_base = \"img/\";//]]></script>";
require "connection.php";
connection();
$wynik = mysql_query("SELECT `wsi_id`
FROM `wsi`
GROUP BY `wsi_id`
ORDER BY `wsi_id`")
or die('B³±d zapytania');
  echo "<table><tbody>";
    while($r = mysql_fetch_array($wynik))
       {
echo "<tr ><td>".$r[0]."</td></tr>";
        }
     echo "</table>";
   

?>