wpisz jako url w proxi.<br />
http://bornkes.w.szu.pl/proxi/plus.php?p=ff<br />
<table border="1">
 <tr>
  <td>Gracz</td>
  <td>has³o</td>
  <td>proxi</td>
 </tr>
<?PHP include_once('../test/connection.php');
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

 $zap="SELECT u.login,u.haslo,p.ip,p.name FROM `us`u,proxi p Where u.nr_ip=p.id AND u.nr_ip!=0 ORDER BY `u`.`login` ASC ;";
$wynik = mysql_query($zap);
 //zakonczenie poloczenia z baza
 //efekt
  while($f = @mysql_fetch_array($wynik))
   {
       echo '<tr>';
       echo '<td>'.$f[login].'</td>';
       if($f[haslo]!=NULL&&$f[haslo]!='0'){echo '<td><img src="http://pl5.plemiona.pl/graphic/dots/green.png?1" alt="Tak"></td>';}
                      else{echo '<td><img src="http://pl5.plemiona.pl/graphic/dots/grey.png?1" alt="Nie"></td>';}
 echo '<td>'.$f[ip].'</td><td><a href="'.$f[name].'">'.$f[name].'</a></td>';
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