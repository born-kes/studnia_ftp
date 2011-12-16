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
  <div style="position:absolute; top:1px;right:0px; bottom:1px; left:0px;overflow: hidden; " >
    <table class="main" width="100%" style="border-collapse:collapse">
     <tbody>
      <tr class="row" >
       <th colspan="2">Data aktualizacji: <?php echo @data_z($wczasy); ?></th>
      </tr>
      <tr class="row" >
<?php if( ($ileNowych+$ileSukces)>0){?>       <td colspan="2">Zakonczono sukcesem w <?php echo($ileNowych+$ileSukces); ?> przypadkach</td>
      </tr>
      <tr class="row" >
<?php if($ileError>0){?>       <td colspan="2">Problem w <?php echo $ileError; ?> przypadkach</td>
<?php }else{?>       <th colspan="2">Brak Problemow</th><?php } ?>
      </tr>
      <tr class="row" >
       <td>Nowych <?php echo $ileNowych; ?></td><td>Zmienionych <?php echo $ileSukces; ?></td>
      </tr>
<?php }else{ ?>      <tr class="row" >
       <th>Nie udalo sie dodac stanu murow</th>
      </tr>
      <tr class="row" >
<?php if($ileError>0){?>       <td colspan="2">Problem w <?php echo $ileError; ?> przypadkach</td>
<?php }else{?>       <th colspan="2">Brak Problemow</th><?php } ?>
      </tr>

<?php } ?>
     </tbody>
    </table>
<?php if($string!=null){ ?>

    <table class="main ba" align="center" width="100%" style="border-collapse:collapse">
     <tbody>
      <tr class="center"><td><?php echo $string; ?></td></tr>
     </tbody>
    </table>

<?php } ?>
  </div>
</body>
</html>