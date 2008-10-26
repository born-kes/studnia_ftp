var timeDiff = null;
var timeStart = null;

// Mausposition
var mx = 0;
var my = 0;

var resis = new Object();
var timers = new Array();

if(document.addEventListener)
	document.addEventListener("mousemove", watchMouse, true);
else
	document.onmousemove = watchMouse;



function map_popup(data, title, owner, mur, typ,  pik, mie, axe, ar, zw, lk, kar, ck, tar, kat, ry, sz, opis)
{
	
        setText(gid("info_title"), title);	
	

	if(owner != null) {
		setText(gid("info_owner"), owner);
		gid("info_owner_row").style.display = '';
		gid("info_left_row").style.display = 'none';
	}
	else {
		gid("info_owner_row").style.display = 'none';
		gid("info_left_row").style.display = '';
	}
	setText(gid("info_data"), typ);	
	setText(gid("info_typ"), data);
	
        setText(gid("info_mur"), mur);
        setText(gid("info_wor_pik"), pik);
        setText(gid("info_wor_mie"), mie);
        setText(gid("info_wor_axe"), axe);
        setText(gid("info_wor_ar"), ar);
        setText(gid("info_wor_zw"), zw);
        setText(gid("info_wor_lk"), lk);
        setText(gid("info_wor_kar"), kar);
        setText(gid("info_wor_ck"), ck);
        setText(gid("info_wor_tar"), tar);
        setText(gid("info_wor_kat"), kat);
        setText(gid("info_wor_ry"), ry);
        setText(gid("info_wor_sz"), sz);
        setText(gid("info_opis"),  opis);


	map_move();
	var info = gid("info");
	info.style.visibility = "visible";
}

function map_kill() {
	var info = document.getElementById("info");
	info.style.visibility = "hidden";
	if(extra_info_timeout != null) {
		window.clearTimeout(extra_info_timeout);
	}
}


function watchMouse(e) {
	if(e) {
		mx = e.clientX;
		my = e.clientY;
	}
	else {
		mx = window.event.clientX;
		my = window.event.clientY;
	}

	var info = document.getElementById("info");
	if(info != null && info.style.visibility == "visible") {
		map_move();
	}

	var tut = gid("tut");
	if(tut != null && tut_moving)
		tut_move();
}

/** 
 * Title-Tag setzen
 */
function setImageTitles() {
	//var imgs = fetch_tags(document, 'img');
	for (var i = 0; i < document.images.length; i++)
	{
		var image = document.images[i];
		if (!image.title && image.alt != '')
		{
			image.title = image.alt;
		}
	}
}

function setCookie(name, value) {
	document.cookie = name+"="+value;
}

function popup(url, width, height) {
	wnd = window.open(url, "popup", "width="+width + ",height="+height + ",left=150,top=150,resizable=yes");
	wnd.focus();
}

function popup_scroll(url, width, height) {
	wnd = window.open(url, "popup", "width="+width + ",height="+height + ",left=150,top=100,resizable=yes,scrollbars=yes");
	wnd.focus();
}


function addTimer(element, endTime, reload) {
	var timer = new Object();
	timer['element'] = element;
	timer['endTime'] = endTime;
	timer['reload'] = reload;
	timers.push(timer);
}

function startTimer() {
	var serverTime = getTime(document.getElementById("serverTime"));
	timeDiff = serverTime-getLocalTime();
	timeStart = serverTime;

	// Nach span mit der Klasse timer und timer_replace suchen
	var spans = document.getElementsByTagName("span");
	for(var i=0; i<spans.length; i++) {
		var span = spans[i];
		if(span.className == "timer" || span.className == "timer_replace") {
			startTime = getTime(span);
			if(startTime != -1)
				addTimer(span, serverTime+startTime, (span.className == "timer"));
		}
	}

	startResTicker('wood');
	startResTicker('stone');
	startResTicker('iron');

	window.setInterval("tick()", 1000);
}

function startResTicker(resName) {
	var element = document.getElementById(resName);
	var start = parseInt(element.firstChild.nodeValue);
	var max = parseInt(document.getElementById("storage").firstChild.nodeValue);
	var prod = element.title/3600;

	var res = new Object();
	res['name'] = resName;
	res['start'] = start;
	res['max'] = max;
	res['prod'] = prod;
	resis[resName] = res;
}

function tickRes(res) {
	var resName = res['name'];
	var start = res['start'];
	var max = res['max'];
	var prod = res['prod'];

	var now = new Date();
	var time = (now.getTime()/1000+timeDiff)-timeStart;
	current = Math.min(Math.floor(start+prod*time), max);
	var element = document.getElementById(resName);
	element.firstChild.nodeValue = current;

	if(current == max) {
		element.setAttribute('class', 'warn');
	}
}

