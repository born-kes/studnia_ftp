<?PHP
function Done($user)
{
$str= '<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<title>Logowanie</title>
</head>
<body>Logowanie Zako�czone Sukcesem
<h3 align="center">Witam <i>'.$user.'</i></h3>
Od�wie�y� stron� by kontynuowa� .
</body>
</html>';
return $str;
}
session_start();
if(isSet($_SESSION['zalogowany'])){
//  header("Location: test/");
echo Done($_SESSION['zalogowany']);exit();
}
$_SESSION['logowany']=0;
function Czarna_lista()
{
if($_SERVER['HTTP_X_FORWARDED_FOR'])
{
$ip_usera = $_SERVER['HTTP_X_FORWARDED_FOR'];
}else {
  $ip_usera = $_SERVER['REMOTE_ADDR'];
}
  $query = "SELECT `ip` FROM `Czarna_lista` WHERE `ip`='$ip_usera' ";
connection();
  if(!$result = mysql_query($query )){destructor();return 2;}
       if($ro=@mysql_fetch_row($result )){destructor();return 1;}else{destructor();return 0;}
}
include_once('serwer.php');

$CL = Czarna_lista();


if($_POST!= NULL && $CL==0){

function na_czarnom_liste($user)
{
 if ($_SERVER['HTTP_X_FORWARDED_FOR'])
 {
  $ip_usera = $_SERVER['HTTP_X_FORWARDED_FOR'];
 }else {
  $ip_usera = $_SERVER['REMOTE_ADDR'];
}
 $query = "INSERT INTO Czarna_lista VALUES('','$ip_usera','$user'); ";
connection(); mysql_query($query); destructor();
}
function checkPass($user, $pass)
{
/*sprawdzenie d�ugo�ci przekazanych ci�g�w*/

  $userNameLength = strlen($user);
  $userPassLength = strlen($pass);

  if($userNameLength < 3 || $userNameLength > 20 ||
     $userPassLength < 6 || $userPassLength > 40){  return 2; }

  $query = "SELECT COUNT(*) AS rec, `prawa` FROM list_user WHERE name='$user' ";
  $query .= "AND haslo='$pass' GROUP BY `id` ORDER BY `id`";
//echo $query;
/*nawi�zanie po��czenia serwerem i wyb�r bazy*/

connection();
  if(!$result = mysql_query($query))
  {
    destructor();
    return 1;
  }
/*sprawdzenie wynik�w zapytania*/

  if(!$row = @mysql_fetch_row($result))
  {
    //echo('Wyst�pi� b��d: nieprawid�owe wyniki zapytania...');
    @destructor();    return 1;
  }
  else
  {
      if($row[0] <> 1)
      {
        @destructor();
        return 2;
      }
    elseif($row[1] == 0)
      {
        @destructor();
        return 3;
      }
    else
      {
        @destructor();
        return 0;
      }
  }
}


/* rozpocz�cie sesji i procedur logowania*/
//echo $_POST[haslo].$_POST[user].'<br>';
session_start();
if(!isSet($_SESSION['logowany'])||$_SESSION['logowany']===NULL)
  {
    $_SESSION['logowany']=0;
  }
  else
  {//echo $_SESSION['logowany'];
      if($_SESSION['logowany']>20){na_czarnom_liste($_POST["user"]); $CL=2;}
  $_SESSION['logowany']+=1;
  }
if(isSet($_SESSION['zalogowany']) && $_SESSION['zalogowany']!=NULL && !($_GET['q']!=NULL))
{echo Done($_SESSION['zalogowany']);exit();
//   header("Location: test/");
}
elseif(!isSet($_POST["haslo"]) || !isSet($_POST["user"]))
  {
  $_SESSION['komunikat'] = "Wprowadz nazw� i has�o u�ytkownika:";
  }
 else {
     $val = checkPass($_POST["user"], $_POST["haslo"]);
       if($val == 0)
                    {
               $_SESSION['zalogowany'] = $_POST["user"];
               $_SESSION['logowany']=-1;
                 header("Location: http://www.bornkes.w.szu.pl/");
                    }
  else if($val == 1){
               $_SESSION['komunikat'] = "B��d serwera. Zalogowanie nie by�o mo�liwe.";
                     }
  else if($val == 2){
               $_SESSION['komunikat'] = "Nieprawid�owa nazwa lub has�o u�ytkownika.";
                     }
  else if($val == 3){ $CL = 3;
               $_SESSION['komunikat'] = "Nie masz Uprawnie�.";
                     }
  else              {
               $_SESSION['komunikat'] = "B��d serwera. Zalogowanie nie by�o mo�liwe.";
                     }
      }
} //if $_POST

  if($CL == 1)
  {
        $_SESSION['komunikat'] = "Ban za pr�b� Z�amania Has�a.";
  }
elseif($CL == 2)
  {
        $_SESSION['komunikat'] = "Blokada Problem z Twoim IP.";
  }

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<title>Logowanie</title>
</head>
<body>
<h3 align="center">
<?php if(isSet($_SESSION['komunikat']))
  echo $_SESSION['komunikat'];
else
  echo "Wprowadz nazw� i has�o u�ytkownika:";
?>
</h3>
<p align="center">
<?PHP
if($CL!=0){exit();} 
if($_SESSION['logowany']>0){  echo " Pr�ba zalogowania nr:".$_SESSION['logowany'];}
if($_SESSION['logowany']>17){ echo "<br>Uwaga 20 nie udanych pr�b logowania grozi Banem.";}
 ?></p>
<form name = "formularz1"
      action = ""
      method = "POST"
>
<table border="0" align="center"><tr>
<td>U�ytkownik:</td>
<td><input type="text" name="user" value="<?PHP echo $_POST["user"]; ?>"></td>
</tr><tr>
<td>Has�o:</td>
<td><input type="password" name="haslo"></td>
</tr><tr>
<td colspan="2" align="center">
  <input type="submit" value="Wejdz">
</td></tr>
</table>
</form><? echo $_GET[q]; ?>
</body>
</html>