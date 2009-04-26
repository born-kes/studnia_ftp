<?php  include('../connection.php'); ?>
<html><head>
<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
<link rel="stylesheet" type="text/css" href="stamm.css">
<script src="../js/scriptt.js" type="text/javascript"></script>
<script src="../js/ts_picker.js" type="text/javascript"></script>
</head>
<body>
<table align="center">
<tbody><tr ><td height="70">
<?PHP  $id_zalogowany=$_SESSION['id'];
connection(); @mysql_query("OPTIMIZE TABLE `Minutnik` "); destructor();


if($_GET[usun]!=NULL){
$dell = "Delete from `Minutnik` where `id_min`='$_GET[usun]' AND `id_gracz`='$id_zalogowany'";
 connection(); @mysql_query($dell); destructor(); echo "<h4>Usunieto Wpis</h4>";}
if($_GET[usun_all]!=NULL && $id_zalogowany!=NULL){
$dell = "Delete from `Minutnik` where `id_gracz`='$id_zalogowany';";
 connection(); @mysql_query($dell); destructor(); echo "<h4>Usunieto Wpis</h4>";
 }


$ile = "SELECT COUNT( * ) AS `Rekordów` , `id_gracz` FROM `Minutnik` Where `id_gracz`=$id_zalogowany GROUP BY `id_gracz` ORDER BY `id_gracz`";
 connection();$ile_szt= @mysql_query($ile);
if($r = @mysql_fetch_array($ile_szt)){echo ' <h3 align="center"> Ilosc Notatek : '.$r[0].'</h3>'; $zadania_ile=$r[0];}else{echo ' <h3 align="center"> Nie masz zadnych notatek</h3>';}
destructor();

?>

</td></tr></tbody></table>
<table class="main" width="80%" align="center">
 <tr>
  <td><a href="javascript:popup_scroll('minutnik_menu.php',250,250)">Dodaj wpis</a></td>
  <td colspan="3" align="right" ><a href="?usun_all=1">Usuń wszystkie wpisy do Minutnika</a></td>
 </tr>
</form>
 <tr>
  <td align="center" colspan="3">Strona :
<?PHP $stron_ile = intval($zadania_ile/15);if($stron_ile==0){$stron_ile=1;}
if($zadania_ile>15){$stron_ile+=1;}
for($g=1;$stron_ile>=$g;$g++)
{
if($g!=$_GET[str]){echo'<a href="?str='.$g.'"> ['.$g.']</a>';}
else{echo'<b> ['.$g.']</b>';}
}

if($_GET[str]!=NULL){$str=$_GET[str];}else{$str=1;}
$linia=-15; for($g=0;$g++<$str;){$linia+=15;}
?>
</td>
 </tr>

 <tr>
  <td align="center" colspan="3">
   <table class="box" width="90%"><tbody><tr />
<?PHP
     $zap = "SELECT * FROM `Minutnik` WHERE `id_gracz`='$id_zalogowany' ORDER BY `data` ASC LIMIT $linia , 15";
  connection();  $wynik = @mysql_query($zap);
   while($r = @mysql_fetch_array($wynik)){

echo '<tr><td width="9%"> '.data_z_bazy($r[1]).' </td><td width="1%"> </td><th width="9%"> ';
  $mktt =  $r[1]+$godzina_zero-mktime();
$pdata = przeliczenie($mktt);
if($mktt>0){      echo ' <span class="timer"> '.$pdata.' </span> ';
}else{ echo ' <b><span class="warn" >Odliczanie skonczone</span></b> ';}

echo ' </th><td width="1%"> </td><td width="63%"> '.urldecode(urldecode($r[3])).' </td><td width="1%"></td>';
 if($r[4]!=0 && $r[5]!=0&&$r[4]!=NULL && $r[5]!=NULL){echo '<td><a href="http://pl5.plemiona.pl/game.php?village='.$r[4].'&amp;screen=place&amp;mode=command&amp;target='.$r[5].'" target="_parent/ramka">wyslij wojska</a></td>'; }else{echo '<td></td>';}
echo'<td width="6%"> <a href="?usun='.$r[0].'&str='.$_GET[str].'"> USUN </a></td></tr>
<tr/>';
}                    destructor();

?>
</tbody></table></td><tr>
<tr>
<td align="right"><BR />
Zegarek: <b><span id="serverTime" class="warn"><?PHP echo date("G:i:s"); ?></span></b></td>
</tr></tbody></table>
<script type="text/javascript">startTimer();</script>
