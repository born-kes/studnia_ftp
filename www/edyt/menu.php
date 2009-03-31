<?php
session_start();
if(!isSet($_SESSION['zalogowany'])){
  $_SESSION['komunikat'] = "Nie jestes zalogowany!";
  echo"nie zalogowany";
include('../zero.php');
  exit();}

include_once(dirname(dirname(__FILE__)) . '/connection.php');

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
<link rel="stylesheet" type="text/css" href="../img/stamm1201718544.css">
<script src="../mootools.js" type="text/javascript"></script>
<script src="../scriptt.js" type="text/javascript"></script>
<script src="../ts_picker.js" type="text/javascript"></script>
<table id="info_content" class="vis" style="background-color: rgb(240, 230, 200);" width="320" >
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
<tr><td colspan="5"  align="center" ><b>Wojska</b></td>
<td style="" id="wor0_on" ><a href="javascript:editToggle(\'wor_on\' , \'wor_off\')"><img src="../img/rename.png" alt="zmieñ nazwê" title="zmieñ nazwê"></a>
</td></tr>
<tr>
<Td><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_spear.png"></Td>
<Td><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_sword.png"></Td>
<Td><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_archer.png"></Td>
<Td><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_spy.png"></Td>
<Td><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_heavy.png"></Td>
<Td><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_knight.png"></Td>
</tr>
<tr id="wor_on" style="">
<Th>_'.$r[pik].'_</Th>
<Th>_'.$r[mie].'_</Th>
<Th>_'.$r[luk].'_</Th>
<Th>_'.$r[zw].'_</Th>
<Th>_'.$r[ck].'_</Th>
<Th>_'.$r[ry].'_</Th>
</tr>

<tr id="wor_off" style="display: none;"  >
<Th><INPUT size="4" TYPE="text" NAME="pik" value="'.$r[pik].'"></Th>
<Th><INPUT size="4" TYPE="text" NAME="mie" value="'.$r[mie].'"></Th>
<Th><INPUT size="4" TYPE="text" NAME="luk" value="'.$r[luk].'"></Th>
<Th><INPUT size="4" TYPE="text" NAME="zw"  value="'.$r[zw].'"></Th>
<Th><INPUT size="4" TYPE="text" NAME="ck"  value="'.$r[ck].'"></Th>
<Th><INPUT size="4" TYPE="text" NAME="ry"  value="'.$r[ry].'"></Th>
</tr>
<tr>
<Td><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_axe.png"></Td>
<Td><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_light.png"></Td>
<Td><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_marcher.png"></Td>
<Td><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_ram.png"></Th>
<Td><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_catapult.png"></Td>
<Td><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_snob.png"></Td>
</tr>
<tr id="wor1_on" >
<Th>_'.$r[axe].'_</Th>
<Th>_'.$r[lk].'_</Th>
<Th>_'.$r[kl].'_</Th>
<Th>_'.$r[tar].'_</Th>
<Th>_'.$r[kat].'_</Th>
<Th>_'.$r[sz].'_</Th>
</tr>

<tr id="wor1_off" style="display: none;"  >
<Th><INPUT size="4" TYPE="text" NAME="axe" value="'.$r[axe].'"></Th>
<Th><INPUT size="4" TYPE="text" NAME="lk"  value="'.$r[lk].'"></Th>
<Th><INPUT size="4" TYPE="text" NAME="kl"  value="'.$r[kl].'"></Th>

<Th><INPUT size="4" TYPE="text" NAME="tar" value="'.$r[tar].'"></Th>
<Th><INPUT size="4" TYPE="text" NAME="kat" value="'.$r[kat].'"></Th>
<Th><INPUT size="4" TYPE="text" NAME="sz"  value="'.$r[sz].'"></Th>
</tr></table>
<table width="320">
<tr style="display: none;" id="ok_ok" ><td></td><td></td><td><input value="Zapisz Zmiany" type="submit"></td>
</tr></table>';
}else{echo'<br>blad, wioska nie istnieje';}
destructor();;}else{echo"Wioska --- zg³os b³ad do administratora";}
?>
</form></body>
</html>
