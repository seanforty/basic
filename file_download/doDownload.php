<?php
/*
1.下载页面传过来文件ID
2.通过文件ID查找到需要下载的真实文件路径
3.fopen打开文件, fread读取文件数据下载
*/

//$fileID           = $_POST['file_id'];   //传输过来的文件ID
//$fileDownloadName = $_POST['file_name']; //传输过来的文件名
$fileName         = "1591972_hq.mp4";      //真实文件路径
$download_rate    = "500";			       //限制下载速度500KB
$md5time          = $_GET["md5"];
$salt             = "he231v";

if(file_exists($fileName) && is_file($fileName) && ($md5time+10)>md5(time()+$salt) ){
	
	header("cache-control:private");
	header("content-type:application/octet-stream");
	header("content-disposition:attachment;filename=".basename($fileName));
	header("content-length:".filesize($fileName));
	flush();
	
	$file=fopen($fileName,"r");
	while(!feof($file)){
		print(fread($file, $download_rate*1024));
		flush();
		ob_flush();
		sleep(1);
	}
	
	fclose($file);
	
}else{
	
	echo("文件过期");
}


