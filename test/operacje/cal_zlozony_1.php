<html><head>
<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
<link rel="stylesheet" type="text/css" href="stamm.css">
<script src="../js/mootools.js" type="text/javascript"></script>
<script src="../js/menu.js" type="text/javascript"></script>
<style type="text/css">
<!--

.red {background-color: red; color: rgb(250, 250, 250); }

-->
</style><script type="text/javascript">
function ile_gdzie_poszlo(form)
{ 	var k = Array();

for(var s=0; s<ile_co.length; s++){k[s]=0;}
	for(var i=0; i<form.length; i++) {
		var select = form.elements[i];
		if(select.selectedIndex != null) {
for(var j=0; j<ile_co.length; j++)
 {
    if(select.value==ile_co[j]){ k[j]++;}
  }
                                          }
                                           }
for(var s=0; s<ile_co.length; s++)
{
if(k[s]==0){off("wiersz_"+s );}else{on("wiersz_"+s );}
loading('x '+ k[s] ,"cel_"+s ); 
}
        /*alert("cel_"+s);*/
}
function ukryj() {
	var style = document.getElementById("inline_popup").style;
	style.display = (style.display == 'none' ? 'block' : 'none');
}
function blokowanie_opcji(id)
{var form = document.forms[0];

  for(var i=2; i<form.length-1; i++)
  {i++;//przewijanie selektów
	var select = form.elements[i];
	if(select.selectedIndex != null)
	{
		for(var j=0; j<select.options.length; j++)
		{//przewijanie options
		var optio = select.options[j];
		  if(optio.value==id)
		  {
		      if(select.value != id)
		      //{optio.style.display = (optio.style.display == 'none' ? '' : 'none');}
		      {optio.disabled = (optio.disabled == 'tak' ? '' : 'tak');}
		      //else{ optio.style.display = '';}
		      else{optio.disabled = '';}
		       break;
		  }
		}
	}
  }
 
}
function podswietlanie_opcji(id)
{var form = document.forms[0];

  for(var i=2; i<form.length-1; i++)
  {i++;//przewijanie selektów
	var select = form.elements[i];
	if(select.selectedIndex != null)
	{
if(select.value != id){

		for(var j=0; j<select.options.length; j++)
		{//przewijanie options
		var optio = select.options[j];
		  if(optio.value==id)
		{optio.className='red';}
		  else
		{optio.className='';}

		}
			}
			//else
			//{select.className='red';}
	}
  }
 
}
</script>

</head>
<body onload="initMenu()">
<form enctype="multipart/form-data" action="3.php" name="vil"  method="POST">
<table class="main" align="right"><TR><TD>
<?php
  include('../connection.php');
$ata=@array_keys($_POST['ata']);
$obr=@array_keys($_POST['obr']);
 echo'<input name="wojsko" value="'.$_POST[wojsko].'" type="hidden">
      <input name="czas1" value="'.$_POST[czas1].'" type="hidden">

      <table border=1 class="vis"><tr class="units_there"><td>Nazwa</td><td>X | Y</td><td>';
 if($_POST[wojsko]==0){echo'Szlachta</td><td>';}    echo'Atakowana</td></tr><tr>';
        $query='Select w.id , w.name , w.x , w.y ,
   m.pik, m.mie, m.axe, m.luk, m.zw, m.lk, m.kl, m.ck, m.tar, m.kat, m.ry, m.sz

