<? include('../connection.php'); ?><html dir="ltr" lang="pl"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="Content-Language" content="pl">
<link rel="stylesheet" type="text/css" href="../stamm1201718544.css">
           <script src="../js/plac.js?2b" type="text/javascript"></script>
           <script src="../js/menu.js?2d" type="text/javascript"></script>
           <script src="../js/ajax.js?2" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript">
<!--
function fin(){return false;}
function wyslij()
{
var action = document.forms[0].action;
var xy = gid_kes("_xy").value;
var oko= gid_kes("_oko").value;
var gracz= gid_kes("_gracz").value;
var dni= gid_kes("dni_").value;
var url = '_xy='+xy+'&_oko='+oko+'&_gracz='+gracz+'&dni_='+dni;
Klik('tekst',action, url );
}
//-->
</script>
</head><body>
<form name="form" method="POST" action="raporty/zap_do_baz.php" onSubmit="wyslij();return false;" >
<table class="content-border main" width="100%">
 <tbody>
  <tr valign="top"><td  width="15%" />
   <td>xxx|yyy</td>
   <td>Okolica</td>
   <td>Nazwa gracza</td>
   <td>Historia</td><td  width="15%" />
  <tr>
  <tr><td  width="15%" />
   <td><input type="text" name="_xy"   id="_xy"  size="7" tabindex="13" value="" maxlength="7" /></td>
   <td><input type="text" name="_oko"  id="_oko" size="3" value="" /></td>
   <td><input type="text" name="_gracz" id="_gracz" size="7" value="" /></td>
   <td>
    <select name="dni_" id="dni_">
    <option value="">wszystkie</option>
    <option value="1">dzien</option>
    <option value="2">2 dni</option>
    <option value="3">3 dni</option>
    <option value="5">5 dni</option>
    <option value="7">7 dni</option>
    <option value="30">30 dni</option>
    <option value="70">70 dni</option>
    </select>
   </td><td  width="15%" />
</tr>
<tr><td  width="15%" /><td />
  <td colspan="2"><input value=" Wykonaj " type="submit"></td>
</tr>
</tbody>
</table>
</form>
<? $data_rap = mktime()-$godzina_zero;
//*

$zaps[0]='COUNT(*) AS `Rekordów`';
$zaps[1]='`ws_mobile` ';
$zaps[2]='`ws_raport` ';
$zaps[3]='`ws_mobile` wr,ws_all v, list_user u';
$zaps[4]='`ws_raport` wr,ws_all v, list_user u';
$zaps[5]=' AND wr.id = v.id
       AND v.player = u.id
AND u.ally != 23660
AND u.ally != 4469
AND u.ally != 11183
AND u.ally != 51415
AND u.ally != 51809';

   include('raporty/indexowanie.php');

$index_raportow = zap('*','`index_raportow`','id=1');//roczne raporty
 $nr1= $index_raportow;
$index_raportow = zap('*','`index_raportow`','id=2');//roczne 9 dni
 $nr2= $index_raportow;
$index_raportow = zap('*','`index_raportow`','id=3');//roczne 6 dni
 $nr3= $index_raportow;
$index_raportow = zap('*','`index_raportow`','id=4');//roczne 2 dni
 $nr4= $index_raportow;


//echo 'SELECT '.$zaps[0].' FROM '.$zaps[3].' WHERE '.'wr.`data`<'.($data_rap-172800).' AND wr.`data`>'.($data_rap-518400-200).$zaps[5];
$mobilne[3] = zap($zaps[0],$zaps[1],'`data`<'.($data_rap).' AND `data`>'.($data_rap-172800));
$mobilne[9] = zap($zaps[0],$zaps[3],'wr.`data`<'.($data_rap).' AND wr.`data`>'.($data_rap-172800).$zaps[5]);
$r_z_wsi[3] = zap($zaps[0],$zaps[2],'`data`<'.($data_rap).' AND `data`>'.($data_rap-172800));
$r_z_wsi[9] = zap($zaps[0],$zaps[4],'wr.`data`<'.($data_rap).' AND wr.`data`>'.($data_rap-172800).$zaps[5]);
$r_m_wsi[3] = zap($zaps[0],$zaps[2],'mur is not null AND `d_mur`<'.($data_rap).' AND `d_mur`>'.($data_rap-172800));
$r_m_wsi[9] = zap($zaps[0],$zaps[4],'wr.mur is not null AND wr.`d_mur`<'.($data_rap).' AND wr.`d_mur`>'.($data_rap-172800).$zaps[5]);

