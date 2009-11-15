var doc ,f ,tabl ,a_herf ;
doc=wczas();
window.setTimeout("lista()",doc);

var i=0;

function lista() {
f = window.atakii.document.evaluate("//table[@class='vis']",window.atakii.document,null,XPathResult.ORDERED_NODE_SNAPSHOT_TYPE,null);
tabl = f.snapshotItem(3);
a_href= tabl.getElementsByTagName('a');
//alert(a_href.length);
lista1(); 
 }

function lista1() {
    if(i < a_href.length-1)
     if(a_href[i].innerHTML == 'atak')
        document.getElementById('atakii').src = a_href[i].href+'&ukryjmenu=tak';
          i+=4;doc=wczas();
    window.setTimeout("lista1()",doc); }

}

function wczas() {
var d = (Math.random()*1500)+1000;
 if((Math.random()*50) > 40){d+=(Math.random()*1100);}
return d;}