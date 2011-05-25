function Klik(gdzie,name)
{
    var ajax_obiekt;
    try
    {
        ajax_obiekt = new ActiveXObject('Microsoft.XMLHTTP');
    }
    catch (ex)
    {
       try
       {
	  ajax_obiekt = new XMLHttpRequest();
       }
       catch (e3)
       {
          ajax_obiekt = false;
       }
    }

    ajax_obiekt.onreadystatechange  = function()
    {
         var element = gid_kes(gdzie);
         if(ajax_obiekt.readyState  == 4)
         {
              if(ajax_obiekt.status  == 200)
{
 if(ajax_obiekt.responseText.indexOf('id="#script"')>-1)
 { element.innerHTML = '';
  var sc=document.createElement('div');
  sc.innerHTML = ajax_obiekt.responseText;
  element.appendChild(sc);
 }else{element.innerHTML = ajax_obiekt.responseText; }
}

               //   element.innerHTML = ajax_obiekt.responseText;
              else
                 element.innerHTML = "b&#65533;&#65533;d Po&#65533;&#65533;czenia: <br />" + ajax_obiekt.status;
         }else{element.innerHTML +='<img src="http://pl5.plemiona.pl/graphic/throbber.gif" />';}
    };
   ajax_obiekt.open(Metod , name,  true);
   ajax_obiekt.send(null); 
}
var Metod ='GET';
