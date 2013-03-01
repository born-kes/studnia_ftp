<?PHP   include('../connection.php'); ?><html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<script src="../js/ts_picker.js" type="text/javascript"></script>
<style type="text/css">
<!--
BODY {background: #F7EED3;}
a:link	{ font-weight:bold; color: #804000; text-decoration:none; }
a:visited	{  font-weight:bold; color: #804000; text-decoration:none; }
a:active	{  font-weight:bold; color: #0082BE; text-decoration:none; }
a:hover { font-weight:bold; color: #0082BE; text-decoration:none; }
.hidden{color:#DED3B9;}

table.main { background-color:#F7EED3; border:1px solid #804000;}
table.ba { border-bottom:0px;}
table.main td{font-size:11px;border-top:1px solid #804000;}
table.main th{font-size:11px;}
table.main tr.row th{font-size:11px;}
table.main tr.row td { background-color:#006600; color:#F1EBDD; border-bottom-color:#804000; }    //DED3B9
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
$czass = $_SESSION['zalogowany'].' '.$czas1;
 $ilosc_1 = zap(' COUNT( * ) AS `Rekordów` , ilosc','`analiza`'," wezwanie='$czass' AND co='$co' GROUP BY `ilosc`;");
if($ilosc_1[0]>0)
{$ilosc=$ilosc_1[1]+1;
 $zapytanie =      "UPDATE `analiza` SET ilosc='$ilosc', co='$co' WHERE wezwanie='$czass';";
}
else
{
 $zapytanie = "INSERT INTO `analiza` SET `ilosc`=1, `wezwanie`='$czass', `co`='$co';";
}
    connection();
@mysql_query($zapytanie);
    destructor();




if($time==NULL){
echo 'Data nie wybrana wiêc zak³adam 4 godziny.';
					$mk_ruznica = 14400;     // ile czasu ma wojsko na marsz...
}elseif(strpos($time,'.')===false && strpos($time,':')===false ){
					$mk_ruznica=$time*60*60;
}elseif(strpos($time,'.')===false && strpos($time,':')!==false){
					$ta=explode(':',$time); $d[0]=date("G");$d[1]=date("i");
if(intval($ta[0])>intval($d[0])){	$mk_ruznica = mkczas_pl(date("d.m.Y ").$ta[0].':'.$ta[1].':00')-mktime();  /*godzina dzis ale puzniej*/}else
if(intval($ta[0])<=intval($d[0])){	$mk_ruznica = mkczas_pl(date("d.m.Y ",mktime()+86400).$ta[0].':'.$ta[1].':00')-mktime();  /*godzina dzis ale puzniej*/}
}else{
					$mk_ruznica = mkczas_pl($_POST[czas1])-mktime();     // ile czasu ma wojsko na marsz...
}
//echo '<br>';
echo data_z_bazy($mk_ruznica+mktime()-$godzina_zero);
$cos = 9;//$_POST[wojsko];              // predkosc maszru
if($_POST[on]==1){ $g_z = intval($_POST[czas_time])*60; }else{$g_z=0;}   // margines czasu


if($_POST[gracz]==null && $_POST[t]!=null)
{ $gracz = $_POST[t]; $t='t='.$_POST[t].'&';}
elseif($_POST[gracz]!=null && $_POST[t]==null)
{ $gracz = $_POST[gracz];}             // gracz którego atakujemy
else
{echo 'Nie wiem kim jeste¶'; exit();}

  $zap = "SELECT x,y FROM `ws_all` Where id='".$_POST[xy]."';";//wioska

connection();$wynik = @mysql_query($zap);
if($r = mysql_fetch_array($wynik))
{
$xy_ag[0]=$xy_ob[0]=$r[x];// wioska wysy³ajaca wojsko          => id wioski
$xy_ag[1]=$xy_ob[1]=$r[y];// wioska do której ma dotrzec       => id Wioski
}destructor();

//$xy_ag = explode("|",$_POST[xy]);   

//$xy_ob = explode("|",$_POST[xy]);  

$p=" AND ";
 $zap= " SELECT  name AS n_wsi, w.id AS id_wsi,x,y,pik,mie,axe,luk,zw,lk,kl,ck,sz,tar
  FROM ws_all w
LEFT JOIN ws_mobile wm ON wm.id = w.id
  WHERE w.player = '$gracz'";


// $mxo = $max_odleglosc = intval($mk_ruznica/(11*60));
               // z jak daleka maja isc wojska

      if($_POST[co]=='sz'){$zap.=$p."sz>0";$mxo=intval($mk_ruznica/(35*60));if($mxo>70){$mxo=70;}}
  elseif($_POST[co]=='off'){$zap.=$p." (axe>".intval($_POST[axe])." OR lk>".intval($_POST[light])."  OR kl>".intval($_POST[marcher])."  OR ck>".intval($_POST[heavy])." )";$mxo=intval($mk_ruznica/(10*60));if($mxo>200){$mxo=200;}}
  elseif($_POST[co]=='foff'){$zap.=$p." (axe>3000 OR lk>1000  OR kl>1000 ) AND tar>100 ";$mxo=intval($mk_ruznica/(30*60));if($mxo>500){$mxo=200;}}
  elseif($_POST[co]=='def'){$zap.=$p." (pik>".intval($_POST[spear])." OR luk>".intval($_POST[archer])." OR mie>".intval($_POST[sword])." OR ck>".intval($_POST[heavy])." )";$mxo=intval($mk_ruznica/(11*60));if($mxo>200){$mxo=200;}}
  elseif($_POST[co]=='zw'){$zap.=$p. " (zw>".intval($_POST[spy])." )";$mxo=intval($mk_ruznica/(9*60));if($mxo>200){$mxo=200;}}
      if($_POST[co]!=NULL && $_POST[mxo]==1){ 
    $odx= $xy_ob[0]-$mxo;          $dox= $xy_ob[0]+$mxo;
    $ody= $xy_ob[1]-$mxo;          $doy= $xy_ob[1]+$mxo;

      $zap.=$p."x>'$odx'
            AND x<'$dox'
            AND y>'$ody'
            AND y<'$doy' ";}else{echo ' max nieaktywny '; }

//$odzc = $mk_ruznica/($cos*60);                       // Odleg³osc policzona z czasu
// $ggg= 300 /($cos*60);



#########################################
// echo $zap.'<br>';

 $k=0;
connection(); 
$wynik = @mysql_query($zap);

if(@mysql_num_rows($wynik) ==0){ echo '<table class="main"><tr><th>Nic Dla Ciebie nie mam</th></tr>';destructor(); exit();}


while($r = mysql_fetch_array($wynik))
{ //echo $r[x].'|'.$r[y].' => '.$xy_ag[0].'|'.$xy_ag[1].' ';
     $odleglosc=sqrt(potega($xy_ag[0]-$r[x],2)+potega($r[y]-$xy_ag[1],2));
  // $odleglosc=sqrt(potega($w_a[0]-$w_o[0],2)+potega($w_a[1]-$w_o[1],2));
//echo '<s>'.$odleglosc.'</s> <br>';

if($odleglosc==0){continue;}
  // {$jest=1;
 if($_POST[co]=='sz'){ $odzc = $mk_ruznica/(35*60);  $ggg=  $g_z /(35*60);
       if(($odzc-$ggg<$odleglosc+1||$_POST[on]==0) && $odleglosc<$odzc+$ggg ) // sprawdzenie okna dotarcia wojsk
       {
      $Dane[wojsko][$k]='<img class="snob">'.$r[sz];
      $Dane[kordy][$k]=$r[x].'|'.$r[y];
      $Dane[name][$k]=$r[n_wsi];
      $Dane[id_wsi][$k]=$r[id_wsi];
      $Dane[odleglosc][$k++]=$odleglosc*(35*60);
         }
      }
  elseif($_POST[co]=='off')
    {
        if($r[axe]>intval($_POST[axe]))
         {$odzc = $mk_ruznica/(18*60);  $ggg=  $g_z /(18*60);
         if(($odzc-$ggg<$odleglosc+1||$_POST[on]==0) && $odleglosc<$odzc+$ggg ) // sprawdzenie okna dotarcia wojsk
          {
          $Dane[wojsko][$k]='<img class="axe">'.$r[axe];
          $Dane[kordy][$k]=$r[x].'|'.$r[y];
          $Dane[name][$k]=$r[n_wsi];
          $Dane[id_wsi][$k]=$r[id_wsi];
          $Dane[odleglosc][$k++]=$odleglosc*(18*60);
          }
         }
        if($r[lk]>intval($_POST[light])||$r[kl]>intval($_POST[marcher]))
         {$odzc = $mk_ruznica/(10*60);  $ggg=  $g_z /(10*60);
         if(($odzc-$ggg<$odleglosc+1||$_POST[on]==0) && $odleglosc<$odzc+$ggg ) // sprawdzenie okna dotarcia wojsk
          {
          $Dane[wojsko][$k]='<img class="light">'.$r[lk].'<img class="marcher">'.$r[kl];
          $Dane[kordy][$k]=$r[x].'|'.$r[y];
          $Dane[name][$k]=$r[n_wsi];
          $Dane[id_wsi][$k]=$r[id_wsi];
          $Dane[odleglosc][$k++]=$odleglosc*10*60;
          }
         }
        if($r[ck]>intval($_POST[heavy]))
         {$odzc = $mk_ruznica/(11*60);   $ggg= $g_z /(11*60);
         if(($odzc-$ggg<$odleglosc+1||$_POST[on]==0) && $odleglosc<$odzc+$ggg ) // sprawdzenie okna dotarcia wojsk
          {
          $Dane[wojsko][$k]='<img class="heavy">'.$r[ck];
          $Dane[kordy][$k]=$r[x].'|'.$r[y];
          $Dane[name][$k]=$r[n_wsi];
          $Dane[id_wsi][$k]=$r[id_wsi];
          $Dane[odleglosc][$k++]=$odleglosc*11*60;
          }
         }

    }
  elseif($_POST[co]=='def')
    {
        if($r[ck]>intval($_POST[heavy]))
         {$odzc = $mk_ruznica/(11*60);  $ggg= $g_z /(11*60);
         if(($odzc-$ggg<$odleglosc+1||$_POST[on]==0) && $odleglosc<$odzc+$ggg ) // sprawdzenie okna dotarcia wojsk
          {
          $Dane[wojsko][$k]='<img class="heavy">'.$r[ck];
          $Dane[kordy][$k]=$r[x].'|'.$r[y];
          $Dane[name][$k]=$r[n_wsi];
          $Dane[id_wsi][$k]=$r[id_wsi];
          $Dane[odleglosc][$k++]=$odleglosc*11*60;
          }
         }
         if($r[mie]>intval($_POST[sword]))
         {$odzc = $mk_ruznica/(22*60);  $ggg= $g_z /(22*60);
         if(($odzc-$ggg<$odleglosc+1||$_POST[on]==0) && $odleglosc<$odzc+$ggg ) // sprawdzenie okna dotarcia wojsk
          {
          $Dane[wojsko][$k]='<img class="sword">'.$r[mie];
          $Dane[kordy][$k]=$r[x].'|'.$r[y];
          $Dane[name][$k]=$r[n_wsi];
          $Dane[id_wsi][$k]=$r[id_wsi];
          $Dane[odleglosc][$k++]=$odleglosc*22*60;
          }
         }
         if($r[pik]>intval($_POST[spear]) || $r[luk]>intval($_POST[archer]) )
         {$odzc = $mk_ruznica/(18*60);  $ggg= $g_z /(18*60);
         if(($odzc-$ggg<$odleglosc+1||$_POST[on]==0) && $odleglosc<$odzc+$ggg ) // sprawdzenie okna dotarcia wojsk
          {
          $Dane[wojsko][$k]='<img class="spear">'.$r[pik].'<img class="archer">'.$r[luk];
          $Dane[kordy][$k]=$r[x].'|'.$r[y];
          $Dane[name][$k]=$r[n_wsi];
          $Dane[id_wsi][$k]=$r[id_wsi];
          $Dane[odleglosc][$k++]=$odleglosc*18*60;
          }
         }
    }
  elseif($_POST[co]=='zw')
  {if($r[zw]>intval($_POST[spy]))
         {$odzc = $mk_ruznica/(9*60);  $ggg= $g_z /(9*60);
         if(($odzc-$ggg<$odleglosc+1||$_POST[on]==0) && $odleglosc<$odzc+$ggg ) // sprawdzenie okna dotarcia wojsk
          {
          $Dane[wojsko][$k]='<img class="spy">'.$r[zw];
          $Dane[kordy][$k]=$r[x].'|'.$r[y];
          $Dane[name][$k]=$r[n_wsi];
          $Dane[id_wsi][$k]=$r[id_wsi];
          $Dane[odleglosc][$k++]=$odleglosc*(9*60);
          }
         }
   }
  elseif($_POST[co]=='foff')
  {

         $odzc = $mk_ruznica/(30*60);  $ggg= $g_z /(30*60);
         if(($odzc-$ggg<$odleglosc+1||$_POST[on]==0) && $odleglosc<$odzc+$ggg ) // sprawdzenie okna dotarcia wojsk
          {
          $Dane[wojsko][$k]='<img class="spy">'.$r[zw].'<img class="axe">'.$r[axe].'<br><img class="light">'.$r[lk].'<img class="marcher">'.$r[kl].'<br><img class="ram">'.$r[tar];
          $Dane[kordy][$k]=$r[x].'|'.$r[y];
          $Dane[name][$k]=$r[n_wsi];
          $Dane[id_wsi][$k]=$r[id_wsi];
          $Dane[odleglosc][$k++]=$odleglosc*(9*60);
          
         }
  }

}destructor();

if( count($Dane[odleglosc])==0){echo '<table class="main"><tr><th>Nic Dla Ciebie nie mam</th></tr>';destructor(); exit();}

@array_multisort ($Dane[odleglosc], SORT_ASC, SORT_NUMERIC, $Dane[wojsko],$Dane[kordy],$Dane[name],$Dane[id_wsi],$Dane[odleglosc]);
echo '<table class="main"><tr><th>Czas marszu</th><th>Jednostki</th><th>wioska</th><th>Ostatni dzwonek</th><th>wyslane teraz dotrze na</th></tr>';
for($i=0;count($Dane[odleglosc])>$i;$i++)
{
  echo '<tr><td>';
       echo przeliczenie($Dane[odleglosc][$i]);
  echo '</td><td>';
       echo $Dane[wojsko][$i];
  echo '</td><td>';//http://pl5.plemiona.pl/game.php?village=55713&screen=place&target=56386
       echo '<a href="http://pl5.plemiona.pl/game.php?'.$t.'village='.$Dane[id_wsi][$i].'&screen=place&target='.$vi.'" target="_blank" >'.urldecode($Dane[name][$i]).' ('.$Dane[kordy][$i].')</a>';
  echo '</td><td>'; //echo $Dane[odleglosc][$i]."::";
       echo date("d.m.y G:i:s",$mk_ruznica-$Dane[odleglosc][$i]+mktime());
//  echo '</td></tr>';
   echo '</td><td>';
       echo date("d.m.y G:i:s",$Dane[odleglosc][$i]+mktime());
  echo '</td></tr>';
}

echo '</table>';
echo '<script language="JavaScript">
<!--
function url_dla_img()
{var img = document.getElementsByTagName("img");
	for (var i = 1; i < img.length; i++) {	img[i].src = \'http://cdn.tribalwars.net/graphic/unit/unit_\'+img[i].className+\'.png\';  }
}url_dla_img();
//-->
</script>';
exit();
}