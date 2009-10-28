<html><head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="../img/stamm.css?1251209421">
<script src="../js/scriptt.js" type="text/javascript"></script>
</head>
<body><table class="main" align="center" ><tbody>
<?php
function kukocIsNumeric($txt) {
   $porownanie = '/(?J)			# zezwolenie na nadpisywanie zmiennych
    ^(?:-\040?)?				# opcjonalny minus mozliwy odstep - rozpoznanie odstepu potrzebne
    (?!(?:0[^,\.]))			# dozwolone tylko jedno zero na poczatku - jesli to liczba dziesietna
    (?(?=\d*[,\.]?\d+$)			# IF
          \d*(?P<ulamek>[,\.])?\d+		# jest tylko jeden znak ze zbioru [,\.], rozpoznanie znaku ulamka
       |
          [1-9]				# znakow ze zbioru [,\.] jest wiecej niz 1; wstawia ograniczenie - liczba nie moze zaczac sie od zera
          (?:\d*(?P<separator>[\040,\.]?))?	# rozpoznanie separatora tysiecznego
          (?:\d*(?P=separator)?)*		# szukanie kolejnych separatorow tego samego rodzaju
          (?P<ulamek>[,\.])?\d+		# rozpoznanie znaku ulamka
    )
    $/x';

   if (preg_match($porownanie,$txt,$wyniki)) {
      $ulamek = $separator = null;
      if (isset($wyniki["ulamek"]) && $wyniki["ulamek"] != "") $ulamek = $wyniki["ulamek"];
      if (isset($wyniki["separator"]) && $wyniki["separator"] != "") $separator = $wyniki["separator"];
      return Array($ulamek,$separator);
   }
   else
      return false;
}

  include('../connection.php');
$zapytanie =" SELECT name AS n_wsi, id AS id_wsi, x,y,typ,mur,opis,data,
pik,mie,axe,luk,zw,lk,kl,ck,tar,kat,ry,sz, status
  FROM `village`
  WHERE id=".$_GET[id];
connection();
$wynik = @mysql_query($zapytanie);
/*

*/
if($r = mysql_fetch_array($wynik)){
$obr_pi=(15*$r[pik])+(50*$r[mie])+(10*$r[axe])+(50*$r[luk])+(2*$r[zw])+(30*$r[lk])+(40*$r[kl])+(200*$r[ck])+(20*$r[tar])+(100*$r[kat])+(250*$r[ry])+(100*$r[sz]);
$obr_lk=(45*$r[pik])+(15*$r[mie])+(5*$r[axe])+(40*$r[luk])+(1*$r[zw])+(40*$r[lk])+(30*$r[kl])+(80*$r[ck])+(50*$r[tar])+(50*$r[kat])+(400*$r[ry])+(50*$r[sz]);
$obr_kl=(20*$r[pik])+(40*$r[mie])+(10*$r[axe])+(5*$r[luk])+(2*$r[zw])+(30*$r[lk])+(50*$r[kl])+(180*$r[ck])+(20*$r[tar])+(100*$r[kat])+(150*$r[ry])+(100*$r[sz]);

echo'<TR><TH colspan="2"><a href="javascript:popup_scroll(\''.$include_per.'menu.php?id='.$r[id_wsi].'\',350,380)">'.data_z_bazy($r[data]).'</a></TH></TR>';
echo'<TR><TD>Typ/Grupa</TD><TD> '.$rodzaje[$r[typ]].'</TD></TR>';
if($r[pik]>0){echo '<TR><TD colspan="2"> <IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_spear.png"> '.   $r[pik].'</TD></TR>';}
if($r[mie]>0){echo '<TR><TD colspan="2"> <IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_sword.png"> '.   $r[mie].'</TD></TR>';}
if($r[axe]>0){echo '<TR><TD colspan="2"> <IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_axe.png"> '.     $r[axe].'</TD></TR>';}
if($r[luk]>0){echo '<TR><TD colspan="2"> <IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_archer.png"> '.  $r[luk].'</TD></TR>';}
if($r[zw] >0){echo '<TR><TD colspan="2"> <IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_spy.png"> '.     $r[zw]. '</TD></TR>';}
if($r[lk] >0){echo '<TR><TD colspan="2"> <IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_light.png"> '.   $r[lk]. '</TD></TR>';}
if($r[kl] >0){echo '<TR><TD colspan="2"> <IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_marcher.png"> '. $r[kl]. '</TD></TR>';}
if($r[ck] >0){echo '<TR><TD colspan="2"> <IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_heavy.png"> '.   $r[ck]. '</TD></TR>';}
if($r[tar]>0){echo '<TR><TD colspan="2"> <IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_ram.png"> '.     $r[tar].'</TD></TR>';}
if($r[kat]>0){echo '<TR><TD colspan="2"> <IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_catapult.png"> '.$r[kat].'</TD></TR>';}
if($r[ry] >0){echo '<TR><TD colspan="2"> <IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_knight.png"> '.  $r[ry]. '</TD></TR>';}
if($r[sz] >0){echo '<TR><TD colspan="2"> <IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_snob.png"> ' .   $r[sz]. '</TD></TR>';}
echo'<TR><Th>Opis</Th><TD> '.$r[opis].'</TD></TR>
<TR><Th>Status</Th><TD> '.$status[typ][$r[status]].'</TD></TR>
';

echo '<TR><Th></th><th> <IMG SRC="http://pl5.plemiona.pl/graphic/buildings/wall.png"> ' .   $r[mur].'</Th></TR>';

if($obr_pi>0){echo '<TR><Th colspan="2"> <IMG SRC="http://pl5.plemiona.pl/graphic/unit/def.png"> '       .number_format($obr_pi).'</th></TR>';}
if($obr_lk>0){echo '<TR><Th colspan="2"> <IMG SRC="http://pl5.plemiona.pl/graphic/unit/def_cav.png"> '   .number_format($obr_lk).'</th></TR>';}
if($obr_kl>0){echo '<TR><Th colspan="2"> <IMG SRC="http://pl5.plemiona.pl/graphic/unit/def_archer.png"> '.number_format($obr_kl).'</th></TR>';}

}else{echo'</TABLE><br>blad, wioski niema w bazie';destructor(); exit();}
destructor();
?></tbody></table></body></html>
