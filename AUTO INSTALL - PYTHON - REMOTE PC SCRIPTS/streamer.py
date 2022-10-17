

# Modules for Spider/Web crawler
import requests
from bs4 import BeautifulSoup

# Module for 1sec wait
from time import sleep

def variable():
    while True:
        global trigger
        url = 'http://192.168.1.164/streaming/camera.php'

        # open with GET method
        resp = requests.get(url)

        # http_respone 200 means OK status
        if resp.status_code == 200:
            print("Successfully opened the web page")

            # we need a parser,Python built-in HTML parser is enough .
            soup = BeautifulSoup(resp.text, 'html.parser')

            # l is the list which contains all the text i.e news
            l = soup.find("div", {"class": "variable"})

            # now we want to print only the text part of the anchor.
            # find all the elements of a, i.e anchor

            for i in l:
                trigger = i

            print(trigger)
            sleep(1)

            if trigger == '2':

                print('Connecting to the server...')

                from vidstream import ScreenShareClient

                import threading

                sender = ScreenShareClient('192.168.1.164', 9999)

                t = threading.Thread(target=sender.start_stream)

                t.start()

                while True:
                    url = 'http://192.168.1.164/streaming/camera.php'

                    # open with GET method
                    resp = requests.get(url)

                    # http_respone 200 means OK status
                    if resp.status_code == 200:
                        print("Successfully opened the web page")

                        # we need a parser,Python built-in HTML parser is enough .
                        soup = BeautifulSoup(resp.text, 'html.parser')

                        # l is the list which contains all the text i.e news
                        l = soup.find("div", {"class": "variable"})

                        # now we want to print only the text part of the anchor.
                        # find all the elements of a, i.e anchor

                        for i in l:
                            trigger = i

                        print(trigger)
                        sleep(1)
                        if trigger == '1':
                            print('Turning Off the Live Transmition...')
                            sender.stop_stream()
                            variable()
                        else:
                            continue


variable()