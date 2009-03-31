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

if($_GET[id] != 0&&$_GET[id]!=null){
/* Łšczenie i wybranie bazy */
$link = mysql_connect("85.17.1.175", "bornkesws", "MKO208")or die(mysql_error());
mysql_select_db ("bornkesws")or die(mysql_error());

$wynik = mysql_query("SELECT v.name AS W_name, t.name AS G_name,v.x,v.y
FROM village v, tribe t
WHERE v.id ='$_GET[id]'
AND v.player = t.id") or die (mysql_error());
 
 if($r = @mysql_fetch_array($wynik)){
echo'Wioska:<b>'.$r[W_name].'</b> ('.$r[x].'|'.$r[y].')</b><br>Gracz:<b>'.$r[G_name].'</b><br><br>';
echo'<a href="javascript:popup_scroll(\'edyt_typ_go.php?id='.$_GET[id].'\',300,150)">ZNIEN TYP/GRUPE</a><br>';
echo'<a href="javascript:popup_scroll(\'edyt_opis_go.php?id='.$_GET[id].'\',300,150)">ZNIEN OPIS</a><br>';
echo'<a href="javascript:displayWindow(\'edyt_wsi_go.php?id='.$_GET[id].'\',550,340)">Edytor Raportów</a><br>';

}else{echo'<br>blad, wioska nie istnieje';}
$end=@mysql_close($link);}else{echo"Wioska --- zgłos bład do administratora";}

?>
</body>
</html>
