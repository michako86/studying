<?php 
header('Content-Type: text/html; charset=utf-8');

class MyExceptionOne extends Exception {
	
	public function __construct($msg) {
		parent::__construct($msg);
	}
}
class MyExceptionTwo extends Exception {
	
	public function __construct($msg) {
		parent::__construct($msg);
	}
}

class One {

	public $a;
	
	public function __construct($x=0, $y=0) {
	
		try {
			if(!$x) {
				throw new MyExceptionOne("Нет первого параметра");
			}
			
			if(!$y) {
				throw new MyExceptionTwo("Нет второго параметра");
			}
			
			if(!$z) {
				throw new Exception("Нет z параметра");
			}
			echo "Все параметры переданы";
		} catch(MyExceptionOne $e) {
			echo $e->getMessage();
		} catch(MyExceptionTwo $e) {
			echo $e->getMessage();
		
		} catch(Exception $e) {
			echo $e->getMessage();
		}
	}
}

$var = new One(2, 2);
?>