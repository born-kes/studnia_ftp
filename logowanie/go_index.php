<?PHP
function checkPass($user, $pass)
{
/*sprawdzenie d³ugo&#65533;ci przekazanych ci¹gów*/

  $userNameLength = strlen($user);
  $userPassLength = strlen($pass);

  if($userNameLength < 3 || $userNameLength > 20 ||
     $userPassLength < 6 || $userPassLength > 40){
    return 2;
  }

/*nawi¹zanie po³¹czenia serwerem i wybór bazy*/

  if (!$db_lnk = @mysql_connect("85.17.1.175", "bornkesws", "MKO208")){
    //echo('Wyst¹pi³ b³¹d podczas próby po³¹czenia z serwerem MySQL...');
    return 1;
  }

  if(!@mysql_select_db("bornkesws")){
    //echo('Wyst¹pi³ b³¹d podczas wyboru bazy danych: test...');
    @mysql_close();
    return 1;
  }

/*wykonanie zapytania sprawdzaj¹cego poprawno&#65533;æ danych*/

  $query = "SELECT COUNT(*), prawa FROM Users WHERE Nazwa='$user' ";
  $query .= "AND Haslo='$pass' GROUP BY `prawa`";

  if(!$result = mysql_query($query, $db_lnk)){
    //echo('Wyst¹pi³ b³¹d: nieprawid³owe zapytanie...');
    @mysql_close();
    return 1;
  }
/*sprawdzenie wyników zapytania*/

  if(!$row = @mysql_fetch_row($result)){
    //echo('Wyst¹pi³ b³¹d: nieprawid³owe wyniki zapytania...');
    @mysql_close();
    return 1;
  }
  else{
    if($row[0] <> 1){
      @mysql_close();
      return 2;
    }
    elseif($row[1] != 1){
      @mysql_close();
      return 3;
    }
    else{
      @mysql_close();
      return 0;
    }
  }
}

/* rozpoczêcie sesji i procedur logowania*/

session_start();
if(isSet($_SESSION['zalogowany'])){
  header("Location: main.php");
}
else if(!isSet($_POST["haslo"]) || !isSet($_POST["user"])){
  $_SESSION['komunikat'] = "Wprowad&#65533; nazwê i has³o u¿ytkownika:";
  include('form.php');
}
else{
  $val = checkPass($_POST["user"], $_POST["haslo"]);
  if($val == 0){
    $_SESSION['zalogowany'] = $_POST["user"];
    header("Location: main.php");
  }
  else if($val == 1){
    $_SESSION['komunikat'] = "B³¹d serwera. Zalogowanie nie by³o mo¿liwe.";
    include('form.php');
  }
  else if($val == 2){
    $_SESSION['komunikat'] = "Nieprawid³owa nazwa lub has³o u¿ytkownika.";
    include('form.php');
  }
  else if($val == 3){
    $_SESSION['komunikat'] = "Nie masz uprawnien.";
    include('zero.php');  }
  else{
    $_SESSION['komunikat'] = "B³¹d serwera. Zalogowanie nie by³o mo¿liwe.";
    include('form.php');
  }
}
?>