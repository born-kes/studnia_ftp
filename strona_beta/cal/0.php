<form enctype="multipart/form-data" action="?cc=1" method="post">
Liczy odleg³o¶æ miêdzy wioskami wybieraj±c Graczy<br />
listê mo¿na ograniczyæ o :<br />
- typ wiosek - lista zawiera tylko wioski z danej grupy<br />
- okolica - lista zawiera wioski oddalone od punktu maksymalnie 10 pul w ka¿d± stronê<BR />
<br />
<table><tbody>
<tr>
   <td>Agresor:</td>
   <td><input name="atakujacy" value="" type="text"></td>
   <td>Typ wiosek:</td>
   <td><SELECT name="a_typ" ><option value=""></option>

<?PHP for($licz=0; $licz<count($rodzaje); $licz++){ echo'<option value="'.$licz.'">'.$rodzaje[$licz].'</option>'; } ?>
    </SELECT></td>

   <td>Okolica xxx|yyy:</td>
   <td><input name="a_oko" tabindex="1" maxlength="7" id="inputx" value="" size="6" type="text"></td>
   <td>Rodzaj ataku:</td>
   <td><select name="cos">
            <option value="18">Pik/ Top/ £uk 18</option>
            <option value="22">Miecznik 22</option>
            <option value="9" >Zwiadowca 9</option>
            <option value="10">Kawaleria 10</option>
            <option value="11">Ciê¿ki Kawalerzysta 11</option>
            <option value="30">Tar/ Kat 30</option>
            <option value="35">Szlachcic 35</option>
          </select></td>
</tr>
<tr>
   <td>Obronca:</td>
   <td><input name="atakowany" type="text"></td>
   <td>Typ wiosek:</td>
   <td><SELECT name="o_typ" >
                       <option ></option>
<?PHP for($licz=0; $licz<count($rodzaje); $licz++){ echo'<option value="'.$licz.'">'.$rodzaje[$licz].'</option>'; } ?>
    </SELECT></td>

   <td>Okolica xxx|yyy:</td>
   <td><input name="o_oko" tabindex="1" maxlength="7" id="inputx" value="" size="6" type="text"></td>
</tr>
<tr>
   <td><input value="Dalej" type="submit"></td>
</tr>
<tr>
   <td colspan="2">Oblicz atak na:<input type="text" name="czas1" value="rrrr-mm-dd" size="10"></td>
   <td colspan="1"><input type="text" name="czas2" value="gg-ii-ss" size="8"></td>
   <td colspan="1"><b>R</b>ok-<b>M</b>iesi±c-<b>D</b>zien </td>
   <td colspan="2"><b>G</b>odzina:M<b>I</b>nuta:<b>S</b>ekund</td>
</tr>

</tbody></table>

</form>
