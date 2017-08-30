<?php
/*
 * Observer Pattern 观察者模式
 * 
 */

abstract class subject{
	abstract public function attach($obsObj);
	abstract public function detach($obsObj);
	abstract public function notify();
}

abstract class observer{
	public $doing = "";
	public $updating = "";
	public $name = "";
  public function __construct(){
		//$this->doing = $doing;
		echo $this->name . "趁老板不在" . $this->doing;
	}
	public function update(){
		echo "老板来了," . $this->name . "赶紧" . $this->updating;	
	}
	
	public function __set($name,$value){
		$this->$name = $value;
	}
	public function __get($name){
		return $this->$name;
	}
}

class conObserverA extends observer{
	public $name = "小张";
	public $doing = "看股票<br>";
	public $updating = "关掉股票页面，认真工作<br>";
}

class conObserverB extends observer{
	public $name = "小李";
	public $doing = "看电影<br>";
	public $updating = "关掉电影页面，认真工作<br>";
}

class conSubject extends subject{
	
	public $observers = [];
	
	public function attach($obsObj){
		if($obsObj instanceof observer){
			$this->observers[] = $obsObj;
		}else{
			exit("obsObj is not observer instance.");
		}
	}
	
	public function detach($obsObj){
		if(in_array($obsObj,$this->observers)){
			$key = array_search($obsObj, $this->observers);
			unset( $this->observers[$key] );
		}else{
			exit("obsObj is not in  observer array.");
		}
	}
	
	public function notify(){
			foreach($this->observers as $v){
				$v->update();
			}
	}
}


$conObserverA = new conObserverA();
$conObserverB = new conObserverB();
$conSubject   = new conSubject();
$conSubject->attach($conObserverA);
$conSubject->attach($conObserverB);
//$conSubject->detach($conObserverB);
$conSubject->notify();

?>