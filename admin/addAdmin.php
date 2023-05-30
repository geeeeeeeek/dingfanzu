<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<link rel=stylesheet href="styles/reset.css">
<link rel=stylesheet href="styles/bootstrap-admin.css"> 
<link rel=stylesheet href="styles/global.css"    />
<link rel=stylesheet href="styles/backstage.css"   />
</head>
<body>
<span class="main-title">添加管理员</span>
<span id="main-tip"></span>
<div class="form-add">
<form action="doAdminAction.php?act=addAdmin" method="post">
<table class="table  table-bordered table-hover">
    <tr>
        <td align="right" width="15%"><span class="td-txt">管理员名称</span></td>
        <td><input type="text" name="username" placeholder="请输入管理员名称"/></td>
    </tr>
    <tr>
        <td align="right"><span class="td-txt">管理员密码</span></td>
        <td><input type="password" name="password" /></td>
    </tr>
    <tr>
        <td align="right"><span class="td-txt">管理员邮箱</span></td>
        <td><input type="text" name="email" placeholder="请输入管理员邮箱"/></td>
    </tr> 
    <tr>
        <td align="right"><span class="td-txt">管理员电话</span></td>
        <td><input type="text" name="shopPhone" placeholder="请输入电话"/></td>
    </tr>   
</table>
<input class="btn btn-primary" type="submit"  value="添加管理员"/>
</form>
</div>
</body>
</html>