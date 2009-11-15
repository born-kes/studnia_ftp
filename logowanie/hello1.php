<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<body><?PHP
 exit(); 
include_once(dirname(dirname(__FILE__)) . '/serwer.php'); ?>
<form name="t1" action="hello1.php" method="POST">
<table border="1"><a href="hello1.php">zero</a>
<?PHP
if($_POST!=NULL && $_POST[id]!=NULL){ if($_POST[prawa]==1){$pr=1;}else{$pr=0;}
$haslo = trim($_POST[haslo]);
$haslo2 = trim($_POST[haslo2]);

$zapytanie="UPDATE tribe SET haslo='".$haslo."', haslo2='".$haslo2."', prawa='".$pr."', nr_proxi='".$_POST[nr_proxi]."' WHERE id=".$_POST[id].';'; 
connection();
if(@mysql_query($zapytanie)){echo 'zapisano zmiany';}else{echo 'nie zapisano zmian:'.$zapytanie;}
destructor();
}
 $zapytanie =" SELECT *
  FROM `tribe`
  WHERE ally=50811 ";

if($_GET[id]!==NULL){ $zapytanie .=" AND id=".$_GET[id];}
 
 $zapytanie .=" ORDER BY `name` ASC;";
connection();
$wynik = @mysql_query($zapytanie);

while($r = mysql_fetch_array($wynik)){ if($r[prawa]==1){$pr=' checked="tak"';}else{$pr='';}
echo '<tr><td><input type="hidden" name="id" value="'.$_GET[id].'" /><a href="hello1.php?id='.$r[id].'">'.urldecode($r[name]).'</a></td>';
if($_GET[id]!==NULL){echo '<td>haslo<input type="text" name="haslo" value="'.$r[haslo].'" /></td>
<td>haslo2<input type="text" name="haslo2" value="'.$r[haslo2].'" /></td>
<td>prawa<input type="checkbox" name="prawa"'.$pr.' value="1" /></td>
<td>proxi<input type="text" name="nr_proxi" value="'.$r[nr_proxi].'" /></td>';}
echo'</tr>';
}
destructor(); ?>
</table><input type="submit" value="clik" /></form>
</body>
</html>