<?php
/*  
 *  1. 表单中隐藏提交一个md5加密的时间戳, 通过session验证防止重复提交
 *  2. 引入upload.class.php文件, 使用getFileList方法对$_FILES进行形式转换
 *  3. 对新数组进行for循环, 通过Upload类进行文件上传处理
 */
session_start();
header("content-type:text/html;charset=utf-8");
if(isset($_SESSION['submitkey']) && $_POST['submitkey'] == $_SESSION['submitkey']){
	exit("请不要重复提交");
}else{
	$_SESSION['submitkey'] = $_POST['submitkey'];
}

//print_r($_FILES);
include 'upload.class.php';
$uploadedFiles = getFileList($_FILES);
print_r($uploadedFiles);
$destinationDir = array();
foreach($uploadedFiles as $key=>$val){
	$newFile = new Upload($val);
	$destinationDir[$key] = $newFile->uploadFile();
}
print_r($destinationDir);

?>