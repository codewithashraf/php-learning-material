<?php

$path = 'filesfolder';
$items = scandir($path);
$items = array_diff($items, array('.', '..'));
foreach($items as $item){
  echo "<a href=./filesfolder/$item> $item </a> <br>";
}

?>