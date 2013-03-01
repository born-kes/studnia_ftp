<html>
<?php include("../head.html"); ?>
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