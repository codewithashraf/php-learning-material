<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body style="width: 100%; height: 100vh; text-align: center;">
  <h1>Sign-Up Page</h1>
  <form action="" method="post">
    Name: <input type="text" name="name"><br><br>
    Email: <input type="text" name="email"><br><br>
    Password: <input type="text" name="password"><br><br>
    <button>Submit</button>
  </form>
</body>
</html>

<?php
include('./php-config.php');

if(isset($_POST['name'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $fetchData = $conn->prepare("SELECT * FROM signup");
  $fetchData->execute();
  $allSignupData = $fetchData->fetchAll();
  
  foreach($allSignupData as $index=>$user){
    if($email === $user['email']){
      // echo 'email mil gaya hai';
      die('this email is used for previous signup!');
    } else {
      echo $index === count($allSignupData) - 1 ? "<h1>Loading........</h1>" : '' ;
    }
  }

  $userData = $conn->prepare("
    INSERT INTO `signup` (`name`, `email`, `password`) VALUES ('$name', '$email', '$password');
  ");

  $result = $userData->execute();
  
  if($result) {
    header("Location: loginpage.php");
  } else {
    echo 'please enter a corrent data';
  }
}


?>