$mobilne[11] = zap($zaps[0],$zaps[3],'wr.`id`>0 '.$zaps[5]);
$r_m_wsi[11] = zap($zaps[0],$zaps[4],'wr.mur is not null AND wr.`id`>0 '.$zaps[5]);
$r_z_wsi[11] = zap($zaps[0],$zaps[4],'wr.`id`>0 '.$zaps[5]);
$r_z_wsi[5] = zap($zaps[0],$zaps[2],'`id`>0 ');
$mobilne[5] = zap($zaps[0],$zaps[1],'`id`>0 ');
$r_m_wsi[5] = zap($zaps[0],$zaps[2],'mur is not null AND `id`>0 ');

//$r_z_wsi[10] = zap($zaps[0],$zaps[4],'wr.`data`>'.($data_rap).$zaps[5]);          //przysz³osc
//$r_z_wsi[4] = zap($zaps[0],$zaps[2],'`data`>'.($data_rap));
//$mobilne[4] = zap($zaps[0],$zaps[1],'`data`>'.($data_rap));
//$mobilne[10] = zap($zaps[0],$zaps[3],'wr.`data`>'.($data_rap).$zaps[5]);
//$r_m_wsi[4] = zap($zaps[0],$zaps[2],'mur is not null AND `d_mur`>'.($data_rap));
//$r_m_wsi[10] = zap($zaps[0],$zaps[4],'wr.mur is not null AND wr.`d_mur`>'.($data_rap).$zaps[5]);
//*/

function zly($a)
{// global $godzina_zero;
 if(count($a)>1){$b=$a = intval($a[0]);}else{$b = intval($a);}
$b += $godzina_zero;
return data_z_bazy($b,false).dns($a);
}?>
<table class="content-border main" width="100%" id="raportowanie">
<tbody>
<tr><td colspan="11"><div align="right" onclick="show('raportowanie')"><img src="http://pl5.plemiona.pl/graphic/delete_small.png"></div ></td></tr>
  <tr>
   <th>Rekordy</th>
   <th>data</th>   <th />
   <td colspan="2"> Wojska Mobilne</td>   <th />
   <td colspan="2">Wojska w Wiosce</td>   <th />
   <td colspan="2">Informacja o Murach </td>
  </tr>
  <tr>
   <th colspan="3" />
   <th>Nasze</th>
   <th>Wrogie</th>
   <th />
   <th>Nasze</th>
   <th>Wrogie</th>
   <th/>
   <th>Nasze</th>
   <th>Wrogie</th>
  </tr>
  <tr>
   <td>Raporty majace ponad </td>
   <td><? echo zly($data_rap-31536000); ?></td><th />
   <td><? echo $nr1[2]; ?></td>
   <td><? echo $nr1[3]; ?></td><th />
   <td><? echo $nr1[4]; ?></td>
   <td><? echo $nr1[5]; ?></td><th />
   <td><? echo $nr1[6]; ?></td>
   <td><? echo $nr1[7]; ?></td>
  </tr>
  <tr>
   <td>Raporty majace ponad </td>
   <td><? echo zly($data_rap-777600); ?></td><th />
   <td><? echo $nr2[2]; ?></td>
   <td><? echo $nr2[3]; ?></td><th />
   <td><? echo $nr2[4]; ?></td>
   <td><? echo $nr2[5]; ?></td><th />
   <td><? echo $nr2[6]; ?></td>
   <td><? echo $nr2[7]; ?></td>
  </tr>
  <tr>
   <td>Raporty majace ponad </td>
   <td><? echo zly($data_rap-518400-200); ?></td><th />
   <td><? echo $nr3[2]; ?></td>
   <td><? echo $nr3[3]; ?></td><th />
   <td><? echo $nr3[4]; ?></td>
   <td><? echo $nr3[5]; ?></td><th />
   <td><? echo $nr3[6]; ?></td>
   <td><? echo $nr3[7]; ?></td>
   </tr>
  <tr>
   <td>Raporty majace ponad </td>
   <td><? echo zly($data_rap-86400*2); ?></td><th />
   <td><? echo $nr4[2]; ?></td>
   <td><? echo $nr4[3]; ?></td><th />
   <td><? echo $nr4[4]; ?></td>
   <td><? echo $nr4[5]; ?></td><th />
   <td><? echo $nr4[6]; ?></td>
   <td><? echo $nr4[7]; ?></td>
   </tr>
  <tr>
   <td>Raporty dodane dzis </td>
   <td><? echo zly($data_rap-200); ?></td><th />
   <td><? echo $mobilne[3][0]-$mobilne[9][0]; ?></td>
   <td><? echo $mobilne[9][0]; ?></td><th />
   <td><? echo $r_z_wsi[3][0]-$r_z_wsi[9][0]; ?></td>
   <td><? echo $r_z_wsi[9][0]; ?></td><th />
   <td><? echo $r_m_wsi[3][0]-$r_m_wsi[9][0]; ?></td>
   <td><? echo $r_m_wsi[9][0]; ?></td>
   </tr>

  <tr>
   <th /><th>Suma </th><th />
   <th><? echo $mobilne[5][0]-$mobilne[11][0]; ?></th>
   <th><? echo $mobilne[11][0]; ?></th><th />
   <th><? echo $r_z_wsi[5][0]-$r_z_wsi[11][0]; ?></th>
   <th><? echo $r_z_wsi[11][0]; ?></th><th />
   <th><? echo $r_m_wsi[5][0]-$r_m_wsi[11][0]; ?></th>
   <th><? echo $r_m_wsi[11][0]; ?></th>
   </tr>
  <tr>
   <td><? echo $_SESSION['zalogowany']; sesio_id(); $moje_id= $_SESSION['id']; ?> masz <b><? $mi = zap($zaps[0],'`ws_all` v',' v.player='.$moje_id ); echo $mi[0]; ?></b> wiosek</td>
   <td>nie starsze niz 6 dni</td><th />
   <td><? $mi = zap($zaps[0],'`ws_mobile` wr,`ws_all` v','wr.`data`<'.($data_rap).' AND wr.`data`>'.($data_rap-518400).' AND wr.id = v.id AND v.player='.$moje_id ); echo $mi[0]; ?></td>
