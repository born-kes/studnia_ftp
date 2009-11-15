<?PHP
   connection();
$Zik="SELECT w.x,w.y,w.points, w.name,a.tag as allay ,a.tag, p.name as Gracz
     FROM village w ,list_user p, list_plemie a
     WHERE w.player = p.id  AND p.ally = a.id
      And w.id ='$zap'";
     $wyni = @mysql_query($Zik);

if($r = @mysql_fetch_array($wyni)){
    echo '<table><tbody>';
    echo ' <tr>';
    echo '  <th colspan="2">'.urldecode($r[name]).'</th>';
    echo ' </tr>';
    echo ' <tr>';
    echo '  <td>Wspó³rzêdne</td><td>'.$r[x].'|'.$r[y].'</td>';
    echo ' </tr>';
    echo ' <tr>';
    echo '  <td>Punkty</td><td>'.$r[points].'</td>';
    echo ' </tr>';
    echo ' <tr>';
    echo '  <td>Gracz</td><td>'.urldecode($r[Gracz]).'</td>';
    echo ' </tr>';
    echo ' <tr>';
    echo '  <td>Plemiê</td><td>'.urldecode($r[allay]).'</td>';
    echo ' </tr>';
    echo '</tbody></table>'; }else{ @destructor(); echo $xy[0]."|".$xy[1]; exit(); }

 @destructor();  ?>