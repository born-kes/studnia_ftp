<?php include('../connection.php');
$img = 'http://pl5.plemiona.pl/graphic/';
            //tempo,angielska nazwa, polska nazwa, skrot
$serwWojsko=Array("Tempo"=>Array(0,
                                 18,
                                 22,
                                 18,
                                 18,
                                 9 ,
                                 10,
                                 10,
                                 11,
                                 30,
                                 30,
                                 10,
                                 35
                                 ),

                  "aName"=>Array('brak',
                                 'spear'   ,
                                 'sword'   ,
                                 'axe'     ,
                                 'archer'  ,
                                 'spy'     ,
                                 'light'   ,
                                 'marcher' ,
                                 'heavy'   ,
                                 'ram'     ,
                                 'catapult',
                                 'knight'  ,
                                 'snob'
                                 ),

                  "Name" =>Array('brak',
                                 'Pikinier',
                                 'Miecznik',
                                 'Topornik',
                                 'Lucznik',
                                 'Zwiadowca',
                                 'LK',
                                 'KL',
                                 'CK',
                                 'Taran',
                                 'Katapulta',
                                 'Rycerz',
                                 'Szlachcic'
                                ),
                  "Skrot"=>Array('',
                                 'pik',
                                 'mie',
                                 'top',
                                 'luk',
                                 'zw',
                                 'kl',
                                 'kl',
                                 'ck',
                                 'tar',
                                 'kat',
                                 'ry',
                                 'sz'
                                 )
                 );
$serwStatus=Array("Nazwa"=> Array (
                                  'Niewybrana',
                                  'Niebroniona',
                                  'Oddzial',
                                  'Posterunek',
                                  'Warownia',
                                  'Twierdza',
                                  'Bunkier',
                                  'BUNKIER'
                                  ),
                  "Obrona"=>Array (
                                   "niewybrano",
                                   0.4,
                                   1,
                                   3,
                                   6,
                                   10,
                                   30,
                                   'niewiadomo'
                                   )
                  );
$MUR=Array(0.04,0.08,0.12,0.16,0.20,0.24,0.29,0.34,0.39,0.44,0.49,0.55,0.60,0.66,0.72,0.79,0.85,0.92,0.99,1.07);

  if($_GET[id]!=NULL){ $idWsi =aut($_GET[id]);}else exit();

$zapSzkielet =" SELECT id AS id,data,
   pik,mie,axe,luk,zw,lk,kl,ck,tar,kat,ry,sz";

$zapRozszerzenieR = ", status, mur,d_mur
  FROM `ws_raport`
  WHERE id=".$idWsi.' limit 1';
$zapRozszerzenieM = ", typ
  FROM `ws_mobile`
  WHERE id=".$idWsi.' limit 1';

function img($ile,$nr){ global $serwWojsko,$img;
    if($ile>0)return '<IMG SRC="'.$img.'unit/unit_'.$serwWojsko["aName"][$nr].'.png" alt="'.$serwWojsko["Name"][$nr].'" > '.$ile.'<br />';
}
$wioskaRaport=false;
$wioskaMobil =false;
connection();

