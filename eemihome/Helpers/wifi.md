# Connecter le wifi

Modifier le fichier `wpa_supplicant.conf`

    sudo vim /etc/wpa_supplicant/wpa_supplicant.conf

Dans celui-ci, renseigner

    network={
      ssid="NOM_DU_RESEAU"
      psk="PASSWORD"
      key_mgmt=WPA-PSK
    }


Et __reboot__ le raspberry si le réseau n'est pas là.

Pour voir si un réseau est détecté

    sudo iwlist wlan0 scanning | less | grep NOM_DU_RESEAU
