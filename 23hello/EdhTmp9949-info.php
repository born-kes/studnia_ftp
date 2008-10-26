<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.0 Transitional//EN" "http:/www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML>
  <HEAD>
   <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=UTF-8">
   <TITLE>raporty z wioski</TITLE>
  </HEAD>
  <BODY>
  <BR>>

  <?php
  require_once('error_handler.php');
  require_once('config.php');
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
  $query = 'SELECT user_id, user_name FROM users';
  $result = $mysqul->query($query);
   while ($row = $result->fetch_array(MYSQLI_ASSOC))
    {
    $user_id = $row['user_id'];
    $user_id = $row['user_name'];
    echo 'Nazwa u¿ytku #' . $user_id . 'to ' . $user_name . '<BR/>';

    };
   $result->clouse();
    $mysqul->clouse();
   ?>
    </BODY>
    </HTML>

  
