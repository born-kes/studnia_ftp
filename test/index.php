<?PHP include('connection.php'); ?><html>
<head>     <meta http-equiv="Content-Type" content="text/html; charset=windows-1250">
           <link rel="stylesheet" type="text/css" href="stamm1201718544.css">
           <script src="js/menu.js" type="text/javascript"></script>
           <script src="js/suwak.js" type="text/javascript"></script>
           <script src="js/ts_picker.js" type="text/javascript"></script>
           <script src="js/tw_002.js" type="text/javascript"></script>
           <script type="text/javascript">
           var center_x=550; var center_y=700; var zoom=2; var static='http://static.twmaps.org';
            inqlude=''; var iss='k';
function gmap(text){
	gid( iss+'xy' ).value = text;
	gid( iss+'oko' ).value = gid( 'zoom_h' ).value;
}
function input_plemie() {
                        	var str_buffer =  new String (
    '<select name="plem_op">'+
    '<option value=""></option>'+
    '<?PHP for($licz=0; $licz<count($plemiona); $licz++){echo'<option value="'.$id_plem[$licz].'">'.$plemiona[$licz].'</option>'; } ?>'+
    '</select>');
       return str_buffer;
}
function input_typ(a) {
                        	var str_buffer =  new String (
    '<select name="typ_'+a+'">'+
    '<option value=""></option>'+
    '<?PHP for($licz=0; $licz<count($rodzaje); $licz++){echo'<option value="'.$licz.'">'.$rodzaje[$licz].'</option>'; } ?>'+
    '</select>');
       return str_buffer;
}
function map_ini() {
                        	var str_buffer =  new String (
    '<select name="plem_op" OnChange="selecturl(this)">'+
    '<OPTION VALUE="none">Wybierz adres</OPTION>'+
    '<OPTION VALUE="http://pl5.twmaps.org/showmap.php?id=f55f1ae3e7b5dc7fb33b0dc0032684cc">duchy</OPTION>'+
    '<OPTION VALUE="http://pl5.twmaps.org/showmap.php?id=f87b116c923d5b99c9932cf586819a82">zp i opuszczone</OPTION>'+
    '<OPTION VALUE="http://pl5.twmaps.org/showmap.php?id=a198f96ff369938982f84232690dda47">Zwykla</OPTION>'+
    '</select>');
       return str_buffer;
}
function check(){ return intval(gid('zoom_h').value*1.5); }
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
</script>
</head>
  <body bgcolor="#ffffff" onload="registerEvents();">
<div style="position: relative; top: -20px; left: 0px; z-index:5;" id="go1"><script type="text/javascript">loading(mennu(),'go1');</script></div>
<div style="position: relative; top: -120px; left: 0px; z-index:20;" id="go2"><script type="text/javascript">loading(suwakk(),'go2');</script></div>
<div style="position:absolute; top:0px; left: 0px; z-index:25;display:none;" id="map0">
<div style="position:absolute; top:0px; left: 0px; z-index:1;" id="map1">
<h1 name="ggge" id="ggge" />
<input type="hidden" name="koko" id="koko" value="" /><input type="hidden" name="kxy" id="kxy" value="" />

<table class="map">
    <tbody>
    <tr>
	<td>
	    <img id="map" src="http://pl5.twmaps.org/showmap.php?id=a5b4aca8f66976c95d9d581def7cb214" alt="{map}">
	</td>
    </tr>
</tbody></table>
<img style='display:none' id='mapol_img' src='#' alt='' />
<img src="img/rd.gif" style="width: 1px; height: 1px; position: absolute; display: block; left: 426px; top: 911px;" id="rd_top" alt="">
<img src="img/rd.gif" style="width: 1px; height: 1px; position: absolute; display: block; left: 426px; top: 911px;" id="rd_left" alt="">
<img src="img/rd.gif" style="width: 1px; height: 4px; position: absolute; display: block; left: 429px; top: 911px;" id="rd_right" alt="">
<img src="img/rd.gif" style="width: 4px; height: 1px; position: absolute; display: block; left: 426px; top: 914px;" id="rd_bottom" alt="">
</div>
<div style="position:absolute; width:80px;top:60px;left:10px; z-index:2;" id="map2">
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
</div>
<div style="position: relative; top: -25px; left: 0px; z-index:1;" id="go3"><script type="text/javascript"></script>


<iframe src="" width="100%" height="80%" frameborder="0" name="ramka">Twoja przegl±darka nie akceptuje pływaj±cych ramek!</iframe></div>
<div style="position: absolute; top: 50px; right: 30px; z-index:1;" id="go0"><a href="http://www.szu.pl" target="_blank"><img src="http://szu.pl/szu-banerki/10.gif" border="0" alt="Bazy danych MySQL, konta pocztowe, konta WWW, parkowanie domen"></a></div>
<script type="text/javascript">loading(input_zoom(),'oko_map');loading(map_ini(),'ini_map');</script>
<b style="cursor: pointer;" onclick="loading(input_h('o_oko',0)+input_h('o_xy',0),'o_map_go');on('map0');iss='o_';">Tak, pokaz mape by okreslic rejon</b>
<span id="o_map_go"></span>
</body>
  </html>

