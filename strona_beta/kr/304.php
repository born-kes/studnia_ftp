<?PHP

if($f_widmo == 1){
echo'<tr><td colspan="19" > Wojska jakie zniklo <input type="checkbox" name="widmo" value=""></th></td>
</tr><tr>
<Th></Th>
<Th>X</Th>
<Th>Y</Th>
<Th></Th>
<Th></Th>
<Th></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_spear.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_sword.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_axe.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_archer.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_spy.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_light.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_marcher.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_heavy.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_ram.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_catapult.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_knight.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_snob.png"></Th>
<Th></Th></tr>';


for($l=1; $l<=count($wojo_kasacja); $l++){
echo'<tr>
<Th><input type="hidden" name="widmo[]" value="'.$widmo_gdzie[$l][0].','.$widmo_gdzie[$l][1].','.$widmo[$l][1].','.$widmo[$l][2].','.$widmo[$l][3].','.$widmo[$l][4].','.$widmo[$l][5].','.$widmo[$l][6].','.$widmo[$l][7].','.$widmo[$l][8].','.$widmo[$l][9].','.$widmo[$l][10].','.$widmo[$l][11].','.$widmo[$l][12].'"></Th>
<Th>'.$widmo_gdzie[$l][0].'</Th>
<Th>'.$widmo_gdzie[$l][1].'</Th>
<Th></Th>
<Th></Th>
<Th></Th>
<Th>'.$widmo[$l][1].'</Th>
<Th>'.$widmo[$l][2].'</Th>
<Th>'.$widmo[$l][3].'</Th>
<Th>'.$widmo[$l][4].'</Th>
<Th>'.$widmo[$l][5].'</Th>
<Th>'.$widmo[$l][6].'</Th>
<Th>'.$widmo[$l][7].'</Th>
<Th>'.$widmo[$l][8].'</Th>
<Th>'.$widmo[$l][9].'</Th>
<Th>'.$widmo[$l][10].'</Th>
<Th>'.$widmo[$l][11].'</Th>
<Th>'.$widmo[$l][12].'</Th>
<Th></Th>
<Th></Th></tr><tr><td colspan="19" > </td></tr>';

}//koniec for  
}  // if(widmo)
?>