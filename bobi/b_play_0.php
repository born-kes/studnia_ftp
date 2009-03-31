<?php
session_start();
if(!isSet($_SESSION['zalogowany'])){
  $_SESSION['komunikat'] = "Nie jeste&#65533; zalogowany!";
  include('zero.php');
  exit();
}
$rodzaje = array ('brak typu','wioska off','wioska def','wioska ck','wioska palac','wioska zwiadowcza','');
for($i=0; count($rodzaje)>$i; $i++){
$while.='  <option value="'.$i.'">'.$rodzaje[$i].'</option>';}
?>

<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
  <meta name="Description" content="[ Opis dokumentu ]" />
  <meta name="Author" content="[ Autor dokumentu ]" />
  <meta name="Generator" content="EdHTML" />
<link rel="stylesheet" type="text/css" href="../stamm1201718544.css">
<script src="../mootools.js" type="text/javascript"></script>
<script src="../script.js" type="text/javascript"></script>
  <title>[ prawy buli ]</title>
  <title>[ prawy buli2 ]</title>
</head>
<body><form action="b_play_1.php" method="POST" >
<table>
<tr>
<td>Nadawca</td>
<td><SELECT name="odw">
<?PHP  
echo $while; 
?>
 </select></td></tr>
 <tr>
<td>Adresat</td>
<td><SELECT name="dow">
<?PHP
echo $while; 
?>
 </select></td></tr>
 <tr><td>Wielkosc Bufora<br>(zapas w spichlerzu)</td><td><input type="text" name="bufor" size="10"></td></tr>
 <tr><td><input value="Dalej" type="submit"></td></tr>
 </table></form></body></html>