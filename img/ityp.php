<?PHP
if($r[sz]!=NULL&&$r[sz]>0){
$src =  $flag_sz1;
imagecopy($dest, $src, $x_0-4, 25+$y_0, 0+$x_0, 1+$y_0, 10,14);
}else
if($r[typ]!=NULL&&$r[typ]!=0){
switch($r[typ]){
case 1:
$src =  $flag_off;
break;
case 2:
$src =  $flag_def;
break;
case 3:
$src =  $flag_zw;
break;
case 4:
$src =  $flag_off;//  LK
break;
case 5:
$src =  $flag_def;
break;
case 6:
$src =  $flag_;
break;
case 7:
$src =  $flag_sz1;
break;
default:
break;}
imagecopy($dest, $src, $x_0-4, 25+$y_0, 0+$x_0, 1+$y_0, 10,14);
}
?>