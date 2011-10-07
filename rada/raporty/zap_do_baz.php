<? include('../../connection.php');
if($_POST!==NULL)
{
$plem_op = $_POST[plem_op];
$_xy     = $_POST[_xy];
$typ_    = $_POST[typ_];
$_gracz  = $_POST[_gracz];
$dni_    = $_POST[dni_];
$_oko    = $_POST[_oko];
}else if($_GET!==NULL)
{
$plem_op = $_GET[plem_op];
$_xy     = $_GET[_xy];
$typ_    = $_GET[typ_];
$_gracz  = $_GET[_gracz];
$dni_    = $_GET[dni_];
}
$and=" AND ";// echo data_z_bazy(75724722);

if($_xy!=NULL)
  {$zerw=false;
    $xy=  explode('|',$_xy);

   if($_oko!=NULL) {  $oko=intval($_oko/2);
       $od_x=$xy[0]-$oko;
       $od_y=$xy[1]-$oko;
       $do_x=$xy[0]+$oko;
       $do_y=$xy[1]+$oko;
  $zap.=$and ."v.x>'$od_x' AND v.y>'$od_y' AND v.x<'$do_x' AND v.y<'$do_y'";
 }else{
  $zap.=$and."v.x =".$xy[0].$and."v.y=".$xy[1];}
}
if($plem_op!=NULL){  $zap.=$and."t.ally=".$plem_op; }

if($typ_!=NULL){echo 'TYP';  $zap.=$and."v.typ=".$typ_; }

if($dni_!=NULL){ $zap.=' '; $zerw =mktime()-$godzina_zero-(60*60*24* $dni_);  $data1=$and."m.`data`>".$zerw;$data2= $and."r.`data`>".$zerw; }

if($_gracz!=NULL) { $zap.=$and."t.name='".urlencode($_gracz)."' ORDER BY v.name" ;}

//if($_GET[_gracz]!==NULL) { $zap.=$and."t.name='".urlencode($_GET[_gracz])."' ORDER BY v.name" ;}

// echo $zap;
// $_POST[oko];

if($zap===NULL){ echo"<h1>BRAK DANYCH</h1>";   exit();}
$include_per = "";
include("raport_z.php");
?>