<form action="file_upload_handler.php" method="post" enctype="multipart/form-data">
产品多图<br/>
<input type="file" name="Files"><br/><br/>
<input type="hidden" name="submitkey" value="<?php echo md5(time()); ?>">
<input type="submit" name="submit">
</form>