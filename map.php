<?PHP include('connection.php'); $xy = explode("|", $_GET[xy]); ?><html>
<head>     <meta http-equiv="Content-Type" content="text/html; charset=windows-1250">          
           <script src="js/tw_002.js" type="text/javascript"></script>
           <script type="text/javascript">
           var center_x=<?PHP echo $xy[0]; ?>; var center_y=<?PHP echo $xy[1]; ?>;
            </script>
<style type="text/css">
<!--

  BODY {background: #F7EED3;}
table.main { background-color:#F7EED3; border:0px solid #804000;}
table.ba { border-bottom:0px;}
table.main td{font-size:11px;}
table.main th{font-size:11px;}
table.main tr.row th{font-size:11px;}
table.main tr.row td { background-color:#006600; background-image:none; color:#F1EBDD;}
table.main tr.row td.hidden { color:#333366; }
tr.center td { text-align:center; }


-->
</style>
</head>
  <body onload="registerEvents();">
<table class="map">
    <tbody>
    <tr>
	<td>

	    <img id="map" src="img/00a.php?s=111&xy=<?PHP echo $_GET[xy]; ?>" alt="{map}">
	</td>
<td rowspan="10" valign="top"><iframe id="rapo" style="border:0pt;" width="100%" height="350"></iframe><BR>
<img src="img/legenda.JPG" ></td>
    </tr>
<tr style="display:none"><td>
<img style='display:none' id='mapol_img' src='#' alt='' />
<img src="img/rd.gif" style="width: 1px; height: 1px; position: absolute; display: block; left: 426px; top: 911px;" id="rd_top" alt="">
<img src="img/rd.gif" style="width: 1px; height: 1px; position: absolute; display: block; left: 426px; top: 911px;" id="rd_left" alt="">
<img src="img/rd.gif" style="width: 1px; height: 4px; position: absolute; display: block; left: 429px; top: 911px;" id="rd_right" alt="">
<img src="img/rd.gif" style="width: 4px; height: 1px; position: absolute; display: block; left: 426px; top: 914px;" id="rd_bottom" alt="">
</td></tr>
</tbody></table>
</body>
  </html>