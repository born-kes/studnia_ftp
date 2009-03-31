<?
       $h=0;
 /*pêtla*/
 for($i=0; $i<=count($tablica); $i++){
  if(strpos($tablica[$i], ":" )>0 ){
            
        if(strpos($tablica[$i], "Wys")!== false && $data==NULL && $i<4)
        {

              $data=explode(" ",$tablica[$i]);
              $nev_data=explode(".",$data[1]);
        }
        
            
        if(strpos($tablica[$i], "Agresor")!== false && $agresor==NULL )
        {                 
              $agresor= $tablica[$i];
        }
    elseif($agresor!=NULL )
        {
              if(strpos($tablica[$i], "|")!== false && $w_agr==NULL)
              {
                     $w_agr=$tablica[$i];
              }

              if(strpos($tablica[$i], "Straty")!== false && $str_agr==NULL)
              {
                      $str_agr=$tablica[$i];
              }

              if(strpos($tablica[$i], "Ilo")!== false && $ile_agr==NULL)
               {
                      $ile_agr=$tablica[$i];
               }
          }

          if(strpos($tablica[$i], "Obro")!== false && $obronca==NULL )
          {
               $obronca= $tablica[$i];
          }
      elseif( $obronca!=NULL )
          {
               if(strpos($tablica[$i], "|")!== false && $w_obr==NULL )
               {
 /* obronca */         $w_obr=$tablica[$i];
                }
                 
             if ($brak_obr!=1)
                 {
                       if(strpos($tablica[$i], "Straty")!== false && $str_obr==NULL )
                       {
                                  $str_obr=$tablica[$i];
                        }

                       if(strpos($tablica[$i], "Ilo")!== false  && $ile_obr==NULL )
                       {
                                  $ile_obr=$tablica[$i];
                       }
                  }

           }
                 
           if(strpos($tablica[$i], "Budynki")!== false && $Szpiegostwo==NULL )
            {
                   $Szpiegostwo='Szpiegostwo';
            }


             
             if ($i>19 && strpos($tablica[$i], "|")!== false )
             {
                           $wojo_kasacja[$h++]=$tablica[$i];
             }
                     
             if ($i>19 && strpos($tablica[$i], "Poparcie spad")!== false && $poparcie )
             {
                          $poparcie=substar($tablica[$i], -3);
             }
   } //koniec if :
            if($brak_obr==NULL && strpos($tablica[$i], "adnych informacji o wielko")!== false )
                        {
                                $brak_obr=1;
                         }

           if(strpos($tablica[$i], "Mur")!== false && $nev_mur==NULL )
            {
/* ustala mur */
                   if(strpos($tablica[$i],"obronny")!== false)
                   {
                          $nev_mur=intval(substr($tablica[$i],strrpos($tablica[$i]," ")));
                   }
                elseif(strpos($tablica[$i],"uszkodzony")!== false)
                   {
                           $nev_mur=substr($tablica[$i],strrpos($tablica[$i]," "));
                   }
             } 
 } // koniec for


/*  wykrywa
    jesli :
       data => ciag
       $agresor => ciag
         $w_agr
         $str_agr
         $ile_agr

       $obronca
               $w_obr
               $brak_obr = 'brak'
               //
               $str_obr
               $ile_obr

      $Szpiegostwo='Szpiegostwo'

      $nev_mur= intval

      $wojo_kasacja[$h++] = ciag

      $poparcie = intval

     */
?>