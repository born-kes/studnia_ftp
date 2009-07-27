<?PHP
##########################
# Raportowanie wy³apania #
##########################

  if($data != NULL)
  { //data ok
     if($agresor != NULL)
     {//$agresor ok
        if($w_agr!= NULL)
        { // wioska agresora ok
           $st_r=strrpos($w_agr, "|");
           $w_agr_xy =explode("|", substr($w_agr , $st_r-3 , 7 ));
        }
        if($str_agr!= NULL)
        {
           $str_agr_explod=explode(" ",$str_agr);
        }
        if($ile_agr!= NULL)
        {
           $ile_agr_explod=explode(" ",$ile_agr);
        }
       for($j=0; $j<13; $j++)
       {
          $wojo_agr[$j] =  $ile_agr_explod[$j]-$str_agr_explod[$j];
       }
         if(count($wojo_agr) >0)
         {
         }
      }
      if($obronca != NULL)
      {// obronca ok
         if($w_obr!= NULL)
         { // wioska obrncy ok
            $st_r=strrpos($w_obr, "|");
            $w_obr_xy =explode("|", substr($w_obr , $st_r-3 , 7 ));
         }
         if($brak_obr==1)
         { // wioska obrncy ok
         }else
         {
            if($str_obr!= NULL)
            { // wioska obrncy ok
               $str_obr_explod=explode(" ",$str_obr);
            }
            if($ile_obr!= NULL)
            { // wioska obrncy ok
               $ilo_obr_explod = explode(" ","$ile_obr");
            }
         for($j=0; $j<13; $j++)
            {
               $wojo_obr[$j] =  $ilo_obr_explod[$j]-$str_obr_explod[$j];
            }
         }
      }
      if($Szpiegostwo=='Szpiegostwo')
      {
      }
      if($nev_mur!=NULL)
      {
      // ustalono mur
      }
  elseif($Szpiegostwo=='Szpiegostwo' && $nev_mur==NULL)
      {
         $nev_mur=0;
      }
      if(count($wojo_kasacja) >0)
      {             /*wojsko zniklo w jakiejsc wiosce */
          for($l=0; $l<=count($wojo_kasacja); $l++)
	     {
                $widmo[$l]=explode(" ",$wojo_kasacja[$l]);
                $widmo_gdzie[$l]=explode("|",substr($widmo[$l][0], strrpos($widmo[$l][0], "|")-3 , 7 ));
	     }
       }
       if($poparcie !=NULL)
       {
       }
  }
  
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
elseif(count($wojo_obr) >0)
    {
       $f_obr = 1;    //wojska wylapno
       $suma_obr = ile_woja($wojo_obr[1],$wojo_obr[2],$wojo_obr[3],$wojo_obr[4],$wojo_obr[5],$wojo_obr[6],$wojo_obr[7],$wojo_obr[8],$wojo_obr[9],$wojo_obr[10],$wojo_obr[12]) ;
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
    if($nev_mur!=NULL)
    {
    }
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
$f_typ = $_POST[typ];
?>