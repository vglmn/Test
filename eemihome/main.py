#!/usr/bin/env python3
# -*- coding: utf-8 -*-

import RPi.GPIO as GPIO
import core

# Détecter le bouton bleu sur le boitier en carton
GPIO.setmode(GPIO.BCM)
GPIO.setup(23, GPIO.IN, pull_up_down=GPIO.PUD_UP)

# Boucle infinie qui tourne pour détecter l'appuie du bouton
while True:
    input_state = GPIO.input(23)
    if input_state == False:
       print('Button Pressed')
       core.vocal_assistant()
