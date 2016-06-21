#!/bin/bash
#14116-Anuj Nagpal
#CS251_Assignment3_Question2

n=$2;
iteration=0;

if [[ -z $1 || -z $2 || -z $3 ]]; then #check for arguments
	echo "Please enter the input file , n , output file"
else
find . -type f -name $3 -exec rm -i {} \;
if [ $n == 0 ]; then
echo "Value of n is not valid";
else
for i in $( awk '{ print; }' $1 )
do
((iteration++))
if [ $n == 1 ]; then
echo "$i" >> $3
elif [ $(echo $iteration%$n | bc) == 1 ]; then
echo -n -e "$i" >> $3
elif [ $(echo $iteration%$n | bc) != 0 ]; then
echo -n -e "\t$i" >> $3
else
echo -e "\t$i" >> $3	
fi
done	
fi
fi
