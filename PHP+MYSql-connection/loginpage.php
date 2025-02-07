<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="" method="post">
    <input type="text" name="email" id="email"><br>
    <input type="password" name="password" id="password"><br>
    <button type="submit">Login</button>
  </form>
</body>

</html>

<?php
include('./php-config.php');

$getData = $conn->prepare("SELECT * FROM signup");
$getData->execute();
$data = $getData->fetchAll();
/* echo "<pre>";
print_r($data); */


if (count($_REQUEST) !== 0) {
  for ($i = 0; $i < count($data); $i++) {
    
    if ($data[$i]['email'] === $_REQUEST['email'] && $data[$i]['password'] === $_REQUEST['password']) {
      header("Location: profile.php", "name: ashraf");
      exit();
    }

    if ($data[$i]['email'] !== $_REQUEST['email'] && $i === count($data) - 1) {
        echo 'Incorrect email hai aap ka !!';
    } 

    if ($data[$i]['email'] === $_REQUEST['email'] && $data[$i]['password'] !== $_REQUEST['password']) {
        echo 'incorrect <b>Password</b> hai aap ka !!';
        break;
    }
    
  }

}




?>