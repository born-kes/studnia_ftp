<?PHP
if($_POST!= NULL){
require_once"../www/connection.php";

function checkPass($user, $pass)
{ $userNameLength = strlen($user);
  $userPassLength = strlen($pass);

  if($userNameLength < 3 || $userNameLength > 20 ||
     $userPassLength < 6 || $userPassLength > 40)
     {echo "liczy";
    return 2;
     }

  $query = "
SELECT COUNT(*) FROM rez
WHERE Nazwa='$user'
AND Haslo='$pass'";

connection();
$result = mysql_query($query);
$row = @mysql_fetch_row($result);

    if($row[0]!=0)
     {
      @mysql_close();
      return 0;
     }else{@mysql_close();return 2;}
}

/* rozpoczêcie sesji i procedur logowania*/

session_start();
if(isSet($_SESSION['rez']))
 {
   header("Location: main.php");
 }
elseif(!isSet($_POST["haslo"]) || !isSet($_POST["user"]))
{
  $_SESSION['komunikat'] = "Wprowadz nazwê i has³o u¿ytkownika:";
  include_once('form.php');
}else{
  $val = checkPass($_POST[user], $_POST[haslo]);

  if($val == 0){
    $_SESSION['rez'] = $_POST[user];
    header("Location: main.php");
  }
  else if($val == 2){
    $_SESSION['komunikat'] = "Nieprawid³owa nazwa lub has³o u¿ytkownika.";
   include_once('form.php');
  }
  else{
    $_SESSION['komunikat'] = "B³¹d serwera. Zalogowanie nie by³o mo¿liwe.";
    include_once('form.php');
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
<?php
if(isSet($_SESSION['komunikat']))
  echo $_SESSION['komunikat'];
else
  echo "Wprowad&#65533; nazwê i has³o u¿ytkownika:";
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
</td><td>
<table>
</body>
</html>
