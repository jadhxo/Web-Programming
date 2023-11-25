<?php

class RegisterUser{
    private $first_name;
    private $last_name;
    private $email;
    private $username;
    private $raw_password;
    private $encrypted_password;
    private $sex;
    public $error;
    public $success;
    private $storage = "data.json";
    private $stored_users;
    private $new_user;


    public function __construct($first_name,$last_name,$email,$password,$sex){
        $this->first_name = filter_var(trim($first_name), FILTER_SANITIZE_STRING);
        $this->last_name = filter_var(trim($last_name), FILTER_SANITIZE_STRING);

        $this->email = trim($this->email);
        $this->email = filter_var($email, FILTER_SANITIZE_STRING);
        $this->username = $this->extractUsernameFromEmail($this->email);
        
        $this->raw_password = filter_var(trim($password), FILTER_SANITIZE_STRING);
        $this->encrypted_password = password_hash($this->raw_password, PASSWORD_DEFAULT);

        $this->sex = filter_var($sex, FILTER_SANITIZE_STRING);

        $this->stored_users = json_decode(file_get_contents($this->storage), true);

        $this->new_user = [
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "email" => $this->email,
            "username" => $this->username,
            "password" => $this->encrypted_password,
            "sex" => $this->sex,
        ];

        if($this->checkFieldValues()){
            $this->insertUser();
        }
    }

    private function extractUsernameFromEmail($email){
        $parts = explode('@',$email);
        return $parts[0];
    }

    private function checkFieldValues(){
        if(empty($this->email)||empty($this->raw_password)){
            $this->error = "Both fields are required.";
            return false;
        }
        else {
            return true;
        }
    }

    private function emailExists(){
        foreach($this->stored_users as $user){
            if($this->email == $user['email']){
                $this->error = "Email already taken, please choose a different one.";
                return true;
            }
        }
        return false;
    }

    private function insertUser(){
        if($this->emailExists() == FALSE){
            array_push($this->stored_users, $this->new_user);
            if(file_put_contents($this->storage, json_encode($this->stored_users, JSON_PRETTY_PRINT))){
                return $this->success = "Your registration was successful";
            }
            else {
                return $this->error = "Something went wrong, please try again";
            }
        }

    }
}