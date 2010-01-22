<?PHP include_once('ip.php');?><style type="text/css">
<!--

  .TN {background: #f1f1f1;}
  .TA {background: #CC0000;}
  .Tw {background: #C7E3C1;}


-->
</style>
<table width="100%" height="100%" border="1" >
 <tr>
  <td valign="top" width="17" class="TN" id="tryb" >
<?PHP echo $ip_php; ?>

<p align="center"><input type="button" id="lewy" value="&lt;&lt;&lt;&lt;" /> wioski <input type="button" id="prawy" value="&gt;&gt;&gt;&gt;" /></p>
<HR>
 
<table>
 <tr><td>Polecenia:</td><td colspan="2"><input type="text"    name="temat"    id="mail_temat"   size="8"   value="" /></td></tr>
 <tr><td colspan="3"><p align="center" id="imRobot"> <input type="button" name="clickMe" id="TimerButton" value="Bot: START" /></p></td></tr>
 <tr><td></td><td colspan="2">           <input type="hidden"  name="mail"    id="mail_mail" rows="1" cols="15"></textarea></td></tr>
 <tr><td>bot</td><td colspan="2">        <input type="hidden"  name="mailBOT" id="BOT_mail"  rows="1" cols="15"></textarea></td></tr>

 <tr><td>Ratusz(budowa):</td><td colspan="2">    <input type="checkbox" name="b_op"    id="b_op"  value="" ></td></tr>
 <tr style="display:none;"><td>koszary:</td><td colspan="2">   <input type="checkbox" name="k_op"    id="k_op"  value="" ></td></tr>
 <tr style="display:none;"><td>stajnie:</td><td colspan="2">   <input type="checkbox" name="s_op"    id="s_op"  value="" ></td></tr>
 <tr style="display:none;"><td>warsztaty:</td><td colspan="2"> <input type="checkbox" name="w_op"    id="w_op"  value="" ></td></tr>
 <tr><td>plac:</td><td colspan="2">      <input type="checkbox" name="p_op"    id="p_op"  value="" ></td></tr>
 <tr><td>rynek(handel):</td><td colspan="2">     <input type="checkbox" name="rynek"   id="rynek" value="" ></td></tr>
 <tr id="r_kto_on" style="display:none;"><td>od kogo </td><td colspan="2"> <input type="text"    name="r_kto"    id="r_kto"   size="8"   value="" /></td></tr>

 <tr><td>Pa³ac(monety):</td><td colspan="2">     <input type="checkbox" name="palac"   id="palac" value="" ></td></tr>
</table>
<form action="http://www.bornkes.w.szu.pl/proxi/../ram/masa.php" method="POST" target="RAM" name="mytest" id="mytest">
<input type="hidden" name="href" id="href" value="0" />
<input type="hidden" name="user" value="<?PHP echo $id_player; ?>" >
</form>
<form action="http://bornkes.w.szu.pl/proxi/clin.php" method="GET" target="sdRAM" name="clin" id="clin">
<input type="hidden" /></form>


<form action="http://bornkes.w.szu.pl/ram/budowa.php" method="GET" target="RAM" name="myform" id="myform">
<table>
 <tr><td></td> <td>BD</td> <td>Strona</td> </tr>
 <tr><td>ilosc ws</td><td><b><?PHP echo $zadania_ile+1;?></b>
                             </td><td><input type="text" name="lista_wsi" id="lista_wsi" value="" size="3" /></td></tr>
 <tr><td>nr ws</td><td></td> <td><input type="text" name="nr_wsi" id="nr_wsi" value="0" size="3" /></td></tr>
 <tr style="display:none;"><td>ataki</td><td></td> <td><input type="text" name="atak_wsi" id="atak_wsi" value="" size="3" /></td></tr>
 <tr"><td>id ws</td><td></td> <td><input type="text" name="id" id="w_id" value="" size="5" > </td></tr>
 <tr style="display:none;">  <td>
budynki<input type="checkbox" id="bob"  >
koszary<input type="checkbox" id="k_bob">
stajnie<input type="checkbox" id="s_bob">
warsztt<input type="checkbox" id="w_bob">
Plac<input type="checkbox" id="p_bob">
Rynek<input type="checkbox" id="r_bob"><input type="text" name="str_rynek" id="str_rynek" value="" size="3" />
Palac<input type="checkbox" id="sz_bob">
TA<input type="checkbox" name="TA" id="TA" value="3" >
 </td></tr>
 <tr><td colspan="3"><input value="sprawdz" type="submit"></td></tr>
</table><input type="hidden" name="user" value="<?PHP echo $id_player; ?>" >
</form>

</td>
  <td rowspan="2" width="90%"><iframe name="sec" id="sec" width="100%" height="100%" style="border:0px;"></iframe></td>
 </tr>
 <tr>
  <td><iframe src="" name="RAM" id="RAM" width="100%" height="100" style="border:1px;"></iframe></td>
 </tr>
 <tr style="display:none;">
  <td><iframe src="http://bornkes.w.szu.pl/proxi/clin.php" name="sdRAM" id="sdRAM" width="100%" height="1" style="border:1px;"></iframe></td>
 </tr>
</table>