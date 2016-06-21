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

  $facultyid = $_POST["facultyid"];
  $facultyname = $_POST["facultyname"];

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
      INSERT INTO FACULTY (FACULTY_ID,FACULTY_NAME)
      VALUES ('$facultyid', '$facultyname');
EOF;

   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "<h1>Records created successfully</h1>";
      echo "<p>Exact insertion run:</p>";
      echo "<p style='font-family: courier'>INSERT INTO FACULTY (<span style='color:blue'>FACULTY_ID</span>,<span style='color:orange'>FACULTY_NAME</span>) VALUES (<span style='color:blue'>" . $facultyid ."</span>, <span style='color:orange'>'" . $facultyname . "'</span>);</p>";

      echo "<table border=1>";
      echo "<tr><td>Faculty ID</td><td>Faculty Name</td></tr>";
      $sql =<<<EOF
      SELECT * from FACULTY;
EOF;

      $ret = $db->query($sql);
      while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
      echo "<tr><td>". $row['FACULTY_ID'] . "</td>";
      echo "<td>". $row['FACULTY_NAME'] ."</td></tr>";
   }
     echo "</table>";
    }

   $db->close();
?>

</body>
</html>

