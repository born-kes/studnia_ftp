<?php  include('../connection.php');


$zap = "SELECT ty.`id` , ty.`name`, COUNT( te.id_tytle )
FROM `forum_tytle` ty
LEFT JOIN `forum_tematy` te ON ty.id=te.id_tytle 
GROUP BY ty.`id`
ORDER BY ty.`id`
";
//LEFT JOIN `forum_post po ON te.id=po.id_temat

$licz=0;
connection();
$wynik = @mysql_query($zap);
while($r = @mysql_fetch_array($wynik)){
 $tytul['id'][$licz]=$r[0];
 $tytul['nazwa'][$licz]=$r[1];
 $tytul['tematy'][$licz]=$r[2];
$licz++;
}
destructor();

include('html/forum.php');
?>