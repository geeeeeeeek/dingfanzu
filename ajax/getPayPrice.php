<?php 
require_once '../include.php'; 
include 'common.php';
  
$username=$_POST['username']; 
$shopId=$_POST['shopId'];
$itemsTxt=$_POST['itemsTxt'];

$payPrice=getPayPrice($username,$shopId,$itemsTxt);
if($payPrice>=0){
    $obj = new stdClass();
    $obj->code="0";
    $obj->payPrice=$payPrice;
    $obj->msg=urlencode("获取成功");//中文urlencode一下
    echo urldecode(json_encode($obj)); 
}else{
    $obj = new stdClass();
    $obj->code="1";
    $obj->msg=urlencode("获取失败");//中文urlencode一下
    echo urldecode(json_encode($obj)); 
}






 
?>