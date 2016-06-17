#!/bin/bash
#Assignment2-Question1

if [[ -z $1 ]]; then 
        echo "Please enter the file name"
elif grep -q "*$\|F$" $1; then
	echo "Yes"
else
	echo "No"
fi
