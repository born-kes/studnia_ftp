function gN(a,b) { return a.getElementsByTagName(b);}

function bid(id) {
if( top.document.getElementById(id))
   {return top.document.getElementById(id);}
else if(parent.parent.document.getElementById(id))
   {return parent.parent.document.getElementById(id);}
}
function bid_RAM(id) {
if( top.RAM.document.getElementById(id))
   {return top.RAM.document.getElementById(id);}
else if(parent.parent.RAM.document.getElementById(id))
   {return parent.parent.RAM.document.getElementById(id);}
}
function mail(temat, tresc)
{
 bid('mail_temat').value= temat;
 bid('mail_mail').value= tresc;
}
       function sprawdzanie_skrzynki()
 {
  if(bid('mail_temat')!=null && bid('mail_temat').value!=''){var mail_temat_value =bid('mail_temat').value;}
else{var mail_temat_value ='';}
  if(bid('mail_mail')!=null && bid('mail_mail').value!=''){var mail_mail_value =bid('mail_mail').value;}
else{var mail_mail_value ='';}

    wiadomosc(mail_temat_value , mail_mail_value);

}
function szukaj(a,b)
{    if(a.value){a=a.value;}
else if(a.innerHTML){a=a.innerHTML;}
    if(a.lastIndexOf(b)>-1){return true;}else{return false;}
}
function dane(s)
{var s1,s2;     s = s.innerHTML;
  if(s1= s.lastIndexOf('(')){}else if(s1= s.lastIndexOf('>')){}
     s2= s.lastIndexOf(')');
  if(s2>-1){s= s.substring(s1,s2);}else{s= s.substring(s1);}

      s= dels(s);            //alert(s);
      return s;
}
function dels(s) {
s = s.replace(new RegExp("[^\\d|]+","g"),"");
//s = s.replace(new RegExp(",","g"),"");
 return s;}
function podmiana(a,b,c) {
a = a.replace(b,c);
return a; }
function Explode(str)
{  var tablica = new Array(); var u=0;
   url=str.split("?");
   url=url[1].split("&");
    for (var i=0; i< url.length ; i++ )
    {var  ex=url[i].split("=");
         tablica[u++]=ex[0];
         tablica[u++]=ex[1];
    } return tablica;
}
function plaut(s) {

if(s.innerHTML.lastIndexOf(">")>-1){s= s.innerHTML.split('>');s=s[1];}
else{s=s.innerHTML;}
  //alert(s.innerHTML.split(">"));

s = s.replace(new RegExp("[^\\a-zA-Z]+","g"),"");
//s = s.replace(new RegExp(",","g"),"");
 return s;}
function GET(s){   for (var i=0; i< get.length ; i++ ){if(s==get[i]){return get[i+1];} } }

