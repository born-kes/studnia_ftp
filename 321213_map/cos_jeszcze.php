<?php
 echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"img/stamm1201718544.css\">
<script src=\"img/mootools.js\" type=\"text/javascript\"></script>
<script src=\"img/script.js\" type=\"text/javascript\"></script>
<script type=\"text/javascript\"><![CDATA[image_base = \"img/\";//]]></script>";
require "connection.php";
connection();

$index=0
$wynik = mysql_query("SELECT *
FROM `wsii`")
or die('B³±d zapytania');
  echo "<table><tbody>";
    while($r = mysql_fetch_array($wynik)&&$index<329220)
       {$index++;
$zap = mysql_query("UPDATE `wsi` SET pik='' , ' WHERE wsi_id=".$index."")
or die("INSERT INTO `wsi` VALUES(".$index.",'','','','', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '0000-00-00');")
or die('B³±d zapytania');
        }
     echo "</table>";
?>