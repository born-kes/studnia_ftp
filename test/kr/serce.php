 <form name="raport" action="3.php" method="POST">
<table class="vis" align="center" width="450">
 <tr style="display:none;"> <td><?PHP echo '<input type="hidden" name="o_id" value="'.$baza_o[id].'" />
<input type="hidden" name="a_id" value="'.$baza_a[id].'" />
<input type="hidden" id="dat" name="dat" value="'.$raport[data].'" />';?></td>
 </tr>
 <tr>
  <td>
   <table id="agresor" width="100%" class="main" >
    <tr>
     <td colspan="5"><b>Agresor: </b><?PHP echo $raport[agresor]; ?></td>
    </tr>
    <tr>
     <td colspan="5"><b>Wioska Agresora :</b><?PHP echo $raport[w_agr]; ?></td>
    </tr>
    <tr>
     <td colspan="5">
      <table class="main" id="nowy raport" width="100%">
       <tr><td colspan="12">Dane z nowego raportu</td></tr>
       <tr class="row"><td colspan="12">Dane zapisane w Bazie</td></tr>
       <tr>
        <td colspan="7"><?PHP echo data_z_bazy($raport[data]); ?></td>
        <td colspan="6"><SELECT name="a_typ" >
        <?PHP echo wpisz_rodzaj($typ_a);?></SELECT> <?PHP echo $s8; ?></td>
       </tr>
       <tr class="row">
        <td colspan="7"><?PHP echo $baza_a[data];?> </td>
        <td colspan="6"><?PHP echo $rodzaje[$baza_a[typ]]; ?></td>
       </tr>

       <tr>
        <td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_spear.png?1" title="Pikinier" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_sword.png?1" title="Miecznik" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_axe.png?1" title="Topornik" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_archer.png?1" title="£ucznik" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_spy.png?1" title="Zwiadowca" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_light.png?1" title="Lekki kawalerzysta" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_marcher.png?1" title="£ucznik na koniu" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_heavy.png?1" title="Ciê¿ki kawalerzysta" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_ram.png?1" title="Taran" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_catapult.png?1" title="Katapulta" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_knight.png?1" title="Rycerz" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_snob.png?1" title="Szlachcic" alt=""></td>
       </tr>
       </tr>
       <tr>
        <?PHP echo wpisz($raport[wojo_a]); ?>
       </tr>
       <tr class="row"><?PHP echo wpisz($strzal); ?></tr>
       <tr class="row"><?PHP echo wpisz($baza_a[wojo]); ?></tr>
       <tr style="display:none;">
        <?PHP echo wpisz_hidde($raport[wojo_a],'a'); ?>
       </tr>

      </table>
     </td>
    </tr>
    <tr>
     <td><input id="adata" name="adata" checked="checked" type="checkbox" value="1" >
         <label for="adata">Data</label></td>
     <td><input id="wa" name="wa" checked="checked" type="checkbox" value="1" >
         <label for="wa">Wojska agresora:</label></td>
     <td />
     <!--<td><input id="map_popup_moral" name="map_popup_moral" checked="checked" type="checkbox" value="1" >
         <label for="map_popup_moral">Status</label></td>    -->
     <td><input id="twa" name="twa" checked="checked" type="checkbox" value="1" >
         <label for="twa">Typ Wioski</label></td>
    </tr>
   </table>
  </td>
 </tr>
