<html><head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="stamm.css">
<script src="../mootools.js" type="text/javascript"></script>
<script src="../scriptt.js" type="text/javascript"></script>
</head>
<body><br /><?PHP
  include('../connection.php');
if($_POST[xy]!=NULL)
  {
     $txt2=$_POST[xy];
     $txt1 = str_replace('	',' ', $txt2);
     $txt = str_replace('  ', ' ', $txt1);
     $tablica = explode("\n", $txt);

  for($i=0; $i<=count($tablica); $i++)
  {
        if(strpos($tablica[$i], "|")!== false && $w_a==NULL)
         {
            $st_r= strrpos($tablica[$i], "|");
            $w_a =explode("|", substr($tablica[$i] , $st_r-3 , 7 ));
         }elseif(strpos($tablica[$i], "|")!== false && $w_o==NULL)
         {
            $st_r= strrpos($tablica[$i], "|");
            $w_o =explode("|", substr($tablica[$i] , $st_r-3 , 7 ));
         }
  }

$odleglosc=sqrt(potega($w_a[0]-$w_o[0],2)+potega($w_a[1]-$w_o[1],2));

$zw  = przeliczenie($odleglosc * 540);
$lk  = przeliczenie($odleglosc * 600);
$ck  = przeliczenie($odleglosc * 660);
$pik = przeliczenie($odleglosc * 1080);
$mie = przeliczenie($odleglosc * 1320);
$tar = przeliczenie($odleglosc * 1800);
$sz  = przeliczenie($odleglosc * 2100);

echo '<table class="main" align="center">';
echo '<tr><td> Jednstki </td><td>Czas Marszu</td>';
if($_POST[czas1]!=NULL){echo '<th></th><td> Godzina wyslania      </td><tr>'; $czas_af = mkczas_pl($_POST[czas1]); }

echo '</tr><tr><td>
<img src="http://pl5.plemiona.pl/graphic/unit/unit_spy.png" title="Zwiad" alt="">
</td><td align="right">'.$zw.'</td>';
if($czas_af!=NULL){ echo '<th></th><td>'.date("d.m.y G:i:s", $czas_af-unliczenie($zw)).'</td>'; }
echo'</tr>';
echo'<tr><td>
<img src="http://pl5.plemiona.pl/graphic/unit/unit_light.png" title="Lekka Kawaleria" alt="">
<img src="http://pl5.plemiona.pl/graphic/unit/unit_marcher.png" title="Konni Lucznicy" alt="">
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
<img src="http://pl5.plemiona.pl/graphic/unit/unit_spear.png" title="Luki" alt="">
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
if($czas_af!=NULL){ echo '<th></th><td>'.date("d.m.y G:i:s", $czas_af-unliczenie($sz)).'</td>'; }
echo'</tr><tr>
<th> Odleglosc </th><th colspan="3">'.$odleglosc.'</th></tr>';
echo'</table>';

$include_per = '../';
$zap= " AND v.x='$w_a[0]' AND v.y='$w_a[1]'";
  include('raport_z.php');
  }      	
?>