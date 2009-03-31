<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Aurelia1 (613|681) - Plemiona</title>

<link rel="stylesheet" type="text/css" href="img/stamm1201718544.css">
<script src="img/mootools.js" type="text/javascript"></script>
<script src="img/script.js" type="text/javascript"></script>
</head><br><br>
<body style="margin-top: 6px;">
<?PHP
if($_GET==NULL){
        echo'<form action="" method="get"><textarea id="query" name="query" onclick="highlight(this);" rows="12" cols="152">
         Wklej tu liste wiosek</textarea><input type="submit" value="Konwertuj" style="margin-top: 5px;"/></form>';
}else{
    $linijki = split("[\n]", str_replace('.','',$_GET[query]));
$ilcz=count($linijki);
    for($i=0; $ilcz>=$i ; ++$i){
    $tablica = explode("[\t]",$linijki[$i]);
echo"$tablica[0]<br>
$tablica<br>/
$tablica[2]/<br>
$tablica[3]/<br>";
   echo"<br><b>$i</b> " ;foreach($tablica as $tst) echo("$tst <br>");
//   echo"$text[$i]<BR>";
}}
?>