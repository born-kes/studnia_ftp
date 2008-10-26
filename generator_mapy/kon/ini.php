<?php
$text = $_GET[query];$tezt1 = str_replace('
	', '', $text);$tezt2 = str_replace('		', '', $tezt1);$tezt3 = str_replace('  ', '', $tezt2);
$tablica = explode("\n", $tezt3);
for($i=60; $i>0; $i--){if(strpos($tablica[$i], ":" )>0 ){
if(strpos($tablica[$i], "Straty")!== false &&$straty==NULL){$straty=$tablica[$i];}else
if(strpos($tablica[$i], "Ilo")!== false &&$ilosc==NULL){$ilosc=$tablica[$i];}else
if(strpos($tablica[$i], "Wioska")!== false &&$Wioska==NULL){$Wioska= $tablica[$i];}else
if(strpos($tablica[$i], "Wy")!== false &&$data==NULL && $i<4){$data=$tablica[$i];}
if(strpos($tablica[$i], "Poparcie")!== false &&$Poparcie==NULL){$Poparcie= $tablica[$i];}}
if(strpos($tablica[$i], "Mur")!== false && $mur==NULL){$mur=$tablica[$i];}}


if(strpos($mur,"obronny")!== false){$nev_mur=substr($mur,-3,-1);}elseif(strpos($mur,"uszkodzony")!== false){$nev_mur=substr($mur,-2);}
$ilosc1 =explode("	",$ilosc);$straty1=explode("	",$straty);
for($i=0; $i<13; $i++){
$nev_wojsko[$i]=$ilosc1[$i]-$straty1[$i];}$rozmiar = count($nev_wojsko);
$data1 =explode("	",$data);$data2 =explode(" ",$data1[1]);$nev_data=explode(".",$data2[0]);
$strr=strrpos($Wioska, ")")-3;
$wioska2=substr($Wioska,strrpos($Wioska, "(")+1,strrpos($Wioska, ")")-strrpos($Wioska, "(")-1);$nev_wioska= explode("|",$wioska2);
echo"<b>Uchwyty wylapaly</b></td></tr>
<tr><td><b>Data:</b> rok:$nev_data[2] miesiac $nev_data[1] dzien: $nev_data[0]   <br>
<b>wioske o x:</b>$nev_wioska[0]|$nev_wioska[1]<b>:y</b><br>
<b>Wojska:</b><br>
<b>piki:</b>$nev_wojsko[1], <b>miecze:</b> $nev_wojsko[2], <b>Topory:</b> $nev_wojsko[3], <b>Luki:</b> $nev_wojsko[4]<br>
<b>zwiad:</b>$nev_wojsko[5],<b> Lekka kawaleria:</b>$nev_wojsko[6], <b>Luki na Koniach:</b> $nev_wojsko[7], <b>Ciezka konnica:</b> $nev_wojsko[8]<br>
<b>Tarany:</b>$nev_wojsko[9],<b> katapulty:</b> $nev_wojsko[10],<br>
<b>Rycerz:</b>$nev_wojsko[11],<b> Szlachta:</b> $nev_wojsko[12]<br>";
if($nev_mur>=0){echo"<b>W wiosce zostal muru na poziomie:</b>$nev_mur";}
?>