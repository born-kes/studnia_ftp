<?php  include('../connection.php'); $id_zalogowany=$_SESSION['id'];

if($_GET[czas1]!=NULL)
{
  if($_GET[proxi]===NULL)
    {$id_ataku=$_GET[id_ataku];
    $cel=$_GET[cel];
    $pochodzenie = $_GET[agr];
    $kto = $_GET[id_agr];
}else{
    $id_ataku=$_GET[id_ataku];
    $cel=         url_proxi($_GET[cel]);
$cel= $cel[id];
    $pochodzenie =url_proxi($_GET[agr]);
$pochodzenie =$pochodzenie[id];
    $kto =        url_proxi($_GET[id_agr]);
$kto=$kto[id];}

 $data = (mkczas_pl($_GET[czas1])-$godzina_zero);
if(!($data<0)|| !($data>(mktime()-$godzina_zero+1900000))){
$into = "Insert Into `list_ataki` Values('$id_ataku','$cel','$pochodzenie','$kto','$data',''); ";
//echo $into;
 connection();
 if(!@mysql_query($into)){ echo " Atak w bazie";}else{echo ' Dodano atak do bazy';};
 destructor(); }
}elseif($_POST!=NULL){echo "<h4>Dane nie pelne</h4>";}
?>