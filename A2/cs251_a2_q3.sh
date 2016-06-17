#!/bin/bash
#Assignment2-Question3

if [[ -z $1 ]]; then
	echo "Please enter the file name as an argument"
elif grep -q '*$\|F$' $1; then
	GRADE=$( echo $1 | cut -d "," -f 5 )
	sed -i 's:*$:Good:g' $GRADE
	sed -i 's:A$:Good:g' $GRADE
	sed -i 's:B$:Average:g' $GRADE
	sed -i 's:C$:Average:g' $GRADE
	sed -i 's:D$:Poor:g' $GRADE
	sed -i 's:F$:Fail:g' $GRADE
fi
