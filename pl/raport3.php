<?php  include('../connection.php'); ?><html><head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<style type="text/css">
<!--

  BODY {background: #F7EED3;}
table.main { background-color:#F7EED3; border:0px solid #804000;}
table.ba { border-bottom:0px;}
table.main td{font-size:11px;}

table.main th{font-size:11px;}
table.main tr.row th{font-size:11px;}
table.main tr.row td { background-color:#006600; background-image:none; color:#F1EBDD;}
table.main tr.row td.hidden { color:#333366; }
tr.center td { text-align:center; }


-->
</style>
<script src="../js/scriptt.js" type="text/javascript"></script>
</head><body><form name="fe" action="" method="post"><div style="position:absolute; top:-1px;right:2px; bottom:4px; left:2px;" ><?php
//if(!isSet($_COOKIE['wtyk'])){

    if($_GET['xy']   !=NULL){ $xy = explode("|",($_GET['xy']));//xy_wioski

    if($_GET['w']    !=NULL && $_GET['w']    !=''){ $wg = explode(",",$_GET['w']); }   // Wojsko Get  foreach($wojo_get as $w){echo $w.':';} }
    if($_GET['Mur']  !=NULL && $_GET['Mur']!='undefined'){ $wm = intval($_GET['Mur']);}              //Wioska Typ
    if($_GET['typ']  !=NULL){ $wt = $_GET['typ']; }              //Wioska Typ
    if($_GET['data'] !=NULL){ $data = mkczas_pl($_GET['data'])-$godzina_zero; }

        $zap ="SELECT id FROM `ws_all` WHERE x=".($xy[0])." AND y=".($xy[1])."";//intval
connection();
$wynik = @mysql_query($zap);if($r = @mysql_fetch_array($wynik)){ $zap=$r[id];}else{echo $zap;exit();}
destructor();

if($_POST[sql]!==NULL)
{
               $sql_all=", pik=$wg[0],mie=$wg[1],axe=$wg[2],luk=$wg[3],zw=$wg[4],lk=$wg[5],kl=$wg[6],ck=$wg[7],tar=$wg[8],kat=$wg[9],ry=$wg[10],sz=$wg[11] ";
            if($_POST['typ']  !=NULL){ $wt = $_POST['typ']; }              //Wioska Typ

if($_GET['o0']==0){
 $zapytanie = "UPDATE ws_mobile SET ";
 $zapytanie2 = "INSERT INTO ws_mobile SET id=$zap";
                $sql_typ=", typ=$wt ";
                $sql_Mur="";  }
 else
if($_GET['o0']==1){
 $zapytanie = "UPDATE ws_raport SET ";
 $zapytanie2 = "INSERT INTO ws_raport SET id=$zap ";
               $sql_typ=", status=$wt ";
               if($wm!==NULL){
if($_POST[sql]=='Mur'){$sql_Mur='';}else{$sql_Mur=',';}
$sql_Mur.=" mur=$wm, d_mur=".$data;}else{$sql_Mur=null;}
                  }


    if($_POST[sql]=='Wojsko')   {$zapytanie.=" data='$data'".$sql_all; $zapytanie2.=", data='$data'".$sql_all; $ok=1;}
elseif($_POST[sql]=='TylkoTyp') {$zapytanie.=" data='$data'".$sql_typ; $zapytanie2.=", data='$data'".$sql_typ; $ok=1;}
elseif($_POST[sql]=='Status')   {$zapytanie.=" data='$data'".$sql_typ; $zapytanie2.=", data='$data'".$sql_typ; $ok=1;}
elseif($_POST[sql]=='Mur')      {$zapytanie.=                $sql_Mur; $zapytanie2.=",".$sql_Mur; $ok=1;}
elseif($_POST[sql]=='WSZYSTKO') {$zapytanie.=" data='$data'".$sql_all.$sql_typ.$sql_Mur; $zapytanie2.=", data='$data'".$sql_all.$sql_typ.$sql_Mur; $ok=1;}
elseif($_POST[sql]=='+'&&$_GET['o0']==0)
{
    connection();  $wy = @mysql_query("SELECT pik,mie,axe,luk,zw,lk,kl,ck,tar,kat,sz FROM `ws_mobile` WHERE id=$zap;");
      if($r = mysql_fetch_array($wy))
      {
      $sql_plus=" pik=".($wg[0]+$r[pik]).",
                  mie=".($wg[1]+$r[mie]).",
                  axe=".($wg[2]+$r[axe]).",
                  luk=".($wg[3]+$r[luk]).",
                  zw=" .($wg[4]+$r[zw]).",
                  lk=" .($wg[5]+$r[lk]).",
                  kl=" .($wg[6]+$r[kl]).",
                  ck=" .($wg[7]+$r[ck]).",
                  tar=".($wg[8]+$r[tar]).",
                  kat=".($wg[9]+$r[kat]).",
                  sz=" .($wg[11]+$r[sz]);
       $ok=1;

  $zapytanie="UPDATE ws_mobile SET ".$sql_plus;      }  destructor();


}
 $zapytanie.=" WHERE id=$zap;";
if( $ok==1)
 {  // echo $zapytanie;
     connection();
       if(!@mysql_query($zapytanie2))
       {
     destructor();
           connection();
           if(!@mysql_query($zapytanie))
           {
                $string='Nie Uda³o siê Dodaæ Raportu';

           }else{$string='Zaktu³alizowano Raport'; }

       }else{$string='Dodano Nowy Raport';}
     destructor();
//echo $string.': '.$zapytanie.'<br>'.$zapytanie2;
 }
}

    if($_GET['o0']==0){ $zapytanie ="SELECT id,data,pik,mie,axe,luk,zw,lk,kl,ck,tar,kat,ry,sz,typ FROM ws_mobile ";}
elseif($_GET['o0']==1){ $zapytanie ="SELECT id,mur,d_mur,data,pik,mie,axe,luk,zw,lk,kl,ck,tar,kat,ry,sz,status FROM ws_raport ";}



$zapytanie .=" WHERE id=($zap)"; // echo $zapytanie;
}else{exit();}//*/  xy = istnieje
connection();
$wynik = @mysql_query($zapytanie);      $hidd = ' class="hidden"';
if($r = @mysql_fetch_array($wynik))
{
echo'
<TABLE class="main" width="100%">
 <tbody>
  <tr class="row" >
    <th>'.data_z_bazy($r[data]).'</th>';
    $rdata=$r[data];
     if($_GET['o0']==0){
echo'    <td>Typ:</td>
    <td>'.$rodzaje[$r[typ]].'</td>';
}elseif($_GET['o0']==1){
echo'    <td>Status:</td>
    <td>'.$statuss[typ][$r[status]].'</td>';
echo'    <th>Mur lv.';if($r[mur]!=NULL){echo $r[mur].' <i> '.data_z_bazy($r[d_mur]).'</i>';}else{ echo '<b>??</b>';}echo '</Th>';}echo '
   </tr>
  </tbody>
 </TABLE>';
              //
 echo '<TABLE class="main ba" align="center" width="100%"><tbody><tr class="center row"><td width="51">W bazie:</td>';

 if($r[status]!=count($statuss[typ])-1)
 {
 echo '<td'; if($r[pik]==0){echo $hidd;}echo '>'. $r[pik].'</td>';  $woj[0]=$r[pik];
 echo '<td'; if($r[mie]==0){echo $hidd;}echo '>'. $r[mie].'</td>';  $woj[1]=$r[mie];
 echo '<td'; if($r[axe]==0){echo $hidd;}echo '>'. $r[axe].'</td>';  $woj[2]=$r[axe];
 echo '<td'; if($r[luk]==0){echo $hidd;}echo '>'. $r[luk].'</td>';  $woj[3]=$r[luk];
 echo '<td'; if($r[zw] ==0){echo $hidd;}echo '>'. $r[zw].'</td>';   $woj[4]=$r[zw];
 echo '<td'; if($r[lk] ==0){echo $hidd;}echo '>'. $r[lk].'</td>';   $woj[5]=$r[lk];
 echo '<td'; if($r[kl] ==0){echo $hidd;}echo '>'. $r[kl].'</td>';   $woj[6]=$r[kl];
 echo '<td'; if($r[ck] ==0){echo $hidd;}echo '>'. $r[ck].'</td>';   $woj[7]=$r[ck];
 echo '<td'; if($r[tar]==0){echo $hidd;}echo '>'. $r[tar].'</td>';  $woj[8]=$r[tar];
 echo '<td'; if($r[kat]==0){echo $hidd;}echo '>'. $r[kat].'</td>';  $woj[9]=$r[kat];
 echo '<td'; if($r[ry] ==0){echo $hidd;}echo '>'. $r[ry].'</td>';   $woj[10]=$r[ry];
 echo '<td'; if($r[sz] ==0){echo $hidd;}echo '>'. $r[sz].'</td>';   $woj[11]=$r[sz];

 }else{

 echo '<td>¯aden ¿o³nierz nie wróci³ ¿ywy.</td>';
     }
 echo '</tr></tbody></TABLE>';
 $vid= $r[id];

}
else
{
echo'
 <table class="main ba" align="center" width="100%">
  <tbody>
   <tr class="center"><td>brak raportu, wioski niema w bazie</td></tr>
  </tbody>
 </table>';
}
 destructor();
if($data==$rdata)
{
 echo '<table align="center" width="100%">
 <tbody>
  <tr class="center"><th><b>Baza ma Ten Raport.</b></th></tr></tbody></table>';
}else
if($data>$rdata && !($_GET['o0']==0 && $data<$rdata+900 ) )
{
 echo'
 <TABLE class="main" align="center" width="100%">
  <tbody>
    <tr class="center row">
      <td>';
   if($_GET['w']    !=NULL && $_GET['w']    !='')
   {
    echo'<input type="submit" name="sql" value="WSZYSTKO" />';
    echo'<input type="submit" name="sql" value="Wojsko" />';
   }

  if($_GET['o0']==0)
    {echo '<input type="submit" name="sql" value="TylkoTyp" /><select name="typ">'.wpisz_rodzaj($_GET['typ'],$rodzaje).'</select>';}
  else
    {
     if($wm!==NULL){ echo'<input type="submit" name="sql" value="Mur" />'; }
     if($_GET['w'] !=NULL){$status = status(ile_woja($wg[0],$wg[1],$wg[2],$wg[3],$wg[4],$wg[5],$wg[6],$wg[7],$wg[8],$wg[9],$wg[10],$wg[11]));}else{$status = status(NULL); }
  echo '<input type="submit" name="sql" value="Status" />       <select name="typ">'.wpisz_rodzaj($status,$statuss[typ]).'</select>';
     }
 echo'      </td>
    </tr>
  </tbody>
 </table>';
}
else
{
 echo '<table class="main ba" align="center" width="100%">
 <tbody>
  <tr class="center row"><th><b>Baza ma bardziej Aktualne dane. </b>';
 if($_GET['o0']==0 && $data>$rdata ){echo 'Mo¿esz dodac Wojska <input type="submit" name="sql" value="+" />'; }
 if($_GET['o0']==1 && $wm!==NULL && $wm<$r[mur]){ echo' Ale mo¿esz dodac <input type="submit" name="sql" value="Mur" />'; }

echo '</th></tr></tbody></table>';
}
?></div></form></body></html>