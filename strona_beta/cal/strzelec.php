<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
  <meta name="Description" content="[ Opis dokumentu ]" />
  <meta name="Author" content="[ Autor dokumentu ]" />
  <meta name="Generator" content="EdHTML" />
  <title>[ Tytul dokumentu ]</title>
</head>
<body>
Radar to kalkulator który znajduje wioski jakie możesz atakować w momencie jego używania,<br />
znajduje on tylko takie do których atak dotrze o podanej godzinie <br />
Idealny do puszczania fejków, albo ataków zalewowych.<br />
                           <br /><form enctype="multipart/form-data" action="" method="post">
  <table>
    <tr>
      <td>Twoja wioska xxx | yyy </td><td><input type="text" name="xy_wsi" maxlength="7" size="10" alt=""value="<?PHP
 if($_POST[xy_wsi]==NULL){echo'';}else{echo $_POST[xy_wsi];} ?>"><BR /></td>
    </tr>
    <tr>
      <td>Gracz którego atakujesz </td><td><input type="text" name="gracz" size="10" alt=""  value="<?PHP
 if($_POST[gracz]==NULL){echo'';}else{echo $_POST[gracz];} ?>"></td>
    </tr>
    <tr>

      <td>Okolica którą atakujesz xxx | yyy </td><td><input type="text" name="xy_okolica" maxlength="7" size="10" alt="" value="<?PHP
 if($_POST[xy_okolica]==NULL){echo'';}else{echo $_POST[xy_okolica];} 
?>"></td>
    </tr>
    <tr>
      <td>Data ataku </td><td><input type="text" name="data" maxlength="10" size="10" alt="" value="<?PHP
 if($_POST[data]==NULL){echo date("Y-m-d");}else{echo $_POST[data];} ?>"></td>
    </tr>
    <tr>
      <td>Godzina ataku </td><td><input type="text" name="godz" maxlength="8" size="10" alt="" value="<?PHP
 if($_POST[godz]==NULL){echo date("G:i:s");}else{echo $_POST[godz];} ?>"></td>

    </tr>
    <tr>
      <td>Atak </td><td><select name="cos">
            <option value="18">Pik/ Top/ Łuk 18</option>
            <option value="22">Miecznik 22</option>
            <option value="9" >Zwiadowca 9</option>
            <option value="10">Kawaleria 10</option>
            <option value="11">Ciężki Kawalerzysta 11</option>
            <option value="30">Tar/ Kat 30</option>
            <option value="35">Szlachcic 35</option>
          </select></td>
    </tr>
  </table>Atak na ZP? <input id="zpp" name="zpp" value="1" type="radio">
<input value="Dalej" type="submit"></form>
</body>
</html>

<?PHP
if($_POST!=NULL)
{
$p=" AND ";
$zap=" SELECT  v.name AS n_wsi, v.id AS id_wsi,v.mur, 
v.x,v.y,v.points,v.opis,v.typ,v.data,
v.pik,v.mie,v.axe,v.luk,v.zw,v.lk,v.kl,v.ck,v.tar,v.kat,v.ry,v.sz,
t.name AS gracz,t.id AS g_id
  FROM `village` v, tribe t
WHERE v.player = t.id ";
if($_POST[zpp]==1){$zap.="AND t.ally =4469 ";}

$cos = $_POST[cos];
$gracz = $_POST[gracz];
$xy_ag = explode("|",$_POST[xy_wsi]);   $xy_ob = explode("|",$_POST[xy_okolica]);

$data = explode("-",$_POST[data]);      $godz = explode(":",$_POST[godz]);

$odx= $xy_ob[0]-20;          $dox= $xy_ob[0]+20;
$ody= $xy_ob[1]-20;          $doy= $xy_ob[1]+20;

$mkczas = mktime($godz[0],$godz[1],$godz[2],$data[1],$data[2],$data[0]);
$mk_ruznica = $mkczas-mktime();                                          // ile czasu ma wojsko na marsz...

$odzc = $mk_ruznica/($_POST[cos]*60);                       // Odległosc policzona z czasu
 $ggg= 300 /($_POST[cos]*60);
                               // 300 = 5 min - margines
echo 'Przy prdkosci '.$_POST[cos].' <b>Odległość </b>wynosi  <b>'.$odzc.'<HR>';

echo'<TABLE border="0" class="vis"><tr>
<Th>X|Y</Th><td>=></td><td>Odleglosc</td> 
<Th>Gracz</Th>
<Th>Nazwa</Th>
<Th>Punkty</Th>
<Th>Typ wioski</Th>
<Th>Data</Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/buildings/wall.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_spear.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_sword.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_axe.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_archer.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_spy.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_light.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_marcher.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_heavy.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_ram.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_catapult.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_knight.png"></Th>
<Th><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_snob.png"></Th>
<Th>Opis</Th>
</tr>';



 if($_POST[gracz]!=NULL){ $zap.=$p." t.name='$_POST[gracz]' ";}
 if($_POST[xy_okolica]!=NULL){
$zap.=$p."v.x>'$odx'
      AND v.x<'$dox'
      AND v.y>'$ody'
      AND v.y<'$doy' ";}

connection();
$wynik = @mysql_query($zap);
while($r = mysql_fetch_array($wynik))
{
$odleglosc=sqrt(potega($xy_ag[0]-$r[x],2)+potega($xy_ag[1]-$r[y],2));
   if($odzc-$ggg<$odleglosc && $odleglosc<$odzc+$ggg )
                       {$jest=1;
if($ab==1){$ab_c='a';$ab=0;}else{$ab_c='b';$ab=1;}
echo'<tr style="white-space: nowrap;" class="nowrap row_'.$ab_c.'">';

echo'  
       <TD><b>'.$r[x].'|'.$r[y].'</b></TD>
       <Th></Th><Th>'.$odleglosc.'</Th>
       <TD>'.$r[gracz].'</TD>
<TD><a href="javascript:popup_scroll(\'edyt/menu.php?id='.$r[id_wsi].'\',310,290)">'.$r[n_wsi].'</a></TD>
<TD class="hidden">'.$r[points].'</TD>
<TD>'.$rodzaje[$r[typ]].'</TD>
<TD>';
    if($r[data]==Null){
     echo'<IMG SRC="http://pl5.plemiona.pl/graphic/overview/prod_impossible.png" title="Nie ma raportu">';}
elseif($r[data]=='0000-00-00'){
     echo'<IMG SRC="http://pl5.plemiona.pl/graphic/overview/prod_avail.png" title="Data nie zapisana">';}
elseif($r[data]!='0000-00-00'){
     echo'<IMG SRC="http://pl5.plemiona.pl/graphic/overview/prod_running.png" title="Raport w bazie">';}

echo $r[data].'</TD>
<TD>'.$r[mur].'</TD>
<TD>'.$r[pik].'</TD>
<TD>'.$r[mie].'</TD>
<TD>'.$r[axe].'</TD>
<TD>'.$r[luk].'</TD>
<TD>'.$r[zw].'</TD>
<TD>'.$r[lk].'</TD>
<TD>'.$r[kl].'</TD>
<TD>'.$r[ck].'</TD>
<TD>'.$r[tar].'</TD>
<TD>'.$r[kat].'</TD>
<TD>'.$r[ry].'</TD>
<TD>'.$r[sz].'</TD>
<TD>'.$r[opis].'</TD>
</tr>'; }
}
if($jest!=1){echo'<tr><Th colspan="22"><br /><br /></th></tr>';
echo'<tr><Td colspan="22">Na obecną chwile niema wiosek które możesz zaatakować, spróbuj za 10 min</Td></tr>';}   
}



?>