function tick() {
	tickTime();
	for(var res in resis) {
		tickRes(resis[res]);
	}
	for(timer=0;timer<timers.length;timer++){
		remove = tickTimer(timers[timer]);
		if(remove) {
			timers.splice(timer, 1);
		}
	}
}

function tickTime() {
	var serverTime = document.getElementById("serverTime");
	if(serverTime != null) {
		time = getLocalTime()+timeDiff;
		formatTime(serverTime, time, true);
	}
}

function tickTimer(timer) {
	var time = timer['endTime']-(getLocalTime()+timeDiff);

	if(timer['reload'] && time < 0) {
		document.location.href = document.location.href;
		formatTime(timer['element'], 0, false);
		return true;
	}
	
	if (!timer['reload'] && time <= 0)
	{
		// Timer ausblenden und Alternativ-Text anzeigen
		var parent = timer['element'].parentNode;
		parent.nextSibling.style.display = 'inline'; // Nachfolger des Parent einblenden
		parent.parentNode.removeChild(parent); // Parent entfernen
		
		return true;
	}
	
	formatTime(timer['element'], time, false);
	return false;
}

function getLocalTime() {
	var now = new Date();
	return Math.floor(now.getTime()/1000)
}

function getTime(element) {
	// Zeit auslesen
	if(element.firstChild.nodeValue == null) return -1;
	part = element.firstChild.nodeValue.split(":");

	// Führende Nullen entfernen
	for(j=1; j<3; j++) {
		if(part[j].charAt(0) == "0")
			part[j] = part[j].substring(1, part[j].length);
	}
		
	// Zusammenfassen
	hours = parseInt(part[0]);
	minutes = parseInt(part[1]);
	seconds = parseInt(part[2]);
	time = hours*60*60+minutes*60+seconds;
	return time;
}

function formatTime(element, time, clamp) {
	// Wieder aufsplitten
	hours = Math.floor(time/3600);
	if(clamp) hours = hours%24;
	minutes = Math.floor(time/60) % 60;
	seconds = time % 60;

	timeString = hours + ":";
	if(minutes < 10)
		timeString += "0";
	timeString += minutes + ":";
	if(seconds < 10)
		timeString += "0";
	timeString += seconds;

	element.firstChild.nodeValue = timeString;
}

function selectAll(form, checked) {
	for(var i=0; i<form.length; i++) {
		form.elements[i].checked = checked;
	}
}

/**
 * Im Adelshof für alle Dörfer Nichts/Maximum auswählen
 */
var max = true;
function selectAllMax(form, textMax, textNothing) {
	for(var i=0; i<form.length; i++) {
		var select = form.elements[i];
		if(select.selectedIndex != null) {
			if(max)
				select.selectedIndex = select.length-2;
			else
				select.value = 0;
		}
	}
	
	max = max ? false : true;

	anchor = document.getElementById('select_anchor_top');
	anchor.firstChild.nodeValue = max ? textMax : textNothing;
	anchor = document.getElementById('select_anchor_bottom');
	anchor.firstChild.nodeValue = max ? textMax : textNothing;

	changeBunches(form);
}

function changeBunches(form) {
	var sum = 0;
	for(var i=0; i<form.length; i++) {
		var select = form.elements[i];
		if(select.selectedIndex != null) {
			sum += parseInt(select.value);
		}
	}

	setText(gid('selectedBunches_bottom'), sum);
	setText(gid('selectedBunches_top'), sum);
}

function redir(href) {
	window.location.href = href;
}

function setText(element, text) {
	var textNode = document.createTextNode(text);
	element.removeChild(element.firstChild);
	element.appendChild(textNode);
}

old_extra_text = null;
extra_info_timeout = null;
map_info_data = new Object();


function map_move() {
	var info_content = $("info_content"); // gid() nicht möglich, da sonst IE7 kein Element zurück gibt.
	var info = $("info");

	if(window.pageYOffset)
		scrollY = window.pageYOffset;
	else
		scrollY = document.body.scrollTop;
		
	// Sicherstellen, dass Popup nicht vom rechten Rand abgeschnitten wird
	var popup_size = info_content.getCoordinates();
	var window_width = window.getWidth();
	// getWidth funktioniert im IE6 nur wenn XHTML strict
	if(!window_width){
		window_width = document.body.clientWidth;
	}
	var margin_right = window_width - mx;
	
	if(margin_right > popup_size.width + 5) {  
		info.style.left = mx + 5 + "px";
	} else {

		info.style.left = window_width - popup_size.width + "px";  
	}
	
	// Unterer Rand des Popups soll nicht Mauszeiger überlappen
	var popup_top =  my - popup_size.height - 5 + scrollY;
	info.style.top = popup_top + "px";	
}

