var proxi_str = top.document.getElementById('sec');

/*
##########################
#     Gdzie jestem ??    #
##########################
*/
var href = gN(document,'a')[0].href;
    if(href.indexOf('village')==-1){href = gN(document,'input')[0].value;}
var get= Explode(href);

  bid('w_id').value=GET('village');

/*
##########################
#     Kontrola Wiadomosci
##########################
*/function wiadomosc(a,b){
 switch (a)
 {
 case 'gdzie_ataki?':
                    alert(str_wojska);
                    break;
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
 case '%go ATAK':   // zapisuje ile budynków mo¿e budowaæ
                    mail('','');
                    TA_ataki();

                    break;
 case '%main':   // zapisuje ile budynków mo¿e budowaæ
                    mail('','');
                    budowa();
                    break;
 default:
   break;
 } //endswitch;
}
/*
########################
# informowanie o ataku #
########################
 if(wyciagaj("box",2))
{
 bid('atak_wsi').value=dane(wyciagaj("box",2)[0]);

if(bid_RAM('ataki_player') &&
bid('atak_wsi').value>bid_RAM('ataki_player').value)
 {
  if(bid('TA'))
  {
    if(!bid('TA').checked){ bid('TA').checked= true; mail('%aut',''); }
    else{ /* Tryb Awaryjny ju¿ aktywny *//* }
  }
  else{ alert('Nowy atak. Tryb Awaryjny nie osi±galny'); }

 }else if(bid_RAM('ataki_player') && bid('atak_wsi').value==bid_RAM('ataki_player').value)
         {  if(bid('TA')){bid('TA').checked=false;}  }
}
else
{bid('atak_wsi').value=0; if(bid('TA')){bid('TA').checked=false;} }*//*

########################
# funkcja awaryjna kieruj±ca na liste wszystkich wiosek           aut();
########################
*/ function aut()
{var link = gN(document.getElementById('menu_row2'),'a');
if(plaut(link[0])!=='Przegldy'){alert('error przy aut');aut();return;}
 proxi_str.src =link[0].href;
}/*
##########################
# Lista Wiosek
##########################
*/if(
  (ws()< 1 || bid('atak_wsi').value>0)
 && GET('screen')==='overview_villages'
     )
{ var lista_wsi;
//     if( wyciagaj("vis",2) ){    lista_wsi=wyciagaj("vis",2); var KP = 1;}else 
 if( wyciagaj("vis",1) ){    lista_wsi=wyciagaj("vis",1);}

     var wsi=new Array;
       for (var i=0; i< lista_wsi.length ; i++ )
        {  wsi[i] = lista_wsi[i].href; }//if(KP==1){i++;} 
}

  if(GET('screen')==='overview_villages')
{ opuznienie_z('%jest lista'); }  if(GET('screen')==='info_command'){ opuznienie_z('%back'); }/*
##########################
# Lista Wiosek            + ataki/pomoc
##########################
*/ if(bid('atak_wsi').value>0 && GET('screen')==='overview_villages') // sprawdz czy jeste¶ na li¶cie wiosek - ok
{   var licz=0; var str_wojska=new Array;
      for (var i=0; i< wsi.length ; i++ )
       {
if(lista_wsi[i].innerHTML.indexOf('title="Atak"')>-1) { str_wojska[licz++]=i;} 
//if(lista_wsi[i].innerHTML.indexOf('title="Pomoc"')>-1){ str_wojska=//' Pomoc:'
       }
if(!top.sdRAM.document.str_wojska){ instal_js('if(top.sec.window.str_wojska){ var str_wojska= top.sec.window.str_wojska;}',top.sdRAM.document);}
else{mail('%clin','');opuznienie_z('%jest lista');}

if(ws()< 1)
  {// mail('jest lista','ataki '+str_wojska);
  }
else
  {//mail('','ataki '+str_wojska);
  }
}/*
#################################################################################
# Wioska                lista budynkow
########################
*/ if(bid('w_id').value!='' && GET('screen')==='overview')        // pobieranie adresow budynkow które s± w wiosce
{
     if( wyciagaj("vis",3) ){    var przybycia=wyciagaj("vis",3) ;}
else if( wyciagaj("vis",2) ){    var przybycia=wyciagaj("vis",2) ;}

    var budynki = wyciagaj("main",0);
      var budynki_co= new Array();
      var budynki_lv= new Array();
      for (var i=0; i< budynki.length ; i++ )
      {
         budynki_co[i] = plaut(budynki[i]);
         budynki_lv[i] = budynki[i].href;
//i++;                                      //w³±czyæ gdy jest premium
      }
// wysy³am maila ¿e jestem w wiosce
opuznienie_z('%w wiosce');
opuznienie('%w wiosce');
}
function TA_ataki()
{
     if( wyciagaj("vis",3) ){    var przybycia=wyciagaj("vis",3) ;}
else if( wyciagaj("vis",2) ){    var przybycia=wyciagaj("vis",2) ;}
else {alert('nic'); return; }

 if(przybycia.length>bid_RAM('w_ataki').value)
 {
     if(! top.RAM.window.przybycia )
     {
      instal_js('if(top.sec.window.przybycia){ var przybycia= top.sec.window.przybycia;} bid_RAM(\'nr_wsi\')=0;',top.RAM.document);
     }
  // wejdz w info o ataku// => info istnieje// => licz_przybycia jest mniejsze od ilo¶ci przybyæ
   else if(top.RAM.window.przybycia && bid_RAM('nr_wsi')<top.RAM.window.przybycia.length)
   { bid_RAM('nr_wsi').value= Math.round( bid_RAM('nr_wsi') )+1 ;
     proxi_str.src = top.RAM.window.przybycia[bid_RAM('nr_wsi')-1];
   }
    else{ mail('%aut',''); }
/*wyjdz z wioski*/
  } else{ mail('%aut',''); }
}/*
########################
# RATUSZ                Co moge budowac
########################
*/ if(bot() && GET('screen')=='main')
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
*/ if(bot() &&(
   GET('screen')=='barracks'
|| GET('screen')=='stable'
|| GET('screen')=='garage')
     )
{
var units = co_szkolic();
 if(units.length>0)
      {
    if( szkolenie_w() ){mail('%submit','');}else{mail('%back','');}
      }
  else
      {
    w_zlecenie();
    opuznienie('%back');
      }
}/*
########################
#  Pa³ac
########################
*/ if(bot() &&
   GET('screen')=='snob'
     )
{

var monety = gN(document,"a");
var i =monety.length-1;
 if(i>0)
      {
if(monety[i].innerHTML.indexOf('Wybij monet')>-1)
  { proxi_str.src=monety[i];}
else{   opuznienie('%next');}
      }
  else
      {
   opuznienie('%back');
      }
}


   /*###################################*/
