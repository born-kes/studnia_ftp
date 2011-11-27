function gid(id) {
	return document.getElementById(id);
}


//function on(co) { gid(co).style.display = '';}
//function off(co) { gid(co).style.display = 'none'; }
function guteka(log,ile,name,xy,wolne)
{ //alert(ile.length);
   var str='<table class="main"  cellpadding="1" cellspacing="2">'+
   '<tbody><tr><td /><td style="width:200px;"></td><th><a href="javascript:bb_code_go();">bb_code</a></th></tr>';
 if(log=='o') str+= '<tr>'+
          '<td colspan="4" id="tr0" style="display:none;">'+name[0]+'</td><td id="cel_0"></td>'+
          '<td id="op_0" style="display:none;"><input type="radio" name="Podswietl" title="Podswietl ta wioske w propoz" onclick="podswietlanie_opcji(0)" /></td>'+
          '<td>'+
          '<input id="limit_0" type="text" size="2" title="Limit atakow ma wszystkie wioski" onchange="przepisz_all(o_id,\'limit_\',this.value);">'+
          '</td></tr>';

      for (var i=1; i< ile.length ; i++ )
    { var l = ile[i];
     if(log=='a') var place =' <a href="http://pl5.plemiona.pl/game.php?village='+l+'&screen=place" title="zobacz plac" target="_blank"><img src="http://pl5.plemiona.pl/graphic/buildings/place.png" /></a>';
      else var place ='';
 var clasy='';
    if(log=='o'){ if(!o_if2[i]){ var c = ' checked="tak"';  clasy=' class="metro"'; }else var c=''; }

     str+='<tr id="tr'+l+'"><td>'+
     ' <a href="#" onclick="'+log+'_id['+i+']='+log+'_xy['+i+']='+log+'_name['+i+']=0;'+log+'_if['+i+']=false;offKES(\'tr'+l+'\'); return false;" title="Usun z listy\">'+
     '<img src="../img/usun.png" /></a>'+
     '</td><td'+clasy+'>'+
     unescape(unescape(name[i]))+
     ' <a href="#" onclick="show(\'mob_'+l+'\');Klik(\'mob_'+l+'\',\'../pl/raport2.php?id='+l+'&yes=pies\'); return false;" title="pokarz raport\">'+
     '<img src="../img/rap.png" /></a>'+
     place +
     '<div id="mob_'+l+'" style="width:200px;display:none;" />'+
     '</td><td>'+
     xy[i]+
     '</td>';
  str+= '<th>';
  
 if(log=='a')str+='<a href="javascript:typs('+i+');" id="img_'+i+'">'+ typ[wolne[i]]+'</a>'+
 '<div id="typ_ataku_form_'+i+'" class="metro" style="display:none;" />';
 else str+=wolne[i];
 
    str+='</th><td id="cel_'+l+'"></td>';
    
if(log=='o'){ 
   str+= '<td id="op_'+l+'" style="display:none;">'+
          '<input type="radio" onclick="podswietlanie_opcji('+l+')" title="Podswietl ta wioske w propoz" name="Podswietl">'+
          '<input type="checkbox"'+c+' onclick="blokowanie_opcji('+l+')" title="zablokuj ta wioske w wyborze" id="bloka_'+l+'">'+
          '</td>';
    str+= '<td>'+
          '<input id="limit_'+i+'" type="text" size="2" title="Limit atakow">'+
          '</td>';
            }

    str+='</tr>';
    }
        str+='</tbody></table>';
   gid_kes('T_'+log+'gr_fin').innerHTML=str;

}
function bb_code_go()
{
var str = "[quote][b]\n"; 
       for (var i=1; i< o_xy.length ; i++ )
       {
if(o_if[i])str+="\t [coord]" + o_xy[i] + "[/coord] \n";
       }
str += "[/b][/quote]\n";
on_KES('Table_obr_wlasna');
gid_kes('query_obr').value= str;
}

