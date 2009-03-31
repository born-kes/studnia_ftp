<?php
session_start();
if(!isSet($_SESSION['zalogowany'])){
  $_SESSION['komunikat'] = "Nie jeste&#65533; zalogowany!";
  include('zero.php');
  exit();
}
$rodzaje = array ('brak typu','wioska off','wioska def','wioska ck','wioska palac','wioska zwiadowcza');
if($_POST[bufor]!=NULL){$bufor=$_POST[bufor];}else{$bufor=0;}

include("../connection.php");
$user=$_SESSION['zalogowany'];

if($_POST[adresat]!= NULL && $_POST[paczka_z]!= NULL){
$zap0="SELECT b. * , w.name, w.x, w.y, p.id AS id_User, w.typ
FROM bobi b, village w, tribe p
WHERE b.id = w.id
AND w.player = p.id
AND p.name = '$user' 
AND w.id = $_POST[paczka_z] ";

connection();
$odpdb=mysql_query($zap0);
if($r = mysql_fetch_array($odpdb)){
$glin=$r[glin]-$_POST[glina];
$drew=$r[drew]-$_POST[drew];
$zela=$r[zelazo]-$_POST[zelao];
$zap2="Update bobi SET drew=$drew, glin=$glin, zelazo=$zela WHERE id=$_POST[paczka_z];";
connection();
mysql_query($zap2);
}
$zap1="SELECT b. * , w.name, w.x, w.y, p.id AS id_User, w.typ
FROM bobi b, village w, tribe p
WHERE b.id = w.id
AND w.player = p.id
AND p.name = '$user' 
AND w.id = $_POST[adresat] ";

connection();
$odpdb=mysql_query($zap1);
if($r = mysql_fetch_array($odpdb)){
$glin=$r[glin]+$_POST[glina];
$drew=$r[drew]+$_POST[drew];
$zela=$r[zelazo]+$_POST[zelao];
$zap2="Update bobi SET drew=$drew, glin=$glin, zelazo=$zela WHERE id=$_POST[adresat];";
connection();
mysql_query($zap2);}

echo "<h3>Paczka wys³ana</h3>";}

?>
<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
  <meta name="Description" content="[ Opis dokumentu ]" />
  <meta name="Author" content="[ Autor dokumentu ]" />
  <meta name="Generator" content="EdHTML" />
<link rel="stylesheet" type="text/css" href="generator_mapy/img/stamm1201718544.css">
<script src="../mootools.js" type="text/javascript"></script>
<script src="../script.js" type="text/javascript"></script>
  <title>[ lewe menu ]</title>
  <title>[ lewe menu1 ]</title>
</head>
<body><form action="b_play_1.php" method="POST"><table>
<?PHP
echo'
     <input type="hidden" name="odw" value="'.$_POST[odw].'">
     <input type="hidden" name="dow" value="'.$_POST[dow].'">
     <input type="hidden" name="bufor" value="'.$_POST[bufor].'">
<tr><td> ';

if($user=$_SESSION['zalogowany']){
connection();
$zap="SELECT b. * , w.name, w.x, w.y, p.id AS id_User, w.typ
FROM bobi b, village w, tribe p
WHERE b.id = w.id
AND w.player = p.id
AND p.name = '$user' ";
if($_POST[odw]!=NULL||$_POST[odw]!==0){$zap.=" AND w.typ=".$_POST[odw];}else{$zap.=" AND w.typ is NULL";}

$wioska_od=mysql_query($zap);}
echo'<select name="paczka_z">';
while($r = mysql_fetch_array($wioska_od)){
if($r[drew]>$bufor||$r[glin]>$bufor||$r[zelazo]>$bufor){
echo'        <option value="'.$r[id].'">'.$r[name].' ('.$r[x].'|'.$r[y].') Drewna:'.$r[drew].' Gliny:'.$r[glin].' Zelaza:'.$r[zelazo].'</options>';
  //         <option>nazwa wioski(x|y) drewno| glina| zelazo</options>}
}}
?>
</select></td></tr></table>
<table><tr>
<td><input type="submit" value="wyslij paczke"> </td>
<td> <img src="http://pl5.plemiona.pl/graphic/holz.png"><input type="text" name="drew" size="10"></td>
<td><img src="http://pl5.plemiona.pl/graphic/lehm.png"><input type="text" name="glina" size="10"></td>
<td><img src="http://pl5.plemiona.pl/graphic/eisen.png"><input type="text" name="zelao" size="10"></td>
</tr></table>

<table>
<?PHP
$zap_do="SELECT b. * , w.name, w.x, w.y, p.id AS id_User, w.typ
FROM bobi b, village w, tribe p
WHERE b.id = w.id
AND w.player = p.id
AND p.name = '$user'";

if($_POST[dow]!=NULL||$_POST[dow]!==0){
$zap_do.=" AND w.typ=".$_POST[dow];
}else{
$zap_do.=" AND w.typ is NULL ";}

$wioska_do=mysql_query($zap_do);
while($r = @mysql_fetch_array($wioska_do)){
          $drew = $r[spichlerz]-$r[drew];
          $glin = $r[spichlerz]-$r[glin];
          $zelazo = $r[spichlerz]-$r[zelazo];
if($r[spichlerz]-$r[drew]-$bufor>0&&$r[spichlerz]-$r[glin]-$bufor>0&&$r[spichlerz]-$r[zelazo]-$bufor>0){
echo"<tr><td>".$r[x]."|".$r[y]." </td>\n";
echo'<td><input type="radio" value="'.$r[id].'" name="adresat">';
echo"<td>".$r[name]."</td>      \n";
echo'<td><img src="http://pl5.plemiona.pl/graphic/holz.png">'.$drew."</td>\n";
echo'<td><img src="http://pl5.plemiona.pl/graphic/lehm.png">'.$glin."</td>\n";
echo'<td><img src="http://pl5.plemiona.pl/graphic/eisen.png">'.$zelazo."</td>\n";
echo'<td><img src="http://pl5.plemiona.pl/graphic/res.png">'.$r[spichlerz]."</td></tr>\n";}}
?>
</form></table></body></html>
