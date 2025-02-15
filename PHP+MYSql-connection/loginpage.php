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
session_start();
$random_id = bin2hex(random_bytes(16));  // 16 bytes ka secure random ID generate karega



$getData = $conn->prepare("SELECT * FROM signup");
$getData->execute();
$data = $getData->fetchAll();

if (count($_REQUEST) !== 0) {
  for ($i = 0; $i < count($data); $i++) {
    
    if ($data[$i]['email'] === $_REQUEST['email'] && $data[$i]['password'] === $_REQUEST['password']) {

      // Correcting the setcookie function
      setcookie("userId" . $data[$i]['id'], $data[$i]['id'], time() + 86400, '/');  // Store user ID in cookie

      $_SESSION['userId' . $data[$i]['id']] = $data[$i]['id'];

    

      header("Location: profile.php?user-id=" . $data[$i]['id']);
      exit(); // Stop further execution after redirection
    }

    // Checking if email doesn't match and it's the last element
    if ($data[$i]['email'] !== $_REQUEST['email'] && $i === count($data) - 1) {
        echo 'Incorrect email hai aap ka !!';
    } 

    // Checking for incorrect password
    if ($data[$i]['email'] === $_REQUEST['email'] && $data[$i]['password'] !== $_REQUEST['password']) {
        echo 'incorrect <b>Password</b> hai aap ka !!';
        break;
    }
  }
}
?>
