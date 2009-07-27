   <table>
   <form enctype="multipart/form-data" action="zap/zap_baza_fin.php" method="post" target="prawy">
    <tr>
     <th>x|y: </th>
     <td><input name="oxy" tabindex="13" id="inputx" value="" maxlength="7" size="7" type="text"> </td>
    </tr>
    <tr>
     <td align="center">okolica +/- </td>
     <td><select name="okolica">
              <option value="5"> 5</option>
              <option value="10">10</option>
              <option value="25">25</option>
              <option value="35">35</option>
           </select>pul</td>
    </tr>
    <tr>
     <td>plemie:</td>
     <td><select name="plem_op">
                       <option value=""></option><?PHP for($licz=0; $licz<count($plemiona); $licz++){echo'
                       <option value="'.$id_plem[$licz].'">'.$plemiona[$licz].'</option>'; } ?>
                      </select></td>
      </tr>
      <tr>
       <td colspan="4" align="center"><input value="Wykonaj" type="submit"></td>
      </tr>
   </form>
   </table>
