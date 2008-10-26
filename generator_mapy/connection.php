<?php
/******************************************************
* connection.php
* konfiguracja po³&#65533;czenia z baz&#65533; danych
******************************************************/

function connection() {

    /* £&#65533;czenie i wybranie bazy */
$link = mysql_connect("85.17.1.175", "bornkesws", "MKO208")
    or die ("Nie mo¿na siê po³&#65533;czyæ :");

mysql_select_db ("bornkesws") or die ("Nie mozna wybraæ bazy danych : ");

// serwer
    $mysql_server = "85.17.1.175";
    // admin
    $mysql_admin = "bornkesws";
    // has³o
    $mysql_pass = "MKO208";
    // nazwa baza
    $mysql_db = "bornkesws";

    // nawi&#65533;zujemy po³&#65533;czenie z serwerem MySQL
    @mysql_connect($mysql_server, $mysql_admin, $mysql_pass)
 or die('Brak po³aczenia z serwerem MySQL.');
    // ³&#65533;czymy siê z baz&#65533; danych
    @mysql_select_db($mysql_db)
    or die('B³ad wyboru bazy danych.');
}

function destructor(){
if(!mysql_close($link)){echo'blad zakniecia<br>';}else
{echo'zmknieto poloczenie';}};
?>
