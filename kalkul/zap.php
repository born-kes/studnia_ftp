<?PHP include('../connection.php'); sesio_id();  $ec =mktime()-$godzina_zero-(86400*7);

$statustyp= $status[typ];
     if($_GET[COUNT]==='true')$COUNT=true; else $COUNT=false;

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

     if($_GET[agracz]!=NULL && ($dane==0||$dane==1)){$gracz=urlencode($_GET[agracz]);$gracz1=$_GET[agracz];}
else if($_GET[ogracz]!=NULL && $dane==2){$gracz=urlencode($_GET[ogracz]);$gracz1=$_GET[ogracz];}

     if($_GET[plem_op]!=NULL && $dane==2){$plemie=intval($_GET[plem_op]);$plem=true;}          //cel plemie

     if($_GET[typ_a]!=NULL && $dane==1){ $typ = intval($_GET[typ_a]);}
else if($_GET[typ_o]!=NULL && $dane==2){ $typ = intval($_GET[typ_o]);}


     if($_GET[a_oko]!=NULL && $_GET[a_xy]!=NULL && $dane==1)
    {
     $xy = explode("|", $_GET[a_xy]);
     $xy[0]=intval($xy[0]);
     $xy[1]=intval($xy[1]);
     $oko = intval($_GET[a_oko]/2)+1; $okolica = true; }            //mapa agresor okolica
else if($_GET[o_oko]!=NULL && $_GET[ofiarra]=='on' && $_GET[o_xy]!=NULL && $dane==2)
    {
     $xy = explode("|", $_GET[o_xy]);
     $xy[0]=intval($xy[0]);
     $xy[1]=intval($xy[1]);
     $oko = intval($_GET[o_oko]/2)+1; $okolica = true; }           //mapa agresor okolica
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
    {$zap.=$and."(t.name='$gracz' OR  t.name='".$gracz1."')";}

   if($minutnik){$zap.=$and." lz.id_cel is NULL";}

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
$qzap1 = ' FROM `ws_all` w, list_user t ';
$qzap2 =' WHERE w.player = t.id ';
if($_GET[dane]==0
|| $_GET[dane]==1){$qzap1 .=', ws_mobile m ';$qzap2.=' AND m.id=w.id '; $log = 'a';
        if($minutnik) $qzap1.=' LEFT JOIN list_zadan lz ON lz.id_cel=w.id AND lz.id_gracz=w.player'; }
if($_GET[dane]==2){$qzap1 .=$zaps[0];$qzap2.=$zaps[1]; $log = 'o';}

if($COUNT) {$qzap0 = 'SELECT COUNT( * ) AS `Rekordów` ';$qzap3.=' GROUP BY t.`ally` ORDER BY t.`ally` ';}
else if($_GET[dane]==1){$qzap0 = ' SELECT w.name, w.x, w.y, w.points, w.id,
   m.pik, m.mie, m.axe, m.luk, m.zw, m.lk, m.kl, m.ck, m.tar, m.kat, m.ry, m.sz ';
}
else if($_GET[dane]==2){
$qzap0 = ' SELECT w.name, w.x, w.y, w.points,w.id, m.status ,m.data , lz.opis';
$qzap1.=' LEFT JOIN list_zadan lz ON lz.id_cel=w.id AND lz.id_gracz=w.player'; //COUNT( * ) AS `zaplanowane`
//$qzap2.='';
//$qzap3.=' GROUP BY t.`ally` ORDER BY t.`ally` ';
}

$zapytanie = $qzap0.$qzap1.$qzap2.$zap.$qzap3;
// echo $zapytanie;
$es = false;
if($zap != NULL){$d = true;}

$s =';
';
$i4=1;
      ########################################################################################################

$s ='
';

$Storing .='<'.'?xml version="1.0" encoding="ISO-8859-1"?'.'>
<tresc id="#script">';
 $efekt=false;
 $id__1='      var '.$log.'_id =new Array'.$s;
$name1='      var '.$log.'_name =new Array'.$s;
$xy__1='      var '.$log.'_xy =new Array'.$s;

$woln1='      var '.$log.'_wolne =new Array'.$s;
$pkt_1='      var '.$log.'_pt =new Array'.$s; //points
$if__1='      var '.$log.'_if =new Array'.$s;

if( $log=='o'){
$if__2='      var o_if2 =new Array'.$s;

$Storing .='<o_id>0</o_id>'.$s;
$Storing .='<o_name>"Wojska które zostan± w wiosce "</o_name>'.$s;                                      //$name1
$Storing .='<o_xy></o_xy>'.$s;                                                                          //$xy__1

$Storing .='<o_pt></o_pt>'.$s;                                                                          //$pkt_1
$Storing .='<o_if>true</o_if>'.$s;                                                                      //$if__1

$Storing .='<o_if2>true</o_if2>'.$s;                                                                    //$if__2
}
      connection();
   $wynik = @mysql_query($zapytanie);
      while($r = @mysql_fetch_array($wynik))
  {$efekt=true;
$Storing .='<Wsi>'.$s; 
$Storing .='<x><'.$log.'_id>'.$r[id].'</'.$log.'_id></x>'.$s;                                                  //$id__1
$Storing .='<'.$log.'_name>"'.plCharset(urldecode($r[name]), UTF8_TO_WIN1250).'"</'.$log.'_name>'.$s;   //$name1
$Storing .='<'.$log.'_xy>"'.$r[x].'|'.$r[y].'</'.$log.'_xy>'.$s;                                        //$xy__1

$Storing .='<'.$log.'_pt>'.$r[points].'</'.$log.'_pt>'.$s;                                                               //$pkt_1
$Storing .='<'.$log.'_if>true</'.$log.'_if>'.$s;                                                        // $if__1

 if($wojsko==0 && $log=='a')
 {
     if($r[sz]>0)$szyb=35;elseif($r[tar]>0)$szyb=30;elseif($r[mie]>0)$szyb=22;elseif($r[pik]>0 || $r[axe]>0 || $r[luk]>0)$szyb=18;
else if($r[ck]>0)$szyb=11;elseif($r[lk]>0 || $r[kl]>0)$szyb =10;
else if($r[zw]>0)$szyb=9;else $szyb="0";
  }else if($log=='a'){$szyb =$wojsko;}
else{
     if($r[opis]==null)$Storing .='<o_if2>true</o_if2>'.$s;                                   //$if__2
     else$Storing .='<o_if2>false</o_if2>'.$s;                                 // $if__2
$szyb = '"'.$statuss[typ][$r[status]].' '.data_z_bazy($r[data],false).'"';
/*wolny dla obrona czyli status*/
}
$Storing .='<'.$log.'_wolne>'.$szyb.'</'.$log.'_wolne>'.$s;                           //$woln1
$Storing .='</wsi>'.$s;
$i4++;
}@destructor();

        header('Content-type: text/xml');
echo($Storing);
echo'</tresc>';

?>