<?PHP
if($r[sz]!=NULL&&$r[sz]>0){
$src =  imagecreatefromgif("sz1.gif");
imagecopy($dest, $src, 38, 0, 0, 0, 15,15);
}else
if($r[typ]!=NULL&&$r[typ]!=0){
switch($r[typ]){
case 1:
$src =  imagecreatefromgif("off1.gif");
break;
case 2:
$src =  imagecreatefromgif("def1.gif");
break;
case 3:
$src =  imagecreatefromgif("zw1.gif");
break;
case 4:
$src =  imagecreatefromgif("off1.gif");//  LK
break;
case 5:
$src =  imagecreatefromgif("def1.gif");
break;
case 6:
$src =  imagecreatefromgif("flaga.gif");
break;
case 7:
$src =  imagecreatefromgif("sz1.gif");
break;
default:
break;}
imagecopy($dest, $src, 38, 0, 0, 0, 15,15);
}
?>