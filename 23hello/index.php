<?php

require_once('error_handler.php');

  require_once('config.php');
  
  $mysql = new mysql_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
  $query = 'SELECT user_id, user_name FROM users';
  $result = $mysql->query($query);
   while ($row = $result->fetch_array(MYSQLI_ASSOC))
    {
    $user_id = $row['user_id'];
    $user_id = $row['user_name'];
    echo 'Nazwa u¿ytku #' . $user_id . 'to ' . $user_name . '<BR/>';
    };
   $result->clouse();
    $mysqli->clouse();
   ?>

