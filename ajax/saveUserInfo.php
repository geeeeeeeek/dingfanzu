<?php
require_once '../include.php'; 

  
$arr['name']=$_POST['name'];
$arr['building']=$_POST['place'];
$arr['addressDetail']=$_POST['addressDetail']; 
$arr['phone']=$_POST['pn'];

$username=$_POST['username'];

 
if(update("dfz_userinfo",$arr,"username='{$username}'")){
    $obj = new stdClass();
    $obj->code="0";
    $obj->msg=urlencode("保存成功");//中文urlencode一下
    echo urldecode(json_encode($obj)); 
} else{
    $obj = new stdClass();
    $obj->code="1";
    $obj->msg=urlencode("保存失败");//中文urlencode一下
    echo urldecode(json_encode($obj)); 
}

?>