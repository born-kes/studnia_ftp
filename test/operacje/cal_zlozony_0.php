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
</script>
</head>
<body>
<form enctype="multipart/form-data" name="vu" action="cal_zlozony_1.php" method="POST">
<table align="center" valign="top" class="main"><TR><TD>
<?php
$echos='<input name="wojsko" value="'.$_POST[wojsko].'" type="hidden">';
if($_POST[czas1]!=NULL){  $echos.= '<span><input name="czas1" value="'.$_POST[czas1].'" type="hidden"></span>'; }                           //godzina dotarcia do celu
else{echo '<h4>Brak daty ataku</h4>';}


if($_POST[od_h]!=NULL||$_POST[do_h]){$echos.='<span><input name="od_h" value="'.$_POST[od_h].'" type="hidden"></span><span><input name="do_h" value="'.$_POST[do_h].'" type="hidden"></span> ';}

echo'<TABLE><tr><td  valign ="top">';
if($d==1){  agresor($zap1,$atakujacy);}else{echo 'Agresor nie okreslony'; exit();}

echo'</td><td valign ="top">';

if($o>0){  obronca($zap2,$o_name);}else{echo 'Cela ataku nie okreslony'; exit();}

echo'</td><td colspan="2"  valign ="top">';

  echo'<span class="atas"><input value="Dalej" type="submit"></span><BR>';
echo $echos;
echo"</td></tr></table></form>";

?>