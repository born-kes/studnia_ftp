<?PHP include_once('table.php');exit();?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<title>Logowanie</title>
</head><?PHP
function haslo($limit)
{
  return substr(md5(date("m.Y.h.i.s.d").rand(1,1000000)) , 0 , $limit);
}

#echo haslo(7);

 connection();   $wynik = mysql_query("SELECT haslo FROM `us` where id='0'");

  if($r = @mysql_fetch_array($wynik)){$pas=$r[haslo];} destructor();

  if ($pas===$_GET[p])
    {
      echo '<frameset cols="170,*">
	<frame frameborder="0" marginwidth="5" marginheight="5"  src="ip.php?p='.$_GET[p].'" name="ma" />
	<frame frameborder="0" marginwidth="7" marginheight="0"  name="sec" />
</frameset>';}
else
{echo '<center><h1>SESJA MINELA</h1></center>';}
?></html>

