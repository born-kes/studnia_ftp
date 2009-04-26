<html><head>
<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
<link rel="stylesheet" type="text/css" href="../operacje/stamm.css">
<script src="../js/mootools.js" type="text/javascript"></script>
<script src="../js/scriptt.js" type="text/javascript"></script>
</head>
<body>
<a href="index.html" target="ramka">Dodaj Nowy</a><br />
<?PHP
include_once(dirname(dirname(__FILE__)) . '/connection.php');
function dataa($data){global $godzina_zero; $data=explode(" ",$data);$ii=$data[1].' '.$data[2]; $dat =mkczas_pl($ii)-$godzina_zero; return $dat;}
function name($name){$st_r=strrpos($name, ":"); $g_name= substr($name , $st_r+2); return $g_name;}
function wojo_ex($w){$ww=explode(" ",$w);return $ww;}
function wojo($w1,$w2){for($j=0; $j<12; $j++){ $w[$j] =  $w2[$j]-$w1[$j];} return $w;}

###################
# Pobranie danych #
###################
       $txt2=$_POST[query];           $txt1 = str_replace('	',' ', $txt2);
       $txt = str_replace('  ', ' ', $txt1);      $tablica = explode("\n", $txt);

 /*pętla*/  $h=0;
 for($i=0; $i<=count($tablica); $i++)
 {  if(strpos($tablica[$i], ":" )>0 )
    {
        if(strpos($tablica[$i], "Wys")!== false && $raport[data]==NULL && $i<4){     $raport[data] = dataa($tablica[$i]);  }
        if(strpos($tablica[$i], "Agresor")!== false && $raport[agresor]==NULL ){     $raport[agresor]= name($tablica[$i]);}
    elseif($raport[agresor]!=NULL )
        {  if(strpos($tablica[$i], "|")!== false && $raport[w_agr]==NULL){           $raport[w_agr]=xy_wioski($tablica[$i]);   }
       elseif(strpos($tablica[$i], "Straty")!== false && $raport[str_agr]==NULL){    $raport[str_agr]=wojo_ex($tablica[$i]);array_shift($raport[str_agr]); }
       elseif(strpos($tablica[$i], "Ilo")!== false && $raport[ile_agr]==NULL){       $raport[ile_agr]=wojo_ex($tablica[$i]);array_shift($raport[ile_agr]); }
         }
      if(strpos($tablica[$i], "Obro")!== false && $raport[obronca]==NULL ){          $raport[obronca]= name($tablica[$i]);}
      elseif( $raport[obronca]!=NULL )
          {  if(strpos($tablica[$i], "|")!== false && $raport[w_obr]==NULL ){        $raport[w_obr]=xy_wioski($tablica[$i]);   }
             if ($brak_obr!=1)
             {if(strpos($tablica[$i], "Straty")!== false && $raport[str_obr]==NULL ){$raport[str_obr]=wojo_ex($tablica[$i]);array_shift($raport[str_obr]); }
                if(strpos($tablica[$i], "Ilo")!== false  && $raport[ile_obr]==NULL ){$raport[ile_obr]=wojo_ex($tablica[$i]);array_shift($raport[ile_obr]); }
             }
           }
         if(strpos($tablica[$i], "Budynki")!== false && $raport[Szpiegostwo]==NULL ){$raport[Szpiegostwo]='Szpiegostwo';}
 } //koniec if :
  if($brak_obr==NULL && strpos($tablica[$i], "adnych informacji o wielko")!== false ){  $brak_obr=1;    }
  if(strpos($tablica[$i], "Mur")!== false && $raport[nev_mur]==NULL  )
  {          if(strpos($tablica[$i],"obronny")!== false){                            $raport[nev_mur]=intval(substr($tablica[$i],strrpos($tablica[$i]," ")));}
      elseif(strpos($tablica[$i],"uszkodzony")!== false){                            $raport[nev_mur]=substr($tablica[$i],strrpos($tablica[$i]," "));}

   }
          if ($i>19 && strpos($tablica[$i], "|")!== false )           {             $wojo_kasacja[$h++]=$tablica[$i];}
          if ($i>19 && strpos($tablica[$i], "Poparcie spad")!== false && $raport[pop]==NULL )
                                                                                    { $raport[pop]= substr($tablica[$i], -3);  }
 } // koniec for
