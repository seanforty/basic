<?php
/*
 * 简单工厂模式
 * 水果及子类
 */

//抽象类
abstract class fruit{
    abstract public function show();
}

class banana extends fruit{
    public function __construct(){
        $this->show();
    }
    
    public function show(){
        echo "banana";
    }
}

class apple extends fruit{
    public function __construct(){
        $this->show();
    }
    
    public function show(){
        echo "apple";
    }
}

//工厂类
class factory{
    public static function getFruit($fruitName){
        switch($fruitName){
            case "banana":
                $temp = new banana();break;
            case "apple":
                $temp = new apple();break;
            default:
                $temp = null;
        }
        return $temp;
    }
}


//前端程序
factory::getFruit("apple");

?>