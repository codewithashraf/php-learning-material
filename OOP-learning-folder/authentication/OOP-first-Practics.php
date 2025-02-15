<?php 

class Authentication{
    public $name;
    public $age;
    public $email;
    public $password;

    public function __construct($email, $password, $userName = null, $userAge = null)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $userName;
        $this->age = $userAge;
    }

    public function login(): void{
        if($this->email === 'ash@test.com' && $this->password === 'ashraf')
        {
            header('location: ./index.html');
        } else {
            ECHO $this->email;
            ECHO $this->password;
            echo 'failed to login user!';
        }
    }

    function signup(): void{
        echo 'nhi chal rha hai';
        if(true){
            header('location: ./login.html');
        }
    }
}

// print_r($_POST);

if(isset($_POST['login-submit-btn'])){
    $userEmail = $_POST['email'];
    $userPassword = $_POST['password'];
    // echo $_POST['password'];
    $auth = new Authentication($userEmail, $userPassword);
    $auth->login();
}

if(isset($_POST['signup-submit-btn'])){
    $userEmail = $_POST['email'];
    $userPassword = $_POST['password'];
    $userName = $_POST['username'];
    $userAge = $_POST['userage'];
    $auth = new Authentication($userEmail, $userpassword, $userName, $userAge);
    echo 'ma chala ho ';
    $auth->signup();
}

?>