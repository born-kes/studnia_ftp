<?PHP
session_start();
if(!isSet($_SESSION['zalogowany'])){
  $_SESSION['komunikat'] = "Nie jeste¶ zalogowany!";
  include('../form.php');
  exit();}

$zalogowany=$_SESSION['zalogowany'];

if(!isSet($_SESSION['id'])){
connection();
$wynik = mysql_query("SELECT p.id
      FROM tribe p
      WHERE p.name = '$zalogowany'")or die('Blad zapytania');

if($r = mysql_fetch_array($wynik)){
$_SESSION['id'] = $r[0];
$id=$r[0];
}
destructor();}else{$id=$_SESSION['id'];}

//$id_color  automatycznie ustawiane
if(isSet($_GET[usun])){
connection();
$wynik = mysql_query("DELETE FROM color WHERE id_color='$_GET[usun]' AND users='$id' ");
destructor();}

if($_POST[zmiana]!=NULL&& isSet($_POST[color_picker_b]) && isSet($_POST[color_picker_g]) && isSet($_POST[color_picker_r]) ){

connection();
$wynik = mysql_query("
UPDATE color SET
 r='$_POST[color_picker_r]',
 g='$_POST[color_picker_g]',
 b='$_POST[color_picker_b]' 
WHERE id_color='$_POST[zmiana]' ");
destructor();}



if(isSet($_POST[color_picker_b]) && isSet($_POST[color_picker_g]) && isSet($_POST[color_picker_r]) && $_POST[gracz]!=NULL ){
$c_b=$_POST[color_picker_b];
$c_g=$_POST[color_picker_g];
$c_r=$_POST[color_picker_r];

connection();
$wynik = mysql_query("SELECT p.id
      FROM tribe p
      WHERE p.name = '$_POST[gracz]'")or die('Blad zapytania');
if($r = mysql_fetch_array($wynik)){$tribe = $r[0];}else{echo "Nie znaleziono gracza".$_POST[gracz];}
destructor();
//echo "INSERT INTO color values('','$id','$tribe','$c_r','$c_g','$c_b');";
connection();
$wynik = mysql_query("INSERT INTO color values('','$id','$tribe','$c_r','$c_g','$c_b');");
destructor();}
//if($_POST[usun]!=NULL){deleile}
//zmien
//if($b=$_POST[color_picker_b] && $g=$_POST[color_picker_g] && $r=$_POST[color_picker_r] && $gracz =$_POST[gracz])
//UPDATE
?>

<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
  <meta name="Description" content="[ Opis dokumentu ]" />
  <meta name="Author" content="[ Autor dokumentu ]" />
  <meta name="Generator" content="EdHTML" />
  <title>[ Tytul dokumentu ]</title>
</head>
<body>
   <script type="text/javascript">
function zmiana(tribe_id){
gid("gracz").value ='';
gid("zmiana").value = tribe_id ;
gid("nowy_gracz").style.display = 'none';
gid("nowy_gracz_input").style.display = 'none';
show_color_picker()
}

function show_color_picker() {
	var style = gid("color_picker").style;
	style.display = (style.display == 'none' ? '' : 'none');
}
function color_picker_choose(r, g, b) {
	gid("color_picker_r").value = r;
	gid("color_picker_g").value = g;
	gid("color_picker_b").value = b;
	color_picker_change();
}
function color_picker_change() {
	var r = gid("color_picker_r").value;
	var g = gid("color_picker_g").value;
	var b = gid("color_picker_b").value;
	gid("color").style.backgroundColor = "rgb("+r+", "+g+", "+b+")";
	gid("color").style.backgroundImage = 'none';
}
function color_picker_ok() {
	color_picker_change();
}
</script>
<table border="1" width="350">

   <tr>
     <td colspan="2"><h2>Edytor kolorów graczy</h2></td>
   </tr>
   <tr>
     <td colspan="2"><h4>Lista Graczy</h4></td>
   </tr>

   <tr><td colspan="2">
     <table>
<?PHP
connection();
$wynik = mysql_query("SELECT c.*, p.name
      FROM tribe p,color c
      WHERE c.users = '$id'
      AND c.tribe_id =p.id ")or die('Blad zapytania');
while($r = mysql_fetch_array($wynik))
{$r_jest=1;
echo '<tr>
        <td width="30" style="background-color:rgb('.$r[r].', '.$r[g].', '.$r[b].')"></td>
        <td>'.$r[name].'</td>
        <td><a href="javascript:zmiana(\''.$r[id_color].'\');" >zmien</a></td>
        <td><a href="?m=0&usun='.$r[id_color].'">usun</a></td>
       <tr>';
$users = $r[0];}
if(!$r_jest==1){echo'
   <tr>
    <td colspan="2">aktu³alnie pusta</td>
   </tr>';}
destructor();
?>
     </table>
   </td>
   </tr>
<form action="?m=0" method="POST">
<input type="hidden" name="zmiana" id="zmiana" value="">

   <tr id="nowy_gracz">
     <td colspan="2"><h4>dodaj nowego gracza</h4></td>
   </tr>
   <tr id="nowy_gracz_input">
     <td colspan="2">Nowy Gracz <input  type="text" name="gracz" id="gracz" ></td>
   </tr>
     <td><a href="javascript:show_color_picker()"> Lista kolorwo</a></td>
     <td id="color" width="30"></td>
   <tr>
    <td colspan="2">
     <table id="color_picker" style="border-spacing:0px; display:none">
           <tr><td>czerwony:</td><td><input name="color_picker_r" id="color_picker_r" style="font-size:10px;" onchange="color_picker_change()" onkeyup="color_picker_change()" size="4" type="text" /></td><td style="background-color:rgb(0,0,0); background-image:none" width="15" onclick="color_picker_choose(0,0,0)">&nbsp;</td><td style="background-color:rgb(0,0,127); background-image:none" width="15" onclick="color_picker_choose(0,0,127)">&nbsp;</td><td style="background-color:rgb(0,0,254); background-image:none" width="15" onclick="color_picker_choose(0,0,254)">&nbsp;</td><td style="background-color:rgb(0,127,0); background-image:none" width="15" onclick="color_picker_choose(0,127,0)">&nbsp;</td><td style="background-color:rgb(0,127,127); background-image:none" width="15" onclick="color_picker_choose(0,127,127)">&nbsp;</td><td style="background-color:rgb(0,127,254); background-image:none" width="15" onclick="color_picker_choose(0,127,254)">&nbsp;</td><td style="background-color:rgb(0,254,0); background-image:none" width="15" onclick="color_picker_choose(0,254,0)">&nbsp;</td><td style="background-color:rgb(0,254,127); background-image:none" width="15" onclick="color_picker_choose(0,254,127)">&nbsp;</td><td style="background-color:rgb(0,254,254); background-image:none" width="15" onclick="color_picker_choose(0,254,254)">&nbsp;</td></tr>
           <tr><td>zielony:</td><td><input name="color_picker_g" id="color_picker_g" style="font-size:10px;" onchange="color_picker_change()" onkeyup="color_picker_change()" size="4" type="text" /></td><td style="background-color:rgb(127,0,0); background-image:none" width="15" onclick="color_picker_choose(127,0,0)">&nbsp;</td><td style="background-color:rgb(127,0,127); background-image:none" width="15" onclick="color_picker_choose(127,0,127)">&nbsp;</td><td style="background-color:rgb(127,0,254); background-image:none" width="15" onclick="color_picker_choose(127,0,254)">&nbsp;</td><td style="background-color:rgb(127,127,0); background-image:none" width="15" onclick="color_picker_choose(127,127,0)">&nbsp;</td><td style="background-color:rgb(127,127,127); background-image:none" width="15" onclick="color_picker_choose(127,127,127)">&nbsp;</td><td style="background-color:rgb(127,127,254); background-image:none" width="15" onclick="color_picker_choose(127,127,254)">&nbsp;</td><td style="background-color:rgb(127,254,0); background-image:none" width="15" onclick="color_picker_choose(127,254,0)">&nbsp;</td><td style="background-color:rgb(127,254,127); background-image:none" width="15" onclick="color_picker_choose(127,254,127)">&nbsp;</td><td style="background-color:rgb(127,254,254); background-image:none" width="15" onclick="color_picker_choose(127,254,254)">&nbsp;</td></tr>
           <tr><td>niebieski:</td><td><input name="color_picker_b" id="color_picker_b" style="font-size:10px;" onchange="color_picker_change()" onkeyup="color_picker_change()" size="4" type="text" /></td><td style="background-color:rgb(254,0,0); background-image:none" width="15" onclick="color_picker_choose(254,0,0)">&nbsp;</td><td style="background-color:rgb(254,0,127); background-image:none" width="15" onclick="color_picker_choose(254,0,127)">&nbsp;</td><td style="background-color:rgb(254,0,254); background-image:none" width="15" onclick="color_picker_choose(254,0,254)">&nbsp;</td><td style="background-color:rgb(254,127,0); background-image:none" width="15" onclick="color_picker_choose(254,127,0)">&nbsp;</td><td style="background-color:rgb(254,127,127); background-image:none" width="15" onclick="color_picker_choose(254,127,127)">&nbsp;</td><td style="background-color:rgb(254,127,254); background-image:none" width="15" onclick="color_picker_choose(254,127,254)">&nbsp;</td><td style="background-color:rgb(254,254,0); background-image:none" width="15" onclick="color_picker_choose(254,254,0)">&nbsp;</td><td style="background-color:rgb(254,254,127); background-image:none" width="15" onclick="color_picker_choose(254,254,127)">&nbsp;</td><td style="background-color:rgb(254,254,254); background-image:none" width="15" onclick="color_picker_choose(254,254,254)">&nbsp;</td></tr>
      </table>
     </td>
     <script type="text/javascript">
gid("color_picker_r").value = 255;
gid("color_picker_g").value = 0;
gid("color_picker_b").value = 255;
color_picker_change();
</script>

     </tr>
     <tr>
      <td colspan="2"><input type="submit" value="Utwórz" /></td>
     </tr> </form>
</table>

</body>
</html>
