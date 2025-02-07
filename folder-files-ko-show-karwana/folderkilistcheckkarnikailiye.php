<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file[]" id="fileInput" webkitdirectory directory multiple>
    <br><br>
    <button>Check Files</button>
  </form>
</body>
</html>

<?php



if(!empty($_FILES['file']['name']['0'])){
  // print_r($_FILES);
  foreach($_FILES as $index => $files){
    
      for($i = 0; $i < count($files['name']); $i++){
        $tmpPath = $files['tmp_name'][$i];
        $currPath = $files['name'][$i]; 
        $uploadPath = './filesfolder/' . $currPath;
        move_uploaded_file($tmpPath, $uploadPath);
      }
    
  }
  
 /*  foreach( $_FILES as $index=>$file ){
    print_r($_FILES['file']['tmp_name'][$index]);
  } */ 

  $files = $_FILES['file']['name'];
  echo "<ul>";
    foreach( $files as $file ){
      // print_r($files);
      echo "<li>";
        echo  "<a href=./filesfolder/$file >" . htmlspecialchars($file) . "</a>";
      echo "</li>";
    }
  echo "</ul>";
}

?>