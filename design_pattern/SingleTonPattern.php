<?php
/*
 1.只能有一个实例
 2.必须自行创建实例
 3.必须给其它对象提供这个实例

*/

class singleTon{
    //保存单例模式的实例
    public static $_instance = null;
    //私有化构造函数,禁止外部直接调用
    protected function __construct(){
        echo("实例化单例对象<br>");
    }
    //通过此方法取回实例
    public static function getInstance(){
        if( is_null(self::$_instance) || !isset(self::$_instance) ){
            self::$_instance = new self();
        }else{
            echo("取回对象<br>");
        }
        return self::$_instance;
    }
    //禁止克隆
    protected function __clone(){}

}

singleTon::getInstance();
singleTon::getInstance();
singleTon::getInstance();
singleTon::getInstance();
singleTon::getInstance();
?>