function changePage() {
		if (self.parent.frames.length != 0)
			self.parent.location=document.location;
		}

function gid(id) {
	return document.getElementById(id);
}
function show_m1(name) {
 	if(name=='profil'){gid('m_profil').style.display = '';}else{gid('m_profil').style.display = 'none';}
 	if(name=='mapa')  {gid('m_mapa').style.display = '';}else{gid('m_mapa').style.display = 'none';}
 	if(name=='cal')   {gid('m_cal').style.display = '';}else{gid('m_cal').style.display = 'none';}
 	if(name=='look')  {gid('m_look').style.display = '';}else{gid('m_look').style.display = 'none';}
 	if(name=='dodaj') {gid('m_dodaj').style.display = '';}else{gid('m_dodaj').style.display = 'none';}
 	if(name=='cal_prost'){gid('cal_prost').style.display = ''; }else{gid('cal_prost').style.display = 'none'; }
 	if(name=='cal_zloz') {gid('cal_zloz').style.display = '';  }else{gid('cal_zloz').style.display = 'none';  }
 	if(name=='cal_rada') {gid('cal_rada').style.display = '';  }else{gid('cal_rada').style.display = 'none';  }
 	if(name=='cal_allk') {gid('cal_allk').style.display = '';  }else{gid('cal_allk').style.display = 'none';  }
 	if(name=='mapa_klas'){gid('mapa_klas').style.display = ''; }else{gid('mapa_klas').style.display = 'none'; }
 	if(name=='mapa_takt'){gid('mapa_takt').style.display = ''; }else{gid('mapa_takt').style.display = 'none'; }
 	if(name=='mapa_lege'){gid('mapa_lege').style.display = ''; }else{gid('mapa_lege').style.display = 'none'; }
 	if(name=='baz_oko')  {gid('baz_oko').style.display = '';   }else{gid('baz_oko').style.display = 'none';   }
 	if(name=='baz_gra')  {gid('baz_gra').style.display = '';   }else{gid('baz_gra').style.display = 'none';   }
 	if(name=='baz_wsi')  {gid('baz_wsi').style.display = '';   }else{gid('baz_wsi').style.display = 'none';   }
 	if(name=='prof_color')  {gid('prof_color').style.display = '';   }else{gid('prof_color').style.display = 'none';   }
}
function setText(element, text) {
	var textNode = document.createTextNode(text);
	element.removeChild(element.firstChild);
	element.appendChild(textNode);
}
function zmiana(tribe_id, tribe){
gid('gracz').value = tribe;
gid('gracz').disabled = 'tak' ;
gid("zmiana").value = tribe_id ;
gid('c_dalej').value = 'Zmien';
setText(gid('caps'), 'Zmiana Koloru ' + tribe);
show_color_picker()
}
function show_color_picker() {
	var style = gid("color_picker").style;
	style.display = (style.display == 'none' ? '' : 'none');
}
function color_picker_choose(r, g, b) {
	gid("color_picker_r").value = r;
	gid("color_picker_g").value = g;
	gid("color_picker_b").value = b;
	color_picker_change();
}
function color_picker_change() {
	var r = gid("color_picker_r").value;
	var g = gid("color_picker_g").value;
	var b = gid("color_picker_b").value;
	gid("color").style.backgroundColor = "rgb("+r+", "+g+", "+b+")";
	gid("color").style.backgroundImage = 'none';
}
function color_picker_ok() {
	color_picker_change();
}

function insertUnit(input, count) {
	if(input.value != count)
		input.value=count;
	else
		input.value='';
}
function xProcess() {
var xelement='inputx';
var yelement='inputy';
	xvalue = gid(xelement).value;
	yvalue = gid(yelement).value;

	if(xvalue.indexOf("|") != -1) {
		xypart = xvalue.split("|");
		x = parseInt(xypart[0]);
		y = parseInt(xypart[1]);

		gid(xelement).value = x;
		gid(yelement).value = y;
		return;
	}

	if(xvalue.length == 3 && yvalue.length == 0)
		gid(yelement).focus();
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
function getLocalTime() {
	var now = new Date();
	return Math.floor(now.getTime()/1000)
}
function tickTimer(timer) {
	var time = timer['endTime']-(getLocalTime()+timeDiff);

	if(timer['reload'] && time < 0) {
		document.location.href = document.location.href.replace(/action=\w*/, '');
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
function formatTime(element, time, clamp) {
	// Wieder aufsplitten
	var hours = Math.floor(time/3600);
	if(clamp) hours = hours%24;
	var minutes = Math.floor(time/60) % 60;
	var seconds = time % 60;

	var timeString = hours + ":";
	if(minutes < 10)
		timeString += "0";
	timeString += minutes + ":";
	if(seconds < 10)
		timeString += "0";
	timeString += seconds;

	element.firstChild.nodeValue = timeString;

	if(timeString == '0:00:00') {
		incrementDate();
	}
}
function getTime(element) {
	// Zeit auslesen
	if(element.firstChild.nodeValue == null) return -1;
	var part = element.firstChild.nodeValue.split(":");

	// Führende Nullen entfernen
	for(var j=1; j<3; j++) {
		if(part[j].charAt(0) == "0")
			part[j] = part[j].substring(1, part[j].length);
	}

	// Zusammenfassen
	var hours = parseInt(part[0]);
	var minutes = parseInt(part[1]);
	var seconds = parseInt(part[2]);
	var time = hours*60*60+minutes*60+seconds;
	return time;
}
function addTimer(element, endTime, reload) {
	var timer = new Object();
	timer['element'] = element;
	timer['endTime'] = endTime;
	timer['reload'] = reload;
	timers.push(timer);
}
var resis = new Object();
var timers = new Array();
function tick() {
	tickTime();
	for(var res in resis) {
		tickRes(resis[res]);
	}
	for(var timer=0;timer<timers.length;timer++){
		var remove = tickTimer(timers[timer]);
		if(remove) {
			timers.splice(timer, 1);
		}
	}
}
function tickTime() {
	var serverTime = document.getElementById("serverTime");
	if(serverTime != null) {
		var time = getLocalTime()+timeDiff;
		formatTime(serverTime, time, true);
	}
}
function tickRes(res) {
	var resName = res['name'];
	var start = res['start'];
	var max = res['max'];
	var prod = res['prod'];

	var now = new Date();
	var time = (now.getTime()/1000+timeDiff)-timeStart;
	var current = Math.min(Math.floor(start+prod*time), max);
	var element = document.getElementById(resName);
	element.firstChild.nodeValue = current;

	if(current == max) {
		element.setAttribute('class', 'warn');
	}
}
