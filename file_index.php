<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>易对接-文件托管</title>
    <style>
        body {
            min-width: 300px;
        }
    </style>
</head>
<body>
<form method="post" enctype="multipart/form-data"action="file_upload.php?user=<?php echo $_GET['user']; ?>&pass=<?php echo $_GET['pass']; ?>">
<center>
文件：<input style="width: 180px;" type="file" name="file">
<input style="width: 50px;" type="submit"  value="上传">
<br><br><br><br><br>支持的格式:<br><font size=1>apk | txt | gif | jpg | jpeg | png | zip | rar | doc | docx | exe | ppt | iApp</font>
</form>
</center>
</body>
</html>