function map_info_get(village_id, source_id)
{
	var url = 'game.php?screen=overview&xml&village=' + village_id + '&source=' + source_id;
	var t = get_sitter_tribe()
	if(t) {
		url = url + '&t=' + t;
	}

	var map_info_callback = new Object();
	map_info_callback.complete = function(req) {
		var village_data = new Object();
		var village = req.responseXML.firstChild;
		while (village != null && village.nodeType != 1) {
			village = village.nextSibling;
		}
		if(village.firstChild.nodeName == 'error') {
			var error = village.firstChild.nodeValue;
			alert(error);
		}
		village_data['id'] = parseInt(village.getAttribute('id'));
		for(var i = 0; i < village.childNodes.length; i++) {
			village_data[village.childNodes[i].nodeName] = village.childNodes[i].firstChild.nodeValue;
		}
		map_info_data[village_data['id']] = village_data;
		map_info(village_data['id']);
	}
	
	ajaxAsync(url, null, map_info_callback);
}

function map_info(village_id)
{
	var village_data = map_info_data[village_id];
	var xhtml = '<table>';
	
	// Rohstoffe
	if(gid('map_popup_res').checked && (village_data['wood'] || village_data['stone'] || village_data['iron'] || village_data['storage_max'])) {
		xhtml += '<tr><td colspan="2"><table><tr>';
		if (village_data['wood']) xhtml += '<td><img src="' + image_base + '/holz.png" />' + village_data['wood'] + '</td>';
		if (village_data['stone']) xhtml += '<td><img src="' + image_base + '/lehm.png" />' + village_data['stone'] + '</td>';
		if (village_data['iron']) xhtml += '<td><img src="' + image_base + '/eisen.png" />' + village_data['iron'] + '</td>';
		if (village_data['storage_max']) xhtml += '<td><img src="' + image_base + '/res.png" />' + village_data['storage_max'] + '</td>';
		xhtml += '</tr></table></td></tr>';
	}
	
	
	var pop_xhtml = false;
	if(gid('map_popup_pop').checked && village_data['pop_max']) {
		pop_xhtml = '<img src="' + image_base + '/face.png" />' + village_data['pop'] + '/' + village_data['pop_max'];
	}
	
	var trader_xhtml = false;
	if(gid('map_popup_trader').checked && village_data['trader_current']) {
		trader_xhtml = '<img src="' + image_base + '/overview/trader.png" />' + village_data['trader_current'] + '/' + village_data['trader_total'];
	}
	
	// Bevölkerung und Haendler
	if(pop_xhtml || trader_xhtml) {
		xhtml += '<tr><td colspan="2"><table><tr>';
		xhtml += xhtml_column_builder(pop_xhtml, trader_xhtml);
		xhtml += '</tr></table></td></tr>';
	}
	
	if(gid('map_popup_units').checked || gid('map_popup_units_times').checked) {
		uh_xhtml = '<tr><td colspan="2"><table style="border:1px solid #DED3B9" cellpadding="0" cellspacing="0"><tr class="center">';
		var i=0;
		for(var prop in village_data) {
			if((prop.substr(0, 4) == 'unit') && ((village_data[prop] != 0) || (gid('map_popup_units_times').checked && village_data['time_'+prop]))) {
				var bgcolor = ((i%2) == 0) ? 'F8F4E8' : 'DED3B9';
				uh_xhtml += '<td style="padding:2px;background-color:#'+bgcolor+'"><img src="' + image_base + '/unit/' + prop + '.png" alt="" /></td>';
				i++;
			}
		}
		
		i=0;
		units=0;
		un_xhtml='';

		for(var prop in village_data) {
			if(prop.substr(0, 4) == 'unit' && village_data[prop] != 0 && gid('map_popup_units').checked) {
				var bgcolor = ((i%2) == 0) ? 'F8F4E8' : 'DED3B9';
				un_xhtml += '<td style="padding:2px;background-color:#'+bgcolor+'">'+village_data[prop]+'</td>';
				i++;
				units++;
			} else if (gid('map_popup_units_times').checked && village_data['time_'+prop]) {
				var bgcolor = ((i%2) == 0) ? 'F8F4E8' : 'DED3B9';
				un_xhtml += '<td style="padding:2px;background-color:#'+bgcolor+'">&#160;</td>';
				i++;
			}
		}

		i=0;
		times=0;
		ut_xhtml='';
		
		if(gid('map_popup_units_times').checked) {
			for(var prop in village_data) {
				if(prop.substr(0, 9) == 'time_unit' && village_data[prop] != 0) {
					var bgcolor = ((i%2) == 0) ? 'F8F4E8' : 'DED3B9';
					ut_xhtml += '<td style="padding:2px;font-size: 9px;background-color:#'+bgcolor+'">' + village_data[prop] +'</td>';
					i++;
					times++;
				}
			}
		}
		
		if (units > 0 || times > 0) {
			xhtml += uh_xhtml;
			
			if (units > 0) {
				xhtml += '</tr><tr class="center">';
				xhtml += un_xhtml;
			}
			
			if (times	> 0) {
				xhtml += '</tr><tr class="center">';
				xhtml += ut_xhtml;				
			}
			xhtml += '</tr></table></tr></td></tr>';
		}
	}
	xhtml += '</table>';
	gid('info_extra_info').firstChild.innerHTML = xhtml;
	map_move();
}

