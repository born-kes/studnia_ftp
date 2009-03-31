<?PHP

if($widmo=@array_keys($_POST['widmo'])){
                                                                  /*Wioska Widmo*/
for($i=0; $i<count($widmo);$i++){
$zap_widmo=explode(",",$_POST['widmo'][$widmo[$i]]);

if($zap_widmo!==NULL){

//Pytanie o wioske o wiosek
$zapy="SELECT w.pik, w.mie, w.axe, w.luk, w.zw, w.lk, w.kl, w.ck, w.tar, w.kat, w.ry, w.sz
FROM village w,
WHERE w.x ='$zap_widmo[0]'
  AND w.y ='$zap_widmo[1]'";

//£±czenie z baz±
connection();
$wyk = @mysql_query($zapy);
//wczytywanie wioski
if($r = @mysql_fetch_array($wyk)){

//odejmowanie widmo
$pik=$r[0]-$zap_widmo[2];
$mie=$r[1]-$zap_widmo[3];
$axe=$r[2]-$zap_widmo[4];
$luk=$r[3]-$zap_widmo[5];
$zw =$r[4]-$zap_widmo[6];
$lk =$r[5]-$zap_widmo[7];
$kl =$r[6]-$zap_widmo[8];
$ck =$r[7]-$zap_widmo[9];
$tar=$r[8]-$zap_widmo[10];
$kat=$r[9]-$zap_widmo[11];
$ry =$r[10]-$zap_widmo[12];
$sz =$r[11]-$zap_widmo[13];

destructor();
// Montowanie zapytania
if(count($r)==1){
$Zap="UPDATE village SET ";
$p=' , ';

    if($pik!=NULL &&  $pik!=0)	{$Zap.="pik= ". $pik.$p;}elseif($pik!==NULL || $pik <=0 )	{$Zap.="`pik`=NULL ".$p; }
    if($mie!=NULL &&  $mie!=0)	{$Zap.="mie= ". $mie.$p;}elseif($mie!==NULL || $mie <=0 )	{$Zap.="`mie`=NULL ".$p; }
    if($axe!=NULL &&  $axe!=0)	{$Zap.="axe= ". $axe.$p;}elseif($axe!==NULL || $axe <=0 )	{$Zap.="`axe`=NULL ".$p; }
    if($luk!=NULL &&  $luk!=0)	{$Zap.="luk= ". $luk.$p;}elseif($luk!==NULL || $luk <=0 )	{$Zap.="`luk`=NULL ".$p; }
    if($zw !=NULL &&  $zw !=0)	{$Zap.=" zw= ". $zw.$p; }elseif($zw !==NULL || $zw  <=0 ) 	{$Zap.="`zw`=NULL ".$p;  }
    if($lk !=NULL &&  $lk !=0)	{$Zap.=" lk= ". $lk.$p; }elseif($lk !==NULL || $lk  <=0 )	{$Zap.="`lk`=NULL ".$p;  }
    if($kl !=NULL &&  $kl !=0)	{$Zap.=" kl= ". $kl.$p; }elseif($kl !==NULL || $kl  <=0 )	{$Zap.="`kl`=NULL ".$p;  }
    if($ck !=NULL &&  $ck !=0)	{$Zap.=" ck= ". $ck.$p; }elseif($ck !==NULL || $ck  <=0 )	{$Zap.="`ck`=NULL ".$p;  }
    if($tar!=NULL &&  $tar!=0)	{$Zap.="tar= ". $tar.$p;}elseif($tar!==NULL || $tar <=0 )	{$Zap.="`tar`=NULL ".$p; }
    if($kat!=NULL &&  $kat!=0)	{$Zap.="kat= ". $kat.$p;}elseif($kat!==NULL || $kat <=0 )	{$Zap.="`kat`=NULL ".$p; }
    if($ry !=NULL &&  $ry !=0)	{$Zap.=" ry= ". $ry.$p; }elseif($ry !==NULL || $ry  <=0 )	{$Zap.="`ry`=NULL ".$p;  }
    if($sz !=NULL &&  $sz !=0)	{$Zap.=" sz= ". $sz.$p; }elseif($sz !==NULL || $sz  <=0 )	{$Zap.="`sz`=NULL ".$p;  }
$Zap=substr($Zap,0,-2);
$Zap.=" WHERE w.x ='$zap_widmo[0]'
          AND w.y ='$zap_widmo[1]'";

echo $Zap;
       connection();
$wynik = mysql_query($zap) or die (mysql_error());
destructor();
}//koniec if(count($r)==1)
}//koniec if($r = @mysql_fetch_array($wynik))
}//koniec if($zap_widmo!==NULL)
}//koniec for
}// koniec array_keys
?>