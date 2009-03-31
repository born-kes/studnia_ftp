<?PHP
###################
# Pobranie danych #
###################
echo'<table border="1" cellspacing="1" cellpadding="2" bgcolor="#FFCC66" align="center">';
     if($_GET[kr]==1){echo'<caption>Konwerter raportów Wojennych z Ataków i Zwiadu</caption>';}
else if($_GET[kr]==2){echo'<caption>Konwerter raportów Wojennych z Obrony</caption>';}


echo'<TR><TD  align="center" colspan="2">
<form action="?kr='.$_GET[kr].'&krs=1" method="POST">
<textarea id="query" name="query" onclick="highlight(this);" rows="12" cols="64"></textarea></TD></TR>	
<TR><TD><b>J</b>aki <b>T</b>yp wioski podejrzewasz ?
</td><td>';
?>
<input type="radio" id="typ" name="typ" value="1">off
<input type="radio" id="typ" name="typ" value="2">def
<input type="radio" id="typ" name="typ" value="3">zw
<input type="radio" id="typ" name="typ" value="4">lk
<input type="radio" id="typ" name="typ" value="5">ck
<input type="radio" id="typ" name="typ" value="6">nowa
</td></tr>
<TR><TD align="center" colspan="2"><input type="submit" value="Konwertuj" style="margin-top: 5px;"/>
		</div></form>
	</TD></TR></table></body></html>

<?php       $txt2=$_POST[query];           $txt1 = str_replace('	',' ', $txt2);
            $txt = str_replace('  ', ' ', $txt1);      $tablica = explode("\n", $txt);

 /*pêtla*/  $h=0;
 for($i=0; $i<=count($tablica); $i++)
 {
  if(strpos($tablica[$i], ":" )>0 )
  {
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
 /* obronca */       $w_obr=$tablica[$i];
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
?>