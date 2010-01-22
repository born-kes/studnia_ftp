<?
include_once(dirname(dirname(__FILE__)) . '/connection.php');
$wczasy = mktime()-$godzina_zero;
$licz=0;
$p=" , ";
$id=array_keys($_POST['id']);

$pik=array_keys($_POST['pik']);
$mie=array_keys($_POST['mie']);
$axe=array_keys($_POST['axe']);
$luk=array_keys($_POST['luk']);
$zw=array_keys($_POST['zw']);
$lk=array_keys($_POST['lk']);
$kl=array_keys($_POST['kl']);
$ck=array_keys($_POST['ck']);
$tar=array_keys($_POST['tar']);
$kat=array_keys($_POST['kat']);
$ry=array_keys($_POST['ry']);
$sz=array_keys($_POST['sz']);
            
for($i=0; $i<count($id);$i++){

         $wpik=$_POST['pik'][$pik[$i]];
         $wmie=$_POST['mie'][$mie[$i]];
         $waxe=$_POST['axe'][$axe[$i]];
         $wluk=$_POST['luk'][$luk[$i]];
         $wzw=$_POST['zw'][$zw[$i]];
         $wlk=$_POST['lk'][$lk[$i]];
         $wkl=$_POST['kl'][$kl[$i]];
         $wck=$_POST['ck'][$ck[$i]];
         $wtar=$_POST['tar'][$tar[$i]];
         $wkat=$_POST['kat'][$kat[$i]];
         $wry=$_POST['ry'][$ry[$i]];
         $wsz=$_POST['sz'][$sz[$i]];
         $wid=$_POST['id'][$id[$i]];
$wol=jaki_czas_marszu($wpik,$wmie,$waxe,$wluk,$wzw,$wlk,$wkl,$wck,$wtar,$wkat,$wry,$wsz);
$sta=status(ile_woja($wpik,$wmie,$waxe,$wluk,$wzw,$wlk,$wkl,$wck,$wtar,$wkat,$wry,$wsz));
$query = " UPDATE ws_mobile
     SET ";
if($_POST[n_typ]!=NULL){ $query .=" typ='$_POST[n_typ]' , ";}

$query .= "  
         pik='$wpik',
         mie='$wmie',
         axe='$waxe',
         luk='$wluk',
         zw='$wzw',
         lk='$wlk',
         kl='$wkl',
         ck='$wck',
         tar='$wtar',
         kat='$wkat',
         ry='$wry',
         sz='$wsz',
         data=$wczasy";
$query .= "     WHERE `id`='$wid'; ";
//echo $query;
  connection();
   if(!@mysql_query($query)){echo "b³±d zapisu<br>";}else{$licz++;echo $query.'<br>';}
 @destructor();
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

  echo 'Zapisano zmiany w';
if($_POST[n_typ]!=NULL){echo' Typie wiosek i';}
echo' ilosci wojska do bazy<br>';
  echo ' W sumie '.$licz.'rekordow <br>';
 echo 'Data aktualizacji :'.data_z_bazy($wczasy);

?></body></html>