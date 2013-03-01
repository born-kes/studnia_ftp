<?PHP include_once('../serwer.php'); session_start();

    if($_GET[p]!==NULL)
{$pass=$_GET[p];}
elseif($_GET['amp;p']!==NULL)
{$pass=$_GET['amp;p']; }
else{$ip_php.='<center><h1>SESJA MINELA</h1></center>'; exit(); }
?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="img/stamm1201718544.css">
</head><?php
// sprawdzenie IP
function IP_prawdziwe(){

if ($_SERVER['HTTP_X_FORWARDED_FOR']) {
    $ip_prawdziwe = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
else {
  $ip_prawdziwe = $_SERVER['REMOTE_ADDR'];
}
return $ip_prawdziwe;
}
// przypisanie do zmiennej
$ip = IP_prawdziwe();

// wy¶wietlenie
$ip_php.= IP_prawdziwe();

//polaczenie z baza            (dirname(dirname(__FILE__)) . '/

 //zapytanie o dane przypisane do ip
  
 $zap="SELECT u.id,u.name AS login,u.haslo2 AS haslo FROM `list_user` u , `list_proxi` p Where u.nr_proxi=p.id AND p.ip='$ip';";
 connection();
$wynik = mysql_query($zap);
 //zakonczenie poloczenia z baza

 //efekt
  if($r = @mysql_fetch_array($wynik))
 { $warunek = true;
//session_start();
if(!isSet($_SESSION['zalogowany'])){$_SESSION['zalogowany']=$r[login];}
$ip_php.='<br />Witaj <b>'.urldecode($r[login]).'</b><br />
		<form action="http://www.plemiona.pl/index.php?action=login" method="post" target="sec">
		<input type="hidden" name="user" value="'.urldecode($r[login]).'" >
		<input type="hidden" name="clear" value="true" >
                <input type="hidden" name="password" value="'.urldecode($r[haslo]).'">
		<input type="hidden" name="server" value="pl5">
		<input value="ZALOGUJ SIE" type="submit">
		<input type="hidden" name="cookie" value="true" >
		</form>';
$id_player=$r[id];		
  }else{  $warunek = false;
  $ip_php.='<br /><b>ip</b> ';
 destructor();  
  $qest = "SELECT COUNT( * ) AS `Rekordów` FROM `list_proxi` Where ip='$ip' GROUP BY `id` ORDER BY `id`";
 connection();
$wynik = mysql_query($qest);
  if($r = @mysql_fetch_array($wynik))
 {$ip_php.= ' <SPAN style="color:green;">nie przypisane go konta</SPAN>';}else{$ip_php.= ' <h1 style="color:red;">Nieznane w bazie </h1> ';}
} destructor();
$ip_php.= '<br />';



  if($id_player!=NULL && $warunek)
{
$ile = "SELECT COUNT( * ) AS `Rekordów` , `player` 
FROM `ws_all`
Where `player`='$id_player'
GROUP BY `player` ORDER BY `player`";
 connection();$ile_szt= @mysql_query($ile);
if($r = @mysql_fetch_array($ile_szt))
{ $zadania_ile=$r[0]-1;}
else{$ip_php.= ' <h3 align="center"> Nie znaloziono Wiosek tego gracza</h3>';}
destructor();
    $a_id=$_POST['id'];
    $a_opi=$_POST['opis'];
      connection(); @mysql_query("DELETE FROM `ws_opis` WHERE `id` ='$a_id' AND `opis`!='$a_opi'");destructor();
    if($a_opi!==NULL&&$a_opi!=''&&$a_opi!=' ')
      {
       connection(); $_opis= @mysql_query("SELECT `ws_opis` FROM `opis` Where `id`='$a_id'");
        if(!$r = @mysql_fetch_array($_opis))
          { destructor();
            connection(); @mysql_query("INSERT INTO `ws_opis` ( `id` , `opis` ) VALUES ('$a_id', '$a_opi');");  destructor();
            $fin = '<b>Dodano nowy opis</b>';
          }else{destructor();}
      }

#form 2
$ip_php.= '<form name="lista wiosek" action="http://pl5.plemiona.pl/game.php?" method="GET" target="sec">';
$ip_php.= '<input name="screen" type="hidden" value="overview" />';
$ip_php.= '<select name="village" style="font-size:10px;">';
if($_GET['h']==1){ $hs1=' AND  m.sz>1';$hs='LEFT JOIN ws_mobile m ON v.id=m.id '; $hst=', m.sz ';}

$i=0;     $zap = "SELECT v.id,v.name,v.x,v.y $hst FROM `ws_all` `v` $hs  WHERE v.`player`='$id_player' $hs1 ORDER BY v.`name`";
//echo $zap;
    // Lista to spis wiosek
    // e_list = element listy
    // $zadania_ile = ilosc wiosek
    if($_GET['list']===NULL){$e_list = 0;}else{$e_list = $_GET['list']; }

  connection();  $wynik = @mysql_query($zap);
   while($r = @mysql_fetch_array($wynik))
   { $ip_php.= '<option value="'.$r[id].'"';
       if($i==$e_list){$b=$r;$ip_php.= ' selected="selected" '; }
    $ip_php.= ">[nr.$i] ".urldecode($r[name])." ($r[x]|$r[y])</option>";$i++;
    $ip_php.= "<option disabled=\"tak\">szl [".$r[sz]."] </option>";

   }
  destructor();
  $ip_php.= '</select>';
$ip_php.= '<input type="submit" value="Wejdz do Wioski - Usun reklame" />';
$ip_php.='</form>';

 $data = mktime()-$godzina_zero;
 $query = "UPDATE `list_user` SET  data='$data' WHERE id=$id_player;";
    connection();
      @mysql_query($query);
    destructor();

}
?>