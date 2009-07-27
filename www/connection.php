<?php
session_start();
if(!isSet($_SESSION['zalogowany'])){
  $_SESSION['komunikat'] = "Nie jeste¶ zalogowany!";
  include('../logowanie/form.php');
  exit();}
include_once(dirname(dirname(__FILE__)) . '/serwer.php');



function ile_woja($pik, $mie, $axe, $arche,$zw, $lk, $kl, $ck, $tar, $kat, $ryc, $sz){
$wojo= $pik+ $mie+ $axe+ $arche+($zw*2)+ ($lk*4)+ ($kl*5)+ ($ck*6)+($tar*5)+($kat*8)+($ryc*10)+($sz*100);
return $wojo;
}


function rodzaj($rr)
{
$rodzaje = array ('brak typu','wioska off','wioska def','Zwiad','wioska LK','wioska CK','do rozbudowy',);
$wynik = $rodzaje[$rr];
    return $wynik;

}

function potega($podstawa, $wykladnik)
{
    $wynik = $podstawa;
    $i = 1;
    while ($i++ < $wykladnik)
        $wynik *= $podstawa;
    return $wynik;
}
function unliczenie($szll)
{
    $da = split("[ .:-]", $szll);
$unlicz = ($da[0]*3600)+($da[1]*60)+$da[2];
    return $unlicz;

}
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
function mkczas_pl($szll){
    $da = split("[ .:-]", $szll);
    $mktt= mktime($da[3],$da[4],$da[5],$da[1],$da[0],$da[2])-$mkczas;
    return $mktt;
}
function mkczas($szll){
    $da = split("[ .:-]", $szll);    
    $mktt= mktime($da[3],$da[4],$da[5],$da[1],$da[2],$da[0])-$mkczas;
    return $mktt;
}
  
function zap_raport()
{
$zap =" SELECT  v.name AS n_wsi, v.id AS id_wsi,v.mur, v.x,v.y,v.points,v.opis,v.typ,v.data,
v.pik,v.mie,v.axe,v.luk,v.zw,v.lk,v.kl,v.ck,v.tar,v.kat,v.ry,v.sz, t.name AS gracz,t.id AS g_id
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
?>
