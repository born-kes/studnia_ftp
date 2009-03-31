<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
<HTML>
<HEAD>


<?php

session_start();
if(!isSet($_SESSION['zalogowany'])){
  $_SESSION['komunikat'] = "Nie jeste¶ zalogowany!";
  include('form.php');
  exit();
}
?>	
<title>KESI ...</title>
<frameset cols="*,0">
    <frame name="lewy" noresize src="strona_beta/index.php" scrolling="auto">
    <frameset rows="*,80">
      <frame name="prawy" noresize src="prawy.php" scrolling="auto">
      <frame name="reklama" noresize src="reklama.php">
    </frameset>
</frameset>
<noframes>
Sorry, tylko ramki! Ale tutaj jest <a href="lewy.html">spis tre¶ci</a>.
</noframes>
</HTML>