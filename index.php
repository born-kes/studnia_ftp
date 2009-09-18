<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
<HTML><head>
<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
</head><body>
<?php

session_start();
if(!isSet($_SESSION['zalogowany'])){
  $_SESSION['komunikat'] = "Nie jesteś zalogowany!";
    include('logowanie/form.htm');    
exit();
}
    header("Location: test/");

?>	
</body></HTML>