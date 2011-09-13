<?PHP   include('../connection.php'); if($_GET==NULL && $_POST==NULL){echo 'Brak Danych do obliczen';exit();}
?><html><head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<script src="../js/ts_picker.js" type="text/javascript"></script>
<script language="JavaScript">
<!--
function pomoc(){
var st = "Tancerz Wojny to zaawansowany radar.\n Jako Cel okresla wszystkie wioski gracza\n i liczy ile twoje wojsko bêdzie sz³o\n zostawia tylko wioski z których wojsko dojdzie \n na konkretna godzine.";
alert("POMOC: \n"+st +"\n\n Dopuszczalne formy podanego czasu to: \n\n (cala data)\n\t 26.11.2009 8:00:00");
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
<body><?php

echo '<form name="form" action="tancerz_wojny.php" method="POST">';

if($_GET[t]==null)  //agresor
    { $tet=zap("u.name, u.id","ws_all v, list_user u","v.player = u.id AND v.id =".$_GET[village] ); }
else
    { $tet=zap("name, id","list_user ","id =".$_GET[t] ); }
     if($tet[0]=='0'){$tet[0]=$_SESSION['zalogowany'];sesio_id();   $tet[1]=$_SESSION['id'];}

$obr = zap("u.name, u.id","ws_all v, list_user u","v.player = u.id AND v.id =".$_GET[id] );

 
$nagluwek = 'Agresor: <b>'.urldecode($tet[0]).'</b> Obroñca: <b>'.urldecode($obr[0]).'</b>
';
 echo '
<input type="hidden" name="a_gracz" value="'.($tet[1]).'" />
<input type="hidden" name="o_gracz" value="'.($obr[1]).'" />
'; ?>
<table class="main" align="center">
<tr><td><? echo $nagluwek; ?></td></tr>
<tr><td align="right"><i><a href="javascript:pomoc();"> POMOC </a></i></td></tr>
<tr>
<td valign="top" align="center">
 <table class="main">
  <tr>
   <th><select name="wojsko" id="wojsko">
<option value=""></option>
<option value="9">Zwiad</option>
<option value="10">LK</option>
<option value="11">CK</option>
<option value="18">Top</option>
<option value="30">Tar</option>
<option value="35">Sz (gruby)</option>
</select></th>
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
<tr><td valign="top" align="center">
<input type="submit" value="POLICZ" /></td></tr>
<tr><td><img src="http://t1.gstatic.com/images?q=tbn:ANd9GcQmVQzOrI009nkeagCDl56o8FzNAEqisAKFU0Khh_97glp_OVjg" width="180" />
</td></tr></table>
</form>
</body></html>