<?PHP
//imagecopy($dest, $flaga , 24, 29, 0, 0, 12,10);//of
//imagecopy($dest, $flaga , 36, 29, 0, 0, 12,10);//zw



if($data=$r[data]){                          //raport istnieje   $r[10]
    // $da="'".$data."'";	                      //data
    // $off = $r[axe]+($r[lk]*4)+ ($r[kl]*5)+ ($r[tar]*5)+ ($r[kat]*6);
     $def= $r[pik]+$r[mie]+$r[luk]+($r[ck]*6);
     $zw= $r[zw];
 if($def!=Null){
               if($def>18000)//sumuje wojsa def. w wiosce
                   {         // ilo¶æ zagród
                    $flaga =  imagecreatefromgif("m.gif");
                     imagecopy($dest, $flaga , 12, 29, 0, 0, 12,10);
                    $k_txt = ImageColorAllocate($dest,0,0,0);
                    $def=intval($def/18000);
             if($def<10){ImageString($dest,0,15,30,$def,$k_txt);}
                    else{ImageString($dest,0,13,30,$def,$k_txt);}
                    } 
               else{         // % zagrody
                    $flaga =  imagecreatefromgif("dan.gif");
                     imagecopy($dest, $flaga , 12, 29, 0, 0, 17,10);
                    $k_txt = ImageColorAllocate($dest,204,0,0);
                    $def=intval($def/1900).'0%';
                    ImageString($dest,0,13,30,$def,$k_txt);
                    }
               }
  elseif($data!=null){$def='0';}elseif($data==null){$def=' ';}
  

                                           //sumuje wojsko - off
  if($off!=Null){
               if($off>18000){$off=intval($off/18000);}
               else{$off='0'.intval($off/1800);}}
  elseif($data!=null){$off=0;}elseif($data==null){$off=' ';}
                                                           
  if($def!=Null){
               if($def>18000){$def=intval($def/18000);}
               else{$def='0'.intval($def/1800);}}
  elseif($data!=null){$def=0;}elseif($data==null){$def=' ';}
                                                            //sumuje wojsko - zw
  if($zw!=Null){
                if($zw>999){$zw=intval($zw/1000);
                    $k_txt = ImageColorAllocate($dest,204,200,200);
                    ImageString($dest,0,40,30,$zw,$k_txt);
                 }
                 elseif($zw>5){$zw='0'.intval($zw/100);
                   $k_txt = ImageColorAllocate($dest,204,200,200);
                    ImageString($dest,0,40,30,$zw,$k_txt);
                  }
              }


}
?>