<html><head>
<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
<meta name="Description" content="[ Opis dokumentu ]" />
<meta name="Author" content="[ Autor dokumentu ]" />
<meta name="Generator" content="EdHTML" /><title>[ Tytul dokumentu ]</title></head>
<body>

<?php
echo'<form enctype="multipart/form-data" action="?cc=2" method="post"><TABLE><tr><td  valign ="top">';

$zap1="SELECT v.name, v.x, v.y, v.points, v.id FROM `village` v, tribe t 
WHERE v.player = t.id ";
if( $atakowany=$_POST[atakowany]){$zap1.= " AND t.name='$atakujacy' ";}
if($_POST[a_typ]!=NULL){$zap1.= " AND v.typ='$_POST[a_typ]' ";}
if($_POST[a_oko]!=NULL)
{
$xy = explode("|", $_POST[a_oko]); $od_x=$xy[0]-20; $do_x=$xy[0]+20; $od_y=$xy[1]-20; $do_y=$xy[1]+20;
$zap1.= "AND v.x>'$od_x'  AND v.y>'$od_y'  AND v.x<'$do_x'  AND v.y<'$do_y'";
}

$zap1.="ORDER BY `v`.`name` ASC";
connection();
$wynik1 = mysql_query($zap1)or die('Błąd zapytania');

echo'<TABLE border="1"><TR><TD>Nazwa</TD><TD> X | Y </TD><TD>Punkty</TD>
<TD><input name="all" class="selectAllata" onclick="selectAllata(this.form, this.checked)" type="checkbox">Bierze udział
<input name="cos" value="'.$_POST[cos].'" type="hidden">
<input name="czas" value="'.$_POST[czas1].' '.$_POST[czas2].'" type="hidden"></TD></TR>';

while($r = mysql_fetch_array($wynik1)){
echo"<TR><TD>$r[0]</TD><TD> $r[1]|$r[2] </TD><TD>$r[3]</TD><TD><span class=\"ata\"> <input name=\"ata[]\" value=\"$r[4]\" type=\"checkbox\"></span></TD></TR>";}
echo'</TABLE>';
echo'</td><td valign ="top">';

$zap2="SELECT v.name, v.x, v.y, v.points,v.id 
FROM `village` v, tribe t
WHERE v.player = t.id ";
if($atakujacy=$_POST[atakujacy]){$zap2.= " AND t.name='$atakowany' ";}

if($_POST[o_typ]!=NULL){$zap2.= " AND v.typ='$_POST[a_typ]' ";}
if($_POST[o_oko]!=NULL)
{
$xy = explode("|", $_POST[o_oko]); $od_x=$xy[0]-10; $do_x=$xy[0]+10; $od_y=$xy[1]-10; $do_y=$xy[1]+10;
$zap2.= " AND v.x>'$od_x'  AND v.y>'$od_y'  AND v.x<'$do_x'  AND v.y<'$do_y' ";
}
$zap2.="ORDER BY `v`.`name` ASC";
connection();
$wynik2 = mysql_query($zap2)or die('Błąd zapytania');

echo'<TABLE border="1"><TR><TD>Nazwa</TD><TD> X | Y </TD><TD>Punkty</TD><TD>Bierze udział</TD></TR>';
while($p = mysql_fetch_array($wynik2)){
echo"<TR><TD>$p[0]</TD><TD> $p[1]|$p[2] </TD><TD>$p[3]</TD><TD><input name=\"obr[]\" value=\"$p[4]\" type=\"checkbox\"></TD></TR>";}
echo"</TABLE>";
echo'</td><td colspan="2"  valign ="top">';
echo'<input value="Dalej" type="submit"><BR></form>';       
echo"</td></tr></table>"; 
?>