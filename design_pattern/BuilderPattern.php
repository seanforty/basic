<?php
//创建者模式
class Bird{
    protected $_head="";
    protected $_wings="";
    protected $_foots="";
    
    public function __get($name){
        return $this->$name;
    }
    
    public function __set($name,$value){
        $this->$name = $value;
    }
    
    public function show(){
        echo "头部的颜色: {$this->_head}<br>";
        echo "翅膀的颜色: {$this->_wings}<br>";
        echo "脚部的颜色: {$this->_foots}<br>";
    }
}

abstract class BirdBuilder{
    protected $_bird=null;
    
    public function __construct(){
        $this->_bird = new Bird();
    }
    
    public function __get($name){
        return $this->$name;
    }
    
    public function __set($name,$value){
        $this->$name = $value;
    }
    
    public function getBird(){
        return $this->_bird;
    }
    
    public abstract function buildHead();
    public abstract function buildWings();
    public abstract function buildFoots();
}

class BlueBird extends BirdBuilder{
    public function buildHead(){
        $this->_bird->_head = "blue";
    }
    
    public function buildWings(){
        $this->_bird->_wings = "blue";
    }
    
    public function buildFoots(){
        $this->_bird->_foots = "blue";
    }
}

class RedBird extends BirdBuilder{
    public function buildHead(){
        $this->_bird->_head = "red";
    }
    
    public function buildWings(){
        $this->_bird->_wings = "red";
    }
    
    public function buildFoots(){
        $this->_bird->_foots = "red";
    }
}

class builder{
    //创建一只鸟
    public function __construct($_builder){
        $_builder->buildHead();
        $_builder->buildWings();
        $_builder->buildFoots();
        $bird = $_builder->getBird();
        $bird->show();
    }
}

new builder(new BlueBird());
new builder(new RedBird());

?>