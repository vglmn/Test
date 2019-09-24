#!/bin/bash

file=$1

 printf "%s \n" "Nom du fichier:"
 read -r classe

 if [[ "$1" ]]; then
 	tar xzf $1
 else
 	echo "Mauvais fichier"
 fi
