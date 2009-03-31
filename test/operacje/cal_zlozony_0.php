<?php    include('../connection.php');	  include('zaplecze/cal_zlozony_0.php');  ?>
<html><head>
<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
<link rel="stylesheet" type="text/css" href="../img/stamm1201718544.css">
<script language="JavaScript">
function selectAllata(form, checked,co) {
	var spans = document.getElementsByTagName("span");

	for(var i=0; i<form.length; i++) {
		var span = spans[i];
		if(span.className == co) {
		form.elements[i].checked = checked;}
	}
}</script>
<script src="../scriptt.js" type="text/javascript"></script>
</head>
<body><table align="center" valign="top" class="main"><TR><TD>
<?php
echo'<form enctype="multipart/form-data" action="cal_zlozony_1.php" method="POST">
<input name="wojsko" value="'.$_POST[wojsko].'" type="hidden">
<input name="czas1" value="'.$_POST[czas1].'" type="hidden">';
if($_POST[od_h]!=NULL||$_POST[do_h]){echo'<input name="od_h" value="'.$_POST[od_h].'" type="hidden"><input name="do_h" value="'.$_POST[do_h].'" type="hidden"> ';}

echo'<TABLE><tr><td  valign ="top">';
if($d==1){   agresor($zap1,$atakujacy);}else{echo 'Agresor nie okreslony'; exit();}

echo'</td><td valign ="top">';

if($o==1){   obronca($zap2,$o_name);}else{echo 'Cela ataku nie okreslony'; exit();}

echo'</td><td colspan="2"  valign ="top">';

  echo'<input value="Dalej" type="submit"><BR></form>';

echo"</td></tr></table>";

?>