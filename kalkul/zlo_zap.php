<?PHP include('../connection.php'); ?>
<?PHP
$statustyp= $status[typ];
     if($_GET[query_agr]!=Null && $dane==1)
{    $query = true;
     $text = $_GET[query_agr];
     $text1 = str_replace("\t",' ', $text);
     $text2 = str_replace("  ",' ', $text1);
//     $query_lis = explode("\n",$text2);
     $query_lis = explode(",",$text2);
}
else if($_GET[query_obr]!=Null && $dane==2)
{    $query = true;
     $text = $_GET[query_obr];
     $text1 = str_replace("\t",' ', $text);
     $text2 = str_replace("  ",' ', $text1);
     $query_lis = explode(",",$text2);
}

     if($_GET[agracz]!=NULL && ($dane==0||$dane==1)){$gracz=urlencode($_GET[agracz]);}
else if($_GET[ogracz]!=NULL && $dane==2){$gracz=urlencode($_GET[ogracz]);}

     if($_GET[plem_op]!=NULL && $dane==2){$plemie=intval($_GET[plem_op]);$plem=true;}          //cel plemie

     if($_GET[typ_a]!=NULL && $dane==1){ $typ = intval($_GET[typ_a]);}
else if($_GET[typ_o]!=NULL && $dane==2){ $typ = intval($_GET[typ_o]);}


     if($_GET[a_oko]!=NULL && $_GET[a_xy]!=NULL && $dane==1)
    {
     $xy = explode("|", $_GET[a_xy]);
     $xy[0]=intval($xy[0]);
     $xy[1]=intval($xy[1]);
     $oko = intval($_GET[a_oko]); $okolica = true; }            //mapa agresor okolica
else if($_GET[o_oko]!=NULL && $_GET[ofiarra]=='on' && $_GET[o_xy]!=NULL && $dane==2)
    {
     $xy = explode("|", $_GET[o_xy]);
     $xy[0]=intval($xy[0]);
     $xy[1]=intval($xy[1]);
     $oko = intval($_GET[o_oko]); $okolica = true; }           //mapa agresor okolica
else if($_GET[o_xy]!=NULL && $dane==2)
    {
     $xy = explode("|", $_GET[o_xy]);
     $xy[0]=intval($xy[0]);
     $xy[1]=intval($xy[1]);
     $oko = 1; $okolica = true; }

if($xy[0]==0 && $xy[1]==0){$okolica = false; }

     if(intval($_GET[minutnik])==1 && $dane==1){$minutnik=true;}

     if($_GET[foff]!=NULL && $dane==1){$foff=true;
                             $axe = intval($_GET[top]);
                             $lk  = intval($_GET[lk]);
                             $tar = intval($_GET[tar]);
}else{$foff=false;}
     if($_GET[wojsko]!=NULL && $dane==1){$wojsko=intval($_GET[wojsko]);}else{$wojsko=NULL;}
     if($_GET[mini]!=NULL && $_GET[mini_plus]!=NULL && $dane==2){ $mini=intval($_GET[mini]);}else{$mini=NULL;}

     if($_GET[zwiad]!=NULL && $dane==2){ $zwiad= true; if($_GET[zwiad_st]!=NULL)$zwiad_st=intval($_GET[zwiad_st]);}


$d=false;

