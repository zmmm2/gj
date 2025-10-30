<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>头像上传</title>
    <style>
        body {min-width: 300px;}
    </style>
</head>
<body>
<center>
<form method="post" enctype="multipart/form-data"action="portraitupload.php?admin=<?php echo $_GET['admin'];?>&user=<?php echo $_GET['user']; ?>&pass=<?php echo $_GET['pass']; ?>">
头像：<input style="width: 180px;" type="file" name="file">
<input type="submit"  value="上传">
<br><br><br><br><br>支持的格式:<br><font size=1>jpg | png</font>
</form>
</center>
</body>
</html>