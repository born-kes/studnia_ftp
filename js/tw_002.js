var bset=false;
var actrow;

function selecturl(s) {
	var v = s.options[s.selectedIndex].value;

 document.images.map.src = static + '?id=' + s_hex[v];
 center_x=s_x[v]; 
 center_y=s_y[v]; 
 zoom =s_zoom[v];
}
function getElement(id)
{
if (document.layers)
    return document.layers[id];
else if (document.all)
    return document.all[id];
else if (document.getElementById)
    return document.getElementById(id);
}

function GetCoords(object)
{ //alert('HidePicker');
    var l=0;
    var t=0;
    if (object.offsetParent)
    {
	l=object.offsetLeft;
	t=object.offsetTop;
	while(object=object.offsetParent)
	{
	    l+=object.offsetLeft;
	    t+=object.offsetTop;
	}
    }
    return[l,t];
}

function GetCoordsById(id)
{
    return GetCoords(getElement(id));
}

/******** ALLY SEARCH **********/

/*    ainputv.onkeyup = function () { SearchAlly(ac); return false; };



*/
var temp_ainput;



/*******************************/

var cb_options_save=null;


var hex="0123456789ABCDEF";
var searchcount;
var searchtype;

function CreateSearchButton(stype,scount)
{
    var pimgsearch = document.createElement('img');
    attr = document.createAttribute('src');
    attr.nodeValue='http://static.twmaps.org/search.png';
    pimgsearch.setAttributeNode(attr);

    attr = document.createAttribute('id');
    attr.nodeValue=stype+scount+'searchimg';
    pimgsearch.setAttributeNode(attr);

    pimgsearch.style.position='relative';
    pimgsearch.style.top='3px';
    pimgsearch.style.left='2px';

    attr = document.createAttribute('border');
    attr.nodeValue='0';
    pimgsearch.setAttributeNode(attr);

    var pasearch = document.createElement('a');
    attr = document.createAttribute('href');
    attr.nodeValue='#';
    pasearch.setAttributeNode(attr);

    pasearch.onclick = function () { Search(stype,scount); return false; };
    pasearch.appendChild(pimgsearch);
    //Suche ENDE

    return pasearch;
}

function CreateRGBHidden(stype,scount)
{
    var prgbhidden = document.createElement('input');
    attr = document.createAttribute('type');
    attr.nodeValue="hidden";
    prgbhidden.setAttributeNode(attr);
    attr = document.createAttribute('name');
    attr.nodeValue=stype+scount+"rgb";
    prgbhidden.setAttributeNode(attr);
    attr = document.createAttribute('id');
    attr.nodeValue=stype+scount+"rgb";
    prgbhidden.setAttributeNode(attr);
    attr = document.createAttribute('value');
    attr.nodeValue="ffffff";
    prgbhidden.setAttributeNode(attr);
    return prgbhidden;
}

function CreateColorSelect(stype,scount)
{
    var pa = document.createElement('a');
    attr = document.createAttribute('href');
    attr.nodeValue='#';
    pa.setAttributeNode(attr);
    attr = document.createAttribute('id');
    attr.nodeValue=stype+scount+'l';
    pa.setAttributeNode(attr);

    var pc = scount.toString();
    pa.onclick = function () { ShowPicker(stype+pc); return false; };

    var pimg = document.createElement('img');
    attr = document.createAttribute('src');
    attr.nodeValue='http://static.twmaps.org/blank2.png';
    pimg.setAttributeNode(attr);

    attr = document.createAttribute('id');
    attr.nodeValue=stype+scount+'img';
    pimg.setAttributeNode(attr);

    attr = document.createAttribute('border');
    attr.nodeValue='0';
    pimg.setAttributeNode(attr);

    attr = document.createAttribute('width');
    attr.nodeValue="20";
    pimg.setAttributeNode(attr);

    attr = document.createAttribute('height');
    attr.nodeValue="20";
    pimg.setAttributeNode(attr);

    pimg.style.borderColor='#000000';
    pimg.style.borderStyle='solid';
    pimg.style.borderSize='1px';
    pimg.style.backgroundColor='#ffffff';
    pimg.style.position='relative';
    pimg.style.left='5px';
    pimg.style.top='5px';
    pa.appendChild(pimg);
    return pa;
}

