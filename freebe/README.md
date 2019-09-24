# Freebe

Extension Chrome - Firefox - WORKSHOP freebe

## Authors
* Victor Legac
* Guillaume Martin
* Quentin Champenois

## Description
Outil de gestion et de facturation pour auto-entrepreneur

Gère toute ton activité administrative avec Freebe, outil de facturation et comptabilité pour auto-entrepreneur et micro-entrepreneur

L'extension de Freebe pour google chrome sert à avoir un accès rapide au site via un bouton qui se rajoute à droite de la barre de navigation, et d'afficher les informations relatives au compte (chiffre d'affaire, nombre de clients et factures etc...) dans à l'ouverture d'un nouvel onglet, et permet d'avoir un accès rapide au site sans avoir à directement se rendre dessus.

## Utilisation & réglages
Pour utiliser l'extension, se rendre sur : chrome://extensions/ , en haut à droite le mode développeur doit être activé (curseur sur la droite), un menu s'affichera "Chargez l'extension non empaquetée" "Empaqueter l'extension" "Mettre à jours", choisir "Chargez l'extension non empaquetée", prendre la racine du dossier (dans cet exemple : freebe), puis activer l'extension.

## Mise en production

### Empacter l'extension
Une fois l'application créer (dans cet exemple, le dossier freebe), se rendre sur : chrome://extensions/ comme vu dans l'Utilisation, choisir cette fois "Empaqueter l'extension", choisir le dossier racine de l'extension (celui qui contiens le fichier manifest.json), la clé privée étant facultative il n'est pas obligatoire de la renseigner.

Une fois le dossier selectionner une fenêtre de confirmation vous informera de bien conserver le fichier .perm et de ne pas le supprimer, garder le fichier .crx dans le dossier contenant le manifest .json, supprimez la version non empaquetée (afin d'éviter tout conflit avec l'application empaquetée), pour l'installé faites glisser le fichier .crx sur le navigateur Google Chrome

### La publication dans le Chrome Web Store

Lorsque votre application Chrome est prête, suivez la procédure de publication pour faire figurer votre application dans le Chrome Web Store.
Pour que les utilisateurs trouvent facilement l'application, pensez à :

* publier votre application dans une catégorie appropriée ; 
* définir la visibilité sur Publique ou Non répertoriée. L'application kiosque ne fonctionne pas si vous sélectionnez l'option Privée.

La doc officiel de Chrome : https://developer.chrome.com/webstore/publish

La doc officiel de Mozilla : https://developer.mozilla.org/fr/docs/Mozilla/Add-ons/Distribution

## Structure

* extension
  * manifest.json -> Fichier requis pour que l'extension soit reconnue par Chrome
  * background.js -> Doit être déclaré dans le manifest.json pour définir de quelle extension il s'agit
  * popup.html -> Permet d'avoir l'interface utilisateurs (lorsque l'on clique sur l'icone de l'extension)

L'icone peut être changée en changeant le "img/images.ico", ligne 21 dans le manifest.json
Le token d'identification est actuellement enrengistré dans le popup.js

## CDN
Styles freebe :
https://cdn.freebe.me/assets-fmXXlcpcIK/styles/styles.css

## Docs links
https://developer.chrome.com/extensions/getstarted  
https://developer.mozilla.org/fr/docs/Mozilla/Add-ons/WebExtensions/Your_first_WebExtension
https://www.w3schools.com/js/js_cookies.asp

New-tab doc :  
https://developer.chrome.com/extensions/override
https://developer.apple.com/library/archive/documentation/Tools/Conceptual/SafariExtensionGuide/UsingExtensionBuilder/UsingExtensionBuilder.html
