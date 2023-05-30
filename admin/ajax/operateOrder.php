<?php
require_once '../../include.php'; 

 
$type=$_POST['type'];
$id=$_POST['id']; 

//接单 
$res="";
if(!empty($id)&&!empty($type)){
    if($type=="take"){
        $res=takeOrder($id);
        if($res=="0"){     
            $obj = new stdClass();
            $obj->code="0";
            $obj->msg=urlencode("接单成功");//中文urlencode一下
            echo urldecode(json_encode($obj));
        }else if($res=="2") {
            $obj = new stdClass();
            $obj->code="2";
            $obj->msg=urlencode("接单已处理");//中文urlencode一下
            echo urldecode(json_encode($obj));
        }else{
            $obj = new stdClass();
            $obj->code="1";
            $obj->msg=urlencode("接单失败");//中文urlencode一下
            echo urldecode(json_encode($obj));
        }
    }elseif ($type=="cancel") {
        $res=cancelOrder($id,'2');
        if($res=="0"){  
            $obj = new stdClass();
            $obj->code="0";
            $obj->msg=urlencode("已拒绝");//中文urlencode一下
            echo urldecode(json_encode($obj));
        }else if($res=="2"){ 
            $obj = new stdClass();
            $obj->code="2";
            $obj->msg=urlencode("订单已处理");//中文urlencode一下
            echo urldecode(json_encode($obj));
        }else{
            $obj = new stdClass();
            $obj->code="1";
            $obj->msg=urlencode("操作失败，请重试");//中文urlencode一下
            echo urldecode(json_encode($obj));
        }
    }
    
}