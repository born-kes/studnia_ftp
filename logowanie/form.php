<?PHP
if($_POST!= NULL){
include_once(dirname(dirname(__FILE__)) . '/serwer.php');
include_once('f-cje.php');


/* rozpoczêcie sesji i procedur logowania*/
echo $_POST[haslo].$_POST[user].'<br>';
session_start();
if(isSet($_SESSION['zalogowany'])){
    header("Location: http://www.bornkes.w.szu.pl/www/");}

elseif(!isSet($_POST["haslo"]) || !isSet($_POST["user"]))
  {
  $_SESSION['komunikat'] = "Wprowadz nazwê i has³o u¿ytkownika:";
header("Location:form.php");
}
else{
  $val = checkPass($_POST["user"], $_POST["haslo"]);
  if($val == 0){
    $_SESSION['zalogowany'] = $_POST["user"];
    $_SESSION['prawa'] = prawa($_POST["user"]);
    $_SESSION['id'] = user_id($_POST["user"]);
  header("Location: http://www.bornkes.w.szu.pl/");
  }
  else if($val == 1){
    $_SESSION['komunikat'] = "B³¹d serwera. Zalogowanie nie by³o mo¿liwe.";
header("Location:form.php");
  }
  else if($val == 2){
    $_SESSION['komunikat'] = "Nieprawid³owa nazwa lub has³o u¿ytkownika.";
header("Location:form.php");
  }
  else{
    $_SESSION['komunikat'] = "B³¹d serwera. Zalogowanie nie by³o mo¿liwe.";
header("Location:form.php");
  }
}
 //  exit();    
} //if $_POST
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<title>Logowanie</title>
</head>
<body>
<h2 align="center">
<?php session_start();
if(isSet($_SESSION['komunikat'])) 
  echo $_SESSION['komunikat'];
else
  echo "Wprowadz nazwê i has³o u¿ytkownika:";
?>
</h2>
<form name = "formularz1"
      action = ""
      method = "POST"
>
<table border="0" align="center"><tr>
<td>U¿ytkownik:</td>
<td>
  <input type="text" name="user">
</td>
</tr><tr>
<td>Has³o:</td>
<td>
  <input type="password" name="haslo">
</td>
</tr><tr>
<td colspan="2" align="center">
  <input type="submit" value="Wejdz">
</td><td><a href="new_user.php">rejestracja</a></td>
</tr></table>
</form>
<table><tr><td>
<a href="http://www.szu.pl" target="_blank">
<img src="http://szu.pl/grafika/szu114x50.gif" border="0" alt="bazy danych MySQL, konta pocztowe, konta WWW, parkowanie domen"></a> 
</td>
<table>
</body>
</html>

