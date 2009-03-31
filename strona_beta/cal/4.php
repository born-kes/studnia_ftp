<?php
$id_zalogowany=$_SESSION['id']; 
$minu=array_keys($_POST['minu']);
$opis=array_keys($_POST['opis']);


for($i=0; $i<count($minu);$i++){

$data=$_POST['minu'][$minu[$i]]; 
$opiss=urlencode($_POST['opis'][$opis[$i]]);
echo $_POST['opis'][$opis[$i]].' o godzinie '.$_POST['minu'][$minu[$i]];
$into = "Insert Into `Minutnik` Values('','$data','$id_zalogowany','$opiss');";
 connection(); 
@mysql_query($into); 
destructor(); echo '<h4>Dodano Wpis</h4><br>';}
echo'<BR><a href="?m=8">Zobacz Minutnik</a> masz go te¿ w zak³adce Profil';
?>