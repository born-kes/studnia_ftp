<?PHP include('connection.php');//echo '<h1>ERROR</h1>';
    if($_GET[xy]!=Null){$xy = explode("|", $_GET[xy]);}
elseif($_GET[_xy]!=Null){$xy = explode("|", $_GET[_xy]);}
else    {echo 'brak xxx|yyy';exit();}
  ?><html>
<head>     <meta http-equiv="Content-Type" content="text/html; charset=windows-1250">          
<link rel="stylesheet" type="text/css" href="http://pl5.plemiona.pl/css/stamm.css?1255509606">

           <script src="js/tw_001.js" type="text/javascript"></script>
           <script type="text/javascript">
var t,ts=0;
function druga_warstwa(a) 
{ 
	var style = gid(a).style;
	style.display = (style.display == 'none' ? 'block' : 'none');
}
function gid(id) {
	return document.getElementById(id);
}
function popup(url, width, height) {
	wnd = window.open(url, "popup", "width="+width + ",height="+height + ",left=150,top=150,resizable=yes");
	wnd.focus();
}
function a0(a){ if(! gid(a)){return -1;}else{ if(gid(a).checked){return 1;}else{return 0;} } }
//alert(a0('color'));

function nev_map(b)
{ var xy=gid('xy').value;
var exy=xy.split("|");   center_x=exy[0]; center_y=exy[1]; 

var src = 'http://www.bornkes.w.szu.pl/img/00a.php?xy='+xy+'&color='+a0(b+'color')+'&obrona='+a0(b+'obrona') +'&raport='+a0(b+'raport') +'&szl='+a0(b+'szl') +'&typ='+a0(b+'typ') +'&azm='+a0(b+'azm') +'&ann='+a0(b+'ann') ;
gid(b+"map").src  = src;
//alert(src1);
}
function info_w2()
{
var string = "Druga Warstwa Mapy \n\n"+
"Wł±czenie jej blokuje kursor na mapie,\n"+
"ale pozwala to szybko nanie¶ć\n"+
"na mapę taktyczn± nowe elementy\n"+
"bez przeładowania całej strony.\n"+
"Można j± wł±czać i wył±czać dzięki czemu\n"+
"mapa stanie się bardziej przejrzysta.\n";
alert(string);
}

function info_w3()
{
getElement('rapo').src='test/operacje/legenda.php';
getElement('info_wsi').style.display = '';
}
           var center_x=<?PHP echo $xy[0]; ?>; var center_y=<?PHP echo $xy[1]; ?>;
            </script>
</head>
  <body onload="registerEvents();">
<div style="position:absolute ; bottom:10px; right:5px;">
<table class="main">
<tr><td colspan="2" align="center"> Warstwy Mapy <input type="text" id="xy"  size="4" value="<?PHP echo $xy[0]."|".$xy[1]; ?>" /></td></tr>
 <tr valign="top"><td>
<table id="w1" class="main">
 <tr><th> I </th></tr>
 <tr><td><input type="checkbox" id="color" value="1" checked="tak" /> color</td></tr>
 <tr><td><input type="checkbox" id="obrona" value="1" /> obrona</td></tr>
 <tr><td><input type="checkbox" id="typ" value="1" /> typ</td></tr>
 <tr><td><input type="checkbox" id="raport" value="1" /> raport</td></tr>
 <tr><td><input type="checkbox" id="szl" value="1" /> szlachta</td></tr>
 <tr><th>Ataki</th></tr>
 <tr><td><input type="checkbox" id="ann" value="1" /> Na nas</td></tr>
 <tr><td><input type="checkbox" id="azm" value="1" /> Planowane</td></tr>
 <tr><td><input type="checkbox" id="" value="1" disabled="tak"  /> <strike>od Nas</strike></td></tr>
</table>
</td><td>
<table id="w2" class="main">
 <tr><th> II <a href="javascript:info_w2();"> ?? </a>
<input style="display:none" type="checkbox" name="dcolor" value="-1" disabled="tak" /></th></tr>
 <tr><td><input type="checkbox" id="dobrona" value="1" /> obrona</td></tr>
 <tr><td><input type="checkbox" id="dtyp" value="1" /> typ</td></tr>
 <tr><td><input type="checkbox" id="draport" value="1" /> raport</td></tr>
 <tr><td><input type="checkbox" id="dszl" value="1" /> szlachta</td></tr>
 <tr><th>Ataki</th></tr>
 <tr><td><input type="checkbox" id="dann" value="1" /> Na nas</td></tr>
 <tr><td><input type="checkbox" id="dazm" value="1" /> Planowane</td></tr>
 <tr><td><input type="checkbox" id="" value="1" disabled="tak"  /> <strike>od Nas</strike></td></tr>
 <tr><td><input type="submit" value="ON/OFF" onclick="druga_warstwa('dmap');" /><BR>
</td></tr>
</table>
</td></tr>
 <tr>
<td align="center"> <input type="submit" value="Wykonaj" onclick="nev_map('');" /> </td>
<td align="center"> <input type="submit" value="Wykonaj" onclick="nev_map('d');" /> </td>
 </tr>
<tr><td colspan="2"> <a href="javascript: info_w3();">Legenda</a> </td></tr>
</table>
</div>

<table class="map">
    <tbody>
    <tr>
	<td>
	    <img id="map" src="img/00a.php?s=<?PHP echo ($_GET[s]); ?>&xy=<?PHP echo $xy[0]."|".$xy[1]; ?>&color=1&obrona=0&raport=0&szl=0&typ=1&azm=0&ann=0" alt="{map}">
	</td>
<td rowspan="10" valign="top">
</td>
    </tr>

<tr><td>
<img src="img/00a.php?s=<?PHP echo ($_GET[s]); ?>&xy=<?PHP echo $xy[0]."|".$xy[1]; ?>&color=-1" style="width: 1000px; height: 1000px; position: absolute; display: none; left: 11px; top: 11px;" id="dmap" alt="">
<img style='display:none' id='mapol_img' src='#' alt='' />
<img src="img/rr.gif" style="width: 1px; height: 1px; position: absolute; display: block; left: 426px; top: 911px;" id="rd_top" alt="">
<img src="img/rr.gif" style="width: 1px; height: 1px; position: absolute; display: block; left: 426px; top: 911px;" id="rd_left" alt="">
<img src="img/rr.gif" style="width: 1px; height: 4px; position: absolute; display: block; left: 429px; top: 911px;" id="rd_right" alt="">
<img src="img/rr.gif" style="width: 4px; height: 1px; position: absolute; display: block; left: 426px; top: 914px;" id="rd_bottom" alt="">
</td></tr>
</tbody></table>
<div style="position: absolute ; display: block; top:5px; right:5px; ">
<b><a align="right" href="javascript:druga_warstwa('info_wsi');">[ UKRYJ / ODKRYJ ]</a></b>
</div>
<div style="position:absolute ; top:30px; right:5px; display: none;" id="info_wsi"><iframe id="rapo" style="border:1pt solid #804000;" width="100%" height="420"></iframe></div>

</body>
  </html>