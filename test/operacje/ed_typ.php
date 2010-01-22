             <?
include_once(dirname(dirname(__FILE__)) . '/connection.php');
$p=" , ";
 $data = mktime()-$godzina_zero;

$id=array_keys($_POST['id']);
$typ=$_POST[n_typ];

for($i=0; $i<count($id);$i++){

         $wid=$_POST['id'][$id[$i]];


 $zapytanie = "UPDATE ws_mobile SET  data='$data', typ=".$typ." WHERE id=$wid;";
 $zapytanie2 = "INSERT INTO ws_mobile SET id=$wid, typ=".$typ.", data='$data'";


     connection();
       if(!@mysql_query($zapytanie2))
       {
     destructor();
           connection();
           if(!@mysql_query($zapytanie))
           {
                $string='Nie Uda³o siê Dodaæ Raportu';

           }else{$string='Zaktu³alizowano Raport'; }

       }else{$string='Dodano Nowy Raport';}
     destructor();
//echo $string.'<br>: '.$zapytanie.'<br>'.$zapytanie2.'<br>';

}
  echo '<br />Zapisano zmiany w Typie wiosek i ilosci wojska do bazy<br> W sumie '.count($id).'rekordow';

?>