var inqlude='';
function zmien_value(gdzie, co){ gid(gdzie).value = co }
function loading_text( text ) {
	gid('suwak').innerHTML = text;
}
function input(name,value) {
	var str_buffer =  new String ('<input type="text" size="5" name="'+name+'" id="'+name+'" value="'+value+'" />');
 return str_buffer; 
}
function div_oko(tu) {
	var str_buffer =  new String (
        '<tr><td id="sie'+tu+'"><b style="cursor: pointer;" onclick="loading(input(\''+tu+'_oko\',0)+input(\''+tu+'_xy\',0),\''+tu+'_map_go\');on(\'map0\');iss=\''+tu+'_\';">Okolica </b>/ '+
        ' <b style="cursor: pointer;" onclick="loading(input(\''+tu+'_oko\',0)+input(\''+tu+'_xy\',0),\''+tu+'_map_go\');"> Recznie </b></td></tr>'+
        '<tr><td id="'+tu+'_map_go"></td></tr>'

);
 return str_buffer; 
}


function input_h(name,value) {
	var str_buffer =  new String ('<input type="hidden" name="'+name+'" id="'+name+'" value="'+value+'" />');
 return str_buffer; 
}
function input_wykonaj() {
      var str_buffer =  new String (
       '<INPUT type="submit" value=" Wykonaj ">');
       return str_buffer;
}
function input_czas()
{
    var str_buffer = new String (
     '<input name="czas1" value="" size="22" type="text" />'+
     '<a href="javascript:show_calendar(\'document.form.czas1\', document.form.czas1.value);" /><img src="'+inqlude+'img/cal.gif" alt="Clicknij Tu by ustali� Dat�" width="16" border="0" height="16" />'
     );
       return str_buffer;
}
function input_xy(b)
{
        var str_buffer = new String (
         '<input name="'+b+'xy" tabindex="13" value="" maxlength="7" size="7" type="text" />'
        );
       return str_buffer;
}
function radion()
{
    var str_buffer = new String (
     '<input name="on" value="1" type="radio" />na godzine<br>'+
     '<input name="on" value="0" type="radio" />do godziny'
     );
       return str_buffer;
}
function input_txt_xy()
{
        var str_buffer = new String (
         '<textarea name="xy" rows="2" cols="25">Pierwsza wioska xxx|yyy'+"\n"+'Druga wioska xxx|yyy</textarea>'
        );
       return str_buffer;
}
function input_name(b)
{ var a=b
        var str_buffer = new String (
         '<input name="'+a+'gracz" value="" type="text" size="14" />'
        );
       return str_buffer;
}

function input_zoom()
{
        var str_buffer = new String (
         '<input type="button" value=" - " name="P2" onclick="minuss()" />'+
         '<input value="3" type="text" id="zoom" size="3" value="5" disabled="tak" />'+
         '<input name="oko" type="hidden" id="zoom_h" size="3" value="3" />'+
         '<input type="button" value=" + " name="P2" onclick="pluss()" />'
        );
       return str_buffer;
}
function input_wojo()
{
        var str_buffer = new String (
         '<input type="button" value=" < " name="B2" onclick="backward()" />'+
         '<img src="'+inqlude+'img/1.PNG" name="photoslider" alt=" " />'+
         '<input type="button" value=" > " name="B1" onclick="forward()" />'+
         '<input value="9" type="hidden" name="wojsko" id="wojsko" />'
        );
       return str_buffer;
}

var which_lupa=0
var Lupa=new Array(3,5,10,15,20,25,30,35,50,100)

function minuss()
{
if (which_lupa>0){
which_lupa--
document.getElementById('zoom').value = Lupa[which_lupa]
document.getElementById('zoom_h').value = Lupa[which_lupa]
}
}

function pluss(){
if (which_lupa<Lupa.length-1){
which_lupa++
document.getElementById('zoom').value = Lupa[which_lupa]
document.getElementById('zoom_h').value = Lupa[which_lupa]
}
else window.status='Maxymalny Zoom'
}

