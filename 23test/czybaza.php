<?php
// nawiazujemy polaczenie
$connection = @mysql_connect('85.17.1.175', 'bornkesws', 'MKO208')
// w przypadku niepowodznie wy�wietlamy komunikat
or die('Brak po��czenia z serwerem MySQL.<br />B��d: '.mysql_error());
// po��czenie nawi�zane ;-)
echo "Uda�o si� po��czy� z serwerem!<br />";
// nawi�zujemy po��czenie z baz� danych
$db = @mysql_select_db('bornkesws', $connection)
// w przypadku niepowodzenia wy�wietlamy komunikat
or die('Nie mog� po��czy� si� z baz� danych<br />Blad: '.mysql_error());
// po��czenie nawi�zane ;-)
echo "Uda�o si� po��czy� z baz� dancych!";
// zamykamy po��czenie
mysql_close($connection);

?>
