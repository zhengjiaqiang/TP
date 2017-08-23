<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<form action="/index.php/Home/Demo/add" method='post'>
顾客名称：<input type="text" name="c_name" id=""><br/>
验证码:<img src="<?php echo U('home/demo/verify');?>" alt="" title="" />
<input type="submit" value="提交">
</form>
</body>
</html>