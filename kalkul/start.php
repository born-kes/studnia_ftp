<?PHP   include('../connection.php'); if($_GET==NULL && $_POST==NULL){echo 'Brak Danych do obliczen';exit();}
?><html><head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<script src="../js/kes_picker.js?1" type="text/javascript"></script>
<script language="JavaScript">
<!--
function ukryj(id) {
	var style = document.getElementById(id).style;
	style.display = (style.display == 'none' ? '' : 'none');
}
function pomoc(){
var st = "Radar szuka powi±zañ miêdzy dwoma wioskami.\n T± w której jeste¶, a twoimi i tworzy listê\n wed³ug czasu doj¶cia do niej.";
alert("POMOC: \n"+st +"\n\n Dopuszczalne formy podanego czasu to: \n\n (nic)\n najdalej 4godz. drogi \n\n (same godziny)\n np. 8 => 8godz.\n najdalej 8 godzin drogi\n\n (do wybranej godziny)\n np. 8:20 => Do najblizszej 8:20 rano\n Sam okresla czy to dzis czy jutro \n Zamiast pe³nej daty starczy godzina \n\n (cala data)\n\t26.11.2009 8:00");
}
//-->
</script><style type="text/css">
<!--
BODY {background: #F7EED3;}
.hidden{color:#DED3B9;}
a:link	{ font-weight:bold; color: #804000; text-decoration:none; }
a:visited	{  font-weight:bold; color: #804000; text-decoration:none; }
a:active	{  font-weight:bold; color: #0082BE; text-decoration:none; }
a:hover { font-weight:bold; color: #0082BE; text-decoration:none; }
.red {color: #DC0000;}
table.ba { border-bottom:0px;}
table.main { background-color:#DFCCA6; border:1px solid #804000; background:#F4E4BC none repeat scroll 0 0;}
table.main td{font-size:11px; background-color:#DFCCA6; }
table.main td.red{ background-color:#3333AA; }
table.main th{font-size:11px; background-color:#F1EBDD; }
table.main tr.row th{font-size:11px;}
table.main tr.row td { background-color:#006600; background-image:none; color:#F1EBDD;}    //DED3B9
table.main tr.row td.hidden { color:#333366; }
tr.center td { text-align:center; }
-->
</style></head>
<body><div style="position: absolute; top: -6px; left: 100px;"><form name="form" action="radar.php" method="POST"><?php

$obr = zap("v.x, v.y, u.name","ws_all v, list_user u","v.player = u.id AND v.id =".$_GET[id] );
$nagluwek = 'Agresor: <b>'.$_SESSION['zalogowany'].'</b> Obroñca: <b>'.urldecode($obr[2]).'</b> ('.$obr[0].'|'.$obr[1].')';

echo '<input type="hidden" name="xy" value="'.$_GET[id].'" />';
echo '<input type="hidden" name="id" value="'.$_GET[id].'" />'; // village ??

if($_GET[t]==null)
    {sesio_id(); echo '<input type="hidden" name="gracz" value="'.$_SESSION['id'].'" />'; }
else
    { echo '<input type="hidden" name="t" value="'.$_GET[t].'" />'; }



 ?>
<table class="main" align="center">
<tr><td><? echo $nagluwek; ?></td></tr>
<tr>
<td valign="top" align="center"> 
 <table class="main">
  <tr>
   <th><label for="def">Def </label> <a href="javascript:ukryj('inne_def');ukryj('inne_max');" class="red">*</a></th>
   <th><label for="off">Off</label> <a href="javascript:ukryj('inne_off');ukryj('inne_max');" class="red">*</a></th>
   <th><label for="foff">full Off</label> <a href="javascript:ukryj('inne_max');" class="red">*</a></th>
   <th><label for="zw">Zwiad</label> <a href="javascript:ukryj('inne_zw');ukryj('inne_max');" class="red">*</a></th>
   <th><label for="sz">Szlachta</label></th>
  </tr>
  <tr>
   <td><input type="radio" name="co" value="def" checked="tak" id="def" /></td>
   <td><input type="radio" name="co" value="off" id="off" /></td>
   <td><input type="radio" name="co" value="foff" id="foff" /></td>
   <td><input type="radio" name="co" value="zw" id="zw" /></td>
   <td><input type="radio" name="co" value="sz" id="sz" /></td>
  </tr>
  <tr>
   <td colspan="5">
<table id="inne_def" style="display :none;"><tbody>
<tr><td> pik &gt; </td><td><input type="text" name="pik" value="50" /></td></tr>
<tr><td> mieczy &gt; </td><td> <input type="text" name="mie" value="50" /></td></tr>
<tr><td> lukow &gt; </td><td><input type="text" name="luk" value="50" /></td></tr>
<tr><td> ck &gt; </td><td><input type="text" name="ck" value="50" /></td></tr>
</tbody></table>
<table id="inne_off" style="display :none;"><tbody>
<tr><td> top  &gt; </td><td><input type="text" name="top" value="50" /></td></tr>
<tr><td> lk  &gt; </td><td><input type="text" name="lk" value="50" /></td></tr>
<tr><td> kl  &gt; </td><td><input type="text" name="kl" value="50" /></td></tr>
<tr><td> ck  &gt; </td><td><input type="text" name="ck" value="50" /></td></tr>
</tbody></table>
<table id="inne_zw" style="display :none;"><tbody>
<tr><td> Minimum ZW </td><td><input type="text" name="zw" value="100" /></td></tr>
</tbody></table>
<table id="inne_max" style="display :none;"><tbody>
<tr><td>limit odleglosci <input name="mxo" type="checkbox" title="zostaw zaznaczony by nie przeciazac serwera" checked="tak" value="1"></td></tr>
</tbody></table>
   </td>
  </tr>
 </table>
</td>
</tr>
<tr><td valign="top" align="center">
Czas:
<input name="czas1" value="" size="19" type="text"  onclick="show_calendar('document.form.czas1', document.form.czas1.value);"><a href="javascript:show_calendar('document.form.czas1', document.form.czas1.value);">
<img src="../img/cal.gif" border="0" height="16" width="16" alt="Clicknij Tu by ustaliæ Datê"></a>
 <a href="javascript:pomoc();"> POMOC ? </a></td>
</tr>

<tr><td valign="top"><b>Wojska maja dotra na podana godzine?</b><br />
<input name="on" value="0" type="radio" checked="tak">Nie, pokaz tez te które dojda wczesniej <br />
<input name="on" value="1" type="radio">Tak, odzuc te które beda za wczesnie <a href="javascript:ukryj('inne_time')" class="red">*</a><br />
</td></tr>
<tr id="inne_time" style="display :none;"><td> +/- ile minut? <input type="text" name="czas_time" value="10" /></td></tr>

<tr><td valign="top" align="center">
<input type="submit" value="POLICZ" /></td></tr></table>
</form>
<?  $ec =mktime()-$godzina_zero;

  $zap ="SELECT  a.`cel` , v.x, v.y, a.godz, t.name,a.kto
       FROM list_ataki a, ws_all v, list_user t
       WHERE a.`pochodzenie` = v.id
       AND a.cel = $_GET[id]
       AND t.id = a.kto
       AND a.godz>$ec
       ORDER BY a.godz ASC";   //echo $zap;
   $cell=null;
$gstr='<table></tr><th colspan="3">Ataki na wioske</th></tr>';
$stor=$gstr;
  connection();   $wynik = @mysql_query($zap);
  while($r = @mysql_fetch_array($wynik)){
 $stor.='
 <tr>
  <td><b><a href="" onclick="document.form.czas1.value = \''.data_z($r[godz]).'\' ;return false;"><img src="../img/cal.gif" border="0" height="16" width="16" alt="Clicknij Tu by ustaliæ Datê"></a><-</b> <a href="http://pl5.plemiona.pl/game.php?village='.$_GET[id].'&screen=map&x='.$r[x].'&y='.$r[y].'" target="_blank">'.$r[x].'|'.$r[y].' </a></td>
  <td>(<i> <a href="http://pl5.plemiona.pl/game.php?village='.$_GET[id].'&screen=info_player&id='.$r[kto].'" target="_blank">'.urldecode($r[name]).' </a></i>)</td>
  <td> '.data_z_bazy($r[godz]).' </td>
 </tr>';}
  destructor();
if($stor!=$gstr){$stor.='</table>'; echo $stor;}

?>
</div></body></html>
