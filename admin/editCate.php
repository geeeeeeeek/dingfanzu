<?php 
require_once '../include.php';
$id=$_REQUEST['id'];
$cateInfo=getCateById($id);


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
<span class="main-title">分类列表 &gt; 修改分类</span>
<div class="form-add">
<form action="doAdminAction.php?act=editCate&id=<?php echo $id;?>" method="post">
<table class="table  table-bordered table-hover">
	<tr>
		<td align="right"><span class="td-txt">分类名称</span></td>
		<td><input type="text" name="cName" value="<?php echo $cateInfo['cName'];?>"/></td>
	</tr>
    <tr>
        <td align="right"><span class="td-txt">分类权重</span></td>
        <td><input type="text" name="weight" maxlength="4" value="<?php echo $cateInfo['weight'];?>"/></td>
    </tr> 
</table>
<input type="submit" class="btn btn-primary"   value="修改完成"/>
</form>
</div>
</body>
</html>