<HTML><HEAD>
<SCRIPT LANGUAGE="JavaScript">
function updateParent() {
    self.close();
    return false;
}
</SCRIPT>
</HEAD><BODY>
<?php

if($_GET[id] != 0){
/* £±czenie i wybranie bazy */
$link = mysql_connect("85.17.1.175", "bornkesws", "MKO208")or die(mysql_error());
mysql_select_db ("bornkesws")or die(mysql_error());

$edytowany = mysql_query("UPDATE wsi 
SET nazwa_wsi='$_GET[nazwa]', 
pkt='$_GET[pkt]',
gracz='$_GET[Gracz]',
plemie='$_GET[plem]',
mur='$_GET[mur]',
pik='$_GET[pi]',
mie='$_GET[mie]',
axe='$_GET[axe]',
arch='$_GET[arch]',
zw='$_GET[zw]',
lk='$_GET[lk]',
karch='$_GET[karch]',
ck='$_GET[ck]',
tar='$_GET[tar]',
kat='$_GET[kar]',
ry='$_GET[ry]',
sz='$_GET[sz]',
opis='$_GET[Opis]',
Data='$_GET[data]'
WHERE wsi_id='$_GET[id]'") or die (mysql_error());


$end=mysql_close($link);}else{echo"Wioska O zg³o¶ b³±d do abministratora";}
?>
Zmieniono Plemie<BR>
<FORM NAME="childForm" onSubmit="return updateParent();">
          <BR><INPUT TYPE="SUBMIT" VALUE="zamknij"></FORM>
</BODY></HTML>