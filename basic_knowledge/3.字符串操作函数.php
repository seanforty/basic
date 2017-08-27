<?php

/*
* PHP基础知识回顾整理
* 三. 字符串函数
*/

/*
strlen(string): 获取字符串长度
trim(string,mask(如\t\n\r\0\x0B)):   首尾去空白字符, 制表符/换行符/回车符/垂直制表符等, 同理rtrim() /ltrim()
substr(string,start,length): 字符串截取
mb_substr(string,start,length,encoding): 具备多字节字符处理能力,以字符为准截取
mb_strcut(string,start,length,encoding): 具备多字节字符处理能力,以字节为准截取
strpos(string, sub_string, offset): 查找字符串: 查找sub_string在string中第一次出现的位置,从offset处开始查找
chr(string);
*/

/*
* 四. 字符串函数
*/
array(); //创建数组
count(); //数组长度
array_diff(); //比较数组,只比较值
array_diff_assoc(); //比较数组, 比较键和值
array_diff_key(); //比较数组,只比较键名
array_flip(); //交换数组中的键和值
array_key_exists(); //判断key是否存在
array_keys(); //返回key
array_values(); //返回所有的值
array_map(); //把数组中的每个值发送到用户自定义函数，返回新的值
array_merge(); //把一个或多个数组合并为一个数组
array_combine($arr1, $arr2); //合并数组:  $arr1中成员作为key, $arr2中成员作为value
array_pop(); //删除数组最后一个元素
array_push(); //将变量加到数组最后一个位置
array_rand();
array_replace(); //使用后面的值替换第一个数组的值
array_reverse(); //翻转数组
array_search();  //查找并返回位置
array_slice();   //返回数组中选中的部分
array_splice(); //删除或替换指定元素
array_unique(); //删除重复的值
in_array(); //检查数组中是否存在指定的值。

sort();  //依据值排序, 排序成功返回true, 失败返回false
ksort(); //依据键排序;
rsort(); //依据值逆向排序
krsort(); //依据键逆向排序,并保持索引关系
asort(); //依据值排序,并保持索引关系
arsort();//依据值逆向排序,并保持索引关系

foreach($arr as $k=>$v){} //遍历数组
?>




