function ua(){   for (var i=0; i< o_id.length ; i++ ){ if( o_if2[i]){  gid_kes('tr'+o_id[i]).style.display='none';}else{blokowanie_opcji(o_id[i]); gid_kes('tr'+o_id[i]).style.display='';}   gid_kes('op_'+o_id[i]).style.display=''; } }
function select_kalkulator(j)
{ if( !a_if[j] || a_wolne[j]==0 )    gid_kes('cel_'+a_id[j]).innerHTML ='';
 var wa,wo,czas1 = gid_kes('czas1').value;
   if(gid_kes('czas1_c').checked)
   {
    var od_czas = Math.floor(gid_kes('czas1_od').value);
    var do_czas = Math.floor(gid_kes('czas1_do').value);
     if(od_czas>do_czas)do_czas=od_czas;
   }
  var select = '<input name="ata[]" value="'+a_id[j]+'" type="hidden"><input name="woj[]" value="'+a_wolne[j]+'" type="hidden"><select onchange ="ile_gdzie_poszlo();" name="obr[]">';
      for (var i=0; i< o_id.length ; i++ )
      { if(i==0) select += '<option value="0">'+o_name[i]+'</option>';
        if(!o_if[i] || i==0) continue;
        
    wa = a_xy[j].split("|");
    wo = o_xy[i].split("|");
 var odleglosc=Math.sqrt(potega(wa[0]-wo[0])+potega(wa[1]-wo[1]));
  if(czas1!='')
  {
    var data = kalkulator(czas1,(odleglosc*a_wolne[j]*60));
     if(gid_kes('czas1_c').checked)
     {
        var data1 = data .split(" ");
        var czas = data1[1].split(":"); // 0 godziny  // 1 minuty  // 2 sekundy

       if(gid_kes('czas1_c').checked && (od_czas>Math.floor(czas[0]) || do_czas<Math.floor(czas[0]) ) ){continue;}
     }

  }else var data ='Nie poda³e¶ daty ataku';
   select += '<option value="'+o_id[i]+'">'+data +' : '+o_name[i]+' ('+o_xy[i]+')</option>';
      }
   select +='</select>';
   gid_kes('cel_'+a_id[j]).innerHTML = select;
}


function ga()
{  for (var j=1; j< a_id.length ; j++ )
  {   if(!a_if[j] || a_wolne[j]==0){    gid_kes('cel_'+a_id[j]).innerHTML =''; continue;}
     select_kalkulator(j);

   }
 ua();
 ile_gdzie_poszlo();
}
function ile_gdzie_poszlo_juz(this1,id)
{
   function test_o_limit(k,s){if(gid_kes('limit_'+s).value !='' && gid_kes('limit_'+s).value<=k && !gid_kes('bloka_'+o_id[s]).checked )return true; else return false;  }
   if( test_o_limit(this1,id) )
    {gid_kes('bloka_'+o_id[id]).checked=true; blokowanie_opcji(o_id[id]);on_KES("tr"+o_id[id] ); }

var k = gid_kes().innerHTML.split(" ")[1]*1;
 if(k[s]==0 && o_if2[s] && !gid_kes('bloka_'+o_id[id]).checked ){offKES("tr"+o_id[id] );}else{on_KES("tr"+o_id[id] );r++;}
 loading('x '+ k+1 ,"cel_"+o_id[id] );

if(vv){vv=true;test_powiazania();}
}
function ile_gdzie_poszlo()
{ 	var k = Array(); var r=0;
        var form = document.forms['ajax_t'];

for(var s=0; s<o_id.length; s++){k[s]=0;}

	for(var i=0; i<form.length; i++) {
		var select = form.elements[i];
		if(select.selectedIndex != null) {
for(var j=0; j<o_id.length; j++)
 {
    if(select.value==o_id[j]){ k[j]++;}
  }
                                          }
                                           }
          function test_o_limit(k,s){if(gid_kes('limit_'+s).value !='' && gid_kes('limit_'+s).value<=k && !gid_kes('bloka_'+o_id[s]).checked )return true; else return false;  }
 for(var s=0; s<o_id.length; s++)
 {      if(s!=0 && o_if[s]) if( test_o_limit(k[s],s) ){gid_kes('bloka_'+o_id[s]).checked=true; blokowanie_opcji(o_id[s]);on_KES("tr"+o_id[s] ); }
 if(k[s]==0 && o_if2[s] && !gid_kes('bloka_'+o_id[s]).checked ){offKES("tr"+o_id[s] );}else{on_KES("tr"+o_id[s] );r++;}


 loading('x '+ k[s] ,"cel_"+o_id[s] );
 }
if(r>2 && !vv){vv=true;test_powiazania();}
}


function blokowanie_opcji(id)
{var form = document.forms['ajax_t'];

  for(var i=0; i<form.length-1; i++)
  {var select = form.elements[i];
	if(select.selectedIndex != null)
	{
		for(var j=0; j<select.options.length; j++)
		{
		var optio = select.options[j];
		   if(optio.value==id)
		   {
			if(select.value != id){
			 optio.disabled = (optio.disabled == true ? false : true);
			 if(optio.className=='reds')podswietlanie_opcji(id);
			 }
			else
			 optio.disabled = '';
		       break;
		   }
		}
	}
  }

}
function podswietlanie_opcji(id)
{var form = document.forms['ajax_t'];

  for(var i=0; i<form.length-1; i++)
  {	var select = form.elements[i];
	if(select.selectedIndex != null)
	{
		for(var j=1; j<select.options.length; j++)
		{
		var optio = select.options[j];
		  if(optio.value==id && optio.disabled==false)
		   optio.className='reds';
		  else
		   optio.className='';
		}
	}
  }

}
function przepisz_all(a,b,c)
{   for (var i=0; i< a.length ; i++ )
    {// alert(b+ a[i]);
        gid_kes(b+ i ).value=c;
    }
}
//# z pliku generatora
           var center_x=500; var center_y=500; var zoom=0; var static='http://pl5.twmaps.org/showmap.php';
            inqlude=''; var iss='rd_';
