<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
function getTime(){
$a = explode (' ',microtime());
return(double) $a[0] + $a[1];
}
$Start = getTime();

function kwadrat($a){return ($a*$a);}

function xy_Array($xy){ if(is_array($xy) ){return $xy;}
return explode('|',$xy); }

function odleglosc($wioska_1,$wioska_2){
list($x1, $y1)	=xy_Array($wioska_1);
list($x2, $y2)	=xy_Array($wioska_2);

$odleglosc = sqrt( kwadrat($x1 - $x2) + kwadrat($y1-$y2) );
 	
return $odleglosc;
}
$wiosk_a='3|5';
$wiosk_b1='3';$wiosk_b2='5';
$wAr = array (3,2);

 echo odleglosc($wiosk_a ,$wAr );



$End = getTime();            //number_format(x,2)
$SumaCzasu = ($End - $Start);
echo "<br />Time= ".number_format(($SumaCzasu),10)." secs x50:";
echo "<br />Time= ".number_format(($SumaCzasu*50),10)." secs";
?><table>
  <tr>
    <td>
      <a href="http://www.szu.pl" target="_blank">
        <img src="http://szu.pl/grafika/szu114x50.gif" border="0" alt="bazy danych MySQL, konta pocztowe, konta WWW, parkowanie domen">
      </a>
    </td>
  </tr>
<table>