$wynik = @mysql_query($zapSzkielet.$zapRozszerzenieR);
if($r = @mysql_fetch_array($wynik)){   $wioskaRaport=true;

//Obrona od pik/lk/kl
$sumaObronyPiechoty =(15*$r[pik])+(50*$r[mie])+(10*$r[axe])+(50*$r[luk])+(2*$r[zw])+(30*$r[lk])+(40*$r[kl])+(200*$r[ck])+(20*$r[tar])+(100*$r[kat])+(250*$r[ry])+(100*$r[sz]);
$sumaObronyKawaleria=(45*$r[pik])+(15*$r[mie])+(5*$r[axe])+(40*$r[luk])+(1*$r[zw])+(40*$r[lk])+(30*$r[kl])+(80*$r[ck])+(50*$r[tar])+(50*$r[kat])+(400*$r[ry])+(50*$r[sz]);
$sumaObronyLuki     =(20*$r[pik])+(40*$r[mie])+(10*$r[axe])+(5*$r[luk])+(2*$r[zw])+(30*$r[lk])+(50*$r[kl])+(180*$r[ck])+(20*$r[tar])+(100*$r[kat])+(150*$r[ry])+(100*$r[sz]);

$rapWojska.= img($r[pik],1).
              img($r[mie],2).
              img($r[axe],3).
              img($r[luk],4).
              img($r[zw] ,5).
              img($r[lk] ,6).
              img($r[kl] ,7).
              img($r[ck] ,8).
              img($r[tar],9).
              img($r[kat],10).
              img($r[ry] ,11).
              img($r[sz] ,12);

if($r[mur]!=NULL){
    $sumaObronyPiechoty  += $sumaObronyPiechoty *$MUR[$r[mur]];
    $sumaObronyKawaleria += $sumaObronyKawaleria*$MUR[$r[mur]];
    $sumaObronyLuki      += $sumaObronyLuki *    $MUR[$r[mur]];
}

       $def= $r[pik]+$r[mie]+$r[luk]+(6*$r[ck])+(8*$r[kat]);
   if($def>20000){
    $str='('.intval($def/20000).')';
   }else if($def>2000){
    $str='(0,'.intval($def/2000).'0%)';
   }else $str='(0,0'.intval($def/200).'%)';
}


$wynik = @mysql_query($zapSzkielet.$zapRozszerzenieM);

if($m = @mysql_fetch_array($wynik)){
$wioskaMobil=true;
$silaAtakuPiechoty =(10*$m[pik])+(25*$m[mie])+(40*$m[axe])+(15*$m[luk])+(150*$m[ry])+(30*$m[sz]);
$silaAtakuKawaleri =( 2*$m[zw] )+(130*$m[lk])+(150*$m[ck]);
$silaAtakuLucznikow=(15*$m[luk])+(120*$m[kl]);
$sumaAtaku = $silaAtakuPiechoty+$silaAtakuKawaleri+$silaAtakuLucznikow;
$rapWojskaMobil= img($m[pik],1).
              img($m[mie],2).
              img($m[axe],3).
              img($m[luk],4).
              img($m[zw] ,5).
              img($m[lk] ,6).
              img($m[kl] ,7).
              img($m[ck] ,8).
              img($m[tar],9).
              img($m[kat],10).
              img($m[ry] ,11).
              img($m[sz] ,12);

       $ata= $m[axe]+(4*$m[lk])+(5*$m[kl])+(6*$m[ck])+(5*$m[tar])+(8*$m[kat]);
   if($ata>20000){
    $strAtak='('.intval($ata/200).'%)';
   }else if($ata>2000){
    $strAtak='(0,'.intval($ata/2000).'0%)';
   }else
    $strAtak='(0,0'.intval($ata/200).'%)';
}

  $ec =mktime()-$godzina_zero;

  $zap ="SELECT  a.`cel` , v.x, v.y, a.godz, t.name,a.kto
       FROM list_ataki a, ws_all v, list_user t
       WHERE a.`pochodzenie` = v.id
       AND a.cel = $idWsi
       AND t.id = a.kto
       AND a.godz>$ec
       ORDER BY a.godz ASC";   //echo $zap;
   $cell=false;
$gstr='<table width="100%"><th colspan="3">Ataki na wioske</th></tr>';
   $wynik = @mysql_query($zap);
  while($h = @mysql_fetch_array($wynik)){$cell=true;
 $gstr.='
 <tr>
  <td> <b><--</b> <a href="http://pl5.plemiona.pl/game.php?village='.$idWsi.'&screen=map&x='.$h[x].'&y='.$h[y].'" target="_blank">'.$h[x].'|'.$h[y].' </a></td>
  <td>(<i> <a href="http://pl5.plemiona.pl/game.php?village='.$idWsi.'&screen=info_player&id='.$h[kto].'" target="_blank">'.urldecode($h[name]).' </a></i>)</td>
  <td> '.data_z_bazy($h[godz]).' </td>
 </tr>';}
  destructor();
$gstr.='</table>';
include("html/raport.php");
?>