<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Aurelia1 (613|681) - Plemiona</title>


<link rel="stylesheet" type="text/css" href="img/stamm1201718544.css">
<script src="img/mootools.js" type="text/javascript"></script>
<script src="img/script.js" type="text/javascript"></script>
</head>

<img src="img/m0.png"><img src="img/1.png"><img src="img/d.png">
<br>
<img src="img/m4.png"><img src="img/3.png"><img src="img/zod.png">
<table><tr><td><b>LEGENDA : </b></td>
<td><img src="img/m3.png"><b>mur</b>
<td><img src="img/o.png"><b>off</b>
.
.
</td>
<td><img src="img/d.png"> <b>Def</b><br></td>
<td><img src="img/z.png"> <b>Zwiad</b></td></tr></table><br><br>

<body style="margin-top: 6px;">
<tbody>

           <td ><div id="info" style="position: absolute; top: 373px; left: 31px; width: 400px; height: 1px; visibility: hidden; z-index: 10;">
           <table id="info_content" class="vis" style="background-color: rgb(240, 230, 200);"><tbody><tr>
<TH colspan="4" id="info_title">2</TH><TD colspan="2" id="info_points">.</TD></TR>
<TR style="" id="info_owner_row"><TD>User:</TD><TD colspan="3" align="center" id="info_owner">2</TD><TD colspan="2" style="" id="info_ally">.</TD></TR>
<TR style="display: none;" align="center" id="info_left_row"><td colspan="6">opuszczona</td></TR>
<TR><TD>Data:</TD><TD colspan="3" id="info_data">01-11-08</TD><TD>Mur:</TD><TD id="info_mur">.</TD></TR>
<TR><TH align="center">Pik</TH><TH align="center" >Miecz</TH><TH align="center" >Topor</TH><TH align="center" >Luk</TH><TH align="center" >Rycerz</TH><TH align="center" >Taran</TH></TR>

<TR><TD align="center"  id="info_wor_pik">pik</TD><TD align="center"  id="info_wor_mie">mie</TD><TD align="center" id="info_wor_axe" >axe</TD><TD align="center" id="info_wor_ar" >ar</TD><TD align="center"  id="info_wor_ry">ry</TD><TD align="center"  id="info_wor_tar">tar</TD></TR>
<TR><TH align="center">Zwiad</TH><TH align="center" >LK</TH><TH align="center" >Kaw.Luk</TH><TH align="center" >CK</TH><TH align="center">Sz</TH><TH align="center" >Kat</TH></TR>
<TR><TD align="center"  id="info_wor_zw">zw</TD><TD align="center"  id="info_wor_lk">lk</TD><TD align="center"  id="info_wor_kar">kar</TD><TD align="center" id="info_wor_ck" >ck</TD><TD align="center" id="info_wor_sz" >sz</TD><TD align="center"  id="info_wor_kat">kat</TD></TR>
<TR><TH>Opis:</TH><TD colspan="5" id="info_opis">toczy si� toczy</TD></TR>
</tbody></table>
           
</div>

<TABLE class="map_container" cellspacing =0 cellpadding =0 ><tbody><TR>

<?php
require "connection.php";
connection();

if($_GET[odx] < $_GET[dox] && $_GET[ody] < $_GET[doy])
{
$szer =$_GET[dox]-$_GET[odx]+1;
$index=-1;
$wynik = mysql_query("SELECT m.*, w.*
FROM nev_map m , wsi w
Where m.id_wsi = w.wsi_id
AND m.id_x >='$_GET[odx]' 
And m.id_x <='$_GET[dox]' 
And m.id_y >='$_GET[ody]' 
And m.id_y <='$_GET[doy]'
ORDER BY m.id_y, m.id_x")
or die('B��d zapytania');
if(mysql_num_rows($wynik) > 0)
 {
  echo'<td><table style="border: 1px solid rgb(241, 235, 221); background-color: rgb(241, 235, 221);" id="mapCoords" cellpadding="0" cellspacing="0">
';
    while($r = mysql_fetch_array($wynik))
  {       $index++;
       if($index==$szer){echo "</TR><TR>"; $index=0;}
  $linnie = $r[2];   
echo '<TD class="';

if($linnie[2] == 0&&$linnie[1] == 0){echo'con';}else{ if($linnie[2] == 0||$linnie[2] == 5){echo'border';}else{echo'space';}}
     echo'-left-new ';
  $linnia = $r[1];
if($linnia[2] == 0&&$linnia[1] == 0){echo'con';}else{ if($linnia[2] == 0||$linnia[2] == 5){echo'border';}else{echo'space';}}
     echo'-bottom-new" id="'.$r[1].'|'.$r[2].'"';

if ($r[4]==1)
   {echo'><img src="img/0.png"></TD>';
   }
     else
     {
     echo 'style="background-color: rgb';

       if($r[9] =='ZP'){echo '(244, 0, 0);">';
       }
       else
       {
         if($r[9] =='HW'){ echo '(0, 0, 244);">';
         }
          else
          {
           if($r[9] =='SNRG'){ echo '(241, 235, 221);">';
           }
            else
           {
             echo '(170, 0, 0);">';}
           }
         }
    
echo'<a href="javascript:displayWindow(\'edycja_wsi.php?a=edit&amp;id='.$r[5].'\',630,475)">';
echo' <img src="img/m';
if($r[10] ==0){echo"0";}
elseif($r[10] <6){echo"1";}
elseif($r[10] <11){echo"2";}
elseif($r[10] <16){echo"3";}
elseif($r[10] <21){echo"4";}
echo'.png"><img src="img/';

  if($r[7]<1000){echo"1";}
  elseif($r[7]<3000 ){echo "2";}
  elseif($r[7]<7000 ){echo"3";}
  elseif($r[7]>7000){echo"4";}
 
echo'.png" onmouseover="map_popup';



echo"('".$r[6]." ".$r[2]."|".$r[1]."','".$r[7]."', ";
if($r[8]==''){echo"null";}else{ echo"'".$r[8]."'";}
echo",'".$r[9]."','".$r[10]."','".$r[11]."','".$r[12]."','".$r[13]."','".$r[14]."','".$r[15]."','".$r[16]."','".$r[17]."','".$r[18]."','".$r[19]."','".$r[20]."','".$r[21]."','".$r[22]."','".$r[23]."','".$r[24]."')\" ";
echo ' onmouseout="map_kill()">';
echo'<img src="img/';
$off = $r[13]+$r[16]+$r[17]+$r[19]+$r[20];
$def= $r[11]+$r[12]+$r[14]+$r[18];
$zw=$r[15];

if($zw > 0){echo"z";}
if($off> 0){echo"o";}
if($def> 0){echo"d";}
if($zw==0&&$off==0&&$def==0){echo"dddz";}
echo'.png"></a></TD>'; }
  }
     echo "</TR></TABLE></tbody>";
   }}
else{echo "zle wytyczne.";}
?>
</html>