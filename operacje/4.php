<html><head>
<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
<link rel="stylesheet" type="text/css" href="../stamm1201718544.css">
<script src="../mootools.js" type="text/javascript"></script>
<script src="../scriptt.js" type="text/javascript"></script>
</head>
<body>
<table align="center">
<TR><TD>
<?php  include('../connection.php');
$id_zalogowany=$_SESSION['id'];   $minu=array_keys($_POST['minu']);   $opis=array_keys($_POST['opis']);
for($i=0; $i<count($minu);$i++){  $data=$_POST['minu'][$minu[$i]]; 
$opiss=urlencode($_POST['opis'][$opis[$i]]);

echo '<img src="../img/dodaj.PNG"> '.$_POST['opis'][$opis[$i]].' o godzinie '.$_POST['minu'][$minu[$i]].'<BR>';
$into = "Insert Into `Minutnik` Values('','$data','$id_zalogowany','$opiss');";
 connection(); 
@mysql_query($into); 
destructor();}
echo'<BR><a href="../edyt/minuta.php" target="prawy">Zobacz Minutnik</a> masz go też w zakładce Profil';
?>