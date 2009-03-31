<?PHP include('connection.php'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>

    <link rel="shortcut icon" type="image/x-icon" href="http://static.twmaps.org/favicon.ico">
    <script type="text/javascript" src="0ff193fdb44e0df3c6cdd3a948c4191d_pliki/tw_002.js"></script>
    <script src="js/suwak.js" type="text/javascript"></script>
    <script src="js/menu.js" type="text/javascript"></script>
           <script type="text/javascript"> var iss = 'iss';

function ing( text ) {
        gid(iss).value = text;
	gid("fin").innerHTML = text+iss;
}
</script>
    <script type="text/javascript">var center_x=550; var center_y=700; var zoom=2; var static='http://static.twmaps.org';</script>

</head><body onload="registerEvents();">

<div style="position:absolute; top:0px; left: 0px; z-index:1;" id="go3">
<h1 name="ggge" id="ggge" />

<table class="map">
    <tbody>
    <tr>
	<td>
	    <img id="map" src="http://pl5.twmaps.org/showmap.php?id=a5b4aca8f66976c95d9d581def7cb214" alt="{map}">
	</td>
    </tr>
</tbody></table>
<img style='display:none' id='mapol_img' src='#' alt='' />
<img src="0ff193fdb44e0df3c6cdd3a948c4191d_pliki/rd.gif" style="width: 1px; height: 1px; position: absolute; display: block; left: 426px; top: 911px;" id="rd_top" alt="">
<img src="0ff193fdb44e0df3c6cdd3a948c4191d_pliki/rd.gif" style="width: 1px; height: 1px; position: absolute; display: block; left: 426px; top: 911px;" id="rd_left" alt="">
<img src="0ff193fdb44e0df3c6cdd3a948c4191d_pliki/rd.gif" style="width: 1px; height: 4px; position: absolute; display: block; left: 429px; top: 911px;" id="rd_right" alt="">
<img src="0ff193fdb44e0df3c6cdd3a948c4191d_pliki/rd.gif" style="width: 4px; height: 1px; position: absolute; display: block; left: 426px; top: 914px;" id="rd_bottom" alt="">
</div>
<div style="position:absolute; width:80px;top:60px;left:10px; z-index:20;" id="go2">
     <table cellpadding="0" cellspacing="0">
<tr><td align="center" nowrap style="background-color: maroon; border-style: dotted;">OKOLICA</td></tr>
<tr><td nowrap id="suwak" style="background-color: maroon; border-style: dotted;"></td></tr>
</table>
    
</div>
 <script type="text/javascript">loading_text(input_zoom());

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


initMenu();
</script>

</body></html>