<?PHP 
$statustyp= $status[typ];
function agresor($zap,$name){
echo'<TABLE border="1" class="vis"><caption>'.$name.'</caption>
<tr>
<td>Nazwa</td>
<td> X | Y </td>
<td>Punkty</td>
<td><span class="ataa"><input name="alla"  class="selectAata"  type="checkbox" onclick="selectAllata(this.form, this.checked)" >all</span></TD>
</tr>';

connection();
 $wynik1 = mysql_query($zap)or die('B��d zapytania');
while($r = mysql_fetch_array($wynik1))
{
  if($r[wolny]==0){destructor(); continue;}
   
echo'<tr class="nowrap units_moving">
<td><a href="javascript:popup_scroll(\'menu.php?id='.$r[id].'\',350,380)">'.$r[name].'</a></td>
<td>'. $r[x].'|'.$r[y].'</td>
<td>'.$r[points].'</td>
<td><span class="ata"><input name="ata[]" value="'.$r[id].'" type="checkbox"></span></td>
</TR>';
}
echo'</TABLE>';
destructor();}

function obronca($zap,$name)
{ 
global $statustyp;
echo'<TABLE border="1" class="vis"><caption>'.$name.'</caption>
<TR>
<TD>Nazwa</TD>
<TD> X | Y </TD>
<TD>Punkty</TD>
<TD><span class="atao"><input name="obr"  type="checkbox" onclick="selectAobr(this.form, this.checked)">all</span></TD>
<td>opis</td>
<td>Status</td></TR>';
connection();
$wynik2 = mysql_query($zap)or die('B��d zapytania');

while($p = mysql_fetch_array($wynik2)){
echo'<tr class="nowrap row_b">
<td><a href="javascript:popup_scroll(\'menu.php?id='.$p[id].'\',350,380)">'.$p[name].'</a></td>
<td>'.$p[x].'|'.$p[y].'</td>
<td>'.$p[points].'</td>
<td><span name="obr" class="obr"><input name="obr[]" value="'.$p[id].'" type="checkbox"></span></td>
<td>'.$p[opis].'</td>
<th>'.$statustyp[$p[status]].'</th></tr>';}
echo"</TABLE>";
       destructor();
}

$atakujacy=$_POST[agracz];
$zap1=" SELECT v.name, v.x, v.y, v.points, v.id ,wolny
FROM `village` v, tribe t
WHERE v.player = t.id ";
$d=0;
if( $atakujacy!=NULL){$zap1.=$and."t.name='$atakujacy' ";$d=1;}else{$d=0;}
if($_POST[a_typ]!=NULL){$zap1.=$and."v.typ='$_POST[a_typ]' ";$d=1;}else{/*Typ niema znaczenia*/}
if($_POST[a_oko]!=NULL&&$_POST[a_xy]!=NULL){$d=1;
$xy = explode("|", $_POST[a_xy]); $od_x=$xy[0]-$_POST[a_oko]; $do_x=$xy[0]+$_POST[a_oko]; $od_y=$xy[1]-$_POST[a_oko]; $do_y=$xy[1]+$_POST[a_oko];
$zap1.= "AND v.x>'$od_x'  AND v.y>'$od_y'  AND v.x<'$do_x'  AND v.y<'$do_y' ";}else{/*xy niema znaczenia*/}
$zap1.="ORDER BY `v`.`sz`,`v`.`name` ASC";

$zap2=" SELECT v.name, v.x, v.y, v.points,v.id, v.opis, v.status
FROM `village` v, tribe t
WHERE v.player = t.id 
";

if($_POST[plem_op]!=NULL){$zap2.=$and." t.ally='$_POST[plem_op]' ";$o=1;$o_name='Gracz <b>'.$_POST[plem_op].'</b>';}else            //cel plemie
if($_POST[ogracz]!=NULL){$zap2.=$and." t.name='$_POST[ogracz]' ";$o=1;$o_name='Plemie <b>'.($co_za_plemie[$_POST[ogracz]]).'</b>';}else                //cel wioska
if($_POST[xy]!=NULL){$xy = explode("|", $_POST[xy]);$zap2.=$and." v.x='$xy[0]' AND v.y='$xy[1]' ";$o=2;$o_name='Wioska <b>'.$_POST[xy].'</b>';}  //cel gracz

if($_POST[o_oko]!=NULL&&$_POST[o_xy]!=NULL&&$o!=2){$o=1;
$xy = explode("|", $_POST[o_xy]); $od_x=$xy[0]-$_POST[o_oko]; $do_x=$xy[0]+$_POST[o_oko]; $od_y=$xy[1]-$_POST[o_oko]; $do_y=$xy[1]+$_POST[o_oko];
$zap2.= " AND v.x>'$od_x'  AND v.y>'$od_y'  AND v.x<'$do_x'  AND v.y<'$do_y' ";
}
$zap2.="
 ORDER BY `v`.`name` ASC";

  /*
$_POST[o_oko];              //mapa okolica
$_POST[o_xy];               //mapa �rodek okolicy
$_POST[baza_r];             // raport istnieje

if($_POST[baza_r]==1){$zap2.= " AND v.data='$_POST[a_typ]' ";

   SELECT w.id AS id_wsi, w.x, w.y, p.id AS id_User, p.name, a.id AS id_plemie, a.tag, w.name, w.points, w.typ, w.data, w.mur,
   w.pik, w.mie, w.axe, w.luk, w.zw, w.lk, w.kl, w.ck, w.tar, w.kat, w.ry, w.sz, w.opis
FROM village w, tribe p, ally a
WHERE w.player = p.id
AND p.ally = a.id

$_POST[baza];

$atakujacy=$_POST[agracz];
$_POST[typ_a];             //rodzaj ataku
$_POST[a_oko];             //mapa agresor okolica
$_POST[a_xy];              //mapa agresor srodek okolicy

$_POST[plem_op];            //cel plemie
$_POST[xy];                 //cel wioska
$atakowany=$_POST[ogracz];  //cel gracz
$_POST[o_oko];              //mapa okolica
$_POST[o_xy];               //mapa �rodek okolicy
$_POST[baza_r];             // raport istnieje


$_POST[wojsko];             //rodzaj ataku (1) => info z bazy
$_POST[czas1];              //godzina ataku
$_POST[od_h];               //godzina wys�ania od
$_POST[do_h];               //godzina wys�ania do    

//Odbiera

baza=1
agracz=9oKesi
typ_a=1
a_oko=30
a_xy=610|737
ogracz=onasko
o_oko=30
o_xy=621|753
wojsko=9
czas1=17.03.2009+8%3A00%3A00
od_h=16
do_h=21

// Wysy�a

wojsko=9
czas=17.03.2009+8%3A00%3A00
od_h=16
do_h=21
ata[]=
obr[]=

all=on
*/
?>