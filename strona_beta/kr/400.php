<?PHP

//    ZAPYTANIE FINA£OWE

$Zap="UPDATE village SET ";
$p=' , ';
if($_POST[z_nic]==2){
 $z_typ =1 ;
 $z_dat =1 ;
 $z_mur =1 ;
 $z_wor =1 ;
 $z_opis=1 ;        }
if($_POST[z_nic]==1)        {
 $z_typ =$_POST[z_typ] ;
 $z_dat =$_POST[z_data] ;
 $z_mur =$_POST[z_mur] ;
 $z_wor =$_POST[z_wor] ;
 $z_opis=$_POST[z_opis] ;    }
 
if($_POST[x]!=NULL && $_POST[y]!=NULL && $_POST[z_nic]!= 0 )
 {

     if($_POST[data]!=NULL && $_POST[data]!=' ' && $_POST[data]!='--' &&  $z_dat ==1 )
       {
           $Zap.="data='". $_POST[data]."'".$p;
       }
    else
       {
       $Zap.="`data`=NULL ".$p;
       }

    if($z_typ==1)
      {
           if($_POST[typ]!=NULL &&  $_POST[typ]!=0)	
            {
             $Zap.=" `typ`= ".$_POST[typ].$p;
            }
        elseif($_POST[typ]!=NULL)
            {
             $Zap.=" `typ`=NULL ".$p;
            }
      } //  typ
      
   if($z_mur==1)
       {
          if($_POST[mur]!=NULL && $_POST[mur]!=' ' && $_GET[kr]==1 )	
             {
                 $Zap.=" `mur`= ". $_POST[mur].$p;
             }
         elseif($_GET[kr]==1 )
             {
                 $Zap.=" `mur`=NULL ".$p;
             }
       } //  mur
      
      
if($z_wor==1)
             {
    if($_POST[pik]!=NULL &&  $_POST[pik]!=0)	{$Zap.="pik= ". $_POST[pik].$p;}elseif($_POST[pik]!==NULL )	{$Zap.="`pik`=NULL ".$p; }
    if($_POST[mie]!=NULL &&  $_POST[mie]!=0)	{$Zap.="mie= ". $_POST[mie].$p;}elseif($_POST[mie]!==NULL )	{$Zap.="`mie`=NULL ".$p; }
    if($_POST[axe]!=NULL &&  $_POST[axe]!=0)	{$Zap.="axe= ". $_POST[axe].$p;}elseif($_POST[axe]!==NULL )	{$Zap.="`axe`=NULL ".$p; }
    if($_POST[luk]!=NULL &&  $_POST[luk]!=0)	{$Zap.="luk= ". $_POST[luk].$p;}elseif($_POST[luk]!==NULL )	{$Zap.="`luk`=NULL ".$p; }
    if($_POST[zw] !=NULL &&  $_POST[zw] !=0)	{$Zap.=" zw= ". $_POST[zw].$p; }elseif($_POST[zw] !==NULL ) 	{$Zap.=" `zw`=NULL ".$p; }
    if($_POST[lk] !=NULL &&  $_POST[lk] !=0)	{$Zap.=" lk= ". $_POST[lk].$p; }elseif($_POST[lk] !==NULL )	{$Zap.=" `lk`=NULL ".$p; }
    if($_POST[kl] !=NULL &&  $_POST[kl] !=0)	{$Zap.=" kl= ". $_POST[kl].$p; }elseif($_POST[kl] !==NULL )	{$Zap.=" `kl`=NULL ".$p; }
    if($_POST[ck] !=NULL &&  $_POST[ck] !=0)	{$Zap.=" ck= ". $_POST[ck].$p; }elseif($_POST[ck] !==NULL )	{$Zap.=" `ck`=NULL ".$p; }
    if($_POST[tar]!=NULL &&  $_POST[tar]!=0)	{$Zap.="tar= ". $_POST[tar].$p;}elseif($_POST[tar]!==NULL )	{$Zap.="`tar`=NULL ".$p; }
    if($_POST[kat]!=NULL &&  $_POST[kat]!=0)	{$Zap.="kat= ". $_POST[kat].$p;}elseif($_POST[kat]!==NULL )	{$Zap.="`kat`=NULL ".$p; }
    if($_POST[ry] !=NULL &&  $_POST[ry] !=0)	{$Zap.=" ry= ". $_POST[ry].$p; }elseif($_POST[ry] !==NULL )	{$Zap.=" `ry`=NULL ".$p; }
    if($_POST[sz] !=NULL &&  $_POST[sz] !=0)	{$Zap.=" sz= ". $_POST[sz].$p; }elseif($_POST[sz] !==NULL)	{$Zap.=" `sz`=NULL ".$p; }
                }  //

 if($z_opis==1)
    {
    if($_POST[opis]!=NULL && $_POST[opis]!=' ')
         {
              $Zap.=" `opis`='". $_POST[opis]."'".$p;
         }
      elseif($_POST[opis]!=NULL)
         {
              $Zap.=" `opis`=NULL ".$p;
         }
    } //
$Zap=substr($Zap,0,-2);
$Zap.=" Where x=$_POST[x] AND y=$_POST[y]";

connection();
$zmiana = mysql_query($Zap) or die ('zapytanie bledne');
if($_POST[z_nic]==2){echo ' <h1>Raport Zapisany</h1> ';}
if($_POST[z_nic]==1){echo ' <h1>Zmiany zapisane</h1> ';}
if($_POST[z_nic]==0){echo ' <h1>Nic nie zapisano</h1> ';}
destructor();
  }  // tworzenie zapytania

?>