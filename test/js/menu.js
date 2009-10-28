function gid(id) {
	return document.getElementById(id);
}
function suwakk()
{
    var str_buffer = new String (
     '<div style="position: absolute; left: -10px; top: -20px; ">'+
     '<table cellpadding="0" cellspacing="0"><tr><td id="suwak" style="display:none;background-color: #AD5700; border-style: dotted;">'+
     '<table><tr><td></td></tr><tr><td>XXXXXXXXXXXXXX</td></tr></table>'+
     '</td><td valign="top" style="border-left-color: maroon;">'+
     '<img src="img/grip.gif" onclick="javascript:show_suwak()" /></td></tr></table></div>'+
     '');
       return str_buffer;
}

function loading( text,tu ) {
	gid(tu).innerHTML = text;
}

function mennu()
{
    var str_buffer = new String (
   '<center>'+
    '<table id="Table_01" width="750" border="2" cellpadding="0" cellspacing="0" height="10%"><tbody>'+
     '<tr><td background="tlo_menu.PNG" width="753" height="154" valign="bottom" >'+
       '<table class="menu nowrap" width="753" id="menu" cellpadding="45" cellspacing="10">'+
       '<tbody><tr id="menu_row">'+
       '<td><a href="../indexout.php">wyloguj</a><br>'+
      '<td>Profil<br>'+
       '<table cellspacing="4"><tbody>'+
       '<tr><td><a href="operacje/minuta.php" target="ramka">Minutnik</a></td></tr>'+
       '</tbody></table></td>'+

       '<td>Konwertuj<br>'+
       '<table cellspacing="4"><tbody>'+
       '<tr><td><a href="operacje/edt_typ.php" target="ramka">Typów wiosek</a></td></tr>'+
       '<tr><td><a href="kr/" target="ramka">raportów</a></td></tr>'+
       '</tbody></table></td>'+
       '<td>Kalkulatory<br>'+
       '<table cellspacing="4"><tbody>'+
       '<tr><td><a href="javascript:loading_text(suwak(\'kalkulator_prostu\'));on(\'suwak\');">Prosty</a></td></tr>'+
       '<tr><td><a href="javascript:loading_text(suwak(\'kalkulator_radar\'));on(\'suwak\');">Radar</a></td></tr>'+
       '<tr><td><a href="javascript:loading_text(suwak(\'kalkulator_tk\'));on(\'suwak\');">Tancerz Wojny</a></td></tr>'+
       '<tr><td><a href="javascript:loading_text(suwak(\'kalkulator_zlozony\'));on(\'suwak\');">Z³o¿ony</a></td></tr>'+
       '</tbody></table></td>'+
       '<td>Baza Danych<br>'+
       '<table cellspacing="4"><tbody>'+
       '<tr><td><a href="javascript:loading_text(suwak(\'szukaj_wsi\'));on(\'suwak\');">Szukaj Wsi</a></td></tr>'+
       '<tr><td><a href="javascript:loading_text(suwak(\'szukaj_okolicy\'));on(\'suwak\');">Szukaj Wsi w okolicy</a></td></tr>'+
       '<tr><td><a href="javascript:loading_text(suwak(\'szukaj_gracza\'));on(\'suwak\');">Szukaj Gracza</a></td></tr>'+
       '</tbody></table></td>'+
      '<td>Mapy<br>'+
       '<table cellspacing="4"><tbody>'+
       '<tr><td><a href="javascript:loading_text(suwak(\'szukaj_taktyczna\'));on(\'suwak\');">Taktyczna</a></td></tr>'+
       '<tr><td><a href="operacje/legenda.php" target="ramka">Legenda</a></td></tr>'+
       '</tbody></table></td>'+
    '</tr></tbody></table></td>'+
   '</center>'
);
       return str_buffer;
}


function show_suwak() {
	var style = document.getElementById("suwak").style;
	style.display = (style.display == 'none' ? '' : 'none');
}
function on(co) { gid(co).style.display = '';}
function off(co) { gid(co).style.display = 'none'; }
