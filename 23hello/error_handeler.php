<?php
set_error_handler('error_handeler', E_ALL);
function error_handler($errNo, $errStr, $errFile, $errLine)
{
    if(ob_get_length()) ob_clean();
    $error_message = 'ERRNO: ' . $errNo . chr(10) .
	'TEKST: ' . $errStr . chr(10) .
	'LOKALIZACJA: ' . $errFile .
	', linia ' . $errLine;
    echo $error_message;
    exit;
}
?>