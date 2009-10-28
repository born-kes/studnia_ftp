<?PHP require "../connection.php"; 
if(isSet($_SESSION['id'])){ $moje_id= $_SESSION['id'];}
else{ $user=$_SESSION['zalogowany'];
  connection();
     $wynik = mysql_query("SELECT `Id` FROM `Users` WHERE Nazwa='$user'")or die('Blad zapytania');
       if($r = mysql_fetch_row($wynik)){$moje_id=$r[0];}
  destructor();
}
function map_color($id_gracz,$id_plemie)
{  global $moje_id;
if($id_gracz==0){return 'sz';}
elseif($id_gracz==$moje_id){ return 'ja';}

switch($id_plemie){
case 47716:
    return 'so';       //@~HW~@
case  48588:
   return 'po';       //NWO
case  51473:
   return 'po';       //TK
case  422:
   return 'aa';       //RedRub
case  4469:
   return 'aa';       //~ZP~
case  5416:
   return 'aa';       //JEJ
case  23185:
   return 'aa';       //-MAD-
case  23660:
   return 'aa';       //-BAE-
case  26084:
   return 'aa';       //ZCR
case  50650:
   return 'aa';       //SmAp
case  51091:
   return 'aa';       //NA
case  50811:
   return 'my';       //-SNRG-
//case 0:
//break;
default:
   return 'in';          // inne
break;             }
}
?><html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
  <meta name="KES" content="[ 9oKesi ]" />
  <title>Strona Witaj</title>
<link rel="stylesheet" type="text/css" href="stamm.css">
</head><body>
<br /><table><tr><td><table><CAPTION><b>Colory</b><br /></CAPTION>
<tr><TD width="15" class="<?PHP echo map_color($_SESSION['id'],0);?>">Zalogowany</td></tr>
<tr><TD width="15" class="<?PHP echo map_color(1,50811); ?>">-SNRG- </td></tr>
<tr><TD width="15" class="<?PHP echo map_color(1,47716); ?>">@~HW~@</td></tr>
<tr><TD width="15" class="<?PHP echo map_color(1,48588); ?>">NWO </td></tr>
<tr><TD width="15" class="<?PHP echo map_color(1,51473); ?>">TK </td></tr>
<tr><TD width="15" class="<?PHP echo map_color(1,422);   ?>">RedRub </td></tr>
<tr><TD width="15" class="<?PHP echo map_color(1,4469);  ?>">~ZP~ </td></tr>
<tr><TD width="15" class="<?PHP echo map_color(1,5416);  ?>">JEJ </td></tr>
<tr><TD width="15" class="<?PHP echo map_color(1,23185); ?>">-MAD- </td></tr>
<tr><TD width="15" class="<?PHP echo map_color(1,23660); ?>">-BAE- </td></tr>
<tr><TD width="15" class="<?PHP echo map_color(1,26084); ?>">ZCR </td></tr>
<tr><TD width="15" class="<?PHP echo map_color(1,50650); ?>">SmAp </td></tr>
<tr><TD width="15" class="<?PHP echo map_color(1,51091); ?>">NA </td></tr>
<tr><TD width="15" class="<?PHP echo map_color(0,0);?>">Opuszczone </td></tr>
<tr><TD width="15" class="<?PHP echo map_color(1,1);     ?>">inne </td></tr>
</table></td><td><table><CAPTION><b>Grafika</b><br /></CAPTION>
<tr><td class="rr"><img src="../img/xw.php" ></td><td>trawa</td></tr>
<tr><td class="po"><img src="../img/xw.php?t=1" ></td><td>Typ 1-<?PHP echo $rodzaje[1];?></td></tr>
<tr><td class="po"><img src="../img/xw.php?t=2" ></td><td>Typ 2-<?PHP echo $rodzaje[2];?></td></tr>
<tr><td class="po"><img src="../img/xw.php?t=3" ></td><td>Typ 3-<?PHP echo $rodzaje[3];?></td></tr>
<tr><td class="po"><img src="../img/xw.php?t=4" ></td><td>Typ 4-<?PHP echo $rodzaje[4];?></td></tr>
<tr><td class="po"><img src="../img/xw.php?t=5" ></td><td>Typ 5-<?PHP echo $rodzaje[5];?></td></tr>
<tr><td class="po"><img src="../img/xw.php?t=6" ></td><td>Typ 6-<?PHP echo $rodzaje[6];?></td></tr>
<tr><td class="aa"><img src="../img/xw.php?r=1" ></td><td>Jest raport z tej wioski</td></tr>
<?PHP
 for($licz=0; $licz<count($status[typ]); $licz++){
echo '<tr><td class="aa"><img src="../img/xw.php?b='.$licz.'" ></td><td>'.$status[typ][$licz].'</td></tr>';} ?>
<tr><td class="my"><img src="../img/xw.php?sz=1" ></td><td>Szlachta w wiosce</td></tr>
<tr><td class="aa"><img src="../img/xw.php?sz=1&r=1&t=2&b=3" ></td><td>Wioska broniona + raport + wioska def + szlachta</td></tr>
</table>
</body>
</html>