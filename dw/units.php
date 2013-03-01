<?
include_once(dirname(dirname(__FILE__)) . '/connection.php');

$wczasy = mktime()-$godzina_zero;
$ileSukces=0;
$ileNowych=0;
$ileError=0;

$ileMobilneSukces=0;
$ileMobilneNowych=0;
$ileMobilneError=0;

$idArry=@array_keys($_POST['id']);
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

     connection();
for($i=0; $i<count($idArry);$i++){
             $id=aut($_POST['id'][$idArry[$i]]);
             if( !($id!=null || $id=0) ){$ileError++; continue;  }

 $ws_raport  = " UPDATE ws_raport SET  data='$wczasy'";
 $ws_raport2 = " INSERT INTO ws_raport SET id='".aut($_POST['id'][$idArry[$i]])."', data='$wczasy' ";
 $ws_mobile  = " UPDATE ws_mobile SET  data='$wczasy'";
 $ws_mobile2 = " INSERT INTO ws_mobile SET id='".aut($_POST['id'][$idArry[$i]])."', data='$wczasy' ";

 $wojska_w_wiosce=",
             pik=".aut($_POST['wpik'][$pik_r[$i]]).",
             mie=".aut($_POST['wmie'][$mie_r[$i]]).",
             axe=".aut($_POST['waxe'][$axe_r[$i]]).",
             luk=".aut($_POST['wluk'][$luk_r[$i]]).",
             zw=". aut($_POST['wzw' ][$zw_r[$i] ]).",
             lk=". aut($_POST['wlk' ][$lk_r[$i] ]).",
             kl=". aut($_POST['wkl' ][$kl_r[$i] ]).",
             ck=". aut($_POST['wck' ][$ck_r[$i] ]).",
             tar=".aut($_POST['wtar'][$tar_r[$i]]).",
             kat=".aut($_POST['wkat'][$kat_r[$i]]).",
             ry=". aut($_POST['wry' ][$ry_r[$i] ]).",
             sz=". aut($_POST['wsz' ][$sz_r[$i] ]);
$sta=status(ile_woja(aut($_POST['wpik'][$pik_r[$i]]),
                     aut($_POST['wmie'][$mie_r[$i]]),
                     aut($_POST['waxe'][$axe_r[$i]]),
                     aut($_POST['wluk'][$luk_r[$i]]),
                     aut($_POST['wzw' ][$zw_r[$i] ]),
                     aut($_POST['wlk' ][$lk_r[$i] ]),
                     aut($_POST['wkl' ][$kl_r[$i] ]),
                     aut($_POST['wck' ][$ck_r[$i] ]),
                     aut($_POST['wtar'][$tar_r[$i]]),
                     aut($_POST['wkat'][$kat_r[$i]]),
                     aut($_POST['wry' ][$ry_r[$i] ]),
                     aut($_POST['wsz' ][$sz_r[$i] ])
                    )
             );

 $Wojska_mobilne=",
             pik=".aut($_POST['pik'][$pik_m[$i]]).",
             mie=".aut($_POST['mie'][$mie_m[$i]]).",
             axe=".aut($_POST['axe'][$axe_m[$i]]).",
             luk=".aut($_POST['luk'][$luk_m[$i]]).",
             zw=". aut($_POST['zw' ][$zw_m[$i] ]).",
             lk=". aut($_POST['lk' ][$lk_m[$i] ]).",
             kl=". aut($_POST['kl' ][$kl_m[$i] ]).",
             ck=". aut($_POST['ck' ][$ck_m[$i] ]).",
             tar=".aut($_POST['tar'][$tar_m[$i]]).",
             kat=".aut($_POST['kat'][$kat_m[$i]]).",
             ry=". aut($_POST['ry' ][$ry_m[$i] ]).",
             sz=". aut($_POST['sz' ][$sz_m[$i] ]);
 $ws_raport2 .= $wojska_w_wiosce.", status='".$sta."'";
 $ws_raport  .= $wojska_w_wiosce.", status=".$sta." WHERE `id`='".aut($_POST['id'][$idArry[$i]])."'; ";
 $ws_mobile2 .= $Wojska_mobilne;
 $ws_mobile  .= $Wojska_mobilne. " WHERE `id`='".aut($_POST['id'][$idArry[$i]])."'; ";

               /* W wiosce */
       if(!@mysql_query($ws_raport))
       {
           if(!@mysql_query($ws_raport2))
             $ileError++;
           else
             $ileNowych++;

       }else $ileSukces++;


       if(!@mysql_query($ws_mobile))
       {
           if(!@mysql_query($ws_mobile2))
             $ileMobilneError++;
           else
             $ileMobilneNowych++;

       }else $ileMobilneSukces++;
}
     destructor();
 include('html/units.php');
?>