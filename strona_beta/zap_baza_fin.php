<?php
$p=" AND ";
$zap=" SELECT  v.name AS n_wsi, v.id AS id_wsi,v.mur,
v.x,v.y,v.points,v.opis,v.typ,v.data,v.pik,v.mie,v.axe,v.luk,v.zw,v.lk,v.kl,v.ck,v.tar,v.kat,v.ry,v.sz,
t.name AS gracz,t.id AS g_id
  FROM `village` v, tribe t
WHERE v.player = t.id ";

if($_POST[szukajxy]!=NULL && $_POST[x]!=NULL && $_POST[y]!=NULL){
$zap.=" AND v.x='$_POST[x]'
  AND v.y='$_POST[y]'";}

if($gracz=$_POST[gracz]){

$zap.=$p."t.name='$gracz'
ORDER BY v.y, v.x ASC";                    //#################v.name
}elseif($oko=$_POST[okolica]){
         if($_POST[zp]==1){$zp='AND t.ally=4469';}else{$zp='';}

 $od_x=$_POST[x]-$oko;
 $od_y=$_POST[y]-$oko;
 $do_x=$_POST[x]+$oko;
 $do_y=$_POST[y]+$oko;
 if($_POST[plem_op]!=NULL){ $zap.=$p."t.ally=".$_POST[plem_op];}
$zap.=" AND v.x>'$od_x'
  AND v.y>'$od_y'
  AND v.x<'$do_x'
  AND v.y<'$do_y'
  $zp";
  $zap.=" ORDER BY v.x AND v.y ";
  }else{
if($_POST[x_z1]!=NULL&&$_POST[x1]!=NULL){ $zap.=$p."v.x".$_POST[x_z1].$_POST[x1];}
if($_POST[x_z2]!=NULL&&$_POST[x2]!=NULL){ $zap.=$p."v.x".$_POST[x_z2].$_POST[x2];}
if($_POST[y_z1]!=NULL&&$_POST[y1]!=NULL){ $zap.=$p."v.y".$_POST[y_z1].$_POST[y1];}
if($_POST[y_z2]!=NULL&&$_POST[y2]!=NULL){ $zap.=$p."v.y".$_POST[y_z2].$_POST[y2];}
if($_POST[d_z1]!=NULL&&$_POST[d1]!=NULL){ $zap.=$p."v.data".$_POST[d_z1].$_POST[d1];}
if($_POST[d_z2]!=NULL&&$_POST[d2]!=NULL){ $zap.=$p."v.data".$_POST[d_z2].$_POST[d2];}
if($_POST[w_op]!=NULL&&$_POST[w_z1]!=NULL&&$_POST[w_z2]!=NULL){ $zap.=$p.$_POST[w_op].$_POST[w_z1].$_POST[w_z2];}
if($_POST[pkt_z1]!=NULL&&$_POST[pkt1]!=NULL){ $zap.=$p."v.points".$_POST[pkt_z1].$_POST[pkt1];}
if($_POST[pkt_z2]!=NULL&&$_POST[pkt2]!=NULL){ $zap.=$p."v.points".$_POST[pkt_z2].$_POST[pkt2];}
if($_POST[n_gracz]!=NULL){ $zap.=$p."t.name='".$_POST[n_gracz]."'";}
if($_POST[n_wsi]!=NULL){ $zap.=$p."v.name='".urlencode($_POST[n_wsi])."'";}
if($_POST[plem_op]!=NULL){ $zap.=$p."t.ally=".$_POST[plem_op];}
if($_POST[n_typ]!=NULL&&$_POST[n_typ]!=0){ $zap.=$p."v.typ=".$_POST[n_typ];}
elseif($_POST[n_typ]!=NULL&&$_POST[n_typ]===0){ $zap.=" AND v.typ=0 OR v.typ IS NULL ";} 

if($_POST[wo_gracz]!=NULL&&$_POST[wo_gracz]==0){$zap.=$p." t.id=0";}
elseif($_POST[wo_gracz]!=NULL&&$_POST[wo_gracz]==1){$zap.=$p." t.id!=0";}
if($_POST[wo_plemie]!=NULL&&$_POST[wo_plemie]==0){$zap.=$p."t.ally=0";}
elseif($_POST[wo_plemie]!=NULL&&$_POST[wo_plemie]==1){$zap.=$p." t.ally!=0";}
if($_POST[wo_opis]!=NULL&&$_POST[wo_opis]==0){$zap.=$p." v.opis is NULL";}
elseif($_POST[wo_opis]!=NULL&&$_POST[wo_opis]==1){$zap.=$p." v.opis is NOT NULL";}
if($_POST[wo_typ]!=NULL&&$_POST[wo_typ]==0){$zap.=$p." typ is NULL";}
elseif($_POST[wo_typ]!=NULL&&$_POST[wo_typ]==1){$zap.=$p." v.typ is NOT NULL";}
if($_POST[wo_mur]!=NULL&&$_POST[wo_mur]==0){$zap.=$p." v.mur is NULL";}
elseif($_POST[wo_mur]!=NULL&&$_POST[wo_mur]==1){$zap.=$p." v.mur is NOT NULL";}
if($_POST[wo_ra]!=NULL&&$_POST[wo_ra]==0){$zap.=$p." v.data is NULL";}
elseif($_POST[wo_ra]!=NULL&&$_POST[wo_ra]==1){$zap.=$p." v.data is not NULL";}
   $zap.=" ORDER BY v.x AND v.y ";}
//echo($zap);
//foreach($_POST as $pos => $v){echo $pos."|".$v."|".$pos[$v]."<br>";}



echo'<TABLE border="0" class="vis"><tr>
<Th>Gracz</Th>
<Th>Nazwa</Th>
<Th>X|Y</Th>
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
connection();
$wynik = @mysql_query($zap);

while($r = mysql_fetch_array($wynik)){
if($ab==1){$ab_c='a';$ab=0;}else{$ab_c='b';$ab=1;}
echo'<tr style="white-space: nowrap;" class="nowrap row_'.$ab_c.'">';
echo'<TD>'.$r[gracz].'</TD>
<TD><a href="javascript:popup_scroll(\'edyt/menu.php?id='.$r[id_wsi].'\',310,290)">'.$r[n_wsi].'</a></TD>
<TD>'.$r[x].'|'.$r[y].'</TD>
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
</tr>'; } destructor();
echo'</TABLE>';
?>