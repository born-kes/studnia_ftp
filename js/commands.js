// ==UserScript==
// @name           Filtrowanie rozkazów
// @namespace      http://code.google.com/p/plemiona-skrypty/
// @description    Filtrowanie rozkazów - bez wykrywania fake'ów. Wymaga konta Premium.
// @version        1.9.0001
// @include        http://pl*.plemiona.pl/game.php*screen=overview_villages*mode=comm*
// @include        http://pl*.plemiona.pl/game.php*screen=overview_villages*mode=inco*
// @include        http://pl*.plemiona.pl/game.php*screen=info_village*
// @license        Creative Commons 3.0 BY-SA (http://creativecommons.org/licenses/by-sa/3.0/deed.pl)
// @author         szatdafakp - Forum Plemion
// @contributor    Lukasz032 - Plemiona Œ7
// @contributor    Nexces
// ==/UserScript==

if (window.opera) {
        unsafeWindow = window;
}else{ unsafeWindow = window;}
var fakesHidden = false;
function gN(a,b) { return a.getElementsByTagName(b);}

function trim(str, chars) {
    return ltrim(rtrim(str, chars), chars);
}

function ltrim(str, chars) {
    chars = chars || "\\s";
    return str.replace(new RegExp("^[" + chars + "]+", "g"), "");
}

function rtrim(str, chars) {
    chars = chars || "\\s";
    return str.replace(new RegExp("[" + chars + "]+$", "g"), "");
}

function isFake(tableRow) {
        if (tableRow.getElementsByTagName('noscript').length > 0) {
                tableRow.innerHTML = trim(tableRow.innerHTML).substring(10, tableRow.innerHTML.length - 11);
        }
        var cells = tableRow.getElementsByTagName('td');
        if (cells.length == 15) {
                var space = [1, 1, 1, 1, 2, 4, 5, 6, 6, 8, 10, 100];
                var spaceSum = 0;
                for (i = 0; i < 12; i++ ) {
                        spaceSum += (parseInt(cells[3 + i].textContent) * space[i]);
                }
                return (spaceSum < 250 && parseInt(cells[14].textContent) == 0);
        } else if (cells.length == 12) {
                var space = [1, 1, 1, 2, 4, 6, 6, 8, 100];
                var spaceSum = 0;
                for (i = 0; i < 9; i++ ) {
                        spaceSum += (parseInt(cells[3 + i].textContent) * space[i]);
                }
                return (spaceSum < 250 && parseInt(cells[11].textContent) == 0);
        }

}

function addListBox(villages) {
        var tables = document.getElementsByTagName('table');
              var v = 0;
        if (document.URL.indexOf("mode=inco") >= 0){   v++;
        var tab = document.getElementById("incomings_table"); }
        else
        var tab = document.getElementById("commands_table");

            var cel = gN(gN(tab,'tr')[0],'th')[v];  cel.innerHTML +=' <br /> ';

        if (document.URL.indexOf("mode=comm") >= 0) {
                var checkbox = document.createElement("input");
                checkbox.setAttribute("type", "checkbox");
                checkbox.setAttribute("onchange", "setFakesHidden(this.checked);");
                cel.appendChild(checkbox);
                cel.innerHTML += "Ukryj fejki <br />";
        }
         var select = document.createElement('select');
        var option = document.createElement('option');
        option.text = "Wszystkie"
        option.value = "Wszystkie";
        select.add(option,null);
        for (var i = 0; i < villages.length; i++) {
                option = document.createElement('option');
                option.text = villages[i];
                option.value = villages[i];
                select.add(option,null);
        }
        select.setAttribute("onchange", "filter(this.value)");
        select.setAttribute("onkeyup", "filter(this.value)");
        select.setAttribute("id", "villageSelect");
        cel.appendChild(select);

        return select;
}

unsafeWindow.filter = function filter(village) {
        if (document.URL.indexOf("mode=inco") >= 0)
        var ordersTable = document.getElementById("incomings_table");
        else
        var ordersTable = document.getElementById("commands_table");

        var rows = ordersTable.getElementsByTagName('tr');
        var rowAClass ="nowrap row_a";
        var rowBClass ="nowrap row_b";
        var rowNumber = 0;

        for (var i=1; i < rows.length; i++) {
                var order = rows[i].textContent;
                order = trim(order);
                if ((village == null || order.indexOf(village) < 0 && village != "Wszystkie") || (fakesHidden && isFake(rows[i]))){
                        rows[i].style.display="none";
                } else {
                        rows[i].style.display="";
                        rows[i].className = (rowNumber % 2 == 0 ? rowAClass : rowBClass);
                        rowNumber++;
                }
        }
}

