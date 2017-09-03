<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/8/31
 * Time: 7:49
 */

class AutoLoader{
    public $namespace = array();

    /*
     * spl_autoload_register 注册给定的函数作为 __autoload 的实现
     * @param void
     * @return void
     */
    public function register(){
        spl_autoload_register(array($this, 'loadClass'));
    }

    /*
     * 转入命名空间形式的类路径, 提取出命名空间和类名
     * @param path string
     * @return void
     */
    public function loadClass($path){
        $path = ltrim($path,"\\");
        $pos = strrpos($path,"\\");
        $namespace = substr($path,0,$pos);
        $className = substr($path,$pos+1);
        $this->mapLoad($namespace,$className);
    }

    /*
     * 传入命名空间和类名, 组装成类所在文件的绝对路径(要求文件与类同名)
     * @param namespace string
     * @param classname string
     * @return void
     */
    protected function mapLoad($namespace,$classname){
        if( isset($this->namespace[$namespace]) ) {
            $filename = str_replace("\\", DS, $this->namespace[$namespace]);
        }else{
            $filename = str_replace("\\", DS, $namespace);
        }
        $dir = dirname(__FILE__);
        echo($dir);echo("<br>");
        $path = UEE_PATH . $filename . DS . $classname . ".php";
        echo($path);
        $this->requireClass($path);
    }

    /*
     * 使用require加载文件 **若加载的文件不存在报错
     * @param path string
     * @return
     */
    protected function requireClass($path){
        if(file_exists($path)){
            require $path;
        }else{
            exit("加载的类不存在");
        }
    }

    /*
     * 使用include加载文件 **若加载的文件不存在,报notice
     * @param path string
     * @return
     */
    protected function includeClass($path)
    {
        include $path;
    }
}

