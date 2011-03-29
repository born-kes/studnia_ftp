<?PHP include_once('../connection.php');
 if($_GET[GET]=='aut'){ echo 'RAMKA DZIALA'; exit();} 
if($_GET[gg]!=NULL || $_POST!=NULL){$g=false;}else{$g=true;} ?>
<script language="JavaScript">
function gid(id) {
	return document.getElementById(id);
}
function zmien() {
         gid('test').innerHTML ='JavaScript dziala';}
function stat() {
         gid('status').value =3;}

</script>

<?php
if($_POST[nowe]!==NULL)
{ $zap = "INSERT INTO `list_proxi` ( `id` , `name` , `ip` , `status` , `wz` )
VALUES (
NULL , 'nieznay', 'nieznay', '0', 'N'
);";
connection();if(mysql_query($zap)){echo 'Dodano nowy wpis. Trzeba jeszcze wype³niæ pozosta³e dane.';}  destructor();
 $zap="SELECT id FROM `list_proxi` Where name='nieznay'";
connection();$wynik = mysql_query($zap);
  if($r = @mysql_fetch_array($wynik)){$nowe_id=$r[id];}  destructor();
  $get_id =$nowe_id;
}else if($_GET[g]!=Null){
  $get_id =intval($_GET[g]);}

// sprawdzenie IP
function IP_prawdziwe(){

if ($_SERVER['HTTP_X_FORWARDED_FOR']) {
    $ip_prawdziwe = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
else {
  $ip_prawdziwe = $_SERVER['REMOTE_ADDR'];
}
return $ip_prawdziwe;
}
// przypisanie do zmiennej
$ip = IP_prawdziwe();

// wy¶wietlenie

if($_POST[id]!==NULL)
{
    $pos_id=intval($_POST[id]);
  if($_POST[orodoks_del]!=NULL && $pos_id >0){
   $zap="DELETE FROM `list_proxi` WHERE `id` = $pos_id";
 }else{
    $pos_id=intval($_POST[id]);
    $pos_name=$_POST[name];
    $pos_ip=$_POST[ip];
    $pos_status=intval($_POST[status]);
$zap="SELECT ip FROM `list_proxi` Where id=!'$pos_id' AND ip = $pos_ip";
connection();if(mysql_query($zap)){$test_ip=false;echo 'IP Nie mo¿e siê powtarzaæ. <br>';}else{$test_ip=true;}  destructor();

    $zap="UPDATE list_proxi SET name='$pos_name',status='$pos_status',ip='$pos_ip' Where id='$pos_id'" ;}

//echo $zap;
connection();if($test_ip && mysql_query($zap)){echo 'zapisabo zmiany';}else{echo 'Nie Wprowadzono zmian<br>';}  destructor();

} 

     if($get_id!==Null){
    function test($i)
    { if($i===NULL||$i==0){$i=2;}
        if($i==0){$st.='<input type="radio" checked="tak" value="0" name="status" />';}	else{$st.='<input type="radio" value="0" name="status" />';}	$st.='niewybrane <br>';
        if($i==1){$st.='<input type="radio" checked="tak" value="1" name="status" />';}	else{$st.='<input type="radio" value="1" name="status" />';}	$st.='brak ramki - js<br>';
        if($i==2){$st.='<input type="radio" checked="tak" value="2" name="status" />';}	else{$st.='<input type="radio" value="2" name="status" />';}	$st.='ramka ok - js<br>';
        if($i==3){$st.='<input type="radio" checked="tak" value="3" name="status" />';}	else{$st.='<input type="radio" value="3" name="status" />';}	$st.='ramka ok + js ok<br>';
        if($i==4){$st.='<input type="radio" checked="tak" value="4" name="status" />';}	else{$st.='<input type="radio" value="4" name="status" />';}	$st.='brak ramki + js ok<br>';
    return $st;
    }

 $zap="SELECT id,name,status,ip FROM `list_proxi` Where id=".$get_id;
#echo $zap;
connection();$wynik = mysql_query($zap);
 //zakonczenie poloczenia z baza

 //efekt
  if($r = @mysql_fetch_array($wynik))
  {
 if(!$g){  echo '<a href="'.$r[name].'" target="_blank">TEST STRONY</a><br> jako url wpisz: <b>http://www.bornkes.w.szu.pl/proxi/t.php?g='.$get_id.'</b><br>';}
 if($g){      echo '<div id="test" style="background-color:red;"></div>';
      echo '<div style="font-size: 1pt;">.</div>';
     echo '<div id="testip" style="background-color:red;">Wykryte IP: '.IP_prawdziwe().'</div>'; }
      echo '<form name="tu" action="" method="post">';
      echo '<input type="hidden" name="id" value="'.$r[id].'" /><br>';
      echo 'Adres: <input type="text" name="" value="'.$r[name].'" /><br>';
 if($r[ip]!=IP_prawdziwe() && $g){
      echo 'IP:<input type="text" name="ip" value="'.$r[ip].'" /><br>
<span style="text-decoration: blink;"><b> wykryto nie zgodnosc ip</b></span><br>';}
else{ echo 'IP: <b>'.$r[ip].'</b><br>';}
      echo test($r[status]);
 echo '<input type="submit" value="zapisz Zmiany" />';
 echo '<input type="submit" value="Usun - nie dzia³a " name="orodoks_del" />';
      echo '</form><br>';

  }         destructor();     }
#  echo '<a href="?g='.($get_id+1) .'" target="_blank">next</a>';

# $zap="SELECT id,name,status,ip FROM `list_proxi`"; connection(); $wynik = mysql_query($zap);
#echo "<table>";  while($r = @mysql_fetch_array($wynik))
#  {echo "<tr><td>$r[id]</td><td>$r[name]</td><td>$r[ip]</td></tr>";}echo "</table>"; 
if($g){ ?>
<iframe src="../proxi/t.php?GET=aut" name="RAM" id="RAM" width="100" height="100"></iframe>
<script language="JavaScript">
<!--
<? if($g)echo 'zmien();'; ?>
//-->
</script><? } ?>