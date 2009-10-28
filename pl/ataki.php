<?php  include('../connection.php'); $id_zalogowany=$_SESSION['id'];

if($_GET[czas1]!=NULL)
{ $id_ataku=$_GET[id_ataku];
  $cel=$_GET[cel];
  $pochodzenie = $_GET[agr];
  $kto = $_GET[id_agr];
 $data = (mkczas_pl($_GET[czas1])-$godzina_zero);

$into = "Insert Into `ataki` Values('$id_ataku','$cel','$pochodzenie','$kto','$data','');";
 connection();
 if(!@mysql_query($into)){ echo "Atak w bazie";}else{echo 'Dodano atak do bazy';};
 destructor();
}elseif($_POST!=NULL){echo "<h4>Dane nie pelne</h4>";}?>