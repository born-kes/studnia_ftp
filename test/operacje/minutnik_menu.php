<?php  include('../connection.php'); $id_zalogowany=$_SESSION['id']; ?>
<html><head>
<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
<link rel="stylesheet" type="text/css" href="stamm.css">
<script src="../js/scriptt.js" type="text/javascript"></script>
<script src="../js/ts_picker.js" type="text/javascript"></script>
</head>
<body><?PHP
function jakie_id($xy){   $x_y= explode('|',$xy);
  connection(); $wynik=@mysql_query("SELECT id FROM village WHERE x='$x_y[0]' AND y='$x_y[1]'");
 if($r = @mysql_fetch_array($wynik)){$id=$r[id];}destructor();
 return $id;
}

if($_POST[czas1]!=NULL && $_POST[opis]!=NULL)
{  $opis = urlencode($_POST[opis]); $data = (mkczas_pl($_POST[czas1])-$godzina_zero);
$into = "Insert Into `Minutnik` Values('','$data','$id_zalogowany','$opis',";
if($_POST[o_xy]!=NULL && $_POST[a_xy]!=NULL){ 
$id_a =jakie_id($_POST[a_xy]);
$id_b =jakie_id($_POST[o_xy]);
if($id_a!=NULL && $id_b!=NULL){$into.= "'".$id_a."','".$id_b."');"; $kk=1;}else{echo '<h5>wioska nie istnieje</h5>';}  

} else {$into.= "'','');"; $kk=1;}
 connection();@mysql_query($into); destructor();
 if($kk==1){ echo "<h4>Dodano Wpis</h4>";}

}elseif($_POST!=NULL){echo "<h4>Dane nie pelne</h4>";}?>

<br />
<table class="main" width="80%" align="center">
<form name="minutnik" action="?" method="POST">
 <tr><td>Data: <a href="javascript:show_calendar('document.minutnik.czas1', document.minutnik.czas1.value);"> <img src="../img/cal.gif" width="16" height="16" border="0" alt="Clicknij Tu by ustalić Datę"></a></td><td colspan="2"><input name="czas1" value="" size="22" type="text"></td></tr>
 <tr><td>Opis :</td><td colspan="2"><input type="text" name="opis" value="" size="22"></td></tr>
 <tr><th colspan="3">Odesłanie na plac:</th></tr>
 <tr><td colspan="3">Wioska agresora:<input name="a_xy" tabindex="13" value="" maxlength="7" size="7" type="text"></td></tr>
 <tr><td colspan="3">Wioska obroncy:<input name="o_xy" tabindex="13" value="" maxlength="7" size="7" type="text"></td></tr>
 <tr><td><input value="Dodaj" type="submit"></td></tr>
</form>
</table>
</body></html>