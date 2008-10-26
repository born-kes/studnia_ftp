<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Aurelia1 (613|681) - Plemiona</title>


<link rel="stylesheet" type="text/css" href="img/stamm1201718544.css">
<script src="img/mootools.js" type="text/javascript"></script>
<script src="img/script.js" type="text/javascript"></script>

<script src="/ajax.js?1217938942" type="text/javascript">
function xProcess(xelement, yelement) {
	xvalue = gid(xelement).value;
	yvalue = gid(yelement).value;

	if(xvalue.indexOf("|") != -1) {
		xypart = xvalue.split("|");
		x = parseInt(xypart[0]);
		y = parseInt(xypart[1]);

		gid(xelement).value = x;
		gid(yelement).value = y;
		return;
	}</script>
        </head>


<FORM NAME ACTION="gener.php"  METHOD="post">
x: <input name="x" tabindex="13" id="inputx" value="" size="5" onkeyup="xProcess('inputx', 'inputy')" type="text">
y: <input name="y" tabindex="14" id="inputy" value="" size="5" type="text"><br>
<SELECT name="plemie">
<?php
 /*£¹czenie i wybranie bazy */
$link = mysql_connect("85.17.1.175", "bornkesws", "MKO208")or die(mysql_error());
mysql_select_db ("bornkesws")or die(mysql_error());

$opcje = mysql_query("SELECT nazwa FROM plemie " )or die(mysql_error());

 while($op = mysql_fetch_array($opcje)){
   echo "<option value=\"".$op[0]."\">".$op[0]."</option>";}
$end=mysql_close($link);
?></select><br>
<INPUT TYPE="submit" VALUE="Wygeneruj mapê"> </FORM> </html>
