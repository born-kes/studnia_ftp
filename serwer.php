<?PHP

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
$status[typ] = array ('Niewybrana','Niebroniona','Broniona','Bunkier');
function status($s){if($s===NULL || $s<0){return 0;}elseif($s<100){return 1;}elseif($s<15000){return 2;}else{return 3;}}
$rodzaje = array ('brak typu','wioska off','wioska def','Zwiad','wioska LK','wioska CK','do rozbudowy');
$wojska_rap = array ('pik','mie','axe','luk','zw','lk','kl','ck','tar','kat','ry','sz');

$plemiona = array ('bez plemienia','-SNRG-','~ZP','=MAD=', 'NWO','-BAE-','ZCR');
$id_plem   = array (  0,            50811 ,   4469, 23185 , 48588,23660  , 26084);

$w_tepm   = array (  18, 22 , 9, 10 , 11, 30, 35);
$w_typ   = array ( 'Pik/Top/£uk' , 'Miecznik', 'Zwiadowca', 'Kawaleria', 'C.Kawaleria','Tar/Kat', 'Szlachcic');
$and=' AND ';
function map_color($id_gracz,$id_plemie)
{ 
if($id_gracz==0){return 'sz';}
elseif($id_gracz==$_SESSION['id']){ return 'ja';}

/*$id=$_SESSION['id'];
connection();     $wynik = mysql_query("SELECT tribe_id, r, g, b
                                        FROM color
                                        WHERE users='$id'
                                        AND tribe_id='$id_gracz' ")or die('Blad zapytania');

    if($r = mysql_fetch_row($wynik)){  destructor();  return array ($r[1], $r[2], $r[3]);}*/
else  { 
switch($id_plemie){
case 47716:
 destructor();   return 'so';       //@~HW~@
case  48588:
 destructor();   return 'po';       //NWO
case  51473:
 destructor();   return 'po';       //TK
case  422:
 destructor();   return 'aa';       //RedRub
case  4469:
 destructor();   return 'aa';       //~ZP~
case  5416:
 destructor();   return 'aa';       //JEJ
case  23185:
 destructor();   return 'aa';       //-MAD-
case  23660:
 destructor();   return 'aa';       //-BAE-
case  26084:
 destructor();   return 'aa';       //ZCR
case  50650:
 destructor();   return 'aa';       //SmAp
case  51091:
 destructor();   return 'aa';       //NA
case  50811:
 destructor();   return 'my';       //-SNRG-

//case 0:
//break;
default:
 destructor();   return 'in';          // inne
break;             }destructor(); 
        }


}
?>