<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>register</title>
</head>
<body>
<form action="/index.php/Home/Passport/checkRegister" method="post">
	用户名：<input type="text" name="name">
	密码：<input type="password" name="password">
	确认密码：<input type="password" name="password2">
	<input type="submit">
</form>
</body>
</html>