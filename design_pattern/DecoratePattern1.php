<?php
/*
 * Decorator Pattern 装饰者模式
 * 出售咖啡，咖啡加糖，咖啡加奶
 */

//抽象饮料类
abstract class beverage{
	public $_name;
	abstract public function cost();
}

//咖啡类
class coffee extends beverage{
	public function __construct(){
		$this->_name = "coffee";
	}
	
	public function cost(){
		return 1.00;
	}
}

//调料类
class condimentDecorator extends beverage{	
	public function __construct(){
		$this->_name = "condiment";
	}
	
	public function cost(){
		return 0.10;
	}
}

class sugar extends condimentDecorator{
	public $_beverage;
	public function __construct($beverage){
		$this->_name = "sugar";
		if($beverage instanceof beverage){
			$this->_beverage = $beverage;
		}else{
			exit("Failure");
		}
	}
	
	public function cost(){
		return $this->_beverage->cost() + 0.1;
	}
}

class milk extends condimentDecorator{
	public $_beverage;
	public function __construct($beverage){
		$this->_name = "milk";
		if($beverage instanceof beverage){
			$this->_beverage = $beverage;
		}else{
			exit("Failure");
		}
	}
	
	public function cost(){
		return $this->_beverage->cost() + 0.3;
	}
}

$coffee = new coffee();
$sugar  = new sugar($coffee);
$milk   = new milk($sugar); 
echo $milk->cost();

?>