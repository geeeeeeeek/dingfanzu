<?php 
require_once '../include.php';
$id=$_REQUEST['id'];
$sql="select * from dfz_admin where id='{$id}'";
$row=fetchOne($sql);
?>
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
<span class="main-title">管理员列表 &gt; 修改</span>
<div class="form-add">
<form action="doAdminAction.php?act=editAdmin&id=<?php echo $id;?>" method="post">
<table class="table  table-bordered table-hover">
	<tr>
		<td align="right" width="15%"><span class="td-txt">管理员名称</span></td>
		<td><input type="text" name="username" value="<?php echo $row['username'];?>"/></td>
	</tr>
	<tr>
		<td align="right"><span class="td-txt">管理员密码</span></td>
		<td><input type="password" name="password"  value=""/></td>
	</tr>
	<tr>
		<td align="right"><span class="td-txt">管理员邮箱</span></td>
		<td><input type="text" name="email" value="<?php echo $row['email'];?>"/></td>
	</tr> 
	<tr>
		<td align="right"><span class="td-txt">管理员电话</span></td>
		<td><input type="text" name="shopPhone" value="<?php echo $row['shopPhone'];?>"/></td>
	</tr>  
</table>
<input class="btn btn-primary" type="submit"  value="修改完成"/>
</form>
</div>
</body>
</html>