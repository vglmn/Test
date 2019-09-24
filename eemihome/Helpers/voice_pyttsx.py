#!/usr/bin/env python3
# -*- coding: utf-8 -*-

import pyttsx3

# Liste des voix utilisables et réglage de celles-ci 

engine = pyttsx3.init()
voices = engine.getProperty("voices")

for voice in voices:
    print(voice, voice.id)
    engine.setProperty("voices", voice.id)
    engine.setProperty('voice', 'english+f1')

    # engine.setProperty("gender", "female")
    engine.say("Hello world")
    engine.runAndWait()
    engine.stop()
