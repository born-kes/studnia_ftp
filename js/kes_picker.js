function cf(){	var style = document.getElementById("kes_czas1").style;
	style.display = (style.display == 'block' ? 'none' : 'block');}
function show_calendar(str_target, str_datetime,test) {

	var arr_months = ["Styczen", "Luty", "Marzec", "Kwiecien", "Maj", "Czerwiec",
		"Lipiec", "Sierpien","Wrzesieñ", "Pazdziernik", "Listopad", "Grudzien"];
	var week_days = ["N", "Pon", "Wt", "Sr", "Cz", "Pt", "So"];
	var n_weekstart = 1; // day week starts from (normally 0 or 1)

	var dt_datetime = (str_datetime == null || str_datetime =="" ? new Date()  : str2dt(str_datetime));
	var dt_prev_month = new Date(dt_datetime);
	dt_prev_month.setMonth(dt_datetime.getMonth()-1);
	var dt_next_month = new Date(dt_datetime);
	dt_next_month.setMonth(dt_datetime.getMonth()+1);
	var dt_firstday = new Date(dt_datetime);
	dt_firstday.setDate(1);
	dt_firstday.setDate(1-(7+dt_firstday.getDay()-n_weekstart)%7);
	var dt_lastday = new Date(dt_next_month);
	dt_lastday.setDate(0);
if(document.getElementById("kes_czas1") ){
if(!test){cf();}
	
	// html generation (feel free to tune it for your particular application)
	// print calendar header
	var str_buffer = new String (
		"\n"+
		"<table class=\"main\">\n"+
		"<tr><th>\n"+"Za ile ? "+
"<a href=\"\" onclick=\""+str_target+".value= 5;cf(); return false;\">5h</a> / "+
"<a href=\"\" onclick=\""+str_target+".value= 6;cf(); return false;\">6h</a> / "+
"<a href=\"\" onclick=\""+str_target+".value= 7;cf(); return false;\">7h</a> / "+
"<a href=\"\" onclick=\""+str_target+".value= 10;cf(); return false;\">10h</a> / "+
"<a href=\"\" onclick=\""+str_target+".value= 24;cf(); return false;\">dzien</a> / "+
"<a href=\"\" onclick=\""+str_target+".value= 48;cf(); return false;\">2dni</a> itd.</th></tr>"+
		"\n <tr><td colspan=\"7\">" +
		"Albo Na Godzine: <input type=\"text\" name=\"time\" id=\"time\" value=\""+dt2tmstr(dt_datetime)+
		"\" size=\"8\" maxlength=\"8\">"+
		" <a href=\"\" onclick=\"aut_picker("+str_target+",''); return false; \">OK</a>\n" +
		"</td></tr>\n" +
		"\n</td></tr>\n"+

		"<tr><td>\n"+
		"<table cellspacing=\"1\" width=\"100%\" class=\"main\">\n"+
		"<tr>\n	<th><a href=\"\" onclick=\"show_calendar('"+
		str_target+"', '"+ dt2dtstr(dt_prev_month)+"'+document.form.time.value,true); return false;\">"+
		"<img src=\"../img/prev.gif\" width=\"16\" height=\"16\" border=\"0\""+
		" alt=\"&lt;&lt;\"></a></th>\n"+
		"	<td colspan=\"5\">"+
		arr_months[dt_datetime.getMonth()]+" "+dt_datetime.getFullYear()
                	+"</td>\n"+
		"	<th align=\"right\"><a href=\"\" onclick=\"show_calendar('"
		+str_target+"', '"+dt2dtstr(dt_next_month)+"'+document.form.time.value,true); return false;\">"+
		"<img src=\"../img/next.gif\" width=\"16\" height=\"16\" border=\"0\""+
		" alt=\"&gt;&gt;\"></a></th>\n</tr>\n"
	);

	var dt_current_day = new Date(dt_firstday);
	// print weekdays titles
	str_buffer += "<tr>\n";
	for (var n=0; n<7; n++)
		str_buffer += "	<td>"+week_days[(n_weekstart+n)%7]+"</td>\n";
	// print calendar table
	str_buffer += "</tr>\n";
	while (dt_current_day.getMonth() == dt_datetime.getMonth() ||
		dt_current_day.getMonth() == dt_firstday.getMonth()) {
		// print row heder
		str_buffer += "<tr>\n";
		for (var n_current_wday=0; n_current_wday<7; n_current_wday++) {
				if (dt_current_day.getDate() == dt_datetime.getDate() &&
					dt_current_day.getMonth() == dt_datetime.getMonth())
				{	// print current date
					var td = 'td';var class=' class="red"';
				}else if (dt_current_day.getDay() == 0 || dt_current_day.getDay() == 6)
				{	// weekend days
					var td = 'th';var class='';
				}else
				{	// print working days of current month
					var td = 'td';var class='';
}
				if (dt_current_day.getMonth() == dt_datetime.getMonth())
				{var a='a';	// print days of current month
				}else{var a='b'; var class='';
					// print days of other months
				}
					str_buffer += "	<"+td +class+" align=\"right\">"+
				"<"+a+" href=\"\" onclick=\"aut_picker("+str_target+",'"+dt2dtstr(dt_current_day)+"'); return false; \">"+
				dt_current_day.getDate()+"</"+a+"></"+td +">\n";
				dt_current_day.setDate(dt_current_day.getDate()+1);
		}
		// print row footer
		str_buffer += "</tr>\n";
	}
	// print calendar footer
	str_buffer +="\n </table>\n";
document.getElementById("kes_czas1").innerHTML =str_buffer;
}else{
     document.form.czas1.parentNode.innerHTML+='<div style="position: absolute;z-index: 1; display: none; clear: both; " id="kes_czas1"></div>';
show_calendar(str_target, str_datetime);
}

}
// datetime parsing and formatting routimes. modify them if you wish other datetime format
function str2dt (str_datetime) {
	var re_date = /^(\d+)\.(\d+)\.(\d+)\s+(\d+)\:(\d+)$/;
	if (!re_date.exec(str_datetime))
		return new Date();//alert("Invalid Datetime format: "+ str_datetime);
	return (new Date (RegExp.$3, RegExp.$2-1, RegExp.$1, RegExp.$4, RegExp.$5));
}
function dt2dtstr (dt_datetime) {
	return (new String (
			dt_datetime.getDate()+"."+(dt_datetime.getMonth()+1)+"."+dt_datetime.getFullYear()+" "));
}
function dt2tmstr (dt_datetime) {
	return (new String ('8:00'));
}/*dt_datetime.getHours()+":"+dt_datetime.getMinutes()+":"+dt_datetime.getSeconds()*/
function aut_picker(where,whot)
{
where.value = whot + document.form.time.value;
ukryj("kes_czas1");
}