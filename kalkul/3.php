<?php    include_once(dirname(dirname(__FILE__)) . '/connection.php'); sesio_id();?>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-2">
<link rel="stylesheet" type="text/css" href="../stamm1201718544.css">
<? //script src="../js/jquery1.7.mini.js" type="text/javascript"></script UTF-8 ?>
<script src="../js/scriptt.js" type="text/javascript"></script>
</head>
<body><br /><form enctype="multipart/form-data" action="4.php" method="post">

<table class="vis" align="center">
<tr class="units_there">
<td>Data i godzina ataku : <b><?php echo $_POST[czas1]; ?></b></td>
<td colspan="4" />
<td colspan="2">login:<input type="text" name="ktos" value="<?php echo $_SESSION['zalogowany']; ?>" size="5" /></td></tr> 
<?php 
$ata=@array_keys($_POST['ata']);
$obr=@array_keys($_POST['obr']);
$woj=@array_keys($_POST['woj']);

echo'<tr class="row_b">
<th>atakuje</th>
<th>Jednostka</th>
<th>Cel ataku</th>
<th>Czas marszu:</th>
<th>Data wyslania</th>
<th>Do minutnika?<input name="all" class="selectAllata" onclick="selectAll(this.form, this.checked)" type="checkbox"></td>
<td>PLAC</td></tr>';

for($i=0; $i<count($ata);$i++){
 $at=$_POST['ata'][$ata[$i]];   
 $ob=$_POST['obr'][$obr[$i]];
 $wojsk =$_POST['woj'][$woj[$i]];
 if($ob==NULL||$ob==0){/*maxymalna odleglost => czas do ataku/t�po */ continue;}


$Zap="SELECT name ,x, y, id
 FROM ws_all WHERE id ='$at';";
connection(); $wyni = mysql_query($Zap) or die (mysql_error());
 
 if($r = @mysql_fetch_array($wyni)){
 $atakire[name]=(urldecode($r[name]));
 $atakire[x_y]=$r[x].'|'.$r[y];
$atakire[wolny]=$wojsk;
 $atak=array ($r[x],$r[y]);
 $atakire[id]=$r[id]; }

destructor();

$zap="SELECT name ,x, y, id FROM ws_all WHERE id ='$ob'"; 
connection(); $wynik = mysql_query($zap) or die (mysql_error());
 if($r = @mysql_fetch_array($wynik)){ 
$obrona[name]=(urldecode($r[name]));
$obrona[xy]  =$r[x].'|'.$r[y];
$obro=array ( $r[x],$r[y]);
$obrona[id]=$r[id]; 
 }
destructor();
//echo "potega( $atak[0] - $obro[0] )+potega($atak[1] - $obro[1]) <br>";
$odleglosc=sqrt(potega($atak[0]-$obro[0],2)+potega($atak[1]-$obro[1],2));
  $szll =  $odleglosc* ($atakire[wolny]*60);
$co_go=$co_idzie[$atakire[wolny]];

$czas=przeliczenie($szll);

$mktt=mkczas_pl($_POST[czas1])-$szll;  //czas wys�ania ataku
$plac='http://pl5.plemiona.pl/game.php?village='.$atakire[id].'&screen=place&mode=command&target='.$obrona[id];
$notatka = ($mktt-$godzina_zero)."|".$atakire[id].'|'.$obrona[id].'|'.urlencode("atak <b>".$co_go."</b> na godzine <i>$_POST[czas1]</i> "); //.urlencode($plac);

$bb_code .=date("d-m-Y G:i:s ",$mktt).'atak z [coord]'.$atakire[x_y].'[/coord] '.$co_go.' [coord]'.$obrona[xy].'[/coord] wejdz na [url='.$plac.']Plac[/url]
';

echo'<tr>
<td>'.plCharset($atakire[name], UTF8_TO_WIN1250).' ('.$atakire[x_y].')</td>
<td>'.$co_go.'</td>
<td>'.plCharset($obrona[name], UTF8_TO_WIN1250).' ('.$obrona[xy].')</td>
<td>'.$czas.'</td>
<td>'.date("d-m-Y G:i:s ",$mktt).'</td>

<td align ="right">
<input name="minu[]" value="'.$notatka.'" type="checkbox">
</td>
<th><a href="'.$plac.'" target="_parent/ramka" >wyslij wojska</a></th></tr>';}
?>
<tr><td colspan="5" class="selected"> </td><td class="units_there"><input value="Dodaj" type="submit"></td></tr></table>
</form><br /> <h1>BB-Code</h1><textarea name="" rows="20" cols="130" class="vis" align="center"><?PHP echo $bb_code;?></textarea>