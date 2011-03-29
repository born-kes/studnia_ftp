<?PHP require "../connection.php"; ?><head>
     <meta http-equiv="Content-Type" content="text/html; charset=windows-1250">
           <link rel="stylesheet" type="text/css" href="stamm.css">
           <script src="../js/menu.js?3" type="text/javascript"></script>
           <script src="../js/suwak.js?3" type="text/javascript"></script>
           <script type="text/javascript">
function a0(a){ if(gid(a)) return '&'+a+'='+gid(a).value; }
function nev_img()
{
     if(gid('godz').value=='' && gid('ilosc').value!=''){gid('godz').value='1:10';}
else if(gid('godz').value!='' && gid('ilosc').value==''){gid('ilosc').value=1;}

gid('suma').innerHTML= gid('pik').value*1 + gid('mie').value*1 + gid('luk').value*1 + gid('ck').value*6;
var src = 'http://www.bornkes.w.szu.pl/img/img_symulator.php?'+a0('mur')+a0('ilosc')+a0('godz')+a0('pik')+a0('mie')+a0('luk')+a0('ck')+a0('zw')+a0('sz')+a0('typ') ;
gid("KES_img").src  = src;
//alert(src1);
}
  function info(a)
  {
  switch (a)
{
     case 'zw':
          var string = "Zwiad \n\n wpisz ile zwiadu jest w wiosce\n\n jak czytac z mapy:\n 1000zw = 1k => 1\n  999zw => 09\n  100zw => 01";
             break;
     case 'wojsko':
          var string = "Wojsko \n\n wpisz ile Wojska (def'a) jest w wiosce\n\n jak czytac z mapy:\n 1 zagroda defa to 20k\n\n 5 => 5 x 20k\n 10% => 2000\n\n UWAGA! \n 39k => 1 (mniej niż 2 zagrody)\n ";
             break;
     case 'ataki':
          var string = "ATAKI na wioske\n\nPokazuje ataki które id± \n i czas do tego który dojdzie pierwszy\n\n forma(godz:min) ilo¶ć minimum 1\n np. 120:00  => 120 godzin \n albo 0:40 => 40 minut";
             break;

}
    alert(string)
  }
</script>
           <script src="js/tw_002.js?3" type="text/javascript"></script>
<style type="text/css"><!--table.map div.lay4 { position: relative; bottom:38px; margin-bottom :-38}table.minis { border:1px solid #333366;}table.ba td{ border-bottom:1px solid #804000;} table.minis td{font-size:11px; text-align:center;} table.minis th{font-size:11px; background-color:#F7EED3;} --></style>

</head>
  <body bgcolor="#ffffff">
<b align="center">Multimedialna Legenda ;p</b>

<table class="main" align="center" cellpadding="0px" cellspacing="0px">
<tr>
    <td>ile: </td><td><input type="text" id="ilosc" value="" size="1"  /></td>
    <td><a href="javascript:info('ataki');">??</a></td>
    <td colspan="4">za ile pierwszy :</td>
    <td><input type="text" id="godz" value="" size="2"  /></td>
    <td><a href="javascript:info('ataki');">??</a></td>
</tr>
<tr><td>szla:</td><td><input type="text" id="sz" value="" size="1" /></td>
<td rowspan="2" colspan="2" valign="top">
  <table class="map"><tr><td class="border-left-new border-bottom-new" style="background-color: rgb(0, 0, 244); text-align: left;">
    <img src="../img/6v.PNG" style="width: 52px; height: 38px;">
      <div class="lay4" style="">
        <img src="http://www.bornkes.w.szu.pl/img/img_symulator.php" id="KES_img"></div>
    </td></tr>
  </table>
</td>
<td>typ </td><td colspan="4"><select id="typ">
    <option value=""></option>
    <?PHP for($licz=0; $licz<count($rodzaje); $licz++){echo'<option value="'.$licz.'">'.$rodzaje[$licz].'</option>'; } ?>
    </select>
</td></tr>
<tr>
    <td>mur:</td><td><input type="text" id="mur" value="" size="1" /></td>
    <td>zw</td><td> <input type="text" id="zw" value="" size="1" /></td>
    <td><a href="javascript:info('zw');">??</a></td>
</tr>
<tr><td>pik</td><td><input type="text" id="pik" value="" size="1" /></td><td>
        mie</td><td><input type="text" id="mie" value="" size="1" /></td><td>
        luk </td><td><input type="text" id="luk" value="" size="1" /></td><td>
        ck </td><td><input type="text" id="ck" value="" size="1" /></td><td>
        <a href="javascript:info('wojsko');">?? </a>
 </td></tr>
</table>
<input type="submit" value="Zobacz efekt" onclick="nev_img();" />   <b> Suma Defa:<em id="suma"></em></b>
</body>