<?php
include_once(dirname(dirname(__FILE__)) . '/connection.php');
if($_GET[usun_all]!=NULL && $_GET[id]!=NULL){ $Zap="UPDATE village SET typ=NULL, data=NULL, mur=NULL, pik=NULL, mie=NULL, axe=NULL, luk=NULL, zw=NULL, lk=NULL, kl=NULL, ck=NULL, tar=NULL, kat=NULL, ry=NULL, sz=NULL, opis=NULL  Where id=".$_GET[id]; 
connection();
$zmiana = @mysql_query($Zap);
destructor(); }


if($_POST!=NULL){
$Zap="UPDATE village SET ";
$p=' , ';
if($_POST[typ]!=NULL &&  $_POST[typ]!=0)	{$Zap.="typ= ".$_POST[typ].$p; }elseif($_POST[typ]!=NULL ){$Zap.="`typ`=NULL ".$p; }
if($_POST[mur]!=NULL && $_POST[mur]!=' ')	{$Zap.="mur= ". $_POST[mur].$p;}

if($_POST[pik]!=NULL &&  $_POST[pik]!=0)	{$Zap.="pik= ". $_POST[pik].$p;}elseif($_POST[pik]!=NULL ){$Zap.="`pik`=NULL ".$p; }
if($_POST[mie]!=NULL &&  $_POST[mie]!=0)	{$Zap.="mie= ". $_POST[mie].$p;}elseif($_POST[mie]!=NULL ){$Zap.="`mie`=NULL ".$p; }
if($_POST[axe]!=NULL &&  $_POST[axe]!=0)	{$Zap.="axe= ". $_POST[axe].$p;}elseif($_POST[axe]!=NULL ){$Zap.="`axe`=NULL ".$p; }
if($_POST[luk]!=NULL &&  $_POST[luk]!=0)	{$Zap.="luk= ". $_POST[luk].$p;}elseif($_POST[luk]!=NULL ){$Zap.="`luk`=NULL ".$p; }
if($_POST[zw] !=NULL &&  $_POST[zw] !=0)	{$Zap.=" zw= ". $_POST[zw].$p; }elseif($_POST[zw] !=NULL) {$Zap.="`zw`=NULL ".$p; }
if($_POST[lk] !=NULL &&  $_POST[lk] !=0)	{$Zap.=" lk= ". $_POST[lk].$p; }elseif($_POST[lk] !=NULL){$Zap.="`lk`=NULL ".$p; }
if($_POST[kl] !=NULL &&  $_POST[kl] !=0)	{$Zap.=" kl= ". $_POST[kl].$p; }elseif($_POST[kl] !=NULL ){$Zap.="`kl`=NULL ".$p; }
if($_POST[ck] !=NULL &&  $_POST[ck] !=0)	{$Zap.=" ck= ". $_POST[ck].$p; }elseif($_POST[ck] !=NULL ){$Zap.="`ck`=NULL ".$p; }
if($_POST[tar]!=NULL &&  $_POST[tar]!=0)	{$Zap.="tar= ". $_POST[tar].$p;}elseif($_POST[tar]!=NULL ){$Zap.="`tar`=NULL ".$p; }
if($_POST[kat]!=NULL &&  $_POST[kat]!=0)	{$Zap.="kat= ". $_POST[kat].$p;}elseif($_POST[kat]!=NULL ){$Zap.="`kat`=NULL ".$p; }
if($_POST[ry] !=NULL &&  $_POST[ry] !=0)	{$Zap.=" ry= ". $_POST[ry].$p; }elseif($_POST[ry] !=NULL ) {$Zap.="`ry`=NULL ".$p; }
if($_POST[sz] !=NULL &&  $_POST[sz] !=0)	{$Zap.=" sz= ". $_POST[sz].$p; }elseif($_POST[sz] !=NULL){$Zap.="`sz`=NULL ".$p; }
if($_POST[data]!=NULL && $_POST[data]!=' '){$Zap.="data='". $_POST[data]."'".$p;}elseif($_POST[data]!=NULL ){$Zap.="`data`=NULL ".$p; }
if($_POST[opis]!=NULL && $_POST[opis]!=' '){$Zap.="opis='". $_POST[opis]."'".$p;}elseif($_POST[opis]!=NULL ){$Zap.="`opis`=NULL ".$p; }

$Zap=substr($Zap,0,-2);
$Zap.=' Where id='.$_GET[id];
connection();
$zmiana = @mysql_query($Zap);}
destructor();
?>
<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
  <meta name="Description" content="[ Opis dokumentu ]" />
  <meta name="Author" content="[ Autor dokumentu ]" />
  <meta name="Generator" content="EdHTML" />
  <title>[ edytor opisu ]</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="../stamm1201718544.css">
<script src="../js/mootools.js" type="text/javascript"></script>
<script src="../js/scriptt.js" type="text/javascript"></script>
<script src="../js/ts_picker.js" type="text/javascript"></script>
<table id="info_content" class="vis" style="background-color: rgb(240, 230, 200);" width="100%" >
<?php
echo'<form name = "zmiana"
      action = "?id='.$_GET[id].'"
      method = "POST"
