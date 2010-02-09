<?PHP
$statustyp= $status[typ];
function agresor($zap,$name){
echo'<TABLE border="1" class="vis"><caption>'.urldecode($name).'</caption>
<tr>
<td>Nazwa</td>
<td> X | Y </td>
<td>Punkty</td>
<td><span class="ataa"><input name="alla"  class="selectAata"  type="checkbox" onclick="selectAllata(this.form, this.checked)" >all</span></TD>
</tr>';
//echo $zap;
connection();

 $wynik1 = mysql_query($zap)or die($zap.'B³±d zapytania');
while($r = mysql_fetch_array($wynik1))
{
$r[wolny]=jaki_czas_marszu($r[pik],$r[mie],$r[axe],$r[luk],$r[zw],$r[lk],$r[kl],$r[ck],$r[tar],$r[kat],$r[ry],$r[sz]);

  if($r[wolny]==0){destructor(); continue;}

echo'<tr class="nowrap units_moving">
<td><a href="javascript:popup_scroll(\'menu.php?id='.$r[id].'\',350,380)">'.urldecode($r[name]).'</a></td>
<td>'. $r[x].'|'.$r[y].'</td>
<td>'.$r[points].'</td>
<td><span class="ata"><input name="ata[]" value="'.$r[id].'" type="checkbox"></span></td>
</TR>';
}
echo'</TABLE>';
destructor();}

function obronca($zap,$name)
{
 global $statuss;
        echo'<TABLE border="1" class="vis"><caption>'.urldecode($name).'</caption>
        <TR>
        <TD>Nazwa</TD>
        <TD> X | Y </TD>
        <TD>Punkty</TD>
        <TD><span class="atao"><input name="obr"  type="checkbox" onclick="selectAobr(this.form, this.checked)">all</span></TD>
        <td>Status</td></TR>';
connection();
  $wynik2 = mysql_query($zap)or die('B³±d zapytania');
   while($p = mysql_fetch_array($wynik2))
   {
    echo'<tr class="nowrap row_b">
    <td><a href="javascript:popup_scroll(\'menu.php?id='.$p[id].'\',350,380)">'.urldecode($p[name]).'</a></td>
    <td>'.$p[x].'|'.$p[y].'</td>
    <td>'.$p[points].'</td>
    <td><span name="obr" class="obr"><input name="obr[]" value="'.$p[id].'" type="checkbox"></span></td>
    <th>'.$statuss[typ][$p[status]].'</th></tr>';
   }
destructor();
    echo"</TABLE>";
}

$atakujacy=urlencode($_POST[agracz]);
$zap1=" SELECT w.name, w.x, w.y, w.points, w.id,
   m.pik, m.mie, m.axe, m.luk, m.zw, m.lk, m.kl, m.ck, m.tar, m.kat, m.ry, m.sz
FROM `ws_all` w, list_user t, ws_mobile m
       
WHERE w.player = t.id AND m.id=w.id";
$d=0;
   if( $atakujacy!=NULL)
    {$zap1.=$and."(t.name='$atakujacy' OR  t.name='".$_POST[agracz]."')";  $d=1;}else{$d=0;}
   if($_POST[typ_a]!=NULL)
    {$zap1.=$and."m.typ='$_POST[typ_a]' ";  $d=1;}else{/*Typ niema znaczenia*/}
   if($_POST[a_oko]!=NULL&&$_POST[a_xy]!=NULL)
    {$d=1;
     $xy = explode("|", $_POST[a_xy]);
     $od_x=$xy[0]-$_POST[a_oko];
     $do_x=$xy[0]+$_POST[a_oko];
     $od_y=$xy[1]-$_POST[a_oko];
     $do_y=$xy[1]+$_POST[a_oko];
   $zap1.= "AND w.x>'$od_x'  AND w.y>'$od_y'  AND w.x<'$do_x'  AND w.y<'$do_y' ";
    }else{/*xy niema znaczenia*/}
  if($_POST[wojsko]!=NULL)
   {
     switch ($_POST[wojsko])
     {
      case 0:
              break;
      case 9:
             $zap1.=' AND m.zw >0';
              break;
      case 10:
             $zap1.=' AND (m.lk >0 OR m.kl>0)';
              break;
      case 11:
             $zap1.=' AND m.CK >0';
              break;
      case 18:
             $zap1.=' AND (m.pik >0 OR m.axe>0 OR m.luk>0)';
              break;
      case 22:
             $zap1.=' AND (m.mie >0 )';
              break;
      case 30:
             $zap1.=' AND (m.tar >0 OR m.kat>0)';
              break;
      case 35:
             $zap1.=' AND (m.sz >0)';
              break;
     default:
              break;
     }
   }


   $zap1.="ORDER BY `w`.`name` ASC";

