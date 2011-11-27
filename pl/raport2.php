<?php include('../connection.php');
if($_GET[yes]==null){
 ?><html><head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="../img/stamm.css?1251209421">
<script src="../js/scriptt.js" type="text/javascript"></script>
</head><style type="text/css">
<!--

  BODY {background: #F7EED3;}
table.main { background-color:#F7EED3; border:0px solid #804000;}
table.ba { border-bottom:0px;}
table.main td{font-size:11px;}
table.main th{font-size:11px;}
table.main tr.row th{font-size:11px;}
table.main tr.row td { background-color:#006600; background-image:none; color:#F1EBDD;}
table.main tr.row td.hidden { color:#333366; }
tr.center td { text-align:center; }


-->
</style>
<body><?php }
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

  if($_GET[id]!=NULL){ $zap =$_GET[id];}else
  if($_GET[xy]!=NULL){
       $xy = explode("|",$_GET['xy']);
          $zap ="SELECT id FROM `ws_all` WHERE x='".$xy[0]."' AND y='".$xy[1]."' limit 1; ";
connection();
$wynik = @mysql_query($zap);if($r = @mysql_fetch_array($wynik)){ $zap=$r[id];}
  destructor();
  include('r_user.php'); }

  $zapytanie =" SELECT id AS id, mur,data,
pik,mie,axe,luk,zw,lk,kl,ck,tar,kat,ry,sz, status,d_mur
  FROM `ws_raport`
  WHERE id=".$zap.' limit 1';
// echo $zapytanie;
connection();
$wynik = @mysql_query($zapytanie);
$rap_raport= '<table class="main" align="center" ><tbody>';

if($r = @mysql_fetch_array($wynik)){
//Obrona od pik/lk/kl
$MUR=Array(0.04,0.08,0.12,0.16,0.20,0.24,0.29,0.34,0.39,0.44,0.49,0.55,0.60,0.66,0.72,0.79,0.85,0.92,0.99,1.07);

$rap_pi=(15*$r[pik])+(50*$r[mie])+(10*$r[axe])+(50*$r[luk])+(2*$r[zw])+(30*$r[lk])+(40*$r[kl])+(200*$r[ck])+(20*$r[tar])+(100*$r[kat])+(250*$r[ry])+(100*$r[sz]);
$rap_lk=(45*$r[pik])+(15*$r[mie])+(5*$r[axe])+(40*$r[luk])+(1*$r[zw])+(40*$r[lk])+(30*$r[kl])+(80*$r[ck])+(50*$r[tar])+(50*$r[kat])+(400*$r[ry])+(50*$r[sz]);
$rap_kl=(20*$r[pik])+(40*$r[mie])+(10*$r[axe])+(5*$r[luk])+(2*$r[zw])+(30*$r[lk])+(50*$r[kl])+(180*$r[ck])+(20*$r[tar])+(100*$r[kat])+(150*$r[ry])+(100*$r[sz]);

$rap_raport.='<tr><th>'.data_z_bazy($r[data]).'</th></tr>';
$rap_raport.='<tr><th>Status</th></tr><tr><th> '.$statuss[typ][$r[status]].'</th></tr><tr><td>';
if($r[pik]>0){$rap_raport.= '<IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_spear.png" alt="pikinier" > '.   $r[pik].'<br />';}
if($r[mie]>0){$rap_raport.= '<IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_sword.png" alt="miecz" > '.   $r[mie].'<br />';}
if($r[axe]>0){$rap_raport.= '<IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_axe.png" alt="topory" > '.     $r[axe].'<br />';}
if($r[luk]>0){$rap_raport.= '<IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_archer.png" alt="luki" > '.  $r[luk].'<br />';}
if($r[zw] >0){$rap_raport.= '<IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_spy.png" alt="zwiad" > '.     $r[zw]. '<br />';}
if($r[lk] >0){$rap_raport.= '<IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_light.png" alt="lk" > '.   $r[lk]. '<br />';}
if($r[kl] >0){$rap_raport.= '<IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_marcher.png" alt="kl" > '. $r[kl]. '<br />';}
if($r[ck] >0){$rap_raport.= '<IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_heavy.png" alt="ck" > '.   $r[ck]. '<br />';}
if($r[tar]>0){$rap_raport.= '<IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_ram.png" alt="tarany" > '.     $r[tar].'<br />';}
if($r[kat]>0){$rap_raport.= '<IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_catapult.png" alt="katapulty" > '.$r[kat].'<br />';}
if($r[ry] >0){$rap_raport.= '<IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_knight.png" alt="rycerz" > '.  $r[ry]. '<br />';}
if($r[sz] >0){$rap_raport.= '<IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_snob.png" alt="szlachta" > ' .   $r[sz]. '<br />';}
$rap_raport.='</td></tr>';
if($r[mur]!=NULL){ if($r[d_mur]>0){$data_muru = '<br>'.data_z_bazy($r[d_mur]);}
$rap_raport.=  '<TR><th> <IMG SRC="http://pl5.plemiona.pl/graphic/buildings/wall.png" alt="lv muru" > ' . $r[mur].' lv'.$data_muru.'</Th></TR>';}
if($r[mur]!=NULL&&$r[mur]!=0){$rap_pi += $rap_pi*$MUR[$r[mur]];$rap_lk += $rap_lk*$MUR[$r[mur]];$rap_kl += $rap_kl*$MUR[$r[mur]];  }

       $def= $r[pik]+$r[mie]+$r[luk]+($r[ck]*6);
   if($def>20000){ $str='('.intval($def/20000).')';}else if($def>2000){$str='(0,'.intval($def/2000).'0%)';}

if($rap_pi>0){$rap_raport.=  '<TR><Th> Obrona '.$str.'</th></TR>';}
if($rap_pi>0){$rap_raport.=  '<TR><Th> <IMG SRC="http://pl5.plemiona.pl/graphic/unit/def.png?1"> '       .number_format($rap_pi).'</th></TR>';}
if($rap_lk>0){$rap_raport.=  '<TR><Th> <IMG SRC="http://pl5.plemiona.pl/graphic/unit/def_cav.png?1"> '   .number_format($rap_lk).'</th></TR>';}
if($rap_kl>0){$rap_raport.=  '<TR><Th> <IMG SRC="http://pl5.plemiona.pl/graphic/unit/def_archer.png?1"> '.number_format($rap_kl).'</th></TR>';}
$rap_raport.='</tbody></table>';
}else{$rap_raport.='<tr><td>wioski niema w bazie</td><td></tbody></table>';}
destructor();



$zapytanie =" SELECT id, data,
pik,mie,axe,luk,zw,lk,kl,ck,tar,kat,ry,sz, typ
  FROM `ws_mobile`
  WHERE id=".$zap.' limit 1';
 // echo $zapytanie;
connection();
$wynik = @mysql_query($zapytanie);
if($r = @mysql_fetch_array($wynik)){
$mob_raport ='<table class="main"><tbody>';
$mob_pi=(10*$r[pik])+(25*$r[mie])+(40*$r[axe])+(15*$r[luk])+(150*$r[ry])+(30*$r[sz]);
$mob_lk=(2*$r[zw])+(130*$r[lk])+(150*$r[ck]);
$mob_kl=(15*$r[luk])+(120*$r[kl]);

$mob_raport .='<tr><th>'.data_z_bazy($r[data]).'</th></tr>';
$mob_raport .='<tr><th>Typ/Grupa</th></tr><tr><th> '.$rodzaje[$r[typ]].'</th></tr><tr><td>';
if($r[pik]>0){$mob_raport .= '<IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_spear.png"> '.   $r[pik].'<br />';}
if($r[mie]>0){$mob_raport .= '<IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_sword.png"> '.   $r[mie].'<br />';}
if($r[axe]>0){$mob_raport .= '<IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_axe.png"> '.     $r[axe].'<br />';}
if($r[luk]>0){$mob_raport .= '<IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_archer.png"> '.  $r[luk].'<br />';}
if($r[zw] >0){$mob_raport .= '<IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_spy.png"> '.     $r[zw]. '<br />';}
if($r[lk] >0){$mob_raport .= '<IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_light.png"> '.   $r[lk]. '<br />';}
if($r[kl] >0){$mob_raport .= '<IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_marcher.png"> '. $r[kl]. '<br />';}
if($r[ck] >0){$mob_raport .= '<IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_heavy.png"> '.   $r[ck]. '<br />';}
if($r[tar]>0){$mob_raport .= '<IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_ram.png"> '.     $r[tar].'<br />';}
if($r[kat]>0){$mob_raport .= '<IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_catapult.png"> '.$r[kat].'<br />';}
if($r[ry] >0){$mob_raport .= '<IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_knight.png"> '.  $r[ry]. '<br />';}
if($r[sz] >0){$mob_raport .= '<IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_snob.png"> ' .   $r[sz]. '<br />';}
$mob_raport .= '</td></tr>';
if($mob_pi>0){$mob_raport .= '<TR><Th> Atak </th></TR>';}
if($mob_pi>0){$mob_raport .= '<TR><Th> <IMG SRC="http://pl5.plemiona.pl/graphic/unit/def.png?1"> '       .number_format($mob_pi).'</th></TR>';}
if($mob_lk>0){$mob_raport .= '<TR><Th> <IMG SRC="http://pl5.plemiona.pl/graphic/unit/def_cav.png?1"> '   .number_format($mob_lk).'</th></TR>';}
if($mob_kl>0){$mob_raport .= '<TR><Th> <IMG SRC="http://pl5.plemiona.pl/graphic/unit/def_archer.png?1"> '.number_format($mob_kl).'</th></TR>';}
$mob_raport .='</tbody></table>';
}
?>
<table class="main">
  <tbody>
    <tr>
      <th>W Wiosce</th><th>Mobilne</th>
    </tr>
    <tr>
      <td valign="top" ><?PHP echo $rap_raport; ?></td><td valign="top" ><?PHP echo $mob_raport; ?></td>
    </tr>
  </tbody>
</table>
<?  $ec =mktime()-$godzina_zero;

  $zap ="SELECT  a.`cel` , v.x, v.y, a.godz, t.name,a.kto
       FROM list_ataki a, ws_all v, list_user t
       WHERE a.`pochodzenie` = v.id
       AND a.cel = $_GET[id]
       AND t.id = a.kto
       AND a.godz>$ec
       ORDER BY a.godz ASC";   //echo $zap;
   $cell=null;
$gstr='<table></tr><th colspan="3">Ataki na wioske</th></tr>';
$stor=$gstr;
  connection();   $wynik = @mysql_query($zap);
  while($r = @mysql_fetch_array($wynik)){
 $stor.='
 <tr>
  <td><b><--</b> <a href="http://pl5.plemiona.pl/game.php?village='.$_GET[id].'&screen=map&x='.$r[x].'&y='.$r[y].'" target="_blank">'.$r[x].'|'.$r[y].' </a></td>
  <td>(<i> <a href="http://pl5.plemiona.pl/game.php?village='.$_GET[id].'&screen=info_player&id='.$r[kto].'" target="_blank">'.urldecode($r[name]).' </a></i>)</td>
  <td> '.data_z_bazy($r[godz]).' </td>
 </tr>';}
  destructor();
if($stor!=$gstr){$stor.='</table>'; echo $stor;}

if($_GET[yes]==null){ ?>
</body></html><?PHP } ?>