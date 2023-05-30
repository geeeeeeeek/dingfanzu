<?php 
require_once '../include.php';
checkLogined();
$sql="select * from dfz_user";
$rows=fetchAll($sql);
if(!$rows){
    //没有用户
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
<span class="main-title">用户列表</span>
<div class="details">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                        </div>
                            
                    </div>
                    <!--表格-->
                    <table class="table  table-hover">
                        <thead>
                            <tr>
                                <th width="20%">用户名称</th>
                                <th width="20%">姓名</th>
                                <th width="20%">地址</th>
                                <th width="20%">注册时间</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  foreach($rows as $row):?>
                            <tr align="center">
                              
                                <td><?php echo $row['username'];?></td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['building'].$row['block'].'座'.$row['floor'].'层';?></td>
                                <td><?php echo date("Y-m-d H:i:s",$row['regTime']);?></td>
                                 
                                <td align="center"><a class="btn btn-link" onclick="limitUser(<?php echo $row['id'];?>)">屏蔽</a><a class="btn btn-link"  onclick="delUser('<?php echo $row['username'];?>')">删除</a></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
</body>
<script type="text/javascript">

	function addUser(){
		window.location="addUser.php";	
	}
	function limitUser(id){
			
	}
	function delUser(username){
			if(window.confirm("确认删除？")){
				window.location="doAdminAction.php?act=delUser&username="+username;
			}
	}
</script>
</html>