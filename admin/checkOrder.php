<?php 
require_once '../include.php';
checkLogined();

//按时间排序
$orderBy="order by orderTime desc ";
//where条件
$shopId=$_REQUEST['shopId'];
$where=$shopId?"where shopId='{$shopId}' and (pay=1 or paymethod=2) and received=0 ":null;
//得到数据库中所有商品
$sql="select id from dfz_order {$where} ";
$rows=fetchAll($sql);
if(!$rows){ 
    echo "fail";
}else{
    echo "success";
}
?>