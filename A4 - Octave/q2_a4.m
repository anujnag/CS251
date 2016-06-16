#!/usr/bin/octave -qf
%Anuj Nagpal - 14116
%CS251-Assignment 4 - Question 2

%Using Script 1 to generate estimates of Pi
for i=1:6
        sample_size(i)=10^i;
        count=0;
        x=2*rand(1,sample_size(i));
        y=2*rand(1,sample_size(i));
        for j=1:sample_size(i)
                dist=sqrt((x(j)-1)^2+(y(j)-1)^2);
                if dist<=1
                        count=count+1;
                end
        end
        Prob=count/sample_size(i);
        Pi_calc(i)=4*Prob; 	     
end

%Plotting the data
semilogx(sample_size,Pi_calc,'r-','LineWidth',2);
title('Graph of Estimated Pi vs Logarithm of Sample Size');
ylabel('Estimated value of Pi');
xlabel('Logarithm of Sample Size');
grid on;
hold on;
semilogx([10;10^6],[pi;pi],'b:','LineWidth',2); %Value of pi in octave
legend('Estimated value of Pi','Actual value of Pi');
