<?php 
require_once '../include.php';
checkLogined();
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
$adminName=$_SESSION['adminName'];
$sql="select * from dfz_shop where adminName='{$adminName}'";
$totalRows=getResultNum($sql);
$pageSize=10;
$totalPage=ceil($totalRows/$pageSize);
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>=$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select * from dfz_shop where adminName='{$adminName}'  order by shopId asc limit {$offset},{$pageSize}";
$rows=fetchAll($sql);
if(!$rows){
    alertMes("sorry,没有店铺,请添加!","addShop.php");
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
                            <input type="button" value="添加店铺" class="btn btn-primary"  onclick="addShop()">
                        </div>
                            
                    </div>
                    <!--表格-->
                    <table class="table table-hover" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th align="center" width="15%">店铺名称</th>
                                <th align="center" width="15%">店铺id</th>
                                <th align="center" width="15%">店铺状态</th>
                                <th align="center" width="25%">店铺公告</th>
                                <th align="center" >店铺icon</th>
                                <th align="center" width="40">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  foreach($rows as $row):?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                            
                                <td align="center"><?php echo $row['shopName'];?></td>
                                <td align="center"><?php echo $row['shopId'];?></td>
                                <td align="center"><?php echo $row['shopState']==1?'营业':'休息';?></td>
                                <td align="center"><?php echo $row['shopTip'];?></td>
                                <td align="center">
                                    <img src="<?php echo IMG_SHOP.$row['shopIcon'].'?v='.time();?>" width=50 height=50/>
                                </td> 
                                <td align="center"><a class="btn btn-link" onclick="editShop(<?php echo $row['shopId'];?>)">修改</a><a class="btn btn-link"  onclick="delShop(<?php echo $row['shopId'];?>)">删除</a></td>
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
    function editShop(shopId){
        window.location="editShop.php?shopId="+shopId;
    }
    function delShop(shopId){
        if(window.confirm("您确定要删除吗？删除之后不能恢复哦！！！")){
            window.location="doAdminAction.php?act=delShop&shopId="+shopId;
        }
    }
    function addShop(){
        window.location="addShop.php";
    }
</script>
</body>
</html>