<?PHP include_once('../connection.php');?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<style type="text/css">
<!--

  BODY {background: #F7EED3;}
table.main { background-color:#F7EED3; border:0px solid #804000;}
table.ba { border-bottom:0px;}
table.main td{font-size:11px;}
table.main th{font-size:11px;}
table.main tr.row th{font-size:11px;}
table.main tr.row td { background-color:#006600; background-image:none; color:#F1EBDD;}    //DED3B9
table.main tr.row td.hidden { color:#333366; }
tr.center td { text-align:center; }


-->
</style>
</head>
<body>
By Si� zalogowa�, wpisz jako <b>URL</b> klucz<br />
klucz z manu bocznym: <b>http://bornkes.w.szu.pl/proxi/plus.php?p=ff</b><br />
klucz Awaryjny<b>http://bornkes.w.szu.pl/proxi/ipp.php?p=ff</b>
<table border="1" class="main ba">
 <tr>
  <td>Gracz</td>
  <td>Wtyczka</td>
  <td>has�o</td>
  <td>proxi</td>
  <td>Adres Bramki</td>
 </tr>
<?PHP

if($_SESSION['zalogowany']=='9oKESi'){$prawa = 3;}else{echo $_SESSION['zalogowany'];}
#   function test($i)                  // statusy dla proxi
#    {   if($i==0){$st='niewybrane';}
#        elseif($i==1){$st='error'; }
#        elseif($i==2){$st='ok';}
#        elseif($i==3){$st='ok + js';}
#        elseif($i==4){$st='error + js';}
#    return $st;
#    }

# $zap="SELECT p.id,p.name,p.status,us.nr_ip FROM `proxi` p LEFT JOIN `us` ON us.serwer = p.name";
 connection();                                               //zapytanie o dane przypisane do ip
#$wynik = mysql_query($zap); $l=0;                            //efekt
#  while($r = @mysql_fetch_array($wynik))
#   {  if($r[nr_ip]!=NULL){$select[$l++].="<option value=\"$r[id]\" selected disabled=\"tak\" >[".test($r[status])."] $r[name]</option>";}
#                     else{$select[$l++].="<option value=\"$r[id]\" selected >[".test($r[status])."] $r[name]</option>";}   }

$zap="
SELECT u.id,u.name AS login, u.haslo2, p.ip, p.name, wz,u.wtyczka 
FROM `list_user` u, `list_proxi` p 
Where u.nr_proxi=p.id
  AND (u.haslo2!='' OR u.ally= '50811') 
ORDER BY u.name ASC ;";

$wynik = mysql_query($zap);
 //zakonczenie poloczenia z baza
 //efekt
  while($f = @mysql_fetch_array($wynik))
   {
       echo '<tr>';
       echo '<td>'.$f[login].'</td>';
       echo '<td>'.$f[wtyczka].'</td>';
       if($f[haslo2]!=NULL&&$f[haslo2]!='0'){echo '<td><img src="http://pl5.plemiona.pl/graphic/dots/green.png?1" title="Tak" alt=""></td>';}
                      else{echo '<td><img src="http://pl5.plemiona.pl/graphic/dots/grey.png?1" title="Nie" alt=""></td>';}
       if($f[ip]!=NULL&&$f[ip]!='0'){echo '<td><img src="http://pl5.plemiona.pl/graphic/dots/green.png?1" title='.$f[ip].' alt=""></td>';}
                      else{echo '<td><img src="http://pl5.plemiona.pl/graphic/dots/grey.png?1" title="brak ustawionej bramki" alt=""></td>';}
if($f[wz]=="N")
{
 echo '<td><a href="'.$f[name].'">'.$f[name].'</a></td>';
}else{
 echo '<td><a href="'.$f[name].'">WEJDZ</a></td>';
}
if($prawa == 3){ echo '<td><a href="edyt.php?g='.$f[id].'">'.$f[login].'</a></td>'; }
// wybur proxi
 #      echo '<td><select name="'.$f[id].'">';
 #             for($i=0;count($select)>$i;$i++)
 #             {
 #                 if($i==$f[nr_ip]){echo str_replace('selected', 'selected="tak"', $select[$i]);}
 #                 else{echo str_replace('selected', '', $select[$i]);}
 #             }
 #      echo '</select></td>';

       echo '</tr>';
   }destructor();
?></table>