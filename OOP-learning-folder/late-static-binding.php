<?php 

class countrySales{
    public static $sales = 1000;
    public function getSales(){
        echo static::$sales;
    }
}

class citySales extends countrySales{
    public static $sales = 23;

}

// $obj = new countrySales();
$obj = new citySales();
$obj->getSales();


?>