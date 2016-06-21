#!/bin/bash
#14116 - Anuj Nagpal
#CS251_Assignment3_Question3 

if [[ -z $1 ]]; then #check for arguments
	echo "Please enter the file names"
else
filename=$1
awk 'BEGIN {
FS=",[ ]*"; OFS=","
}
{
for (i=NF; i>0; i--) {
printf "%s" , $i;
if(i>1) {
printf "%s", OFS;
}
}
printf "\n"
}' $filename 
fi
