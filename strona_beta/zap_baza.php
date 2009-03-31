<form enctype="multipart/form-data" action="?pbf=0" method="POST">
<table border="1"><tbody>
<?PHP
$rodzaje = array ('brak typu','wioska off','wioska def','wioska ck','wioska palac','wioska zwiadowcza');
$plemiona = array ('bez plemienia','-SNRG-','~ZP','=MAD=', 'NWO','-BAE-','ZCR');
$id_plem   = array (  0,            50811 ,   4469, 23185 , 48588,23660  , 26084);


 if($_GET[pb]==1){
echo'<input name="szukajxy" tabindex="13" value="1"  type="hidden">';}
 if($_GET[pb]==3||$_GET[pb]==1){
echo'
<tr><th>
        x: </th>
<td>        <input name="x" tabindex="13" id="inputx" value="" size="5" onkeyup="xProcess(\'inputx\', \'inputy\')" type="text"> </td>
<th>
        y: </th>
<td>        <input name="y" tabindex="14" id="inputy" value="" size="5" type="text"><br>';
echo'</td></tr>';}

 if($_GET[pb]==3){
echo'
<tr><td align="center" >okolica </td><td><SELECT name="okolica">
                       <option value= "5"> +5</option>
                       <option value="10">+10</option>
                       <option value="25">+25</option>
                       <option value="35">+35</option>
                               </select></td><td colspan="2" > pul w kazdym kierunku

</td></tr> '; }

 if($_GET[pb]==4){
echo'
<tr><td>x:</td>
               <td><SELECT name="x">
               <OPTION VALUE=""></OPTION>
               <OPTION VALUE=">">></OPTION>
               <OPTION VALUE="<"><</OPTION>
               <OPTION VALUE="=" selected="selected" >=</OPTION>
               </SELECT></td>
                             <td><input name="x1"  value="" size="5" type="text"></td>
                                 <td><SELECT name="x_z2">
                                 <OPTION VALUE=""></OPTION>
                                 <OPTION VALUE=">">></OPTION>
                                 <OPTION VALUE="<"><</OPTION>
                                 <OPTION VALUE="=" >=</OPTION>
                                 </SELECT>
                                  <input name="x2"  value="" size="5" type="text">
                                                                                 </td></tr>
<tr><td>y:</td>
               <td><SELECT name="y">
               <OPTION VALUE=""></OPTION>
               <OPTION VALUE=">">></OPTION>
               <OPTION VALUE="<"><</OPTION>
               <OPTION VALUE="=" selected="selected" >=</OPTION>
               </SELECT></td>
                             <td><input name="y1"  value="" size="5" type="text"></td>
                                 <td><SELECT name="y_z2">
                                 <OPTION VALUE=""></OPTION>
                                 <OPTION VALUE=">">></OPTION>
                                 <OPTION VALUE="<"><</OPTION>
                                 <OPTION VALUE="=" >=</OPTION>
                                 </SELECT>
                                  <input name="y2"  value="" size="5" type="text">
                                                                                 </td></tr>
';}

 if($_GET[pb]==4){
echo'
<tr><td>data:</td>
               <td><SELECT name="d_z1">
               <OPTION VALUE=""></OPTION>
               <OPTION VALUE=">">></OPTION>
               <OPTION VALUE="<"><</OPTION>
               <OPTION VALUE="=">=</OPTION>
               </SELECT></td>
                             <td><input name="d1"  value="" size="5" type="text"></td>
                                 <td><SELECT name="d_z2">
                                 <OPTION VALUE=""></OPTION>
                                 <OPTION VALUE=">">></OPTION>
                                 <OPTION VALUE="<"><</OPTION>
                                 <OPTION VALUE="=">=</OPTION>
                                 </SELECT>
                                  <input name="d2"  value="" size="5" type="text">
</td></tr>
 ';  }

 if($_GET[pb]==4){
echo'
<tr><td>Wojsk:</td>
               <td colspan="2" ><SELECT name="w_op">
                   <OPTION VALUE=""></OPTION>
                   <OPTION VALUE="pik">pikinier</OPTION>
                   <OPTION VALUE="mie">miecznik</OPTION>
                   <OPTION VALUE="axe">topor</OPTION>
                   <OPTION VALUE="luk">Lukcznik</OPTION>
                   <OPTION VALUE="zw">Zwiadowca</OPTION>
                   <OPTION VALUE="lk">LekkaKawaleria</OPTION>
                   <OPTION VALUE="kl">LukowKonnych</OPTION>
                   <OPTION VALUE="ck">CierzkiKawaleria</OPTION>
                   <OPTION VALUE="tar">Taran</OPTION>
                   <OPTION VALUE="kat">Katapulta</OPTION>
                   <OPTION VALUE="ry">Rycerz</OPTION>
                   <OPTION VALUE="sz">Szlachic</OPTION>
                   </SELECT></td>
                             <td><SELECT name="w_z1">
                                 <OPTION VALUE=""></OPTION>
                                 <OPTION VALUE=">">></OPTION>
                                 <OPTION VALUE="<"><</OPTION>
                                 <OPTION VALUE="=">=</OPTION>
                                 </SELECT>
                                  <input name="w_z2"  value="" size="5" type="text">
</td></tr>
'; }
                                  
 if($_GET[pb]==4){
echo'
<tr><td>pkt:</td>
               <td><SELECT name="pkt_z1">
               <OPTION VALUE=""></OPTION>
               <OPTION VALUE=">">></OPTION>
               <OPTION VALUE="<"><</OPTION>
               <OPTION VALUE="=">=</OPTION>
               </SELECT></td>
                             <td><input name="pkt1"  value="" size="5" type="text"></td>
                                 <td><SELECT name="pkt_z2">
                                 <OPTION VALUE=""></OPTION>
                                 <OPTION VALUE=">">></OPTION>
                                 <OPTION VALUE="<"><</OPTION>
                                 <OPTION VALUE="=">=</OPTION>
                                 </SELECT>
                                  <input name="pkt2"  value="" size="5" type="text">
                                                                                 </td></tr>
  '; }

 if($_GET[pb]==4){
echo'
<tr><th colspan="5" >Warunki:
</th></tr>
 '; }

 if($_GET[pb]==4||$_GET[pb]==2){
echo'
<tr><td>Gracz: </td>
                    <td colspan="5" ><INPUT TYPE="text" name="n_gracz" VALUE="">
</td></tr>
';}

 if($_GET[pb]==4){
echo'
<tr><td>Nazwa Wsi:</td>
                       <td colspan="5" ><INPUT TYPE="text" size="28"  name="n_wsi" VALUE="">
</td></tr>
'; }

 if($_GET[pb]==4||$_GET[pb]==3){
echo'
<tr><td>plemie:</td>
                       <td colspan="5" ><SELECT name="plem_op" >
                       <option value=""></option> ';
                        for($licz=0; $licz<count($plemiona); $licz++){
                         echo'<option value="'.$id_plem[$licz].'"';
                                      echo '>'.$plemiona[$licz].'</option>'; }
echo'                       </SELECT>
</td></tr>
      '; }

 if($_GET[pb]==4){
echo'
<tr><td>Typ wioski:</td>
                       <td colspan="5"><SELECT name="n_typ" >
                       <option value=""></option>';
            for($licz=0; $licz<count($rodzaje); $licz++){
                         echo'<option value="'.$licz.'"';
                                      echo '>'.$rodzaje[$licz].'</option>'; }
echo'                       </SELECT></td></tr>
     ';}
     
  if($_GET[pb]==4){
echo'
<tr><th colspan="5" >Warunki opcjonalne: </th></tr>
<tr><td>Raport:</td>
                        <td colspan="2" ><INPUT TYPE="radio" name="wo_ra"  VALUE="1">istnieje</td>
                        <td>             <INPUT TYPE="radio" name="wo_ra" VALUE="0">nie istnieje</td></tr>

<tr><td>Wlascyciel wioski:</td>
                        <td colspan="2" ><INPUT TYPE="radio" name="wo_gracz"  VALUE="1">istnieje</td>
                        <td>             <INPUT TYPE="radio" name="wo_gracz" VALUE="0">nie istnieje</td></tr>
<tr><td>Gracz:</td>
                        <td colspan="2" > <INPUT TYPE="radio" name="wo_plemie" VALUE="1">w plemieniu</td>
                        <td colspan="2" > <INPUT TYPE="radio" name="wo_plemie" VALUE="0">bez plemienia</td></tr>
<tr><td>Opis wioski:</td>
                        <td colspan="2" > <INPUT TYPE="radio" name="wo_opis" VALUE="1">istnieje</td>
                        <td colspan="2" > <INPUT TYPE="radio" name="wo_opis" VALUE="0">nie istnieje</td></tr>
<tr><td>Typ Wioski:</td>
                        <td colspan="2" > <INPUT TYPE="radio" name="wo_typ" VALUE="1">wybrany</td>
                        <td colspan="2" > <INPUT TYPE="radio" name="wo_typ" VALUE="0">nie wybrany</td></tr>
<tr><td>Mur:</td>
                        <td colspan="2" > <INPUT TYPE="radio" name="wo_mur" VALUE="1">istnieje</td>
                        <td colspan="2" > <INPUT TYPE="radio" name="wo_mur" VALUE="0">nie istnieje</td></tr>

      ';         }
echo'
<tr><td align="center"  colspan="6" >
<INPUT TYPE="submit" VALUE="Wykonaj">
</td></tr></table>

</form>        ';
?>