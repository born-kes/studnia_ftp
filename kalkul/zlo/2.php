<html><head>
<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
<link rel="stylesheet" type="text/css" href="../img/stamm1201718544.css">
<script src="../mootools.js" type="text/javascript"></script>
<script src="../scriptt.js" type="text/javascript"></script>
</head>
<body>
<table class="main" align="center"><TR><TD>
<form enctype="multipart/form-data" action="3.php" method="post">
<input name="ileatak" value="1" type="hidden"><br>

<table border=1>
<?php
  include('../connection.php');
$ata=array_keys($_POST['ata']);
$obr=array_keys($_POST['obr']);
 echo'<form enctype="multipart/form-data" action="3.php" method="post">
      <input name="ileatak" value="1" type="hidden">
      <input name="cos" value="'.$_POST[cos].'" type="hidden">
      <input name="czas" value="'.$_POST[czas].'" type="hidden">
      <br />
      <table border=1 class="vis"><tr class="units_there"><td>Nazwa</td><td>X | Y</td><td>Atakowana</td></tr><tr>';
        $query='Select id , name , x , y FROM village Where id IN (';        $quert=$query;
            
for($i=0; $i<count($ata);$i++){$query.=$_POST['ata'][$ata[$i]]; $query.=',';}
$query=substr($query,0,-1).")";
 
for($j=0; $j<count($obr);$j++){$quert.=$_POST['obr'][$obr[$j]]; $quert.=",";}
$quert=substr($quert,0,-1).")";

$select_obr='<select name="obr[]">';
       connection();
       $wynik_obr = mysql_query("$quert");
       while($r = mysql_fetch_array($wynik_obr)) {
        $select_obr.="<option value=\"$r[1]|$r[2]|$r[3]\">$r[2]|$r[3] - $r[1]</option>";
        }
        $select_obr.="</select>";
  connection();  $wynik = mysql_query($query);

  while($f = mysql_fetch_array($wynik)) {
echo"<tr><td>$f[1]</td><td>$f[2]|$f[3]<input name=\"ata[]\" value=\"$f[1]|$f[2]|$f[3]\" type=\"hidden\"></td><td>$select_obr</td></tr>";
 } 
#<br>Czas dotarcia wojsk do celów
#<input maxlength="2" size="3" name="h" type="int">:
#<input maxlength="2" size="3" name="m" type="int">:
#<input maxlength="2" size="3" name="s" type="int">
?>
</table>



<input value="Dalej" type="submit">
</form>