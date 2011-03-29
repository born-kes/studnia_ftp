<? include_once('../connection.php');
 if($_SESSION['zalogowany']!='9oKESi' 
 && $_SESSION['zalogowany']!='ZOMox' )
    {echo 'brak uprawnien...';exit();} ?>
<br>Proxy - Serwer po¶rednicz±cy lub oprogramownie którego celem jest ukrycie IP wyko¿ystanie innego serwera lub programu maskuj±cego.
<br><br>
<br>Zalety -  ukrywa on adres IP na którym pracujemy. imn.
<br>Zagro¿enia - mo¿liwo¶æ ujawnienia login i has³a, oraz monitorowanie naszej dzia³alno¶ci, czasami grozi te¿ infekcja wirusami naszego komputera.
<br>
<br><a href="lista.php" >Lista wszystkich proxy</a>
<br><a href="lista.php?x=x" >Lista u¿ytkowników</a>
<br><a href="../rada/proxi.php" >Lista proxy powi±zanych z u¿ytkownikiem</a>
<br><br>
<br>Jako wstêpne zabezpieczenie wyko¿ystywany jest serwer studni.
<br>W proxy w adresie (url) wpisz : http://bornkes.w.szu.pl/proxi/plus.php?p=ff
<br>Sprawdzi on które konto jest przypisane do tego proxy i czê¶ciowo ukryje login i has³o.
