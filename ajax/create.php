<?php 
require_once '../include.php'; 


$arr['username']=$_POST['username'];
$arr['password']=md5($_POST['password']);
$arr['regTime']=time();  
$code=$_POST['code'];//验证码

$arr2['username']=$_POST['username'];

//合法检查
if(!isset($arr['username'])||!isset($arr['password'])){
    $obj = new stdClass();
    $obj->code="1";
    $obj->msg=urlencode("手机号或密码不能为空");//中文urlencode一下
    echo urldecode(json_encode($obj));
    return;
}

//验证码 暂时注释。。。
// if(!isset($code)||$code!=$_SESSION['confirmCode']){
//     $obj = new stdClass();
//     $obj->code="1";
//     $obj->msg=urlencode("验证码不正确");//中文urlencode一下
//     echo urldecode(json_encode($obj));
//     return;
// }



//查重
$sql="select * from dfz_user where username='".$arr['username']."'";

$row=fetchOne($sql);
if($row){
    $obj = new stdClass();
    $obj->code="2";
    $obj->msg=urlencode("该用户已注册");//中文urlencode一下
    echo urldecode(json_encode($obj));
    return;
}
 
//开始插入
if(insert("dfz_user", $arr)&&insert("dfz_userinfo",$arr2)){ 
    $obj = new stdClass();
    $obj->code="0";
    $obj->msg=urlencode("创建成功");//中文urlencode一下
    echo urldecode(json_encode($obj));
}else{ 
    //回溯
    delete("dfz_user","username={$arr['username']}");
    delete("dfz_userinfo","username={$arr['username']}");
    $obj = new stdClass();
    $obj->code="1";
    $obj->msg=urlencode("创建失败");//中文urlencode一下
    echo urldecode(json_encode($obj));
}
 
?>