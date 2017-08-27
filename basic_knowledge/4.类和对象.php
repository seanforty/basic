<?php

/*
* PHP基础知识回顾整理
* 四. 类和对象
*/

/*
1. 面向对象的概念
2. 对象的属性和方法的使用, 权限控制
3. 对象的属性
	不能接受"对象"类型的赋值
	不能接受"资源"类型的赋值
	不能接受前面定义过的属性赋值
4. 对象的比较
	有相同方法和属性的对象,  使用==比较返回true, ===比较返回false;(===仅当两个是同一个对象才返回true)
5. __set()/__get()/__isset()//__unset();
*/
class obj{
	private $a;
	private $b;
	
	public function __set($n,$v){
		echo("set is working, $n,$v<br>");
		$this->$n=$v;
	}
	
	public function __get($n){
		echo("get is working, $n<br>");
		if(isset($this->n))
			return $this->n;
		else
			return null;
	}
}
$newobj=new obj();
$newobj->a=20;
$newobj->b=40;
echo $newobj->a;
/*
6. 方法的重写(override)
对父类方法重写时,子类方法必须与父类方法同名, 但不限制参数类型,参数数量和返回类型
子类方法不能使用对父类方法更严格的控制权限
php中没有重载: 原因是1是php弱类型语言,方法参数变量类型不限制,2是方法参数数量不限制
父类和子类都有自己的构造方法, 而子类实例化时, 子类的构造方法被调用, 父类中构造方法不会被调用
7. this
在类中使用对象的属性和方法都要用$this->. (注: 方法中的变量不用this)
8. parent:: 调用父类(或父父类及以上)的方法, 调用时父类不会在内存中创建
9. static属性和方法
	调用静态属性和方法使用self:: 其它self不是指当前对象,而是指类($this指当前对象)
	静态方法中, 不能使用$this->调用非静态方法和属性
	静态方法中不能调用非静态属性和方法(使用$this->和self::都不以
10. final用于属性和方法前面, 不让此方法和属性在子类中被重写
11. clone关键词  $a=new Obj();   $b=clone $a;	($a===$b 为false)
12. __call($function_name, $args) 如果调用的方法不存在,对自动调用__call()
13. abstract关键词 修饰抽象方法和类
	抽象类不能被实例化; 
	抽象方法只能被声明,没有实现内容;
	
*/

?>




















