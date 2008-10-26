<?php
echo "<TITLE>ble ble ble</TITLE><b>Opis</b> testuje polaczenie z baza i zwraca obraski oraz szuka miast...<br><br>";
   $index =0;

/* £±czenie i wybranie bazy */

$link = mysql_connect("85.17.1.175", "bornkesws", "MKO208")
    or die ("Nie mo¿na siê po³±czyæ :");
print ("Po³±czenie nawi±zane :");
mysql_select_db ("bornkesws") or die ("Nie mozna wybraæ bazy danych : ");
 
$wynik = mysql_query("SELECT `typ` FROM mapa699")
or die('B³±d zapytania');
      
echo "<br>Zapytanie do bazy poprawne<br>";
       echo "Wyswietl zawarto¶æ z tabeli mapa699<br>";

/*
wy¶wietlamy wyniki, sprawdzamy,
czy zapytanie zwróci³o warto¶æ wiêksz± od 0
*/

if(mysql_num_rows($wynik) > 0) {
    /* je¿eli wynik jest pozytywny, to wy¶wietlamy dane */
    echo "<br>";
    echo "<table cellpadding=\"1\" border=1>";
     while($r = mysql_fetch_array($wynik)) 
   {
     echo "<tr>";
     echo "<td><img src='img/".$r[0]."'></td>";

        
           if ($r[0]=='v4.png')
        { $index =$index +1;
      echo "<td>funkcja if trafi³a na Miasto ".$index."</td>";
        }
            else
        {
        echo "<td>to nie miasto</td>";
         }
     echo "</tr>";
    }
     echo "</table>";
}
echo "

<br>
<br>
<br> jak zobaczysz <b>zrod³o strony</b> to nie zobaczysz prawdziwego skryptu ;p";
?>