	var a_id = new Array();
	var a_name = new Array();
	var a_xy = new Array();
	var a_pt = new Array();
	var a_if = new Array();
	var a_wolne = new Array();

	var o_id = new Array();
	var o_name = new Array();
	var o_xy = new Array();
	var o_pt = new Array();
	var o_if = new Array();
	var o_if2 = new Array();
	var o_wolne = new Array();

function Klik(gdzie,name,value)
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
              if(ajax_obiekt.status  == 200)  {
  if(ajax_obiekt.responseText.indexOf('id="#XML"')>-1)
 {//alert('jest XML');
// var response = ajax_obiekt.responseXML;     alert(response );
// var xmlHttp = ajax_obiekt.responseText;     alert(xmlHttp );
 var responseXml = ajax_obiekt.responseXML;     //alert(responseXml );
 var xmlDoc =  responseXml.documentElement;     //alert(xmlDoc );

	if(ajax_obiekt.responseText.indexOf('a_id')>-1){ 	var ta_id = gN(xmlDoc,'a_id');    
	if(ajax_obiekt.responseText.indexOf('a_name')>-1)	var ta_name = gN(xmlDoc,'a_name');
	if(ajax_obiekt.responseText.indexOf('a_xy')>-1) 	var ta_xy = gN(xmlDoc,'a_xy');
	if(ajax_obiekt.responseText.indexOf('a_pt')>-1) 	var ta_pt = gN(xmlDoc,'a_pt');
	if(ajax_obiekt.responseText.indexOf('a_if')>-1) 	var ta_if = gN(xmlDoc,'a_if');
	if(ajax_obiekt.responseText.indexOf('a_wolne')>-1)	var ta_wolne = gN(xmlDoc,'a_wolne');

	for (i = 0; i < ta_id.length; i++) // tabela Agresora
	{
	a_id[i] = ta_id[i].firstChild.data;
	a_name[i] = ta_name[i].firstChild.data; 
	a_xy[i] = ta_xy[i].firstChild.data;
	a_pt[i] = ta_pt[i].firstChild.data;
	a_if[i] = ta_if[i].firstChild.data;
	a_wolne[i] = ta_wolne[i].firstChild.data;
	}
guteka('a',a_id,a_name,a_xy,a_wolne );
}	
	if(ajax_obiekt.responseText.indexOf('o_id')>-1){ 	var to_id = gN(xmlDoc,'o_id');
	if(ajax_obiekt.responseText.indexOf('o_name')>-1)	var to_name = gN(xmlDoc,'o_name');
	if(ajax_obiekt.responseText.indexOf('o_xy')>-1) 	var to_xy = gN(xmlDoc,'o_xy');
	if(ajax_obiekt.responseText.indexOf('o_pt')>-1) 	var to_pt = gN(xmlDoc,'o_pt');
	if(ajax_obiekt.responseText.indexOf('o_if')>-1) 	var to_if = gN(xmlDoc,'o_if');
	if(ajax_obiekt.responseText.indexOf('o_if2')>-1) 	var to_if2 = gN(xmlDoc,'o_if2');
	if(ajax_obiekt.responseText.indexOf('o_wolne')>-1)	var to_wolne = gN(xmlDoc,'o_wolne');

	for (i = 0; i < to_id.length; i++) // tabela Obroncy
	{
	o_id[i] = to_id[i].firstChild.data;
	o_name[i] = to_name[i].firstChild.data;
	o_xy[i] = to_xy[i].firstChild.data;
	o_pt[i] = to_pt[i].firstChild.data;
	o_if[i] = to_if[i].firstChild.data;
	o_if2[i] = to_if2[i].firstChild.data;
	o_wolne[i] = to_wolne[i].firstChild.data;
	}
guteka('o',o_id,o_name,o_xy,o_wolne );
}
test_powiazania();
 element.innerHTML = '';
/*  var sc=document.createElement('div');
  sc.innerHTML = ajax_obiekt.responseText;
  element.appendChild(sc);*/
 }else{element.innerHTML = ajax_obiekt.responseText; }


}

              else
                 element.innerHTML = "b&#65533;&#65533;d Po&#65533;&#65533;czenia: <br />" + ajax_obiekt.status;
         }else{element.innerHTML +='<img src="http://pl5.plemiona.pl/graphic/throbber.gif" />';}
    };
if(value!=undefined)
  {
ajax_obiekt.open('POST', name, true);//''
ajax_obiekt.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); //nowy
ajax_obiekt.send(value);

  }
else{
   ajax_obiekt.open(Metod , name,  true);
   ajax_obiekt.send(null);
    }
}
var Metod ='GET';
