#!/bin/bash

dir=$1

if [[ $1 && $2 ]]; then
	echo " "
	echo "On ne peut avoir qu'un seul dossier : supprimez '$2' de la ligne de commande."
	echo " "
elif
	
	[[ -d "$dir" ]]; then
	echo "Triage des fichiers par poids :"
	echo " "
    ls $1/ -S | head -n 5
    echo " "
    echo "Triage des fichiers par dernière modification :"
    echo " "
    ls $1 -t | head -n 5

else
	echo " "
    echo "Pour utiliser ce script : ./high5.sh 'nom de dossier'. "
    echo " "
    exit 1

fi
