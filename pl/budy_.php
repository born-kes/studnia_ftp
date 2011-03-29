<?php  include('../serwer.php');
 function unliczenie($szll)
{   $da = split("[ .:-]", $szll);
$unlicz = ($da[0]*3600)+($da[1]*60)+$da[2];
    return $unlicz;
}

$nowy = explode(",",$_GET[budy]);
    if($_GET['people'] !=NULL){$people=$_GET['people'];}else{$people=0;}

    if($_GET['budy']   !=NULL){
     $nowy = explode(",",$_GET[budy]);
     $data = mktime()-$godzina_zero;
 $data_bud = unliczenie($_GET[data])+mktime()-$godzina_zero;
     $zap  = $_GET['id'];
$budy=",ratusz=$nowy[0],
        koszary=$nowy[1],
        stajnie=$nowy[2],
        warsztat=$nowy[3],
        palac=$nowy[4],
        kuznia=$nowy[5],
        plac=$nowy[6],
        piedestal=$nowy[7],
        rynek=$nowy[8],
        tartak=$nowy[9],
        cegielnia=$nowy[10],
        huta=$nowy[11],
        zagroda=$nowy[12],
        spichlerz=$nowy[13],
        schowek=$nowy[14],
        mur=$nowy[15],
        ludzie=$people";
 $zapytanie = "UPDATE budy SET  data='$data'".$budy." WHERE id=$zap;";
 $zapytanie2 = "INSERT INTO budy SET id=$zap, status=0, data='$data'".$budy;

   // echo $zapytanie2;
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
echo $string.'<br>: '.$zapytanie.'<br>'.$zapytanie2.'<br>';
   }


 $zapy = "UPDATE ws_raport SET  d_mur='$data', mur=$nowy[15] WHERE id=$zap;";
    connection();
      @mysql_query($zapy);
    destructor();


?>