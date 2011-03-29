<?php   include('../connection.php'); ?>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="../stamm1201718544.css">
<script src="../js/ajax.js" type="text/javascript"></script>
<script src="../js/plac.js" type="text/javascript"></script>
<script language="JavaScript">
<!--
function pops(url, gg) {
	wnd = window.open(url, "opens", "width=340,height=700,left='+gg+',top=150,resizable=yes");
	wnd.focus();
}
function gN(a,b) { return a.getElementsByTagName(b);}
function zmiana_stylu(id)
{
    var lista_tr = gN(document,'tr');
     for (var i=0; i< lista_tr.length ; i++ )
     {
         if(lista_tr[i].className.indexOf(id)>-1){lista_tr[i].style.display='none';}
     }
}

//-->
</script></head>
<body><table class="vis"><?PHP
if($_POST!=NULL)
{
function ajax_zap($gdzie,$id)
{
$s= "<a href=\"#\" onclick=\"Klik('".$gdzie."','../pl/raport2.php?id=".$id."&yes=pies'); return false;\" title=\"info o wiosce\">&#9787;</a>"; return $s;
}


if($_POST[czas1]==NULL){echo "<tr><td>Podaj date dotarcia do celu</td></tr>"; exit(); }
$mk_ruznica = mkczas_pl($_POST[czas1])-mktime();    // ile czasu ma wojsko na marsz...

if($mk_ruznica<480){echo "<tr><td>Podaj date w przysz³osci, by Twoje wojska mia³y czas na dojscie</td></tr>"; exit(); }

$os=0;
    $hr='<tr><td colspan="3"><hr /></td></tr>';
 $p=" AND ";
$zap=" SELECT  v.id , v.x, v.y, wm.axe, wm.lk,wm.ck, wm.tar, wm.sz, v.name
  FROM `ws_all` v, ws_mobile wm
  WHERE wm.id = v.id ";

    // czas ataku
$cos = intval($_POST[wojsko]); // tepo marszu


    // zwiur agresora
$zap_a=$zap; $a=0;

if($_POST[agracz]!=NULL){$a++;

$gracz_a = zap("u.id,u.name"," list_user u"," u.name ='$_POST[agracz]'" );
 $zap_a.=$p." v.player='$gracz_a[0]'";}
if($_POST[a_gracz]!=NULL){$a++;
$gracz_a = zap("u.id,u.name","list_user u", " u.id  ='$_POST[a_gracz]'" );
 $zap_a.=$p." v.player='$gracz_a[0]'";}

if($_POST[a_xy]!=NULL && $_POST[a_oko]!=NULL){$a++;
$oko_a = addslashes(urlencode($_POST[a_oko]));
$xy_ag = explode("|",$_POST[a_xy]);
$odx_a= $xy_ag[0]-$oko_a;          $dox_a= $xy_ag[0]+$oko_a;
$ody_a= $xy_ag[1]-$oko_a;          $doy_a= $xy_ag[1]+$oko_a;

$zap_a.=$p."v.x>'$odx_a'
        AND v.x<'$dox_a'
        AND v.y>'$ody_a'
        AND v.y<'$doy_a'";}
elseif($_POST[a_xy]!=NULL){$a++;
$xy_ag = explode("|",$_POST[a_xy]);
$zap_a.=$p."v.x='$xy_ag[0]'
        AND v.y='$xy_ag[1]'";}

 switch ($_POST[wojsko])
 {
      case 9:
 $zap_a.= $p."wm.zw>10"; $a++;
$co ='Zwiad';
              break;
      case 10:
 $zap_a.= $p."wm.lk>10"; $a++;
$co ='Lekka Kawaleria';
              break;
      case 11:
 $zap_a.= $p."wm.ck>10"; $a++;
$co ='Ciê¿ka Kawaleria';

              break;
      case 18:
 $zap_a.= $p."wm.axe>10"; $a++;
$co ='Topornicy';

              break;
      case 30:
 $zap_a.= $p."wm.tar>10"; $a++;
$co ='Tarany';

              break;
      case 35:
 $zap_a.= $p."wm.sz>0"; $a++;
$co ='Szlachcic';

              break;

     default:
 $zap_a.= $p."(wm.zw>10 OR wm.lk>10 OR wm.ck>10 OR wm.axe>10 OR wm.tar>10 OR wm.sz>0)";

 }   


if($a==0) {echo 'Agresor nie okreslony'; exit();}
//echo $zap_a;
 connection();
$wynik = @mysql_query($zap_a); $i=0;
while($r = @mysql_fetch_array($wynik))
{
$agresor[name][$i]=$r[name];
if($r[top]>0)
{   $agresor[id][$i]=$r[id];
    $agresor[x][$i]=$r[x];
    $agresor[y][$i]=$r[y];
    $agresor[wolny][$i++]=18;}
if($r[lk]>0)
{   $agresor[id][$i]=$r[id];
    $agresor[x][$i]=$r[x];
    $agresor[y][$i]=$r[y];
    $agresor[wolny][$i++]=10;}
if($r[ck]>0)
{   $agresor[id][$i]=$r[id];
    $agresor[x][$i]=$r[x];
    $agresor[y][$i]=$r[y];
    $agresor[wolny][$i++]=11;}
if($r[tar]>0)
{   $agresor[id][$i]=$r[id];
    $agresor[x][$i]=$r[x];
    $agresor[y][$i]=$r[y];
    $agresor[wolny][$i++]=30;}
if($r[sz]>0)
{   $agresor[id][$i]=$r[id];
    $agresor[x][$i]=$r[x];
    $agresor[y][$i]=$r[y];
    $agresor[wolny][$i++]=35;}
}
if($i==0) {echo '<tr><td>Twoje Wioski nie maja wojsk ofensywnych? uaktualnij dane</td></tr>'; exit();}

    // zbiur obroncy
$zap_o=" SELECT  v.id , v.x, v.y, v.name
  FROM `ws_all` v
  WHERE ";
 $o=0;
if($_POST[ogracz]!=NULL){ $o++;
$gracz_o = addslashes(urlencode($_POST[ogracz]));
$gracz_o = zap("u.id, u.name","list_user u"," u.name ='$gracz_o'" );
$zap_o.= " v.player ='$gracz_o[0]' ";}

if($_POST[o_gracz]!=NULL){ $o++;
$gracz_o = zap("u.id, u.name","list_user u"," u.id='$_POST[o_gracz]'" );
 $zap_o.= " v.player ='$gracz_o[0]' ";}

if($_POST[o_xy]!=NULL && $_POST[o_oko]!=NULL){$o++;
$oko_o = $_POST[o_oko];
$xy_ob = explode("|",$_POST[o_xy]);

$odx_o= $xy_ob[0]-$oko_o;          $dox_o= $xy_ob[0]+$oko_o;
$ody_o= $xy_ob[1]-$oko_o;          $doy_o= $xy_ob[1]+$oko_o;

$zap_o.=$p."v.x>'$odx_o'
       AND v.x<'$dox_o'
       AND v.y>'$ody_o'
       AND v.y<'$doy_o'";}
elseif($_POST[o_xy]!=NULL){$o++;
$xy_ob = explode("|",$_POST[o_xy]);
$zap_o.=$p."v.x='$xy_ob[0]'
        AND v.y='$xy_ob[1]'";
}

if($o==0){echo "Obronca nieokreslony"; exit();}
 connection();// echo $zap_o;
$wynik = @mysql_query($zap_o);$h=0;
while($r = @mysql_fetch_array($wynik))
{   $obrona[id][$h]=$r[id];
    $obrona[x][$h]=$r[x];
    $obrona[y][$h]=$r[y];
    $obrona[wolny][$h++]=$r[wolny];
}


echo '
<tr><th colspan="2">Agresor ('.urldecode($gracz_a[1]).') </th></tr>
<tr><td> => </td><td>'.$co.' </td></tr>
<tr class="units_home"><td>Obronca <b>('.urldecode($gracz_o[1]).')</b></td><td>Atak na <br />'.$_POST[czas1].'</td></tr>
'.$hr; 
 for($i=0;$i<count($agresor[x]);$i++){ //  echo ' <br>';

if($cos!=0){$odzc = $mk_ruznica/($cos*60);  $ggg= 300 /($cos*60); $szb=($cos*60);}
else{ if($agresor[wolny][$i]==0||$agresor[wolny][$i]==NULL){continue;}

$szb=($agresor[wolny][$i]*60);
  $odzc = $mk_ruznica/($agresor[wolny][$i]*60);
  $ggg= 300 /($agresor[wolny][$i]*60);
     }  // Odleg³osc policzona z czasu

 $echo = '<tr class="id_'.$agresor[id][$i].'" valign="top">
  <th>'.urldecode($agresor[name][$i]).' ('. $agresor[x][$i].'|'.$agresor[y][$i].') '.ajax_zap('aj_'.$agresor[id][$i],$agresor[id][$i]).'
  <a href="" onclick="zmiana_stylu(\'id_'.$agresor[id][$i].'\'); return false; " title="Ukryj cele dla tej wioski">X</a> 
  <a href="" onclick="gid_kes(\'aj_'.$agresor[id][$i].'\').innerHTML=\'\'; return false; " title="Ukryj">&#9786;</a>
<br>';

   //  echo $echo.' <br>';
             for($j=0;$j<count($obrona[x]);$j++)
             {
                $odleglosc=sqrt(potega($obrona[x][$j]-$agresor[x][$i],2)+potega($obrona[y][$j]-$agresor[y][$i],2));

                 if($odzc-$ggg<$odleglosc && $odleglosc<$odzc+($ggg/2) )
                 {$os++;
  $echo_1.= '<tr class="units_home id_'.$obrona[id][$j].'"><th></td></th><td>'.ajax_zap('aj_'.$agresor[id][$i],$obrona[id][$j]).' '.$obrona[x][$j].'|'.$obrona[y][$j].' <a href="" onclick="zmiana_stylu(\'id_'.$obrona[id][$j].'\'); return false;" title="usun ta wioske ze wszystkich list sugerowanych celi">X</a></td><td><a href="#" onclick="pops(\'http://pl5.plemiona.pl/game.php?village='.$agresor[id][$i].'&amp;screen=place&amp;mode=command&amp;target='.$obrona[id][$j].'&ukryjmenu=tak\', 65); return false;" target="_parent/ramka">wyslij TERAZ</a></td></tr>';
                 }    // teraz lub pu¼niej                        // teraz nie wcze¶niej
                 elseif($odzc-($ggg*4)<$odleglosc && $odleglosc<$odzc-$ggg )
                 {$os++;
$xz= $mk_ruznica-($odleglosc*$szb)+mktime();
  $echo_2 .= '<tr class="selected id_'.$obrona[id][$j].'"><td></td><td>'.ajax_zap('aj_'.$agresor[id][$i],$obrona[id][$j]).' '.$obrona[x][$j].'|'.$obrona[y][$j].' <a href="" onclick="zmiana_stylu(\'id_'.$obrona[id][$j].'\'); return false;" title="usun ta wioske ze wszystkich list sugerowanych celi">X</a></td><th><a href="#" onclick="pops(\'http://pl5.plemiona.pl/game.php?village='.$agresor[id][$i].'&amp;screen=place&amp;mode=command&amp;target='.$obrona[id][$j].'&ukryjmenu=tak\', 30); return false;" target="_parent/ramka">wyslij o '.date("G:i:s",$xz).'</a></th></tr>';
                 }
                 elseif($odzc-($ggg*5)<$odleglosc && $odleglosc<$odzc-($ggg*4) )
                 {$os++;
$xz= $mk_ruznica-($odleglosc*$szb)+mktime();
  $echo_3 .= '<tr class="selectt id_'.$obrona[id][$j].'"><td></td><td>'.ajax_zap('aj_'.$agresor[id][$i],$obrona[id][$j]).' '.$obrona[x][$j].'|'.$obrona[y][$j].' <a href="" onclick="zmiana_stylu(\'id_'.$obrona[id][$j].'\'); return false;" title="usun ta wioske ze wszystkich list sugerowanych celi">X</a></td><th><a href="#" onclick="pops(\'http://pl5.plemiona.pl/game.php?village='.$agresor[id][$i].'&amp;screen=place&amp;mode=command&amp;target='.$obrona[id][$j].'&ukryjmenu=tak\', 50); return false;" target="_parent/ramka">wyslij o '.date("G:i:s",$xz).'</a></th></tr>';
                 }
             }
if($echo_1!=NULL||$echo_2!=NULL){echo $echo.'<table>'.$echo_1.$echo_2.$echo_3.'</table></th><td valign="top" id="aj_'.$agresor[id][$i].'" /></tr>'.$hr;
$echo_1=$null;$echo_2=$null;}
}  
if($os==0){echo ' <h4 align="center"> Niema powiazan dla najblizszych 30 minut </h4>';}
}else{echo ' <h4 align="center"> Brak Danych</h4>';}
?></table>