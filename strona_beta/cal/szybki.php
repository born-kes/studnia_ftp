<?PHP
if($_GET[cal]!=NULL && $_POST[query]==NULL){
echo "Kalkulator Szybki, skraca czas sprawdzenia jaki atak na ciebie idzie,<br>
wklejasz szczegoly ataku, a kalkulator liczy ile czasu zajmie wojskom przejscie tej drogi.<BR>
w efekcie daje tylko liste takich wojsk ktore maj± wystarczaj±ca ilosc czasu<BR>
Sugerujê te¿ zaznaczyæ od s³owa <b>Pochodzenie</b> az do <b>&#187; Plac</b> ;) <BR><BR>";}

if($_POST[query]!=NULL){
function sekundy($czas){
$czas_e= explode(":", $czas);
$sekundy = ($czas_e[0]*3600)+($czas_e[1]*60)+$czas_e[2];
    return $sekundy;
}

function przeliczenie($odleglosc , $szyb)
{
//tempo jest w min
$szll=$odleglosc*($szyb*60);
$data_explode= explode(" ", date("j G i s", $szll));
$data_explode[0]=$data_explode[0]-1;
$data_explode[1]=$data_explode[1]-1;

if($data_explode[0]>0){$data_explode[1]+=$data_explode[0]*24;}//dni
if($data_explode[3]<0){$data_explode[3]=$data_explode[3]+60;$data_explode[2]=$data_explode[2]-1;}//sek
if($data_explode[2]<0){$data_explode[2]=$data_explode[2]+60;$data_explode[1]=$data_explode[1]-1;}//min
if($data_explode[1]<0){$data_explode[1]=$data_explode[1]+24;$data_explode[0]=$data_explode[0]-1;}//godzi


if($data_explode[1]>0){$wynik.= $data_explode[1].":";}
if($data_explode[2]>0){$wynik.= $data_explode[2].":";}
$wynik.= $data_explode[3]." ";
    return $wynik;
}

                         $txt2=$_POST[query];
                         $txt1 = str_replace('	',' ', $txt2);
                         $txt = str_replace('  ', ' ', $txt1);                         
                         $tablica = explode("\n", $txt);

        for($i=0; $i<=count($tablica); $i++){
                    if(strpos($tablica[$i], ":" )>0 ){            
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

   elseif(strpos($tablica[$i], "przybycie za")!== false && $godzi==NULL){$godzi= $tablica[$i];}
                                                     }
                                              }
$odleglosc=sqrt(potega($w_agr[0]-$w_obr[0],2)+potega($w_agr[1]-$w_obr[1],2));
$czas_a= explode(" ", $godzi);
$czas_af = sekundy($czas_a[2]);
$zw  = przeliczenie($odleglosc , 9);
$lk  = przeliczenie($odleglosc , 10);
$ck  = przeliczenie($odleglosc , 11);
$pik = przeliczenie($odleglosc , 18);
$mie = przeliczenie($odleglosc , 22);
$tar = przeliczenie($odleglosc , 30);
$sz  = przeliczenie($odleglosc , 35);
echo '<table>
<tr><td> Odleglosc </td><td>'.$odleglosc.'</td><tr>
<tr><td> Atak      </td><td><b>'.$godzi.'</b></td><tr>';

if($czas_af>0){
if($czas_af<sekundy($zw)){
echo'<tr><td>
<img src="http://pl5.plemiona.pl/graphic/unit/unit_spy.png" title="Zwiad" alt="">
</td><td align="right">'.$zw.'</td><tr>';}
if($czas_af<sekundy($lk)){
echo'<tr><td>
<img src="http://pl5.plemiona.pl/graphic/unit/unit_light.png" title="Lekka Kawaleria" alt="">
<img src="http://pl5.plemiona.pl/graphic/unit/unit_marcher.png" title="Konni £ucznicy" alt="">
<img src="http://pl5.plemiona.pl/graphic/unit/unit_knight.png" title="rycerz" alt="">
</td><td align="right">'.$lk.'</td><tr>';}
if($czas_af<sekundy($ck)){
echo'<tr><td>
<img src="http://pl5.plemiona.pl/graphic/unit/unit_heavy.png" title="Ciezka Kawaleria" alt="">
</td><td align="right">'.$ck.'</td><tr>';}
if($czas_af<sekundy($pik)){
echo'<tr><td>
<img src="http://pl5.plemiona.pl/graphic/unit/unit_spear.png" title="Pikinier" alt="">
<img src="http://pl5.plemiona.pl/graphic/unit/unit_axe.png" title="Topory" alt="">
<img src="http://pl5.plemiona.pl/graphic/unit/unit_spear.png" title="£uki" alt="">
</td><td align="right">'.$pik.'</td><tr>';}
if($czas_af<sekundy($mie)){
echo'<tr><td>
<img src="http://pl5.plemiona.pl/graphic/unit/unit_sword.png" title="Miecze" alt="">
</td><td align="right">'.$mie.'</td><tr>';}
if($czas_af<sekundy($tar)){
echo'<tr><td>
<img src="http://pl5.plemiona.pl/graphic/unit/unit_ram.png" title="Tarany" alt="">
<img src="http://pl5.plemiona.pl/graphic/unit/unit_catapult.png" title="Katapulty" alt="">
</td><td align="right">'.$tar.'</td><tr>';}
if($czas_af<sekundy($sz)){
echo'<tr><td>
<img src="http://pl5.plemiona.pl/graphic/unit/unit_snob.png" title="Szlachcic" alt="">
</td><td align="right">'.$sz.'</td><tr>';}




}else{



echo'<tr><td>
<img src="http://pl5.plemiona.pl/graphic/unit/unit_spy.png" title="Zwiad" alt="">
</td><td align="right">'.$zw.'</td><tr>';

echo'<tr><td>
<img src="http://pl5.plemiona.pl/graphic/unit/unit_light.png" title="Lekka Kawaleria" alt="">
<img src="http://pl5.plemiona.pl/graphic/unit/unit_marcher.png" title="Konni £ucznicy" alt="">
<img src="http://pl5.plemiona.pl/graphic/unit/unit_knight.png" title="rycerz" alt="">
</td><td align="right">'.$lk.'</td><tr>';

echo'<tr><td>
<img src="http://pl5.plemiona.pl/graphic/unit/unit_heavy.png" title="Ciezka Kawaleria" alt="">
</td><td align="right">'.$ck.'</td><tr>';

echo'<tr><td>
<img src="http://pl5.plemiona.pl/graphic/unit/unit_spear.png" title="Pikinier" alt="">
<img src="http://pl5.plemiona.pl/graphic/unit/unit_axe.png" title="Topory" alt="">
<img src="http://pl5.plemiona.pl/graphic/unit/unit_spear.png" title="£uki" alt="">
</td><td align="right">'.$pik.'</td><tr>';

echo'<tr><td>
<img src="http://pl5.plemiona.pl/graphic/unit/unit_sword.png" title="Miecze" alt="">
</td><td align="right">'.$mie.'</td><tr>';

echo'<tr><td>
<img src="http://pl5.plemiona.pl/graphic/unit/unit_ram.png" title="Tarany" alt="">
<img src="http://pl5.plemiona.pl/graphic/unit/unit_catapult.png" title="Katapulty" alt="">
</td><td align="right">'.$tar.'</td><tr>';

echo'<tr><td>
<img src="http://pl5.plemiona.pl/graphic/unit/unit_snob.png" title="Szlachcic" alt="">
</td><td align="right">'.$sz.'</td><tr>';}

echo'</table>';

echo'<TABLE border="0" class="vis"><tr>
<Th>Gracz</Th>
<Th>Nazwa</Th>
<Th>X|Y</Th>
<Th>Punkty</Th>
<Th>Typ wioski</Th>
<Th>Data</Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/buildings/wall.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_spear.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_sword.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_axe.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_archer.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_spy.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_light.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_marcher.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_heavy.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_ram.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_catapult.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_knight.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_snob.png"></Th>
<Th>Opis</Th>
</tr>';
$zap=" SELECT  v.name AS n_wsi, v.id AS id_wsi,v.mur,
v.x,v.y,v.points,v.opis,v.typ,v.data,v.pik,v.mie,v.axe,v.luk,v.zw,v.lk,v.kl,v.ck,v.tar,v.kat,v.ry,v.sz,
t.name AS gracz,t.id AS g_id
  FROM `village` v, tribe t
WHERE v.player = t.id ";
$zap.= "AND v.x='$w_agr[0]' AND v.y='$w_agr[1]'";
connection();
$wynik = @mysql_query($zap);

while($r = mysql_fetch_array($wynik)){
if($ab==1){$ab_c='a';$ab=0;}else{$ab_c='b';$ab=1;}
echo'<tr style="white-space: nowrap;" class="nowrap row_'.$ab_c.'">';
echo'<TD>'.$r[gracz].'</TD>
<TD><a href="javascript:popup_scroll(\'edyt/menu.php?id='.$r[id_wsi].'\',310,290)">'.$r[n_wsi].'</a></TD>
<TD>'.$r[x].'|'.$r[y].'</TD>
<TD class="hidden">'.$r[points].'</TD>
<TD>'.$rodzaje[$r[typ]].'</TD>
<TD>';
    if($r[data]==Null){
     echo'<IMG SRC="http://pl5.plemiona.pl/graphic/overview/prod_impossible.png" title="Nie ma raportu">';}
elseif($r[data]=='0000-00-00'){
     echo'<IMG SRC="http://pl5.plemiona.pl/graphic/overview/prod_avail.png" title="Data nie zapisana">';}
elseif($r[data]!='0000-00-00'){
     echo'<IMG SRC="http://pl5.plemiona.pl/graphic/overview/prod_running.png" title="Raport w bazie">';}

echo $r[data].'</TD>
<TD>'.$r[mur].'</TD>
<TD>'.$r[pik].'</TD>
<TD>'.$r[mie].'</TD>
<TD>'.$r[axe].'</TD>
<TD>'.$r[luk].'</TD>
<TD>'.$r[zw].'</TD>
<TD>'.$r[lk].'</TD>
<TD>'.$r[kl].'</TD>
<TD>'.$r[ck].'</TD>
<TD>'.$r[tar].'</TD>
<TD>'.$r[kat].'</TD>
<TD>'.$r[ry].'</TD>
<TD>'.$r[sz].'</TD>
<TD>'.$r[opis].'</TD>
</tr>'; }
destructor();
echo'</TABLE>';

}//if query!=NULL
else{
echo'
<form action="?cal=0" method="post">
<textarea id="query" name="query" onclick="highlight(this);" rows="6" cols="40"></textarea><BR>
<input value="Konwertuj" style="margin-top: 5px;" type="submit">
</form>';
}//else
?>