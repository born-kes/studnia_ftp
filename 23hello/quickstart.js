// przechowuje odwołanie do obiektu XMLHttpRequest
var xmlHttp = createXmlHttpRequestObject(); 

// zwraca obiekt XMLHttpRequest
function createXmlHttpRequestObject() 
{
  // przechowa odwołanie do obiektu XMLHttpRequest
  var xmlHttp;
  // jeśli uruchomiony jest Internet Explorer
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
  // jeśli uruchomiona jest Mozilla lub inne przeglądarki
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
  // zwraca utworzony obiekt lub wyświetla komunikat o błędzie
  if (!xmlHttp)
    alert("Błąd podczas tworzenia obiektu XMLHttpRequest.");
  else 
    return xmlHttp;
}

// wysyła asynchroniczne żądanie protokołem HTTP korzystając z obiektu XMLHttpRequest
function process()
{
  // kontynuuje jedynie jeśli obiekt xmlHttp nie jest zajęty
  if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0)
  {
    // pobiera imię wpisane przez użytkownika w formularzu
    name = encodeURIComponent(document.getElementById("myName").value);
    // wykonuje stronę quickstart.php na serwerze
    xmlHttp.open("GET", "quickstart.php?name=" + name, true);  
    // definiuje metodę obsługi odpowiedzi serwera
    xmlHttp.onreadystatechange = handleServerResponse;
    // wysyła żądanie do serwera
    xmlHttp.send(null);
  }
  else
    // jeśli połączenie jest zajęte, ponawia próbę po 1 sekundzie
    setTimeout('process()', 1000);
}

// wykonywana automatycznie po otrzymaniu odpowiedzi z serwera
function handleServerResponse() 
{
  // kontynuuje jedynie jeśli transakcja została zakończona
  if (xmlHttp.readyState == 4) 
  {
    // status 200 oznacza pomyślne ukończenie transakcji
    if (xmlHttp.status == 200) 
    {
      // wyodrębnia wiadomość XML wysłaną z serwera
      xmlResponse = xmlHttp.responseXML;
      // pobiera element nadrzędny ze struktury pliku XML
      xmlDocumentElement = xmlResponse.documentElement;
      // pobiera wiadomość tekstową pierwszego potomka elementu document
      helloMessage = xmlDocumentElement.firstChild.data;
      // aktualizuje dane wyświetlane klientowi informacjami otrzymanymi z serwera
      document.getElementById("divMessage").innerHTML = '<i>' + helloMessage + '</i>';
      // ponawia sekwencję
      setTimeout('process()', 1000);
    } 
    // dla statusu protokołu HTTP innego niż 200 zgłasza błąd
    else 
    {
      alert("Wystąpił błąd podczas uzyskiwania dostępu do serwera: " + xmlHttp.statusText);
    }
  }
}

