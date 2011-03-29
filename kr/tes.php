<html><head>
<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
<link rel="stylesheet" type="text/css" href="../img/stamm.css">
<script src="../js/mootools.js" type="text/javascript"></script>
<script src="../js/scriptt.js" type="text/javascript"></script>
</head>
<body>

<?PHP
$s8='&#8595;'.' ? '.'&#8595;';
$strzal= array($s8,$s8,$s8,$s8,$s8,$s8,$s8,$s8,$s8,$s8,$s8,$s8);
include_once(dirname(dirname(__FILE__)) . '/connection.php');
function dataa($data){global $godzina_zero; $data=explode(" ",$data);
$ii= substr($data[2],0,8).' '.substr($data[2],-5);
 return $ii;}
function name($name){$st_r=strrpos($name, ":"); $g_name= substr($name , $st_r+2); return $g_name;}
function wojo_ex($w){$ww=explode(" ",$w);return $ww;}
function wojo($w1,$w2){for($j=0; $j<12; $j++){ $w[$j] =  $w2[$j]-$w1[$j];} return $w;}
# Wyciaga x|y Wioski 


function _no_pl($string )//
{   $string =str_replace("AAAAA","\n",ereg_replace('[^A-Za-z0-9[:punct:]]','',  str_replace("\n","AAAAA", $string )));  

    // na poczatek 
    $string = urlencode($string);


 // $polskie = array('ę'  , 'Ę', 'ó'  , 'Ó' , 'Ą' , 'ą' , 'Ś' , 'ł' , 'Ł' , 'ż' , 'Ż' , 'Ź' , 'ź' , 'ć' , 'Ć' , 'ń' , 'Ń' , 'ś' );
    $polskie = array('%EA','%CA','%F3','%D3','%A1','%B1','%A6','%B3','%A3','%BF','%AF','%AC','%BC','%E6','%C6','%F1','%D1','%B6','+','%5E%5E',' ');
    $miedzyn = array('e'  , 'E' , 'o' , 'O' , 'A' , 'a' , 'S' , 'l' , 'L' , 'z' , 'Z' , 'Z' , 'z' , 'c' , 'C' , 'n' , 'N' , 's' ,'' ,'%5E','%5E' );

    $string = str_replace($polskie, $miedzyn, $string);

    $string =  urldecode($string);
    return $string;
}
function zH($var){

    $var = urlencode($var );    $E='%5E%5E';
 if(strpos($var ,$E)!==false)
     {
      $var = str_replace('%5E%5E', '%5E', $var );  }
  
  $var =urldecode($var );

$ar2  = array("\n\n" ,"  ",'	', '^^' );    $ar1  = array(  "\n" ," " ," ",'^' );

 while( strpos($var,"^^")!==False && strpos($var,"/n/n")!==False)
     {        $var = str_replace($ar2, $ar1, $var);     }
        return $var;
}
function zHTMLnaBB($var) {
         $var = ereg_replace ("(\t)+", "^", $var);
         $var = ereg_replace ("(\t+)", "^", $var);
         $var = ereg_replace ("\r", "", $var);
         $var = ereg_replace ("\r\n", "\n", $var);
         $var = ereg_replace ("\r", "", $var);
        $var = str_replace  ('>','>^', $var);
         $var = ereg_replace ("/s+/", "", $var);

        return $var;
}
$txt1=zH(zHTMLnaBB(strip_tags(zHTMLnaBB(_no_pl($_POST[query])))));

$txt=str_replace('^',' ',$txt1);

###################
# Pobranie danych #
###################
      $tablica = explode("\n", $txt);