if($raport[Szpiegostwo]!=NULL && $raport[nev_mur]===NULL){                            $raport[nev_mur]=0;} 
$raport[wojo_a]=wojo($raport[str_agr],$raport[ile_agr]);
$raport[wojo_o]=wojo($raport[str_obr],$raport[ile_obr]);
$raport[status]=ile_woja( $raport[wojo_o][0], $raport[wojo_o][1], $raport[wojo_o][2], $raport[wojo_o][3], 0, $raport[wojo_o][5], $raport[wojo_o][6],  $raport[wojo_o][7], $ $raport[wojo_o][8], $raport[wojo_o][9], $raport[wojo_o][10], $raport[wojo_o][11]);

#############################################

 function wpisz($w){foreach($w as $r){$cig.='<td';if($r==0){$cig.=' class="hidden"';}$cig.='>';$cig.=$r.'</td>';}return $cig;}
 function wpisz_hidde($w,$y){global $wojska_rap;
$i=0;foreach($w as $r){$cig.='<td><input type="hidden" name="'.$y.''.$wojska_rap[$i++].'" value="'.$r.'" /></td>';}return $cig;}?>

 <form name="raport" action="3.php" method="POST">
<table class="main" width="99%" align="center">
<tbody><tr><td valign="top">
<table><CAPTION><b>Wyłapane z Raportu</b></CAPTION>
<tr><td>Wysłane</td><td><?PHP echo data_z_bazy($raport[data]); echo '<input type="hidden" id="dat" name="dat" value="'.$raport[data].'" />';?></td></tr>
<tr><td colspan="2" style="border: 1px solid black; padding: 4px;" valign="top" height="160">
<br>
<table style="border: 1px solid rgb(222, 211, 185);" width="100%">
<tbody><tr><th width="100">Agresor:</th><th valign="top"><a href="#"><?PHP echo $raport[agresor]; ?></a></th><th></th></tr>
<tr><td>Wioska:</td><td>(<?PHP echo $raport[w_agr]; ?>)</td><th><SELECT name="a_typ" ><option value=""></option><?PHP for($licz=0; $licz<count($rodzaje); $licz++){echo'<option value="'.$licz.'">'.$rodzaje[$licz].'</option>'; }?></SELECT></th></tr>
<tr><td colspan="3">
	<table class="vis">

		<tbody><tr class="center">
			<td></td>
			<td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_spear.png?1" title="Pikinier" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_sword.png?1" title="Miecznik" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_axe.png?1" title="Topornik" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_archer.png?1" title="Łucznik" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_spy.png?1" title="Zwiadowca" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_light.png?1" title="Lekki kawalerzysta" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_marcher.png?1" title="Łucznik na koniu" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_heavy.png?1" title="Ciężki kawalerzysta" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_ram.png?1" title="Taran" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_catapult.png?1" title="Katapulta" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_knight.png?1" title="Rycerz" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_snob.png?1" title="Szlachcic" alt=""></td>
		</tr>
		<tr class="center">
			<td>Ilosc:</td><?PHP echo wpisz($raport[ile_agr]); ?></tr>
		<tr class="center">
			<td>Straty:</td><?PHP echo wpisz($raport[str_agr]); ?></tr>
		<tr class="center">
			<td>Zostalo:</td><?PHP echo wpisz($raport[wojo_a]); ?></tr>
<tr style="display:none;"><td></td><?PHP echo wpisz_hidde($raport[wojo_a],'a'); ?></tr>
	</tbody></table>
</td></tr>
<tr><td colspan="3"></td></tr>

</tbody></table><br>
<table style="border: 1px solid rgb(222, 211, 185);" width="100%">
<tbody><tr><th width="100">Obrońca:</th><th><?PHP echo $raport[obronca]; ?></th><th></th></tr>

