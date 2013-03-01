<html>
<?php include("../head.html"); ?>
<body>
<table class="main center" width="100%">
  <tbody>
    <tr>
      <th width="50%">W Wiosce</th>
      <th width="50%">Mobilne</th>
    </tr>
    <tr>
      <td valign="top" >
<?PHP
if($wioskaRaport){?>
       <table class="main center" width="100%">
        <tbody>
         <tr>
           <th><?php if($r[data]!=null){ echo dataZBazy($r[data],false);}else{echo 'Brak Daty';} ?></th>
         </tr>
         <tr>
           <th>Status obronny: <?php if($r[status]!=null)echo $serwStatus["Nazwa"][ $r[status] ]; ?></th>
         </tr>
         <tr>
          <td><?php if($rapWojska!=null)echo $rapWojska; ?></td>
         </tr>
<? if($mur!=null){ ?>
         <tr>
          <th><?php echo'<IMG SRC="'.$img.'buildings/wall.png" alt="Mur Obronny" > Poziom muru: '.$mur ?>
              <? if($r[d_mur]>0 ) echo '<br>'.dataZBazy($r[data],false); ?>
          </th>
         </tr><?php } ?>
         <tr>
          <td>Obronna: <?php if($str!=null)echo $str; ?></td>
         </tr>
<?php if($sumaObronyPiechoty != 0 || $sumaObronyKawaleria != 0 || $sumaObronyLuki != 0){ ?>
         <tr>
          <th><?php echo '<IMG SRC="'.$img.'unit/def.png?1"> '       .number_format($sumaObronyPiechoty); ?></th>
         </tr>
         <tr>
          <th><?php echo '<IMG SRC="'.$img.'unit/def_cav.png?1"> '   .number_format($sumaObronyKawaleria); ?></th>
         </tr>
         <tr>
          <th><?php echo '<IMG SRC="'.$img.'unit/def_archer.png?1"> '.number_format($sumaObronyLuki); ?></th>
         </tr>
         </tr><?php } ?>
        </tbody>
       </table>
<?php }else echo 'Brak Dancyh'; ?>
      </td>
      <td valign="top" >
<?php if($wioskaMobil){?>
       <table class="main center" width="100%">
        <tbody>
         <tr>
           <th><?php if($m[data]!=null){ echo dataZBazy($m[data],false);}else{echo 'Brak Daty';} ?></th>
         </tr>
         <tr>
           <th>Typ/Grupa: <?php if($r[typ]!=null)echo $rodzaje[$m[typ]]; ?></th>
         </tr>
         <tr>
          <td><?php if($rapWojskaMobil!=null)echo $rapWojskaMobil; ?></td>
         </tr>
         <tr>
          <td>Sila Ataku: <?php if($strAtak!=null)echo $strAtak; ?></td>
         </tr>
<?php if($sumaObronyPiechoty != 0 || $sumaObronyKawaleria != 0 || $sumaObronyLuki != 0){ ?>
         <tr>
          <th><?php if($silaAtakuPiechoty>0) echo '<IMG SRC="'.$img.'unit/def.png?1"> '       .number_format($silaAtakuPiechoty); ?></th>
         </tr>
         <tr>
          <th><?php if($silaAtakuKawaleri>0) echo '<IMG SRC="'.$img.'unit/def_cav.png?1"> '   .number_format($silaAtakuKawaleri); ?></th>
         </tr>
         <tr>
          <th><?php if($silaAtakuLucznikow>0) echo '<IMG SRC="'.$img.'unit/def_archer.png?1"> '.number_format($silaAtakuLucznikow); ?></th>
         </tr>
         <tr>
          <th><?php if($sumaAtaku>0) echo 'Suma <IMG SRC="'.$img.'buildings/barracks.png?1"> '.number_format($sumaAtaku); ?></th>
         </tr>
<?php } ?>
        </tbody>
       </table>
<?php }else echo 'Brak Dancyh'; ?>
      </td>
    </tr>
  </tbody>
</table>
<?php if($cell)echo "<br>".$gstr; ?>
</body>
</html>