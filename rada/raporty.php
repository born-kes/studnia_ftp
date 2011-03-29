<html dir="ltr" lang="pl"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="Content-Language" content="pl">
<link rel="stylesheet" type="text/css" href="../stamm1201718544.css">
<script language="JavaScript" type="text/javascript">
<!--
function fin(){return false;}
function gid(id) {
	return document.getElementById(id);
}
function loading( text,tu ) {
	gid(tu).innerHTML = text;
}
function show(name) {
	var style = gid(name).style;
	style.display = (style.display == 'none' ? '' : 'none');
}
function show_on(name) { gid(name).style.display = '';return false;}
function Klik(name,where)
{
    var ajax_obiekt;
    try
    {
        ajax_obiekt = new ActiveXObject('Microsoft.XMLHTTP');
    }
    catch (ex)
    {
       try
       {
	  ajax_obiekt = new XMLHttpRequest();
       }
       catch (e3)
       {
          ajax_obiekt = false;
       }
    }

    ajax_obiekt.onreadystatechange  = function()
    {
         var element = gid('tekst');
         if(ajax_obiekt.readyState  == 4)
         {
              if(ajax_obiekt.status  == 200)
                  element.innerHTML = ajax_obiekt.responseText;
              else
                 element.innerHTML = "b&#65533;&#65533;d Po&#65533;&#65533;czenia: <br />" + ajax_obiekt.status;
         }else{  element.innerHTML = '<table  class="main" width="100%"><tr><td><img src="http://pl5.plemiona.pl/graphic/throbber.gif" /> Prosze Czekac</td></tr></table>'; }
    };
   ajax_obiekt.open('POST',where ,  true);//''
   ajax_obiekt.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); //nowy
   ajax_obiekt.send(name);
//   ajax_obiekt.onreadystatechange=funkcja; //nowy
}
function wyslij()
{
var action = document.forms[0].action;
var xy = gid("_xy").value;
var oko= gid("_oko").value;
var gracz= gid("_gracz").value;
var dni= gid("dni_").value;
var url = '_xy='+xy+'&_oko='+oko+'&_gracz='+gracz+'&dni_='+dni;
Klik(url ,action );
}
//-->
</script>
</head><body><? include('../connection.php'); ?>
<form name="form" method="POST" action="../test/operacje/zap_do_baz.php" onSubmit="wyslij();return false;" >
<table class="content-border main" width="100%">
 <tbody>
  <tr valign="top">
   <td>xxx|yyy</td>
   <td>Okolica</td>
   <td>Nazwa gracza</td>
   <td>Historia</td>
  <tr>
  <tr>
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
   </td>
</tr>
<tr>
  <td colspan="2"><input value=" Wykonaj " type="submit"></td>
</tr>
</tbody>
</table>
</form>
<?
$data_rap = mktime()-$godzina_zero;
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
//echo 'SELECT '.$zaps[0].' FROM '.$zaps[3].' WHERE '.'wr.`data`<'.($data_rap-172800).' AND wr.`data`>'.($data_rap-518400-200).$zaps[5];
$mobilne[12] = zap($zaps[0],$zaps[1],'`data`<'.($data_rap-31536000));
$mobilne[0] = zap($zaps[0],$zaps[1],'`data`<'.($data_rap-777600).' AND `data`>'.($data_rap-31536000));
$mobilne[1] = zap($zaps[0],$zaps[1],'`data`<'.($data_rap-518400-200).' AND `data`>'.($data_rap-777600));
$mobilne[2] = zap($zaps[0],$zaps[1],'`data`<'.($data_rap-172800).' AND `data`>'.($data_rap-518400-200));
$mobilne[3] = zap($zaps[0],$zaps[1],'`data`<'.($data_rap).' AND `data`>'.($data_rap-172800));
$mobilne[4] = zap($zaps[0],$zaps[1],'`data`>'.($data_rap));
$mobilne[5] = zap($zaps[0],$zaps[1],'`id`>0 ');

