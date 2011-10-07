<?PHP include('../connection.php'); sesio_id();?><html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="../stamm1201718544.css">

           <script src="../js/plac.js?2b" type="text/javascript"></script>
           <script src="../js/menu.js?2d" type="text/javascript"></script>
           <script src="../js/ts_picker.js" type="text/javascript"></script>
           <script src="../js/tw_002.js?2b" type="text/javascript"></script>
           <script src="../js/ajax.js?2" type="text/javascript"></script>
<style type="text/css">
<!--
.metro {position:absolute; width: 200px;z-index:6;border-width:2px; border-style: solid; border-color:#804000; background-color:#F1EBDD;}
.reds {background-color: red; color: rgb(250, 250, 250); }
.blokada {position:fixed;  right: 10px; bottom:0px; height: 400px; overflow:auto;}
th .i {text-align:center;}
-->
</style>
           <script type="text/javascript">
var login_user =new String ('<?PHP echo $_SESSION['zalogowany']; ?>');


function input_plemie() {
                        	var str_buffer =  new String (
    '<select name="plem_op" onchange="selectAobr(this.form, \'dane_T_ogr\');">'+
    '<option value=""></option>'+
    '<?PHP for($licz=0; $licz<count($plemiona); $licz++){echo'<option value="'.$id_plem[$licz].'">'.$plemiona[$licz].'</option>'; } ?>'+
    '</select>');
       return str_buffer;
}
function input_typ(a) {
                        	var str_buffer =  new String (
    '<select name="typ_'+a+'" onchange="selectAobr(this.form, \'dane_agr\');">'+
    '<option value=""></option>'+
    '<?PHP for($licz=0; $licz<count($rodzaje); $licz++){echo'<option value="'.$licz.'">'.$rodzaje[$licz].'</option>'; } ?>'+
    '</select>');
       return str_buffer;
}

<?PHP
   $i=1;

$moje_id = $_SESSION['id'];
      $option ='\'  <select name="plem_op" OnChange="selecturl(this)" id="plem_op">\'+
  \'<OPTION VALUE=\"0\"> (500|500) swiat 5</OPTION>\'+';
      $x='   var s_x=   new Array;
      s_x[0]=500;
  ';
      $y='   var s_y=   new Array;
      s_y[0]=500;
  ';
      $zoom='   var s_zoom= new Array;
  s_zoom[0]=0;
  ';
      $hexs='   var s_hex=new Array;
   s_hex[0]=\'92a38af8a7dea8a218ade9b480f5c88a\';
  ';

  connection();
// stary kod 
 $zak ="SELECT `hex`, `nazwa`,x,y,zoom,ulubione FROM `hex_kolor` Where user_id= $moje_id OR user_id is NULL ORDER BY `ulubione` DESC";
// tymczasowy $zak = "SELECT `hex`, `nazwa`,x,y,zoom,ulubione FROM `hex_kolor` ORDER BY `ulubione` DESC"
    $wynik = @mysql_query($zak);
      while($r = mysql_fetch_array($wynik))
 {
      $x.='  s_x['.$i.']='.$r[x].';
  ';
      $y.='  s_y['.$i.']='.$r[y].';
  ';
   $zoom.='  s_zoom['.$i.']='.$r[zoom].';
  ';
   $hexs.='  s_hex['.$i.']=\''.$r[hex].'\';
  ';
if($r[ulubione]>0)$ulubiny=' selected="'.$r[ulubione].'" ';else $ulubiny='';
      $option .="   '<OPTION VALUE=\"".$i++."\"".$ulubiny."> ($r[x]|$r[y]) $r[nazwa]</OPTION>'+
   ";
 }@destructor();
      $option .='\'</select>\'';
  echo $x;
  echo $y;
  echo $zoom;
  echo $hexs;
  echo "function map_ini() {
                        	var str_buffer =  new String (".$option.");
       return str_buffer;
}";

                   # zapisz load
  connection(); $z=0; $Zapis .= '<BR>';
    $wynik = @mysql_query("SELECT `id` , `opis` FROM `ws_opis` Where id_user = $moje_id");
      while($r = mysql_fetch_array($wynik))
{
  if($r[1]!=$url)
  {$url=$r[1];
   $Zapis .= ' <a href="zlozony.php?'.$url.'" >LOAD '.$z.' </a> ';
   $Zapis .= ' <input type="submit" value="Usun '.$z++.'" onclick="selectAobr(\''.$url.'\', \'usun_\');return false;" /> <br>';
  }
}
 $Zapis .= ' <input type="submit" value="Zapisz '.$z++.'" onclick="selectAobr(document.forms[0], \'zapisz_\');return false;" /><br><b id="zapisz_" /> ';

 ?>
