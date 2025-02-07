<?php
  if($_FILES){
    $tmpPath = $_FILES['image']['tmp_name'];
    $currPath = $_FILES['image']['name'];
    $uploadPath = './uploaded-files/' . $currPath;
    if(move_uploaded_file( $tmpPath, $uploadPath )){
      echo 'file was uploaded';
    } else {
      die('failed to upload file');
    }
  } else {
    die('no file found');
  }
?>