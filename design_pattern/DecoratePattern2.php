<?php
/*
 * Decorator Pattern 装饰者模式
 * 用户换装，T-Shirt，Trousers
 */
 
class person{
	public $_name;
	public function __construct($name){
		$this->_name = $name;
	}
	
	public function show(){
		echo "主人名字：" . $this->_name . "<br>";
	}
}

class decorator extends person{
	public $perObj;
	
	public function __construct($personObj){
		if($personObj instanceof person){
			$this->perObj = $personObj;			
		}else{
			exit("Failure");
		}
	}
	
	public function show(){
		$this->perObj->show();
		echo("穿上" . $this->_name . "<br/>");
	}
}

class tshirt extends decorator{
	public function __construct($personObj){
		parent::__construct($personObj);
		$this->_name = "T-Shirt";
	}
}

class trousers extends decorator{
	public function __construct($personObj){
		parent::__construct($personObj);
		$this->_name = "trousers";
	}
}



$host = new person("Sean");
$tshirt = new tshirt($host);
$trousers = new trousers($tshirt);
$trousers->show();
?>