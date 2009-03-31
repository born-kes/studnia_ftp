<?
$p=" , ";
if($_POST[n_typ]!=NULL){
echo"Lista wiosek dodana do grupy <b>".$rodzaje[$_POST[n_typ]]."</b><BR /><BR />";
$text = $_POST[query];
$text1 = str_replace("\t",' ', $text);
$lis = explode("\n",$text1);

	for($i=0; $i<count($lis); $i++)
            {$st_r=strrpos($lis[$i], "|");
              $wioska_xy =explode("|", substr($lis[$i] , $st_r-3 , 7 ));

  if($wioska_xy[0]!=NULL && $wioska_xy[1]!=NULL ){
  connection();
   $wynik=@mysql_query("UPDATE village
                        SET typ='$_POST[n_typ]'
                        WHERE `x`='$wioska_xy[0]'
                        AND y='$wioska_xy[1]'");
  echo '<br />Dodano wioske : '.$wioska_xy[0].'|'.$wioska_xy[1];
 @destructor();
}
}
}else{

echo' Dodawanie wojsk i ustalanie Typow.<BR>
Skopiuj liste <b>Kombinowany</b> z zakladki <b>Przegladaj</b> <br>
Wklej w pole tekstowe<br>

<table border="1" cellspacing="1" cellpadding="2" bgcolor="#00aa66" align="center">
<caption>Filtr wiosek - typ</caption>
<form action="?f=1" method="POST">
<TR><td>Wybierz Typ/Grupe do jakiej naleza wioski

<SELECT name="n_typ" >
                 <option value=""></option>';
         for($licz=0; $licz<count($rodzaje); $licz++)
        {
           echo'<option value="'.$licz.'">'.$rodzaje[$licz].'</option>';
        }
echo'</SELECT>
</td>

</TR>
<TR><TD  align="center">
<textarea id="query" name="query" onclick="highlight(this);" rows="12" cols="52"></textarea>
</TD></TR>	
<TR><TD align="center"><input type="submit" value="Konwertuj" style="margin-top: 5px;"/>
</div>
	</form>
	</TD></TR></table>';
}
?>