<?PHP
if($r[typ]!=NULL&&$r[typ]!=0){
$flag =  imagecreatefrompng("flaga.png");
imagecopy($dest, $flag , 38, 0, 0, 0, 15,15);

switch($r[typ]){
case 1:
$src =  imagecreatefrompng("off1.png");
break;
case 2:
$src =  imagecreatefrompng("ck1.png");
break;
case 3:
$src =  imagecreatefrompng("zw1.png");
break;
case 4:
$src =  imagecreatefrompng("lk1.png");//  LK
break;
case 5:
$src =  imagecreatefrompng("ck1.png");
break;
case 6:
$src =  imagecreatefrompng("dr1.png");
break;
default:
break;}

imagecopy($dest, $src, 43, 5, 0, 0, 6,6);
}
?>