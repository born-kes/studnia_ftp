<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
  <meta name="Description" content="[ Opis dokumentu ]" />
  <meta name="Author" content="[ Autor dokumentu ]" />
  <meta name="Generator" content="EdHTML" />
  <title>[ edytor opisu ]</title>
</head>
<body><form action="edyt_opis_end.php" METHOD="POST">
<?php

if($_GET[id] != 0&&$_GET[id]!=null){
/* Łšczenie i wybranie bazy */
$link = @mysql_connect("85.17.1.175", "bornkesws", "MKO208")or die(mysql_error());
mysql_select_db ("bornkesws")or die(mysql_error());

$wynik = @mysql_query("SELECT v.name, t.name,v.opis
FROM village v, tribe t
WHERE v.id ='$_GET[id]'
AND v.player = t.id") or die (mysql_error());
  if($r = @mysql_fetch_array($wynik)){
echo'Wioska:<b>'.$r[0].'</b><br>Gracz:<b>'.$r[1].'</b><br>';
$end=@mysql_close($link);
}}else{echo"Wioska --- zgłos bład do abministratora";}

echo'<INPUT size="15" TYPE="hidden" id="id" name="id" value="'.$_GET[id].'">';
echo'Wpisz opis:  <INPUT size="25" TYPE="text" name="txt" id="txt" value="'.$r[2].'";>';
?>   <INPUT type="submit" value=" Zapisz">
  </form>
</body>
</html>
