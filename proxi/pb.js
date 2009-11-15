var TimerId = 0;
var fryc=0;

function wiadomosc(a,b)
{                                                 if(fryc==20){opuznienie_z( '%next' );}
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
   case '?next': //nastêpna wioska
var f =bid('nr_wsi').value;
    bid('href').value=top.wsi[f-1];
              top.document.mytest.submit();
                    break;
   case '%next': //nastêpna wioska
                next();
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



function stoper()
{
var t=Math.round(los()/2);
  TimerId = setTimeout ( "stoper()", t );
}
function TimerClickHandler()
{
   if ( top.document.getElementById("TimerButton").value == "START" )
   {
    stoper();
    top.document.getElementById("TimerButton").value = "STOP";
   }
 else
   {
    top.document.getElementById("TimerButton").value = "START";
    clearTimeout ( TimerId );
   }
}

//var butonRobot = top.document.getElementById('TimerButton');
//butonRobot.onclick = TimerClickHandler;

window.setInterval("sprawdzanie_skrzynki()",2538);
