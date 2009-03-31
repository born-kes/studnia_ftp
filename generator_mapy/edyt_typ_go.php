<html><head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
  <meta name="Description" content="[ Opis dokumentu ]" />
  <meta name="Author" content="[ Autor dokumentu ]" />
  <meta name="Generator" content="EdHTML" />
  <title>[ edytor opisu ]</title>
</head><body>
<?php
if($_GET[id] != 0&&$_GET[id]!=null){
/* Łšczenie i wybranie bazy */
$link = mysql_connect("85.17.1.175", "bornkesws", "MKO208")or die(mysql_error());
mysql_select_db ("bornkesws")or die(mysql_error());
$rodzaje = array ('brak typu','wioska off','wioska def','wioska ck','wioska palac','wioska zwiadowcza');
$wynik = @mysql_query("SELECT v.name, t.name,v.typ
FROM village v, tribe t
WHERE v.id ='$_GET[id]'
AND v.player = t.id") or die (mysql_error());

if($r = @mysql_fetch_array($wynik)){
echo'Wioska:<b>'.$r[0].'</b><br>Gracz:<b>'.$r[1].'</b><br>';
echo'<form name="zmiana opisu" action="edyt_typ_end.php" METHOD="post">';
echo'<INPUT size="25" TYPE="hidden" NAME="id" value="'.$_GET[id].'">';
echo'Typ/Grupa:<select NAME="typ" id="typ">';
    for($licz=0; $licz<count($rodzaje); $licz++){
echo'<option value="'.$licz.'"';
if($licz==$r[2]){echo' selected="selected" ';}
echo '>'.$rodzaje[$licz].'</option>';
@next($rodzaje);}
echo'</select><INPUT type="submit" value=" Zapisz"></form>';
$end=@mysql_close($link);  }}else{echo"Wioska --- zgłos bład do abministratora";}
?>
</body></html>