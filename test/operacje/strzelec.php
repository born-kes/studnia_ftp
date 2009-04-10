<?php
  include('../connection.php'); ?>
<html><head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="stamm.css">
<script src="../mootools.js" type="text/javascript"></script>
<script src="../scriptt.js" type="text/javascript"></script>
</head>
<body><br /><?PHP
if($_POST!=NULL)
{
$cos = $_POST[wojsko];
$oko = $_POST[_oko];
$gracz = $_POST[gracz];
$xy_ag = explode("|",$_POST[xy]);
$xy_ob = explode("|",$_POST[_xy]);
$odx= $xy_ob[0]-$oko;          $dox= $xy_ob[0]+$oko;
$ody= $xy_ob[1]-$oko;          $doy= $xy_ob[1]+$oko;

$p=" AND ";
$zap= zap_raport();

 if($gracz!=NULL){ $zap.=$p." t.name='$gracz' ";}
 if($_POST[_oko]!=NULL){
$zap.=$p."v.x>'$odx'
      AND v.x<'$dox'
      AND v.y>'$ody'
      AND v.y<'$doy' ";}

$mk_ruznica = mkczas_pl($_POST[czas1])-mktime();                                          // ile czasu ma wojsko na marsz...
$odzc = $mk_ruznica/($cos*60);                       // Odleg³osc policzona z czasu
 $ggg= 300 /($cos*60);
                               // 300 = 5 min - margines
echo 'Przy prdkosci '.$cos.' <b>Odleglosc </b>wynosi  <b>'.$odzc.'<HR>';

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
<Th>Opis</Th>';
if($_POST[on]==0){echo '<td>wyslij o godzinie</td>';}
echo'</tr>';

connection();
$wynik = @mysql_query($zap);
while($r = mysql_fetch_array($wynik))
{     $odleglosc=sqrt(potega($xy_ag[0]-$r[x],2)+potega($xy_ag[1]-$r[y],2));

   if(($odzc-$ggg<$odleglosc||$_POST[on]==0) && $odleglosc<$odzc+$ggg )
                       {$jest=1;
if($ab==1){$ab_c='a';$ab=0;}else{$ab_c='b';$ab=1;}
echo'<tr style="white-space: nowrap;" class="nowrap row_'.$ab_c.'">';

echo'
       <TD><b>'.$r[x].'|'.$r[y].'</b></TD>
       <Th></Th><Th>'.$odleglosc.'</Th>
       <TD>'.$r[gracz].'</TD>
<TD><a href="javascript:popup_scroll(\'menu.php?id='.$r[id_wsi].'\',310,290)">'.$r[n_wsi].'</a></TD>
<TD class="hidden">'.$r[points].'</TD>
<TD>'.$rodzaje[$r[typ]].'</TD>
<TD>';
    if($r[data]==Null){
     echo'<IMG SRC="http://pl5.plemiona.pl/graphic/overview/prod_impossible.png" title="Nie ma raportu">Brak Raportu';}
elseif($r[data]<$godzina_jeden && $r[data]<$godzina_jeden-518400 ){
     echo'<IMG SRC="http://pl5.plemiona.pl/graphic/overview/prod_avail.png" title="Data nie zapisana">'.data_z_bazy($r[data]);}
elseif($r[data]<$godzina_jeden && $r[data]>$godzina_jeden-518400 ){
     echo'<IMG SRC="http://pl5.plemiona.pl/graphic/dots/yellow.png" title="Data nie zapisana">'.data_z_bazy($r[data]);}
elseif($r[data]>$godzina_jeden){
     echo'<IMG SRC="http://pl5.plemiona.pl/graphic/dots/red.png" title="Raport w bazie">'.data_z_bazy($r[data]);}

echo '</TD>
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
<TD>'.$r[opis].'</TD>';
if($_POST[on]==0){echo '<th>'.date("d.m.y G:i:s",mkczas_pl($_POST[czas1])-($odleglosc*($cos*60))).'</th>';}
echo'</tr>'; }
}
if($jest!=1){echo'<tr><Th colspan="22"><br /><br /></th></tr>';
echo'<tr><Td colspan="22">Na obecn± chwile niema wiosek które mo¿esz zaatakowaæ, spróbuj za 10 min</Td></tr>';}
}



?>