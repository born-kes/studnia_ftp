</td>
<form name="form_cal_zloz" enctype="multipart/form-data" action="cal/1.php" method="post" target="prawy">
  <td align="center" valign ="top">
   <table>
    <tr><td>GRUPA <b>A</b>gresor</td></tr>
    <tr>
     <td>Nazwa* <input name="atakujacy" value="" type="text"></td>
    </tr>
    <tr>
     <td>Typ Wsi*<select name="a_typ"><option value=""></option><?PHP for($licz=0; $licz<count($rodzaje); $licz++){echo'
               <option value="'.$licz.'">'.$rodzaje[$licz].'</option>'; } ?></select></td>
    </tr>
    <tr>
     <td>Okolica* x|y <input name="a_oko" tabindex="1" maxlength="7" id="inputx" value="" size="6" type="text"></td>
    </tr>
   </table>
  </td>
  <td align="center" valign ="top">
   <table>
    <tr>
     <td>Rodzaj Ataku</td>
    </tr>
    <tr>
     <td><select name="cos"><?PHP for($licz=0; $licz<count($rodzaje); $licz++){echo'
                  <option value="'.$w_tepm[$licz].'">'.$w_typ[$licz].' '.$w_tepm[$licz].'</option>'; } ?></select></td>
    </tr>
    <tr>
     <td><small>Czas Dotarcia</small></td>
    </tr>
    <tr>
     <td><input name="czas1" value="" size="22" type="text">
<a href="javascript:show_calendar('document.form_cal_zloz.czas1', document.form_cal_zloz.czas1.value);"><img src="img/cal.gif" width="16" height="16" border="0" alt="Clicknij Tu by ustaliæ Datê"></a></td>
    </tr>
    <tr>
     <td><input value="Policz atak" type="submit"></td>
    </tr>
   </table>
  </td>
  <td align="center" valign ="top">
   <table>
    <tr><td>GRUPA <b>O</b>bronca</td></tr>
    <tr>
     <td>Nazwa* <input name="atakowany" value="" type="text"></td>
    </tr>
    <tr>
     <td>Typ Wsi*<select name="o_typ"><option value=""></option><?PHP for($licz=0; $licz<count($rodzaje); $licz++){echo'
                  <option value="'.$licz.'">'.$rodzaje[$licz].'</option>'; } ?></select></td>
    </tr>
    <tr>
     <td>Okolica* x|y <input name="o_oko" tabindex="1" maxlength="7" id="inputx" value="" size="6" type="text"></td>
    </tr>
   </table>
<td>
</form>
