<?php  include('../connection.php'); ?>
<html><head>
<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
<link rel="stylesheet" type="text/css" href="../img/stamm1201718544.css">
<script src="../mootools.js" type="text/javascript"></script>
<script src="../scriptt.js" type="text/javascript"></script>
<script src="../ts_picker.js" type="text/javascript"></script>
</head>
<body>

<?PHP 
$id_zalogowany=$_SESSION['id'];

if($_POST[czas1]!=NULL && $_POST[opis]!=NULL)
{
  $opis = urlencode($_POST[opis]);
$data = $_POST[czas1];
$into = "Insert Into `Minutnik` Values('','$data','$id_zalogowany','$opis');";
 connection(); @mysql_query($into); destructor(); echo "<h4>Dodano Wpis</h4>";
}elseif($_POST!=NULL){echo "<h4>Dane nie pelne</h4>";}
     
if($_GET[usun]!=NULL){$dell = "Delete from `Minutnik` where `id_min`='$_GET[usun]' AND `id_gracz`='$id_zalogowany'"; connection(); @mysql_query($dell); destructor(); echo "<h4>Usunieto Wpis</h4>";}                
if($_GET[usun_all]!=NULL && $id_zalogowany!=NULL){$dell = "Delete from `Minutnik` where `id_gracz`='$id_zalogowany';"; connection(); @mysql_query($dell); destructor(); echo "<h4>Usunieto Wpis</h4>";connection(); @mysql_query('OPTIMIZE TABLE `Minutnik`'); destructor(); }                
?>

<table align="center">
<form name="minutnik" action="?m=8" method="POST">
 <tr>
  <td><input value="Dodaj" type="submit"></td> 
  <td>Data:<input name="czas1" value="" size="22" type="text"><a href="javascript:show_calendar('document.minutnik.czas1', document.minutnik.czas1.value);"> <img src="../img/cal.gif" width="16" height="16" border="0" alt="Clicknij Tu by ustalić Datę"></a></td>
  <td>Nowy OPIS :<input type="text" name="opis" value="" size="80"></td>
 </tr>
 <tr>
  <td></td>
  <td colspan="3" align="right" ><a href="?usun_all=1">Usuń wszystkie wpisy do Minutnika</a></td>
 </tr>
</form>
 <tr>
  <td align="center" colspan="3"> 
   <table class="box" cellspacing="0" border="0"><tbody><tr><td><BR /></td></tr>
<?PHP
     $zap = "SELECT * FROM `Minutnik` WHERE `id_gracz`='$id_zalogowany' ORDER BY `data` ASC";  connection();  $wynik = @mysql_query($zap);

   while($r = mysql_fetch_array($wynik)){

echo '<tr><td> '.$r[1].' </td><td> </td><th> ';    $da = split("[ :-]", $r[1]);      $mktt =  mktime($da[3],$da[4],$da[5],$da[1],$da[2],$da[0])-mktime();
$pdata = przeliczenie($mktt);
if($mktt>0){      echo ' <span class="timer"> '.$pdata.' </span> ';
}else{ echo ' <b><span class="warn" >Odliczanie skonczone</span></b> ';}

       echo ' </th><td> </td><td> '.urldecode($r[3]).' </td><td></td><td> <a href="?usun='.$r[0].'"> USUN </a></td></tr><tr><td><BR></td></tr>';
}                    destructor();

?>
<tr>
<td><BR />
Zegarek: <b><span id="serverTime" class="warn"><?PHP echo date("G:i:s"); ?></span></b></td>
</tr></tbody></table>
<script type="text/javascript">startTimer();</script>
