<?php
/******************************************************
* connection.php
* konfiguracja po��czenia z baz� danych
******************************************************/

function connection() {

    /* ��czenie i wybranie bazy */
$link = mysql_connect("85.17.1.175", "bornkesws", "MKO208")
    or die ("Nie mo�na si� po��czy� :");

mysql_select_db ("bornkesws") or die ("Nie mozna wybra� bazy danych : ");

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
 or die('Brak po�aczenia z serwerem MySQL.');
    // ��czymy si� z baz� danych
    @mysql_select_db($mysql_db)
    or die('B�ad wyboru bazy danych.');
};
function destructor(){
$end=mysql_close($link);}
?>