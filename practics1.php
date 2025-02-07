<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <?php
  error_reporting(E_ALL); // Sabhi types ke errors ko show karega
  ini_set('display_errors', 1); // Errors ko browser mein display karega
  
  echo 'hello php kaise ho tum' . '<br>';
  $name = 'Ashraf';
  echo $name . '<br>';
  echo strrev(strtoupper($name)), '<br>';
  echo "Max Float: " . PHP_FLOAT_MAX . "<br>";
  echo "Min Float: " . PHP_FLOAT_MIN . "<br>";
  echo "Float Precision (Digits): " . PHP_FLOAT_DIG . "<br>";
  echo "Float Epsilon: " . PHP_FLOAT_EPSILON . "<br>";
  $x = 5;
  $y = 10;

  function myTest()
  {
    global $x, $y;
    $y = $x + $y;
  }

  myTest();
  echo $y; // outputs 15
  ?>



</body>

</html>