<th /><th />
   <td><? $mi = zap($zaps[0],'`ws_raport` wr,`ws_all` v','wr.`data`<'.($data_rap).' AND wr.`data`>'.($data_rap-518400).' AND wr.id = v.id AND v.player='.$moje_id ); echo $mi[0]; ?></td>
<th /><th />
   <td><? $mi = zap($zaps[0],'`ws_raport` wr,`ws_all` v','wr.`d_mur`<'.($data_rap).' AND wr.`d_mur`>'.($data_rap-518400).' AND wr.id = v.id AND v.player='.$moje_id ); echo $mi[0]; ?></td>
<th />
<?/*   <td> echo "SELECT $zaps[0] FROM `ws_` wr,`ws_all` v WHERE ".'wr.`data`<'.($data_rap).' AND wr.`data`>'.($data_rap-518400).' AND wr.id = v.id AND v.player='.$moje_id ; </td>*/ ?>
  </tr>
</tbody>
</table>


<table class="content-border" align="right" width="100%"><tr valign="top"><td width="40%" align="right" id="tekst" class="vis overview_table" />
<?
 $ec =mktime()-$godzina_zero- (86400*6);
//echo '<br>';
//echo data_z_bazy(76951608).'<br>';


 $zap ="
SELECT COUNT( v.player ) AS `Rekordow`, v.player, u.name
FROM ws_all v, `ws_mobile` wm, list_user u
WHERE v.id = wm.id
AND wm.`data` >$ec
AND v.player = u.id
AND u.ally != 23660
GROUP BY v.player
ORDER BY `Rekordow` DESC";//  echo $zap;
$storing=null;
  connection();
   $wynik = @mysql_query($zap);
  while($r = @mysql_fetch_array($wynik)){
$storing.='<tr><td>'.$r[0].'</td><td><a href="javascript:Klik(\'tekst\',\'raporty/zap_do_baz.php?village='.$_GET[village].'\',\'dni_=6&_gracz='.urldecode($r[2]).'\')">'.urldecode($r[2]).'</a></td></tr>';

}  destructor();
if($storing!=null){
echo '<td align="right"><table  align="right" class="vis overview_table" id="mobilne_6dni">
<tr><td colspan="2">Nowe raporty z 6 ostatnich dni (Mobilne)</td>
<td><div align="right" onclick="show(\'mobilne_6dni\')"><img src="http://pl5.plemiona.pl/graphic/delete_small.png"></div ></td>
<tr>';
echo $storing;
echo '</table></td>';
}
 $zap ="
SELECT COUNT( v.player ) AS `Rekordow`, v.player, u.name
FROM ws_all v, `ws_raport` wm, list_user u
WHERE v.id = wm.id
AND wm.`data` >$ec
AND v.player = u.id
AND u.ally != 23660
GROUP BY v.player
ORDER BY `Rekordow` DESC";//  echo $zap;
$storing=null;
  connection();
   $wynik = @mysql_query($zap);
  while($r = @mysql_fetch_array($wynik)){
$storing.='<tr><td>'.$r[0].'</td><td><a href="javascript:Klik(\'tekst\',\'raporty/zap_do_baz.php?village='.$_GET[village].'\',\'dni_=6&_gracz='.urlencode($r[2]).'\')">'.urldecode($r[2]).'</a></td></tr>';

}  destructor();
if($storing!=null){
echo '<td align="right"><table class="vis overview_table" align="right" id="raporty_6dni">
<tr><td colspan="2">Nowe raporty z 6 ostatnich dni (w wiosce)</td>
<td><div align="right" onclick="show(\'raporty_6dni\')"><img src="http://pl5.plemiona.pl/graphic/delete_small.png"></div ></td>
<tr>';
echo $storing;
echo '</table></td>';
}
?></tr></table>
</body>
</html>