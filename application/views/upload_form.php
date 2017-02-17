<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php //echo form_open_multipart('upload/do_upload');?>

<form method="post" action="http://localhost/codeIgniter3/index.php/upload/do_upload" enctype="multipart/form-data">
    
<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>