var photos=new Array()
var which=0
var wojo=new Array(9,10,11,18,22,30,35,0)
photos[0]=inqlude+"img/1.PNG"
photos[1]=inqlude+"img/2.PNG"
photos[2]=inqlude+"img/3.PNG"
photos[3]=inqlude+"img/4.PNG"
photos[4]=inqlude+"img/5.PNG"
photos[5]=inqlude+"img/6.PNG"
photos[6]=inqlude+"img/7.PNG"
photos[7]=inqlude+"img/0.PNG"
function backward()
{
if (which>0){
window.status=''
which--
document.images.photoslider.src=photos[which]
document.getElementById('wojsko').value = wojo[which]
}
}

function forward(){
if (which<photos.length-1){
which++
document.images.photoslider.src=photos[which]
document.getElementById('wojsko').value = wojo[which]
}
else window.status='koniec wyboru'
}

   //plemiona tworzone
   // select_typ na stronie g��wnej
function suwak(b) { var a=b
 if(a=='szukaj_gracza')
 {
 	var str_buffer =  new String (
        '<form name="form" action="operacje/zap_do_baz.php" method="POST" target="ramka">'+
        '<table><tbody>'+
        '<tr><td>Nazwa Gracza</td></tr>'+
        '<tr><td>'+input_name("_")+'</td></tr>'+
        '<tr><td>'+input_wykonaj()+'</td></tr>'+
        '</tbody></table>'+
        '</form>');
 }
 if(a=='szukaj_wsi')
 {
 	var str_buffer =  new String (
        '<form name="form" action="operacje/zap_do_baz.php" method="POST" target="ramka">'+
        '<table><tbody>'+
        '<tr><td>xxx|yyy</td></tr>'+
        '<tr><td>'+input_xy("_")+'</td></tr>'+
        '<tr><td>'+input_wykonaj()+'</td></tr>'+
        '</tbody></table>'+
        '</form>');
 }
 if(a=='szukaj_okolicy')
 {
 	var str_buffer =  new String (
        '<form name="form" action="operacje/zap_do_baz.php" method="POST" target="ramka">'+
        '<table><tbody>'+
        '<tr><td>Nazwa Gracza</td></tr>'+
        '<tr><td>'+input_name("_")+'</td></tr>'+
        '<tr><td>Typ Wioski</td></tr>'+
        '<tr><td>'+input_typ("")+'</td></tr>'+
        '<tr><td>Plemie</td></tr>'+
        '<tr><td>'+input_plemie()+'</td></tr>'+div_oko("")+
        '<tr><td>'+input_wykonaj()+'</td></tr>'+
        '</tbody></table>'+
        '</form>');
 }
 if(a=='kalkulator_prostu')
 {
 	var str_buffer =  new String (
        '<form name="form" action="operacje/cal_szybki.php" method="post" target="ramka">'+
        '<table><tbody>'+
        '<tr><td>'+input_txt_xy()+'</td></tr>'+
        '<tr><td>Godzina ataku</td></tr>'+
        '<tr><td>'+input_czas()+'</td></tr>'+
        '<tr><td>'+input_wykonaj()+'</td></tr>'+
        '</tbody></table>'+
        '</form>');
 }
  if(a=='kalkulator_radar')
 {
 	var str_buffer =  new String (
        '<form name="form" action="operacje/strzelec.php" method="post" target="ramka">'+
        '<table><tbody>'+
        '<tr><td>xxx|yyy</td></tr>'+
        '<tr><td>'+input_xy("")+'</td></tr>'+
        '<tr><td><hr></td></tr>'+
        '<tr><td>Nazwa Gracza</td></tr>'+
        '<tr><td>'+input_name("")+'</td></tr>'+div_oko("")+
        '<tr><td><hr></td></tr>'+
        '<tr><td>'+input_wojo()+'</td></tr>'+
        '<tr><td>Godzina Ataku</td></tr>'+
        '<tr><td>'+input_czas()+'</td></tr>'+
        '<tr><td>'+radion()+'</td></tr>'+
        '<tr><td>'+input_wykonaj()+'</td></tr>'+
        '</tbody></table>'+
        '</form>');
 }
  if(a=='kalkulator_tk')
 {
 	var str_buffer =  new String (
        '<form name="form" method="POST" target="wnd" onsubmit="nowe_okno(\'operacje/tancerz_wojny.php\',245,650)" action="operacje/tancerz_wojny.php" >'+
        '<table><tbody><th>Agresor</th></tr>'+
        '<tr><td>Nazwa Gracza</td></tr>'+
        '<tr><td>'+input_name("a")+'</td></tr>'+
        '<tr><td>Typ Wioski</td></tr>'+
        '<tr><td>'+input_typ("a")+'</td></tr>'+div_oko("a")+

        '<tr><td><hr></td></tr>'+
        '<tr><td>Nazwa Gracza</td></tr>'+
        '<tr><td>'+input_name("o")+'</td></tr>'+div_oko("o")+
        '<tr><td><hr></td></tr>'+
        '<tr><td>'+input_wojo()+'</td></tr>'+
        '<tr><td>Godzina Ataku</td></tr>'+
        '<tr><td>'+input_czas()+'</td></tr>'+
        '<tr><td>'+input_wykonaj()+'</td></tr>'+
        '</tbody></table>'+
        '</form>');
 }
  if(a=='kalkulator_zlozony')
 {
 	var str_buffer =  new String (
        '<form name="form" action="operacje/cal_zlozony_0.php" method="post" target="ramka">'+
        '<table><tbody><tr><th>Agresor</th></tr>'+
        '<tr><td>Nazwa Gracza</td></tr>'+
        '<tr><td>'+input_name("a")+'</td></tr>'+
        '<tr><td>Typ Wioski</td></tr>'+
        '<tr><td>'+input_typ("a")+'</td></tr>'+div_oko("a")+

        '<tr><td><hr></td></tr><tr><th>Obronca</th></tr>'+
        '<tr><td>'+
        'Gracz <input type="radio" name="ofiarra" onclick="loading(input_name(\'o\'),\'kogo_go\');on(\'sieo\');" /><br />'+
        'Plemie <input type="radio" name="ofiarra" onclick="loading(input_plemie(),\'kogo_go\');on(\'sieo\');" /><br />'+
        'Wioska <input type="radio" name="ofiarra" onclick="loading(\'xxx|yyy\'+input_xy(\'\'),\'kogo_go\');off(\'sieo\');loading(\'\',\'o_map_go\');" /><br />'+
        '</td></tr>'+
        '<tr><td id="kogo_go"></td></tr>'+div_oko("o")+
        '<tr><td><hr></td></tr>'+
        '<tr><td>Wojsko</td></tr>'+
        '<tr><td>'+input_wojo()+'</td></tr>'+
        '<tr><td>Godzina Ataku</td></tr>'+
        '<tr><td>'+input_czas()+'</td></tr>'+
        '<tr><td>Okno wysylane atakow</td></tr>'+
        '<tr><td>Tak <input type="radio" name="okno_atak" value="" onclick="loading(\' od \'+input(\'od_h\',\'16\')+\' do \'+input(\'do_h\',\'21\'),\'czas_start\');" />'+
              ' Nie <input type="radio" name="okno_atak" value="" onclick="loading(\'\',\'czas_start\');" /></td></tr>'+
        '<tr><td><span id="czas_start"></span></td></tr>'+
        '<tr><td>'+input_wykonaj()+'</td></tr>'+
        '</tbody></table>'+
        '</form>');
 }
  if(a=='szukaj_klasyczna')
 {
 	var str_buffer =  new String (
        '<form name="form" action="operacje/map_test.php" method="GET" target="ramka">'+
        '<table><tbody>'+div_oko("")+
        '<tr><td>'+input_wykonaj()+'</td></tr>'+
        '</tbody></table>'+
        '</form>');
 }
   if(a=='szukaj_taktyczna')
 { which_lupa=7
 	var str_buffer =  new String (
        '<form name="form" action="operacje/mapa_taktyczna.php" method="GET" target="ramka">'+
        '<table><tbody>'+div_oko("")+
        '<tr><td>Status obrony <input name="obrona" checked="checked" type="checkbox"></td></tr>'+
        '<tr><td>Typy Wiosek <input name="t_w" checked="checked" type="checkbox"></td></tr>'+
        '<tr><td>Raporty <input name="r_w" checked="checked" type="checkbox"></td></tr>'+
        '<tr><td>Szlachta <input name="sz_w" checked="checked" type="checkbox"></td></tr>'+
        '<tr><td>'+input_wykonaj()+'</td></tr>'+
        '</tbody></table>'+
        '</form>');
 }
       return str_buffer;
}
function nowe_okno(url, width, height) {
	wnd = window.open(url, "wnd", "width="+width + ",height="+height + ",left=50,top=50,resizable=yes,scrollbars=yes");
	wnd.focus();
}