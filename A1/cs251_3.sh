#!/bin/bash
#CS251_Assignment-1_Question-3
#Anuj Nagpal - 14116

if [[ -z $1 ]]; then  #check for the input file
	echo "Please give the file with data as an argument"
else
re='^-?[0-9]+([.][0-9]+)?$'
sum=0;
count=0;

while IFS='' read -r line || [[ -n "$line" ]]; #read the numbers
#while condition reads all kinds of files, whether they start or end with
#blank lines, or they start or end with whitespaces or if they don't have
#a terminating newline.
do
	if ! [[ $line =~ $re ]] ; then   #check if it is a number or not
		continue
	fi
    sum=$(echo $sum+$line | bc)  #sum stores the usual sum
    ((count= count + 1))         #count for number of entries
done < $1
if [ "$count" == 0 ]
then
	echo "Average not defined"  #denominator is 0
else
	echo "scale=3; $sum / $count" | bc  #the average
fi
fi
