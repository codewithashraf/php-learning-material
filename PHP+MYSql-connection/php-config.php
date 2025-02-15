


<?php
  /*    $host = 'localhost';
      $username = 'root';
      $password = null;
      $database = 'localapp';

      $conn = new mysqli($host, $username, $password, $database);

      if ($conn->connect_error) {
        die('connection failed' . $conn->connect_error);
      }


      echo 'connect hogaya hai' . '<br>';

      $check = $conn->query('show tables')->fetch_all();
      print_r($check); */

      ?> 



<?php

$host = 'localhost';
$username = 'root';
$password = null;
$database = 'localapp';

try{
  $conn = new PDO("mysql:host=$host;dbname=$database;charset=utf8mb4", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  // echo 'database successfully connected';
}
catch(PDOException $err){
  die("something went wrong". $err->getMessage());
}

/* $result = $conn->query('SHOW TABLES');
while($row = $result->fetch(PDO::FETCH_NUM)){
  print_r($row);
} */

?>