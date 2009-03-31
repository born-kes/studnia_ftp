<?php
session_start();
if(!isSet($_SESSION['rez'])){
  $komunikat = "Nie jeste&#65533; zalogowany!";
}
else{
  unset($_SESSION['rez']);
  $komunikat = "Wylogowanie prawid�owe!";
}
session_destroy();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<title>Wylogowanie</title>
</head>
<body>
<?php echo $komunikat ?>
<br><br>
<a href="index.php">Powr�t do strony logowania</a>
</body>
</html>
