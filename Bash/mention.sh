#!/bin/bash

main() {


 printf "%s \n" "Note à entrer"
 read -r note

 if ! [[ "$note" =~ ^[0-9]+$ ]]
    then
    	echo " "
        echo "La note doit être comprise entre 0 et 20."
        echo " "

 elif [[ "$note" -ge "21" ]]; then
 	echo " "
 	echo "La note maximale est 20."
 	echo " "

 elif [[ "note" -eq "20" ]]; then
 	echo " "
 	echo "Excellent."
 	echo " "

 elif [[ "$note" -ge "16" ]]; then
 	echo " "
 	echo "Très bien.";
 	echo " "

 elif [[ "$note" -ge "14" ]]; then
 	echo " "
 	echo "Bien.";
 	echo " "

 elif [[ "$note" -ge "12" ]]; then
 	echo " "
 	echo "Assez bien."
 	echo " "

 elif [[ "$note" -ge "10" ]]; then
 	echo " "
 	echo "Moyen."
 	echo " "

 elif [[ "$note" -le "9" ]]; then
 	echo " "
 	echo "Insuffisant."
 	echo " "

fi

}

while [ main ]
do
	main

done