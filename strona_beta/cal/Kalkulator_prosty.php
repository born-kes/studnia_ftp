<?php
echo'<table class="main" >';
if( $_GET[cal]!= null && $_POST== null ){echo'<b>Kalkulator odleglosci</b><br><br>
<FORM NAME ACTION=""  METHOD="POST">
<tr><th>x|y <input name="xb" tabindex="1" maxlength="7" id="inputx" value="" size="6" type="text"></th><th> pierwsza wioska</th></tr>
<tr><th>x|y <input name="xc" tabindex="3" maxlength="7" id="inputx" value="" size="6" type="text"></th><th> druga wioska</th></tr>
<tr><td><INPUT tabindex="5" TYPE="submit" VALUE="Oblicz"> </FORM></td></tr></table>';

}

elseif( $_GET[cal]!= null && $_POST!= null ){

function przeliczenie($odleglosc , $szyb)
{
//tempo jest w min
$szll=$odleglosc*($szyb*60);
$data_explode= explode(" ", date("j G i s", $szll));
$data_explode[0]=$data_explode[0]-1;
$data_explode[1]=$data_explode[1]-1;
if($data_explode[3]<0){$data_explode[3]=$data_explode[3]+60;$data_explode[2]=$data_explode[2]-1;}//sek
if($data_explode[2]<0){$data_explode[2]=$data_explode[2]+60;$data_explode[1]=$data_explode[1]-1;}//min
if($data_explode[1]<0){$data_explode[1]=$data_explode[1]+24;$data_explode[0]=$data_explode[0]-1;}//godzi

if($data_explode[0]>0){$wynik.= $data_explode[0]." dni ";}
if($data_explode[1]>0){$wynik.= $data_explode[1]." godz ";}
if($data_explode[2]>0){$wynik.= $data_explode[2]." min ";}
if($data_explode[3]>0){$wynik.= $data_explode[3]." sek ";}
    return $wynik;
}
 
//function kalkulator($odleglosc, $tempo)
//{$a=$odleglosc*$tempo;
//$aa=intval($a)*60+intval($a-intval($a)*60);
//$czas=$aa*1/86400;
//    return $czas;}

$xbaz=explode("|",$_POST[xb]);
$xcel=explode("|",$_POST[xc]);
$odleglosc=sqrt(potega($xbaz[0]-$xcel[0],2)+potega($xbaz[1]-$xcel[1],2));

$w5=18;
$w6=22;
$w7=18;
$w8=18;
$w9=9;
$w10=10;
$w11=10;
$w12=11;
$w13=30;
$w14=30;
$w15=10;
$w16=35;

$x5=$odleglosc*$w5;
$x6=$odleglosc*$w6;
$x7=$odleglosc*$w7;
$x8=$odleglosc*$w8;
$x9=$odleglosc*$w9;
$x10=$odleglosc*$w10;
$x11=$odleglosc*$w11;
$x12=$odleglosc*$w12;
$x13=$odleglosc*$w13;
$x14=$odleglosc*$w14;
$x15=$odleglosc*$w15;
$x16=$odleglosc*$w16;

$y5=intval($x5);
$y6=intval($x6);
$y7=intval($x7);
$y8=intval($x8);
$y9=intval($x9);
$y10=intval($x10);
$y11=intval($x11);
$y12=intval($x12);
$y13=intval($x13);
$y14=intval($x14);
$y15=intval($x15);
$y16=intval($x16);

$z5=$x5-$y5;
$z6=$x6-$y6;
$z7=$x7-$y7;
$z8=$x8-$y8;
$z9=$x9-$y9;
$z10=$x10-$y10;
$z11=$x11-$y11;
$z12=$x12-$y12;
$z13=$x13-$y13;
$z14=$x14-$y14;
$z15=$x15-$y15;
$z16=$x16-$y16;

$aa5=$z5*60;
$aa6=$z6*60;
$aa7=$z7*60;
$aa8=$z8*60;
$aa9=$z9*60;
$aa10=$z10*60;
$aa11=$z11*60;
$aa12=$z12*60;
$aa13=$z13*60;
$aa14=$z14*60;
$aa15=$z15*60;
$aa16=$z16*60;


$ay19=$y5*60;
$ay20=$y6*60;
$ay21=$y7*60;
$ay22=$y8*60;
$ay23=$y9*60;
$ay24=$y10*60;
$ay25=$y11*60;
$ay26=$y12*60;
$ay27=$y13*60;
$ay28=$y14*60;
$ay29=$y15*60;
$ay30=$y16*60;

$az19=intval($aa5);
$az20=intval($aa6);
$az21=intval($aa7);
$az22=intval($aa8);
$az23=intval($aa9);
$az24=intval($aa10);
$az25=intval($aa11);
$az26=intval($aa12);
$az27=intval($aa13);
$az28=intval($aa14);
$az29=intval($aa15);
$az30=intval($aa16);

$aa19=$ay19+$az19;
$aa20=$ay20+$az20;
$aa21=$ay21+$az21;
$aa22=$ay22+$az22;
$aa23=$ay23+$az23;
$aa24=$ay24+$az24;
$aa25=$ay25+$az25;
$aa26=$ay26+$az26;
$aa27=$ay27+$az27;
$aa28=$ay28+$az28;
$aa29=$ay29+$az29;
$aa30=$ay30+$az30;

$pik=$aa19*1/86400;
$mie=$aa20*1/86400;
$axe=$aa21*1/86400;
$luk=$aa22*1/86400;
$zw =$aa23*1/86400;
$lk =$aa24*1/86400;
$kl =$aa25*1/86400;
$ck =$aa26*1/86400;
$tar=$aa27*1/86400;
$kat=$aa28*1/86400;
$ryc=$aa29*1/86400;
$szl=$aa30*1/86400;

$godz19=intval($pik*24);$min19=intval(($pik*24-intval($pik*24))*60);$sek19=intval(($pik*24*60-intval($pik*24*60))*60);
$godz20=intval($mie*24);$min20=intval(($mie*24-intval($mie*24))*60);$sek20=intval(($mie*24*60-intval($mie*24*60))*60);
$godz21=intval($axe*24);$min21=intval(($axe*24-intval($axe*24))*60);$sek21=intval(($axe*24*60-intval($axe*24*60))*60);
$godz22=intval($luk*24);$min22=intval(($luk*24-intval($luk*24))*60);$sek22=intval(($luk*24*60-intval($luk*24*60))*60);
$godz23=intval($zw *24);$min23=intval(($zw *24-intval($zw *24))*60);$sek23=intval(($zw *24*60-intval($zw *24*60))*60);
$godz24=intval($lk *24);$min24=intval(($lk *24-intval($lk *24))*60);$sek24=intval(($lk *24*60-intval($lk *24*60))*60);
$godz25=intval($kl *24);$min25=intval(($kl *24-intval($kl *24))*60);$sek25=intval(($kl *24*60-intval($kl *24*60))*60);
$godz26=intval($ck *24);$min26=intval(($ck *24-intval($ck *24))*60);$sek26=intval(($ck *24*60-intval($ck *24*60))*60);
$godz27=intval($tar*24);$min27=intval(($tar*24-intval($tar*24))*60);$sek27=intval(($tar*24*60-intval($tar*24*60))*60);
$godz28=intval($kat*24);$min28=intval(($kat*24-intval($kat*24))*60);$sek28=intval(($kat*24*60-intval($kat*24*60))*60);
$godz29=intval($ryc*24);$min29=intval(($ryc*24-intval($ryc*24))*60);$sek29=intval(($ryc*24*60-intval($ryc*24*60))*60);
$godz30=intval($szl*24);$min30=intval(($szl*24-intval($szl*24))*60);$sek30=intval(($szl*24*60-intval($szl*24*60))*60);

$pik=przeliczenie($odleglosc , 18);
$mie=przeliczenie($odleglosc , 22);
$zwi=przeliczenie($odleglosc , 9);
$lk =przeliczenie($odleglosc , 10);
$ck =przeliczenie($odleglosc , 11);
$tar=przeliczenie($odleglosc , 30);
$sz =przeliczenie($odleglosc , 35);


echo"<BR><BR><BR> odleglosc:$odleglosc<BR>
od <b><i> $xbaz[0] | $xbaz[1]</i></b><BR>
do <b><i> $xcel[0] | $xcel[1]</i></b><BR>
czas marszu<BR>";
echo'<table class="main" >';
echo'<TR><TD>Piki    </TD><TH align="right"><b>'.$pik.'</b></TH></TR>';
echo'<TR><TD>Miecze  </td><th align="right"><b>'.$mie.'</b></th></tr>';
echo'<TR><TD>Topory  </td><th align="right"><b>'.$pik.'</b></th></tr>';
echo'<TR><TD>Luki    </td><th align="right"><b>'.$pik.'</b></th></tr>';
echo'<TR><TD>Zwiad   </td><th align="right"><b>'.$zwi.'</b></th></tr>';
echo'<TR><TD>L.K.    </td><th align="right"><b>'.$lk. '</b></th></tr>';
echo'<TR><TD>K.L.    </td><th align="right"><b>'.$lk. '</b></th></tr>';
echo'<TR><TD>C.K.    </td><th align="right"><b>'.$ck. '</b></th></tr>';
echo'<TR><TD>Tarany  </td><th align="right"><b>'.$tar.'</b></th></tr>';
echo'<TR><TD>Kataplty</td><th align="right"><b>'.$tar.'</b></th></tr>';
echo'<TR><TD>Rycerz  </td><th align="right"><b>'.$lk. '</b></th></tr>';
echo'<TR><TD>Szlachta</td><th align="right"><b>'.$sz. '</b></th></tr>';
echo'</table>';
}
?>