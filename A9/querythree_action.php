<!DOCTYPE html>
<html>
<head>
<title>
Query Done !
</title>
<link rel="stylesheet" href="result.css">
</head>
<body>

<?php

  $table = $_POST["querythree"];

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


   if('$table'="Courses"){
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


   else if('$table'="Faculty"){
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

</body>
</html>
