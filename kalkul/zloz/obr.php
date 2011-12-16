<?     #  Obronca

 #    if($_GET[COUNT]==='true')$COUNT=true; else $COUNT=false;

if($_GET[query_obr]!=Null)
{    $query = true;
     $text = $_GET[query_obr];
     $text1 = str_replace("\t",' ', $text);
     $text2 = str_replace("  ",' ', $text1);
     $query_lis = explode(",",$text2);
}

 if($_GET[ogracz]!=NULL){$gracz=urlencode($_GET[ogracz]);$gracz1=$_GET[ogracz];}

 if($_GET[plem_op]!=NULL){$plemie=intval($_GET[plem_op]);$plem=true;}

 if($_GET[o_oko]!=NULL && $_GET[ofiarra]=='on' && $_GET[o_xy]!=NULL)
    {
     $xy = explode("|", $_GET[o_xy]);
     $xy[0]=intval($xy[0]);
     $xy[1]=intval($xy[1]);
     $oko = intval($_GET[o_oko]/2)+1; $okolica = true; }
else if($_GET[o_xy]!=NULL)
    {
     $xy = explode("|", $_GET[o_xy]);
     $xy[0]=intval($xy[0]);
     $xy[1]=intval($xy[1]);
     $oko = 1; $okolica = true; }

if($xy[0]==0 && $xy[1]==0){$okolica = false; }

     if($_GET[mini]!=NULL && $_GET[mini_plus]!=NULL){ $mini=intval($_GET[mini]);}else{$mini=NULL;}

     if($_GET[zwiad]!=NULL){ $zwiad= true; if($_GET[zwiad_st]!=NULL)$zwiad_st=intval($_GET[zwiad_st]);}

if($query)
{ $wynik='';
	for($i=0; $i<count($query_lis); $i++)
	{
              $wioska_xy =explode("|", $query_lis[$i]);

            if($wioska_xy[0]!=NULL && $wioska_xy[1]!=NULL )
              {
$wioska_xy[0]=of_te($wioska_xy[0]);
$wioska_xy[1]=of_te($wioska_xy[1]);
 if($i>0){$wynik .= " OR ";}
               $wynik .= " ( w.`x`='$wioska_xy[0]' AND w.y='$wioska_xy[1]') ";
              }
	}
	$zap.=$and.'('.$wynik.')';
}
else
{
   if( $gracz!=NULL){
     connection();    $wynik = @mysql_query("SELECT id FROM `list_user` WHERE `name`='$gracz'; ");
      if($r = @mysql_fetch_array($wynik))
        $graczId= $r[0];
      else
        $Komunikat='Nieznany login gracza';

   //$zap.=$and."(t.name='$gracz' OR  t.name='".$gracz1."')";
   }

   if($mini!=NULL){$zap.=$and." w.points >'$mini'";}

   if($plem!=NULL){$zap.=$and."t.ally='$plemie' ";}

   if($okolica)
    {
     $od_x=$xy[0]-$oko;
     $do_x=$xy[0]+$oko;
     $od_y=$xy[1]-$oko;
     $do_y=$xy[1]+$oko;
   $zap.= $and." `w`.`x`>'$od_x' $and `w`.`y`>'$od_y' $and `w`.`x`<'$do_x' $and `w`.`y`<'$do_y' ";
    }

   if($zwiad)
   {                             $qzap0=", `ws_raport` `m` "; $zap.=$and.' `m`.`id`=`w`.`id` ';
             if($zwiad_st!=NULL) $zap.=$and.'`m`.`status`='.$zwiad_st;
   }
   else{             $qzap1="LEFT JOIN `ws_raport` `m` ON `m`.`id`=`w`.`id`";}

}
$qzap_b =' FROM `ws_all` `w`';


   if( $gracz!=NULL)$qzap_c =' WHERE `w`.`player` ='.$graczId;
   else{ $qzap_c =' WHERE `w`.`player` = `t`.`id` ';$qzap_b.=', `list_user` `t` ';}

if($COUNT) {$qzap_a = 'SELECT COUNT( * ) AS `Rekordow` ';$qzap3.=' GROUP BY `w`.`player` ORDER BY `w`.`player` ';}
else{$qzap_a = ' SELECT `w`.`name`, `w`.`x`, `w`.`y`, `w`.`points`, `w`.`id`, `m`.`status` ,`m`.`data` , `lz`.`opis`,
   `m`.`pik`, `m`.`mie`, `m`.`axe`, `m`.`luk`, `m`.`zw`, `m`.`lk`, `m`.`kl`, `m`.`ck`, `m`.`tar`, `m`.`kat`, `m`.`ry`, `m`.`sz` ';
   
$qzap1.=' LEFT JOIN `list_zadan` `lz` ON `lz`.`id_cel`=`w`.`id` AND `lz`.`id_gracz`=`w`.`player`';
}

$log = 'o';
?>