function xhtml_column_builder(col1, col2) {
	var xhtml = '';
	xhtml += '<tr>';
	if(col1 && col2) {
		xhtml += '<td>' + col1 + '</td><td>' + col2 + '</td>';
	} else {
		if(col1) {
			xhtml += '<td colspan="2">' + col1 + '</td>';
		} else {
			xhtml += '<td colspan="2">' + col2 + '</td>';
		}
	}
	xhtml += '</tr>';
	return xhtml;
}

function toggle_map_popup_options() {
	if(gid('map_popup_options').style.display == 'none') {
		gid('map_popup_options').style.display = '';
	} else {
		gid('map_popup_options').style.display = 'none';
	}
}

function gid(id) {
	return document.getElementById(id);
}

function mapScroll(x, y) {
	width = 10;
	height = 10;
	url = "map.php?x="+x+"&y="+y+"&width="+width+"&height="+height;
	req = ajaxSync(url);
	villages = req.responseXML.firstChild.childNodes;
	for(var i=0; i<villages.length; i++) {
		v = villages[i];
		if(v.nodeType != 1) continue;
		if(v.nodeName != "v") continue;

		mapSetTile(3, 0, v);
	}
}

function mapSetTile(x, y, v) {
	tile = gid("tile_" + x + "_" + y);
	if(v != null) {
		alert(v.getAttribute("href"));
		//tile.className = v.className;
		tile.replaceChild(v, tile.firstChild);
	}
	else {
		img = document.createElement("img");
		img.src = "graphic/map/map_free.png";
		tile.replaceChild(img, tile.firstChild);
	}
}

function insertCoord(form, element) {
	// Koordinaten auslesen
	part = element.value.split("|");
	if(part.length != 2) return;
	x = parseInt(part[0]);
	y = parseInt(part[1]);
	form.x.value = x;
	form.y.value = y;
}

function insertCoordNew(form, element) {
	// Koordinaten auslesen
	part = element.value.split(":");
	if(part.length != 3) return;
	form.con.value = parseInt(part[0]);
	form.sec.value = parseInt(part[1]);
	form.sub.value = parseInt(part[2]);
}

function insertUnit(input, count) {
	if(input.value != count)
		input.value=count;
	else
		input.value='';
}

function insertNumber(input, count) {
	if(input.value != count)
		input.value=count;
	else
		input.value='';
}

function selectTarget(x, y) {
	opener.document.forms["units"].elements["x"].value = x;
	opener.document.forms["units"].elements["y"].value = y;
	window.close();
}

function selectTargetCoord(con, sec, sub) {
	opener.document.forms["units"].elements["con"].value = con;
	opener.document.forms["units"].elements["sec"].value = sec;
	opener.document.forms["units"].elements["sub"].value = sub;
	window.close();
}

function insertAdresses(to, check) {
	opener.document.forms["header"].to.value += to;
	if(check) {
		var mass_mail = opener.document.forms["header"].mass_mail;
		if(mass_mail)
			mass_mail.checked='checked';
	}
}

function selectVillage(id) {
	var href = opener.location.href;
	if(href.search(/village=\d*/) != -1) 
		href = href.replace(/village=\d*/, 'village='+id);
	else
		href += '&village='+id;
	href.replace(/action=\w*/, '');
	opener.location.href = href;
	window.close();
}

function overviewShowLevel() {
	labels = overviewGetLabels();
	for(var i=0, len=labels.length; i < len; i++) {
		var label = labels[i];
		if(!label) continue;
		label.style.display = 'inline';
	}
}

function overviewHideLevel() {
	labels = overviewGetLabels();
	for(var i=0, len=labels.length; i < len; i++) {
		var label = labels[i];
		if(!label) continue;
		label.style.display = 'none';
	}
}

