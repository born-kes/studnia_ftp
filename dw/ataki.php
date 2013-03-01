<?php  include('../connection.php');sesio_id(); $id_zalogowany=$_SESSION['id'];

if($_GET[czas1]!=NULL)
{
  if($_GET[proxi]===NULL)
    {$id_ataku=aut($_GET[id_ataku]);
    $co=htmlspecialchars($_GET[co]);
    $cel=aut($_GET[cel]);
    $pochodzenie = aut($_GET[agr]);
    $kto = aut($_GET[id_agr]);
}else{exit();}

 $data = aut(mkczas_pl($_GET[czas1])-$godzina_zero);
if(!($data<0)|| !($data>(mktime()-$godzina_zero+1900000))){
$into = "Insert Into `list_ataki` Values('$id_ataku','$cel','$pochodzenie','$kto','$data','$co','$id_zalogowany'); ";
//echo $into;
 connection();
 if(!@mysql_query($into)){ echo " Atak w bazie";}else{echo ' Dodano atak do bazy';};
 destructor(); }
}elseif($_POST!=NULL){echo "<h4>Dane nie pelne</h4>";}
?>