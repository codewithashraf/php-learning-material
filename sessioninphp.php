<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body style="width: 100%; height: 100vh;">
  <form action="" method="post" style="display: flex; flex-direction: column; gap: 2vw; justify-content: center; align-items: center; ">
    <input type="text" placeholder="enter your name" name="username">
    <input type="text" placeholder="enter your age" name="userage">
    <input type="text" placeholder="enter your email" name="useremail">
    <button type="submit">Submit Data</button>
  </form>
  <br><br>
  <form action="" method="post">
    <button name="checkdata-btn">check my data</button>
    <button name="hidedata-btn">Hide data</button>
  </form>
</body>

</html>

<?php
/* print_r($_REQUEST['username'] ?? 'key not found') */
session_start();
if (isset($_REQUEST['username'])) {
  if (isset($_REQUEST)) {
    $_SESSION['username'] = $_REQUEST['username'];
    $_SESSION['userage'] = $_REQUEST['userage'];
    $_SESSION['useremail'] = $_REQUEST['useremail'];
    // echo 'data is sent';
  } else {
    echo 'no data found please refresh a page';
  }
}

if (isset($_REQUEST['checkdata-btn'])) {
  // print_r($_REQUEST);
  checkData('show');
}
if (isset($_REQUEST['hidedata-btn'])) {
  // print_r($_REQUEST);
  checkData('hide');
}



function checkData($visibility)
{
  if ($visibility == 'show') {
    echo "<pre>";
    echo 'your name is ' . $_SESSION['username'];
    echo '<br>';
    echo 'your email is ' . $_SESSION['useremail'];
    echo '<br>';
    echo 'your age is ' . $_SESSION["userage"];
    echo '<br>';
    echo "</pre>";
  } else {
    echo '';
  }
}


?>