/*
##########################
#     Gdzie jestem ??    #
##########################
*/var href = gN(document,'a')[0].href;
  var get= Explode(href);
   bid('w_id').value=GET('village');/*
##########################
#     Kontrola Wiadomosci
##########################
*/function wiadomosc(a,b){
 switch (a)
 {
 case '%LL':
                    opuznienie_z(wsi.length);
                    break;
 case'%unit':
                    mail('','');
                    break;
 case'%aut':
                    mail('','');
                    aut();
                    break;
 case '%submit':
                    mail('','');
                    subiform();
                    opuznienie_z('%back');
                    break;
 case '%budy':
                    opuznienie_z(budy);
                    break;
 case '%refreh':
                    refreh();
                    break;
 case'%go wioska':
                    mail('','');
                    wioska_listbud();
                    break;
   case '%main':   // zapisuje ile budynków mo¿e budowaæ
                    mail('','');
                    budowa()
                    break;
 default:
   break;
 } //endswitch;
}
/*
########################
# informowanie o ataku #
########################
*/ if(wyciagaj("box",2))
{ bid('atak_wsi').value=dane(wyciagaj("box",2)[0]);}
else
{bid('atak_wsi').value=0;}/*

########################
# funkcja awaryjna kieruj±ca na liste wszystkich wiosek           aut();
########################
*/ function aut()
{var link = gN(document.getElementById('menu_row2'),'a');
if(plaut(link[0])!=='Przegldy'){alert('error przy aut');aut();return;}
 top.document.getElementById('sec').src =link[0].href;
}/*
##########################
# Lista Wiosek
##########################
*/if(
  (ws()< 1 || bid('atak_wsi').value>0)
 && GET('screen')==='overview_villages'
     )
{    var lista_wsi=  wyciagaj("vis",1);
     var wsi=new Array;
       for (var i=0; i< lista_wsi.length ; i++ )
        {  wsi[i] = lista_wsi[i].href; }
}

  if(GET('screen')==='overview_villages')
{ opuznienie_z('%jest lista'); }/*
##########################
# Lista Wiosek            + ataki/pomoc
##########################
*/ if(bid('atak_wsi').value>0 && GET('screen')==='overview_villages') // sprawdz czy jeste¶ na li¶cie wiosek - ok
{   var str='';
      for (var i=0; i< lista_wsi.length ; i++ )
       {
if(lista_wsi[i].innerHTML.indexOf('title="Atak"')>-1) { str+=' Atak:'+dane(lista_wsi[i]);}  // ta wioska jest atakowana
if(lista_wsi[i].innerHTML.indexOf('title="Pomoc"')>-1){ str+=' Pomoc:'+dane(lista_wsi[i]);} // tu idzie pomoc
       }
if(ws()< 1)
  {// mail('jest lista','ataki '+str);
  }
else
  {//mail('','ataki '+str);
  }
}/*
#################################################################################
# Wioska                lista budynkow
########################
*/ if(bid('w_id').value!='' && GET('screen')==='overview')        // pobieranie adresow budynkow które s± w wiosce
{
    var budynki = wyciagaj("main",0);
      var budynki_co= new Array();
      var budynki_lv= new Array();
      for (var i=0; i< budynki.length ; i++ )
      {
         budynki_co[i] = plaut(budynki[i]);
         budynki_lv[i] = budynki[i].href;
      }
// wysy³am maila ¿e jestem w wiosce
opuznienie_z('%w wiosce');
opuznienie('%w wiosce');
}/*
########################
# RATUSZ                Co moge budowac
########################
*/ if(GET('screen')=='main')
{
 var budy = co_moge();

 if(budy.length>0)  //je¶li co¶ mo¿na budowaæ to %mail je¶li nie bo %back
      {
   opuznienie_z('%main');
      }
   else
      {
   opuznienie('%back');
   bid('bob').checked=true;
      }
}/*
########################
#  koszary/ stajnie/ warsztaty  - Co moge szkolic
########################
*/ if(
   GET('screen')=='barracks'
|| GET('screen')=='stable'
|| GET('screen')=='garage'
     )
{
var units = co_szkolic();
 if(units.length>0)
      {
    szkolenie_w();
      }
  else
      {
    w_zlecenie();
    opuznienie('%back');
      }
}


   /*###################################*/
if(GET('screen')=='place')
{
 bid('p_bob').checked=true;
    opuznienie_z('%back');
}


if(GET('screen')=='place'
|| GET('screen')=='map'
|| GET('screen')=='market')
{
var linki = document.getElementById('inputx');
linki.onkeyup = xProcess;
}

window.setInterval("sprawdzanie_skrzynki()",2538);
startTimer();