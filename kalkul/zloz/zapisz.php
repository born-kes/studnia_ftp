<?PHP $moje_id = $_SESSION['id'];

foreach($_GET as $f => $v){ $quer .="$f=".urlencode($v)."&"; } 


if($COUNT && $_GET[m]!=11)
{ 

$zap ="INSERT INTO `ws_opis` ( `id` , `opis` , `id_user` ) VALUES ('','".$quer."','$moje_id');";
  connection();
      if(@mysql_query($zap)){echo 'Zapisan';}else{ echo 'Blad nr ' ;}
  destructor();
}else if($_GET[m]==11)
{
foreach($_GET as $g => $h)
{
$quer .="$g=".urlencode($h)."&"; if($g==='m')$quer='';} 

$zap ="DELETE FROM `ws_opis` WHERE id_user='$moje_id' AND opis='$quer';";

  connection();
      if(@mysql_query($zap)){echo 'Usuniete ';}else{ echo 'Blad nr ' ;}
  destructor();
exit();
}


?>