<html><HEAD>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
  <link rel="stylesheet" type="text/css" href="img/stamm1201718544.css">
	<script src="script.js" type="text/javascript"></script>
	<script language="JavaScript" src="ts_picker.js"></script>
</HEAD><body><div style="position: absolute; left: 0px; top: 0px; right: 0px;">
<?php  include('connection.php'); $dn="display: none;"; ?>
<table>
 <tr>
  <td width="10%" align="left" valign ="top">                             <!-- pionowy podział na 2 -->
   <table class="menu" cellspacing="0">                                                               <!-- 1 menu -->
   <tbody>
    <tr><td width="50"></td><td width="70"></td><td width="30"></td>
    </tr>
    <tr>
     <td colspan="3"><a href="../logowanie/logout.php" target="prawy">wyloguj <?PHP echo $_SESSION['zalogowany']; ?></a></td>
    </tr>
    <tr>
     <td></td>
     <td colspan="2"><a href="javascript:show_m1('profil');" >Profil</a></td>
    </tr>
    <tr>
     <td></td>
     <td colspan="2"><a href="javascript:show_m1('mapa');" >Mapa</a></td>
    </tr>
    <tr>
     <td></td>
     <td colspan="2"><a href="javascript:show_m1('cal');" >Kalkulatory</a></td>
    </tr>
    <tr>
     <td colspan="3">Baza Danych</td>
    </tr>
    <tr>
     <td></td>
     <td colspan="2"><a href="javascript:show_m1('look');" >Szukaj</a></td>
    </tr>
    <tr>
     <td></td>
     <td colspan="2"><a href="javascript:show_m1('dodaj');" >Dodaj</a></td>
    </tr>
   </table>                                                           <!-- koniec 1 menu -->
  </td>
  <td align="center" valign="top" width="75%">
   <table class="map_container">
    <tr id="prof_color" style="<?PHP if($_GET[pc]!=1){echo $dn;} ?>"><td><?PHP include('img/color.php'); ?></td>
    <tr id="cal_prost" style="<?PHP if($_GET[cp]!=1){echo $dn;} ?>"> <td><?PHP include('cal/cal_prost.php'); ?></td>
    <tr id="cal_rada" style="<?PHP if($_GET[cr]!=1){echo $dn;} ?>">  <td><?PHP include('cal/cal_rada.php'); ?></td>
    <tr id="cal_allk" style="<?PHP if($_GET[ca]!=1){echo $dn;} ?>">  <td><?PHP include('cal/cal_allk.php'); ?></td>
    <tr id="cal_zloz" style="<?PHP if($_GET[cz]!=1){echo $dn;} ?>">  <td><?PHP include('cal/cal_zloz.php'); ?></td></tr>
    <tr id="baz_wsi" style="<?PHP if($_GET[bw]!=1){echo $dn;} ?>">   <td><?PHP include('zap/baz_wsi.php'); ?></td>
    <tr id="baz_gra" style="<?PHP if($_GET[bg]!=1){echo $dn;} ?>">   <td><?PHP include('zap/baz_gra.php'); ?></td>
    <tr id="baz_oko" style="<?PHP if($_GET[bo]!=1){echo $dn;} ?>">   <td><?PHP include('zap/baz_oko.php'); ?></td>
    <tr id="mapa_klas" style="<?PHP if($_GET[m_k]!=1){echo $dn;} ?>"> <td><?PHP include('map/mapa_klas.php'); ?></td>
    <tr id="mapa_takt" style="<?PHP if($_GET[m_t]!=1){echo $dn;} ?>" ><td><?PHP include('map/mapa_takt.php'); ?></td>
    <tr id="mapa_lege" style="<?PHP if($_GET[m_l]!=1){echo $dn;} ?>"> <td></td>
    <tr id="m_mapa" style="<?PHP if($_GET[mm]!=1){echo $dn;} ?>">
     <td>
      <table><caption align="bottom">Generator Map</caption>
       <tr>
        <td>&nbsp;<a href="javascript:show_m1('mapa_klas');" ><img src="img/klasyk.jpg" alt="Mapa Klasyczna" width="80" height="60"></a>&nbsp;</td>
        <td>&nbsp;<a href="javascript:show_m1('mapa_takt');" ><img src="img/taktyk.PNG" alt="Taktyczna" width="80" height="60"></a>&nbsp;</td>
        <td>&nbsp;<a href="javascript:show_m1('mapa_lege');" ><img src="img/legenda.PNG" alt="Legenda" width="80" height="60"></a>&nbsp;</td>
       </tr>
      </table>
     </td>
    </tr>
    <tr>
     <td id="m_look" style="<?PHP if($_GET[ml]!=1){echo $dn;} ?>">                                                        <!-- menu przegladaj baze -->
      <table>
       <tr>
        <td><a href="javascript:show_m1('baz_wsi');" ><img src="img/wioska.PNG" alt="Szukaj Wioski" width="79" height="60"><br>Wioski</a></td>
        <td><a href="javascript:show_m1('baz_gra');" ><img src="img/users.PNG" alt="Szukaj Gracza" width="79" height="60"><br>Gracza</a></td>
        <td><a href="javascript:show_m1('baz_oko');" ><img src="img/okolica.PNG" alt="Szukaj Wiosek w okolicy" width="79" height="60"><br>Okolicy</a></td>
        <td><img src="img/wlasne.PNG" alt="Własne wyszukanie" width="80" height="60"><br>Własne</td>
       </tr>
      </table>
     </td>
    </tr>
   <tr>
     <td id="m_dodaj" style="<?PHP if($_GET[md]!=1){echo $dn;} ?>" >                                                    <!-- menu dodaj do bazy -->
      <table>
       <tr>
        <td>Raport z:</td>
        <td><a href="kr/kk.php?kr=1" target="prawy"><img src="img/r_atak.PNG" alt="Raport Atak/Zwiad" width="80" height="60"><br>Ataku/Zwiadu</a></td>
        <td><a href="kr/kk.php?kr=2" target="prawy"><img src="img/r_obrona.PNG" alt="Raport z Obronny" width="80" height="60"><br>Obronny</a></td>
        <td><a href="edyt/ed_typ.php" target="prawy"><img src="img/" alt="Grupy " width="80" height="60"><br>Typy wiosek</a></td>
       </tr>
      </table>
     </td>
    </tr>
    <tr>
     <td id="m_cal" style="<?PHP if($_GET[mc]!=1){echo $dn;} ?>">                                                                            <!-- menu kalkulatory -->
      <table>
       <tr>
        <td><a href="javascript:show_m1('cal_prost');" ><img src="img/prosty.PNG" alt="Prosty" width="80" height="60"><BR>Prosty</a></td>
        <td><a href="javascript:show_m1('cal_zloz');" ><img src="img/zlozony.PNG" alt="Złożony" width="80" height="60"><BR>Złożony</a></td>
        <td><a href="javascript:show_m1('cal_rada');" ><img src="img/radar.PNG" alt="Radar" width="80" height="60"><BR>Radar</a></td>
        <td><a href="javascript:show_m1('cal_allk');" ><img src="img/doskosk.PNG" alt="Allken'a" width="80" height="60"><BR>doskosk</a></td>
       </tr>
      </table>
     </td>
    </tr>
    <tr>
     <td id="m_profil" style="<?PHP if($_GET[mp]!=1){echo $dn;} ?>" >
      <table> 
       <tr>
        <td><a href="javascript:show_m1('prof_color');" ><img src="img/paleta.jpeg" alt="kolory" width="80" height="60"><br>Kolory</a></td>
        <td><a href="edyt/minuta.php" target="prawy"><img src="img/odliczanie.jpeg" alt="Minutnik" width="80" height="60"><br>Minutnik</a></td>
        <td><img src="img/droga.jpg" alt="Ataki w drodze" width="80" height="60"><br>Ataki w drodze</td>
       </tr>
      </table>
     </td>
    </tr>
    <tr>
     <td>
      <table>
       <tr>
        <td id="m_leg_t" style="<?PHP if($_GET[lt]!=1){echo $dn;} ?>">                                                                            <!-- menu kalkulatory -->
         Legenda
        </td>
       </tr>
      </table>
     </td>
    </tr>
   </table>                                                                         <!-- koniec menu profil -->
  </td>
  <td align="left" valign ="top">
<a href="http://www.szu.pl" target="_blank"><img src="http://szu.pl/szu-banerki/10.gif" border="0" alt="Bazy danych MySQL, konta pocztowe, konta WWW, parkowanie domen"></a>
  </td>
 </tr>
</table>
 </td>
</tr>
</table>
