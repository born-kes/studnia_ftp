<?PHP include_once('../www/connection.php');

    if($_GET[p]!==NULL)
{$pass=$_GET[p];}
elseif($_GET['amp;p']!==NULL)
{$pass=$_GET['amp;p']; }
else{echo '<center><h1>SESJA MINELA</h1></center>'; exit(); }
 connection();   $wynik = mysql_query("SELECT haslo FROM `us` where id='0'");

  if($r = @mysql_fetch_array($wynik)){$b_pas=$r[haslo];} destructor();

  if (!$b_pas===$pass)
    { echo '<center><h1>SESJA MINELA</h1></center>'; exit();}
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
echo IP_prawdziwe();

//polaczenie z baza            (dirname(dirname(__FILE__)) . '/
 connection();
 //zapytanie o dane przypisane do ip
  
 $zap="SELECT u.id,u.login,u.haslo FROM `us` u , `proxi` p Where u.nr_ip = p.id AND p.ip='$ip';";
$wynik = mysql_query($zap);
 //zakonczenie poloczenia z baza

 //efekt
  if($r = @mysql_fetch_array($wynik))
 {
echo'<br />Witaj <b>'.$r[login].'</b><br />
		<form action="http://plemiona.pl/index.php?action=login" method="post" target="sec">
		<input type="hidden" name="user" value="'.$r[login].'" >
		<input type="hidden" name="clear" value="true" >
                <input type="hidden" name="password" value="'.$r[haslo].'">
		<input type="hidden" name="server" value="pl5">
		<input value="ZALOGUJ SIE" type="submit">
		<input type="hidden" name="cookie" value="true" >
		</form>';
$id_player=$r[id];		
  }else{
  echo'<br /><b>ip</b> nieznane.';
 destructor(); exit(); } destructor();
echo '<br />';

  if($id_player!=NULL)
{
$ile = "SELECT COUNT( * ) AS `Rekordów` , `player` FROM `village` Where `player`='$id_player' GROUP BY `player` ORDER BY `player`";
 connection();$ile_szt= @mysql_query($ile);
if($r = @mysql_fetch_array($ile_szt))
{echo ' <h3 align="center"> Ilosc Wiosek : '.$r[0].'</h3>'; $zadania_ile=$r[0]-1;}
else{echo ' <h3 align="center"> Nie znaloziono Wiosek tego gracza</h3>';}
destructor();
    $a_id=$_POST['id'];
    $a_opi=$_POST['opis'];
      connection(); @mysql_query("DELETE FROM `opis` WHERE `id` ='$a_id' AND `opis`!='$a_opi'");destructor();
    if($a_opi!==NULL&&$a_opi!=''&&$a_opi!=' ')
      {
       connection(); $_opis= @mysql_query("SELECT `opis` FROM `opis` Where `id`='$a_id'");
        if(!$r = @mysql_fetch_array($_opis))
          { destructor();
            connection(); @mysql_query("INSERT INTO `opis` ( `id` , `opis` ) VALUES ('$a_id', '$a_opi');");  destructor();
            $fin = '<b>Dodano nowy opis</b>';
          }else{destructor();}
      }

/*
 for($g=1;$stron_ile>=$g;$g++)
 {

  if($g!=$_GET[str]){echo'<a href="?str='.$g.'&p='.$pass.'"  target="main"> ['.$g.']</a>';}
  else{echo'<b> ['.$g.']</b>';}
 }

if($_GET[str]!=NULL){$str=$_GET[str];}else{$str=1;}
$linia=-15; for($g=0;$g++<$str;){$linia+=20;}
echo '<form name="komentarz" action="?str='.$_GET[str].'&p='.$pass.'" method="post">';
echo '<input type="submit" value="zapisz opis" />';

echo' <table class="box" width="90%"><tbody><tr />';

     $zap = "SELECT v.id,v.name,v.x,v.y,o.opis FROM `village` `v` LEFT JOIN `opis` `o` ON o.id=v.id WHERE v.`player`='$id_player' ORDER BY v.`name` ASC LIMIT $linia , 20";
  connection();  $wynik = @mysql_query($zap);
   while($r = @mysql_fetch_array($wynik))
   {
    echo '<tr><td><a href="game.php?village='.$r[id].'&screen=overview&amp;" target="sec">'.$r[name]."($r[x]|$r[y])</a> </td></tr>";
    echo '<tr><td><input type="text" name="opis[]" value="'.$r[opis].'" /><input type="hidden" name="id[]" value="'.$r[id].'" /></td></tr>';
   }
  destructor();
//koniec id
}*/
#form 2
echo '<form name="lista wiosek" action="http://pl5.plemiona.pl/game.php?" method="GET" target="sec">';
echo '<input name="screen" type="hidden" value="overview" />';
echo '<select name="village">';
$i=0;     $zap = "SELECT v.id,v.name,v.x,v.y,o.opis FROM `village` `v` LEFT JOIN `opis` `o` ON o.id=v.id WHERE v.`player`='$id_player' ORDER BY v.`name`";
    // Lista to spis wiosek
    // e_list = element listy
    // $zadania_ile = ilosc wiosek
    if($_GET['list']===NULL){$e_list = 0;}else{$e_list = $_GET['list']; }

  connection();  $wynik = @mysql_query($zap);
   while($r = @mysql_fetch_array($wynik))
   { echo '<option value="'.$r[id].'"';
       if($i==$e_list){$b=$r;echo ' selected="selected" '; }
    echo ">[nr.$i] $r[name]($r[x]|$r[y])- [$r[opis]] </option>";$i++;
   }
  destructor();
  echo '</select>';
echo '<input type="submit" value="Wybierz Wiosek" />';
echo'</form>';

# form 3
       //do ty³u
    if($e_list==0)
    {$e_list0=$zadania_ile;}
 else
     {$e_list0=$e_list-1;}
      // do przodu
    if($e_list==$zadania_ile)
    { $e_list1=0;}
 else
     {$e_list1=$e_list+1;}
echo '<form name="3" action="" method="GET" target="main"><input type="hidden" name="p" value="'.$pass.'" />';
echo '<a href="?list='.($e_list0).'&p='.$pass.'" target="main"><img src="http://pl5.plemiona.pl/graphic/links.png?1" alt=""><img src="http://pl5.plemiona.pl/graphic/links.png?1" alt=""></a> . ';
echo '<a href="?list='.($e_list1).'&p='.$pass.'" target="main"><img src="http://pl5.plemiona.pl/graphic/rechts.png?1" alt=""><img src="http://pl5.plemiona.pl/graphic/rechts.png?1" alt=""></a>';
echo 'nr:<input type="text" name="list" value="'.$e_list.'" size="3"  /><input type="submit" value="skok" /></form>';
#form 4
echo '<form name="4" action="?list='.$e_list.'&p='.$pass.'" method="POST" target="main"> ';
#echo '<a href="http://pl5.plemiona.pl/game.php?village='.$b[id].'&screen=overview&amp;" target="sec">'.$b[name]." ($b[x]|$b[y])</a>";
  echo $fin;
echo '<br>';
echo '<input type="text" name="opis" value="'.$b[opis].'" /><input type="hidden" name="id" value="'.$b[id].'" />';
echo '<input type="submit" value="dodaj Opis" />';
echo '</form>';
}
?>