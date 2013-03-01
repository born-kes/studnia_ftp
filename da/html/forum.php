<html>
<?php include("../head.html"); ?>
<body>
<?php  if(count($tytul['nazwa'])>0){ ?>
<table class="vis center" width="100%">
  <tbody>
 <?php for($i=0;count($tytul['nazwa'])>$i;$i++){ ?>
    <tr>
      <th width="50%"><?php echo $tytul['nazwa'][$i]; ?></th>
      <th width="50%"><?php
if($tytul['tematy'][$i]==0 || $tytul['tematy'][$i]>4)
   echo 'jest '.$tytul['tematy'][$i].' tematow';
else if($tytul['tematy'][$i]==1)
   echo 'jest '.$tytul['tematy'][$i].' temat';
else if($tytul['tematy'][$i]<5)
   echo 'sa '.$tytul['tematy'][$i].' tematy';
 ?> </th>
    </tr>
    <tr>
     <td colspan="2"><div id="tytle_<?php echo $tytul['id'][$i]; ?>"></div></td>
    </tr>
<?php } ?>
  </tbody>
</table>
<?php } ?>
</body>
</html>