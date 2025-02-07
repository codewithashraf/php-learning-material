<?php
  $userData = ['name'=>'Ashraf', 'age'=>19];
  echo print_r($userData);
  setcookie( 'userDetails', 'AShraf', time() + (1000) );
?>