function overviewGetLabels() {
	labels = Array();
	labels.push(gid("l_main"));
	labels.push(gid("l_place"));
	labels.push(gid("l_wood"));
	labels.push(gid("l_stone"));
	labels.push(gid("l_iron"));
	labels.push(gid("l_wall"));
	labels.push(gid("l_farm"));
	labels.push(gid("l_hide"));

	labels.push(gid("l_storage"));
	labels.push(gid("l_market"));

	labels.push(gid("l_barracks"));
	labels.push(gid("l_stable"));
	labels.push(gid("l_garage"));
	labels.push(gid("l_church"));
	labels.push(gid("l_snob"));
	labels.push(gid("l_smith"));

	return labels;
}

function insertMoral(moral) {
	opener.document.getElementById('moral').value = moral;
}

function resetAttackerPoints(points) {
	document.getElementById('attacker_points').value = points;
}

function resetDefenderPoints(points) {
	document.getElementById('defender_points').value = points;
}

function resetDaysPlayed(days) {
	document.getElementById('days_played').value = days;
}

function selectGroup(group) {
	var href = location.href;
	if(href.search(/group=\d*/) != -1) 
		href = href.replace(/group=\d*/, 'group='+group);
	else
		href += '&group='+group;
	href.replace(/action=\w*/, '');
	location.href = href;
}

function editGroup(group_id) {
	var href = opener.location.href;
	href = href.replace(/&action=edit_group&edit_group=\d+&h=([a-z0-9]+)/, '');
	href = href.replace(/&edit_group=\d+/, '');
	overview = opener.document.getElementById('overview');
	if(overview && overview.value.search(/(combined|prod|units|buildings|tech)/) != -1) { 
		opener.location.href = href + '&edit_group=' + group_id;
	}
	window.close();
}

function toggleExtended()
{
	var extended = document.getElementById('extended');
	if(extended.style.display == 'block') {
		extended.style.display = 'none';
		document.getElementsByName('extended')[0].value = 0;
	} else {
		extended.style.display = 'block';
		document.getElementsByName('extended')[0].value = 1;
	}
}

function resizeIGMField(type)
{
	field = document.getElementsByName('text')[0];
	old_size = parseInt(field.getAttribute('rows'));
	if(type == 'bigger') {
		field.setAttribute('rows',	old_size + 3);
	} else if(type == 'smaller') {
		if(old_size >= 4) {
			field.setAttribute('rows', old_size - 3);
		}
	}
}

/**
 * @param edit ID des anzuzeigenden Edit-Elements
 * @param label ID des zu versteckenden Label-Elements
 */
function editToggle(label, edit) {
	gid(edit).style.display = '';
	gid(label).style.display = 'none';
}

function urlEncode(string) {
	return encodeURIComponent(string);
}

/**
 * 
 */
function editSubmit(label, labelText, edit, editInput, url) {
	var data = gid(editInput).value;
	data = urlEncode(data);

	var req = ajaxSync(url, 'text='+data);
	
	gid(edit).style.display = 'none';
	setText(gid(labelText), req.responseText);
	gid(label).style.display = '';
}

function editSubmitNew(label, labelText, edit, editInput, url) {
	var data = gid(editInput).value;
	var jSonRequest = new Json.Remote(url, {method: 'post', onComplete: function(data) {
		gid(edit).style.display = 'none';
		setText(gid(labelText), data);
		gid(label).style.display = '';
	}}).send({text:data});
}

function showElement(name) {
	gid(name).style.display = '';
}

function get_sitter_tribe()
{

	var t_regexp = /(\?|&)t=(\d+)/;
	var matches = t_regexp.exec(location.href + "");
	if(matches) {
		return parseInt(matches[2]);
	} else {
		return false;
	}
}

function igm_to_show(url)
{
	var igm_to = gid('igm_to');
	gid('igm_to_content').innerHTML = ajaxSync(url, null).responseText;
	igm_to.style.display = 'inline';
}

function igm_to_hide()
{
	var igm_to = gid('igm_to');
	igm_to.style.display = 'none';
}

function igm_to_insert_adresses(list) {
	gid('to').value += list;
}

function igm_to_addresses_clear() {
	gid('to').value = '';
}

function _(t) {
	if(lang[t]) {
		return lang[t];
	} else {
		return t;
	}
}

function displayWindow(url, width, height) {
        var Win = window.open(url,"displayWindow",'width=' + width + ',height=' + height + ',resizable=0,scrollbars=yes,menubar=no,moveTo=yes' );
        windows.('300','300');
}