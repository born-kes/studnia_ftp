<?PHP
 include_once(dirname(dirname(__FILE__)) . '/serwer.php');

function user_id($user)
{
  $query = "SELECT `Id` FROM `Users` WHERE `Nazwa`='$user' ";
connection();  $result = mysql_query($query);
$row = @mysql_fetch_row($result);
 $ro= $row[0]; destructor();
return $ro;
}

function prawa($user)
{
  $query = "SELECT `prawa` FROM `Users` WHERE `Nazwa`='$user' ";
connection();  $result = mysql_query($query);
$row = @mysql_fetch_row($result);
 $ro= $row[0]; destructor();
return $ro;
}

function checkPass($user, $pass)
{
/*sprawdzenie d³ugo³ci przekazanych ci±gów*/

  $userNameLength = strlen($user);
  $userPassLength = strlen($pass);

  if($userNameLength < 3 || $userNameLength > 20 ||
     $userPassLength < 6 || $userPassLength > 40){
    return 2;
  }

  $query = "SELECT COUNT(*) FROM Users WHERE Nazwa='$user' AND Haslo='$pass'";

/*nawi¹zanie po³¹czenia serwerem i wybór bazy*/

connection();
  if(!$result = mysql_query($query)){  destructor(); return 1; /* B³ad polaczenia z baza*/  }
/*sprawdzenie wyników zapytania*/

  if(!$row = @mysql_fetch_row($result)){@destructor(); return 1; /*b³ad zapytania*/   }
  else{
    if($row[0] <> 1){ @destructor(); return 2;        }
    else{ @destructor(); return 0;  /* wszystko OK */ }
  }
}

if($_POST!= NULL){

/* rozpoczêcie sesji i procedur logowania*/
//echo $_POST[haslo].$_POST[user].'<br>';
session_start();
if(isSet($_SESSION['zalogowany'])){
    header("Location: http://www.bornkes.w.szu.pl/test/");}

elseif(!isSet($_POST["haslo"]) || !isSet($_POST["user"]))
  { $_SESSION['komunikat'] = "Wprowadz nazwê i has³o u¿ytkownika:";   }
  
else{  $val = checkPass($_POST["user"], $_POST["haslo"]);  /* Funkcja sprawdza login i has³o */
  if($val == 0){       $user=$_POST["user"];
    $_SESSION['zalogowany'] = $user;
    setCookie("wtyk",$user);
  header("Location: http://www.bornkes.w.szu.pl/");
  }
  else if($val == 1){
    $_SESSION['komunikat'] = "B³±d serwera. Zalogowanie nie by³o mo¿liwe.";
  }
  else if($val == 2){
    $_SESSION['komunikat'] = "Nieprawid³owa nazwa lub has³o u¿ytkownika.";
  }
  else{
    $_SESSION['komunikat'] = "B³±d serwera. Zalogowanie nie by³o mo¿liwe.";
  }
}
 //  exit();
} //if $_POST
?><html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
  <title>Logowanie</title>
</head>
<body>
<h3 align="center"><?php
  if(isSet($_COOKIE['wtyk'])){include('dobra strona');exit();}
  session_start();
  if(isSet($_SESSION['komunikat']))
    echo $_SESSION['komunikat'];
  else
    echo "Wprowadz nazwê i has³o u¿ytkownika:";
  ?></h3>
<form name = "f1" action = "" method = "POST" >
 <table border="0" align="center">
  <tr>
    <td>U¿ytkownik:</td>
    <td><input type="text" name="user"></td>
  </tr>
  <tr>
    <td>Has³o:</td>
    <td><input type="password" name="haslo"></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" value="Wejdz"></td>
    <td><a href="new_user.php">rejestracja</a></td>
  </tr>
  <tr><td align="center" colspan="2"><img src="http://img.audiovis.nac.gov.pl/SM0/SM0_18-333-7.jpg" border="0"></td></tr>
 </table>
</form>  <?PHP include_once('../baner.php'); ?>
</body>
</html>