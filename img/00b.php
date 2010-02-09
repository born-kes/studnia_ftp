<?php  $wi=9; if(!$s=$_GET[s]){$s=111;}  $sz = $wi*$s;
session_start();
if(!isSet($_SESSION['zalogowany'])){
$dest=ImageCreate(200,15);
$kolor_tla = ImageColorAllocate($dest,255,255,255);
$k_txt_ = ImageColorAllocate($dest,0,0,0);

ImageString($dest,2,2,0," Nie jeste¶ zalogowany",$k_txt_);

header('Content-Type: image/gif');
imagegif($dest);
imagedestroy($dest);
exit();
}
 include_once(dirname(dirname(__FILE__)) . '/connection.php');

if(isSet($_SESSION['id'])){ $moje_id= $_SESSION['id'];}
else{ $user=$_SESSION['zalogowany'];
  connection();
     $wynik = mysql_query("SELECT `Id` FROM `list_user` WHERE name='$user'")or die('Blad zapytania');
       if($r = mysql_fetch_row($wynik)){$moje_id=$r[0];}
  destructor();
}
if($_GET[typ]!=null)   		{$atyp = $_GET[typ];}		else {$atyp=1;}
if($_GET[bcolor]!=null)		{$bcolor = $_GET[color];}	else {$bcolor=1;}
if($_GET[color]!=null)		{$acolor = $_GET[color];}	else {$acolor=1;}
if($_GET[obrona]!=null)		{$aobrona = $_GET[obrona];}	else {$aobrona=1;}
if($_GET[azm]!=null)		{$azm = $_GET[azm];} 		else {$azm=0;}
if($_GET[ann]!=null)		{$ann = $_GET[ann];}		else {$ann=0;}
if($_GET[raport]!=null)		{$raport = $_GET[raport];}	else {$raport=0;}
//if($_GET[aktywnosc]!=null)	{$aktywnosc = $_GET[aktywnosc];} else {$aktywnosc=0;}
if($_GET[szl]!=null)		{$szl =	$_GET[szl];}		else {$szl=0;}


$obrazek = ImageCreate($sz+1,$sz+1);  $tlo = ImageColorAllocate($obrazek,73,103,21);

if($acolor > -1)
{
$kolor  = ImageColorAllocate($obrazek ,48,73,14);
$szp=1;for($i=0 ;$i<$s+2; $i++){ImageRectangle($obrazek ,$szp,0,$szp,$sz,$kolor); $szp+=$wi;}    //Pionowe
$szp=1;for($i=0 ;$i<$s+2; $i++){ImageRectangle($obrazek ,-1,$szp,$sz+1,$szp,$kolor); $szp+=$wi;} //Poziome
}
$wies = ImageCreate($wi-1,$wi-1);

 function xy($x,$y) { global $wi;   $x=($x*$wi)+2;   $y=($y*$wi)+2;   return array ($x,$y); }

$oko = intval($s/2);
$xy = explode("|", $_GET[xy]);
$x1=$xy[0]-$oko; $x2=$xy[0]+$oko;
$y1=$xy[1]-$oko; $y2=$xy[1]+$oko;
 $ec =mktime()-$godzina_zero;

$zap="SELECT w.x,w.y, p.id AS id_User, a.id AS id_plemie, wr.status, wm.typ,wm.sz , wr.data, 
COUNT( lz.`id_pochodzenie` ) AS `azm`, COUNT( la.`cel` ) AS `pla`
FROM ws_all w, list_user p, list_plemie a
LEFT JOIN ws_raport wr ON wr.id = w.id
LEFT JOIN ws_mobile wm ON wm.id = w.id
LEFT JOIN list_zadan lz ON lz.id_pochodzenie = w.id
LEFT JOIN  `list_ataki` la ON la.cel = w.id AND la.godz>$ec
WHERE w.player = p.id  AND p.ally = a.id
      And w.x <='$x2' AND w.x>='$x1'
      And w.y <='$y2' AND w.y>='$y1' 
