<?php
if(!empty($_COOKIE['adminId'])&&$_COOKIE['adminId']!=""){
	header("location:index.php");
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>登陆</title>
<link  rel="stylesheet" href="styles/reset.css">
<link rel=stylesheet href="styles/bootstrap-admin.css">
<link rel="stylesheet" href="styles/backstage.css">
<link  rel="stylesheet" href="styles/main.css?v=1">
<!--[if IE 6]>
<script type="text/javascript" src="../js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="../js/ie6Fixpng.js"></script>
<![endif]-->
</head>

<body>

<div class="head">
            <div class="logo fl"><a href="#"></a></div>
            <span class="head_text">商家后台管理系统</span>

</div>

<div class="loginTip">
测试账号：admin 密码：admin
</div>

<div class="loginBox">
	<div class="login_cont">
		<form action="doLogin.php" method="post">
			<ul class="login">
				<li class="l_tit">管理员帐号</li>
				<li class="mb_10"><input type="text"  name="username" placeholder="请输入管理员帐号"class="form-control"></li>
				<li class="l_tit">密码</li>
				<li class="mb_10"><input type="password"  name="password" class="form-control" placeholder="请输入密码"></li>
				<li class="l_tit">验证码</li>
				<li class="mb_10"><input type="text"  name="verify" class="form-control password_icon"></li>
				<img src="getVerify.php" alt="" />
				<li class="autoLogin"><input type="checkbox" id="a1" class="checked" name="autoFlag" value="1"><span class="checked-txt">一个月内自动登录</span></li>
				<li><input type="submit" value="登录" class="btn btn-primary login-btn"></li>
			</ul>
		</form>
	</div>
</div>

<div class="footer">

	<p>Copyright &copy; 2015 - 2017 &nbsp;&nbsp;&nbsp;</p>

</div>
</body>
</html>
