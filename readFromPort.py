import serial
ser = serial.Serial('/dev/ttyACM0', 9600)
while 1 :
	f = open('outputFile', 'w+')
	line = ser.readline()
	print line
	f.write(line)

