<html><head>
<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
<link rel="stylesheet" type="text/css" href="../img/stamm1201718544.css">
<script src="../mootools.js" type="text/javascript"></script>
<script src="../scriptt.js" type="text/javascript"></script>
</head>
<body>
<table class="vis" align="center">
<tr class="units_there"><td>
<form enctype="multipart/form-data" action="4.php" method="post">
<?php   include('../connection.php');
echo 'Data i godzina ataku : '. $_POST[czas]; 

 foreach($w_tepm as $yy =>$val){if($val==$_POST[cos]){$co_go=$yy;}}
$ata=array_keys($_POST['ata']);
$obr=array_keys($_POST['obr']);

echo'<tr class="nowrap row_b">
<td>atakuje</td>
<td>Jednostka</td>
<td>atakowana</td>
<td>Czas marszu:</td>
<td>Data wysłania</td>
<td>Do minutnika?<input name="all" class="selectAllata" onclick="selectAll(this.form, this.checked)" type="checkbox"></td></tr>';

for($i=0; $i<count($ata);$i++){
$atak=explode("|",$_POST['ata'][$ata[$i]]);     $obro=explode("|",$_POST['obr'][$obr[$i]]);

$odleglosc=sqrt(potega($atak[1]-$obro[1],2)+potega($atak[2]-$obro[2],2));
$szll=$odleglosc*(60*$_POST[cos]);
$czas=przeliczenie($szll);

$mktt=mkczas($_POST[czas])-$szll;  //czas wysłania ataku

echo"<tr>
<td>$atak[0] ($atak[1]|$atak[2])</td>
<td>".$w_typ[$co_go]."</td>
<td>$obro[0] ($obro[1]|$obro[2])</td>
<td>$czas</td>
<td>".date("Y-m-d G:i:s",$mktt)."</td>
<td><input name=\"opis[]\" value=\"atak <b>".$w_typ[$co_go]."</b> z ".$atak[0]." (<b>$atak[1]|$atak[2]</b>) na $obro[0] (<b>$obro[1]|$obro[2]</b>) na godzine <i>$_POST[czas]</i>\" type=\"hidden\">
<input name=\"minu[]\" value=\"".date("Y-m-d G:i:s",$mktt)."\" type=\"checkbox\"></td>

</tr>";}
?>
<tr><td colspan="5" class="selected"> </td><td class="units_there"><input value="Dodaj" type="submit"></td></tr></table>
</form>