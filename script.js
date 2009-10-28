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