function ajaxCreate()
{
	try
	{
		if(window.XMLHttpRequest) {
			return new XMLHttpRequest();
		}
		else if(window.ActiveXObject) {
			return new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	catch (e)
	{
		return false;
        }
}
function ajaxSync(url, data) {
	var req = ajaxCreate();
	if(data != null) {
	req.open("POST", url, true);
	req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        req.setRequestHeader("Content-length", data.length);
        req.setRequestHeader("Connection", "close");
        req.send(data);
	}	
	return req;
}
function instal_js(s,b){
 var sc=b.createElement('script');
     sc.innerHTML=s;
     b.getElementsByTagName('head')[0].appendChild(sc);
}
var NULL = null;
var units = new Array('spear', 'sword', 'axe', 'archer','spy','light','marcher','heavy','ram','catapult','knight','snob');
function r(txt){ bid('BOT_mail').value=txt; } //raport BOta
function mt(){ return bid('mail_temat').value; }
function mm(){ return bid('mail_mail').value; }
function ws(){ if(bid('lista_wsi')!=null){ return bid('lista_wsi').value;}else{return -1;} }
function los(){ var s,t,o;var d=new Date(); o=d.getMinutes();
if(Math.round(Math.random()*7 )>7.5)
  {s=Math.round(Math.random()*(11+o))*12;} else { s=103+o;}
for(var i=0;i<Math.round( Math.random()*20 );i++){o =Math.random();}
   t=Math.round((o+8)*Math.random())+s;
if((t/2)>12000){r('duze opuznienie '+Math.round(Math.round(t/1000)/60)*0.1+'min.' ); }
 return t;}
function get_js(a){ if(top.sec.window.a){ var budy=top.sec.window.a;}  }
function back(){mail('',''); var i =bid('nr_wsi').value-1;  top.document.getElementById('sec').src = top.wsi[i];}
function next(){
     mail('','');
  if(!top.wsi)
  {bid('lista_wsi').value='';
   opuznienie('%aut'); return;
   }
     bid('w_id') .value='';
     bid('bob')  .checked=false;
     bid('k_bob').checked=false;
     bid('s_bob').checked=false;
     bid('w_bob').checked=false;
     bid('r_bob').checked=false;
     bid('sz_bob').checked=false;
 snejk(1);
}
function snejk(a){
 var f =bid('nr_wsi').value*1; 
   if(f==top.wsi.length && 0<a){return;}  //    ostatnia wioska
     top.document.getElementById('sec').src = top.wsi[f+a];
     bid('nr_wsi').value=f+a;

}
function opuznienie(a)
{ mail('',a);
var t=Math.round(los()/2);
  setTimeout ( "mail('"+a+"','')", t );
}function opuznienie_z(a)
{ mail('',a);
var t=618;
r('opuznienie z '+a);
  setTimeout ( "mail('"+a+"','')", t );
}
function refreh()
{
top.document.getElementById('sec').src = top.document.getElementById('sec').src
}
function wyciagaj(class,nr)
{    var all,table;
     var wsi=new Array;

  all = document.evaluate('//table[@class="'+class+'"]',document,null,XPathResult.ORDERED_NODE_SNAPSHOT_TYPE,null);
     if(all.snapshotItem(nr)){
   table = all.snapshotItem(nr);
     if(class!='box'){return gN(table,'a'); }
else if(class=='box'){return gN(table,'td');}
                              } return false;
}/*
################################ W WIOSCE ######################
*/function co_moge()    // Ratusz co mo¿na budowaæ
{
      if(wyciagaj("vis",3)){var s= wyciagaj("vis",3);}
 else if(wyciagaj("vis",2)){var s= wyciagaj("vis",2);}
 else if(wyciagaj("vis",1)){var s= wyciagaj("vis",1);}
 else if(wyciagaj("vis",0)){var s= wyciagaj("vis",0);}
 else {                                               r('error: blad pojawil siê przy wczytaniu budynkow do produkcji w ratuszu');
 return false;}
      var budynki_co= new Array();
      var j=0;
      for (var i=0; i< s.length ; i++ )
      {
         if(plaut(s[i]).indexOf('Rozbudujdopoziomu')>-1 || plaut(s[i]).indexOf('Wybuduj')>-1 )
         {
           budynki_co[j++]=plaut(s[i-1])
           budynki_co[j++]=s[i].href;
         }
      }
 return budynki_co;
}
function wioska_listbud()    // wioska => gdzie wejsc
{
       if(budynki_co )
       {
        for (var i=0; i< budynki_co.length ; i++ )
          {
            if(czy_do(budynki_co[i]))
             {
              top.document.getElementById('sec').src =budynki_lv[i];
              return;
             }
          }
       mail('%next','');
       return; //nigdzie mnie nie skierowa³o
       }
     else
       {
       mail('%back','');
       return;                                                               r('Niema budynkow w RAM');
        }
}
function czy_do(a)// w wiosce ustala gdzie wejdzie
{      var RAM = bid_RAM('v1').value;
//alert(a);
  switch (a)
  {
   case 'Ratusz':
       if( bid('b_op').checked==true
        && bid('bob').checked==false
        && bid_RAM('v0').value!=''
          )
       {return true;}
    else
       {bid('bob').checked=true;
        return false;
       }
    break;
   case 'Koszary':
       if(
          bid('k_op').checked==true
        && (
          bid('k_bob').checked==false
          && (
              szukaj(RAM,'pik')||szukaj(RAM,'mie')||szukaj(RAM,'luk')||szukaj(RAM,'axe')
              )
            )
          )
         {return true;}
      else
         {
           bid('k_bob').checked=true;
          return false;
         }
    break;
   case 'Stajnia':
       if( bid('s_op').checked==true
        && bid('s_bob').checked==false
        && (
            szukaj(RAM,'zw')||szukaj(RAM,'ck')||szukaj(RAM,'lk')||szukaj(RAM,'kl')
            )
         )
         {return true;}
      else
         {
          bid('s_bob').checked=true;
         return false;
         }
    break;
   case 'Warsztat':
       if( bid('w_op').checked==true
       &&  bid('w_bob').checked==false
       &&  ( szukaj(RAM,'tar') || szukaj(RAM,'kat') )
          )
         {return true;}
      else
         {
          bid('w_bob').checked=true;
         return false;
         }
    break;
   case 'Plac':
       if( bid('p_op').checked==true
       &&  bid('p_bob').checked==false)
         {return true;}
      else
         {
          bid('p_bob').checked=true;
         return false;
         }

                               //r('skierowalo mnie na plac? i co mam tu robic?');
    break;
   case 'Rynek':
       if( bid('rynek').checked==true
       &&  bid('r_bob').checked==false)
         {return true;}
      else
         {
          bid('r_bob').checked=true;
         return false;
         }
    break;
   case 'Paac':
       if( bid('palac').checked==true
       &&  bid('sz_bob').checked==false)
         {return true;}
      else
         {
          bid('sz_bob').checked=true;
         return false;
         }
    break;
   default:
         return false;         r('nic tu do roboty');
   break;
  }         // w wiosce ustala gdzie wejdzie
}/*
######################### RATUSZ ####################
*/function budowa()
{
        if(top.sec.window.budy && bid('bob').checked==false)
       {                                                                          r('jestem w ratuszu patrze co by zbudowac ');
             for (var i=0; i< budy.length ; i++ )
             {
                if( czy(budy[i]) )
                { top.document.getElementById('sec').src =budy[i+1]; return;}
             }
       bid('bob').checked=true;
       mail('%back','');
       }
   else
       {
       mail('%back','');
       }

}
function czy(a)  //Ratusz => sprawdza czy co¶ budowac
{
 if(bid_RAM('v0')!=null)
  {
    var RAM = bid_RAM('v0').value;
  }
 else
  {
      return false;                                                   r('RAM is null');
  }
  switch (a)
  {
   case 'Ratusz':
                 return szukaj(RAM,'ratusz');
       break;
   case 'Koszary':
                 return szukaj(RAM,'koszary');
       break;
   case 'Stajnia':
                 return szukaj(RAM,'stajnie');
       break;
   case 'Warsztat':
                 return szukaj(RAM,'warsztat');
       break;
   case 'Paac':
                 return szukaj(RAM,'palac');
       break;
   case 'Kunia':
                 return szukaj(RAM,'kuznia');
       break;
   case 'Plac':
                 return szukaj(RAM,'plac');
       break;
   case 'Piedesta':
                 return szukaj(RAM,'piedestal');
       break;
   case 'Rynek':
                 return szukaj(RAM,'rynek');
       break;
   case 'Tartak':
                 return szukaj(RAM,'tartak');
       break;
   case 'Cegielnia':
                 return szukaj(RAM,'cegielnia');
       break;
   case 'Hutaelaza':
                 return szukaj(RAM,'huta');
       break;
   case 'Zagroda':
                 return szukaj(RAM,'zagroda');
       break;
   case 'Spichlerz':
                 return szukaj(RAM,'spichlerz');
       break;
   case 'Schowek':
                 return szukaj(RAM,'schowek');
       break;
   case 'Murobronny':
                 return szukaj(RAM,'mur');
       break;
   default:
      return false;
    break;
   }
}/*
################################## SZKOLENIE ##############################
*/function co_szkolic()
{
  var l=0;
  var j=0;
  var units = new Array('spear', 'sword', 'axe', 'archer','spy','light','marcher','heavy','ram','catapult','knight','snob');
  var szkolenie_co=new Array();
  var szkolenie= wyciagaj("main",0);
    for (var i=1; i<szkolenie.length ; i++ )
    {
        if(szkolenie[i].href.indexOf("javascript:insertUnit(document.forms[1]")>-1)
        {
          if(document.getElementById(units[l]))
           {
             szkolenie_co[j++]=units[l];
             szkolenie_co[j++]=dels(szkolenie[i].innerHTML);
             l++;
           }
         else
           {
           l++;i--;  /* TEGO budynkow nie mo¿na rozbudowac//*/
           }
        if(l==l.length){i=szkolenie.length;}
        }
    }

 return szkolenie_co ;
}
function szkolenie_w()
{
       if(!top.sec.window.units)
       {
      return false;
       }
       else
       if(top.sec.window.units)
       {                            //sprawdz czy baza ka¿e
        var unit =top.sec.window.units;
                 for (var i=unit.length-1; i>-1 ; i-- )
              {   //  jest to          i      jest w zleceniu
                 if(unit[i]=='archer'    && szukaj(bid_RAM('v1'),'luk') )
                 {  //zlec     if name         ilosc     zmniejsz if
                  insertUnitB( unit[i], ilsz(  unit[i+1], ilsw('stajnie')  ) );
                 }
            else if(unit[i]=='axe'       && szukaj(bid_RAM('v1'),'axe') )
                 {
                  insertUnitB( unit[i], ilsz(  unit[i+1], ilsw('stajnie') && ilsw('warsztat')  ) );
                 }
            else if(unit[i]=='sword'     && szukaj(bid_RAM('v1'),'mie') )
                 {
                  insertUnitB( unit[i], ilsz(  unit[i+1], ilsw('stajnie')  ) );
                 }
            else if(unit[i]=='spear'     && szukaj(bid_RAM('v1'),'pik') )
                 {
                  insertUnitB( unit[i], ilsz(  unit[i+1], ilsw('stajnie')  ) );
                 }
            else if(unit[i]=='heavy'    && szukaj(bid_RAM('v1'),'ck') )
                 {
                  insertUnitB( unit[i], ilsz(  unit[i+1], ilsw('warsztat')  ) );
                 }
            else if(unit[i]=='marcher'  && szukaj(bid_RAM('v1'),'kl') )
                 {
                  insertUnitB( unit[i], ilsz(  unit[i+1], ilsw('warsztat')  ) );
                 }
            else if(unit[i]=='light'    && szukaj(bid_RAM('v1'),'lk') )
                 {
                  insertUnitB( unit[i], ilsz(  unit[i+1], ilsw('warsztat')  ) );
                 }
            else if(unit[i]=='spy'      && szukaj(bid_RAM('v1'),'zw') )
                 {
                  insertUnitB( unit[i], ilsz(  unit[i+1], ilsw('warsztat')  ) );
                 }
            else if(unit[i]=='ram'      && szukaj(bid_RAM('v1'),'tar') )
                 {
                  insertUnitB( unit[i], ilsz(  unit[i+1],false  ) );
                 }
            else if(unit[i]=='catapult' && szukaj(bid_RAM('v1'),'kat') )
                 {
                  insertUnitB( unit[i], ilsz(  unit[i+1],false  ) );
                 }
               } //endfor
        return true;
       }/* koniec unit istneje  */                                   r('wojska przekazane, zlecam szkolenie');
}
function insertUnitB(a,b)
{
      if(a=='spear')   {top.sec.document.forms[1].spear.value=b;}
 else if(a=='sword')   {top.sec.document.forms[1].sword.value=b;}
 else if(a=='axe')     {top.sec.document.forms[1].axe.value=b;}
 else if(a=='archer')  {top.sec.document.forms[1].archer.value=b;}
 else if(a=='spy')     {top.sec.document.forms[1].spy.value=b;}
 else if(a=='light')   {top.sec.document.forms[1].light.value=b;}
 else if(a=='marcher') {top.sec.document.forms[1].marcher.value=b;}
 else if(a=='heavy')   {top.sec.document.forms[1].heavy.value=b;}
 else if(a=='ram')     {top.sec.document.forms[1].ram.value=b;}
 else if(a=='catapult'){top.sec.document.forms[1].catapult.value=b;}

}
function ilsw(b) // stajnie / warsztaty
{  if(b='stajnie')
   {
     if(
        szukaj(bid_RAM('v1'),'ck')
     || szukaj(bid_RAM('v1'),'kl')
     || szukaj(bid_RAM('v1'),'lk')
     || szukaj(bid_RAM('v1'),'zw')
        )
        {return true;}
    else
        {return false;}
   }
 else
   if(b='warsztat')
   {
     if(
        szukaj(bid_RAM('v1'),'tar')
     || szukaj(bid_RAM('v1'),'kat')
        )
        {return true;}
    else
        {return false;}
   }
}
            // ile szkolic a=max b=warunek
function ilsz(a,b)
{
        if(a<400 && b){return a; }
   else if(a<1000&& b){return (a/2);}
   else if(a>999 && b){return 300;}
   else if(a<400 &&!b){return a; }
   else if(a<1000&&!b){return (a/2);}
   else if(a>999 &&!b){return 300;}
}
function w_zlecenie()
{
  switch (GET('screen'))
  {
   case 'barracks':
      bid('k_bob').checked=true;
      break;
   case 'stable':
      bid('s_bob').checked=true;
      break;
   case 'garage':
      bid('w_bob').checked=true;
      break;
   default:
      break;
   }
}
function subiform()
{     var element = document.forms[1];
      var str = '';
      for(var i=0;i<element.length;i++)
      {str+=element[i].name+'='+element[i].value+'&';}
      if(str !== ''){var zapisz =ajaxSync(element.action,str);}
    w_zlecenie();
}
function bot()
{
   if ( top.document.getElementById("TimerButton").value == "Bot: STOP" ){return true;}else{return false;}
}