if(bot() &&GET('screen')=='place')
{
 bid('p_bob').checked=true;
    opuznienie_z('%back');
}


if(GET('screen')=='place'
|| GET('screen')=='map'
|| (GET('screen')=='market' && GET('mode')=='send')
)
{
var linki = document.getElementById('inputx');
linki.onkeyup = xProcess;
}
/*
########################
#  RYNEK
########################
*/ if( bot() && 
   GET('screen')=='market'
&& bid('rynek').checked
     )
    {
     if( GET('mode')!='other_offer' )
{
    var linkix= wyciagaj("vis",0);
proxi_str.src =linkix[2].href

}else{
var wood,stone,iron,kupcy ,czym_handlujemy;

  all = document.evaluate('//table[@class="vis"]',document,null,XPathResult.ORDERED_NODE_SNAPSHOT_TYPE,null);
     if(all.snapshotItem(1)){

      table = all.snapshotItem(1);
 kupcy = gN(table,'th')[0].innerHTML.split(" ")[1].split("/");   //  alert(kupcy[0] );

if(kupcy[0]*1 < 19){ mail('%next',''); }
    kupcy = Math.floor(kupcy[0] /10); // tyle ofert mo¿emy przyj±æ
    wood = Math.floor(gid("wood") .innerHTML/10000); // surowców starczy na tyle ofert
    stone =Math.floor(gid("stone").innerHTML/10000);
    iron = Math.floor(gid("iron") .innerHTML/10000);
 if(wood > kupcy){wood = kupcy;}
 if(stone > kupcy){stone = kupcy;}
 if(iron > kupcy){iron = kupcy;}



//alert(kupcy+" x " +wood+":"+stone+":"+iron);
}                                              // oferty które mogê skupiæ z wioski


     if(all.snapshotItem(4)){
   table = all.snapshotItem(4);
 var oferty = gN(table,'tr');

    if(bid('r_kto').value!='')
      {
       var r_kto  = bid('r_kto').value; //rynek oferty od kogo // 
      }
    else
      {
       var r_kto  ='[-BAE-]';
      }
var tdd; 

      for (var i=1; i< oferty.length ; i++ )
      {
         if( oferty[i].innerHTML.indexOf(r_kto)==-1 )
         {
           oferty[i].innerHTML='<th colspan="7" />';i--;
         }else{
 var tdd = gN(oferty[i],'td');
var ofert_na_rynku = dels(tdd[6].innerHTML);
/*  kupcy  wood  stone  iron  ofert_na_rynku  */

     if(tdd[1].innerHTML.indexOf('title="Glina"')>-1)
     { if(stone<ofert_na_rynku){oferty[i].innerHTML = podmiana(oferty[i].innerHTML ,'value="1"','value="'+stone+'"');}
       else           {oferty[i].innerHTML = podmiana(oferty[i].innerHTML ,'value="1"','value="'+ofert_na_rynku+'"');}
     }
else if(tdd[1].innerHTML.indexOf('title="Drewno"')>-1)
     { if(wood<ofert_na_rynku){oferty[i].innerHTML = podmiana(oferty[i].innerHTML ,'value="1"','value="'+wood+'"');}
       else         {oferty[i].innerHTML = podmiana(oferty[i].innerHTML ,'value="1"','value="'+ofert_na_rynku+'"');}
     }
else if(tdd[1].innerHTML.indexOf('elazo"')>-1)
     { if(iron<ofert_na_rynku){oferty[i].innerHTML = podmiana(oferty[i].innerHTML ,'value="1"','value="'+iron+'"');}
       else         {oferty[i].innerHTML = podmiana(oferty[i].innerHTML ,'value="1"','value="'+ofert_na_rynku+'"');}
     }

       }
         i++;
      }
           table.innerHTML+='<tr><th colspan="4">Oferty Nie od '+r_kto+' sa ukryte</th></tr>';

                             } // koniec edycji ofert

 var form = gN(document,'form');

     if(form.length>2){ top.sec.document.forms[2].submit();}
else if(wood*1 > 1 || stone*1 > 1 || iron*1 > 1)
   {

     if(all.snapshotItem(3))
     {
       table = all.snapshotItem(3);
        var strony = gN(table,'a'); 
        var strong= dels(gN(table,'strong')[0].innerHTML)*1; // strona na której jeste¶my  alert(strong);

         for (var i=0; i< strony .length ; i++ )  // petla zmienia strony a¿ do ostatniej
        {
           if(strong<dels(strony[i].innerHTML)*1)
              { proxi_str.src = strony[i].href; break;}
        }
 if(strong>dels(strony[strony.length-1].innerHTML)*1)
              { alert('Przeszukano wszystkie oferty, koniec Pracy. Dziekuje'); }
      } // koniec edycji zmiany strony ofert na rynku

   }
else
   { opuznienie('%next'); }
                      
} // konec poleceñ dla "obecne oferty"

} // koniec poleceñ dla rynku


window.setInterval("sprawdzanie_skrzynki()",94);
startTimer();