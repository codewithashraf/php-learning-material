<!-- <?php
  echo 'file open or request hogai <br>';

  echo "user name is ". $_GET['user_name'];
  echo '<br>';
  echo "user name is ". $_GET['password'];
?> -->

<?php
    if ($_REQUEST) {
      foreach($_REQUEST as $key => $data){
        echo "$key is <b>$data</b> ". "<br>";
      } 
      "<pre>". print_r($_SERVER) ."<pre>";
    }  
?>

