<?PHP /* ########### Destruktor sesji ######## */ ?>
<script language="JavaScript" type="text/javascript">
	setTimeout ("changePage()", 200);

	function changePage() {
		if (self.parent.frames.length != 0)
			self.parent.location=document.location;
		}
</script>
<?php
session_start();
if(!isSet($_SESSION['zalogowany'])){
  $komunikat = "Nie jestes zalogowany!";
}
else{
  unset($_SESSION['zalogowany']);
  unset($_SESSION['id']);
  unset($_SESSION);
  $komunikat = "Wylogowanie prawidlowe!";
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
<br><br>Dziękujemy za Wizytę :)<br><br><br>
<a href="../index.php">Powrót do strony logowania</a>
</body>
</html>
