<?php include('../connection.php');//<script src="../js/scriptt.js" type="text/javascript"></script>
      include('../hello/id.php');
if(strpos($_GET[wersja],$name)!==false){echo '<h3 align="center" style="color: rgb(255, 0, 0);">Masz najnowsz± wtyczkê</h3><a href="../hello/Hello_Studnia'.$name.'.xpi"  id="ff">tutaj </a>';exit();}
//<script type="text/javascript">
//			var pageTracker = _gat._getTracker("UA-1427236-2");
//			pageTracker._trackPageview();
//		</script>
// onclick="pageTracker._trackPageview('../hello/Hello_Studnia1.5.xpi');"

 ?><html><head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="../img/stamm.css?1251209421">


</head><style type="text/css">
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
//.warn  { color: rgb(255, 0, 0); }


-->
</style>
<body>
<h3 align="center"><b style="color: rgb(255, 0, 0);" >Jest ju¿ nowsza wtyczka:</b> wersja Hello_Studnia <?PHP echo $name; ?></h3>
mo¿esz j± pobraæ <a href="../hello/Hello_Studnia<?PHP echo $name; ?>.xpi"  id="ff">tutaj </a>
<h4> Instalacja</h4>
Dzia³a pod <b>Mozilla Firefox 3 i 4 </b><br>
 Chcia³em by by³a jak najprostsza w instalacji,<br>
wiêc jest to ca³y pakiet w jednym pliku.<br><br>

 Krok 1<br>
 Kliknij <a href="../hello/Hello_Studnia<?PHP echo $name; ?>.xpi">tutaj </a> by pobraæ wtyczkê.<br><br>
 Krok 2<br>
 Mo¿esz go "otworzyæ za pomoc±" <b>FireFox</b> (wybieraj±c go z listy)<br>
 Albo<br> Zapiaæ na dysku i przeci±gnij go do Otwartego okna 'FireFoxa,<br>
 tak jak by¶ go przenosi³.<br><br>
 Krok 3<br>
 Zobaczysz komunikat o instalacji i po 5 sekundach mo¿esz go zainstalowaæ.<br><br>
 Krok 4<br>
 Uruchom ponownie przegl±darkê, by aktywowaæ wtyczkê.<br><br>
 Krok 5<br>
 Ciesz siê Now± Wtyczk±<br><br><br><br>


A wtyczka dla Proxi jest <a href="../hello/wtykProxi.xpi">tutaj </a> instaluje siê tak samo.
</body>
</html>