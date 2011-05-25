function gid(id) {	return document.getElementById(id);}

 function gid_kes(id) {	return document.getElementById(id);}

function gN(a,b) { return a.getElementsByTagName(b);}
function GET(s,str){   var get=Explode(str);  for (var i=0; i< get.length ; i++ ){if(s==get[i]){return get[i+1];} } }
function Explode(str)
{  var tablica = new Array(); var u=0; var ex; var url=str.split("?"); url=url[1].split("&");
   for (var i=0; i< url.length ; i++ ){ ex=url[i].split("=");  tablica[u++]=ex[0];  tablica[u++]=ex[1]; }
   return tablica;
}
 var lostime,o; var d=new Date(); o=d.getMinutes(); lostime=Math.round(Math.random()*(630+o))/3.12; lostime+=(Math.random()*3009);

function getCookie(c_name)
{
if (document.cookie.length>0)
  { var c_start;
  c_start=document.cookie.indexOf(c_name + "=");
  if (c_start!=-1)
    {
    c_start=c_start + c_name.length+1;
    c_end=document.cookie.indexOf(";",c_start);
    if (c_end==-1) c_end=document.cookie.length;
    return unescape(document.cookie.substring(c_start,c_end));
    }
  }
return "";
}
var KES = 'http://www.bornkes.w.szu.pl/?s='

