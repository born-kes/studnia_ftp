<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<link href="http://pl5.plemiona.pl/merged/game.css?1323168552" type="text/css" rel="stylesheet">
<style type="text/css">
<!--
table.main { background-color:#F7EED3; border:0px solid #804000;}
table.ba { border-bottom:0px;}
td{font-size:12px;}

table.main th{font-size:9px;}
table.main tr.row th{font-size:9px;}
table.main tr.row td { background-color:#006600; background-image:none; color:#F1EBDD;}
table.main tr.row td.hidden { color:#333366; }
tr.center td { text-align:center; }

-->
</style>
</head>
<body>
 <form name="fe" action="" method="post">
  <div style="position:absolute; top:-1px;right:0px; bottom:1px; left:-2px;overflow: hidden; " >
<?PHP  if($wioskaIstnieje){ ?>
    <table class="vis" align="center" width="100%">
     <tbody>
      <tr class="center row">

<?PHP  /* Raport BUNKRA */
 if($r[status]!=count($statuss[typ])-1){    $w = ' width="35"'; echo ''.
  td( $r[pik],$w).
  td( $r[mie],$w).
  td( $r[axe],$w).
  td( $r[luk],$w).
  td( $r[zw] ,$w).
  td( $r[lk] ,$w).
  td( $r[kl] ,$w).
  td( $r[ck] ,$w).
  td( $r[tar],$w).
  td( $r[kat],$w).
  td( $r[ry] ,$w).
  td( $r[sz] ,$w);

 }else{

 echo '<td>Zaden zo³nierz nie wrocil zywy.</td>';
     }
?>
      </tr>
     </tbody>
    </table>

    <table class="main" width="100%" style="border-collapse:collapse">
     <tbody>
      <tr class="row" >
       <th><?php echo dataZBazy($r[data],false); ?></th>
<?php if($atak){ ?>
    <td><?php echo $rodzaje[$r[typ]]; ?></td>
<?php }elseif($obrona){ ?>
    <td><?php echo $statuss[typ][$r[status]]; ?></td>
    <th><?php
 if($r[mur]!=NULL && $r[d_mur]>$godzina_jeden-(60*60*24*365) ){
   echo '<IMG SRC="http://cdn.tribalwars.net/graphic/buildings/wall.png?1" title="Informacja ma '.dns($r[d_mur]).'"> Mur Obronny: poziom '.$r[mur];
 }else{
  echo '<b>Brak informacji</b>';
 } ?></Th>
<?php } ?>
      </tr>
     </tbody>
    </table>

<?php }else{ ?>

    <table class="main ba" align="center" width="100%" style="border-collapse:collapse">
     <tbody>
      <tr class="center"><td>brak raportu, wioski niema w bazie</td></tr>
     </tbody>
    </table>

<?php } ?>
<?php if($string!=null){ ?>

    <table class="main ba" align="center" width="100%" style="border-collapse:collapse">
     <tbody>
      <tr class="center"><td><?php echo $string; ?></td></tr>
     </tbody>
    </table>

<?php } ?>
  </div>
 </form>
</body>
</html>