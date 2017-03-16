<?php 
require_once '../include.php';
checkLogined();
$adminName=$_SESSION['adminName'];
//自己的全部店铺
$shops=getAllShop($adminName);

 

//按时间排序
$orderBy="order by orderTime desc ";
//where条件
$shopId=$_REQUEST['shopId']; //根据店铺id
 $where=$shopId?"where shopId='{$shopId}'":null; 
if(!$shopId){
    $orderPhone=$_REQUEST['orderPhone']; //根据手机号
    $where=$orderPhone?"where orderPhone like '%{$orderPhone}%'":null; 
}

//得到数据库中所有商品
$sql="select * from dfz_order {$where} ";
$totalRows=getResultNum($sql);
$pageSize=5;
$totalPage=ceil($totalRows/$pageSize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select * from dfz_order {$where} {$orderBy} limit {$offset},{$pageSize}";
$rows=fetchAll($sql);
if(!$rows){ 
    //echo "还没有订单！";
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
<span class="main-title">订单列表</span>
<div class="details">
                    <div class="details_operation clearfix">

                        <div class="fl">
                        </div>
                         
                        <div class="fr"> 
                            <div class="text">
                                <span>
                                <input type="text" value="" placeholder="搜索店铺Id" class="search form-control"  id="searchShopId" onkeypress="searchShopId()" >
                                </span>
                                <span>
                                <input type="text" value="" placeholder="搜索手机号" class="search form-control"  id="searchPhone" onkeypress="searchPhone()" >
                                </span>
                            </div>
                        </div>
                    </div>
                    <!--表格-->
                    <table class="table  table-hover">
                        <thead>
                            <tr>
                                <th width="10%">订单编号</th>
                                <th width="20%">名称</th> 
                                <th width="5%">价格</th>
                                <th width="5%">是否支付</th>
                                <th width="5%">支付方式</th>
                                <th width="5%">订单状态</th>
                                <th width="10%">订单时间</th>
                                <th width="10%">下单人/手机</th> 
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($rows as $row):?>
                            <tr align="center">
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><?php echo $row['orderId'];?></td> 
                                <td>
                                <?php 
                                $jsonArray=$row['items']; 
                                $arrayObj=json_decode($jsonArray,true);
                                $count=count($arrayObj);
                                for($i=0;$i<$count;$i++){
                                    echo $arrayObj[$i]['name']."</br>";
                                } 
                                ?>
                                </td>
                                <td><?php echo $row['price'];?></td>
                                <td><?php echo $row['pay']==1?"是":"否";?></td>
                                <td><?php echo $row['paymethod'];?></td>
                                <td><?php echo $row['received']==1?"已接":"未接";?></td>
                                <td><?php echo date("Y-m-d H:i:s",$row['orderTime']);?></td>
                                <td><?php echo $row['orderName'].'/'.$row['orderPhone'];?></td>
                                
                                <td align="center">
                                              <a class="btn btn-link"  onclick="printOrder(<?php echo $row['id'];?>)">打印</a>
                                </td>
                            </tr>
                           <?php  endforeach;?> 
                        </tbody>
                    </table>
                    <?php if($totalRows>$pageSize):?>
                             <?php echo showPage($page, $totalPage,"keywords={$keywords}&order={$order}");?> 
                    <?php endif;?>
                </div>
<script type="text/javascript">
    
    function searchShopId(){
        if(event.keyCode==13){
            var val=document.getElementById("searchShopId").value;
            window.location="listOrder.php?shopId="+val;
        }
    }

    function searchPhone(){
        if(event.keyCode==13){
            var val=document.getElementById("searchPhone").value;
            window.location="listOrder.php?orderPhone="+val;
        }
    }

     
</script>
</body>
</html>