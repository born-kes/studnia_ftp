<?php include('../serwer.php'); include('wzor.php');
                                        // http://www.bornkes.w.szu.pl/ram/budowa.php?user=282701&w_id=54580
 $user = $_GET[user];
 $ec =mktime()-$godzina_zero;

// pytanie a taki na gracza
$zapytanie="SELECT COUNT( a.cel ) AS `Rekordow` , t.name, t.id
FROM ws_all v, list_user t, list_ataki a
WHERE v.player = t.id
AND a.`cel` = v.id
AND a.`godz`> $ec
AND t.`id` = $user
GROUP BY t.name
ORDER BY `Rekordow` DESC;";//echo $zapytanie;

connection(); $wynik = @mysql_query($zapytanie); if($r = @mysql_fetch_array($wynik)){$ataki = $r[Rekordow];}else{$ataki=0;} destructor();
function poziom_budowy($a)
{
   global $wzor;
  return $wzor[$a];
}

                             # a = poziom_budowy($rodzaj_budy)
                             # b = $typ
                             # c = $ludzie
function szkolenie($a,$b,$c)
{
  switch ($b)
  {
   case null:  //off
             return null;
             break;
   case '1': //off
              if($a[koszary]>2)
                $string = ' axe ';
              if($a[stajnie]>4 && $c >200)
                $string = ' kl lk ';
              if($a[warsztat]>0 && $c >200)
                 $string = ' tar ';

             return $string;
             break;
   case '2':    // def
              if($a[koszary]>2)
                $string = ' pik mie luk ';
              if($a[stajnie]>9 && $a[kuznia]>14 && $c >200)
                $string = 'zw ck ';
             return $string;
             break;
   case '3':    // zw
              if($a[stajnie]>4)
                $string = ' zw ';
             return $string;
             break;
   case '4':  //lk
              if($a[stajnie]>5 && $a[kuznia]>5)
                $string = 'lk kl ';
            return $string;
            break;
   case '5':  //ck
              if($a[stajnie]>9 && $a[kuznia]>14 && $c >200)
                $string = 'zw ck ';
            return $string;
            break;
   default:
            break;
   }
}
function test_budowy($poziom,$ludzie)
{//mini
$string='';
if($ludzie<5){return $string;}
global $budowa; foreach($poziom as $v => $y){
 if($budowa[$v]<$y)
  { $string .= $v.' ';
  }
}
return $string;
}

if( $_GET[id]!=NULL){
 $w_id= $_GET[id];

$zap="SELECT b.ratusz, b.koszary, b.stajnie, b.warsztat, b.palac, b.kuznia, b.plac, b.piedestal, b.rynek, b.tartak, b.cegielnia, b.huta, b.zagroda, b.spichlerz, b.schowek, b.mur, b.status, b.ludzie, m.typ 
FROM ws_all w
LEFT JOIN `budy` `b`      ON b.id=w.id
LEFT JOIN `ws_mobile` `m` ON m.id=w.id
Where b.id= $w_id";
//echo $zap.'<br>';

     connection();
       if(!$wynik=@mysql_query($zap))
       {echo 'error id'; destructor();}
if($nowy = @mysql_fetch_array($wynik)){

$budowa["ratusz"]   = $nowy[0];
$budowa["koszary"]  = $nowy[1];
$budowa["stajnie"]  = $nowy[2];
$budowa["warsztat"] = $nowy[3];
$budowa["palac"]    = $nowy[4];
$budowa["kuznia"]   = $nowy[5];
$budowa["plac"]     = $nowy[6];
$budowa["piedestal"]= $nowy[7];
$budowa["rynek"]    = $nowy[8];
$budowa["tartak"]   = $nowy[9];
$budowa["cegielnia"]= $nowy[10];
$budowa["huta"]     = $nowy[11];
$budowa["zagroda"]  = $nowy[12];
$budowa["spichlerz"]= $nowy[13];
$budowa["schowek"]  = $nowy[14];
$budowa["mur"]      = $nowy[15];

$rodzaj_budy =$nowy[status];
$ludzie =$nowy[ludzie];
$typ=$nowy[typ];
}
destructor();

}



//                          ratusz lv
$li=0;
echo '<input name="id_wsi_baza" id="id_wsi_baza" value="'.$_GET[id].'" size="5" type="text">';
echo '<textarea name="v'.$li.'" id="v'.$li++.'" rows="2" cols="15">';
if(test_budowy($wzor[0],$ludzie)!=null ){echo test_budowy($wzor[0],$ludzie);}else{echo test_budowy(poziom_budowy($rodzaj_budy),$ludzie);}
echo '</textarea>';
echo '<textarea name="v'.$li.'" id="v'.$li++.'" rows="2" cols="15">'.szkolenie($wzor[$rodzaj_budy],$typ,$ludzie).'</textarea>';
echo '<input name="ataki_player" id="ataki_player" value="'.$ataki.'" size="5" type="text">';


//ataki?
 ?>