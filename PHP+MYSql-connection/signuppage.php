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
// include('./php-config.php');
// $random_id = bin2hex(random_bytes(16)); 


// if(isset($_POST['name'])){
//   $name = $_POST['name'];
//   $email = $_POST['email'];
//   $password = $_POST['password'];
  
//   $fetchData = $conn->prepare("SELECT * FROM signup");
//   $fetchData->execute();
//   $allSignupData = $fetchData->fetchAll();
  
//   foreach($allSignupData as $index=>$user){
//     if($email === $user['email']){
//       // echo 'email mil gaya hai';
//       die('this email is used for previous signup!');
//     } else {
//       echo $index === count($allSignupData) - 1 ? "<h1>Loading........</h1>" : '' ;
//     }
//   }
  
//   $userData = $conn->prepare("
//   INSERT INTO `signup` (`id`, `name`, `email`, `password`) VALUES ('$random_id', '$name', '$email', '$password');
//   ");
  
//   $result = $userData->execute();
  
//   if($result) {
//     header("Location: loginpage.php");
//   } else {
//     echo 'please enter a corrent data';
//   }
// }

error_reporting(E_ALL);
ini_set('display_errors', 1);


include('./php-config.php');
$random_id = bin2hex(random_bytes(12)); 

if(isset($_POST['name'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Check if email already exists
  $fetchData = $conn->prepare("SELECT * FROM signup WHERE email = ?");
  $fetchData->execute([$email]);
  $existingUser = $fetchData->fetch();
  // print_r($existingUser);

  if($existingUser) {
    die('This email is already registered!');
  } else {
    echo 'loading .................';
  }

  // Insert new user securely
  $userData = $conn->prepare("INSERT INTO `signup` (`id`, `name`, `email`, `password`) VALUES (?, ?, ?, ?)");
  $result = $userData->execute([$random_id, $name, $email, $password]);

  if($result) {
    header("Location: loginpage.php");
    exit(); // Ensure script stops here
  } else {
    echo 'Please enter correct data';
  }
}




?>