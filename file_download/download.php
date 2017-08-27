<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Insert title here</title>
</head>
<body>
<?php $salt="he231v"; ?>
<a href="doDownload.php?id=12&md5=<?php echo md5(time()+$salt); ?>">Download nv.jpg</a>
<?php

?>
</body>
</html>