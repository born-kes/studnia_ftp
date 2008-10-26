<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<HTML>
<link rel="stylesheet" type="text/css" href="kosz/inventory.css">
<link rel="stylesheet" type="text/css" href="kosz/stamm_new_menu.css">
<link rel="stylesheet" type="text/css" href="kosz/stamm1201718544.css">
<link rel="stylesheet" type="text/css" href="kosz/overview.css">
             <center>   Nazwa wsi  <INPUT TYPE="text" NAME="naz">  ID Wsi <INPUT size="5" TYPE="text" NAME="ID">  Gracz <INPUT size="5" TYPE="text" NAME="user">
                  Data <INPUT size="5" TYPE="text" NAME="pik"></center><br><br><br>
  <TABLE class="vis" width="70%">
     <TR><TD colspan="4" align="center">Jednostki</TD></TR>
     <TR><TD><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_spear.png">  <INPUT size="5" TYPE="text" NAME="pik"></TD>
<TD><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_spy.png">  <INPUT size="5" TYPE="text" NAME="zw"></TD><TD>
<IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_ram.png">  <INPUT size="5" TYPE="text" NAME="tar"></TD>
<TD><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_knight.png">  <INPUT size="5" TYPE="text" NAME="ry"></TD></TR>

     <TR><TD><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_sword.png">  <INPUT size="5" TYPE="text" NAME="mie"></TD>
<TD><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_light.png">  <INPUT size="5" TYPE="text" NAME="lk"></TD>
<TD><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_catapult.png">  <INPUT size="5" TYPE="text" NAME="kat"></TD>
<TD><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_snob.png">  <INPUT size="5" TYPE="text" NAME="sz"></TD></TR>

     <TR><TD><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_axe.png">  <INPUT size="5" TYPE="text" NAME="top"></TD>
<TD><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_marcher.png">  <INPUT size="5" TYPE="text" NAME="kl"></TD><TD></TD>
<TD></TD></TR>
     <TR><TD><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_archer.png">  <INPUT size="5" TYPE="text" NAME="luk"></TD>
<TD><IMG SRC="http://pl5.plemiona.pl/graphic/unit/unit_heavy.png">  <INPUT size="5" TYPE="text" NAME="ck"></TD><TD></TD><TD></TD></TR>
  </TABLE> <BR>

  <TABLE class="vis" width="70%">
        <TR><TD colspan="3" align="center">Budynki</TD></TR>
        <TR><TD width="20%"></TD><TD><IMG SRC="http://pl5.plemiona.pl/graphic/buildings/main.png">  <select name="rat"><?php $licz=1; while($licz<=30){echo"<option value=\"".$licz."\">".$licz."</option>"; $licz++ ;} ?></select></TD>
        <TD><IMG SRC="http://pl5.plemiona.pl/graphic/buildings/place.png">  <select name="pl"><?php $licz=0; while($licz<=1){echo"<option value=\"".$licz."\">".$licz."</option>"; $licz++ ;} ?></select></TD></TR>

         <TR><TD></TD><TD><IMG SRC="http://pl5.plemiona.pl/graphic/buildings/barracks.png">  <select name="kosz"><?php $licz=0; while($licz<=25){echo"<option value=\"".$licz."\">".$licz."</option>"; $licz++ ;} ?></select></TD>
         <TD><IMG SRC="http://pl5.plemiona.pl/graphic/buildings/market.png">  <select name="ryn"><?php $licz=0; while($licz<=25){echo"<option value=\"".$licz."\">".$licz."</option>"; $licz++ ;} ?></select></TD></TR>
         <TR><TD></TD><TD><IMG SRC="http://pl5.plemiona.pl/graphic/buildings/stable.png">  <select name="sta"><?php $licz=0; while($licz<=20){echo"<option value=\"".$licz."\">".$licz."</option>"; $licz++ ;} ?></select></TD>
         <TD><IMG SRC="http://pl5.plemiona.pl/graphic/buildings/wood.png">  <select name="wood"><?php $licz=0; while($licz<=30){echo"<option value=\"".$licz."\">".$licz."</option>"; $licz++ ;} ?></select></TD></TR>

       <TR><TD></TD><TD><IMG SRC="http://pl5.plemiona.pl/graphic/buildings/garage.png">  <select name="war"><?php $licz=0; while($licz<=15){echo"<option value=\"".$licz."\">".$licz."</option>"; $licz++ ;} ?></select></TD>
       <TD><IMG SRC="http://pl5.plemiona.pl/graphic/buildings/stone.png">  <select name="gln"><?php $licz=0; while($licz<=30){echo"<option value=\"".$licz."\">".$licz."</option>"; $licz++ ;} ?></select></TD></TR>

        <TR><TD></TD><TD><IMG SRC="http://pl5.plemiona.pl/graphic/buildings/smith.png">  <select name="kuz"><?php $licz=0; while($licz<=20){echo"<option value=\"".$licz."\">".$licz."</option>"; $licz++ ;} ?></select></TD>
        <TD><IMG SRC="http://pl5.plemiona.pl/graphic/buildings/iron.png">  <select name="irn"><?php $licz=0; while($licz<=30){echo"<option value=\"".$licz."\">".$licz."</option>"; $licz++ ;} ?></select></TD></TR>

        <TR><TD></TD><TD><IMG SRC="http://pl5.plemiona.pl/graphic/buildings/statue.png">  <select name="pie"><?php $licz=0; while($licz<=1){echo"<option value=\"".$licz."\">".$licz."</option>"; $licz++ ;} ?></select></TD>
        <TD><IMG SRC="http://pl5.plemiona.pl/graphic/buildings/farm.png">  <select name="zag"><?php $licz=1; while($licz<=30){echo"<option value=\"".$licz."\">".$licz."</option>"; $licz++ ;} ?></select></TD></TR>


        <TR><TD></TD><TD><IMG SRC="http://pl5.plemiona.pl/graphic/buildings/snob.png">  <select name="pal"><?php $licz=0; while($licz<=1){echo"<option value=\"".$licz."\">".$licz."</option>"; $licz++ ;} ?></select></TD>
        <TD><IMG SRC="http://pl5.plemiona.pl/graphic/buildings/storage.png">  <select name="spi"><?php $licz=1; while($licz<=30){echo"<option value=\"".$licz."\">".$licz."</option>"; $licz++ ;} ?></TD></TR>

        <TR><TD></TD><TD><IMG SRC="http://pl5.plemiona.pl/graphic/buildings/wall.png">  <select name="mur"><?php $licz=0; while($licz<=20){echo"<option value=\"".$licz."\">".$licz."</option>"; $licz++ ;} ?></select></TD>
        <TD><IMG SRC="http://pl5.plemiona.pl/graphic/buildings/hide.png">  <select name="sch"><?php $licz=0; while($licz<=10){echo"<option value=\"".$licz."\">".$licz."</option>"; $licz++ ;} ?></select></TD></TR>
        </TABLE>
</HTML>