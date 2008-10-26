// przechowuje odwo�&#65533;anie do obiektu XMLHttpRequest
var xmlHttp = createXmlHttpRequestObject(); 

// zwraca obiekt XMLHttpRequest
function createXmlHttpRequestObject() 
{
  // przechowa odwo�&#65533;anie do obiektu XMLHttpRequest
  var xmlHttp;
  // je�&#65533;li uruchomiony jest Internet Explorer
  if(window.ActiveXObject)
  {
    try
    {
      xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    catch (e) 
    {
      xmlHttp = false;
    }
  }
  // je�&#65533;li uruchomiona jest Mozilla lub inne przegl�&#65533;darki
  else
  {
    try 
    {
      xmlHttp = new XMLHttpRequest();
    }
    catch (e) 
    {
      xmlHttp = false;
    }
  }
  // zwraca utworzony obiekt lub wy�&#65533;wietla komunikat o b�&#65533;�&#65533;dzie
  if (!xmlHttp)
    alert("B�&#65533;�&#65533;d podczas tworzenia obiektu XMLHttpRequest.");
  else 
    return xmlHttp;
}

// wysy�&#65533;a asynchroniczne ż�&#65533;danie protoko�&#65533;em HTTP korzystaj�&#65533;c z obiektu XMLHttpRequest
function process()
{
  // kontynuuje jedynie je�&#65533;li obiekt xmlHttp nie jest zaj�&#65533;ty
  if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0)
  {
    // pobiera imi�&#65533; wpisane przez użytkownika w formularzu
    name = encodeURIComponent(document.getElementById("myName").value);
    // wykonuje stron�&#65533; qstart.php na serwerze
    xmlHttp.open("GET", "qstart.php?name=" + name, true);  
    // definiuje metod�&#65533; obs�&#65533;ugi odpowiedzi serwera
    xmlHttp.onreadystatechange = handleServerResponse;
    // wysy�&#65533;a ż�&#65533;danie do serwera
    xmlHttp.send(null);
  }
  else
    // je�&#65533;li po�&#65533;�&#65533;czenie jest zaj�&#65533;te, ponawia prób�&#65533; po 1 sekundzie
    setTimeout('process()', 1000);
}

// wykonywana automatycznie po otrzymaniu odpowiedzi z serwera
function handleServerResponse() 
{
  // kontynuuje jedynie je�&#65533;li transakcja zosta�&#65533;a zako�&#65533;czona
  if (xmlHttp.readyState == 4) 
  {
    // status 200 oznacza pomy�&#65533;lne uko�&#65533;czenie transakcji
    if (xmlHttp.status == 200) 
    {
      // wyodr�&#65533;bnia wiadomo�&#65533;�&#65533; XML wys�&#65533;an�&#65533; z serwera
      xmlResponse = xmlHttp.responseXML;
      // pobiera element nadrz�&#65533;dny ze struktury pliku XML
      xmlDocumentElement = xmlResponse.documentElement;
      // pobiera wiadomo�&#65533;�&#65533; tekstow�&#65533; pierwszego potomka elementu document
      helloMessage = xmlDocumentElement.firstChild.data;
      // aktualizuje dane wy�&#65533;wietlane klientowi informacjami otrzymanymi z serwera
      document.getElementById("divMessage").innerHTML = '<i><A HREF="' + helloMessage + '</a></i>';
      // ponawia sekwencj�&#65533;
      setTimeout('process()', 1000);
    } 
    // dla statusu protoko�&#65533;u HTTP innego niż 200 zg�&#65533;asza b�&#65533;�&#65533;d
    else 
    {
      alert("Wyst�&#65533;pi�&#65533; b�&#65533;�&#65533;d podczas uzyskiwania dost�&#65533;pu do serwera: " + xmlHttp.statusText);
    }
  }
}

