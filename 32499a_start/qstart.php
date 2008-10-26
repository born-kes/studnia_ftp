<?php
// wygenerujemy dane wyjÅ&#65533;ciowe jako plik XML
header('Content-Type: text/xml');
// generacja nagÅ&#65533;Ã³wka XML
echo '<?xml version="1.0" encoding="utf-8" standalone="yes"?>';
// utworzenie elementu <response>
echo '<response>';
 
// pobranie imienia uÅ¼ytkownika
$name = $_GET['name'];
// generacja danych wyjÅ&#65533;ciowych w zaleÅ¼noÅ&#65533;ci od podanego imienia
$userNames = array('HELLO DARWIN');
if (in_array(strtoupper($name), $userNames))
  echo 'pik_map/logo.php">haslo przyjete!  Zapraszam';

else if (trim($name) == '')
  echo ' ? ';
else
  echo ' ?? ';
// zamkniÄ&#65533;cie elementu <response>
echo '</response>';
?>

