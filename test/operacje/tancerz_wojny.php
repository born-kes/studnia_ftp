<?php   include('../connection.php'); ?>
<html><head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="stamm.css">
<script src="../mootools.js" type="text/javascript"></script>
<script src="../scriptt.js" type="text/javascript"></script>
</head>
<body><br /><table class="vis"><?PHP
if($_POST!=NULL)
{
$os=0;
    $hr='<tr><td colspan="3"><hr /></td></tr>';
 $p=" AND ";
$zap=" SELECT  v.id , v.x, v.y, v.status, v.wolny
  FROM `village` v, tribe t
  WHERE v.player = t.id";

    // czas ataku
$cos = $_POST[wojsko]; // tepo marszu


    // zwiur agresora
$zap_a=$zap; $a=0;

if($_POST[a_xy]!=NULL && $_POST[a_oko]!=NULL){$a++;
$oko_a = addslashes(urldecode($_POST[a_oko]));
$xy_ag = explode("|",$_POST[a_xy]);
$odx_a= $xy_ag[0]-$oko_a;          $dox_a= $xy_ag[0]+$oko_a;
$ody_a= $xy_ag[1]-$oko_a;          $doy_a= $xy_ag[1]+$oko_a;

$zap_a.=$p."v.x>'$odx_a'
        AND v.x<'$dox_a'
        AND v.y>'$ody_a'
        AND v.y<'$doy_a'";}
elseif($_POST[a_xy]!=NULL){$a++;
$xy_ag = explode("|",$_POST[a_xy]);
$zap_a.=$p."v.x='$xy_ag[0]'
        AND v.y='$xy_ag[1]'";}

if($_POST[agracz]!=NULL){$a++;
$gracz_a = $_POST[agracz];
$zap_a.=$p." t.name='$gracz_a';";}

if($_POST[typ]!=NULL) {$zap_a.= $p."v.typ=".$_POST[typ]; $a++;}
if($a==0) {echo 'Agresor nie okreslony'; exit();}
 
 connection();
$wynik = @mysql_query($zap_a); $i=0;
while($r = @mysql_fetch_array($wynik))
{   $agresor[id][$i]=$r[id];
    $agresor[x][$i]=$r[x];
    $agresor[y][$i]=$r[y];
    $agresor[wolny][$i++]=$r[wolny];

}
    // zbiur obroncy
$zap_o=$zap; $o=0;
if($_POST[ogracz]!=NULL){ $o++;
$gracz_o = addslashes(urldecode($_POST[ogracz]));
$zap_o.= $p." t.name='$gracz_o' ";}

if($_POST[o_xy]!=NULL && $_POST[o_oko]!=NULL){$o++;
$oko_o = $_POST[o_oko];
$xy_ob = explode("|",$_POST[o_xy]);

$odx_o= $xy_ob[0]-$oko_o;          $dox_o= $xy_ob[0]+$oko_o;
$ody_o= $xy_ob[1]-$oko_o;          $doy_o= $xy_ob[1]+$oko_o;

$zap_o.=$p."v.x>'$odx_o'
       AND v.x<'$dox_o'
       AND v.y>'$ody_o'
       AND v.y<'$doy_o'";}
elseif($_POST[o_xy]!=NULL){$o++;
$xy_ob = explode("|",$_POST[o_xy]);
$zap_o.=$p."v.x='$xy_ob[0]'
        AND v.y='$xy_ob[1]'";
}

if($o==0){echo "Obronca nieokreslony"; exit();}

 connection();
$wynik = @mysql_query($zap_o);$i=0;
while($r = @mysql_fetch_array($wynik))
{   $obrona[id][$i]=$r[id];
    $obrona[x][$i]=$r[x];
    $obrona[y][$i]=$r[y];
    $obrona[wolny][$i++]=$r[wolny];
}

if($_POST[czas1]==NULL){echo "Podaj date dotarcia do celu"; exit(); }
 $mk_ruznica = mkczas_pl($_POST[czas1])-mktime();    // ile czasu ma wojsko na marsz...

 for($i=0;$i<count($agresor[x]);$i++){
  //   echo  $cos.' <br>';

if($cos!=1){$odzc = $mk_ruznica/($cos*60);  $ggg= 300 /($cos*60); $szb=($cos*60);}
else{ if($agresor[wolny][$i]==0||$agresor[wolny][$i]==NULL){continue;}
$szb=($agresor[wolny][$i]*60);
  $odzc = $mk_ruznica/($agresor[wolny][$i]*60);
  $ggg= 300 /($agresor[wolny][$i]*60);
     }  // Odleg³osc policzona z czasu

  $echo = '<tr><th>'. $agresor[x][$i].'|'.$agresor[y][$i].'</th><td> => </td></tr>';
   //  echo $echo.' <br>';
             for($j=0;$j<count($obrona[x]);$j++)
             {
                $odleglosc=sqrt(potega($obrona[x][$j]-$agresor[x][$i],2)+potega($obrona[y][$j]-$agresor[y][$i],2));

                 if($odzc-$ggg<$odleglosc && $odleglosc<$odzc+($ggg/2) )
                 {$os++;
  $echo_1.= '<tr class="units_home" ><th></td></th><td>'.$obrona[x][$j].'|'.$obrona[y][$j].'</td><td><a href="http://pl5.plemiona.pl/game.php?village='.$agresor[id][$i].'&amp;screen=place&amp;mode=command&amp;target='.$obrona[id][$j].'" target="_parent/ramka">wyslij TERAZ</a></td></tr>';
                 }    // teraz lub pu¼niej                        // teraz nie wcze¶niej
                 elseif($odzc-($ggg*4)<$odleglosc && $odleglosc<$odzc-$ggg )
                 {$os++;
$xz= $mk_ruznica-($odleglosc*$szb)+mktime();
  $echo_2 .= '<tr><td></td><td class="selected">'.$obrona[x][$j].'|'.$obrona[y][$j].'</td><th><a href="http://pl5.plemiona.pl/game.php?village='.$agresor[id][$i].'&amp;screen=place&amp;mode=command&amp;target='.$obrona[id][$j].'" target="_parent/ramka">wyslij o '.date("G:i:s",$xz).'</a></th></tr>';
                 }
                 elseif($odzc-($ggg*5)<$odleglosc && $odleglosc<$odzc-($ggg*4) )
                 {$os++;
$xz= $mk_ruznica-($odleglosc*$szb)+mktime();
  $echo_3 .= '<tr><td></td><td class="selectt">'.$obrona[x][$j].'|'.$obrona[y][$j].'</td><th><a href="http://pl5.plemiona.pl/game.php?village='.$agresor[id][$i].'&amp;screen=place&amp;mode=command&amp;target='.$obrona[id][$j].'" target="_parent/ramka">wyslij o '.date("G:i:s",$xz).'</a></th></tr>';
                 }
             }
if($echo_1!=NULL||$echo_2!=NULL){echo $echo.$echo_1.$echo_2.$echo_3.$hr;
$echo_1=$null;$echo_2=$null;}
}  
if($os==0){echo ' <h4 align="center"> Niema powiazan dla najblizszych 30 minut </h4>';}
}else{echo ' <h4 align="center"> Brak Danych</h4>';}
?></table>