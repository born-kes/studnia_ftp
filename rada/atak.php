<?php
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

<?php
  connection();
   $wynik = @mysql_query($zap);
  while($r = @mysql_fetch_array($wynik)){
  
$storing1.='<option value="gracz_'.deCode($r[name]).'" id="'.$r[id].'">'.deCode($r[name]).' x '.$r[Rekordow].'</option>';
           $storing0.= '
 <tr>
  <td id="gracz_'.deCode($r[name]).'" />
 </tr>
 <tr>
  <td colspan="3" >
    <hr>
  </td>
 </tr> ';
 $kto[$q]=$r[id];}
  destructor();
//   $storing.= '</td><td valign="top">';
//    <a href="javascript:selectOdp(\'gracz_'.deCode($r[name]).'\',3,'.$r[id].');">[Wszystkie]</a>
?>
<table>
<tr><td>Atakowani Gracze: <select onChange="selectOdp(this.value,1,this.options[this.selectedIndex].id);"><option></option><?php echo $storing1; ?></select></td></tr>
<?php echo $storing0; ?>
</table>

 </body>
</html>