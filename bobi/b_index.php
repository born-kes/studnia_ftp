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
<br> Po wybiciu monet mi np. w wioskach def zostaje du�o Drewna i �elaza.
<br> wprowadzam do <b>notatnika bobi</b> surowce
<br> i przesy�am je do wiosek typ off.
<br> Nonatnik Bobi - Wy�wietla dwie listy 
<br> - Wioski kt�re wysy�aj� surowce - wy�wietla je jako select/optionds.
<br> - Wioski kt�re odbieraj� surowce - Wy�wietla list�, a surowce przy nich
<br> to w rzeczywisto�ci ilo�� wolnego miejsca w spichlerzu.
<br>
<br> Wys�anie "paczki" modyfikuje notatki, 
<br> odejmuje surowce z wiosek kt�re wys�a�y "paczk�"
<br> dodaje surowce do wiosek kt�re odebra�y "paczk�" - Wy�wietla si� mniej wolnego miejsca w spichlerzu
<BR>
<br><a href="b_do_txt_db.php" target="prawy">Dodaj surowce</a>
<br><a href="javascript:popup_scroll('b_play_0.php',400,640)">Uruchom Bobiego</a>
</body></html>