GROUP BY w.`id`
ORDER BY w.y ASC";
//echo $zap;
connection();
      $wynik = @mysql_query($zap);

$nasze =ImageCreate($wi-1,$wi-1);
$n1 = ImageColorAllocate($nasze ,0,0,244);
$wroga =ImageCreate($wi-1,$wi-1);
$w1 = ImageColorAllocate($wroga ,244,0,0);
$opuszczone =ImageCreate($wi-1,$wi-1);
$o1 = ImageColorAllocate($opuszczone ,150,150,150);
$gracz =ImageCreate($wi-1,$wi-1);
$g1 = ImageColorAllocate($gracz ,240,200,0);
$inna=ImageCreate($wi-1,$wi-1);
$i1 = ImageColorAllocate($inna,160,  0,  0);
$sojusz=ImageCreate($wi-1,$wi-1);
$s1 = ImageColorAllocate($sojusz,0,  128,  255);


$pusta = ImageColorAllocate($obrazek ,152,152,152);
$whit =  ImageColorAllocate($obrazek ,254,254,254);
$def =   ImageColorAllocate($obrazek ,2  ,2  ,2);
$sz  =   ImageColorAllocate($obrazek ,250  ,234  ,251);

 //if($r[data]!=NULL && $r[data]!=0){$rap=1;}
 //  $flaga=wws($r[status],0,$r[typ]);

 while($r = mysql_fetch_array($wynik))
 {   $xyz=xy($r[x]-$x1,$r[y]-$y1);
if($acolor==1){
  $kto = map_color($r[id_User],$r[id_plemie]);

    if($kto=='ja'){ imagecopy($obrazek , $gracz ,$xyz[0] , $xyz[1], 0, 0, $wi-1,$wi-1);}
elseif($kto=='my'){ imagecopy($obrazek , $nasze ,$xyz[0] , $xyz[1], 0, 0, $wi-1,$wi-1);}
elseif($kto=='so'){ imagecopy($obrazek , $sojusz,$xyz[0] , $xyz[1], 0, 0, $wi-1,$wi-1);}
elseif($kto=='aa'){ imagecopy($obrazek , $wroga ,$xyz[0] , $xyz[1], 0, 0, $wi-1,$wi-1);}
elseif($kto=='sz'){ imagecopy($obrazek , $opuszczone ,$xyz[0] , $xyz[1], 0, 0, $wi-1,$wi-1);}
else{ imagecopy($obrazek , $inna ,$xyz[0] , $xyz[1], 0, 0, $wi-1,$wi-1);}
}else{ $kolor_tla_przezroczysty = ImageColorTransparent($obrazek, $tlo); }

$Wi=$wi-1;
$Bx[0]=$xyz[0];
$By[0]=$xyz[1];
$Bx[1]=$Bx[0]+$Wi-1;
$By[1]=$By[0]+$Wi-1;
$Bx[2]=$Bx[0]+intval($Wi/2);
$By[2]=$By[0]+intval($Wi/2);
$Bx[3]=$Bx[0]+intval($Wi/3);
$By[3]=$By[0]+intval($Wi/3);
$Bw=intval($Wi/4)+1;

if($r[azm]>0 && $azm==1){ ImageString($obrazek ,0,$xyz[0],$xyz[1],$r[azm],$sz); }
if($r[pla]>0 && $ann==1){ ImageString($obrazek ,0,$xyz[0],$xyz[1],$r[pla],$sz); }


  if($r[data]!=null && $raport>0){ ImageRectangle($obrazek ,$Bx[1]-1,$By[2]-1 ,$Bx[2]+1,$By[2]-1 ,$def);}

  if($r[sz]>0 && $szl>0){  ImageRectangle($obrazek ,$Bx[0],$By[0],$Bx[1],$By[0]+1,$sz);}

if($aobrona==1){
switch($r[status]*1){
case 1:			/*Nie Broniona  0- 0.4 */
  ImageRectangle($obrazek ,$Bx[0]	,$By[1]-1 	,$Bx[0]+2	,$By[1] 	,$pusta );
  ImageRectangle($obrazek ,$Bx[1]	,$By[1]-1 	,$Bx[1]-2 	,$By[1] 	,$pusta );
 break;
case 2:			/*Oddzia³       0,4 - 1*/
  ImageRectangle($obrazek ,$Bx[0]	,$By[1]-1 	,$Bx[0]+1	,$By[1] 	,$def);
  ImageRectangle($obrazek ,$Bx[1]	,$By[1]-1 	,$Bx[1]-1 	,$By[1] 	,$def);
 break;
case 3:			/*Posterunek    1 - 3 */
  ImageRectangle($obrazek ,$Bx[0]	,$By[1]-1 	,$Bx[0]+1	,$By[1] 	,$def);
  ImageRectangle($obrazek ,$Bx[1]	,$By[1]-1 	,$Bx[1]-1 	,$By[1] 	,$def);
  ImageRectangle($obrazek ,$Bx[2]-1	,$By[1]+1 	,$Bx[2] 	,$By[1] 	,$def);
   break;
case 4:			/*Warownia      3 - 6 */	
  ImageRectangle($obrazek ,$Bx[0]	,$By[2]-1 	,$Bx[0]+1	,$By[1] 	,$def);
  ImageRectangle($obrazek ,$Bx[1]	,$By[2]-1 	,$Bx[1]-1 	,$By[1] 	,$def);
 break;
case 5:			/*Twierdza      6 - 10*/
  ImageRectangle($obrazek ,$Bx[0]	,$By[1]-1 	,$Bx[1] 	,$By[1] 	,$def);
 break;

case 6:			/*Bunkier       10 ->    */
  ImageRectangle($obrazek ,$Bx[0]	,$By[2]-1 	,$Bx[0]+1	,$By[1] 	,$def);
  ImageRectangle($obrazek ,$Bx[1]	,$By[2]-1 	,$Bx[1]-1 	,$By[1] 	,$def);
  ImageRectangle($obrazek ,$Bx[0]	,$By[1]-1 	,$Bx[1] 	,$By[1] 	,$def);
 break;

break;

//*Raport jest*/if($b==1){ImageRectangle($dest,($wi/2)-1,0,($wi/2),1,$kolor);}
//*Raport stary*/if($b==2){ImageRectangle($dest,($wi/2)-1,0,($wi/2),1,$def);}

case 7:			/*BUNKIER         ??? */
  ImageRectangle($obrazek ,$Bx[0]	,$By[0] 	,$Bx[1] 	,$By[1] 	,$pusta );
  ImageRectangle($obrazek ,$Bx[0]+1	,$By[0]+1 	,$Bx[1]-1 	,$By[1]-1 	,$def);

break;
 default:
   break;
   }       }
if($atyp==1){
/*off*/    if($r[typ]==1){  ImageRectangle($obrazek ,$Bx[2]-1,$By[2]-1-$Bw,$Bx[2]-1,$By[2]-1+$Bw,  $whit);  ImageRectangle($obrazek ,$Bx[2]-1-$Bw,$By[2]-1,$Bx[2]-1+$Bw,$By[2]-1,$whit );}
/*def*/elseif($r[typ]==2){  ImageRectangle($obrazek ,$Bx[3],$By[2]-1,$Bx[3]+($Wi/3),$By[2],$def);  ImageRectangle($obrazek ,$Bx[3],$By[2]  ,$Bx[3]+($wi/3),$By[2]+1,$def);}
/*zw */elseif($r[typ]==3){  ImageRectangle($obrazek ,$Bx[2]-1,$By[2]-1,$Bx[2]+1,$By[2]+1,  $pusta);}
           }
 }


header("Content-type: image/gif");
ImageGif($obrazek);
ImageDestroy($obrazek);
?>