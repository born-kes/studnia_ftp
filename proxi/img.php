<?php
 function url_proxi($str)
{  $str=str_replace('amp;','',base64_decode($str));
   $str= explode("?",$str);
   $str= explode("&",$str[1]);
   for($i=0;count($str)>$i;$i++ )
   { $Get = explode("=",$str[$i]);
     $url[$Get[0]]=$Get[1];
   }
   return $url;
}

 include('../serwer.php');
 $data = mktime()-$godzina_zero;
    if($_GET['budy']   !=NULL){  $str = url_proxi($_GET['budy']);  }
 $zapytanie = "UPDATE budy SET  status=1 WHERE id=".$str[village];
 $zapytanie2 = "INSERT INTO budy SET
                `id` =".$str[village].",
                `data` =$data,
                `budowa` =0,
                `ratusz` =0,
                `koszary` =0,
                `stajnie` =0,
                `warsztat` =0,
                `palac` =0,
                `kuznia` =0,
                `plac` =0,
                `piedestal` =0,
                `rynek` =0,
                `tartak` =0,
                `cegielnia` =0,
                `huta` =0,
                `zagroda` =0,
                `spichlerz` =0,
                `schowek` =0,
                `mur` =0,
                `status`=1";


$dest=ImageCreate(10,10);
$kolor_tla = ImageColorAllocate($dest,20,200,10);  //zielony
$kolor_tla = ImageColorAllocate($dest,200,20,10);  //czerwony
    // echo $zapytanie2;
     connection();
       if(!@mysql_query($zapytanie2))
       {
     destructor();
           connection();
           if(!@mysql_query($zapytanie))
           {    $kolor_tla = ImageColorAllocate($dest,200,20,10);  //czerwony
                $string='Nie Uda³o siê Dodaæ Raportu';

           }else{$kolor_tla = ImageColorAllocate($dest,20,200,10);  /*zielony*/$string='Zaktu³alizowano Raport'; }

       }else{$kolor_tla = ImageColorAllocate($dest,20,200,10);  /*zielony*/ $string='Dodano Nowy Raport';}
     destructor();
//echo $string.': '.$zapytanie.'<br>'.$zapytanie2.'<br>';


ImageString($dest,2,2,0," Nie jeste¶ zalogowany",$k_txt_);

header('Content-Type: image/gif');
imagegif($dest);
imagedestroy($dest);

?>