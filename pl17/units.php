<?
include_once(dirname(dirname(__FILE__)) . '/connection.php');
$wczasy = mktime()-$godzina_zero;
$l=0; $rs=0;

$id=@array_keys($_POST['id']);
/*
$pik_r=@array_keys($_POST['wpik']);
$mie_r=@array_keys($_POST['wmie']);
$axe_r=@array_keys($_POST['waxe']);
$luk_r=@array_keys($_POST['wluk']);
$zw_r =@array_keys($_POST['wzw']);
$lk_r =@array_keys($_POST['wlk']);
$kl_r =@array_keys($_POST['wkl']);
$ck_r =@array_keys($_POST['wck']);
$tar_r=@array_keys($_POST['wtar']);
$kat_r=@array_keys($_POST['wkat']);
$ry_r =@array_keys($_POST['wry']);
$sz_r =@array_keys($_POST['wsz']);
*/
$pik_m=@array_keys($_POST['pik']);
$mie_m=@array_keys($_POST['mie']);
$axe_m=@array_keys($_POST['axe']);
$luk_m=@array_keys($_POST['luk']);
$zw_m =@array_keys($_POST['zw']);
$lk_m =@array_keys($_POST['lk']);
$kl_m =@array_keys($_POST['kl']);
$ck_m =@array_keys($_POST['ck']);
$tar_m=@array_keys($_POST['tar']);
$kat_m=@array_keys($_POST['kat']);
$ry_m =@array_keys($_POST['ry']);
$sz_m =@array_keys($_POST['sz']);

for($i=0; $i<count($id);$i++){
// $ws_raport  = " UPDATE ws_raport SET  data='$wczasy'";
// $ws_raport2 = " INSERT INTO ws_raport SET id='".$_POST['id'][$id[$i]]."', data='$wczasy' ";
 $ws_mobile  = " UPDATE ws_mobile17 SET  data='$wczasy'";
 $ws_mobile2 = " INSERT INTO ws_mobile17 SET id='".$_POST['id'][$id[$i]]."', data='$wczasy' ";
/*
 $wojska_w_wiosce=",
             pik=".$_POST['wpik'][$pik_r[$i]].",
             mie=".$_POST['wmie'][$mie_r[$i]].",
             axe=".$_POST['waxe'][$axe_r[$i]].",
             luk=".$_POST['wluk'][$luk_r[$i]].",
             zw=". $_POST['wzw' ][$zw_r[$i] ].",
             lk=". $_POST['wlk' ][$lk_r[$i] ].",
             kl=". $_POST['wkl' ][$kl_r[$i] ].",
             ck=". $_POST['wck' ][$ck_r[$i] ].",
             tar=".$_POST['wtar'][$tar_r[$i]].",
             kat=".$_POST['wkat'][$kat_r[$i]].",
             ry=". $_POST['wry' ][$ry_r[$i] ].",
             sz=". $_POST['wsz' ][$sz_r[$i] ];
$sta=status(ile_woja($_POST['wpik'][$pik_r[$i]],
                     $_POST['wmie'][$mie_r[$i]],
                     $_POST['waxe'][$axe_r[$i]],
                     $_POST['wluk'][$luk_r[$i]],
                     $_POST['wzw' ][$zw_r[$i] ],
                     $_POST['wlk' ][$lk_r[$i] ],
                     $_POST['wkl' ][$kl_r[$i] ],
                     $_POST['wck' ][$ck_r[$i] ],
                     $_POST['wtar'][$tar_r[$i]],
                     $_POST['wkat'][$kat_r[$i]],
                     $_POST['wry' ][$ry_r[$i] ],
                     $_POST['wsz' ][$sz_r[$i] ])
             );
 $ws_raport2 .= $wojska_w_wiosce.", status='".$sta."'";
 $ws_raport  .= $wojska_w_wiosce.", status=".$sta." WHERE `id`='".$_POST['id'][$id[$i]]."'; ";
*/             
 $Wojska_mobilne=",
             pik=".$_POST['pik'][$pik_m[$i]].",
             mie=".$_POST['mie'][$mie_m[$i]].",
             axe=".$_POST['axe'][$axe_m[$i]].",
             luk=".$_POST['luk'][$luk_m[$i]].",
             zw=". $_POST['zw' ][$zw_m[$i] ].",
             lk=". $_POST['lk' ][$lk_m[$i] ].",
             kl=". $_POST['kl' ][$kl_m[$i] ].",
             ck=". $_POST['ck' ][$ck_m[$i] ].",
             tar=".$_POST['tar'][$tar_m[$i]].",
             kat=".$_POST['kat'][$kat_m[$i]].",
             ry=". $_POST['ry' ][$ry_m[$i] ].",
             sz=". $_POST['sz' ][$sz_m[$i] ];
 $ws_mobile2 .= $Wojska_mobilne;
 $ws_mobile  .= $Wojska_mobilne. " WHERE `id`='".$_POST['id'][$id[$i]]."'; ";


     connection();
       if(!@mysql_query($ws_mobile2))
       {
     destructor();
           connection();
           if(!@mysql_query($ws_mobile))
           {
                $string='Nie Uda³o siê Dodaæ Raportu'; $l++; //echo $string.': '.$ws_mobile2."<br>".$ws_mobile."<br>";
           }else{$string='Zaktualizowano Raport';$rs++; }

       }else{$string='Dodano Nowy Raport';$rs++;}
     destructor();
//  echo $string.': '.$ws_mobile2."<br>".$ws_mobile."<br>";

}
//$query=substr($query,0,-1).")";

//for($j=0; $j<count($obr);$j++){$quert.=$_POST['obr'][$obr[$j]]; $quert.=",";}
//$quert=substr($quert,0,-1).")";
?>
<html><head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
</head><style type="text/css">
<!--

  BODY {background: #F7EED3;}
table.main { background-color:#F7EED3; border:0px solid #804000;}
table.ba { border-bottom:0px;}
table.main td{font-size:11px;}
table.main th{font-size:11px;}
table.main tr.row th{font-size:11px;}
table.main tr.row td { background-color:#006600; background-image:none; color:#F1EBDD;}
table.main tr.row td.hidden { color:#333366; }
tr.center td { text-align:center; }


-->
</style><body><?PHP
$fin = ($rs)-$l;
  echo 'Zapisano zmiany w '.$fin.' wojskach do bazy<br>';
  echo ' W sumie '.$rs.'rekordow <b>Wojsko Mobilne w wiosce</b><br>';

 echo 'Data aktualizacji :'.data_z_bazy($wczasy);
if($l>0){  echo '<br> <br>W '.$l.' raportach wyst±pi³ b³±d i nie zmieniono danych. ';}

?></body></html>
