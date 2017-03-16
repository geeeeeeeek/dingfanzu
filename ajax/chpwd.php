<?php 
require_once '../include.php'; 


$username=$_POST['username'];
$pwd=md5($_POST['password']);

//合法检查
if($username==""){
    $obj = new stdClass();
    $obj->code="1";
    $obj->msg=urlencode("手机号不能为空");//中文urlencode一下
    echo urldecode(json_encode($obj));
    return;
}

//是否存在
$sql="select * from dfz_user where username='$username'";
$row=fetchOne($sql);
if(!$row){
    $obj = new stdClass();
    $obj->code="1";
    $obj->msg=urlencode("该用户不存在");//中文urlencode一下
    echo urldecode(json_encode($obj));
    return;
}

//update 

$arr['password']=$pwd;
if(update("dfz_user", $arr,"username={$username}")){
    $obj = new stdClass();
    $obj->code="0";
    $obj->msg=urlencode("修改成功");//中文urlencode一下
    echo urldecode(json_encode($obj)); 
}else{
    $obj = new stdClass();
    $obj->code="1";
    $obj->msg=urlencode("修改失败");//中文urlencode一下
    echo urldecode(json_encode($obj)); 
}
 
 
?>