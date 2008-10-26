<?php
/******************************************************
* connection.php
* konfiguracja po³¹czenia z baz¹ danych
******************************************************/

function connection() {
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
    or die('Brak po³¹czenia z serwerem MySQL.');
    // ³¹czymy siê z baz¹ danych
    @mysql_select_db($mysql_db)
    or die('B³¹d wyboru bazy danych.');
}

?>
