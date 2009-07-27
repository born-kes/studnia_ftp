<?php
echo'<table class="main" >';
if( $_GET[cal]!= null && $_POST== null ){echo'<b>Kalkulator odleglosci</b><br><br>
<FORM NAME ACTION=""  METHOD="POST">
<tr><th>x|y <input name="xb" tabindex="1" maxlength="7" id="inputx" value="" size="6" type="text"></th><th> pierwsza wioska</th></tr>
<tr><th>x|y <input name="xc" tabindex="3" maxlength="7" id="inputx" value="" size="6" type="text"></th><th> druga wioska</th></tr>
<tr><td><INPUT tabindex="5" TYPE="submit" VALUE="Oblicz"> </FORM></td></tr></table>';

}

elseif( $_GET[cal]!= null && $_POST!= null ){

$xbaz=explode("|",$_POST[xb]);
$xcel=explode("|",$_POST[xc]);
$odleglosc=sqrt(potega($xbaz[0]-$xcel[0],2)+potega($xbaz[1]-$xcel[1],2));

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