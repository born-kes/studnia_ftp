<?php
/******************************************************
* connection.php
* konfiguracja po��czenia z baz� danych
******************************************************/

function connection() {
    // serwer
    $mysql_server = "85.17.1.175";
    // admin
    $mysql_admin = "bornkesws";
    // has�o
    $mysql_pass = "MKO208";
    // nazwa baza
    $mysql_db = "bornkesws";
    // nawi�zujemy po��czenie z serwerem MySQL
    @mysql_connect($mysql_server, $mysql_admin, $mysql_pass)
    or die('Brak po��czenia z serwerem MySQL.');
    // ��czymy si� z baz� danych
    @mysql_select_db($mysql_db)
    or die('B��d wyboru bazy danych.');
}

?>
