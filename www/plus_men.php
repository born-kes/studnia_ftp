<?php  include('connection.php'); ?><HTML>
 <?PHP
 
function zap($player,$typ)
{  if($player==NULL){echo 'error'; return; }
$zap =" SELECT w.id, w.name, w.x, w.y, t.id AS id_P
FROM village w, tribe t
WHERE w.player = t.id
AND t.name='$player'";
if($typ!=NULL){   $zap .="AND w.typ=$typ";}
$zap.='ORDER BY w.name ASC';
    return $zap ;
}
?><HEAD>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="img/stamm1201718544.css">
<script language="JavaScript">
<!--
var which=0
var wioska='village=33066&amp;'
var scre=new Array()
var id_wsi=new Array()
var name_wsi=new Array()

    scre[1]='overview'/* - wioska  */
    scre[2]='main'    /* - ratusz  */
    scre[3]='place'   /* - plac    */
    scre[4]='snob'    /* - pa³ac   */
    scre[5]='barracks'/* - koszary */
    scre[6]='stable'  /* - stajnie */
    scre[7]='garage'  /* - warsztat*/


function gid(id) {	return document.getElementById(id); }

function zmien_klase_CSS() {
	gid('m1').className = 'mainn';
	gid('m2').className = 'mainn';
	gid('m3').className = 'mainn';
	gid('m4').className = 'mainn';
	gid('m5').className = 'mainn';
	gid('m6').className = 'mainn';
	gid('m7').className = 'mainn';
}

function zCSS(element) {   zmien_klase_CSS();
	gid('m'+element).className = 'mains';
        gid('opc').value=element;
 loading_text( which );
}


  /**/      
function plus(){
if (which<id_wsi.length-1){
which++
 loading_text( which );  }
else {
which=0
 loading_text( which );  }
}
function minus(){
if (which>0){
which--
 loading_text( which );  }
else {
which=id_wsi.length-1
 loading_text( which );  }
}

   function loading_text(m) {
var els=gid('opc').value	 
	gid('web_tu').innerHTML = '<a href="http://pl5.plemiona.pl/game.php?'+zast+'village='+id_wsi[m]+'&amp;screen='+scre[els]+'" target="ram">'+name_wsi[m]+'</a>';
}

<?PHP
 $cos=zap($_GET[player],$_GET[typ]);
connection();
$wynik = @mysql_query($cos);
$i=0;
while($r = mysql_fetch_array($wynik)){
echo 'id_wsi['.$i.']='.$r[id].'
';$name_wsi[$i++]="'$r[name] ($r[x]|$r[y])'";
if($G==NULL){$G=$r[id_P];}
} destructor(); $i=0;
foreach($name_wsi as $v)
{echo '
name_wsi['.($i++).']='.$v;}
 if($_GET[zast]!=NULL){echo "
var zast='t='+$G+'&amp;'";}else{echo"
var zast=''";} ?>

//-->
</script>

</HEAD>
               <input type="hidden" name="opc" id="opc" value="1" /></td>

<body>
<table width="100%">
<tbody>
<tr>
<td width="44%">
<table align="left"><tbody>
<tr><td><SELECT name="typ" >
                 <option value="">[Wszystkie]</option>';
            <?     for($licz=0; $licz<count($rodzaje); $licz++)
                 {echo'<option value="'.$licz.'">'.$rodzaje[$licz].'</option>'; }?>
                     </SELECT>
</td>
<td><a href="JavaScript:minus();">&lt;&lt;&lt;&lt;&lt;&lt;</a></td>
<td align="left" id="web_tu" class="mainn" width="300"><a href="http://pl5.plemiona.pl/game.php?village=327759&screen=snob" target="ram">wioska kosak (555|666)</a></td>
<td><a href="JavaScript:plus();">&gt;&gt;&gt;&gt;&gt;&gt;</a></td>
</tr></tbody></table>
</td><td width="1%"></td><td width="45%" align="right">


<table align="center" >
<tbody>
<tr align="right">
<td class="mains" id="m1">
<a href="JavaScript:zCSS(1);"><img src="" alt=""> Wioska</a></td>

<td class="mainn" id="m2">
<a href="JavaScript:zCSS(2);"> Ratusz <img src="http://pl5.plemiona.pl/graphic/buildings/main.png" alt=""></a></td> 

<td class="mainn" id="m3">
<a href="JavaScript:zCSS(3);"> Plac <img src="http://pl5.plemiona.pl/graphic/buildings/place.png" alt=""></a> </td>

<td class="mainn"  id="m4">
<a href="JavaScript:zCSS(4);"> palac <img src="http://pl5.plemiona.pl/graphic/buildings/snob.png" alt=""></a></td>

<td class="mainn"  id="m5">
<a href="JavaScript:zCSS(5);"> koszary <img src="http://pl5.plemiona.pl/graphic/buildings/barracks.png" alt=""></a></td>

<td class="mainn"  id="m6">
<a href="JavaScript:zCSS(6);"> stajnie <img src="http://pl5.plemiona.pl/graphic/buildings/stable.png" alt=""></a></td>

<td class="mainn" id="m7">
<a href="JavaScript:zCSS(7);"> warszataty <img src="http://pl5.plemiona.pl/graphic/buildings/garage.png" alt=""></a></td>

</tr>
</td></tr></tbody></table>
</td></tr></tbody></table>
<!--
<form name="sumulant" action="http://pl5.plemiona.pl/game.php" method="get">
<select name="id_45157" style="" onchange="changeBunches(document.forms['villages'])">
		<option label="1x (28000, 30000, 25000)" value="1">1x (28000, 30000, 25000)</option>
		<option label="2x (56000, 60000, 50000)" value="2">2x (56000, 60000, 50000)</option>
</select>
-->
</form>
</body></HTML>