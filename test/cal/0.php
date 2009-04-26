<?PHP include('../connection.php'); ?><html>
<head>     <meta http-equiv="Content-Type" content="text/html; charset=windows-1250">
           <link rel="stylesheet" type="text/css" href="../stamm1201718544.css">
           <script src="../js/menu.js" type="text/javascript"></script>
           <script src="../js/suwak.js" type="text/javascript"></script>
           <script src="../js/ts_picker.js" type="text/javascript"></script>
           <script src="../js/tw_002.js" type="text/javascript"></script>
</head>
<table cellpadding="0" cellspacing="0">
<tbody><tr>
<td><form name="form" action="cal_zlozony_0.php" method="post">
<table>
<tbody><tr>
<th>Agresor</th>
</tr>
<tr>
<td>Nazwa Gracza</td>
</tr>
<tr>
<td><input name="agracz" value="" size="14" type="text"></td>
</tr>
<tr>
<td>Typ Wioski</td>
</tr>
<tr>
<td><select name="typ_a"><option value=""></option><option value="0">brak 
typu</option><option value="1">wioska 
off</option><option value="2">wioska 
def</option><option value="3">Zwiad</option><option value="4">wioska 
LK</option><option value="5">wioska 
CK</option><option value="6">do 
rozbudowy</option></select></td>
</tr>
<tr>
<td id="siedem"><b style="cursor: pointer;" onclick="loading(input('a_oko',0)+input('a_xy',0),'a_map_go');on('map0');iss='a_';">Okolica 
</b>/ <b style="cursor: pointer;" onclick="loading(input('a_oko',0)+input('a_xy',0),'a_map_go');"> 
Recznie </b></td>
</tr>
<tr>
<td id="a_map_go"></td>
</tr>
<tr>
<td><hr></td>
</tr>
<tr>
<th>Obronca</th>
</tr>
<tr>
<td>Gracz <input name="ofiarra" onclick="loading(input_name('o'),'kogo_go');on('siedem');" type="radio"><br>Plemie 
<input name="ofiarra" onclick="loading(input_plemie(),'kogo_go');on('siedem');" type="radio"><br>Wioska 
<input name="ofiarra" onclick="loading('xxx|yyy'+input_xy(''),'kogo_go');off('siedem');loading('','o_map_go');" type="radio"><br></td>
</tr>
<tr>
<td id="kogo_go"><select name="plem_op"><option value=""></option><option value="0">bez 
plemienia</option><option value="50811">-SNRG-</option><option value="4469">~ZP</option><option value="23660">-BAE-</option><option value="50650">SmAp</option><option value="23185">=MAD=</option><option value="48588">NWO</option><option value="26084">ZCR</option></select></td>
</tr>
<tr>
<td id="siedem"><b style="cursor: pointer;" onclick="loading(input('o_oko',0)+input('o_xy',0),'o_map_go');on('map0');iss='o_';">Okolica 
</b>/ <b style="cursor: pointer;" onclick="loading(input('o_oko',0)+input('o_xy',0),'o_map_go');"> 
Recznie </b></td>
</tr>
<tr>
<td id="o_map_go"></td>
</tr>
<tr>
<td><hr></td>
</tr>
<tr>
<td>Wojsko</td>
</tr>
<tr>
<td><input value=" &lt; " name="B2" onclick="backward()" type="button"><img src="img/1.PNG" name="photoslider" alt=" "><input value=" &gt; " name="B1" onclick="forward()" type="button"><input value="0" name="wojsko" id="wojsko" type="hidden"></td>
</tr>
<tr>
<td>Godzina Ataku</td>
</tr>
<tr>
<td><input name="czas1" value="" size="22" type="text"><a href="javascript:show_calendar('document.form.czas1', document.form.czas1.value);"><img src="img/cal.gif" alt="Clicknij Tu by ustalić Datę" width="16" border="0" height="16"></a></td>
</tr>
<tr>
<td><input value=" Wykonaj " type="submit"></td></table>