<?  #################################
    #####    Info Z Wioski       ####

include_once(dirname(dirname(__FILE__)) . '/connection.php');
$wczasy = mktime()-$godzina_zero;
     if($_GET[mur]==22){
 $ws_raport= " UPDATE ws_raport SET  data='$wczasy'";
 $ws_raport2 = " INSERT INTO ws_raport SET id='".$_GET['id']."', data='$wczasy'";
}elseif($_GET[mur]!=NULL){
 $ws_raport= " UPDATE ws_raport SET  d_mur='$wczasy', mur=".$_GET['mur'];
 $ws_raport2 = " INSERT INTO ws_raport SET id='".$_GET['id']."', d_mur='$wczasy', mur=".$_GET['mur'];
}elseif($_GET[typ]==22){
 $ws_raport= " UPDATE ws_mobile SET  data='$wczasy'";
 $ws_raport2 = " INSERT INTO ws_mobile SET id='".$_GET['id']."', data='$wczasy' ";
if($_GET['sz' ]>0){ $ws_raport.=',typ=7 ';$ws_raport.=',typ=7 ';}
}elseif($_GET[typ]!=NULL){
$typ=$_GET['typ'];
if($_GET['sz' ]>0){ $typ=7;}

 $ws_raport= " UPDATE ws_mobile SET  data='$wczasy',typ=".$typ;
 $ws_raport2 = " INSERT INTO ws_mobile SET id='".$_GET['id']."', data='$wczasy' ,typ=".$typ;
}
 $wojska_w_wiosce=",
             pik=".$_GET['pik'].",
             mie=".$_GET['mie'].",
             axe=".$_GET['axe'].",
             luk=".$_GET['luk'].",
             zw=". $_GET['zw' ].",
             lk=". $_GET['lk' ].",
             kl=". $_GET['kl' ].",
             ck=". $_GET['ck' ].",
             tar=".$_GET['tar'].",
             kat=".$_GET['kat'].",
             ry=". $_GET['ry' ].",
             sz=". $_GET['sz' ];
if($_GET[mur]!=NULL){
$sta=status( ile_woja($_GET['pik'],
                      $_GET['mie'],
                      $_GET['axe'],
                      $_GET['luk'],
                      $_GET['zw' ],
                      $_GET['lk' ],
                      $_GET['kl' ],
                      $_GET['ck' ],
                      $_GET['tar'],
                      $_GET['kat'],
                      $_GET['ry' ],
                      $_GET['sz' ])
             );    echo ile_woja($_GET['pik'],
                      $_GET['mie'],
                      $_GET['axe'],
                      $_GET['luk'],
                      $_GET['zw' ],
                      $_GET['lk' ],
                      $_GET['kl' ],
                      $_GET['ck' ],
                      $_GET['tar'],
                      $_GET['kat'],
                      $_GET['ry' ],
                      $_GET['sz' ]);       
 $ws_raport2 .= $wojska_w_wiosce.", status=".$sta;
 $ws_raport  .= $wojska_w_wiosce.", status=".$sta." WHERE `id`='".$_GET['id']."'; ";
 }elseif($_GET[typ]!=NULL){
 $ws_raport2 .= $wojska_w_wiosce;
 $ws_raport  .= $wojska_w_wiosce." WHERE `id`='".$_GET['id']."'; ";
}
     connection();
       if(!@mysql_query($ws_raport2))
       {
     destructor();
           connection();
           if(!@mysql_query($ws_raport))
           {
                $string='Nie Uda³o siê Dodaæ Raportu'; $l++;

           }else{$string='Zaktu³alizowano Raport';$licz++; }

       }else{$string='Dodano Nowy Raport';$licz++;}
     destructor();
     
// echo $string.': '.$ws_raport2."<br>".$ws_raport;

?>
