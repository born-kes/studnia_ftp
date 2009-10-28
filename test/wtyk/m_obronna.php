<html><head>
<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2">
<link rel="stylesheet" type="text/css" href="../operacje/stamm.css">
<style type="text/css">
<!--

table.map div.lay4 { position: relative; left: 0px; top:-10px; margin-top:-26}

-->
</style>
</head><body>

<?php  include_once(dirname(dirname(__FILE__)) . '/connection.php');
 $moje_id=215516;

function map_color($id_gracz,$id_plemie)
{  global $moje_id;
if($id_gracz==0){return 'sz';}
elseif($id_gracz==$moje_id){ return 'ja';}

switch($id_plemie){
case 47716:
    return 'so';       //@~HW~@
case  48588:
   return 'po';       //NWO
case  51473:
   return 'po';       //TK
case  422:
   return 'aa';       //RedRub
case  4469:
   return 'aa';       //~ZP~
case  5416:
   return 'aa';       //JEJ
case  23185:
   return 'aa';       //-MAD-
case  23660:
   return 'aa';       //-BAE-
case  26084:
   return 'aa';       //ZCR
case  50650:
   return 'aa';       //SmAp
case  51091:
   return 'aa';       //NA
case  50811:
   return 'my';       //-SNRG-
//case 0:
//break;
default:
   return 'in';          // inne
break;             }
}
if($_GET[x]==NULL&&$_GET[y]==NULL){
echo'<table border="1" align="center"><TR><TD align="center">';

echo'<b>Witam w Generatorze Mapy Klasycznej</b><br><br>
Jaka okolica cie interesuje? <br><br>
<FORM NAME ACTION=""  METHOD="GET">
x: <input name="x" tabindex="13" id="inputx" value="" size="5" onkeyup="xProcess(\'inputx\', \'inputy\')" type="text">
y: <input name="y" tabindex="14" id="inputy" value="" size="5" type="text"><br>
<input name="m" id="m" value="4"  type="hidden">
<br><input name="szer" id="szer" value="5"  type="hidden"><INPUT TYPE="submit" VALUE="Wygeneruj mape"></FORM> ';

}else{
echo'<form name="zmiana opisu" action="" METHOD="post">';
echo'<TABLE class="map_container" cellspacing =0 cellpadding =0 ><tbody><TR>';
  $szerokosc = 5; //ilosc kolumn i wierszy
  $step = intval($szerokosc/2);
  $x=$_GET[x]-$step;        //z uchwytu pobiera x
  $y=$_GET[y]-$step;        //z uchwytu pobiera y
  $wiersz =0;               // wiersz poczatkowy
  $licz = 0;                // liczy ilosc kolumn

echo '<table style="border: 1px solid rgb(241, 235, 221); background-color: rgb(241, 235, 221);" id="map_Coords" cellpadding="0" cellspacing="0"
<tr><td colspan="2" align="center"><a href="?m=4&x='.($_GET[x]-$szerokosc)."&y=".($_GET[y]-$szerokosc).'">skos</a></td>
<td colspan="1" align="center"><a href="?m=4&x='.$_GET[x]."&y=".($_GET[y]-$szerokosc).'">gora</a></td>
<td colspan="2" align="center"><a href="?m=4&x='.($_GET[x]+$szerokosc)."&y=".($_GET[y]-$szerokosc).'">skos</a></td></tr>
<tr><td colspan="1" align="center"><a href="?m=4&x='.($_GET[x]-$szerokosc)."&y=".$_GET[y].'">bok</td>
<td colspan="3" align="center"><table style="border: 1px solid rgb(241, 235, 221); background-color: rgb(241, 235, 221);" id="map" class="map" cellpadding="0" cellspacing="0">';
$p=", ";
    while($wiersz<$szerokosc){$wiersz++;  echo"\n<tr ><TD nowrap=\"tak\" width=\"70\" height=\"38\"  >$y</TD>";  //pętla 1 = zapisuje wiersze
     while($licz<$szerokosc){                                 //pętla 2 = zapisuje kolumny

connection();
      $wynik = @mysql_query("SELECT w.id AS id_wsi, w.x, w.y, p.id AS id_User, p.name, a.id AS id_plemie, a.tag, w.name, w.points, w.typ, w.data, w.mur, w.pik, w.mie, w.axe, w.luk, w.zw, w.lk, w.kl, w.ck, w.tar, w.kat, w.ry, w.sz, w.opis
FROM village w, tribe p, ally a
WHERE w.player = p.id
AND p.ally = a.id
      And w.x ='$x'
      And w.y ='$y'")or die('Blad zapytania');

   echo'<TD nowrap="tak" width="72" height="38" class="';                  //tworzymy linie kontynętów
   $linnie = $x;
if($linnie%10 == 0){echo'c';}else{echo'b';}echo'l ';

   $linnia = $y+1;                             //tworzymy linie kontynętów
if($linnia%10 == 0){echo'b';}else{echo'b';}echo'b ';

      if($r = mysql_fetch_array($wynik)){       //załadowanie zapytania do $r   - wioska istnieje
                                               // dajemy kolory
      echo ' '.map_color($r[id_User],$r[id_plemie]).'" >';

if($r[11]!=NULL){$mur= $r[11];}else{$mur="''";}		//mur


                                                //wykrywamy istnienia
 if($user=$r[id_User]&&$r[id_User]!=0){         //gracz istnieje
   $gr=1;
 }else{                                         //gracz nie istnieje
   $gr=0; }

if($r[opis]!=''&&$opis=$r[opis]){              //opis istnieje
   $op=1; }

      if($r[8]< 299 ){$pkt=1;}
  elseif($r[8]< 999 ){$pkt=2;}
  elseif($r[8]< 2999 ){$pkt=3;}
  elseif($r[8]< 8999 ){$pkt=4;}
  elseif($r[8]< 10999 ){$pkt=5;}
  elseif($r[8]>= 10999 ){$pkt=6;}
 echo'<img src="http://bornkes.w.szu.pl/www/tys/i_m.php?m='.$r[mur].'">';
 echo'<img src="http://bornkes.w.szu.pl/www/tys/i_wsi.php?t='.$r[typ].'&op='.$op.'&p='.$pkt.'&g='.$gr.'" >';
 echo'<img src="http://bornkes.w.szu.pl/www/tys/i_w.php?zw='.$zw.'&def='.$def.'&off='.$off.'"><br>';
 echo '<SPAN style="font-size:8;color:#ffffff;"> '.substr($r[7],0,15).'</span>';
 echo '<div class="lay4"><img src="http://bornkes.w.szu.pl/www/tys/ata.php?a=4&f=40"></div>';

destructor();

echo '</td>';                                                  //zamkniecie komurki
      }else{
                                                               //wioska nie istnieje
      echo'style="background-color: rgb(66, 120, 40);" id="'.$x.'|'.$y.'"><img src="http://bornkes.w.szu.pl/www/tys/0.png"></TD>';
      } @destructor();
     ++$licz;
#echo"<TD>$x|$y</td>\n";
$x++;
}                                                   //koniec wewnętrznej pętli
     $licz = 0;                                                 // zeruje kolumne
     $y++;                                                      // nowy wiersz
     $x=$_GET[x]-$step;                                         // zeruje x przed pętla
echo '</tr>';         }
echo"<tr><td></td>";
for($licz=0;$licz<$szerokosc;$licz++){
echo'<td align="center" >'.$x++.'</td>';}
                                                      //koniec zewnętrznej pętli
     echo '</tr></TABLE>
</td><td align="center"><a href="?m=4&x='.($_GET[x]+$szerokosc)."&y=".($_GET[y]).'">bok</td></tr>
<tr><td colspan="2" align="center" ><a href="?m=4&x='.($_GET[x]-$szerokosc)."&y=".($_GET[y]+$szerokosc).'">skos</a></td>
<td colspan="1" align="center"><a href="?m=4&x='.($_GET[x])."&y=".($_GET[y]+$szerokosc).'">dol</td>
<td  colspan="2" align="center"><a href="?m=4&x='.($_GET[x]+$szerokosc)."&y=".($_GET[y]+$szerokosc).'">skos</td></tr>
</tbody></table>';}
?>  </td></td></tr></table></tr></tbody></table></form></td></tr></table></?php></body></html>