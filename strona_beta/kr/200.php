<?PHP

/* raport */
         $raport='';
  if($data != NULL)
  { //data ok
                                                                $raport.=' data istnieje
                                                                ';
     if($agresor != NULL)
      {//$agresor ok

              if($w_agr!= NULL){ // wioska agresora ok
                                                                $raport.=' wioska agresora istnieje
                                                                ';
                        $st_r=strrpos($w_agr, "|");
                        $w_agr_xy =explode("|", substr($w_agr , $st_r-3 , 7 ));
                               }
              if($str_agr!= NULL){
 $str_agr_explod=explode(" ",$str_agr);
                                 }

              if($ile_agr!= NULL){
 $ile_agr_explod=explode(" ",$ile_agr);
                                 }

       for($j=0; $j<13; $j++){
  $wojo_agr[$j] =  $ile_agr_explod[$j]-$str_agr_explod[$j];
                              }
            if(count($wojo_agr) >0)
            {
                                                                            $raport.=' policzono wojsko agresora
                                                                            ';
             }
      }

     if($obronca != NULL)
     {// obronca ok

               if($w_obr!= NULL){ // wioska obrncy ok
                                                                          $raport.=' obroncz istnieje
                                                                            ';
                        $st_r=strrpos($w_obr, "|");
                        $w_obr_xy =explode("|", substr($w_obr , $st_r-3 , 7 ));
                               }

               if($brak_obr==1)
               { // wioska obrncy ok
                                             $raport.='brak info o obroncy';
                 }else{

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
                  $raport.=' szpiegowano
                  ';      //wyszpiegowano co¶
                 }

     if($nev_mur!=NULL)
      {
                            $raport.='znaleziono mur
                            ';
     // ustalono mur
     }
     elseif($Szpiegostwo=='Szpiegostwo' && $nev_mur==NULL)
     {                                      $raport.='mur musi byæ na 0 bo szpiegowano i niema info
                                             ';
      $nev_mur=0;
      }

     if(count($wojo_kasacja) >0)
        {
     /*wojsko zniklo w jakiejsc wiosce */     $raport.='wioska zajeta i wojsko zniklo
                                              ';
            for($l=0; $l<=count($wojo_kasacja); $l++)
	        {
                $widmo[$l]=explode(" ",$wojo_kasacja[$l]);
                $widmo_gdzie[$l]=explode("|",substr($widmo[$l][0], strrpos($widmo[$l][0], "|")-3 , 7 ));
		 }
         }

     if($poparcie !=NULL)
                  {
                                               $raport.='poparcie spadlo
                                               ';
     // popracie spadlo
                   }
  }


?>