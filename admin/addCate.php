<?php 
require_once '../include.php';
checkLogined();
$rows=getAllShop($_SESSION['adminName']);
if(!$rows){
    alertMes("没有店铺，请先添加店铺!!", "addShop.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>

<link rel=stylesheet href="./styles/reset.css">
<link rel="stylesheet" href="./styles/bootstrap-admin.css"> 
<link href="./styles/global.css"  rel="stylesheet"  type="text/css"/>
<link href="./styles/backstage.css"  rel="stylesheet"  type="text/css"/>
</head>
<body> 
<span class="main-title">添加分类</span>
<div id="main-tip"></div>
<div class="form-add">
<form id="form1" action="doAdminAction.php?act=addCate" method="post">
<table class="table  table-bordered table-hover">
	<tr>
		<td align="right" width="20%"><span class="td-txt">分类名称</span></td>
		<td><input type="text" width="100%" id="cname" name="cname" placeholder="请输入分类名称"/></td>
	</tr>
    <tr>
        <td align="right"><span class="td-txt">权重</span></td>
        <td><input type="text" name="weight" placeholder="权重数字，越大越靠前"/></td>
    </tr> 

</table>
<input class="btn btn-primary" type="submit" value="添加分类"/>
</form> 
</div>

<script type="text/javascript" src="scripts/jquery-1.8.3.js"></script>
<script type="text/javascript">
 $(document).ready(function(){ 
   $("#form1").submit(function () {
    if(isValid()){ 
        return true;
    }else{ 
        return false;
    }
 });
});  
 function isValid(){ 
    if($("input[name='cname']").val().length<=0){ 
        $("#main-tip").html('分类不能为空');
        $("#main-tip").css('display', 'inline-block');
        return false;
    }
    if($("input[name='weight']").val().length<=0){ 
        $("#main-tip").html('权重不能为空');
        $("#main-tip").css('display', 'inline-block');
        return false;
    }
    if(isNaN($("input[name='weight']").val())){ 
        $("#main-tip").html('权重必须为数字');
        $("#main-tip").css('display', 'inline-block');
        return false;
    }
    $("#main-tip").hide();
    return true;
 }
</script>
</body>  
</html>