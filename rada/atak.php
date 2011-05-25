<?PHP include('../connection.php'); ?>
<script type="text/javascript">
function show_suwak(a) {
	var style = document.getElementById(a).style;
	style.display = (style.display == 'none' ? '' : 'none');
}
</script>
<style type="text/css">
<!--

  BODY {background: #F7EED3;}
table.main { background-color:#F7EED3; border:1px solid #804000;}
table.ba { border-bottom:0px;}
table.main td{font-size:12px;}
table.main th{font-size:12px;}
table.main tr.row th{font-size:12px;}
table.main tr.row td { background-color:#006600; background-image:none; color:#F1EBDD;}
table.main tr.row td.hidden { color:#333366; }
tr.center td { text-align:center; }

.hidden {font-size:10px;}

-->
</style>
<table><tr><td valign="top">
<?php

 $ec =mktime()-$godzina_zero;

 $zap ="SELECT COUNT( t.id ) AS `Rekordow` , t.name, t.id
      FROM list_ataki a, ws_all v, list_user t
      WHERE a.`cel` = v.id
      AND v.player = t.id
      AND a.godz>$ec
      GROUP BY t.id
      ORDER BY t.name ASC"; $q=0; //echo $zap;
  connection();
   $wynik = @mysql_query($zap);
   $storing0='<table class="main">';
  while($r = @mysql_fetch_array($wynik)){
           $storing0.= '
 <tr>
  <td><a href="javascript:show_suwak(\''.urldecode($r[name]).'\');"><i>'.urldecode($r[name]).'</i></a></td>
  <td>x <b>'.$r[Rekordow].'</b></td>
<td>%stor_'.urldecode($r[name]).'</td>
 </tr>';$kto[$q]=$r[id];}
  destructor();

   $storing0.= '</table>';
//   $storing.= '</td><td valign="top">';

   for($i=0;count($kto)>$i;$i++){
   $zap ="SELECT COUNT( a.cel ) AS `Rekordow` , a.`cel` , v.x, v.y, t.name
        FROM list_ataki a, ws_all v, list_user t
        WHERE a.`cel` = v.id
        AND v.player = t.id
        AND a.godz>$ec
        GROUP BY `cel`
        ORDER BY `t`.`name` ASC";   //echo $zap;
        $names=null;

  connection();  $wynik = @mysql_query($zap);
  while($r = @mysql_fetch_array($wynik)){

  if(urldecode($r[name])!=$names && $names!=null){$storing.='</table>';}

  if(urldecode($r[name])!=$names )
  { if($names !=null){$storing0 = str_replace('%stor_'.$names , $storing, $storing0);}
       $names=urldecode($r[name]);
       $storing='<table id="'.$names.'" style="display: none;" class="main" >';
  }
   $storing.='
 <tr>
  <td>(<i> '.urldecode($r[name]).' </i>)</td>
  <td><b>'.$r[Rekordow].'</b> x </td>
  <td><a href="javascript:show_suwak(\'w'.$r[cel].'\');"> '.$r[x].'|'.$r[y].' </a><a href="http://pl5.plemiona.pl/game.php?village='.$_GET[id].'&screen=map&amp;x='.$r[x].'&y='.$r[y].'" target="_blank"><img src="http://pl5.plemiona.pl/graphic/map_center.png" alt="Scentruj mapê" title="Scentruj mapê"></a></td>
  <td>%stroi_'.$r[cel].'</td>
 </tr>';
 }
  destructor();
  $storing.='</table>';
       $storing0 = str_replace('%stor_'.$names, $storing, $storing0);

//  $storing.='</td><td valign="top">';
/*stary zap
  $zap ="SELECT  a.`cel` , v.x, v.y, a.godz, t.name,a.kto
       FROM list_ataki a, ws_all v, list_user t
       WHERE a.`pochodzenie` = v.id
       AND t.id = a.kto
       AND a.godz>$ec
       ORDER BY a.cel ASC";   //echo $zap;
  */
  $zap ="SELECT  a.`cel` , v.x, v.y, a.godz, t.name,a.kto
       FROM list_ataki a, ws_all v, list_user t
       WHERE a.`pochodzenie` = v.id
       AND t.id = a.kto
       AND a.godz>$ec
       ORDER BY a.cel ASC";   //echo $zap;
   $cell=null;

  connection();   $wynik = @mysql_query($zap);
  while($r = @mysql_fetch_array($wynik)){
  if($r[cel]!=$cell&& $cell!=null){$stor.='</table>';}

  if($r[cel]!=$cell)
  {   if($cell!=null){$storing0 = str_replace('%stroi_'.$cell, $stor, $storing0);}

      $cell=$r[cel];
          $stor='<table id="w'.$cell.'" style=" display: none;" class="main">';
  }

 $stor.='
 <tr>
  <td> </td>
  <td><b><--</b> <a href="http://pl5.plemiona.pl/game.php?village='.$_GET[id].'&screen=map&x='.$r[x].'&y='.$r[y].'" target="_blank">'.$r[x].'|'.$r[y].' </a></td>
  <td>(<i> <a href="http://pl5.plemiona.pl/game.php?village='.$_GET[id].'&screen=info_player&id='.$r[kto].'" target="_blank">'.urldecode($r[name]).' </a></i>)</td>
  <td> '.data_z_bazy($r[godz]).' </td>
 </tr>';}
  destructor();
$stor.='</table>';
  $storing0 = str_replace('%stroi_'.$cell, $stor, $storing0);


}

echo $storing0;
 ?>

</td></tr></table><p class="hidden">wygenerowany : <?PHP echo data_z_bazy(mktime()-$godzina_zero); ?></p>