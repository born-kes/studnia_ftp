<?PHP
$prawa = 1;
    if($_SESSION['zalogowany']=='9oKesi'){$prawa = 3;}
elseif($_SESSION['zalogowany']=='bampi'){$prawa = 3;}
elseif($_SESSION['zalogowany']=='ZOMox'){$prawa = 3;}
else
{echo $_SESSION['zalogowany'];}

if($_GET[g]!=NULL)$pole =" AND u.id='$_GET[g]'";                            //zapytanie o dane przypisane do ip

$zap="
SELECT u.id,u.name AS login, u.haslo2, p.ip, p.name, wz,u.wtyczka ,data,funkcja
FROM `list_user` u, `list_proxi` p
Where u.nr_proxi=p.id
    ".$pole."
  AND u.haslo2!=''
  AND u.gra!=0
ORDER BY u.name ASC ";

 connection();
$wynik = mysql_query($zap);
 //zakonczenie poloczenia z baza
 //efekt
  while($f = @mysql_fetch_array($wynik))
   {$cl=''; if($prawa <2 && ($f[wtyczka ]=='T') ){ continue;}elseif($f[wtyczka ]=='T'){$cl=' class="dd"';}
       echo '<tr id="a'.$f[id].'" '.$cl.'><td style="display:none;">'.$f[data].'</td>';


       echo '<td>'.urldecode($f[login]).'</td>';
       if($f[haslo2]!=NULL&&$f[haslo2]!='0'){echo '<td><img src="http://pl5.plemiona.pl/graphic/dots/green.png?1" title="Tak" alt=""></td>';}
                      else{echo '<td><img src="http://pl5.plemiona.pl/graphic/dots/grey.png?1" title="Nie" alt=""></td>';}
       if($f[ip]!=NULL&&$f[ip]!='0'){echo '<td><img src="http://pl5.plemiona.pl/graphic/dots/green.png?1" title='.$f[ip].' alt=""></td>';}
                      else{echo '<td><img src="http://pl5.plemiona.pl/graphic/dots/grey.png?1" title="brak ustawionej bramki" alt=""></td>';}
if(false)     //$f[wz]=="N")
{
 echo '<td><a href="'.$f[name].'" target="_blank">'.$f[name].'</a></td>';
}else{
 echo '<td><a href="'.$f[name].'" target="_blank">WEJDZ</a></td>';
}
if($f[funkcja]!=1){
$dnis = intval( (mktime()-$f[data]-$godzina_zero)/86400 );
          if((mktime()-$f[data]-$godzina_zero)>950400){
             echo '<td>'.data_z_bazy($f[data]).'== UWAGA KASACJA ('.$dnis .' dni)<img src="../img/z4.gif" title="kasacja ?"></td>'; }
     else if($f[data]!=0){ echo '<td>'.data_z_bazy($f[data]).' ('.$dnis .' dni)</td>'; }
     else{ echo '<td>Brak</td>'; }
}else{echo '<td>niedotyczy</td>';}
if($f[funkcja]==NULL){$f[funkcja]=0;}
echo '<td>'. $funkcja[$f[funkcja]] .'</td>';

if($prawa >2) echo '<td><a href="javascript:Klik(\'a'.$f[id].'\',\'prox/edyt.php?g='.$f[id].'\');">[EDYT] '.urldecode($f[login]).'</a></td>';

       echo '</tr>';
  //     echo '<tr><td style="display:none;">'.$f[data].'</td><td colspan="7" id="a'.$f[id].'"></td></tr>';

   }destructor();

?>