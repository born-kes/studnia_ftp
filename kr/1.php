<html><head>
<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
<link rel="stylesheet" type="text/css" href="../img/stamm.css">
<script src="../js/mootools.js" type="text/javascript"></script>
<script src="../js/scriptt.js" type="text/javascript"></script>
</head>
<body>
<a href="index.html" target="ramka">Dodaj Nowy</a><br />
<?PHP
include_once(dirname(dirname(__FILE__)) . '/connection.php');
function dataa($data){global $godzina_zero; 

$data=explode(" ",$data);$ii=$data[1];.' '.$data[2];
 $dat =mkczas_pl($ii)-$godzina_zero; return $dat;}
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

<?PHP
include_once( 'serce.php');
?>