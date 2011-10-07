<?  include_once('../../connection.php');
$as =true;
$st=array ('niewybrane','Nie dziala ','OK','OK+wtyczka');
$zap="
SELECT prx.*,u.id as user,prx.ip
FROM `list_proxi` prx
left join `list_user` u
ON prx.id=u.nr_proxi
WHERE prx.id!=0 AND prx.status != 1;
";
if($_GET[g]==NULL){$g='0" onchange="select_k(gid_kes(\'proxi_0\').value)"'; $as=false;}

$select = '<select id="proxi_'.$g.'" class="xs" ><option value="0"></option>';
connection();
  $wynik = mysql_query($zap);
  while($r = @mysql_fetch_array($wynik))
  { if($r[user]!=NULL && $r[user]!=$g && $as){$zajente_proxi='disabled="tak" ';}
elseif($r[user]==$g && $as){$zajente_proxi='selected="tak" ';$this_ip=$r[ip]; }
else{$zajente_proxi='';}   $s = $st[$r[status]];

$select .='<option value="'.$r[id].'" '.$zajente_proxi.'>'.$r[id].'=('.$s.') </option>';   //'.$r[name].'
  }
destructor();
$select .= '</select>';

if($_GET[g]==NULL){ echo $select ; }
?>