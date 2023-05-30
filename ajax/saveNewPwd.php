<?php
require_once '../include.php'; 

   

$username=$_POST['username'];
$pwd=$_POST['pwd'];
$pwd2=$_POST['pwd2'];

//原密码
$pwd=md5($pwd);

//新密码
$arr['password']=md5($pwd2);


if($pwd&&$pwd2){
    $sql="select * from dfz_user where username='{$username}' and password='{$pwd}'"; 
    $row=fetchOne($sql);
    if($row){
        if(update("dfz_user",$arr,"username='{$username}'")){
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
    }else{
        $obj = new stdClass();
        $obj->code="1";
        $obj->msg=urlencode("原密码错误");//中文urlencode一下
        echo urldecode(json_encode($obj)); 
    }
}else{
    $obj = new stdClass();
    $obj->code="1";
    $obj->msg=urlencode("参数不能为空");//中文urlencode一下
    echo urldecode(json_encode($obj)); 
}
 

?>