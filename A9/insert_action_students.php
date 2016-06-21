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

  $rollno = $_POST["students_rollno"];
  $name = $_POST["students_name"];
  $dept = $_POST["students_dept"];

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
      INSERT INTO Students (ROLL_NO,NAME,DEPT)
      VALUES ('$rollno', '$name', '$dept');
EOF;

   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "<h1>Records created successfully</h1>";
      echo "<p>Exact insertion run:</p>";
      echo "<p style='font-family: courier'>INSERT INTO STUDENTS (<span style='color:blue'>ROLL_NO</span>,<span style='color:orange'>NAME</span>,<span style='color: green'>DEPT</span>) VALUES (<span style='color:blue'>" . $rollno ."</span>, <span style='color:orange'>'" . $name . "'</span>, <span style='color: green'>'". $dept . "'</span>);</p>";
      echo "<table border=1>";
      echo "<tr><td>Roll Number</td><td>Name</td><td>Department</td></tr>";
      $sql =<<<EOF
      SELECT * from STUDENTS;
EOF;

      $ret = $db->query($sql);
      while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
      echo "<tr><td>". $row['ROLL_NO'] . "</td>";
      echo "<td>". $row['NAME'] ."</td>";
      echo "<td>". $row['DEPT'] ."</td></tr>";
   }
     echo "</table>";
    }

   $db->close();
?>

</body>
</html>
