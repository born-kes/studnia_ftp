W przygotowaniu
<table border="1"><tr><td valign="top">
<?php
include('../connection.php');
 $ec =mktime()-$godzina_zero; 

$zap ="SELECT COUNT( a.cel ) AS `Rekordow` , t.name, t.id
FROM list_ataki a, ws_all v, list_user t
WHERE a.`cel` = v.id
AND v.player = t.id
AND a.godz>$ec
GROUP BY `cel`
ORDER BY `t`.`name` ASC";
connection();
$wynik = @mysql_query($zap);
echo '<table>';
while($r = @mysql_fetch_array($wynik)){
 echo '
 <tr>
  <td>'.$r[Rekordow].'</td>
  <td>'.$r[name].'</td>
 </tr>';}
  destructor();
echo '</table>';

echo '</td><td valign="top">';

$zap ="SELECT COUNT( a.cel ) AS `Rekordow` , a.`cel` , v.x, v.y, t.name
FROM list_ataki a, ws_all v, list_user t
WHERE a.`cel` = v.id
AND v.player = t.id
AND a.godz>$ec
GROUP BY `cel`
ORDER BY `t`.`name` ASC";
connection();
$wynik = @mysql_query($zap);
echo '<table>';
while($r = @mysql_fetch_array($wynik)){
 echo '
 <tr>
  <td>'.$r[Rekordow].' x </td>
  <td> '.$r[x].'|'.$r[x].' </td>
  <td> '.$r[name].' </td>
 </tr>';}
  destructor();
echo '</table>';
echo '</td><td valign="top">';

$zap ="SELECT  a.`cel` , v.x, v.y, t.name, a.godz
FROM list_ataki a, ws_all v, list_user t
WHERE a.`cel` = v.id
AND v.player = t.id
AND a.godz>$ec
ORDER BY a.godz ASC";

//echo $zap;
connection();
$wynik = @mysql_query($zap);
echo '<table>';
while($r = @mysql_fetch_array($wynik)){
 echo '
 <tr>
  <td> </td>
  <td> '.$r[x].'|'.$r[y].' </td>
  <td> '.$r[name].' </td>
  <td> '.data_z_bazy($r[godz]).' </td>
 </tr>';}
  destructor();
echo '</table>';

 ?>

</td></tr></table>