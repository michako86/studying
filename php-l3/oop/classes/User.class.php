<?php 
class User extends AUser{
	public $name;
	public $login;
	public $password;
	
	public static $cntU = 0;
	
	public function __construct($name, $login, $password) {
		$this->name = $name;
		$this->login = $login;
		$this->password = $password;
		
		++self::$cntU;
	}
	
	public function __destruct() {
		echo "Пользователь ".$this->name." удален.<br/>";
	}
	public function showInfo() {
		
		
		echo "<br>Name: ".$this->name."<br>";
		echo "Login: ".$this->login."<br>";
		echo "Password: ".$this->password."<br>";

	}
	
	
}