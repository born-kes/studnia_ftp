<?PHP
if(isSet($_GET[usun])){ connection();    $wynik = mysql_query("DELETE FROM color WHERE id_color='$_GET[usun]' AND users='$id' ");  destructor();}
if($_POST[zmiana]!=NULL && isSet($_POST[color_picker_b]) && isSet($_POST[color_picker_g]) && isSet($_POST[color_picker_r]) ){
connection();  $wynik = mysql_query("UPDATE color SET r='$_POST[color_picker_r]', g='$_POST[color_picker_g]', b='$_POST[color_picker_b]'
WHERE id_color='$_POST[zmiana]' ");  destructor();}
if(isSet($_POST[color_picker_b]) && isSet($_POST[color_picker_g]) && isSet($_POST[color_picker_r]) && $_POST[gracz]!=NULL ){
$c_b=$_POST[color_picker_b];  $c_g=$_POST[color_picker_g];  $c_r=$_POST[color_picker_r];
connection(); $wynik = mysql_query("SELECT p.id FROM tribe p WHERE p.name = '$_POST[gracz]'")or die('Blad zapytania');
if($r = mysql_fetch_array($wynik)){$tribe = $r[0];}else{echo "Nie znaleziono gracza".$_POST[gracz];} destructor();
connection(); $wynik = mysql_query("INSERT INTO color values('','$id','$tribe','$c_r','$c_g','$c_b');"); destructor();}
?>
<table>
 <tr>
  <td valign="top">
   <table border="0">
   <caption>Lista graczy</caption>
<?PHP $r_jest=0;  connection();
$wynik = mysql_query("SELECT c.*, p.name FROM tribe p, color c  WHERE c.users = '$id' AND c.tribe_id =p.id ")or die('Blad zapytania');
      while($r = mysql_fetch_array($wynik))
            {
            if($r_jest==7||$r_jest==14||$r_jest==21){echo'
   </table>
  </td>
  <td valign="top">
   <table border="0">
   <caption>Lista graczy</caption>';} $r_jest++;  echo '
    <tr>
     <td width="30" style="background-color:rgb('.$r[r].', '.$r[g].', '.$r[b].')"></td>
     <td>'.$r[name].'</td>
     <td><a href="javascript:zmiana(\''.$r[id_color].'\',\''.$r[name].'\');" >zmien</a></td>
     <td>/&nbsp;<a href="?m=0&usun='.$r[id_color].'">usun</a></td>
    </tr>'; }
destructor();
if(!$r_jest>0){echo'
    <tr>
     <td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;Lista jest Pusta&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>';}  ?>
   </table>
  </td>
  <td valign="top">
   <table border="0">
   <caption id="caps">Nowy Gracz</caption>
   <form action="" method="POST">
    <tr>
     <td>Gracz <input type="hidden" name="zmiana" id="zmiana" value=""></td>
     <td><input type="text" name="gracz" id="gracz" value=""></td>
     <td id="color" width="30"><a href="javascript:show_color_picker()">kolor</td>
     <td><input id="c_dalej" type="submit" value="Dodaj" /></td>
     <td>&nbsp;</td>
    </tr>
    <tr>
     <td colspan="5">
      <table id="color_picker" style="border-spacing:0px; display:none">
       <tr>
        <td>czerwony:</td>
        <td><input value="0" name="color_picker_r" id="color_picker_r" style="font-size:10px;" onchange="color_picker_change()" onkeyup="color_picker_change()" size="4" type="text" /></td>
        <td style="background-color:rgb(0,0,0); background-image:none" width="15" onclick="color_picker_choose(0,0,0)">&nbsp;</td>
        <td style="background-color:rgb(0,0,127); background-image:none" width="15" onclick="color_picker_choose(0,0,127)">&nbsp;</td>
        <td style="background-color:rgb(0,0,254); background-image:none" width="15" onclick="color_picker_choose(0,0,254)">&nbsp;</td>
        <td style="background-color:rgb(0,127,0); background-image:none" width="15" onclick="color_picker_choose(0,127,0)">&nbsp;</td>
        <td style="background-color:rgb(0,127,127); background-image:none" width="15" onclick="color_picker_choose(0,127,127)">&nbsp;</td>
        <td style="background-color:rgb(0,127,254); background-image:none" width="15" onclick="color_picker_choose(0,127,254)">&nbsp;</td>
        <td style="background-color:rgb(0,254,0); background-image:none" width="15" onclick="color_picker_choose(0,254,0)">&nbsp;</td>
        <td style="background-color:rgb(0,254,127); background-image:none" width="15" onclick="color_picker_choose(0,254,127)">&nbsp;</td>
        <td style="background-color:rgb(0,254,254); background-image:none" width="15" onclick="color_picker_choose(0,254,254)">&nbsp;</td>
       </tr>
       <tr>
        <td>zielony:</td>
        <td><input value="0" name="color_picker_g" id="color_picker_g" style="font-size:10px;" onchange="color_picker_change()" onkeyup="color_picker_change()" size="4" type="text" /></td>
        <td style="background-color:rgb(127,0,0); background-image:none" width="15" onclick="color_picker_choose(127,0,0)">&nbsp;</td>
        <td style="background-color:rgb(127,0,127); background-image:none" width="15" onclick="color_picker_choose(127,0,127)">&nbsp;</td>
        <td style="background-color:rgb(127,0,254); background-image:none" width="15" onclick="color_picker_choose(127,0,254)">&nbsp;</td>
        <td style="background-color:rgb(127,127,0); background-image:none" width="15" onclick="color_picker_choose(127,127,0)">&nbsp;</td>
        <td style="background-color:rgb(127,127,127); background-image:none" width="15" onclick="color_picker_choose(127,127,127)">&nbsp;</td>
        <td style="background-color:rgb(127,127,254); background-image:none" width="15" onclick="color_picker_choose(127,127,254)">&nbsp;</td>
        <td style="background-color:rgb(127,254,0); background-image:none" width="15" onclick="color_picker_choose(127,254,0)">&nbsp;</td>
        <td style="background-color:rgb(127,254,127); background-image:none" width="15" onclick="color_picker_choose(127,254,127)">&nbsp;</td>
        <td style="background-color:rgb(127,254,254); background-image:none" width="15" onclick="color_picker_choose(127,254,254)">&nbsp;</td>
       </tr>
       <tr>
        <td>niebieski:</td>
        <td><input value="0" name="color_picker_b" id="color_picker_b" style="font-size:10px;" onchange="color_picker_change()" onkeyup="color_picker_change()" size="4" type="text" /></td>
        <td style="background-color:rgb(254,0,0); background-image:none" width="15" onclick="color_picker_choose(254,0,0)">&nbsp;</td>
        <td style="background-color:rgb(254,0,127); background-image:none" width="15" onclick="color_picker_choose(254,0,127)">&nbsp;</td>
        <td style="background-color:rgb(254,0,254); background-image:none" width="15" onclick="color_picker_choose(254,0,254)">&nbsp;</td>
        <td style="background-color:rgb(254,127,0); background-image:none" width="15" onclick="color_picker_choose(254,127,0)">&nbsp;</td>
        <td style="background-color:rgb(254,127,127); background-image:none" width="15" onclick="color_picker_choose(254,127,127)">&nbsp;</td>
        <td style="background-color:rgb(254,127,254); background-image:none" width="15" onclick="color_picker_choose(254,127,254)">&nbsp;</td>
        <td style="background-color:rgb(254,254,0); background-image:none" width="15" onclick="color_picker_choose(254,254,0)">&nbsp;</td>
        <td style="background-color:rgb(254,254,127); background-image:none" width="15" onclick="color_picker_choose(254,254,127)">&nbsp;</td>
        <td style="background-color:rgb(254,254,254); background-image:none" width="15" onclick="color_picker_choose(254,254,254)">&nbsp;</td>
       </tr>
      </table>
     </td>
    </tr>
   </form>
   </table>
  </td>
 </tr>
</table>