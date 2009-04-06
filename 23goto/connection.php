<?php
function connection() {
    $mysql_server = "85.17.1.175";
    $mysql_admin = "bornkesws";
    $mysql_pass = "MKO208";
    $mysql_db = "bornkesws";
    @mysql_connect($mysql_server, $mysql_admin, $mysql_pass);
    @mysql_select_db($mysql_db);
}

function destructor(){
@mysql_close();
}
function uakt($co){
$ddd=date("y-m-d G:i:s");
connection();
mysql_query("UPDATE uakt SET data='$ddd' WHERE id=$co; ");
destructor();
}
?>
