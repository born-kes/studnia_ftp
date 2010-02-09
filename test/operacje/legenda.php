<?PHP require "../connection.php"; 
if(isSet($_SESSION['id'])){ $moje_id= $_SESSION['id'];}
else{ $user=$_SESSION['zalogowany'];
  connection();
     $wynik = mysql_query("SELECT `Id` FROM `Users` WHERE Nazwa='$user'")or die('Blad zapytania');
       if($r = mysql_fetch_row($wynik)){$moje_id=$r[0];}
  destructor();
}

?><html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
  <meta name="KES" content="[ 9oKesi ]" />
  <title>Strona Witaj</title>
<link rel="stylesheet" type="text/css" href="stamm.css">
</head><body>
<br /><table><tr><td><table><CAPTION><b>Colory</b><br /></CAPTION>
<tr><TD width="15" class="ja">Ty: <b><?PHP echo $_SESSION['zalogowany']; ?></b></td></tr>
<tr><TD width="15" class="sz">Opuszczone </td></tr>
<?PHP 

for($i=0; count($plemiona)>$i;$i++)
{ echo '<tr><TD width="15" class="'.map_color(1,$id_plem[$i]).'"><b>'.$plemiona[$i].'</b></td></tr>'."\n"; }

?>
<tr><TD width="15" class="<?PHP echo map_color(1,1);     ?>">inne </td></tr>
</table></td><td><table><CAPTION><b>Grafika</b><br /></CAPTION>
<tr><td>
<table class="main">
 <tr><th>Status Obrony (zagrody)</th></tr>
 <tr><th>Zagroda: 20000<br> (zw się nie wlicza)</th></tr>
 <tr><td>
<img src="../img/mt0.gif"  /> Niebroniona (0 - 0,4) <br>
<img src="../img/mt1.gif"  /> Oddział (0,4 - 1)<br>
<img src="../img/mt2.gif"  /> Posterunek (1 - 3)<br>
<img src="../img/mt3.gif"  /> Warownia (3 - 6)<br>
<img src="../img/mt4.gif"  /> Twierdza (6 - 10)<br>
<img src="../img/mt5.gif"  /> Bunkier (10 ->)<br>
<img src="../img/mt6.gif"  /> BUNKIER (??)</td></tr>
 <tr><th>Typy Wiosek</th></tr>
 <tr><td>
<img src="../img/mtoff.gif"  /> Off<br>
<img src="../img/mtdef.gif"  /> Def<br>
<img src="../img/mtzw.gif"  /> Zwiad</td></tr>
 <tr><th>Inne:</th></tr>
 <tr><td><img src="../img/mtsz.gif"  /> Szlachta</td></tr>
 <tr><td><img src="../img/mtr.gif"  /> Raport</td></tr>
</table>
</td></tr>
</table>
</body>
</html>