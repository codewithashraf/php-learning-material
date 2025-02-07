<form action="" method="post" enctype="multipart/form-data">
  <br><br><br>
  <input type="file" name="file" id="file"><br><br>
  <button type="submit">Read a File</button>
</form>
<br><br>
<?php
   if(isset($_FILES['file'])){
    // print_r($_FILES['file']);
    $file = $_FILES['file']['tmp_name'];
    $myFile = fopen($file, 'r') or die('unable to read file');
    echo fread($myFile, filesize($file));
    fclose($myFile);
  }
?>