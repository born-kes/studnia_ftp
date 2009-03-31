<?
echo $brak_obr.'*************';
/* Okreslenie oczekiwan urzydkownika*/
 if($_GET[kr]==1)
 {
     $f_x=  $w_obr_xy[0];
     $f_y=  $w_obr_xy[1];

     if($brak_obr==1)
     {
     $f_obr = 2;    //Wojsk nie wylapano
     $opis='broniona - brak danych';
     }
 
     else if(count($wojo_obr) >0)
     {
     $f_obr = 1;    //wojska wylapno
$suma_obr = $wojo_obr[1] + $wojo_obr[2] + $wojo_obr[3] + $wojo_obr[4] + ($wojo_obr[5]*2)+ ($wojo_obr[6]*4) +($wojo_obr[7]*5) +($wojo_obr[8]*6)+ ($wojo_obr[9]*5)+ ($wojo_obr[10]*8)+ ($wojo_obr[12]*100) ;
          if($suma_obr > 35000)
          { $opis='BUNKIER';}
          elseif($suma_obr > 3000)
          { $opis='Broniona';}
          elseif($suma_obr < 300)
          { $opis='czysta';}

     }
    else
     {
     $f_obr = 0;    // b³±d uchwytu
     }

//wylapany mur?

     if($nev_mur!=NULL)
     {

      }

//poparcie

//$poparcie

//znikajace wojsko

     if(count($wojo_kasacja) >0)
     {
     $f_widmo = 1;
     }
     else
     {
     $f_widmo = 0;
     }

  }

 if($_GET[kr]==2)
 {
     $f_x=  $w_agr_xy[0];
     $f_y=  $w_agr_xy[1];

     if(count($wojo_agr) >=0)
{
$f_agr=1;     //wojska wylapno
}
else
    {
$f_agr=0;    // blad uchwytu
    }
 }
// typ
$f_typ = $_POST[typ];


?>