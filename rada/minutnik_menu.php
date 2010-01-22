<?php  include('../connection.php');?>

<html><head>
<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
<link rel="stylesheet" type="text/css" href="../stamm1201718544.css">
<script src="../js/scriptt.js" type="text/javascript"></script>
<script src="../js/ts_picker.js" type="text/javascript"></script>
</head>
<body><?PHP
function jakie_id($xy){
  connection(); $wynik=@mysql_query("SELECT name,x,y FROM ws_all WHERE id='$xy'");
 if($r = @mysql_fetch_array($wynik)){$name= urldecode($r[name])." ($r[x]|$r[y]) k".$r[x][0].$r[y][0];}destructor();
 return $name;
}

if($_GET[id]!=null){
$zap ="SELECT `data` , `opis` , `id_cel` , `id_pochodzenie`
FROM `list_zadan` 
Where id = ".$_GET[id];

  connection();
 $wynik=@mysql_query($zap);
 if($r = @mysql_fetch_array($wynik))
 {
  echo '<table class="main" width="80%" align="center">
 <tr><td>Data Akcji:</td><td> '.data_z_bazy($r[data]).'</td></tr>
 <tr><td>Opis :</td><td>'.urldecode($r[opis]).'</td></tr>
 <tr><th colspan="2">Odesłanie na plac:</th></tr>
 <tr><td>Wioska agresora:</td><td><b>'.jakie_id($r[id_cel]).'</b></td></tr>
 <tr><td>Wioska obroncy:</td><td><b>'.jakie_id($r[id_pochodzenie]).'</b></td></tr>
</form>
</table>';

 }else{echo 'Niema takiego';}
destructor();
exit();
}

?>

<br />
<table class="main" width="80%" align="center">
<form name="minutnik" action="minutnik.php" method="POST" target="inframe">
 <tr><td>Data: <a href="javascript:show_calendar('document.minutnik.czas1', document.minutnik.czas1.value);"> <img src="../img/cal.gif" width="16" height="16" border="0" alt="Clicknij Tu by ustalić Datę"></a></td><td colspan="2"><input name="czas1" value="" size="22" type="text"></td></tr>
 <tr><td>Opis :</td><td colspan="2"><input type="text" name="opis" value="" size="22"></td></tr>
 <tr><th colspan="3">Odesłanie na plac:</th></tr>
 <tr><td colspan="3">Wioska agresora:<input name="a_xy" tabindex="13" value="" maxlength="7" size="7" type="text"></td></tr>
 <tr><td colspan="3">Wioska obroncy:<input name="o_xy" tabindex="13" value="" maxlength="7" size="7" type="text"></td></tr>
 <tr><td><input value="Dodaj" type="submit"></td></tr>
</form>
</table>
</body></html>