<table class="menu nowrap" width="1000" align="center" border="1">
<tbody><tr id="menu_row">
<td><a href="../logowanie/logout.php" >Wyloguj <?php echo $_SESSION['zalogowany'] ?></a></td>

<td>Pomoc<br>
<table width="120" cellspacing="0" border="2">
<tbody>
<tr><td>Co to Studnia</td></tr>
<tr><td>Instrukcja</td></tr>
<tr><td>Zadaj Pytanie</td></tr>
<tr><td>Profil</td></tr>
<tr><td>Mapa</td></tr>
<tr><td>Przegladaj Baze</td></tr>
<tr><td>Konwertuj</td></tr>
<tr><td>Filtry</td></tr>
<tr><td>Kalkulatory</td></tr>
<tr><td>Bobi Budowniczy</td></tr>
<tr><td>Ciekawostki</td></tr>
</tbody></table></td>

<td>Profil<br>
<table width="120" cellspacing="0" border="1">
<tbody>
<tr><td>Ustawienia</td></tr>
<tr><td><a href="?m=0">Kolory</a></td></tr>
<tr><td><a href="?m=8">Minutnik</a></td></tr>
<tr><td>Obserwowane</td></tr>
</tbody></table></td>

<td>Mapa<br>
<table width="120" cellspacing="0" border="1">
<tbody>
<tr><td>Legenda</td></tr>
<tr><td><a href="?m=0">Kolory</a></td></tr>
<tr><td><a href="?m=3">Taktyczna</a></td></tr>
<tr><td><a href="?m=4">Szczegó³owa</a></td></tr>
</tbody></table></td>

<td>Przegladaj Baze<br>
<table width="120" cellspacing="0" border="1">
<tbody>
<tr><td><a href="?pb=1">Wioska</a></td></tr>
<tr><td><a href="?pb=2">Wioski Graczy</a></td></tr>
<tr><td><a href="?pb=3">Wioski w Okolicy</a></td></tr>
<tr><td><a href="?pb=4">Wlasne zapytanie</a></td></tr>
</tbody></table></td>

<td>Konwertuj<br>
<table width="120" cellspacing="0" border="1">
<tbody>
<tr><td><a href="?kr=1">Raport z Ataku i zwiadu</a></td></tr>
<tr><td><a href="?kr=2">Raport z Obrony</a></td></tr>
<tr><td>Raport ze wsparcia</td></tr>
</tbody></table></td>

<td>Filtry<br>
<table width="120" cellspacing="0" border="1">
<tbody>
<tr><td><a href="?f=1">Typy Wiosek</a></td></tr>
<tr><td>Surowce w Wioskach</td></tr>
<tr><td>Wojska w Wioskach</td></tr>
<tr><td>Raport ze wsparcia</td></tr>
</tbody></table></td>

<td>Kalkulatory<br>
<table width="120" cellspacing="0" border="1">
<tbody>
<tr><td><a href="?cal=0">Szybki</a></td></tr>
<tr><td><a href="?cal=1">Odleg³o¶ci prosty</a></td></tr>
<tr><td><a href="?cc=0">Odleg³o¶ci Zaawansowany </a></td></tr>
<tr><td><a href="?cc=10"><b>Allken'a</b> </a></td></tr>
<tr><td><a href="?cc=9"><b>RADAR</b> </a></td></tr>
<tr><td>Wojska</td></tr>
<tr><td>Rozbudowy</td></tr>
</tbody></table></td>

<td>Bobi Budowniczy<br>
<table width="120" cellspacing="0" border="1">
<tbody>
<tr><td>Filtr Surowców</td></tr>
<tr><td>Lista Odleg³o¶ci</td></tr>
<tr><td>Lista Porównawcza</td></tr>
<tr><td>Surowce w okolicy</td></tr>
<tr><td>Lista prosta</td></tr>
</tbody></table></td>

<td>Ciekawostki<br>
<table width="120" cellspacing="0" border="1">
<tbody>
<tr><td>Rozbudowa Wiosek</td></tr>
<tr><td>Typy Wiosek</td></tr>
<tr><td>Typy off'ow/def'ow'</td></tr>
<tr><td>Taktyka</td></tr>
<tr><td>Jak "Obskakiwaæ" konto</td></tr>
<tr><td>Zdobywanie informacji</td></tr>
<tr><td>Pomys³y</td></tr>
</tbody></table></td></tr>


</tbody></table>
<div id="info" style="position: absolute; top: 373px; left: 31px; width: 400px; height: 1px; visibility: hidden; z-index: 10;">
<table id="info_content" class="vis" style="background-color: rgb(240, 230, 200);" ><tbody>
<tr style="" id="info_data_on">

    <TD>Data:</TD>
    <Th colspan="5" id="info_data" align="center">01-11-08</Th>
</tr>
<TR style="" align="center" id="info_data_off">
    <TH colspan="6" align="center">BRAK SKANU W BAZIE</TH>
</tr>
<tr>
    <Td>Wies:</Td>
    <Td colspan="5" id="info_title" align="center">nazwa wsi(xxx|yyy) Kyx</Td>

</TR>

<TR style="" id="info_user_on">
    <TD>Gracz:</TD>
    <TD colspan="5" align="center" id="info_user" align="center">nick (plemie)</TD>

</TR>
<TR style="" align="center" id="info_user_off">
    <TH colspan="6" align="center">WIOKA OPUSZONA</TH>
</TR>
<TR>

    <TD>Mur:</TD>
    <TD id="info_mur" colspan="2" >.</TD>
    <td>Typ</td>
    <td id="info_typ" colspan="2" >....</td>
</TR>
<TR style="" id="info_wor_a" >
    <TH align="center" >Pik.</TH>

    <TH align="center" >Mie.</TH>
    <TH align="center" >Top.</TH>
    <TH align="center" >Luk.</TH>
    <TH align="center" >Tar.</TH>
    <TH align="center" >Ryc.</TH>
</TR>
<TR style="" id="info_wor_b">

    <TD align="center"  id="info_wor_pik">Pik</TD>
    <TD align="center"  id="info_wor_mie">Mie</TD>
    <TD align="center" id="info_wor_axe" >Axe</TD>
    <TD align="center" id="info_wor_ar" >Ar</TD>
    <TD align="center"  id="info_wor_tar">Tar</TD>
    <TD align="center"  id="info_wor_ry">Ryc</TD>

</TR>
<TR style="" id="info_wor_c">
    <TH align="center" >Zw.</TH>
    <TH align="center" >LK.</TH>
    <TH align="center" >KLuk.</TH>
    <TH align="center" >CK.</TH>
    <TH align="center" >Kat.</TH>

    <TH align="center" >Sz.</TH>
</TR>
<TR style="" id="info_wor_d">
    <TD align="center"  id="info_wor_zw">zw</TD>
    <TD align="center"  id="info_wor_lk">LK</TD>
    <TD align="center"  id="info_wor_kar">kar</TD>
    <TD align="center" id="info_wor_ck" >ck</TD>

    <TD align="center"  id="info_wor_kat">kat</TD>
    <TD align="center" id="info_wor_sz" >sz</TD>
</TR>
<TR style="" id="info_opis_on">
    <TH>Opis:</TH>
    <TD colspan="5" id="info_opis">toczy siê toczy</TD>
</TR>
<TR style="" align="center" id="info_opis_off">
    <TH colspan="6" align="center">BRAK OPISU DLA TEJ WIOKI</TH>

</TR>
</tbody></table></div>

<!--  koniec Menu  -->