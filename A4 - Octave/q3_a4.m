#!/usr/bin/octave -qf
%Anuj Nagpal - 14116
%CS251 - Assignment 4 - Question 3

filename="output3.txt"; %Output file
fid = fopen (filename, "w");
x=0:50;
denom=1/sqrt(2*pi*10.5);
for i=0:50
	y(i+1)=denom*exp(-(i-15)^2/(2*10.5)); %Calculating gaussian
end
s1=normrnd(15,sqrt(10.5),10,1);
s2=normrnd(15,sqrt(10.5),100,1);
s3=normrnd(15,sqrt(10.5),10^3,1);
s4=normrnd(15,sqrt(10.5),10^4,1);
s5=normrnd(15,sqrt(10.5),10^5,1);
s6=normrnd(15,sqrt(10.5),10^6,1);
x_edge=x-0.5;  %x_edge stores the edges required for histc function
x_edge(52)=50.5;
h1=histc(s1,x_edge);
h2=histc(s2,x_edge);
h3=histc(s3,x_edge);
h4=histc(s4,x_edge);
h5=histc(s5,x_edge);
h6=histc(s6,x_edge);
for i=1:51
	fprintf(fid,"%e		%d	%d	%d	%d	%d	%d\n",y(i),h1(i),h2(i),h3(i),h4(i),h5(i),h6(i));
end
fclose(fid);
