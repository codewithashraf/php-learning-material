<?php 

const arr = ['name', 'age', 'city', 'email', 'address', 'pincode'];
// echo implode(arr);
// const arr2 = [1,2,3,4,5];
// $data = array_merge(arr, arr2);
// print_r($data);

$data = array_map(arr, function($elem){
  echo $elem . '<br>';
});

/* $numbers = [1, 2, 3, 4];
$squared = array_map(function($n) {
    echo $n * $n;
}, $numbers);
// print_r($squared); // Output: [1, 4, 9, 16] */

?>