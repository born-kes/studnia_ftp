<?php

define("OK", 0);
define("SERVER_ERROR", 1);
define("BAD_USER_NAME_LENGTH", 2);
define("BAD_USER_PASS_LENGTH", 3);
define("USER_NAME_ALREADY_EXISTS", 4);
define("PUSTA", 6);

function rejestruj($nazwa, $haslo)
{
  //sprawdzenie poprawno&#65533;ci danych

  $userNameLength = strlen($nazwa);
  $userPassLength = strlen($haslo);

  if($userNameLength < 3 || $userNameLength > 20)
    return BAD_USER_NAME_LENGTH;

  if($userPassLength < 6 || $userPassLength > 40)
    return BAD_USER_PASS_LENGTH;

  //po³¹czenie z baz¹ danych

  if (!$db_lnk = mysql_connect("85.17.1.175", "bornkesws", "MKO208")){
    //echo('Wyst¹pi³ b³¹d podczas próby po³¹czenia z serwerem MySQL...');
    return SERVER_ERROR;
  }

  if(!mysql_select_db("bornkesws")){
    //echo('Wyst¹pi³ b³¹d podczas wyboru bazy danych: test...');
    @mysql_close();
    return SERVER_ERROR;
  }

  //sprawdzenie, czy u¿ytkownik o podanej nazwie istnieje w bazie

  $query = "SELECT COUNT(*) FROM rez WHERE Nazwa='$nazwa' ";

  if(!$result = mysql_query($query, $db_lnk)){
    //echo('Wyst¹pi³ b³¹d: Instrukcja SELECT...');
    @mysql_close();
    return SERVER_ERROR;
  }

  if(!$row = mysql_fetch_row($result)){
    //echo('Wyst¹pi³ b³¹d: nieprawid³owe wyniki zapytania...');
    @mysql_close();
    return SERVER_ERROR;
  }
  else{
    if($row[0] > 0){
      @mysql_close();
      return USER_NAME_ALREADY_EXISTS;
    }
  }



      if($quer = mysql_query("SELECT t.id
                  FROM tribe t
                  WHERE t.name ='$nazwa'
AND t.ally='50811'", $db_lnk))
      {
                   if(!$wynik = mysql_fetch_row($quer)){
                 return PUSTA;     }
        }

  //dodanie nowego u¿ytkownika

  $query = "INSERT INTO rez VALUES(";
  $query .= "'', '$nazwa', '$haslo', '0')";

  if(!$result = mysql_query($query, $db_lnk)){
    //echo('Wyst¹pi³ b³¹d: instrukcja INSERT...');
    @mysql_close();
    return SERVER_ERROR;
  }

  $count = @mysql_affected_rows();

  if($count <> 1){
    @mysql_close();
    return SERVER_ERROR;
  }
  else{
    @mysql_close();
    return OK;
  }
}

session_start();
if(isSet($_SESSION['rez'])){
  header("Location: main.php");
}
else if(!isSet($_POST["nazwa"]) || !isSet($_POST["haslo"]) ){
  include "new_user.html";
}
else{

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<title>Rejestracja</title>
</head>
<body>
<h2 align="center">

<?php

  $nazwa = $_POST["nazwa"];
  $haslo = $_POST["haslo"];

  $val = rejestruj($nazwa, $haslo);

  if($val == OK){
    echo("Rejestracja poprawna. Mo¿esz siê <a href='index.php'>zalogowaæ</a>.");
  }
  else if($val == BAD_USER_NAME_LENGTH){
    echo("Nazwa u¿ytkownika musi mieæ od 3 do 20 znaków.");
  }
  else if($val == BAD_USER_PASS_LENGTH){
    echo("Has³o musi mieæ od 6 do 40 znaków.");
  }
  else if($val == USER_NAME_ALREADY_EXISTS){
    echo("U¿ytkownik $_POST[nazwa] jest ju¿ zarejestrowany.");
  }
  else if($val == PUSTA){
    echo("Nazwa u¿ytkownika, nie wystêpuje w bazie graczy .");
  }
  else{
    echo("B³¹d serwera. Rejestracja nie powiod³a siê.");
  }
}
?>

</h2>
</body>
</html>
