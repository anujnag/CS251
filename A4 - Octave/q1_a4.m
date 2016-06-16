#!/usr/bin/octave -qf
%Anuj Nagpal - 14116
%CS251 - Assignment 4 - Question 1

filename="output1.txt";  %Output file
fid = fopen (filename, "w");
for i=1:6
	sample_size=10^i;
	count=0;  %will help us compute probability
	x=2*rand(1,sample_size);
	y=2*rand(1,sample_size);
	for j=1:sample_size
		dist=sqrt((x(j)-1)^2+(y(j)-1)^2);
		if dist<=1
			count=count+1;
		end
	end
	Prob=count/sample_size;
	Pi_calc=4*Prob;  %As Probability theoretically will be pi/4
	fprintf(fid,"%d  %f\n",sample_size,Pi_calc);
end
fclose (fid);
