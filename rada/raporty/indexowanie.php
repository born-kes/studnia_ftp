<?// include('../../connection.php');
$data_rap = mktime()-$godzina_zero;

$zaps[0]='COUNT(*) AS `Rekordów`';
$zaps[1]='`ws_mobile` ';
$zaps[2]='`ws_raport` ';
$zaps[3]='`ws_mobile` wr,ws_all v, list_user u';
$zaps[4]='`ws_raport` wr,ws_all v, list_user u';
$zaps[5]=' AND wr.id = v.id
       AND v.player = u.id
AND u.ally != 23660
AND u.ally != 4469
AND u.ally != 11183
AND u.ally != 51415
AND u.ally != 51809';

//echo 'SELECT '.$zaps[0].' FROM '.$zaps[3].' WHERE '.'wr.`data`<'.($data_rap-172800).' AND wr.`data`>'.($data_rap-518400-200).$zaps[5];
/*$mobilne[3] = zap($zaps[0],$zaps[1],'`data`<'.($data_rap).' AND `data`>'.($data_rap-172800));
$mobilne[5] = zap($zaps[0],$zaps[1],'`id`>0 ');

$mobilne[9] = zap($zaps[0],$zaps[3],'wr.`data`<'.($data_rap).' AND wr.`data`>'.($data_rap-172800).$zaps[5]);
$mobilne[11] = zap($zaps[0],$zaps[3],'wr.`id`>0 '.$zaps[5]);

$r_z_wsi[3] = zap($zaps[0],$zaps[2],'`data`<'.($data_rap).' AND `data`>'.($data_rap-172800));
$r_z_wsi[5] = zap($zaps[0],$zaps[2],'`id`>0 ');

$r_z_wsi[9] = zap($zaps[0],$zaps[4],'wr.`data`<'.($data_rap).' AND wr.`data`>'.($data_rap-172800).$zaps[5]);
$r_z_wsi[11] = zap($zaps[0],$zaps[4],'wr.`id`>0 '.$zaps[5]);

$r_m_wsi[3] = zap($zaps[0],$zaps[2],'mur is not null AND `d_mur`<'.($data_rap).' AND `d_mur`>'.($data_rap-172800));
$r_m_wsi[5] = zap($zaps[0],$zaps[2],'mur is not null AND `id`>0 ');
$r_m_wsi[9] = zap($zaps[0],$zaps[4],'wr.mur is not null AND wr.`d_mur`<'.($data_rap).' AND wr.`d_mur`>'.($data_rap-172800).$zaps[5]);
$r_m_wsi[11] = zap($zaps[0],$zaps[4],'wr.mur is not null AND wr.`id`>0 '.$zaps[5]);
// */
$index_r = zap('*','`index_raportow`','id=1');
if($index_r[1]<$data_rap-(86400*7) )
{

$r_z_wsi[13] = zap($zaps[0],$zaps[4],'wr.`data`<'.(($data_rap-31536000)).$zaps[5]);
$r_z_wsi[12] = zap($zaps[0],$zaps[2],'`data`<'.($data_rap-31536000));
$mobilne[12] = zap($zaps[0],$zaps[1],'`data`<'.($data_rap-31536000));
$mobilne[13] = zap($zaps[0],$zaps[3],'wr.`data`<'.($data_rap-31536000).$zaps[5]);
$r_m_wsi[13] = zap($zaps[0],$zaps[4],'wr.mur is not null AND wr.`d_mur`>0 AND wr.`d_mur`<'.($data_rap-31536000).$zaps[5]);
 $r_m_wsi[12] = zap($zaps[0],$zaps[2],'mur is not null AND `d_mur`>0 AND `d_mur`<'.($data_rap-31536000));

$query = "
          UPDATE
               `index_raportow`
          SET
                data='$data_rap',
                Mobilne_nasze=".($mobilne[12][0]-$mobilne[13][0]).",
                Mobilne_ich=  ".($mobilne[13][0]).",	
                wWiosce_nasze=".($r_z_wsi[12][0]-$r_z_wsi[13][0]).", 	
                wWiosce_ich=  ".($r_z_wsi[13][0]).",	
                mur_nasze=    ".($r_m_wsi[12][0]-$r_m_wsi[13][0]).",	
                mur_ich=      ".($r_m_wsi[13][0])."
          WHERE
                id=1;";
  connection();
   @mysql_query($query);
  destructor();
}

