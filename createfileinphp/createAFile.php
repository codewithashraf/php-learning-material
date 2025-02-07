<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="" method="post">
    <input type="text" name="file-name" placeholder="enter a file name">
    <br><br>
    <textarea name="file-content" id="textarea"></textarea>
    <br><br>
    <button>Create File</button>
  </form>
</body>
</html>

<?php
  if(isset($_REQUEST['file-name'])){
    $fileName = fopen( $_REQUEST['file-name'], 'w' );
    fwrite($fileName, $_REQUEST['file-content']);
    fclose($fileName);

    echo 'file create hogai hai check karlo';
  } else {
    die();
  }

?>