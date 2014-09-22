<?php 
class SuperUser extends User implements ISuperUser{
	public $role;
	
	public static $cntSU = 0;
	
	public function __construct($name, $login, $password, $role) {
		
		parent::__construct($name, $login, $password);
		$this->role = $role;
		--parent::$cntU;
		++self::$cntSU;
		
	}
	
	public function showInfo() {
		
		parent::showInfo();
		echo "Role: ".$this->role."<br/><br/>";
	}
	public function getInfo() {
		$arr = array();
		
		foreach($this as $k => $v) {
			$arr[$k] = $v;
			
			
		}
		
		return $arr;
		//return (array)$this;
	}
}