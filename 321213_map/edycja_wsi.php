<?PHP
require "connection.php";
connection();

$wis = $_GET[wsi];
$licz_mur = -1;
$wynik = mysql_query("SELECT *
FROM wsi
Where wsi_id = '$_GET[id]'")
or die('B³±d zapytania');

$opcje = mysql_query("SELECT p.id, p.nazwa FROM plemie p ")or die(mysql_error());

 
if(mysql_num_rows($wynik) > 0)
 { echo'<FORM NAME="'.$_GET[id].'"value="kos" ACTION="edyt_wsi_end.php"  METHOD="GET">
<div id="info" style="position: absolute; top: 1px; left: 1px; height: 1px; visibility: hidden; z-index: 10;">
<INPUT size="25" TYPE="text" NAME="id" value="'.$_GET[id].'" ></div>

<TABLE  align="center" class="vis" width="70%" border="0">';
 while($r = mysql_fetch_array($wynik))
 {echo'<TR>
<TR><TD align="center">DATA :</TD><TD><INPUT size="25" TYPE="text" NAME="data" value="'.$r[19].'" ></TD>
</TR>
<TR><TD align="center">Nazwa wsi</TD><TD><INPUT size="25" TYPE="text" NAME="nazwa" value="'.$r[1].'" ></TD>
<TD align="center">PKT:</TD><TD><INPUT size="5" TYPE="text" NAME="pkt" value="'.$r[2].'"></TD></TR>
<TR><TD align="center">Gracz :</TD><TD><INPUT size="25" TYPE="text" NAME="Gracz" value="'.$r[3].'"></TD>
<TD align="center">Plemie :</TD><TD><SELECT name="plem">';
while($op = mysql_fetch_array($opcje)){echo '<option value="'.$op[1].'"';
if($op[1]==$r[4]){echo' selected="selected"';}
echo'>'.$op[1].'</option>';}
echo'</SELECT></TD></TR>
<TR><TD align="center"><b>Mur:</b></TD><TD><SELECT name="mur">';
 while ( $licz_mur<20 ){   
$licz_mur++;
echo'<OPTION value="'.$licz_mur.'"';
if($licz_mur==$r[5]){echo' selected="selected" ';}
echo'>poziom '.$licz_mur.'</OPTION>';}
echo'</SELECT></TD></TR></TABLE>
<TABLE  align="center" class="vis" width="100%" border="10">
<TR><TH colspan="4" align="center" >Jednostki</TH></TR>
<TR>
<TD><IMG SRC="img/unit_spear.png"> <INPUT size="6" TYPE="text" NAME="pi" value="'.$r[6].'"> <b>('.$r[6].')</TD>
<TD><IMG SRC="img/unit_spy.png"> <INPUT size="6" TYPE="text" NAME="zw" value="'.$r[10].'"><b> ('.$r[10].')</TD>
<TD><IMG SRC="img/unit_ram.png"> <INPUT size="6" TYPE="text" NAME="tar" value="'.$r[14].'"><b> ('.$r[14].')</TD>
<TD><IMG SRC="img/unit_knight.png"> <INPUT size="6" TYPE="text" NAME="ry" value="'.$r[16].'"><b> ('.$r[16].')</TD>
</TR><TR>
<TD><IMG SRC="img/unit_sword.png"> <INPUT size="6" TYPE="text" NAME="mie" value="'.$r[7].'"><b> ('.$r[7].')</TD>
<TD><IMG SRC="img/unit_light.png"> <INPUT size="6" TYPE="text" NAME="lk" value="'.$r[11].'"><b> ('.$r[11].')</TD>
<TD><IMG SRC="img/unit_catapult.png"> <INPUT size="6" TYPE="text" NAME="kar" value="'.$r[15].'"><b> ('.$r[15].')</TD>
<TD><IMG SRC="img/unit_snob.png"> <INPUT size="6" TYPE="text" NAME="sz" value="'.$r[17].'"><b> ('.$r[17].')</TD>
</TR><TR>
<TD><IMG SRC="img/unit_axe.png"> <INPUT size="5" TYPE="text" NAME="axe" value="'.$r[8].'"><b> ('.$r[8].')</TD>
<TD><IMG SRC="img/unit_marcher.png"> <INPUT size="5" TYPE="text" NAME="karch" value="'.$r[12].'"><b> ('.$r[12].')</TD>
<TD></TD><TD></TD></TR>
<TR>
<TD><IMG SRC="img/unit_archer.png"> <INPUT size="5" TYPE="text" NAME="arch" value="'.$r[9].'"><b> ('.$r[9].')</TD>
<TD><IMG SRC="img/unit_heavy.png"> <INPUT size="5" TYPE="text" NAME="ck" value="'.$r[13].'"><b> ('.$r[13].')</TD>
<TD></TD><TD></TD></TR></TR>
<TR><TD align="center">Opis:</TD><TD  colspan="3" ><TEXTAREA size="35" TYPE="text" NAME="Opis" value="'.$r[18].'">'.$r[18].'</TEXTAREA></TD></TR>
';
}echo'</TABLE><br>* Musisz wiedzieæ ¿e WSZYSTKIE pola zostan± zmienione.
<TABLE  align="center" border="10"><td><INPUT type="submit" value=" Zapisz Zmiany">
</td></TABLE></FORM>'; }
?>