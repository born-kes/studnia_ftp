<table width="100%" height="100%" border="1">
 <tr>
  <td valign="top" width="17">
<?PHP include_once('ip.php');?>
<table>
 <tr><td>mail_temat:</td><td colspan="2"><input type="text" name="temat"     id="mail_temat"   size="8"   value="" /></td></tr>
 <tr><td></td><td colspan="2"><textarea          name="mail"      id="mail_mail" rows="1" cols="15"></textarea></td></tr>
 <tr><td>bot</td><td colspan="2"><textarea       name="mailBOT"   id="BOT_mail"  rows="1" cols="15"></textarea></td></tr>
 <tr><td>budowa:</td><td colspan="2"><input type="checkbox" name="b_op" id="b_op" value="" ></td></tr>
 <tr><td>koszary:</td><td colspan="2"><input type="checkbox" name="k_op" id="k_op" value="" ></td></tr>
 <tr><td>stajnie:</td><td colspan="2"><input type="checkbox" name="s_op" id="s_op" value="" ></td></tr>
 <tr><td>warsztaty:</td><td colspan="2"><input type="checkbox" name="w_op" id="w_op" value="" ></td></tr>
 <tr><td>plac:</td><td colspan="2"><input type="checkbox" name="p_op" id="p_op" value="" ></td></tr>
<form action="../ram/masa.php" method="POST" target="RAM" name="mytest" id="mytest">
<input type="hidden" name="href" id="href" value="0" />
</form>


<form action="../ram/budowa.php" method="GET" target="RAM" name="myform" id="myform">

 <tr><td></td> <td>BD</td> <td>Strona</td> </tr>
 <tr><td>ilosc ws</td><td><b><?PHP echo $zadania_ile+1;?></b></td><td><input type="text" name="lista_wsi" id="lista_wsi" value="" size="3" /></td></tr>
 <tr><td>nr ws</td><td></td>                         <td><input type="text" name="nr_wsi" id="nr_wsi" value="0" size="3" /></td></tr>
 <tr><td>ataki</td><td></td>                         <td><input type="text" name="atak_wsi" id="atak_wsi" value="" size="3" /></td></tr>
 <tr><td>id ws</td><td></td>                         <td><input type="text" name="id" id="w_id" value="" size="5" > </td></tr>
 <tr style="display:none;"><td>budynki<input type="checkbox" id="bob"  > </td></tr>
 <tr style="display:none;"><td>koszary<input type="checkbox" id="k_bob"> </td></tr>
 <tr style="display:none;"><td>stajnie<input type="checkbox" id="s_bob"> </td></tr>
 <tr style="display:none;"><td>warsztt<input type="checkbox" id="w_bob"> </td></tr>
 <tr style="display:none;"><td>Plac<input type="checkbox" id="p_bob"> </td></tr>
 <tr><td colspan="3"><input value="sprawdz" type="submit"></td></tr>
</table><input type="hidden" name="user" value="<?PHP echo $id_player; ?>" >
</form>
  <p id="imRobot"> <input type="button" name="clickMe" id="TimerButton" value="START" /></p>

</td>
  <td rowspan="2" width="90%"><iframe name="sec" id="sec" width="100%" height="100%" style="border:0px;"></iframe></td>
 </tr>
 <tr>
  <td><iframe src="" name="RAM" id="RAM" width="200" height="100" style="border:1px;"></iframe></td>
 </tr>
</table>