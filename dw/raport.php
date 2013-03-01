<?php  include('../connection.php');
function ifs($s){ if($s!=null)return ', '; else return ''; }
function td($s,$w=''){
     if($s==0)
       $hidd = ' class="hidden"';
     else
       $hidd = '';
     return '<td'.$hidd.$w.'>'.$s.'</td>';
}
function dzialaniaNaTablicach($tablica1,$tablica2,$tablica3){
  if(count($tablica1)==count($tablica2)&&count($tablica2)==count($tablica3)){
     for($i=0; $i<count($tablica1); $i++){
      $sumaTablicy[$i] = autPlus(($tablica1[$i]-$tablica2[$i])+$tablica3[$i]);
     }
     return $sumaTablicy;
  }else{
      return $tablica3;
  }
}
function sqlAll($wg){
         if(count($wg)==12)
     $sql_all=" pik=".autPlus($wg[0]).",
                mie=".autPlus($wg[1]).",
                axe=".autPlus($wg[2]).",
                luk=".autPlus($wg[3]).",
                zw=".autPlus($wg[4]).",
                lk=".autPlus($wg[5]).",
                kl=".autPlus($wg[6]).",
                ck=".autPlus($wg[7]).",
                tar=".autPlus($wg[8]).",
                kat=".autPlus($wg[9]).",
                ry=".autPlus($wg[10]).",
                sz=".autPlus($wg[11])." ";
                
return $sql_all;
}
function autPlus($s){$s=aut($s);
if($s<0)return 0; else return $s;
}
$idWsi=NULL;
$wioskaIstnieje=false;
$sql='';

       /* Raport z ataku albo obrony */
$obrona=false;
$atak = false;
    if($_GET['o0']==0){
      $atak = true;
     $zapytanie ="SELECT id,data,pik,mie,axe,luk,zw,lk,kl,ck,tar,kat,ry,sz,typ FROM ws_mobile ";
    }
    else if($_GET['o0']==1){
     $obrona=true;
     $zapytanie ="SELECT id,mur,d_mur,data,pik,mie,axe,luk,zw,lk,kl,ck,tar,kat,ry,sz,status FROM ws_raport ";
    }

$data=null;
    if($_GET['data'] !=NULL){
       $data = aut(mkczas_pl($_GET['data'])-$godzina_zero);
    }

 $wg = $sql_all = null;
    if( $_GET['w'] !=NULL && $_GET['w'] != '' && $_GET['w'] != 'undefined' ){
     $wg = explode(",",$_GET['w']);
      // $sql do function
      if( $_GET['w0'] !=NULL && $_GET['w0'] != '' && $_GET['w0'] != 'undefined' ){
                $w0 = explode(",",$_GET['w0']);

          }

     }

// ATAK
if($atak){
     /* Typ dla ataku */
    if( $_GET['typ']!=NULL ){
     $sql.=ifs($sql)." typ=".aut($_GET['typ']);
    }
}
// OBRONA
if($obrona){
          /* MUR */
    if($_GET['Mur']  !=NULL && $_GET['Mur']!='undefined'){
       $sql.=ifs($sql)." mur=".aut($_GET['Mur']);
       if($data!=NULL)
          $sql.=ifs($sql)." d_mur=".$data;
    }
$status=null;
    if( is_array($wg) && count($wg)==12 )
       $status = status(ile_woja(aut($wg[0]), aut($wg[1]), aut($wg[2]), aut($wg[3]),aut($wg[4]), aut($wg[5]), aut($wg[6]), aut($wg[7]), aut($wg[8]), aut($wg[9]), aut($wg[10]), aut($wg[11])));
    else $status=7;

$sql_all = sqlAll($wg);
   if($sql_all!=null )
   $sql .= ifs($sql).$sql_all;

}
// WSPULNE

   // sql_all przeniesione

     /* Pobieranie Id Wioski która opracowuje */
    if($_GET['xy']   !=NULL && $_GET['id'] ==NULL ){
       $xy = explode("|,",($_GET['xy']));
       $zap ="SELECT id FROM `ws_all` WHERE x=".aut($xy[0])." AND y=".aut($xy[1])."";  // echo $zap;

       connection();
        $wynik = @mysql_query($zap);
         if($r = @mysql_fetch_array($wynik)){
            $idWsi=$r[id];
            $zapytanie .=" WHERE id=".$r[id].' limit 1;';
         }else{
            echo 'Niema takiej wioski'; exit();
         }
    }else if($_GET['id'] !=NULL && $_GET['id']!=0){
       $idWsi= aut($_GET['id']);
        $zapytanie .=" WHERE id=".$idWsi.' limit 1;';
        connection();
    }

    // Mamy ID WIOSKI
