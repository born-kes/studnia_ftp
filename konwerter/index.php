<?php
require_once('txt.php');

$tekst1 = str_replace('<a href="/game.php?village=36743&amp;screen=info_village&amp;id=', "<td>", $tekst);

$tekst2 = str_replace("</a>", "", $tekst1);
$tekst3 = str_replace('<span class="grey">.</span>', "", $tekst2);
$tekst4 = str_replace('">', '</td><td>', $tekst3);
$tekst5 = str_replace('|', '</td><td>', $tekst4);
echo"<html><head></head><body><table>".$tekst5."</table>";
?>