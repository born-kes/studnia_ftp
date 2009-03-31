<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
<HTML>
<?php

session_start();
if(!isSet($_SESSION['zalogowany'])||
   !isSet($_SESSION['prawa'])     ||
   !isSet($_SESSION['id'])          ){
  $_SESSION['komunikat'] = "Nie jeste¶ zalogowany!";
    include('logowanie/form.htm');    
echo 'error';
exit();
}

    if($_SESSION['prawa']>0){    header("Location: www/");}
  else{                          header("Location: rezerwacje/");}

?>	
</HTML>