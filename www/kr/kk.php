<?php
include_once(dirname(dirname(__FILE__)) . '/connection.php');

if($_POST[query]!=null){ // wy³apanie
include('100.php');
include('200.php');
  exit();
  }    //koniec if(query);
include('300.php');
include('000.php');
?>