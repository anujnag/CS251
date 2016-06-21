#!/bin/sh
#Anuj Nagpal-14116
#CS251_Assignment3_Question3

awk '{
number=($0);  #read the numbers
sum+=number;
if(number!~/[0-9]/)  #check whether it is a number
{count=count}
else {count+=1}} 
END {
if(count!=0)   #No numerical entry in file
{printf "Average: %.2f\n",sum/count}
else
{printf "Average not defined\n"}}' $1
