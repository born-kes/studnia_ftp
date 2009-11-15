########################
#  Do testowania proxi #
########################


<script language="JavaScript">
function gid(id) {
	return document.getElementById(id);
}
function zmien() {
         gid('test').innerHTML ='dziala';}
function stat() {
         gid('status').value =3;}

</script>
<div id="test"></div> <a href="javascript:zmien();">ble ble </a>
<?php
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


function connection() {
    $mysql_server = "my40.szu.pl";
    $mysql_admin = "bornkesws";
    $mysql_pass = "allken208";
    $mysql_db = "bornkesws";
    @mysql_connect($mysql_server, $mysql_admin, $mysql_pass);
    @mysql_select_db($mysql_db);
}
function destructor(){
@mysql_close();
}

if($_POST[id]!==NULL)
{
    $pos_id=$_POST[id];
    $pos_name=$_POST[name];
    $pos_ip=$_POST[ip];
    $pos_status=$_POST[status];
    $zap="UPDATE list_proxi SET name='$pos_name',status='$pos_status',ip='$pos_ip' Where id='$pos_id'" ;
//echo $zap;
connection();if(mysql_query($zap)){echo 'zapisabo zmiany';}  destructor();

} 

     if($_GET[g]!==NULL){
    function test($i)
    { if($i===NULL||$i==0){$i=2;}
        if($i==0){$st.='<option value="0" selected="tak">niewybrane</option>';}else{$st.='<option value="0">niewybrane</option>';}
        if($i==1){$st.='<option value="1" selected="tak">error</option>';}else{$st.='<option value="1">error</option>'; }
        if($i==2){$st.='<option value="2" selected="tak">ok</option>';}else{$st.='<option value="2">ok</option>';}
        if($i==3){$st.='<option value="3" selected="tak">ok + js</option>';}else{$st.='<option value="3">ok + js</option>';}
        if($i==4){$st.='<option value="4" selected="tak">error + js</option>';}else{$st.='<option value="4">error + js</option>';}
    return $st;
    }
 $zap="SELECT id,name,status,ip FROM `proxi` Where id=".$_GET[g];
//echo $zap;
connection();$wynik = mysql_query($zap);
 //zakonczenie poloczenia z baza

 //efekt
  if($r = @mysql_fetch_array($wynik))
  {
      echo '<form name="tu" action="" method="post">';
      echo 'id:<input type="text" name="id" value="'.$r[id].'" /><br>';
      echo 'name:<input type="text" name="" value="'.$r[name].'" /><br>';
      echo 'IP:<input type="text" name="ip" value="'.IP_prawdziwe().'" />'.$r[ip].'<br>';
      echo '<select name="status" id="status">';
      echo test($r[status]);
 echo '<input type="submit" value="zapisz" />';
      echo '</form><br>';
  echo '<a href="'.$r[name].'">TEST STRONY</a><br>';

  }         destructor();     }
  echo '<a href="?g='.($_GET[g]+1) .'">next</a>';

                                            ?>
<script language="JavaScript">
stat();
</script>
<?PHP
# $zap="SELECT id,name,status,ip FROM `proxi`";connection();$wynik = mysql_query($zap);
#echo "<table>";  while($r = @mysql_fetch_array($wynik))
#  {echo "<tr><td>$r[id]</td><td>$r[name]</td><td>$r[ip]</td></tr>";}echo "</table>"; 
?>