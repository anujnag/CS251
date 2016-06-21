#!/bin/bash
#CS251_Assignment-1_Question-2
#Anuj Nagpal - 14116

if [[ -z $1 || -z $2 ]]; then #check for arguments
	echo "Please enter the two file names"
else
      paste -d ',' <(cut -d ',' -f1,2,4 $1) <(cut -d ',' -f2,3 $2) > output.txt
fi
# cut the fields 1,2,4  delimited by ',' in file1 (or argument 1) and fields 2,3# delimited by ',' in file2 (or argument 2) and paste them in output.txt
# delimited by ','s
