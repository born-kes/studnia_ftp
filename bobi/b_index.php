<?php
session_start();
if(!isSet($_SESSION['zalogowany'])){
  $_SESSION['komunikat'] = "Nie jeste&#65533; zalogowany!";
  include('../zero.php');
  exit();
}
?>
<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset="ISO-8859-2" />
  <meta name="Description" content="[ Opis dokumentu ]" />
  <meta name="Author" content="[ Autor dokumentu ]" />
  <meta name="Generator" content="EdHTML" />
<link rel="stylesheet" type="text/css" href="generator_mapy/img/stamm1201718544.css">
<script src="../mootools.js" type="text/javascript"></script>
<script src="../script.js" type="text/javascript"></script>
  <title>[ lewe menu ]</title>
  <title>[ lewe menu1 ]</title>
</head>
<body>
<b>Bobi Budowniczy</b> to nowa wersja notatnika 
<br> Pierwszy krok "ogarniasz" wioski.
<br> Po wybiciu monet mi np. w wioskach def zostaje dużo Drewna i żelaza.
<br> wprowadzam do <b>notatnika bobi</b> surowce
<br> i przesyłam je do wiosek typ off.
<br> Nonatnik Bobi - Wyświetla dwie listy 
<br> - Wioski które wysyłają surowce - wyświetla je jako select/optionds.
<br> - Wioski które odbierają surowce - Wyświetla listę, a surowce przy nich
<br> to w rzeczywistości ilość wolnego miejsca w spichlerzu.
<br>
<br> Wysłanie "paczki" modyfikuje notatki, 
<br> odejmuje surowce z wiosek które wysłały "paczkę"
<br> dodaje surowce do wiosek które odebrały "paczkę" - Wyświetla się mniej wolnego miejsca w spichlerzu
<BR>
<br><a href="b_do_txt_db.php" target="prawy">Dodaj surowce</a>
<br><a href="javascript:popup_scroll('b_play_0.php',400,640)">Uruchom Bobiego</a>
</body></html>
