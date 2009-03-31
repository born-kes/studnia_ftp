<?PHP

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


  $query = "SELECT COUNT(*) FROM Users WHERE Nazwa='$user' ";
  $query .= "AND Haslo='$pass'";

/*nawi¹zanie po³¹czenia serwerem i wybór bazy*/

connection();
  if(!$result = mysql_query($query)){
    destructor();
    return 1;
  }
/*sprawdzenie wyników zapytania*/

  if(!$row = @mysql_fetch_row($result)){
    //echo('Wyst¹pi³ b³¹d: nieprawid³owe wyniki zapytania...');
    @destructor();    return 1;
  }
  else{
    if($row[0] <> 1){
      @destructor();
      return 2;
  }
  else{
      @destructor();
      return 0;
    }
  }
}

?>