FROM ws_all w
LEFT JOIN ws_mobile m
  ON m.id=w.id
  Where w.id IN (';



for($i=0; $i<count($ata);$i++){$query.=$_POST['ata'][$ata[$i]]; $query.=',';}
$query=substr($query,0,-1).") ";

$quert='Select id , name , x , y FROM ws_all Where id IN (';
for($g=0; $g<count($obr);$g++){$quert.=$_POST['obr'][$obr[$g]]; $quert.=",";}
$quert=substr($quert,0,-1).")"; $l=0;
$ile_gdzie='<tr><td nowrap >Wojska w domu (nigdzie nie skierowane)</td><td id="cel_0" nowrap ></td></tr><tr id="wiersz_0" />';

  connection();  $wynik = @mysql_query($query);

  while($f = @mysql_fetch_array($wynik)) {
$f[wolny]=jaki_czas_marszu($f[pik],$f[mie],$f[axe],$f[luk],$f[zw],$f[lk],$f[kl],$f[ck],$f[tar],$f[kat],$f[ry],$f[sz]);

if($_POST[czas1]!=NULL){       $g_dotarcia = mkczas_pl($_POST[czas1]); }                           //godzina dotarcia do celu
else{echo 'Brak daty ataku';}
$selec ='<select name="obr[]" onchange="ile_gdzie_poszlo(document.forms[\'vil\'])">';
if($g>1){$selec .='<option value="0">Zostaje w domu</option>';}
       connection();
       $wynik_obr = mysql_query($quert);  $is=0;
       while($r = mysql_fetch_array($wynik_obr))
       {
if($l==0){$ile_co[++$jk]=$r[0];
$ile_gdzie.='<tr id="wiersz_'.$jk.'" ><th nowrap >'.urldecode($r[1]).' ('.$r[2].'|'.$r[3].')</th><th id="cel_'.$jk.'" nowrap ></th><td nowrap ><input type="checkbox" title="blokuj" onclick="blokowanie_opcji('.$r[id].')"><input type="radio" name="Podswietl" title="Podswietl" onclick="podswietlanie_opcji('.$r[id].')" /></td></tr>';
}
        $odleglosc=sqrt(potega($f[2]-$r[2],2)+potega($f[3]-$r[3],2));

          if($_POST[wojsko]!=0){  $g_wyslania =  $odleglosc* ($_POST[wojsko]*60); }
        else{    if($f[wolny]==0){destructor(); continue;}
                 $g_wyslania =  $odleglosc* ($f[wolny]*60);      }

          $okno_czas=intval(date("G",$g_dotarcia-$g_wyslania));

            if($_POST[od_h]!=NULL&&$okno_czas<$_POST[od_h]){/*minimalna odleglost => czas do ataku/tępo */destructor(); continue;}
            if($_POST[do_h]!=NULL&&$okno_czas>$_POST[do_h]){/*maxymalna odleglost => czas do ataku/tępo */destructor(); continue;}
                 $hx=$g_dotarcia-$g_wyslania;
                 $h= date("d.m.Y G:i:s",$hx);
        $selec .= '<option value="'.$r[0].'">'.$h.' => '.urldecode($r[1]).' ('.$r[2].'|'.$r[3].')</option>';$is++;
        }  destructor();
$l++;
        $selec .="</select>";
if($is>0){
echo"<tr><td>".urldecode($f[1])."</td><td>$f[2]|$f[3]<input name=\"ata[]\" value=\"$f[0]\" type=\"hidden\"></td><td>";

 if($_POST[wojsko]==0 && $f[sz]!=NULL){echo $f[sz].'</td><td>';}elseif($_POST[wojsko]==0){echo'</td><td>';}

echo $selec."</td></tr>"; }
 } destructor();
?>

</table></td><td valign ="top">
<input value="Dalej" type="submit">
</td><td>
</td></tr></table>
</form>
<script type="text/javascript">var ile_co= Array(0<?PHP foreach($ile_co as $v){echo ','.$v;} ?>);
</script>
<div style="width: 200px; height:17px; position: fixed; display: block; left: 33px; top: 0px; ">
<b><a align="right" href="javascript:ukryj();">[ UKRYJ / ODKRYJ ]</a></b>
</div>
<div id="inline_popup" style="width: 400px; height:510px; position: fixed; display: block; left: 33px; top: 23px; ">
  <div id="inline_popup_main" style="width: 390px;">   <table class="vis" border=1 width="200"><tr><th><table class="main"  width="100%"><?PHP echo $ile_gdzie; ?></table></th></tr></table></div>
</div>
<script type="text/javascript"> ile_gdzie_poszlo(document.forms['vil']) ; </script>