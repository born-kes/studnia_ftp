<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>KEStools.raportów - Plemiona</title>

<link rel="stylesheet" type="text/css" href="generator_mapy/img/stamm1201718544.css">
</head>
<body>
<table><tr><td>
<a href="http://www.szu.pl" target="_blank">
<img src="http://szu.pl/grafika/szu114x50.gif" border="0" alt="bazy danych MySQL, konta pocztowe, konta WWW, parkowanie domen"></a> 
</td><td>
<table>

<?PHP
require "connection.php";
echo"<tr><td><li><b>Wlasciciele Wiosek</b></td><td> ";
connection();$wynik=mysql_query("SELECT `data` FROM `uakt` WHERE `id`=1");$f = mysql_fetch_row($wynik);echo($f[0]);destructor();
echo"</td></tr><tr><td><li><b>Dane o Graczach</b></td><td> ";
connection();$wynik=mysql_query("SELECT `data` FROM `uakt` WHERE `id`=2");$f = mysql_fetch_row($wynik);echo($f[0]);destructor();
echo"</td></tr><tr><td><li><b>Dane o Plemionach</b></td><td> ";
connection();$wynik=mysql_query("SELECT `data` FROM `uakt` WHERE `id`=3");$f = mysql_fetch_row($wynik);echo($f[0]);destructor();
?>
</td></tr></table>
</body></html>