<!DOCTYPE html>
<html>
<head>
<title>
Query Done !
</title>
<link rel="stylesheet" href="result.css">
</head>
<body style='background-color: thistle'>

<?php
  
  $exam = $_POST["querytwo_exam"];
  $courseid = $_POST["querytwo_courseid"];

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

   if($exam=="ASSIGNMENT_MARKS"){
   $count = $db->querySingle("SELECT AVG(ASSIGNMENT_MARKS) as count FROM ENROLLMENT WHERE COURSE_ID = '$courseid'");
   echo $count;}
   else if($exam=="QUIZ_MARKS"){
   $count = $db->querySingle("SELECT AVG(QUIZ_MARKS) as count FROM ENROLLMENT WHERE COURSE_ID = '$courseid'");
   echo $count;}
   else if($exam=="MIDSEM_MARKS"){
   $count = $db->querySingle("SELECT AVG(MIDSEM_MARKS) as count FROM ENROLLMENT WHERE COURSE_ID = '$courseid'");
   echo $count;}
   else if($exam=="ENDSEM_MARKS"){
   $count = $db->querySingle("SELECT AVG(ENDSEM_MARKS) as count FROM ENROLLMENT WHERE COURSE_ID = '$courseid'");
   echo $count;}
   else if($exam=="TOTAL"){
   $count = $db->querySingle("SELECT AVG(TOTAL) as count FROM ENROLLMENT WHERE COURSE_ID = '$courseid'");
   echo $count;}

   $db->close();
?>

</body>
</html>
