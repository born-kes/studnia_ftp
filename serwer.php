<?PHP

function connection() {
    $mysql_server = "my40.szu.pl";
    $mysql_admin = "bornkesws";
    $mysql_pass = "lo5ksgol208";
    $mysql_db = "bornkesws";
    
    @mysql_connect($mysql_server, $mysql_admin, $mysql_pass)
 or die('Brak po³aczenia z serwerem MySQL.');      // nawiazujemy po³aczenie z serwerem MySQL
    
    @mysql_select_db($mysql_db)
    or die('B³ad wyboru bazy danych.');            // ³&#65533;czymy siê z baz&#65533; danych
}

function destructor(){
@mysql_close();
}
$statuss[typ] = array ('Niewybrana','<i>Niebroniona</i>','posterunek','Broniona','<b>Bunkier</b>','<strike>BUNKIER<strike>');
function status($s){
if($s===NULL || $s<0){return 5;}  //BUNKIER
elseif($s<5000){return 1;}          //Nie Broniona
elseif($s<21000){return 2;}        //Posterunek
elseif($s<60000){return 3;}       //Broniona
else{return 4;}}                  //Bunkier
$rodzaje = array ('brak typu','wioska off','wioska def','Zwiad','wioska LK','wioska CK','do rozbudowy','szlachta');
$wojska_rap = array ('pik','mie','axe','luk','zw','lk','kl','ck','tar','kat','ry','sz');

$godzina_zero = 1220000000;$godzina_jeden =(mktime()-172800-$godzina_zero);

$plemiona = array ('bez plemienia',
			'HERO',
			'~ZP~',
'&#1769;-MZ-&#1769;',
			'-BAE-',
			'SmAp',
			'=MAD=',
			'NWO',
			'ZCR',
			'RedRub',
			'**MI**' );
$id_plem   = array (  0,
			51724,
			4469,
11183,
			23660,
			51732,
			23185,
			48588,
			26084,
			422,
			898);

$co_za_plemie =array ('0'=>'Brak Plemienia',
                   '51724'=>'HERO',
                    '4469'=>'~ZP~',
'11183'=>'&#1769;-MZ-&#1769;',
                   '23660'=>'-BAE-',
                   '50650'=>'SmAp',
                   '23185'=>'=MAD=',
                   '48588'=>'NWO',
                   '26084'=>'ZCR',
                   '26084'=>'ZCR',
                   '26084'=>'ZCR');

$w_tepm   = array (  18, 22 , 9, 10 , 11, 30, 35);
$w_typ   = array ( 'Pik/Top/£uk' , 'Miecznik', 'Zwiadowca', 'Kawaleria', 'C.Kawaleria','Tar/Kat', 'Szlachcic');
$and=' AND ';

?>