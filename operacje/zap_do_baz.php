<html><head>
<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
<link rel="stylesheet" type="text/css" href="../stamm1201718544.css">
<script src="../js/scriptt.js" type="text/javascript"></script>
</head>
<body>
<?php
  include('../connection.php');
$and=" AND ";
if($_POST[_xy]!=NULL)
  {
    $xy=  explode('|',$_POST[_xy]);
    
   if($_POST[oko]!=NULL) {  $oko=intval($_POST[oko]/2);
       $od_x=$xy[0]-$oko;
       $od_y=$xy[1]-$oko;  
       $do_x=$xy[0]+$oko;  
       $do_y=$xy[1]+$oko;
  $zap.=$and ."v.x>'$od_x' AND v.y>'$od_y' AND v.x<'$do_x' AND v.y<'$do_y'";
 }else{
  $zap.=$and."v.x =".$xy[0].$and."v.y=".$xy[1];}
}
if($_POST[plem_op]!=NULL){  $zap.=$and."t.ally=".$_POST[plem_op]; }

if($_POST[_gracz]!=NULL) { $zap.=$and."t.name='".$_POST[_gracz]."' ORDER BY v.name" ;}

if($zap==NULL){ echo"<h1>BRAK DANYCH</h1>";   exit();}

echo $_POST[oko];
$include_per = "";
include("raport_z.php");
?>