function dels(s) {
s = s.replace(new RegExp("[^\\d|]+","g"),"");
 return s;}
var tempo=0;
function selecturl(s) {
	tempo = s.options[s.selectedIndex].value*1;
}
function ukryj() {
	var style = document.getElementById("inline_popup").style;
	style.display = (style.display == 'none' ? 'block' : 'none');
}
function kes_plus()
{   // gif 74 x 176 => 250

           var time= getElement("time").value.split(":");
if(! time[1]){time[1]=0;}
           var czas_marszu = (time[0]*60)+(time[1]*1);
           var max_zasieg = czas_marszu/tempo;//Math.floor();
if(tempo ==35 && czas_marszu > 2450){max_zasieg=70;}

var A=(( 74*max_zasieg)/250)*(zoom+1);
var B=((176*max_zasieg)/250)*(zoom+1);



var zom= zoom+1;
var img_x = dels(getElement("rd_left").style.left)*1+1;
var img_y = dels(getElement("rd_left").style.top)*1+1;

	var kes1=getElement("kes1");
	kes1.style.left=img_x-A-B+"px";
	kes1.style.top=img_y-B+"px";
	kes1.style.width=A+"px";
	kes1.style.height=B+"px";
	kes1.style.display="block";

	var kes2=getElement("kes2");
	kes2.style.left=img_x-B+"px";
	kes2.style.top=img_y-A-B+"px";
	kes2.style.width=B+"px";
	kes2.style.height=A+"px";
	kes2.style.display="block";

	var kes3=getElement("kes3");
	kes3.style.left=img_x+"px";
	kes3.style.top=img_y-A-B+"px";
	kes3.style.width=B+"px";
	kes3.style.height=A+"px";
	kes3.style.display="block";

	var kes4=getElement("kes4");
	kes4.style.left=img_x+B+"px";
	kes4.style.top=img_y-B+"px";
	kes4.style.width=A+"px";
	kes4.style.height=B+"px";
	kes4.style.display="block";

	var kes5=getElement("kes5");
	kes5.style.left=img_x+B+"px";
	kes5.style.top=img_y+"px";
	kes5.style.width=A+"px";
	kes5.style.height=B+"px";
	kes5.style.display="block";

	var kes6=getElement("kes6");
	kes6.style.left=img_x+"px";
	kes6.style.top=img_y+B+"px";
	kes6.style.width=B+"px";
	kes6.style.height=A+"px";
	kes6.style.display="block";

	var kes7=getElement("kes7");
	kes7.style.left=img_x-B+"px";
	kes7.style.top=img_y+B+"px";
	kes7.style.width=B+"px";
	kes7.style.height=A+"px";
	kes7.style.display="block";

	var kes8=getElement("kes8");
	kes8.style.left=img_x-A-B+"px";
	kes8.style.top=img_y+"px";
	kes8.style.width=A+"px";
	kes8.style.height=B+"px";
	kes8.style.display="block";
if(tempo == 0)
  { 
	kes1.style.display="none";
	kes2.style.display="none";
	kes3.style.display="none";
	kes4.style.display="none";
	kes5.style.display="none";
	kes6.style.display="none";
	kes7.style.display="none";
	kes8.style.display="none";
  }

}
getElement("KESzoom").value = zoom;
getElement("KESx").value = center_x;
getElement("KESy").value = center_y;
getElement("KESadres").value = window.location;
var t = window.setInterval('kes_plus()',300);