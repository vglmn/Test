#!/usr/bin/env python3
# -*- coding: utf-8 -*-

import speech_recognition as sr
import pyttsx3 as pyttsx
import os

def speaker(string, assistantHaveToRespond=False):
    """
        Transforme une string en audio

        pyttsx3 permet de lire en audio la chaine de caractere
        string: chaine de caractere
        assistantHaveToRespond: s'il est True, alors on étudie le contenu de la variable string et la variable to_say devient la réponse de l'assistant
    """
    engine = pyttsx.init()

    engine.setProperty('voice', "french+f2")
    engine.setProperty('rate', "-20")
    if assistantHaveToRespond is True:
        to_say = user_ask(string)
    else:
        to_say = string

    engine.say(to_say)
    engine.runAndWait()

def user_ask(asking):
    """
        Choisi une action en fonction de la demande de l'utilisateur

        TODO: Trouver un autre moyen de répondre à une question. Cette fonction est trop rigide, soit passer par un tableau de variable ou un fichier contenant des réponses en fonction des questions.
    """
    response = ""

    if asking == "agenda":
        response = "Vous avez demandé l'agenda"
        next = "Quel est votre classe ?"
        return response, next
    elif asking == "actualités":
        response = "Vous avez choisi les actualités"
    elif asking == "Zino":
        os.system("cmatrix")
    elif asking == "à l'aide":
        os.system("cowsay -f ghostbusters ZINO ALEEEED !")
    else:
        response = "Veuillez répéter"
        return response, False

    return response, False

def audio_to_text(record, audio):
    """
        Transforme un audio en texte en utilisant la librairie Sphinx

        record:
        audio: audio enregistré depuis le micro
    """
    try:
        print("--------------------------")
        print("Audio to text...")
        print("--------------------------")
        return record.recognize_google(audio, language="fr-FR")
    except sr.UnknownValueError:
        # Sphinx n'a pas pu traduire l'audio en texte
        print("Sphinx could not understand audio")
        return 2
    except sr.RequestError as e:
        # Une erreur quelconque s'est produite
        print("Sphinx error; \n =>  {0}".format(e))
        return 1

def microphoneListener():
    """
        Record audio from microphone
        return src, audio
    """
    record = sr.Recognizer()

    with sr.Microphone() as source:
        # Minimiser le bruit ambiant
        record.adjust_for_ambient_noise(source)

        print("--------- Say something ! ------------")
        audio = record.listen(source)
    return record, audio

def questionAnswer(question):
    """ Permet de poser une question en audio et de récupérer une réponse via le microphone de l'assistant """
    # On active le micro
    record, askAudio = microphoneListener()
    # L'assistant pose une première question
    speaker(question)
    # On transforme la réponse de l'utilisateur en texte
    response = audio_to_text(record, askAudio)

    return response

def vocal_assistant(message="Que puis-je pour vous ?"):
    """ vocal_assistant permet de lancer l'assistant vocal, de poser une question et d'interpréter les réponses """

    #  Récupérer la réponse de la question message
    response = questionAnswer(message)

    if response:
        assistantResponse, nextQuestion = user_ask(response)

        if nextQuestion is not False:
            speaker(assistantResponse)
            return vocal_assistant(nextQuestion)
        else:
            return vocal_assistant(assistantResponse)
