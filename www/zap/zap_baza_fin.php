<html><head>
<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
<link rel="stylesheet" type="text/css" href="../img/stamm1201718544.css">
<script src="../mootools.js" type="text/javascript"></script>
<script src="../scriptt.js" type="text/javascript"></script>
</head>
<body>
<?php
  include('../connection.php');
$p=" AND ";

    if($_POST[n_gracz]!=NULL)
       { $zap.=$p."t.name='".$_POST[n_gracz]."' ORDER BY v.name";}
elseif($_POST[okolica]!=NULL && $_POST[oxy]!=NULL)
       {   $xy=  explode('|',$_POST[oxy]); $oko=$_POST[okolica];
       $od_x=$xy[0]-$oko;  $od_y=$xy[1]-$oko;  $do_x=$xy[0]+$oko;  $do_y=$xy[1]+$oko;
       $zap.=" AND v.x>'$od_x' AND v.y>'$od_y' AND v.x<'$do_x' AND v.y<'$do_y'";
       if($_POST[plem_op]!=NULL){ $zap.=$p."t.ally=".$_POST[plem_op]; }
         $zap.=" ORDER BY v.y, v.x ";
       }
elseif($_POST[xy]!=NULL)
       {  $xy=  explode('|',$_POST[xy]);
        $zap.=$p."v.x =".$xy[0].$p."v.y=".$xy[1];
       }
$include_per = "../";
include("../raport_z.php");
?>