<?PHP 
$id_zalogowany=$_SESSION['id']; 
echo "Minutnik to proste narzêdzie do odliczania czasu<BR />
Zapamiêtuje on datê i opis i odmierza czas do zdarzenia<BR />
Ka¿dy ma w³asn± listê zdarzeñ, a wiêc nie za¶miecaj± ci jej<BR />
notatka innych graczy, a fajnie jest móc sobie co¶ zapisaæ w tej formie<BR />
Kiedy wyprowadziæ siostrê na spacer, podlaæ kwiatki, wys³aæ atak... itd.<BR /><BR />";



function przeliczenie($szll)
{
$data_explode= explode(" ", date("j G i s", $szll));
$data_explode[0]=$data_explode[0]-1;
$data_explode[1]=$data_explode[1]-1;
if($data_explode[0]>0){$data_explode[1]+= $data_explode[0]*24;}
if($data_explode[3]<0){$data_explode[3]=$data_explode[3]+60;$data_explode[2]=$data_explode[2]-1;}//sek
if($data_explode[2]<0){$data_explode[2]=$data_explode[2]+60;$data_explode[1]=$data_explode[1]-1;}//min
if($data_explode[1]<0){$data_explode[1]=$data_explode[1]+24;$data_explode[0]=$data_explode[0]-1;}//godzi
$wynik = $data_explode[1].":".$data_explode[2].":".$data_explode[3];
    return $wynik;
}
if($_POST[dzien]!=NULL && $_POST[miesi]!=NULL && $_POST[rok]!=NULL && $_POST[godz]!=NULL && $_POST[min]!=NULL && $_POST[sek]!=NULL && $_POST[opis]!=NULL)
{
  $opis = urlencode($_POST[opis]);
$data = $_POST[rok].'-'.$_POST[miesi].'-'.$_POST[dzien].' '.$_POST[godz].':'.$_POST[min].':'.$_POST[sek];
$into = "Insert Into `Minutnik` Values('','$data','$id_zalogowany','$opis');";
 connection(); @mysql_query($into); destructor(); echo "<h4>Dodano Wpis</h4>";
}elseif($_POST!=NULL){echo "<h4>Dane nie pelne</h4>";}
     
if($_GET[usun]!=NULL){$dell = "Delete from `Minutnik` where `id_min`='$_GET[usun]' AND `id_gracz`='$id_zalogowany'"; connection(); @mysql_query($dell);destructor(); echo "<h4>Usunieto Wpis</h4>";}                
if($_GET[usun_all]!=NULL && $id_zalogowany!=NULL){$dell = "Delete from `Minutnik` where `id_gracz`='$id_zalogowany'"; connection(); @mysql_query($dell);destructor(); echo "<h4>Usunieto Wpis</h4>";}                


 echo'<form  action="?m=8" method="POST"><table><tr><td>
<table><tr><td></td><td>dzien</td><td>Miesiac</td><td>Rok</td><td>Godz.</td><td>Min</td><td>Sek</td></tr>
 <tr><td><input value="Dodaj" type="submit"></td>
 <td><input type="text" maxlength="2" name="dzien" value="'.date("j").'" size="2"></td>
 <td><input type="text" maxlength="2" name="miesi" value="'.date("n").'" size="2"></td>
 <td><input type="text" maxlength="2" name="rok" value="'.date("Y").'" size="2"></td>
 <td><input type="text" maxlength="2" name="godz" value="'.date("G").'" size="2"></td>
 <td><input type="text" maxlength="2" name="min" value="'.date("i").'" size="2"></td>
 <td><input type="text" maxlength="2" name="sek" value="'.date("s").'" size="2"></td>
</tr>
</tr>
<tr><td>OPIS :</td><td colspan="6"><input type="text" name="opis" value="" size="50"></td>
</tr>
</table></td><td><a href="?m=8&usun_all=1">Usuñ wszystkie wpisy do Minutnika</a></td></tr></table></form></td></tr><tr><td align="center"> ';
 echo'  <table class="box" cellspacing="0" border="0"><tbody><tr><td><BR /></td></tr> ';

     $zap = "SELECT * FROM `Minutnik` WHERE `id_gracz`='$id_zalogowany' ORDER BY `data` ASC";  connection();  $wynik = @mysql_query($zap);

   while($r = mysql_fetch_array($wynik)){

echo '<tr><td> '.$r[1].' </td><td> </td><th> ';    $da = split("[ :-]", $r[1]);      $mktt =  mktime($da[3],$da[4],$da[5],$da[1],$da[2],$da[0])-mktime();
$pdata = przeliczenie($mktt);
if($mktt>0){      echo ' <span class="timer"> '.$pdata.' </span> ';
}else{ echo ' <b><span class="warn" >Odliczanie skonczone</span></b> ';}

       echo ' </th><td> </td><td> '.urldecode($r[3]).' </td><td></td><td> <a href="?m=8&usun='.$r[0].'"> USUN </a></td></tr><tr><td><BR></td></tr>';
}                    destructor();

?>
<tr>
<td><BR />
Zegarek: <b><span id="serverTime" class="warn"><?PHP echo date("G:i:s"); ?></span></b></td>
</tr></tbody></table>
<script type="text/javascript">startTimer();</script>