$mobilne[13] = zap($zaps[0],$zaps[3],'wr.`data`<'.($data_rap-31536000).$zaps[5]);
$mobilne[6] = zap($zaps[0],$zaps[3],'wr.`data`<'.($data_rap-777600).' AND wr.`data`>'.($data_rap-31536000).$zaps[5]);
$mobilne[7] = zap($zaps[0],$zaps[3],'wr.`data`<'.($data_rap-518400-200).' AND wr.`data`>'.($data_rap-777600).$zaps[5]);
$mobilne[8] = zap($zaps[0],$zaps[3],'wr.`data`<'.($data_rap-172800).' AND wr.`data`>'.($data_rap-518400-200).$zaps[5]);
$mobilne[9] = zap($zaps[0],$zaps[3],'wr.`data`<'.($data_rap).' AND wr.`data`>'.($data_rap-172800).$zaps[5]);
$mobilne[10] = zap($zaps[0],$zaps[3],'wr.`data`>'.($data_rap).$zaps[5]);
$mobilne[11] = zap($zaps[0],$zaps[3],'wr.`id`>0 '.$zaps[5]);

$r_z_wsi[12] = zap($zaps[0],$zaps[2],'`data`<'.($data_rap-31536000));
$r_z_wsi[0] = zap($zaps[0],$zaps[2],'`data`<'.($data_rap-777600).' AND `data`>'.($data_rap-31536000));
$r_z_wsi[1] = zap($zaps[0],$zaps[2],'`data`<'.($data_rap-518400-200).' AND `data`>'.($data_rap-777600));
$r_z_wsi[2] = zap($zaps[0],$zaps[2],'`data`<'.($data_rap-172800).' AND `data`>'.($data_rap-518400-200));
$r_z_wsi[3] = zap($zaps[0],$zaps[2],'`data`<'.($data_rap).' AND `data`>'.($data_rap-172800));
$r_z_wsi[4] = zap($zaps[0],$zaps[2],'`data`>'.($data_rap));
$r_z_wsi[5] = zap($zaps[0],$zaps[2],'`id`>0 ');

$r_z_wsi[13] = zap($zaps[0],$zaps[4],'wr.`data`<'.(($data_rap-31536000)).$zaps[5]);
$r_z_wsi[6] = zap($zaps[0],$zaps[4],'wr.`data`<'.($data_rap-777600).' AND wr.`data`>'.($data_rap-31536000).$zaps[5]);
$r_z_wsi[7] = zap($zaps[0],$zaps[4],'wr.`data`<'.($data_rap-518400-200).' AND wr.`data`>'.($data_rap-777600).$zaps[5]);
$r_z_wsi[8] = zap($zaps[0],$zaps[4],'wr.`data`<'.($data_rap-172800).' AND wr.`data`>'.($data_rap-518400-200).$zaps[5]);
$r_z_wsi[9] = zap($zaps[0],$zaps[4],'wr.`data`<'.($data_rap).' AND wr.`data`>'.($data_rap-172800).$zaps[5]);
$r_z_wsi[10] = zap($zaps[0],$zaps[4],'wr.`data`>'.($data_rap).$zaps[5]);
$r_z_wsi[11] = zap($zaps[0],$zaps[4],'wr.`id`>0 '.$zaps[5]);

