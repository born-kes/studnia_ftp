<?
 include('../connection.php');
    $ec =mktime()-$godzina_zero;

 if($_GET[cel]!=null && $_GET[lista]==1)
 { $cel = urlencode($_GET[cel]);
 $zap ="SELECT COUNT( a.cel ) AS `Rekordow` , a.`cel` , v.x, v.y, v.id,name
        FROM list_ataki a, ws_all v
        WHERE a.`cel` = v.id
        AND v.player = '$cel'
        AND a.godz>$ec
        GROUP BY `cel`
        ORDER BY `a`.`godz` ASC";   //echo $zap;

       $storing='<table>';

  connection();  $wynik = @mysql_query($zap);
  while($r = @mysql_fetch_array($wynik))
  {

 $storing.='
 <tr>
  <td><i> '.deCode($r[name]).' </i></td>
  <td>(<a href="javascript:javascript:selectOdp(\'wsi_'.$r[id].'\',2,'.$r[id].');"> '.$r[x].'|'.$r[y].' </a>)</td>
  <td> x <b>'.$r[Rekordow].'</b></td>
  <td><a href="http://pl5.plemiona.pl/game.php?village='.$_GET[id].'&screen=map&amp;x='.$r[x].'&y='.$r[y].'" target="_blank"><img src="http://pl5.plemiona.pl/graphic/map_center.png" alt="Scentruj mapê" title="Scentruj mapê"></a></td>
 </tr>
 <tr><td />
  <td colspan="3" id="wsi_'.$r[id].'"></td>
 </tr>
';
  }
  destructor();
  $storing.='</table>';
}else  if($_GET[cel]!=null && $_GET[lista]==2)
{ $cel = urlencode($_GET[cel]);
 $zap ="SELECT  a.`cel` , v.x, v.y, a.godz, t.name,a.kto,v.id
       FROM list_ataki a, ws_all v, list_user t
       WHERE a.`pochodzenie` = v.id
       AND t.id = a.kto
        AND a.`cel` = '$cel'
        AND a.godz>$ec
       ORDER BY a.godz ASC";   //echo $zap;

  connection();   $wynik = @mysql_query($zap);
          $storing='<table class="main">';

  while($r = @mysql_fetch_array($wynik))
  {
 $storing.='
 <tr>
  <td><b><--</b> <a href="http://pl5.plemiona.pl/game.php?village='.$_GET[id].'&screen=info_village&id='.$r[id].'" target="_blank">'.$r[x].'|'.$r[y].' </a></td>
  <td>(<i> <a href="http://pl5.plemiona.pl/game.php?village='.$_GET[id].'&screen=info_player&id='.$r[kto].'" target="_blank">'.deCode($r[name]).' </a></i>)</td>
  <td> '.dns($r[godz]).' </td>
 </tr>';}
  destructor();
$storing.='</table>';
}else  if($_GET[cel]!=null && $_GET[lista]==3)
{ $cel = urlencode($_GET[cel]);
 $zap ="SELECT  a.`cel` , v.x, v.y, a.godz, v.name,a.kto,v.id
       FROM list_ataki a, ws_all v
       WHERE a.`cel` = v.id
        AND v.`player` = '$cel'
        AND a.godz>$ec
       ORDER BY a.godz ASC";   //echo $zap;

  connection();   $wynik = @mysql_query($zap);
          $storing='<table class="main">';

  while($r = @mysql_fetch_array($wynik))
  {
 $storing.='
 <tr>
  <td>'.deCode($r[name]).'(<a href="http://pl5.plemiona.pl/game.php?village='.$_GET[id].'&screen=info_village&id='.$r[id].'" target="_blank">'.$r[x].'|'.$r[y].' </a>)</td>
  <td><a href="http://pl5.plemiona.pl/game.php?village='.$_GET[id].'&screen=map&amp;x='.$r[x].'&y='.$r[y].'" target="_blank"><img src="http://pl5.plemiona.pl/graphic/map_center.png" alt="Scentruj mapê" title="Scentruj mapê"></a></td>
  <td> '.dns($r[godz]).' </td>';

if($r[godz]>$ec+36000) $storing.='<th> '.data_z_bazy($r[godz]).' </th>';

 $storing.='
 </tr>';}
  destructor();
$storing.='</table>';
}


echo $storing;

?>