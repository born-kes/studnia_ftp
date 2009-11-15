<?
include_once(dirname(dirname(__FILE__)) . '/connection.php');
$wczasy = mktime()-$godzina_zero;
$licz=0; $l=0;

$id=@array_keys($_POST['id']);
$mur=@array_keys($_POST['mur']);

for($i=0; $i<count($id);$i++){

         $wmur=$_POST['mur'][$mur[$i]];
         $wid=$_POST['id'][$id[$i]];

 $zapytanie  = " UPDATE ws_raport SET data='$wczasy', mur='$wmur' WHERE `id`='$wid'; ";
 $zapytanie2 = " INSERT INTO ws_raport SET id='$wid', data='$wczasy',mur=$wmur; ";

   // echo $zapytanie2;
     connection();
       if(!@mysql_query($zapytanie2))
       {
     destructor();
           connection();
           if(!@mysql_query($zapytanie))
           {
                $string='Nie Uda³o siê Dodaæ Raportu'; $l++;

           }else{$string='Zaktu³alizowano Raport';$licz++; }

       }else{$string='Dodano Nowy Raport';$licz++;}
     destructor();
// echo $string.': '.$zapytanie."<br>";

}
//$query=substr($query,0,-1).")";

//for($j=0; $j<count($obr);$j++){$quert.=$_POST['obr'][$obr[$j]]; $quert.=",";}
//$quert=substr($quert,0,-1).")";


  echo '<br />Zapisano zmiany w';
echo' ilosci wojska do bazy<br>';
  echo ' W sumie '.$licz.'rekordow <br>';
 echo 'Data aktualizacji :'.data_z_bazy($wczasy);
if($l>0){  echo '<br> <br>W '.$l.' raportach wyst±pi³ b³±d i nie zmieniono danych. ';}

?>