<TABLE  align="center" class="vis" border="0"><TR><TD>

<?PHP
echo'<FORM NAME="'.$_GET[id].'"value="kos" ACTION="edyt_wsi_end.php"  METHOD="POST">
<INPUT size="25" TYPE="hidden" NAME="id" value="'.$_GET[id].'" >';
require "html.php";
require "connection.php";
connection();

$wis = $_GET[wsi];

$wynik = mysql_query("SELECT w.id AS id_wsi, w.x, w.y, p.id AS id_User, p.name, a.id AS id_plemie, a.tag, w.name, w.points, w.typ, w.data, w.mur, w.pik, w.mie, w.axe, w.luk, w.zw, w.lk, w.kl, w.ck, w.tar, w.kat, w.ry, w.sz 
FROM village w, tribe p, ally a
WHERE w.player = p.id
AND p.ally = a.id
AND w.id = '$_GET[id]'")
or die('B³±d zapytania');

//$opcje = mysql_query("SELECT p.id, p.nazwa FROM plemie p ")or die(mysql_error());
 
if(mysql_num_rows($wynik) > 0)
 { 
echo '<TABLE  align="center" class="vis" border="0">';
 while($r = mysql_fetch_array($wynik))
 {echo'<TR><TD align="center">DATA :</TD><TD align="center"><INPUT size="25" TYPE="text" NAME="data" value="'.$r[10].'" ></TD></TR>';
   if($r[4]!=0||$r[4]!=NULL){echo'<TD align="center">Gracz :</TD><TD align="center"><b>'.$r[4].'</b>';
        if($r[5]!=0&&$r[5]!=NULL){  echo"(".urldecode($r[6]).")";}  ;
   }else{echo'<th></th><Td align="center" colspan="1">"Opiszczona"';}
echo'</Td></TR>';
echo'<TR><TD align="center">Nazwa wsi</TD><TD align="center"><b>'.$r[7].'</b></TD></TR>';

echo'<TR><TD align="center"><b>Mur:</b></TD><TD align="center"><SELECT name="mur"><OPTION value="">';
   for($licz_mur = 0; $licz_mur<=20 ;$licz_mur++){   
      echo'<OPTION value="'.$licz_mur.'"';
          if($licz_mur==$r[mur]){echo' selected="selected" ';}
      echo'>poziom '.$licz_mur.'</OPTION>';}

   echo'</SELECT></TD></TR></TABLE></TD></TR><TR><td>';

echo'<TABLE  align="center" class="vis" width="100%" border="10">
<TR><TH colspan="4" align="center" >Jednostki</TH></TR>
<TR>
<TD><IMG SRC="img/unit_spear.png"> <INPUT size="6" TYPE="text" NAME="pi" value="'.$r[pik].'"> <b>('.$r[pik].')</TD>
<TD><IMG SRC="img/unit_spy.png"> <INPUT size="6" TYPE="text" NAME="zw" value="'.$r[zw].'"><b> ('.$r[zw].')</TD>
<TD><IMG SRC="img/unit_ram.png"> <INPUT size="6" TYPE="text" NAME="tar" value="'.$r[tar].'"><b> ('.$r[tar].')</TD>
<TD><IMG SRC="img/unit_knight.png"> <INPUT size="6" TYPE="text" NAME="ry" value="'.$r[ry].'"><b> ('.$r[ry].')</TD>
</TR><TR>
<TD><IMG SRC="img/unit_sword.png"> <INPUT size="6" TYPE="text" NAME="mie" value="'.$r[mie].'"><b> ('.$r[mie].')</TD>
<TD><IMG SRC="img/unit_light.png"> <INPUT size="6" TYPE="text" NAME="lk" value="'.$r[lk].'"><b> ('.$r[lk].')</TD>
<TD><IMG SRC="img/unit_catapult.png"> <INPUT size="6" TYPE="text" NAME="kar" value="'.$r[kat].'"><b> ('.$r[kat].')</TD>
<TD><IMG SRC="img/unit_snob.png"> <INPUT size="6" TYPE="text" NAME="sz" value="'.$r[sz].'"><b> ('.$r[sz].')</TD>
</TR><TR>
<TD><IMG SRC="img/unit_axe.png"> <INPUT size="5" TYPE="text" NAME="axe" value="'.$r[axe].'"><b> ('.$r[axe].')</TD>
<TD><IMG SRC="img/unit_marcher.png"> <INPUT size="5" TYPE="text" NAME="karch" value="'.$r[kl].'"><b> ('.$r[kl].')</TD>
<TD></TD><TD></TD></TR>
<TR>
<TD><IMG SRC="img/unit_archer.png"> <INPUT size="5" TYPE="text" NAME="arch" value="'.$r[luk].'"><b> ('.$r[luk].')</TD>
<TD><IMG SRC="img/unit_heavy.png"> <INPUT size="5" TYPE="text" NAME="ck" value="'.$r[ck].'"><b> ('.$r[ck].')</TD>
<TD></TD><TD></TD></TR></TR>';
}echo'</TABLE>
</TD></TR><TR><TD>
<TABLE  align="center" border="10"><td><INPUT type="submit" value=" Zapisz Zmiany">
</td></TABLE></FORM></TD></TR><TR><TD></TABLE>'; }
?>