$zap2=" SELECT w.name, w.x, w.y, w.points,w.id, r.status
FROM `ws_all` w, list_user t
      LEFT JOIN ws_raport r
       ON r.id=w.id
WHERE w.player = t.id
AND w.points >5000 
";

    if($_POST[plem_op]!=NULL)
        {$zap2.=$and." t.ally='$_POST[plem_op]' ";$o=1;$o_name='Gracz <b>'.$_POST[plem_op].'</b>';}else            //cel plemie
    if($_POST[ogracz]!=NULL)
        {$zap2.=$and." t.name='".urlencode($_POST[ogracz])."' ";
         $o=1;
         $o_name='Plemie <b>'.($co_za_plemie[$_POST[ogracz]]).'</b>';
        }else                //cel wioska
             if($_POST[xy]!=NULL)
               {$xy = explode("|", $_POST[xy]);
                $zap2.=$and." w.x='$xy[0]' AND w.y='$xy[1]' ";
                 $o=2;
                $o_name='Wioska <b>'.$_POST[xy].'</b>';
               }  //cel gracz

    if($_POST[o_oko]!=NULL&&$_POST[o_xy]!=NULL&&$o!=2)
       {$o=1;
        $xy = explode("|", $_POST[o_xy]);
        $od_x=$xy[0]-$_POST[o_oko];
        $do_x=$xy[0]+$_POST[o_oko];
        $od_y=$xy[1]-$_POST[o_oko];
        $do_y=$xy[1]+$_POST[o_oko];
      $zap2.= " AND w.x>'$od_x'  AND w.y>'$od_y'  AND w.x<'$do_x'  AND w.y<'$do_y' ";
       }
  $zap2.="
 ORDER BY `w`.`name` ASC";

  /*
$_POST[o_oko];              //mapa okolica
$_POST[o_xy];               //mapa ¶rodek okolicy
$_POST[baza_r];             // raport istnieje

if($_POST[baza_r]==1){$zap2.= " AND v.data='$_POST[a_typ]' ";

   SELECT w.id AS id_wsi, w.x, w.y, p.id AS id_User, p.name, a.id AS id_plemie, a.tag, w.name, w.points, m.typ, m.data,
   m.pik, m.mie, m.axe, m.luk, m.zw, m.lk, m.kl, m.ck, m.tar, m.kat, m.ry, m.sz
FROM ws_all w, list_user p, list_plemie a
LEFT JOIN ws_mobile m ON m.id=w.id
WHERE w.player = p.id
AND p.ally = a.id

$_POST[baza];

$atakujacy=urlencode($_POST[agracz]);
$_POST[typ_a];             //rodzaj ataku
$_POST[a_oko];             //mapa agresor okolica
$_POST[a_xy];              //mapa agresor srodek okolicy

$_POST[plem_op];            //cel plemie
$_POST[xy];                 //cel wioska
$atakowany=$_POST[ogracz];  //cel gracz
$_POST[o_oko];              //mapa okolica
$_POST[o_xy];               //mapa ¶rodek okolicy
$_POST[baza_r];             // raport istnieje


$_POST[wojsko];             //rodzaj ataku (1) => info z bazy
$_POST[czas1];              //godzina ataku
$_POST[od_h];               //godzina wys³ania od
$_POST[do_h];               //godzina wys³ania do

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

// Wysy³a

wojsko=9
czas=17.03.2009+8%3A00%3A00
od_h=16
do_h=21
ata[]=
obr[]=

all=on
*/
?>