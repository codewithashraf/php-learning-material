<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="" method="post">
    <button name="button">function call</button>
  </form>
</body>
</html>

<?php
  // print_r($_REQUEST);
  if(isset($_REQUEST['button'])){
    eventCall();
  }
  function eventCall(){
    echo 'function call hogaya hai';
  }
?>