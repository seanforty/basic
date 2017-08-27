<?php
/*
* PHP基础知识回顾整理
* 一.变量和常量
*/

/*
* 1. PHP变量: 
* 标量类型(4种): 整型, 浮点型, 字符串, 布尔类型
* 复合类型(2种): 数组, 对象
* 特殊类型(2种): 资源, 空值
*/

//a.标量类型之一: 整型
//php不支持无符号整数
//常量PHP_INT_MAX 用来表示最大值
//整数溢出: 如果一个整数超出范围,就会被解释为float类型
$variable_int_dec=1234;	//十进制整型, echo 1234
$variable_int_neg=-1234; //十进制整型负数, echo -1234
$variable_int_oct=010;	//八进制整型: 八进制数字前必须加"0"(阿拉伯数字0), echo 8
$variable_int_hex=0x10; //十六进制整型: 十六进制数字前必须加上"0x"(0同上), echo 16

//b.标量类型之二: 浮点型
$variable_float_a=3.1415; //小数点, echo 3.1415
$variable_float_b=3.14e5; //科学计数法e, echo 314000
$variable_float_c=3.14E5; //科学计数法E, echo 314000

//c.标量类型之三: 字符串(string只支持256个字符集,不支持unicode,  最大可达2GB) http://php.net/manual/zh/language.types.string.php
$variable_string_a='hello world'; //单引号字符串, echo hello world
//在单引号字符串中的变量和特殊字符的转义序列将不会被替换(\'和\\除外)
$variable_string_b="this is $variable_string_a"; //双引号字符串, echo this is hello world
//用双引号定义的字符串最重要的特征是变量会被解析, 且\n,\r,\t,\v,\e,\f,\\,\$,\"
$variable_string_c=<<<HEREDOC
Heredoc 结构不能用来初始化类的属性<br/>
Heredoc 结构就象是没有使用双引号的双引号字符串, 如\$variable_string_b : $variable_string_b<br/>
Heredoc 文中也能使用转义字符, 如\n,\r,\t,\v,\e,\f,\\,\$,\"<br/>
Heredoc 简单语法如上: $aaa被当成变量, 以及其它转义字符转义输出
HEREDOC 复杂语法(表示方式复杂):  
	字符串输出: {$aaa} ${aaa}
	对象输出: {$aaa->he()}
	数组输出: {$aaa[0]} {$aaa[2][2]} {$aaa['key']}
	
HEREDOC;
$variable_string_d=<<<'NOWDOC'
Nowdoc 结构是类似于单引号字符串,其中的内容不进行解析操作<br/>
适合用于嵌入 PHP 代码或其它大段文本而无需对其中的特殊字符进行转义<br/>
与 SGML 的 <![CDATA[ ]]> 结构是用来声明大段的不用解析的文本类似<br/>
如\n,\r,\t,\v,\e,\f,\\,\$,\<br/>
如 $variable_string_c<br/>
NOWDOC;

//d.标量类型之四: 布尔类型
$variable_boolean=true;	// true 转化成string为'1', false转化成string为''
//true/false不区别大小写


//e.复合类型之一: 数组类型
/*
数组中value 可以是任意类型
数组中key会有如下的强制转换：
	1).包含有合法整型值的字符串会被转换为整型。例如键名 "8" 实际会被储存为 8。但是 "08"则不会强制转换，因为其不是一个合法的十进制数值。
	2).浮点数也会被转换为整型，意味着其小数部分会被舍去。例如键名 8.7 实际会被储存为 8。
	3).布尔值也会被转换成整型。即键名 true 实际会被储存为 1 而键名 false 会被储存为 0。
	4).Null 会被转换为空字符串，即键名 null 实际会被储存为 ""。
	5).数组和对象不能被用为键名。坚持这么做会导致警告：Illegal offset type。
*/
$variable_array_a=[1,'hello','2','w']; 
$variable_array_assoc=array('key1'=>1,'key2'=>2); 

//f.复合类型之二: 对象类型
//数组转换为对象时,内置stdClass, 数组成员转换为类属性(key为属性变量名, value为属性值)
class ADO{
	public $param=1;
}
$variable_object=new ADO();

//g.特殊类型之一: 空值
$variable_null_a = null; //被赋值为null
$variable_null; //未赋值
$variable_null_c=1; echo (unset)$variable_null_c; //使用unset()函数返回空值
//注: 空字符串"", 空数组[], 空对象等都不是空值

//h.特殊类型之二: 资源类型
//资源类型保存了到外部资源的一个引用(特殊句柄), 如打开的文件, 数据库连接, 图形画面区域等。

//2.自定义常量
//常量的值只能是标量。
define("PI",3.141592654); //define定义常量
const ID=1234; //关键字 const 定义常量

//3.魔术常量
// 预定义常量: http://php.net/manual/zh/reserved.constants.php
// 魔术常量:   http://php.net/manual/zh/language.constants.predefined.php
echo "__LINE__::".__LINE__."<br>";
echo "__FILE__::".__FILE__."<br>";
echo "__DIR__::".__DIR__."<br>";
echo "__FUNCTION__::".__FUNCTION__."<br>";
echo "__CLASS__::".__CLASS__."<br>";
echo "__TRAIT__::".__TRAIT__."<br>";
echo "__METHOD__::".__METHOD__."<br>";
echo "__NAMESPACE__::".__NAMESPACE__."<br>"; 


?>
