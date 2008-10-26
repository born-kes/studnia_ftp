// przechowuje odwoÅ&#65533;anie do obiektu XMLHttpRequest
var xmlHttp = createXmlHttpRequestObject(); 

// zwraca obiekt XMLHttpRequest
function createXmlHttpRequestObject() 
{
  // przechowa odwoÅ&#65533;anie do obiektu XMLHttpRequest
  var xmlHttp;
  // jeÅ&#65533;li uruchomiony jest Internet Explorer
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
  // jeÅ&#65533;li uruchomiona jest Mozilla lub inne przeglÄ&#65533;darki
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
  // zwraca utworzony obiekt lub wyÅ&#65533;wietla komunikat o bÅ&#65533;Ä&#65533;dzie
  if (!xmlHttp)
    alert("BÅ&#65533;Ä&#65533;d podczas tworzenia obiektu XMLHttpRequest.");
  else 
    return xmlHttp;
}

// wysyÅ&#65533;a asynchroniczne Å¼Ä&#65533;danie protokoÅ&#65533;em HTTP korzystajÄ&#65533;c z obiektu XMLHttpRequest
function process()
{
  // kontynuuje jedynie jeÅ&#65533;li obiekt xmlHttp nie jest zajÄ&#65533;ty
  if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0)
  {
    // pobiera imiÄ&#65533; wpisane przez uÅ¼ytkownika w formularzu
    name = encodeURIComponent(document.getElementById("myName").value);
    // wykonuje stronÄ&#65533; qstart.php na serwerze
    xmlHttp.open("GET", "qstart.php?name=" + name, true);  
    // definiuje metodÄ&#65533; obsÅ&#65533;ugi odpowiedzi serwera
    xmlHttp.onreadystatechange = handleServerResponse;
    // wysyÅ&#65533;a Å¼Ä&#65533;danie do serwera
    xmlHttp.send(null);
  }
  else
    // jeÅ&#65533;li poÅ&#65533;Ä&#65533;czenie jest zajÄ&#65533;te, ponawia prÃ³bÄ&#65533; po 1 sekundzie
    setTimeout('process()', 1000);
}

// wykonywana automatycznie po otrzymaniu odpowiedzi z serwera
function handleServerResponse() 
{
  // kontynuuje jedynie jeÅ&#65533;li transakcja zostaÅ&#65533;a zakoÅ&#65533;czona
  if (xmlHttp.readyState == 4) 
  {
    // status 200 oznacza pomyÅ&#65533;lne ukoÅ&#65533;czenie transakcji
    if (xmlHttp.status == 200) 
    {
      // wyodrÄ&#65533;bnia wiadomoÅ&#65533;Ä&#65533; XML wysÅ&#65533;anÄ&#65533; z serwera
      xmlResponse = xmlHttp.responseXML;
      // pobiera element nadrzÄ&#65533;dny ze struktury pliku XML
      xmlDocumentElement = xmlResponse.documentElement;
      // pobiera wiadomoÅ&#65533;Ä&#65533; tekstowÄ&#65533; pierwszego potomka elementu document
      helloMessage = xmlDocumentElement.firstChild.data;
      // aktualizuje dane wyÅ&#65533;wietlane klientowi informacjami otrzymanymi z serwera
      document.getElementById("divMessage").innerHTML = '<i><A HREF="' + helloMessage + '</a></i>';
      // ponawia sekwencjÄ&#65533;
      setTimeout('process()', 1000);
    } 
    // dla statusu protokoÅ&#65533;u HTTP innego niÅ¼ 200 zgÅ&#65533;asza bÅ&#65533;Ä&#65533;d
    else 
    {
      alert("WystÄ&#65533;piÅ&#65533; bÅ&#65533;Ä&#65533;d podczas uzyskiwania dostÄ&#65533;pu do serwera: " + xmlHttp.statusText);
    }
  }
}

