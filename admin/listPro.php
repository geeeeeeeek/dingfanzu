<?php 
require_once '../include.php';
checkLogined();
$adminName=$_SESSION['adminName'];
//获取所有店铺
$shops=getAllShop($adminName);
if(!$shops){
   // alertMes("没有相应分类，请先添加分类!!", "addCate.php");
}
//获取请求id
$shopId=$_REQUEST['shopId']?$_REQUEST['shopId']:null; 
//按时间排序
$orderBy="order by dfz_pro.pubTime desc ";
$keywords=$_REQUEST['keywords']?$_REQUEST['keywords']:null;
$where=$shopId?"where dfz_pro.shopId='{$shopId}' and dfz_pro.adminName='{$adminName}' ":"where dfz_pro.adminName='{$adminName}' ";
//得到数据库中所有商品
$sql="select * from dfz_pro as a  {$where} ";
$totalRows=getResultNum($sql);
$pageSize=10;
$totalPage=ceil($totalRows/$pageSize);
if($totalPage<1)$totalPage=1;
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select dfz_pro.*,dfz_shop.shopName,dfz_cate.cName from (dfz_pro join dfz_shop on dfz_pro.shopId=dfz_shop.shopId )  join dfz_cate  on dfz_pro.pCateId=dfz_cate.id {$where} {$orderBy} limit {$offset},{$pageSize}";

$rows=fetchAll($sql);
if(!$rows){ 
   // alertMes("sorry,没有商品,请添加!","addPro.php");
    //exit;
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
 
<span class="main-title">商品列表</span>
<div class="details">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <input class="btn btn-primary" type="button" value="添加商品" class="add" onclick="addPro()">
                        </div>
                        <div class="fr">
                            <div class="text">
                                <span>所属店铺：</span>
                                <div class="bui_select">
                                    <select id="" class="select form-control" onchange="change(this.value)">
                                    <option value="" selected='selected'>全部</option>
                                        <?php foreach($shops as $shop):?>
                                           <option value="<?php echo $shop['shopId'];?>" <?php echo $shop['shopId']==$shopId?"selected='selected'":null;?>><?php echo $shop['shopName'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--表格-->
                    <table  class="table  table-hover">
                        <thead>
                            <tr>
                                <th width="15%">商品编号</th>
                                <th width="15%">商品名称</th>
                                <th width="10%">商品分类</th>
                                <th width="10%">所属店铺</th>
                                <th width="10%">价格</th> 
                                <th width="10%">发布时间</th>
                                <th width="15%">商品图像</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($rows as $row):?>
                            <tr align="center">
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><?php echo $row['pSn'];?></td>
                                <td><?php echo $row['pName']; ?></td>
                                <td><?php echo $row['cName'];?></td>
                                <td><?php echo $row['shopName'];?></td>
                                <td><?php echo $row['priceB'];?></td> 
                                <td><?php echo date("Y-m-d H:i:s",$row['pubTime']);?></td>
                                <td><img src="<?php echo IMG_50.$row['icon'].'?v='.time();?>"/></td>
                                <td>
                                				<a class="btn btn-link" onclick="editPro(<?php echo $row['id'];?>,<?php echo $row['pSn'];?>)">修改</a><a class="btn btn-link"  onclick="delPro(<?php echo $row['id'];?>)">删除</a>
					                            
                                
                                </td>
                            </tr>
                           <?php  endforeach;?>
                        </tbody>
                    </table> 
                    <?php 
                        if($totalRows>$pageSize){
                        echo showPage($page, $totalPage,"keywords={$keywords}&order={$order}");   
                        }
                    ?>
                </div>
<script type="text/javascript">
function showDetail(id,t){
	$("#showDetail"+id).dialog({
		  height:"auto",
	      width: "auto",
	      position: {my: "center", at: "center",  collision:"fit"},
	      modal:false,//是否模式对话框
	      draggable:true,//是否允许拖拽
	      resizable:true,//是否允许拖动
	      title:"商品名称："+t,//对话框标题
	      show:"slide",
	      hide:"explode"
	});
}
	function addPro(){
		window.location='addPro.php';
	}
	function editPro(id,pSn){
		window.location='editPro.php?id='+id+'&pSn='+pSn;
	}
	function delPro(id){
		if(window.confirm("您确认要删除嘛？添加一次不易，且删且珍惜!")){
			window.location="doAdminAction.php?act=delPro&id="+id;
		}
	}
	function search(){
		if(event.keyCode==13){
			var val=document.getElementById("search").value;
			window.location="listPro.php?keywords="+val;
		}
	}
	function change(val){
		window.location="listPro.php?shopId="+val;
	}
</script>
</body>
</html>