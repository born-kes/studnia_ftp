<HTML><HEAD>
<SCRIPT LANGUAGE="JavaScript">
function updateParent() {
    self.close();
    return false;
}
</SCRIPT>
</HEAD><BODY>
<?php
if($_GET[id]>=1)
{$id=$_GET[id];}
else
{$id = 0;
echo"B³±d adresu URL";}
if($_GET[ple]>=1)
{$ple=$_GET[ple];}
else
{$ple=0;}



/* £±czenie i wybranie bazy */
$link = mysql_connect("85.17.1.175", "bornkesws", "MKO208")or die(mysql_error());
mysql_select_db ("bornkesws")or die(mysql_error());

$edytowany = mysql_query("UPDATE users SET plemie='$ple' WHERE id='$id'") or die (mysql_error());
        

$end=mysql_close($link);
?>
Zmieniono Plemie<BR>
<FORM NAME="childForm" onSubmit="return updateParent();">
          <BR><INPUT TYPE="SUBMIT" VALUE="zamknij"></FORM>
</BODY></HTML>