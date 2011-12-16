<?PHP include('../connection.php'); sesio_id();  $ec =mktime()-$godzina_zero-(86400*7); $Komunikat=null;
function of_te($str){return preg_replace('/[^0-9]/', '', $str);}


$statustyp= $status[typ];
     if($_GET[COUNT]==='true')$COUNT=true; else $COUNT=false;
     if(intval($_GET[dane])==0 || intval($_GET[dane])==1) {include('agr.php');}
else if(intval($_GET[dane])==2 ) {include('obr.php');}
else if(intval($_GET[dane])==5 ) {include('zapisz.php');}
else{ echo '-1'; exit();}

$zapytanie = $qzap_a.
             $qzap_b.
               $qzap0.
               $qzap1.
               $qzap2.
             $qzap_c.
               $zap.
               $qzap3;

//echo $zapytanie.'<br />'.$Komunikat;
$s ='
';

if($Komunikat!=null){echo $Komunikat;exit();}
if($COUNT)
{ connection();    $wynik = @mysql_query($zapytanie);
  if($r = @mysql_fetch_array($wynik)){
   echo $r[0].' '; 
  }else{
   echo 0;
  }
  @destructor();
}
else
{ if($log=='o'){
//$Storing .='<sql>'.$zapytanie.'</sql>';

$Storing .='<wsi>';
$Storing .='<o_id>0</o_id>'.$s;                                               
$Storing .='<o_name>"Wojska które zostan± w wiosce "</o_name>'.$s;  
$Storing .='<o_xy>0</o_xy>'.$s; 
$Storing .='<o_pt>0</o_pt>'.$s;                                                               //$pkt_1
$Storing .='<o_if>true</o_if>'.$s;                                                        // $if__1
$Storing .='<o_if2>true</o_if2>'.$s;                                                         //$if__2
$Storing .='<o_wolne>0</o_wolne>'.$s;                                            //$woln1
$Storing .='</wsi>';
}
  connection();   $wynik = @mysql_query($zapytanie);
  while($r = @mysql_fetch_array($wynik))  {$efekt=true;
$Storing .='<wsi>';
$Storing .='<'.$log.'_id>'.$r[id].'</'.$log.'_id>'.$s;                                                  //$id__1
$Storing .='<'.$log.'_name>"'.plCharset(urldecode($r[name]), UTF8_TO_WIN1250).'"</'.$log.'_name>'.$s;   //$name1
$Storing .='<'.$log.'_xy>'.$r[x].'|'.$r[y].'</'.$log.'_xy>'.$s;                                        //$xy__1

$Storing .='<'.$log.'_pt>'.$r[points].'</'.$log.'_pt>'.$s;                                                               //$pkt_1
$Storing .='<'.$log.'_if>true</'.$log.'_if>'.$s;                                                        // $if__1

 if($wojsko==0 && $log=='a')
 {
     if($r[sz]>0)$szyb=35;elseif($r[tar]>0)$szyb=30;elseif($r[mie]>0)$szyb=22;elseif($r[pik]>0 || $r[axe]>0 || $r[luk]>0)$szyb=18;else if($r[ck]>0)$szyb=11;elseif($r[lk]>0 || $r[kl]>0)$szyb =10;else if($r[zw]>0)$szyb=9;else $szyb="0";
  }
 else if($log=='a')
 {$szyb =$wojsko;}
 else{
     if($r[opis]==null)
      $Storing .= '<o_if2>true</o_if2>'.$s;                                                         //$if__2
     else
      $Storing .='<o_if2>false</o_if2>'.$s;                                                        // $if__2
      
 // zmiana    $szyb = '"'.$statuss[typ][$r[status]].' '.data_z_bazy($r[data],false).'"';
if($r[status]!=NULL)     $szyb = $statuss[typ][$r[status]]; else $szyb = 'BRAK';
     /*wolny dla obrona czyli status*/
 }
 
$Storing .='<'.$log.'_wolne>'.$szyb.'</'.$log.'_wolne>'.$s;                                            //$woln1
$Storing .='</wsi>';
$i4++;
}@destructor();


        header('Content-type: text/xml');
echo '<'.'?xml version="1.0" encoding="ISO-8859-1"?'.'>';
echo '<tresc id="#XML">';
  echo($Storing);
echo '</tresc>';

}
?>
