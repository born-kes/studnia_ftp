<?PHP
$p=" , ";
include_once(dirname(dirname(__FILE__)) . '/connection.php');
if($_POST[n_typ]==NULL){
echo'<form name="form" action="" method="post" target="ramka">
<table border="1" cellspacing="1" cellpadding="2" bgcolor="#00aa66" align="center">
<caption>Filtr wiosek - typ</caption>
<TR><td>Wybierz Typ/Grupe do jakiej naleza wioski
     <SELECT name="n_typ" ><option value=""></option>';
         for($licz=0; $licz<count($rodzaje); $licz++)
        {      echo'<option value="'.$licz.'">'.$rodzaje[$licz].'</option>';}
echo'</SELECT></td>
</TR>
<TR><TD  align="center"><textarea id="query" name="query" rows="8" cols="80%"></textarea></TD></TR>	
<TR><TD align="center"><input type="submit" value="Konwertuj" style="margin-top: 5px;"/></TD></TR>
</table></form>';
 exit(); 
}
$text = $_POST[query];
$text1 = str_replace("\t",' ', $text);
$text2 = str_replace("  ",' ', $text1);
$lis = explode("\n",$text2);

?><form name="form" action="ed_typ.php" method="post" target="ramka">
<table align="center" style="border:0px;"><CAPTION align="top">Wybrales: <? echo '<input type="hidden" name="n_typ" value="'.$_POST[n_typ].'" />'.($rodzaje[$_POST[n_typ]]); ?></CAPTION>

<tr>
<td>NAZWA WSI</td>
<td>xxx|yyy</td>
<td><img src="http://pl5.plemiona.pl/graphic/unit/unit_spear.png" title="Pikinier" alt=""></td>
<td><img src="http://pl5.plemiona.pl/graphic/unit/unit_sword.png" title="Miecze" alt=""></td>
<td><img src="http://pl5.plemiona.pl/graphic/unit/unit_axe.png" title="Topory" alt=""></td>
<td><img src="http://pl5.plemiona.pl/graphic/unit/unit_spear.png" title="£uki" alt=""></td>
<td><img src="http://pl5.plemiona.pl/graphic/unit/unit_spy.png" title="Zwiad" alt=""></td>
<td><img src="http://pl5.plemiona.pl/graphic/unit/unit_light.png" title="Lekka Kawaleria" alt=""></td>
<td><img src="http://pl5.plemiona.pl/graphic/unit/unit_marcher.png" title="Konni £ucznicy" alt=""></td>
<td><img src="http://pl5.plemiona.pl/graphic/unit/unit_heavy.png" title="Ciezka Kawaleria" alt=""></td>
<td><img src="http://pl5.plemiona.pl/graphic/unit/unit_ram.png" title="Tarany" alt=""></td>
<td><img src="http://pl5.plemiona.pl/graphic/unit/unit_catapult.png" title="Katapulty" alt=""></td>
<td><img src="http://pl5.plemiona.pl/graphic/unit/unit_knight.png" title="rycerz" alt=""></td>
<td><img src="http://pl5.plemiona.pl/graphic/unit/unit_snob.png" title="Szlachcic" alt=""></td>
</tr>
<?PHP

	for($i=0; $i<count($lis); $i++)
            {$st_r=strrpos($lis[$i], "|"); $st_k=strrpos($lis[$i], ")");
              $wioska_xy =explode("|", substr($lis[$i] , $st_r-3 , 7 ));
              $wioska_wojo =explode(" ", substr($lis[$i] , $st_k));

  if($wioska_xy[0]==NULL && $wioska_xy[1]==NULL ){ echo'wystapil blont przy x|y wioski:'.$lis[$i]; exit(); }
  connection();
   $wynik = @mysql_query("SELECT id, name FROM village
                        WHERE `x`='$wioska_xy[0]' AND y='$wioska_xy[1]'");
 if($r = @mysql_fetch_array($wynik))
 {
echo '<tr>
<td><b>'.$r[name].'</b></td>
<td>'.$wioska_xy[0].'|'.$wioska_xy[1].'<input type="hidden" name="id[]" value="'.$r[id].'" /></td>
<td><input type="text" size="4" name="pik[]" value="'.$wioska_wojo[1].'" /></td>
<td><input type="text" size="4" name="mie[]" value="'.$wioska_wojo[2].'" /></td>
<td><input type="text" size="4" name="axe[]" value="'.$wioska_wojo[3].'" /></td>
<td><input type="text" size="4" name="luk[]" value="'.$wioska_wojo[4].'" /></td>
<td><input type="text" size="4" name="zw[]"  value="'.$wioska_wojo[5].'" /></td>
<td><input type="text" size="4" name="lk[]"  value="'.$wioska_wojo[6].'" /></td>
<td><input type="text" size="4" name="kl[]"  value="'.$wioska_wojo[7].'" /></td>
<td><input type="text" size="4" name="ck[]"  value="'.$wioska_wojo[8].'" /></td>
<td><input type="text" size="4" name="tar[]" value="'.$wioska_wojo[9].'" /></td>
<td><input type="text" size="4" name="kat[]" value="'.$wioska_wojo[10].'" /></td>
<td><input type="text" size="4" name="ry[]"  value="'.$wioska_wojo[11].'" /></td>
<td><input type="text" size="4" name="sz[]"  value="'.$wioska_wojo[12].'" /></td>
</tr> ';
 @destructor();
}
}echo'<tr />
<tr><td><input type="submit" value="Zgadza sie" style="margin-top: 5px;"/></td></tr>';
?>
</table>