// MAIN vuejs file for popup.html
new Vue({
    el: '#popup',
    data() {
        return {
            formDisplay: true,
            addClient: false,
            search: null,
            companies: null,
            token: null,
            cookie:null,
            isActive: false,
            addClientForm: {
                display: false,
                client: null
            },
            info: null,
        }
    },
    // Get token when vue is created
    created: function() {
        const DATA = {};
        DATA["email"] = "antoine@freebe.me";
        DATA["password"] = "antoine";
        DATA["strategy"] = "local";
        axios.post('https://api.salameche.freebe.me/authentication', DATA, {
                headers: {
                    "Content-Type": "application/json"
                }
            })
            .then((response) => {
                this.token = response.data.accessToken;
            })
            .catch(err => {
                console.error(err);
            });
        axios.get('https://api.salameche.freebe.me/entrepreneurs')
            .then((response) => {
                this.info = response
            }).catch(error => {
                this.redirectTo('https://demo-test.freebe.me/dashboard');
            });
            this.cookie = document.cookie
    },
    // all vue methods
    methods: {
        // Display and hide components
        // Param : String component
        toggleComp: function(component) {
            this.formDisplay = !this.formDisplay;
            if (component === 'addClient') {
                this.addClient = !this.addClient;
            } else if (component === 'main') {
                this.addClient = false;
                this.addClientForm.display = false;
                this.formDisplay = true;
            } else if (component === 'addClientForm') {
                this.addClient = false;
                this.formDisplay = false;
                this.addClientForm.display = true;
            }
        },

        // run companies search when pressing enter on addClient component
        // Param : Event e
        submit: function(e) {
            if (e.key === 'Enter') {
                axios.get('https://api.salameche.freebe.me/entrepreneurs')
                    .then((response) => {
                        this.companies = response.data.data;
                    })
            }
        },
        // Search a specific client according to his siret number
        // Param : Int index
        searchClient(index) {
            this.addClientForm.client = this.companies[index];
            axios.get('https://api.salameche.freebe.me/clients?siret=' + this.companies[index].siret, {
                    headers: {
                        "Content-Type": "application/json",
                        "Authorization": this.token,
                    }
                })
                .then((response) => {
                    if (response) {
                        this.toggleComp('addClientForm');
                    }
                })
        },
        // Redirection used in case request fail
        redirectTo(url) {
            window.open(url, '_blank');
        },
        // close extension
        closeWindow() {
            window.close();
        }
    }
});
