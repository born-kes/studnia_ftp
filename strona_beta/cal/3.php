<table border="1"><form enctype="multipart/form-data" action="?cc=4" method="post">
<?php
echo 'Data i godzina ataku : '. $_POST[czas];
$cosik = array ('Pik/ Top/ £uk','Miecznik','Zwiadowca','Kawaleria','Ciê¿ki Kawalerzysta','Tar/ Kat','Szlachcic');
$ycos = array ('18','22','9','10','11','30','35');
foreach($ycos as $yy =>$val){if($val==$_POST[cos]){$co_go=$yy;}}
 
function przeliczenie($odleglosc , $szyb)
{
//tempo jest w min
$szll=$odleglosc*($szyb*60);
$data_explode= explode(" ", date("j G i s", $szll));
$data_explode[0]=$data_explode[0]-1;
$data_explode[1]=$data_explode[1]-1;
if($data_explode[0]>0){$data_explode[1]+=$data_explode[0]*24;}//godzi
if($data_explode[3]<0){$data_explode[3]=$data_explode[3]+60;$data_explode[2]=$data_explode[2]-1;}//sek
if($data_explode[2]<0){$data_explode[2]=$data_explode[2]+60;$data_explode[1]=$data_explode[1]-1;}//min
if($data_explode[1]<=0){$data_explode[1]=$data_explode[1]+24;$data_explode[0]=$data_explode[0]-1;}//godzi

$wynik= intval($data_explode[1]).":".intval($data_explode[2]).":".intval($data_explode[3]);
    return $wynik;
}

function mkczas($szll){
if($_POST[czas]!=NULL && $_POST[czas]!= 'rrrr-mm-dd gg:ii:ss')
{
   $cz=explode(":",  $szll);  $mkczas=($cz[0]*3600)+($cz[1]*60)+$cz[2];
$da = split("[ :-]", $_POST[czas]);    
$mktt =  mktime(intval($da[3]),intval($da[4]),intval($da[5]),intval($da[1]),intval($da[2]),intval($da[0]))-$mkczas;
    return $mktt;
}
                       }


$ata=array_keys($_POST['ata']);
$obr=array_keys($_POST['obr']);

echo'<tr>
<td>atakuje</td>
<td>Jednostka</td>
<td>atakowana</td>
<td>Czas marszu:</td>
<td>Data wys³ania</td>
<td>Do minutnika?<input name="all" class="selectAllata" onclick="selectAll(this.form, this.checked)" type="checkbox"></td></tr>';

for($i=0; $i<count($ata);$i++){
$atak=explode("|",$_POST['ata'][$ata[$i]]);     $obro=explode("|",$_POST['obr'][$obr[$i]]);

$odleglosc=sqrt(potega($atak[1]-$obro[1],2)+potega($atak[2]-$obro[2],2));
$czas=przeliczenie($odleglosc,$_POST[cos]);
$mktt=mkczas($czas);//czas wys³ania ataku

echo"<tr>
<td>$atak[0] ($atak[1]|$atak[2])</td>
<td>".$cosik[$co_go]."</td>
<td>$obro[0] ($obro[1]|$obro[2])</td>
<td>$czas</td>
<td>".date("Y-m-d G:i:s",$mktt)."</td>
<td><input name=\"opis[]\" value=\"atak <b>".$cosik[$co_go]."</b> z ".$atak[0]." (<b>$atak[1]|$atak[2]</b>) na $obro[0] (<b>$obro[1]|$obro[2]</b>) na godzine <i>$_POST[czas]</i>\" type=\"hidden\">
<input name=\"minu[]\" value=\"".date("Y-m-d G:i:s",$mktt)."\" type=\"checkbox\"></td>

</tr>";}
?>
<tr><td colspan="5"> </td><td><input value="Dodaj" type="submit"></td></tr></table>
</form>