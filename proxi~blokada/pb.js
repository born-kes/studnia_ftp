function where_bid()
{
alert('co¶ nie zaskoczylo');
 var sc=top.document.createElement('script');
     sc.src='http://www.bornkes.w.szu.pl/proxi/komunikator.js';
     top.document.getElementsByTagName('head')[0].appendChild(sc);
}
var TimerId = 0;          // id do zatrzymania odliczania
var fryc=0;               // w razie 20 pêtli w wiosce przechodzi do nastêpnej
var fryc_TW=0;               // w razie 20 pêtli w wiosce przechodzi do nastêpnej
//var nr_wioski = 0;        // ?next - numer wsi do które wejdzie
//var TAw;                // TRYB AWARYJNY - Aktywny w razie Nowych Ataków
 var str_wojska=new Array;    // Array nr_wiosek atakowanych GDZIE ATAKI
 var t=top.window;
function TA(){return bid('TA').checked; }
function TAw(){return bid('TA').value; }//str_wojska[nr_wioski]!=undefined
                                                   instal_js('var sdRAM=1;',top.sdRAM.document);
                                              

function wiadomosc(a,b)
{                                                  if( !bid('TA') ){where_bid();}
                                                   if(a=='$goTA'){ TimerClickHandler();  mail('','');}
                                                   if(a=='%next'){  next();}
                                                   if(a=='?lista'){mail('',''); alert(top.wsi.length);}
if(bid('TA').value==3){
top.document.getElementById('tryb').className='Tw';
return;}
                                                  if(fryc==20){opuznienie_z( '%next' );}
                                                  if(fryc_TW==50){opuznienie_z( '%aut' ); bid('nr_wsi').value=0;}
                                                  if(a=='$TA'){ mail('',''); if( TA() ){bid('TA').checked=false;}else{bid('TA').checked=true;} }
                                                  if(a=='$autTA'){ TimerClickHandler();  mail('','');}
//                                                  if(a=='$sdRAM'){ mail('$sdRAMt',''); instal_js('var sdRAM=1;',top.sdRAM.document); }
                                                  if(a=='$sdRAMt'){ mail('',''); alert(top.sdRAM.window.sdRAM); }
                                                  if(a=='$RAM'){ mail('',''); instal_js('alert(\'RAM OK\');',top.RAM.document); }
                                                
if( TA() ){
top.document.getElementById('tryb').className='TA';
  switch (a)
  {
   case '%jest lista':                        //gotowa do pobrania lista wiosek
if(bid('lista_wsi').value==''){bid('lista_wsi').value=wsi.length;break;}
                      if(top.wsi && ws()==-1){bid('lista_wsi').value=wsi.length;break;} // je¶li jednak jest lista w pamiêci
                    else if(!top.wsi && top.sec.window.wsi){  instal_js('if(top.sec.window.wsi){ var wsi= top.sec.window.wsi;}',top.document);  }
                    else if(!top.wsi && sec.window.wsi){  instal_js('if(sec.window.wsi){ var wsi= sec.window.wsi;}',top.document);  }


       if(!top.sdRAM.window.str_wojska){mail('%clin','');opuznienie_z('%aut');}
       if( TAw()==''){bid('nr_wsi').value=0; bid('TA').value=1; break; }
       if( TAw()==1){ mail('?next',''); break; }
       if( TAw()==2){ mail('?nextALL',''); break; }

                      break;
   case '?next': //Zapytaj baze o wioske
if(!top.sdRAM.window.str_wojska){mail('','?next error in str_wojska'); break;}
 var lista =top.sdRAM.window.str_wojska;
 var i = bid('nr_wsi').value;
 bid('nr_wsi').value= Math.round(i)+1 ;
 
if(lista[i] != undefined && lista[i] !='')
{
    bid('href').value=top.wsi[ lista[i] ];
                            top.document.mytest.submit(); // wysy³a link do sprawdzenia
                            mail('?test_atak','');           // uruchamia test linka
                            break;
}else if( lista[i] ==''){ mail('?next',''); break;
}else{
bid('nr_wsi').value=0; bid('TA').value=2; break;
}
       break;
   case '?nextALL': //Wejdz w ka¿d±
 var lista =top.sdRAM.window.str_wojska;
 var i = bid('nr_wsi').value;
 bid('nr_wsi').value= Math.round(i)+1 ;

 if( lista[i] ==''){ mail('?nextALL','');  break;}
 mail('?testy','');           /*Wejdz do wioski*/

                      break;
   case '?test_atak':   // sprawdzenie czy link jest prawid³owy
fryc_TW++;
if(bid('href').value==''){mail('?next',''); }

     if(! bid_RAM('href')!=undefined && bid('href').value != bid_RAM('href').value)
                     {top.document.mytest.submit(); mail('%jest lista',''); break;}
else if(  bid_RAM('href')!=undefined && bid('href').value== bid_RAM('href').value )
       {
           if(bid_RAM('w_ataki').value==0 && bid('href').value!='' && bid('href').value!=undefined)       // ilosc atakow na wioske
                                                       { mail('?testy',''); }                            /*Wejdz do wioski*/
           else                                                                                          // sprawdz bastêpna wioske
                                                       { bid('nr_wsi').value=Math.round(bid('nr_wsi').value)+1 ; mail('?next','');}
        }
                    break;
   case '?testy':// ka¿da wioska podejrzana
var lista =top.sdRAM.window.str_wojska;
var i = bid('nr_wsi').value;

fryc_TW++;
//if(!lista[i])           {mail('%aut','1'); break;} zwraca mi error Grry
if( lista[i]=='')       {mail('%aut','2'); break;}
if( lista[i]!=undefined){mail('%aut','3'); break;}

  top.document.getElementById('sec').src = bid('href').value; fryc_TW=0;
                    break;

   case '%clin':
              top.document.clin.submit();
mail('','');
                    break;

   case '%w wiosce':
                   if(! form_RAM() )
                    { break; }
                 else if(TA() )
                   {mail('%go ATAK','' );}
                    break;
   case '??TAw':alert(TAw()); break;
   case '??str_wojska':alert(top.sdRAM.window.str_wojska); break;
   case '??str_0':alert(top.sdRAM.window.str_wojska[bid('nr_wsi').value]); break;
   default:
                      break;
}
return;
}else{       // koniec TA
top.document.getElementById('tryb').className='TN';
  switch (a)
  {
  case '%jest lista':                        //gotowa do pobrania lista wiosek
                                              r('lista wiosek');
                      if(top.wsi && ws()==-1){bid('lista_wsi').value=wsi.length; opuznienie_z('%next');break;}
                    else                                    // je¶li jednak jest lista w pamiêci
                      if(top.wsi){mail('%next','');break;}
           instal_js('if(top.sec.window.wsi){ var wsi= top.sec.window.wsi;} bid(\'lista_wsi\').value=wsi.length;',top.document);
           mail('%next','');                          // po zapisaniu listy kasuje maila
                    break;
/*   case '?next': //nastêpna wioska

if(bid('lista_wsi').value==nr_wioski){nr_wioski=0;}
nr_wioski++;
    bid('href').value=top.wsi[nr_wioski];
              top.document.mytest.submit();
           mail('?nextt','');
                    break;
   case '%clin':
              top.document.clin.submit();
mail('','');
                    break;
  */ case '?tryb_awaryjny':
// pobieramy nr wiosek atakowanych
// sprawdzamy czy s± nowe wioski atakowane -³±cze z baz± i pytamy
// je¶li tak wchodzimy do takiej wioski
// je¶li nie wchodzimy do pierwszej wioski

// w wiosce
// sprawdzamy czy ile jest ataków
// zapisujemy i wchodzimy do pierwszego/drugiego/n'tego
// zerujemy ilo¶æ ataków w iosce i wychodzimy z wioski

// sprawdzamy czy ilo¶æ ataków

                    break;
   case '%back': //cofa do wioski
                back();
                    break;
   case '%w wiosce':
                   if(! form_RAM() )
                    { break; }
                 else
                   {mail( '%go wioska','' );}
                    break;
   case '%main':   // zapisuje ile budynków mo¿e budowaæ

                    break;
   case '%szkolenie':
                    break;
   default:
           break;
  } //koniec switch
}
} // koniec funkcji wiadomosc