var allycount=0;
var aselect_save=null;
function AddAllyMarker()
{
    var attr;
    allycount++;
    var allyspan=getElement('allymarkers');
    var aselect;
    if (aselect_save!=null)
    {
	aselect= aselect_save.cloneNode(true);
	aselect.setAttribute('name','a'+allycount);
	aselect.setAttribute('id','a'+allycount);
    }
    else
    {
    aselect= document.createElement('select');
    attr = document.createAttribute('name');
    attr.nodeValue='a'+allycount;
    aselect.setAttributeNode(attr);
    attr = document.createAttribute('id');
    attr.nodeValue='a'+allycount;
    aselect.setAttributeNode(attr);

    for (var i=0;i<allys.length;i++)
    {
	var new_ally= new Option(allys[i][1],allys[i][0] );
	aselect.options[aselect.length]=new_ally;
    }
    aselect_save=aselect;
    }
    //Color Selector
    var aa = CreateColorSelect('a',allycount);
    //Suche Button
    var aasearch = CreateSearchButton('a',allycount);
    //Hidden RGB Input
    var argbhidden =CreateRGBHidden('a',allycount);


    allyspan.appendChild(aselect);
    allyspan.appendChild(aasearch);
    allyspan.appendChild(aa);
    allyspan.appendChild(argbhidden);
    allyspan.appendChild(document.createElement('br'));

//    FillSelect('a'+allycount);
}

var playercount=0;

function AddPlayerMarker()
{
    var attr;
    playercount++;
    var playerspan=getElement('playermarkers');

    var pinput= document.createElement('input');
    attr = document.createAttribute('name');
    attr.nodeValue='p'+playercount;
    pinput.setAttributeNode(attr);
    attr = document.createAttribute('id');
    attr.nodeValue='p'+playercount;
    pinput.setAttributeNode(attr);
    attr = document.createAttribute('type');
    attr.nodeValue='text';
    pinput.setAttributeNode(attr);

    //Color Selector
    var pa = CreateColorSelect('p',playercount);
    //Suche Button
    var pasearch = CreateSearchButton('p',playercount);
    //Hidden RGB Input
    var prgbhidden =CreateRGBHidden('p',playercount);

    playerspan.appendChild(pinput);
    playerspan.appendChild(pasearch);
    playerspan.appendChild(pa);
    playerspan.appendChild(prgbhidden);
    playerspan.appendChild(document.createElement('br'));
}

var villagecount=0;



var oHTTP = false;
var m_x = 0;
var m_y = 0;


function MapClick(e)
{
	var coords=GetVillageCoords(e);
	var map0xy=GetCoords(getElement('map0'));
	
	var v_x=coords[0];
	var v_y=coords[1];
	m_x = coords[2]-map0xy[0];
	m_y = coords[3]-map0xy[1]; //alert(coords+""+map0xy);
	gmap(v_x+"|"+v_y);

//off('map0');
if(iss=='a_')
img_go('ra',m_x,m_y);
else if(iss=='o_')
img_go('ro',m_x,m_y);

ShowVillageInfo(); 
}
function NOClick(si)
{
	var coords=getElement(si+'xy').value.split("|");
	var mapxy=GetCoords(getElement('map'));
	var map0xy=GetCoords(getElement('map0'));
	
	m_x = Math.floor(coords[0])*(zoom+1)+(mapxy[0]-map0xy[0]);
	m_y = Math.floor(coords[1])*(zoom+1)+(mapxy[1]-map0xy[1]);
alert('x'+Math.floor(coords[0])+" "+(mapxy[0]+' '+map0xy[0])+"\n y"+Math.floor(coords[1])+" "+(mapxy[1]+' '+map0xy[1])+"\n zoom "+(zoom+1));
if(si=='a_')
img_go('ra',m_x,m_y);
else if(si=='o_')
img_go('ro',m_x,m_y);

ShowVillageInfo(); 
}

function ShowVillageInfo(){              // mrygaj�cy kursor po kliknieciu

                	var mapol_img=getElement("mapol_img");
			mapol_img.style.display="block";
			mapol_img.style.visibility="visible";		
			mapol_img.style.position="absolute";
			mapol_img.style.left=m_x-2+"px";
			mapol_img.style.top=m_y-2+"px";
			mapol_img.src="http://static.twmaps.org/bl"+zoom+"_2.gif";
           
}

function HideVillageInfo(){
        var mapol_img=getElement("mapol_img");
	mapol_img.style.visibility="hidden";		
	mapol_img.style.display="none";
	mapol_img.style.position="absolute";
	mapol_img.style.left="-500px";
	mapol_img.style.top="-500px";
    	var mapol=getElement("mapol");
	mapol.style.visibility="hidden";		
	mapol.style.display="none";
    	mapol.style.position="absolute";
	mapol.style.left="-500px";
	mapol.style.top="-500px";

}

var settingsheight;

