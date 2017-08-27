<?php
/*
写一个函数， 获取URL中的文件后缀 .php 或 php
*/

$url = "http://www.baidu.com/cart.php?id=123&md5=bdd54c4087473d85bb4a70efd85a7b90";
$url2 = "http://www.runoob.com/try/try.php?filename=tryhtml_links";

//方法一
// 重点函数  parse_url(),  end()
function getExtA($url){
	$baseInfo = parse_url($url);
	if(array_key_exists("path", $baseInfo)){
		$tempArr = explode(".", $baseInfo["path"]);
		return end($tempArr);
	}else{
		return "Something error";
	}
}

//方法二
// 重点函数 basename() , strpos(), substr()
function getExtB($url){
	$baseInfo = basename($url);
	$position1 = strpos($baseInfo, ".");
	$position2 = strpos($baseInfo, "?");
	return substr( $baseInfo, $position1+1, ($position2-$position1-1) );
}

echo getExtB($url2);

?>