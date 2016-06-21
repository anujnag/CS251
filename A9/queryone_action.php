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

  $courseid = $_POST["queryone_courseid"];

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

   $count = $db->querySingle("SELECT COUNT(ROLL_NO) as count FROM ENROLLMENT WHERE COURSE_ID = '$courseid'");
   echo $count;
   $db->close();
?>

</body>
</html>
