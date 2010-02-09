<?php
session_start();
//if(!isSet($_COOKIE['wtyk'])){
if(!isSet($_SESSION['zalogowany'])){
  $_SESSION['komunikat'] = "Nie jeste¶ zalogowany!";
  header("Location: ../");
  exit();
}else if($_SESSION['zalogowany']===NULL){
  header("Location: ../");
  exit();}

include_once('serwer.php');
if(!isSet($_SESSION['id']) || $_SESSION['id']==null|| count($_SESSION['id'])>1){
 $user=$_SESSION['zalogowany'];
  connection();
     $wynik = mysql_query("SELECT `id` FROM `list_user` WHERE name='$user';")or die('Blad zapytania');

       if($r = mysql_fetch_row($wynik)){ $_SESSION['id']=$r[0];}
  destructor();
}
# Wyciaga x|y Wioski 
function xy_wioski($name){$st_r=strrpos($name, "|"); $w_name= substr($name , $st_r-3,$st_r+3); return $w_name;}

$co_idzie =array ('1'=>'Wedlug bazy',
                  '9'=>'Zwiad',
                  '18'=>'Piki, Topory, Luki',
                  '22'=>'Miecze',
                  '10'=>'Lekka kawaleria, Lucznicy konni',
                  '11'=>'Ciezka kawaleria',
                  '30'=>'Tarany, katapulty',
                  '35'=>'Szlachta');

# liczy wojsko
function ile_woja($pik, $mie, $axe, $arche,$zw, $lk, $kl, $ck, $tar, $kat, $ryc, $sz){
$wojo= $pik+ $mie+ $axe+ $arche+($zw*2)+ ($lk*4)+ ($kl*5)+ ($ck*6)+($tar*5)+($kat*8)+($ryc*10)+($sz*100);
return $wojo;
}
function jaki_czas_marszu($pik, $mie, $axe, $arche,$zw, $lk, $kl, $ck, $tar, $kat, $ryc, $sz){
if($sz!=0){return 35;}
elseif($kat!=0 ||$tar!=0){return 30;}
elseif($mie!=0){return 22;} 
elseif($pik!=0 ||$axe!=0 || $arche!=0){return 18;}
elseif($ck!=0){return 11;}
elseif($lk!=0  || $kl!=0){return 10;}
elseif($zw!=0){return 9;}else{return 0;}
}
# Zwraca nazwê Typu wioski
function rodzaj($rr)
{ global $rodzaje; $wynik = $rodzaje[$rr];
    return $wynik;
}
function wpisz_rodzaj($nr,$rodzaje){ if($rodzaje==NULL){global $rodzaje;}
     $str ='<option value=""></option>';
 for($licz=0; $licz<count($rodzaje); $licz++){
 $str .='<option value="'.$licz.'"';
  if($nr==$licz){$str .='  SELECTED ';}
 $str .= '>'.$rodzaje[$licz].'</option>';
  }
    return $str;
}

function data_z_bazy($rr)
{ global $godzina_zero;
  global $godzina_jeden; $wynik = date("d.m.Y G:i:s", $rr+$godzina_zero);

if($rr==NULL){
     $ciag = '<IMG SRC="../img/z5.gif" title="Nie ma raportu"> Brak Raportu';}
elseif($rr<$godzina_jeden && $rr<$godzina_jeden-518400 ){
     $ciag =$wynik.' <IMG SRC="../img/z2.gif" title="Stary raport"> ';}
elseif($rr<$godzina_jeden && $rr>$godzina_jeden-518400 ){
     $ciag =$wynik.' <IMG SRC="../img/z3.gif" title="Nowy Raport"> ';}
elseif($rr>$godzina_jeden && $rr<mktime()-$godzina_zero ){
     $ciag =$wynik.' <IMG SRC="../img/z1.gif" title="Bardzo Swierzy Raport"> ';}
elseif( $rr<mktime() ){
     $ciag =$wynik.' <IMG SRC="../img/z4.gif" title="Przyszlosc"> ';}
    return $ciag;
}

# Czê¶æ kalkulatora
function potega($podstawa, $wykladnik)
{   $wynik = $podstawa;    $i = 1;
    while ($i++ < $wykladnik)
        $wynik *= $podstawa;
    return $wynik;
}

# Zwraca czas: Godzin:minut:sekund
# Czê¶æ Minutnika
function przeliczenie($szll)
{
$data_explode= explode(" ", date("j G i s", $szll));
$data_explode[0]=$data_explode[0]-1;
$data_explode[1]=$data_explode[1]-1;
if($data_explode[0]>0){$data_explode[1]+=$data_explode[0]*24;$data_explode[0]=0;}//godzi
if($data_explode[3]<0){$data_explode[3]=$data_explode[3]+60;$data_explode[2]=$data_explode[2]-1;}//sek
if($data_explode[2]<0){$data_explode[2]=$data_explode[2]+60;$data_explode[1]=$data_explode[1]-1;}//min
if($data_explode[1]<=0 && $data_explode[0]>0){$data_explode[1]=$data_explode[1]+24;$data_explode[0]=$data_explode[0]-1;}//godzi

if(strlen($data_explode[1])==1){$data_explode[1]='0'.$data_explode[1];}
if(strlen($data_explode[2])==1){$data_explode[2]='0'.$data_explode[2];}
if(strlen($data_explode[3])==1){$data_explode[3]='0'.$data_explode[3];}
$wynik= $data_explode[1].":".$data_explode[2].":".$data_explode[3];
    return $wynik;
}

