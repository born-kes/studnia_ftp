<?php  include('../connection.php');
function aut($s){return (int)$s;}
function ifs($s){ if($s!=null)return ', '; else return ''; }
function td($s,$w=''){
     if($s==0)
       $hidd = ' class="hidden"';
     else
       $hidd = '';
     return '<td'.$hidd.$w.'>'.$s.'</td>';
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
       $sql.=ifs($sql)." data=".$data;
    }

 $wg = $sql_all = null;
    if( $_GET['w'] !=NULL && $_GET['w'] != '' && $_GET['w'] != 'undefined' ){
     $wg = explode(",",$_GET['w']);
     $sql_all=" pik=".aut($wg[0]).",
                mie=".aut($wg[1]).",
                axe=".aut($wg[2]).",
                luk=".aut($wg[3]).",
                zw=".aut($wg[4]).",
                lk=".aut($wg[5]).",
                kl=".aut($wg[6]).",
                ck=".aut($wg[7]).",
                tar=".aut($wg[8]).",
                kat=".aut($wg[9]).",
                ry=".aut($wg[10]).",
                sz=".aut($wg[11])." ";
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
    if( is_array($wg) )
       $status = status(ile_woja(aut($wg[0]), aut($wg[1]), aut($wg[2]), aut($wg[3]),aut($wg[4]), aut($wg[5]), aut($wg[6]), aut($wg[7]), aut($wg[8]), aut($wg[9]), aut($wg[10]), aut($wg[11])));

}
// WSPULNE
   $sql .= (is_array($wg) ? ifs($sql).$sql_all : '');

  if($_SESSION['id']!=null && $_SESSION['id']!=0 && $sql!=null)
    $sql.=ifs($sql)." player=".$_SESSION['id'];


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

  $ok=0;
    if( $zapytanie!=null && $sql!=null){  $ok=1;
       if($status!=null){
          if($wioskaIstnieje){
             if($status==7 && $r[status]<7 ){ // nowy raport jest bunkier
               if( aut($_GET[zw])>($r[zw]*2) )
                  $sql.=ifs($sql)." status=".$status ;
             }else
                  $sql.=ifs($sql)." status=".$status ;
          }elseif(!$wioskaIstnieje)
                $sql.=ifs($sql)." status=".$status ;
       }
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