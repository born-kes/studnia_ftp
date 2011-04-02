<?PHP include('../connection.php'); ?><html>
<head>     <meta http-equiv="Content-Type" content="text/html; charset=windows-1250">
           <link rel="stylesheet" type="text/css" href="../stamm1201718544.css">

           <script src="../test/js/menu.js" type="text/javascript"></script>
           <script src="../test/js/suwak.js" type="text/javascript"></script>
           <script src="../js/ts_picker.js" type="text/javascript"></script>
           <script src="../js/tw_002.js" type="text/javascript"></script>
           <script src="../js/plac.js" type="text/javascript"></script>
           <script src="../js/ajax.js" type="text/javascript"></script>
<style type="text/css">
<!--
.metro {position:absolute; width: 200px;z-index:6;border-width:2px; border-style: solid; border-color:#804000; background-color:#F1EBDD;}
-->
</style>
           <script type="text/javascript">
var login_user =new String ('<?PHP echo $_SESSION['zalogowany']; ?>');
           var center_x=500; var center_y=500; var zoom=0; var static='http://pl5.twmaps.org/showmap.php';
            inqlude=''; var iss='k';
function gmap(text){
	gid( iss+'xy' ).value = text;
	gid( iss+'oko' ).value = gid( 'zoom_h' ).value;
}
function input_plemie() {
                        	var str_buffer =  new String (
    '<select name="plem_op" onchange="selectAobr(this.form, \'dane_obr\');">'+
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

<?PHP   $i=1;

$moje_id = $_SESSION['id'];
      $option ='\'  <select name="plem_op" OnChange="selecturl(this)">\'+
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
    $wynik = @mysql_query("SELECT `hex`, `nazwa`,x,y,zoom,ulubione FROM `hex_kolor` Where user_id= $moje_id OR user_id is NULL ORDER BY `ulubione` DESC");
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

      $option .="   '<OPTION VALUE=\"".$i++."\"> ($r[x]|$r[y]) $r[nazwa]</OPTION>'+
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
 ?>
function check(){
 var okolica = gid('zoom').value;
 var check = ((zoom + 1)*okolica)/2;
return check;
// return intval(gid('zoom_h').value*1.5); }
}

function intval( mixed_var, base ) {
    var tmp;
    if( typeof( mixed_var ) == 'string' ){
        tmp = parseInt(mixed_var);
        if(isNaN(tmp)){
            return 0;
        } else{
            return tmp.toString(base || 10);
        }
    } else if( typeof( mixed_var ) == 'number' ){
        return Math.floor(mixed_var);
    } else{
        return 0;
    }
}
var vv='mis';
</script>
</head>
  <body bgcolor="#ffffff" onload="registerEvents();">
<div style="position:relative ; z-index:3;" id="go1"><?PHP include('zlozony.html'); ?></div>
<div onclick="show('map0');" align="right" style="z-index:2;">MAPA <img src="http://www.corporis.pl/images/zamknij.gif"></div>
<div id="map0" style="display:none;">
<div style="position:absolute; z-index:2;" id="map2">
<table cellpadding="0" cellspacing="0"><tr><td>
     <table cellpadding="0" cellspacing="0">
<tr><td align="center" nowrap style="background-color: maroon; border-style: dotted;">OKOLICA</td></tr>
<tr><td nowrap id="oko_map" style="background-color: maroon; border-style: dotted;"></td></tr>
     </table></td><td>
     <table cellpadding="0" cellspacing="0">
<tr><td align="center" nowrap style="background-color: maroon; border-style: dotted;">Mapa</td></tr>
<tr><td nowrap id="ini_map" style="background-color: maroon; border-style: dotted;"></td></tr>
     </table></td></tr>     </table>

</div>
 <div style="position:relative ; z-index:1;width: 95%;" id="map1">
  <input type="hidden" name="koko" id="koko" value="" /><input type="hidden" name="kxy" id="kxy" value="" />

<table class="map" align="center">
    <tbody>
    <tr>
	<td>
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
<script type="text/javascript">loading(input_zoom(),'oko_map');loading(map_ini(),'ini_map');</script>
<table><tbody><tr><td id="test"/></tr></tbody></table>
<b onclick="javascript:Klik('test','m.php')">bel</b>
<b onclick="javascript:alert(vv);">beddl</b>
</body>
  </html>