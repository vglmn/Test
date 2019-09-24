// Javascript file for newpage.html
new Vue({
    el: '#app',
    data() {
        return {
            info: null,
            client: null,
            token: null,
            logo: "img/bleu_transparent.png",
            show: true,
            isActive:false,
            random: [],
        }
    },
    mounted() {
        // Define random number for html graph
        for (var i = 0; i < 11; i++) {
            this.random.push(Math.floor(Math.random() * (121 - 0)));
        }
        // ----------------------------------------
        // Define datas required for post request on api
        const PAYLOAD = {};
        PAYLOAD["email"] = "antoine@freebe.me"
        PAYLOAD["password"] = "antoine"
        PAYLOAD["strategy"] = "local"

        axios.post('https://api.salameche.freebe.me/authentication', PAYLOAD, {
            headers: {
                'Content-type': 'application/json',
            }
        }).then((res) => {
            this.token = res.data.accessToken
            // With the current token make some request
            axios.get('https://api.salameche.freebe.me/clients', {
                    headers: {
                        'Content-type': 'application/json',
                        'Authorization': this.token
                    },
                })
                .then((res_c) => {
                  // Get client
                    this.client = res_c
                })
                .catch(err => {
                  console.error(err);
                })
        })
        // get entrepreneurs and define info user
        axios.get('https://api.salameche.freebe.me/entrepreneurs')
            .then((response) => {
                this.info = response
            })
            .catch(err => {
              console.error(err);
            })

        // Hide splash screen
        setTimeout(() => {
            this.show = false;
        }, 3000);

    },
    created: function() {
      if (document.cookie) {
        if (document.cookie === 'darkmode') {
          this.isActive = true;
        }
      }
    },
    methods: {
      // dark function allows to switch between original and darkmode
        dark: function() {
            this.isActive = !this.isActive
            if (!this.isActive) {
                this.logo = "img/bleu_transparent.png";
                document.cookie = "darkmode; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            } else {
              var d = new Date();
              d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
              var expires = "expires="+d.toUTCString();
                document.cookie = "darkmode;"+ expires +";path=/";
                this.logo = "img/white_fd_transparent.png";
            }
        }
    },
});
