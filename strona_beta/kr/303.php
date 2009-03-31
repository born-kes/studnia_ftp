<?PHP

echo'<tr><td>Zapisz do bazy:</td></tr>
<tr><th>Nic nie zapisuj <a href="javascript:editToggle(\'opcje_nic\' , \'opcje_cos\')"><input type="radio" name="z_nic" value="0" ></a></th></tr>
<tr><th >Wszystko zapisz<a href="javascript:editToggle(\'opcje_nic\' , \'opcje_cos\')"><input type="radio" name="z_nic" value="2" ></a></th></tr>
</tr>
<tr><th>Tylko wybrane   <a href="javascript:editToggle(\'opcje_cos\' , \'opcje_nic\')"><input type="radio" name="z_nic" value="1" onclick="javascript:editToggle(\'opcje_nic\' , \'opcje_cos \')";></a></th>
<th colspan="2"></th> </tr>
<tr style="display :none" id="opcje_nic"><th height="30"></th><th></th><th></th>
<th>Typ<input type="checkbox" name="z_typ" value="1"></th>
<th>Data<input type="checkbox" name="z_data" value="1"></th>
<th>';if($nev_mur!=NULL){echo'Mur<input type="checkbox" name="z_mur" value="1">';}echo'</th>
<td colspan="12" align="center">wojsko<input type="checkbox" name="z_wor" value="1"></td>
<th>opis<input type="checkbox" name="z_opis" value="1"></th>
   </tr>
<tr style="" id="opcje_cos"><th height="30"></th></tr>

<tr></tr>
<tr><td colspan="18" align="center"><input type="submit" value="Wyslij - Przetwarzaj dalej"> </td> <th>
<a  onclick="javascript:popup_scroll(\'edyt/menu.php?id='.$id_wsi.'\',310,290)";">
    Otwórz podgl±d wioski<hr> w nowym oknie
  </a></th>
</tr>';

?>