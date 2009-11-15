<?PHP  include('../serwer.php');

    if( $_GET['id']!=NULL){$zid =  $_GET['id'];}
    if( $_GET['typ']!=NULL){

 $zapytanie = "UPDATE budy SET status=".$_GET['typ']." WHERE id=$zid;";

   // echo $zapytanie2;
     connection();
       if(!@mysql_query($zapytanie2))
       {
     destructor();
           connection();
           if(!@mysql_query($zapytanie))
           {
                $string='Nie Uda³o siê Dodaæ Raportu';

           }else{$string='Zaktu³alizowano Raport'; }

       }else{$string='Dodano Nowy Raport';}
     destructor();
//echo $string.'<br>: '.$zapytanie.'<br>'.$zapytanie2.'<br>';
   }
 $zap="SELECT `status` FROM `budy` Where id=$zid";
 connection();$wynik = @mysql_query($zap);if($r = @mysql_fetch_array($wynik)){$status=$r[0];} destructor();

 function ff($l){global $status; if($l==$status){echo ' selected="tak" value="'.$l.'"';}else{echo ' value="'.$l.'"';} } ?>
<form name="status" action="" method="get" style="border:0px;"><input type="hidden" name="id"  value="<?PHP echo $zid; ?>" />
  <div style="position:absolute;top:-1px; bottom:+2px;"><select name="typ" size="1">
   <option<?PHP ff("0");?>>Rozbudowa 0</option>
   <option<?PHP ff("1");?>>Rozbudowa 1</option>
   <option<?PHP ff("2");?>>Rozbudowa 2</option>
   <option<?PHP ff("3");?>>Rozbudowa 3</option>
   <option<?PHP ff("4");?>>Rozbudowa 4</option>
   <option<?PHP ff("5");?>>Rozbudowa 5</option>
   <option<?PHP ff("6");?>>Rozbudowa 6</option>
  </select><input type="submit" value="Zapisz" /></div></form>