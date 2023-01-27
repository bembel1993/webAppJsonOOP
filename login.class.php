<?php
class Login
{
	private $login;
	private $password;

	public $errorLogin;
	public $errorPassword;
	public $error;
	public $success;
	private $containerDataRegUser = "userData.json";
	private $saveUserArray;

	public function __construct($login, $password)
	{
		$this->login = $login;
		$this->password = $password;
		$this->saveUserArray = json_decode(file_get_contents($this->containerDataRegUser), true);

		if($this->validationFieldLogin() == false){
			//$this->error = "Field Login is empty";
		};
	}

	private function validationFieldLogin()
	{
		if (empty($this->login)) {
			return $this->errorLogin = "Field Login is empty";
		} elseif (empty($_POST['password'])) {
			return $this->errorPassword = "Field Password is empty";
		} else {
			$this->login();
		}
	}

	private function login()
	{
		foreach ($this->saveUserArray as $user) {
			if ($user['login'] == $this->login) {
				if (password_verify($this->password, $user['password'])) {
					session_start();
					$_SESSION['user'] = $this->login;
					header("location: account.php");
					exit();
				}
			} elseif (empty($_POST['login'])) {
				//$this->err['login'] = 'Name is required.';
			}
		}
		
		return $this->error = "Wrong username or password";
	}
}