# zamienia czas na Uniksowy
# odwrotnosc Przelicz
# czê¶æ kalkulatora
function unliczenie($szll)
{
    $da = split("[ .:-]", $szll);
$unlicz = ($da[0]*3600)+($da[1]*60)+$da[2];
    return $unlicz;
}

# Zamienia czas na Uniksowy
# DZIEN.miesi±c.ROK.godzina.minuta.sekunda
function mkczas_pl($szll){
    $da = split("[ .:-]", $szll);
    $mktt= mktime($da[3],$da[4],$da[5],$da[1],$da[0],$da[2])-$mkczas;
    return $mktt;
}

# Zamienia czas na Uniksowy
# ROK.miesi±c.DZIEN.godzina.minuta.sekunda
function mkczas($szll){
    $da = split("[ .:-]", $szll);    
    $mktt= mktime($da[3],$da[4],$da[5],$da[1],$da[2],$da[0])-$mkczas;
    return $mktt;
}
  
function zap_raport()
{
$zap =" SELECT  v.name AS n_wsi, v.id AS id_wsi,v.mur, v.x,v.y,v.points,v.opis,v.typ,v.data,
v.pik,v.mie,v.axe,v.luk,v.zw,v.lk,v.kl,v.ck,v.tar,v.kat,v.ry,v.sz, t.name AS gracz,t.id AS g_id,v.status
  FROM `village` v, tribe t
  WHERE v.player = t.id";
    return $zap;
}
function zap_mapa()
{
$zap =" SELECT w.id AS id_wsi, w.x, w.y, p.id AS id_User, p.name, a.id AS id_plemie, a.tag, w.name, w.points, w.typ, w.data, w.mur, w.pik, w.mie, w.axe, w.luk, w.zw, w.lk, w.kl, w.ck, w.tar, w.kat, w.ry, w.sz, w.opis
FROM village w, tribe p, ally a 
WHERE w.player = p.id
AND p.ally = a.id ";
    return $zap;
} 

# Ustala kontynent
function ustal_k($x,$y)
{
$k = intval($y /100).intval($x /100);
    return $k;
}
function data_map($rr)
{ global $godzina_zero;
  global $godzina_jeden; 
if($rr==NULL){
     //$ciag = ' Brak Raportu';
}
elseif($rrr<$godzina_jeden && $rr<$godzina_jeden-2592000 )//obecnie - 30dni
{     $ciag ='"Stary raport"'; return 1;
}
elseif($rr<$godzina_jeden && $rr>$godzina_jeden- 1296000 )//obecnie - 15dni
{     $ciag ='"Nowy Rapoirt"'; return 2;}
elseif($rr>$godzina_jeden-172800){ //obecnie -(3) i -3 dni
     $ciag ='"Jeszcze goracy raport"'; return 3;}
}
function url_proxi($str)
{  $str=str_replace('amp;','',base64_decode($str));
   $str= explode("?",$str);
   $str= explode("&",$str[1]);
   for($i=0;count($str)>$i;$i++ )
   { $Get = explode("=",$str[$i]);
     $url[$Get[0]]=$Get[1];
   }
   return $url;
}
function map_color($id_gracz,$id_plemie)
{  global $moje_id;
if($id_gracz==0){return 'sz';}
elseif($id_gracz==$moje_id){ return 'ja';}

switch($id_plemie){
case 23660:	return 'my';       //-BAE-
	//Sojusze
case 4469:	return 'so';	//~ZP~
case 11183:	return 'so';	//&#1769;-MZ-&#1769;
case 23185:	return 'so';	//=MAD=
case 51349:	return 'so';	//ZC
case 51415:	return 'so';	//BM
case 51472:	return 'so';	//DEVILS	
case 51732:	return 'so';	//SmAp

    	//PON
case 51308:	 return 'po';	 //PALS

	//Wrogowie
case 422:	return 'aa';	//RedRub
case 898:	return 'aa';	//**MI**
case 13245:	return 'aa';	//C M
case 48588:	return 'aa';	//NWO
case 51306:	return 'aa';	//ZKG
case 51667:	return 'aa';	//PaL
case 51724:	return 'aa';	//HERO
case 50811:	return 'aa';	//SNRG

	//inne
default:	return 'in';	// inne
break;             }
}


?>
