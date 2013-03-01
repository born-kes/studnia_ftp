<html>
<?php include("../head.html"); ?>
<body>
 <form name="fe" action="" method="post">
  <div style="position:absolute; top:-1px;right:0px; bottom:1px; left:-2px;overflow: hidden; " >
<?PHP  if($wioskaIstnieje){ ?>
    <table class="vis" align="center" width="100%">
     <tbody>
      <tr class="center row" id="units_studnia">

<?PHP  /* Raport BUNKRA */ // echo $r[status].' : '.($r[status]!=count($statuss[typ])-1);
 if( ($r[status]!=count($statuss[typ])-1 && $obrona) || $atak){    $w = ' width="35"'; echo ''.
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
     $imgZw='<span style="float:right;" ><IMG SRC="http://cdn.tribalwars.net/graphic/unit/unit_spy.png?1" title="W wiosce na pewno wiecej zwiadu niz podane"> ';
?>
 <td> Zaden zolnierz nie wrocil zywy.<?php
     if( aut($_GET[zw])>($r[zw]*2) )
       echo $imgZw.aut($_GET[zw]).'</span>';
     elseif($r[zw]>0)
       echo $imgZw.$r[zw].'</span>'; ?></td>
<?php } ?>
      </tr>
     </tbody>
    </table>

    <table class="main" width="100%" style="border-collapse:collapse">
     <tbody>
      <tr class="row" id="data_studnia">
       <th> <?php echo dataZBazy($r[data],false); ?></th>
<?php if($atak){ ?>
    <td> <?php echo $rodzaje[$r[typ]]; ?></td>
<?php }elseif($obrona){ ?>
    <td> <?php echo $statuss[typ][$r[status]]; ?></td>
    <th> <?php
 if($r[mur]!=NULL && $r[d_mur]>$godzina_jeden-(60*60*24*365) ){
   echo '<IMG SRC="http://cdn.tribalwars.net/graphic/buildings/wall.png?1" title="Informacja ma '.dns($r[d_mur]).'"> Mur Obronny: poziom '.$r[mur];
 }else{
  echo '<b> Brak informacji</b>';
 } ?></Th>
<?php } ?>
      </tr>
     </tbody>
    </table>

<?php }else{ ?>

    <table class="main ba" align="center" width="100%" style="border-collapse:collapse">
     <tbody>
      <tr class="center"><td> brak raportu, wioski niema w bazie</td></tr>
     </tbody>
    </table>

<?php } ?>
<?php if($string!=null){ ?>

    <table class="main ba" align="center" width="100%" style="border-collapse:collapse">
     <tbody>
      <tr class="center"><td> <?php echo $string; ?></td></tr>
     </tbody>
    </table>

<?php } ?>
  </div>
 </form>
</body>
</html>