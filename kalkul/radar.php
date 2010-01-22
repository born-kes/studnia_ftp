<?PHP   include('../connection.php'); ?><html><head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<script src="../js/ts_picker.js" type="text/javascript"></script>
<style type="text/css">
<!--
BODY {background: #F7EED3;}
a:link	{ font-weight:bold; color: #804000; text-decoration:none; }
a:visited	{  font-weight:bold; color: #804000; text-decoration:none; }
a:active	{  font-weight:bold; color: #0082BE; text-decoration:none; }
a:hover { font-weight:bold; color: #0082BE; text-decoration:none; }

table.main { background-color:#F7EED3; border:0px solid #804000;}
table.ba { border-bottom:0px;}
table.main td{font-size:11px;}
table.main th{font-size:11px;}
table.main tr.row th{font-size:11px;}
table.main tr.row td { background-color:#006600; background-image:none; color:#F1EBDD;}    //DED3B9
table.main tr.row td.hidden { color:#333366; }
tr.center td { text-align:center; }
-->
</style></head>
<body><?php
if($_GET==NULL && $_POST==NULL){echo 'Brak Danych do obliczen';exit();}

       function odleglosc($x,$y)
       {    global $xy_ag;
         $fin=  sqrt(potega($x-$xy_ag[0],2)+potega($y-$xy_ag[1],2));
         return $fin;
       }
if($_POST!=NULL)
{		$vi=$_POST[id]; $time=$_POST[czas1];
if($time==NULL){
echo 'Data nie wybrana wiêc zak³adam 4 godziny.';
					$mk_ruznica = 14400;     // ile czasu ma wojsko na marsz...}
}elseif(strpos($time,'.')===false && strpos($time,':')===false ){
					$mk_ruznica=$time*60*60;
}elseif(strpos($time,'.')===false && strpos($time,':')!==false){
					$t=explode(':',$time); $d[0]=date("G");$d[1]=date("i");
if(intval($t[0])>intval($d[0])){	$mk_ruznica = mkczas_pl(date("d.m.Y ").$t[0].':'.$t[1].':00')-mktime();  /*godzina dzis ale puzniej*/}else
if(intval($t[0])<=intval($d[0])){	$mk_ruznica = mkczas_pl(date("d.m.Y ",mktime()+86400).$t[0].':'.$t[1].':00')-mktime();  /*godzina dzis ale puzniej*/}
}else{
					$mk_ruznica = mkczas_pl($_POST[czas1])-mktime();     // ile czasu ma wojsko na marsz...
}

echo data_z_bazy($mk_ruznica+mktime()-$godzina_zero);
$cos = 9;//$_POST[wojsko];              // predkosc maszru

$gracz = $_POST[gracz];             // gracz którego atakujemy

$xy_ag = explode("|",$_POST[xy]);   // wioska wysy³ajaca wojsko          => id wioski

$xy_ob = explode("|",$_POST[xy]);  // wioska do której ma dotrzec       => id Wioski

$p=" AND ";
$zap= " SELECT  name AS n_wsi, w.id AS id_wsi,x,y,pik,mie,axe,luk,zw,lk,kl,ck,sz
  FROM ws_all w
LEFT JOIN ws_mobile wm ON wm.id = w.id
  WHERE player = '$gracz'";


// $mxo = $max_odleglosc = intval($mk_ruznica/(11*60));
               // z jak daleka maja isc wojska

      if($_POST[co]=='sz'){$zap.=$p."sz>0";$mxo=intval($mk_ruznica/(35*60));if($mxo>70){$mxo=70;}}
  elseif($_POST[co]=='off'){$zap.=$p." (axe>0 OR lk>0  OR kl>0  OR ck>0)";$mxo=intval($mk_ruznica/(10*60));if($mxo>200){$mxo=200;}}
  elseif($_POST[co]=='def'){$zap.=$p." (pik>0 OR luk>0 OR mie>0 OR ck>0)";$mxo=intval($mk_ruznica/(11*60));if($mxo>200){$mxo=200;}}
  elseif($_POST[co]=='zw'){$zap.=$p. " (zw>100)";$mxo=intval($mk_ruznica/(9*60));if($mxo>200){$mxo=200;}}
      if($_POST[co]!=NULL){
    $odx= $xy_ob[0]-$mxo;          $dox= $xy_ob[0]+$mxo;
    $ody= $xy_ob[1]-$mxo;          $doy= $xy_ob[1]+$mxo;

      $zap.=$p."x>'$odx'
            AND x<'$dox'
            AND y>'$ody'
            AND y<'$doy' ";}

//$odzc = $mk_ruznica/($cos*60);                       // Odleg³osc policzona z czasu
// $ggg= 300 /($cos*60);
// echo $zap.'<br>';

 $k=0;
connection();
$wynik = @mysql_query($zap);
while($r = mysql_fetch_array($wynik))
{ //echo $r[x].'|'.$r[y].' => '.$xy_ag[0].'|'.$xy_ag[1].' ';
     $odleglosc=sqrt(potega($xy_ag[0]-$r[x],2)+potega($r[y]-$xy_ag[1],2));
  // $odleglosc=sqrt(potega($w_a[0]-$w_o[0],2)+potega($w_a[1]-$w_o[1],2));
//echo $odleglosc.' <br>';

if($odleglosc==0){continue;}
  // {$jest=1;
 if($_POST[co]=='sz'){ $odzc = $mk_ruznica/(35*60);  $ggg= 100 /(35*60);
       if(($odzc-$ggg<$odleglosc||$_POST[on]==0) && $odleglosc<$odzc+$ggg ) // sprawdzenie okna dotarcia wojsk
       {
      $Dane[wojsko][$k]=$r[sz].' szl';
      $Dane[kordy][$k]=$r[x].'|'.$r[y];
      $Dane[name][$k]=$r[n_wsi];
      $Dane[id_wsi][$k]=$r[id_wsi];
      $Dane[odleglosc][$k++]=$odleglosc*(35*60);
         }
      }
  elseif($_POST[co]=='off')
    {
        if($r[axe]>100)
         {$odzc = $mk_ruznica/(18*60);  $ggg= 100 /(18*60);
         if(($odzc-$ggg<$odleglosc||$_POST[on]==0) && $odleglosc<$odzc+$ggg ) // sprawdzenie okna dotarcia wojsk
          {
          $Dane[wojsko][$k]=$r[axe].' top';
          $Dane[kordy][$k]=$r[x].'|'.$r[y];
          $Dane[name][$k]=$r[n_wsi];
          $Dane[id_wsi][$k]=$r[id_wsi];
          $Dane[odleglosc][$k++]=$odleglosc*(18*60);
          }
         }
        if($r[lk]>50||$r[kl]>50)
         {$odzc = $mk_ruznica/(10*60);  $ggg= 100 /(10*60);
         if(($odzc-$ggg<$odleglosc||$_POST[on]==0) && $odleglosc<$odzc+$ggg ) // sprawdzenie okna dotarcia wojsk
          {
          $Dane[wojsko][$k]=$r[lk].' lk + '.$r[kl].' kl';
          $Dane[kordy][$k]=$r[x].'|'.$r[y];
          $Dane[name][$k]=$r[n_wsi];
          $Dane[id_wsi][$k]=$r[id_wsi];
          $Dane[odleglosc][$k++]=$odleglosc*10*60;
          }
         }
        if($r[ck]>50)
         {$odzc = $mk_ruznica/(11*60);  $ggg= 100 /(11*60);
         if(($odzc-$ggg<$odleglosc||$_POST[on]==0) && $odleglosc<$odzc+$ggg ) // sprawdzenie okna dotarcia wojsk
          {
          $Dane[wojsko][$k]=$r[ck].' ck ';
          $Dane[kordy][$k]=$r[x].'|'.$r[y];
          $Dane[name][$k]=$r[n_wsi];
          $Dane[id_wsi][$k]=$r[id_wsi];
          $Dane[odleglosc][$k++]=$odleglosc*11*60;
          }
         }

    }
  elseif($_POST[co]=='def')
    {
        if($r[ck]>50)
         {$odzc = $mk_ruznica/(11*60);  $ggg= 100 /(11*60);
         if(($odzc-$ggg<$odleglosc||$_POST[on]==0) && $odleglosc<$odzc+$ggg ) // sprawdzenie okna dotarcia wojsk
          {
          $Dane[wojsko][$k]=$r[ck].' ck';
          $Dane[kordy][$k]=$r[x].'|'.$r[y];
          $Dane[name][$k]=$r[n_wsi];
          $Dane[id_wsi][$k]=$r[id_wsi];
          $Dane[odleglosc][$k++]=$odleglosc*11*60;
          }
         }
         if($r[mie]>50)
         {$odzc = $mk_ruznica/(22*60);  $ggg= 100 /(22*60);
         if(($odzc-$ggg<$odleglosc||$_POST[on]==0) && $odleglosc<$odzc+$ggg ) // sprawdzenie okna dotarcia wojsk
          {
          $Dane[wojsko][$k]=$r[mie].' miecz';
          $Dane[kordy][$k]=$r[x].'|'.$r[y];
          $Dane[name][$k]=$r[n_wsi];
          $Dane[id_wsi][$k]=$r[id_wsi];
          $Dane[odleglosc][$k++]=$odleglosc*22*60;
          }
         }
                 if($r[pik]>50)
         {$odzc = $mk_ruznica/(18*60);  $ggg= 100 /(18*60);
         if(($odzc-$ggg<$odleglosc||$_POST[on]==0) && $odleglosc<$odzc+$ggg ) // sprawdzenie okna dotarcia wojsk
          {
          $Dane[wojsko][$k]=$r[pik].' pik + '.$r[luk].' Luki';
          $Dane[kordy][$k]=$r[x].'|'.$r[y];
          $Dane[name][$k]=$r[n_wsi];
          $Dane[id_wsi][$k]=$r[id_wsi];
          $Dane[odleglosc][$k++]=$odleglosc*18*60;
          }
         }
    }
  elseif($_POST[co]=='zw')
  {if($r[zw]>50)
         {$odzc = $mk_ruznica/(9*60);  $ggg= 100 /(9*60);
         if(($odzc-$ggg<$odleglosc||$_POST[on]==0) && $odleglosc<$odzc+$ggg ) // sprawdzenie okna dotarcia wojsk
          {
          $Dane[wojsko][$k]=$r[zw].' zwiad';
          $Dane[kordy][$k]=$r[x].'|'.$r[y];
          $Dane[name][$k]=$r[n_wsi];
          $Dane[id_wsi][$k]=$r[id_wsi];
          $Dane[odleglosc][$k++]=$odleglosc*(9*60);
          }
         }

  }

 //  }
}destructor();
@array_multisort ($Dane[odleglosc], SORT_ASC, SORT_NUMERIC, $Dane[wojsko],$Dane[kordy],$Dane[name],$Dane[id_wsi],$Dane[odleglosc]);
echo '<table border="1" class="main"><tr><th>Czas marszu</th><th>Jednostki</th><th>wioska</th><th>Ostatni dzwonek</th></tr>';
for($i=0;count($Dane[odleglosc])>$i;$i++)
{
  echo '<tr><td>';
       echo przeliczenie($Dane[odleglosc][$i]);
  echo '</td><td>';
       echo $Dane[wojsko][$i];
  echo '</td><td>';//http://pl5.plemiona.pl/game.php?village=55713&screen=place&mode=command&target=56386
       echo '<a href="http://pl5.plemiona.pl/game.php?village='.$Dane[id_wsi][$i].'&screen=place&mode=command&target='.$vi.'" target="_blank" >'.urldecode($Dane[name][$i]).' ('.$Dane[kordy][$i].')</a>';
  echo '</td><td>';//echo ;
       echo date("d.m.y G:i:s",$mk_ruznica-$Dane[odleglosc][$i]+mktime());
  echo '</td></tr>';

}
echo '</table>';
exit();
} //koniec if Post !=NULL
else{        //http://pl5.plemiona.pl/game.php?village=66132&amp;screen=info_village&amp;id=322489
 echo '<form name="form" action="" method="POST"><table><tr>';
       $id= $_GET[id];$vi=$_GET[village];
     $zap = "SELECT x,y FROM `ws_all` Where id='$id'";//wioska

     $zap1 = "SELECT id FROM `list_user` Where name='".$_SESSION[zalogowany]."'";//gracz którym jeste¶

connection();$wynik = @mysql_query($zap);if($r = mysql_fetch_array($wynik)){echo '<input type="hidden" name="xy" value="'.$r[x].'|'.$r[y].'" />';}destructor();
connection();$wynik1 = @mysql_query($zap1);if($r = mysql_fetch_array($wynik1)){echo '<input type="hidden" name="gracz" value="'.$r[id].'" />';}destructor();
echo '<input type="hidden" name="id" value="'.$id.'" />';
}
 ?>
<td valign="top"><?PHP
/*
  pobieramy village i sprawdzamy czyja to wioska
  - montujemy zapytanie
   id gracza
   xy wioski
   szuka: sz/off/def/zw
*/
?>
<input type="radio" name="co" value="def" checked="tak" id="def" /><label for="def">z Defem </label>
<input type="radio" name="co" value="off" id="off" /><label for="off">z Offem</label>
<input type="radio" name="co" value="zw" id="zw" /><label for="zw">ze Zwiadem</label>
<input type="radio" name="co" value="sz" id="sz" /><label for="sz">ze Szlachtê</label>
</td></tr><tr><td valign="top">
Wojska maja dotrzec przed:
<input name="czas1" value="" size="22" type="text"><a href="javascript:show_calendar('document.form.czas1', document.form.czas1.value);">X</a><br />
<br /><b>Wojska maja dotra na podana godzine?</b><br />
<input name="on" value="0" type="radio" checked="tak">Nie, pokaz tez te które dojda wczesniej <br />
<input name="on" value="1" type="radio">Tak, odzuc te które beda za wczesnie<br />
</td></tr><tr><td valign="top">
<input type="submit" value="POLICZ" /></td></tr></table>
</form></?php></body></html>
