#!/usr/bin/octave -qf
%Anuj Nagpal - 14116
%CS251 - Assignment 4 - Question 4

data = load("output3.txt");
x=0:50;
plot(x,data(:,1),'r-','LineWidth',2); 
%data(:,1) is the first column of output3.txt i.e. y
title('Graph of y against x');
xlabel('Value of x');
ylabel('Value of y');
legend('y')
grid on;

figure;

plot(x,data(:,2),'b-','LineWidth',2); 
%data(:,2) is the second column of output3.txt i.e. h1
title('Graph of h1 against x');
xlabel('Value of x');
ylabel('s1 sample frequency');
legend('h1');
grid on;

figure;

plot(x,data(:,3),'k-','LineWidth',2);
%data(:,3) is the third column of output3.txt i.e. h2
title('Graph of h2 against x');
xlabel('Value of x');
ylabel('s2 sample frequency');
legend('h2');
grid on;

figure;

plot(x,data(:,4),'m-','LineWidth',2);
%data(:,4) is the fourth column of output4.txt i.e. h3
title('Graph of h3 against x');
xlabel('Value of x')
ylabel('s3 sample frequency');
legend('h3');
grid on;

figure;

plot(x,data(:,5),'c-','LineWidth',2);
%data(:,5) is the fifth column of output3.txt i.e. h4
title('Graph of h4 against x');
xlabel('Value of x');
ylabel('s4 sample frequency');
legend('h4');
grid on;

figure;
 
plot(x,data(:,6),'y-','LineWidth',2);
%data(:,6) is the sixth column of output3.txt i.e. h5
title('Graph of h5 against x');
xlabel('Value of x');
ylabel('s5 sample frequency');
legend('h5');
grid on;

figure;

plot(x,data(:,1),x,data(:,7),'g-','LineWidth',2);
%data(:,7) is the seventh column of output3.txt i.e. h6
title('Graph of h6 against x');
xlabel('Value of x');
ylabel('s6 sample frequency');
legend('h6');
grid on;