if($data>mktime()-$godzina_zero+120){
     $string='Data nie moze byc z przyszlosci '.$data.' > '.mktime().' '.$mkczas;
}elseif($idWsi==null)
     $string = 'ERROR: Brak ID Wioski, zmiana niemozliwa';
else{
       $wynik = @mysql_query($zapytanie);
         if($r = @mysql_fetch_array($wynik)){
             $wioskaIstnieje=true;
            if($atak)
               $zapytanie = "UPDATE ws_mobile SET ";
            if($obrona){
               $zapytanie = "UPDATE ws_raport SET ";
             }
         }else{
            if($atak)
               $zapytanie = "INSERT INTO ws_mobile SET id=".$idWsi." , ";
            if($obrona)
               $zapytanie = "INSERT INTO ws_raport SET id=".$idWsi." , ";

         }
if($r[data]<$data && $idWsi != null ){

      if($status!=null && $obrona){
          if($wioskaIstnieje && $status==7 ){
               if( $r[status]<=7){
                  if( aut($_GET[zw])+1 > aut($r[zw]*2) )
                  $sql.=ifs($sql)." status=".$status.', zw='.( (aut($_GET[zw])+1) *2);
                  //else
                    // stary raport mowi ze zwiadu jest wiecej
              }//else
                 // $sql.=ifs($sql)." status=".$status ;
          }elseif(!$wioskaIstnieje && $status==7 ){           $str='niema mnie';
                $sql.=ifs($sql)." status=".$status.', zw='.( (aut($_GET[zw])+1) *2);}
          else
                $sql.=ifs($sql)." status=".$status;
       }else if($atak){ $tablicaZBazy = array($r[pik],$r[mie],$r[axe],$r[luk],$r[zw],$r[lk],$r[kl],$r[ck],$r[tar],$r[kat],$r[ry],$r[sz]);
                $tablicaWojskAgresora = dzialaniaNaTablicach($tablicaZBazy,$w0,$wg);
                 $sql .= ifs($sql).sqlAll($tablicaWojskAgresora);

       }


  $ok=0;
    if( $zapytanie!=null && $sql!=null){  $ok=1;
                $sql.=ifs($sql)." data=".$data;
           if($_SESSION['id']!=null && $_SESSION['id']!=0 && $sql!=null)
                $sql.=ifs($sql)." player=".$_SESSION['id'];

       $zapytanie.= $sql;
         if($wioskaIstnieje)
           $zapytanie.=" Where id=".$idWsi;
    }

    if( $ok==1){ // echo '<br>'.$zapytanie ;  /* $wioskaIstnieje;*/

//    connection();
      if(!@mysql_query($zapytanie))
         $string='Nie Udalo sie Dodac Raportu';
      else
         $string='Zapisano Zmiane';
    }else
         $string='Nie zapisano zmian';
  destructor();

  }else if($r[data]==$data){
    destructor();
     $string='Mamy juz ten raport';
  }else{
    destructor();
     $string='Jest bardziej aktualny raport';
  }
}

include("html/raport.php");


?>