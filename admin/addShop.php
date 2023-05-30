<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>添加店铺</title>

<link rel=stylesheet href="./styles/reset.css">
<link rel="stylesheet" href="./styles/bootstrap-admin.css"> 
<link href="./styles/global.css"  rel="stylesheet"  type="text/css"/>
<link href="./styles/backstage.css"  rel="stylesheet"  type="text/css"/>
</head>
<body> 
<span class="main-title">添加店铺</span>
<div id="main-tip"></div>
<div class="form-add">
<form id="form1" action="doAdminAction.php?act=addShop" method="post" enctype="multipart/form-data">
<table class="table  table-bordered table-hover">
    <tr>
        <td align="right" width="20%"><span class="td-txt">店铺名称</span></td>
        <td><input type="text" width="100%" id="shopName" name="shopName" placeholder="请输入名称"/></td>
    </tr>
    <tr>
        <td align="right"><span class="td-txt">店铺公告</span></td>
        <td><input type="text" name="shopTip" placeholder="店铺公告"/></td>
    </tr> 
    <tr>
        <td align="right"><span class="td-txt">店铺状态</span></td>
        <td>
            <div class="form-td">
                <input type="radio" name="shopState" checked value="1" ><span class="td-txt">营业</span>
                <input type="radio" name="shopState"  value="0" ><span class="td-txt">休息</span> 
            </div>
        </td>
    </tr> 
    <tr>
        <td align="right"><span class="td-txt">店铺楼宇</span></td>
        <td><input type="text" name="shopBlock" placeholder="店铺楼宇"/></td>
    </tr> 
    <tr>
        <td align="right"><span class="td-txt">店铺楼层</span></td>
        <td><input type="text" name="shopFloor" placeholder="店铺楼层"/></td>
    </tr> 
    <tr>
        <td align="right"><span class="td-txt">店铺icon</span></td>
        <td><input class="btn btn-file" type="file" name="myFile"/></td>
    </tr> 

</table>
<input class="btn btn-primary" type="submit" value="添加店铺"/>
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
    if($("input[name='shopName']").val().length<=0){ 
        $("#main-tip").html('名称不能为空');
        $("#main-tip").css('display', 'inline-block');
        return false;
    }
    if($("input[name='shopTip']").val().length<=0){ 
        $("#main-tip").html('公告不能为空');
        $("#main-tip").css('display', 'inline-block');
        return false;
    }
    if($("input[name='myFile']").val().length<=0){ 
        $("#main-tip").html('图片不能为空');
        $("#main-tip").css('display', 'inline-block');
        return false;
    }
    $("#main-tip").hide();
    return true;
 }
</script>
</body>  
</html>