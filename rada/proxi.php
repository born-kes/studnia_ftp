<?PHP include_once('../connection.php');
    if($_SESSION['zalogowany']=='9oKesi'){$prawa = 3;}
elseif($_SESSION['zalogowany']=='bampi'){$prawa = 3;}
elseif($_SESSION['zalogowany']=='ZOMox'){$prawa = 3;}
else
{echo $_SESSION['zalogowany'];}
?><html>
<head>
<script language="JavaScript" src="../js/plac.js" type="text/javascript" ></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
           <script src="../js/ajax.js?2" type="text/javascript"></script>
<style type="text/css">
<!--

  BODY {background: #F7EED3;}
.main { background-color:#F7EED3; border:0px solid #804000;}
table.ba { border-bottom:0px;}
table.main td{font-size:11px;}
table.main th{font-size:11px;}
table.main tr.row th{font-size:11px;}
table.main th { background-color:#006600; background-image:none; color:#F1EBDD;}    //DED3B9
table.main tr.row td { background-color:#006600; background-image:none; color:#F1EBDD;}    //DED3B9
table.main tr.row td.hidden { color:#333366; }
tr.center td { text-align:center; }
.xs {font-size:x-small;}
.dd {background-color:#aaa6a0; color:#F1EBDD;}
-->
</style><script language="JavaScript">
<!--

function zapisz_to(id)
{
  var funkcja=  gid_kes('funkcja_'+id).value;
if(gid_kes('ukryj_'  +id).checked)
{
  var ukryj  = 1 ; 
 gid_kes('a'+id).className='dd';
}else{
  var ukryj  = 0 ;
 gid_kes('a'+id).className='';
}
  var passy  =  gid_kes('passy_'  +id).value;
  var proxi  =  gid_kes('proxi_'  +id).value;
var str='prox/zmien.php?g='+id+'&funkcja='+funkcja+'&ukryj='+ukryj+'&passy='+passy+'&proxi='+proxi;
//alert(str);
Klik('a'+id,str);
}
function edit_prx()
{
show('div_proxi');
show('div_proxi1');
}
//-->
</script>
</head>
<body>
<?PHP 
 if($prawa >2)echo '<input type="submit" value="proxy edyt" onclick="edit_prx();" />';
?>
By Sie zalogowac, wpisz jako <b>URL</b> klucz<br />
klucz z manu bocznym: <b>http://bornkes.w.szu.pl/proxi/plus.php?p=ff</b><br />
klucz Awaryjny<b>http://bornkes.w.szu.pl/proxi/ipp.php?p=ff</b>
<table border="1" class="main ba"><thead>
 <tr>
  <th onclick="sort(1,this);" style="cursor:pointer;">Gracz</th>
  <th>haslo</th>
  <th>proxi</th>
  <th onclick="sort(5,this);" style="cursor:pointer;">Adres Bramki</th>
  <th onclick="sort(0,this);" style="cursor:pointer;">Ostanie Logowanie</th>
  <th onclick="sort(6,this);" style="cursor:pointer;">Pelniona funkcja</th>

 </tr></thead>
<?PHP

/*
#   function test($i)                  // statusy dla proxi
#    {   if($i==0){$st='niewybrane';}
#        elseif($i==1){$st='error'; }
#        elseif($i==2){$st='ok';}
#        elseif($i==3){$st='ok + js';}
#        elseif($i==4){$st='error + js';}
#    return $st;
#    }

# $zap="SELECT p.id,p.name,p.status,us.nr_ip, FROM `proxi` p LEFT JOIN `us` ON us.serwer = p.name";
 connection();                                               //zapytanie o dane przypisane do ip
#$wynik = mysql_query($zap); $l=0;                            //efekt
#  while($r = @mysql_fetch_array($wynik))
#   {  if($r[nr_ip]!=NULL){$select[$l++].="<option value=\"$r[id]\" selected disabled=\"tak\" >[".test($r[status])."] $r[name]</option>";}
#                     else{$select[$l++].="<option value=\"$r[id]\" selected >[".test($r[status])."] $r[name]</option>";}   }

$zap="
SELECT u.id,u.name AS login, u.haslo2, p.ip, p.name, wz,u.wtyczka ,data,funkcja
FROM `list_user` u, `list_proxi` p 
Where u.nr_proxi=p.id
  AND u.haslo2!=''
  AND u.gra!=0
ORDER BY u.name ASC ;";

$wynik = mysql_query($zap);
 //zakonczenie poloczenia z baza
 //efekt
  while($f = @mysql_fetch_array($wynik))
   { if($prawa <2 && ($f[wtyczka ]=='T') ){continue;}
       echo '<tr id="a'.$f[id].'"><td style="display:none;">'.$f[data].'</td>';


       echo '<td>'.$f[login].'</td>';
       if($f[haslo2]!=NULL&&$f[haslo2]!='0'){echo '<td><img src="http://pl5.plemiona.pl/graphic/dots/green.png?1" title="Tak" alt=""></td>';}
                      else{echo '<td><img src="http://pl5.plemiona.pl/graphic/dots/grey.png?1" title="Nie" alt=""></td>';}
       if($f[ip]!=NULL&&$f[ip]!='0'){echo '<td><img src="http://pl5.plemiona.pl/graphic/dots/green.png?1" title='.$f[ip].' alt=""></td>';}
                      else{echo '<td><img src="http://pl5.plemiona.pl/graphic/dots/grey.png?1" title="brak ustawionej bramki" alt=""></td>';}
if(false)//$f[wz]=="N")
{
 echo '<td><a href="'.$f[name].'" target="_blank">'.$f[name].'</a></td>';
}else{
 echo '<td><a href="'.$f[name].'" target="_blank">WEJDZ</a></td>';
}

// wybur proxi
 #      echo '<td><select name="'.$f[id].'">';
 #             for($i=0;count($select)>$i;$i++)
 #             {
 #                 if($i==$f[nr_ip]){echo str_replace('selected', 'selected="tak"', $select[$i]);}
 #                 else{echo str_replace('selected', '', $select[$i]);}
 #             }
 #      echo '</select></td>';
$dnis = intval( (mktime()-$f[data]-$godzina_zero)/86400 );
if(
     if((mktime()-$f[data]-$godzina_zero)>950400){
 echo '<td>'.$f[funkcja].'----- '.data_z_bazy($f[data]).'== UWAGA KASACJA ('.$dnis .' dni)<img src="../img/z4.gif" title="kasacja ?"></td>'; }
else if($f[data]!=0){ echo '<td>'.data_z_bazy($f[data]).' ('.$dnis .' dni)</td>'; }
else{ echo '<td>Brak</td>'; }
if($f[funkcja]==NULL){$f[funkcja]=0;}
echo '<td>'. $funkcja[$f[funkcja]] .'</td>';

if($prawa >2){
 echo '<td><a href="javascript:Klik(\'a'.$f[id].'\',\'prox/edyt.php?g='.$f[id].'\');">[EDYT] '.$f[login].'</a></td>'; 
}
       echo '</tr>';
  //     echo '<tr><td style="display:none;">'.$f[data].'</td><td colspan="7" id="a'.$f[id].'"></td></tr>';

   }destructor();*/     include_once('prox/wiersz.php');
echo '</table>';
 if($prawa >2){
echo '<div id="div_proxi" style="position:absolute; display:none; top:200px;width:350px; left:150px; background-color:#a066a0; color:#F1EBDD;">xxx</div>
<div id="div_proxi1" style="display:none; position:absolute; top:130px;width:350px; left:150px; background-color:#a066a0; color:#F1EBDD;"><br />
<div id="div_proxi0" style=" " ></div>
<br /> 
</div>';
}?>
<script language="JavaScript">
<!--

Klik('div_proxi0','prox/select.php');
function select_k(id)
{
var r = RGBToHex(Math.random()*255) ;
var g = RGBToHex(Math.random()*255);
var b = RGBToHex(Math.random()*255);
//alert(r+' '+g+' '+b);
gid_kes('div_proxi').style.backgroundColor="rgb("+r+","+g+","+b+")";
show_on('div_proxi');
Klik('div_proxi','prox/t.php?g='+id)
}
function RGBToHex(rgb){if(rgb>500)rgb=rgb/4; rgb = Math.round(rgb); if(rgb>255)rgb=rgb-255;  if(rgb<50)rgb+=60;  return rgb; } 
//-->
</script>
