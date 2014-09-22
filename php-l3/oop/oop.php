<?php 
class Person {
	
	private $_name;
	private $_age;
	
	
	public function __set($name, $value) {
		
		switch($name){
			case "name" : $this->_name = $value; break;
			case "age" : $this->_age = $value; break;
			
			default: throw new Exception("ERROR");
		}
		
 
	}
	
	public function __get($name) {
	
		switch($name){
			case "name" : return $this->_name; break;
			case "age" : return $this->_age; break;
			
			default: throw new Exception("ERROR");
		}
	}
	
	public function __call($name, $arg) {
	
	}
	
	
	
}
$x= new Person;
$x->name = "OLOLO";
echo $x->name;

/*
abstract class Db {
	public $cnn;
	
	function connect() {
	//
	}
	
	abstract public function open();
}

class MyDb extends Db {
	
	public function open() {
	 
	}
	
	function connect() {
	//
	}
}
*/
?>