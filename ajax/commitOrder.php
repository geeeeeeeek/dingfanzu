<?php 
require_once '../include.php'; 
include 'common.php';

//验证是否登录后
$ss=$_SESSION['userId']; 
if(!isset($ss)){
    $obj = new stdClass();
    $obj->code="1"; 
    $obj->msg="api请求失败";
    echo urldecode(json_encode($obj));
    return; 
}

$arr['username']=$_POST['username']; 
$arr['items']=$_POST['items']; 
$arr['shopId']=$_POST['shopId'];
$arr['shopName']=$_POST['shopName'];
$arr['shopPhone']=$_POST['shopPhone'];
$arr['price']=getPayPrice($arr['username'],$arr['shopId'],$arr['items']); 
$arr['orderAddress']=$_POST['orderAddress'];
$arr['orderName']=$_POST['name'];
$arr['orderPhone']=$_POST['pn'];
$arr['orderArrivedTime']=$_POST['orderArrivedTime'];
$arr['orderRemark']=trim($_POST['orderRemark']);
$arr['orderTime']=time();
$arr['pay']=0;
$arr['paymethod']=$_POST['paymethod'];
$arr['received']=0;
$arr['orderId']=getMilliSeconds();


//查看
// $row=fetchOne();

if(insert("dfz_order", $arr)){ 
    //减积分
    minusJifen($arr['username']);
    $obj = new stdClass();
    $obj->code="0";  
    echo urldecode(json_encode($obj));
    return; 
}





?>