<!DOCTYPE html>
<html>
<head>
<title>
Insertion Done !
</title>
<link rel="stylesheet" href="result.css">
</head>
<body style='background-color: thistle'>

<?php

  $rollno = $_POST["rollnumber"];
  $courseid = $_POST["courseid"];
  $assmarks = $_POST["assmarks"];
  $quizmarks = $_POST["quizmarks"];
  $midsemmarks = $_POST["midsemmarks"];
  $endsemmarks = $_POST["endsemmarks"];
  $total = $assmarks + $quizmarks + $midsemmarks + $endsemmarks;
  if($total > 200){
    $grade = "A";}
  else if($total<=200 && $total>150){
    $grade = "B";}
  else if($total<=150 && $total>100){
    $grade = "C";}
  else{
    $grade = "D";}

  class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('Ass8.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "<h1>Opened database successfully</h1>";
   }

   $sql =<<<EOF
      PRAGMA foreign_keys=ON;
      INSERT INTO Enrollment (ROLL_NO,COURSE_ID,ASSIGNMENT_MARKS,QUIZ_MARKS,MIDSEM_MARKS,ENDSEM_MARKS,TOTAL,GRADE)
      VALUES ('$rollno', '$courseid', '$assmarks', '$quizmarks', '$midsemmarks', '$endsemmarks', '$total', '$grade');
EOF;

   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "<h1>Records created successfully</h1>";
      echo "<p>Exact insertion run:</p>";
      echo "<p style='font-family: courier'>INSERT INTO ENROLLMENT (<span style='color:blue'>ROLL_NO</span>,<span style='color:orange'>COURSE_ID</span>,<span style='color: green'>ASSIGNMENT_MARKS</span>,<span style='color: yellow'>QUIZ_MARKS</span>,<span style='color: pink'>MIDSEM_MARKS</span>,<span style='color: grey'>ENDSEM_MARKS</span>) VALUES (<span style='color:blue'>" . $rollno ."</span>, <span style='color:orange'>" . $courseid . "</span>, <span style='color: green'>". $assmarks . "</span>, <span style='color: yellow'>" .$quizmarks. "</span>, <span style='color: pink'>". $midsemmarks . "</span>, <span style='color: grey'>". $endsemmarks ."</span>);</p>";

      echo "<table border=1>";
      echo "<tr><td>Roll Number</td><td>Course ID</td><td>Assignment Marks</td><td>Quiz Marks</td><td>MidSem Marks</td><td>EndSem Marks</td><td>Total</td><td>Grade</td></tr>";
      $sql =<<<EOF
      SELECT * from ENROLLMENT;
EOF;

      $ret = $db->query($sql);
      while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
      echo "<tr><td>". $row['ROLL_NO'] . "</td>";
      echo "<td>". $row['COURSE_ID'] ."</td>";
      echo "<td>". $row['ASSIGNMENT_MARKS'] ."</td>";
      echo "<td>". $row['QUIZ_MARKS'] ."</td>";
      echo "<td>". $row['MIDSEM_MARKS'] ."</td>";
      echo "<td>". $row['ENDSEM_MARKS'] ."</td>";
      echo "<td>". $row['TOTAL'] ."</td>";
      echo "<td>". $row['GRADE'] ."</td></tr>";
   }
     echo "</table>";
    }

   $db->close();
?>

</body>
</html>

