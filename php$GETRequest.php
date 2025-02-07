<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="get" action="./getrequest.php">
    <input type="text" name="user_name"><br><br>
    <input type="text" name="password"><br><br>
    <button>Submit</button>
  </form>  
  <br>
  <h2>second form</h2>
  <br>
  <form method="post" action="./getrequest.php">
    <input type="text" name="user_name"><br><br>
    <input type="text" name="password"><br><br>
    <button>Submit</button>
  </form>  

  <br>
  <br>
  <?php 
  print_r($GLOBALS);
  include './phpinfo.php';
?>
  

</body>
</html>