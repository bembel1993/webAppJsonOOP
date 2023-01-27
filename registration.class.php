<?php
class RegUser
{
    private $login;
    private $password;
    private $confirmPassword;
    private $email;
    private $name;

    private $id;

    private $encryptedPassword;
    private $containerDataRegUser = "userData.json";
    private $saveUserArray;
    private $newUserArray;
    //error message
    public $successMessage;
    public $errorMessage;
    public $errorLogin;
    public $error;

    public $data = 0;

    public function __construct($login, $password, $confirmPassword, $email, $name)
    {
        $this->login = $login;
        $this->password = $password;
        $this->encryptedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->confirmPassword = $confirmPassword;
        $this->email = $email;
        $this->name = $name;

        $this->saveUserArray = json_decode(file_get_contents($this->containerDataRegUser), true);

        $this->id = time();

        $this->newUserArray = [
            "id" => $this->id,
            "login" => $this->login,
            "password" => $this->encryptedPassword,
            "confirm_password" => $this->confirmPassword,
            "email" => $this->email,
            "name" => $this->name,    
        ];

        if($this->validationField() == false){};
    }

    private function validationField()
    {
        if(empty($this->login)){
            return $this->error = "Field Login is empty";
        } elseif (empty($_POST['password'])) {
            return $this->errorMessage = "Field Password is empty";
        } elseif (empty($_POST['confirm_password'])) {
            return $this->errorMessage = "Field Confirm Password is empty";
        } elseif (empty($_POST['email'])) { 
            return $this->errorMessage = "Field Email is empty";
        } elseif (empty($_POST['name'])) {
            return $this->errorMessage = "Field Name is empty";
        } elseif ($_POST['password'] != $_POST['confirm_password']) {
            return $this->errorMessage = "Confirmed password is not equal to your password";;
        } elseif (strlen($_POST['password']) < 6) {
            return $this->errorMessage = "Password should be at least 6 characters long";
        } elseif(!preg_match("#[0-9]+#",$_POST["password"])){
            return $this->errorMessage = "Password should be have numbers";
        } elseif(!preg_match("#[a-z]+#",$_POST["password"])){
            return $this->errorMessage = "Password should be have letters";
        }elseif (strlen($_POST['login']) < 6) {
            return $this->errorMessage = "Login should be at least 6 characters long";;
        } elseif (strlen($_POST['name']) < 2) {
            return $this->errorMessage = "Name should be at least 2 characters long and only contain letters";
        } elseif (!ctype_alpha($_POST['name'])) {
            return $this->errorMessage = "Name should be only containt letters";;
        } else {
            $this->insertUser();
        }
    }

    private function usernameExists()
    {
        foreach ($this->saveUserArray as $user) {
            if ($this->email === $user['email'] || $this->login === $user['login']) {
                return $this->errorMessage = "Login or email is already taken.";;
            }
        }
        return false;
    }

    private function insertUser()
    {
        if ($this->usernameExists() == false) {
            array_push($this->saveUserArray, $this->newUserArray);
            if (file_put_contents($this->containerDataRegUser, json_encode($this->saveUserArray))) {
                return $this->successMessage = "Successfully registered";
            } else {
                return $this->errorMessage = "Error registering";
            }
        }
    }
}
