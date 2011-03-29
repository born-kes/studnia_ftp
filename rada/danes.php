<html dir="ltr" lang="pl"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="Content-Language" content="pl">
<link rel="stylesheet" type="text/css" href="../stamm1201718544.css">
</head>
<body>
<?PHP include('../connection.php'); ?>
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
   <td>Ostatnia aktualizacja listy Plemion</td>
   <td><? echo zly($plemie);  ?></td>
  </tr>
  <tr>
   <td>Ostatnia aktualizacja listy Graczy</td>
   <td><? echo zly($users);  ?></td>
  </tr>
  <tr>
   <td>Ostatnia aktualizacja listy Wiosek</td>
   <td><? echo zly($wsi);  ?></td>
  </tr>
 </tbody>
</table>
</body>
</html>