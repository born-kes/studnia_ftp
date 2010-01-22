<?PHP   include('../connection.php'); if($_GET==NULL && $_POST==NULL){echo 'Brak Danych do obliczen';exit();} 
?><html><head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<script src="../js/ts_picker.js" type="text/javascript"></script>
<script language="JavaScript">
<!--
function pomoc(){
var st = "Radar szuka powi±zañ miêdzy dwoma wioskami.\n T± w której jeste¶, a twoimi i tworzy listê\n wed³ug czasu doj¶cia do niej.";
alert("POMOC: \n"+st +"\n\n Dopuszczalne formy podanego czasu to: \n\n (nic)\n => 4godz. \n\n (same godziny)\n np. 8 => 8godz.\n\n (do wybranej godziny)\n np. 8:20 => dzis/jutro 8:20\n\n (cala data)\n\t26.11.2009 8:00:00");
}
//-->
</script><style type="text/css">
<!--
BODY {background: #F7EED3;}
a:link	{ font-weight:bold; color: #804000; text-decoration:none; }
a:visited	{  font-weight:bold; color: #804000; text-decoration:none; }
a:active	{  font-weight:bold; color: #0082BE; text-decoration:none; }
a:hover { font-weight:bold; color: #0082BE; text-decoration:none; }

table.main { background-color:#F1EBDD; border:1px solid #804000;}
table.ba { border-bottom:0px;}
table.main td{font-size:11px; background-color:#DFCCA6; }
table.main th{font-size:11px; background-color:#DFCCA6; }
table.main tr.row th{font-size:11px;}
table.main tr.row td { background-color:#006600; background-image:none; color:#F1EBDD;}    //DED3B9
table.main tr.row td.hidden { color:#333366; }
tr.center td { text-align:center; }
-->
</style></head>
<body><?php echo '<form name="form" action="radar.php" method="POST">';
       $id= $_GET[id];$vi=$_GET[village];
     $zap = "SELECT x,y FROM `ws_all` Where id='$id'";//wioska

     $zap1 = "SELECT id FROM `list_user` Where name='".$_SESSION[zalogowany]."'";//gracz którym jeste¶

connection();$wynik = @mysql_query($zap);if($r = mysql_fetch_array($wynik)){echo '<input type="hidden" name="xy" value="'.$r[x].'|'.$r[y].'" />';}destructor();
connection();$wynik1 = @mysql_query($zap1);if($r = mysql_fetch_array($wynik1)){echo '<input type="hidden" name="gracz" value="'.$r[id].'" />';}destructor();
echo '<input type="hidden" name="id" value="'.$id.'" />';

 ?>
<table class="main" align="center">
<tr><td align="right"><i><a href="javascript:pomoc();"> POMOC </a></i></td></tr>
<tr>
<td valign="top" align="center">
 <table class="main">
  <tr>
   <th><label for="def">Def </label></th>
   <th><label for="off">Off</label></th>
   <th><label for="zw">Zwiad</label></th>
   <th><label for="sz">Szlachta</label></th>
  </tr>
  <tr>
   <td><input type="radio" name="co" value="def" checked="tak" id="def" /></td>
   <td><input type="radio" name="co" value="off" id="off" /></td>
   <td><input type="radio" name="co" value="zw" id="zw" /></td>
   <td><input type="radio" name="co" value="sz" id="sz" /></td>
  </tr>
 </table>
</td>
</tr>
<tr><td valign="top" align="center">
Czas:
<input name="czas1" value="" size="19" type="text"><a href="javascript:show_calendar('document.form.czas1', document.form.czas1.value);">
<img src="../img/cal.gif" border="0" height="16" width="16" alt="Clicknij Tu by ustaliæ Datê"></a>
</td>
</tr>
<tr><td valign="top"><b>Wojska maja dotra na podana godzine?</b><br />
<input name="on" value="0" type="radio" checked="tak">Nie, pokaz tez te które dojda wczesniej <br />
<input name="on" value="1" type="radio">Tak, odzuc te które beda za wczesnie<br />
</td></tr><tr><td valign="top" align="center">
<input type="submit" value="POLICZ" /></td></tr></table>
</form></body></html>