function gmap(text){
	gid_kes( iss+'xy' ).value = text;
}
function check(){
 var okolica = gid_kes(iss+'oko').value;
 var check = ((zoom + 1)*okolica)/2;
return check;
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
function url_dla_img()
{var img = document.getElementsByTagName("img");
	for (var i = 0; i < img.length-1; i++)
  {if(img[i].className!='')
	img[i].src = 'http://pl5.plemiona.pl/graphic/unit/unit_'+img[i].className+'.png';

  }
}
function test_go(name)
{
var testowane = gid_kes('dane_'+name).innerHTML*1;
if(gid_kes('dane_'+name).innerHTML=='' || testowane >3500 ){alert(testowane +' wiosek na liscie. Za ma³a lub zadurza ilosc by kontynuowaæ. '); return;}

selectAobr(document.forms[0],name);
}
function test_powiazania()
{ if(vv){ gid_kes('T_fin3').innerHTML ='<div class="metro" align="center"> <input type="submit" value="Dalej"></div>'; return;}
if(a_id && o_id )
gid_kes('T_fin1').innerHTML =' <button onclick="ga();return false;">przelicz</button>';
on_KES('T_fin2');
}
function typs(j)
{
   show('typ_ataku_form_'+j);
 if(gid_kes('typ_ataku_form_'+j).innerHTML=='')
 {
 var str ='';
 for(var i=0; i<typ_nr.length; i++)
   {
   if(a_wolne[j]==typ_nr[i]) var clas = 'class="reds"'; else var clas='';
    str +='<a href="#" onclick="typs_zmien('+j+','+i+');return false;" '+clas+' />'+typ[typ_nr[i]]+'</a>';
   }
 gid_kes('typ_ataku_form_'+j).innerHTML= str;
 }
}
function typs_zmien(j,i)
{
 gid_kes('img_'+j).innerHTML=typ[typ_nr[i]];
 a_wolne[j]=typ_nr[i];
 select_kalkulator(j);
 gid_kes('typ_ataku_form_'+j).innerHTML='';
offKES('typ_ataku_form_'+j);
}
  var typ_nr = new Array(0,9,10,11,18,22,30,35);
  var typ = new Array;
 typ[0] = '__';
 typ[9] = '<img src="http://pl5.plemiona.pl/graphic/unit/unit_spy.png" title="Zwiad tempo 9/pole" />';
 typ[10] = '<img src="http://pl5.plemiona.pl/graphic/unit/unit_light.png" title="LK i KL tempo 10/pole" />';
 typ[11] = '<img src="http://pl5.plemiona.pl/graphic/unit/unit_heavy.png" title="CK tempo 11/pole" />';
 typ[18] = '<img src="http://pl5.plemiona.pl/graphic/unit/unit_axe.png" title="Piki, ³uki i Topory tempo 18/pole" />';
 typ[22] = '<img src="http://pl5.plemiona.pl/graphic/unit/unit_sword.png" title="Miecze tempo 22/pole" />';
 typ[30] = '<img src="http://pl5.plemiona.pl/graphic/unit/unit_ram.png" title="Tarany i Katapolty tempo 30/pole" />';
 typ[35] = '<img src="http://pl5.plemiona.pl/graphic/unit/unit_snob.png" title="Gruby tempo 35/pole" />';
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
     '<a href="javascript:show_calendar(\'document.form.czas1\', document.form.czas1.value);" /><img src="'+inqlude+'img/cal.gif" alt="Clicknij Tu by ustaliæ Datê" width="16" border="0" height="16" />'
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
         '<input name="'+a+'gracz" value="" type="text" size="14" onchange="selectAobr(this.form, \'dane_T_'+a+'gr\');" />'
        );
       return str_buffer;
}

function input_zoom()
{
        var str_buffer = new String (
         '<input type="button" value=" - " name="P2" onclick="minuss()" />'+
         '<input value="3" type="text" id="rd_oko" size="3" value="5" disabled="tak" />'+
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
document.getElementById('rd_oko').value = Lupa[which_lupa]
document.getElementById(iss+'oko').value = Lupa[which_lupa]
}
}

function pluss(){
if (which_lupa<Lupa.length-1){
which_lupa++
document.getElementById('rd_oko').value = Lupa[which_lupa]
document.getElementById(iss+'oko').value = Lupa[which_lupa]
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
   // select_typ na stronie g³ównej
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