<?php
session_start();
if(!isSet($_SESSION['rez'])){
  $_SESSION['komunikat'] = "Nie jeste&#65533; zalogowany!";
  include('form.php');
  exit();
}
include"../connection.php";
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script src="javascript.js" type="text/javascript"></script>
<title>Strona glowna</title>
</head>
<body>
Jestes zalogowany jako:<b> <?php echo $_SESSION['rez'] ?></b>
<br>
Pamietaj o <a href="logout.php" >wylogowaniu</a> przed opuszczeniem strony!<br><br>
<form  action="" method="GET">
<table>
<tr><td valign="top">

<table border="1">
<tr><td height="250">

<table>
<tr><td><b>MENU</b><br><br></td></tr>

<tr><td><a href="javascript:odkryj('Wioska');" >Znajdz wioske</a><br></td></tr>

<tr><td><a href="javascript:odkryj('Okolica');">Wioski w okolicy</a><br></td></tr>

<?PHP //<tr><td><u href="javascript:odkryj('Mapa');">Mapa okolicy</u><br></td></tr>
?>
<tr><td><a href="javascript:odkryj('Spis');">Spis rezerwacji </a><br></td></tr>

<?PHP //<tr><td><a href="javascript:odkryj('all');">Wszystkie </a><br></td></tr>
?>
</table>
</td>
<td width="300" height="250">

   <table id="Wioska" style="display: none;" width="300">
     <tr><td>Wyszukuje jedna wioske</td></tr>
     <tr><td align="center">dopuszczalna forma <b>xxx|yyy</b>
     <input name="xy" maxlength  ="7" size="7" type="text"><br></td></tr>
   </table>

   <table id="Okolica" style="display: none;" width="300">
     <tr><td>Wyszukuje wioski w okolicy punktu</td></tr>
     <tr><td>Male wioski <input type="radio" name="oko_pkt" value="male">
             Srednie i duze wioski <input type="radio" name="oko_pkt" value="duze">
     <tr><td align="center">dopuszczalna forma <b>xxx|yyy</b>
     <input name="okolica" maxlength  ="7" size="7" type="text"></td></tr>
   </table>

<?PHP /*
   <table id="Mapa" style="display: none;" width="300">
     <tr><td>Graficzna mapa rezerwacji, okolica podanego punktu<br>dopuszczalna forma <b>xxx|yyy</b></td></tr>
     <tr><td align="center"><input name="mapa" maxlength  ="7" size="7" type="text"></td></tr>
   </table>

   <table id="adam" style="display: none;" width="300">
     <tr><td>Tylko dla Adminow  <br>Spis wszystkich rezerwacji</td></tr>
     <tr><td align="center"><input name="" value="" type="hidden"></td></tr>
   </table>
*/ ?>

   <table id="Spis" style="display: none;" width="300">
     <tr><td>Spis rezerwacji gracza <?PHP echo $_SESSION['rez']; ?><br><br></td></tr>
     <tr><td align="center"><input name="spis" value="<?PHP echo $_SESSION['rez']; ?>" type="checkbox"></td></tr>
   </table>

   <table id="Wykonaj" style="display: none;" width="300">
     <tr><td  align="right" valign="bottom"><input value="Wykonaj" type="submit"></td></tr>
   </table>


</td>

</tr>
<tr><td colspan="2"><b>Co to jest Okolica</b><br>
To Kwadrat 20x20 pol, ktory jest obliczany z jednego punktu,<br>
a punkt ten jest w jego centrum, stad wlasnie skojazenie,<br>
ze jest to "okolica" </td></tr>
<tr>
<td colspan="2">Warto wiedziec<br>
Wiele elementow jest opisanych, szczegoly pojawiaja sie <br>
gdy przytrzymasz kursor myszy nad elementem.
</tr>


</table></form></td><td valign="top">
<?PHP

$ja=$_SESSION['rez'];
if($_GET[zaklep]!=NULL){$raport='Rezerwacja przyjenta'; connection(); @mysql_query("INSERT INTO rezerwacje SET id_r='$_GET[zaklep]', kto_id='$ja'; ");destructor();}
if($_GET[odklep]!=NULL){$raport='Porzucona rezerwacja'; connection(); @mysql_query("DELETE FROM rezerwacje WHERE id_r='$_GET[odklep]'; ");destructor();}
if($_GET[zmiana]!=NULL){$raport='Zmiany zapisane'; connection(); @mysql_query("UPDATE rezerwacje SET ile_szl='$_GET[ile_szl]', popa='$_GET[popa]', notes='$_GET[notes]' WHERE id_r='$_GET[zmiana]' AND kto_id='$ja' ; ");destructor();}

