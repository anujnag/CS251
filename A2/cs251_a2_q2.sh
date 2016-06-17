#!/bin/bash
#Assignment2-Assignment2-Question2

if [[ -z $1 ]]; then
        echo "Please enter the file name"
else
echo -n "*: "
grep -c "*$" $1
echo -n "A: "           
grep -c "A$" $1
echo -n "B: "
grep -c "B$" $1
echo -n "C: "
grep -c "C$" $1
echo -n "D: "
grep -c "D$" $1
echo -n "F: "
grep -c "F$" $1
fi
