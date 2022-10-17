
#THIS FILE TRIGGERS WHEN THE TURN ON BUTTON FOR LIVE TRANSMISSION IS PRESSED
#THIS WILL ONLY WORK IF "VIDSTREAM" MODULE IS INSTALLED WITH PIP-PYTHON

from vidstream import StreamingServer

import threading

receiver = StreamingServer('192.168.1.164', 9999) #IP OF A DEVICE WHERE THE LIVE TRANSMISSION WILL BE DISPLAYED (THIS ONE)

t = threading.Thread(target=receiver.start_server)

t.start()

while input("") != "STOP":
    continue

receiver.stop_server()
