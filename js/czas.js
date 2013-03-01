function cf(){	var style = document.getElementById("kes_czas1").style;
	style.display = (style.display == 'block' ? 'none' : 'block');
}
var br="\n";	
	
function show_calendar(IdNameElementu, CzasUstawiony) {

	var Miesiace = ["Styczen", "Luty", "Marzec", "Kwiecien", "Maj", "Czerwiec",
		"Lipiec", "Sierpien","Wrzesieñ", "Pazdziernik", "Listopad", "Grudzien"];
	var DniTygodnia = ["N", "Pon", "Wt", "Sr", "Cz", "Pt", "So"];
	var n_weekstart = 1; // day week starts from (normally 0 or 1)

	var DomyslnyCzas = (CzasUstawiony == null || CzasUstawiony =="" ? new Date()  : PrzeliczMiliTime(CzasUstawiony));
	var dt_prev_month = new Date(DomyslnyCzas);
	dt_prev_month.setMonth(DomyslnyCzas.getMonth()-1);
	var dt_next_month = new Date(DomyslnyCzas);
	dt_next_month.setMonth(DomyslnyCzas.getMonth()+1);
	var PierwszaData = new Date(DomyslnyCzas);
	PierwszaData.setDate(1);
	PierwszaData.setDate(1-(7+PierwszaData.getDay()-n_weekstart)%7);
	var dt_lastday = new Date(dt_next_month);
	dt_lastday.setDate(0);

	
	// html generation (feel free to tune it for your particular application)
	// print calendar header
	var str_buffer = new String (
br+	'<table class="main">'+
br+	'<tr><td colspan="7">'+
br+		'Na Godzine? <input type="text" id="timePikcer" value="8:00" size="8" maxlength="8">'+
br+		'<a href="javascript:aut_picker('+IdNameElementu+',\'\'); return false; ">OK</a>' +
br+	'</td></tr>' +
br+	'<tr><td>'+
br+	'<table cellspacing="1" width="100%" class="main">'+
br+	'<tr>'+
br+	'<th>'+
br+	'<a href="javascript:show_calendar(\''+IdNameElementu+"', '"+ SklejDate(dt_prev_month)+'\');">&lt;&lt;</a>'+
br+	'</th>'+
br+	'<td colspan="5">'+	Miesiace[DomyslnyCzas.getMonth()]+" "+DomyslnyCzas.getFullYear()+'</td>'+
br+	'<th align="right">'+
br+	'<a href="javascript:show_calendar(\''+IdNameElementu+"', '"+SklejDate(dt_next_month)+'\'); ">&gt;&gt;</a>'+
br+	'</th>'+
br+	'</tr>'
	);

	var dt_current_day = new Date(PierwszaData);
		// drukowanie dni tygodnia
		str_buffer += br+ '<tr>';
	for (var n=0; n<7; n++){
		str_buffer +=br+ '	<td><i>'+DniTygodnia[(n_weekstart+n)%7]+'</i></td>';
	}
	str_buffer += '</tr>';
		// drukowanie kalendarza
	while(dt_current_day.getMonth() == DomyslnyCzas.getMonth() ||
			dt_current_day.getMonth() == PierwszaData.getMonth()
			){
		// drukowanie wierszy
		str_buffer +=br+ "<tr>";
		for(var n_current_wday=0; n_current_wday<7; n_current_wday++) {
			// drukowanie dni
				if(dt_current_day.getDate() == DomyslnyCzas.getDate()
				&&	dt_current_day.getMonth() == DomyslnyCzas.getMonth()
				){	//dni powszednie
					var td = 'td';
					var clas=' class="red"';
				}else if (dt_current_day.getDay() == 0 || dt_current_day.getDay() == 6){
						//weekend
					var td = 'th';
					var clas='';
				}else{	// print working days of current month
					var td = 'td';var clas='';
				}
				//nadawanie aktwywnosci dla bierzacego miesaca
				if (dt_current_day.getMonth() == DomyslnyCzas.getMonth()){
					var a='a';	// print days of current month
				}else{
					var a='b'; var clas='';
					// print days of other months
				}
					str_buffer += br+
					"	<"+td +clas+" align=\"right\">"+
					"	<"+a+" onclick=\"aut_picker('"+IdNameElementu+"','"+SklejDate(dt_current_day)+"'); return false; \">"+
				dt_current_day.getDate()+"</"+a+"></"+td +">";
				dt_current_day.setDate(dt_current_day.getDate()+1);
		}
		// print row footer
		str_buffer += br+"</tr>";
	}
	// print calendar footer
	str_buffer +=br +"</table>";
	if($("#kes_czas1").length>0){
		$("#kes_czas1").html(str_buffer);
	}else{
		$("#"+IdNameElementu).parent('td')
  			.append('<div style="position: absolute; left:50px; z-index: 1; clear: both; background-color: red; display: none;" id="kes_czas1">'+str_buffer+'</div>');

	}
}
function PrzeliczMiliTime(CzasUstawiony){
	var re_date = /^(\d+)\-(\d+)\-(\d+)\s+(\d+)\:(\d+)$/;
	if (!re_date.exec(CzasUstawiony))
		return new Date();//alert("Invalid Datetime format: "+ CzasUstawiony);
	return (new Date (RegExp.$3, RegExp.$2-1, RegExp.$1, RegExp.$4, RegExp.$5));
}
function SklejDate(DomyslnyCzas){
	return (new String (
			DomyslnyCzas.getDate()+"-"+(DomyslnyCzas.getMonth()+1)+"-"+DomyslnyCzas.getFullYear()+" "));
}

function aut_picker(IdNameElementu,whot){
$("#"+IdNameElementu).val( whot + $("#timePikcer").val() );
cf();
}