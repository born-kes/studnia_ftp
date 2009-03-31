<?
include("../connection.php");
if($_POST[nick]!=NULL){
echo"Witaj ".$_POST[nick]." rozpozna³em wioski i surowce<BR><BR>";}else{
echo"Przedstawienie siê nie jest konieczne na tym etapie, ale w przysz³o¶ci mo¿e to siê zmieniæ<BR><BR>";}
$text = $_POST[query];
$text1 = str_replace("," , "" , $text);
$text2 = str_replace("." , "" , $text1);
$text3 = str_replace(" \t",',', $text2);
$text4 = str_replace("\n" ,';', $text3);
$lis = explode(';',$text4);
				foreach($lis as $vi){$v = explode(',',$vi);
				$wioska= explode("|",substr($v[0],strrpos($v[0], "(")+1,strrpos($v[0], ")")-strrpos($v[0], "(")-1));
if($wioska[0]!=NULL&&$wioska[1]!=NULL){
connection();
$wynik=mysql_query("SELECT `id` FROM `village` WHERE `x`='$wioska[0]' AND y='$wioska[1]'");
if($f = mysql_fetch_row($wynik)){
echo "id=".$f[0];
}
else{
echo "b³±d".$wioska[0].$wioska[1].'';
}
@mysql_close();
echo '  
x=	'.$wioska[0].'|
y=	'.$wioska[1].' ';		
$surowce= explode(" ",$v[2]);
echo "
Drewno: ".$surowce[0].' 
Glina: '.$surowce[1].' 
¯elazo: '.$surowce[2];		echo ' 
spichlerz '.$v[3];		
$zagroda = explode("/",$v[4]);
echo "
w zagrodzie".$zagroda[0];
echo"<BR>";
$quest="INSERT INTO bobi VALUES ($f[0],$surowce[0],$surowce[1],$surowce[2],$v[3],$zagroda[0]);";
connection();
$zap=mysql_query($quest);
@mysql_close();
}

}
echo "Twoje wioski zosta³y dodane do bazy";
?>