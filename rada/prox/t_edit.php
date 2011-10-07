<?  include_once('../../connection.php');
$id = $_GET[g];

 // zmiana adresu
 if($_GET[url]!=NULL)
   {     $qest="SELECT COUNT(*) FROM `list_proxi` Where name='$_GET[url]' AND id!=$id AND status!=1";
         $ruls = false;
         connection();$qest_w = mysql_query($qest);
          if($row = @mysql_fetch_array($qest_w))
           {if($row[0]==0)$ruls = true;  }
         destructor();
if(!$ruls){$Raport = 'Adres juz jest Zajety';}else{

              if($zap==NULL){ $zap="UPDATE list_proxi SET ";}else $zap.=' , ';

 $zap.=" name = '$_GET[url]' ";           }

    }
 if($_GET[ip]!=NULL)
  {$qest="SELECT COUNT(*) FROM `list_proxi` Where name='$_GET[url]' AND id!=$id AND status!=1";
         $ruls = false;
         connection();$qest_w = mysql_query($qest);
          if($row = @mysql_fetch_array($qest_w))
           {if($row[0]==0)$ruls = true;  }
         destructor();
if(!$ruls){$Raport = 'IP ju¿ jest Zajete';}else{
              if($zap==NULL){ $zap="UPDATE list_proxi SET ";}else $zap.=' , ';

 $zap.=" ip= '$_GET[ip]' ";                }
  }
 if($_GET[status]!=NULL)
  {              if($zap==NULL){ $zap="UPDATE list_proxi SET ";}else $zap.=' , ';

 $zap.=" status = '$_GET[status]' ";
  }

if($zap!=NULL){    $zap.=" Where id='$id'" ;}else{echo '<br>Pusto';}

//$zap="SELECT ip FROM `list_proxi` Where id=!'$pos_id' AND ip = $pos_ip";


connection();if(mysql_query($zap)){$Raport = 'Zapisano Zmiany';}  destructor();
 include_once('t.php');
?>