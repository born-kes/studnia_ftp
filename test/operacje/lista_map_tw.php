<? include('../connection.php');sesio_id();$moje_id = $_SESSION['id']; ?><head>     <meta http-equiv="Content-Type" content="text/html; charset=windows-1250">
           <link rel="stylesheet" type="text/css" href="stamm.css">
<?PHP   $i=1; $komu=' ';
  
    if($_POST!=null)
    {
  //    Insert Into `hex_kolor` Values('','$opis[0]','$id_zalogowany','$opis[3]','$w_atak','$w_obro'

       if($_POST[KESadres]!=null && $_POST[KESname]!=null && $_POST[KESzoom]!=null && $_POST[KESx]!=null && $_POST[KESy]!=null )
       {
        $adres = explode("/",$_POST[KESadres]);
$hex = $adres[count($adres)-1];
        $nazwa = $_POST[KESname];
        $zoom  = $_POST[KESzoom];
        $x     = $_POST[KESx];
        $y     = $_POST[KESy];
  $quert = "Insert Into `hex_kolor` Values('', '$hex' , $moje_id , '$nazwa',$x,$y,$zoom,0);" ;
// echo $quert;
  connection();
    if(! @mysql_query($quert) ){$komu ='Nie Dodano<br>';}else{$komu = 'Dodano<br>';}
  destructor();
         }elseif($_POST[plem_op]!=null){

          $query = " UPDATE `hex_kolor` SET ulubione=0 Where user_id= $moje_id ; ";
  connection();
    if(! @mysql_query($query) ){$komu = 'Nie Zmieniono<br>';}
  destructor();

            if($_POST[plem_op]!=0)
            {  $uprdate = $_POST[plem_op];
          $query = " UPDATE `hex_kolor` SET ulubione=1 Where user_id= $moje_id AND id = $uprdate; ";
  connection();
    if(! @mysql_query($query) ){$komu = 'Nie Zmieniono<br>';}else{$komu = 'Zmieniono<br>';}
  destructor();

            }
// echo $query;

        }
    }
   $hexs=' var s_hex = new Array;
   s_hex[0]=\'92a38af8a7dea8a218ade9b480f5c88a\';
  ';
$domyslne[1]='92a38af8a7dea8a218ade9b480f5c88a';
   $name=' var s_name = new Array;
   s_name[0]=\'swiat 5 \';
  ';
$domyslne[2]='swiat 5';
      $option ='  <select name="plem_op" OnChange="selecturl(this)">'.'<OPTION VALUE="0"> (500|500) swiat 5</OPTION>';

  connection();
    $wynik = @mysql_query("SELECT id, `hex`, `nazwa`,ulubione,x,y FROM `hex_kolor` Where user_id= $moje_id");
      while($r = mysql_fetch_array($wynik))
 {
   $hexs.='  s_hex['.$r[id].']=\''.$r[hex].'\';
  ';
   $name.='  s_name['.$r[id].']=\''.$r[nazwa].'\';
  ';
         if($r[ulubione]==1){      $option .='<OPTION VALUE="'.$r[id].'" selected="tak">('.$r[x].'|'.$r[y].') '.$r[nazwa].' (ulubiony)</OPTION>';$domyslne[1]=$r[hex];$domyslne[2]=$r[nazwa].' (ulubiony)';}
      else {                       $option .='<OPTION VALUE="'.$r[id].'">('.$r[x].'|'.$r[y].') '.$r[nazwa].'</OPTION>';        }
 }@destructor();
      $option .='</select>';
?>
          <script type="text/javascript">

function selecturl(s) {
	var v = s.options[s.selectedIndex].value;
	document.getElementById('link').innerHTML = 'Wejdz <a href="http://pl5.twmaps.org/'+s_hex[v]+'" target="_blank">'+s_name[v]+'</a>';
}
<?PHP  echo $name;  echo $hexs;    ?>
           </script></head>
<?PHP echo $komu; ?>
<p align="center">Twoja Lista TW Maps ;p</p>
<form name="tw" action="" method="POST">
<table class="main" align="center">
<tr><td><?PHP echo $option; ?></td></tr>
<tr><td><input type="submit" value="ustaw jako ulubiony" /></td></tr>
<tr><th id="link">Wejdz <a href="http://pl5.twmaps.org/<?PHP echo $domyslne[1]; ?>" target="_blank"><?PHP echo $domyslne[2]; ?></a></th></tr>
</table></form>

