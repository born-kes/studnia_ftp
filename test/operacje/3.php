<?php   include('../connection.php');?>
<html><head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="stamm.css">
<script src="../js/mootools.js" type="text/javascript"></script>
<script src="../js/scriptt.js" type="text/javascript"></script>
</head>
<body><br />
<table class="vis" align="center">
<tr class="units_there"><td>
<form enctype="multipart/form-data" action="4.php" method="post">
<?php 
echo 'Data i godzina ataku : <b>'. $_POST[czas1] .'</b>'; 

$co_go=$co_idzie[$_POST[wojsko]];
$ata=@array_keys($_POST['ata']);
$obr=@array_keys($_POST['obr']);

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
 
 if($ob==NULL||$ob==0){/*maxymalna odleglost => czas do ataku/têpo */ continue;}


$Zap="SELECT name ,x, y, wolny, id FROM village WHERE id ='$at'";
connection(); $wyni = mysql_query($Zap) or die (mysql_error());
 
 if($r = @mysql_fetch_array($wyni)){
 $atakire[name]=$r[name];
 $atakire[x_y]=$r[x].'|'.$r[y];
 $atakire[wolny]=$r[wolny];
 $atak=array ($r[x],$r[y]);
 $atakire[id]=$r[id]; }

destructor();

$zap="SELECT name ,x, y, id FROM village WHERE id ='$ob'"; 
connection(); $wynik = mysql_query($zap) or die (mysql_error());
 if($r = @mysql_fetch_array($wynik)){ 
$obrona[name]=$r[name];
$obrona[xy]  =$r[x].'|'.$r[y];
$obro=array ( $r[x],$r[y]);
$obrona[id]=$r[id]; 
 }
destructor();
//echo "potega( $atak[0] - $obro[0] )+potega($atak[1] - $obro[1]) <br>";
$odleglosc=sqrt(potega($atak[0]-$obro[0],2)+potega($atak[1]-$obro[1],2));

          if($_POST[wojsko]!=0){  $szll =  $odleglosc* ($_POST[wojsko]*60); }
        else{  $szll =  $odleglosc* ($atakire[wolny]*60);      }



//$szll=$odleglosc*(60*$_POST[cos]);
$czas=przeliczenie($szll);

$mktt=mkczas_pl($_POST[czas1])-$szll;  //czas wys³ania ataku
$plac='<a href="http://pl5.plemiona.pl/game.php?village='.$atakire[id].'&screen=place&mode=command&target='.$obrona[id].'" target="_parent/ramka" >wyslij wojska</a>';
$notatka = ($mktt-$godzina_zero)."|".$atakire[id].'|'.$obrona[id].'|'.urlencode("atak <b>".$co_go."</b> z ".$atakire[name]." (<b>$atakire[x_y]</b>) na $obrona[name] (<b>$obrona[xy]</b>) na godzine <i>$_POST[czas1]</i> "); //.urlencode($plac);


echo'<tr>
<td>'.$atakire[name].' ('.$atakire[x_y].')</td>
<td>'.$co_go.'</td>
<td>'.$obrona[name].' ('.$obrona[xy].')</td>
<td>'.$czas.'</td>
<td>'.date("d-m-Y G:i:s ",$mktt).'</td>

<td align ="right">
<input name="minu[]" value="'.$notatka.'" type="checkbox">
</td>
<th>'.$plac.'</th></tr>';}
?>
<tr><td colspan="5" class="selected"> </td><td class="units_there"><input value="Dodaj" type="submit"></td></tr></table>
</form>