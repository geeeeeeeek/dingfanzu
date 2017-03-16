<?php 
require_once '../include.php';
checkLogined();
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
$adminName=$_SESSION['adminName'];
$sql="select * from dfz_cate where adminName='{$adminName}'";
$totalRows=getResultNum($sql);
$pageSize=10;
$totalPage=ceil($totalRows/$pageSize);
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>=$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;

$where=" where a.adminName='{$adminName}'";
$sql="select a.* from dfz_cate as a {$where}";
$rows=fetchAll($sql);
// $rows=getAllCate($adminName);
if(!$rows){
	alertMes("sorry,没有分类,请添加!","addCate.php");
	exit;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>

<link rel="stylesheet" href="styles/reset.css">
<link rel="stylesheet" href="styles/bootstrap-admin.css">
<link rel="stylesheet" href="styles/backstage.css">
</head>
<body>
<div class="details">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <input type="button" value="添加分类" class="btn btn-primary"  onclick="addCate()">
                        </div>
                            
                    </div>
                    <!--表格-->
                    <table class="table table-hover" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th align="center"  width="30%">分类</th>
                                <th align="center" width="30%">权重</th>
                                <th align="center" >操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  foreach($rows as $row):?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                            
                                <td align="center"><?php echo $row['cName'];?></td>
                                <td align="center"><?php echo $row['weight'];?></td>
                                <td align="center"><a class="btn btn-link" onclick="editCate(<?php echo $row['id'];?>)">修改</a><a class="btn btn-link"  onclick="delCate(<?php echo $row['id'];?>)">删除</a></td>
                            </tr>
                            <?php endforeach;?>
                            <?php if($totalRows>$pageSize):?>
                            <tr>
                            	<td colspan="4"><?php echo showPage($page, $totalPage);?></td>
                            </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
<script type="text/javascript">
	function editCate(id){
		window.location="editCate.php?id="+id;
	}
	function delCate(id){
		if(window.confirm("您确定要删除吗？删除之后不能恢复哦！！！")){
			window.location="doAdminAction.php?act=delCate&id="+id;
		}
	}
	function addCate(){
		window.location="addCate.php";
	}
</script>
</body>
</html>