<tr><td>Wioska:</td><td>(<?PHP echo $raport[w_obr]; ?>)</td><th><SELECT name="o_typ" ><option value=""></option><?PHP for($licz=0; $licz<count($rodzaje); $licz++){echo'<option value="'.$licz.'">'.$rodzaje[$licz].'</option>'; }?></SELECT></th></tr>
<tr><td colspan="3"><?PHP if($brak_obr==NULL){
	echo'<table class="vis">
		<tbody><tr class="center">
			<td></td>
			<td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_spear.png?1" title="Pikinier" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_sword.png?1" title="Miecznik" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_axe.png?1" title="Topornik" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_archer.png?1" title="Łucznik" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_spy.png?1" title="Zwiadowca" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_light.png?1" title="Lekki kawalerzysta" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_marcher.png?1" title="Łucznik na koniu" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_heavy.png?1" title="Ciężki kawalerzysta" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_ram.png?1" title="Taran" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_catapult.png?1" title="Katapulta" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_knight.png?1" title="Rycerz" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_snob.png?1" title="Szlachcic" alt=""></td>
		</tr>
		<tr class="center">
			<td>Ilosc:</td>'; echo wpisz($raport[ile_obr]); echo'</tr>
		<tr class="center">

			<td>Straty:</td>'; echo wpisz($raport[str_obr]); echo'</tr>
		<tr class="center">
			<td>Zostało:</td>'; echo wpisz($raport[wojo_o]); echo'</tr>
<tr style="display:none;"><td></td>'; echo wpisz_hidde($raport[wojo_o],'o'); echo'</tr>

	</tbody></table>';}else{
echo'Zaden zolnierz nie wrocil zywy. Nie mozna ustalic zadnych informacji o wielkosci wojsk przeciwnika.';} ?>

</td></tr>
</tbody></table><br><br>

<table style="border: 1px solid rgb(222, 211, 185);" width="100%">
	<tr><th width="100">Mur </th><td><?PHP echo $raport[nev_mur].'<input type="hidden" name="o_mur" value="'.$raport[nev_mur].'" />'; ?></td></tr>
	<tr><th width="100">Poparcie </th><td><?PHP echo $raport[pop]; ?></td></tr>
	<tr><th width="100">starus </th><td>
<input type="hidden" name="o_status" value="<?PHP echo status($raport[status]); ?>" />
 <?PHP echo $status[typ][status($raport[status])]; ?></td></tr>

</table>
</td>
</tr>
</table>

</td><td valign="top" width="100" >
<table>
<tr><td background="../img/strzalka.PNG" colspan="2"><b>Zapisz:</b><br /><br /></td></tr>
<tr><td>Date dla Agresora:</td><td><input type="checkbox" name="adata" value="1" /></td></tr>
<tr><td><br></td></tr>
<tr><td>Typ Wioski<br>Agresora:</td><td><input type="checkbox" name="twa"  value="1" /></td></tr>
<tr><td><br></td></tr>
<tr><td>Wojska<br>Agresora:</td><td><input type="checkbox" name="wa"  value="1" /></td></tr>
<tr><td background="../img/strzalka.PNG" colspan="2"><HR></td></tr>
<tr><td>Date dla Obroncy:</td><td><input type="checkbox" name="odata" value="1" <?PHP if($raport[data]!=NULL){echo' checked="tak"'; }?>/></td></tr>
<tr><td>Typ Wioski:</td><td><input type="checkbox" name="two"  value="1" /></td></tr>

<?PHP if($brak_obr==NULL){echo'<tr><td>Wojska<br>Obroncy:</td><td><input type="checkbox" name="wo" value="1" checked="tak" /></td></tr>';} ?>
<tr><td><br></td></tr>
<?PHP if($raport[nev_mur]!==NULL){echo'<tr><td>Mur Obroncy:</td><td><input type="checkbox" name="mo" value="1" checked="tak" /></td></tr>';}
 if($brak_obr==NULL){echo'<tr><td>Status<br>Obroncy:</td><td><input type="checkbox" name="so" value="1" checked="tak" /></td></tr>';}else
 if($brak_obr!=NULL){echo'<tr><td>Status <b>BUNKIER</b>:</td><td><input type="checkbox" name="so" checked="tak"  value="2" /></td></tr>';} ?>
<tr><td><br></td></tr>
<tr><td background="../img/strzalka.PNG" colspan="2">   <input type="submit" value="Zapisz" /></td></tr>

</table>
</td>

<td valign="top">
<?PHP include('2.php'); ?>
</td></tr></tbody></table></body></html>


</td></tr></tbody></table></form>
</body></html>