$index_r = zap('*','`index_raportow`','id=2');
if($index_r[1]<$data_rap-(86400) )
{

$mobilne[0] = zap($zaps[0],$zaps[1],'`data`<'.($data_rap-777600).' AND `data`>'.($data_rap-31536000));
$mobilne[6] = zap($zaps[0],$zaps[3],'wr.`data`<'.($data_rap-777600).' AND wr.`data`>'.($data_rap-31536000).$zaps[5]);
$r_z_wsi[0] = zap($zaps[0],$zaps[2],'`data`<'.($data_rap-777600).' AND `data`>'.($data_rap-31536000));
$r_z_wsi[6] = zap($zaps[0],$zaps[4],'wr.`data`<'.($data_rap-777600).' AND wr.`data`>'.($data_rap-31536000).$zaps[5]);
$r_m_wsi[0] = zap($zaps[0],$zaps[2],'mur is not null AND `d_mur`<'.($data_rap-777600).' AND `d_mur`>'.($data_rap-31536000));
$r_m_wsi[6] = zap($zaps[0],$zaps[4],'wr.mur is not null AND wr.`d_mur`<'.($data_rap-777600).' AND `d_mur`>'.($data_rap-31536000).$zaps[5]);

$query = "
          UPDATE
               `index_raportow`
          SET
                data='$data_rap',
                Mobilne_nasze=".($mobilne[0][0]-$mobilne[6][0]).",
                Mobilne_ich=  ".($mobilne[6][0]).",	
                wWiosce_nasze=".($r_z_wsi[0][0]-$r_z_wsi[6][0]).", 	
                wWiosce_ich=  ".($r_z_wsi[6][0]).",	
                mur_nasze=    ".($r_m_wsi[0][0]-$r_m_wsi[6][0]).",	
                mur_ich=      ".($r_m_wsi[6][0])."
          WHERE
                id=2;";
  connection();
   @mysql_query($query);
  destructor();
}
$index_r = zap('*','`index_raportow`','id=3');
if($index_r[1]<$data_rap-(86400) )
{

$r_z_wsi[1] = zap($zaps[0],$zaps[2],'`data`<'.($data_rap-518400-200).' AND `data`>'.($data_rap-777600));
$mobilne[1] = zap($zaps[0],$zaps[1],'`data`<'.($data_rap-518400-200).' AND `data`>'.($data_rap-777600));
$mobilne[7] = zap($zaps[0],$zaps[3],'wr.`data`<'.($data_rap-518400-200).' AND wr.`data`>'.($data_rap-777600).$zaps[5]);
$r_z_wsi[7] = zap($zaps[0],$zaps[4],'wr.`data`<'.($data_rap-518400-200).' AND wr.`data`>'.($data_rap-777600).$zaps[5]);
$r_m_wsi[7] = zap($zaps[0],$zaps[4],'wr.mur is not null AND wr.`d_mur`<'.($data_rap-518400-200).' AND wr.`d_mur`>'.($data_rap-777600).$zaps[5]);
$r_m_wsi[1] = zap($zaps[0],$zaps[2],'mur is not null AND `d_mur`<'.($data_rap-518400-200).' AND `d_mur`>'.($data_rap-777600));

$query = "
          UPDATE
               `index_raportow`
          SET
                data='$data_rap',
                Mobilne_nasze=".($mobilne[1][0]-$mobilne[7][0]).",
                Mobilne_ich=  ".($mobilne[7][0]).",	
                wWiosce_nasze=".($r_z_wsi[1][0]-$r_z_wsi[7][0]).", 	
                wWiosce_ich=  ".($r_z_wsi[7][0]).",	
                mur_nasze=    ".($r_m_wsi[1][0]-$r_m_wsi[7][0]).",	
                mur_ich=      ".($r_m_wsi[7][0])."
          WHERE
                id=3;";
  connection();
   @mysql_query($query);
  destructor();
}
$index_r = zap('*','`index_raportow`','id=4');
if($index_r[1]<$data_rap-(86400) )
{
$r_z_wsi[2] = zap($zaps[0],$zaps[2],'`data`<'.($data_rap-172800).' AND `data`>'.($data_rap-518400-200));
$r_m_wsi[2] = zap($zaps[0],$zaps[2],'mur is not null AND `d_mur`<'.($data_rap-172800).' AND `d_mur`>'.($data_rap-518400-200));
$mobilne[2] = zap($zaps[0],$zaps[1],'`data`<'.($data_rap-172800).' AND `data`>'.($data_rap-518400-200));
$mobilne[8] = zap($zaps[0],$zaps[3],'wr.`data`<'.($data_rap-172800).' AND wr.`data`>'.($data_rap-518400-200).$zaps[5]);
$r_z_wsi[8] = zap($zaps[0],$zaps[4],'wr.`data`<'.($data_rap-172800).' AND wr.`data`>'.($data_rap-518400-200).$zaps[5]);
$r_m_wsi[8] = zap($zaps[0],$zaps[4],'wr.mur is not null AND wr.`d_mur`<'.($data_rap-172800).' AND wr.`d_mur`>'.($data_rap-518400-200).$zaps[5]);

$query = "
          UPDATE
               `index_raportow`
          SET
                data='$data_rap',
                Mobilne_nasze=".($mobilne[2][0]-$mobilne[8][0]).",
                Mobilne_ich=  ".($mobilne[8][0]).",	
                wWiosce_nasze=".($r_z_wsi[2][0]-$r_z_wsi[8][0]).", 	
                wWiosce_ich=  ".($r_z_wsi[8][0]).",	
                mur_nasze=    ".($r_m_wsi[2][0]-$r_m_wsi[8][0]).",	
                mur_ich=      ".($r_m_wsi[8][0])."
          WHERE
                id=4;";
  connection();
   @mysql_query($query);
  destructor();
}
//echo nl2br($query);

?>