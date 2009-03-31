<?PHP

echo'<table border="1" cellspacing="1" cellpadding="2" bgcolor="#FFCC66" align="center">
<caption>Konwerter raportow Wojennych ;p</caption><TR><TD  align="center" colspan="2">
<form action="?kr='.$_GET[kr].'&krs=1" method="POST"><textarea id="query" name="query" onclick="highlight(this);" rows="12" cols="64"></textarea></TD></TR>	
<TR><TD><b>J</b>aki <b>T</b>yp wioski podejrzewasz ?
</td><td>';
?>
<input type="radio" id="typ" name="typ" value="1">off
<input type="radio" id="typ" name="typ" value="2">def
<input type="radio" id="typ" name="typ" value="3">zw
<input type="radio" id="typ" name="typ" value="4">lk
<input type="radio" id="typ" name="typ" value="5">ck
<input type="radio" id="typ" name="typ" value="6">nowa
</td></tr>
<TR><TD align="center" colspan="2"><input type="submit" value="Konwertuj" style="margin-top: 5px;"/>
		</div></form>
	</TD></TR></table></body></html>

