<?php
session_start();



class LoginUser{
    private $email;
    private $username;
    private $password;
    public $error;
    public $success;
    private $storage = "data.json";
    private $stored_users;

    public function __construct($email,$password){
        $this->email = $email;
        $this->password = $password;
        $this->stored_users = json_decode(file_get_contents($this->storage),true);
        $this->login();
    }

    public function login(){
        foreach($this->stored_users as $user){
            if($user['email'] == $this->email){
                if(password_verify($this->password,$user['password'])){
                    $_SESSION['user'] = $this->email;
                    header("Location: ../index.php"); exit();
                }
            }
        }
        $_SESSION['login_error'] = "Wrong email or password";
        header("Location: ../login.php");
        exit();
    }
}