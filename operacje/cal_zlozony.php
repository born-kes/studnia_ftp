<?PHP include('../connection.php'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>

    <link rel="shortcut icon" type="image/x-icon" href="http://static.twmaps.org/favicon.ico">
    <script type="text/javascript" src="../0ff193fdb44e0df3c6cdd3a948c4191d_pliki/tw_002.js"></script>
    <script src="../js/suwak.js" type="text/javascript"></script>
    <script src="../js/menu.js" type="text/javascript"></script>
           <script type="text/javascript">var center_x=550; var center_y=700; var zoom=2; var static='http://static.twmaps.org';
 inqlude='../'; var iss='k';
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
</script>
</head><body onload="registerEvents();">

<div style="position:absolute; top:0px; left: 0px; z-index:2; display: none;" id="go3">
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
<img src="../0ff193fdb44e0df3c6cdd3a948c4191d_pliki/rd.gif" style="width: 1px; height: 1px; position: absolute; display: block; left: 426px; top: 911px;" id="rd_top" alt="">
<img src="../0ff193fdb44e0df3c6cdd3a948c4191d_pliki/rd.gif" style="width: 1px; height: 1px; position: absolute; display: block; left: 426px; top: 911px;" id="rd_left" alt="">
<img src="../0ff193fdb44e0df3c6cdd3a948c4191d_pliki/rd.gif" style="width: 1px; height: 4px; position: absolute; display: block; left: 429px; top: 911px;" id="rd_right" alt="">
<img src="../0ff193fdb44e0df3c6cdd3a948c4191d_pliki/rd.gif" style="width: 4px; height: 1px; position: absolute; display: block; left: 426px; top: 914px;" id="rd_bottom" alt="">
</div>
<div style="position:absolute; width:80px;top:60px;left:10px; z-index:20; display: none;" id="go2">
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
</script>
<div style="position:absolute; top:0px; left: 0px; z-index:1;" id="go3">

<form name="cal_zlozony_0.php" action="	cal_zlozony_0.php" method="POST"><input type="submit" value="test" /><ul>
<table border="1"><tr><td>
<table>
<tbody><tr><td><b>Kila pytañ które utworza dwa zbiory i powiazania miedzy nimi.</b><br />
<b>Zbiór 1</b> to wioski atakujace.<br />
<b>Zbiór 2</b> to wioski ktore atakujesz.<br />
Powiazanie to dodatkowa selekcja wzgledem czasu<br />
<br />
</td></tr>
<tr id="jeden"><td>
<li>Czy dodales/as do bazy spis wojsk i typy wiosek?</li><br />
<b  style="cursor: pointer;" onclick="loading(input_h('baza',1),'baza_go');on('w_baza');on('w_bazb');">Tak.</b><br />
<a href="edt_typ.php">Nie, a jak to zrobic?</a><br />
<b style="cursor: pointer;" onclick="loading(input_h('baza',0),'baza_go');off('w_baza');off('w_bazb');">Nie i nie bedzie to potrzebne</b><br />
<span id="baza_go"></span>
</td></tr>

<tr id="jeden_a"><td></td></tr>

<tr id="dwa"><td>
<li>Atakujesz ty czy ktos inny?</li><br />
<b style="cursor: pointer;" onclick="loading(input_h('agracz','9oKesi'),'cgracz');">Ja</b><br />
<b style="cursor: pointer;" onclick="loading(input('agracz',''),'cgracz');">Inny gracz</b>
<span id="cgracz"></span>
<br />

</td></tr>
<tr id="trzy"><td>
<li>Czy zbior wiosek atakujacych ma zawierac wszystkie wioski czy nakladamy warunki  ?</li><br />
<b style="cursor: pointer;" onclick="on('cztery');on('piec');">Tak, ograniczmy liste nakladajsc warunki</b><br />
<b style="cursor: pointer;" onclick="off('cztery');off('piec');">Nie, chce zaatakuje wszystkimi wioskami</b><br />
<br />
</td></tr>

<tr style="display: none;" id="cztery"><td>
<li>Ograniczenie ma wynikaæ z Typu Wiosek?</li><br />
<span id="w_bazb"><b style="cursor: hand" onclick="loading(input_h('typ_a',1),'typ_go');">Tak, atakuje tylko wioskami off</b><br />
<b style="cursor: pointer;" onclick="loading(input_typ('typ_a'),'typ_go');">Tak, ale chce wybraæ grupe wiosek</b><br /></span><span id="typ_go"></span>
<b style="cursor: pointer;" onclick="loading('','typ_go');">Nie, ataki wysle ze wszystkich wiosek</b><br />
<br />
</td></tr>

<tr style="display: none;" id="piec"><td>
<li>Czy ograniczenie ma wynikaæ z Polozenia na mapie?</li><br />
<b style="cursor: pointer;" onclick="loading(input_h('a_oko',0)+input_h('a_xy',0),'a_map_go');on('go2');on('go3');iss='a_';">Tak, pokaz mape by okreslic rejon<br />
<b>Nie, polozenie niema znaczenia</b><br />
<span id="a_map_go"></span><br />
</td></tr>

<tr><td><hr></td></tr>

<tr id="six"><td>
<li>Kogo atakujemy?</li><br />
<b style="cursor:auto" onclick="loading(input('ogracz',''),'kogo_go');on('siedem');">Gracza</b><br />
<b style="cursor:auto" onclick="loading(input_plemie(),'kogo_go');on('siedem');">Plemie</b><br />
<b style="cursor:auto" onclick="loading('xxx|yyy'+input_xy(''),'kogo_go');off('siedem');loading('','o_map_go');">Wioske</b><br />
<span id="kogo_go"></span>
<br />
</td></tr>

<tr id="siedem"><td>
<li>Ograniczamy liste o okolice?</li><br />
<b style="cursor: pointer;" onclick="loading(input_h('o_oko',0)+input_h('o_xy',0),'o_map_go');on('go2');on('go3');iss='o_';">Tak, pokaz mape by okreslic rejon</b><br />
<b>Nie, polozenie niema znaczenia</b><br />
<span id="o_map_go"></span><br />
</td></tr>

<!--tr id="osiem"><td>
<li>Ograniczamy liste o wioski zeskanowane?</li><br />
<b style="cursor: pointer;" onclick="loading(input_h('baza_r',1),'skan_go');">Tak, Tylko wioski z ktorych jest raport</b><br />
<b style="cursor: pointer;" onclick="loading(input_h('baza_r',0),'skan_go');">Nie, To niema znaczenia</b><br />
<span id="skan_go"></span>
<br />
</td></tr-->

<tr><td><hr></td></tr>

<tr><td>
<li>Czym mam sie kierowac przy liczeniu czasu marszu?</li><br />
<span id="w_baza">
<b style="cursor: pointer;" onclick="loading(input_h('wojsko',9),'wojo_go');">Informacjami o wojsku w bazie</b><br /> </span>
<b style="cursor: pointer;" onclick="loading(input_wojo(),'wojo_go');">Wszystkie ataki ida jednym tempem</b><br />
<span id="wojo_go"></span>
<br />
</td></tr>

<tr id="ten"><td>
<li>Na ktora ma dojsc atak? </li><br />
<b style="cursor: pointer;" onclick="loading(input('czas1','17.03.2009 8:00:00'),'czas_go');">8:00:00 jutro</b><br />
<b style="cursor: pointer;" onclick="loading(input_czas(),'czas_go');">Chce wybrac wlasna godzine</b><br />
<span id="czas_go"></span>
<br />
</td></tr>

<tr id="ilewen"><td>
<li>O ktorej maja byc wysylane ataki</li><br />
<b style="cursor: hand;" onclick="loading(' od '+input('od_h','16')+' do '+input('do_h','21'),'czas_start');">Tak, chce miec wybor o ktorej maja byc wyslane ataki</b><br />
<b style="cursor: hand;" onclick="loading('','czas_start');">Nie, o kazdej godzinie moge wyslac atak</b><br />
<span id="czas_start"></span>
<br />
</td></tr>

</tbody></table>
</td><td>xx</td></tr></table>
</ul></form>
</div></div>
</body></html>