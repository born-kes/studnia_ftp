<?PHP include_once('../../connection.php');
       if($_SESSION['zalogowany']!='9oKesi'
        && $_SESSION['zalogowany']!='bampi'
        && $_SESSION['zalogowany']!='ZOMox' )      {echo 'brak uprawnien...';exit();}

if($_GET!=NULL)
{
 if($_GET[usun]!=NULL){
 $id_user = $_GET[g];   $zap="UPDATE list_user SET gra=0, nr_proxi=0 Where id='$id_user'" ;
 echo '<td style="display:none;" /><td /><th colspan="3">Gracz Usuniêty</th><td colspan="3" />';
 connection();
   if(mysql_query($zap)){echo '<th>zapisabo zmiany</th>';}else{echo '<th>Blad w zapisie</th>';}  destructor();

 }
  else
 {
   if($_GET[funkcja]!=NULL){  $ff = ',funkcja ='.$_GET[funkcja];}
   if($_GET[ukryj]==1){$ff .= ',wtyczka="T"';}else{$ff .= ',wtyczka="N"';}
   if($_GET[passy]!=NULL){$ff .= ", haslo2 ='$_GET[passy]' ";}
  $nr_proxi = $_GET[proxi];
  $id_user = $_GET[g];
  $zap="UPDATE list_user SET nr_proxi='$nr_proxi' $ff Where id='$id_user'" ;

connection();if(mysql_query($zap)){$fin= '<th>zapisabo zmiany</th>';}else{$fin= '<th>Blad w zapisie</th>';}  destructor();
    include_once('wiersz.php'); echo $fin;

 }
}

?>