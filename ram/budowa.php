<?php include('../connection.php'); include('wzor.php');
                                        // http://www.bornkes.w.szu.pl/ram/budowa.php?user=282701&w_id=54580
  if($_GET[user]!=NULL){ $user = $_GET[user];  }
else{ $user = $_POST[user]; 
; }




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
              if($a[koszary]>2 && $c >1)
                $string = ' axe ';
              if($a[stajnie]>4 && $c >200)
                $string = ' kl lk ';
              if($a[warsztat]>0 && $c >200)
                 $string = ' tar ';

             return $string;
             break;
   case '2':    // def
              if($a[koszary]>2 && $c >1)
                $string = ' pik mie luk ';
              if($a[stajnie]>9 && $a[kuznia]>14 && $c >200)
                $string = 'zw ck ';
             return $string;
             break;
   case '3':    // zw
              if($a[stajnie]>4 && $c >2)
                $string = ' zw ';
             return $string;
             break;
   case '4':  //lk
              if($a[stajnie]>5 && $a[kuznia]>5 && $c >4)
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
//test_budowy($wzor[0],$ludzie)
function test_b($ludzie)
{
 global $rodzaj_budy; global $wzor; 
  for($i=0;$i<$rodzaj_budy+1;$i++)
  {
    if(test_budowy($wzor[$i],$ludzie)!=''){return test_budowy($wzor[$i],$ludzie);}
  }
}
function test_budowy($poziom,$ludzie)
{//mini
$string='';
if($ludzie<5){return $string;}

 global $budowa;
 foreach($poziom as $v => $y)
 {
  if($budowa[$v]<$y)
   {
     $string .= $v.' ';
   }
}
return $string;
}

if( $_GET[id]!=NULL){  $w_id= $_GET[id];  }
else{ 
$url = explode('=',$_POST['href']);
$url = url_proxi($url[1]);
$w_id = $url['village']; }

if($w_id!=NULL){
$zap="
SELECT b.ratusz, b.koszary, b.stajnie, b.warsztat, b.palac, b.kuznia, b.plac, b.piedestal, b.rynek, b.tartak, b.cegielnia, b.huta, b.zagroda, b.spichlerz, b.schowek, b.mur, b.status, b.ludzie,
 m.typ, COUNT( a.cel ) AS `ataki` 
FROM ws_all w
LEFT JOIN `budy` `b`      ON b.id=w.id
LEFT JOIN `ws_mobile` `m` ON m.id=w.id
LEFT JOIN `list_ataki` a  ON a.`cel` = w.id AND a.`godz`> $ec
Where b.id= $w_id
GROUP BY a.cel
ORDER BY a.cel DESC";
//echo $zap.'<br>';

     connection();
       if(!$wynik=@mysql_query($zap))
       {echo 'error id'; destructor();}
if($nowy = @mysql_fetch_array($wynik)){
$w_ataki            = $nowy['ataki'];
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
$rodzaj_budy=6;

echo '<input name="href" id="href" value="'.$_POST['href'].'" type="hidden">';
echo '<input name="nr_wsi" id="nr_wsi" value="" type="hidden">';

//                          ratusz lv
$li=0;
echo '<input name="id_wsi_baza" id="id_wsi_baza" value="'.$w_id.'" size="5" type="text"><br>';
echo '<textarea name="v'.$li.'" id="v'.$li++.'" rows="2" cols="15">';
if(test_b($ludzie)!=null ){echo test_b($ludzie);}
echo '</textarea><br>';
echo '<textarea name="v'.$li.'" id="v'.$li++.'" rows="2" cols="15">'.szkolenie($wzor[$rodzaj_budy],$typ,$ludzie).'</textarea><br>';
echo '<input name="ataki_player" id="ataki_player" value="'.$ataki.'" size="5" type="text"><br>';
echo '<input name="w_ataki" id="w_ataki" value="'.$w_ataki.'" size="5" type="text"><br>';


//ataki?
 ?>