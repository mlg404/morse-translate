#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>

const char* ssid = "vme";
const char* password = "fernandogod";

void setup () {
  pinMode(12, OUTPUT);
  Serial.begin(9600);
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {

    delay(1000);
    Serial.print("Conectando...");

  }

}

void loop() {

  if (WiFi.status() == WL_CONNECTED) { //checa wifi
    Serial.println("Conectado");
    HTTPClient http;  //objeto da classe httpclient

    http.begin("http://exatas.ml/blabla.php");  // faz uma request ao servidor
    int httpCode = http.GET();                  //envia a request
    Serial.println(httpCode);
    if (httpCode != 0) { //se tiver algum codigo de retorno, ele prossegue
      Serial.println("request feita");
      String codigo = http.getString(); // pega o morse como string
      Serial.println(codigo); //exibe o morse no console
      for (int i = 0; i < codigo.length(); i++) { // realiza o codigo morse no led
        Serial.println(codigo[i]);
        if (codigo[i] == '.'){
          digitalWrite(12, HIGH);
          delay(300);  
          digitalWrite(12, LOW);
        } else if (codigo[i] == '-'){
          digitalWrite(12, HIGH);
          delay(700);  
          digitalWrite(12, LOW);
        } else if (codigo[i] == ' '){
          delay(750); 
        } else {
          delay(1000); 
        }
        delay(300);
      }
    }

http.end();   // fecha a request

}

delay(20000);    //refaz tudo a cada 20 segundos

}
