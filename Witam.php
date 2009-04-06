<?PHP require "test/connection.php"; ?><html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
  <meta name="KES" content="[ 9oKesi ]" />
  <title>Strona Witaj</title>
<link rel="stylesheet" type="text/css" href="test/operacje/stamm.css">
          <script src="test/js/menu.js" type="text/javascript"></script>
          <script src="test/js/suwak.js" type="text/javascript"></script>
          <script src="test/js/tw_002.js" type="text/javascript"></script>
          <script type="text/javascript">
           var center_x=550; var center_y=700; var zoom=2; var static='http://static.twmaps.org';
            inqlude=''; var iss='k';
function gmap(text){
	gid( iss+'xy' ).value = text;
	gid( iss+'oko' ).value = gid( 'zoom_h' ).value;
}
function input_plemie() {
                        	var str_buffer =  new String (
    '<select name="plem_op">'+
    '<option value=""></option>'+
    '<?PHP for($licz=0; $licz<count($plemiona); $licz++){echo'<option value="'.$id_plem[$licz].'">'.$plemiona[$licz].'</option>'; } ?>'+
    '</select>');
       return str_buffer;
}
function input_typ(a) {
                        	var str_buffer =  new String (
    '<select name="typ_'+a+'">'+
    '<option value=""></option>'+
    '<?PHP for($licz=0; $licz<count($rodzaje); $licz++){echo'<option value="'.$licz.'">'.$rodzaje[$licz].'</option>'; } ?>'+
    '</select>');
       return str_buffer;
}
function map_ini() {
                        	var str_buffer =  new String (
    '<select name="plem_op" OnChange="selecturl(this)">'+
    '<OPTION VALUE="none">Wybierz adres</OPTION>'+
<?PHP connection();  $wynik = @mysql_query("SELECT `hex`, `nazwa` FROM `hex_kolor`");
      while($r = mysql_fetch_array($wynik)){echo'\'<OPTION VALUE="http://pl5.twmaps.org/showmap.php?id='.$r[hex].'">'.$r[nazwa].'</OPTION>\'+
';}@destructor(); ?>    '</select>');
       return str_buffer;
}
function check(){ return intval(gid('zoom_h').value*1.5); }
function intval( mixed_var, base ) {
    var tmp;
    if( typeof( mixed_var ) == 'string' ){
        tmp = parseInt(mixed_var);
        if(isNaN(tmp)){
            return 0;
        } else{
            return tmp.toString(base || 10);
        }
    } else if( typeof( mixed_var ) == 'number' ){
        return Math.floor(mixed_var);
    } else{
        return 0;
    }
}
</script>
</head>
<body onload="registerEvents();"><div style="position: relative; top: 0px; left: 10px; z-index:5;" id="go1">
<h3 align="center">Witam w Serwisie informacyjnym<br>Heroicznych Wilkołaków i SYNERG</h3>
 Dane Serwera:
 <table><tr><td valign="top">
<br /><a href="http://www.szu.pl" target="_blank">
<img src="http://szu.pl/grafika/szu114x50.gif" border="0" alt="bazy danych MySQL, konta pocztowe, konta WWW, parkowanie domen"></a>
</td><td>
<table><CAPTION>Aktualizacje</CAPTION> 

<?PHP
echo"<tr><td><li><b>Wlasciciele Wiosek</b></td><td> ";
connection();$wynik=mysql_query("SELECT `data` FROM `uakt` WHERE `id`=1");$f = mysql_fetch_row($wynik);echo($f[0]);destructor();
echo"</td></tr><tr><td><li><b>Dane o Graczach</b></td><td> ";
connection();$wynik=mysql_query("SELECT `data` FROM `uakt` WHERE `id`=2");$f = mysql_fetch_row($wynik);echo($f[0]);destructor();
echo"</td></tr><tr><td><li><b>Dane o Plemionach</b></td><td> ";
connection();$wynik=mysql_query("SELECT `data` FROM `uakt` WHERE `id`=3");$f = mysql_fetch_row($wynik);echo($f[0]);destructor();
?>
</td></tr></table>
<br />
<b>Typy Wiosek</b><br />
<br />
<?PHP foreach($rodzaje as $vro){echo $vro.", ";}  ?> <br />
<br />
<b>Wybur Plemion</b><br />
<br />
<?PHP foreach($plemiona as $vro){echo $vro.", ";}  ?> <br />
<br />na mapie
<br /><table><tr><td><table><CAPTION><b>Colory</b><br /></CAPTION>
<tr><TD width="15" class="<?PHP echo map_color($_SESSION['id'],0);?>">Zalogowany</td></tr>
<tr><TD width="15" class="<?PHP echo map_color(1,50811); ?>">-SNRG- </td></tr>
<tr><TD width="15" class="<?PHP echo map_color(1,47716); ?>">@~HW~@</td></tr>
<tr><TD width="15" class="<?PHP echo map_color(1,48588); ?>">NWO </td></tr>
<tr><TD width="15" class="<?PHP echo map_color(1,51473); ?>">TK </td></tr>
<tr><TD width="15" class="<?PHP echo map_color(1,422);   ?>">RedRub </td></tr>
<tr><TD width="15" class="<?PHP echo map_color(1,4469);  ?>">~ZP~ </td></tr>
<tr><TD width="15" class="<?PHP echo map_color(1,5416);  ?>">JEJ </td></tr>
<tr><TD width="15" class="<?PHP echo map_color(1,23185); ?>">-MAD- </td></tr>
<tr><TD width="15" class="<?PHP echo map_color(1,23660); ?>">-BAE- </td></tr>
<tr><TD width="15" class="<?PHP echo map_color(1,26084); ?>">ZCR </td></tr>
<tr><TD width="15" class="<?PHP echo map_color(1,50650); ?>">SmAp </td></tr>
<tr><TD width="15" class="<?PHP echo map_color(1,51091); ?>">NA </td></tr>
<tr><TD width="15" class="<?PHP echo map_color(0,0);?>">Opuszczone </td></tr>
<tr><TD width="15" class="<?PHP echo map_color(1,1);     ?>">inne </td></tr>
</table></td><td><table><CAPTION><b>Grafika</b><br /></CAPTION>
<tr><td class="rr"><img src="test/img/xw.php" ></td><td>trawa</td></tr>
<tr><td class="po"><img src="test/img/xw.php?t=1" ></td><td>Typ 1-<?PHP echo $rodzaje[1];?></td></tr>
<tr><td class="po"><img src="test/img/xw.php?t=2" ></td><td>Typ 2-<?PHP echo $rodzaje[2];?></td></tr>
<tr><td class="po"><img src="test/img/xw.php?t=3" ></td><td>Typ 3-<?PHP echo $rodzaje[3];?></td></tr>
<tr><td class="po"><img src="test/img/xw.php?t=4" ></td><td>Typ 4-<?PHP echo $rodzaje[4];?></td></tr>
<tr><td class="po"><img src="test/img/xw.php?t=5" ></td><td>Typ 5-<?PHP echo $rodzaje[5];?></td></tr>
<tr><td class="po"><img src="test/img/xw.php?t=6" ></td><td>Typ 6-<?PHP echo $rodzaje[6];?></td></tr>
<tr><td class="aa"><img src="test/img/xw.php?r=1" ></td><td>Jest raport z tej wioski</td></tr>
<tr><td class="aa"><img src="test/img/xw.php?b=1" ></td><td>Brak obrony</td></tr>
<tr><td class="aa"><img src="test/img/xw.php?b=2" ></td><td>Wioska Broniona</td></tr>
<tr><td class="aa"><img src="test/img/xw.php?b=3" ></td><td>Bunkier</td></tr>
<tr><td class="aa"><img src="test/img/xw.php?b=3&r=1" ></td><td>Bunkier + raport z wioski</td></tr>
<tr><td class="aa"><img src="test/img/xw.php?b=3&r=1&t=1" ></td><td>Bunkier + raport + wioska off</td></tr>
<tr><td class="my"><img src="test/img/xw.php?sz=1" ></td><td>Szlachta w wiosce</td></tr>
<tr><td class="aa"><img src="test/img/xw.php?sz=1&r=1&t=2&b=2" ></td><td>Wioska broniona + raport + wioska def + szlachta</td></tr>
</table>
</td>
</tr>
</table></td></tr></table>

<b>Mapa Globalna:</b><br />

Ustawienia mapy<br />

x=550; y=700; zoom=2;<br /><br />
<?PHP connection();  $wynik = @mysql_query("SELECT `hex`, `nazwa` FROM `hex_kolor`");
      while($r = mysql_fetch_array($wynik)){
echo'ADRES=<a href="http://pl5.twmaps.org/'.$r[hex].'">http://pl5.twmaps.org/showmap.php?id='.$r[hex].'</a> Nazwa:<b>'.$r[nazwa].'</b><br />';}
@destructor(); ?>    

</div>



<div style="position:absolute; top:0px; left: 0px; z-index:25;display:none;" id="map0">
<div style="position:absolute; top:0px; left: 0px; z-index:1;" id="map1">
<h1 name="ggge" id="ggge" />
<input type="hidden" name="koko" id="koko" value="" /><input type="hidden" name="kxy" id="kxy" value="" />

<table class="map">
    <tbody>
    <tr>
	<td>
	    <img id="map" src="http://pl5.twmaps.org/showmap.php?id=a5b4aca8f66976c95d9d581def7cb214" alt="{map}">
	</td>
    </tr>
</tbody></table>
<img style='display:none' id='mapol_img' src='#' alt='' />
<img src="test/img/rd.gif" style="width: 1px; height: 1px; position: absolute; display: block; left: 426px; top: 911px;" id="rd_top" alt="">
<img src="test/img/rd.gif" style="width: 1px; height: 1px; position: absolute; display: block; left: 426px; top: 911px;" id="rd_left" alt="">
<img src="test/img/rd.gif" style="width: 1px; height: 4px; position: absolute; display: block; left: 429px; top: 911px;" id="rd_right" alt="">
<img src="test/img/rd.gif" style="width: 4px; height: 1px; position: absolute; display: block; left: 426px; top: 914px;" id="rd_bottom" alt="">
</div>
<div style="position:absolute; width:80px;top:60px;left:10px; z-index:2;" id="map2">
<table cellpadding="0" cellspacing="0"><tr><td>
     <table cellpadding="0" cellspacing="0">
<tr><td align="center" nowrap style="background-color: maroon; border-style: dotted;">OKOLICA</td></tr>
<tr><td nowrap id="oko_map" style="background-color: maroon; border-style: dotted;"></td></tr>
     </table></td><td>
     <table cellpadding="0" cellspacing="0">
<tr><td align="center" nowrap style="background-color: maroon; border-style: dotted;">Mapa</td></tr>
<tr><td nowrap id="ini_map" style="background-color: maroon; border-style: dotted;"></td></tr>
     </table></td></tr>     </table>

</div>
</div>
<script type="text/javascript">loading(input_zoom(),'oko_map');loading(map_ini(),'ini_map');</script>
<b style="cursor: pointer;" onclick="loading(input_h('o_oko',0)+input_h('o_xy',0),'o_map_go');on('map0');iss='o_';">Test Mapy Globalnej</b>
<span id="o_map_go"></span>
interfejsy
</body>
</html>