<?php

$index=0;
echo "".$index."<br>";


/* £±czenie i wybranie bazy */
$link = mysql_connect("85.17.1.175", "bornkesws", "MKO208")or die(mysql_error());
mysql_select_db ("bornkesws")or die(mysql_error());
$wynik = mysql_query("SELECT * FROM `tos` ")or die("error");

while($r = mysql_fetch_array($wynik)){    
$update="UPDATE `wsi`SET nazwa_wsi='".$r[1]."', pkt=".$r[2].", gracz='".$r[3]."', plemie='".$r[4]."' WHERE wsi_id=".$r[0]."";
$insert="INSERT INTO `wsi` VALUES ($r[0],'$r[1]',$r[2],'$r[3]','$r[4]',0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '0000-00-00')";

$test = mysql_query("SELECT wsi_id FROM `wsi` Where wsi_id='$r[0]'")or die("test error");

if($xxx = mysql_fetch_array($test)){
$go=mysql_query($update)or die("error");}else{
$go=mysql_query($insert)or die("error");}

$index++;
echo "<br>".$index." . . . ".$go."";
}
echo "Koniec ;p<br>";
$end=mysql_close($link);
/*or die(mysql_error());*/
?>