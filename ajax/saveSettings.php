<?php
require_once '../include.php'; 

   

$username=$_POST['username'];
$arr['name']=$_POST['name'];
$arr['email']=$_POST['email'];

 
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