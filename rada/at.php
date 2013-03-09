<script language="JavaScript"><!--
<?php 
include_once('serwer.php');
$ec =mktime()-$godzina_zero;

$i=0;
$SERWER['ATAKI'];
$SERWER['ATAKI']['SUMA']=0;
$SERWER['ATAKI']['SUMA GRACZY']=0;
$zap ="SELECT COUNT( t.id ) AS `Rekordow` , t.name, t.id
      FROM list_ataki a, ws_all v, list_user t
      WHERE a.`cel` = v.id
      AND v.player = t.id
      AND a.godz>$ec
      AND t.id >0
      GROUP BY t.id
      ORDER BY t.name ASC";

echo 'var User_Ataki="';

   connection();
  $wynik = @mysql_query($zap);
  while($r = @mysql_fetch_array($wynik)){

echo $r[name].' x '.$r[Rekordow].'; ';

$SERWER['ATAKI']['PO GRACZACH'][$i++]=$r[name].' x '.$r[Rekordow];
$SERWER['ATAKI']['SUMA']+=$r[Rekordow];
$SERWER['ATAKI']['SUMA GRACZY']++;
  }
  destructor();
echo '";
var Ataki = '.$SERWER['ATAKI']['SUMA'].';
';
?>
//--></script>

