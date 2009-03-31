<?php
session_start();
if(!isSet($_SESSION['zalogowany'])){
  $_SESSION['komunikat'] = "Nie jeste&#65533; zalogowany!";
  include('form.php');
  exit();
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<title>Strona główna</title>
</head>
<body>
Jeste&#65533; zalogowany jako: <?php echo $_SESSION['zalogowany'] ?>
<br>
Pamiętaj o wylogowaniu przed opuszczeniem strony!
<br>
<br>
<br>

<a href="logout.php" >Wylogowanie</a>
<br>
<br>
<br>
<a href="lewy.php" target="lewy">wczytaj Menu</a>
</body>
</html>
