<FORM NAME ACTION="gener.php"  METHOD="GET">
 <TABLE>
<TR><TD > </TD><TD width="6%">Wysoko¶æ y = <INPUT TYPE="TEXT" SIZE="3"  NAME="ody"> </TD><TD width="7%"></TD><TD > </TD><TD> </TD></TR>
<TR><TD  width="13%" align="right"> Szerokosæ x = <INPUT TYPE="TEXT" SIZE="3"  NAME="odx"></TD><TD width=221 height=221 colspan="3" rowspan="3" align="center"><img src="logowanie.GIF"></TD><TD> </TD></TR>
<TR><TD>.</TD><TD>.</TD></TR>
<TR><TD> </TD><TD> x = <INPUT TYPE="TEXT" SIZE="3"  NAME="dox"></TD></TR>
<TR><TD> </TD><TD> </TD><TD> </TD><TD> y = <INPUT TYPE="TEXT" SIZE="3" NAME="doy"></TD><TD> </TD></TR>
</TABLE>
<SELECT name="plemie">
<?php
/* £±czenie i wybranie bazy */
$link = mysql_connect("85.17.1.175", "bornkesws", "MKO208")or die(mysql_error());
mysql_select_db ("bornkesws")or die(mysql_error());

$opcje = mysql_query("SELECT nazwa FROM plemie " )or die(mysql_error());

 while($op = mysql_fetch_array($opcje)){
   echo "<option value=\"".$op[0]."\">".$op[0]."</option>";}
$end=mysql_close($link);
?></select><br>
<INPUT TYPE="submit" VALUE="Wygeneruj mapê"> </FORM>