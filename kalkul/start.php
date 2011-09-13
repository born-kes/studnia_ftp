<?PHP   include('../connection.php'); if($_GET==NULL && $_POST==NULL){echo 'Brak Danych do obliczen';exit();}
?><html><head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<script src="../js/kes_picker.js?1" type="text/javascript"></script>
<script src="../js/plac.js?7.5" type="text/javascript"></script>
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
<body><div style="position: absolute; top: -6px; left: 100px;"><form name="form" action="radar.php" method="POST">
<?php      sesio_id();

if($_GET[t]!=null)
    {
       $user=zap("u.name,u.name","list_user u","u.id =".$_GET[t] ); $user=$user[0];
       $u_id=$_GET[t];
     echo '<input type="hidden" name="t" value="'.$_GET[t].'" />';
    }
else if($_GET[g]!=null)
    {
       $user=zap("u.name,u.name","list_user u","u.id =".$_GET[g] ); $user=$user[0];
       $u_id=$_GET[g];
     echo '<input type="hidden" name="gracz" value="'.$u_id.'" />';
    }
else
    {
      $user= $_SESSION['zalogowany'];
      $u_id= $_SESSION['id'];
    }

$obr = zap("v.x, v.y, u.name","ws_all v, list_user u","v.player = u.id AND v.id =".$_GET[id] );

$nagluwek = 'Agresor: <b>'.urldecode($user).'</b> Obroñca: <b>'.urldecode($obr[2]).'</b> ('.$obr[0].'|'.$obr[1].')';

echo '<input type="hidden" name="xy" value="'.$_GET[id].'" />';
echo '<input type="hidden" name="id" value="'.$_GET[id].'" />'; // village ??

 ?>
<table class="main" align="center">
<tr><td><? echo $nagluwek; ?></td></tr>
<tr>
<td valign="top" align="center"> 
 <table class="main">
  <tr>
   <th><label for="def">Def </label> <a href="javascript:ukryj('inne');" class="red">*</a></th>
   <th><label for="off">Off</label> <a href="javascript:ukryj('inne');" class="red">*</a></th>
   <th><label for="foff">full Off</label> <a href="javascript:ukryj('inne');" class="red">*</a></th>
   <th><label for="zw">Zwiad</label> <a href="javascript:ukryj('inne');" class="red">*</a></th>
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
<table id="inne" style="display :none;">
  <tbody>
   <tr><th colspan="3">minimalna ilosc wojska</th></tr>
   <tr><th>def</th><th>off</th><th>zw</th></tr>
   <tr>
    <td><img class="spear"><input type="text" name="spear" value="50" size="3"  /></td>
    <td><img class="axe"><input type="text" name="axe" value="50" size="3" /></td>
    <td><img class="spy"><input type="text" name="spy" value="100" size="3" /></td>
   </tr><tr>
    <td><img class="sword"><input type="text" name="sword" value="50" size="3" /></td>
    <td><img class="light"><input type="text" name="light" value="50" size="3" /></td>
    <td><input name="ram" type="hidden">
        <input name="catapult" type="hidden">
        <input name="knight" type="hidden">
        <input name="snob" type="hidden">
    </td>
   </tr><tr>
    <td><img class="archer"><input type="text" name="archer" value="50" size="3" /></td>
    <td><img class="marcher"><input type="text" name="marcher" value="50" size="3" /></td>
   </tr><tr>
    <td colspan="2" align="center"><img class="heavy"><input type="text" name="heavy" value="50" size="3" /></td>
    <td><BUTTON onclick="zapisz_cook();">Zapisz</BUTTON></td>
   </tr>
   <tr><td colspan="3" >aktywacja limit odleglosci <input name="mxo" id="mxo" type="checkbox" title="zostaw zaznaczony by nie przeciazac serwera" checked="tak" value="1"></td></tr>

  </tbody>
 </table>
   </td>
  </tr>
 </table>
</td>
</tr>
<tr><td valign="top" align="center">
Czas:
<input name="czas1" value="" size="19" type="text" onclick="show_calendar('document.form.czas1',document.form.czas1.value,false);">
<a href="javascript:show_calendar('document.form.czas1',document.form.czas1.value,true);"><img src="../img/cal.gif" border="0" height="16" width="16" alt="Clicknij Tu by ustaliæ Datê"></a>
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
<div style="position: absolute;left:-100;">

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

?></div></div>

<script language="JavaScript">
<!--
function url_dla_img()
{var img = document.getElementsByTagName("img");
	for (var i = 0; i < 8; i++) {	img[i].src = 'http://pl5.plemiona.pl/graphic/unit/unit_'+img[i].className+'.png';  }
}url_dla_img();
checkCookie('place');
//-->
</script>
</body></html>