function mag(){window.open('http://pl5.twmaps.org/'+s_hex[gid_kes('plem_op').value], 'klon1', ',width=800,height=1000,left=0,top=0,resizable=yes,scrollbars=1');}
var vv=false;
test_powiazania();
</script>
</head>
  <body bgcolor="#ffffff" onload="registerEvents();">
<div style="position:relative ; z-index:1;" id="go1"><?PHP include('zlozony.html'); ?></div>
<div onclick="show('map0');" align="right" style="z-index:2;" onMouseOver="komentarze(<?echo$ww++; ?>);" onMouseOut="komentarze(0);">
 MAPA <img src="../img/usun.png"></div>
<div id="map0" style="display:none;" >
<div style="position:absolute; z-index:2;" id="map2">
<table cellpadding="0" cellspacing="0"><tr><td>
     <table cellpadding="0" cellspacing="0">
     <tbody onMouseOver="komentarze(<?echo$ww++; ?>);" onMouseOut="komentarze(0);">
<tr><td align="center" nowrap style="background-color: maroon; border-style: dotted;">
 OKOLICA</td></tr>
<tr><td nowrap id="oko_map" style="background-color: maroon; border-style: dotted;" ></td></tr>
     </tbody></table></td><td>
     <table cellpadding="0" cellspacing="0">
     <tbody onMouseOver="komentarze(<?echo$ww++; ?>);" onMouseOut="komentarze(0);">
<tr><td align="center" nowrap style="background-color: maroon; border-style: dotted;color:white;">Mapa do okreslenia okolicy</td></tr>
<tr><td nowrap id="ini_map" style="background-color: maroon; border-style: dotted;"></td><td><a href="javascript:javascript:mag();">&#187; &#187;</a></td></tr>
</tbody>
     </table></td></tr>     </table>

</div>
 <div style="position:relative ; z-index:3;width: 95%;" id="map1">


<table class="map" align="center">
    <tbody>
     <tr>
      <td>
       <b style="cursor: pointer;" onclick="iss='a_';on_KES('a_map_go');" onMouseOver="komentarze(<?echo$ww++; ?>);" onMouseOut="komentarze(0);">
       Agresor</b>
       <input type="text" name="rd_xy" id="rd_xy" value="" />
       <b style="cursor: pointer;" onclick="iss='o_';on_KES('o_map_go');" onMouseOver="komentarze(<?echo$ww++; ?>);" onMouseOut="komentarze(0);">
       Obronca</b>
      </td>
     </tr>
    <tr>
	<td onMouseOver="komentarze(<?echo$ww++; ?>);" onMouseOut="komentarze(0);">
	    <img id="map" src="http://pl5.twmaps.org/showmap.php?id=92a38af8a7dea8a218ade9b480f5c88a" alt="{map}">
	</td>
    </tr>
</tbody></table>
<img style='display:none' id='mapol_img' src='#' alt='' />
<!--img style="display: block; visibility: visible; position: absolute; left: 699px; top: 149px;" id="KES_mapol_img" src="http://static.twmaps.org/bl7_2.gif" alt=""-->
<img src="../img/rd.gif" style="width: 1px; height: 1px; position: absolute; display: block; left: 426px; top: 911px;" id="rd_top" alt="">
<img src="../img/rd.gif" style="width: 1px; height: 1px; position: absolute; display: block; left: 426px; top: 911px;" id="rd_left" alt="">
<img src="../img/rd.gif" style="width: 1px; height: 4px; position: absolute; display: block; left: 429px; top: 911px;" id="rd_right" alt="">
<img src="../img/rd.gif" style="width: 4px; height: 1px; position: absolute; display: block; left: 426px; top: 914px;" id="rd_bottom" alt="">

