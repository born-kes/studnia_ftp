<html><head>
<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
<link rel="stylesheet" type="text/css" href="../img/stamm1201718544.css">
<script src="../mootools.js" type="text/javascript"></script>
<script src="../scriptt.js" type="text/javascript"></script>
</head>
<body><?PHP
  include('../connection.php');
if($_POST[query]!=NULL)
  {
     $txt2=$_POST[query];
     $txt1 = str_replace('	',' ', $txt2);
     $txt = str_replace('  ', ' ', $txt1);
     $tablica = explode("\n", $txt);

  for($i=0; $i<=count($tablica); $i++)
  {
        if(strpos($tablica[$i], "|")!== false && $w_agr==NULL)
         {
            $st_r= strrpos($tablica[$i], "|");
            $w_agr =explode("|", substr($tablica[$i] , $st_r-3 , 7 ));
         }
   elseif(strpos($tablica[$i], "|")!== false && $w_obr==NULL)
         {
            $st_r=strrpos($tablica[$i], "|");
            $w_obr =explode("|", substr($tablica[$i] , $st_r-3 , 7 ));
         }
   elseif(strpos($tablica[$i], "Przybycie:")!== false && $godzi==NULL){$godzi= $tablica[$i];
         $czas_a= explode(" ", $godzi); 
         }
   elseif(strpos($tablica[$i], ":")!== false){$godo= $tablica[$i]; $g++;}
  }


$odleglosc=sqrt(potega($w_agr[0]-$w_obr[0],2)+potega($w_agr[1]-$w_obr[1],2));

$zw  = przeliczenie($odleglosc * 540);
$lk  = przeliczenie($odleglosc * 600);
$ck  = przeliczenie($odleglosc * 660);
$pik = przeliczenie($odleglosc * 1080);
$mie = przeliczenie($odleglosc * 1320);
$tar = przeliczenie($odleglosc * 1800);
$sz  = przeliczenie($odleglosc * 2100);
echo '<table class="main" align="center">
  <tr><td> Jednstki </td><td>Czas Marszu</td>';
if( $godzi!=NULL){echo '<th></th><td> Godzina wyslania      </td><tr>'; $czas_af = mkczas_pl($czas_a[1].'.'.$czas_a[2]); }
 //elseif($g==1) {echo '<tr><td> Atak      </td><td><b>'.$godo .'</b></td><tr>'; $czas_af = mkczas_pl($godo); }

echo '</tr><tr><td>
<img src="http://pl5.plemiona.pl/graphic/unit/unit_spy.png" title="Zwiad" alt="">
</td><td align="right">'.$zw.'</td>';
if($czas_af!=NULL){ echo '<th></th><td>'.date("d.m.y G:i:s", $czas_af-mkczas($zw)).'</td>'; }
echo'</tr>';
echo'<tr><td>
<img src="http://pl5.plemiona.pl/graphic/unit/unit_light.png" title="Lekka Kawaleria" alt="">
<img src="http://pl5.plemiona.pl/graphic/unit/unit_marcher.png" title="Konni Łucznicy" alt="">
<img src="http://pl5.plemiona.pl/graphic/unit/unit_knight.png" title="rycerz" alt="">
</td><td align="right">'.$lk.'</td>';
if($czas_af!=NULL){ echo '<th></th><td>'.date("d.m.y G:i:s", $czas_af-unliczenie($zw)).'</td>'; }
echo'</tr>';
echo'<tr><td>
<img src="http://pl5.plemiona.pl/graphic/unit/unit_heavy.png" title="Ciezka Kawaleria" alt="">
</td><td align="right">'.$ck.'</td>';
if($czas_af!=NULL){ echo '<th></th><td>'.date("d.m.y G:i:s", $czas_af-unliczenie($ck)).'</td>'; }
echo'</tr>';
echo'<tr><td>
<img src="http://pl5.plemiona.pl/graphic/unit/unit_spear.png" title="Pikinier" alt="">
<img src="http://pl5.plemiona.pl/graphic/unit/unit_axe.png" title="Topory" alt="">
<img src="http://pl5.plemiona.pl/graphic/unit/unit_spear.png" title="Łuki" alt="">
</td><td align="right">'.$pik.'</td>';
if($czas_af!=NULL){ echo '<th></th><td>'.date("d.m.y G:i:s", $czas_af-unliczenie($pik)).'</td>'; }
echo'</tr>';
echo'<tr><td>
<img src="http://pl5.plemiona.pl/graphic/unit/unit_sword.png" title="Miecze" alt="">
</td><td align="right">'.$mie.'</td>';
if($czas_af!=NULL){ echo '<th></th><td>'.date("d.m.y G:i:s", $czas_af-unliczenie($mie)).'</td>'; }
echo'</tr>';
echo'<tr><td>
<img src="http://pl5.plemiona.pl/graphic/unit/unit_ram.png" title="Tarany" alt="">
<img src="http://pl5.plemiona.pl/graphic/unit/unit_catapult.png" title="Katapulty" alt="">
</td><td align="right">'.$tar.'</td>';
if($czas_af!=NULL){ echo '<th></th><td>'.date("d.m.y G:i:s", $czas_af-unliczenie($tar)).'</td>'; }
echo'</tr>';
echo'<tr><td>
<img src="http://pl5.plemiona.pl/graphic/unit/unit_snob.png" title="Szlachcic" alt="">
</td><td align="right">'.$sz.'</td>';
if($czas_af!=NULL){ echo '<th></th><td>'.date("d.m.y G:.i:s", $czas_af-unliczenie($sz)).'</td>'; }
echo'</tr><tr>
<th> Odleglosc </th><th colspan="3">'.$odleglosc.'</th></tr>';
echo'</table>';

$include_per = '../';
$zap= " AND v.x='$w_agr[0]' AND v.y='$w_agr[1]'";
  include('../raport_z.php');
  }      	
?>