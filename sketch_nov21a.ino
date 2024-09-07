#include <WiFi.h>
#include <HTTPClient.h>


// Replace with your network credentials
const char* ssid     = "Reaver";
const char* password = "GratisanNgimpi123";


// API endpoint
const char* serverName = "http://192.168.100.129/iot_vokasi/api_jarak.php";


// Initializing random seed
unsigned long lastTime = 0;  
unsigned long timerDelay = 10000;  // send data every 10 seconds


void setup() {
  Serial.begin(115200);
 
  // Connect to Wi-Fi
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi...");
  }
  Serial.println("Connected to WiFi");
}


void loop() {
  // Send data every 10 seconds
  if ((millis() - lastTime) > timerDelay) {
    // Generating random distance data
    int distance = random(30, 200); // generate random number between 30 and 200
   
    sendDistanceData(distance);
   
    lastTime = millis();
  }
}


void sendDistanceData(int distance) {
  HTTPClient http;
 
  http.begin(serverName);
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
 
  String httpRequestData = "nama_alat=sensor_jarak1&keterangan_alat=sensorjarak1&nilai=" + String(distance);
  int httpResponseCode = http.POST(httpRequestData);
 
  if (httpResponseCode>0) {
    Serial.print("HTTP Response code: ");
    Serial.println(httpResponseCode);
  } else {
    Serial.print("Error code: ");
    Serial.println(httpResponseCode);
  }
 
  // Free resources
  http.end();
}


