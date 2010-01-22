<?PHP 
/*function url_proxi($str)
{  $str=str_replace('amp;','',base64_decode($str));
   $str= explode("?",$str);
   $str= explode("&",$str[1]);
   for($i=0;count($str)>$i;$i++ )
   { $Get = explode("=",$str[$i]);
     $url[$Get[0]]=$Get[1];
   }
   return $url;
}
function GET($str,$nide)
{
  for($i=0;$i<count($str);$i++)
  { 
     if($nide==$str[$i]){return $str[$i+1];}
  }
}
$url = explode('=',$_POST['href']);
$url = url_proxi($url[1]);
//echo base64_decode($url[1]).'<br>';
//echo  $url['village'];
//foreach($url as $u => $f){echo $u.' '.$f; }*/
include('budowa.php');
?>