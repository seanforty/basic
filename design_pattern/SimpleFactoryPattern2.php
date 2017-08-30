<?php
/* 
 * 简单工厂模式 Simple Factory pattern
 * 简单的计算器实现
 */ 

//抽象运算类
abstract class operation{
	abstract public function getValue($num1,$num2);
}

//加法类
class operationAdd extends operation{
	public function getValue($num1,$num2){
		return intval($num1) + intval($num2);
	}
}

//乘法类
class operationMultiply extends operation{
	public function getValue($num1,$num2){
		return intval($num1) * intval($num2);
	}
}

//工厂类
class factory{	
	public static function work($operation,$num1,$num2){
		switch($operation){
			case "+":
				return (new operationAdd())->getValue($num1,$num2);
				break;
			case "*":
				return (new operationMultiply())->getValue($num1,$num2);
				break;
		}
	}
}

//客户端
$num1 = 50;
$num2 = 20;
$result = factory::work("*",$num1,$num2);
echo $result;

?>