>';
if($_GET[id] != 0&&$_GET[id]!=null){
/* £¹czenie i wybranie bazy */
connection();
$zap="SELECT w.id AS id_wsi, w.x, w.y, p.id AS id_User, p.name AS G_name, a.id AS id_plemie, a.tag, w.name AS W_name, w.points, w.typ, w.data, w.mur, w.pik, w.mie, w.axe, w.luk, w.zw, w.lk, w.kl, w.ck, w.tar, w.kat, w.ry, w.sz, w.opis
FROM village w, tribe p, ally a
WHERE w.player = p.id
AND p.ally = a.id
AND w.id ='$_GET[id]'";

//SELECT v.name AS W_name, t.name AS G_name,v.x,v.y,v.typ
//FROM village v, tribe t
//
//AND v.player = t.id

$wynik = mysql_query($zap) or die (mysql_error());


 if($r = @mysql_fetch_array($wynik)){
if(!$typ=$r[typ]){$typ=0;}
if(!$datta=$r[data]){$datta="rrrr-mm-dd";}
echo'
<tr id="data_on" style="" ><td>Raport z</td>
<td>'.$r[data].'</td>
<td><a href="javascript:editToggle(\'data_on\' , \'data_off\')"><img src="../img/rename.png" alt="zmieñ nazwê" title="zmieñ nazwê"></a>

</td>
</tr>
<tr id="data_off" style="display: none;" ><td>Raport z Dnia</td>
<td><input value="" type="tekst" id="czas1" name="data" size="10"><a href="javascript:show_calendar(\'document.zmiana.czas1\', document.zmiana.czas1.value);"><img src="../img/cal.gif" alt="Kliknij Tu by ustaliæ Datê" width="16" border="0" height="16"></a> 
</td>
</tr>
<tr>

<td colspan="1" >Wioska:</td>
<td colspan="1" ><b>'.$r[W_name].'</b> </td>
<td colspan="1" >'.$r[x].'|'.$r[y].'</td></tr>
<tr>
<td colspan="1" >Gracz:</td>

<td colspan="1" ><b>'.$r[G_name].'</b><td></tr>

<tr style="" id="info_typ_on"><td colspan="1" >Typ:</td>
<td colspan="1" id="info_type_txt" >'.$rodzaje[$typ].'</td>
<td><a href="javascript:editToggle(\'info_typ_on\' , \'info_typ_off\')"><img src="../img/rename.png" alt="zmieñ nazwê" title="zmieñ nazwê"></a>

</td></tr>
<tr style="display: none;" id="info_typ_off">
<td colspan="1" >Typ:</td><td colspan="3" ><SELECT name="typ" >
                 <option value=""></option>';for($licz=0; $licz<count($rodzaje); $licz++){echo'<option value="'.$licz.'">'.$rodzaje[$licz].'</option>'; }echo'                     </SELECT>
</td></tr>

<tr style="" id="info_opis_on"><td colspan="1" >Opis:</td>
<td colspan="1" id="info_opis_txt" >'.$r[opis].'
</td><td><a href="javascript:editToggle(\'info_opis_on\' , \'info_opis_off\')"><img src="../img/rename.png" alt="zmieñ nazwê" title="zmieñ nazwê"></a>
</td></tr>
<tr style="display: none;" id="info_opis_off">
<td colspan="1" >Opis:</td><td colspan="3" ><input value="'.$r[opis].'" name="opis" type="tekst" size="15">
</td></tr>

<tr style="" id="info_mur_on"><td colspan="1" >Mur:</td>
<td colspan="1" id="info_mur_txt" >'.$r[mur].'
</td><td><a href="javascript:editToggle(\'info_mur_on\' , \'info_mur_off\')"><img src="../img/rename.png" alt="zmieñ nazwê" title="zmieñ nazwê"></a>
</td></tr>
<tr style="display: none;" id="info_mur_off">
<td colspan="1" >Mur:</td><td colspan="3" ><input value="'.$r[mur].'" name="mur" type="tekst" size="3">
</td></tr></table>
<table id="info_content" class="vis" style="background-color: rgb(240, 230, 200);" width="320" >
</table>

<table border="1" width="100%"><tr><td colspan="5" align="center" ><b>Wojska</b></td>
<td style="" id="wor0_on" ><a href="javascript:editToggle(\'wor_on\' , \'wor_off\')"><img src="../img/rename.png" alt="zmieñ nazwê" title="zmieñ nazwê"></a>
</td></tr>
<tr>
<td><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_spear.png"></Td>
<Td><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_sword.png"></Td>
<Td><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_archer.png"></Td>
<Td><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_spy.png"></Td>
<Td><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_heavy.png"></Td>
<Td><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_knight.png"></Td>
</tr>
<tr id="wor_on"><Td>'; 
if($r[pik]!=NULL){echo ($r[pik]);}else{echo'-';}    echo '</Td><Td>';
if($r[mie]!=NULL){echo ($r[mie]);}else{echo'-';}    echo '</Td><Td>';
if($r[luk]!=NULL){echo ($r[luk]);}else{echo'-';}    echo '</Td><Td>';
if($r[zw]!=NULL){echo ($r[zw]);}else{echo'-';}    echo '</Td><Td>';
if($r[ck]!=NULL){echo ($r[ck]);}else{echo'-';}    echo '</Td><Td>';
if($r[ry]!=NULL){echo ($r[ry]);}else{echo'-';}    echo '</Td></tr>


<tr id="wor_off" style="display: none;"  >
<Td><INPUT size="3" TYPE="text" NAME="pik" value="'.$r[pik].'"></Td>
<Td><INPUT size="3" TYPE="text" NAME="mie" value="'.$r[mie].'"></Td>
<Td><INPUT size="3" TYPE="text" NAME="luk" value="'.$r[luk].'"></Td>
<Td><INPUT size="3" TYPE="text" NAME="zw"  value="'.$r[zw].'"></Td>
<Td><INPUT size="3" TYPE="text" NAME="ck"  value="'.$r[ck].'"></Td>
<Td><INPUT size="3" TYPE="text" NAME="ry"  value="'.$r[ry].'"></Td>
</tr>
<tr>
<Td><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_axe.png"></Td>
<Td><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_light.png"></Td>
<Td><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_marcher.png"></Td>
<Td><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_ram.png"></Td>
<Td><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_catapult.png"></Td>
<Td><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_snob.png"></Td>
</tr>
<tr id="wor1_on" ><Td>';
if($r[axe]!=NULL){echo ($r[axe]);}else{echo'-';}    echo '</Td><Td>';
if($r[lk]!=NULL){echo ($r[lk]);}else{echo'-';}    echo '</Td><Td>';
if($r[kl]!=NULL){echo ($r[kl]);}else{echo'-';}    echo '</Td><Td>';
if($r[tar]!=NULL){echo ($r[tar]);}else{echo'-';}    echo '</Td><Td>';
if($r[kat]!=NULL){echo ($r[kat]);}else{echo'-';}    echo '</Td><Td>';
if($r[sz]!=NULL){echo ($r[sz]);}else{echo'-';}    echo '</Td></tr>
<tr id="wor1_off" style="display: none;"  >
<Td><INPUT size="3" TYPE="text" NAME="axe" value="'.$r[axe].'"></Td>
<Td><INPUT size="3" TYPE="text" NAME="lk"  value="'.$r[lk].'"></Td>
<Td><INPUT size="3" TYPE="text" NAME="kl"  value="'.$r[kl].'"></Td>

<Td><INPUT size="3" TYPE="text" NAME="tar" value="'.$r[tar].'"></Td>
<Td><INPUT size="3" TYPE="text" NAME="kat" value="'.$r[kat].'"></Td>
<Td><INPUT size="3" TYPE="text" NAME="sz"  value="'.$r[sz].'"></Td>
</tr></table>
<table width="100%">
<tr style="display: none;" id="ok_ok" ><td></td><td></td><td><input value="Zapisz Zmiany" type="submit"></td>
</tr></table>';
$obr_pi=(15*$r[pik])+(50*$r[mie])+(10*$r[axe])+(50*$r[luk])+(2*$r[zw])+(30*$r[lk])+(40*$r[kl])+(200*$r[ck])+(20*$r[tar])+(100*$r[kat])+(250*$r[ry])+(100*$r[sz]);
$obr_lk=(45*$r[pik])+(15*$r[mie])+(5*$r[axe])+(40*$r[luk])+(1*$r[zw])+(40*$r[lk])+(30*$r[kl])+(80*$r[ck])+(50*$r[tar])+(50*$r[kat])+(400*$r[ry])+(50*$r[sz]);
$obr_kl=(20*$r[pik])+(40*$r[mie])+(10*$r[axe])+(5*$r[luk])+(2*$r[zw])+(30*$r[lk])+(50*$r[kl])+(180*$r[ck])+(20*$r[tar])+(100*$r[kat])+(150*$r[ry])+(100*$r[sz]);

}else{echo'<br>blad, wioska nie istnieje';}
destructor();;}else{echo"Wioska --- zg³os b³ad do administratora";}
?>
</form>
<table width="100%">
<tr><td><IMG SRC="http://pl5.plemiona.pl/graphic/unit/def.png?1"><?PHP echo $obr_pi; ?></td>
<td><IMG SRC="http://pl5.plemiona.pl/graphic/unit/def_cav.png?1"><?PHP echo $obr_lk; ?></td>
<td><IMG SRC="http://pl5.plemiona.pl/graphic/unit/def_archer.png?1"><?PHP echo $obr_kl; ?></td></tr>
</table>
<SCRIPT LANGUAGE="JavaScript">
<!--

function Info()
{if (!confirm("Czy na pewno chcesz usunac ten raport?"))
return ; window.location = <?PHP echo'"menu.php?id='.$_GET[id].'&usun_all=1";'; ?>
}
<!--End-->
</script>
<br /><a href="JavaScript:Info()">Usun ten raport</a>
</body>
</html>
