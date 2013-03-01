<?PHP
 include('../connection.php');
 include('css.htm');
 $ec =mktime()-$godzina_zero;


 $zap ="SELECT COUNT( t.id ) AS `Rekordow` , t.name, t.id
      FROM list_ataki a, ws_all v, list_user t
      WHERE a.`cel` = v.id
      AND v.player = t.id
      AND a.godz>$ec
      GROUP BY t.id
      ORDER BY t.name ASC"; $q=0; //echo $zap;  

 ?><html>
<body>
<script language="JavaScript">
<!--
function selectOdp(gdzie,a,b)
{
Klik(gdzie,'ataki_wsi.php?lista='+a+'&cel='+b);
}
//-->
</script>

 <table class="main"><?php
  connection();
   $wynik = @mysql_query($zap);
  while($r = @mysql_fetch_array($wynik)){
           $storing0.= '
 <tr>
  <td valign="top">
    <a href="javascript:selectOdp(\'gracz_'.deCode($r[name]).'\',1,'.$r[id].');">
      <i>'.deCode($r[name]).'</i>
    </a>
  </td>
  <td>x
    <b>'.$r[Rekordow].'</b>
  </td>
  <td>
    <a href="javascript:selectOdp(\'gracz_'.deCode($r[name]).'\',3,'.$r[id].');">[Wszystkie]</a>
  </td>
 </tr>
 <tr>
  <td />
  <td id="gracz_'.deCode($r[name]).'" />
 </tr>
 <tr>
  <td colspan="3" >
    <hr>
  </td>
 </tr> ';
 $kto[$q]=$r[id];}
  destructor();

   $storing0.= '</table>';
//   $storing.= '</td><td valign="top">';

echo $storing0;
 ?>
 </body>
</html>