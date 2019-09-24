#!/bin/bash

main() {

 printf "%s \n" "Classe à entrer:"
 read -r classe

 printf "%s \n" "Entrer le nom:"
 read -r nom

 if [[ "$nom" = "exit" ]]; then
 	exit 0; 
 elif [[ "$nom" = "quit" ]]; then
 	exit 0;
 fi

 printf "%s \n" "Entrer le prenom:"
 read -r prenom

 printf "%s \n" "Note à entrer"
 read -r note

 if ! [[ "$note" =~ ^[0-9]+$ ]]; then
    	echo " "
    	mention="La note doit être comprise entre 0 et 20 à corriger dans le fichier .csv"
        echo "$mention"
        echo " "

 elif [[ "$note" -ge "21" ]]; then
 	echo " "
 	mention="La note entrée ne doit pas dépasser 20 à corriger dans le fichier .csv"
 	echo "$mention"
 	echo " "

 elif [[ "note" -eq "20" ]]; then
 	echo " "
 	mention="Excellent."
 	echo "$mention"
 	echo " "

 elif [[ "$note" -ge "16" ]]; then
 	echo " "
 	mention="Très bien."
 	echo "$mention";
 	echo " "

 elif [[ "$note" -ge "14" ]]; then
 	echo " "
 	mention="Bien."
 	echo "$mention";
 	echo " "

 elif [[ "$note" -ge "12" ]]; then
 	echo " "
 	mention="Assez bien."
 	echo "$mention"
 	echo " "

 elif [[ "$note" -ge "10" ]]; then
 	echo " "
 	mention="Moyen."
 	echo "$mention"
 	echo " "

 elif [[ "$note" -le "9" ]]; then
 	echo " "
 	mention="Insuffisant."
 	echo "$mention"
 	echo " "

fi

echo "$classe, $nom, $prenom, $note, $mention" >> "$classe".csv
#Ne renvois pas la phrase mais, sert à poster les inputs dans un csv au nom de la classe

}

while [ main ]
do
	main

done