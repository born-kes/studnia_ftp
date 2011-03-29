<?PHP
 if($_GET[s]!=NULL)
{
  if($_GET[s1]!=NULL)
   {$cols = '30%,*'; $w=30;
    $s= 'http://pl5.plemiona.pl/game.php?village='.$_GET[s].'&boby=tak';
    $s1='http://pl5.plemiona.pl/game.php?village='.$_GET[s];
  
          if($_GET[s1]!=1){$s.='&screen=info_player&id='.$_GET[s1];  $s1.='&screen=place'; }
         else             {$s.='&screen=overview_villages&mode=prod';$s1.='&screen=market';} 
   }
 else 
  if($_GET[b]==4)
   {$cols = '*,*,*,*'; $w=20;
    $s= 'http://pl5.plemiona.pl/game.php?village='.$_GET[s].'&screen=place';
          if($_GET[st]!='undefined'){$s.='&target='.$_GET[st]; }

   }
 else
   {$cols = '*';$w=100;}
}
else
{$s='indexi.php'; $cols = '*';} 


?>
<html>
 <frameset cols="<?PHP echo $cols ; ?>">

	<frame src="<?PHP echo $s; ?>" />
<?PHP if($_GET[s1]!=NULL){
echo '	<frame src="'. $s1.'" />';}
 else if($_GET[b]==4)
{ 
echo '	<frame src="'. $s.'" />
	<frame src="'. $s.'" />
	<frame src="'. $s.'" />
';
}

?>
</frameset></html>

