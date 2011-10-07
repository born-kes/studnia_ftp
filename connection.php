<?php $s='
'; session_start();
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
function xy_wioski($name){
 $name= substr($name ,   strrpos($name, "(")+1 ); 
 $name= substr($name ,0, strrpos($name, ")")   ); 

return $name;}

$co_idzie =array ('1'=>'Wedlug bazy',
                  '9'=>'Zwiad',
                  '18'=>'Piki, Topory, Luki',
                  '22'=>'Miecze',
                  '10'=>'Lekka kawaleria, Lucznicy konni',
                  '11'=>'Ciezka kawaleria',
                  '30'=>'Tarany, katapulty',
                  '35'=>'Szlachta');

# liczy wojsko
function deCode($x)
{
return plCharset(urldecode($x), UTF8_TO_WIN1250);
}
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
function dns($a)
{global $godzina_zero;
 $dnis = intval( (mktime()-$a-$godzina_zero+3500)/86400 );
    if($dnis==1){return $dnis.' dzien ';}
elseif($dnis==0){ $dnis = ((mktime()-$a-$godzina_zero)/3600);
                 if($dnis<0){$dnis*=-1;}
                 if($dnis<(intval($dnis)+0.45)){$dnis=intval($dnis);}else{$dnis=intval($dnis)+0.5;}
                 return $dnis.' godzin';
                }
elseif($dnis<0){$dnis*=-1;}
return $dnis.' dni ';
}
function data_z($rr){ global $godzina_zero; $wynik = date("d.m.Y G:i:s", $rr+$godzina_zero); return $wynik;}
function data_z_bazy($rr,$war =true)
{ global $godzina_zero;
  global $godzina_jeden; if($war)$wynik=data_z($rr);

if($rr==NULL||$rr == $godzina_zero){
     $ciag = '<IMG SRC="../img/z5.gif" title="Nie ma raportu">'; if($war)$ciag .=' Brak Raportu';}
elseif($rr<$godzina_jeden-31362000){
     $ciag =$wynik.' <IMG SRC="../img/z6.gif" title="Raport ma ponad!! '.dns($rr).'"> ';}
elseif($rr<$godzina_jeden-518400 ){
     $ciag =$wynik.' <IMG SRC="../img/z2.gif" title="Raport Stary ma '.dns($rr).'"> ';}
elseif($rr<$godzina_jeden ){
     $ciag =$wynik.' <IMG SRC="../img/z3.gif" title="Raport Nowy ma '.dns($rr).'"> ';}
elseif($rr<mktime()-$godzina_zero ){
     $ciag =$wynik.' <IMG SRC="../img/z1.gif" title="Raport Bardzo Swierzy ma '.dns($rr).'"> ';}
elseif($rr<mktime()-$godzina_zero+200 ){
     if($war)$ciag =' Raport wlasnie dodany. ';}
else{
     $ciag =$wynik.' <IMG SRC="../img/z4.gif" title="Przyszlosc Data za '.dns($rr).'"> ';}
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
{  global $moje_id,$plemiona_strosunki;
if($id_gracz==0){return 'sz';}
elseif($id_gracz==$moje_id){ return 'ja';}


switch($plemiona_strosunki[$id_plemie]){
 case 1:	return 'my';
 case 2:	return 'so';
 case 3:	return 'po';
 case 4:	return 'aa';
default:	return 'in';	// inne
break;             }
}
// dla Proxi
 $funkcja = Array('Niewybrana','Dostep Goscinny','Rozbudowa','Handlarz','Pluskwa','Rozbiorka', 'Tworca nowych wiosek');
function zap($a,$b,$c)
{ $zap = "SELECT ".$a." FROM ".$b." WHERE ".$c.";";
  connection();
     $wynik = @mysql_query($zap)or die('Blad zapytania '.$zap);

       if($r = mysql_fetch_row($wynik)){ $z = $r;}
  destructor();

return $z;
}
function plCharset($string, $type = ISO88592_TO_UTF8) {

    $win2utf = array(
      "\xb9" => "\xc4\x85", "\xa5" => "\xc4\x84",
      "\xe6" => "\xc4\x87", "\xc6" => "\xc4\x86",
      "\xea" => "\xc4\x99", "\xca" => "\xc4\x98",
      "\xb3" => "\xc5\x82", "\xa3" => "\xc5\x81",
      "\xf3" => "\xc3\xb3", "\xd3" => "\xc3\x93",
      "\x9c" => "\xc5\x9b", "\x8c" => "\xc5\x9a",
      "\xbf" => "\xc5\xbc", "\x8f" => "\xc5\xb9",
      "\x9f" => "\xc5\xba", "\xaf" => "\xc5\xbb",
      "\xf1" => "\xc5\x84", "\xd1" => "\xc5\x83"
    );
    $iso2utf = array(
      "\xb1" => "\xc4\x85", "\xa1" => "\xc4\x84",
      "\xe6" => "\xc4\x87", "\xc6" => "\xc4\x86",
      "\xea" => "\xc4\x99", "\xca" => "\xc4\x98",
      "\xb3" => "\xc5\x82", "\xa3" => "\xc5\x81",
      "\xf3" => "\xc3\xb3", "\xd3" => "\xc3\x93",
      "\xb6" => "\xc5\x9b", "\xa6" => "\xc5\x9a",
      "\xbc" => "\xc5\xba", "\xac" => "\xc5\xb9",
      "\xbf" => "\xc5\xbc", "\xaf" => "\xc5\xbb",
      "\xf1" => "\xc5\x84", "\xd1" => "\xc5\x83"
    );

    if ($type == ISO88592_TO_UTF8)
      return strtr($string, $iso2utf);
    if ($type == UTF8_TO_ISO88592)
      return strtr($string, array_flip($iso2utf));
    if ($type == WIN1250_TO_UTF8)
      return strtr($string, $win2utf);
    if ($type == UTF8_TO_WIN1250)
      return strtr($string, array_flip($win2utf));
    if ($type == ISO88592_TO_WIN1250)
      return strtr($string, "\xa1\xa6\xac\xb1\xb6\xbc",
        "\xa5\x8c\x8f\xb9\x9c\x9f");
    if ($type == WIN1250_TO_ISO88592)
      return strtr($string, "\xa5\x8c\x8f\xb9\x9c\x9f",
        "\xa1\xa6\xac\xb1\xb6\xbc");
  }
/* zastosowanie
$imie_1=plCharset($imie_1, WIN1250_TO_UTF8);
$imie_1=plCharset($imie_1, UTF8_TO_WIN1250);
$imie_1=plCharset($imie_1, ISO88592_TO_WIN1250);
*/
?>
