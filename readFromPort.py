import serial
ser = serial.Serial('/dev/ttyACM0', 115200)
while 1 :
	f = open('outputFile', 'w+')
	line = ser.readline()
	print line
	f.truncate(0)
	f.write(line)

