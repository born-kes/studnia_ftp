<?php
/******************************************************
* connection.php
* konfiguracja po³&#65533;czenia z baz&#65533; danych
******************************************************/

function connection() {
    $mysql_server = "85.17.1.175";          // serwer    
    $mysql_admin = "bornkesws";             // admin
    $mysql_pass = "MKO208";                 // has³o   
    $mysql_db = "bornkesws";                // nazwa baza

    
    @mysql_connect($mysql_server, $mysql_admin, $mysql_pass)
 or die('Brak po³aczenia z serwerem MySQL.');      // nawiazujemy po³aczenie z serwerem MySQL
    
    @mysql_select_db($mysql_db)
    or die('B³ad wyboru bazy danych.');            // ³&#65533;czymy siê z baz&#65533; danych
}

function destructor(){
@mysql_close();
}
$rodzaje = array ('brak typu','wioska off','wioska def','Zwiad','wioska LK','wioska CK','do rozbudowy',);

function ile_woja($pik, $mie, $axe, $arche,$zw, $lk, $kl, $ck, $tar, $kat){
$wojo= $pik+ $mie+ $axe+ $arche+($zw*2)+ ($lk*4)+ ($kl*5)+ ($ck*6)+($tar*5)+($kat*8);
return $wojo;
}

function map_color($id_gracz,$id_plemie)
{
$id=$_SESSION['id'];
connection();
     $wynik = mysql_query("SELECT tribe_id, r, g, b
      FROM color
      WHERE users='$id'
      AND tribe_id='$id_gracz' ")or die('Blad zapytania');

    if($r = mysql_fetch_row($wynik)){echo "($r[1], $r[2], $r[3])";  destructor();  return;}
elseif($id_gracz==$_SESSION['id']){  echo '(240, 200, 0)';          destructor();  return;}
elseif($id_gracz==0) {               echo '(100, 100, 100)';        destructor();  return;}
else  { 
destructor();
switch($id_plemie){
case 4469:
   echo '(244, 0, 0)';       //zp
      break;
case 50811:
   echo '(0, 0, 200)';       //-SNRG- i HW
      break;
case 23185:
   echo '(0, 254, 254)';   //MAD
      break;
//case 0:

//break;
default:
echo '(170, 30, 30)';         // inne
break;             }
        }
}
function potega($podstawa, $wykladnik)
{
    $wynik = $podstawa;
    $i = 1;
    while ($i++ < $wykladnik)
        $wynik *= $podstawa;
    return $wynik;
} 
?>