function GetVillageCoords(e)               // pobiera polozenie kursora by wys�a� raport fin
{
	var c_x=Math.floor(center_x-(500/(zoom+1)));
	var c_y=Math.floor(center_y-(500/(zoom+1)));
	var mapxy=GetCoords(getElement('map'));	
	try
	{
	    var v_x=event.offsetX;
	    var v_y=event.offsetY;
	}
	catch(error)
	{
	    var v_x=e.pageX-(mapxy[0]);
	    var v_y=e.pageY-(mapxy[1]);
	}

	v_x+=500%(zoom+1);
	v_y+=500%(zoom+1);
	var v2_x=0;
	var v2_y=0;
	var img_x=0;
	var img_y=0;

	if (zoom!=0)	
	{
	    v2_x=Math.floor(c_x+(v_x/(zoom+1)));
	    v2_y=Math.floor(c_y+(v_y/(zoom+1)));	
	}
	else
	{
	    v2_x=v_x;
	    v2_y=v_y;
	}

	var img_x = (v2_x-center_x+(500/(zoom+1)))*(zoom+1)+(mapxy[0]);
	var img_y = (v2_y-center_y+(500/(zoom+1)))*(zoom+1)+(mapxy[1]);
    return [v2_x,v2_y,img_x,img_y];
}

function MapMouseMove(e)                 // kursor myszy na mapie
{
    if (zoom!==null)//>=2 poprawka
    {
	var c_x=Math.floor(center_x-(500/(zoom+1)));
	var c_y=Math.floor(center_y-(500/(zoom+1)));
	var mapxy=GetCoords(getElement('map'));	//poprawka przesuniecia
	var map0xy=GetCoords(getElement('map0'));	//poprawka przesuniecia

	try
	{
	    var v_x=event.offsetX;
	    var v_y=event.offsetY;
	}
	catch(error)
	{
	    var v_x=e.pageX-mapxy[0];
	    var v_y=e.pageY-mapxy[1];
	}

	v_x+=500%(zoom+1);
	v_y+=500%(zoom+1);

	var v2_x=0;
	var v2_y=0;

	if (zoom!=0)	
	{
	    v2_x=Math.floor(c_x+(v_x/(zoom+1)));
	    v2_y=Math.floor(c_y+(v_y/(zoom+1)));	
	}
	else
	{
	    v2_x=v_x;
	    v2_y=v_y;
	}

	var img_x = (v2_x-center_x+(500/(zoom+1)))*(zoom+1)+mapxy[0]-map0xy[0];
	var img_y = (v2_y-center_y+(500/(zoom+1)))*(zoom+1)+mapxy[1]-map0xy[1];

img_go('rd',img_x,img_y);
    }
}
function img_go(name,img_x,img_y)
{
	var mapol_img=getElement(name+"_top");
	mapol_img.style.left=img_x-check()+"px";
	mapol_img.style.top=img_y-check()+"px";
	mapol_img.style.width=zoom+(check()*2)+"px";
	mapol_img.style.display="block";

	var mapol_img=getElement(name+"_left");
	mapol_img.style.left=img_x-check()+"px";
	mapol_img.style.top=img_y-check()+"px";
	mapol_img.style.height=zoom+(check()*2)+"px";
	mapol_img.style.display="block";

	var mapol_img=getElement(name+"_right");
	mapol_img.style.left=img_x+zoom+check()+"px";
	mapol_img.style.top=img_y-check()+"px";
	mapol_img.style.height=zoom+(check()*2)+"px";
	mapol_img.style.display="block";

	var mapol_img=getElement(name+"_bottom");
	mapol_img.style.left=img_x-check()+"px";
	mapol_img.style.top=img_y+zoom+check()+"px";
	mapol_img.style.width=zoom+(check()*2)+"px";
	mapol_img.style.display="block";

}
function HideMouseMarker()             // ukrywanie obramowki kursora
{
	var mapol_img=getElement("rd_bottom");
	mapol_img.style.display="none";
	var mapol_img=getElement("rd_top");
	mapol_img.style.display="none";
	var mapol_img=getElement("rd_left");
	mapol_img.style.display="none";
	var mapol_img=getElement("rd_right");
	mapol_img.style.display="none";

}

function MapMouseOut(e)        //ukrywa kursor po opuszczeniu mapy
{
    getElement("rd_top").style.left="-1000px";
    getElement("rd_right").style.left="-1000px";
    getElement("rd_bottom").style.left="-1000px";
    getElement("rd_left").style.left="-1000px";
}

function registerEvents()        //ustalanie na starcie procesow mapy
{
    var map = getElement('map');// KES modyfikacja
   // var map = gid('map');
    if (window.addEventListener)
    {
	map.addEventListener('mouseup',MapClick,false);
	map.addEventListener('mousemove',MapMouseMove,false);
	map.addEventListener('mouseout',MapMouseOut,false);
    }
    else
    {
	map.attachEvent('onmouseup',MapClick);	
	map.attachEvent('onmousemove',MapMouseMove);	
    }
}

registerEvents();