<html><head>
<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
<link rel="stylesheet" type="text/css" href="stamm.css">
<script src="../mootools.js" type="text/javascript"></script>
<script src="../scriptt.js" type="text/javascript"></script>
</head>
<body><br />
<table align="center">
<TR><TD>
<?php  include('../connection.php');
if(isSet($_SESSION['id'])){ $id_zalogowany= $_SESSION['id'];}
else{ $user=$_SESSION['zalogowany'];
  connection();
     $wynik = mysql_query("SELECT `id` FROM `list_user` WHERE name='$user'")or die('Blad zapytania');
       if($r = mysql_fetch_row($wynik)){$_SESSION['id']=$r[0];}
  destructor();
}
$id_zalogowany=$_SESSION['id'];   $minu=@array_keys($_POST['minu']);
for($i=0; $i<count($minu);$i++){  

$opis = explode('|',$_POST['minu'][$minu[$i]]);
$data=data_z_bazy($opis[0]); 
$w_atak=$opis[1];
$w_obro=$opis[2];

$opiss=urldecode($opis[3]);


echo '<img src="../img/dodaj.PNG"> '.$opiss.' o godzinie '.$data.'<BR>';
$into = "Insert Into `list_zadan` Values('','$opis[0]','$id_zalogowany','$opis[3]','$w_atak','$w_obro');";
 connection(); 
@mysql_query($into); 
destructor();}
echo'<BR><a href="minuta.php" target="ramka">Zobacz Minutnik</a> masz go też w zakładce Profil';
?>