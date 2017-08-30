<?php
/*
 * 工厂方法模式
 * 包含的对象：抽象产品，具体产品，抽象工厂，具体工厂
 */

abstract class operation{
	abstract public function getValue($num1,$num2);
}

abstract class factory{
	abstract public function getOperation();
}

class operationAdd{
	public function getValue($num1,$num2){
		return $num1 + $num2;
	}
}

class operationMinus{
	public function getValue($num1,$num2){
		return $num1 - $num2;
	}
}

class operationMultiply{
	public function getValue($num1,$num2){
		return $num1 * $num2;
	}
}

class operationDivide{
	public function getValue($num1,$num2){
		return $num1 / $num2;
	}
}

class factoryAdd{
	public function getOperation(){
		return new operationAdd();
	}
}

class factoryMinus{
	public function getOperation(){
		return new operationMinus();
	}
}

class factoryMultiply{
	public function getOperation(){
		return new operationMultiply();
	}
}

class factoryDivide{
	public function getOperation(){
		return new operationDivide();
	}
}



$add = new factoryAdd();
$temp = $add->getOperation();
$result = $temp->getValue(20,50);
echo $result;
echo("<br>");
$add = new factoryDivide();
$temp = $add->getOperation();
$result = $temp->getValue(100,40);
echo $result;

?>