//foreach($tablica as $t){echo $t.'<br>';}
 /*pętla*/  $h=0;
 for($i=0; $i<=count($tablica); $i++)
 { //echo $tablica[$i].'<br>';
  if(strpos($tablica[$i], ":" )>0 )
    {
        if(strpos($tablica[$i], "Wys")!== false && $raport[data]==NULL && $i<10){     $raport[data] = dataa($tablica[$i]);  }
        if(strpos($tablica[$i], "Agresor")!== false && $raport[agresor]==NULL ){     $raport[agresor]= name($tablica[$i]);}
    elseif($raport[agresor]!=NULL )
        {  if(strpos($tablica[$i], "|")!== false && $raport[w_agr]==NULL){           $raport[w_agr]=xy_wioski($tablica[$i]);   }
       elseif(strpos($tablica[$i], "Straty")!== false && $raport[str_agr]==NULL){    $raport[str_agr]=wojo_ex($tablica[$i+1]);array_shift($raport[str_agr]); }
       elseif(strpos($tablica[$i], "Ilo")!== false && $raport[ile_agr]==NULL){       $raport[ile_agr]=wojo_ex($tablica[$i+1]);array_shift($raport[ile_agr]); }
         }
      if(strpos($tablica[$i], "Obro")!== false && $raport[obronca]==NULL ){          $raport[obronca]= name($tablica[$i]);}
      elseif( $raport[obronca]!=NULL )
          {  if(strpos($tablica[$i], "|")!== false && $raport[w_obr]==NULL ){        $raport[w_obr]=xy_wioski($tablica[$i]);   }
             if ($brak_obr!=1)
             {if(strpos($tablica[$i], "Straty")!== false && $raport[str_obr]==NULL ){$raport[str_obr]=wojo_ex($tablica[$i+1]);array_shift($raport[str_obr]); }
                if(strpos($tablica[$i], "Ilo")!== false  && $raport[ile_obr]==NULL ){$raport[ile_obr]=wojo_ex($tablica[$i+1]);array_shift($raport[ile_obr]); }
             }
           }
         if(strpos($tablica[$i], "Budynki")!== false && $raport[Szpiegostwo]==NULL ){$raport[Szpiegostwo]='Szpiegostwo';}
 } //koniec if :
  if($brak_obr==NULL && strpos($tablica[$i], "adenonierzniewrciywy.Niemonaustaliadnych")!== false ){  $brak_obr=1;    }
  if(strpos($tablica[$i], "Mur")!== false && $raport[nev_mur]==NULL  )
  {
          if(strpos($tablica[$i],"obronny")!== false){      echo $tablica[$i];                       $raport[nev_mur]=intval(ereg_replace('[^0-9]', '', $tablica[$i]));
}
      elseif(strpos($tablica[$i],"uszkodzony")!== false){                            $raport[nev_mur]=ereg_replace('[^0-9]', '', substr($tablica[$i],-5));}

   }
          if ($i>19 && strpos($tablica[$i], "|")!== false )           {             $wojo_kasacja[$h++]=$tablica[$i];}
          if ($i>19 && strpos($tablica[$i], "poparciespad")!== false && $raport[pop]==NULL )
                                                                                    { $raport[pop]= substr($tablica[$i], -3);  }
 } // koniec for
if($raport[Szpiegostwo]!=NULL && $raport[nev_mur]===NULL){                            $raport[nev_mur]=0;}
$raport[wojo_a]=wojo($raport[str_agr],$raport[ile_agr]);
$raport[wojo_o]=wojo($raport[str_obr],$raport[ile_obr]);
$raport[status]=ile_woja( $raport[wojo_o][0], $raport[wojo_o][1], $raport[wojo_o][2], $raport[wojo_o][3], 0, $raport[wojo_o][5], $raport[wojo_o][6],  $raport[wojo_o][7], $ $raport[wojo_o][8], $raport[wojo_o][9], $raport[wojo_o][10], $raport[wojo_o][11]);

##################################
# określanie czy wioska jest off #
//Obrońca
if(ile_woja( $raport[ile_obr][0], $raport[ile_obr][1], $raport[ile_obr][2], $raport[ile_obr][3], 0, $raport[ile_obr][5], $raport[ile_obr][6],  $raport[ile_obr][7], $raport[ile_obr][8], $raport[ile_obr][9], $raport[ile_obr][10], $raport[ile_obr][11])==0){$typ_o=0;}
elseif(100< ile_woja( 0, 0, $raport[ile_obr][2], 0, 0, $raport[ile_obr][5], $raport[ile_obr][6],  0,  $raport[ile_obr][8], 0, 0, 0)){$typ_o=1;}
else{$typ_o=2;}

//Agresor
if(150<ile_woja( 0, 0, $raport[ile_agr][2], 0, 0, $raport[ile_agr][5], $raport[ile_agr][6],  0,  $raport[ile_agr][8], 0, 0, 0)){$typ_a=1;}
elseif(150<ile_woja( $raport[ile_agr][0], $raport[ile_agr][1], 0, $raport[ile_agr][3], 0, 0, 0,  $raport[ile_agr][7],  0, 0, 0, 0)){$typ_a=2;}
else{$typ_a=0;}


//echo '#############################################<br>';

 function wpisz($w){global $s8; foreach($w as $r){$cig.='<td'; if($r==0 && $r!=$s8){$cig.=' class="hidden"';}$cig.='>';$cig.=$r.'</td>';}return $cig;}
 function wpisz_hidde($w,$y){global $wojska_rap;
$i=0;foreach($w as $r){$cig.='<td><input type="hidden" name="'.$y.''.$wojska_rap[$i++].'" value="'.$r.'" /></td>';}return $cig;}

 function wpisz_hidde_agr($w,$y,$baza){global $wojska_rap;//nazwy typow wojsk
$i=0;foreach($w as $r) //y = przedrostek nazwy //$baza = wojska wysłane w ataku których nie było
{$cig.='';
 $cig.=$r.',';
 }return $cig;}
