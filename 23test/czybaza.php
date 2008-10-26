<?php
// nawiazujemy polaczenie
$connection = @mysql_connect('85.17.1.175', 'bornkesws', 'MKO208')
// w przypadku niepowodznie wyœwietlamy komunikat
or die('Brak po³¹czenia z serwerem MySQL.<br />B³¹d: '.mysql_error());
// po³¹czenie nawi¹zane ;-)
echo "Uda³o siê po³¹czyæ z serwerem!<br />";
// nawi¹zujemy po³¹czenie z baz¹ danych
$db = @mysql_select_db('bornkesws', $connection)
// w przypadku niepowodzenia wyœwietlamy komunikat
or die('Nie mogê po³¹czyæ siê z baz¹ danych<br />Blad: '.mysql_error());
// po³¹czenie nawi¹zane ;-)
echo "Uda³o siê po³¹czyæ z baz¹ dancych!";
// zamykamy po³¹czenie
mysql_close($connection);

?>