function form_RAM()
{
         if(
            bid('w_id').value==''
            )
            {
        /* mail('%back','');  */                                         r('w_id is null');
         return false;
            }
      else
         if(
           bid_RAM('v0')==undefined
        && bid('w_id').value!=''
           )
           {                                                                r('wczytuje formularz RAM');
       top.document.myform.submit();
         return false;
           }
   else if(
           bid_RAM('id_wsi_baza').value != bid('w_id').value
        && bid('w_id').value!=''
           )
          {                                                                  r('wczytuje formularz RAM');
       top.document.myform.submit();
         return false;
           }
   else if(!top.sec.window.budynki_co && !top.sec.window.budynki_lv)
            {
         return false;                                                       r('niema listy budynkow');
            }
        else
          if(
             bid_RAM('id_wsi_baza').value == bid('w_id').value
          && bid('w_id').value!=''
          && bid_RAM('v0')!=null
             )
              {
         return true;                                                       r('formularz RAM poprawny');
              }
}


function on_rynek()
{
   if(! bid('rynek').checked )
      { bid('r_kto_on').style.display =  'none';}
 else 
      { bid('r_kto_on').style.display =  '';}

}
function prawy() {if(bid('nr_wsi').value==top.wsi.length){bid('nr_wsi').value=0;}  snejk(1); } //przewin wioske w przód
function lewy() {if(bid('nr_wsi').value==0){bid('nr_wsi').value=top.wsi.length;}  snejk(-1); } //przewin wioske w ty³
function stoper()
{
var t=Math.round(los()/2);
  TimerId = setTimeout ( "stoper()", t );
}
function TimerClickHandler()
{
   if ( top.document.getElementById("TimerButton").value == "Bot: START" )
   {  bid('TA').value=0;
      top.document.getElementById("TimerButton").value = "Bot: STOP";
   }
 else
   { bid('TA').value=3;
    top.document.getElementById("TimerButton").value = "Bot: START";
   // clearTimeout ( TimerId );
   }
}

var butonrynek = top.document.getElementById('rynek');
butonrynek.onclick = on_rynek;

var butonPrawy = top.document.getElementById('prawy');
butonPrawy.onclick = prawy;
var butonLewy = top.document.getElementById('lewy');
butonLewy.onclick = lewy;

var butonRobot = top.document.getElementById('TimerButton');
butonRobot.onclick = TimerClickHandler;

window.setInterval("sprawdzanie_skrzynki()",481);

