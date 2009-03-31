function odkryj($odkryj) {
	document.getElementById('Wykonaj').style.display = '';

if($odkryj!='Wioska'){	document.getElementById('Wioska').style.display = 'none';}else{	document.getElementById('Wioska').style.display = '';}
if($odkryj!='Okolica'){	document.getElementById('Okolica').style.display = 'none';}else{document.getElementById('Okolica').style.display = '';}
if($odkryj!='Spis'){	document.getElementById('Spis').style.display = 'none';}else{	document.getElementById('Spis').style.display = '';}

}
