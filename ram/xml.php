<? include('../connection.php');
$suma_recordow=	'COUNT(*) AS `Rekordów`';
$mobilne=	'`ws_mobile` `wr`';
$raporty=	'`ws_raport` `wr`';
$all_wsi[0]=	'`ws_all` `v`';
$users[0]  =	'`list_user` `u`';

$all_wsi[1]=	'`wr`.`id` = `v`.`id`';
$users[1]  =	'`v`.`player` = `u`.`id`';
$wrogowie=	'`u`.`ally` != 23660
	AND 	 `u`.`ally` != 4469
	AND 	 `u`.`ally` != 11183
	AND 	 `u`.`ally` != 51415
	AND 	 `u`.`ally` != 51809';
$data = ' `wr`.`data` ';
$data_rap = mktime()-$godzina_zero;
// od dnia
// do dnia
// wrogie plemie
// nasze plemie
// gracz
// mur
if($_GET[pd]!==null){$od = intval($_GET[pd]*86400);}
if($_GET[dp]!==null){$do = intval($_GET[dp]*86400);}
$typ_raportu = intval($_GET[po]); // ????


  if(intval($_GET[Kto])!=null) 		 	// SELECT $zaps[0]
{$zaps[0] =' u.name '; $zaps[1] =$users[0];$zaps[2] ='`u`.`id`='.intval($_GET[Kto]); }
else
{$zaps[0] = $suma_recordow;
 switch ($typ_raportu= intval($_GET[po]))	// FROM $zaps[1]
 {      case 0: $zaps[1]=$mobilne; break;	// WHERE $zaps[2]
       case 1: $zaps[1]=$raporty; break;
       case 2: $zaps[1]=$raporty; $data = ' `wr`.`d_mur` '; break;
     default:
 }
 switch ($option = intval($_GET[op]))
 {    case 0: break;				 
     case 1:
 $zaps[1] .= ', '.$all_wsi[0].', '.$users[0]; 			//FROM  `ws_all` `v` , `list_user` `u`
 $zaps[2] .= $all_wsi[1].$and.$users[1].$and.$wrogowie;		//WHERE `wr`.`id` = `v`.`id` AND `v`.`player` = `u`.`id` AND `u`.`ally` != 23660
              break;
     case 2:
 $zaps[1] .= ', '.$all_wsi[0].', '.$users[0]; 			//FROM  `ws_all` `v` , `list_user` `u`
 $zaps[2] .= $all_wsi[1]; 					//WHERE `wr`.`id` = `v`.`id`
              break;
     case 3:
 $zaps[1] .= ','.$all_wsi[0];
 $zaps[2] .= $all_wsi[1]; 			
              break;
     default:
 }
//Data warunkowa
 if($od!==null){ $zaps[2] .= $and.$data.' > '.($data_rap-$od);}
 if($do!==null){ $zaps[2] .= $and.$data.' < '.($data_rap-$do);}
}


echo '<br><br> SELECT '.$zaps[0].' FROM '.$zaps[1].' WHERE '.$zaps[2].'<br><br>';

$fin = zap($zaps[0],$zaps[1],$zaps[2]);
echo $fin[0];

// $mi = zap($zaps[0],'`ws_mobile` wr,`ws_all` v','wr.`data`<'.($data_rap).' AND wr.`data`>'.($data_rap-518400).' AND wr.id = v.id AND v.player='.$moje_id ); echo $mi[0];
//SELECT name AS n_wsi FROM ws_all w LEFT JOIN ws_mobile wm ON wm.id = w.id WHERE player = '215516' AND x>'620' 
/*
  <tr>
   <th>Rekordy</th>
   <th>data</th>
   <th>Mobilne</th><th>Nasze</th>
   <th>Wrogie</th>
   <th>W wiosce</th><th>Nasze</th>
   <th>Wrogie</th>
   <th>Mury</th><th>Nasze</th>
   <th>Wrogie</th>
  </tr>
*/

?>