<?PHP include('../connection.php'); ?><html><head>
           <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
           <meta http-equiv="Content-Style-Type" content="text/css">
           <meta http-equiv="Content-Language" content="pl">
           <link rel="stylesheet" type="text/css" href="../stamm1201718544.css">
           <script src="../js/ajax.js?2" type="text/javascript"></script>
           <script src="../js/plac.js?2" type="text/javascript"></script>
</head>
<body>

<?
$wsi = zap('name,name','`ws_all`','id=0');
$users = zap('data,data','`list_user`','id=0');
$plemie =  zap('name,name','`list_plemie`','id=0');

function zly($a)
{// global $godzina_zero;
 if(count($a)>1){$b=$a = intval($a[0]);}else{$b = intval($a);}
$b += $godzina_zero;
return data_z_bazy($b).dns($a);
}
 ?>
<table class="vis">
 <tbody>
  <tr>
   <th>Dane Serwera</th>
   <th>Data</th>
  </tr>
  <tr>
   <td>Ostatnia <a href="#" onclick="Klik('plemie','update.php?pas=3');return false;">aktualizacja</a> listy Plemion</td>
   <td><? echo zly($plemie);  ?></td><td id="plemie" />
  </tr>
  <tr>
   <td>Ostatnia <a href="#" onclick="Klik('gracz','update.php?pas=2');return false;">aktualizacja</a> listy Graczy</td>
   <td><? echo zly($users);  ?></td><td id="gracz" />
  </tr>
  <tr>
   <td>Ostatnia <a href="#" onclick="Klik('wsi','update.php?pas=1');return false;">aktualizacja</a> listy Wiosek</td>
   <td><? echo zly($wsi);  ?></td><td id="wsi" />
  </tr>
 </tbody>
</table>
<?
$zap=" SELECT name FROM `list_user` WHERE `prawa` =1";
  connection();
$wynik = mysql_query($zap);
echo '<br /><b> Posiadaj± prawa Radnego do studni. </b><br />';

  while($f = @mysql_fetch_array($wynik))
{
echo $f[name].'<br />';
}    destructor();
?>
</body>
</html>