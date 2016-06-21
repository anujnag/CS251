//Features of my assignment
//Anuj Nagpal - 14116
//CS251 Assignment 8

DataBase(.database) - ass8.db
Tables(.tables) - CS251,CS210,CS220,STUDENTS,COURSES

#Table CS251 - Input taken from CS251.csv - 20 entries
Commands:
	 separator ","
	 .import CS251.csv CS251
Primary Key - ID


#Table CS210 - Input taken from CS210.csv - 20 entries
Commands:
	 separator ","
	 .import CS210.csv CS210
Primary Key - ID


#Table CS220 - Input taken from CS220.csv - 20 entries
Commands:
	 separator ","
	 .import CS220.csv CS220
Primary Key - ID

		
#Table COURSES - Input taken from Courses.csv - 3 entries
Commands:
	 separator ","
	 .import Courses.csv COURSES
Primary Key - COURSE


#Table STUDENTS - Input taken from Students.csv - 20 entries
Commands:
	 separator ","
	 .import Students.csv STUDENTS
Primary Key - ROLL_NO
FOREIGN KEY (ROLL_NO) REFERENCES CS251(ROLL_NO)
FOREIGN KEY (ROLL_NO) REFERENCES CS210(ROLL_NO)
FOREIGN KEY (ROLL_NO) REFERENCES CS220(ROLL_NO)


#In Tables CS251,CS210,CS220 - the column TOTAL is calculated using the command:
UPDATE Tablename SET TOTAL = ASS1 + ASS2 + ASS3 + QUIZ + EXAM;

#In Tables CS251,CS210,CS220 - the column PERCENTAGE is calculated using the command:
UPDATE Tablename SET PERCENTAGE=round(TOTAL/270*100,2);


#In Tables CS251,CS210,CS220 - the column GRADE is calculated using the command:
UPDATE Tablename
SET GRADE = CASE
WHEN TOTAL>=150 THEN "A"
WHEN TOTAL<150 AND TOTAL>=100 THEN "B"
WHEN TOTAL<100 AND TOTAL>=50 THEN "C"
ELSE "D"
END;


#Table CS251,CS210,CS220 with their headers are written on their corresponding text files with name "tablename.txt"
Commands - .output tablename.txt
	   .mode column
	   .header on
	   .width 5, 20
	   select * from tablename;

#Grade columns for courses in students table are copied from GRADE columns of corresponding courses tables - Command:
	UPDATE STUDENTS SET CS251_GRADE = (SELECT GRADE FROM CS251 WHERE ROLL_NO = STUDENTS.ROLL_NO);
#Students table is also written on file "Students.txt"

#Computed average of each assigment,quiz and exam of all the 3 courses and output is in a file named "Averages.txt"
 I have made a table named Averages to store the entries and write all of them on a file. Command:
 e.g. : UPDATE AVERAGES SET QUIZ = (SELECT avg(QUIZ) from CS220) WHERE COURSE="CS22O";
Since I have just shuffled the same set of marks for all the courses, the final average for a particular exam for all the 3 courses is same.

#Computed Frequency of the grades for a course (say CS251) in a file "Count.txt"
Command: SELECT GRADE,count(GRADE) FROM CS251 GROUP BY GRADE;

#"Query1.txt" :- Name and Roll_nos. of those students whose marks in CS251 exam is greater than or equal to marks in CS220 exam
Command:  SELECT NAME,ROLL_NO FROM CS251 WHERE EXAM >= (SELECT EXAM from CS220 WHERE ROLL_NO=CS251.ROLL_NO);

#"Query2.txt" :- ID and Roll_nos. of those students whose total is less than the average in CS210
Command: SELECT ID,ROLL_NO FROM CS210 WHERE TOTAL <= (SELECT avg(TOTAL) from CS210);

#"Query3.txt" :- All details of the students who obtained A Grade in CS251, All details of the students who obtained A Grade in CS210,          		All details of the students who obtained A Grade in CS220 in a single file separated by headers
Command: .mode column
	 .header on 
	 SELECT * FROM CS251 WHERE GRADE = "A";
	 SELECT * FROM CS210 WHERE GRADE = "A";
	 SELECT * FROM CS220 WHERE GRADE = "A";

#Export complete database in a text file using SQLite command:
 sqlite3 ass8.db .dump > ass8.sql
 Above command will convert the entire contents of ass8.db database into SQLite statements and dump it into ASCII text file ass8.sql.

