<?PHP   #   Agresor
 #    if($_GET[COUNT]==='true')$COUNT=true; else $COUNT=false;

     if($_GET[query_agr]!=Null)
{    $query = true;
     $text = $_GET[query_agr];
     $text1 = str_replace("\t",' ', $text);
     $text2 = str_replace("  ",' ', $text1);
     $query_lis = explode("\n",$text2);
     $query_lis = explode(",",$text2);
}
$gracz=urlencode($_GET[agracz]);
$gracz1=$_GET[agracz];
$typ = intval($_GET[typ_a]);

     if($_GET[a_oko]!=NULL && $_GET[a_xy]!=NULL)
    {
     $xy = explode("|", $_GET[a_xy]);
     $xy[0]=intval($xy[0]);
     $xy[1]=intval($xy[1]);
     $oko = intval($_GET[a_oko]/2)+1; $okolica = true; }            //mapa agresor okolica

    if($xy[0]==0 && $xy[1]==0){$okolica = false; }
    if(intval($_GET[minutnik])==1){$minutnik=true;}

     if($_GET[foff]!=NULL )
     {$foff=true;
                             $zwi= intval($_GET[zwi])-1;
                             $axe = intval($_GET[top])-1;
                             $lk  = intval($_GET[lk])-1;
                             $tar = intval($_GET[tar])-1;
     }else{$foff=false;}

     if($_GET[wojsko]!=NULL){ $wojsko=intval($_GET[wojsko]); }else{ $wojsko=NULL; }

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
     connection();    $wynik = @mysql_query("SELECT id FROM `list_user` WHERE `name`='$gracz';");
      if($r = @mysql_fetch_array($wynik))
        $graczId= $r[0];
      else
        $graczId=$Komunikat='Nieznany login gracza';
    }

   if($minutnik){$zap.=$and." lz.id_cel is NULL";}

   if($typ!=NULL){$zap.=$and."m.typ='$typ' ";}

   if($okolica)
    {
     $od_x=of_te($xy[0])-$oko;
     $do_x=of_te($xy[0])+$oko;
     $od_y=of_te($xy[1])-$oko;
     $do_y=of_te($xy[1])+$oko;
   $zap.= $and." w.x>'$od_x' $and w.y>'$od_y' $and w.x<'$do_x' $and w.y<'$do_y' ";
    }

  if($wojsko!=NULL && $_GET[tempo_on]==1)
   {
     switch ($wojsko)
     {
      case 0:  break;
      case 9:  $zap.=$and.'  `m`.`zw` >0'; break;
      case 10: $zap.=$and.' (`m`.`lk` >0 OR `m`.`kl`>0)'; break;
      case 11: $zap.=$and.'  `m`.`CK` >0'; break;
      case 18: $zap.=$and.' (`m`.`pik` >0 OR `m`.`axe`>0 OR `m`.`luk`>0)'; break;
      case 22: $zap.=$and.' (`m`.`mie` >0 )'; break;
      case 30: $zap.=$and.' (`m`.`tar` >0 OR `m`.`kat`>0)'; break;
      case 35: $zap.=$and.' (`m`.`sz` >0)'; break;
     default:  break;
     }
   }
   if($foff && $wojsko!=9){$zap.=$and."`m`.`axe`>$axe $and `m`.`lk` >$lk $and `m`.`tar`>$tar";}
else if($foff && $wojsko==9)$zap.=$and." `m`.`zw`>$zwi ";

}
$qzap1 = ' FROM `ws_all` w ';
$qzap2 =" WHERE `w`.`player` = ".$graczId ;

                    $qzap1 .=', `ws_mobile` `m` ';$qzap2.=' AND `m`.`id`=`w`.`id` '; $log = 'a';
if($minutnik)       $qzap1.=' LEFT JOIN `list_zadan` `lz` ON `lz`.`id_cel`=`w`.`id` AND `lz`.`id_gracz`=`w`.`player`';

if($COUNT)         {$qzap0 = 'SELECT COUNT( * ) AS `Rekordów` ';$qzap3.=' GROUP BY `w`.`player` ORDER BY `w`.`player` ';}
else
                   {$qzap0 = ' SELECT `w`.`name`, `w`.`x`, `w`.`y`, `w`.`points`, `w`.`id`,
   `m`.`pik`, `m`.`mie`, `m`.`axe`, `m`.`luk`, `m`.`zw`, `m`.`lk`, `m`.`kl`, `m`.`ck`, `m`.`tar`, `m`.`kat`, `m`.`ry`, `m`.`sz` ';}


?>