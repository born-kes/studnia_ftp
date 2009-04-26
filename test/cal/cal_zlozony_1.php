<html><head>
<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
<link rel="stylesheet" type="text/css" href="../img/stamm1201718544.css">
<script src="../mootools.js" type="text/javascript"></script>
<script src="../scriptt.js" type="text/javascript"></script>
</head>
<body>
<table class="main" align="center"><TR><TD>
<form enctype="multipart/form-data" action="3.php" method="POST"><br>

<table border=1>
<?php
  include('../connection.php');
$ata=array_keys($_POST['ata']);
$obr=array_keys($_POST['obr']);
 echo'<form enctype="multipart/form-data" action="3.php" method="post">
      <input name="cos" value="'.$_POST[wojsko].'" type="hidden">
      <input name="czas1" value="'.$_POST[czas1].'" type="hidden">
      <br />
      <table border=1 class="vis"><tr class="units_there"><td>Nazwa</td><td>X | Y</td><td>Atakowana</td></tr><tr>';
        $query='Select id , name , x , y, wolny FROM village Where id IN (';        $quert=$query;

for($i=0; $i<count($ata);$i++){$query.=$_POST['ata'][$ata[$i]]; $query.=',';}
$query=substr($query,0,-1).")";

for($j=0; $j<count($obr);$j++){$quert.=$_POST['obr'][$obr[$j]]; $quert.=",";}
$quert=substr($quert,0,-1).")";

  connection();  $wynik = mysql_query($query);

  while($f = mysql_fetch_array($wynik)) {
echo"<tr><td>$f[1]</td><td>$f[2]|$f[3]<input name=\"ata[]\" value=\"$f[0]\" type=\"hidden\"></td><td>";
       $g_dotarcia = mkczas_pl($_POST[czas1]);                            //godzina dotarcia do celu

echo'<select name="obr[]">';
       connection();
       $wynik_obr = mysql_query($quert);
       while($r = mysql_fetch_array($wynik_obr))
       {
        $odleglosc=sqrt(potega($f[2]-$r[2],2)+potega($f[3]-$r[3],2));

          if($_POST[wojsko]!=1){  $g_wyslania =  $odleglosc* ($_POST[wojsko]*60); }
        else{                     $g_wyslania =  $odleglosc* ($f[wolny]*60);      }

          $okno_czas=intval(date("G",$g_dotarcia-$g_wyslania));

            if($_POST[od_h]!=NULL&&$okno_czas<$_POST[od_h]){/*minimalna odleglost => czas do ataku/tępo */destructor(); continue;}
            if($_POST[do_h]!=NULL&&$okno_czas>$_POST[do_h]){/*maxymalna odleglost => czas do ataku/tępo */destructor(); continue;}
                 $hx=$g_dotarcia-$g_wyslania;
                 $h= date("d.m.Y G:i:s",$hx);
        echo '<option value="'.$r[0].'">'.$h.' : '.$r[1].' ('.$r[2].'|'.$r[3].')</option>
';
        }  destructor();
        echo"</select>
";
echo"</td></tr>";
 } destructor();
?>
</table>



<input value="Dalej" type="submit">
</form>