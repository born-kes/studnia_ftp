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

function sesio_id(){
 $user=$_SESSION['zalogowany'];
  connection();
     $wynik = mysql_query("SELECT `id` FROM `list_user` WHERE name='$user';")or die('Blad zapytania');

       if($r = mysql_fetch_row($wynik)){ $_SESSION['id']=$r[0];}
  destructor();
}

/*
nowy podzia³:
Niewybrana___			
Niebroniona__		 0   - 0,4
Oddzia³______		0,4  -  1	
Posterunek___		 1   -  3
Warownia_____		 3   -  6
Twierdza_____		 6   - 10
Bunkier______		10   ->
BUNKIER______		??

stary podzia³:		
Niewybrana___			
Niebroniona__		 0  -  0,4
posterunek___		0,4 -   1
Broniona_____		 1  -   3
Bunkier______		 3  ->	
BUNKIER______		??
					  1	      2 	3	     4		5	   6	     7		*/
$statuss =array();
$statuss[typ] = array ('Niewybrana','Niebroniona','Oddzia³','Posterunek','Warownia','Twierdza','Bunkier','BUNKIER');
function status($s){

if($s===NULL || $s<0){return 7;}  //BUNKIER
else{$s = floatval($s/21000);}

    if($s<0.4)	{return 1;}	//Nie Broniona
elseif($s< 1)	{return 2;}	//Oddzia³
elseif($s< 3)	{return 3;}	//Posterunek
elseif($s< 6)	{return 4;}	//Warownia
elseif($s<10)	{return 5;}	//Twierdza
else		{return 6;}	//Bunkier
}                 
$rodzaje = array ('brak typu','wioska off','wioska def','Zwiad','wioska LK','wioska CK','do rozbudowy','szlachta');
$wojska_rap = array ('pik','mie','axe','luk','zw','lk','kl','ck','tar','kat','ry','sz');

$godzina_zero = 1220000000;$godzina_jeden =(mktime()-172800-$godzina_zero);
  connection();
     $wynik = mysql_query("SELECT  lp.id, lp.tag, p.stosunki FROM list_plemie lp, `polityka` p WHERE lp.id=p.id;")or die('Blad zapytania');
$i=0;
while($r = mysql_fetch_row($wynik))
{
$plemiona[$i] = urldecode($r[1]);
$id_plem[$i] = $r[0];
$co_za_plemie[$r[0]]= urldecode($r[1]);
$plemiona_strosunki[$r[0]]= $r[2];
$i++; 
}
  destructor();

$w_tepm   = array (  18, 22 , 9, 10 , 11, 30, 35);
$w_typ   = array ( 'Pik/Top/£uk' , 'Miecznik', 'Zwiadowca', 'Kawaleria', 'C.Kawaleria','Tar/Kat', 'Szlachcic');
$and=' AND ';
?>