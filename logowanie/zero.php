<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<title>Logowanie</title>
</head>
<body>
<h2 align="center">
<?php
if(isSet($_SESSION['komunikat']))
  echo $_SESSION['komunikat'];
else
  echo "Wprowad&#65533; nazw� i has�o u�ytkownika:";
?>
</h2>
</body>
</html>
