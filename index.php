<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
<HTML><head>
<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
</head><body>
<?php

session_start();
if(!isSet($_SESSION['zalogowany'])||
   !isSet($_SESSION['prawa'])     ||
   !isSet($_SESSION['id'])          ){
  $_SESSION['komunikat'] = "Nie jesteś zalogowany!";
    include('logowanie/form.htm');    
echo 'error';
exit();
}

    if($_SESSION['prawa']>0){    header("Location: test/");}
else{  $_SESSION['komunikat'] = "Brak uprawnien bey bey!";
    header("Location: logowanie/logout.php");}
?>	
</body></HTML>