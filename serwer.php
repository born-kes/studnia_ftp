<?PHP


function connection() {
    $mysql_server = "my40.szu.pl";
    $mysql_admin = "bornkesws";
    $mysql_pass = "allken208";
    $mysql_db = "bornkesws";
    
    @mysql_connect($mysql_server, $mysql_admin, $mysql_pass)
 or die('Brak po�aczenia z serwerem MySQL.');      // nawiazujemy po�aczenie z serwerem MySQL
    
    @mysql_select_db($mysql_db)
    or die('B�ad wyboru bazy danych.');            // �&#65533;czymy si� z baz&#65533; danych
}

function destructor(){
@mysql_close();
}
$statuss[typ] = array ('Niewybrana','<i>Niebroniona</i>','posterunek','Broniona','<b>Bunkier</b>','<strike>BUNKIER<strike>');
function status($s){
if($s===NULL || $s<0){return 5;}
elseif($s==0){return 1;}
elseif($s<5000){return 2;}
elseif($s<21000){return 3;}
else{return 4;}}
$rodzaje = array ('brak typu','wioska off','wioska def','Zwiad','wioska LK','wioska CK','do rozbudowy');
$wojska_rap = array ('pik','mie','axe','luk','zw','lk','kl','ck','tar','kat','ry','sz');

$godzina_zero = 1220000000;$godzina_jeden =(mktime()-172800-$godzina_zero);

$plemiona = array ('bez plemienia','-SNRG-','~ZP~','-BAE-','SmAp','=MAD=', 'NWO'  ,'ZCR');
$id_plem   = array (  0,            50811 ,  4469,  23660, 50650,23185 , 48588  , 26084);

$co_za_plemie =array ('0'=>'Brak Plemienia',
                   '50811'=>'-SNRG-',
                    '4469'=>'~ZP~',
                   '23660'=>'-BAE-',
                   '50650'=>'SmAp',
                   '23185'=>'=MAD=',
                   '48588'=>'NWO',
                   '26084'=>'ZCR');

$w_tepm   = array (  18, 22 , 9, 10 , 11, 30, 35);
$w_typ   = array ( 'Pik/Top/�uk' , 'Miecznik', 'Zwiadowca', 'Kawaleria', 'C.Kawaleria','Tar/Kat', 'Szlachcic');
$and=' AND ';

?>