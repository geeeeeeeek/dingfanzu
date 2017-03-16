<?php 
require_once '../include.php'; 

  
$arr['username']=$_POST['username']; 
 

 
if($arr['username']){
    $sql="select * from dfz_userinfo where username='".$arr['username']."'";

    $row=fetchOne($sql); 
    if($row){
        $obj = new stdClass();
        $obj->code="0";
        $obj->msg=urlencode("获取成功");//中文urlencode一下
        $obj->data=$row;
        echo urldecode(json_encode($obj)); 
    }else{
        $obj = new stdClass();
        $obj->code="1";
        $obj->msg=urlencode("没有信息");//中文urlencode一下
        echo urldecode(json_encode($obj)); 
    }
    
}