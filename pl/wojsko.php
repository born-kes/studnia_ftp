<?
include_once(dirname(dirname(__FILE__)) . '/connection.php');
$wczasy = mktime()-$godzina_zero;
$licz=0;
$p=" , ";
if(count(array_keys($_POST['id']) )<2 ){echo'error ';exit(); }
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

         $wpik=intval($_POST['pik'][$pik[$i]]);
         $wmie=intval($_POST['mie'][$mie[$i]]);
         $waxe=intval($_POST['axe'][$axe[$i]]);
         $wluk=intval($_POST['luk'][$luk[$i]]);
         $wzw=intval($_POST['zw'][$zw[$i]]);
         $wlk=intval($_POST['lk'][$lk[$i]]);
         $wkl=intval($_POST['kl'][$kl[$i]]);
         $wck=intval($_POST['ck'][$ck[$i]]);
         $wtar=intval($_POST['tar'][$tar[$i]]);
         $wkat=intval($_POST['kat'][$kat[$i]]);
         $wry=intval($_POST['ry'][$ry[$i]]);
         $wsz=intval($_POST['sz'][$sz[$i]]);
         $wid=intval($_POST['id'][$id[$i]]);
$wol=jaki_czas_marszu($wpik,$wmie,$waxe,$wluk,$wzw,$wlk,$wkl,$wck,$wtar,$wkat,$wry,$wsz);
$sta=status(ile_woja($wpik,$wmie,$waxe,$wluk,$wzw,$wlk,$wkl,$wck,$wtar,$wkat,$wry,$wsz));
$query1 = " UPDATE ws_mobile
     SET ";

$query2 = "
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
if($_POST[n_typ]!=NULL){ $query2 .=", typ='$_POST[n_typ]' ";}

$query2 .= "     WHERE `id`='$wid'; ";     //echo $query1.$query2.'<br>';

  connection();
   if(@mysql_query($query1.$query2)) $licz++; else echo "b³±d zapisu<br>";
 @destructor();
}
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

  echo 'Zapisano zmiany w <br />';
if($_POST[n_typ]!=NULL){echo' Typie wiosek i';}
echo' ilosci wojska do bazy<br>';
  echo ' W sumie '.$licz.' rekordow <br>';
 echo data_z_bazy($wczasy);

?></body></html>