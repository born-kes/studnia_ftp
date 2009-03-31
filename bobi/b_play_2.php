<?php
session_start();
if(!isSet($_SESSION['zalogowany'])){
  $_SESSION['komunikat'] = "Nie jeste&#65533; zalogowany!";
  include('zero.php');
  exit();}

$user=$_SESSION['zalogowany'];
include("../connection.php");
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
$zap2="<BR>Update bobi SET drew='$drew', glin='$glin', zelazo='$zela' WHERE id='$_POST[paczka_z]';
";}
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
$zap2.="<BR>Update bobi SET drew='$drew', glin='$glin', zelazo='$zela' WHERE id='$_POST[adresat]';
";}
//mysql_query($zap2);
echo $zap2;

echo"<BR>".$_POST[odw];
echo"<BR>".$_POST[dow];
echo"<BR>".$_POST[bufor];
echo"<BR>".$_POST[paczka_z];
echo"<BR>".$_POST[drew];
echo"<BR>".$_POST[glina];
echo"<BR>".$_POST[zelao];
echo"<BR>".$_POST[adresat];
?>