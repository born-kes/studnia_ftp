<?php
// wygenerujemy dane wyj�&#65533;ciowe jako plik XML
header('Content-Type: text/xml');
// generacja nag�&#65533;ówka XML
echo '<?xml version="1.0" encoding="utf-8" standalone="yes"?>';
// utworzenie elementu <response>
echo '<response>';
 
// pobranie imienia użytkownika
$name = $_GET['name'];
// generacja danych wyj�&#65533;ciowych w zależno�&#65533;ci od podanego imienia
$userNames = array('HELLO DARWIN');
if (in_array(strtoupper($name), $userNames))
  echo 'pik_map/logo.php">haslo przyjete!  Zapraszam';

else if (trim($name) == '')
  echo ' ? ';
else
  echo ' ?? ';
// zamkni�&#65533;cie elementu <response>
echo '</response>';
?>