echo "<h1>$raport</h1>";
//                             ######################  JEDNA  WIOSKA ##############
if($_GET[xy]!=NULL){$xy = explode( '|', $_GET[xy]);
echo'<h3>Znajdz wiosket</h3>
<form action=""
 method="GET"
 name="wsi" >

<input name="xy" value="'.$_GET[xy].'"  type="hidden">
<TABLE border="1"><tr>
<Th>Nazwa</Th>
<Th> X|Y </Th>
<Th>Punkty</Th>
<Th>Rezerwacje</Th>
<Th>Ilosc Szlachty</Th>
<Th>Poparcie</Th>
<Th>notatka</Th></tr>';

$zap= "SELECT  v.name AS n_wsi, v.id AS id_wsi,
v.x, v.y, v.points, r.kto_id, r.ile_szl, r.popa, r.notes
  FROM `village` v
  LEFT JOIN rezerwacje r on
v.id=r.id_r
WHERE v.player =0
AND v.x='$xy[0]'
AND v.y='$xy[1]'";

connection();
$wynik = @mysql_query($zap);
if($r = mysql_fetch_array($wynik)){
echo'<tr>
<Th>'.$r[n_wsi].'</Th>
<Th>'.$r[x].'|'.$r[y].'</Th>
<Th>'.$r[points].'</Th>
<Th>';
   if($r[kto_id]!=NULL)
   {
     if($r[kto_id]== $_SESSION['rez'])
        {
        echo '<a href="?odklep='.$r[id_wsi].'&xy='.$xy[0].'%7C'.$xy[1].'" title="porzucenie rezerwaci"  >usun '.$r[kto_id].'</button>
</a><img src="pisac_off.PNG" alt="rezygnuje z tej rezerwacji" title="rezygnuje z tej rezerwacji" /></Th>
        <Th><input name="ile_szl" maxlength  ="2" size="2" value="'.$r[ile_szl].'" type="text"></Th>
        <Th><input name="popa" maxlength  ="2" size="2" value="'.$r[popa].'"   type="text"></Th>
        <Th><input name="notes" value="'.$r[notes].'"   type="text">
       <input value="Zapisz" name="zmiana" type="submit" alt="zapisz zmiany" title="zapisz zmiany"></Th></tr>';
        }else{
         echo $r[kto_id].'</Th>
        <Th colspan="3"> brak dostepu - nie twoja rezerwacja </Th></tr>';
        }

    }else{
     echo'<a href="?zaklep='.$r[id_wsi].'&xy='.$xy[0].'%7C'.$xy[1].'" title="porzucenie rezerwaci"  > Brak rezerwaci </a><img src="pisac.PNG" alt="Ja to rezerwuje" title="Ja to rezerwuje">
 </th><th></th> <th></th><th></th></tr>' ;
    }
destructor();
}
echo '
</TABLE></form>';                 //##############  TWOJE WIOSKI  ##############################
}

 if($_GET[spis]!=NULL)
 {
   echo'<h3>Spis rezerwacji</h3>

<form action="" method="GET">
         <input name="spis" value="'.$_GET[spis].'"  type="hidden">
        <TABLE border="1"><tr>
          <Th>Nazwa</Th>
          <Th> X|Y </Th>
          <Th>Punkty</Th>
          <Th>Rezerwacje</Th>
          <Th>Ilosc Szlachty</Th>
          <Th>Poparcie</Th>
          <Th>notatka</Th></tr>';

          $zap= "SELECT  v.name AS n_wsi, v.id AS id_wsi,
          v.x, v.y, v.points, r.kto_id, r.ile_szl, r.popa, r.notes
          FROM `village` v
          RIGHT JOIN rezerwacje r on
          v.id=r.id_r
          WHERE v.player =0
          AND r.kto_id='$_GET[spis]';";

  connection();
          $wynik = @mysql_query($zap);

          while($r = mysql_fetch_array($wynik))
          {
       echo'<tr>
<Th>'.$r[n_wsi].'</Th>
<Th>'.$r[x].'|'.$r[y].'</Th>
<Th>'.$r[points].'</Th>
<Th><a href="?odklep='.$r[id_wsi].'&spis='.$_GET[spis].'" title="porzucenie rezerwaci"  >usun '.$r[kto_id].' </a> <img src="pisac_off.PNG" alt="rezygnuje z tej rezerwacji" title="rezygnuje z tej rezerwacji" /></Th>
<Th><input name="ile_szl" maxlength  ="2" size="2" value="'.$r[ile_szl].'" type="text"></Th>
<Th><input name="popa" maxlength  ="2" size="2" value="'.$r[popa].'"   type="text"></Th>
<Th><input name="notes" value="'.$r[notes].'"   type="text">
<input value="Zapisz" name="zmiana" type="submit" alt="zapisz zmiany" title="zapisz zmiany"></Th></tr>';
           }destructor();
      echo '</TABLE></form>';
}
//                                          ##################  OKOLICA       ###############
if($_GET[okolica]!=NULL){$xy = explode( '|', $_GET[okolica]);
echo'<h3>Spis wiosek w okolicy</h3>

<form action="" name="oko"  method="GET"><input name="okolica" value="'.$_GET[okolica].'"  type="hidden">
<TABLE border="1"><input name="oko_pkt" value="'.$_GET[oko_pkt].'"  type="hidden"><tr>
<Th>Nazwa</Th>
<Th> X|Y </Th>
<Th>Punkty</Th>
<Th>Rezerwacje</Th>
<Th>Ilosc Szlachty</Th>
<Th>Poparcie</Th>
<Th>notatka</Th></tr>';
$od_x=$xy[0]-10;
$od_y=$xy[1]-10;
$do_x=$xy[0]+10;
$do_y=$xy[1]+10;


$zap= "SELECT  v.name AS n_wsi, v.id AS id_wsi,
v.x, v.y, v.points, r.kto_id, r.ile_szl, r.popa, r.notes
  FROM `village` v
  LEFT JOIN rezerwacje r on
v.id=r.id_r
WHERE v.player =0
AND v.x BETWEEN '$od_x' AND '$do_x'
AND v.y BETWEEN '$od_y' AND '$do_y'";

if($_GET[oko_pkt]!=NULL)
{
if($_GET[oko_pkt]!='male'){$zap.=' AND v.points > 1000 ';}
if($_GET[oko_pkt]!='duze'){$zap.=' AND v.points < 999 ';}
}

connection();
$wynik = @mysql_query($zap);
while($r = mysql_fetch_array($wynik)){
echo'<tr>
<Th>'.$r[n_wsi].'</Th>
<Th>'.$r[x].'|'.$r[y].'</Th>
<Th>'.$r[points].'</Th>
<Th>';
   if($r[kto_id]!=NULL)
   {
     if($r[kto_id]== $_SESSION['rez'])
        {
        echo'<a href="?odklep='.$r[id_wsi].'&okolica='.$xy[0].'%7C'.$xy[1].'&oko_pkt='.$_GET[oko_pkt].'" title="porzucenie rezerwaci"  >usun '.$r[kto_id].'
        </a><img src="pisac_off.PNG" alt="rezygnuje z tej rezerwacji" title="rezygnuje z tej rezerwacji" /></Th>

        <Th><input name="ile_szl" maxlength  ="2" size="2" value="'.$r[ile_szl].'" type="text"></Th>
        <Th><input name="popa" maxlength  ="3" size="2" value="'.$r[popa].'"   type="text"></Th>
        <Th><input name="notes" value="'.$r[notes].'"   type="text">
       <input value="Zapisz" name="zmiana" type="submit" alt="zapisz zmiany" title="zapisz zmiany"></Th></tr>';
        }else{
         echo'</Th>
        <Th colspan="3">
 brak dostepu - nie twoja rezerwacja </Th></tr>';
        }

    }else{
     echo'<a href="?zaklep='.$r[id_wsi].'&okolica='.$xy[0].'%7C'.$xy[1].'&oko_pkt='.$_GET[oko_pkt].'" title="porzucenie rezerwaci"  >Brak rezerwaci</a>
        <input name="zaklep" value="'.$r[id_wsi].'" type="image" src="pisac.PNG" alt="Ja to rezerwuje" title="Ja to rezerwuje" /></a>
 </th><th></th> <th></th><th></th></tr>' ;
    }destructor();

}
echo '
</TABLE></form>';
}
//$_GET[mapa]

?>
</td></tr></table>
</body>

</html>
