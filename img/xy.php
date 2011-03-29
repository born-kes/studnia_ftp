<?
$dest=ImageCreate(1,1);
 include_once(dirname(dirname(__FILE__)) . '/connection.php');
if($_GET!=NULL)
{		$vi=$_SESSION['zalogowany'].' '.$_GET[p];
 $ilosc_1 = zap(' COUNT( * ) AS `Rekordów` , ilosc','`analiza`'," wezwanie='$vi' AND co='xy' GROUP BY `ilosc`;");
if($ilosc_1[0]>0)
{$ilosc=$ilosc_1[1]+1;
 $zapytanie = "UPDATE `analiza` SET ilosc='$ilosc', co='xy' WHERE wezwanie='$vi';";
}
else
{
echo $zapytanie = "INSERT INTO `analiza` SET `ilosc`=1, `wezwanie`='$vi', `co`='xy';";
}
    connection();
@mysql_query($zapytanie);
    destructor();

}

$kolor_tla = ImageColorAllocate($dest,255,255,255);

header('Content-Type: image/png');
imagepng($dest);

imagedestroy($dest);
imagedestroy($src);
?>