<img src="../img/ra.gif" style="width: 1px; height: 1px; position: absolute; display: block; left: 426px; top: 911px;" id="ra_top" alt="">
<img src="../img/ra.gif" style="width: 1px; height: 1px; position: absolute; display: block; left: 426px; top: 911px;" id="ra_left" alt="">
<img src="../img/ra.gif" style="width: 1px; height: 4px; position: absolute; display: block; left: 429px; top: 911px;" id="ra_right" alt="">
<img src="../img/ra.gif" style="width: 4px; height: 1px; position: absolute; display: block; left: 426px; top: 914px;" id="ra_bottom" alt="">
<img src="../img/ro.gif" style="width: 1px; height: 1px; position: absolute; display: block; left: 426px; top: 911px;" id="ro_top" alt="">
<img src="../img/ro.gif" style="width: 1px; height: 1px; position: absolute; display: block; left: 426px; top: 911px;" id="ro_left" alt="">
<img src="../img/ro.gif" style="width: 1px; height: 4px; position: absolute; display: block; left: 429px; top: 911px;" id="ro_right" alt="">
<img src="../img/ro.gif" style="width: 4px; height: 1px; position: absolute; display: block; left: 426px; top: 914px;" id="ro_bottom" alt="">
</div>

</div>


<script type="text/javascript">loading(input_zoom(),'oko_map');loading(map_ini(),'ini_map');selecturl(gid_kes('plem_op'));</script>
<div style="position:relative ; z-index:1;width: 95%;">
 <form action="3.php" method="POST" target="rampa" name="ajax_t">

  <table>
   <tbody>
    <tr valign="top">
     <td id="T_fin2" align="center" style="display: none;" >
   <table align="center" class="main">
   <tbody>
	<tr onMouseOver="komentarze(<?echo$ww++; ?>);" onMouseOut="komentarze(0);">
	<td>Godzina Ataku<br />
        <input name="czas1" id="czas1" value="" size="14" type="text" /><a href="javascript:show_calendar('document.ajax_t.czas1', document.ajax_t.czas1.value);"><img src="../img/cal.gif" alt="Clicknij Tu by ustaliæ Datê" border="0" height="16" width="16"></a></td>
	<td id="T_fin1" />
	</tr>
	<tr onMouseOver="komentarze(<?echo$ww++; ?>);" onMouseOut="komentarze(0);">
	<td>Okno wysylane atakow
	<input name="okno_atak" value="true" onclick="show('czas_start');" type="checkbox" id="czas1_c" />
	<br />
        <span id="czas_start" style="display:none;">od <input size="5" name="od_h" id="czas1_od" value="16" type="text" /><br /> do <input size="5" name="do_h" id="czas1_do" value="21" type="text" /></span></td>
        </tr>
   </tbody>
   </table>
     </td>
     <td id="T_fin3" align="center" /></tr>
    <tr valign="top">
     <td id="T_agr" />
     <td id="T_ogr" />
     </tr>
    <tr valign="top">
    <td id="T_agr_fin" onMouseOver="komentarze(<?echo$ww++; ?>);" onMouseOut="komentarze(0);" />
     <td onMouseOver="komentarze(<?echo$ww++; ?>);" onMouseOut="komentarze(0);">
     <img src="http://www.frombork.pl/images/ikony/22x22/_googleicons_-_spaces/8000GI2-pineska.png" onclick="gid_kes('T_ogr_fin').className = (gid_kes('T_ogr_fin').className == 'blokada' ? '' : 'blokada');" />
     </td>
     <td id="T_ogr_fin" onMouseOver="komentarze(<?echo$ww++; ?>);" onMouseOut="komentarze(0);" />
     </td>
    </tr>
   </tbody>
  </table>
 </form>
</div>
 <?
include('zloz/komentarze.html');
?>
</body>
  </html>