<?php
require_once '../include.php'; 

//验证是否登录后
$ss=$_SESSION['userId']; 
if(!isset($ss)){
    $obj = new stdClass();
    $obj->code="1"; 
    $obj->msg="请求失败";
    echo urldecode(json_encode($obj));
    return; 
}


$arr=$_POST;
//合法验证
if(!isset($arr['hotelName'])){
    $obj = new stdClass();
    $obj->code="1";
    $obj->msg=urlencode("不能为空");//中文urlencode一下
    echo urldecode(json_encode($obj));
}
$arr['time']=time(); 
//开始插入
if(insert("dfz_hotel", $arr)){ 
    $obj = new stdClass();
    $obj->code="0";
    $obj->msg=urlencode("提交成功");//中文urlencode一下
    echo urldecode(json_encode($obj));
}else{
    $obj = new stdClass();
    $obj->code="1";
    $obj->msg=urlencode("提交失败");//中文urlencode一下
    echo urldecode(json_encode($obj));
}