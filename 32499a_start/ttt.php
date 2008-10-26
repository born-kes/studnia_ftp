<?php
 echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"img/stamm1201718544.css\">
<script src=\"img/mootools.js\" type=\"text/javascript\"></script>
<script src=\"img/script.js\" type=\"text/javascript\"></script>

<script type=\"text/javascript\">
<![CDATA[
image_base = \"img/\";
//]]>
</script>";



require "connection.php";
connection();
 
$wynik = mysql_query("SELECT `id` , `img` , `wies` , `pkt` , `kto` , `plemie` , `grupa` FROM `mapa687` ")
or die('B³±d zapytania');

$r = mysql_fetch_array($wynik);

echo "<table class=\"main\" align=\"center\" width=\"800\">";

   echo "<tbody><tr>";
   echo "<td ><div id=\"info\" >";
   echo "<table id=\"info_content\" class=\"vis\" style=\"background-color: rgb(240, 230, 200);\">";
   echo "<tbody><tr><th style=\"display: none;\" rowspan=\"8\" id=\"info_bonus_image\"><img src=\"\"></th><th colspan=\"2\" id=\"info_title\">";
   echo "Agnie93 (612|689) K66</th></tr>";
   echo "";
   echo "<tr style=\"display: none;\" id=\"info_bonus_text\"><td colspan=\"2\"><strong></strong></td></tr>";
   echo "<tr><td>P.:</td><td id=\"info_points\">7091</td></tr>";
   echo "<tr id=\"info_owner_row\"><td>Wlasciciel:</td><td id=\"info_owner\">9oKesi (2.060.339 P.)</td></tr>";
   echo "<tr style=\"display: none;\" id=\"info_left_row\"><td colspan=\"2\">opuszczona</td></tr>";
   echo "<tr id=\"info_ally_row\"><td>Plemie:</td><td id=\"info_ally\">~HW~ (50.222.419 P.)</td></tr>";
   echo "<tr style=\"display: none;\" id=\"info_moral_row\"><td>Morale:</td><td id=\"info_moral\">moral</td></tr>";
   echo "<tr id=\"info_village_groups_row\"><td>Grupy:</td><td id=\"info_village_groups\">Zwiad</td></tr>";
   echo "<tr id=\"info_extra_info\"><td colspan=\"2\">Zaladuj informacje...</td></tr>";
echo "</table></div></td></tr></table>";


  echo "<td>
";
   echo "<tr>".$r[0]."; </tr>";
      echo "<tr>".$r[1]."; </tr>";
      echo "<tr>".$r[2]."; </tr>";
      echo "<tr>".$r[3]."; </tr>";
      echo "<tr>".$r[4]."; </tr>";
      echo "<tr>".$r[5]."; </tr>";echo "
";      echo "<tr>".$r[6]."; </tr>";echo "
";      echo "<tr>".$r[7]."; </tr>";echo "
";      echo "<tr>".$r[8]."; </tr>";echo "
";      echo "<tr>".$r[9]."; </tr>";echo "
";      echo "<tr>".$r[10]."; </tr><br>";
echo "
";      echo "
";

if(mysql_num_rows($wynik) > 0)
 {
  echo "<table style=\"border: 1px solid rgb(241, 235, 221); background-color: rgb(241, 235, 221);\" id=\"mapCoords\" cellpadding=\"0\" cellspacing=\"0\">
<tbody><tr><td>
<div style=\"overflow: hidden; background-image: url(img/gras4.png); position: relative; width: 289px; height: 100px;\" id=\"map\">
<div id=\"mapOld\" style=\"position: absolute; left: 0px; top: 0px;\"><table class=\"map\" cellpadding=\"0\" cellspacing=\"0\"><tbody><td>";
    while($r = mysql_fetch_array($wynik))
    {
   if ($r[1]=='v4.png')
      {
        echo "<tr id=\"".$r[0]."\" class=\"space-left-new space-bottom-new\" style=\"background-color:rgb(240,200,200)\"><a href=\"\"><img src=\"img/".$r[1]."\" onmouseover=\"map_popup('".$r[2]."', '', '', ".$r[3].", '".$r[3]."', '".$r[4]."', '".$r[5]."', false, 41590, 44074)\" onmouseout=\"map_kill()\" /></a></tr>";
       }
        else
       {
        echo "<tr id=\"".$r[0]."\">  <img src=\"img/".$r[1]."\"></TR>";
        }
      echo "</TD>";
     }
     echo "</table></div>";
   }

?>