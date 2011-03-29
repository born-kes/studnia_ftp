<?PHP
if($data=$r[data]){                          //raport istnieje   $r[10]
    // $da="'".$data."'";	                      //data
     $off = $r[axe]+($r[lk]*4)+ ($r[kl]*5)+ ($r[tar]*5)+ ($r[kat]*6);
     $def= $r[pik]+$r[mie]+$r[luk]+($r[ck]*6);
     $zw= $r[zw];
    $warunek = false;
  if($def!=Null){
               if($def>20000)//sumuje wojsa def. w wiosce
                   { $warunek =11;        // ilo¶æ zagród
                    $str=$def=intval($def/20000);
                    $txt=$k_txt_cz;

 //            if($def<10){$str=$def;$txt=$k_txt_cz;}//15
 //                   else{$str=$def;$txt=$k_txt_cz;}//13
                    }
               else{  $warunek =16;       // % zagrody
                    $str=$def=intval($def/2000).'0%';
                    $txt=$k_txt;
                    }
               }
 elseif($data!=null){
      if($r[status]==7){  $warunek =16;         // % zagrody
                    $str=$def=' x ';
                    $txt=$k_txt_cz;
         }else
      if($r[status]==1 && $off>10){$warunek =16;         // zagroda pusta ale jest of
                    $str=$off=intval($off/1800).'0%';
                    $txt=$k_txt_20;//13
         }else
      if($r[status]==1 && $off<10){$warunek =16;         // Wioska Pusta niema off
                    $str=$def='XXX';
                    $txt=$k_txt;//13
                    }
  $def='0';
  }
  if($warunek)
 { $wys = 36;
  for($i=1 ;$i<9; $i++)   { ImageRectangle($dest,19+$x_0,$y_0+$wys-- ,$warunek*2+$x_0+5 ,$wys+$y_0,$k_txt_sz);}
                            ImageRectangle($dest,17+$x_0,28+$y_0     ,$warunek*2+$x_0+5   ,37+$y_0,$k_txt_cz);

 }ImageString($dest,0, 20+$x_0 ,29+$y_0 ,$str ,$txt);

                                           //sumuje wojsko - off
  if($def!=Null){
               if($def>20000){$def=intval($def/20000);}
               else{$def='0'.intval($def/1800);}
                }
  elseif($data!=null){$def=0;}
  elseif($data==null){$def=' ';}
                                                           //sumuje wojsko - zw
  if($zw!=Null){
                if($zw>999){  $zw=intval($zw/1000);
                    ImageString($dest,0,42+$x_0,30+$y_0,$zw,$k_txt_sz);
                 }
                 elseif($zw>5){$zw='0'.intval($zw/100);
                    ImageString($dest,0,40+$x_0,30+$y_0,$zw,$k_txt_sz);
                  }
                }    //*/

}
?>