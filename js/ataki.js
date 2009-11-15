/*function SubMit(date_kes, url_kes) {
var date = urlEncode(date_kes);     //gid('editInput').value = date_kes;    //editSubmit('label', 'labelText', 'edit', 'editInput',url_kes );

}

function ajaxKES(url, data) {
	var req = ajaxCreate();

data = 'text='+urlEncode(data);
	if(data != null) {
		req.open("POST", url, true);
		req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		req.setRequestHeader("Content-length", data.length);
	}
	else {
		req.open("GET", url, false);
	}
if(req.readyState == 4 && req.status == 200) { alert(req.responseText); } }

	req.send(data );

	return req;
}

//date_kes
ajaxAsync(url_kes,'dd');
*/