//d_mur>0
$r_m_wsi[0] = zap($zaps[0],$zaps[2],'mur is not null AND `d_mur`<'.($data_rap-777600).' AND `d_mur`>'.($data_rap-31536000));
$r_m_wsi[1] = zap($zaps[0],$zaps[2],'mur is not null AND `d_mur`<'.($data_rap-518400-200).' AND `d_mur`>'.($data_rap-777600));
$r_m_wsi[2] = zap($zaps[0],$zaps[2],'mur is not null AND `d_mur`<'.($data_rap-172800).' AND `d_mur`>'.($data_rap-518400-200));
$r_m_wsi[3] = zap($zaps[0],$zaps[2],'mur is not null AND `d_mur`<'.($data_rap).' AND `d_mur`>'.($data_rap-172800));
$r_m_wsi[4] = zap($zaps[0],$zaps[2],'mur is not null AND `d_mur`>'.($data_rap));
$r_m_wsi[5] = zap($zaps[0],$zaps[2],'mur is not null AND `id`>0 ');
$r_m_wsi[6] = zap($zaps[0],$zaps[4],'wr.mur is not null AND wr.`d_mur`<'.($data_rap-777600).' AND `d_mur`>'.($data_rap-31536000).$zaps[5]);
$r_m_wsi[7] = zap($zaps[0],$zaps[4],'wr.mur is not null AND wr.`d_mur`<'.($data_rap-518400-200).' AND wr.`d_mur`>'.($data_rap-777600).$zaps[5]);
$r_m_wsi[8] = zap($zaps[0],$zaps[4],'wr.mur is not null AND wr.`d_mur`<'.($data_rap-172800).' AND wr.`d_mur`>'.($data_rap-518400-200).$zaps[5]);
$r_m_wsi[9] = zap($zaps[0],$zaps[4],'wr.mur is not null AND wr.`d_mur`<'.($data_rap).' AND wr.`d_mur`>'.($data_rap-172800).$zaps[5]);
$r_m_wsi[10] = zap($zaps[0],$zaps[4],'wr.mur is not null AND wr.`d_mur`>'.($data_rap).$zaps[5]);
$r_m_wsi[11] = zap($zaps[0],$zaps[4],'wr.mur is not null AND wr.`id`>0 '.$zaps[5]);

$r_m_wsi[12] = zap($zaps[0],$zaps[2],'mur is not null AND `d_mur`<'.($data_rap-31536000));
$r_m_wsi[13] = zap($zaps[0],$zaps[4],'wr.mur is not null AND wr.`d_mur`<'.($data_rap-31536000).$zaps[5]);

function zly($a)
{// global $godzina_zero;
 if(count($a)>1){$b=$a = intval($a[0]);}else{$b = intval($a);}
$b += $godzina_zero;
return data_z_bazy($b).dns($a);
}?>
<table class="content-border main" width="100%" id="raportowanie">
<tbody>
<tr><td colspan="11"><div align="right" onclick="show('raportowanie')"><img src="http://www.corporis.pl/images/zamknij.gif"></div ></td></tr> 
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
   <td>Ilosc Raportow dodanych do </td>
   <td><? echo zly($data_rap-31536000); ?></td><th />
   <td><? echo $mobilne[12][0]-$mobilne[13][0]; ?></td>
   <td><? echo $mobilne[13][0]; ?></td><th />
   <td><? echo $r_z_wsi[12][0]-$r_z_wsi[13][0]; ?></td>
   <td><? echo $r_z_wsi[13][0]; ?></td><th />
   <td><? echo $r_m_wsi[12][0]-$r_m_wsi[13][0]; ?></td>
   <td><? echo $r_m_wsi[13][0]; ?></td>
  </tr>
  <tr>
   <td>Ilosc Raportow dodanych do </td>
   <td><? echo zly($data_rap-777600); ?></td><th />
   <td><? echo $mobilne[0][0]-$mobilne[6][0]; ?></td>
   <td><? echo $mobilne[6][0]; ?></td><th />
   <td><? echo $r_z_wsi[0][0]-$r_z_wsi[6][0]; ?></td>
   <td><? echo $r_z_wsi[6][0]; ?></td><th />
   <td><? echo $r_m_wsi[0][0]-$r_m_wsi[6][0]; ?></td>
   <td><? echo $r_m_wsi[6][0]; ?></td>
  </tr>
  <tr>
   <td>Ilosc Raportow dodanych do </td>
   <td><? echo zly($data_rap-518400-200); ?></td><th />
   <td><? echo $mobilne[1][0]-$mobilne[7][0]; ?></td>
   <td><? echo $mobilne[7][0]; ?></td><th />
   <td><? echo $r_z_wsi[1][0]-$r_z_wsi[7][0]; ?></td>
   <td><? echo $r_z_wsi[7][0]; ?></td><th />
   <td><? echo $r_m_wsi[1][0]-$r_m_wsi[7][0]; ?></td>
   <td><? echo $r_m_wsi[7][0]; ?></td>
   </tr>
  <tr>
   <td>Ilosc Raportow dodanych do </td>
   <td><? echo zly($data_rap-86400-86400); ?></td><th />
   <td><? echo $mobilne[2][0]-$mobilne[8][0]; ?></td>
   <td><? echo $mobilne[8][0]; ?></td><th />
   <td><? echo $r_z_wsi[2][0]-$r_z_wsi[8][0]; ?></td>
   <td><? echo $r_z_wsi[8][0]; ?></td><th />
   <td><? echo $r_m_wsi[2][0]-$r_m_wsi[8][0]; ?></td>
   <td><? echo $r_m_wsi[8][0]; ?></td>
   </tr>
  <tr>
   <td>Ilosc Raportow dodanych do dzis </td>
   <td><? echo zly($data_rap-200); ?></td><th />
   <td><? echo $mobilne[3][0]-$mobilne[9][0]; ?></td>
   <td><? echo $mobilne[9][0]; ?></td><th />
   <td><? echo $r_z_wsi[3][0]-$r_z_wsi[9][0]; ?></td>
   <td><? echo $r_z_wsi[9][0]; ?></td><th />
   <td><? echo $r_m_wsi[3][0]-$r_m_wsi[9][0]; ?></td>
   <td><? echo $r_m_wsi[9][0]; ?></td>
   </tr>
