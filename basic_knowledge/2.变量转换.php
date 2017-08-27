<?php
/*
* PHP基础知识回顾整理
* 二. 变量转换及判断
*/

//1. 转换为布尔值
/*
变量一般不需要强制转换,其在需要一个boolean值时,会被自动转换
以下情况会转换为false, 其余情况被转换为true
布尔值 FALSE 本身
整型值 0（零）
浮点型值 0.0（零）
空字符串，以及字符串 "0"
不包括任何元素的数组
特殊类型 NULL（包括尚未赋值的变量）
从空标记生成的 SimpleXML 对象

其它变量都会转换为true, 包括"false",  资源变量等
***注: 空对象被转换为1, 并报notice错误
*/
$booBool=(bool)false;
$booInt=(bool)0;
$booFloat=(bool)0.0;
$booString=(bool)"";
$booArray=(bool)[];
$booNull=(bool)null;

//2. 转换为整型
//布尔值 true 转换为1,  false转换为0
$foo = (int)true // 1
$foo = (int)false // 0
//数组类型 空数组转换为0, 非空数组转换为1
$foo = (integer)array(); // 0
$foo = (integer)[1,2,3]; // 1
//对象类型转换为1, 报notice错误
// $foo = (int)(new (A{}){})
//空值类型转换为0
$foo = (int)null; // 0
//资源类型转换成---未知

//3. 转换为浮点型
$foo = (float)2 //2  类型为double
$foo = (float)"23e3aaaa" // 23000
//布尔型, 整型, 字符串, 数组, 对象, 资源, null同上

//附加: 字符串转换为数值类型(自动转换)
/*
字符串以数值开始,使用该数值, 否则值为0
字符串包含 ".", "e", "E"时,转换为浮点型, 否则值为整型,
*/
$foo = 1 + "10.5";                // $foo is float (11.5)
$foo = 1 + "-1.3e3";              // $foo is float (-1299)
$foo = 1 + "bob-1.3e3";           // $foo is integer (1)
$foo = 1 + "bob3";                // $foo is integer (1)
$foo = 1 + "10 Small Pigs";       // $foo is integer (11)
$foo = 4 + "10.2 Little Piggies"; // $foo is float (14.2)
$foo = "10.0 pigs " + 1;          // $foo is float (11)
$foo = "10.0 pigs " + 1.0;        // $foo is float (11)  

//4. 转换为字符串
/* 
强制转换 (string)$foo, 或者 strval($foo)
数值类型直接可转换为字符串
布尔类型 true=> "1", false=> ""
null转换成空字符串
资源转换成"Resource id #3"结构的字符串

对象转换成字符串时报错 fatal error
数组转换为Array, 并报notice错误
*/
$foo=(string)1.5e3; //echo 1500
$foo=(string)[1,3,4]; // echo Array
$foo=(string)(new A()); //


//5. 变量处理函数
//a.变量类型判断
gettype();
is_int();
is_integer();
is_float();
is_real(); //同 is_float()
is_double(); //同 is_float()
is_numeric();  //检测变量是否为数字或数字字符串 
is_string();
is_bool();
is_string();
is_object();
is_null();
is_resource();
is_callable();
is_iterable(); //是否是迭代 ???
isset(); //检测变量是否设置
unset(); //销毁指定的变量。
empty(); //检查一个变量是否为空
/*
与强制转换为布尔值中false类型
以下情况返回1
"" (空字符串)
0 (作为整数的0)
0.0 (作为浮点数的0)
"0" (作为字符串的0)
NULL
FALSE
array() (一个空数组)
$var; (一个声明了，但是没有值的变量)
*/
boolval(); //获取变量的布尔值
floatval(); //获取变量的浮点值
doubleval(); //同floatval();
get_resource_type(); //返回资源（resource）类型
import_request_variables(); //将 GET／POST／Cookie 变量导入到全局作用域中
serialize(); //产生一个可存储的值的表示, 返回字符串
unserialize(string); //从已存储的表示中创建 PHP 的值, 返回integer、float、string、array 或 object, 失败则返回false
?>
