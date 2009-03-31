<?PHP
 if($_GET[kr]==1){

if($nev_mur!=NULL){
echo'<Th>'.$nev_mur.'		<input type="hidden" name="mur" value="'.$nev_mur.'">	</Th>';
                  }else{echo'<Th></Th>';}


if($f_obr==1){
echo'
<Th>'.$wojo_obr[1].'		<input type="hidden" name="pik" value="'.$wojo_obr[1].'"></Th>
<Th>'.$wojo_obr[2].'		<input type="hidden" name="mie" value="'.$wojo_obr[2].'"></Th>
<Th>'.$wojo_obr[3].'		<input type="hidden" name="axe" value="'.$wojo_obr[3].'"></Th>
<Th>'.$wojo_obr[4].'		<input type="hidden" name="luk" value="'.$wojo_obr[4].'"></Th>
<Th>'.$wojo_obr[5].'		<input type="hidden" name="zw" value="'.$wojo_obr[5].'"></Th>
<Th>'.$wojo_obr[6].'		<input type="hidden" name="lk" value="'.$wojo_obr[6].'"></Th>
<Th>'.$wojo_obr[7].'		<input type="hidden" name="kl" value="'.$wojo_obr[7].'"></Th>
<Th>'.$wojo_obr[8].'		<input type="hidden" name="ck" value="'.$wojo_obr[8].'"></Th>
<Th>'.$wojo_obr[9].'		<input type="hidden" name="tar" value="'.$wojo_obr[9].'"></Th>
<Th>'.$wojo_obr[10].'		<input type="hidden" name="kat" value="'.$wojo_obr[10].'"></Th>
<Th>'.$wojo_obr[11].'		<input type="hidden" name="ry" value="'.$wojo_obr[11].'"></Th>
<Th>'.$wojo_obr[12].'		<input type="hidden" name="sz" value="'.$wojo_obr[12].'"></Th> ';
            }
elseif($f_obr==2){
echo'<Th colspan="12" > Zaden zolnierz nie wrocil zywy.</Th>';

                  }
elseif($f_obr==0){echo'<Th colspan="12" > blad uchwytu</Th>';}
                }
 if($_GET[kr]==2){


echo'<Th></Th>';//mur w off nie zmieniam


if($f_agr==1){
echo'
<Th>';if($wojo_agr[1]>0){echo $wojo_agr[1].'<input type="hidden" name="pik" value="'.$wojo_agr[1].'">';}  echo'</Th>
<Th>';if($wojo_agr[2]>0){echo $wojo_agr[2].'<input type="hidden" name="mie" value="'.$wojo_agr[2].'">';}  echo'</Th>
<Th>';if($wojo_agr[3]>0){echo $wojo_agr[3].'<input type="hidden" name="axe" value="'.$wojo_agr[3].'">';}  echo'</Th>
<Th>';if($wojo_agr[4]>0){echo $wojo_agr[4].'<input type="hidden" name="luk" value="'.$wojo_agr[4].'">';}  echo'</Th>
<Th>';if($wojo_agr[5]>0){echo $wojo_agr[5].'<input type="hidden" name="zw" value="'.$wojo_agr[5].'">';}   echo'</Th>
<Th>';if($wojo_agr[6]>0){echo $wojo_agr[6].'<input type="hidden" name="lk" value="'.$wojo_agr[6].'">';}   echo'</Th>
<Th>';if($wojo_agr[7]>0){echo $wojo_agr[7].'<input type="hidden" name="kl" value="'.$wojo_agr[7].'">';}   echo'</Th>
<Th>';if($wojo_agr[8]>0){echo $wojo_agr[8].'<input type="hidden" name="ck" value="'.$wojo_agr[8].'">';}   echo'</Th>
<Th>';if($wojo_agr[9]>0){echo $wojo_agr[9].'<input type="hidden" name="tar" value="'.$wojo_agr[9].'">';}  echo'</Th>
<Th>';if($wojo_agr[10]>0){echo $wojo_agr[10].'<input type="hidden" name="kat" value="'.$wojo_agr[10].'">';}echo'</Th>
<Th>';if($wojo_agr[11]>0){echo $wojo_agr[11].'<input type="hidden" name="ry" value="'.$wojo_agr[11].'">';} echo'</Th>
<Th>';if($wojo_agr[12]>0){echo $wojo_agr[12].'<input type="hidden" name="sz" value="'.$wojo_agr[12].'">';} echo'</Th> ';
            }
elseif($f_agr==0){
echo'<Th colspan="12" > blad uchwytu.</Th>';

                  }

                }


echo '<Th style="" id="info_opi_on">'.$opis.'
<a href="javascript:editToggle(\'info_opi_on\' , \'info_opi_off\')"><img src="img/rename.png" alt="zmieñ opis" title="zmieñ opis"></a>
</th>
<th style="display: none;" id="info_opi_off">
<input value="'.$opis.'" name="opis" type="tekst" size="15">
</td></tr>';
?>