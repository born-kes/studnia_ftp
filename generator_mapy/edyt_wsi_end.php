<HTML><HEAD>
<SCRIPT LANGUAGE="JavaScript">
function updateParent() {
    self.close();
    return false;
}
</SCRIPT>
</HEAD><BODY>
<?php
if($_POST[id] != 0&&$_POST[id] != NULL){
$p=' ,';
$Zap ='UPDATE village SET ';
if($_POST[mur]!=NULL){$Zap.="mur=". $_POST[mur].$p;}
if($_POST[pi]!=NULL){$Zap.="pik=". $_POST[pi].$p;}
if($_POST[mie]!=NULL){$Zap.="mie=". $_POST[mie].$p;}
if($_POST[axe]!=NULL){$Zap.="axe=". $_POST[axe].$p;}
if($_POST[arch]!=NULL){$Zap.="luk=". $_POST[arch].$p;}
if($_POST[zw]!=NULL){$Zap.="zw=". $_POST[zw].$p;}
if($_POST[lk]!=NULL){$Zap.="lk=". $_POST[lk].$p;}
if($_POST[karch]!=NULL){$Zap.="kl=". $_POST[karch].$p;}
if($_POST[ck]!=NULL){$Zap.="ck=". $_POST[ck].$p;}
if($_POST[tar]!=NULL){$Zap.="tar=". $_POST[tar].$p;}
if($_POST[kar]!=NULL){$Zap.="kat=". $_POST[kar].$p;}
if($_POST[ry]!=NULL){$Zap.="ry=". $_POST[ry].$p;}
if($_POST[sz]!=NULL){$Zap.="sz=". $_POST[sz].$p;}
if($_POST[data]!=NULL)//&&checdata($_POST[data]))
{$Zap.="data='". $_POST[data]."'".$p;}

$Zap=substr($Zap,0,-1);
$Zap.='WHERE id='.$_POST[id]; 
echo($Zap);
/* £±czenie i wybranie bazy */
$link = mysql_connect("85.17.1.175", "bornkesws", "MKO208")or die(mysql_error());
mysql_select_db ("bornkesws")or die(mysql_error());

$edytowany = mysql_query($Zap) or die ("Blad, zmian nie zapisano.");
echo'<BR>Zmiany zapisane<BR>';
$end=mysql_close($link);}else{echo"Wyj±tek krytyczny, zg³os blad do administratora";}
?>

<BR>
<FORM NAME="childForm" onSubmit="javascript:window.close()">
          <BR><INPUT TYPE="SUBMIT" VALUE="zamknij"></FORM>
</BODY></HTML>