<?PHP
session_start();
if(!isSet($_SESSION['zalogowany'])){
  $_SESSION['komunikat'] = "Nie jesteś zalogowany!";
  include('../form.php');
  exit();}
include('connection.php');

if(!isSet($_SESSION['id'])){
   connection();
   $wynik = mysql_query("SELECT p.id
      FROM tribe p
      WHERE p.name = '$zalogowany'")or die('Blad zapytania');

   if($r = mysql_fetch_array($wynik)){
   $_SESSION['id'] = $r[0];
    $id_zalogowany=$r[0];                       }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>KEStools.raportów - Plemiona</title>
  <meta http-equiv="Content-type" content="text/html; charset="ISO-8859-2" />

<link rel="stylesheet" type="text/css" href="../stamm1201718544.css">
<script src="../mootools.js" type="text/javascript"></script>
<script src="script.js" type="text/javascript"></script>
</head>
<body>
<br />
<?PHP //MENU
include('menu.php');
echo'<br /><table border="0" align="center" ><tr><td>';
?>
<?PHP //Przeglądaj baze
if($_GET[pb]!=NULL){include('zap_baza.php');}
if($_GET[pbf]!=NULL){include('zap_baza_fin.php');}
if($_GET[m]!=NULL){
switch($_GET[m]){
case 0:
 include('img/color.php');
  break;
case 3:
 include('mapa_taktyczna.php');
  break;
case 4:
 include('mapa_szczegulowa.php');
  break;
case 8:
 include('minuta.php');
  break;
default:
  break;}}
if($_GET[kr]!=NULL){include('kk.php');}
if($_GET[cc]!=NULL){
switch($_GET[cc]){
case 0:
 include('cal/0.php');
  break;
case 1:
 include('cal/1.php');
  break;
case 2:
 include('cal/2.php');
  break;
case 3:
 include('cal/3.php');
  break;
case 4:
 include('cal/4.php');
  break;
case 9:
 include('cal/strzelec.php');
  break;
case 10:
 include('cal/Allkena.php');
  break;

default:
  break;}
}
if($_GET[cal]!=NULL){
switch($_GET[cal]){
case 0:
 include('cal/szybki.php');
  break;
case 1:
 include('cal/Kalkulator_prosty.php');
  break;
default:
  break;}
}
if($_GET[f]==1){include('edyt/ed_typ.php');}
if($_GET==NULL){echo'<table><tr><td>
<a href="http://www.szu.pl" target="_blank">
<img src="http://szu.pl/grafika/szu114x50.gif" border="0" alt="bazy danych MySQL, konta pocztowe, konta WWW, parkowanie domen"></a> 
</td><td>Strona Nie działa pod IE</td></tr>
<table>';}

?>

</td></tr></table></body></html>
