# Freebe

Extension Chrome - Firefox - WORKSHOP freebe

## Authors
* Victor Legac
* Guillaume Martin
* Quentin Champenois

## Description
Trouvez ici la doc technique concernant les stacks du projet:
 * html
    * templating vu.js
 * css
    * css
    * scss
    * stylus
 * js
    * vu.js

## Tips&Tricks

Deux pages, deux vues séparées et indépendantes pour la newtab et le popup

### backgroun.js

 * data()

    initialize les variables pour avoir un scope global, on utilise les variables avec this dans le js ou la variable seule dans le template
    https://gitlab.eemi.tech/quentin.champenois/freebe/blob/master/js/background.js#L4-14

 * mounted()
    méthode d'init: équivalent à $(document).ready() pour jquery

    https://gitlab.eemi.tech/quentin.champenois/freebe/blob/master/js/background.js#L15-62
    * axios.get | axios.post
        methode pour call api

        Execption pour certains endpoint :
```javascript
        const PAYLOAD = {};
                PAYLOAD["email"] = "antoine@freebe.me"
                PAYLOAD["password"] = "antoine"
                PAYLOAD["strategy"] = "local"

```
Crédential pour récupérer un token d'auth /!\
 * methods:
    objet où on range tout ,un tas de méthode cool, comme la méthode dark qui passe un booléen pour activer un thème sombre et agréable pour les yeux
    https://gitlab.eemi.tech/quentin.champenois/freebe/blob/master/js/background.js#L70-85

    * dark() permet de créer un cookie "darkmode" lorsqu'il est activé, sinon le supprime 

### popup.js

Vue #popup
* data()
    initialize les variables pour avoir un scope global, on utilise les variables avec this dans le js ou la variable seule dans le template
    https://gitlab.eemi.tech/quentin.champenois/freebe/blob/master/js/popup.js#L4-18

* created()
    hook appelé une fois que l'instance est créée.
    Celui-ci permet de récupérer directement les informations utilisateurs dès l'instanciation de la vue
    https://gitlab.eemi.tech/quentin.champenois/freebe/blob/master/js/popup.js#L21-45

    * axios.post -> authentification sur l'api freebe
    * axios.get -> récupérer les informations d'entrepreneurs pour définir l'utilisateur affiché dans l'extension, si celui-ci rencontre une erreur, l'utilisateur est renvoyé vers le site de démo de freebe
        Ensuite, on récupére les cookies de l'extension pour savoir si l'utilisateur est en darkmode
        https://gitlab.eemi.tech/quentin.champenois/freebe/blob/master/js/popup.js#L23

* methods: Obj
    Un tas de méthodes cool
    https://gitlab.eemi.tech/quentin.champenois/freebe/blob/master/js/popup.js#L46-98

   * toggleComp(component) permet d'afficher ou cacher un composant html  
    component: String

    * submit(e) permet d'effectuer un call sur l'api lorsque l'utilisateur appuie sur Entrée au moment de rechercher un client dans le composant addClient  
    e: Event

    * searchClient(index) permet de cliquer sur le nom d'un client affiché et récupérer ses informations pour les afficher dans le formulaire de création  
    index: Int  
    Celui-ci récupère le client dans la variable this.companies

    * redirectTo(url) redirige vers l'url souhaité
    url: String

    * closeWindow() ferme l'extension