unsafeWindow.setFakesHidden = function setFakesHidden(value) {
        fakesHidden = value;
        unsafeWindow.filter(document.getElementById("villageSelect").value);
}

function addLinks() {
        var tables = document.getElementsByTagName('table');
        for (i = tables.length-1; i >= 0; i--) {
                if ( tables[i].getElementsByTagName('tr').length > 1 && trim(tables[i].getElementsByTagName('tr')[1].textContent).substring(0, 11) == "Wspó³rzêdne") {
                        var coords = tables[i].getElementsByTagName('tr')[1].getElementsByTagName('td')[1].textContent;
                        var newRow = document.createElement("tr");
                        var newCell = document.createElement("td");
                        newCell.setAttribute("colspan", "2");
                        newCell.innerHTML = "<a href='/game.php?screen=overview_villages&page=-1&group=0&mode=commands&type=attack&coords=" + coords + "'>» Poka¿ ataki wys³ane na wioskê</a>"
                        newRow.appendChild(newCell);
                        tables[i].getElementsByTagName('tbody')[0].appendChild(newRow);

                        newRow = document.createElement("tr");
                        newCell = document.createElement("td");
                        newCell.setAttribute("colspan", "2");
                        newCell.innerHTML = "<a href='/game.php?screen=overview_villages&page=-1&group=0&mode=commands&type=support&coords=" + coords + "'>» Poka¿ wsparcia wys³ane do wioski</a>"
                        newRow.appendChild(newCell);
                        tables[i].getElementsByTagName('tbody')[0].appendChild(newRow);

                        break;
                }
        }
}

function createVillagesList() {    //  alert(document.URL.indexOf("mode=inco"));
        if (document.URL.indexOf("mode=inco") >= 0){var v=true;
        var ordersTable = document.getElementById("incomings_table");
        }else{                                      var v=false;
        var ordersTable = document.getElementById("commands_table");}

        var rows = ordersTable.getElementsByTagName('tr');   rows[0].getElementsByTagName('th')[0].style.width ='400px';
        var villages = new Array(0);
        for (i = 1; i < rows.length-1; i++) {

                if (v){
                       if ( v && i == rows.length-1){break;}
                       var target = rows[i].cells[1].textContent;
                       var order = trim(gN(rows[i],'a')[0].className);
                //var orders= trim(rows[i].getElementsByTagName('td')[1].textContent);
                       var orders = trim(gN(rows[i],'td')[1].textContent);
                       }else{
                var order = trim( rows[i].getElementsByTagName('td')[0].innerHTML );
                var orders= trim( rows[i].getElementsByTagName('td')[0].textContent );
                             }
                var village;
                if (order.match(/attack.png/)) {// "Atak na"
                        village = orders;
                } else if (order.match(/support-icon/)) { //"Odes³an"
                        village = orders;
                } else if (order.match(/return.png/)  ) { //"Powrót "
                        village = orders;
                } else if (order.match(/support.png/) ) { //"Wsparci"
                        village = orders;
                } else if (order.match(/back.png/)    ) { //"Odwrót "
                        village = orders;
                } else if (order.match(/cancel.png/)  ) { //"Przerwana"
                        village = orders;
                } else if (order.match(/attack-icon/) && v) {
                        village = target;
                } else if (order.match(/support-icon/)&& v) {
                        village = target;
                }
                var j = 0;
                for (j = 0; j < villages.length; j++) {
                        if (villages[j] == village) {
                                break;
                        }
                }

                if (j == villages.length) {
                        villages[villages.length] = village;
                }

        } alert('jest');
       return villages;
}
// entry point
if (document.URL.indexOf("mode=comm") >= 0 || document.URL.indexOf("mode=inco") >= 0) {
        var listbox = addListBox(createVillagesList());                                alert(document.URL);
        if (document.URL.indexOf("coords") >= 0) {
                var coords = document.URL.substring(document.URL.indexOf("coords") + 7);
                var options = listbox.options;
                var i;
                for (i = 0; i < options.length; i++) {
                        if (options[i].textContent.indexOf(coords) >= 0) {
                                listbox.selectedIndex = i;
                                filter(listbox.value);
                                break;
                        }
                }
                if (i == options.length) {
                        if ( document.URL.indexOf("type=support") >= 0) {
                                alert("Nie wys³a³eœ ¿adnych wsparæ do wybranej wioski");
                        } else if ( document.URL.indexOf("type=attack") >= 0 ) {
                                alert("Nie wys³a³eœ ¿adnych ataków na wybran¹ wioskê");
                        }
                }
        }
} else if (document.URL.indexOf("screen=info_village")) {
        addLinks();
}                   alert('podlaczony');
