<table align="center" valign ="top">
<form name="form_cal_rad" enctype="multipart/form-data" action="cal/strzelec.php" method="post" target="prawy">
       <tr>
        <td valign ="top">
          <table>
            <tr><td>Wioska Agresor</td></tr>
            <tr><td>x|y <input name="xy_wsi" maxlength="7" size="8" alt="" value="" type="text"></td></tr>
          </table>
        </td>
        <td valign ="top">
         <table>
          <tr><td align="center"><small>Rodzaj ataku</small></td></tr>
          <tr><td align="center">
              <select name="cos"><?PHP for($licz=0; $licz<count($rodzaje); $licz++){echo'
                  <option value="'.$w_tepm[$licz].'">'.$w_typ[$licz].' '.$w_tepm[$licz].'</option>'; } ?>
              </select></td></tr>
          <tr><td align="center"><small>Czas Dotarcia</small></td></tr>
          <tr><td align="center"><input name="czas1" value="" size="18" type="text">
<a href="javascript:show_calendar('document.form_cal_rad.czas1', document.form_cal_rad.czas1.value);"><img src="img/cal.gif" width="16" height="16" border="0" alt="Clicknij Tu by ustaliæ Datê"></a></td></tr>
          <tr><td align="center"><input value="Policz atak" type="submit"></td></tr>
         </table>
        </td>
        <td valign ="top">
         <table>
          <tr><td>Grupa Obronca </td></tr>
          <tr><td>Gracz* <input name="gracz" size="10" alt="" value="" type="text"></td></tr>
          <tr><td>Okolica* <input name="xy_okolica" maxlength="7" size="10" alt="" value="" type="text"></td></tr>
         </table>
        </td>
       </tr></form>
      </table>