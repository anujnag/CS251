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

  $courseid = $_POST["courseid"];
  $coursename = $_POST["coursename"];
  $facultyid = $_POST["facultyid"];
  $credits = $_POST["credits"];

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
      INSERT INTO COURSES (COURSE_ID,COURSE_NAME,FACULTY_ID,CREDITS)
      VALUES ('$courseid', '$coursename', '$facultyid','$credits');
EOF;

   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "<h1>Records created successfully</h1>";
      echo "<p>Exact insertion run:</p>";
      echo "<p style='font-family: courier'>INSERT INTO COURSES (<span style='color:blue'>COURSE_ID</span>,<span style='color:orange'>COURSE_NAME</span>,<span style='color: green'>FACULTY_ID</span>,<span style='color: yellow'>CREDITS</span>) VALUES (<span style='color:blue'>" . $courseid ."</span>, <span style='color:orange'>'" . $coursename . "'</span>, <span style='color: green'>'". $facultyid . "'</span>, <span style='color: yellow'>" .$credits. "</span>);</p>";

      echo "<table border=1>";
      echo "<tr><td>Course ID</td><td>Course Name</td><td>Faculty ID</td><td>Credits</td></tr>";
      $sql =<<<EOF
      SELECT * from COURSES;
EOF;

      $ret = $db->query($sql);
      while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
      echo "<tr><td>". $row['COURSE_ID'] . "</td>";
      echo "<td>". $row['COURSE_NAME'] ."</td>";
      echo "<td>". $row['FACULTY_ID'] ."</td>";
      echo "<td>". $row['CREDITS'] ."</td></tr>";
   }
     echo "</table>";
    }

   $db->close();
?>

</body>
</html>
