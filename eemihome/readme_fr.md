# Lab EEMI HOME

[ Description du lab ]

## Pré-requis techniques

* Connaissance python3
* Connaissance des bases de la ligne de commande

__Note__: Le programme python est accessible à tous niveaux de connaissance du langage

## Lancer le programme

Pour lancer l'assistant vocal, il faut au préalable allumer le Raspberry Pi. Une interface graphique apparaitra en demandant un identifiant et mot de passe. À ce moment là, l'utilisateur doit passer en mode ligne de commande ( avec le raccourci `ctrl + alt + f1` ). Par la suite, se connecter à la session avec les informations suivantes :

login : pi   
password : raspberry

Une fois l'utilisateur connecté, veuillez vous connecter au réseau wifi de l'école de la manière suivante, tapez sur le terminal `links http://wwww.example.com`. Vous serez alors redirigé sur une page web depuis le terminal (et oui !) qui sera la page fortinate. Il faudra donc rentrer les informations d'un étudiant pour pouvoir se connecter au wifi ( au même titre que lorsque vous vous connectez depuis votre pc ).

Une fois la connexion effectuée, il faut se déplacer dans le dossier de l'assistant vocal et taper la commande `cd ~/eemihome`. Une fois à l'intérieur du dossier `eemihome` éxécuter le programme python avec la commande `./main.py` ou `python3 main.py`


## Problèmes rencontrés

* Trouver un moyen d'aggrandir la profondeur des questions réponses. Actuellement le système de question réponse est récursif, cependant il faut trouver le moyen de t'inpréter une réponse et d'y répondre de manière adaptée. (Cf: __user_ask()__ dans le fichier `core.py` )


## Liens utiles

SpeechRecognition : https://pypi.org/project/SpeechRecognition/  
SpeechRecognition Github : https://github.com/Uberi/speech_recognition#readme  
Github Sphinx : https://github.com/bambocher/pocketsphinx-python  
Tuto : https://realpython.com/python-speech-recognition/#working-with-microphones