if($query)
{ $wynik='';
	for($i=0; $i<count($query_lis); $i++)
	{
              $wioska_xy =explode("|", $query_lis[$i]);

            if($wioska_xy[0]!=NULL && $wioska_xy[1]!=NULL )
              { if($i>0){$wynik .= " OR ";}
               $wynik .= " ( w.`x`='$wioska_xy[0]' AND w.y='$wioska_xy[1]') ";
              }
	}
	$zap.=$and.'('.$wynik.')';
}
else
{
   if( $gracz!=NULL)
    {$zap.=$and."(t.name='$gracz' OR  t.name='".$_GET[agracz]."')";}

   if($minutnik){ $zap.=$and." lz.id_cel is NULL ";}

   if($mini!=NULL){$zap.=$and." w.points >'$mini'";}

   if($typ!=NULL){$zap.=$and."m.typ='$typ' ";}

   if($plem!=NULL){$zap.=$and."t.ally='$plemie' ";}

   if($okolica)
    {
     $od_x=$xy[0]-$oko;
     $do_x=$xy[0]+$oko;
     $od_y=$xy[1]-$oko;
     $do_y=$xy[1]+$oko;
   $zap.= $and." w.x>'$od_x' $and w.y>'$od_y' $and w.x<'$do_x' $and w.y<'$do_y' ";
    }

  if($wojsko!=NULL && $_GET[tempo_on]==1)
   {
     switch ($wojsko)
     {
      case 0:  break;
      case 9:  $zap.=$and.' m.zw >0'; break;
      case 10: $zap.=$and.' (m.lk >0 OR m.kl>0)'; break;
      case 11: $zap.=$and.' m.CK >0'; break;
      case 18: $zap.=$and.' (m.pik >0 OR m.axe>0 OR m.luk>0)'; break;
      case 22: $zap.=$and.' (m.mie >0 )'; break;
      case 30: $zap.=$and.' (m.tar >0 OR m.kat>0)'; break;
      case 35: $zap.=$and.' (m.sz >0)'; break;
     default:  break;
     }
   }
   if($foff){$zap.=$and."m.axe>$axe $and m.lk >$lk $and m.tar>$tar";}

   if($zwiad){$zaps[0]=", ws_raport m ";$zaps[1]=$and.' m.id=w.id '; if($zwiad_st!=NULL)$zaps[1].=$and.'m.status='.$zwiad_st; }
else{$zaps[0]="LEFT JOIN ws_raport m ON m.id=w.id";$zaps[1]='';}

}
$zap0=" SELECT COUNT( * ) AS `Rekordów`
FROM `ws_all` w, list_user t, ws_mobile m
        LEFT JOIN list_zadan lz       ON lz.id_cel=w.id
WHERE w.player = t.id AND m.id=w.id ";//
$zap_fin = " GROUP BY t.`ally` ORDER BY t.`ally` ";

$zap1=" SELECT w.name, w.x, w.y, w.points, w.id,
   m.pik, m.mie, m.axe, m.luk, m.zw, m.lk, m.kl, m.ck, m.tar, m.kat, m.ry, m.sz
FROM `ws_all` w, list_user t, ws_mobile m
        LEFT JOIN list_zadan lz       ON lz.id_cel=w.id
WHERE w.player = t.id AND m.id=w.id ";//

$zap2=" SELECT COUNT( * ) AS `Rekordów`
FROM `ws_all` w, list_user t
      $zaps[0]
WHERE w.player = t.id".$zaps[1];

$zap3=" SELECT w.name, w.x, w.y, w.points,w.id, m.status
FROM `ws_all` w, list_user t
      $zaps[0]
WHERE w.player = t.id".$zaps[1];


if($_GET[dane]==0 || ($_GET[dane]==1 && !$query  ))
{   $d = true;
$zapytanie = $zap0.$zap.$zap_fin;      //echo $zapytanie;;
}else if( $_GET[dane]==2)
{   $d = true;
$zapytanie = $zap2.$zap.$zap_fin;      //echo $zapytanie;;
}
else if($query)
{   $d = true;
$zapytanie = $zap2.$zap.$zap_fin;      //echo $zapytanie;;
}

if($d){  $efekt=false;
      connection();
    $wynik = @mysql_query($zapytanie);
      while($r = mysql_fetch_array($wynik))
{
if($_GET[dane]==0 || $_GET[dane]==1 || $_GET[dane]==2 ){$efekt=true;  echo $r[0].' '; brack;}
echo '';


}@destructor();
if(! $efekt){echo 0;}

}
else{echo 'nic';}
?>