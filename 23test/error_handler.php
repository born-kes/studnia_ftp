<?php
// ustawia metodę obsługi błędu użytkownika na error_handler
set_error_handler('error_handler', E_ALL);
// funkcja obsługująca błędy
function error_handler($errNo, $errStr, $errFile, $errLine)
{
  // czyści wygenerowane wcześniej dane wyjściowe
  if(ob_get_length()) ob_clean();
  // komunikat o błędzie danych wyjściowych
  $error_message = 'ERRNO: ' . $errNo . chr(10) .
    'TEKST: ' . $errStr . chr(10) .
    'LOKALIZACJA: ' . $errFile .
    ', linia ' . $errLine;
  echo $error_message;
  // zapobiega wykonywaniu innych skryptów PHP
  exit;
}
?>