<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>图片上传</title>
    <style>
        body {
            min-width: 300px;
        }
    </style>
</head>
<body>
<center>
<form method="post" enctype="multipart/form-data"action="icon.php?user=<?php echo $_GET['user']; ?>&pass=<?php echo $_GET['pass']; ?>">
<font style="font-size: 12px;">软 件 图：</font><input style="width: 150px; font-size: 11px;" type="file" name="file">
<input type="submit"  value="上传">
<br>
</form>
<form method="post" enctype="multipart/form-data"action="img1.php?user=<?php echo $_GET['user']; ?>&pass=<?php echo $_GET['pass']; ?>">
<font style="font-size: 12px;">介绍图1：</font><input style="width: 150px; font-size: 11px;" type="file" name="file">
<input type="submit"  value="上传">
<br>
</form>
<form method="post" enctype="multipart/form-data"action="img2.php?user=<?php echo $_GET['user']; ?>&pass=<?php echo $_GET['pass']; ?>">
<font style="font-size: 12px;">介绍图2：</font><input style="width: 150px; font-size: 11px;" type="file" name="file">
<input type="submit"  value="上传">
<br><br><br><br><br>支持的格式:<br><font size=1>jpg | png | jpag | pjpeg</font>
</form>
</center>
</body>
</html>

