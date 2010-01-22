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
 top.document.getElementById('sec').src =link[0].href;
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
i++;
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
     top.document.getElementById('sec').src = top.RAM.window.przybycia[bid_RAM('nr_wsi')-1];
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
  { top.document.getElementById('sec').src=monety[i];}
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
top.document.getElementById('sec').src =linkix[2].href

}else{
  all = document.evaluate('//table[@class="vis"]',document,null,XPathResult.ORDERED_NODE_SNAPSHOT_TYPE,null);
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
           oferty[i].innerHTML='<td></td><td></td><td></td><td></td><td></td><td></td><td></td>';i--;
         }i++;

         
      }


 var form = gN(document,'form');
           table.innerHTML+='<tr><th colspan="4">Oferty Nie od '+r_kto+' sa ukryte</th></tr>';
 var form = gN(document,'form');
if(form.length>2)
   { top.sec.document.forms[2].submit();}
else
   {     opuznienie('%next'); }


alert(top.sec.document.forms[2].elements[0].name );
// vis 3 (lista stron)
// vis 4 oferty (tr)
                             }
}

}
window.setInterval("sprawdzanie_skrzynki()",94);
startTimer();