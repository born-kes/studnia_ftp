<?PHP

// Tworzenie zapytania

$zap="SELECT w.id AS id_wsi, w.x, w.y, p.id AS id_User, p.name AS G_name, a.id AS id_plemie, a.tag, w.name AS W_name, w.points, w.typ, w.data, w.mur, w.pik, w.mie, w.axe, w.luk, w.zw, w.lk, w.kl, w.ck, w.tar, w.kat, w.ry, w.sz, w.opis
FROM village w, tribe p, ally a
WHERE w.player = p.id
AND p.ally = a.id
AND w.x ='$f_x'
AND w.y ='$f_y'";


connection();//echo $zap;
$wynik = mysql_query($zap) or die (mysql_error());

?>