<? /*  <tr>
   <td>Ilosc Raportow w przysz³o¶ci </td>
   <td><? echo zly($data_rap+4000); ?></td><th />
   <td><? echo $mobilne[4][0]-$mobilne[10][0]; ?></td>
   <td><? echo $mobilne[10][0]; ?></td><th />
   <td><? echo $r_z_wsi[4][0]-$r_z_wsi[10][0]; ?></td>
   <td><? echo $r_z_wsi[10][0]; ?></td><th />
   <td><? echo $r_m_wsi[4][0]-$r_m_wsi[10][0]; ?></td>
   <td><? echo $r_m_wsi[10][0]; ?></td>
   </tr> */?>
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
$storing.='<tr><td>'.$r[0].'</td><td><a href="javascript:Klik(\'dni_=6&_gracz='.urldecode($r[2]).'\',\'../test/operacje/zap_do_baz.php?village='.$_GET[village].'\')">'.urldecode($r[2]).'</a></td></tr>';

}  destructor();
if($storing!=null){
echo '<td align="right"><table  align="right" class="vis overview_table" id="mobilne_6dni">
<tr><td colspan="2">Nowe raporty z 6 ostatnich dni (Mobilne)</td>
<td><div align="right" onclick="show(\'mobilne_6dni\')"><img src="http://www.corporis.pl/images/zamknij.gif"></div ></td>
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
$storing.='<tr><td>'.$r[0].'</td><td><a href="javascript:Klik(\'dni_=6&_gracz='.urlencode($r[2]).'\',\'../test/operacje/zap_do_baz.php?village='.$_GET[village].'\')">'.urldecode($r[2]).'</a></td></tr>';

}  destructor();
if($storing!=null){
echo '<td align="right"><table class="vis overview_table" align="right" id="raporty_6dni">
<tr><td colspan="2">Nowe raporty z 6 ostatnich dni (w wiosce)</td>
<td><div align="right" onclick="show(\'raporty_6dni\')"><img src="http://www.corporis.pl/images/zamknij.gif"></div ></td>
<tr>';
echo $storing;
echo '</table></td>';
}
?></tr></table>
</body>
</html>