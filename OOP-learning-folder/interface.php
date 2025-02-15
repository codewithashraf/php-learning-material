<?php 

// echo phpinfo();

interface A{
    public function tool();
}
interface B{
    public function fool();
}

class C implements A{
    public function kuch(){
        echo 'hello world';
    }
    public function tool(){
        echo 'tool function calling';
    }
}

$obj = new C;
$obj->tool();



?>