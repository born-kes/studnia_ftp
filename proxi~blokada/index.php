<? include_once('../connection.php');
 if($_SESSION['zalogowany']!='9oKESi' 
 && $_SESSION['zalogowany']!='ZOMox' )
    {echo 'brak uprawnien...';exit();} ?>
<br>Proxy - Serwer po�rednicz�cy lub oprogramownie kt�rego celem jest ukrycie IP wyko�ystanie innego serwera lub programu maskuj�cego.
<br><br>
<br>Zalety -  ukrywa on adres IP na kt�rym pracujemy. imn.
<br>Zagro�enia - mo�liwo�� ujawnienia login i has�a, oraz monitorowanie naszej dzia�alno�ci, czasami grozi te� infekcja wirusami naszego komputera.
<br>
<br><a href="lista.php" >Lista wszystkich proxy</a>
<br><a href="lista.php?x=x" >Lista u�ytkownik�w</a>
<br><a href="../rada/proxi.php" >Lista proxy powi�zanych z u�ytkownikiem</a>
<br><br>
<br>Jako wst�pne zabezpieczenie wyko�ystywany jest serwer studni.
<br>W proxy w adresie (url) wpisz : http://bornkes.w.szu.pl/proxi/plus.php?p=ff
<br>Sprawdzi on kt�re konto jest przypisane do tego proxy i cz�ciowo ukryje login i has�o.
