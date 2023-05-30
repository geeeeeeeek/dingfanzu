<?php 
require_once '../include.php';
$pageSize=10;
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
$rows=getAdminByPage($page,$pageSize);


if(!$rows){
    alertMes("sorry,没有管理员,请添加!","addAdmin.php");
    exit;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="styles/reset.css">
<link rel="stylesheet" href="styles/bootstrap-admin.css">
<link rel="stylesheet" href="styles/backstage.css">
</head>

<body>
<span class="main-title">管理员列表</span>
<div class="details">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <input class="btn btn-primary"  type="button" value="添加管理员" class="add"  onclick="addAdmin()">
                        </div>
                            
                    </div>
                    <!--表格-->
                    <table  class="table  table-hover">
                        <thead>
                            <tr>
                                <th width="25%">管理员名称</th>
                                <th width="30%">管理员邮箱</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  foreach($rows as $row):?>
                            <tr align="center">
                                
                                <td><?php echo $row['username'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td align="center"><a class="btn btn-link" onclick="editAdmin(<?php echo $row['id'];?>)">修改</a><a class="btn btn-link" onclick="delAdmin(<?php echo $row['id'];?>)">删除</a></td>
                            </tr>
                            <?php endforeach;?>
                            
                        </tbody>
                    </table>
                    <?php if($totalRows>$pageSize):?> 
                    <?php echo showPage($page, $totalPage);?>
                    <?php endif;?>
                </div>
</body>
<script type="text/javascript">

    function addAdmin(){
        window.location="addAdmin.php"; 
    }
    function editAdmin(id){
            window.location="editAdmin.php?id="+id;
    }
    function delAdmin(id){
            if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
                window.location="doAdminAction.php?act=delAdmin&id="+id;
            }
    }
</script>
</html>