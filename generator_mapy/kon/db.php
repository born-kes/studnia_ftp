<?PHP
$start =" UPDATE village SET data='$nev_data[2]-$nev_data[1]-$nev_data[0]' ";
$s_end=" Where x=$nev_wioska[0] And y=$nev_wioska[1] ;";

if($nev_mur!=NULL){$mur=", mur=".$nev_mur;} else {$mur=", mur=NULL";}
if($nev_wojsko[1]>0) {$pik=", pik=".$nev_wojsko[1];} else{$pik=", pik=NULL";}
if($nev_wojsko[2]>0) {$mie=", mie=".$nev_wojsko[2];} else{$mie=", mie=NULL";}
if($nev_wojsko[3]>0) {$axe=", axe=".$nev_wojsko[3];} else{$axe=", axe=NULL";}
if($nev_wojsko[4]>0) {$luk=", luk=".$nev_wojsko[4];} else{$luk=", luk=NULL";}
if($nev_wojsko[5]>0) { $zw=", zw =".$nev_wojsko[5];} else{ $zw=", zw =NULL";}
if($nev_wojsko[6]>0) { $lk=", lk =".$nev_wojsko[6];} else{ $lk=", lk =NULL";}
if($nev_wojsko[7]>0) { $kl=", kl =".$nev_wojsko[7];} else{ $kl=", kl =NULL";}
if($nev_wojsko[8]>0) { $ck=", ck =".$nev_wojsko[8];} else{ $ck=", ck =NULL";}
if($nev_wojsko[9]>0) {$tar=", tar=".$nev_wojsko[9];} else{$tar=", tar=NULL";}
if($nev_wojsko[10]>0){$kat=", kat=".$nev_wojsko[10];}else{$kat=", kat=NULL";}
if($nev_wojsko[11]>0){ $ry=",  ry=".$nev_wojsko[11];}else{ $ry=",  ry=NULL";}
if($nev_wojsko[12]>0){ $sz=",  sz=".$nev_wojsko[12];}else{ $sz=",  sz=NULL";}
$zapytanie=$start.$mur.$pik.$mie.$axe.$luk.$zw.$lk.$kl.$ck.$tar.$kat.$ry.$sz.$s_end ;
?>