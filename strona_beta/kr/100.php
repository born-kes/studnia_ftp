<?php

                         $txt2=$_POST[query];
                         $txt1 = str_replace('	',' ', $txt2);
                         $txt = str_replace('  ', ' ', $txt1);
                         
                         $tablica = explode("\n", $txt);
                         
                        
?>