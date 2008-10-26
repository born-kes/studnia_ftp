<?php
/******************************************************
* connection.php
* konfiguracja po³¹czenia z baz¹ danych
******************************************************/

function connection() {

    /* £¹czenie i wybranie bazy */
$link = mysql_connect("85.17.1.175", "bornkesws", "MKO208")
    or die ("Nie mo¿na siê po³¹czyæ :");

mysql_select_db ("bornkesws") or die ("Nie mozna wybraæ bazy danych : ");

// serwer
    $mysql_server = "85.17.1.175";
    // admin
    $mysql_admin = "bornkesws";
    // has³o
    $mysql_pass = "MKO208";
    // nazwa baza
    $mysql_db = "bornkesws";

    // nawi¹zujemy po³¹czenie z serwerem MySQL
    @mysql_connect($mysql_server, $mysql_admin, $mysql_pass) 
 or die('Brak po³aczenia z serwerem MySQL.');
    // ³¹czymy siê z baz¹ danych
    @mysql_select_db($mysql_db)
    or die('B³ad wyboru bazy danych.');
};
function destructor(){
$end=mysql_close($link);}
?>