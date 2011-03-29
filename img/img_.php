<?PHP include_once('i_d.php');
 $ec =mktime()-$godzina_zero; 
$zapytanie="SELECT  wm.typ, a.godz, wr.mur,wr.status,
     wr.data,wr.pik,wr.mie,wr.luk,wr.ck,wr.zw,wr.sz,
     wr.axe, wr.lk, wr.kl, wr.tar, wr.kat
FROM ws_all w
LEFT JOIN ws_raport wr ON wr.id = w.id
LEFT JOIN ws_mobile wm ON wm.id = w.id
LEFT JOIN list_ataki a ON w.id = a.cel AND a.godz>$ec
  WHERE w.id='$id' ORDER BY `a`.`godz` ASC ;";//LIMIT 1;";
//echo $zapytanie;
connection();
$wynik = @mysql_query($zapytanie);

if($r = mysql_fetch_array($wynik))
{

 if( ($r[mur]!=NULL) || ($r[typ]!=NULL&&$r[typ]!=0) || ($r[data]!=NULL) || ($r[sz]!=NULL&&$r[sz]!=0) || ($r[godz]!=NULL) )
 {

  if($r[mur]!=NULL){ include('imur.php'); }
  if($r[typ]!=NULL&&$r[typ]!=0){ include('ityp.php'); }
  if($r[data]!=NULL){ include('iwoj.php'); }
  if($r[sz]!=NULL&&$r[sz]!=0){ include('isz.php'); }
  if($r[godz]!=NULL){ include('iatak.php'); }
 }

}destructor();

?>