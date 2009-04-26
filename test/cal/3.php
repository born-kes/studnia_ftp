<?php   include('../connection.php');?>
<html><head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="stamm.css">
<script src="../js/mootools.js" type="text/javascript"></script>
<script src="../js/scriptt.js" type="text/javascript"></script>
</head>
<body>
<table class="vis" align="center">
<tr class="units_there"><td>
<form enctype="multipart/form-data" action="4.php" method="post">
<?php 
echo 'Data i godzina ataku : <b>'. $_POST[czas1] .'</b>'; 

$co_go=$co_idzie[$_POST[cos]];
$ata=@array_keys($_POST['ata']);
$obr=@array_keys($_POST['obr']);

echo'<tr class="row_b">
<th>atakuje</th>
<th>Jednostka</th>
<th>Cel ataku</th>
<th>Czas marszu:</th>
<th>Data wyslania</th>
<th>Do minutnika?<input name="all" class="selectAllata" onclick="selectAll(this.form, this.checked)" type="checkbox"></td></tr>';

for($i=0; $i<count($ata);$i++){
 $at=$_POST['ata'][$ata[$i]];     $ob=$_POST['obr'][$obr[$i]];

$Zap="SELECT name ,x, y, wolny FROM village WHERE id ='$at'";
connection(); $wyni = mysql_query($Zap) or die (mysql_error());
 
 if($r = @mysql_fetch_array($wyni)){ $atakire[name]=$r[name]; $atakire[x_y]=$r[x].'|'.$r[y]; $atakire[wolny]=$r[wolny]; }
destructor();

$zap="SELECT name ,x, y, wolny FROM village WHERE id ='$ob'"; 
connection(); $wynik = mysql_query($zap) or die (mysql_error());
 
 if($r = @mysql_fetch_array($wynik)){ 
$obrona[name]=$r[name];
$obrona[xy]  =$r[x].'|'.$r[y]; 
$obrona[wolny]=$r[wolny]; 
 }
destructor();
$odleglosc=sqrt(potega($atak[1]-$obro[1],2)+potega($atak[2]-$obro[2],2));
$szll=$odleglosc*(60*$_POST[cos]);
$czas=przeliczenie($szll);

$mktt=mkczas_pl($_POST[czas1])-$szll;  //czas wys³ania ataku

echo"<tr>
<td>$atakire[name] ($atakire[x_y])</td>
<td>".$co_go."</td>
<td>$obrona[name] ($obrona[x_y])</td>
<td>$czas</td>
<td>".date("Y-m-d G:i:s",$mktt)."</td>
<td><input name=\"opis[]\" value=\"atak <b>".$co_go."</b> z ".$atakire[name]." (<b>$atakire[x_y]</b>) na $obrona[name] (<b>$obrona[xy]</b>) na godzine <i>$_POST[czas]</i>\" type=\"hidden\">
<input name=\"minu[]\" value=\"".date("Y-m-d G:i:s",$mktt)."\" type=\"checkbox\"></td>

</tr>";}
?>
<tr><td colspan="5" class="selected"> </td><td class="units_there"><input value="Dodaj" type="submit"></td></tr></table>
</form>