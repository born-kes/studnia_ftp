<? include_once(dirname(dirname(__FILE__)) . '/connection.php');
function aut($s){return (int)$s;}

$wczasy = mktime()-$godzina_zero;
$ileSukces=0;
$ileNowych=0;
$ileError=0;

$idArry=@array_keys($_POST['id']);
$murArry=@array_keys($_POST['mur']);
     connection();
for($i=0; $i<count($idArry);$i++){
         $id=aut($_POST['id'][$idArry[$i]]);
             if( !($id!=null || $id=0) ){$ileError++; continue;  }
         $mur=aut($_POST['mur'][$murArry[$i]]);
         
 $zapytanie  = " UPDATE ws_raport SET d_mur='$wczasy', mur='$mur' WHERE `id`='$id'; ";
 $zapytanie2 = " INSERT INTO ws_raport SET id='$id', d_mur='$wczasy',mur=$mur; ";

       if(!@mysql_query($zapytanie))
       {
           if(!@mysql_query($zapytanie2))
             $ileError++;
           else
             $ileNowych++;
             
       }else $ileSukces++;
}
     destructor();
 include('html/mur.php');
?>