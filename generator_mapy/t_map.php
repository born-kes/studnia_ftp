<?php
require "html.php";
echo'<table align="center"><TR><TD><img src="http://pl5.plemiona.pl/user_image.php?image_id=11528"></TD></TR></table>
<table border="1" align="center"><TR><TD align="center">';

echo'<b>Witam w Generatorze Mapy Klasycznej</b><br><br>
Jaka okolica cie interesuje? <br><br>
<FORM NAME ACTION="t_map_g.php"  METHOD="GET">
x: <input name="x" tabindex="13" id="inputx" value="" size="5" onkeyup="xProcess(\'inputx\', \'inputy\')" type="text">
y: <input name="y" tabindex="14" id="inputy" value="" size="5" type="text"><br>
<br> ';

 /*Aby nadac kolory wioska i plemionom wybierz z listy Twoje Plemie <br>
<SELECT name="plemie"> </select><br>

 ��czenie i wybranie bazy
require "connection.php";
connection();

$opcje = mysql_query("SELECT nazwa FROM plemie " )or die(mysql_error());

 while($op = mysql_fetch_array($opcje)){
   echo "<option value=\"".$op[0]."\">".$op[0]."</option>";

destructor(); */
echo '</TD></TR><TR><TD align="center"><BR>Jak du�a ma by� mapa?<BR><BR>';
echo '<SELECT name="szer"> 
<OPTION value="5">5x5</OPTION>
<OPTION value="10">10x10</OPTION>
<OPTION selected="selected" value="15">15x15</OPTION>
<OPTION value="30">30x30</OPTION>
</select><BR><BR>';

echo'</TD></TR><TR><TD align="center"><b>Dziekuje za wspolprace </b> <br><br>
<INPUT TYPE="submit" VALUE="Wygeneruj mape"> </FORM> <br><br></TD></TR>';

?>