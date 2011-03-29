<?php    include('../connection.php');	  include('zaplecze/cal_zlozony_0.php');  ?>
<html><head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="stamm.css">
<script language="JavaScript">
function selectAllata(form, checked) {
	var spans = document.getElementsByTagName("span");

	for(var i=0; i<=form.length; i++) {
		var span = spans[i];
	if(span.className == "ata") {		
		form.elements[i].checked = checked;}
}
}
function selectAobr(form, checked) {
	var spans = document.getElementsByTagName("span");

	for(var i=0; i<=form.length; i++) {
		var span = spans[i];
	if(span.className == "obr") {		
		form.elements[i].checked = checked;}
}
}
function textar(strona) {
var texta = 'Wprowadz listê wiosek, jedna pod drug±<br />'+
'<textarea id="query" name="query_'+strona+'" rows="8" cols="50%"></textarea>';
	document.getElementById("td_"+strona).innerHTML = texta ;
	document.getElementById('atas').innerHTML = '<span class="atas" ><input value="Dalej" type="submit"></span><BR>';
document.forms[0].action='';
}
</script>
</head>
<body>
<form enctype="multipart/form-data" name="vu" action="cal_zlozony_1.php" method="POST">
<table align="center" valign="top" class="main"><TR><TD>
<?php

if($_POST[czas1]==NULL){echo '<h4>Brak daty ataku</h4>';}
//echo $zap1;
echo'<TABLE><tr><td  valign ="top" id="td_agr">';
if($d==1){  agresor($zap1,$atakujacy);}else{echo '<a href="javascript:textar(\'agr\')">Agresor nie okreslony</a>'; $sen=1;}

echo'</td><td valign ="top" id="td_obr">';

if($o>0){  obronca($zap2,$o_name);}else{echo '<a href="javascript:textar(\'obr\')">Cela ataku nie okreslony</a>'; $sen=1;}

echo'</td><th colspan="2"  valign ="top" id="atas">';
if($sen==1){echo 'Agresor lub obroñca nie Ustaleni';}
else{  echo'<span class="atas" ><input value="Dalej" type="submit"></span><BR>';}
echo"</th><td>";
 foreach($_POST as $v => $f){echo '<input name="'.$v.'" value="'.$f.'" type="hidden"> ';}

echo"</td></tr></table></form>";

?>