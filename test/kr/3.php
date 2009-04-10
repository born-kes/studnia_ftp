<?PHP
include_once(dirname(dirname(__FILE__)) . '/connection.php');
###########################
# Zapisanie Zmian do bazy #
###########################
$p=' , ';
if(isSet($_POST[a_id]) && ($_POST[data]==1||$_POST[twa]==1||$_POST[wa]==1) ){
$Zap="UPDATE village SET ";
if($_POST[adata]==1){$Zap.=" data=".$_POST[dat].$p;}
if($_POST[twa]==1 && $_POST[a_typ]!=NULL){$Zap.=" typ=".$_POST[a_typ].$p;}
if($_POST[wa]==1) {$Zap.="pik=".$_POST[apik].$p."mie=".$_POST[amie].$p."axe=".$_POST[aaxe].$p."luk=".$_POST[aluk].$p."zw=".$_POST[azw].$p.="lk=".$_POST[alk].$p."kl=".$_POST[akl].$p."ck=".$_POST[ack].$p."tar=".$_POST[atar].$p."kat=".$_POST[akat].$p."ry=". $_POST[ary].$p."sz= ". $_POST[asz].$p;}
$Zap=substr($Zap,0,-2);
$Zap.=" Where id=".$_POST[a_id];

 connection();
$zmiana1 = mysql_query($Zap) or die ('zapytanie bledne');
destructor();
echo "Zmiany w Wiosce Agresora - zapisane pomyslnie<br />";
}

if(isSet($_POST[o_id])&&($_POST[two]==1||$_POST[wo]==1||$_POST[mo]==1||isSet($_POST[so])) )
{$Zap="UPDATE village SET ";

if($_POST[odata]==1){$Zap.=" data=".$_POST[dat].$p;}
if($_POST[two]==1 && $_POST[o_typ]!=NULL){$Zap.=" typ=".$_POST[o_typ].$p;}
if($_POST[wo]==1){$Zap.=" pik=".$_POST[opik].$p."mie=".$_POST[omie].$p."axe=".$_POST[oaxe].$p."luk=".$_POST[oluk].$p."zw=".$_POST[ozw].$p.="lk=".$_POST[olk].$p."kl=".$_POST[okl].$p."ck=".$_POST[ock].$p."tar=".$_POST[otar].$p."kat=".$_POST[okat].$p."ry=". $_POST[ory].$p."sz= ". $_POST[osz].$p;}
if($_POST[mo]==1 && $_POST[o_mur] != NULL){$Zap.=" mur=".$_POST[o_mur].$p;}
if($_POST[so]==1){$Zap.="status=".$_POST[o_status].$p;}elseif($_POST[so]==2){$Zap.="status=3".$p;}
$Zap=substr($Zap,0,-2);
$Zap.=" Where id=".$_POST[o_id];
 connection();
$zmiana2 = mysql_query($Zap) or die ('zapytanie bledne');
destructor();
echo "Zmiany w Wiosce Obroncy - zapisane pomyslnie<br />";

}

?>
<br /><a href="index.html" target="ramka">Dodaj Nowy</a>