var phrame = 'top'
var x;
var y = new Array();
y[0] = 0;
var level = 0;
var string='';
function parsetree()
{
	for (i=y[level];i<x.length;i++)
	{
		string+='<LI>name: ' + x.frames[i].name + ' (tytule: ' + x.frames[i].document.title + ')';
		if (x.frames[i].length > 0)
		{
			phrame = phrame + '.frames[' + i + ']';
			y[level] = i + 1;
			document.write(', which contains<UL>');
			level++;
			y[level] = 0;
			return;
		}
	}
	phrame = phrame.substring(0,phrame.lastIndexOf('.'));
	string+='</UL>/n ';
	if (level == 0) phrame =='';
	level--;
}

while (phrame != '')
{
	x = eval(phrame);
	parsetree();
}

alert(string);