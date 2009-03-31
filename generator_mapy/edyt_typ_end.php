<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
  <meta name="Description" content="[ Opis dokumentu ]" />
  <meta name="Author" content="[ Autor dokumentu ]" />
  <meta name="Generator" content="EdHTML" />
  <title>[ edytor opisu ]</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="img/stamm1201718544.css">
<script src="img/mootools.js" type="text/javascript"></script>
<script src="img/script.js" type="text/javascript"></script>

<?php
$rodzaje = array ('brak typu','wioska off','wioska def','wioska ck','wioska palac','wioska zwiadowcza');


if($_POST[id] !=0 && $_POST[id]!=null){
/* Łączenie i wybranie bazy */
$link = @mysql_connect("85.17.1.175", "bornkesws", "MKO208")or die(mysql_error());
mysql_select_db ("bornkesws")or die(mysql_error());
if($_POST[typ]==0){$typ="NULL";}else{$typ ="'".$_POST[typ]."'";}


$edytowany = @mysql_query("UPDATE village
SET typ='$_POST[typ]'
WHERE id='$_POST[id]'") or die (mysql_error());
$end=@mysql_close($link);
echo"Typ Zmieniony<BR> nowy typ to:".$rodzaje[$_POST[typ]];}else{echo"Wystapil blad, zglosc abministratora<BR> Typu nie zmieniono<BR>";}
?>
</BODY></HTML>