?>

<table class="vis" align="center" width="450">
 <tr>
  <td>
   <table id="agresor" width="100%" class="main" >
    <tr>
     <th colspan="5"><b>Agresor: </b><?PHP echo $raport[agresor]; ?></th>
    </tr>
    <tr>
     <td colspan="5"><b>Wioska Agresora :</b><?PHP echo $raport[w_agr]; ?></td>
    </tr>
    <tr>
     <td colspan="5">
      <table class="main" id="nowy raport" width="100%">
       <tr>
        <th colspan="7">Dane o Wojskach mobilnych z Raportu</th>
        <td colspan="6"><?PHP echo $raport[data]; ?></td>
       </tr>
       <tr>
        <td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_spear.png?1" title="Pikinier" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_sword.png?1" title="Miecznik" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_axe.png?1" title="Topornik" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_archer.png?1" title="Łucznik" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_spy.png?1" title="Zwiadowca" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_light.png?1" title="Lekki kawalerzysta" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_marcher.png?1" title="Łucznik na koniu" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_heavy.png?1" title="Ciężki kawalerzysta" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_ram.png?1" title="Taran" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_catapult.png?1" title="Katapulta" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_knight.png?1" title="Rycerz" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_snob.png?1" title="Szlachcic" alt=""></td>
       </tr>
       </tr>
       <tr>
        <?PHP echo wpisz($raport[wojo_a]); ?>
       </tr>
      </table>
     </td>
    </tr>

       <tr class="row"><td colspan="12">Dane o Wojskach mobilnych w Bazie</td></tr>
       <tr><td colspan="13" width="100%"><iframe src="http://www.bornkes.w.szu.pl/pl/raport3.php?xy=<?PHP echo $raport[w_agr].'&o0=0&data='.$raport[data].'&typ='.$typ_a.'&w='.wpisz_hidde_agr($raport[wojo_a],'a',$raport[ile_agr]); ?>" height="75" width="100%" style="border:0px;"></iframe></td></tr>
   </table>
  </td>
 </tr>
<tr><th><p align="center"><a href="javascript:window.close()">zamknij okienko</a></p></th></tr>
</table>

<hr>

<table class="vis" align="center" width="450">
 <tr>
  <td>
      <table id="agresor" class="main" width="100%">
    <tr>
     <th colspan="5"><b>Obrońca :</b><?PHP echo $raport[obronca]; ?></th>
    </tr>
    <tr>
     <td colspan="5"><b>Wioska Obrońcy :</b> <?PHP echo $raport[w_obr]; ?></td>
    </tr>
    <tr>
     <td  colspan="5">
      <table id="nowy raport" class="main" width="100%">
      <tr>
        <th colspan="7">Dane o Wojskach w Wiosce z Raportu</th>
        <td colspan="6"><?PHP echo $raport[data]; ?></td>
       </tr>
       <tr>
        <td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_spear.png?1" title="Pikinier" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_sword.png?1" title="Miecznik" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_axe.png?1" title="Topornik" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_archer.png?1" title="Łucznik" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_spy.png?1" title="Zwiadowca" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_light.png?1" title="Lekki kawalerzysta" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_marcher.png?1" title="Łucznik na koniu" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_heavy.png?1" title="Ciężki kawalerzysta" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_ram.png?1" title="Taran" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_catapult.png?1" title="Katapulta" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_knight.png?1" title="Rycerz" alt=""></td><td width="35"><img src="http://pl5.plemiona.pl/graphic/unit/unit_snob.png?1" title="Szlachcic" alt=""></td>
       </tr>
       <tr>
        <?PHP if($brak_obr!=NULL){echo '<td colspan="12">brak informacji o obronie</td>';}else{ echo wpisz($raport[wojo_o]);} ?>
       </tr>
       <tr>
        <td colspan="7">Mur: <?PHP echo $raport[nev_mur]; ?></td>
        <td colspan="6"></td>
       </tr>

      </table>
     </td>
    </tr>
       <tr class="row"><td colspan="12">Dane o Wojskach mobilnych w Bazie</td></tr>
       <tr><td colspan="13" width="100%"><iframe src="http://www.bornkes.w.szu.pl/pl/raport3.php?xy=<?PHP echo $raport[w_obr].'&o0=1&data='.$raport[data].'&Mur='.$raport[nev_mur].'&w='.wpisz_hidde_agr($raport[wojo_o],'a',$raport[ile_obr]); ?>" height="75" width="100%" style="border:0px;"></iframe></td></tr>
   </table>
  </td>
 </tr>
 <tr><th><p align="center"><a href="javascript:window.close()">zamknij okienko</a></p></th></tr>
</table>
   <hr>
</body></html>