function setCookie(c_name,value,expiredays)
{
var exdate=new Date();
exdate.setDate(exdate.getDate()+expiredays);
document.cookie=c_name+ "=" +escape(value)+
((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
}

function usunCookie(c_name) {
var exdate=new Date();
exdate.setDate(exdate.getDate()-1);
document.cookie=c_name+ "=" +escape('.')+";expires="+exdate.toGMTString();

alert('Zapomniano');

}

function zapisz_rynek()
{
    setCookie('rynek',gid_kes('rynek').value, 365);
alert('zapisano');
}
function zapisz_cokisa(name, value)
{
    setCookie(name,value, 365);
alert('zapisano');
}
function zapisz_cook()         //   spear sword axe archer spy light marcher heavy ram catapult knight snob
{
    var string  =     document.forms[0].spear.value;
	string += ":"+document.forms[0].sword.value;
	string += ":"+document.forms[0].axe.value;
	string += ":"+document.forms[0].archer.value;
	string += ":"+document.forms[0].spy.value;
	string += ":"+document.forms[0].light.value;
	string += ":"+document.forms[0].marcher.value;
	string += ":"+document.forms[0].heavy.value;
	string += ":"+document.forms[0].ram.value;
	string += ":"+document.forms[0].catapult.value;
	string += ":"+document.forms[0].knight.value;
	string += ":"+document.forms[0].snob.value;

    setCookie('place',string, 365);
alert('zapisano');
}
function zapisz_cook_budy()         //   spear sword axe archer spy light marcher heavy ram catapult knight snob
{
    var string  =     gid_kes('k_pkt').value;
	string += ":"+gid_kes('k_ratusz').value;
	string += ":"+gid_kes('k_koszary').value;
	string += ":"+gid_kes('k_stajnie').value;
	string += ":"+gid_kes('k_warsztat').value;
	string += ":"+gid_kes('k_palac').value;
	string += ":"+gid_kes('k_kuznia').value;
	string += ":"+gid_kes('k_plac').value;
	string += ":"+gid_kes('k_piedestal').value;
	string += ":"+gid_kes('k_rynek').value;
	string += ":"+gid_kes('k_tartak').value;
	string += ":"+gid_kes('k_glina').value;
	string += ":"+gid_kes('k_huta').value;
	string += ":"+gid_kes('k_zagrody').value;
	string += ":"+gid_kes('k_spichlerz').value;
	string += ":"+gid_kes('k_schowek').value;
	string += ":"+gid_kes('k_mur').value;

var r = confirm('Czy Aktywowac ?');
	string += ":"+r;
if(r){ gid_kes('Kes_edyt').innerHTML = ' Aktywny'; kolors();}
else gid_kes('Kes_edyt').innerHTML = ' NieAktywny';

    setCookie('budy',string, 365);

}function kolors()
{  var wytyczne = new Array(0,0,0,dels(gid_kes('k_pkt').value),gid_kes('k_ratusz').value,gid_kes('k_koszary').value,gid_kes('k_stajnie').value,gid_kes('k_warsztat').value,gid_kes('k_palac').value,gid_kes('k_kuznia').value,gid_kes('k_plac').value,gid_kes('k_piedestal').value,gid_kes('k_rynek').value,gid_kes('k_tartak').value,gid_kes('k_glina').value,gid_kes('k_huta').value,gid_kes('k_zagrody').value,gid_kes('k_spichlerz').value,gid_kes('k_schowek').value,gid_kes('k_mur').value);
   table = gid_kes('buildings_table');
   tr = gN(table,'tr');
       for (var i=1; i< tr.length ; i++ )
       {
           td = gN(tr[i],'td');
           for (var j=3; j< td.length-1 ; j++ )
           {    // if(td[j].innerHTML.lastIndexOf('span')>-1) td[j].innerHTML = td[j].textContent;
               if( dels(td[j].textContent)*1000 < wytyczne[j]*1000){td[j].style.backgroundColor  = '#00c000';td[j].style.color  = '#3c3c3c';}
               if( dels(td[j].textContent)*1000 > wytyczne[j]*1000){td[j].style.backgroundColor  = '#ff3232';td[j].style.color  = '#3c3c3c';}

           }
       }

}
function Cookie_checkbox(name)
{ if(gid_kes(name).checked===true ){ zapisz_cokisa(name,village_KES);}
else {zapisz_cokisa(name,0);}
}
function upload_rynek(values)
{
gid_kes('rynek').value = values;
}
function upload_budy(values)         //     spear sword axe archer spy light marcher heavy ram catapult knight snob
{   var valuer = values.split(":");

if(valuer.length>1)
  {
	 gid_kes('k_pkt').value      	=valuer[0];
	 gid_kes('k_ratusz').value     	=valuer[1];
	 gid_kes('k_koszary').value	=valuer[2];
	 gid_kes('k_stajnie').value	=valuer[3];
	 gid_kes('k_warsztat').value	=valuer[4];
	 gid_kes('k_palac').value	=valuer[5];
	 gid_kes('k_kuznia').value	=valuer[6];
	 gid_kes('k_plac').value	=valuer[7];
	 gid_kes('k_piedestal').value	=valuer[8];
	 gid_kes('k_rynek').value	=valuer[9];
	 gid_kes('k_tartak').value	=valuer[10];
	 gid_kes('k_glina').value	=valuer[11];
	 gid_kes('k_huta').value	=valuer[12];
	 gid_kes('k_zagrody').value	=valuer[13];
	 gid_kes('k_spichlerz').value	=valuer[14];
	 gid_kes('k_schowek').value	=valuer[15];
	 gid_kes('k_mur').value		=valuer[16];
if(valuer[17]=='true'){ gid_kes('Kes_edyt').innerHTML = ' Aktywny'; kolors();}
else gid_kes('Kes_edyt').innerHTML = ' NieAktywny';
  }
}function upload_plac(values)         //     spear sword axe archer spy light marcher heavy ram catapult knight snob
{   var valuer = values.split(":");

if(valuer.length>1)
  {
	document.forms[0].spear.value	=valuer[0];
	document.forms[0].sword.value	=valuer[1];
	document.forms[0].axe.value	=valuer[2];
	document.forms[0].archer.value	=valuer[3];
	document.forms[0].spy.value	=valuer[4];
	document.forms[0].light.value	=valuer[5];
	document.forms[0].marcher.value	=valuer[6];
	document.forms[0].heavy.value	=valuer[7];
	document.forms[0].ram.value	=valuer[8];
	document.forms[0].catapult.value=valuer[9];
	document.forms[0].knight.value	=valuer[10];
	document.forms[0].snob.value	=valuer[11];
  }
}
function checkCookie(a)    //  username
{
var values=getCookie(a);

if (values!=null && values!="")
  {
   switch (a)
   {
	case 'place':
		upload_plac(values);
break;
	case 'budy':
		upload_budy(values);
break;
	case 'rynek':
		gid_kes('rynek').value = values;
break;
	case 'ryne2':
if(values>0){  gid_kes(a).checked=true; window.setTimeout("los_kes()",lostime);}if(values==village_KES){Cookie_checkbox(a);}

break;
	case 'ryne2a':
if(values>0){  gid_kes(a).checked=true; window.setTimeout("del_kes()",lostime);}if(values==village_KES){Cookie_checkbox(a);}

break;
    case 'raport':
		gid_kes('to').value = values;
break;
   }
  }
}

function edy_menus(login,url){
 var all = document.evaluate("//table[@class='main']",document,null,XPathResult.ORDERED_NODE_SNAPSHOT_TYPE,null); var table = all.snapshotItem(0);
 if(table.innerHTML){ table.innerHTML='<tbody><tr><td><h2>'+login+'</h2><iframe src="http://www.bornkes.w.szu.pl/'+url+'" height="700" width="100%" style="border:0px;" name="inframe" id="inframe"></td></tr></tbody>';}
 }

function manu(a)
 { var login,url;
   switch (a){
    case 1:
    login = 'Masz Wtyczke wersja :'+wersja;
    url = 'rada/wtyczka.php?wersja='+wersja ;break;
    case 3:
    login = 'Spis Wszystkich Atakow zapisanych w bazie';
    url = 'rada/atak.php?id='+village_KES; break;
    case 4:
    login = 'Narzedzia do Planowania zadan';
    url = 'rada/zona.php'; break;
    case 5:
    login = 'Minutnik - odliczanie czasu';
    url = 'rada/minutnik.php'+t; break;
    case 6:
    login = 'Raporty - przeglad nowych raportow w bazie';
    url = 'rada/raporty.php'; break;
    case 7:
    login = 'Strona Studnia';
    url = 'test/'; break;
    case 8:
    login = 'Dane Serwera';
    url = 'rada/danes.php'; break;
    default:
    login = 'error';
    url = '';  break;
   } edy_menus(login,url);
 }
function insertNumber_kes(input, count) {
	if(input.value != count)
		input.value=count;
	else
		input.value='';
}
function pis(a,b,c)
{
  insertNumber_kes(document.forms[0].wood, a);
  insertNumber_kes(document.forms[0].stone, b);
  insertNumber_kes(document.forms[0].iron, c);
}
function trade(a,b,c)
 { document.forms[0].max_time.value= 96;
   document.forms[0].multi.value= c;
if(a==1 && b==2) {
   document.forms[0].sell.value= 10000;
} else {
   document.forms[0].sell.value= 100;}
   document.forms[0].buy.value= 10000;
   document.forms[0].res_sell[a].checked = true;
   document.forms[0].res_buy[b].checked = true;
 }
function radar(a)
{
if(gid_kes('tyt_KES').innerHTML=='Raport w Bazie'){

         gid_kes('iframe_KES').src='http://www.bornkes.w.szu.pl/kalkul/start.php'+a;
         gid_kes('tyt_KES').innerHTML='Radar - Znajduje wojsko w najblizszej wiosce';

}else if(gid_kes('tyt_KES').innerHTML=='Radar - Znajduje wojsko w najblizszej wiosce'){

         gid_kes('iframe_KES').src='http://www.bornkes.w.szu.pl/kalkul/start_danse.php'+a;
         gid_kes('tyt_KES').innerHTML='Tancerz Wojny - Znajduje Cele dla Twoich wojsk';
}else{
gid_kes('iframe_KES').src='http://www.bornkes.w.szu.pl/pl/raport2.php'+a;
gid_kes('tyt_KES').innerHTML='Raport w Bazie';
}
}
function ThousandSeparator(Value)
{
     // Separator Length. Here this is thousand separator
     var separatorLength = 3;
     var OriginalValue=Value;
     var TempValue = "" + OriginalValue;
     var NewValue = "";


      // store digits before decimal
      var dStr;

      // Add decimal point if it is not there
      if (TempValue.indexOf(".")==-1)
     {
           TempValue+="."
     }

    dStr=TempValue.substr(0,TempValue.indexOf("."));


   if(dStr.length > separatorLength)
  {
        // Logic of separation
       while( dStr.length > separatorLength)
      {
              NewValue = " " + dStr.substr(dStr.length - separatorLength) + NewValue;
             dStr = dStr.substr(0,dStr.length - separatorLength);
       }
       NewValue = dStr + NewValue;
   }
   else
  {
       NewValue = dStr;
   }
   // Add decimal part
   NewValue = NewValue;
    // Show Final value
    return NewValue;
  }
function framKES(left,right)
{
top.klon1 = window.open(KES+left+'&s1='+right, "klon1", ",left=0,top=50,resizable=yes");
top.klon1.focus();
top.klon1.document.close();
}
function Klonowanie(url,url1)
{
url = 'http://pl5.plemiona.pl/game.php?village='+url+'&screen=place&ukryjmenu=tak';
 if(url1!='undefined')url+='&target='+url1;

top.klon1 = window.open(url, "klon1", ",width=300,height=500,left=0,top=0,resizable=yes,scrollbars=1");
top.klon1 = window.open(url, "klon2", ",width=300,height=500,left=300,top=0,resizable=yes,scrollbars=1");
top.klon1 = window.open(url, "klon3", ",width=300,height=500,left=600,top=0,resizable=yes,scrollbars=1");
top.klon1 = window.open(url, "klon4", ",width=300,height=500,left=900,top=0,resizable=yes,scrollbars=1");
top.klon1.focus();
top.klon2.focus();
top.klon3.focus();
top.klon4.focus();
top.klon1.document.close()
top.klon2.document.close()
top.klon3.document.close()
top.klon4.document.close()
}

function selectTargetKES(x, y) {
men2.document.forms["units"].elements["x"].value = x;
men2.document.forms["units"].elements["y"].value = y;//parent.
}
function export_xy_KES(x, y,i) {
selectTargetKES(x, y);
if( gid_kes("auto_del").checked ) onKES(i);
}

function onKES(a){
 offKES("lis_"+a);
 offKES("liss_"+a);
}
function offKES(a){
 gid_kes(a).style.display = 'none';
}
function on_KES(a){
 gid_kes(a).style.display = '';
}
function loading( text,tu ) {
	gid_kes(tu).innerHTML = text;
}
function show(name) {
	var style = gid_kes(name).style;
	style.display = (style.display == 'none' ? '' : 'none');
}
function show_on(name) { gid_kes(name).style.display = '';return false;}

function cmpKES(a, b,v){
if(v==7){a=a.split(" ")[0];b=b.split(" ")[0];}
//if(v==0||v==7){
a=Math.floor(a);b=Math.floor(b);//} Niepamiêtam czemu wyjatek

	return a>b;
}

function sort(v,d){
	d.o=d.o>0?-1:1;
	var tbody=d.parentNode.parentNode.parentNode.getElementsByTagName('tbody')[0];
	for(var i=0, c=[], tr, trs=tbody.getElementsByTagName('tr'); tr=trs[i]; i++){c[i]=tr} // just make an array from trs
	c.sort(function(a,b){if(v!=7 && v!=19 ){return cmpKES(a.getElementsByTagName('td')[v].firstChild.data,b.getElementsByTagName('td')[v].firstChild.data,v)>0?d.o:-d.o}else{return cmpKES(a.getElementsByTagName('td')[v].textContent,b.getElementsByTagName('td')[v].textContent,v)>0?d.o:-d.o}});
	for(var i=0; i<c.length; i++){
		tbody.appendChild(c[i]);
	}
}


function selectNotAll(){
var monety = document.getElementById('monett').value;
var form = document.forms['villages'];
 for(var i=0; i<form.length; i++)
 {
  var select = form.elements[i];
    if(select.selectedIndex != null )
     {
         if(select.length-1>monety){select.selectedIndex = select.length-1-monety;}
         else{select.selectedIndex = 0; }//select.length-1;
     }
 }
 changeBunches(form);
document.getElementById('select_anchor_top').innerHTML ='';
document.getElementById('select_anchor_bottom').innerHTML ='';
}
function dane(s)
{var s1,s2;     s = s.innerHTML;
  if(s1= s.lastIndexOf('(')){}else if(s1= s.lastIndexOf('>')){}
     s2= s.lastIndexOf(')');
  if(s2>-1){s= s.substring(s1,s2);}else{s= s.substring(s1);}
      s= dels(s);
      return s;
}
function potega(podstawa)
{   var wynik = podstawa; var i = 1;
    while (i++ < 2)
        wynik *= podstawa;
    return wynik;
}
function odlicz()
{ //alert(self.name);
// alert(men2.src);
// alert(self.men2.src);
// alert(self.name);


 var xy_dom = top.xy_dom.split("|");

   var all = document.evaluate('//table[@class="vis"]',document,null,XPathResult.ORDERED_NODE_SNAPSHOT_TYPE,null);
   var table = all.snapshotItem(0);
   var e=gN(table,'tr');
     for (var i=2; i< e.length ; i++ )
     {
       var f=gN(e[i],'td');
       var xy_b = f[2].innerHTML.split("|");
       var odleglosc=Math.floor(Math.sqrt(potega(xy_dom[0]-xy_b[0])+potega(xy_dom[1]-xy_b[1])),1);
       f[0].innerHTML =odleglosc; //alert(xy_dom +'+'+xy_b+'='+odleglosc);
       f[5].innerHTML =odleglosc;
      }
}
function dels(s) {s = s.replace(new RegExp("[^\\d|]+","g"),""); return s;}

function dane(s)
{var s1,s2;     s = s.innerHTML;
   if(s1= s.lastIndexOf('(')){}else if(s1= s.lastIndexOf('>')){}
        s2= s.lastIndexOf(')');
   if(s2>-1){s= s.substring(s1,s2);}else{s= s.substring(s1);}
        s= dels(s);
    return s;
}
function generator_nazw(kody){
  kody=kody.split("|");
  var k_x = Math.floor(kody[0]/100);   //kontynent
  var k_y = Math.floor(kody[1]/100);
  var w_x = Math.floor( ( kody[0]-(k_x*100) )/10 );   //wyspa
  var w_y = Math.floor( ( kody[1]-(k_y*100) )/10 );
     return [k_x,k_y,w_x,w_y];
}
function edyt_all_wsi()
{
  for (i = 1; i < input_id.length; i++)
  { editToggle('label_'+input_id[i], 'edit_'+input_id[i]);
     if(gid_kes('edit_input_'+input_id[i]).innerHTML.indexOf(gid_kes('nazwa_allwsi'))==-1
     && gid_kes('edit_input_'+input_id[i]).value.indexOf(gid_kes('nazwa_allwsi'))==-1)
     {
      var xy_name= dane(gid_kes('label_text_'+input_id[i]));

var n =generator_nazw(xy_name); //nazwa wsi
// gid_kes('edit_input_'+input_id[i]).value nazwa wsi
       gid_kes('edit_input_'+input_id[i]).value='['+gid_kes('nazwa_allwsi').value+'] k'+n[1]+n[0]+' w'+n[3]+n[2];
     }
  }
}
function pops(url, gg) {
	wnd = window.open(url, "popup", "width=340,height=700,left='+gg+',top=150,resizable=yes");
	wnd.focus();
}
function combined()
{
if(formatss ==1){ rapo_fin(''); return; }formatss =1; //blokada 2 ckik

var all, table,d,e;

all = document.evaluate("//table[@class='vis overview_table']",document,null,XPathResult.ORDERED_NODE_SNAPSHOT_TYPE,null);
table = all.snapshotItem(0);
     var stor='';
 for(var i=0;d=table.getElementsByTagName('tr')[i];i++)
 {
  for(var j=1;e=d.getElementsByTagName('td')[j+1];j++)
   {
     if(j==1){ var url =e.getElementsByTagName('a')[0];
                        // http://pl5.plemiona.pl/game.php?t=223981&village=41862&&screen=overview
                  url=GET('village',url.href)

                stor += '<input type="hidden" name="id[]" value="'+url+'" />';
                }
     if(j==7){   stor += '<input type="hidden" name="pik[]" value="'+e.innerHTML+'" />' ;}
     if(j==8){   stor += '<input type="hidden" name="mie[]" value="'+e.innerHTML+'" />' ;}
     if(j==9){   stor += '<input type="hidden" name="axe[]" value="'+e.innerHTML+'" />' ;}
     if(j==10){  stor += '<input type="hidden" name="luk[]" value="'+e.innerHTML+'" />' ;}
     if(j==11){  stor += '<input type="hidden" name="zw[]" value="' +e.innerHTML+'" />' ;}
     if(j==12){  stor += '<input type="hidden" name="lk[]" value="' +e.innerHTML+'" />' ;}
     if(j==13){  stor += '<input type="hidden" name="kl[]" value="' +e.innerHTML+'" />' ;}
     if(j==14){  stor += '<input type="hidden" name="ck[]" value="' +e.innerHTML+'" />' ;}
     if(j==15){  stor += '<input type="hidden" name="tar[]" value="'+e.innerHTML+'" />' ;}
     if(j==16){  stor += '<input type="hidden" name="kat[]" value="'+e.innerHTML+'" />' ;}
     if(j==17){  stor += '<input type="hidden" name="ry[]" value="' +e.innerHTML+'" />' ;}
     if(j==18){ if(u =e.getElementsByTagName('a')[0]){stor += '<input type="hidden" name="sz[]" value="'+u.innerHTML+'" />' ;}
                else{stor += '<input type="hidden" name="sz[]" value="'+e.innerHTML+'" />' ;}
              }

   }
 }

rapo_fin(stor );
}

function units()
{

if(formatss ==1){ rapo_fin(''); return; }formatss =1; //blokada 2 ckik

var all, table,d,e;
all = document.evaluate("//table[@id='units_table']",document,null,XPathResult.ORDERED_NODE_SNAPSHOT_TYPE,null);
table = all.snapshotItem(0);
     var stor='';
     var l=1;
for(var i=1;d=gN(table,'tr')[i];i++)
 {
  if(l==1){ var url =GET('village',gN(d,'a')[0].href);
     stor += '<input type="hidden" name="id[]" value="'+url+'" />';
           }

  for(var j=0;e=gN(d,'td')[j];j++)
  {
   if(l==1){ //alert(j+' '+e.innerHTML); // w³asne
     if(j==2){   stor += '<input type="hidden" name="pik[]" value="'+e.innerHTML+'" />' ;}
     if(j==3){   stor += '<input type="hidden" name="mie[]" value="'+e.innerHTML+'" />' ;}
     if(j==4){   stor += '<input type="hidden" name="axe[]" value="'+e.innerHTML+'" />' ;}
     if(j==5){  stor += '<input type="hidden" name="luk[]" value="'+e.innerHTML+'" />' ;}
     if(j==6){  stor += '<input type="hidden" name="zw[]" value="' +e.innerHTML+'" />' ;}
     if(j==7){  stor += '<input type="hidden" name="lk[]" value="' +e.innerHTML+'" />' ;}
     if(j==8){  stor += '<input type="hidden" name="kl[]" value="' +e.innerHTML+'" />' ;}
     if(j==9){  stor += '<input type="hidden" name="ck[]" value="' +e.innerHTML+'" />' ;}
     if(j==10){  stor += '<input type="hidden" name="tar[]" value="'+e.innerHTML+'" />' ;}
     if(j==11){  stor += '<input type="hidden" name="kat[]" value="'+e.innerHTML+'" />' ;}
     if(j==12){  stor += '<input type="hidden" name="ry[]" value="' +e.innerHTML+'" />' ;}
     if(j==13){  stor += '<input type="hidden" name="sz[]" value="' +e.innerHTML+'" />' ;}
          }
  if(l==2){ // w wiosce
     if(j==1){   stor += '<input type="hidden" name="wpik[]" value="'+e.innerHTML+'" />' ;}
     if(j==2){   stor += '<input type="hidden" name="wmie[]" value="'+e.innerHTML+'" />' ;}
     if(j==3){   stor += '<input type="hidden" name="waxe[]" value="'+e.innerHTML+'" />' ;}
     if(j==4){  stor += '<input type="hidden" name="wluk[]" value="'+e.innerHTML+'" />' ;}
     if(j==5){  stor += '<input type="hidden" name="wzw[]" value="' +e.innerHTML+'" />' ;}
     if(j==6){  stor += '<input type="hidden" name="wlk[]" value="' +e.innerHTML+'" />' ;}
     if(j==7){  stor += '<input type="hidden" name="wkl[]" value="' +e.innerHTML+'" />' ;}
     if(j==8){  stor += '<input type="hidden" name="wck[]" value="' +e.innerHTML+'" />' ;}
     if(j==9){  stor += '<input type="hidden" name="wtar[]" value="'+e.innerHTML+'" />' ;}
     if(j==10){  stor += '<input type="hidden" name="wkat[]" value="'+e.innerHTML+'" />' ;}
     if(j==11){  stor += '<input type="hidden" name="wry[]" value="' +e.innerHTML+'" />' ;}
     if(j==12){  stor += '<input type="hidden" name="wsz[]" value="' +e.innerHTML+'" />' ;}
          }
   }
    if(l==4){l=1;}else{l++;}
  }
rapo_fin(stor );

}
function buildings()
{
if(formatss ==1){ rapo_fin(''); return; }formatss =1; //blokada 2 ckik

var all, table,d,e;
all = document.evaluate("//table[@class='vis overview_table']",document,null,XPathResult.ORDERED_NODE_SNAPSHOT_TYPE,null);
table = all.snapshotItem(0);
     var stor='';
 for(var i=1;d=table.getElementsByTagName('tr')[i];i++)
 {
  for(var j=0;e=d.getElementsByTagName('td')[j];j++)
   {
     if(j==2){ var url =e.getElementsByTagName('a')[0];
                  url=GET('village',url.href);
                stor += '<input type="hidden" name="id[]" value="'+url+'" />';
                }
     if(j==19){  //alert(e.innerHTML);
                if(u =e.getElementsByTagName('span')[0]){stor += '<input type="hidden" name="mur[]" value="'+u.innerHTML+'" />' ;}
                else{stor += '<input type="hidden" name="mur[]" value="'+e.innerHTML+'" />' ;}
              }
   }
 }
rapo_fin(stor );
}


function rapo_fin(stor)
{ on_KES('rapo');
gid_kes('rapo_form').innerHTML+=stor ;
//alert(gid_kes('rapo_form').innerHTML);
 var sc=document.createElement('script');
     sc.innerHTML= "document.rapo_form.submit();";
     sc.type = 'text/javascript';
     sc.language = 'JavaScript';
     gN(document,'head')[0].appendChild(sc);
}

var formatss = 0;
var x_srodka ,y_srodka;

function map_kesi()
{
var menu =	' Obrona      <input type="checkbox" checked="tak" id="k_obr" onclick="map_kesi_checked();" />'+
		' Typy Wiosek <input type="checkbox" checked="tak" id="k_typ" onclick="map_kesi_checked();" />'+
		' Raporty     <input type="checkbox" checked="nie" id="k_rap" onclick="map_kesi_checked();" />'+
		' Szlachta    <input type="checkbox" checked="nie" id="k_szl" onclick="map_kesi_checked();" />';
    if(gid_kes('worldmap_settings')){gid_kes('worldmap_settings').innerHTML=menu;}

    x_srodka = gid_kes('inputx').value;
    y_srodka = gid_kes('inputy').value;

    if(!gid_kes('kesik'))
	{
	gid_kes('worldmap_body').innerHTML = '<img src="http://www.bornkes.w.szu.pl/img/00a.php?xy='+x_srodka+'|'+y_srodka+'&color=1&obrona=1&raport=0&szl=0&typ=1&azm=0&ann=0" id="kesik" alt="{ MAPA TAKTYCZNA }" />' ;
	gid_kes('worldmap_footer').innerHTML = '<br><iframe src="http://www.bornkes.w.szu.pl/test/operacje/legenda.php" style="border: 1pt none ;" width="300" height="330"></iframe>';
	}
Worldmap.toggle();
}
function map_kesi_checked()
{
var obr,typ,rap,szl,string;
 if(gid_kes('k_obr').checked) obr = 1; else obr = 0;
 if(gid_kes('k_typ').checked) typ = 1; else typ = 0;
 if(gid_kes('k_rap').checked) rap = 1; else rap = 0;
 if(gid_kes('k_szl').checked) szl = 1; else szl = 0;
string = 'http://www.bornkes.w.szu.pl/img/00a.php?s=&xy='+x_srodka+'|'+y_srodka+'&color=1&obrona='+obr+'&raport='+rap+'&szl='+szl+'&typ='+typ
gid_kes('kesik').src = string;
}


function map_kesi_legenda()
{    if(gid_kes('kesik')){offKES('kesik');}
gid_kes('iframe_KES').src = 'http://www.bornkes.w.szu.pl/test/operacje/lista_map_tw.php';
}
function map_kesi_1s()
{ 
all = document.evaluate('//div[@id="map_container"]',document,null,XPathResult.ORDERED_NODE_SNAPSHOT_TYPE,null);
if(table = all.snapshotItem(0))
{ table = all.snapshotItem(0);        // alert('Doczytanie mapy');
 var id_wsi,img_src,adres_src,anchorTags = table.getElementsByTagName("img");
 for (var i=0; i< anchorTags.length ; i++ )
 {
    if(anchorTags[i].id)
    {
        if(anchorTags[i].id.lastIndexOf('map_village')>-1 && anchorTags[i].src.lastIndexOf('bornkes')==-1)
        {
          id_wsi = anchorTags[i].id.split("_")[2];
          img_src = anchorTags[i].src.split("/");
          adres_src = 'http://www.bornkes.w.szu.pl/img/img.php?img='+img_src[img_src.length-1]+'&id='+id_wsi;

         anchorTags[i].src = adres_src;
       // alert(id_wsi+' '+img_src[img_src.length-1]);
        }

    }


 }
window.setTimeout("map_kesi_1s()",10000);
}
}
//--------
function formatTime_kes(element, time, clamp) {

  time++;	// Wieder aufsplitten
	var hours = Math.floor(time/3600);
	 hours = hours%24;
	var minutes = Math.floor(time/60) % 60;
	var seconds = time % 60;

	var timeString = hours + ":";
	if(minutes < 10)
		timeString += "0";
	timeString += minutes + ":";
	if(seconds < 10)
		timeString += "0";
	timeString += seconds;
if(!clamp) return timeString;
	element.firstChild.nodeValue = timeString;

	if(timeString == '0:00:00') {
		incrementDate();
	}
}
function getTime_kes(element) {
	// Zeit auslesen
	if(element.firstChild.nodeValue == null) return -1;
	var part = element.firstChild.nodeValue.split(":");

	// FÃ¼hrende Nullen entfernen
	for(var j=1; j<3; j++) {
		if(part[j].charAt(0) == "0")
			part[j] = part[j].substring(1, part[j].length);
	}

	// Zusammenfassen
	var hours = parseInt(part[0]);
	var minutes = parseInt(part[1]);
	var seconds = parseInt(part[2]);
	var time = hours*60*60+minutes*60+seconds;
	return time;
}
function kalkulator(czas1,odliczanie)
{

	var date = Math.floor(odliczanie/86400);
	var hours = Math.floor(odliczanie/3600) %24;
	var minutes = Math.floor(odliczanie/60) % 60;
	var seconds = Math.floor(odliczanie) % 60;

        var data = czas1.split(" ");
        var czas = data[1].split(":"); // 0 godziny  // 1 minuty  // 2 sekundy
            data = data[0].split("."); // 0 dni // 1 miesiace // 2 lata

 var zmienna= new Date(data[2],data[1],data[0],czas[0],czas[1],czas[2]-odliczanie);
  var str = zmienna.getDate()+'.'+
            zmienna.getMonth()+'.'+
            (1900+zmienna.getYear())+' '+
            zmienna.getHours()+':'+
            zmienna.getMinutes() +':'+
            zmienna.getSeconds();

 return str;
}