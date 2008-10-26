<?php
// wygenerujemy dane wyj≈&#65533;ciowe jako plik XML
header('Content-Type: text/xml');
// generacja nag≈&#65533;√≥wka XML
echo '<?xml version="1.0" encoding="utf-8" standalone="yes"?>';
// utworzenie elementu <response>
echo '<response>';
 
// pobranie imienia u≈ºytkownika
$name = $_GET['name'];
// generacja danych wyj≈&#65533;ciowych w zale≈ºno≈&#65533;ci od podanego imienia
$userNames = array('CRISTIAN', 'BOGDAN', 'FILIP', 'RENATA', 'YODA');
if (in_array(strtoupper($name), $userNames))
  echo 'Witaj mistrzu ' . htmlentities($name) . '!';
else if (trim($name) == '')
  echo 'Nieznajomy, podaj swoje imie!';
else
  echo htmlentities($name) . ', Nie znam Cie!';
// zamkniƒ&#65533;cie elementu <response>
echo '</response>';
?>

