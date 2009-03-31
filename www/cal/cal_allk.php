      <table>
      <form name="form_cal_allk" enctype="multipart/form-data" action="cal/Allkena.php" method="post" target="prawy">
       <tr>
        <td>
         <table>
          <tr><td>Grupa Agresor</td></tr>
          <tr><td>Gracz <input name="gracz" size="10" alt="" value="" type="text"></td></tr>
          <tr><td>okolica <input name="xy_okolica" maxlength="7" size="8" alt="" value="" type="text"></td></tr>
         </table>
        </td>
        <td>
         <table>
          <tr><td align="center">Rodzaj ataku</td></tr>
          <tr><td align="center">
              <select name="cos"><?PHP for($licz=0; $licz<count($rodzaje); $licz++){echo'
                  <option value="'.$w_tepm[$licz].'">'.$w_typ[$licz].' '.$w_tepm[$licz].'</option>'; } ?>
              </select></td>
          </tr>
          <tr><td align="center">Czas Dotarcia</td></tr>
          <tr><td align="center"><input name="czas1" value="" size="18" type="text">
<a href="javascript:show_calendar('document.form_cal_allk.czas1', document.form_cal_allk.czas1.value);"><img src="img/cal.gif" width="16" height="16" border="0" alt="Clicknij Tu by ustaliæ Datê"></a> 
</td></tr>
          <tr><td align="center"><input value="Policz atak" type="submit"></td></tr>
         </table>
        </td>
        <td>
         <table>
          <tr><td>Wioska Obroncy </td></tr>
          <tr><td>x|y <input name="xy_wsi" maxlength="7" size="10" alt="" value="" type="text"></td></tr>
         </table>
        </td>
       </tr>
      </form>
      </table>