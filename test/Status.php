<?PHP   include "connection.php";
$j=0;
$zap=zap_raport()." AND status=3";
connection();
$wynik=	mysql_query($zap)or die(mysql_error());
while($r = mysql_fetch_array($wynik))
{
$st[$j]=$sta=status(ile_woja($r[pik],$r[mie],$r[axe],$r[luk],$r[zw],$r[lk],$r[kl],$r[ck],$r[tar],$r[kat],$r[ry],$r[sz]));
$st_id[$j++]=$r[id_wsi];
}
destructor();$i=0;

foreach($st as $s) echo '<br>UPDATE village SET status='.$s.' WHERE id='.$st_id[$i++].';';


//UPDATE village SET name='".$name."', player=".$player.", points=".$points." WHERE  
?>
