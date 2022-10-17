# OpenCV modules, for video recording
import cv2
import time
import datetime

# Modules responsible for screenshot capturing and email notification sender
import smtplib
import ssl
from email.message import EmailMessage
import pyautogui


#Command line tasks
import os


print('[CONNECTING TO THE SERVER]')

# Opening another script can be also done with suprocess
# import subprocess
#subprocess.call("streamer.py", shell=True)

# I prefer using os.system module method for this project
os.system(r'start /B start cmd.exe @cmd /k python E:\streamer.py')


print('[ACTIVATING HUMAN BODY DETECTION MODE]')

print('')

cap = cv2.VideoCapture(0)

face_cascade = cv2.CascadeClassifier(
    cv2.data.haarcascades + "haarcascade_frontalface_default.xml")
body_cascade = cv2.CascadeClassifier(
    cv2.data.haarcascades + "haarcascade_fullbody.xml")

detection = False
detection_stopped_time = None
timer_started = False
SECONDS_TO_RECORD_AFTER_DETECTION = 5

frame_size = (int(cap.get(3)), int(cap.get(4)))
fourcc = cv2.VideoWriter_fourcc(*"mp4v")

while True:
    _, frame = cap.read()

    gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
    faces = face_cascade.detectMultiScale(gray, 1.3, 5)
    bodies = face_cascade.detectMultiScale(gray, 1.3, 5)

    if len(faces) + len(bodies) > 0:
        if detection:
            timer_started = False
        else:
            detection = True
            current_time = datetime.datetime.now().strftime("%d-%m-%Y-%H-%M-%S")
            out = cv2.VideoWriter(f"{current_time}.mp4", fourcc, 20, frame_size)
            print("[STARTING RECORDING...]")
            print('')

            print("[IMAGE CAPTURE...]")
            #SCREENSHOT
            myScreenshot = pyautogui.screenshot()
            myScreenshot.save(f"E:\{current_time}.png")

            print('[SENDING EMAIL NOTIFICATION]')

            # Define email sender and receiver
            email_sender = 'SOMEMAILHERE@MAIL.NET'
            email_password = 'YOURPASSWORDHERE'
            email_receiver = 'SOMEMAILHERE@MAIL.NET'

            # Set the subject and body of the email
            subject = 'Your camera detected a human body!'
            body = """
                        HUMAN BODY WAS CAPTURED ON YOUR CAMERA!

                        Please find attached the image captured of the moment when the movement was detected.
                        
                        The video will be available on this link, https://onedrive.live.com/?id=root&cid=2D7CF4FBD5ECCC20, when recording is finished! 
                        
                        Stay safe with SecureLink
                        """
            em = EmailMessage()
            em['From'] = email_sender
            em['To'] = email_receiver
            em['Subject'] = subject
            em.set_content(body)

            files = [f"E:\{current_time}.png"]
            for file in files:
                with open(file, 'rb') as f:
                    file_data = f.read()
                    file_name = f.name

                em.add_attachment(file_data, maintype='application', subtype='octet-stream', filename=file_name)

            # Add SSL (layer of security)
            context = ssl.create_default_context()

            # Log in and send the email
            with smtplib.SMTP_SSL('smtp.gmail.com', 465, context=context) as smtp:
                smtp.login(email_sender, email_password)
                smtp.sendmail(email_sender, email_receiver, em.as_string())

            ####################



    elif detection:
        if timer_started:
            if time.time() - detection_stopped_time >= SECONDS_TO_RECORD_AFTER_DETECTION:
                detection = False
                timer_started = False
                out.release()
                print('[STOP RECORDING]')

                # MOVING VIDEO FILE INTO PERSONAL STORAGE/CLOUD
                #os.system('cmd /c "move C:\some\directory\folders\path\*.mp4 C:\someAnother\directory\folders\path\Desktop"')
        else:
            timer_started = True
            detection_stopped_time = time.time()

    if detection:
        out.write(frame)

    # for (x, y, width, height) in faces:
    #    cv2.rectangle(frame, (x, y), (x + width, y + height), (255, 0, 0), 3)

    cv2.imshow("Camera", frame)

    if cv2.waitKey(1) == ord('q'):
        break

out.release()
cap.release()
cv2.destroyAllWindows()