<tr><th><p align="center"><a href="javascript:window.close()">zamknij okienko</a> . <input type="submit" name="submit" value="Zapisz Agresora" /></p>
</th></tr>
 <tr>
  <td>
      <table id="agresor" class="main" width="100%">
    <tr>
     <td colspan="5"><b>Obroñca :</b><?PHP echo $raport[obronca]; ?></td>
    </tr>
    <tr>
     <td colspan="5"><b>Wioska Obroñcy :</b> <?PHP echo $raport[w_obr]; ?></td>
    </tr>
    <tr>
     <td  colspan="5">
      <table id="nowy raport" class="main" width="100%">
       <tr><td colspan="12">Dane z nowego raportu</td></tr>
       <tr class="row"><td colspan="12">Dane zapisane w Bazie</td></tr>
       <tr>
        <td colspan="7"><?PHP echo data_z_bazy($raport[data]); ?></td>
        <td colspan="6"><SELECT name="o_typ" >
        <?PHP echo wpisz_rodzaj($typ_o); ?></SELECT></td>
       </tr>
       <tr class="row">
        <td colspan="7"><?PHP echo $baza_o[data];?></td>
        <td colspan="6">
        <?PHP echo $rodzaje[$baza_o[typ]]; ?></td>
       </tr>
       <tr>
        <td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_spear.png?1" title="Pikinier" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_sword.png?1" title="Miecznik" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_axe.png?1" title="Topornik" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_archer.png?1" title="£ucznik" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_spy.png?1" title="Zwiadowca" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_light.png?1" title="Lekki kawalerzysta" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_marcher.png?1" title="£ucznik na koniu" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_heavy.png?1" title="Ciê¿ki kawalerzysta" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_ram.png?1" title="Taran" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_catapult.png?1" title="Katapulta" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_knight.png?1" title="Rycerz" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_snob.png?1" title="Szlachcic" alt=""></td>
       </tr>
       <tr>
        <?PHP if($brak_obr!=NULL){echo '<td colspan="12">brak informacji o obronie</td>';}else{ echo wpisz($raport[wojo_o]);} ?>
       </tr>
       <tr class="row"><?PHP echo wpisz($strzal); ?></tr>
       <tr class="row">
        <?PHP echo wpisz($baza_o[wojo]); ?>
       </tr>
       <tr style="display:none;">
        <?PHP if($brak_obr==NULL){echo wpisz_hidde($raport[wojo_o],'o');} ?>
       </tr>
       <tr>
        <td colspan="7">Mur: <?PHP echo $raport[nev_mur]; ?></td>
        <td colspan="6">Status : <?PHP if($brak_obr==NULL){echo $status[typ][status($raport[status])];}else{echo $status[typ][4];} ?></td>
       </tr>
       <tr class="row">
        <td colspan="7">Mur: <?PHP echo $baza_o[mur]; ?></td>
        <td colspan="6">Status : <?PHP echo $status[typ][$baza_o[status]];?></td>
       </tr>

      </table>
     </td>
    </tr>
    <tr>
     <td><input id="odata" name="odata" checked="checked" type="checkbox" value="1" <?PHP if($raport[data]!=NULL){echo' checked="tak"'; }?>/>
         <label for="odata">Data Obroncy</label></td>
     <td><?PHP if($brak_obr==NULL){echo'<input id="wo" name="wo" checked="checked" type="checkbox" value="1" checked="tak" />
         <label for="wo">Wojska Obroñcy</label>';}else{echo 'brak informacji o obronie';}?></td>
     <td><?PHP if($raport[nev_mur]!==NULL){echo'<input id="mo" name="mo" checked="checked" type="checkbox" value="'.$raport[nev_mur].'" />
         <label for="mo">Mur</label>';}?></td>
     <td>
     <?PHP if($brak_obr==NULL && $raport[status]!==NULL ){echo'<input id="so" name="so" checked="checked" type="checkbox" value="'.status($raport[status]).'">';}else{echo'<input id="so" name="so" checked="checked" type="checkbox" value="4">';}?>
         <label for="so">Status Wioski</label></td>
     <td><input id="two" name="two" checked="checked" type="checkbox" value="1">
         <label for="two">Typ Wioski</label></td>
    </tr>
   </table>
  </td>
 </tr>
 <tr><th>
<p align="center"><a href="javascript:window.close()">zamknij okienko</a> . <input type="submit" name="submit" value="Zapisz Obroñce" /></p>
 </th></tr>
</table>
   </form>
</body></html>