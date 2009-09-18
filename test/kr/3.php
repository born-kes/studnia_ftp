<h4>Zapisane Zmiany:</h4>
<?PHP
include_once(dirname(dirname(__FILE__)) . '/connection.php');
###########################
# Zapisanie Zmian do bazy #
###########################
$pp=' , ';
if(isSet($_POST[a_id]) && ($_POST[data]==1||$_POST[twa]==1||$_POST[wa]==1) && ($_POST[submit]=="Zapisz Agresora") ){
$Zap="UPDATE village SET ";
if($_POST[adata]==1){$Zap.=" data=".$_POST[dat].$pp;}
if($_POST[twa]==1 && $_POST[a_typ]!=NULL){$Zap.=" typ=".$_POST[a_typ].$pp;}
if($_POST[wa]==1) {
 if($_POST[apik]!==NULL){$Zap .="pik=".$_POST[apik].$pp;}
 if($_POST[amie]!==NULL){$Zap .="mie=".$_POST[amie].$pp;}
 if($_POST[aaxe]!==NULL){$Zap .="axe=".$_POST[aaxe].$pp;}
 if($_POST[aluk]!==NULL){$Zap .="luk=".$_POST[aluk].$pp;}
 if($_POST[azw]!==NULL){$Zap .="zw=".$_POST[azw].$pp;}
 if($_POST[alk]!==NULL){$Zap .="lk=".$_POST[alk].$pp;}
 if($_POST[akl]!==NULL){$Zap .="kl=".$_POST[akl].$pp;}
 if($_POST[ack]!==NULL){$Zap .="ck=".$_POST[ack].$pp;}
 if($_POST[atar]!==NULL){$Zap .="tar=".$_POST[atar].$pp;}
 if($_POST[akat]!==NULL){$Zap .="kat=".$_POST[akat].$pp;}
 if($_POST[ary]!==NULL){$Zap .="ry=". $_POST[ary].$pp;}
 if($_POST[asz]!==NULL){$Zap .="sz = ". $_POST[asz].$pp;}
}
$Zap=substr($Zap,0,-2);
$Zap.=" Where id=".$_POST[a_id];

 connection();
$zmiana1 = mysql_query($Zap) or die ('<h4>Wiosce Agresora - ERROR</h4>');
destructor();
echo "<h4>Wioska Agresora - <b>OK</b></h4><br />";
}
$pp=' , ';
if(isSet($_POST[o_id])&&($_POST[two]==1||$_POST[wo]==1||$_POST[mo]!=NULL||isSet($_POST[so])) && ($_POST[submit]=="Zapisz Obroñce") )
{$Zap="UPDATE village SET ";

if($_POST[odata]==1){$Zap.=" data=".$_POST[dat].$pp;}
if($_POST[two]==1 && $_POST[o_typ]!=NULL){$Zap.=" typ=".$_POST[o_typ].$pp;}

if($_POST[wo]==1){ 
if($_POST[opik]!==NULL){$Zap .="pik=".$_POST[opik].$pp;}
if($_POST[omie]!==NULL){$Zap .="mie=".$_POST[omie].$pp;}
if($_POST[oaxe]!==NULL){$Zap .="axe=".$_POST[oaxe].$pp;}
if($_POST[oluk]!==NULL){$Zap .="luk=".$_POST[oluk].$pp;}
if($_POST[ozw]!==NULL){$Zap .="zw=".$_POST[ozw].$pp;}
if($_POST[olk]!==NULL){$Zap .="lk=".$_POST[olk].$pp;}
if($_POST[okl]!==NULL){$Zap .="kl=".$_POST[okl].$pp;}
if($_POST[ock]!==NULL){$Zap .="ck=".$_POST[ock].$pp;}
if($_POST[otar]!==NULL){$Zap .="tar=".$_POST[otar].$pp;}
if($_POST[okat]!==NULL){$Zap .="kat=".$_POST[okat].$pp;}
if($_POST[ory]!==NULL){$Zap .="ry=". $_POST[ory].$pp;}
if($_POST[osz]!==NULL){$Zap .="sz = ". $_POST[osz].$pp;}
}

if($_POST[mo]!=NULL ){$Zap.=" mur=".$_POST[mo].$pp;}
if($_POST[so]!==NULL){$Zap.="status=".$_POST[so].$pp;}
$Zap=substr($Zap,0,-2);
$Zap.=" Where id=".$_POST[o_id];
//echo $Zap;

 connection();
@mysql_query($Zap) or die ('<h4>Wiosce Obroncy -<b>ERROR</b></h4>');
destructor();
echo "<h4>Wiosce Obroncy - <b>OK</b></h4>";

}

?><script language="JavaScript">setTimeout("window.close()",3000) </script>

