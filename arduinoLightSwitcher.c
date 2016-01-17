#define diodaPIN 3 //diode pin
int photoPin = 0; // photoresistor pin 
int lightLevel = 0; //level of light of diode from  0 to 100
int val = 0; // read value from photoresistor from  0 to 100
 
void setup()
{
	pinMode(photoPin, INPUT); 
	pinMode(diodaPIN, OUTPUT);
	Serial.begin(9600);
}
 
void loop()
{
  val = analogRead(photoPin)/10;
  lightLevel = 100-val;
  analogWrite(diodaPIN, lightLevel);
  Serial.println(val);
}
